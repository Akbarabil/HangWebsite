<?php

namespace App\Http\Controllers\api;

use App\Datefunc;
use App\District;
use App\Http\Controllers\Controller;
use App\Presence;
use App\TransactionDaily;
use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class PresenceApi extends Controller
{
    public function index()
    {
        try {
            $presence = Presence::all();
            return response([
                'status_code'       => 200,
                'status_message'    => 'Data berhasil diambil!',
                'data'              => $presence
            ], 200);
        } catch (Exception $exp) {
            return response([
                'status_code'       => 500,
                'status_message'    => $exp->getMessage(),
            ], 500);
        }
    }

    public function detail(Request $req)
    {

        try {
            $idUser = $req->input("id_user");
            $presence = Presence::whereDate('DATE_PRESENCE', date('Y-m-d'))->where('ID_USER',  $idUser)->get();

            if ($presence == null) {
                return response([
                    'status_code'       => 200,
                    'status_message'    => 'Data tidak ditemukan!',
                ], 200);
            } else {
                return response([
                    'status_code'       => 200,
                    'status_message'    => 'Data berhasil ditemukan!',
                    'data'              => $presence
                ], 200);
            }
        } catch (Exception $exp) {
            return response([
                'status_code'       => 500,
                'status_message'    => $exp->getMessage(),
            ], 500);
        }
    }

    public function store(Request $req)
    {
        try {
            $validator = Validator::make($req->all(), [
                'id_user'          => 'required|string|exists:user,ID_USER',
                'kecamatan'        => 'required|string|exists:md_district,NAME_DISTRICT',
                'longitude'        => 'required|string',
                'latitude'         => 'required|string',
                'image'            => 'required|image'
            ], [
                'required'  => 'Parameter :attribute tidak boleh kosong!',
                'string'    => 'Parameter :attribute harus bertipe string!',
                'numeric'   => 'Parameter :attribute harus bertipe angka!',
                'exists'    => 'Parameter :attribute tidak ditemukan!',
            ]);

            if ($validator->fails()) {
                return response([
                    "status_code"       => 400,
                    "status_message"    => $validator->errors()->first()
                ], 400);
            }

            $cek = Presence::where('ID_USER', '=', '' . $req->input('id_user') . '')
                ->whereDate('DATE_PRESENCE', '=', date('Y-m-d'))
                ->exists();

            $district = District::select("ID_DISTRICT")
                ->where([
                    ['NAME_DISTRICT', '=', $req->input('kecamatan')],
                    ['ID_AREA', '=', $req->input('id_area')],
                    ['ISMARKET_DISTRICT', '=', '0']
                ])->whereNull('deleted_at')->first();

            if (!empty($district)) {
                if ($cek == true) {
                    return response([
                        "status_code"       => 200,
                        "status_message"    => 'Anda sudah absen'
                    ], 200);
                } else {
                    $dateFunc = new Datefunc();

                    if (empty($dateFunc->currDate($req->input('longitude'), $req->input('latitude')))) {
                        return response([
                            "status_code"       => 403,
                            "status_message"    => 'Data timezone tidak ditemukan di lokasi anda'
                        ], 200);
                    }

                    $currDate = $dateFunc->currDate($req->input('longitude'), $req->input('latitude'));

                    $presence = new Presence();
                    $presence->ID_USER              = $req->input('id_user');
                    $presence->ID_DISTRICT          = $district->ID_DISTRICT;
                    $presence->LONG_PRESENCE        = $req->input('longitude');
                    $presence->LAT_PRESENCE         = $req->input('latitude');
                    $presence->PHOTO_PRESENCE       = $this->UploadFileR2($req->file('image'), 'images');
                    $presence->DATE_PRESENCE        = $currDate;
                    $presence->IS_FAKE              = $req->filled('fake_status') ? $req->input('fake_status') : '0';
                    $presence->save();

                    $detLoc = DB::select("
                        SELECT ma.NAME_AREA , mr.NAME_REGIONAL , ml.NAME_LOCATION 
                        FROM md_district md 
                        INNER JOIN md_area ma
                            ON md.ID_DISTRICT = " . $district->ID_DISTRICT . " AND ma.ID_AREA = md.ID_AREA 
                        INNER JOIN md_regional mr 
                            ON mr.ID_REGIONAL = ma.ID_REGIONAL 
                        INNER JOIN md_location ml 
                            ON ml.ID_LOCATION = mr.ID_LOCATION
                    ");

                    $transDaily = new TransactionDaily();
                    $transDaily->ID_USER     = $req->input('id_user');
                    $transDaily->DATE_TD     = $currDate;
                    $transDaily->AREA_TD     = $detLoc[0]->NAME_AREA;
                    $transDaily->REGIONAL_TD = $detLoc[0]->NAME_REGIONAL;
                    $transDaily->LOCATION_TD = $detLoc[0]->NAME_LOCATION;
                    $transDaily->save();

                    return response([
                        "status_code"       => 200,
                        "status_message"    => 'Data berhasil disimpan!',
                        "data"              => ['ID_PRESENCE' => $presence->ID_PRESENCE]
                    ], 200);
                }
            } else {
                return response([
                    'status_code'       => 403,
                    'status_message'    => "Kecamatan tidak terdaftar, Cek lokasi anda!",
                ], 200);
            }
        } catch (HttpResponseException $exp) {
            return response([
                'status_code'       => $exp->getCode(),
                'status_message'    => $exp->getMessage(),
            ], 200);
        }
    }

    public function UploadFileR2($fileData, $folder)
    {
        $extension = $fileData->getClientOriginalExtension();
        $fileName = $fileData->getClientOriginalName();

        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }

        $path = $folder . '/' . hash('sha256', $fileName) . $randomString . '.' . $extension;

        // Configure the S3 client to use Cloudflare R2 endpoint
        $s3 = Storage::disk('r2')->getDriver()->getAdapter()->getClient();
        $bucket = config('filesystems.disks.r2.bucket');

        $s3->putObject([
            'Bucket' => $bucket,
            'Key' => $path,
            'SourceFile' => $fileData->path(),
            'ACL' => 'public-read',
            'ContentType' => $fileData->getMimeType(),
            'ContentDisposition' => 'inline; filename="' . $fileName . '"',
        ]);

        // Return the URL to the uploaded file on Cloudflare R2
        return 'https://finna.yntkts.my.id/' . $path;
    }
}
