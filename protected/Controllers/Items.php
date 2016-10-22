<?php

namespace App\Controllers;

use App\Models\Item;
use T4\Mvc\Controller;

class Items
    extends Controller
{
    public function actionDefault()
    {
        $this->data->items = Item::findAll();
    }

    public function actionItem($id)
    {
        $this->data->item = Item::findByPK($id);
    }

    public function actionAdditem($item)
    {
        
    }
}