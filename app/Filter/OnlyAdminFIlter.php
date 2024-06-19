<?php

namespace App\Filter;

use JeroenNoten\LaravelAdminLte\Menu\Filters\FilterInterface;
use Laratrust\Laratrust;

class OnlyAdminFilter implements FilterInterface
{
    public function transform($item)
    {
        if (isset($item['onlyAdmin']) && $item['onlyAdmin'] == 'true' && !auth()->user()->isAdmin()) {
            return false;
        }
        
        
        return $item;
    }
}