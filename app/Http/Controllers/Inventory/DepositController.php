<?php

namespace App\Http\Controllers\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Products;
use App\Models\Deposits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Libraries\Role;

class DepositController extends Controller
{
    protected $title;
    public function __construct()
    {
       
        $this->title = 'Deposit';
        // $this->middleware(function ($request, $next) {
        //     if (!session()->has('user') || !session()->get('user')->hasRole(['Doctor', 'owner', 'manager'])) {
        //         return redirect('/')->with('error', 'You do not have permission to access this page.');
        //     }
        //     return $next($request);
        // });
        // if (!Auth::user()->hasRole([Constant::RoleAdmin, Constant::RoleOwner, Constant::RoleManager])) {
        //     abort(403);
        // }
    }

    public function index()
    {
        Role::RoleUserActive();

        $title = $this->title;
        $stocks = Deposits::all();
        return view('inventory.deposit.index', compact('stocks', 'title'));
    }

    public function create()
    {
        Role::RoleUserActive();

        $title = $this->title;
        $product = Products::all();
        return view('inventory.deposit.create', compact('title', 'product'));
    }

    public function store(Request $request)
    {
        // dd($request);
        Role::RoleUserActive();

        $request->validate([
            'qty' => 'required|integer'
        ]);

        Deposits::insert([
            'user_id' => Auth::id(),
            'product_id' => intval($request->product),
            'qty' => intval($request->qty),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('inventory.deposits.index')->with('success', $this->title . ' created successfully.');
    }

    public function show()
    {
        Role::RoleUserActive();

        $title = $this->title;
        $stock = Deposits::find(request()->deposit);
        return view('inventory.deposit.show', compact('stock', 'title'));
    }

    public function edit()
    {
        Role::RoleSuperAdmin();

        $title = $this->title;
        $product = Products::all();
        $stock = Deposits::find(request()->deposit);
        return view('inventory.deposit.edit', compact('stock', 'title', 'product'));
    }

    public function update(Request $request)
    {
        Role::RoleSuperAdmin();

        $request->validate([
            'qty' => 'required|integer',
            'product' => 'required|exists:products,id'
        ]);

        $stock = Deposits::findOrFail(request()->deposit);

        $stock->update([
            'user_id' => Auth::id(),
            'product_id' => $request->product,
            'qty' => intval($request->qty),
            'updated_at' => now(),
        ]);
        return redirect()->route('inventory.deposits.index')->with('success', $this->title . ' updated successfully.');
    }

    public function destroy(    )
    {
        Role::RoleSuperAdmin();

        $stock = Deposits::find(request()->deposit);
        if (!$stock) {
            abort(404);
        }
        $stock->delete();
        return redirect()->route('inventory.deposits.index')->with('success', $this->title . ' deleted successfully.');
    }
}
