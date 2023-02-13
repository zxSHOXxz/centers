<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public function diplomas(){
        return $this->hasMany(Diploma::class);
    }

    public function groups(){
        return $this->hasMany(Group::class);
    }


    public function timelines(){
        return $this->belongsToMany(Timeline::class , 'room_timelines');
    }
}
