<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    use HasFactory;

    protected $table = 'animals';

    protected $fillable = [
        'name',
        'species',
        'breed',
        'age',
        'gender',
        'description',
        'image_url',
        'is_adopted',
    ];

    protected $casts = [
        'is_adopted' => 'boolean',
    ];
}
