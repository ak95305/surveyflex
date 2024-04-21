<?php
	
include(base_path("models/UsersModel.php"));

class AuthController extends SiteController{
	public $usersModel;

	function __construct()
	{
		parent::__construct();
		$this->usersModel = new UsersModel();
	}

	public function login()
	{
		if(isset($_POST) && $_POST)
		{
			$user = $this->usersModel->getWhere(['users.*'], ['users.email' => $_POST['email'], 'users.password' => md5($_POST['password'])]);
			$user = current($user);

			if(isset($user) && $user && !empty($user) && count($user) > 0)
			{
				session_start();

				$_SESSION['user'] = $user;

				header("Location: ".base_url("welcome"));
				die;
			}
		}

		$this->OuterLayout("users/login");
	}

	public function logout()
	{
		session_destroy();

		header("Location: ".base_url("auth/login"));
		die;
	}
}

