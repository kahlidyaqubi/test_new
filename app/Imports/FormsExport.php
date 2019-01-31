<?php

namespace App\Imports;

use App\Form;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class FormsExport implements FromCollection,WithHeadings
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
            'الإسم الأول',
            'إسم الأب',
            'إسم الجد',
            'إسم العائلة',
            'رقم الهوية',
            'فئة شكوى',
            'الموضوع',
            'اسم المشروع',
            'حالة المشروع',
            'تاريخ الإرسال',
            'الحالة',
            'النوع',
            'طريقة الإرسال',
            'المحتوى'
        ];
    }
    public function collection()
    {
        return $this->the_collection;
    }
}
