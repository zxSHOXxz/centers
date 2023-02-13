<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasFactory , HasRoles , HasApiTokens,SoftDeletes;

    protected $hidden = [
        'created_at',
        'updated_at',
        'expires_at'
    ];

    public function getNameAttribute()
    {
        return $this->user->first_name;
    }

    public function getFullNameAttribute()
    {
        return $this->user->first_name . " " . $this->user->last_name;
    }

    public function getImagesAttribute()
    {
        return $this->image;
    }

    public function user(){
        return $this->morphOne(User::class , 'actor' , 'actor_type' , 'actor_id' , 'id');
    }

    public function city(){
        return $this->belongsTo(City::class);
    }

}

