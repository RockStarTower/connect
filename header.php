<?php
include 'loginCheck.php';
include 'config.php';
?>



<!--
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style/style.css">
-->

<link rel="stylesheet" type="text/css" href="style/style.css">

<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<link href='http://fonts.googleapis.com/css?family=Tauri' rel='stylesheet' type='text/css'>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="dropzone/css/basic.css">
<link rel="stylesheet" type="text/css" href="dropzone/css/dropzone.css">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

<!--<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
<script type="text/javascript" src="js.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<script>
        tinymce.init({selector:'.textarea', height: 450});
</script>

<?php
date_default_timezone_set('America/Denver');
?>


<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">

<body>
<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand">
				<img style="max-height:18px;" src="images/boostabilitys.png">
			</a>
		</div>
		<div class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li id="dashboardH">
					<a href="dashboard.php">
						<i id="dashboardH" class="fa fa-dashboard"></i>
						My Dashboard
					</a>
				</li>
				<li id="noteH" class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-pencil-square-o" style="margin-right: 10px;"></i>
						Note
						<span class="caret" style="margin-left: 5px;"></span>
					</a>
					<ul class="dropdown-menu" role="menu">
						<li style="padding-top: 5px;">
							<a href="tasks.php">
								<i class="fa fa-check-square-o"></i>
								Tasks
							</a>
						</li>
						<?php if ($user_role == 'onsite' || $user_role == 'admin') { ?>
						<li class="divider"></li>
						<li>
							<a href="onsiteqa.php">
								<i class="fa fa-line-chart"></i>
								Onsite QA & Reports
							</a>
						</li>
						<?php } ?>
						<?php if ($user_role != 'onsite') { ?>
						<li class="divider"></li>
						<li>
							<a href="blogs.php">
								<i class="fa fa-wordpress"></i>
								Blogs
							</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="customweb.php">
								<i class="fa fa-puzzle-piece"></i>
								Custom Web
							</a>
						</li>
						<?php } ?>
					</ul>
				</li>
				<li id="autobuilderH" class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-cogs" style="margin-right: 10px;"></i>
						AutoBuilder
						<span class="caret" style="margin-left: 5px;"></span>
					</a>
					<ul class="dropdown-menu" role="menu">
						<li style="padding-top: 5px;">
							<a href="contentbuilder.php">
								<i class="fa fa-keyboard-o"></i>
								Content
							</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="designbuilder.php">
								<i class="fa fa-picture-o"></i>
								Design
							</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="devbuilder.php">
								<i class="fa fa-code"></i>
								Development
							</a>
						</li>
					</ul>
				</li>
			</ul>
			<!--
			
			<form class="navbar-form navbar-left" role="search">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Search (Ctrl+Shift+F)">
				</div>
			</form>-->
			<ul class="nav navbar-nav navbar-right">
				<li id="userH" class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="fa fa-user" style="margin-right: 10px;"></i>
						<?php echo $username ?>
						<span class="caret" style="margin-left: 5px;"></span>
					</a>
					<ul class="dropdown-menu" role="menu">
						<li style="padding-top: 5px;">
							<a href="login/logout.php">
								<i class="fa fa-sign-out"></i>
								logout
							</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="suggestion.php">
								<i class="fa fa-wrench"></i>
								Contact Us
							</a>
						</li>
						<?php if ($user_role == 'admin' || $manager == 'true') { ?>
						<li class="divider"></li>
						<li>
							<a href="admin.php">
								<i class="fa fa-folder-open"></i>
								Administration
							</a>
						</li>
						<?php } ?>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>