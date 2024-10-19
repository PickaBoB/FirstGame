<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Category $category)
    {
        return view("admin.product.create", compact("category"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request, Category $category)
    {
        $data = $request->validated();
        $path = $request->image->store("public");
        $data["image"] = explode("/", $path)[1];
        $category->products()->create($data);
        return redirect()->route("admin.category.show", $category);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view("admin.product.show", compact("product"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view("admin.product.update", compact("product"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $data = $request->validated();
        if ($request->hasFile("image")) {
            $path = $request->image->store("public");
            $data["image"] = explode("/", $path)[1];
        }
        $product->update($data);
        return redirect()->route("admin.category.show", $product->category_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}
