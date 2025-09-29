<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::all();
        return response()->json($classrooms);
    }

    public function show($id)
    {
        $classroom = Classroom::find($id);

        if (!$classroom) {
            return response()->json(['message' => 'Classroom not found'], 404);
        }

        return response()->json($classroom);
    }

    public function store(Request $request)
    {
        $classroom = Classroom::create([
            'name' => $request->name,
        ]);

        return response()->json([
            'message' => 'Classroom created successfully',
            'classroom' => $classroom,
        ],201);
    }

    public function create()
    {
        return view('classrooms.create');
    }

    public function update(Request $request, $id)
    {
        $classroom = Classroom::find($id);

        if (!$classroom) {
            return response()->json(['message' => 'Classroom not found'], 404);
        }

        $classroom->name = $request->name ?? $classroom->name;

        $classroom->save();

        return response()->json([
            'message' => 'Classroom updated successfully',
            'classroom' => $classroom
        ]);
    }

    public function edit($id)
    {
        $classroom = Classroom::findOrFail($id);
        return view('classrooms.edit', compact('classroom'));
    }

    public function destroy($id)
    {
        $classroom = Classroom::find($id);

        if (!$classroom) {
            return response()->json(['message' => 'Classroom not found'], 404);
        }

        $classroom->delete();

        return response()->json(['message' => 'Classroom deleted successfully']);
    }
}
