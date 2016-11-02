<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1478031085_addColumnUrls
    extends Migration
{

    public function up()
    {
        $this->addColumn('items', [
            'url' => ['type' => 'string'],
        ]);
    }

    public function down()
    {
        $this->dropColumn('items', ['url']);
    }
    
}