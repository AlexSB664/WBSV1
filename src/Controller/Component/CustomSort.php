<?php

namespace App\Controller\Component;

class CustomSort
{
    private $colum;
    public function arrayMultipleSort(&$array,$colum,$direction){
        $this->colum=$colum;
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
    }
}
