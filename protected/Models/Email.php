<?php

namespace App\Models;


use T4\Core\Exception;
use T4\Orm\Model;

class Email
    extends Model
{
    static protected $schema = [
        'columns' => [
            'email' => ['type' => 'string']
        ]
    ];
    
    protected function validateEmail($v)
    {
        if ($v) {
            if(strpos($v, '@')) {
                if (strpos($v, '.')) {
                    return true;
                }
            }
            throw new Exception('Неверный email!');
        }
    }
}