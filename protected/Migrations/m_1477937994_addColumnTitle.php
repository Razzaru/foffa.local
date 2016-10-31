<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1477937994_addColumnTitle
    extends Migration
{

    public function up()
    {
        $this->addColumn('categories', [
            'title' => ['type' => 'string'],
        ]);
    }

    public function down()
    {
        $this->dropColumn('categories', ['title']);
    }
    
}