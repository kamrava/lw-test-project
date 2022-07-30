<?php

namespace App\Services\Excel\Import;

class ImportServers
{
    public static function getRows($from = 2, $take = 10): array
    {
        $file_name = 'LeaseWeb_servers_filters_assignment.xlsx';
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load($file_name);
        $sheet = $spreadsheet->getActiveSheet();
        $items = [];

        foreach ($sheet->getRowIterator($from, ($from + $take)) as $key=>$row) {
            foreach ($row->getCellIterator('A', 'E') as $cell) {
                $items[$key][] = $cell->getValue();
            }
        }
        return $items;
    }
}
