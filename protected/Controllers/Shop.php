<?php

namespace App\Controllers;

use App\Components\DataWork;
use App\Components\Queries;
use App\Models\Item;
use T4\Mvc\Controller;

class Shop
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
        $this->data->categories = DataWork::findAllLastCats();
    }
    
    public function actionOneItem($url)
    {
        $this->data->item = Item::findByUrl($url);
    }
}