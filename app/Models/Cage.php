<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cage extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'type',
        'IsOccuped',
        'img_url',
        'lunchtimeFirst',
        'checkFirstLunchtime',
        'lunchtimeTwo',
        'checkSecondLunchtime',
    ];

    public function animals(){
        return $this->hasMany(Animal::class);
    }
}
