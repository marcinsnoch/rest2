<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{

    public function showAllItems(Request $request)
    {
        if ($request->get('last')) {
            return response()->json(Item::with('tests')->limit($request->get('last'))->get());
        }
        return response()->json(Item::with('tests.details')->get());
    }

    public function searchBySerialNumber($number)
    {
        return Item::with(['tests.details' => function ($q){
                        $q->orderBy('created_at', 'DESC');
                }])
                ->where('serial_number', $number)
                ->firstOrFail();
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
