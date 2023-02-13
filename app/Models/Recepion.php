<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recepion extends Model
{
    use HasFactory;
    public function vistors(){
        return $this->hasMany(Vistor::class);
    }
    public function connections(){
        return $this->hasMany(Connection::class);
    }
}
