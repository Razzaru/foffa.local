<?php

namespace App\Controllers;


use T4\Mvc\Controller;
use App\Models\Feature;
use App\Models\Item;
use App\Components\Queries;

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

}