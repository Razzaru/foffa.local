<?php
/**
 * Created by PhpStorm.
 * User: Razzaru
 * Date: 31.10.2016
 * Time: 21:26
 */

namespace App\Controllers;


use App\Components\DataWork;
use T4\Mvc\Controller;

class Bikes
    extends Controller
{
    public function actionDefault()
    {
        $this->data->categories = DataWork::findBikeCats();
    }
}