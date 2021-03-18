<?php

namespace App\Http\Controllers;

use App\Filters\ProductFilter;
use App\Filters\ProductFilters;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(ProductFilter $request){
        $products = Product::filter($request)->paginate(9);
        $categories = Category::all();

        return view('products',compact(['products', 'categories']));
    }
}
