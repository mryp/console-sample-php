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
}
