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
        Schema::create('homes', function (Blueprint $table) {
            $table->id();
            $table->string('header')->default('PPMRJ');
            $table->string('subheader')->default('Bandung Selatan');
            $table->string('description')->default('Pondok Pesantren Mahasiswa Roudhotul Jannah (PPMRJ) Bandung Selatan menyediakan lingkungan yang kondusif untuk belajar dan berkembang, menggabungkan pendidikan agama dengan studi akademis.');
            $table->integer('guruCount')->default(0);
            $table->integer('studentCount')->default(0);
            $table->integer('alumniCount')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homes');
    }
};
