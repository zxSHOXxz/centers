<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Finance extends Model
{
    use HasFactory;
    public function students(){
        return $this->hasMany(Student::class);
    }
    public function paids(){
        return $this->hasMany(Paid::class);
    }
    public function curances(){
        return $this->hasMany(Curance::class);
    }
}
