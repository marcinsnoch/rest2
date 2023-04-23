<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    public function index(Request $request)
    {
        if ($request->get('number')) {
            return Item::where('number', $request->get('number'))->firstOrFail();
        }
        if ($request->get('last')) {
            return Item::limit($request->get('last'))->latest()->get();
        }
        return Item::limit(1000)->get();
    }

    public function store(Request $request)
    {
        $fields = [
            'number' => 'required|unique:items',
            'param1' => 'required',
            'param2' => 'required',
            'param3' => 'required',
            'state' => 'required',
        ];
        if ($this->validate($request, $fields)) {
            $item = new Item;
 
            $item->number = $request->number;
            $item->param1 = $request->param1;
            $item->param2 = $request->param2;
            $item->param3 = $request->param3;
            $item->state = $request->state;
 
            $item->save();
            
            return $request->All();
        }
    }
}
