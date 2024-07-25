<?php

namespace App\Http\Controllers;

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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $depositTotalPrice = Deposits::sum('price');
        // $depositTotalQty = Deposits::sum('qty');
        // $withdrawTotalPrice = Withdraws::sum('price');
        // $withdrawTotalQty = Withdraws::sum('qty');
        // $totalPrice = $depositTotalPrice - $withdrawTotalPrice;
        // $totalQty = $depositTotalQty - $withdrawTotalQty;
        // dd($totalPrice, $totalQty);
        return view('home');
    }
}
