<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;
use App\Models\Category;
use App\Models\Shirt;

class ColorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $page = 'shirt';
        $categories = Category::orderBy('name', 'asc')->get();
        $colors = Color::with(['category'])->orderBy('id', 'desc')->get();
        $shirts = Shirt::select('color_id')->groupBy('color_id')->get();
        $color_exist = [];
        foreach($shirts as $shirt)
        {
            if(!in_array($shirt->color_id, $color_exist))
            {
                array_push($color_exist, $shirt->color_id);
            }
        }
        return view('shirt.color.list', compact(['page', 'colors', 'categories', 'color_exist']));
    }

    public function createColor(Request $request)
    {
        Color::create([
            "category_id" => $request->input('category'),
            "name" => $request->input('name'),
            "colorpicker" => $request->input('colorpicker')
        ]);

        return redirect()->route('color');
    }

    public function updateColor(Request $request)
    {
        $color = Color::find($request->input('color_id'));
        $color->category_id = $request->input('edit_category');
        $color->name = $request->input('edit_name');
        $color->colorpicker = $request->input('edit_colorpicker');
        $color->save();
        return redirect()->route('color');
    }

    public function deleteColor(Request $request)
    {
        $color = Color::find($request->input('color_id'));
        $color->delete();
        return redirect()->route('color');
    }
}
