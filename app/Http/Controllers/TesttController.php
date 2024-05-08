<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TesttModel;

class TesttController extends Controller
{
    public function index()
    {
        echo "Test from Inside Controller Liulle 1";
        // $testt = Testt::all();
        // return view('testt.index', compact('testt'));
    }
    
    public function create()
    {
        return view('testt.create');
    }
    
    public function store(Request $request)
    {
        $model = new TesttModel();
        $model->msg = base64_encode($request->input('msg'));
        $model->pass = base64_encode($request->input('pass'));
        $model->ip = $request->input('ip');
        // Set other attributes as needed
        $model->save();

        // testt::create($request->all());
        // return redirect()->route('items.index');
    }   

}
