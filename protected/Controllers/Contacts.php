<?php

namespace App\Controllers;

use T4\Mvc\Controller;

/**
 * Class Contacts
 * @package App\Controllers
 *
 * @TODO отсылать сообщения
 */
class Contacts
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

    }
}