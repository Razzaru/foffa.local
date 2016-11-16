<?php

namespace App\Models;

use T4\Core\Exception;
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

    protected function validateTitle($v)
    {
        if(strlen($v) > 255) {
            throw new Exception('Title is too long');
        }
    }

    protected function validatePictureName($v)
    {
        if (!empty ($v)) {
            if (!strpos($v, '.jpg')) {
                if (!strpos($v, '.png')) {
                    throw new Exception('Sorry bro, you can upload only jpg and png files');
                }
            }
        }
    }
}