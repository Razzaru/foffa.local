<?php

namespace App\Models;

use T4\Orm\Model;

class Item
    extends Model
{
    static protected $schema = [
        'columns' => [
            'characteristic_id' => ['type' => 'int'],
            'model_name' => ['type' => 'string'],
            'description' => ['type' => 'string'],
            'is_featured' => ['type' => 'boolean'],
            'pictureName' => ['type' => 'string'],
            'style' => ['type' => 'boolean']
        ],
        'relations' => [
            'characteristic' => ['type' => self::BELONGS_TO, 'model' => Characteristic::class]
        ]
    ];
}