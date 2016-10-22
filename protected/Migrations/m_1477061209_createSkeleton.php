<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1477061209_createSkeleton
    extends Migration
{

    public function up()
    {
        $this->createTable('news', [
            'title' => ['type' => 'string'],
            'description' => ['type' => 'string'],
            'lead' => ['type' => 'text'],
            'article' => ['type' => 'text'],
            'is_featured' => ['type' => 'boolean'],
            'pictureName' => ['type' => 'string'],
            'style' => ['type' => 'boolean']
        ]);

        $this->createTable('items', [
            'model_name' => ['type' => 'string'],
            'description' => ['type' => 'string'],
            'is_featured' => ['type' => 'boolean'],
            'pictureName' => ['type' => 'string'],
            'style' => ['type' => 'boolean']
        ]);

        $this->createTable('features', [
            'title' => ['type' => 'string'],
            'description' => ['type' => 'string'],
            'logo' => ['type' => 'string']
        ]);

        $this->createTable('characteristics', [
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
        ]);
    }

    public function down()
    {
        $this->dropTable('news');
        $this->dropTable('items');
        $this->dropTable('features');
        $this->dropTable('characteristics');
    }
    
}