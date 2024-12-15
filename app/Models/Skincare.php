<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skincare extends Model
{
    use HasFactory;

    protected $table = 'skincare';

    protected $fillable = ['nama', 'merk', 'kategori', 'cocok_untuk', 'harga', 'bahan','link', 'gambar'];

}
