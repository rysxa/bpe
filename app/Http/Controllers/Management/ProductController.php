<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $title;
    public function __construct()
    {
        $this->title = 'Product';
    }

    public function index()
    {
        $title = $this->title;
        $data = Products::all();
        return view('management.product.index', compact('data', 'title'));
    }

    public function create()
    {
        $title = $this->title;
        return view('management.product.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'qty' => 'required|integer',
            'price' => 'required|numeric'
        ]);

        Products::insert([
            'name' => $request->name,
            'qty' => intval($request->qty),
            'price' => intval($request->price),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('management.products.index')->with('success', $this->title . ' created successfully.');
    }

    public function show()
    {
        $title = $this->title;
        $stock = Products::find(request()->withdraw);
        return view('management.product.show', compact('stock', 'title'));
    }

    public function edit()
    {
        $title = $this->title;
        $stock = Products::find(request()->withdraw);
        return view('management.product.edit', compact('stock', 'title'));
    }

    public function update(Request $request, Products $stock)
    {
        $request->validate([
            'name' => 'required',
            'qty' => 'required|integer',
            'price' => 'required|numeric',
            'updated_at' => now()
        ]);

        $stock->update($request->all());
        return redirect()->route('management.products.index')->with('success', $this->title . ' updated successfully.');
    }

    public function destroy(Products $stock)
    {
        $stock->delete();
        return redirect()->route('management.products.index')->with('success', $this->title . ' deleted successfully.');
    }
}
