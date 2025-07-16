<?php

namespace App\Http\Controllers;

use App\TargetUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Input\Input;

class DashboardController extends Controller
{
    public function index(Request $req)
    {
        $data['title']      = "Dashboard";
        $data['sidebar']    = "dashboard";
        $data['location']   = DB::table('md_location')
            ->where('md_location.deleted_at', '=', NULL)
            ->get();
        $id_regional        = $req->session()->get('regional');
        ($req->session()->get('role') == 2) ? $data['area'] = DB::table('md_area')->get() : $data['area'] = DB::table('md_area')->where('md_area.ID_REGIONAL', '=', $id_regional)->get();
        return view('dashboard', $data);
    }
}
