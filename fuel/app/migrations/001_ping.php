<?php
namespace Fuel\Migrations;

class Ping
{
    function up()
    {
        \DBUtil::create_table('ping', array(
            'id' => array('type' => 'int', 'constraint' => 11, 'auto_increment' => true, 'unsigned' => true),
            'termid' => array('type' => 'varchar', 'constraint' => 16),
            'param_datetime' => array('type' => 'datetime'),
            'param_unixtime' => array('type' => 'int', 'constraint' => 11),
            'created_at' => array('type' => 'datetime'),
            'updated_at' => array('type' => 'datetime'),
        ), array('id'), false, 'InnoDB');
        
        \DBUtil::create_index('ping', 'param_datetime');
    }

    function down()
    {
        \DBUtil::drop_table('ping');
    }
}