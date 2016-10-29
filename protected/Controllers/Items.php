<?php

namespace App\Controllers;

use App\Components\GetStyle;
use App\Models\Characteristic;
use App\Models\Item;
use T4\Mvc\Controller;

class Items
    extends Controller
{

    public function access($action)
    {
        if ($this->app->user->isBlocked == '1') {
            return false;
        }
        return true;
    }
    
    public function actionDefault()
    {
        $items = Item::findAll();
        $reverseItems = $items->reverse();
        $this->data->items = $reverseItems;
    }

    public function actionItem($id)
    {
        $this->data->item = Item::findByPK($id);
    }
}