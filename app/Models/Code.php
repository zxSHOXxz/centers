<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    use HasFactory;
    // public  $incrementing = false;

    public function student(){
        return $this->belongsTo(Student::class);
    }
    public function group(){
        return $this->belongsTo(Group::class);
    }
}
