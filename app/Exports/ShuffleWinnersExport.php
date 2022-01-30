<?php

namespace App\Exports;

use App\Models\Shuffle;
use Maatwebsite\Excel\Concerns\{
    FromCollection, ShouldAutoSize, WithHeadings, WithEvents
};
use Maatwebsite\Excel\Events\AfterSheet;

class ShuffleWinnersExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents
{
    private $shuffle_id;

    public function __construct($shuffle_id)
    {
         $this->shuffle_id = $shuffle_id;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Shuffle::find($this->shuffle_id)->shuffleParticipants()->winners()->get([
            'discord_username', 'twitter_username', 'wallet_address', 'ip_address'
        ]);
    }

    public function headings(): array
    {
        return ["Discord", "Twitter", "Wallet Address", "IP Address"];
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:D1'; // All headers
                $event->sheet->getStyle($cellRange)->getFill()
                    ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
                    ->getStartColor()->setARGB('FFFFFF00');

                $event->sheet->getStyle($cellRange)->getFont()->setBold(true);
            },
        ];
    }
}
