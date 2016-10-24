<?php

namespace App\Controllers;


use App\Models\Article;
use T4\Mvc\Controller;

class Admin
    extends Controller
{

    public function access($action)
    {
        if (!empty($this->app->user)) {
            if($this->app->user->roles[0]->name === 'admin') {
                return true;
            }
        }
        return false;
    }

    /**
     * @TODO admin panel
     */
    public function actionDefault()
    {
        
    }

    public function actionArticles()
    {
        $this->data->articles = Article::findAll();
    }

    public function actionUpdateArticle($id, $updData = null)
    {
        $this->data->article = Article::findByPK($id);

        if(null !== $article)
        {
            $article = new Article();
            $article->fill($updData);
            $article->save();
            $this->redirect('/admin/articles');
        }
    }

    public function actionDeleteArticle($id)
    {
        
    }

}