<?php
/**
 * 接続PINGデータテーブルクラス
 */ 
class Model_Ping extends \Model_Crud
{
    protected static $_table_name = 'ping';
    protected static $_properties = array(
        'id',
        'termid',
        'param_datetime',
        'param_unixtime',
        'created_at',
        'updated_at',
    );
    protected static $_mysql_timestamp = true;
    protected static $_created_at = 'created_at';
    protected static $_updated_at = 'updated_at';
    
    public static function addRecord($termid, $datetime, $unixtime)
    {
        $data = self::forge(array(
            'termid' => $termid,
            'param_datetime' => $datetime,
            'param_unixtime' => $unixtime,
        ));
        
        return $data->save();
    }
}