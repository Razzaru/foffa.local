<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1477147542_updateDescription
    extends Migration
{

    public function up()
    {
        $this->dropColumn('items', 'description');
        $this->addColumn('items', ['description' => ['type' => 'text']]);
    }

    public function down()
    {
        $this->dropColumn('items', 'description');
    }
    
}