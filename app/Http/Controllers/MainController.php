<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view("welcome");
    }

    public function category()
    {
        $categories = Category::all();
        return view("product.categories",["categories"=>$categories]);
    }

    public function basket(Request $request)
    {
        $products = Product::query()->whereIn('id', array_keys($request->products))->get();
        return $products;
    }
}
