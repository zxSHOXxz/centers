<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialPayment extends Model
{
    use HasFactory;
    public function group(){
       return $this->belongsTo(Group::class);
    }
    public function payment(){
       return $this->hasMany(Payment::class);
    }
}
