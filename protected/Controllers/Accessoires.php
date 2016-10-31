<?php

namespace App\Controllers;

use App\Components\DataWork;
use T4\Mvc\Controller;

class Accessoires
    extends Controller
{
    public function actionDefault()
    {
        $this->data->categories = DataWork::findAccessoiresCats();
    }
}