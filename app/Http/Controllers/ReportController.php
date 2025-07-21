<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Student;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\App;


class ReportController extends Controller
{
    public function index()
    {
        $kb = Report::where('kelas', 'KB')->get();
        $tkA = Report::where('kelas', 'TK A')->get();
        $tkB = Report::where('kelas', 'TK B')->get();

        return view('reports.index', [
            'kb' => $kb,
            'tkA' => $tkA,
            'tkB' => $tkB,
            'students' => Student::all()
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nisn' => 'required|exists:students,nisn',
            'semester' => 'required|in:1,2',
            // POIN A
            'A11' => 'required|in:BM,MM,BSH,BSB',
            'A12' => 'required|in:BM,MM,BSH,BSB',
            'A21' => 'required|in:BM,MM,BSH,BSB',
            'A22' => 'required|in:BM,MM,BSH,BSB',
            'A31' => 'required|in:BM,MM,BSH,BSB',
            'A32' => 'required|in:BM,MM,BSH,BSB',
            'A41' => 'required|in:BM,MM,BSH,BSB',
            'A42' => 'required|in:BM,MM,BSH,BSB',
            'A51' => 'required|in:BM,MM,BSH,BSB',
            'A52' => 'required|in:BM,MM,BSH,BSB',
            'A61' => 'required|in:BM,MM,BSH,BSB',
            'A62' => 'required|in:BM,MM,BSH,BSB',
            // POIN B
            'B11' => 'required|in:BM,MM,BSH,BSB',
            'B12' => 'required|in:BM,MM,BSH,BSB',
            'B21' => 'required|in:BM,MM,BSH,BSB',
            'B22' => 'required|in:BM,MM,BSH,BSB',
            'B31' => 'required|in:BM,MM,BSH,BSB',
            'B32' => 'required|in:BM,MM,BSH,BSB',
            // POIN C
            'C11' => 'required|in:BM,MM,BSH,BSB',
            'C12' => 'required|in:BM,MM,BSH,BSB',
            'C21' => 'required|in:BM,MM,BSH,BSB',
            'C22' => 'required|in:BM,MM,BSH,BSB',
            'C31' => 'required|in:BM,MM,BSH,BSB',
            'C32' => 'required|in:BM,MM,BSH,BSB',
            // POIN d
            'D11' => 'required|in:BM,MM,BSH,BSB',
            'D12' => 'required|in:BM,MM,BSH,BSB',
            'D21' => 'required|in:BM,MM,BSH,BSB',
            'D22' => 'required|in:BM,MM,BSH,BSB',
            'D31' => 'required|in:BM,MM,BSH,BSB',
            'D32' => 'required|in:BM,MM,BSH,BSB',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $student = Student::where('nisn', $request->nisn)->first();

        $report = new Report();
        $report->nisn = $request->nisn;
        $report->nama = $student->nama;
        $report->kelas = $student->kelas;
        $report->guru_kelas = $student->guru_kelas;
        $report->tahun_ajaran = $student->tahun_ajaran;
        $report->semester = $request->semester;

        // Section A
        $report->A11 = $request->A11;
        $report->ket_A11 = $request->ket_A11;
        $report->A12 = $request->A12;
        $report->ket_A12 = $request->ket_A12;

        $report->A21 = $request->A21;
        $report->ket_A21 = $request->ket_A21;
        $report->A22 = $request->A22;
        $report->ket_A22 = $request->ket_A22;

        $report->A31 = $request->A31;
        $report->ket_A31 = $request->ket_A31;
        $report->A32 = $request->A32;
        $report->ket_A32 = $request->ket_A32;

        $report->A41 = $request->A41;
        $report->ket_A41 = $request->ket_A41;
        $report->A42 = $request->A42;
        $report->ket_A42 = $request->ket_A42;

        $report->A51 = $request->A51;
        $report->ket_A51 = $request->ket_A51;
        $report->A52 = $request->A52;
        $report->ket_A52 = $request->ket_A52;

        $report->A61 = $request->A61;
        $report->ket_A61 = $request->ket_A61;
        $report->A62 = $request->A62;
        $report->ket_A62 = $request->ket_A62;

        $report->A7JIL = $request->A7JIL;
        $report->A7HAL = $request->A7HAL;
        $report->ket_A7 = $request->keterangan_A7;

        // Section B
        $report->B11 = $request->B11;
        $report->ket_B11 = $request->ket_B11;
        $report->B12 = $request->B12;
        $report->ket_B12 = $request->ket_B12;

        $report->B21 = $request->B21;
        $report->ket_B21 = $request->ket_B21;
        $report->B22 = $request->B22;
        $report->ket_B22 = $request->ket_B22;

        $report->B31 = $request->B31;
        $report->ket_B31 = $request->ket_B31;
        $report->B32 = $request->B32;
        $report->ket_B32 = $request->ket_B32;

        // Section C
        $report->C11 = $request->C11;
        $report->ket_C11 = $request->ket_C11;
        $report->C12 = $request->C12;
        $report->ket_C12 = $request->ket_C12;

        $report->C21 = $request->C21;
        $report->ket_C21 = $request->ket_C21;
        $report->C22 = $request->C22;
        $report->ket_C22 = $request->ket_C22;

        $report->C31 = $request->C31;
        $report->ket_C31 = $request->ket_C31;
        $report->C32 = $request->C32;
        $report->ket_C32 = $request->ket_C32;

        // Section D
        $report->D11 = $request->D11;
        $report->ket_D11 = $request->ket_D11;
        $report->D12 = $request->D12;
        $report->ket_D12 = $request->ket_D12;

        $report->D21 = $request->D21;
        $report->ket_D21 = $request->ket_D21;
        $report->D22 = $request->D22;
        $report->ket_D22 = $request->ket_D22;

        $report->D31 = $request->D31;
        $report->ket_D31 = $request->ket_D31;
        $report->D32 = $request->D32;
        $report->ket_D32 = $request->ket_D32;

        $report->save();

        return redirect()->route('reports.index')->with('success', 'Rapor berhasil ditambahkan');
    }

    public function update(Request $request, $id_report)
    {
        $validator = Validator::make($request->all(), [
            'semester' => 'required|in:1,2',
            // POIN A
            'A11' => 'required|in:BM,MM,BSH,BSB',
            'A12' => 'required|in:BM,MM,BSH,BSB',
            'A21' => 'required|in:BM,MM,BSH,BSB',
            'A22' => 'required|in:BM,MM,BSH,BSB',
            'A31' => 'required|in:BM,MM,BSH,BSB',
            'A32' => 'required|in:BM,MM,BSH,BSB',
            'A41' => 'required|in:BM,MM,BSH,BSB',
            'A42' => 'required|in:BM,MM,BSH,BSB',
            'A51' => 'required|in:BM,MM,BSH,BSB',
            'A52' => 'required|in:BM,MM,BSH,BSB',
            'A61' => 'required|in:BM,MM,BSH,BSB',
            'A62' => 'required|in:BM,MM,BSH,BSB',
            // POIN B
            'B11' => 'required|in:BM,MM,BSH,BSB',
            'B12' => 'required|in:BM,MM,BSH,BSB',
            'B21' => 'required|in:BM,MM,BSH,BSB',
            'B22' => 'required|in:BM,MM,BSH,BSB',
            'B31' => 'required|in:BM,MM,BSH,BSB',
            'B32' => 'required|in:BM,MM,BSH,BSB',
            // POIN C
            'C11' => 'required|in:BM,MM,BSH,BSB',
            'C12' => 'required|in:BM,MM,BSH,BSB',
            'C21' => 'required|in:BM,MM,BSH,BSB',
            'C22' => 'required|in:BM,MM,BSH,BSB',
            'C31' => 'required|in:BM,MM,BSH,BSB',
            'C32' => 'required|in:BM,MM,BSH,BSB',
            // POIN D
            'D11' => 'required|in:BM,MM,BSH,BSB',
            'D12' => 'required|in:BM,MM,BSH,BSB',
            'D21' => 'required|in:BM,MM,BSH,BSB',
            'D22' => 'required|in:BM,MM,BSH,BSB',
            'D31' => 'required|in:BM,MM,BSH,BSB',
            'D32' => 'required|in:BM,MM,BSH,BSB',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $report = Report::findOrFail($id_report);
        $report->update($request->all());

        return redirect()->route('reports.index')->with('success', 'Rapor berhasil diperbaharui');
    }

    public function destroy($id_report)
    {
        $report = Report::findOrFail($id_report);
        $report->delete();

        return redirect()->route('reports.index')->with('success', 'Rapor berhasil dihapus');
    }

    public function printPDF($nisn, Request $request)
    {
        $report = Report::where('nisn', $nisn)->firstOrFail();

        $pdf = PDF::loadView('reports.pdf', [
            'report' => $report,
            'request' => $request
        ]);

        return $pdf->stream('Rapor Ceklis-' . $report->nama . '-' . now()->format('Y-m-d') . '.pdf');
    }
}





