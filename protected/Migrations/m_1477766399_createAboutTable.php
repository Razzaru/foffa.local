<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1477766399_createAboutTable
    extends Migration
{

    public function up()
    {
        $this->createTable('about', [
            'title' => ['type' => 'string'],
            'lead' => ['type' => 'text'],
            'article' => ['type' => 'text'],
            'pictureName' => ['type' => 'string']
        ]);
    }

    public function down()
    {
        $this->dropTable('about');
    }
    
}