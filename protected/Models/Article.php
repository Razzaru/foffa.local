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
        if (strlen($v) > 255) {
            throw new Exception('Слишком длинное название');
        }
        return true;
    }

    protected function validateDescription($v)
    {
        if (strlen($v) > 255) {
            throw new Exception('Слишком длинное описание');
        }
        return true;
    }

    protected function validatePictureName($v)
    {
        if ($v) {
            if (!strpos($v, '.')) {
                throw new Exception('Неверный формат картинки');
            }
            return true;
        }
    }

    protected function sanitizeIs_featured($v)
    {
        if ($v === 'on') {
            return 1;
        }
        return '0';
    }
}