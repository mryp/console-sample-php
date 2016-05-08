<?php
/**
 * ポイントデータテーブルクラス
 */ 
class Model_Point extends \Model_Crud
{
    protected static $_table_name = 'point';
    protected static $_properties = array(
        'id',
        'termid',
        'type',
        'value',
        'created_at',
    );
    protected static $_mysql_timestamp = true;
    protected static $_created_at = 'created_at';
    //protected static $_updated_at = '';   //使用しない
    
    
}
