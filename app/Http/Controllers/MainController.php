<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        return view("welcome");
    }

    public function category()
    {
        return view("product.categories");
    }
}
