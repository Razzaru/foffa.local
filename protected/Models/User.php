<?php

namespace App\Models;

use T4\Orm\Model;

/**
 * Class User
 * @package App\Models
 *
 */
class User
    extends Model
{
    static protected $schema = [
        'table' => '__users',
        'columns' => [
            'email' => ['type' => 'string'],
            'password' => ['type' => 'string'],
            'firstName' => ['type' => 'string', 'length' => 50],
            'lastName' => ['type' => 'string', 'length' => 50]  ,
            'avatar' => ['type' => 'string'],
            'isBlocked' => ['type' => 'boolean']
        ],
        'relations' => [
            'roles' => ['type' => self::MANY_TO_MANY, 'model' => Role::class],
            'items' => ['type' => self::MANY_TO_MANY, 'model' => Item::class, 'by' => '__users_to_items'],
            'session' => ['type' => self::HAS_ONE, 'model' => UserSession::class]
        ]
    ];

}