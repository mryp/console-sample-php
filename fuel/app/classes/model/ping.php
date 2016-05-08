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
    );
    protected static $_mysql_timestamp = true;
    protected static $_created_at = 'created_at';
    //protected static $_updated_at = '';   //使用しない
    
    /**
     * 1件分のデータを追加する
     */
    public static function addRecord($termid, $datetime, $unixtime)
    {
        $data = self::forge(array(
            'termid' => $termid,
            'param_datetime' => $datetime,
            'param_unixtime' => $unixtime,
        ));
        
        return $data->save();
    }
    
    /**
     * 指定した件数分のデータ追加する（大量データテスト用）
     */
    public static function addRecordBigTestData($count)
    {
        set_time_limit(600);
        $addCount = 0;
        $now = date('Y/m/d H:i:s');
        $termList = array(1, 2, 3, 4);
        try
        {
            DB::start_transaction();
            
            //指定した件数分を3分に1回のデータとして追加する
            $termIndex = 0;
            $endDateTime = date('Y-m-d') . ' 23:59:59';
            $time = strtotime($endDateTime) - (($count - 1) * 60 * 3);
            for ($i=0; $i<$count; $i++, $termIndex++, $time = $time + (60*3), $addCount++)
            {
                if ($termIndex >= count($termList))
                {
                    $termIndex = 0;
                }
                $termid = $termList[$termIndex];
                
                DB::insert('ping')->set(array(
                    'termid' => $termid,
                    'param_datetime' => date('Y/m/d H:i:s', $time),
                    'param_unixtime' => $time,
                    'created_at' => $now,
                ))->execute();
            }

            DB::commit_transaction();
        }
        catch (Exception $e)
        {
            DB::rollback_transaction();
            throw $e;
        }
        
        return $addCount;
    }
    
    /**
     * 指定した日付のデータを取得する
     */
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
                $findParam['where']['termid'] = $termid;
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
                $start = $targetdate . ' 0:00:00';
                $end = $targetdate . ' 23:59:59';
                array_push($findParam['where'], array('param_datetime', 'between', array($start, $end)));   
            }
            $dataList = Model_Ping::find($findParam);   
        }
        
        return $dataList;
    }
    
}