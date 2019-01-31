<?php

namespace App\Imports;

use App\Account;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AccountsExport implements FromCollection,WithHeadings
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
        $this->the_collection = $the_collection;
    }
    public function headings(): array
    {
        return [
            '#',
            'رقم المستخدم',
            'اسم المستخدم',
            'الإسم كاملا',
            'الهاتف',
            'البريد الإلكتروني'
        ];
    }
    public function collection()
    {
        return $this->the_collection;
    }
}
