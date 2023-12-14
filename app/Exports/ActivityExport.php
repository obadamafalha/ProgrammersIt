<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Spatie\Activitylog\Models\Activity;

class ActivityExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Activity::all();
    }
    public function headings(): array
    {
        return [
            'ID',
            'log name',
            'description',
            'subject type',
            'event',
            'subject id',
            'causer type',
            'causer id ',
            'properties',
            'batch uuid',
            'created at',
            'updated at',
        ];
    }
}
