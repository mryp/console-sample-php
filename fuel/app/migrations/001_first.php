<?php
namespace Fuel\Migrations;

class First
{
    function up()
    {
        \DBUtil::create_table('ping', array(
            'id' => array('type' => 'int', 'constraint' => 11, 'auto_increment' => true, 'unsigned' => true),
            'termid' => array('type' => 'int', 'constraint' => 11),
            'param_datetime' => array('type' => 'datetime'),
            'param_unixtime' => array('type' => 'int', 'constraint' => 11),
            'created_at' => array('type' => 'datetime'),
        ), array('id'), false, 'InnoDB');
        \DBUtil::create_index('ping', 'param_datetime', 'ping_param_datetime');
        
        \DBUtil::create_table('point', array(
            'id' => array('type' => 'int', 'constraint' => 11, 'auto_increment' => true, 'unsigned' => true),
            'termid' => array('type' => 'int', 'constraint' => 11),
            'type' => array('type' => 'int', 'constraint' => 11),
            'value' => array('type' => 'int', 'constraint' => 11),
            'created_at' => array('type' => 'datetime'),
        ), array('id'), false, 'InnoDB');
        
        \DBUtil::create_index('point', 'type', 'point_type');
        \DBUtil::create_index('point', 'value', 'point_value');
    }

    function down()
    {
        \DBUtil::drop_table('ping');
        \DBUtil::drop_table('point');
    }
}