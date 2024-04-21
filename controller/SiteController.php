<?php
	
	class SiteController {
		function __construct()
		{
			$this->checkAuth();
		}

		function checkAuth()
		{
			session_start();

			if(isset($_SESSION['user']) && $_SESSION['user'] && isset($_SESSION['user']['id']) && $_SESSION['user']['id'])
			{
				if($_SERVER['PATH_INFO'] == "/auth/login")
				{
					header("Location: ".base_url("welcome"));
					die;
				}
			}
			else
			{
				if($_SERVER['PATH_INFO'] != "/auth/login")
				{
					header("Location: ".base_url("auth/login"));
					die;
				}
			}
		}

		function adminLayout($path = null, $variables = [], $partials = true)
		{
			if(file_exists(base_path("views/partials/header.php")) && $partials)
			{
				include base_path("views/partials/header.php");
			}
			if(isset($path) && $path)
			{
				extract($variables);
				include base_path("views/".$path.".php");
			}
			if(file_exists(base_path("views/partials/footer.php")) && $partials)
			{
				include base_path("views/partials/footer.php");
			}
		}

		function OuterLayout($path = null, $variables = [], $partials = true)
		{
			if(file_exists(base_path("views/partials/header-outer.php")) && $partials)
			{
				include base_path("views/partials/header-outer.php");
			}
			if(isset($path) && $path)
			{
				extract($variables);
				include base_path("views/".$path.".php");
			}
			if(file_exists(base_path("views/partials/footer-outer.php")) && $partials)
			{
				include base_path("views/partials/footer-outer.php");
			}
		}
	}

