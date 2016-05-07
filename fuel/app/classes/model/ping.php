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
    
    public static function getRangeData($termid, $targetdate, $usecollumn)
    {
        $dataList = null;
        if (strtotime($targetdate) != 0)
        {
            $findParam = array(
                'where' => array()
            );
            
            if ($termid != 0)
            {
                array_push($findParam['where'], array('termid' => $termid));
            }
            if ($usecollumn == 'param_unixtime')
            {
                $start = strtotime($targetdate . ' 0:00:00');
                $end = strtotime($targetdate . ' 23:59:59');
                array_push($findParam['where'], array('param_unixtime', '>=', $start));   
                array_push($findParam['where'], array('param_unixtime', '<=', $end));
            }
            else
            {
                array_push($findParam['where'], array('param_datetime', 'between', array($targetdate . ' 0:00:00', $targetdate . ' 23:59:59')));   
            }
            $dataList = Model_Ping::find($findParam);   
        }
        
        return $dataList;
    }
    
}