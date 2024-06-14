<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserPublic;

class UserPublicController extends Controller
{

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        echo view('assessments/aheader');
        echo view('assessments/userpubliccreate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'pass' => 'required|string|max:255',
        ]);

        // Create a new UserPublic instance and save it to the database
        $userPublic = new UserPublic();
        $userPublic->name = str_replace("=","",base64_encode($validatedData['name']));
        $userPublic->pass = $validatedData['pass'];
        $userPublic->save();

        // Redirect back or to a different route after saving the userpublic
        return redirect()->route('asssessment.show', ['i' => $userPublic->name, 'k' => $userPublic->pass]);
    }

    /**
     * Display the specified resource.
     */
    public function show(UserPublic $userPublic)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserPublic $userPublic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserPublic $userPublic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserPublic $userPublic)
    {
        //
    }

    public function counter()
    {
        echo view('counter.counter');
    }
}
