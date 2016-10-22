<?php

namespace App\Components;


use App\Models\Item;

class GetStyle
{
    static public function getArticleStyle()
    {
        $lastStyle = Item::findByQuery(Queries::getLastArticle())->style;
        
        if ($lastStyle == 0) {
            return 1;
        } 
        return 0;
        
    }
    
    static public function getItemStyle()
    {
        $lastStyle = Item::findByQuery(Queries::getLastItem())->style;

        if ($lastStyle == 0) {
            return 1;
        }
        return 0;

    }
}