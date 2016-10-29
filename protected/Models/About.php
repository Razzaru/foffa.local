<?php

namespace App\Models;

use T4\Orm\Model;

class About
    extends Model
{
    static protected $schema = [
        'table' => 'about',
        'columns' => [
            'title' => ['type' => 'string'],
            'lead' => ['type' => 'text'],
            'article' => ['type' => 'text'],
            'pictureName' => ['type' => 'string']
        ]
    ];

}