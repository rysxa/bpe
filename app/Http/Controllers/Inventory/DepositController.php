<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Deposits;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function index()
    {
        $stocks = Deposits::all();
        return view('inventory.deposit.index', compact('stocks'));
    }

    public function create()
    {
        return view('inventory.deposit.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'qty' => 'required|integer',
            'price' => 'required|numeric'
        ]);

        Deposits::insert([
            'name' => $request->name,
            'qty' => intval($request->qty),
            'price' => intval($request->price)
        ]);
        return redirect()->route('inventory.deposits.index')->with('success', 'Stock created successfully.');
    }

    public function show(Deposits $stock)
    {
        return view('inventory.deposit.show', compact('stock'));
    }

    public function edit(Deposits $stock)
    {
        return view('inventory.deposit.edit', compact('stock'));
    }

    public function update(Request $request, Deposits $stock)
    {
        $request->validate([
            'name' => 'required',
            'qty' => 'required|integer',
            'price' => 'required|numeric'
        ]);

        $stock->update($request->all());
        return redirect()->route('inventory.deposits.index')->with('success', 'Stock updated successfully.');
    }

    public function destroy(Deposits $stock)
    {
        $stock->delete();
        return redirect()->route('inventory.deposits.index')->with('success', 'Stock deleted successfully.');
    }
}
