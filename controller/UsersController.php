<?php
	
include(base_path("models/UsersModel.php"));

class UsersController extends SiteController{
	public $usersModel;

	function __construct()
	{
		parent::__construct();
		$this->usersModel = new UsersModel();
	}

	public function index()
	{
		$getUsers = $this->usersModel->getListing();

		$this->adminLayout("users/list", [
			"users" => $getUsers
		]);
	}

	public function add()
	{
		if(isset($_POST) && $_POST)
		{
			$_POST['password'] = md5($_POST['password']);
			$this->usersModel->create($_POST);

			header("Location: ".base_url("users"));
			die;
		}

		$this->adminLayout("users/add");
	}

	public function delete($id)
	{
		$this->usersModel->remove($id);

		header("Location: ".base_url("users"));
		die;
	}

	public function edit($id)
	{
		$user = $this->usersModel->getRow($id);

		if(isset($_POST) && $_POST)
		{
			if(isset($_POST['password']) && $_POST['password'] != "")
			{
				$_POST['password'] = md5($_POST['password']);
			}
			else 
			{
				unset($_POST['password']);
			}
			$this->usersModel->edit($id, $_POST);

			header("Location: ".base_url("users"));
			die;
		}

		$this->adminLayout("users/edit", [
			"user" => $user
		]);
	}
}

