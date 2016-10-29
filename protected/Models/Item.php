<?php

namespace App\Models;

use T4\Core\Exception;
use T4\Orm\Model;

/**
 * Class Item
 * @package App\Models
 *
 * @TODO полностью переписать систему итемов, добавить дерево категорий (шмотки, байки, аксесуары, etc)
 */
class Item
    extends Model
{
    static protected $schema = [
        'columns' => [
            'model_name' => ['type' => 'string'],
            'description' => ['type' => 'text'],
            'is_featured' => ['type' => 'boolean'],
            'pictureName' => ['type' => 'string'],
            'style' => ['type' => 'boolean']
        ],
        'relations' => [
            'characteristic' => ['type' => self::BELONGS_TO, 'model' => Characteristic::class],
            'users' => ['type' => self::MANY_TO_MANY, 'model' => User::class, 'by' => '__users_to_items']
        ]
    ];

    protected function validateModel_name($v)
    {
        if (strlen($v) > 255) {
            throw new Exception('Слишком длинное название модели');
        }
        return true;
    }

    protected function sanitizeIs_featured($v)
    {
        if ($v === 'on') {
            return 1;
        }
        return '0';
    }
}