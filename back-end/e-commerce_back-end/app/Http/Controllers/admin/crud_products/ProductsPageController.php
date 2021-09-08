<?php

namespace App\Http\Controllers\admin\crud_products;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsPageController extends Controller
{
    public function home() {
        $products = Products::all();
        return view('crud-products', ['products' => $products]);
    }

    public function product( int $id ) {
        $product = Products::where('id', $id)->first();
        $response = [
            'product' => $product,
            'status' => true
        ];

        return response($response, 200);
    }

    // post
    public function store( Request $request ) {
        $product = $request->validate([
            'name' => 'required|string|min: 4|max: 255|unique:products,name',
            'category' => 'in:smartphone,PC,peripherals',
            'price' => 'required|between:0,99.99'
        ]);

        Products::create($product);

        return redirect()->back();
    }

    // put
    public function change( int $id, Request $request ) {
        $product = $request->validate([
            'name' => 'required|string|min: 4|max: 255|unique:products,name',
            'category' => 'in:smartphone,PC,peripherals',
            'price' => 'required'
        ]);

        Products::where('id', $id)->update($product);
    }

    // delete
    public function destroy( int $id ) {
        $nameProduct = Products::where('id', $id)->first()->get('name');
        Products::where('id', $id)->first()->delete();

        return redirect()->back()->with("Product {$nameProduct} deleted!");
    }
}
