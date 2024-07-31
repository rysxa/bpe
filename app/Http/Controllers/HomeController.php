<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Deposits;
use App\Models\Withdraws;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'check.status']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Products::all();
        $totalQty = [];
        
        foreach ($products as $product) {
            $depositTotalQty = Deposits::where('product_id', $product->id)->sum('qty');
            $withdrawTotalQty = Withdraws::where('product_id', $product->id)->sum('qty');
            $totalQty[$product->name] = [
                $depositTotalQty - $withdrawTotalQty,
                $product->icon
            ];
        }
        
        return view('home', compact('totalQty'));
    }
}
