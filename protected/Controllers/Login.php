<?php

namespace App\Controllers;

use App\Components\Auth\Identity;
use App\Components\Auth\MultiException;
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
                $this->redirect('/');
            } catch (MultiException $e) {
                $this->data->errors = $e;
            }
        }
    }

}