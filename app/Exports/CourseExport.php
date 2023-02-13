<?php

namespace App\Exports;

use App\Models\Course;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CourseExport implements FromCollection , WithHeadings
{
    public function headings():array{
        return[
            'id' ,
            'course_name' ,
             'course_code' ,
             'start_date',
              'end_date'
        ];
    }

    public function collection()
    {
        return Course::select('id' , 'course_name' , 'course_code' , 'start_date', 'end_date')->get();
        // return collect(Student::getStudent());
    }
}
