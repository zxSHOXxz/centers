<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TheVisit extends Model
{
    use HasFactory;
    public function vistor(){
        return $this->belongsTo(Vistor::class);
    }
}
