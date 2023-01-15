<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poslastica extends Model
{
    use HasFactory;

    protected $fillable = ['naziv', 'recept', 'vrstaId', 'ukusId'];

    protected $table = 'poslastice';
}
