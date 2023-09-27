<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;    // Needed to store data from form
use App\Models\Product;         // Import product model

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        
        return view('products.index', ['products' => $products]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        //dd($request); // Show sent form data on page
        //dd($request->name); // Show only the name

        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2', // Decimal with max 2 numbers after decimal point
            'description' => 'nullable',
        ]);

        $newProduct = Product::create($data); // Will send $data to model and save to database

        return redirect(route('product.index'))->with('success', 'Product created succesfully'); // After saving data to database, redirect user to product.index
    }

    public function edit(Product $product)
    {
        //dd($product);
        return view('products.edit', ['product' => $product]);
    }

    public function update(Product $product, Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2', // Decimal with max 2 numbers after decimal point
            'description' => 'nullable',
        ]);

        $product->update($data); // Update $product with the data from the form

        return redirect(route('product.index'))->with('success', 'Product updated succesfully');
    }

    public function delete(Product $product)
    {
        $product->delete(); // Deletes selected product

        return redirect(route('product.index'))->with('success', 'Product deleted succesfully');
    }
}
