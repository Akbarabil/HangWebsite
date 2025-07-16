<?php

namespace App\Http\Controllers;

use App\ActivityCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ActivityCategoryController extends Controller
{
    public function index()
    {
        $data['title']              = "Aktivitas Kategori";
        $data['sidebar']            = "master";
        $data['sidebar2']           = "activity-category";
        $data['activity_category']  = ActivityCategory::all();

        return view('master.activity_category.activity_category', $data);
    }

    public function update(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'status'                => 'required',
        ], [
            'required' => 'Data tidak boleh kosong!',
        ]);

        if ($validator->fails()) {
            return redirect('master/activity-category')->withErrors($validator);
        }

        $category_activity                  = ActivityCategory::find($req->input('id'));
        $category_activity->NAME_AC         = $req->input('category_activity');
        $category_activity->deleted_at      = $req->input('status') == '1' ? NULL : date('Y-m-d H:i:s');
        try {
            $category_activity->save();
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == '1062') {
                return redirect('master/activity-category')->with('err_msg', 'Kategori Aktivitas tidak boleh sama!');
            }
        }
        return redirect('master/activity-category')->with('succ_msg', 'Berhasil mengubah data kategori aktivitas!');
    }
}
