<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1477757539_createAvatarColumn
    extends Migration
{

    public function up()
    {
        $this->addColumn('__users', [
            'avatar' => ['type' => 'string']
        ]);
    }

    public function down()
    {
        $this->dropColumn('__users', ['avatar']);
    }
    
}