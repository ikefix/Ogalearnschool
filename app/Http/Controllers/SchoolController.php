<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class SchoolController extends Controller
{

public function students()
{
    $school = auth()->user();

    $students = User::where('role', 'student')
        ->where('school_id', $school->id)
        ->latest()
        ->get();

    return view('school.students', compact('students'));
}





}
