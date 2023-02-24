<?php

namespace App\Imports;

use App\Models\info_traffic;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TundaBayarImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new info_traffic([
            'date' => $row['date'],
            'company' => $row['company'],
            'gate' => $row['gate'],
            'class' => $row['class'],
            'traffic' => $row['traffic'],
            'source' => $row['source'],
        ]);
    }
    //import
}
