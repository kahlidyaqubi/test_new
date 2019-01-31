<?php

namespace App\Imports;

use App\Project;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProjectExport implements FromCollection,WithHeadings
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
     //
    public $the_collection;
    public function __construct($the_collection)
    {
        //dd(Project::all());
        $this->the_collection = $the_collection;
    }
    public function headings(): array
    {
        return [
            '#',
            'اسم المشروع',
            'الكود','المدير','الممول','المشرف','المنسق','حالة المشروع','تاريخ البدء','تاريخ الانتهاء'
        ];
    }
    public function collection()
    {
        return $this->the_collection;
    }
}
