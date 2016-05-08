<?php
/**
 * 公開APIコントローラー
 */
class Controller_Api extends Controller_Rest
{
    /**
     * GET のテスト
     */
    public function get_test()
    {
        $data = array('test' => 'aiueo');
        return $this->response($data);
    }
    
    /**
     * POSTのテスト
     */
    public function post_test()
    {
        $param1 = Input::post("param1", 'nodata');
        
        $data = array(
            'test' => 'aiueo',
            'param1' => $param1,
        );
        return $this->response($data);        
    }
    
    /**
     * PINGデータ一件追加
     */
    public function post_ping()
    {
        $termid = Input::post("termid", 1);
        $datetime = Input::post("datetime", '');
        $unixtime = Input::post("unixtime", '');
        $result = Model_Ping::addRecord($termid, $datetime, $unixtime);
        
        return $this->response($result); 
    }
    
    /**
     * PING大量テスト用データ追加
     */
    public function post_pingbigtestdata()
    {
        $count = Input::post("count", '1');
        $result = Model_Ping::addRecordBigTestData($count);
        
        return $this->response($result); 
    }
    
    /**
     * ポイントデータ一件追加
     */
    public function post_point()
    {
        $termid = Input::post("termid", 1);
        $type = Input::post("type", 1);
        $value = Input::post("value", 1);
        $created_at = Input::post("created_at", '');
        $result = Model_Point::addRecord($termid, $type, $value, $created_at);
        
        return $this->response($result); 
    }
}
