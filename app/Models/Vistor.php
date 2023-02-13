<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vistor extends Model
{
    use HasFactory;
    public function recepion(){
        return $this->belongsTo(Recepion::class);
    }
    public function the_visit(){
        return $this->hasMany(TheVisit::class);
    }
}
