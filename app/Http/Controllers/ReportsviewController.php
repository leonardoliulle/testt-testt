<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Reportsview; 
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;



class ReportsviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (Session::get('col') != null) {
            redirect()->to('reportsview.newindex');
        }

        if ($request->input('psw') != '') {
            $collection = Reportsview::where('pass','=',$request->input('psw'))->get();
            if ($collection->count() >= 1) {
                Session::put('col',$collection);
                redirect()->to('reportsview/newindex');
            } else {
                // echo view('reportsview.header');
                echo view('reportsview.pass')->with('mess','Senha errada, entre em contato com Leonardo Liulle');
            }
        } else {
            // echo view('reportsview.header');
            echo view('reportsview.pass');
        }
        
    }

    public function newindex(Request $request)
    {   
        if ($request->input('psw') != '' or !empty(Session::get('mysession'))) {
            $collection = Reportsview::where('pass','=',$request->input('psw'))->get();
            if ($collection->count() >= 1) {
                Session::put('mysession',$collection);
                // echo view('reportsview.header')->with('header',$collection);
                echo view('reportsview.newindex')->with('header',$collection);
            } else {
                // echo view('reportsview.header');
                echo view('reportsview.pass')->with('mess','Senha errada, entre em contato com Leonardo Liulle');
            }
        }


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
