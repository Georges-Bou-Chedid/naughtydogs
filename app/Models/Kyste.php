<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kyste extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function history(){
        return $this->belongsTo(History::class);
    }
}