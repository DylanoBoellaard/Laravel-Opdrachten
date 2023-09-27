<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
    public function index()
    {
        $shops = Shop::all();

        return view('shops.index', ['shops' => $shops]);
    }

    public function create()
    {
        return view('shops.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'street' => 'required',
            'city' => 'required',
            'country' => 'required',
        ]);

        $newShop = Shop::create($data);

        return redirect(route('shop.index'))->with('success', 'Shop created succesfully');
    }

    public function edit(Shop $shop)
    {
        return view('shops.edit', ['shop' => $shop]);
    }

    public function update(Shop $shop, Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'street' => 'required',
            'city' => 'required',
            'country' => 'required',
        ]);

        $shop->update($data);

        return redirect(route('shop.index'))->with('success', 'Shop deleted succesfully');
    }

    public function delete(Shop $shop)
    {
        $shop->delete();

        return redirect(route('shop.index'))->with('success', 'Shop deleted succesfully');
    }
}
