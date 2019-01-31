<?php

namespace App\Imports;

use App\Citizen;
use Maatwebsite\Excel\Concerns\ToModel;

class CitizenImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Citizen([
            //
        ]);
    }
}
