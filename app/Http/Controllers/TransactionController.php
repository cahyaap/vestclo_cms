<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\StatusTransaction;
use App\Models\Shirt;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $page = "stock";
        $transactions = Transaction::with(['status', 'shirt.category', 'shirt.size.size', 'shirt.color', 'shirt.type'])->orderBy('updated_at', 'desc')->get();
        $shirts = Shirt::with(['category', 'type', 'size.size', 'color'])->orderBy('category_id', 'desc')->orderBy('type_id', 'asc')->orderBy('category_size_id', 'asc')->get();
        $status_transactions = StatusTransaction::orderBy('name', 'asc')->get();
        return view('transaction.list', compact(['page', 'transactions', 'shirts', 'status_transactions']));
    }

    public function createTransaction(Request $request)
    {
        $shirt_id = $request->input("shirt");
        $name = $request->input("name");
        if ($request->input("transaction_type") === "1") {
            $name = Auth::user()->name;
        }
        if ($request->input("transaction_type") === "2") {
            $shirt = Shirt::find($shirt_id);
            $shirt_check = Transaction::where('shirt_id', $request->input('shirt'))->where('status_transaction_id', 1)->get();
            if (count($shirt_check) === 0) {
                $shirts = Shirt::with(['transactions'])->where('category_id', $shirt->category_id)->where('type_id', $shirt->type_id)->where('category_size_id', $shirt->category_size_id)->where('color_id', $shirt->color_id)->orderBy('created_at', 'desc')->skip(1)->take(1)->get();
                $shirt_id = $shirts[0]->id;
            }
        }
        Transaction::create([
            "name" => $name,
            "mobile" => $request->input("mobile"),
            "shirt_id" => $shirt_id,
            "quantity" => $request->input("quantity"),
            "status_transaction_id" => $request->input("transaction_type"),
        ]);

        return redirect()->route('stock');
    }

    public function updateTransaction(Request $request)
    {
        $name = $request->input("name");
        if ($request->input("transaction_type") === "1") {
            $name = Auth::user()->name;
        }
        $transaction = Transaction::find($request->input('transaction_id'));
        $transaction->name = $name;
        $transaction->mobile = $request->input('mobile');
        $transaction->shirt_id = $request->input('shirt');
        $transaction->quantity = $request->input('quantity');
        $transaction->status_transaction_id = $request->input('transaction_type');
        $transaction->save();
        return redirect()->route('transaction');
    }

    public function deleteTransaction(Request $request)
    {
        $transaction = Transaction::find($request->input('transaction_id'));
        $transaction->delete();
        return redirect()->route('transaction');
    }
}
