<?php
/**
 * Created by PhpStorm.
 * User: Razzaru
 * Date: 31.10.2016
 * Time: 20:07
 */

namespace App\Models;


use T4\Core\Exception;
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

    protected function validateCategory($v)
    {
        if (empty($v)) {
            throw new Exception('Enter category name');
        }
        if(strlen($v) > 100) {
            throw new Exception('Category name is too long');
        }
    }

    protected function sanitizeTitle($v)
    {
        $title = mb_strtolower($v);
        $title = str_replace(' ', '', $title);
        return $title;
    }

    protected function validatePictureName($v)
    {
        if (!empty ($v)) {
            if (!strpos($v, '.jpg')) {
                if (!strpos($v, '.png')) {
                    throw new Exception('Sorry bro, you can upload only jpg and png files');
                }
            }
        }
    }
}