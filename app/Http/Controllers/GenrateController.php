<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class eController extends Controller
{
    public function code(){

    $string = 'PO-12010001';
    $id = substr($string, -4, 4);

    $newID = $id+1;
    $newID = str_pad($newID, 4, '0', STR_PAD_LEFT);

    echo "PO-1201".$newID;
    }
}