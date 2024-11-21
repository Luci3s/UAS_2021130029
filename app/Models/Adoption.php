<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adoption extends Model
{
    use HasFactory;
    protected $fillable = [
        'adopter_id',
        'animal_id',
        'adopted_at'
    ];

    public function adopter()
    {
        return $this->belongsTo(Adopter::class);
    }

    // Relasi dengan Animal
    public function animal()
    {
        return $this->belongsTo(Animal::class);
    }
}
