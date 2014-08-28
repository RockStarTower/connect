<?php
include "header.php";
?>


<div id="allContainer">
<style type="text/css">

	.btn{
		margin-top: 0px;
	}
	.btn-primary{
		min-width: 120px !important;
	}

</style>

	
		<?php
		$number = mysqli_query($con, 'SELECT * FROM onsites WHERE QAstatus = "Pending QA" AND username != "'.$username.'"');
		$num = mysqli_num_rows($number);

		$result = mysqli_query($con, 'SELECT * FROM onsites WHERE QAstatus = "Passed QA" ORDER BY date DESC LIMIT 40');
		$numBlogs = mysqli_num_rows($result);

		$result2 = mysqli_query($con, 'SELECT * FROM onsites WHERE QAstatus = "Kickback" AND id = "' . $user_id . '" ');
		$numBlogs2 = mysqli_num_rows($result2);

		$result3 = mysqli_query($con, 'SELECT * FROM onsites WHERE id = "' . $user_id . '" ');
		$numBlogs3 = mysqli_num_rows($result3);
		?>

		<div class="full-width-wrapper">
			<div class="panel panel-default">
				<div class="panel-body" style="padding: 0px;">
					<ul class="nav nav-pills nav-stacked">
				   		<li id="userbtn1" style="width: 170px; margin: 5; float: left;" class="active">
						    <a id="currentUsers" href="#btn1" >
						        <span style="margin: 2px;" class="badge pull-right"><?php echo $num ?></span>
						        Pending QA
						    </a>
						</li>
					    <li id="userbtn2" style="width: 170px; margin: 5; float: left;" >
						    <a href="#btn2">
						    	<span style="margin: 2px;" class="badge pull-right"><?php echo $numBlogs ?></span>
						    	Passed QA
						    </a>
					  </li>
					   <li id="userbtn3" style="width: 170px; margin: 5; float: left;" >
						    <a href="#btn3" >
						    	<span style="margin: 2px;" class="badge pull-right"><?php echo $numBlogs2 ?></span>
						    	Your Kickbacks
						    </a>
					  </li>
					  <li id="userbtn4" style="width: 170px; margin: 5; float: left;" >
						    <a href="#btn4" >
						    	<span style="margin: 2px;" class="badge pull-right"><?php echo $numBlogs3 ?></span>
						    	Your Tasks List
						    </a>
					  </li>
					</ul>
				</div>
			</div>
		</div>
	
<div id="container1">
	<div class="panel adminPanel">
			<div class="panel-default">
				<div class="panel-heading">
					<div class="panel-title">
					<span class="glyphicon glyphicon-folder-open">&nbsp;</span> Tasks Pending QA <span class="sub-panel-title">- (click text to edit)</span>
					</div>
				</div>
			</div>

			<?php
				$result = mysqli_query($con, 'SELECT * FROM onsites WHERE QAstatus = "Pending QA" AND username != "'.$username.'"');

				if (!$result) {
					printf("Error: %s\n", mysqli_error($con));
					exit();
				}

				$i = 0;
				
				while ($row = mysqli_fetch_assoc($result)) {

					if (!$i++) echo "<table class='table table-striped' >
					<tr class=''>
					<th class='tTitle'>Username</th>
					<th class='tTitle'>Date</th>
					<th class='tTitle'>Domain</th>
					<th class='tTitle'>Task Type</th>
					<th class='tTitle'>Process</th>
					<th class='tTitle'>Comment</th>
					<th class='tTitle'>QA Status</th>
					</tr>";

					$usernameNew = $row['username'];
					$date = $row['date'];
					$domain = $row['domain'];
					$task = $row['task'];
					$status = $row['status'];
					$comment = $row['comment'];
					$QAstatus = $row['QAstatus'];
					$id = $row['counter'];


					echo "<tr id=" . $id . " class='userTable2'>
						<td class='tCell' >" . $usernameNew . "</td>
						<td class='tCell'>" . $date . "</td>
						<td class='tCell'><a href='". $domain ."'>" . $domain . "</td>
						<td class='tCell'>" . $task . "</td>
						<td class='tCell'>" . $status . "</td>
						<td class='tCell' id='comment" . $id . "' contenteditable>" . $comment . "</td>
						<td class='tCell'>
							<select id='status" . $id . "' name='status' style='height: 33px;' class='btn btn-primary input-standard contentForm'>
								<option selected style='display: none;'>" . $QAstatus . "</option>
								<option id='content" . $id . "'>Pending QA</option>
								<option id='blog" . $id . "'>Passed QA</option>
								<option id='content" . $id . "'>Kickback</option>
							</select>
						</div></td>
						</div></td><input id='userValue' type='hidden' value='".$username."' name='userInput' />
					</tr>";
				}

				echo "</table>";
			?>

	</div>
</div>

<div class="panel adminPanel" id="newUser" style="display: none;">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="panel-title">
				<span class="glyphicon glyphicon-folder-open">&nbsp;</span> Tasks Passed QA <span class="sub-panel-title"></span>
				</div>
			</div>
		</div>

		<?php
			$result = mysqli_query($con, 'SELECT * FROM onsites WHERE QAstatus = "Passed QA" ');

			if (!$result) {
				printf("Error: %s\n", mysqli_error($con));
				exit();
			}

			$i = 0;
			
			while ($row = mysqli_fetch_assoc($result)) {

				if (!$i++) echo "<table class='table table-striped' >
				<tr class=''>
				<th class='tTitle'>Username</th>
				<th class='tTitle'>Date</th>
				<th class='tTitle'>Domain</th>
				<th class='tTitle'>Task Type</th>
				<th class='tTitle'>Process</th>
				<th class='tTitle'>Comment</th>
				</tr>";

				$username = $row['username'];
				$date = $row['date'];
				$domain = $row['domain'];
				$task = $row['task'];
				$status = $row['status'];
				$comment = $row['comment'];

				echo "<tr class='userTable3'>
					<td class='tCell'>" . $username . "</td>
					<td class='tCell'>" . $date . "</td>
					<td class='tCell'>" . $domain . "</td>
					<td class='tCell'>" . $task . "</td>
					<td class='tCell'>" . $status . "</td>
					<td class='tCell'>" . $comment . "</td>
						</div></td>
				</tr>";
			}

			echo "</table>";
		?>

</div>


<div id="container2">
	<div class="panel blogticketPanel" id="newUser" style="display: none;">
			<div class="panel-default">
				<div class="panel-heading">
					<div class="panel-title">
					<span class="glyphicon glyphicon-folder-open">&nbsp;</span> QA Kickback <span class="sub-panel-title">- (click text to edit)</span>
					</div>
				</div>
			</div>

			<?php

				$result = mysqli_query($con, 'SELECT * FROM onsites WHERE id = "' . $user_id . '" AND QAstatus = "Kickback" ORDER BY date DESC LIMIT 10');

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
					<th class='tTitle'>Domain</th>
					<th class='tTitle'>Process</th>
					<th class='tTitle'>Comment</th>
					<th class='tTitle'>QA By</th>
					<th class='tTitle'>QA Status</th>
					</tr>";

					$clientid = $row['clientid'];
					$date = $row['date'];
					$task = $row['task'];
					$time = $row['time'];
					$domain = $row['domain'];
					$status = $row['status'];
					$id = $row['counter'];
					$comment = $row['comment'];
					$QAby = $row['QAby'];
					$QAstatus = $row['QAstatus'];
					
					echo "<tr id=" . $id . " class='tRow userTable5'>";
					echo "<td class='tCell'>" . $clientid . "</td>";
					echo "<td class='tCell'>" . $date . "</td>";
					echo "<td class='tCell'>" . $task . "</td>";
					echo "<td class='tCell'>" . $time . "</td>";
					echo "<td class='tCell'>" . $domain . "</td>";
					echo "<td class='tCell'>" . $status . "</td>";
					echo "<td class='tCell' id='scomment" . $id . "' contenteditable>" . $comment . "</td>";
					echo "<td class='tCell'>" . $QAby . "</td>";
					echo "<td class='tCell'>
							<select id='sstatus" . $id . "' name='status' style='height: 33px;' class='btn btn-primary input-standard contentForm'>
								<option selected style='display: none;'>" . $QAstatus . "</option>
								<option id='scontent" . $id . "'>Pending QA</option>
								<option id='srevision" . $id . "'>Kickback</option>
							</select>
						</div></td>";
					echo "</tr>";
				}
				echo "</table>";

				
				?>

	</div>
</div>



<div id="container3">
	<div class="panel blogticketPanel yourtasklist" id="newUser" style="display: none;">
			<div class="panel-default">
				<div class="panel-heading">
					<div class="panel-title">
					<span class="glyphicon glyphicon-folder-open">&nbsp;</span> Your Completed Tasks <span class="sub-panel-title"></span>
					</div>
				</div>
			</div>

			<?php

				$result = mysqli_query($con, 'SELECT * FROM onsites WHERE id = "' . $user_id . '"ORDER BY date DESC LIMIT 100');

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
					<th class='tTitle'>Domain</th>
					<th class='tTitle'>Process</th>
					<th class='tTitle'>Comment</th>
					<th class='tTitle'>QA By</th>
					<th class='tTitle'>QA Status</th>
					</tr>";

					$clientid = $row['clientid'];
					$date = $row['date'];
					$task = $row['task'];
					$time = $row['time'];
					$domain = $row['domain'];
					$status = $row['status'];
					$id = $row['counter'];
					$comment = $row['comment'];
					$QAby = $row['QAby'];
					$QAstatus = $row['QAstatus'];
					
					echo "<tr id=" . $id . " class='tRow userTable6'>";
					echo "<td class='tCell' id='clientid" . $id . "' contenteditable>" . $clientid . "</td>";
					echo "<td class='tCell'>" . $date . "</td>";
					echo "<td class='tCell' id='task" . $id . "' contenteditable>" . $task . "</td>";
					echo "<td class='tCell' id='time" . $id . "' contenteditable>" . $time . "</td>";
					echo "<td class='tCell' id='domain" . $id . "' contenteditable>" . $domain . "</td>";
					echo "<td class='tCell' id='hstatus" . $id . "' contenteditable>" . $status . "</td>";
					echo "<td class='tCell' id='hcomment" . $id . "' contenteditable>" . $comment . "</td>";
					echo "<td class='tCell'>" . $QAby . "</td>";
					echo "<td class='tCell'>" . $QAstatus . "</td>";
					echo "</tr>";
				}
				echo "</table>";

				
				?>

	</div>
</div>

</div>