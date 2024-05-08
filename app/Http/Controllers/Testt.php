<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Testt extends Controller
{
    public function index()
    {
        $items = Item::all();
        return view('items.index', compact('items'));
    }
    
    public function create()
    {
        return view('items.create');
    }
    
    public function store(Request $request)
    {
        Item::create($request->all());
        return redirect()->route('items.index');
    }   

}
