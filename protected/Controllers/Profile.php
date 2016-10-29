<?php

namespace App\Controllers;

use App\Components\Queries;
use App\Models\Item;
use App\Models\User;
use T4\Mvc\Controller;

class Profile
    extends Controller
{
    public function access($action)
    {
        if(!empty($this->app->user)) {
            return true;
        }
        return false;
    }

    public function actionDefault()
    {
        $this->data->user = $this->app->user;
    }

    /**
     * @param null $user
     * @param null $itemId
     * @param null $deleteItemId
     * @throws \T4\Core\MultiException
     *
     * @TODO Удаление итемов из профиля
     */
    public function actionEdit($user = null, $itemId = null, $deleteItemId = null)
    {
        $this->data->user = $this->app->user; 
        $this->data->items = Item::findAll();
        if (null !== $user) {
            $this->app->user->fill($user);
            if (null !== $itemId)
            {
                $item = Item::findByPK($itemId);
                $this->app->user->items->add($item);
            }
            if (null !== $deleteItemId) {
                
            }
            $this->app->user->save();
            $this->redirect('/profile');
        }
    }
}