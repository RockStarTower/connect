<?php
include 'header.php';
?>

<?php

$number = mysqli_query($con, 'SELECT * FROM feedback WHERE status="open"');
$num = mysqli_num_rows($number);

?>


<div class="full-width-wrapper">

	<?php if ($user_role == 'admin') { ?>
		<div style="min-width: 540px;" class="well well-sm"><span class="glyphicon glyphicon-link quickLink">&nbsp;</span><a href="suggestion.php">Support Tickets <span style="vertical-align: 1;" class="badge"><?php echo $num ?></span></a><a class="quickLink" href="admin.php">Administration</a></div>
	<?php } ?>

	<?php if ($user_role == 'content') { ?>
		<div style="min-width: 540px;" class="well well-sm"><span class="glyphicon glyphicon-link quickLink">&nbsp;</span><a href="suggestion.php">Support Tickets <span style="vertical-align: 1;" class="badge"><?php echo $num ?></span></a><a class="quickLink" href="admin.php">Administration</a></div>
	<?php } ?>

	<?php if ($user_role == 'blogs') { ?>
		<div style="min-width: 540px;" class="well well-sm"><span class="glyphicon glyphicon-link quickLink">&nbsp;</span><a href="suggestion.php">Support Tickets <span style="vertical-align: 1;" class="badge"><?php echo $num ?></span></a><a class="quickLink" href="admin.php">Administration</a></div>
	<?php } ?>

	<?php if ($user_role == 'design') { ?>
		<div style="min-width: 540px;" class="well well-sm"><span class="glyphicon glyphicon-link quickLink">&nbsp;</span><a href="suggestion.php">Support Tickets <span style="vertical-align: 1;" class="badge"><?php echo $num ?></span></a><a class="quickLink" href="admin.php">Administration</a></div>
	<?php } ?>

	<?php if ($user_role == 'custom') { ?>
		<div style="min-width: 540px;" class="well well-sm"><span class="glyphicon glyphicon-link quickLink">&nbsp;</span><a href="suggestion.php">Support Tickets <span style="vertical-align: 1;" class="badge"><?php echo $num ?></span></a><a class="quickLink" href="admin.php">Administration</a></div>
	<?php } ?>

	<?php if ($user_role == 'onsite') { ?>
		<div style="min-width: 540px;" class="well well-sm"><span class="glyphicon glyphicon-link quickLink">&nbsp;</span><a href="suggestion.php">Support Tickets <span style="vertical-align: 1;" class="badge"><?php echo $num ?></span></a><a class="quickLink" href="admin.php">Administration</a></div>
	<?php } ?>

	<div class="left-wrapper-dash">

	<div style="text-align: center;" class="jumbotron">
		  <h1>Welcome to Connect</h1>
		  <p>Boost Connect houses applications like AutoBuilder and Boost Note. <br> Click below to read documentation on these apps.</p>
		  <p><a class="btn btn-primary btn-lg" role="button">Learn more</a></p>
	</div>


	</div>
	<div class="right-wrapper dashWrapper">
		<div class="right-margin">

			<div class="working dashPanel">
				<div class="panel-default">
					<div class="panel-heading">
						<div class="panel-title">
						<span class="glyphicon glyphicon-retweet">&nbsp;</span>Recent Updates <span class="sub-panel-title">- Connect News & Updates</span>
						</div>
					</div>
				</div>
				<div style="padding: 5px; padding-left: 30px;">
					<h3>AutoBuilder</h3>
					<span>7/22/2014 </span>
					<ul>
					  <li>Content</li>
					  	<ul>
					  		<li>Added validation check and character length check</li>
					  		<li>Fixed multiple issues with file creation</li>
					  		<li>Added language selection</li>
					  	</ul>
					  <li>Design</li>
					  	<ul>
					  		<li>Added validation upon upload</li>
					  		<li>Completed front end development of image alt text</li>
					  		<li>Fixed multiple issues with image size requirements</li>
					  	</ul>
					</ul>
				</div>
			</div>

		</div>
	</div>
</div>




