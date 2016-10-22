<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1477126007_dropColumnItemId
    extends Migration
{

    public function up()
    {
        $this->dropColumn('characteristics', '__item_id');
    }

    public function down()
    {
        $this->addColumn('characteristics', '__item_id');
    }
    
}