<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Category;
use App\Models\Type;
use App\Models\Color;
use App\Models\CategorySize;
use App\Models\Shirt;

class ShirtController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $page = 'shirt';
        $categories = Category::orderBy('name', 'asc')->get();
        $category_sizes = CategorySize::with(['category', 'size'])->orderBy('id', 'desc')->get();
        $shirts = Shirt::with(['category', 'type', 'color', 'size.size'])->whereRaw('id IN (select MAX(id) FROM shirts GROUP BY category_size_id, color_id)')->orderBy('id', 'desc')->get();
        $types = Type::orderBy('id', 'desc')->get();
        $transactions = Transaction::select('shirt_id')->groupBy('shirt_id')->get();
        $shirt_exist = [];
        foreach($transactions as $transaction)
        {
            if(!in_array($transaction->shirt_id, $shirt_exist))
            {
                array_push($shirt_exist, $transaction->shirt_id);
            }
        }
        return view('shirt.list', compact([
            'page',
            'shirts',
            'categories',
            'category_sizes',
            'types',
            'shirt_exist'
        ]));
    }

    public function getShirtSizeColor($category_id)
    {
        $sizes = CategorySize::with('category', 'size')->where('category_id', $category_id)->orderBy('id', 'desc')->get();
        $colors = Color::where('category_id', $category_id)->orderBy('name', 'asc')->get();
        return response()->json([
            'sizes' => $sizes,
            'colors' => $colors
        ]);
    }

    public function createShirt(Request $request)
    {
        $sizes = CategorySize::where('category_id', $request->input('category'))->get();
        foreach ($sizes as $size)
        {
            Shirt::updateOrCreate([
                "category_id" => $request->input('category'),
                "type_id" => $request->input('type'),
                "category_size_id" => $size->id,
                "color_id" => $request->input('color'),
                "fund" => $request->input('fund'),
            ],[
                "price" => $request->input('price'),
                "description" => $request->input('description'),
            ]);
        }

        return redirect()->route('shirt');
    }

    public function deleteShirt(Request $request)
    {
        $shirt = Shirt::find($request->input('shirt_id'));
        $shirt->delete();
        return redirect()->route('shirt');
    }
}
