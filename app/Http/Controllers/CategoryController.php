<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CategorySize;
use App\Models\Color;
use App\Models\Shirt;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $page = 'shirt';
        $categories = Category::orderBy('id', 'desc')->get();
        $category_sizes = CategorySize::select('category_id')->groupBy('category_id')->get();
        $colors = Color::select('category_id')->groupBy('category_id')->get();
        $shirts = Shirt::select('category_id')->groupBy('category_id')->get();
        $category_exist = [];
        foreach($category_sizes as $c)
        {
            if(!in_array($c->category_id, $category_exist))
            {
                array_push($category_exist, $c->category_id);
            }
        }
        foreach($colors as $color)
        {
            if(!in_array($color->category_id, $category_exist))
            {
                array_push($category_exist, $color->category_id);
            }
        }
        foreach($shirts as $shirt)
        {
            if(!in_array($shirt->category_id, $category_exist))
            {
                array_push($category_exist, $shirt->category_id);
            }
        }
        return view('shirt.category.list', compact(['page', 'categories', 'category_exist']));
    }

    public function createCategory(Request $request)
    {
        Category::create([
           "name" => $request->input('name'),
           "description" => $request->input('description') 
        ]);

        return redirect()->route('category');
    }

    public function updateCategory(Request $request)
    {
        $category = Category::find($request->input('category_id'));
        $category->name = $request->input('edit_name');
        $category->description = $request->input('edit_description');
        $category->save();
        return redirect()->route('category');
    }

    public function deleteCategory(Request $request)
    {
        $category = Category::find($request->input('category_id'));
        $category->delete();
        return redirect()->route('category');
    }
}
