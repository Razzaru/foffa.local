<?php

namespace App\Controllers;

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
}