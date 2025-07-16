<?php

namespace App\Http\Controllers;

use App\CategoryProduct;
use App\Grouping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryProductController extends Controller
{
    public function index(){
        $data['title']      = "Kategori Produk";
        $data['sidebar']    = "master";
        $data['sidebar2']   = "category-product";
        $data['category_product']      = CategoryProduct::all();
        $data['groupings'] = Grouping::all();

        return view('master.product.category_product', $data);
    }

    public function store(Request $req){
        $validator = Validator::make($req->all(), [
            'category_product'      => 'required',
            'status'                => 'required',
            'group_product'         => 'required',
        ], [
            'required' => 'Data tidak boleh kosong!',
        ]);
    
        if($validator->fails()){
            return redirect('master/category-product')->withErrors($validator);
        }
    
        // Check total percentage for the selected group
        
        $category_product = new CategoryProduct();
        $category_product->NAME_PC = $req->input('category_product');
        $category_product->GROUP_PRODUCT = $req->input('group_product');
        $category_product->deleted_at = $req->input('status') == '1' ? NULL : date('Y-m-d H:i:s');
        try {
            $category_product->save();
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            if($errorCode == '1062'){
                return redirect('master/category-product')->with('err_msg', 'Kategori Produk tidak boleh sama!');
            }
        }
        return redirect('master/category-product')->with('succ_msg', 'Berhasil menambah data kategori produk!');
    }

    public function update(Request $req){
        $validator = Validator::make($req->all(), [
            'category_product'      => 'required',
            'status'                => 'required',
            'group_product'         => 'required',
        ], [
            'required' => 'Data tidak boleh kosong!',
        ]);
    
        if($validator->fails()){
            return redirect('master/category-product')->withErrors($validator);
        }
    
        $total = CategoryProduct::where('deleted_at', null)
            ->where('ID_GROUP', $req->input('group_product'))
            ->whereNotIn('ID_PC', [$req->input('id')])
            ->sum('PERCENTAGE_PC');
    
        $total += $req->input('percentage_product');
    
        if ($total > 100) {
            return redirect('master/category-product')->with('err_msg', 'Persentase kategori produk dalam grup melebihi 100%, mohon kurangi persentase saat input!');
        } else {
            $category_product = CategoryProduct::find($req->input('id'));
            $category_product->NAME_PC = $req->input('category_product');
            $category_product->GROUP_PRODUCT = $req->input('group_product');
            $category_product->deleted_at = $req->input('status') == '1' ? NULL : date('Y-m-d H:i:s');
            $category_product->save();
    
            return redirect('master/category-product')->with('succ_msg', 'Berhasil mengubah data kategori produk!');
        }
    }

    public function destroy(Request $req){
        $validator = Validator::make($req->all(), [
            'id'        => 'required',
        ], [
            'required' => 'Data tidak boleh kosong!',
        ]);

        if($validator->fails()){
            return redirect('master/category-product')->withErrors($validator);
        }

        $category_product = CategoryProduct::find($req->input('id'));
        $category_product->delete();

        return redirect('master/category-product')->with('succ_msg', 'Berhasil menghapus data kategori produk!');
    }

    public function search(Request $request) {
        $query = $request->get('term', '');
        $groupings = Grouping::where('NAME_GROUP', 'LIKE', '%'.$query.'%')->get();
    
        return response()->json($groupings);
    }
    
    public function storegroup(Request $request) {
        $group = Grouping::create([
            'NAME_GROUP' => $request->name_group
        ]);
    
        return response()->json($group);
    }

}
