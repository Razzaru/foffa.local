<?php

namespace App\Controllers;

use App\Components\DataWork;
use App\Models\Category;
use App\Models\Item;
use T4\Mvc\Controller;

class Accessories
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
        $this->data->categories = DataWork::findAccessoiresCats();
    }

    public function actionCategory($cat)
    {
        $category = Category::findByTitle($cat);
        $this->data->category = $category;
        $this->data->items = $category->items;
    }

    public function actionOneItem($url)
    {
        $this->data->item = Item::findByUrl($url);
    }
}