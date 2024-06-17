<?php

namespace App\Traits;

/*
* Trait HasFormatRupiah
*/
trait HasFormatRupiah
{
    function formatRupiah($fields, $prefix = 'Rp')
    {
        $prefix = $prefix ? $prefix: 'Rp';
        $nominal =  $this->attributes[$fields];
        return $prefix . number_format($nominal, 0, ',', '.');
    }
}


?>