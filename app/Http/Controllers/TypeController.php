<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;
use App\Models\Shirt;

class TypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $page = 'shirt';
        $types = Type::orderBy('id', 'desc')->get();
        $shirts = Shirt::select('type_id')->groupBy('type_id')->get();
        $type_exist = [];
        foreach($shirts as $shirt)
        {
            if(!in_array($shirt->type_id, $type_exist))
            {
                array_push($type_exist, $shirt->type_id);
            }
        }
        return view('shirt.type.list', compact(['page', 'types', 'type_exist']));
    }

    public function createType(Request $request)
    {
        Type::create([
           "name" => $request->input('name') 
        ]);

        return redirect()->route('type');
    }

    public function updateType(Request $request)
    {
        $type = Type::find($request->input('type_id'));
        $type->name = $request->input('edit_name');
        $type->save();
        return redirect()->route('type');
    }

    public function deleteType(Request $request)
    {
        $type = Type::find($request->input('type_id'));
        $type->delete();
        return redirect()->route('type');
    }
}
