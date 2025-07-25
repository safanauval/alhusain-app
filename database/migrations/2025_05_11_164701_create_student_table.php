<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->string('nisn', 16)->primary();
            $table->string('nama', 50);
            $table->string('guru_kelas', 50);
            $table->enum('kelas', ['KB', 'TK A', 'TK B']);
            $table->enum('jenis_kelamin', ['Laki-Laki', 'Perempuan']);
            $table->year('tahun_lahir');
            $table->string('tahun_ajaran', 9); // Format: 2023/2024
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('students');
    }
};

