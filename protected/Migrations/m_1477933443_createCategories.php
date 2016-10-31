<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1477933443_createCategories
    extends Migration
{

    public function up()
    {
        $this->createTable('categories', [
            'category' => ['type' => 'string'],
        ], [], ['tree']);
    }

    public function down()
    {
        $this->dropTable('categories');
    }
    
}