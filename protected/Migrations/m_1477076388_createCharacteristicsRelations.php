<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1477076388_createCharacteristicsRelations
    extends Migration
{

    public function up()
    {
        $this->addColumn('characteristics', [
            '__item_id' => ['type' => 'link']
        ]);
    }

    public function down()
    {
        $this->dropColumn('characteristics', '__item_id');
    }
    
}