<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return response()->json($students);
    }

    public function show($id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        return response()->json($student);
    }

    public function store(Request $request)
    {
        $student = Student::create([
            'name' => $request->name,
            'classroom_id' => $request->classroom_id,
        ]);

        return redirect()->route('students.index')->with('success', 'Student created successfully!');
    }

    public function create()
    {
        $classrooms = Classroom::all();
        return view('students.create', compact('classrooms'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        $student->name = $request->name ?? $student->name;
        $student->classroom_id = $request->classroom_id ?? $student->classroom_id;

        $student->save();

        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $classrooms = Classroom::all();
        return view('students.edit', compact('student', 'classrooms'));
    }

    public function destroy($id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        $student->delete();

        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }
}
