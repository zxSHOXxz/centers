<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curance extends Model
{
    use HasFactory;
    public function finance(){
        return $this->belongsTo(Finance::class );
    }
}
