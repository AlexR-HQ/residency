<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $table = "animal";
    protected $fillable = [
        'nombre', 'especie', 'genero'
    ];

    public $timestamps = false;
}
