<?php
include 'header.php';

?>
<div class="body-wrapper">


<div class="lSide">

	<div class="pickTask">
<!--

		<div class="pickTaskContainer" id="blogsIcon">
			<img class="taskIcon"  src="images/blogs.png" />
			<div class="taskText">
				Blogs
			</div>
		</div>
		<div class="pickTaskContainer" id="customIcon">
			<img class="taskIcon"  src="images/custom.png" />
			<div class="taskText">
				Custom
			</div>
		</div>
		<div class="pickTaskContainer">
			<img class="taskIcon" src="images/infrastructure.png" />
			<div class="taskText">
				Infrastructure
			</div>
		</div>
		<div class="pickTaskContainer">
			<img class="taskIcon" src="images/design.png" />
			<div class="taskText">
				Design
			</div>
		</div>

		<div class="pickTaskContainer">
			<img class="taskIcon" id="onsiteIcon" src="images/onsite.png" />
			<div class="taskText">
				On Site
			</div>
		</div>
		<div class="pickTaskContainer">
			<img class="taskIcon" src="images/meetings.png" />
			<div class="taskText">
				Meetings
			</div>
		</div>
-->
	</div>


</div>


<div class="left-wrapper">
	


	<div id="customCon">
	<?php include 'task/custombuild.php' ?>
	</div>
	<div id="blogsCon">
	<?php include 'task/blogs.php' ?>
	</div>
	<div id="onsiteCon">
	<?php include 'task/onsites.php' ?>
	</div>

</div>

<div class="right-wrapper">

<div class="right-margin">

<?php if ($user_role == 'custom') { ?>
<div class="working">

	<div class="panel-default">
		<div class="panel-heading">
			<div class="panel-title">
			Custom Web <span class="sub-panel-title">- In Progress</span>
			</div>
		</div>
	</div>
	<?php


	$incomplete = "incomplete";

	$result = mysqli_query($con, 'SELECT * FROM custom WHERE id= "'.$user_id.'" AND finished= "'.$incomplete.'" ORDER BY date DESC');

	if (!$result) {
		printf("Error: %s\n", mysqli_error($con));
		exit();
	}


	while ($row = mysqli_fetch_assoc($result)) {


		$date = $row['date'];
		$price = $row['price'];
		$url = $row['url'];
		$time = $row['time'];
		$finished = $row['finished'];
		$counter = $row['counter'];
		
		$time1 = $row['time1'];
		$description1 = $row['description1'];
		
		$time2 = $row['time2'];
		$description2 = $row['description2'];
		
		$time3 = $row['time3'];
		$description3 = $row['description3'];
		
		$time4 = $row['time4'];
		$description4 = $row['description4'];
		
		$time5 = $row['time5'];
		$description5 = $row['description5'];
		
		$time6 = $row['time6'];
		$description6 = $row['description6'];
		
		$time7 = $row['time7'];
		$description7 = $row['description7'];
		
		$time8 = $row['time8'];
		$description8 = $row['description8'];
		
		$time9 = $row['time9'];
		$description9 = $row['description9'];
		
		$time10 = $row['time10'];
		$description10 = $row['description10'];
		
		$time11 = $row['time11'];
		$description11 = $row['description11'];
		
		$time12 = $row['time12'];
		$description12 = $row['description12'];
		
		$time13 = $row['time13'];
		$description13 = $row['description13'];
		
		$time14 = $row['time14'];
		$description14 = $row['description14'];
		
		$time15 = $row['time15'];
		$description15 = $row['description15'];
		
	
		echo "<div class='row'><lh class='lTitle'>Date</lh>
		<div class='lTitle'>Price</div>
		<div class='lTitle'>URL</div>
		<div class='lTitle'>Total Time</div>
		<div class='lTitle'>Status</div></div>";
		
		
		echo "<form class='progressForm' autocomplete='off' method='post' action='task/customupdateh.php'>";
		
		echo "<div class='titleInfo'>";
		echo "<li class='lCell'>" . $date . "</li>";
		echo "<li class='lCell'>" . $price . "</li>";
		echo "<li class='lCell'>" . $url . "</li>";
		echo "<li class='lCell'><input class='timeRow' type='text' name='time' value='" . $time . "'></li>";
		echo "<li class='lCell'>" . $finished . "</li><br>";
		echo "</div>";
		
		echo "<div class='sub-task-title'><div class='sub-task-text'>Sub Tasks</div></div>";
		echo "<div class='sub-task-body'>";
		
		echo "<div class='zebraDark'>";
		echo $time1 == 0 ? '' : "<li class='subcellt'><input class='subcelltInputZ' type='text' name='stime1' value='" . $time1 . "'></li>";
		echo $time1 == 0 ? '' : "<li class='subcell'><input class='subcellInputZ' type='text' name='stask1' placeholder='Change time and add new sub task here if needed.' value='" . stripslashes($description1) . "'></li><br>";
		echo "</div>";
		
		echo $time1 == 0 ? '' : "<li class='subcellt'><input class='subcelltInput' type='text' name='stime2' value='" . $time2 . "'></li>";
		echo $time1 == 0 ? '' : "<li class='subcell'><input class='subcellInput' type='text' name='stask2' placeholder='Change time and add new sub task here if needed.' value='" . stripslashes($description2) . "'></li><br>";
		
		echo "<div class='zebraDark'>";
		echo $time2 == 0 ? '' : "<li class='subcellt'><input class='subcelltInputZ' type='text' name='stime3' value='" . $time3 . "'></li>";
		echo $time2 == 0 ? '' : "<li class='subcell'><input class='subcellInputZ' type='text' name='stask3' placeholder='Change time and add new sub task here if needed.' value='" . stripslashes($description3) . "'></li><br>";
		echo "</div>";
		
		echo $time3 == 0 ? '' : "<li class='subcellt'><input class='subcelltInput' type='text' name='stime4' value='" . $time4 . "'></li>";
		echo $time3 == 0 ? '' : "<li class='subcell'><input class='subcellInput' type='text' name='stask4' placeholder='Change time and add new sub task here if needed.' value='" . stripslashes($description4) . "'></li><br>";
		
		echo "<div class='zebraDark'>";
		echo $time4 == 0 ? '' : "<li class='subcellt'><input class='subcelltInputZ' type='text' name='stime5' value='" . $time5 . "'></li>";
		echo $time4 == 0 ? '' : "<li class='subcell'><input class='subcellInputZ' type='text' name='stask5' placeholder='Change time and add new sub task here if needed.' value='" . stripslashes($description5) . "'></li><br>";
		echo "</div>";
		
		echo $time5 == 0 ? '' : "<li class='subcellt'><input class='subcelltInput' type='text' name='stime6' value='" . $time6 . "'></li>";
		echo $time5 == 0 ? '' : "<li class='subcell'><input class='subcellInput' type='text' name='stask6' placeholder='Change time and add new sub task here if needed.' value='" . stripslashes($description6) . "'></li><br>";
		
		echo "<div class='zebraDark'>";
		echo $time6 == 0 ? '' : "<li class='subcellt'><input class='subcelltInputZ' type='text' name='stime7' value='" . $time7 . "'></li>";
		echo $time6 == 0 ? '' : "<li class='subcell'><input class='subcellInputZ' type='text' name='stask7' placeholder='Change time and add new sub task here if needed.' value='" . stripslashes($description7) . "'></li><br>";
		echo "</div>";
		
		echo $time7 == 0 ? '' : "<li class='subcellt'><input class='subcelltInput' type='text' name='stime8' value='" . $time8 . "'></li>";
		echo $time7 == 0 ? '' : "<li class='subcell'><input class='subcellInput' type='text' name='stask8' placeholder='Change time and add new sub task here if needed.' value='" . stripslashes($description8) . "'></li><br>";
		
		echo "<div class='zebraDark'>";
		echo $time8 == 0 ? '' : "<li class='subcellt'><input class='subcelltInputZ' type='text' name='stime9' value='" . $time9 . "'></li>";
		echo $time8 == 0 ? '' : "<li class='subcell'><input class='subcellInputZ' type='text' name='stask9' placeholder='Change time and add new sub task here if needed.' value='" . stripslashes($description9) . "'></li><br>";
		echo "</div>";
		
		echo $time9 == 0 ? '' : "<li class='subcellt'><input class='subcelltInput' type='text' name='stime10' value='" . $time10 . "'></li>";
		echo $time9 == 0 ? '' : "<li class='subcell'><input class='subcellInput' type='text' name='stask10' placeholder='Change time and add new sub task here if needed.' value='" . stripslashes($description10) . "'></li><br>";
		
		echo "<div class='zebraDark'>";
		echo $time10 == 0 ? '' : "<li class='subcellt'><input class='subcelltInputZ' type='text' name='stime11' value='" . $time11 . "'></li>";
		echo $time10 == 0 ? '' : "<li class='subcell'><input class='subcellInputZ' type='text' name='stask11' placeholder='Change time and add new sub task here if needed.' value='" . stripslashes($description11) . "'></li><br>";
		echo "</div>";
		
		echo $time11 == 0 ? '' : "<li class='subcellt'><input class='subcelltInput' type='text' name='stime12' value='" . $time12 . "'></li>";
		echo $time11 == 0 ? '' : "<li class='subcell'><input class='subcellInput' type='text' name='stask12' placeholder='Change time and add new sub task here if needed.' value='" . stripslashes($description12) . "'></li><br>";
		
		echo "<div class='zebraDark'>";
		echo $time12 == 0 ? '' : "<li class='subcellt'><input class='subcelltInputZ' type='text' name='stime13' value='" . $time13 . "'></li>";
		echo $time12 == 0 ? '' : "<li class='subcell'><input class='subcellInputZ' type='text' name='stask13' placeholder='Change time and add new sub task here if needed.' value='" . stripslashes($description13) . "'></li><br>";
		echo "</div>";
		
		echo $time13 == 0 ? '' : "<li class='subcellt'><input class='subcelltInput' type='text' name='stime14' value='" . $time14 . "'></li>";
		echo $time13 == 0 ? '' : "<li class='subcell'><input class='subcellInput' type='text' name='stask14' placeholder='Change time and add new sub task here if needed.' value='" . stripslashes($description14) . "'></li><br>";
		
		echo "<div class='zebraDark'>";
		echo $time14 == 0 ? '' : "<li class='subcellt'><input class='subcelltInputZ' type='text' name='stime15' value='" . $time15 . "'></li>";
		echo $time14 == 0 ? '' : "<li class='subcell'><input class='subcellInputZ' type='text' name='stask15' placeholder='Change time and add new sub task here if needed.' value='" . stripslashes($description15) . "'></li><br>";
		echo "</div>";
		
		echo "</div>";
		
		echo "<input type='hidden' name='counter' value='".$counter."'>";
		echo "<div class='submitConProgress'>";
		echo "Task Completed?<input value='Yes' name='finished' type='checkbox' class='checkbox checkbox-progress'>";
		echo "<input class='standard-button button-progress btn-success' type='submit' name='submit' value='Update' />";
		echo "</div>";
		

		echo "</form>";
	}



?>
</div>
<?php } ?>
<?php if ($user_role == 'onsite' || $user_role == 'admin') { ?>

		<div class="panel">	
			<div class="panel-default">
				<div class="panel-heading">
					<div class="panel-title">
					QA Kickback <span class="sub-panel-title">- (see QA Reports page for more details) </span>
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
				<th class='tTitle'>Process</th>
				<th class='tTitle'>QA By</th>
				</tr>";

				$clientid = $row['clientid'];
				$date = $row['date'];
				$task = $row['task'];
				$time = $row['time'];
				$status = $row['status'];
				$QAby = $row['QAby'];
				
				echo "<tr class='tRow'>";
				echo "<td class='tCell'>" . $clientid . "</td>";
				echo "<td class='tCell'>" . $date . "</td>";
				echo "<td class='tCell'>" . $task . "</td>";
				echo "<td class='tCell'>" . $time . "</td>";
				echo "<td class='tCell'>" . $status . "</td>";
				echo "<td class='tCell'>" . $QAby . "</td>";
				echo "</tr>";
			}
			echo "</table>";

			
			?>
		</div>


		<div class="panel">
				
			<div class="panel-default">
				<div class="panel-heading">
					<div class="panel-title">
					Pending QA <span class="sub-panel-title">- Descending </span>
					</div>
				</div>
			</div>
		
			<?php

			$result = mysqli_query($con, 'SELECT * FROM onsites WHERE id = "' . $user_id . '" AND QAstatus = "Pending QA" AND status != "Kickback" ORDER BY date DESC LIMIT 10');

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
				<th class='tTitle'>Domain</th>
				<th class='tTitle'>Time</th>
				<th class='tTitle'>Process</th>
				</tr>";

				$clientid = $row['clientid'];
				$date = $row['date'];
				$task = $row['task'];
				$domain = $row['domain'];
				$time = $row['time'];
				$status = $row['status'];
				
				echo "<tr class='tRow'>";
				echo "<td class='tCell'>" . $clientid . "</td>";
				echo "<td class='tCell'>" . $date . "</td>";
				echo "<td class='tCell'>" . $task . "</td>";
				echo "<td class='tCell'>" . $domain . "</td>";
				echo "<td class='tCell'>" . $time . "</td>";
				echo "<td class='tCell'>" . $status . "</td>";
				echo "</tr>";
			}
			echo "</table>";

			
			?>
		</div>



		<div class="panel">
				
			<div class="panel-default">
				<div class="panel-heading">
					<div class="panel-title">
					Passed QA <span class="sub-panel-title">- Descending</span>
					</div>
				</div>
			</div>
		
			<?php

			$result = mysqli_query($con, 'SELECT * FROM onsites WHERE id = "' . $user_id . '" AND QAstatus = "Passed QA" ORDER BY date DESC LIMIT 15');

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
				<th class='tTitle'>Domain</th>
				<th class='tTitle'>Time</th>
				<th class='tTitle'>Process</th>
				<th class='tTitle'>QA By</th>
				</tr>";

				$clientid = $row['clientid'];
				$date = $row['date'];
				$task = $row['task'];
				$domain = $row['domain'];
				$time = $row['time'];
				$status = $row['status'];
				$QAby = $row['QAby'];
				
				echo "<tr class='tRow'>";
				echo "<td class='tCell'>" . $clientid . "</td>";
				echo "<td class='tCell'>" . $date . "</td>";
				echo "<td class='tCell'>" . $task . "</td>";
				echo "<td class='tCell'>" . $domain . "</td>";
				echo "<td class='tCell'>" . $time . "</td>";
				echo "<td class='tCell'>" . $status . "</td>";
				echo "<td class='tCell'>" . $QAby . "</td>";
				echo "</tr>";
			}
			echo "</table>";

			
			?>
		</div>
		<?php } ?>

		<?php if ($user_role == 'blogs') { ?>
		<div class="panel">
				
			<div class="panel-default">
				<div class="panel-heading">
					<div class="panel-title">
					Completed Blogs <span class="sub-panel-title">- Your latest blogs</span>
					</div>
				</div>
			</div>
		
			<?php




			$result = mysqli_query($con, 'SELECT * FROM blogs WHERE id ="'. $user_id .'" ORDER BY date DESC LIMIT 20');

			if (!$result) {
				printf("Error: %s\n", mysqli_error($con));
				exit();
			}

			$i = 0;
			
			while ($row = mysqli_fetch_assoc($result)) {
			
				if (!$i++) echo "<table class='pResults' >
				<tr class='tRow'>
				<th class='tTitle'>Username</th>
				<th class='tTitle'>Date</th>
				<th class='tTitle'>Amount</th>
				<th class='tTitle'>Time</th>
				<th class='tTitle'>Blogs</th>
				</tr>";

				$username = $row['username'];
				$date = $row['date'];
				$amount = $row['amount'];
				$comment = $row['comment'];
				$time = $row['time'];
				
				echo "<tr class='tRow'>";
				echo "<td class='tCell'>" . $username . "</td>";
				echo "<td style='min-width: 100px;' class='tCell'>" . $date . "</td>";
				echo "<td class='tCell'>" . $amount . "</td>";
				echo "<td class='tCell'>" . $time . "</td>";
				echo "<td class='tCell'>" . $comment . "</td>";
				echo "</tr>";
			}
			echo "</table>";

			mysqli_close($con);
			?>
		</div>
		<?php } ?>

</div>

</div>

</div>



