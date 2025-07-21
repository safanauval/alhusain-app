<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id('id_report');
            $table->string('nisn', 16);
            $table->string('nama', 50);
            $table->string('guru_kelas', 50);
            $table->enum('kelas', ['KB', 'TK A', 'TK B']);
            $table->string('tahun_ajaran', 9);
            $table->enum('semester', ['1', '2'])->nullable();

            // Section A: Nilai Agama dan Budi Pekerti
            $table->enum('A11', ['BM', 'MM', 'BSH', 'BSB'])->nullable();
            $table->string('ket_A11', 100)->nullable();
            $table->enum('A12', ['BM', 'MM', 'BSH', 'BSB'])->nullable();
            $table->string('ket_A12', 100)->nullable();
            $table->enum('A21', ['BM', 'MM', 'BSH', 'BSB'])->nullable();
            $table->string('ket_A21', 100)->nullable();
            $table->enum('A22', ['BM', 'MM', 'BSH', 'BSB'])->nullable();
            $table->string('ket_A22', 100)->nullable();
            $table->enum('A31', ['BM', 'MM', 'BSH', 'BSB'])->nullable();
            $table->string('ket_A31', 100)->nullable();
            $table->enum('A32', ['BM', 'MM', 'BSH', 'BSB'])->nullable();
            $table->string('ket_A32', 100)->nullable();
            $table->enum('A41', ['BM', 'MM', 'BSH', 'BSB'])->nullable();
            $table->string('ket_A41', 100)->nullable();
            $table->enum('A42', ['BM', 'MM', 'BSH', 'BSB'])->nullable();
            $table->string('ket_A42', 100)->nullable();
            $table->enum('A51', ['BM', 'MM', 'BSH', 'BSB'])->nullable();
            $table->string('ket_A51', 100)->nullable();
            $table->enum('A52', ['BM', 'MM', 'BSH', 'BSB'])->nullable();
            $table->string('ket_A52', 100)->nullable();
            $table->enum('A61', ['BM', 'MM', 'BSH', 'BSB'])->nullable();
            $table->string('ket_A61', 100)->nullable();
            $table->enum('A62', ['BM', 'MM', 'BSH', 'BSB'])->nullable();
            $table->string('ket_A62', 100)->nullable();
            $table->integer('A7JIL')->nullable();
            $table->integer('A7HAL')->nullable();
            $table->string('ket_A7', 100)->nullable();

            // Section B: Jati Diri
            $table->enum('B11', ['BM', 'MM', 'BSH', 'BSB'])->nullable();
            $table->string('ket_B11', 100)->nullable();
            $table->enum('B12', ['BM', 'MM', 'BSH', 'BSB'])->nullable();
            $table->string('ket_B12', 100)->nullable();
            $table->enum('B21', ['BM', 'MM', 'BSH', 'BSB'])->nullable();
            $table->string('ket_B21', 100)->nullable();
            $table->enum('B22', ['BM', 'MM', 'BSH', 'BSB'])->nullable();
            $table->string('ket_B22', 100)->nullable();
            $table->enum('B31', ['BM', 'MM', 'BSH', 'BSB'])->nullable();
            $table->string('ket_B31', 100)->nullable();
            $table->enum('B32', ['BM', 'MM', 'BSH', 'BSB'])->nullable();
            $table->string('ket_B32', 100)->nullable();

            // Section C: DASAR DASAR LITERASI,MATEMATIK,SAINS,TEKNOLOGI DAN SENI
            $table->enum('C11', ['BM', 'MM', 'BSH', 'BSB'])->nullable();
            $table->string('ket_C11', 100)->nullable();
            $table->enum('C12', ['BM', 'MM', 'BSH', 'BSB'])->nullable();
            $table->string('ket_C12', 100)->nullable();
            $table->enum('C21', ['BM', 'MM', 'BSH', 'BSB'])->nullable();
            $table->string('ket_C21', 100)->nullable();
            $table->enum('C22', ['BM', 'MM', 'BSH', 'BSB'])->nullable();
            $table->string('ket_C22', 100)->nullable();
            $table->enum('C31', ['BM', 'MM', 'BSH', 'BSB'])->nullable();
            $table->string('ket_C31', 100)->nullable();
            $table->enum('C32', ['BM', 'MM', 'BSH', 'BSB'])->nullable();
            $table->string('ket_C32', 100)->nullable();

            // Section D: MATEMATIKA/NALAR
            $table->enum('D11', ['BM', 'MM', 'BSH', 'BSB'])->nullable();
            $table->string('ket_D11', 100)->nullable();
            $table->enum('D12', ['BM', 'MM', 'BSH', 'BSB'])->nullable();
            $table->string('ket_D12', 100)->nullable();
            $table->enum('D21', ['BM', 'MM', 'BSH', 'BSB'])->nullable();
            $table->string('ket_D21', 100)->nullable();
            $table->enum('D22', ['BM', 'MM', 'BSH', 'BSB'])->nullable();
            $table->string('ket_D22', 100)->nullable();
            $table->enum('D31', ['BM', 'MM', 'BSH', 'BSB'])->nullable();
            $table->string('ket_D31', 100)->nullable();
            $table->enum('D32', ['BM', 'MM', 'BSH', 'BSB'])->nullable();
            $table->string('ket_D32', 100)->nullable();
            $table->timestamps();
            $table->foreign('nisn')->references('nisn')->on('students')->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('reports');
    }
};