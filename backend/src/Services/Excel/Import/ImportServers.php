<?php

namespace App\Services\Excel\Import;

class ImportServers
{
    public static function getRows($from = 2, $take = null, $cols = ['A', 'E'], $flatten = false, $unique = false): array
    {
        $file_name = 'LeaseWeb_servers_filters_assignment.xlsx';
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $reader->setReadDataOnly(true);
        $spreadsheet = $reader->load($file_name);
        $sheet = $spreadsheet->getActiveSheet();
        if(!$take) {
            $take = $sheet->getHighestRow() - 1;
        }

        $items = [];

        foreach ($sheet->getRowIterator($from, ($from + $take)) as $key=>$row) {
            foreach ($row->getCellIterator($cols[0], $cols[1]) as $cell) {
                if($flatten) {
                    if($unique) {
                        if(!in_array($cell->getValue(), $items)) {
                            $cell_value = trim($cell->getValue());
                            if(!$cell_value) continue;

                            $items[] = $cell_value;
                        }
                    }
                } else {
                    $items[$key][] = trim($cell->getValue());
                }
            }
        }
        return $items;
    }
}
