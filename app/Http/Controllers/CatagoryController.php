<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

use App\Repositories\Catagory\CatagoryRepositoryInterface;

class CatagoryController extends Controller
{
    protected $catagory;

    public function __construct(CatagoryRepositoryInterface $catagory)
    {
        $this->catagory = $catagory;
    }
    //
    // show list catagories
    public function showListCatagory(){
        $catagories = Catagory::paginate(4);
        return view('component.showListCatagory')->with(['catagories' => $catagories]);
    }
    // show form update catagory
    public function showFormUpdateCatagory($id){
        $catagory = Catagory::find($id);
        return view('component.updateCatagory')->with(['catagory' => $catagory]);
    }
    // update catagory
    public function updateCatagory($id, Request $request){
        $catagory = Catagory::find($id);
        $catagory->name = $request->name;
        $catagory->save();
        return redirect()->route('show-list-catagory');
    }
    //delete catagory
    public function deletaCatagory($id){
        // Catagory::destroy($id);
        $this->catagory->delete($id);
        return redirect()->route('show-list-catagory');
    }
    // show form add catagory
    public function showAddCatagory(){
        return view('component.creatCatagory');
    }
    // create Catagory
    public function creatCatagory(Request $request){
        $catagory = new Catagory();
        // kiểm tra xem đã tồn tại danh mục muốn tạo hay chưa?
        $catagory->name = $request->name;
        $validated = $request->validate([
            'name' => 'required|unique:catagories|max:255',
        ],[
            'name.required' => 'Không được để trống tên DANH MỤC',
            'name.unique' => 'Tên DANH MỤC này đã tồn tại',
        ]);
        $catagory->save();
        return redirect()->route('show-list-catagory');
    }
    // show catagory's detail
    public function showDetailCatagory($id){
        $products = Product::where('catalogID', $id)->select('products.*')->paginate(5);
        $catagory = Catagory::find($id);
        return view('component.showDetailCatagory')->with(['products'=>$products,'catagory'=>$catagory]);
    }
}
