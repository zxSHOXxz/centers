<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentsExport implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array{
        return[
            'id' ,
            'name_ar' ,
            // 'name_en' ,
            'mobile1'
        ];
    }

    public function collection()
    {
        return Student::select('id' , 'name_ar' , 'mobile1')->get();
        // return collect(Student::getStudent());
    }
}
