<?php
include 'header.php';
?>

<?php

$number = mysqli_query($con, 'SELECT * FROM feedback WHERE status="open"');
$num = mysqli_num_rows($number);



$users_result = mysqli_query($con, 'SELECT * FROM users');
$total_user_number = mysqli_num_rows($users_result);
?>


<div class="full-width-wrapper">

	<?php if ($user_role == 'admin') { ?>
		<div style="min-width: 540px;" class="well well-sm">
		<span class="glyphicon glyphicon-link quickLink">&nbsp;</span>
		<a href="suggestion.php">Support Tickets <span style="vertical-align: 1;" class="badge"><?php echo $num ?></span></a><a class="quickLink" href="admin.php">Administration</a> Total Users: <span style="vertical-align: 1;" class="badge"><?php echo $total_user_number ?></span>
		</div>
	<?php } ?>
	
   

		<?php
		    $date = getdate();
		    if($date['mday'] == 20 && $date['mon'] == 8){

		        echo '<div style="font-size: 16px; text-align: center;" class="alert alert-danger" role="alert"><strong >Attention:</strong> Download the New Version of AutoBuilder Released Today!</div>';

		    }
		?>

	<div class="left-wrapper-dash">
	<?php if ($user_role == 'onsite') { ?>
		<div class="panel">
			<div class="panel-default">
				<div class="panel-heading">
					<div class="panel-title">
					Your Completed Tasks <span class="sub-panel-title">- Descending </span>
					</div>
				</div>
			</div>
		
			<?php

			$result = mysqli_query($con, 'SELECT * FROM onsites WHERE id ="'. $user_id .'" ORDER BY date DESC LIMIT 20');

			if (!$result) {
				printf("Error: %s\n", mysqli_error($con));
				exit();
			}

			$i = 0;
			
			while ($row = mysqli_fetch_assoc($result)) {
			
				if (!$i++) echo "<table class='table table-striped' >
				<tr class='tRow'>
				<th class='tTitle'>Client ID</th>
				<th class='tTitle'>Date</th>
				<th class='tTitle'>Task Type</th>
				<th class='tTitle'>Time</th>
				<th class='tTitle'>Process</th>
				<th class='tTitle'>QA Status</th>
				</tr>";

				$clientid = $row['clientid'];
				$date = $row['date'];
				$task = $row['task'];
				$time = $row['time'];
				$status = $row['status'];
				$QAstatus = $row['QAstatus'];
				
				echo "<tr class='tRow'>";
				echo "<td class='tCell'>" . $clientid . "</td>";
				echo "<td class='tCell'>" . $date . "</td>";
				echo "<td class='tCell'>" . $task . "</td>";
				echo "<td class='tCell'>" . $time . "</td>";
				echo "<td class='tCell'>" . $status . "</td>";
				echo "<td class='tCell'>" . $QAstatus . "</td>";
				echo "</tr>";
			}
			echo "</table>";

			mysqli_close($con);
			?>
		</div>
		<?php } ?>
		<?php if ($user_role != 'onsite') { ?>
		 <div style="text-align: center;" class="jumbotron customJumbo">
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
		<?php } ?>
		<?php if ($user_role == 'blogs' || $user_role == 'admin') { ?>
			<div class="panel dashPanel" >
				<div class="panel-success panel-info">
					<div class="panel-heading">
						<div class="panel-title">
							<span class="glyphicon glyphicon-cog">&nbsp;</span>Download the Plugin <span class="sub-panel-title">- AutoBuilder WordPress Plugin</span>	
						</div>
					</div>
					<div style="display: inline-block; margin: 20px;" class="btn-group">
					  <button type="button" onclick="window.location='zipdownloader/zipdownloader1.php';" class="btn btn-danger">Download Latest V1.02</button>
					  <button type="button" style="margin-right: 20px;" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
					    <span style="margin-top: 8px; height: 8px;" class="caret"></span>
					    <span class="sr-only">Toggle Dropdown</span>
					  </button>
					  <ul class="dropdown-menu" role="menu">
					    <li><a href="zipdownloader/zipdownloader2.php">Version 1.01</a></li>
					    <li><a href="zipdownloader/zipdownloader3.php">Version 1.00</a></li>
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
						<span class="glyphicon glyphicon-cog">&nbsp;</span>Have Suggestions?
						</div>
					</div>
				</div>
					<div class="glyphicon glyphicon-wrench wrenchExtra">
				    </div>
				    <div class="errorDash">
				    	If we missed something, or if you found a issue let us know! <a href="suggestion.php">Click Here</a> to contact us, or you can use the "Contact Us" link from the dropdown under your username.
				    </div>
				
			</div>

			<div class="working dashPanel" >
				<div class="panel-primary panel-default">
					<div class="panel-heading">
						<div class="panel-title">
						<span class="glyphicon glyphicon-retweet">&nbsp;</span>Recent Updates <span class="sub-panel-title">- Connect News & Updates</span>
						</div>
					</div>
				</div>
				<div style="max-height: 500px; overflow-y: scroll;">
					<div style="padding: 5px; padding-left: 30px; padding-right: 30px;">
						<h3>Connect & AutoBuilder</h3>
						<span>8/11/2014 </span>
						<ul>
						  <li><b>Content</b></li>
						  	<ul>
						  		<li>Fixed form inputs for numerous wireframes. Made them match the order content enters them better. Also fixed the amount of titles and content box's.</li>
						  		<li>Added progress bar that keeps track of each validated input filled out. Changed styling of invalid inputs to make them stand out more.</li>
						  		<li>Added short instruction panel to the right for new users.</li>
						  		<li>Fixed issue with content box character length for multiple wireframes.</li>
						  	</ul>
					    <li><b>Design</b></li>
						  	<ul>
						  		<li>Added a check to make sure the domain exists before you are able to to go the upload screen.</li>
						  		<li>Added short instruction panel to the right for new users. Added examples of correct naming convention.</li>
						  		<li>Fixed issue with favicon not being accepted.</li>
						  	</ul>
					  	<li><b>Development</b></li>
						  	<ul>
						  		<li>Added a check to make sure the domain exists, and is correct before attempting to download the file.</li>
						  		<li>Added short instruction panel to the right for new users.</li>
						  	</ul>
						</ul>
					</div>
					<div style="padding: 5px; padding-left: 30px;">
						<h3>AutoBuilder</h3>
						<span>7/22/2014 </span>
						<ul>
						  <li><b>Content</b></li>
						  	<ul>
						  		<li>Added validation check and character length check</li>
						  		<li>Fixed multiple issues with file creation</li>
						  		<li>Added language selection</li>
						  	</ul>
						  <li><b>Design</b></li>
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
</div>




