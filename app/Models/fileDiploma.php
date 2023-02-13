<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fileDiploma extends Model
{
    use HasFactory;
    public function course(){
        return $this->belongsTo(Diploma::class);
    }
}
