<?php

namespace App\Controllers;

use T4\Mvc\Controller;
use App\Components\DataWork;
use App\Components\GetStyle;
use App\Models\Article;
use App\Models\Category;
use App\Models\Characteristic;
use App\Models\Item;

class Moderator
    extends Controller
{
    public function access($action)
    {
        if (!empty($this->app->user)) {
            if ($this->app->user->roles[0]->name === 'admin' || $this->app->user->roles[0]->name === 'moderator') {
                if ($this->app->user->isBlocked == '1') {
                    return false;
                }
                return true;
            }
            return false;
        }
    }
    
    public function actionDefault() 
    {
        
    }

    public function actionArticles()
    {
        $this->data->articles = Article::findAll();
    }

    public function actionUpdateArticle($id = null, $article = null)
    {
        if(null !== $id) {
            $art = Article::findByPK($id);
            $this->data->article = $art;
        } else {
            $this->redirect('/moderator/articles');
        }
        if(null !== $article)
        {
            if(!empty($_FILES['article']['name']['image'])) {
                $picture = $art->pictureName;
                if(!empty($picture)) {
                    unlink(ROOT_PATH_PUBLIC . '/images/news/' . $picture);
                }
                move_uploaded_file($_FILES['article']['tmp_name']['image'], ROOT_PATH_PUBLIC . '/images/news/' . $_FILES['article']['name']['image']);
                $art->pictureName = $_FILES['article']['name']['image'];
            }
            $art->fill($article);
            $art->save();
            $this->redirect('/moderator/articles');
        }
    }

    public function actionDeleteArticle($id = null)
    {
        if (null !== $id) {
            $article = Article::findByPK($id);
            $picture = $article->pictureName;
            if(!empty($picture)) {
                unlink(ROOT_PATH_PUBLIC . '/images/news/' . $picture);
            }
            $article->delete();
            $this->redirect('/moderator/articles');
        } else {
            $this->redirect('/moderator/items');
        }
    }

    public function actionAddArticle($article = null)
    {
        if (null !== $article) {
            if (!$article->is_featured) {
                $article->is_featured = '0';
            }
            $newArticle = new Article();
            move_uploaded_file($_FILES['article']['tmp_name']['image'], ROOT_PATH_PUBLIC . '/images/news/' . $_FILES['article']['name']['image']);
            $newArticle->fill($article);
            $newArticle->pictureName = $_FILES['article']['name']['image'];
            $newArticle->style = GetStyle::getArticleStyle();
            $newArticle->save();
            $this->redirect('/moderator/articles');
        }
    }

    public function actionItems()
    {
        $this->data->items = Item::findAll();
    }

    public function actionUpdateItem($id = null, $item = null, $characteristic = null)
    {
        if (null !== $id) {
            $oldItem = Item::findByPK($id);
            $oldCharacteristic = $oldItem->characteristic;
            $this->data->item = $oldItem;
            $this->data->characteristic = $oldCharacteristic;
        } else {
            $this->redirect('/moderator/items');
        }
        if (null !== $item) {
            if(!empty($_FILES['item']['name']['image'])) {
                $picture = $oldItem->pictureName;
                if(!empty($picture)) {
                    unlink(ROOT_PATH_PUBLIC . '/images/items/' . $picture);
                }
                move_uploaded_file($_FILES['item']['tmp_name']['image'], ROOT_PATH_PUBLIC . '/images/items/' . $_FILES['item']['name']['image']);
                $oldItem->pictureName = $_FILES['item']['name']['image'];
            }
            $oldItem->fill($item);
            $oldItem->save();
            $oldCharacteristic->fill($characteristic);
            $oldCharacteristic->save();
            $this->redirect('/moderator/items');
        }
    }

    public function actionDeleteItem($id = null)
    {
        if (null !== $id) {
            $item = Item::findByPK($id);
            $picture = $item->pictureName;
            if(!empty($picture)) {
                unlink(ROOT_PATH_PUBLIC . '/images/items/' . $picture);
            }
            $item->delete();
            $this->redirect('/moderator/items');
        } else {
            $this->redirect('/moderator/items');
        }
    }

    public function actionAddItem($item = null, $category = null, $characteristic = null)
    {
        $characteristics = Characteristic::findAll();
        $this->data->characteristics = $characteristics;
        $this->data->categories = DataWork::findCatsWithoutChildren();

        if (null !== $item) {
            if(!$item->is_featured) {
                $item->is_featured = '0';
            }
            $newItem = new Item();
            move_uploaded_file($_FILES['item']['tmp_name']['image'], ROOT_PATH_PUBLIC . '/images/items/' . $_FILES['item']['name']['image']);
            $newItem->fill($item);
            $newItem->pictureName = $_FILES['item']['name']['image'];
            $newItem->style = GetStyle::getItemStyle();
            if(null !== $category) {
                $newItem->category = Category::findByPK($category);
            }
            if(empty ($characteristic->frame)) {
                $newItem->__characteristic_id = $_POST['presetCharacteristic'];
            } else {
                $char = new Characteristic();
                $char->fill($characteristic);
                $char->save();
                $newItem->__characteristic_id = $char->getPk();
            }
            $newItem->url = DataWork::getTitleForUrl($newItem);
            $newItem->save();
            $this->redirect('/moderator/items');
        }
    }
}