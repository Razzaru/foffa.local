<?php

namespace App\Migrations;

use T4\Orm\Migration;

class m_1477935880_addColumnPictureName
    extends Migration
{

    public function up()
    {
        $this->addColumn('categories', [
            'pictureName' => ['type' => 'string'],
        ]);
    }

    public function down()
    {
        $this->dropColumn('categories', ['pictureName']);
    }
    
}