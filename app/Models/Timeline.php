<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    use HasFactory;
    // public function groups(){
    //     return $this->belongsToMany(Group::class , 'group_timelines');
    // }
    // public function rooms(){
    //     return $this->belongsToMany(Room::class , 'room_timelines');
    // }

    // public function groups(){
    //     return $this->hasMany(Group::class );
    // }

    // public function rooms(){
    //     return $this->hasMany(Room::class );
    // }

}
