<?php

namespace App\Models;

use T4\Orm\Model;
use T4\Core\Exception;

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
/*
    protected function validateFrame($v)
    {
        if ($v === '') {
            throw new Exception('Enter frame name');
        }
        if(strlen($v) > 50) {
            throw new Exception('Frame name is too long');
        }
    }

    protected function validateRims($v)
    {
        if ($v === '') {
            throw new Exception('Enter rums name');
        }
        if(strlen($v) > 100) {
            throw new Exception('Rims name is too long');
        }
    }

    protected function validateHubs($v)
    {
        if ($v === '') {
            throw new Exception('Enter hubs name');
        }
        if(strlen($v) > 150) {
            throw new Exception('Hubs name is too long');
        }
    }

    protected function validateTyres($v)
    {
        if ($v === '') {
            throw new Exception('Enter tyres name');
        }
        if(strlen($v) > 50) {
            throw new Exception('Tyres name is too long');
        }
    }

    protected function validateCrankset($v)
    {
        if ($v === '') {
            throw new Exception('Enter crankset name');
        }
        if(strlen($v) > 50) {
            throw new Exception('Crankset name is too long');
        }
    }

    protected function validateChain_kmc($v)
    {
        if ($v === '') {
            throw new Exception('Enter chain kmc name');
        }
        if(strlen($v) > 50) {
            throw new Exception('Chain kmc name is too long');
        }
    }

    protected function validateBars($v)
    {
        if ($v === '') {
            throw new Exception('Enter bars name');
        }
        if(strlen($v) > 50) {
            throw new Exception('Bars name is too long');
        }
    }

    protected function validateStem($v)
    {
        if ($v === '') {
            throw new Exception('Enter stem name');
        }
        if(strlen($v) > 50) {
            throw new Exception('Stem name is too long');
        }
    }

    protected function validateTape($v)
    {
        if ($v === '') {
            throw new Exception('Enter tape name');
        }
        if(strlen($v) > 50) {
            throw new Exception('Tape name is too long');
        }
    }

    protected function validateBrakes($v)
    {
        if ($v === '') {
            throw new Exception('Enter brakes name');
        }
        if(strlen($v) > 150) {
            throw new Exception('Brakes name is too long');
        }
    }

    protected function validateCalipers($v)
    {
        if ($v === '') {
            throw new Exception('Enter calipers name');
        }
        if(strlen($v) > 50) {
            throw new Exception('Calipers name is too long');
        }
    }

    protected function validateSeatpost($v)
    {
        if ($v === '') {
            throw new Exception('Enter seatpost name');
        }
        if(strlen($v) > 50) {
            throw new Exception('Seatpost name is too long');
        }
    }

    protected function validateSaddle($v)
    {
        if ($v === '') {
            throw new Exception('Enter saddle name');
        }
        if(strlen($v) > 50) {
            throw new Exception('Saddle name is too long');
        }
    }

    protected function validatePedals($v)
    {
        if ($v === '') {
            throw new Exception('Enter pedals name');
        }
        if(strlen($v) > 50) {
            throw new Exception('Pedals name is too long');
        }
    }

    protected function validateWeight($v)
    {
        $weight = +$v;
        if(!is_int($weight)) {
            throw new Exception('Wow, weight can\'t be a string or smth!');
        }
    }
*/
}