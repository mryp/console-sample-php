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
	
	/**
	 * ユーザー一覧
	 */
	public function action_optionuser()
	{
		if (Input::post())
		{
			$deleteIdList = Input::post("delete");
			if (count($deleteIdList) > 0)
			{
				foreach (array_keys($deleteIdList) as $id)
				{
					$user = Model_Users::find_one_by('id', $id);
					if ($user != null)
					{
						Auth::delete_user($user['username']);
						break;
					}
				}
			}
		}
		
		$this->template->content = View::forge('console/optionuser');
		$this->template->set('title', 'ユーザー一覧');
		$this->template->content->set('title', 'ユーザー一覧');
	}
	
	/**
	 * ユーザー追加
	 */
	public function action_optionadduser()
	{
		$data = array();
		$data['username'] = Input::post("username", '');
		$data['email'] = Input::post("email", '');
		$data['groupid'] = Input::post("groupid", '');
		$data['password'] = Input::post("password", '');
		$data['passwordcnf'] = Input::post("passwordcnf", '');
		if (Input::post())
		{
			$val = Validation::forge();
			$val->add('username', 'ユーザー名')
				->add_rule('required')
				->add_rule('min_length', 3)
				->add_rule('valid_string', array('alpha', 'numeric', 'dashes'));
			$val->add('email', 'メールアドレス')
				->add_rule('required')
				->add_rule('valid_email');
			$val->add('groupid', '権限グループ')
				->add_rule('required');
			$val->add('password', 'パスワード')
				->add_rule('required')
				->add_rule('min_length', 6)
				->add_rule('max_length', 20);				
			
			if ($data['password'] != $data['passwordcnf'])
			{
				$data['error_message'] = "パスワードと確認用パスワードが一致しません";
			}
			else
			{
				if ($val->run())
				{
					try
					{
						if (Auth::create_user($val->validated('username')
						, $val->validated('password')
						, $val->validated('email')
						, $val->validated('groupid')))
						{
							$data['username'] = '';
							$data['email'] = '';
							$data['groupid'] = '';
							$data['password'] = '';
							$data['passwordcnf'] = '';
							$data['success_message'] = $val->validated('username') . "を追加しました";
						}
						else
						{
							$data['error_message'] = "ユーザーの追加に失敗しました";
						}
					}
					catch (Exception $e) 
					{
						$data['error_message'] = "ユーザーの追加に失敗しました<br />" . $e->getMessage();
					}
				}
				else 
				{
					$data['error_message'] = $val->show_errors();
				}
			}
		}
		
		$this->template->content = View::forge('console/optionadduser', $data);
		$this->template->set('title', 'ユーザー追加');
		$this->template->content->set('title', 'ユーザー追加');
		if (isset($data['error_message']))
		{		
			$this->template->content->set_safe('error_message', $data['error_message']);
		}
	}
	
	/**
	 * ユーザー一括追加
	 */ 
	public function action_optioncsvuser()
	{
		$data = array();
		if (Input::post())
		{ 
			Upload::process(array(
				'path' => APPPATH . 'tmp/csvuser',
   				'randomize' => true,
    			'ext_whitelist' => array('csv', 'txt'),
			));
			
			if (Upload::is_valid())
			{
				Upload::save();
				$file = Upload::get_files(0);
		
				if (isset($file['error']) && $file['error'] == false)
				{
					$filePath = $file['saved_to'] . $file['saved_as'];
					$count = Model_Users::createUserFromCsvFile($filePath);
					if ($count > 0)
					{
						$data['success_message'] = $count . " 件のデータを登録しました";
					}
					else
					{
						$data['error_message'] = "登録可能なデータが見つかりませんでした。<br />書式が間違っているか、すべて登録済みの可能性があります。";
					}
				}
				else
				{
					$data['error_message'] = "ファイルの保存に失敗しました";
				}
			}
			else
			{
				$data['error_message'] = "ファイルのアップロードに失敗しました";
			}
		}
		
		$this->template->content = View::forge('console/optioncsvuser', $data);
		$this->template->set('title', 'ユーザー一括追加');
		$this->template->content->set('title', 'ユーザー一括追加');
		if (isset($data['error_message']))
		{		
			$this->template->content->set_safe('error_message', $data['error_message']);
		}
	}
	
	/**
	 * REST API
	 */
	public function action_restapi()
	{
		$this->template->content = View::forge('console/restapi');
		$this->template->set('title', 'REST API テスト');
		$this->template->content->set('title', 'REST API テスト');
	}
	
	/**
	 * PINGテーブル
	 */
	public function action_ping()
	{
		$this->template->content = View::forge('console/ping');
		$this->template->set('title', 'PINGテーブル');
		$this->template->content->set('title', 'PINGテーブル');
	}
}
