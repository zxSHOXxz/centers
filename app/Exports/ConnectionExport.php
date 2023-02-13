<?php

namespace App\Exports;

use App\Models\Connection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ConnectionExport implements FromCollection , WithHeadings
{
    public function headings():array{
        return[
            'id' ,
            'name' ,
             'mobile' ,
             'date' ,
              'status',
              'employee',
              'replay_date',
              'location'
        ];
        }

    public function collection()
    {
        return Connection::select('id' , 'name' , 'mobile' , 'date' , 'status', 'location','employee','replay_date')->get();
    }
}
