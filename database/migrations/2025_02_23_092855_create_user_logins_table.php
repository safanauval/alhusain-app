<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('user_logins', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('username', 20)->unique();
            $table->string('password', 30);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_logins');
    }
};