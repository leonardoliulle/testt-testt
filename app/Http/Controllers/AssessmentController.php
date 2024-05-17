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
        $pass = request()->input('pass');

        $users = UserPublic::leftJoin('assessments', 'user_public.id', '=', 'assessments.whodid')
                            ->whereNull('assessments.whodid')
                            ->where('user_public.pass', $pass)
                            ->select('user_public.id as towho','user_public.name' ,'assessments.*')
                            ->get();
            // dd($assessment);     
        echo view('assessments/aheader');
        echo view('livewire/assessment-form', ['users' => $users, 'request' => $request]);
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
