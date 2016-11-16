<?php

namespace App\Models;

use T4\Orm\Model;

/**
 * Class Role
 * @package App\Models
 *
 */
class Role
    extends Model
{
    static protected $schema = [
        'table' => '__user_roles',
        'columns' => [
            'name' => ['type' => 'string'],
            'title' => ['type' => 'string']
            ],
        'relations' => [
            'users' => ['type' => self::MANY_TO_MANY, 'model' => User::class]
        ]
    ];
}