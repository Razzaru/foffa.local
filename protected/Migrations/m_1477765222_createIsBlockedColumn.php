<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1477765222_createIsBlockedColumn
    extends Migration
{

    public function up()
    {
        $this->addColumn('__users', [
            'isBlocked' => ['type' => 'boolean']
        ]);
    }

    public function down()
    {
        $this->dropColumn('__users', ['isBlocked']);
    }
    
}