<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Deposits;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    protected $title;
    public function __construct()
    {
        $this->title = 'Deposit';
    }

    public function index()
    {
        $title = $this->title;
        $stocks = Deposits::all();
        return view('inventory.deposit.index', compact('stocks', 'title'));
    }

    public function create()
    {
        $title = $this->title;
        return view('inventory.deposit.create', compact('title'));
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
            'price' => intval($request->price),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('inventory.deposits.index')->with('success', 'Deposit created successfully.');
    }

    public function show()
    {
        $title = $this->title;
        $stock = Deposits::find(request()->deposit);
        return view('inventory.deposit.show', compact('stock', 'title'));
    }

    public function edit()
    {
        $title = $this->title;
        $stock = Deposits::find(request()->deposit);
        return view('inventory.deposit.edit', compact('stock', 'title'));
    }

    public function update(Request $request, Deposits $stock)
    {
        $request->validate([
            'name' => 'required',
            'qty' => 'required|integer',
            'price' => 'required|numeric',
            'updated_at' => now()
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
