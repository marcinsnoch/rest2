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
        return response()->json(Item::with('tests')->get());
    }

    public function searchBySerialNumber($number)
    {
        return response()->json(Item::with('tests')->where('serial_number', $number)->firstOrFail());
    }
}
