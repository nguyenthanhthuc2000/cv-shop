<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function listProduct($catID){
        return view('shop.page.product.list');
    }
}
