<?php
include "header.php";
?>

<?php if ($user_role == 'onsite' && $manager == 'true' || $user_role == 'admin') { ?>


	<style type="text/css">

		.btn{
			margin-top: 0px;
		}
		.btn-primary{
			min-width: 120px !important;
		}

	</style>

		
	<?php
		$number = mysqli_query($con, 'SELECT * FROM onsites WHERE QAstatus = "Pending QA" AND status = "Complete"');
		$num = mysqli_num_rows($number);

		$result2 = mysqli_query($con, 'SELECT * FROM onsites WHERE QAstatus = "Kickback" AND id = "' . $user_id . '" ');
		$numBlogs2 = mysqli_num_rows($result2);

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
					    	Completed Tasks
					    </a>
				  </li>
				  <li id="userbtn3" style="width: 170px; margin: 5; float: left;" >
					    <a href="#btn3" >
					    	Kickbacks
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
					<span class="glyphicon glyphicon-folder-open">&nbsp;</span> Tasks Pending QA <span class="sub-panel-title">- Total List</span>
					</div>
				</div>
			</div>

			<?php

				if (isset($_GET['order'])) {

					$order = $_GET['order'];

				} else {

					$order = "date";

				}

				$result = mysqli_query($con, 'SELECT * FROM onsites WHERE QAstatus = "Pending QA" AND status = "Complete" ORDER BY ' . $order . ' ASC');

				if (!$result) {
					printf("Error: %s\n", mysqli_error($con));
					exit();
				}

				$i = 0;
				

					if (!$i++) echo "<table class='table table-striped' >
					<tr class=''>
					<th class='tTitle'>Username</th>
					<th class='tTitle'><a href='onsitedetails.php?order=QAowner'>QA Owner</a></th>
					<th class='tTitle'><a href='onsitedetails.php?order=date'>Date</a></th>
					<th class='tTitle'>Domain</th>
					<th class='tTitle'>Client ID</th>
					<th class='tTitle'>Task Type</th>
					<th class='tTitle commentTable'>Comment</th>
					<th class='tTitle'>Docs</th>
					<th class='tTitle commentTable'>QA Comment</th>
					</tr>";

				while ($row = mysqli_fetch_assoc($result)) {

					$usernameNew = $row['username'];
					$date = $row['date'];
					$domain = $row['domain'];
					$docs = json_decode($row['docs'], true);
					$task = $row['task'];
					$clientid = $row['clientid'];
					$comment = $row['comment'];
					$QAcomment = $row['QAcomment'];
					$id = $row['counter'];
					$QAowner = $row['QAowner'];

					$docItems = "<td class='tCell'>";

					for ($i = 0; $i < count($docs); $i++ ) {

						if ($docs[$i] != "" ){

							$docItems .= "<a target='_blank' href='$docs[$i]'>Download Doc " . ($i + 1) . "</a><br>";

						}

					}

						$docItems .= "</td>";

					echo "<tr id=" . $id . " '>
						<td class='tCell' id='orgUser" . $id . "'>" . $usernameNew . "</td>
						<td class='tCell' >" . $QAowner . "</td>
						<td class='tCell'>" . $date . "</td>
						<td class='tCell'><a target='_blank' href='http://". $domain ."'>Domain Link</td>
						<td class='tCell'>" . $clientid . "</td>
						<td class='tCell' id='taskType" . $id . "'>" . $task . "</td>
						<td class='tCell'><div class='comHeight'>" . htmlspecialchars($comment) . "</div></td>
						" . $docItems . "
						<td class='tCell' id='comment" . $id . "' ><div class='comHeight'>" . htmlspecialchars($QAcomment) . "</div></td>
						</div></td><input id='userValue' type='hidden' value='".$username."' name='userInput' />
					</tr>";
				}

				echo "</table>";
			?>

	</div>
</div>
<?php

	if (isset($_POST['taskFilter']) && isset($_POST['userFilter'])){

		$userFilter = $_POST['userFilter'];
		$firstDET = 'WHERE';
		$taskFilter = $_POST['taskFilter'];
		$secondDET = 'AND';
	} 

	if (isset($_POST['taskFilter']) && !isset($_POST['userFilter'])){

		$taskFilter = $_POST['taskFilter'];
		$secondDET = 'WHERE';
		$userFilter = '';
		$firstDET = '';

	} 

	if (!isset($_POST['taskFilter']) && isset($_POST['userFilter'])){

		$userFilter = $_POST['userFilter'];
		$firstDET = 'WHERE';
		$taskFilter = '';
		$secondDET = '';

	}

	if (!isset($_POST['taskFilter']) && !isset($_POST['userFilter'])){

		$userFilter = '';
		$firstDET = '';
		$taskFilter = '';
		$secondDET = '';

	}

	if (isset($_POST['limit'])){

		$limit = $_POST['limit'];

	} else {
		$limit = 100;
	}
?>

<div class="panel adminPanel" id="newUser" style="display: none;">
<div class="panel-default">
	<div class="panel-heading">
		<div class="panel-title">
		<span class="glyphicon glyphicon-folder-open">&nbsp;</span> Completed Tasks <span class="sub-panel-title">  <form style="display: inline;" method="POST" action="onsitedetails.php#btn2">-  Username: <select id="userFilterDetails"  name="userFilter"  style="height: 33px; width: 10px !important;" class="btn btn-primary input-standard contentForm">
				<option value="username = 'rwilson'">rwilson</option>
				<option value="username = 'towens'">towens</option>
				<option value="username = 'jdiaz'">jdiaz</option>
			    <option value="username = 'bpendleton'">bpendleton</option>
			    <option value="username = 'swilson'">swilson</option>
			    <option value="username = 'afunk'">afunk</option>
		</select>
		Task Type: </span><select id="taskFilterDetails"  name="taskFilter"  style="height: 33px; width: 10px !important;" class="btn btn-primary input-standard contentForm">
			    <option value="task = 'Basic Onsites'">Basic Onsites</option>
			    <option value="task = 'Google Analytics'">Google Analytics</option>
			    <option value="task = '301 redirects'">301 redirects</option>
	            <option value="task = 'Canonical tags'">Canonical tags</option>
	     	    <option value="task = 'Content Implementation'">Content Implementation</option>
			    <option value="task = 'Crazy egg'">Crazy egg</option>
			    <option value="task = 'Nofollow Tag(s)'">Nofollow Tag(s)</option>
			    <option value="task = 'Page Creation'">Page Creation</option>
			    <option value="task = 'Robots.txt file'">Robots.txt file</option>
			    <option value="task = 'Schema Tags'">Schema Tags</option>
			    <option value="task = 'Sitemap.xml file'">Sitemap.xml file</option>
			    <option value="task = 'Misc. Edits'">Misc. Edits</option>
			    <option value="task = 'Ranking Audit'">Ranking Audit</option>
			    <option value="task = 'CMS Testing'">CMS Testing</option>
		        <option value="task = 'Post Blog'">Post Blog</option>
				<option value="task = 'Setup Blog'">Setup Blog</option>
				<option value="status = 'Kickback'">Kickbacks</option>
		</select>
		Limit: <input type="number" name="limit" class="sInputs" placeholder="Limit" style="height: 33px;
width: 120px !important; margin-right: 20px;" id="limit" />
		<input type="submit" class="btn btn-primary"/>
		</form> <span>Filtered by: <?php echo $userFilter; ?> <?php echo $secondDET; ?> <?php echo $taskFilter; ?> Limit <?php echo $limit ?> </span>
		</div>
	</div>
</div>

<?php



	$result = mysqli_query($con, "SELECT * FROM onsites $firstDET $userFilter $secondDET $taskFilter ORDER BY date DESC LIMIT $limit");

	if (!$result) {
		printf("Error: %s\n", mysqli_error($con));
		exit();
	}

	$i = 0;
	
	while ($row = mysqli_fetch_assoc($result)) {
	
		if (!$i++) echo "<table class='table table-striped' >
		<tr class='tRow'>
		<th class='tTitle'>Username</th>
		<th class='tTitle'>Client ID</th>
		<th class='tTitle'>Date</th>
		<th class='tTitle'>Task Type</th>
		<th class='tTitle'>Time</th>
		<th class='tTitle'>Domain</th>
		<th class='tTitle'>Process</th>
		<th class='tTitle commentTable'>Comment</th>
		<th class='tTitle'>QA By</th>
		<th class='tTitle'>QA Status</th>
		</tr>";

		$username = $row['username'];
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
		
		echo "<tr id=" . $id . " class='tRow' >";
		echo "<td class='tCell' id='clientid" . $id . "'>" . $username . "</td>";
		echo "<td class='tCell' id='clientid" . $id . "'>" . $clientid . "</td>";
		echo "<td class='tCell'>" . $date . "</td>";
		echo "<td class='tCell' id='task" . $id . "'>" . $task . "</td>";
		echo "<td class='tCell' id='time" . $id . "'>" . $time . "</td>";
		echo "<td class='tCell' id='domain" . $id . "'>" . $domain . "</td>";
		echo "<td class='tCell' id='hstatus" . $id . "'>" . $status . "</td>";
		echo "<td class='tCell' id='hcomment" . $id . "'><div class='comHeight'>" . htmlspecialchars($comment) . "</div></td>";
		echo "<td class='tCell'>" . $QAby . "</td>";
		echo "<td class='tCell'>" . $QAstatus . "</td>";
		echo "</tr>";
	}
	echo "</table>";

	
	?>


</div>

<div id="container2">
	<div class="panel blogticketPanel" id="newUser" style="display: none;">
			<div class="panel-default">
				<div class="panel-heading">
					<div class="panel-title">
					<span class="glyphicon glyphicon-folder-open">&nbsp;</span> Tasks Pending QA <span class="sub-panel-title">- Total List</span>
					</div>
				</div>
			</div>

			<?php

				if (isset($_GET['order'])) {

					$order = $_GET['order'];

				} else {

					$order = "date";

				}

				$result = mysqli_query($con, 'SELECT * FROM onsites WHERE QAstatus = "Kickback" AND status = "Complete" ORDER BY ' . $order . ' ASC');

				if (!$result) {
					printf("Error: %s\n", mysqli_error($con));
					exit();
				}

				$i = 0;
				

					if (!$i++) echo "<table class='table table-striped' >
					<tr class=''>
					<th class='tTitle'>Username</th>
					<th class='tTitle'><a href='onsitedetails.php?order=QAowner'>QA Owner</a></th>
					<th class='tTitle'><a href='onsitedetails.php?order=date'>Date</a></th>
					<th class='tTitle'>Domain</th>
					<th class='tTitle'>Client ID</th>
					<th class='tTitle'>Task Type</th>
					<th class='tTitle commentTable'>Comment</th>
					<th class='tTitle'>Docs</th>
					<th class='tTitle commentTable'>QA Comment</th>
					</tr>";

				while ($row = mysqli_fetch_assoc($result)) {

					$usernameNew = $row['username'];
					$date = $row['date'];
					$domain = $row['domain'];
					$docs = json_decode($row['docs'], true);
					$task = $row['task'];
					$clientid = $row['clientid'];
					$comment = $row['comment'];
					$QAcomment = $row['QAcomment'];
					$id = $row['counter'];
					$QAowner = $row['QAowner'];

					$docItems = "<td class='tCell'>";

					for ($i = 0; $i < count($docs); $i++ ) {

						if ($docs[$i] != "" ){

							$docItems .= "<a target='_blank' href='$docs[$i]'>Download Doc " . ($i + 1) . "</a><br>";

						}

					}

						$docItems .= "</td>";

					echo "<tr id=" . $id . " '>
						<td class='tCell' id='orgUser" . $id . "'>" . $usernameNew . "</td>
						<td class='tCell' >" . $QAowner . "</td>
						<td class='tCell'>" . $date . "</td>
						<td class='tCell'><a target='_blank' href='http://". $domain ."'>Domain Link</td>
						<td class='tCell'>" . $clientid . "</td>
						<td class='tCell' id='taskType" . $id . "'>" . $task . "</td>
						<td class='tCell'><div class='comHeight'>" . htmlspecialchars($comment) . "</div></td>
						" . $docItems . "
						<td class='tCell' id='comment" . $id . "' ><div class='comHeight'>" . htmlspecialchars($QAcomment) . "</div></td>
						</div></td><input id='userValue' type='hidden' value='".$username."' name='userInput' />
					</tr>";
				}

				echo "</table>";
			?>

	</div>
</div>









<?php } ?>