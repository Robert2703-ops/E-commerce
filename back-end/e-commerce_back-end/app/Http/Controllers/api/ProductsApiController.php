<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductsApiController extends Controller
{
    
    public function allProducts () {
        $products = Products::all();
        $response = [
            'products' => $products,
            'status' => true
        ];

        return response($response, 200);
    }

}
