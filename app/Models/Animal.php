<?php

namespace App\Models;

use App\Models\Cage;
use App\Models\Family;
use App\Models\Storie;
use App\Models\Adoptant;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Animal extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    protected $fillable = [
        'name',
        'race',
        'age',
        'gender',
        'status',
        'family_id',
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
        return $this->belongsTo(Cage::class);
    }
}
