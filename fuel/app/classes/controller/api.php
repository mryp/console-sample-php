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
    
    public function post_ping()
    {
        $termid = Input::post("termid", '1');
        $datetime = Input::post("datetime", '');
        $unixtime = Input::post("unixtime", '');
        $result = Model_Ping::addRecord($termid, $datetime, $unixtime);
        
        return $this->response($result); 
    }
}
