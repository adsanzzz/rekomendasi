<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('skincare', function (Blueprint $table) {
            $table->id('id');
            $table->string('nama');
            $table->string('merk');
            $table->string('kategori');
            $table->string('cocok_untuk');
            $table->integer('harga');
            $table->string('bahan');
            $table->string('link')->nullable();
            $table->string('gambar')->nullable(); // Kolom untuk menyimpan nama file gambar
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('skincare');
    }
};
