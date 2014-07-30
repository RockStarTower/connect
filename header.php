<?php
include 'loginCheck.php';
include 'config.php';
?>

<link rel="stylesheet" type="text/css" href="style/style.css">
<link rel="stylesheet" type="text/css" href="style/library.css">
<link rel="stylesheet" type="text/css" href="style/responsive.css">
<link href='http://fonts.googleapis.com/css?family=Tauri' rel='stylesheet' type='text/css'>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<script src="http://d3js.org/d3.v3.min.js" charset="utf-8"></script>
<script src="dropzone/dropzone.js"></script>
<script type="text/javascript" src="js.js"></script>
<link rel="stylesheet" type="text/css" href="dropzone/css/basic.css">
<link rel="stylesheet" type="text/css" href="dropzone/css/dropzone.css">
<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

<script>
        tinymce.init({selector:'.textarea'});
</script>


<?php
date_default_timezone_set('America/Denver');


$result = mysqli_query($con, "SELECT count(1) FROM custom WHERE id = '" . $user_id . "' AND finished = 'Incomplete' ");
$row = mysqli_fetch_array($result);

$total = $row[0];

?>

<!--
<div class="navbar">
	<div class="navCon">
		<div class="leftNavCon">
			<img id="miniLogo" src="images/boostabilitys.png">
			<div class="navItem">
				<div id="nameCon" class="nameCon">
					<ul class="navLinks" id="active2">Note<span id="arrow">&#9660;</span>
						<a class="liLink" href="tasks.php"><li class="liItem">New Task</li></a>
						<a class="liLink" href="customweb.php"><li id="liItem2" class="liItem">Custom Reports</li></a>
						<a class="liLink" href="blogs.php"><li id="liItem3" class="liItem">Blogs Reports</li></a>
					</ul>
				</div>
				<div id="nameCon" class="nameCon">
					<ul class="navLinks" id="active2">AutoBuilder <span id="arrow">&#9660;</span>
						<a class="liLink" href="contentbuilder.php"><li class="liItem">Content</li></a>
						<a class="liLink" href="designbuilder.php"><li id="liItem2" class="liItem">Design</li></a>
						<a class="liLink" href="devbuilder.php"><li id="liItem3" class="liItem">Development</li></a>
					</ul>
				</div>
			</div>
		</div>
		<div class="rightNavCon">
			<div class="nameCon">
				<ul class="navLinks"><?php echo $total == 0 ? '' : $total  ?> 
				</ul>
				<ul class="navLinks"><?php echo $username ?> <span id="arrow">&#9660;</span>
					<a class="liLink" href="login/logout.php"><li class="liItem">Log Out</li></a>
					<a class="liLink" href="suggestion.php"><li class="liItem liItem2">Report Error</li></a>
				
				</ul>
			</div>
		</div>
	</div>
</div>

-->


<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">


<!-- Custom Stylesheet-->
<!-- Bootstrap -->
<!--<link href="lib/bs/css/bootstrap.min.css" rel="stylesheet">-->
	<!-- Latest compiled and minified CSS -->

<!-- Optional theme -->
<!--<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">-->

<!-- Latest compiled and minified JavaScript -->
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->



<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
<!-- Link to custom JavaScript -->
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
						<span class="badge"><?php echo $total == 0 ? '' : $total  ?></span>
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
								New Task
							</a>
						</li>
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