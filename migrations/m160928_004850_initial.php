<?php

use yii\db\Migration;

class m160928_004850_initial extends Migration
{
    public function up()
    {
        $this->createTable('extended_tags', array(
            'tag' => 'varchar(255)'
        ), '');

        $this->createTable('user_tags', array(
            'user' => 'int(11) NOT NULL',
            'tag' => 'varchar(255)',
            'weight' =>  'int(11)',
        ), '');

        $this->addPrimaryKey('extended_tags_pk', 'extended_tags', 'tag');
        $this->addPrimaryKey('user_tags_pk', 'user_tags', ['user', 'tag']);
    }

    public function down()
    {
        $this->dropTable('extended_tags');
        $this->dropTable('user_tags');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
