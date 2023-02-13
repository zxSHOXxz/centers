<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    public function diploma(){
        return $this->belongsTo(diploma::class);
    }
    public function files(){
        return $this->hasMany(fileCourse::class);
    }
    public function trainer(){
        return $this->belongsTo(Trainer::class);
    }
}
