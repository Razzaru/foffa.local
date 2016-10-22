<?php

namespace App\Controllers;

use App\Components\Queries;
use App\Models\Article;
use T4\Mvc\Controller;

class News
    extends Controller
{
    public function actionDefault()
    {
        $this->data->articles = Article::findAll();
    }

    public function actionArticle($id)
    {
        $this->data->article = Article::findByPK($id);
    }

    public function actionAddarticle()
    {
        
    }
    public function actionSavearticle($article)
    {
        $newArticle = new Article();
        $query = Queries::getLastArticle();
        $lastStyle = Article::findByQuery($query)->style;

        if ($lastStyle == 0) {
            $newArticle->style = 1;
        } else {
            $newArticle->style = 0;
        }
        
        $newArticle->fill($article);
        $newArticle->save();
    }
}