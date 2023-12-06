<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propinsi extends Model
{
    use HasFactory;
    protected $table = 'propinsi';
    protected $fillable = [
        'id_prop',
        'nama_prop',
    ];

    protected $hidden = [];
}
