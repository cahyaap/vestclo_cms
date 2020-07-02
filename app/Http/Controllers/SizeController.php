<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Size;
use App\Models\Category;
use App\Models\CategorySize;
use App\Models\Shirt;

class SizeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $page = 'shirt';
        $category_sizes = CategorySize::with(['category', 'size'])->orderBy('id', 'desc')->get();
        $category_sizes_checking = CategorySize::select('size_id')->groupBy('size_id')->get();
        $categories = Category::orderBy('name', 'asc')->get();
        $sizes = Size::orderBy('id', 'desc')->get();
        $size_exist = [];
        $category_size_exist = [];
        $shirts = Shirt::select('category_size_id')->groupBy('category_size_id')->get();
        foreach($category_sizes_checking as $c)
        {
            if(!in_array($c->size_id, $size_exist))
            {
                array_push($size_exist, $c->size_id);
            }
        }
        foreach($shirts as $shirt)
        {
            if(!in_array($shirt->category_size_id, $category_size_exist))
            {
                array_push($category_size_exist, $shirt->category_size_id);
            }
        }
        return view('shirt.size.list', compact(['page', 'category_sizes', 'sizes', 'categories', 'size_exist', 'category_size_exist']));
    }

    public function createSize(Request $request)
    {
        Size::create([
           "name" => $request->input('name') 
        ]);

        return redirect()->route('size');
    }

    public function updateSize(Request $request)
    {
        $size = Size::find($request->input('size_id'));
        $size->name = $request->input('edit_name');
        $size->save();
        return redirect()->route('size');
    }

    public function deleteSize(Request $request)
    {
        $size = Size::find($request->input('size_id'));
        $size->delete();
        return redirect()->route('size');
    }

    public function createCategorySize(Request $request)
    {
        CategorySize::updateOrCreate([
           "category_id" => $request->input('category'),
           "size_id" => $request->input('size')
        ],[
           "p" => $request->input('length'),
           "l" => $request->input('width'),
        ]);

        return redirect()->route('size');
    }

    public function updateCategorySize(Request $request)
    {
        $category_size = CategorySize::find($request->input('category_size_id'));
        $category_size->category_id = $request->input('category');
        $category_size->size_id = $request->input('size');
        $category_size->p = $request->input('length');
        $category_size->l = $request->input('width');
        $category_size->save();
        return redirect()->route('size');
    }

    public function deleteCategorySize(Request $request)
    {
        $category_size = CategorySize::find($request->input('category_size_id'));
        $category_size->delete();
        return redirect()->route('size');
    }
}
