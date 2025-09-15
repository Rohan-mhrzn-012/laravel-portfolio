<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $datas=Project::all();
        return view('/projects',compact('datas'));
    }

    public function create_form(){
        return view('projects.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        $request->validate([
            'name'=>'required|string|max:255',
            'description'=>'required|string|max:255',
            'status'=>'required|string|max:255',
            // 'image'=>'required|string|max:255',
            'start_date'=>'required|date|before:end_date',
            'end_date'=>'nullable|date|after:start_date',
        ]);
        Project::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'status'=>$request->status,
            // 'image'=>$request->image,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
        ]);

        return redirect('/projects')->with('message','success on adding new project');
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
    public function show(Project $project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
