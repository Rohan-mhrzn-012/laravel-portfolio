<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Experience::all();
        return view('experience', compact('data'));
    }

    public function create_form()
    {
        return view('experiences.create');
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
        $request->validate(
            [
                'title' => 'required|string|max:255',
                'description' => 'required|string',
                'organization' => 'required|string|max:255',
                'location' => 'required|string|max:255',
                'start_date'=>'required|date|before:end_date',
                'end_date'=>'nullable|date|after:start_date',
            ]
        );
        Experience::create(
            [
                'title'=>$request->title,
                'description'=>$request->description,
                'organization'=>$request->organization,
                'location'=>$request->location,
                'start_date'=>$request->start_date,
                'end_date'=>$request->end_date,
            ]
        );
        return redirect('/experience')->with('message','success on adding new experience');
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
