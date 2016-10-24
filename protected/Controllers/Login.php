<?php

namespace App\Controllers;

use App\Components\Auth\Identity;
use App\Components\Auth\MultiException;
use App\Models\User;
use T4\Mvc\Controller;

class Login
    extends Controller
{
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

    public function actionProfile()
    {
        $this->data->user = User::findByEmail($this->app->user->email);
    }
    
    public function actionRegistration($user = null)
    {
        if(null !== $user) {
            try {
                $newMember = new User();
                $newMember->fill($user);
                $login = new Identity();
                $login->login($newMember);
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
        Identity::logout();
        $this->redirect('/');
    }

}