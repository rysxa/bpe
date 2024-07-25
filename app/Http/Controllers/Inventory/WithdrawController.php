<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Withdraws;
use Illuminate\Http\Request;

class WithdrawController extends Controller
{
    public function index()
    {
        $stocks = Withdraws::all();
        return view('inventory.withdraw.index', compact('stocks'));
    }

    public function create()
    {
        return view('inventory.withdraw.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'qty' => 'required|integer',
            'price' => 'required|numeric'
        ]);

        Withdraws::insert([
            'name' => $request->name,
            'qty' => intval($request->qty),
            'price' => intval($request->price),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('inventory.withdraws.index')->with('success', 'Withdraw created successfully.');
    }

    public function show()
    {
        $stock = Withdraws::find(request()->withdraw);
        return view('inventory.withdraw.show', compact('stock'));
    }

    public function edit()
    {
        $stock = Withdraws::find(request()->withdraw);
        return view('inventory.withdraw.edit', compact('stock'));
    }

    public function update(Request $request, Withdraws $stock)
    {
        $request->validate([
            'name' => 'required',
            'qty' => 'required|integer',
            'price' => 'required|numeric',
            'updated_at' => now()
        ]);

        $stock->update($request->all());
        return redirect()->route('inventory.withdraws.index')->with('success', 'Withdraw updated successfully.');
    }

    public function destroy(Withdraws $stock)
    {
        $stock->delete();
        return redirect()->route('inventory.withdraws.index')->with('success', 'Withdraw deleted successfully.');
    }
}
