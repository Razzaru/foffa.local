<?php

namespace App\Controllers;

use App\Models\Article;
use T4\Mvc\Controller;

class News
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
        $articles = Article::findAll();
        $reversedArticles = $articles->reverse();
        $this->data->articles = $reversedArticles;
    }

    public function actionArticle($id)
    {
        $article = Article::findByPK($id);
        $this->data->article = $article;
    }
}