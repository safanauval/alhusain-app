<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;


class ClasslistController extends Controller
{
    public function classlist()
    {
        $kb = Student::where('kelas', 'KB')->get();
        $tkA = Student::where('kelas', 'TK A')->get();
        $tkB = Student::where('kelas', 'TK B')->get();

        return view('pages.classlist', [
            'kb' => $kb,
            'tkA' => $tkA,
            'tkB' => $tkB,
            'students' => Student::all()
        ]);
    }
}