<?php

namespace App\Controllers;

use App\Components\Auth\Identity;
use App\Components\Auth\MultiException;
use App\Models\Item;
use App\Models\User;
use T4\Mvc\Controller;

class Login
    extends Controller
{

    public function access($action)
    {
        if ($this->app->user->isBlocked == '1') {
            return false;
        }
        return true;
    }
    
    public function actionDefault($user = null)
    {
        if (null !== $user) {
            try {
                $login = new Identity();
                $login->login($user);
                if($this->app->user->roles[0]->name === 'admin') {
                    $this->redirect('/admin');
                }
                $this->redirect('/');
            } catch (MultiException $e) {
                $this->data->errors = $e;
            }
        }
    }
    
    public function actionRegistration($user = null)
    {
        $this->data->items = Item::findAll();
        if(null !== $user) {
            try {
                if(!empty($_FILES['user'])) {
                    $user->avatar = $_FILES['user']['name']['avatar'];
                    move_uploaded_file($_FILES['user']['tmp_name']['avatar'], ROOT_PATH_PUBLIC . '/images/users/' . $_FILES['user']['name']['avatar']);
                }
                $login = new Identity();
                $login->register($user);
                $login->login($user);
                if($this->app->user->roles[0]->name === 'admin') {
                    $this->redirect('/admin');
                }
                $this->redirect('/');
            } catch (\T4\Core\MultiException $e) {
                $this->data->errors = $e;
            }
        }
    }

    public function actionLogout()
    {
        $session = $this->app->user->session;
        $session->delete();
        Identity::logout();
        $this->redirect('/');
    }

}