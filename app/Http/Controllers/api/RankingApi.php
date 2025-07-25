<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\UserRankingActivity;
use App\UserRankingSale;
use Exception;
use Illuminate\Http\Request;

class RankingApi extends Controller
{
    public function rankingSale(Request $req){
        try{
            $currDate = date('Y-m-d');
            $rankings = UserRankingSale::select('NAME_USER', 'NAME_REGIONAL', 'NAME_AREA', 'AVERAGE')
                ->whereDate('created_at', '=', $currDate)
                ->where('ID_REGIONAL', '=', $req->id_regional)
                ->orderBy('AVERAGE', 'DESC')
                ->get();

            if(!$rankings->isEmpty()){
                return response([
                    'status_code'       => 200,
                    'status_message'    => 'Data berhasil ditemukan',
                    'updated_at'        => $currDate,
                    'data'              => $rankings
                ], 200);
            }else{
                return response([
                    'status_code'       => 200,
                    'updated_at'        => $currDate,
                    'status_message'    => 'Data tidak ditemukan'
                ], 200);
            }
        } catch (Exception $exp) {
            return response([
                'status_code'       => 500,
                'status_message'    => $exp->getMessage(),
            ], 500);
        }
    }

    public function rankingActivity(Request $req){
        try{
            $currDate = date('Y-m-d');
            $rankings = UserRankingActivity::select('NAME_USER', 'NAME_REGIONAL', 'NAME_AREA', 'AVERAGE')
                ->whereDate('created_at', '=', $currDate)
                ->where('ID_REGIONAL', '=', $req->id_regional)
                ->orderBy('AVERAGE', 'DESC')
                ->get();

            if(!$rankings->isEmpty()){
                return response([
                    'status_code'       => 200,
                    'status_message'    => 'Data berhasil ditemukan',
                    'updated_at'        => $currDate,
                    'data'              => $rankings
                ], 200);
            }else{
                return response([
                    'status_code'       => 200,
                    'updated_at'        => $currDate,
                    'status_message'    => 'Data tidak ditemukan'
                ], 200);
            }
        } catch (Exception $exp) {
            return response([
                'status_code'       => 500,
                'status_message'    => $exp->getMessage(),
            ], 500);
        }
    }
}
