<?php

namespace App\Controllers;

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
}