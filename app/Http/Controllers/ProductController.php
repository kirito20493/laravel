<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\Product;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = DB::table('products')
        ->join('catagories','products.catalogID','=','catagories.id')
        ->select('products.*','catagories.name as catalogname')
        ->paginate(5);
        return view('component.showListProduct')->with(['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catagories = Catagory::all();
        return view('component.createProduct')->with(['catagories' => $catagories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // validate
        $validated = $request->validate([
            'name' => 'bail|required|unique:products',
            'price' => 'required',
            'desc' => 'required',
            'image_link' => 'bail|required|image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->desc = $request->desc;
        $product->catalogID = $request->catalogID;
        $file = $request->image_link;
        $product->image_link = $file->getClientOriginalName();
        $file->move('images',$product->image_link);
        $product->save();
        return redirect()->route('show-list-product');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $product = Product::find($id);
        return view('component.detailProduct')->with(['product'=>$product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Product::find($id);
        $catagories  = Catagory::all();
        return view('component.editProduct')->with(['product'=>$product, 'catagories'=>$catagories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'desc' => 'required',
            'image_link' => 'bail|image|mimes:jpeg,png,jpg,gif,svg'
        ]);
        $product = Product::find($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->desc = $request->desc;
        $product->catalogID = $request->catalogID;
        if (isset($request->image_link)) {
            $file = $request->image_link;
            $product->image_link = $file->getClientOriginalName();
            $file->move('images',$product->image_link);
        } else {
            $product->image_link = Product::find($id)->image_link;
        }
        $product->save();
        return redirect()->route('show-list-product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Product::destroy($id);
        return redirect()->route('show-list-product');
    }
}
