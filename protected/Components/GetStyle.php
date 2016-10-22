<?php

namespace App\Components;


use App\Models\Item;

class GetStyle
{
    static public function getStyle()
    {
        $lastStyle = Item::findByQuery(Queries::getLastArticle())->style;
        
        if ($lastStyle == 0) {
            return 1;
        } 
        return 0;
        
    }
}