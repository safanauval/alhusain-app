<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $kbCount = Student::where('kelas', 'KB')->count();
        $tkACount = Student::where('kelas', 'TK A')->count();
        $tkBCount = Student::where('kelas', 'TK B')->count();
        $lakilaki = Student::where('jenis_kelamin', 'Laki-Laki')->count();
        $perempuan = Student::where('jenis_kelamin', 'Perempuan')->count();
        $students = Student::all();

        return view('pages.dashboard', compact('kbCount', 'tkACount', 'tkBCount', 'lakilaki', 'perempuan', 'students'));
    }
}