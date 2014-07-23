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

	<div style="text-align: center; background-color: white;" class="jumbotron">
		  <h1>Welcome to Connect</h1>
		  <p>Boost Connect houses applications like AutoBuilder and Boost Note. <br> Click below to read documentation on these apps.</p>
		  <p><a class="btn btn-primary btn-lg" role="button">Learn more</a></p>
	</div>

	<div class="left-wrapper-dash">
	
	<?php if ($user_role == 'admin') { ?>
	asdf

	<?php } ?>

	<?php if ($user_role == 'content') { ?>
	<form class="panel taskform" autocomplete="off"  method="get" action="contentbuilder.php" >
			<div class="panel-default">
				<div class="panel-heading">
					<div class="panel-title">
					Domain Information <span class="sub-panel-title">- Set Domain & Wireframe </span>
					</div>
				</div>
			</div>
				<label for="domain_url">Domain URL:</label>
				<input type="text" id="domain" name="domain" class="input-standard contentForm validation" placeholder="example.com" required />

				<label for="wireframe_number">Wireframe Number:</label>
				<input type="text" id="wireframe" name="wireframe" class="input-standard contentForm validation" placeholder="Wireframe Number" required />
				<label for="language">Language:</label>
				<select name="language" style="height: 33px;" class="input-standard contentForm validation" id="language">
					<option value="english">English</option>
					<option value="spanish">Spanish</option>
					<option value="french">French</option>
				</select>	
				<input style="margin: 20px;" href="contentbuilder.php" class="submitButton btn-success" type="submit" />
		</form>'
	<?php } ?>

	<?php if ($user_role == 'design') { ?>
		<form class="panel taskform" autocomplete="off"  method="get" action="designbuilder.php" >	
			<div class="panel-default">
				<div class="panel-heading">
					<div class="panel-title">
					Domain Information <span class="sub-panel-title">- Set Domain & Wireframe </span>
					</div>
				</div>
			</div>
			
				<label for="domain_url">Domain URL:</label>
				<input type="text" id="domain" name="domain" class="input-standard contentForm" placeholder="example.com" required />

				<label for="wireframe_number">Wireframe Number:</label>
				<input type="text" id="wireframe" name="wireframe" class="input-standard contentForm" placeholder="Wireframe Number" required />
				<input style="margin: 20px;" class="submitButton btn-success" type="submit" />
		</form>'
	<?php } ?>

	<?php if ($user_role == 'blogs') { ?>
		<form class="panel taskform" autocomplete="off"  method="get" action="devbuilder.php" >
				
			<div class="panel-default">
				<div class="panel-heading">
					<div class="panel-title">
					Domain Information <span class="sub-panel-title">- Set Domain to Download</span>
					</div>
				</div>
			</div>
			
			<label for="domain_url">Domain URL:</label>
			<input type="text" id="domain" name="domain" class="input-standard contentForm" placeholder="example.com" required />
			<input style="margin: 20px;" class="submitButton btn-success" type="submit" value="Download" />
		</form>'
	<?php } ?>

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




