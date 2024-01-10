<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // get data product
        // $products = \App\Models\Product::paginate(5);
        $products = DB::table('products')
        ->when($request->input('name'), function ($query, $name)  {
            return $query->where('name', 'like', '%'.$name.'%');
        })
        ->orderBy('id', 'desc')
        ->paginate(10);
        return view('pages.product.index', compact('products'));
    }

    public function create() {
        return view('pages.product.create');
    }

    public function store(Request $request) {

        // dd($request->all());

        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        \App\Models\Product::create($data);
        return redirect()->route('product.index')->with('success', 'Product successfully created');
    }

    public function edit($id) {
        $product = \App\Models\Product::findOrFail($id);
        return view('pages.product.edit', compact('product'));
    }

    public function update(Request $request, $id) {

        // dd($request->all());

        $data = $request->all();
        $product =\App\Models\Product::findOrFail($id);
        $product->update($data);
        return redirect()->route('product.index')->with('success', 'Product successfully updated');
    }

    public function destroy($id) {
        $product =\App\Models\Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index')->with('success', 'User successfully deleted');
    }
}
