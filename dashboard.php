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

	<div class="left-wrapper-dash">
		<div style="text-align: center;" class="jumbotron">
			  <h1>Welcome to Connect</h1>
			  <p>Boost Connect houses applications like AutoBuilder and Boost Note. <br> For further instructions click the get started button below. </p>
			  <?php if ($user_role == 'admin') { ?>
			  <p><a href="contentbuilder.php" class="btn btn-primary btn-lg" role="button">Get Started With Autobuilder!</a></p>
			  <?php } ?>
			  <?php if ($user_role == 'content') { ?>
			  <p><a href="contentbuilder.php" class="btn btn-primary btn-lg" role="button">Get Started With Autobuilder!</a></p>
			  <?php } ?>
			  <?php if ($user_role == 'design') { ?>
			  <p><a href="designbuilder.php" class="btn btn-primary btn-lg" role="button">Get Started With Autobuilder!</a></p>
			  <?php } ?>
			  <?php if ($user_role == 'blogs') { ?>
			  <p><a href="devbuilder.php" class="btn btn-primary btn-lg" role="button">Get Started With Autobuilder!</a></p>
			  <?php } ?>
		</div>
		<?php if ($user_role == 'blogs' || $user_role == 'admin') { ?>
			<div class="panel dashPanel" >
				<div class="panel-success panel-info">
					<div class="panel-heading">
						<div class="panel-title">
							<span class="glyphicon glyphicon-cog">&nbsp;</span>Download the Plugin <span class="sub-panel-title">- AutoBuilder WordPress Plugin</span>	
						</div>
					</div>
					<div style="display: inline-block; margin: 20px;" class="btn-group">
					  <button type="button" onclick="window.location='zipdownloader/zipdownloader1.php';" class="btn btn-danger">Download Latest V1.0B</button>
					  <button type="button" style="margin-right: 20px;" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
					    <span style="margin-top: 8px; height: 8px;" class="caret"></span>
					    <span class="sr-only">Toggle Dropdown</span>
					  </button>
					  <ul class="dropdown-menu" role="menu">
					    <li><a href="zipdownloader/zipdownloader2.php">Second</a></li>
					    <li><a href="zipdownloader/zipdownloader3.php">third</a></li>
					    <li><a href="zipdownloader/zipdownloader4.php">oldest version</a></li>
					  </ul>
						Make sure you have the latest verison of the AutoBuilder plugin. Released: 8/4/2014 You can download a previous release with the dropdown menu.
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
	<div class="right-wrapper dashWrapper">
		<div class="right-margin">
			<div class="working dashPanel">
				<div class="panel-success panel-default">
					<div class="panel-heading">
						<div class="panel-title">
						<span class="glyphicon glyphicon-cog">&nbsp;</span>Have Suggestions? <span class="sub-panel-title">- Report bugs or errors!</span>
						</div>
					</div>
				</div>
					<div class="glyphicon glyphicon-wrench wrenchExtra">
				    </div>
				    <div class="errorDash">
				    	If we missed something, or if you found a issue let us know! <a href="suggestion.php">Click Here</a> to contact us, or you can use the "report error" link from the dropdown under your name.
				    </div>
				
			</div>

			<div class="working dashPanel">
				<div class="panel-primary panel-default">
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




