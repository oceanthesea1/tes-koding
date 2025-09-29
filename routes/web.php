<?php

use App\Http\Controllers\Api\ClassroomController;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\TeacherController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\ProfileController;
use App\Models\Classroom;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $classrooms = Classroom::with(['students', 'teachers'])->get();
    return view('dashboard', compact('classrooms'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/studentstable', function () {
    $classrooms = Classroom::with(['students'])->get();
    return view('students-table', compact('classrooms'));
})->middleware(['auth'])->name('students-table');

Route::get('/teacherstable', function () {
    $classrooms = Classroom::with(['teachers'])->get();
    return view('teachers-table', compact('classrooms'));
})->middleware(['auth'])->name('teachers-table');

Route::get('/classrooms', function () {
    return view('classrooms.index', ['classrooms' => Classroom::all()]);
})->middleware(['auth'])->name('classrooms.index');

Route::get('/students', function () {
    return view('students.index', ['students' => Student::all()]);
})->middleware(['auth'])->name('students.index');

Route::get('/teachers', function () {
    return view('teachers.index', ['teachers' => Teacher::all()]);
})->middleware(['auth'])->name('teachers.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('classrooms')->group(function () {
    Route::post('/', [ClassroomController::class, 'store'])->name('classrooms.store');
    Route::get('/create', [ClassroomController::class, 'create'])->name('classrooms.create');
    Route::get('/{id}', [ClassroomController::class, 'show'])->name('classrooms.show');
    Route::put('/{id}', [ClassroomController::class, 'update'])->name('classrooms.update');
    Route::get('/{id}/edit', [ClassroomController::class, 'edit'])->name('classrooms.edit');
    Route::delete('/{id}', [ClassroomController::class, 'destroy'])->name('classrooms.destroy');
});

Route::prefix('students')->group(function () {
    Route::post('/', [StudentController::class, 'store'])->name('students.store');
    Route::get('/create', [StudentController::class, 'create'])->name('students.create');
    Route::get('/{id}', [StudentController::class, 'show'])->name('students.show');
    Route::put('/{id}', [StudentController::class, 'update'])->name('students.update');
    Route::get('/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::delete('/{id}', [StudentController::class, 'destroy'])->name('students.destroy');
});

Route::prefix('teachers')->group(function () {
    Route::post('/', [TeacherController::class, 'store'])->name('teachers.store');
    Route::get('/create', [TeacherController::class, 'create'])->name('teachers.create');
    Route::get('/{id}', [TeacherController::class, 'show'])->name('teachers.show');
    Route::put('/{id}', [TeacherController::class, 'update'])->name('teachers.update');
    Route::get('/{id}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');
    Route::delete('/{id}', [TeacherController::class, 'destroy'])->name('teachers.destroy');
});

require __DIR__.'/auth.php';
