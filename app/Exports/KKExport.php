<?php

namespace App\Exports;

use App\Models\KK;
use Maatwebsite\Excel\Concerns\FromCollection;

class KKExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return KK::all();
    }
}
