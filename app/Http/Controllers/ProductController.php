<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    /**
     * Get all products
     * 
     * @return object Products
     * 
     */
    public function getProducts(Request $request){
        $paginate = $request->paginate ?  $request->paginate : 5;
        return Product::paginate($paginate);
    }

    /**
     * Get specific product
     * 
     * @return object Products
     * 
     */
    public function getProduct(Request $request,$id){
        Cache::put('product',$id);
        return Product::find($id);
    }

    /**
     * Get cached product
     * 
     * @return object Products
     * 
     */
    public function getCachedProduct(Request $request){
        $ret = "";
        if (Cache::has('product')) {
            $ret =  Cache::get('product');
        }
        return $ret;
    }

    /**
     * Create product
     * 
     * @return string success
     * 
     */
    public function addProduct(Request $request){
 
        //Create mew product
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();

        return response('success',200);

    }

    /**
     * Delete product
     * 
     * @return string success
     * 
     */
    public function deleteProduct(Request $request,$id){

        //Create mew product
        $product = Product::find($id);
        $product->delete();

        return response('success',200);

    }
}
