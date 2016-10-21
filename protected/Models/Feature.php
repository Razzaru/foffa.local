<?php

namespace App\Models;

use T4\Orm\Model;

class Feature
    extends Model
{
    static protected $schema = [
        'columns' => [
            'title' => ['type' => 'string'],
            'description' => ['type' => 'string'],
            'logo' => ['type' => 'string']
        ]
    ];
}