<?php
/**
 * コンソール画面コントローラー
 */
class Controller_Console extends Controller_Template
{
	public $template = 'template';
	
	/**
	 * 起動前処理
	 */
	public function before()
	{
		$this->template = 'template_cl';
		parent::before();
		
		$method = Uri::segment(2);
		if ($method != "login" && !Auth::check())
		{
			//まだログインしていない
			Response::redirect('console/login');
		}
	}
	
	/**
	 * ログイン
	 */
	public function action_login()
	{
		$data = array();
		if (Input::post())
		{
			if (Auth::login(Input::post('username'), Input::post('password')))
			{
				Response::redirect('console/index');
				return;
			}
			else
			{
				$data['username'] = Input::post('username');
				$data['error_message'] = 'ユーザー名またはパスワードが異なります';
			}
		}
		
		$this->template = View::forge('template_login');
		$this->template->content = View::forge('console/login', $data);
	}
	
	/**
	 * ログアウト
	 */ 
	public function action_logout()
	{
       	Auth::logout();
		Response::redirect('console/login');
	}
	
	/**
	 * ユーザー設定
	 */
	public function action_profile()
	{
		$data = array();
		if (Input::post())
		{
			$data['username'] = Auth::get('username');
			$data['email'] = Input::post('email', '');
			$data['groupname'] = Auth::group('Simplegroup')->get_name(Auth::get('group'));
			if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL))
			{
				$data['error_message'] = "メールアドレスのフォーマットが不正です";
			}
				
			if (!isset($data['error_message']))
			{
				if (Auth::update_user(
					array('email' => $data['email'])
				))
				{
				$data['success_message'] = "更新処理が正常に完了しました";
				}
			}
		}
		else
		{
			$data['username'] = Auth::get('username');
			$data['email'] = Auth::get('email');
			$data['groupname'] = Auth::group('Simplegroup')->get_name(Auth::get('group'));
		}
		
		$this->template->content = View::forge('console/profile', $data);
		$this->template->set('title', 'ユーザー設定');
		$this->template->content->set('title', 'ユーザー設定');
	}
	
	/**
	 * ダッシュボード
	 */
	public function action_index()
	{
		$this->template->content = View::forge('console/index');
		$this->template->set('title', 'ダッシュボード');
		$this->template->content->set('title', 'ダッシュボード');
	}
	
	/**
	 * 集計
	 */
	public function action_table()
	{
		$this->template->content = View::forge('console/table');
		$this->template->set('title', '集計');
		$this->template->content->set('title', '集計');
	}
}
