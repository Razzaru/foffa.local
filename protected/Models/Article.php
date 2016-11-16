<?php

namespace App\Models;

use T4\Core\Exception;
use T4\Orm\Model;

class Article
    extends Model
{
    static protected $schema = [
        'table' => 'news',
        'columns' => [
            'title' => ['type' => 'string'],
            'description' => ['type' => 'string'],
            'lead' => ['type' => 'text'],
            'article' => ['type' => 'text'],
            'is_featured' => ['type' => 'boolean'],
            'pictureName' => ['type' => 'string'],
            'style' => ['type' => 'boolean']
        ]
    ];

    protected function validateTitle($v)
    {
        if(empty($v)) {
            throw new Exception('Please, enter the article title');
        }
        if (strlen($v) > 255) {
            throw new Exception('Title is too long');
        }
    }

    protected function validateDescription($v)
    {
        if (strlen($v) > 255) {
            throw new Exception('Description is too long');
        }
    }

    protected function sanitizeIs_featured($v)
    {
        if ($v === 'on') {
            return 1;
        }
        return '0';
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