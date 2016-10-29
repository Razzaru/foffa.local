<?php

namespace App\Controllers;


use App\Components\GetStyle;
use App\Models\Article;
use App\Models\Characteristic;
use App\Models\Item;
use App\Models\Role;
use App\Models\User;
use T4\Mvc\Controller;

class Admin
    extends Controller
{

    public function access($action)
    {
        if (!empty($this->app->user)) {
            if ($this->app->user->roles[0]->name === 'admin') {
                if ($this->app->user->isBlocked == '1') {
                    return false;
                }
                return true;
            }
            return false;
        }
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

    public function actionUpdateArticle($id = null, $article = null)
    {
        if(null !== $id) {
            $art = Article::findByPK($id);
            $this->data->article = $art;
        } else {
            $this->redirect('/admin/articles');
        }
        if(null !== $article)
        {
            $art->fill($article);
            $art->save();
            $this->redirect('/admin/articles');
        }
    }

    public function actionDeleteArticle($id = null)
    {
        if (null !== $id) {
            $article = Article::findByPK($id);
            $article->delete();
            $this->redirect('/admin/articles');
        } else {
            $this->redirect('/admin/items');
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
            $this->redirect('/admin/articles');
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
            $this->redirect('/admin/items');
        }
        
        if (null !== $item) {
            $oldItem->fill($item);
            $oldItem->save();
            $oldCharacteristic->fill($characteristic);
            $oldCharacteristic->save();
            $this->redirect('/admin/items');
        }

    }
    
    public function actionDeleteItem($id = null)
    {
        if (null !== $id) {
            $item = Item::findByPK($id);
            $item->delete();
            $this->redirect('/admin/items');
        } else {
            $this->redirect('/admin/items');
        }
    }

    public function actionAddItem($item = null, $characteristic = null)
    {
        $characteristics = Characteristic::findAll();
        $this->data->characteristics = $characteristics;

        if (null !== $item) {
            if(!$item->is_featured) {
                $item->is_featured = '0';
            }
            $newItem = new Item();
            move_uploaded_file($_FILES['item']['tmp_name']['image'], ROOT_PATH_PUBLIC . '/images/items/' . $_FILES['item']['name']['image']);
            $newItem->fill($item);
            $newItem->pictureName = $_FILES['item']['name']['image'];
            $newItem->style = GetStyle::getItemStyle();
            if(empty ($characteristic->frame)) {
                $newItem->__characteristic_id = $_POST['presetCharacteristic'];
            } else {
                $char = new Characteristic();
                $char->fill($characteristic);
                $char->save();
                $newItem->__characteristic_id = $char->getPk();
            }
            $newItem->save();
            $this->redirect('/admin/items');
        }
    }

    /**
     * @TODO манипуляции пользователями и всякое такое
     * @TODO непонятно как убрать что-либо из коллекции
     */
    public function actionUsers()
    {
        $this->data->users = User::findAll();
    }

    public function actionUproleUser($id)
    {
        $admin = Role::findByName('admin');
        $user = User::findByPK($id);
        $user->roles->add($admin);
        $user->save();
        $this->redirect('/admin/users');
    }

    public function actionDownroleUser($id)
    {
    }

    public function actionDeleteUser($id)
    {
        $user = User::findByPK($id);
        $user->delete();
        $this->redirect('/admin/users');
    }
    
    public function actionBlockUser($id)
    {
        $user = User::findByPK($id);
        $user->isBlocked = true;
        $user->save();
        $this->redirect('/admin/users');
    }

    public function actionUnblockUser($id)
    {
        $user = User::findByPK($id);
        $user->isBlocked = 0;
        $user->save();
        $this->redirect('/admin/users');
    }
}