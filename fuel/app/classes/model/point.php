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
    
    /**
     * 1件分のデータを追加する
     */
    public static function addRecord($termid, $type, $value, $created_at=null)
    {
        $time = $created_at;   
        if ($time == null || $time == '')
        {
            $time = date('Y/m/d H:i:s');
        }
        
        $result = DB::insert('point')->set(array(
            'termid' => $termid,
            'type' => $type,
            'value' => $value,
            'created_at' => $time,
        ))->execute();
        
        return $result;
    }
    
    /**
     * 日付でグループ化したデータ個数を取得する（Chart用）
     */
    public static function getCountGroupDate($targetMonth='')
    {
        $result = array(
            'element' => 'point_date_chart',
            'data' => array(),
            'xkey' => 'date',
            'ykeys' => array('count'),
            'labels' => array('個数'),
            'lineWidth' => 2,
            'pointSize' => 4,
            'lineColors' => array('#ff0000'),
            'smooth' => false,
            'hideHover' => true,
        );
        
        if ($targetMonth == '')
        {
            $targetMonth = date('Y-m');
        }
        $firstDate = date('Y-m-01', strtotime($targetMonth));
        $lastDate = date('Y-m-t', strtotime($targetMonth));
        
        $queryText = 'SELECT DATE(`created_at`) AS `date`, COUNT(*) AS `count`'
            .' FROM `point` WHERE `created_at` BETWEEN \'' . $firstDate . ' 00:00:00\' AND \'' . $lastDate . ' 23:59:59\''
            .' GROUP BY DATE(`created_at`)';
        $recordList = DB::query($queryText)->execute();
        
        //値が0の日付も表示するためにデータを設定する
        for ($date = $firstDate; strtotime($date) < strtotime($lastDate); $date = date('Y-m-d', strtotime($date . ' +1 day')))
        {
            $count = 0;
            foreach ($recordList as $record)
            {
                if ($record['date'] == $date)
                {
                    $count = $record['count'];
                }
            }
            array_push($result["data"], array('date' => $date, 'count' => $count));
        }
        return $result; 
    }
}
