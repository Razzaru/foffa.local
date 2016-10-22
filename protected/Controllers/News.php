<?php

namespace App\Controllers;

use App\Components\GetStyle;
use App\Components\Queries;
use App\Models\Article;
use T4\Mvc\Controller;

class News
    extends Controller
{
    public function actionDefault()
    {
        $articles = Article::findAll();
        $reversedArticles = $articles->reverse();
        $this->data->articles = $reversedArticles;
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
        move_uploaded_file($_FILES['article']['tmp_name']['image'], ROOT_PATH_PUBLIC . '/images/news/' . $_FILES['article']['name']['image']);
        $newArticle->fill($article);
        $newArticle->pictureName = $_FILES['article']['name']['image'];
        $newArticle->style = GetStyle::getStyle();
        $newArticle->save();
        $this->redirect('http://foffa.local/news');
    }
}