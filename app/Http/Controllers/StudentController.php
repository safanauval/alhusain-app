<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the students.
     */
    public function index()
    {
        $students = Student::all();
        return view('pages.students', compact('students'));
    }

    /**
     * Store a newly created student.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|unique:students|max:16',
            'nama' => 'required|max:50',
            'guru_kelas' => 'required|max:50',
            'kelas' => 'required|in:KB,TK A,TK B',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'tahun_lahir' => 'required|integer|min:2010|max:' . date('Y'),
            'tahun_ajaran' => 'required|regex:/^\d{4}\/\d{4}$/',
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')
            ->with('success', 'Siswa berhasil ditambahkan');
    }

    /**
     * Update the specified student.
     */
    public function update(Request $request, $nisn)
    {
        $request->validate([
            'nama' => 'required|max:50',
            'guru_kelas' => 'required|max:50',
            'kelas' => 'required|in:KB,TK A,TK B',
            'jenis_kelamin' => 'required|in:Laki-Laki,Perempuan',
            'tahun_lahir' => 'required|integer|min:2000|max:' . date('Y'),
            'tahun_ajaran' => 'required|regex:/^\d{4}\/\d{4}$/',
        ]);

        $student = Student::findOrFail($nisn);
        $student->update($request->all());

        return redirect()->route('students.index')->with('success', 'Data siswa berhasil diperbarui');
    }
    public function destroy($nisn)
    {
        $student = Student::findOrFail($nisn);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Siswa berhasil dihapus');
    }
}