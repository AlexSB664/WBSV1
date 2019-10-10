<?php

namespace App\Controller\Component;

class CustomSort
{
    private $colum;
    public function arrayMultipleSort(&$array, $colum, $direction)
    {
        $this->colum = $colum;
        // usort($array, function ($a, $b) {
        //     return strcmp($a[$this->colum], $b[$this->colum]);
        // });

        // foreach ($array as $row) {
        //     echo implode(',', $row);
        //     echo ('<br>');
        // }
        usort($array, function ($a, $b) {
            return strcmp($b[$this->colum], $a[$this->colum]);
        });
        $this->resetPosition($array, $colum);
    }
    public function resetPosition(&$array, $colum)
    {
        $count = 1;
        $real_count = 1;
        $tmpValue = 0;
        foreach ($array as $key => $record) {
            if ($key === array_key_first($array)) {
                $tmpValue = $array[$key][$colum];
            }
            if (!($array[$key][$colum] === $tmpValue)) {
                $count = $real_count;
                $tmpValue = $array[$key][$colum];
            }
            $array[$key]['position'] = $count;
            $real_count++;
        }
    }
}
