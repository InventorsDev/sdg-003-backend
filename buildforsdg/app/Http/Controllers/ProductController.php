<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Categories;
use App\Models\Product;
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
        return new ProductResource(Product::all());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::create([
            
            'product_name' => $request->product_name,
            'price' => $request->price,
            'category_id' => $request->category_id,
          ]);
    
          return new ProductResource($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
    //     // check if currently authenticated user is the owner of the book
    //   if ($request->user()->id !== $book->user_id) {
    //     return response()->json(['error' => 'You can only edit your own books.'], 403);
    //   }

      $product->update($request->only(['product_name', 'price', 'category_id']));

      return new ProductResource($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json(null, 204);
    }
    public function product($id){
        $category= Product::where('category_id',$id)->get();
        return response()->json($category, 201);

    }
}
