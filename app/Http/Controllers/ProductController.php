<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\Product;
use DB;
use Illuminate\Support\Arr;

use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Catagory\CatagoryRepositoryInterface;

class ProductController extends Controller
{   
    protected $productRepo;
    protected $catagoryRepo;

    public function __construct(ProductRepositoryInterface $productRepo, CatagoryRepositoryInterface $catagoryRepo)
    {
        $this->productRepo = $productRepo;
        $this->catagoryRepo = $catagoryRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->productRepo->getAllProduct();
        return view('component.showListProduct')->with(['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $catagories = $this->catagoryRepo->getAll();
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
        //$data = $request->only('name', 'price', 'desc');
        // $file = $request->image_link;
        // $link = $file->getClientOriginalName();
        // $data = Arr::add(['name'=>$request->name,'image_link'=> $link, 'price' => $request->price,], 'desc',$request->desc);

        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->desc = $request->desc;
        $product->catalogID = $request->catalogID;
        $file = $request->image_link;
        $product->image_link = $file->getClientOriginalName();
        $file->move('images',$product->image_link);
        $product->save();
        // $this->productRepo->create($data);
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
        $product = $this->productRepo->find($id);
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
        $product = $this->productRepo->find($id);
        $catagories = $this->catagoryRepo->getAll();
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
        // Product::destroy($id);
        $this->productRepo->delete($id);
        return redirect()->route('show-list-product');
    }
}
