<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TranierGroup extends Model
{
    use HasFactory;
    public function traner_groups(){
        return $this->hasMany(Group::class , Tranier::class ,
        'tranier_groups' ,
        'trainer_id' ,
        'group_id' ,
        'id' );
    }
}

