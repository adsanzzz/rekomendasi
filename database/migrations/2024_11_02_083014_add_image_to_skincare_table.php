<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageToSkincareTable extends Migration
{
    public function up()
    {
        // Schema::table('skincare', function (Blueprint $table) {
        //     $table->string('image')->nullable(); // Kolom untuk menyimpan nama file gambar
        // });
    }

    public function down()
    {
        // Schema::table('skincare', function (Blueprint $table) {
        //     $table->dropColumn('image');
        // });
    }
}
