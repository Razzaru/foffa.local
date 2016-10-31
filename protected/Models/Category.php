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
        ],
    ];

    static protected $extensions = [
        'tree'
    ];
}