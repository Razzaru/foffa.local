<?php
/**
 * Created by PhpStorm.
 * User: Razzaru
 * Date: 31.10.2016
 * Time: 20:07
 */

namespace App\Models;


use T4\Orm\Model;

class Category
    extends Model
{
    static protected $schema = [
        'table' => 'categories',
        'columns' => [
            'category' => ['type' => 'string'],
            'title' => ['type' => 'string'],
            'pictureName' => ['type' => 'string']
        ],
        'relations' => [
            'items' => ['type' => self::HAS_MANY, 'model' => Item::class]
        ]
    ];

    static protected $extensions = [
        'tree'
    ];
}