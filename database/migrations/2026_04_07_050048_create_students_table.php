<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->char('nim', 10);
            $table->string('nama'); // default length 255 jika tidak ditentukan
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('prodi');
            $table->decimal('ipk', 3, 2); // total digit 3, 2 angka di belakang koma
            $table->string('alamat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
