<?php

namespace App\Exports;

use App\Models\Trainer;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TrainerExport implements FromCollection , WithHeadings
{
    public function headings():array{
        return[
            'id' ,
            'first_name' ,
             'last_name' ,
             'mobile' ,
              'salary_type',
              'salary_value'
        ];
        }

    public function collection()
    {
        return Trainer::select('id' , 'first_name' , 'last_name' , 'mobile' , 'salary_type', 'salary_value')->get();
        // return collect(Student::getStudent());
    }
}
