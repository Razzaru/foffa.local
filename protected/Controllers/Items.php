<?php

namespace App\Controllers;

use App\Components\DataWork;
use App\Components\GetStyle;
use App\Models\Category;
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
        $this->data->categories = DataWork::findAllLastCats();
    }
}