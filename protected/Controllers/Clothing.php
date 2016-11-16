<?php
/**
 * Created by PhpStorm.
 * User: Razzaru
 * Date: 31.10.2016
 * Time: 21:45
 */

namespace App\Controllers;


use App\Components\DataWork;
use T4\Mvc\Controller;
use App\Models\Category;
use App\Models\Item;

class Clothing
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
        $this->data->categories = DataWork::findClothingCats();
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