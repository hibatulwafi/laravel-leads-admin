<?php

namespace App\Exports;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class LeadExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('leads')->select('name','phone','email','referral','step','created_at','updated_at')->get();

    }

    public function headings(): array
    {
        return ["name", "phone", "email", "referral", "step", "created_at", "updated_at"];
    }
}
