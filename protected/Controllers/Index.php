<?php

namespace App\Controllers;

use App\Components\GetStyle;
use App\Models\Characteristic;
use App\Models\Feature;
use App\Models\Item;
use App\Components\Queries;
use T4\Mvc\Controller;

class Index
    extends Controller
{

    public function actionDefault()
    {
        $lastFeaturedArticleQuery = Queries::getLastFeaturedArticle();
        $lastTwoLeadsQuery = Queries::getLastTwoLeads();
        $this->data->featuredArticle = Item::findAllByQuery($lastFeaturedArticleQuery)[0];
        $this->data->leads = Item::findAllByQuery($lastTwoLeadsQuery);
        $this->data->features = Feature::findAll();
    }
    
    public function actionTest()
    {
        GetStyle::getStyle();
    }

}