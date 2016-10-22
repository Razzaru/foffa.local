<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1477142693_createEmails
    extends Migration
{

    public function up()
    {
        $this->createTable('emails', [
            'email' => ['type' => 'string']
        ]);
    }

    public function down()
    {
        $this->dropTable('emails');
    }
    
}