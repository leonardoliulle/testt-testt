<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserPublic;
use App\Models\Assessment;
// use Livewire\LivewireServiceProvider;

class AssessmentfController extends Controller
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
    public function show()
    {
        // $assessment = UserPublic::all();
        // dd($assessment);
        echo view('assessments/aheader');
        echo view('assessments/assessment-form');
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

    public function showme()
    {
        // $assessment = Assessment::all();
        // dd($assessment);
        // echo view('livewire/assessment-form', compact('assessment'));
    }
}
