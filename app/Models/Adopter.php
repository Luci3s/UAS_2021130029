<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adopter extends Model
{

    public function animals()
    {
        return $this->belongsToMany(Animal::class, 'adoptions');
    }

    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'address'
    ];


}
