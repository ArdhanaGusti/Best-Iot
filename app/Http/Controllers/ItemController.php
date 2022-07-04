<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return view('welcome', [
            "item" => Item::latest('id')->first(),
        ]);
    }

    public function create(Request $request)
    {
        Item::create([
            'temperature_c' => $request->c,
            'humidity' => $request->h,
            'temperature_f' => $request->f,
        ]);
        return response()->json(["message", "Berhasil"]);
    }

    public function realtime()
    {
        return Item::latest('id')->first();   
    }

    public function data()
    {
        return Item::limit(10)->latest()->get();
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Item $item)
    {
        //
    }

    public function edit(Item $item)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
