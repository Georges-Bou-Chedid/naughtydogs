<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class History extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function pet(){
        return $this->hasOne(Pet::class);
    }

    public function vaccine(){
        return $this->hasMany(Vaccine::class);
    }

    public function deworming(){
        return $this->hasMany(Deworming::class);
    }

    public function annualvaccin(){
        return $this->hasMany(Annualvaccin::class);
    }

    public function tridewor(){
        return $this->hasMany(Tridewor::class);
    }

    public function kyste(){
        return $this->hasMany(Kyste::class);
    }

    public function monthly(){
        return $this->hasMany(Monthly::class);
    }

    public function previous(){
        return $this->hasMany(Previous::class);
    }
}
