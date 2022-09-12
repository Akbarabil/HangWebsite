<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Product;
use App\Recomendation;
use App\UserRankingSale;
use App\UserRankingActivity;
use App\ReportExcell;
use App\ActivityCategory;
use App\CategoryProduct;
use AWS\CRT\HTTP\Request;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class CronjobController extends Controller
{
    public function cronjob_store_rekomendasi()
    {
        try {
            DB::table("recomendation")->delete();

            $DataUser = DB::table("user")
                ->select('user.*')
                ->get();

            foreach ($DataUser as $ItemUser) {
                $id_user = $ItemUser->ID_USER;

                $Trans = DB::table("transaction")
                    ->select('transaction.*')
                    ->selectRaw('DATEDIFF("' . Carbon::now() . '", transaction.DATE_TRANS) AS DateDiff')
                    ->where('ID_USER', '=', $id_user)
                    ->where('ID_SHOP', '<>', NULL)
                    ->orderBy('DateDiff', 'ASC')
                    ->get();

                $dataRecom = array();
                foreach ($Trans as $dataTrans) {
                    $shopData = DB::table("md_shop")
                        ->select("md_shop.*")
                        ->where('md_shop.ID_SHOP', '=', $dataTrans->ID_SHOP)
                        ->first();

                    if ($dataTrans->DateDiff >= 14) {
                        $dataRespon = array(
                            "ID_USER" => $id_user,
                            "ID_SHOP" => $shopData->ID_SHOP,
                            "PHOTO_SHOP" => $shopData->PHOTO_SHOP,
                            "NAME_SHOP" => $shopData->NAME_SHOP,
                            "OWNER_SHOP" => $shopData->OWNER_SHOP,
                            "DETLOC_SHOP" => $shopData->DETLOC_SHOP,
                            "LONG_SHOP" => $shopData->LONG_SHOP,
                            "LAT_SHOP" => $shopData->LAT_SHOP,
                            "ID_DISTRICT" => $shopData->ID_DISTRICT,
                            "LAST_VISITED" => $dataTrans->DateDiff
                        );

                        array_push($dataRecom, $dataRespon);
                    }
                }

                foreach ($dataRecom as $RecomShop) {
                    $CheckRecom = DB::table("recomendation")
                        ->select("recomendation.*")
                        ->where('recomendation.ID_USER', '=', $RecomShop['ID_USER'])
                        ->where('recomendation.ID_SHOP', '=', $RecomShop['ID_SHOP'])
                        ->first();

                    if ($CheckRecom == null) {
                        $recomendation = new Recomendation();
                        $recomendation->ID_USER      = $RecomShop['ID_USER'];
                        $recomendation->ID_SHOP      = $RecomShop['ID_SHOP'];
                        $recomendation->NAME_SHOP    = $RecomShop['NAME_SHOP'];
                        $recomendation->DETLOC_SHOP  = $RecomShop['DETLOC_SHOP'];
                        $recomendation->PHOTO_SHOP   = $RecomShop['PHOTO_SHOP'];
                        $recomendation->IDLE_RECOM   = $RecomShop['LAST_VISITED'];
                        $recomendation->LAT_SHOP     = $RecomShop['LAT_SHOP'];
                        $recomendation->LONG_SHOP    = $RecomShop['LONG_SHOP'];
                        $recomendation->ID_DISTRICT  = $RecomShop['ID_DISTRICT'];
                        $recomendation->DATE_RECOM   = date('Y-m-d');
                        $recomendation->save();
                    }
                }
            }

            return response([
                "status_code"       => 200,
                "status_message"    => 'Data berhasil disimpan!'
            ], 200);
        } catch (Exception $exp) {
            return response([
                'status_code'       => 500,
                'status_message'    => $exp->getMessage(),
            ], 500);
        }
    }

    public function TestTemplate(ReportExcell $Excell_Reporting)
    {
        $Excell_Reporting->set_data($this->AktivitasRPOLapul(), $this->AktivitasRPODapul(), $this->AktivitasAsmen(), $this->PencapaianAsmen());
        $Excell_Reporting->generate_ranking_rpo();
        // $Excell_Reporting->generate_ranking_asmen();
        // $Excell_Reporting->generate_transaksi_harian();
        // $Excell_Reporting->generate_trend_asmen();
        // $Excell_Reporting->generate_ranking_apo_spg();
        // $Excell_Reporting->generate_trend_rpo();
    }

    public function updateDailyRanking()
    {
        date_default_timezone_set("Asia/Bangkok");
        $currDate       = date('Y-m-d');
        $currDateTime   = date('Y-m-d H:i:s');
        $formData = [];

        $targetRegionals = $this->queryGetTargetRegional($currDate);

        foreach ($targetRegionals as $targetRegional) {
            if ($targetRegional->MONTH_TARGET != NULL) {
                $querySum       = [];
                $weightProdCat  = [];
                $targetProdCat  = [];
                $targetUserMonthlys = $this->queryGetTargetUserMonthly($currDate, $targetRegional);

                foreach ($targetUserMonthlys as $targetUserMonthly) {
                    $namePC = str_replace("-", "_", $targetUserMonthly->NAME_PC);
                    $querySum[] = "
                        SUM(
                            (
                                SELECT SUM(td.QTY_TD)
                                FROM transaction_detail td , md_product mp
                                WHERE 
                                    td.ID_TRANS = t.ID_TRANS  
                                    AND td.ID_PRODUCT = mp.ID_PRODUCT 
                                    AND mp.ID_PC = " . $targetUserMonthly->ID_PC . "
                            ) 
                        ) as " . $namePC . "
                    ";
                    $weightProdCat[$namePC] = $targetUserMonthly->PERCENTAGE_PC;
                    $targetProdCat[$namePC] = $targetUserMonthly->TARGET;
                }

                $transUsers = $this->queryGetTransUser($querySum, $currDate, $targetRegional);

                foreach ($transUsers as $transUser) {
                    $arrTemp['ID_USER']             = $transUser->ID_USER;
                    $arrTemp['ID_REGIONAL']         = $targetRegional->ID_REGIONAL;
                    $arrTemp['ID_LOCATION']         = $targetRegional->ID_LOCATION;
                    $arrTemp['ID_AREA']             = $transUser->ID_AREA;
                    $arrTemp['NAME_REGIONAL']       = $targetRegional->NAME_REGIONAL;
                    $arrTemp['NAME_AREA']           = $transUser->NAME_AREA;
                    $arrTemp['NAME_USER']           = $transUser->NAME_USER;
                    $arrTemp['ID_ROLE']             = $transUser->ID_ROLE;
                    $arrTemp['TARGET_UST']          = $targetProdCat['UST'];
                    $arrTemp['REAL_UST']            = $transUser->UST != NULL ? $transUser->UST : 0;
                    $arrTemp['VSTARGET_UST']        = ($arrTemp['REAL_UST'] / $arrTemp['TARGET_UST']) * 100;
                    $arrTemp['TARGET_NONUST']       = $targetProdCat['NON_UST'];
                    $arrTemp['REAL_NONUST']         = $transUser->NON_UST != NULL ? $transUser->NON_UST : 0;
                    $arrTemp['VSTARGET_NONUST']     = ($arrTemp['REAL_NONUST'] / $arrTemp['TARGET_NONUST']) * 100;
                    $arrTemp['TARGET_SELERAKU']     = $targetProdCat['Seleraku'];
                    $arrTemp['REAL_SELERAKU']       = $transUser->Seleraku != NULL ? $transUser->Seleraku : 0;
                    $arrTemp['VSTARGET_SELERAKU']   = ($arrTemp['REAL_SELERAKU'] / $arrTemp['TARGET_SELERAKU']) * 100;
                    $arrTemp['WEIGHT_UST']          = $weightProdCat['UST'];
                    $arrTemp['WEIGHT_NONUST']       = $weightProdCat['NON_UST'];
                    $arrTemp['WEIGHT_SELERAKU']     = $weightProdCat['Seleraku'];

                    $avgCount = 0;
                    if ($weightProdCat['UST'] != 0) $avgCount++;
                    if ($weightProdCat['NON_UST'] != 0) $avgCount++;
                    if ($weightProdCat['Seleraku'] != 0) $avgCount++;

                    $arrTemp['AVERAGE'] = ((($arrTemp['VSTARGET_UST'] / 100) * ($weightProdCat['UST'] / 100)));
                    $arrTemp['AVERAGE'] += (($arrTemp['VSTARGET_NONUST'] / 100) * ($weightProdCat['NON_UST'] / 100));
                    $arrTemp['AVERAGE'] += (($arrTemp['VSTARGET_SELERAKU'] / 100) * ($weightProdCat['Seleraku'] / 100));
                    $arrTemp['AVERAGE'] = $arrTemp['AVERAGE'] / $avgCount;

                    $arrTemp['created_at']  = $currDateTime;
                    $formData[] = $arrTemp;
                }
            }
        }
        if ($formData != null) {
            UserRankingSale::insert($formData);
        }
        dd($formData);
    }

    //ACTIVITY RANK
    public function updateDailyRankingActivity()
    {
        date_default_timezone_set("Asia/Bangkok");
        $currDate       = date('Y-m-d');
        $currDateTime   = date('Y-m-d H:i:s');
        $formData = [];

        $targetRegionals = $this->queryGetTargetRegionalActivity($currDate);


        foreach ($targetRegionals as $targetRegional) {
            if ($targetRegional->MONTH_TARGET != NULL) {
                $weightActCat  = [];
                $targetActCat  = [];
                $targetUserMonthlys = $this->queryGetTargetUserMonthlyActivity($currDate, $targetRegional);

                foreach ($targetUserMonthlys as $targetUserMonthly) {
                    $nameAC = str_replace(" ", "_", $targetUserMonthly->NAME_AC);
                    $weightActCat[$nameAC] = $targetUserMonthly->PERCENTAGE_AC;
                    $targetActCat[$nameAC] = $targetUserMonthly->TARGET;
                }

                $transUsers = $this->queryGetTransUserActivity($currDate, $targetRegional);

                foreach ($transUsers as $transUser) {
                    $arrTemp['ID_USER']             = $transUser->ID_USER;
                    $arrTemp['ID_REGIONAL']         = $targetRegional->ID_REGIONAL;
                    $arrTemp['ID_LOCATION']         = $targetRegional->ID_LOCATION;
                    $arrTemp['ID_AREA']             = $transUser->ID_AREA;
                    $arrTemp['NAME_REGIONAL']       = $targetRegional->NAME_REGIONAL;
                    $arrTemp['NAME_AREA']           = $transUser->NAME_AREA;
                    $arrTemp['NAME_USER']           = $transUser->NAME_USER;
                    $arrTemp['ID_ROLE']             = $transUser->ID_ROLE;
                    $arrTemp['TARGET_UB']           = $targetActCat['AKTIVITAS_UB'];
                    $arrTemp['REAL_UB']             = $transUser->AKTIVITAS_UB != NULL ? $transUser->AKTIVITAS_UB : 0;
                    $arrTemp['VSTARGET_UB']         = ($arrTemp['REAL_UB'] / $arrTemp['TARGET_UB']) * 100;
                    $arrTemp['TARGET_PDGSAYUR']     = $targetActCat['PEDAGANG_SAYUR'];
                    $arrTemp['REAL_PDGSAYUR']       = $transUser->PEDAGANG_SAYUR != NULL ? $transUser->PEDAGANG_SAYUR : 0;
                    $arrTemp['VSTARGET_PDGSAYUR']   = ($arrTemp['REAL_PDGSAYUR'] / $arrTemp['TARGET_PDGSAYUR']) * 100;
                    $arrTemp['TARGET_RETAIL']       = $targetActCat['RETAIL'];
                    $arrTemp['REAL_RETAIL']         = $transUser->RETAIL != NULL ? $transUser->RETAIL : 0;
                    $arrTemp['VSTARGET_RETAIL']     = ($arrTemp['REAL_RETAIL'] / $arrTemp['TARGET_RETAIL']) * 100;
                    $arrTemp['WEIGHT_UB']           = $weightActCat['AKTIVITAS_UB'];
                    $arrTemp['WEIGHT_PDGSAYUR']     = $weightActCat['PEDAGANG_SAYUR'];
                    $arrTemp['WEIGHT_RETAIL']       = $weightActCat['RETAIL'];

                    $avgCount = 0;
                    if ($weightActCat['AKTIVITAS_UB'] != 0) $avgCount++;
                    if ($weightActCat['PEDAGANG_SAYUR'] != 0) $avgCount++;
                    if ($weightActCat['RETAIL'] != 0) $avgCount++;

                    $arrTemp['AVERAGE'] = ((($arrTemp['VSTARGET_UB'] / 100) * ($weightActCat['AKTIVITAS_UB'] / 100)));
                    $arrTemp['AVERAGE'] += (($arrTemp['VSTARGET_PDGSAYUR'] / 100) * ($weightActCat['PEDAGANG_SAYUR'] / 100));
                    $arrTemp['AVERAGE'] += (($arrTemp['VSTARGET_RETAIL'] / 100) * ($weightActCat['RETAIL'] / 100));
                    $arrTemp['AVERAGE'] = $arrTemp['AVERAGE'] / $avgCount;

                    $arrTemp['created_at']  = $currDateTime;
                    $formData[] = $arrTemp;
                }
            }
        }
        if ($formData != null) {
            UserRankingActivity::insert($formData);
        }
        dd($formData);
    }

    public function queryGetTargetRegional($currDate)
    {
        return DB::select("
            SELECT 
                mr.ID_REGIONAL, 
                ml.ID_LOCATION,
                mr.NAME_REGIONAL, 
                ma.ID_AREA ,
                COUNT(ma.ID_AREA) as TOTAL_AREA ,
                (
                    SELECT SUM(ts.QUANTITY) 
                    FROM target_sale ts 
                    WHERE 
                        DATE(ts.START_PP) <= '" . $currDate . "' 
                        AND DATE(ts.END_PP) >= '" . $currDate . "'
                        AND ts.ID_REGIONAL = ma.ID_REGIONAL 
                ) as MONTH_TARGET
            FROM md_area ma , md_regional mr , md_location ml
            WHERE 
                ma.deleted_at IS NULL
                AND ma.ID_REGIONAL = mr.ID_REGIONAL 
                AND mr.ID_LOCATION = ml.ID_LOCATION
            GROUP BY ma.ID_REGIONAL 
        ");
    }
    public function queryGetTargetUserMonthly($currDate, $targetRegional)
    {
        return DB::select("
            SELECT 
                ts.ID_REGIONAL ,
                mpc.ID_PC ,
                mp.ID_PRODUCT ,
                mpc.NAME_PC ,
                mpc.PERCENTAGE_PC ,
                ROUND(((SUM(ts.QUANTITY) / " . $targetRegional->TOTAL_AREA . ") / 3) / 25) as TARGET
            FROM 
                target_sale ts ,
                md_product mp ,
                md_product_category mpc 
            WHERE
                DATE(ts.START_PP) <= '" . $currDate . "' 
                AND DATE(ts.END_PP) >= '" . $currDate . "' 
                AND ts.ID_REGIONAL = " . $targetRegional->ID_REGIONAL . "
                AND ts.ID_PRODUCT = mp.ID_PRODUCT 
                AND mp.ID_PC = mpc.ID_PC 
            GROUP BY mpc.ID_PC 
        ");
    }
    public function queryGetTransUser($querySum, $currDate, $targetRegional)
    {
        return DB::select("
            SELECT 
                u.ID_USER ,
                u.NAME_USER ,
                u.ID_ROLE ,
                u.ID_AREA ,
                ma.NAME_AREA ,
                " . implode(', ', $querySum) . "
            FROM 
                `transaction` t ,
                `user` u ,
                md_area ma 
            WHERE
                DATE(t.DATE_TRANS) = '" . $currDate . "'
                AND u.ID_REGIONAL = " . $targetRegional->ID_REGIONAL . "
                AND t.ID_USER = u.ID_USER 
                AND ma.ID_AREA = u.ID_AREA 
            GROUP BY t.ID_USER 
        ");
    }

    //ACTIVITY RANK
    public function queryGetTargetRegionalActivity($currDate)
    {
        return DB::select("
            SELECT 
            mr.ID_REGIONAL, 
            ml.ID_LOCATION,
            mr.NAME_REGIONAL, 
            ma.ID_AREA ,
            COUNT(ma.ID_AREA) as TOTAL_AREA ,
            (
                    SELECT SUM(ta.QUANTITY) 
                    FROM target_activity ta 
                    WHERE 
                            DATE(ta.START_PP) <= '" . $currDate . "' 
                            AND DATE(ta.END_PP) >= '" . $currDate . "'
                            AND ta.ID_REGIONAL = ma.ID_REGIONAL 
            ) as MONTH_TARGET
            FROM md_area ma , md_regional mr , md_location ml
            WHERE 
                    ma.deleted_at IS NULL
                    AND ma.ID_REGIONAL = mr.ID_REGIONAL 
                    AND mr.ID_LOCATION = ml.ID_LOCATION
            GROUP BY ma.ID_REGIONAL 
        ");
    }
    public function queryGetTargetUserMonthlyActivity($currDate, $targetRegional)
    {
        return DB::select("
            SELECT 
            ta.ID_REGIONAL ,
            mac.ID_AC ,
            mac.NAME_AC ,
            mac.PERCENTAGE_AC ,
            ROUND(((SUM(ta.QUANTITY) / " . $targetRegional->TOTAL_AREA . ") / 3) / 25) as TARGET
            FROM 
                    target_activity ta ,
                    md_activity_category mac 
            WHERE
                    DATE(ta.START_PP) <= '" . $currDate . "' 
                    AND DATE(ta.END_PP) >= '" . $currDate . "' 
                    AND ta.ID_REGIONAL = " . $targetRegional->ID_REGIONAL . "
                    AND ta.ID_ACTIVITY = mac.ID_AC 
            GROUP BY mac.ID_AC
        ");
    }
    public function queryGetTransUserActivity($currDate, $targetRegional)
    {
        return DB::select("
        SELECT 
                u.ID_USER ,
                u.NAME_USER ,
                u.ID_ROLE ,
                u.ID_AREA ,
                ma.NAME_AREA ,
                SUM(
                    (
                        SELECT SUM(td.QTY_TD)
                            FROM transaction_detail td
                            WHERE 
                                td.ID_TRANS = t.ID_TRANS
                                AND t.ID_TYPE IN (2,3)
                    ) 
                ) as AKTIVITAS_UB ,
                SUM(
                    (
                        SELECT SUM(td.QTY_TD)
                            FROM transaction_detail td
                            , md_shop ms
                            WHERE 
                                td.ID_TRANS = t.ID_TRANS
                                AND td.ID_SHOP = t.ID_SHOP
                                AND t.ID_TYPE = 1
                                AND ms.ID_SHOP = t.ID_SHOP
                                AND ms.TYPE_SHOP = 'Pedagang Sayur'
                    ) 
                ) as PEDAGANG_SAYUR ,
                SUM(
                    (
                        SELECT SUM(td.QTY_TD)
                            FROM transaction_detail td
                            , md_shop ms
                            WHERE 
                                td.ID_TRANS = t.ID_TRANS
                                AND td.ID_SHOP = t.ID_SHOP
                                AND t.ID_TYPE = 1
                                AND ms.ID_SHOP = t.ID_SHOP
                                AND ms.TYPE_SHOP = 'Retail'
                    ) 
                ) as RETAIL
            FROM 
                `transaction` t ,
                `user` u ,
                md_area ma 
            WHERE
                DATE(t.DATE_TRANS) = '" . $currDate . "'
                AND u.ID_REGIONAL = " . $targetRegional->ID_REGIONAL . "
                AND t.ID_USER = u.ID_USER 
                AND ma.ID_AREA = u.ID_AREA 
            GROUP BY t.ID_USER 
        ");
    }
    public function tesQuery()
    {
        $data       = array();
        $currDate   = '2022-08-30';
        $idRegional = 7;

        $users = DB::select("
            SELECT 
                u.ID_USER ,
                u.NAME_USER , 
                mr.NAME_ROLE as ROLE_USER,
                mre.NAME_REGIONAL ,
                ma.NAME_AREA 
            FROM 
                `user` u,
                md_regional mre ,
                md_area ma ,
                md_role mr 
            WHERE
                u.ID_REGIONAL = '" . $idRegional . "'
                AND mr.ID_ROLE = u.ID_ROLE 
                AND mr.NAME_ROLE IN('APO', 'SALES')
                AND mre.ID_REGIONAL = u.ID_REGIONAL 
                AND ma.ID_AREA = u.ID_AREA 
            ORDER BY ma.ID_AREA  ASC, mr.NAME_ROLE ASC
        ");

        foreach ($users as $user) {
            $products = Product::where('deleted_at', NULL)->get();
            $sumQuery = [];
            foreach ($products as $product) {
                $sumQuery[] = "
                    (
                        SELECT SUM(td2.QTY_TD) as TOTAL
                        FROM transaction t, transaction_detail td2 
                        WHERE 
                            t.ID_USER = '" . $user->ID_USER . "'
                            AND DATE(t.DATE_TRANS) = '" . $currDate . "'
                            AND t.ID_TRANS = td2.ID_TRANS 
                            AND td2.ID_PRODUCT = " . $product->ID_PRODUCT . "
                    ) AS '" . $product->CODE_PRODUCT . "'
                ";
            }

            $trans = DB::select("
                SELECT 
                    mt.NAME_TYPE as TYPE,
                    td.ID_TD ,
                    " . implode(',', $sumQuery) . ",
                    (
                        SELECT SUM(td2.QTY_TD) as TOTAL
                        FROM transaction t, transaction_detail td2
                        WHERE
                            t.ID_USER = '" . $user->ID_USER . "'
                            AND DATE(t.DATE_TRANS) = '" . $currDate . "'
                            AND t.ID_TRANS = td2.ID_TRANS 
                    ) AS TOTAL_DISPLAY
                FROM 
                    transaction_daily td ,
                    md_type mt  
                WHERE 
                    td.ID_USER = '" . $user->ID_USER . "'
                    AND DATE(td.DATE_TD) = '" . $currDate . "'
                    AND mt.ID_TYPE = td.ID_TYPE 
            ");

            $temp['DATE_TRANS']     = '30 August 2022';
            $temp['NAME_USER']      = $user->NAME_USER;
            $temp['ROLE_USER']      = $user->ROLE_USER;
            $temp['AREA_TRANS']     = $user->ROLE_USER;
            $temp['TYPE']           = !empty($trans[0]->TYPE) ? $trans[0]->TYPE : '-';
            $temp['UST']            = !empty($trans[0]->UST20) ? $trans[0]->UST20 : '-';
            $temp['USU']            = !empty($trans[0]->USU18) ? $trans[0]->USU18 : '-';
            $temp['USP']            = !empty($trans[0]->USP20) ? $trans[0]->USP20 : '-';
            $temp['USI']            = !empty($trans[0]->USI20) ? $trans[0]->USI20 : '-';
            $temp['USTR']           = !empty($trans[0]->USTR18) ? $trans[0]->USTR18 : '-';
            $temp['USB']            = !empty($trans[0]->USB20) ? $trans[0]->USB20 : '-';
            $temp['USK']            = !empty($trans[0]->USK20) ? $trans[0]->USK20 : '-';
            $temp['USR']            = !empty($trans[0]->USR20) ? $trans[0]->USR20 : '-';
            $temp['UBNG']           = '-';
            $temp['FSU']            = !empty($trans[0]->FSU60) ? $trans[0]->FSU60 : '-';
            $temp['FSB']            = !empty($trans[0]->FSB60) ? $trans[0]->FSB60 : '-';
            $temp['TOTAL_DISPLAY']  = !empty($trans[0]->TOTAL_DISPLAY) ? $trans[0]->TOTAL_DISPLAY : '-';


            $data[] = $temp;
        }
        // dump();

        dd($data);
    }

    public function AktivitasRPODapul()
    {
        $month = date('n');
        $data = array();
        $user_regionals = DB::select("
        SELECT
        (
            SELECT
                u.NAME_USER
            FROM
                `user` u
            WHERE
                u.ID_ROLE = 4 
                AND u.ID_REGIONAL = mr.ID_REGIONAL
                LIMIT 1
        ) AS NAME_USER,
        mr.NAME_REGIONAL,
        mr.ID_REGIONAL
        FROM
            md_regional mr,
            md_location ml
        WHERE
            ml.ISINSIDE_LOCATION = 1
            AND mr.ID_LOCATION = ml.ID_LOCATION           
        ");

        foreach ($user_regionals as $user_regional) {
            $activity_rankings = DB::select("
            SELECT 
            (
                SELECT
                    QUANTITY
                    FROM
                    target_activity ta
                    WHERE
                        ID_ACTIVITY = 1
                        AND ID_REGIONAL = usa.ID_REGIONAL
            ) AS TARGET_UB, 
            SUM(usa.REAL_UB) AS REAL_UB, 
            usa.VSTARGET_UB, 
            (
                SELECT
                    QUANTITY
                    FROM
                    target_activity ta
                    WHERE
                        ID_ACTIVITY = 2
                        AND ID_REGIONAL = usa.ID_REGIONAL
            ) AS TARGET_PDGSAYUR, 
            SUM(usa.REAL_PDGSAYUR) AS REAL_PDGSAYUR, 
            usa.VSTARGET_PDGSAYUR, 
            (
                SELECT
                    QUANTITY
                    FROM
                    target_activity ta
                    WHERE
                        ID_ACTIVITY = 3
                        AND ID_REGIONAL = usa.ID_REGIONAL
            ) AS TARGET_RETAIL, 
            SUM(usa.REAL_RETAIL) AS REAL_RETAIL, 
            usa.VSTARGET_RETAIL, 
            usa.AVERAGE, 
            usa.ID_USER_RANKACTIVITY
            FROM
                user_ranking_activity AS usa,
                md_regional AS mr
            WHERE
                usa.ID_REGIONAL	= " . $user_regional->ID_REGIONAL . "
                AND usa.ID_REGIONAL = mr.ID_REGIONAL
                AND MONTH(DATE(usa.created_at)) = " . $month . "
            GROUP BY
                usa.ID_REGIONAL
            ");

            $temp['NAME_USER']          = $user_regional->NAME_USER;
            $temp['NAME_AREA']          = $user_regional->NAME_REGIONAL;
            $temp['TARGET_UB']          = !empty($activity_rankings[0]->TARGET_UB) ? $activity_rankings[0]->TARGET_UB : "-";
            $temp['REAL_UB']            = !empty($activity_rankings[0]->REAL_UB) ? $activity_rankings[0]->REAL_UB : "-";
            $temp['VSTARGET_UB']        = $temp['REAL_UB'] != "-" && $temp['TARGET_UB'] != "-" ? ($temp['REAL_UB'] / $temp['TARGET_UB']) * 100 : "-";
            $temp['TARGET_PDGSAYUR']    = !empty($activity_rankings[0]->TARGET_PDGSAYUR) ? $activity_rankings[0]->TARGET_PDGSAYUR : "-";
            $temp['REAL_PDGSAYUR']      = !empty($activity_rankings[0]->REAL_PDGSAYUR) ? $activity_rankings[0]->REAL_PDGSAYUR : "-";
            $temp['VSTARGET_PDGSAYUR']  = $temp['REAL_PDGSAYUR'] != "-" && $temp['TARGET_PDGSAYUR'] != "-" ? ($temp['REAL_PDGSAYUR'] / $temp['TARGET_PDGSAYUR']) * 100 : "-";
            $temp['TARGET_RETAIL']      = !empty($activity_rankings[0]->TARGET_RETAIL) ? $activity_rankings[0]->TARGET_RETAIL : "-";
            $temp['REAL_RETAIL']        = !empty($activity_rankings[0]->REAL_RETAIL) ? $activity_rankings[0]->REAL_RETAIL : "-";
            $temp['VSTARGET_RETAIL']    = $temp['REAL_RETAIL'] != "-" && $temp['TARGET_RETAIL'] != "-" ? ($temp['REAL_RETAIL'] / $temp['TARGET_RETAIL']) * 100 : "-";

            $weightActCat = ActivityCategory::where('deleted_at', NULL)->get()->toArray();
            $avgCount = 0;
            if ($weightActCat[0]["PERCENTAGE_AC"] != 0) $avgCount++;
            if ($weightActCat[1]["PERCENTAGE_AC"] != 0) $avgCount++;
            if ($weightActCat[2]["PERCENTAGE_AC"] != 0) $avgCount++;

            $temp['AVERAGE'] = (((float)$temp['VSTARGET_UB'] / 100) * ((float)$weightActCat[0]["PERCENTAGE_AC"] / 100));
            $temp['AVERAGE'] += (((float)$temp['VSTARGET_PDGSAYUR'] / 100) * ((float)$weightActCat[1]["PERCENTAGE_AC"] / 100));
            $temp['AVERAGE'] += (((float)$temp['VSTARGET_RETAIL'] / 100) * ((float)$weightActCat[2]["PERCENTAGE_AC"] / 100));
            $temp['AVERAGE'] = $temp['AVERAGE'] / $avgCount;

            $data[] = $temp;
        }
        usort($data, function($a, $b){
            return strnatcmp($b['AVERAGE'], $a['AVERAGE']);
        });
        foreach($data as $key => $value){
            $data[$key]['ID_USER_RANKSALE'] = $key+1;
        }
        return $data;
    }

    public function AktivitasRPOLapul()
    {
        $month = date('n');
        $data = array();
        $user_regionals = DB::select("
        SELECT
        (
            SELECT
                u.NAME_USER
            FROM
                `user` u
            WHERE
                u.ID_ROLE = 4 
                AND u.ID_REGIONAL = mr.ID_REGIONAL
                LIMIT 1
        ) AS NAME_USER,
        mr.NAME_REGIONAL,
        mr.ID_REGIONAL
        FROM
            md_regional mr,
            md_location ml
        WHERE
            ml.ISINSIDE_LOCATION = 0
            AND mr.ID_LOCATION = ml.ID_LOCATION           
        ");

        foreach ($user_regionals as $user_regional) {
            $activity_rankings = DB::select("
            SELECT 
            (
                SELECT
                    QUANTITY
                    FROM
                    target_activity ta
                    WHERE
                        ID_ACTIVITY = 1
                        AND ID_REGIONAL = usa.ID_REGIONAL
            ) AS TARGET_UB, 
            SUM(usa.REAL_UB) AS REAL_UB, 
            usa.VSTARGET_UB, 
            (
                SELECT
                    QUANTITY
                    FROM
                    target_activity ta
                    WHERE
                        ID_ACTIVITY = 2
                        AND ID_REGIONAL = usa.ID_REGIONAL
            ) AS TARGET_PDGSAYUR, 
            SUM(usa.REAL_PDGSAYUR) AS REAL_PDGSAYUR, 
            usa.VSTARGET_PDGSAYUR, 
            (
                SELECT
                    QUANTITY
                    FROM
                    target_activity ta
                    WHERE
                        ID_ACTIVITY = 3
                        AND ID_REGIONAL = usa.ID_REGIONAL
            ) AS TARGET_RETAIL, 
            SUM(usa.REAL_RETAIL) AS REAL_RETAIL, 
            usa.VSTARGET_RETAIL, 
            usa.AVERAGE, 
            usa.ID_USER_RANKACTIVITY
            FROM
                user_ranking_activity AS usa,
                md_regional AS mr
            WHERE
                usa.ID_REGIONAL	= " . $user_regional->ID_REGIONAL . "
                AND usa.ID_REGIONAL = mr.ID_REGIONAL
                AND MONTH(DATE(usa.created_at)) = " . $month . "
            GROUP BY
                usa.ID_REGIONAL
            ");

            $temp['NAME_USER']          = $user_regional->NAME_USER;
            $temp['NAME_AREA']          = $user_regional->NAME_REGIONAL;
            $temp['TARGET_UB']          = !empty($activity_rankings[0]->TARGET_UB) ? $activity_rankings[0]->TARGET_UB : "-";
            $temp['REAL_UB']            = !empty($activity_rankings[0]->REAL_UB) ? $activity_rankings[0]->REAL_UB : "-";
            $temp['VSTARGET_UB']        = $temp['REAL_UB'] != "-" && $temp['TARGET_UB'] != "-" ? ($temp['REAL_UB'] / $temp['TARGET_UB']) * 100 : "-";
            $temp['TARGET_PDGSAYUR']    = !empty($activity_rankings[0]->TARGET_PDGSAYUR) ? $activity_rankings[0]->TARGET_PDGSAYUR : "-";
            $temp['REAL_PDGSAYUR']      = !empty($activity_rankings[0]->REAL_PDGSAYUR) ? $activity_rankings[0]->REAL_PDGSAYUR : "-";
            $temp['VSTARGET_PDGSAYUR']  = $temp['REAL_PDGSAYUR'] != "-" && $temp['TARGET_PDGSAYUR'] != "-" ? ($temp['REAL_PDGSAYUR'] / $temp['TARGET_PDGSAYUR']) * 100 : "-";
            $temp['TARGET_RETAIL']      = !empty($activity_rankings[0]->TARGET_RETAIL) ? $activity_rankings[0]->TARGET_RETAIL : "-";
            $temp['REAL_RETAIL']        = !empty($activity_rankings[0]->REAL_RETAIL) ? $activity_rankings[0]->REAL_RETAIL : "-";
            $temp['VSTARGET_RETAIL']    = $temp['REAL_RETAIL'] != "-" && $temp['TARGET_RETAIL'] != "-" ? ($temp['REAL_RETAIL'] / $temp['TARGET_RETAIL']) * 100 : "-";

            $weightActCat = ActivityCategory::where('deleted_at', NULL)->get()->toArray();
            $avgCount = 0;
            if ($weightActCat[0]["PERCENTAGE_AC"] != 0) $avgCount++;
            if ($weightActCat[1]["PERCENTAGE_AC"] != 0) $avgCount++;
            if ($weightActCat[2]["PERCENTAGE_AC"] != 0) $avgCount++;

            $temp['AVERAGE'] = (((float)$temp['VSTARGET_UB'] / 100) * ((float)$weightActCat[0]["PERCENTAGE_AC"] / 100));
            $temp['AVERAGE'] += (((float)$temp['VSTARGET_PDGSAYUR'] / 100) * ((float)$weightActCat[1]["PERCENTAGE_AC"] / 100));
            $temp['AVERAGE'] += (((float)$temp['VSTARGET_RETAIL'] / 100) * ((float)$weightActCat[2]["PERCENTAGE_AC"] / 100));
            $temp['AVERAGE'] = $temp['AVERAGE'] / $avgCount;

            $data[] = $temp;
        }
        usort($data, function($a, $b){
            return strnatcmp($b['AVERAGE'], $a['AVERAGE']);
        });
        foreach($data as $key => $value){
            $data[$key]['ID_USER_RANKSALE'] = $key+1;
        }
        return $data;
    }

    public function AktivitasAsmen()
    {
        $month = date('n');
        $user_asmens = DB::select("
        SELECT
            ml.ID_LOCATION,
            ml.NAME_LOCATION,
            (
            SELECT
                        u.NAME_USER
                    FROM
                        `user` u
                    WHERE
                        u.ID_ROLE = 3 
                        AND u.ID_LOCATION = ml.ID_LOCATION
                        LIMIT 1
            ) AS NAME_USER
        FROM
            md_location ml
        ");

        foreach ($user_asmens as $user_asmen) {
            $transAsmen = DB::select("
            SELECT 
            (
                    SELECT
                            QUANTITY
                            FROM
                            target_activity ta
                            WHERE
                                    ID_ACTIVITY = 1
                                    AND ID_REGIONAL = usa.ID_REGIONAL
                                    AND usa.ID_LOCATION = ml.ID_LOCATION
            ) AS TARGET_UB, 
            SUM(usa.REAL_UB) AS REAL_UB, 
            usa.VSTARGET_UB, 
            (
                    SELECT
                            QUANTITY
                            FROM
                            target_activity ta
                            WHERE
                                    ID_ACTIVITY = 2
                                    AND ID_REGIONAL = usa.ID_REGIONAL
                                    AND usa.ID_LOCATION = ml.ID_LOCATION
            ) AS TARGET_PDGSAYUR, 
            SUM(usa.REAL_PDGSAYUR) AS REAL_PDGSAYUR, 
            usa.VSTARGET_PDGSAYUR, 
            (
                    SELECT
                            QUANTITY
                            FROM
                            target_activity ta
                            WHERE
                                    ID_ACTIVITY = 3
                                    AND ID_REGIONAL = usa.ID_REGIONAL
                                    AND usa.ID_LOCATION = ml.ID_LOCATION
            ) AS TARGET_RETAIL, 
            SUM(usa.REAL_RETAIL) AS REAL_RETAIL, 
            usa.VSTARGET_RETAIL, 
            usa.AVERAGE, 
            usa.ID_USER_RANKACTIVITY
            FROM
                    user_ranking_activity AS usa,
                    md_location AS ml
            WHERE
                    usa.ID_LOCATION = " . $user_asmen->ID_LOCATION . "
                    AND usa.ID_LOCATION = ml.ID_LOCATION
                    AND MONTH(DATE(usa.created_at)) = " . $month . "
            GROUP BY
                    usa.ID_LOCATION
            ");

            $temp['NAME_USER']          = $user_asmen->NAME_USER;
            $temp['NAME_AREA']          = $user_asmen->NAME_LOCATION;
            $temp['TARGET_UB']          = !empty($transAsmen[0]->TARGET_UB) ? $transAsmen[0]->TARGET_UB : "-";
            $temp['REAL_UB']            = !empty($transAsmen[0]->REAL_UB) ? $transAsmen[0]->REAL_UB : "-";
            $temp['VSTARGET_UB']        = $temp['REAL_UB'] != "-" && $temp['TARGET_UB'] != "-" ? ($temp['REAL_UB'] / $temp['TARGET_UB']) * 100 : "-";
            $temp['TARGET_PDGSAYUR']    = !empty($transAsmen[0]->TARGET_PDGSAYUR) ? $transAsmen[0]->TARGET_PDGSAYUR : "-";
            $temp['REAL_PDGSAYUR']      = !empty($transAsmen[0]->REAL_PDGSAYUR) ? $transAsmen[0]->REAL_PDGSAYUR : "-";
            $temp['VSTARGET_PDGSAYUR']  = $temp['REAL_PDGSAYUR'] != "-" && $temp['TARGET_PDGSAYUR'] != "-" ? ($temp['REAL_PDGSAYUR'] / $temp['TARGET_PDGSAYUR']) * 100 : "-";
            $temp['TARGET_RETAIL']      = !empty($transAsmen[0]->TARGET_RETAIL) ? $transAsmen[0]->TARGET_RETAIL : "-";
            $temp['REAL_RETAIL']        = !empty($transAsmen[0]->REAL_RETAIL) ? $transAsmen[0]->REAL_RETAIL : "-";
            $temp['VSTARGET_RETAIL']    = $temp['REAL_RETAIL'] != "-" && $temp['TARGET_RETAIL'] != "-" ? ($temp['REAL_RETAIL'] / $temp['TARGET_RETAIL']) * 100 : "-";

            $weightActCat = ActivityCategory::where('deleted_at', NULL)->get()->toArray();
            $avgCount = 0;
            if ($weightActCat[0]["PERCENTAGE_AC"] != 0) $avgCount++;
            if ($weightActCat[1]["PERCENTAGE_AC"] != 0) $avgCount++;
            if ($weightActCat[2]["PERCENTAGE_AC"] != 0) $avgCount++;

            $temp['AVERAGE'] = (((float)$temp['VSTARGET_UB'] / 100) * ((float)$weightActCat[0]["PERCENTAGE_AC"] / 100));
            $temp['AVERAGE'] += (((float)$temp['VSTARGET_PDGSAYUR'] / 100) * ((float)$weightActCat[1]["PERCENTAGE_AC"] / 100));
            $temp['AVERAGE'] += (((float)$temp['VSTARGET_RETAIL'] / 100) * ((float)$weightActCat[2]["PERCENTAGE_AC"] / 100));
            $temp['AVERAGE'] = $temp['AVERAGE'] / $avgCount;

            $data[] = $temp;
        }
        usort($data, function($a, $b){
            return strnatcmp($b['AVERAGE'], $a['AVERAGE']);
        });
        foreach($data as $key => $value){
            $data[$key]['ID_USER_RANKSALE'] = $key+1;
        }
        return $data;
    }

    public function PencapaianAsmen()
    {
        $month = date('n');
        $user_asmens = DB::select("
        SELECT
            ml.ID_LOCATION,
            ml.NAME_LOCATION,
            (
            SELECT
                        u.NAME_USER
                    FROM
                        `user` u
                    WHERE
                        u.ID_ROLE = 3 
                        AND u.ID_LOCATION = ml.ID_LOCATION
                        LIMIT 1
            ) AS NAME_USER
        FROM
            md_location ml
        ");

        foreach ($user_asmens as $user_asmen) {
            $pcpAsmen = DB::select("
            SELECT 
            (
                    SELECT
                            QUANTITY
                            FROM
                            target_sale ts,
                            md_product mp
                            WHERE
                                    mp.ID_PC = 12
                                    AND ts.ID_PRODUCT = mp.ID_PRODUCT
                                    AND ID_REGIONAL = urs.ID_REGIONAL
                                    AND urs.ID_LOCATION = ml.ID_LOCATION
                                    LIMIT 1
            ) AS TARGET_UST, 
            SUM(urs.REAL_UST) AS REAL_UST, 
            urs.VSTARGET_UST, 
            (
                    SELECT
                            QUANTITY
                            FROM
                            target_sale ts,
                            md_product mp
                            WHERE
                                    mp.ID_PC = 2
                                    AND ts.ID_PRODUCT = mp.ID_PRODUCT
                                    AND ID_REGIONAL = urs.ID_REGIONAL
                                    AND urs.ID_LOCATION = ml.ID_LOCATION
                                    LIMIT 1
            ) AS TARGET_NONUST, 
            SUM(urs.REAL_NONUST) AS REAL_NONUST, 
            urs.VSTARGET_NONUST, 
            (
                    SELECT
                            QUANTITY
                            FROM
                            target_sale ts,
                            md_product mp
                            WHERE
                                    mp.ID_PC = 3
                                    AND ts.ID_PRODUCT = mp.ID_PRODUCT
                                    AND ID_REGIONAL = urs.ID_REGIONAL
                                    AND urs.ID_LOCATION = ml.ID_LOCATION
                                    LIMIT 1
            ) AS TARGET_SELERAKU, 
            SUM(urs.REAL_SELERAKU) AS REAL_SELERAKU, 
            urs.VSTARGET_SELERAKU, 
            urs.AVERAGE, 
            urs.ID_USER_RANKSALE
            FROM
                    user_ranking_sale AS urs,
                    md_location AS ml
            WHERE
                    urs.ID_LOCATION = " . $user_asmen->ID_LOCATION . "
                    AND urs.ID_LOCATION = ml.ID_LOCATION
                    AND MONTH(DATE(urs.created_at)) = " . $month . "
            GROUP BY
                    urs.ID_LOCATION
            ");

            $temp['NAME_USER']          = $user_asmen->NAME_USER;
            $temp['NAME_AREA']          = $user_asmen->NAME_LOCATION;
            $temp['TARGET_UST']         = !empty($pcpAsmen[0]->TARGET_UST) ? $pcpAsmen[0]->TARGET_UST : "-";
            $temp['REAL_UST']           = !empty($pcpAsmen[0]->REAL_UST) ? $pcpAsmen[0]->REAL_UST : "-";
            $temp['VSTARGET_UST']       = $temp['REAL_UST'] != "-" && $temp['TARGET_UST'] != "-" ? ($temp['REAL_UST'] / $temp['TARGET_UST']) * 100 : "-";
            $temp['TARGET_NONUST']      = !empty($pcpAsmen[0]->TARGET_NONUST) ? $pcpAsmen[0]->TARGET_NONUST : "-";
            $temp['REAL_NONUST']        = !empty($pcpAsmen[0]->REAL_NONUST) ? $pcpAsmen[0]->REAL_NONUST : "-";
            $temp['VSTARGET_NONUST']    = $temp['REAL_NONUST'] != "-" && $temp['TARGET_NONUST'] != "-" ? ($temp['REAL_NONUST'] / $temp['TARGET_NONUST']) * 100 : "-";
            $temp['TARGET_SELERAKU']    = !empty($pcpAsmen[0]->TARGET_SELERAKU) ? $pcpAsmen[0]->TARGET_SELERAKU : "-";
            $temp['REAL_SELERAKU']      = !empty($pcpAsmen[0]->REAL_SELERAKU) ? $pcpAsmen[0]->REAL_SELERAKU : "-";
            $temp['VSTARGET_SELERAKU']  = $temp['REAL_SELERAKU'] != "-" && $temp['TARGET_SELERAKU'] != "-" ? ($temp['REAL_SELERAKU'] / $temp['TARGET_SELERAKU']) * 100 : "-";

            $weightProdCat = CategoryProduct::where('deleted_at', NULL)->get()->toArray();
            $avgCount = 0;
            if ($weightProdCat[0]["PERCENTAGE_PC"] != 0) $avgCount++;
            if ($weightProdCat[1]["PERCENTAGE_PC"] != 0) $avgCount++;
            if ($weightProdCat[2]["PERCENTAGE_PC"] != 0) $avgCount++;

            $temp['AVERAGE'] = (((float)$temp['VSTARGET_UST'] / 100) * ((float)$weightProdCat[0]["PERCENTAGE_PC"] / 100));
            $temp['AVERAGE'] += (((float)$temp['VSTARGET_NONUST'] / 100) * ((float)$weightProdCat[1]["PERCENTAGE_PC"] / 100));
            $temp['AVERAGE'] += (((float)$temp['VSTARGET_SELERAKU'] / 100) * ((float)$weightProdCat[2]["PERCENTAGE_PC"] / 100));
            $temp['AVERAGE'] = $temp['AVERAGE'] / $avgCount;

            $data[] = $temp;
        }
        usort($data, function($a, $b){
            return strnatcmp($b['AVERAGE'], $a['AVERAGE']);
        });
        foreach($data as $key => $value){
            $data[$key]['ID_USER_RANKSALE'] = $key+1;
        }
        return $data;
    }
}
