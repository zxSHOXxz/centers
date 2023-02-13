<?php

namespace App\Exports;

use App\Models\Group;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class GroupsExport implements FromCollection , WithHeadings
{
    public function headings():array{
        return[
            'id' ,
            'group_name' ,
            // 'name_en' ,
            'dayes'
        ];
    }

    public function collection()
    {
        return Group::select('id' , 'group_name' , 'dayes')->get();
        // return collect(Student::getStudent());
    }
}
