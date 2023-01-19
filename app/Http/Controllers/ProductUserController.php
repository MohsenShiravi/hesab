<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductUserRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ProductUserController extends Controller
{
    public function index()
    {
        return view('product-users.product-users-index');
    }

    public function create()
    {
        $product_user_ids = Auth::user()->products()->pluck('id');
        $products = Product::query()->whereNotIn('id', $product_user_ids)->whereNotNull('confirmed_at')->get();
        return view('product-users.product-users-create', compact('products'));
    }

    public function store(ProductUserRequest $request)
    {
        foreach ($request->product_ids as $product_id) {
            Auth::user()->products()->attach($product_id);
        }

        return Redirect::route('product-users.index');
    }

    public function show($id)
    {
        //
    }

    public function edit(Product $product_user)
    {
        $data = [
            'product' => Auth::user()->products()->where('id', $product_user->id)->first(),
        ];

        return view('product-users.product-users-edit', $data);
    }

    public function update(ProductUserRequest $request, Product $product_user)
    {
        $products = Auth::user()->products();
        $products->syncWithoutDetaching([$product_user->id => [
            'purchase_price' => $request->purchase_price,
            'sales_price' => $request->sales_price,
            'count_in_package' => $request->count_in_package,
            'minimum_stock' => $request->minimum_stock,
            'description' => $request->description,
        ]]);

        return Redirect::route('product-users.index');
    }

    public function destroy(Product $product_user)
    {
        Auth::user()->products()->detach($product_user->id);
        return Redirect::route('product-users.index');
    }

    public function activate(Product $product_user)
    {
        Auth::user()->products()->syncWithoutDetaching([$product_user->id => ['is_active' => 1]]);

        return Redirect::route('product-users.index');

    }

    public function deactivate(Product $product_user)
    {
        Auth::user()->products()->syncWithoutDetaching([$product_user->id => ['is_active' => 0]]);

        return Redirect::route('product-users.index');
    }
}
