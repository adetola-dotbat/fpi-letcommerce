<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        $product= Product::all();
        return view('admin.product', compact('product', 'category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        $req->validate([
            'name'=>'required|unique:categories',
            'category_id'=>'required',
            'image'=> 'required',
            'price'=>'required',
        ]);

        $product = new Product();
        $image = $req->image;
        $imagename = time(). '.' .$image->getClientOriginalExtension();
        $req->image->move('book', $imagename);
        $product->image = $imagename;
        $product->name = $req->name;
        $product->category_id = $req->category_id;
        $product->price = $req->price;
        $pro = $product->save();
        // dd($imagename);

    //    $product = Product::create([
    //         'name' => $req->name,
    //         'category_id' => $req->category_id,
    //         'price' => $req->price,
    //         'image' => $imagename,
    //     ]);
        
        if($pro) {
            return back()->with('success', 'Category added successfully');
        }else {
            return back()->with('fail', 'No category added... Please check your input');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}