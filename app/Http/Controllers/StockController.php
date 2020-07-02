<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\StatusTransaction;
use App\Models\Shirt;

class StockController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $page = 'stock';
        $stocks = Transaction::with(['shirt', 'shirt.category', 'shirt.type', 'shirt.size.size', 'shirt.color'])->selectRaw('shirt_id, status_transaction_id, sum(quantity) as quantity')->groupBy('shirt_id', 'status_transaction_id')->get();
        $stock_exist = [];
        foreach ($stocks as $stock) {
            $key = $stock['shirt']['category']->id."-".$stock['shirt']['type']->id."-".$stock['shirt']['size']['size']->id."-".$stock['shirt']['color']->id;
            if (empty($stock_exist[$key][$stock->status_transaction_id])) {
                $stock_exist[$key][$stock->status_transaction_id] = 0;
            }
            $stock_exist[$key][$stock->status_transaction_id] = $stock_exist[$key][$stock->status_transaction_id] + $stock->quantity;
        }
        $shirts = Shirt::with(['category', 'type', 'size.size', 'color'])->whereRaw('id IN (select MAX(id) FROM shirts GROUP BY color_id, category_id, type_id, category_size_id)')->orderBy('category_id', 'desc')->orderBy('type_id', 'asc')->orderBy('category_size_id', 'asc')->get();
        $status_transactions = StatusTransaction::orderBy('name', 'asc')->get();
        return view('stock.list', compact(['page', 'stocks', 'shirts', 'stock_exist', 'status_transactions']));
    }
}
