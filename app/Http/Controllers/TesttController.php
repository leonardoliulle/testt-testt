<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        echo view('testt/header');
        echo view('testt/create');
    }
    
    public function store(Request $request)
    {
        $TesttModel = new TesttModel();
        $TesttModel->msg = $request->input('msg');
        $TesttModel->pass = $request->input('pass');
        $TesttModel->ip = $request->input('ip');
        // Set other attributes as needed
        $TesttModel->save();

        // testt::create($request->all());
        // return redirect()->route('items.index');
    }

    public function tabela(Request $request)
    {
        // $TesttModel = new TesttModel();
        // TesttModel::findall();
        echo " inside TesttController By L showww";
    }
    
    public function show()
    {
        // $TesttModel = new TesttModel();
        $data = DB::table('testt')->orderBy('created_at', 'desc')->get();
        echo view('testt.header');
        echo view('testt.show')->with(['testt' => $data]);
    }



}
