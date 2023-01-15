<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ukus extends Model
{
    use HasFactory;

    protected $fillable = ['ukus'];

    protected $table = 'ukusi';
}
