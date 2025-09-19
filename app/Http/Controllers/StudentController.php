<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('course')->get();
        return view('student.index', compact('students'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $students = Student::all();
        $courses  = Course::all();

        return view('student.create', compact('students', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fullname'  => 'required|string|max:255',
            'age'       => 'required|integer|min:1',
            'phone'     => 'required|string|max:20',
            'course_id' => 'required|exists:courses,id',
        ]);

        $student = Student::create([
            'fullname' => $request->fullname,
            'age' => $request->age,
            'phone' => $request->phone
        ]);

        $student->course()->attach($request->course_id);

        return redirect()->route('student.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view("student.view", compact("student"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('student.edit', compact('student'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $validation = $request->validate(
            [
                'fullname' => 'required|string|max:255',
                'age' => 'required|integer|min:1',
                'phone' => 'required|string|max:20',
                'profile_picture' => 'nullable|mimes:jpg,jpeg,png,gif|max:2048',
            ]
        );

        if ($request->hasFile('profile_picture')) {
            if ($student->profile_picture && Storage::disk('public')->exists($student->profile_picture)) {
                Storage::disk('public')->delete($student->profile_picture);
            }

            $path = $request->file('profile_picture')->store('student', "public");
            $validation['profile_picture'] = $path;
        }

        $student->update($validation);

        return redirect()->route('student.index');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');

        $student = Student::with('Course')->where('fullname', 'like', "%{$query}%")->orWhere('age', 'like', "%{$query}%")->get();
        return response()->json($student);


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return response()->json(["success" => true]);
    }
}
