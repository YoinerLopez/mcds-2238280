<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

        protected $fillable = [
        'name',
        'image',
        'description',//esta coma se puede dejar o quitar
    ];
}
