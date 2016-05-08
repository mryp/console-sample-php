<?php
namespace Fuel\Migrations;

class Point
{
    function up()
    {
        \DBUtil::create_table('point', array(
            'id' => array('type' => 'int', 'constraint' => 11, 'auto_increment' => true, 'unsigned' => true),
            'termid' => array('type' => 'varchar', 'constraint' => 16),
            'type' => array('type' => 'int', 'constraint' => 11),
            'value' => array('type' => 'int', 'constraint' => 11),
            'created_at' => array('type' => 'datetime'),
        ), array('id'), false, 'InnoDB');
        
        \DBUtil::create_index('point', 'type');
        \DBUtil::create_index('point', 'value');
    }

    function down()
    {
        \DBUtil::drop_table('point');
    }
}