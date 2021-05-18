<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storie extends Model
{
    use HasFactory;

    protected $fillable = [
        'animal_id',
        'description',
        'updated_at',
    ];

    public function animal(){
        $this->belongsTo(Animal::class);
    }
}
