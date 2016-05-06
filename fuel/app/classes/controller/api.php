<?php
/**
 * 端末公開APIコントローラー
 */
class Controller_Api extends Controller_Rest
{
    public function get_test()
    {
        $data = array('test' => 'aiueo');
        return $this->response($data);
    }
}