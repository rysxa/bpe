<?php

namespace App\Http\Controllers\Management;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Constant;
use App\Libraries\Role;

class ProductController extends Controller
{
    protected $title;
    public function __construct()
    {
        $this->title = 'Product';
    }
    
    public function index()
    {
        Role::RoleUserActive();
        
        $title = $this->title;
        $data = Products::all();
        return view('management.product.index', compact('data', 'title'));
    }

    public function create()
    {
        Role::RoleUserActive();

        $title = $this->title;
        return view('management.product.create', compact('title'));
    }

    public function store(Request $request)
    {
        Role::RoleUserActive();

        $request->validate([
            'name' => 'required',
            'capital_price' => 'required|integer',
            'deposit_price' => 'required|integer',
            'sales_price' => 'required|integer',
            'icon' => 'required',
            'updated_at' => now()
        ]);

        Products::insert([
            'name' => $request->name,
            'capital_price' => intval($request->capital_price),
            'deposit_price' => intval($request->deposit_price),
            'sales_price' => intval($request->sales_price),
            'icon' => $request->icon,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('management.products.index')->with('success', $this->title . ' created successfully.');
    }

    public function show()
    {
        Role::RoleUserActive();

        $title = $this->title;
        $stock = Products::find(request()->product);
        return view('management.product.show', compact('stock', 'title'));
    }

    public function edit()
    {
        Role::RoleSuperAdmin();

        $title = $this->title;
        $stock = Products::find(request()->product);
        return view('management.product.edit', compact('stock', 'title'));
    }

    public function update(Request $request)
    {
        Role::RoleSuperAdmin();

        $request->validate([
            'name' => 'required',
            'capital_price' => 'required|integer',
            'deposit_price' => 'required|integer',
            'sales_price' => 'required|integer',
            'icon' => 'required',
            'updated_at' => now()
        ]);

        $stock = Products::findOrFail(request()->product);

        $stock->update([
            'name' => $request->name,
            'capital_price' => intval($request->capital_price),
            'deposit_price' => intval($request->deposit_price),
            'sales_price' => intval($request->sales_price),
            'icon' => $request->icon,
            'updated_at' => now(),
        ]);
        return redirect()->route('management.products.index')->with('success', $this->title . ' updated successfully.');
    }

    public function destroy()
    {
        Role::RoleSuperAdmin();
        
        $stock = Products::find(request()->product);
        if (!$stock) {
            abort(404);
        }

        $stock->delete();
        return redirect()->route('management.products.index')->with('success', $this->title . ' deleted successfully.');
    }
}
