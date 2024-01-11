<?php

namespace App\Exports;

use App\Models\RT;
use Maatwebsite\Excel\Concerns\FromCollection;

class RTExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return RT::all();
    }
}
