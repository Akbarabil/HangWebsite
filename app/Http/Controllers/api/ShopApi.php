<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Shop;
use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ShopApi extends Controller
{
    public function index(){
        try {
            $shop = Shop::all();
            return response([
                'status_code'       => 200,
                'status_message'    => 'Data berhasil diambil!',
                'data'              => $shop
            ], 200);
        } catch (Exception $exp) {
            return response([
                'status_code'       => 500,
                'status_message'    => $exp->getMessage(),
            ], 500);
        }
    }

    public function detail($id){
        try {
            $shop = Shop::find($id);
            if($shop == null){
                return response([
                    'status_code'       => 200,
                    'status_message'    => 'Data tidak ditemukan!',
                ], 200);
            }else{
                return response([
                    'status_code'       => 200,
                    'status_message'    => 'Data berhasil ditemukan!',
                    'data'              => $shop
                ], 200);
            }
        } catch (Exception $exp) {
            return response([
                'status_code'       => 500,
                'status_message'    => $exp->getMessage(),
            ], 500);
        }
    }

    public function store(Request $req){
        try {
            $validator = Validator::make($req->all(), [
                'id_district'           => 'required|numeric|exists:md_district,ID_DISTRICT',
                'name_shop'             => 'required',
                'owner_shop'            => 'required',
                'isinside_market'       => 'required|numeric',
                'type_shop'             => 'required',
                'detloc_shop'           => 'required',
                'telp_shop'             => 'required',
                'long_shop'             => 'required',
                'lat_shop'              => 'required',
                'photo_shop'            => 'required|image'
            ], [
                'required'  => 'Parameter :attribute tidak boleh kosong!',
                'string'    => 'Parameter :attribute harus bertipe string!',
                'numeric'   => 'Parameter :attribute harus bertipe angka!',
                'exists'    => 'Parameter :attribute tidak ditemukan!',
            ]);
    
            if($validator->fails()){
                return response([
                    "status_code"       => 400,
                    "status_message"    => $validator->errors()->first()
                ], 400);
            }
            date_default_timezone_set("Asia/Bangkok");
            $path = $req->file('photo_shop')->store('images', 's3');

            $cek = Shop::where('NAME_SHOP', '=', ''.$req->input('name_shop').'')
            ->where('OWNER_SHOP', '=', $req->input('owner_shop'))
            ->exists();

            if ($cek == true) {
                return response([
                    "status_code"       => 200,
                    "status_message"    => 'Data toko sudah terpakai'
                ], 200);
            }else{
                $shop = new Shop();
                $shop->ID_DISTRICT          = $req->input('id_district');
                $shop->NAME_SHOP            = $req->input('name_shop');
                $shop->OWNER_SHOP           = $req->input('owner_shop');
                $shop->ISINSIDEMARKET_SHOP  = $req->input('isinside_market');
                $shop->TYPE_SHOP            = $req->input('type_shop');
                $shop->DETLOC_SHOP          = $req->input('detloc_shop');
                $shop->TELP_SHOP            = $req->input('telp_shop');
                $shop->LONG_SHOP            = $req->input('long_shop');
                $shop->LAT_SHOP             = $req->input('lat_shop');
                $shop->PHOTO_SHOP           = Storage::disk('s3')->url($path);
                $shop->save();

                return response([
                    "status_code"       => 200,
                    "status_message"    => 'Data berhasil disimpan!',
                    "data"              => ['ID_SHOP' => $shop->ID_SHOP]
                ], 200);
            }
        } catch (HttpResponseException $exp) {
            return response([
                'status_code'       => $exp->getCode(),
                'status_message'    => $exp->getMessage(),
            ], $exp->getCode());
        }
    }

    public function list_store(Request $req)
    {
        try {
            $validator = Validator::make($req->all(), [
                'lat_user'           => 'required|numeric',
                'lng_user'             => 'required|numeric',
                'district_user'            => 'required|numeric'
            ], [
                'required'  => 'Parameter :attribute tidak boleh kosong!',
                'string'    => 'Parameter :attribute harus bertipe string!',
                'numeric'    => 'Parameter :attribute harus bertipe angka!',
            ]);
            
            $latitude = $req->get('lat_user'); // "-7.965769846888459"
            $longitude = $req->get('lng_user'); // "112.60750389398623"
            $id_district = $req->get('district_user');

            if ($validator->fails()) {
                return response([
                    "status_code"       => 400,
                    "status_message"    => $validator->errors()->first()
                ], 400);
            }

            $shop = DB::table("md_shop")
                ->select("md_shop.*")
                ->selectRaw("ST_DISTANCE_SPHERE(
                    point('$longitude', '$latitude'),
                    point(md_shop.LONG_SHOP, md_shop.LAT_SHOP)
                )  AS DISTANCE_SHOP")
                ->where('md_shop.ID_DISTRICT', '=', $id_district)
                ->orderBy('DISTANCE_SHOP', 'asc')
                ->paginate(10);

            $dataRespon = array();
            foreach ($shop->items() as $shopData) {
                array_push(
                    $dataRespon,
                    array(
                        "ID_SHOP" => $shopData->ID_SHOP,
                        "PHOTO_SHOP" => $shopData->PHOTO_SHOP,
                        "NAME_SHOP" => $shopData->NAME_SHOP,
                        "OWNER_SHOP" => $shopData->OWNER_SHOP,
                        "DISTANCE_SHOP" => number_format($shopData->DISTANCE_SHOP, 2, '.', '')
                    )
                );
            }
           

            $dataPagination = array();
            array_push(
                $dataPagination,
                array(
                    "TOTAL_PAGE" => $shop->total(),
                    "PAGE" => $shop->currentPage()
                )
            );

            return response([
                'status_code'       => 200,
                'status_message'    => 'Data berhasil diambil!',
                'data'              => $dataRespon,
                'status_pagination' => $dataPagination
            ], 200);
        } catch (Exception $exp) {
            return response([
                'status_code'       => 500,
                'status_message'    => $exp->getMessage(),
            ], 500);
        }
    }
}