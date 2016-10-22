<?php

namespace App\Controllers;

use App\Components\GetStyle;
use App\Models\Characteristic;
use App\Models\Email;
use App\Models\Feature;
use App\Models\Item;
use App\Components\Queries;
use T4\Core\Exception;
use T4\Mvc\Controller;

class Index
    extends Controller
{

    public function actionDefault()
    {
        $lastFeaturedArticleQuery = Queries::getLastFeaturedArticle();
        $lastTwoItemsQuery = Queries::getLastTwoItems();
        $this->data->featuredArticle = Item::findAllByQuery($lastFeaturedArticleQuery)[0];
        $this->data->featuredItems = Item::findAllByQuery($lastTwoItemsQuery);
        $this->data->features = Feature::findAll();
    }

    public function actionSaveEmail($email)
    {
        try {
            $em = new Email();
            $em->fill($email);
            $em->save();
            $this->redirect('http://foffa.local');
        } catch (Exception $e) {
            var_dump($e);die;
        }
    }
    
    public function actionTest()
    {
    }

}