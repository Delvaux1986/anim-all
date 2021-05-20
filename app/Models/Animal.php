<?php

namespace App\Models;

use App\Models\Family;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'race',
        'age',
        'gender',
        'status',
        'specie_id',
        'img_url'
    ];

    public function family(){
        return $this->belongsTo(Family::class);
    }

    public function stories(){
        return $this->hasMany(Storie::class);
    }

    public function adoptant(){
        return $this->hasOne(Adoptant::class);
    }

    public function cage(){
        return $this->hasOne(Cage::class);
    }
}
