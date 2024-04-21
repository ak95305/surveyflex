<?php

	// GET ENV FILE VARIBALES
	$_ENV = parse_ini_file('.env');

	// INCLUDE CONFIG FILR
	include("./config/config.php");

	// GET BASE URL
	function base_url($path = null, $print = false)
	{
		if($print)
		{
			echo $GLOBALS['config']['base_url'] . "/" . ($path ? $path : '');
		}
		else
		{
			return $GLOBALS['config']['base_url'] . "/" . ($path ? $path : '');
		}
	}

	// GET BASE PATH
	function base_path($path = null, $print = false)
	{
		if($print)
		{
			echo $_SERVER["DOCUMENT_ROOT"] . "/" . $GLOBALS['config']['base_path'] . "/" . ($path ? $path : '');
		}
		else
		{
			return $_SERVER["DOCUMENT_ROOT"] . "/" . $GLOBALS['config']['base_path'] . "/" . ($path ? $path : '');
		}
	}

	// PRINT STATEMENTS
	function pr($data)
	{
		echo "<pre>";
		print_r($data);
		echo "</pre>";
	}

	// Connect DB
	include base_path("config/db/DBConnection.php");
	$DB = new DBConnection();

	// URL ROUTING
	include base_path("controller/SiteController.php");
	include base_path("models/SiteModel.php");

	$urlPath = isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] ? explode("/", $_SERVER['PATH_INFO']) : null;

	unset($urlPath[0]);
	if(isset($urlPath) && $urlPath && is_array($urlPath) && count($urlPath) > 0)
	{
		if(isset($urlPath[1]) && $urlPath[1] && isset($urlPath[2]) && $urlPath[2])
		{
			$controller = $urlPath[1];
			$method = $urlPath[2];
			unset($urlPath[1]);
			unset($urlPath[2]);

			$className = ucfirst($controller)."Controller";

			include base_path("controller/".$className.".php");

			$class = new $className();

			$class->{$method}(...$urlPath);
		}
		elseif(isset($urlPath[1]) && $urlPath[1] && (!isset($urlPath[2]) || !$urlPath[2]))
		{
			$controller = $urlPath[1];
			unset($urlPath[1]);

			$className = ucfirst($controller)."Controller";
			if(file_exists("controller/".$className.".php"))
			{
				include base_path("controller/".$className.".php");
			}
			else
			{
				header("Location: ".base_url("welcome"));
				die;
			}

			$class = new $className();

			if(!method_exists($class, 'index'))
			{
				echo "index method doest not exists";die;
			}

			$class->index(...$urlPath);
		}
		else
		{
			echo "page don't exists";
		}
	}
	else
	{
		header("Location: ".base_url("welcome"));
		die;
	}


?>