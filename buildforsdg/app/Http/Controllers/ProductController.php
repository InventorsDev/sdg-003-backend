<?php

namespace App\Http\Controllers;

use App\Http\Resources\Product\Product as ProductResource;
use App\Http\Resources\Product\ProductCollection;
use App\Models\Category;
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
        return new ProductCollection(Product::all());

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
            
            'product_name' => $request->input('product_name'),
            'price' => $request->input('price'),
            'category_id' => $request->input('category_id'),
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
    public function destroy( $id)
    {
         $product= Product::destroy($id);


        return response()->json(['category'=>'category deleted'], 200);
    }


    //Select products based on a certain categorie
    public function product($cat_id){
        $category= Product::where('category_id',$cat_id)->get();
        return new ProductCollection($category);

    }
}
