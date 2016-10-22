<?php

namespace App\Models;

use T4\Orm\Model;

class Characteristic
    extends Model
{
    static protected $schema = [
        'columns' => [
            'frame' => ['type' => 'string'],
            'rims' => ['type' => 'string'],
            'hubs' => ['type' => 'string'],
            'tyres' => ['type' => 'string'],
            'crankset' => ['type' => 'string'],
            'bottom_bracket' => ['type' => 'string'],
            'chain_kmc' => ['type' => 'string'],
            'bars' => ['type' => 'string'],
            'stem' => ['type' => 'string'],
            'tape' => ['type' => 'string'],
            'brakes' => ['type' => 'string'],
            'calipers' => ['type' => 'string'],
            'seatpost' => ['type' => 'string'],
            'saddle' => ['type' => 'string'],
            'pedals' => ['type' => 'string'],
            'weight' => ['type' => 'int'],
        ],
        'relations' => [
            'items' => ['type' => self::HAS_MANY, 'model' => Item::class]
        ]
    ];
}