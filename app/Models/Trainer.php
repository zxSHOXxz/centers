<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Trainer extends Authenticatable
{
    use HasFactory,HasRoles;
    public function user(){
        return $this->morphOne(User::class , 'actor' , 'actor_type' , 'actor_id' , 'id');
    }
    

    public function getFullNameAttribute()
    {
        return $this->user->first_name . " " . $this->user->last_name;
    }

    public function getImagesAttribute()
    {
        return $this->image;
    }

    public function diploma(){
        return $this->belongsTo(Diploma::class);
    }

    public function city(){
        return $this->belongsTo(City::class);
    }
    public function trainerEvaluations(){
        return $this->hasMany(TrainerEvaluation::class);
    }

    public function groups(){
        return $this->belongsToMany(Group::class ,
        'tranier_groups' ,
        'tranier_groups' ,
        'trainer_id' ,
        'group_id' ,
        'id' ,
        'id');
    }
    public function course(){
        return $this->hasMany(Course::class);
    }
}
