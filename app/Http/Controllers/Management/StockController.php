<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Stocks;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index()
    {
        $stocks = Stocks::all();
        return view('management.stocks.index', compact('stocks'));
    }

    public function create()
    {
        return view('management.stocks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|numeric'
        ]);

        Stocks::create($request->all());
        return redirect()->route('management.stocks.index')->with('success', 'Stock created successfully.');
    }

    public function show(Stocks $stock)
    {
        return view('management.stocks.show', compact('stock'));
    }

    public function edit(Stocks $stock)
    {
        return view('management.stocks.edit', compact('stock'));
    }

    public function update(Request $request, Stocks $stock)
    {
        $request->validate([
            'name' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|numeric'
        ]);

        $stock->update($request->all());
        return redirect()->route('management.stocks.index')->with('success', 'Stock updated successfully.');
    }

    public function destroy(Stocks $stock)
    {
        $stock->delete();
        return redirect()->route('management.stocks.index')->with('success', 'Stock deleted successfully.');
    }
}
