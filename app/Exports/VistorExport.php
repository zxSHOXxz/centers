<?php

namespace App\Exports;

use App\Models\Vistor;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class VistorExport implements FromCollection , WithHeadings
{
    public function headings():array{
        return[
            'id' ,
            'vistor_name' ,
             'mobile' ,
             'date' ,
              'status',
              'location'
        ];
        }

    public function collection()
    {
        return Vistor::select('id' , 'vistor_name' , 'mobile' , 'date' , 'status', 'location')->get();
    }
}
