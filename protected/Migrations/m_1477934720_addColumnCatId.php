<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1477934720_addColumnCatId
    extends Migration
{

    public function up()
    {
        $this->addColumn('items', [
            '__category_id' => ['type' => 'link'],
        ]);
    }

    public function down()
    {
        $this->dropColumn('items', ['__category_id']);
    }
    
}