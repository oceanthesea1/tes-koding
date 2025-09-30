<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return response()->json($teachers);
    }

    public function show($id)
    {
        $teacher = Teacher::find($id);

        if (!$teacher) {
            return response()->json(['message' => 'Teacher not found'], 404);
        }

        return response()->json($teacher);
    }

    public function store(Request $request)
    {
        $teacher = Teacher::create([
            'name' => $request->name,
            'classroom_id' => $request->classroom_id,
        ]);

        return redirect()->route('teachers.index')->with('success', 'Teacher created successfully!');
    }

    public function create()
    {
        $classrooms = Classroom::all();
        return view('teachers.create', compact('classrooms'));
    }

    public function update(Request $request, $id)
    {
        $teacher = Teacher::find($id);

        if (!$teacher) {
            return response()->json(['message' => 'Teacher not found'], 404);
        }

        $teacher->name = $request->name ?? $teacher->name;
        $teacher->classroom_id = $request->classroom_id ?? $teacher->classroom_id;

        $teacher->save();

        return redirect()->route('teachers.index')->with('success', 'Teacher updated successfully!');
    }

    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        $classrooms = Classroom::all();
        return view('teachers.edit', compact('teacher', 'classrooms'));
    }

    public function destroy($id)
    {
        $teacher = Teacher::find($id);

        if (!$teacher) {
            return response()->json(['message' => 'Teacher not found'], 404);
        }

        $teacher->delete();

        return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfully!');
    }
}
