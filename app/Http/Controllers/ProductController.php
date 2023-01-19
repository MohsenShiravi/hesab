<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\File;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use PharIo\Manifest\Exception;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole('admin')) {
            $products = Product::query()->orderBy('created_at', 'desc')->get();
        } else {
            $products = Product::query()->where('creator_id', Auth::id())->whereNull('confirmed_at')->get();
        }

        return view('products.products-index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.products-create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        try {
            DB::beginTransaction();
            $product = new Product();
            if (!Auth::user()->hasRole('admin')) {
                $product->creator_id = Auth::id();
            }
            $product->name = $request->name;
            $product->category_id = $request->category_id;
            $product->content = $request->input('content');
            $product->description = $request->description;
            $product->weight = $request->weight;

            if (Auth::user()->hasRole('admin')) {
                $product->confirmed_at = now();
            }

            $product->save();

            if (filled($request->images)) {
                foreach ($request->images as $image) {
                    $public_path = 'public/uploads';
                    uploadFile($product, $image, $public_path);
                }
            }

            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
        }


        return Redirect::route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        if (Auth::user()->hasRole('admin') ||
            ($product->creator_id == Auth::id() and blank($product->confirmed_at))) {
            $data = [
                'categories' => Category::all(),
                'images' => $product->files()->get(),
                'product' => $product,
            ];
            return view('products.products-edit', $data);
        }
        abort(403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Product $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
        if (Auth::user()->hasRole('admin') ||
            ($product->creator_id == Auth::id() and blank($product->confirmed_at))) {
            $product->name = $request->name;
            $product->category_id = $request->category_id;
            $product->content = $request->input('content');
            $product->description = $request->description;
            $product->weight = $request->weight;
            $product->save();

            if (filled($request->images)) {
                foreach ($request->images as $image) {
                    $public_path = 'public/uploads';
                    uploadFile($product, $image, $public_path);
                }
            }

            return Redirect::route('products.index');
        }
        abort(403);
    }

    public function destroy(Product $product)
    {
        if (Auth::user()->hasRole('admin')) {
            if (blank($product->users)) {
                if (filled($product->files())) {
                    $product->files()->delete();
                }
                $product->delete();
                return back();
            }
        } elseif ($product->creator_id == Auth::id() and blank($product->confirmed_at)) {
            if (filled($product->files())) {
                $product->files()->delete();
            }
            $product->delete();
            return back();
        }
        abort(403);
    }

    public function deleteFile(Product $product, File $file)
    {
        if (Auth::user()->hasRole('admin') ||
            ($product->creator_id == Auth::id() and blank($product->confirmed_at))) {
            $product->files()->where('id', $file->id)->delete();
            return back();
        }
        abort(403);
    }

    public function confirm(Product $product)
    {
        if (Auth::user()->hasRole('admin')) {
            $product->confirmed_at = now();
            $product->save();

            $product->users()->attach($product->creator_id);
            return back();
        }

        abort(403);
    }
}
