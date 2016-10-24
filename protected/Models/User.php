<?php

namespace App\Models;

use T4\Orm\Model;

class User
    extends Model
{
    static protected $schema = [
        'table' => '__users',
        'columns' => [
            'email' => ['type' => 'string'],
            'password' => ['type' => 'string'],
            'firstName' => ['type' => 'string', 'length' => 50],
            'lastName' => ['type' => 'string', 'length' => 50]  
        ],
        'relations' => [
            'roles' => ['type' => self::MANY_TO_MANY, 'model' => Role::class],
            'items' => ['type' => self::MANY_TO_MANY, 'model' => Item::class]
        ]
    ];

}