<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GroupTimeline extends Model
{
    use HasFactory;
    public function GroupTimeline(){
        return $this->hasMany(Group::class , Timeline::class , 'group_id' , 'timeline_id');
    }
}
