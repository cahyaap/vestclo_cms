<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Shirt;

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
        $page = 'home';
        $stocks = Transaction::with(['shirt', 'shirt.category', 'shirt.type', 'shirt.size.size', 'shirt.color'])->selectRaw('shirt_id, status_transaction_id, sum(quantity) as quantity')->groupBy('shirt_id', 'status_transaction_id')->get();
        $stock_exist = [];
        $cash_flow = [
            "spending" => 0, "income" => 0
        ];
        foreach ($stocks as $stock) {
            $key = $stock['shirt']['category']->id."-".$stock['shirt']['type']->id."-".$stock['shirt']['size']['size']->id."-".$stock['shirt']['color']->id;
            if (empty($stock_exist[$key][$stock->status_transaction_id])) {
                $stock_exist[$key][$stock->status_transaction_id] = 0;
            }
            $stock_exist[$key][$stock->status_transaction_id] = $stock_exist[$key][$stock->status_transaction_id] + $stock->quantity;
            if ($stock->status_transaction_id === 1){
                $cash_flow["spending"] = $cash_flow["spending"] + ($stock['shirt']->fund * $stock->quantity);
            } else {
                $cash_flow["income"] = $cash_flow["income"] + ($stock['shirt']->price * $stock->quantity);
            }
        }
        $shirts = Shirt::with(['category', 'type', 'size.size', 'color'])->whereRaw('id IN (select MAX(id) FROM shirts GROUP BY color_id, category_id, type_id, category_size_id)')->orderBy('id', 'desc')->get();

        return view('home', compact(['page', 'stocks', 'shirts', 'stock_exist', 'cash_flow']));
    }
}
