<?php

namespace App\Models;

use App\Models\Specie;
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

    public function specie(){
        $this->belongsTo(Specie::class);
    }

    public function stories(){
        $this->hasMany(Storie::class);
    }

    public function adoptant(){
        $this->hasOne(Adoptant::class);
    }

    public function cage(){
        $this->hasOne(Cage::class);
    }
}
