<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use PHPUnit\Framework\MockObject\Builder\Stub;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $students=Student::with('phone')->get();
        return view('students.index',compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('students.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate(
            [
                'name'=>'required|string',
                'email'=>'required|unique:students|email',
                'phone_number'=>'required|string',
            ]
        );

        $student= Student::create(
            [
                'name'=>$request->name,
                'email'=>$request->email,
            ]
        );
        $student->phone()->create([
            'phone_number'=>$request->phone_number,
        ]);

        return redirect()->route('students.index')->with('message','successfully created students');

    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
