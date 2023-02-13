<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomTimeline extends Model
{
    use HasFactory;
    public function RoomTimeline(){
        return $this->hasMany(Room::class , Timeline::class , 'room_id' , 'timeline_id');
    }
}
