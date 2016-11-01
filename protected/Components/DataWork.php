<?php

namespace App\Components;


use App\Models\Category;
use App\Models\Item;
use T4\Core\Collection;

class DataWork
{
    static public function findAllLastCats()
    {
        $cats = Category::findAll();
        $data = new Collection();
        foreach ($cats as $cat) {
            if($cat->parent && $cat->children[0]) {
                $data[] = $cat;
            }
        }
        return $data;
    }

    static public function findBikeCats()
    {
        $cats = Category::findAll();
        $data = new Collection();
        foreach ($cats as $cat) {
            if($cat->parent->title === 'bikes') {
                $data[] = $cat;
            }
        }
        return $data;
    }

    static public function findAccessoiresCats()
    {
        $cats = Category::findAll();
        $data = new Collection();
        foreach ($cats as $cat) {
            if($cat->parent->title === 'accessories') {
                $data[] = $cat;
            }
        }
        return $data;
    }

    static public function findClothingCats()
    {
        $cats = Category::findAll();
        $data = new Collection();
        foreach ($cats as $cat) {
            if($cat->parent->title === 'clothing') {
                $data[] = $cat;
            }
        }
        return $data;
    }
    
    static public function getTitleForUrl(Item $item)
    {
        $arr = explode(' ', $item->model_name);
        $str = implode('-', $arr);
        $str = preg_replace("/[^a-zA-ZА-Яа-я0-9-\s]/", "", $str);
        $str = mb_strtolower($str);
        return $str;
    }
}