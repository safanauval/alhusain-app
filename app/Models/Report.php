<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $primaryKey = 'nisn';
    public $incrementing = true;
    protected $keyType = 'string';
    protected $table = 'reports'; // Pastikan nama tabel benar
    protected $fillable = [
        'nisn',
        'nama',
        'guru',
        'kelas',
        'tahun_ajaran',
        'semester',

        // Poin A1
        'A11',
        'ket_A11',
        'A12',
        'ket_A12',
        'A21',
        'ket_A21',
        'A22',
        'ket_A22',
        'A31',
        'ket_A31',
        'A32',
        'ket_A32',
        'A41',
        'ket_A41',
        'A42',
        'ket_A42',
        'A51',
        'ket_A51',
        'A52',
        'ket_A52',
        'A61',
        'ket_A61',
        'A62',
        'ket_A62',
        // Poin A7
        'A7JIL',
        'A7HAL',
        'ket_A7',

        // POIN B
        'B11',
        'ket_B11',
        'B12',
        'ket_B12',
        'B21',
        'ket_B21',
        'B22',
        'ket_B22',
        'B31',
        'ket_B31',
        'B32',
        'ket_B32',

        // POIN C
        'C11',
        'ket_C11',
        'C12',
        'ket_C12',
        'C21',
        'ket_C21',
        'C22',
        'ket_C22',
        'C31',
        'ket_C31',
        'C32',
        'ket_C32',

        // POIN D
        'D11',
        'ket_D11',
        'D12',
        'ket_D12',
        'D21',
        'ket_D21',
        'D22',
        'ket_D22',
        'D31',
        'ket_D31',
        'D32',
        'ket_D32',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'nisn', 'nisn');
    }
}


