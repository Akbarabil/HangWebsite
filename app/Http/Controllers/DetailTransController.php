<?php

namespace App\Http\Controllers;

use App\CategoryProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class DetailTransController extends Controller
{
    public function DetailSpread(Request $req)
    {
        $data['title']          = "Detail Spreading";
        $data['sidebar']        = "transaksi";
        $data['sidebar2']       = "transaksi";

        $id_user        = $req->input('id_user');
        $date           = $req->input('date');
        $type           = $req->input('type');

        $data['all_sell']       = 0;
        $data['prodCats']       = CategoryProduct::where('deleted_at', null)->get();
        $data['transDetails']   = array();

        // $transaction = DB::table('transaction')
        //     ->select('transaction.ID_TRANS', 'transaction.DATE_TRANS', 'user.ID_USER', 'user.NAME_USER', 'user.ID_AREA', 'md_shop.ID_SHOP', 'md_shop.DETLOC_SHOP', 'md_shop.NAME_SHOP', 'md_shop.LONG_SHOP', 'md_shop.LAT_SHOP', 'md_shop.TYPE_SHOP')
        //     ->leftjoin('user', 'user.ID_USER', '=', 'transaction.ID_USER')
        //     ->leftjoin('md_shop', 'md_shop.ID_SHOP', '=', 'transaction.ID_SHOP')
        //     ->where('transaction.DATE_TRANS', 'like', $date . '%')
        //     ->where('transaction.ID_USER', '=', $id_user)
        //     ->where('transaction.ID_TYPE', '=', $type)
        //     // ->where('transaction.ISTRANS_TRANS', 1)
        //     ->orderBy('transaction.DATE_TRANS', 'DESC')
        //     ->get();

        $transaction = DB::table('transaction')
            ->select(
                DB::raw('
                (
                    SELECT COUNT(transaction.ID_TRANS) 
                    FROM transaction 
                    LEFT JOIN md_shop ms ON ms.ID_SHOP = transaction.ID_SHOP 
                    WHERE transaction.ID_TYPE = "'.$type.'" AND transaction.ID_USER = "'.$id_user.'" AND ms.TYPE_SHOP = "Pedagang Sayur" AND transaction.DATE_TRANS = "'.$date.'"
                ) AS TOT_PS'),
                DB::raw('
                (
                    SELECT COUNT(transaction.ID_TRANS) 
                    FROM transaction 
                    LEFT JOIN md_shop ms ON ms.ID_SHOP = transaction.ID_SHOP 
                    WHERE transaction.ID_TYPE = "'.$type.'" AND transaction.ID_USER = "'.$id_user.'" AND ms.TYPE_SHOP = "Retail" AND transaction.DATE_TRANS = "'.$date.'"
                ) AS TOT_RETAIL'),
                DB::raw('
                (
                    SELECT COUNT(transaction.ID_TRANS) 
                    FROM transaction 
                    LEFT JOIN md_shop ms ON ms.ID_SHOP = transaction.ID_SHOP 
                    WHERE transaction.ID_TYPE = "'.$type.'" AND transaction.ID_USER = "'.$id_user.'" AND ms.TYPE_SHOP = "Loss" AND transaction.DATE_TRANS = "'.$date.'"
                ) AS TOT_LOSS'),
                DB::raw('
                (
                    SELECT COUNT(transaction.ID_TRANS) 
                    FROM transaction 
                    LEFT JOIN md_shop ms ON ms.ID_SHOP = transaction.ID_SHOP 
                    WHERE transaction.ID_TYPE = "'.$type.'" AND transaction.ID_USER = "'.$id_user.'" AND ms.TYPE_SHOP = "Permanen" AND transaction.DATE_TRANS = "'.$date.'"
                ) AS TOT_PERMA'),
                'transaction.ID_TRANS',
                'transaction.DATE_TRANS',
                'user.ID_USER',
                'user.NAME_USER',
                'user.ID_AREA',
                'md_shop.ID_SHOP',
                'md_shop.DETLOC_SHOP',
                'md_shop.NAME_SHOP',
                'md_shop.LONG_SHOP',
                'md_shop.LAT_SHOP',
                'md_shop.TYPE_SHOP'
            )
            ->leftJoin('user', 'user.ID_USER', '=', 'transaction.ID_USER')
            ->leftJoin('md_shop', 'md_shop.ID_SHOP', '=', 'transaction.ID_SHOP')
            ->whereDate('transaction.DATE_TRANS', '=', $date)
            ->where('transaction.ID_USER', '=', $id_user)
            ->where('transaction.ID_TYPE', '=', $type)
            ->orderBy('transaction.DATE_TRANS', 'DESC')
            ->get();

        $area = $transaction[0]->ID_AREA;

        $data_area = DB::table('md_district')
            ->select('md_district.ID_DISTRICT')
            ->leftJoin('md_area', 'md_area.ID_AREA', '=', 'md_district.ID_AREA')
            ->where('md_area.ID_AREA', $area)
            ->get()->pluck('ID_DISTRICT')->toArray();

        $data['transaction'] = array();
        $shop_id_trans = array();
        foreach ($transaction as $Item_ts) {
            $data_ts_detail = array();
            $transaction_detail       = DB::table('transaction_detail')
                ->where('transaction_detail.ID_TRANS', $Item_ts->ID_TRANS)
                ->leftjoin('md_product', 'md_product.ID_PRODUCT', '=', 'transaction_detail.ID_PRODUCT')
                ->leftjoin('transaction_image', 'transaction_image.ID_TRANS', '=', 'transaction_detail.ID_TRANS')
                ->select('transaction_detail.QTY_TD', 'md_product.NAME_PRODUCT', 'md_product.ID_PC', 'transaction_image.PHOTO_TI')
                ->get();

            $TOT_PRODUCT = 0;
            $data_image_trans = array();
            foreach ($transaction_detail as $ts_detail) {
                $TOT_PRODUCT += $ts_detail->QTY_TD;
                array_push(
                    $data_ts_detail,
                    $ts_detail
                );

                if (empty($data['transDetails'][$ts_detail->ID_PC])) $data['transDetails'][$ts_detail->ID_PC] = array();
                if (empty($data['transDetails'][$ts_detail->ID_PC][$ts_detail->NAME_PRODUCT])) $data['transDetails'][$ts_detail->ID_PC][$ts_detail->NAME_PRODUCT] = 0;
                $data['transDetails'][$ts_detail->ID_PC][$ts_detail->NAME_PRODUCT] += $ts_detail->QTY_TD;

                if (!empty($ts_detail->PHOTO_TI)) {
                    $data_image_trans = explode(";", $ts_detail->PHOTO_TI);
                }
            }
            $data['all_sell'] += $TOT_PRODUCT;

            array_push(
                $data['transaction'],
                array(
                    "ID_TRANS" => $Item_ts->ID_TRANS,
                    "ID_SHOP" => $Item_ts->ID_SHOP,
                    "NAME_SHOP" => $Item_ts->NAME_SHOP,
                    "DETLOC_SHOP" => $Item_ts->DETLOC_SHOP,
                    "LAT_TRANS" => $Item_ts->LAT_SHOP,
                    "LONG_TRANS" => $Item_ts->LONG_SHOP,
                    "DATE_TRANS" => $Item_ts->DATE_TRANS,
                    "NAME_USER" => $Item_ts->NAME_USER,
                    "TYPE_SHOP" => $Item_ts->TYPE_SHOP,
                    "TOT_PS" => $Item_ts->TOT_PS,
                    "TOT_RETAIL" => $Item_ts->TOT_RETAIL,
                    "TOT_LOSS" => $Item_ts->TOT_LOSS,
                    "TOT_PERMA" => $Item_ts->TOT_PERMA,
                    "IMAGE" => $data_image_trans,
                    "TOTAL" => $TOT_PRODUCT,
                    "DETAIL" => $data_ts_detail
                )
            );

            if (!in_array($Item_ts->ID_SHOP, $shop_id_trans)) {
                array_push($shop_id_trans, $Item_ts->ID_SHOP);
            }
        }

        $data['shop_trans'] = DB::table('md_shop')
            ->select('md_shop.ID_SHOP', 'md_shop.NAME_SHOP', 'md_shop.LONG_SHOP', 'md_shop.LAT_SHOP', 'transaction.ISTRANS_TRANS')
            ->selectRaw('(SELECT COUNT(t.ID_TRANS) FROM `transaction` t WHERE t.ID_TYPE = 1 AND t.ID_SHOP = `md_shop`.`ID_SHOP` GROUP BY t.ID_SHOP ) as TOT_TRANS, (SELECT SUM(td.QTY_TD) FROM `transaction` t LEFT JOIN transaction_detail td ON td.ID_TRANS = t.ID_TRANS WHERE td.ID_SHOP = `md_shop`.`ID_SHOP` AND t.ID_USER = "' . $id_user . '" GROUP BY t.ID_SHOP) as TOTAL')
            ->leftjoin('transaction', 'transaction.ID_SHOP', '=', 'md_shop.ID_SHOP')
            ->whereIn('md_shop.ID_SHOP', $shop_id_trans)
            ->whereIn('md_shop.ID_DISTRICT', $data_area)
            ->groupBy('md_shop.ID_SHOP')
            ->get();
            

        $data['shop_no_trans'] = DB::table('md_shop')
            ->select('md_shop.ID_SHOP', 'md_shop.NAME_SHOP', 'md_shop.LONG_SHOP', 'md_shop.LAT_SHOP', 'transaction.ISTRANS_TRANS')
            ->selectRaw('(
            SELECT
                COUNT(t.ID_TRANS)
            FROM
                `transaction` t
            WHERE
                t.ID_TYPE = 1
                AND t.ID_SHOP = `md_shop`.`ID_SHOP`
            GROUP BY
                t.ID_SHOP
            ) as TOT_TRANS,
            (transaction.QTY_TRANS) as TOTAL')
            ->leftjoin('transaction', 'transaction.ID_SHOP', '=', 'md_shop.ID_SHOP')
            ->whereIn('md_shop.ID_DISTRICT', $data_area)
            ->where('transaction.DATE_TRANS', '!=', $date)
            // ->where('transaction.ISTRANS_TRANS', 1)
            ->whereNotIn('md_shop.ID_SHOP', $shop_id_trans)
            ->groupBy('md_shop.ID_SHOP')
            ->get();

        $data['shop_no_con2_trans'] = DB::table('md_shop')
            ->select('md_shop.ID_SHOP', 'md_shop.NAME_SHOP', 'md_shop.LONG_SHOP', 'md_shop.LAT_SHOP', 'transaction.ISTRANS_TRANS')
            ->selectRaw('(
                    SELECT
                        COUNT(t.ID_TRANS)
                    FROM
                        `transaction` t
                    WHERE
                        t.ID_TYPE = 1
                        AND t.ID_SHOP = `md_shop`.`ID_SHOP`
                    GROUP BY
                        t.ID_SHOP
                ) as TOT_TRANS,
                (transaction.QTY_TRANS) as TOTAL')
            ->leftjoin('transaction', 'transaction.ID_SHOP', '=', 'md_shop.ID_SHOP')
            ->whereIn('md_shop.ID_DISTRICT', $data_area)
            ->whereDate('transaction.DATE_TRANS', '=', $date)
            ->where('transaction.ISTRANS_TRANS', 0)
            ->whereNotIn('md_shop.ID_SHOP', $shop_id_trans)
            ->groupBy('md_shop.ID_SHOP')
            ->get();

        $data['shop_no_trans2'] = DB::table('transaction')
            ->select('*')
            ->where('transaction.ID_USER', '=', $id_user)
            ->whereDate('transaction.DATE_TRANS', '=', $date)
            ->where('transaction.ISTRANS_TRANS', 0)->get();

        $data['shop_trans2'] = DB::table('transaction')
            ->select('*')
            ->where('transaction.ID_USER', '=', $id_user)
            ->whereDate('transaction.DATE_TRANS', '=', $date)
            ->where('transaction.ISTRANS_TRANS', 1)->get();

        return view('transaction.detail_spread', $data);
    }

    public function DetailUB(Request $req)
    {
        $data['title']          = "Detail UB";
        $data['sidebar']        = "transaksi";
        $data['sidebar2']       = "transaksi";

        $id_user  = $req->input('id_user');
        $date     = $req->input('date');
        $type     = $req->input('type');

        $data['all_sell']       = 0;
        $data['prodCats']       = CategoryProduct::where('deleted_at', null)->get();
        $data['transDetails']   = array();

        $transaction = DB::table('transaction')
            ->select('transaction.*', 'user.ID_USER', 'user.NAME_USER', 'user.ID_AREA')
            ->leftjoin('user', 'user.ID_USER', '=', 'transaction.ID_USER')
            ->whereDate('transaction.DATE_TRANS', '=', $date)
            ->where('transaction.ID_USER', '=', $id_user)
            ->where('transaction.ID_TYPE', '=', $type)
            ->orderBy('transaction.DATE_TRANS', 'DESC')
            ->get();

        $area = $transaction[0]->ID_AREA;

        $data_area = DB::table('md_district')
            ->select('md_district.ID_DISTRICT')
            ->leftJoin('md_area', 'md_area.ID_AREA', '=', 'md_district.ID_AREA')
            ->where('md_area.ID_AREA', $area)
            ->get()->pluck('ID_DISTRICT')->toArray();

        $data['transaction'] = array();
        foreach ($transaction as $Item_ts) {
            $transaction_detail       = DB::table('transaction_detail')
                ->select('transaction_detail.QTY_TD', 'md_product.NAME_PRODUCT', 'md_product.ID_PC')
                ->leftJoin('md_product', 'md_product.ID_PRODUCT', '=', 'transaction_detail.ID_PRODUCT')
                ->whereRaw("transaction_detail.ID_TRANS = '$Item_ts->ID_TRANS'")
                ->get();

            $data_ts_detail = array();
            $TOT_PRODUCT = 0;
            foreach ($transaction_detail as $ts_detail) {
                $TOT_PRODUCT += $ts_detail->QTY_TD;
                array_push(
                    $data_ts_detail,
                    $ts_detail
                );

                if (empty($data['transDetails'][$ts_detail->ID_PC])) $data['transDetails'][$ts_detail->ID_PC] = array();
                if (empty($data['transDetails'][$ts_detail->ID_PC][$ts_detail->NAME_PRODUCT])) $data['transDetails'][$ts_detail->ID_PC][$ts_detail->NAME_PRODUCT] = 0;
                $data['transDetails'][$ts_detail->ID_PC][$ts_detail->NAME_PRODUCT] += $ts_detail->QTY_TD;
            }

            $data['all_sell'] += $TOT_PRODUCT;

            $data_image_trans = array();
            $transaction_image       = DB::table('transaction_image')
                ->where('transaction_image.ID_TRANS', $Item_ts->ID_TRANS)
                ->select('transaction_image.*')
                ->get();

            foreach ($transaction_image as $Image) {
                array_push(
                    $data_image_trans,
                    array(
                        "desc" => explode(";", $Image->DESCRIPTION_TI),
                        "image" => explode(";", $Image->PHOTO_TI)
                    )
                );
            }

            array_push(
                $data['transaction'],
                array(
                    "LOCATION" => $Item_ts->DISTRICT,
                    "LAT_TRANS" => $Item_ts->LAT_TRANS,
                    "LONG_TRANS" => $Item_ts->LONG_TRANS,
                    "DATE_TRANS" => $Item_ts->DATE_TRANS,
                    "NAME_USER" => $Item_ts->NAME_USER,
                    "IMAGE" => $data_image_trans,
                    "TOTAL" => $Item_ts->QTY_TRANS,
                    "DETAIL" => $transaction_detail
                )
            );
        }

        // dd($data['transaction']);
        return view('transaction/detail_ub', $data);
    }

    public function DetailUBLP(Request $req)
    {
        $data['title']          = "Detail UBLP";
        $data['sidebar']        = "transaksi";
        $data['sidebar2']       = "transaksi";

        $id_user  = $req->input('id_user');
        $date     = $req->input('date');
        $type     = $req->input('type');

        $data['all_sell']       = 0;
        $data['prodCats']       = CategoryProduct::where('deleted_at', null)->get();
        $data['transDetails']   = array();

        $transaction = DB::table('transaction')
            ->select('transaction.*', 'user.ID_USER', 'user.NAME_USER')
            ->leftjoin('user', 'user.ID_USER', '=', 'transaction.ID_USER')
            ->whereDate('transaction.DATE_TRANS', '=', $date)
            ->where('transaction.ID_USER', '=', $id_user)
            ->where('transaction.ID_TYPE', '=', $type)
            ->orderBy('transaction.DATE_TRANS', 'DESC')
            ->get();

        $data['transaction'] = array();
        foreach ($transaction as $Item_ts) {
            $transaction_detail       = DB::table('transaction_detail')
                ->select('transaction_detail.QTY_TD', 'md_product.NAME_PRODUCT', 'md_product.ID_PC')
                ->leftJoin('md_product', 'md_product.ID_PRODUCT', '=', 'transaction_detail.ID_PRODUCT')
                ->whereRaw("transaction_detail.ID_TRANS = '$Item_ts->ID_TRANS'")
                ->get();

            $data_ts_detail = array();
            $TOT_PRODUCT = 0;
            foreach ($transaction_detail as $ts_detail) {
                $TOT_PRODUCT += $ts_detail->QTY_TD;
                array_push(
                    $data_ts_detail,
                    $ts_detail
                );

                if (empty($data['transDetails'][$ts_detail->ID_PC])) $data['transDetails'][$ts_detail->ID_PC] = array();
                if (empty($data['transDetails'][$ts_detail->ID_PC][$ts_detail->NAME_PRODUCT])) $data['transDetails'][$ts_detail->ID_PC][$ts_detail->NAME_PRODUCT] = 0;
                $data['transDetails'][$ts_detail->ID_PC][$ts_detail->NAME_PRODUCT] += $ts_detail->QTY_TD;
            }

            $data['all_sell'] += $TOT_PRODUCT;

            $data_image_trans = array();
            $transaction_image       = DB::table('transaction_image')
                ->where('transaction_image.ID_TRANS', $Item_ts->ID_TRANS)
                ->select('transaction_image.*')
                ->get();

            foreach ($transaction_image as $Image) {
                array_push(
                    $data_image_trans,
                    array(
                        "desc" => explode(";", $Image->DESCRIPTION_TI),
                        "image" => explode(";", $Image->PHOTO_TI)
                    )
                );
            }
            array_push(
                $data['transaction'],
                array(
                    "LOCATION" => $Item_ts->DETAIL_LOCATION,
                    "LAT_TRANS" => $Item_ts->LAT_TRANS,
                    "LONG_TRANS" => $Item_ts->LONG_TRANS,
                    "DATE_TRANS" => $Item_ts->DATE_TRANS,
                    "NAME_USER" => $Item_ts->NAME_USER,
                    "IMAGE" => $data_image_trans,
                    "TOTAL" => $Item_ts->QTY_TRANS,
                    "DETAIL" => $transaction_detail
                )
            );
        }

        return view('transaction/detail_ublp', $data);
    }
}
