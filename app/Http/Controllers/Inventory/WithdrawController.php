<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Withdraws;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawController extends Controller
{
    protected $title;
    public function __construct()
    {
        $this->title = 'Withdraw';
    }

    public function index()
    {
        $title = $this->title;
        $stocks = Withdraws::all();
        return view('inventory.withdraw.index', compact('stocks', 'title'));
    }

    public function create()
    {
        $title = $this->title;
        $product = Products::all();
        return view('inventory.withdraw.create', compact('title', 'product'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'qty' => 'required|integer',
        ]);

        Withdraws::insert([
            'product_id' => intval($request->product),
            'user_id' => Auth::id(),
            'qty' => intval($request->qty),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('inventory.withdraws.index')->with('success', $this->title . ' created successfully.');
    }

    public function show()
    {
        $title = $this->title;
        $stock = Withdraws::find(request()->withdraw);
        return view('inventory.withdraw.show', compact('stock', 'title'));
    }

    public function edit()
    {
        $title = $this->title;
        $stock = Withdraws::find(request()->withdraw);
        return view('inventory.withdraw.edit', compact('stock', 'title'));
    }

    public function update(Request $request, Withdraws $stock)
    {
        $request->validate([
            'qty' => 'required|integer'
        ]);

        $withdraw = [
            'product_id' => intval($request->product),
            'user_id' => Auth::id(),
            'qty' => intval($request->qty),
            'created_at' => now(),
            'updated_at' => now(),
        ];

        $stock->update($withdraw);
        return redirect()->route('inventory.withdraws.index')->with('success', $this->title . ' updated successfully.');
    }

    public function destroy(Withdraws $stock)
    {
        $stock->delete();
        return redirect()->route('inventory.withdraws.index')->with('success', $this->title . ' deleted successfully.');
    }
}
