<?php

namespace App\Http\Controllers;

use App\Models\Assessment;
use App\Models\UserPublic;
use Illuminate\Http\Request;

class AssessmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(Assessment $assessment, Request $request)
    {
        // $user = $request->input('i');
        // $pass = $request->input('k');
        // $wwhoreceive = $request->input('w');

        echo view('assessments/aheader');
        echo view('assessments/assessment-form');
        // $user = request()->input('user');
        // $pass = request()->input('pass');


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Assessment $assessment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Assessment $assessment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Assessment $assessment)
    {
        //
    }
}
