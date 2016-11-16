<?php

namespace App\Controllers;


use App\Components\DataWork;
use App\Models\Category;
use App\Models\Item;
use T4\Mvc\Controller;

/**
 * Class Bikes
 * @package App\Controllers
 */
class Bikes
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
        $this->data->categories = DataWork::findBikeCats();
    }

    public function actionCategory($cat = null)
    {
        $category = Category::findByTitle($cat);
        $this->data->category = $category;
        $this->data->items = $category->items;
    }
    
    public function actionOneItem($url)
    {
        $this->data->item = Item::findByUrl($url);
        var_dump($this->data->item);die;
    }
}