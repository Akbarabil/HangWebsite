<?php

namespace App\Http\Controllers\api;

use App\Datefunc;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Pickup;
use App\Product;
use App\TransactionDaily;
use Exception;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Validator;

class PickupApi extends Controller
{
    public function store(Request $req){
        
        try {
            $validator = Validator::make($req->all(), [
                'id_user'                   => 'required',
                // 'id_district'               => 'required',
                // 'id_type'                   => 'required',
                'lat_trans'                 => 'required',
                'long_trans'                => 'required',
                'product.*.id_product'      => 'required|exists:md_product,ID_PRODUCT',
                'product.*.name_product'    => 'required'
            ], [
                'required'  => 'Parameter :attribute tidak boleh kosong!',
            ]);
    
            if($validator->fails()){
                return response([
                    "status_code"       => 400,
                    "status_message"    => $validator->errors()->first()
                ], 400);
            }

            $dateFunc = new Datefunc();
            
            if (empty($dateFunc->currDate($req->input('long_trans'), $req->input('lat_trans')))) {
                return response([
                    "status_code"       => 403,
                    "status_message"    => 'Data timezone tidak ditemukan di lokasi anda'
                ], 200);
            }
            $currDate = $dateFunc->currDate($req->input('long_trans'), $req->input('lat_trans'));

            $pickup = new Pickup();
            $pickup->ID_USER                = $req->input('id_user');
            // $pickup->ID_DISTRICT            = $req->input('id_district');
            // $pickup->DETAILLOKASI_PICKUP    = $req->input('detail_lokasi');
            // $pickup->ID_TYPE                = $req->input('id_type');
            $pickup->TIME_PICKUP            = $currDate;

            $idproduct = array();
            $nameproduct = array();
            $totalpickup = array();
            foreach ($req->input('product') as $item) {
                array_push($idproduct, $item['id_product']);
                array_push($nameproduct, $item['name_product']);                
                array_push($totalpickup, $item['total_pickup']);  
            }
            
            $pickup->ID_PRODUCT = implode(';', $idproduct);
            $pickup->NAMEPRODUCT_PICKUP = implode(';', $nameproduct);
            $pickup->TOTAL_PICKUP = implode(';', $totalpickup);
            $pickup->REMAININGSTOCK_PICKUP = $pickup->TOTAL_PICKUP;
            $pickup->save();

            // $transDaily = new TransactionDaily();
            // $transDaily->ID_USER = $req->input('id_user');
            // $transDaily->DATE_TD = $currDate;
            // $transDaily->save();

            return response([
                "status_code"       => 200,
                "status_message"    => 'Data berhasil disimpan!'
            ], 200);
        } catch (HttpResponseException $exp) {
            return response([
                'status_code'       => $exp->getCode(),
                'status_message'    => $exp->getMessage(),
            ], $exp->getCode());
        }
    }

    public function pickup(Request $req){
        try {
            $currDate = date('Y-m-d');
            $pick = Pickup::select('ID_PICKUP', 'ID_PRODUCT','REMAININGSTOCK_PICKUP','NAMEPRODUCT_PICKUP')
            ->whereDate('TIME_PICKUP', '=', $currDate)
            ->where([
                ['ID_USER', '=', $req->input('id_user')],
            ])->first();
            
            $cekFactur = TransactionDaily::whereDate('DATE_TD', '=', $currDate)
            ->where([
                ['ID_USER', '=', $req->input('id_user')]
            ])->first();

            if($cekFactur->ISFINISHED_TD == '1'){
                return response([
                    'status_code'       => 200,
                    'status_message'    => 'Anda telah melakukan faktur pada hari ini!',
                    'data'              => [
                        "id_pickup" => $pick->ID_PICKUP,
                        "product"   => []
                    ]
                ], 200);
            }

            $arrId = explode(";", $pick->ID_PRODUCT);
            $arrRemain = explode(";", $pick->REMAININGSTOCK_PICKUP);
            $arrName = explode(";", $pick->NAMEPRODUCT_PICKUP);

            $products = array();
            foreach ($arrId as $key => $value) {
                $product = array(
                    'id_product'=>$value, 
                    'name_product'=>$arrName[$key],
                    'image_product'=>Product::select('IMAGE_PRODUCT')->where('ID_PRODUCT', $value)->first()->IMAGE_PRODUCT,
                    'qty_product'=>$arrRemain[$key],
                );
                array_push($products, $product);
            }

            return response([
                'status_code'       => 200,
                'status_message'    => 'Data berhasil diambil!',
                'data'              => [
                    "id_pickup" => $pick->ID_PICKUP,
                    "product"   => $products
                    ]
            ], 200);
        } catch (Exception $exp) {
            return response([
                'status_code'       => 500,
                'status_message'    => $exp->getMessage(),
            ], 500);
        }
    }

    public function cekPickup(Request $req){
        try {
            $currDate = date('Y-m-d');
            $cekPickup = Pickup::select('ID_PICKUP', 'ID_PRODUCT','REMAININGSTOCK_PICKUP', 'TIME_PICKUP')
            ->whereDate('TIME_PICKUP', '=', $currDate)
            ->where([
                ['ID_USER', '=', $req->input('id_user')]
            ])->first();

            $cekFactur = TransactionDaily::whereDate('DATE_TD', '=', $currDate)
            ->where([
                ['ID_USER', '=', $req->input('id_user')]
            ])->first();
            
            if ($cekPickup == null) {
                $succ   = 1;
                $msg    = 'Anda belum melakukan pengambilan produk!';
            }else if($cekFactur->ISFINISHED_TD == '1'){
                $succ   = 0;
                $msg    = 'Anda telah melakukan faktur pada hari ini!';
            }else{
                $succ   = 0;
                $msg    = 'Anda telah selesai melakukan pengambilan poduk pada hari ini!';
            }

            return response([
                'status_code'       => 200,
                'status_message'    => $msg,
                'status_success'    => $succ,
                'data'              => []
            ], 200);
        } catch (Exception $exp) {
            return response([
                'status_code'       => 500,
                'status_message'    => $exp->getMessage(),
            ], 500);
        }
    }
}