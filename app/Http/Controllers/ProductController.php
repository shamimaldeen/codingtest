<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ProductVariantPrice;
use App\Models\Variant;
use Illuminate\Http\Request;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
         //$data = Product::paginate(10);

         $data  = Product::with(['product_variant_prices'])
         ->orderBy('id','desc')->paginate(5);

        return view('products.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $variants = Variant::all();
        return view('products.create', compact('variants'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {

        
     $data = array();
     $data['title']=$request->title;
     $data['sku']=$request->sku;
     $data['description']=$request->description;
     $product = DB::table('products')->insert($data);
     


     $data['variant'] = $request->product_variant;
     $data['variant_id '] = $product_variant->id;
     $data['product_id '] = $product->id;
     $product_variants = DB::table('product_variants')->insert($data);


     $data['product_variant_prices'] = $request->product_variant_prices;
     $data['product_variant_one'] = $request->product_variant_one;
     $data['product_variant_two'] = $request->product_variant_two;
     $data['product_variant_three'] = $request->product_variant_three;
     $data['price'] = $request->price;
     $data['stock'] = $request->stock;
     $data['product_id'] = $product->id;
     $product_variant_prices = DB::table(' product_variant_prices')->insert($data);
     

       return redirect('/product')->with('success', 'Product Inserted');
 }


    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show($product)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->fill($request->all());
        $product->save();
    
        return redirect('/product')->with('success', 'Product Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
