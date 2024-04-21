<?php //session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
	<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?= base_url("assets/css/layout.css") ?>"  type='text/css'>
	<title>Document</title>
</head>
<body>

	<header>
		<nav class="navbar bg-body-tertiary">
		  <div class="container-fluid">
		    <a class="navbar-brand" href="#">
		      Survey Flex
		    </a>
		    <a href="<?= base_url("auth/logout") ?>" class="btn btn-sm btn-danger">
		    	Logout
		    </a>
		  </div>
		</nav>
	</header>

	<section class="app sidebar_nav">
		<aside class="sidebar">
			<header>
				Menu
			</header>
			<nav class="sidebar-nav">
				<ul>
					<?php if(isset($_SESSION['user']) && $_SESSION['user'] && isset($_SESSION['user']['type']) && $_SESSION['user']['type'] == 1): ?>
					<li>
						<a href="#"><i class="ion-ios-person-outline"></i> <span>Users</span></a>
						<ul class="nav-flyout">
							<li>
								<a href="<?= base_url("users/add") ?>"><i class="ion-plus"></i>Add</a>
							</li>
							<li>
								<a href="<?= base_url("users") ?>"><i class="ion-android-menu"></i>List</a>
							</li>
						</ul>
					</li>
					<li>
						<a href="#"><i class="ion-ios-paper-outline"></i> <span class="">Surveys</span></a>
						<ul class="nav-flyout">
							<li>
								<a href="<?= base_url("survey/add") ?>"><i class="ion-plus"></i>Add</a>
							</li>
							<li>
								<a href="<?= base_url("survey") ?>"><i class="ion-android-menu"></i>List</a>
							</li>
							<li>
								<a href="<?= base_url("survey/report") ?>"><i class="ion-stats-bars"></i>Report</a>
							</li>
						</ul>
					</li>
				<?php endif; ?>
				</ul>
			</nav>
		</aside>
	</section>

	<main class="py-3">