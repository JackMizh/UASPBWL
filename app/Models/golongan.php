<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class golongan extends Model
{
    use HasFactory;
    protected $fillable = ['gol_kode', 'gol_nama'];
}
