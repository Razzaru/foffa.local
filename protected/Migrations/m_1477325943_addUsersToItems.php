<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1477325943_addUsersToItems
    extends Migration
{

    public function up()
    {
        $this->createTable('__users_to_items', [
            '__user_id' => ['type' => 'link'],
            '__item_id' => ['type' => 'link']
        ]);
    }

    public function down()
    {
        $this->dropTable('____users_to_items');
    }
    
}