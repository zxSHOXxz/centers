<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function admins(){
        return $this->hasMany(Admin::class);
    }
    public function trainers(){
        return $this->hasMany(Trainer::class);
    }
}
