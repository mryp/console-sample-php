<?php
/**
 * コンソール画面コントローラー
 */
class Controller_Console extends Controller_Template
{
	public $template = 'template';
		
	public function before()
	{
		$this->template = 'template_cl';
		parent::before();
	}
	
	public function action_index()
	{
		$this->template->content = View::forge('console/index');
		$this->template->content->set('title', 'index');
	}
}