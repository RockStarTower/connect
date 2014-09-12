<?php
include "header.php";
?>



<style type="text/css">

	.btn{
		margin-top: 0px;
	}
	.btn-primary{
		min-width: 120px !important;
	}

</style>

	
		<?php
		$number = mysqli_query($con, 'SELECT * FROM onsites WHERE QAstatus = "Pending QA" AND username != "'.$username.'" AND status = "Complete"');
		$num = mysqli_num_rows($number);

		$result = mysqli_query($con, 'SELECT * FROM onsites WHERE QAstatus = "Passed QA" AND status = "Complete" ');
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
					  <li id="userbtn5" style="width: 170px; margin: 5; float: left;" >
						    <a href="#btn5" >
						    	Onsite Team Report
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
				$result = mysqli_query($con, 'SELECT * FROM onsites WHERE QAstatus = "Pending QA" AND username != "'.$username.'" AND status = "Complete" AND QAowner = "'.$username.'" ORDER BY date ASC');

				if (!$result) {
					printf("Error: %s\n", mysqli_error($con));
					exit();
				}

				$i = 0;
				

					if (!$i++) echo "<table class='table table-striped' >
					<tr class=''>
					<th class='tTitle'>Username</th>
					<th class='tTitle'>Date</th>
					<th class='tTitle'>Domain</th>
					<th class='tTitle'>Task Type</th>
					<th class='tTitle'>Process</th>
					<th class='tTitle commentTable'>Comment</th>
					<th class='tTitle'>Docs</th>
					<th class='tTitle commentTable'>QA Comment</th>
					<th class='tTitle'>QA Status</th>
					</tr>";

				while ($row = mysqli_fetch_assoc($result)) {

					$usernameNew = $row['username'];
					$date = $row['date'];
					$domain = $row['domain'];
					$docs = json_decode($row['docs'], true);
					$task = $row['task'];
					$status = $row['status'];
					$comment = $row['comment'];
					$QAstatus = $row['QAstatus'];
					$QAcomment = $row['QAcomment'];
					$id = $row['counter'];

					$docItems = "<td class='tCell'>";

					for ($i = 0; $i < count($docs); $i++ ) {

						if ($docs[$i] != "" ){

							$docItems .= "<a target='_blank' href='$docs[$i]'>Download Doc " . ($i + 1) . "</a><br>";

						}

					}

						$docItems .= "</td>";

					echo "<tr id=" . $id . " class='userTable2'>
						<td class='tCell' id='orgUser" . $id . "'>" . $usernameNew . "</td>
						<td class='tCell'>" . $date . "</td>
						<td class='tCell'><a target='_blank' href='http://". $domain ."'>Domain Link</td>
						<td class='tCell' id='taskType" . $id . "'>" . $task . "</td>
						<td class='tCell'>" . $status . "</td>
						<td class='tCell'><div class='comHeight'>" . htmlspecialchars($comment) . "</div></td>
						" . $docItems . "
						<td class='tCell' id='comment" . $id . "' contenteditable><div class='comHeight'>" . htmlspecialchars($QAcomment) . "</div></td>
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
			$result = mysqli_query($con, 'SELECT * FROM onsites WHERE QAstatus = "Passed QA" AND status = "Complete" ORDER BY date DESC LIMIT 50 ');

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
				<th class='tTitle'>QA By</th>
				<th class='tTitle commentTable'>QA Comment</th>
				<th class='tTitle commentTable'>Comment</th>
				</tr>";

				$username = $row['username'];
				$date = $row['date'];
				$domain = $row['domain'];
				$task = $row['task'];
				$status = $row['status'];
				$QAby = $row['QAby'];
				$comment = $row['comment'];
				$QAcomment = $row['QAcomment'];

				echo "<tr class='userTable3'>
					<td class='tCell'>" . $username . "</td>
					<td class='tCell'>" . $date . "</td>
					<td class='tCell'>" . $domain . "</td>
					<td class='tCell'>" . $task . "</td>
					<td class='tCell'>" . $status . "</td>
					<td class='tCell'>" . $QAby . "</td>
					<td class='tCell'><div class='comHeight'>" . $QAcomment . "</div></td>
					<td class='tCell'><div class='comHeight'>" . htmlspecialchars($comment) . "</div></td>
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

				if (!$i++) echo "<table class='table table-striped' >
					<tr class='tRow'>
					<th class='tTitle'>Client ID</th>
					<th class='tTitle'>Date</th>
					<th class='tTitle'>Task Type</th>
					<th class='tTitle'>Time</th>
					<th class='tTitle'>Domain</th>
					<th class='tTitle'>Process</th>
					<th class='tTitle'>Docs</th>
					<th class='tTitle commentTable'>Comment</th>
					<th class='tTitle'>QA By</th>
					<th class='tTitle commentTable'>QA Comment</th>
					<th class='tTitle'>QA Status</th>
					</tr>";
				
				while ($row = mysqli_fetch_assoc($result)) {
				
					

					$clientid = $row['clientid'];
					$date = $row['date'];
					$task = $row['task'];
					$time = $row['time'];
					$domain = $row['domain'];
					$status = $row['status'];
					$id = $row['counter'];
					$comment = $row['comment'];
					$QAby = $row['QAby'];
					$QAcomment = $row['QAcomment'];
					$QAstatus = $row['QAstatus'];
					$docs = json_decode($row['docs'], true);

					$docItems = "<td class='tCell'>";

					for ($i = 0; $i < count($docs); $i++ ) {

						if ($docs[$i] != "" ){

							$docItems .= "<a target='_blank' href='$docs[$i]'>Download Doc " . ($i + 1) . "</a><br>";

						}

					}

					$docItems .= "</td>";
					
					echo "<tr id=" . $id . " class='tRow userTable5'>";
					echo "<td class='tCell'>" . $clientid . "</td>";
					echo "<td class='tCell'>" . $date . "</td>";
					echo "<td class='tCell'>" . $task . "</td>";
					echo "<td class='tCell'>" . $time . "</td>";
					echo "<td class='tCell'>" . $domain . "</td>";
					echo "<td class='tCell'>" . $status . "</td>";
					echo "" . $docItems . "";
					echo "<td class='tCell' id='scomment" . $id . "' contenteditable><div class='comHeight'>" . htmlspecialchars($comment) . "</div></td>";
					echo "<td class='tCell'>" . $QAby . "</td>";
					echo "<td class='tCell'><div class='comHeight'>" . htmlspecialchars($QAcomment) . "</div></td>";
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
					<th class='tTitle commentTable'>Comment</th>
					<th class='tTitle'>QA By</th>
					<th class='tTitle'>QA Status</th>
					<th class='tTitle'>Delete Task</th>
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
					echo "<td class='tCell' id='hcomment" . $id . "' contenteditable><div class='comHeight'>" . htmlspecialchars($comment) . "</div></td>";
					echo "<td class='tCell'>" . $QAby . "</td>";
					echo "<td class='tCell'>" . $QAstatus . "</td>";
					echo "<td class='tCell'><button id='" . $id . "' class='btn btn-danger sqlDelete' data-toggle='tooltip' data-placement='top' title='Double Click to Delete Task, This action cannot be undone!'>Delete</button>";
					echo "</tr>";
				}
				echo "</table>";

				
				?>

	</div>
</div>

<?php

$oneday = date('20y-m-d',strtotime("-0 days"));
$twoday = date('20y-m-d',strtotime("-1 days"));
$threeday = date('20y-m-d',strtotime("-2 days"));
$fourday = date('20y-m-d',strtotime("-3 days"));
$fiveday = date('20y-m-d',strtotime("-4 days"));
$sixday = date('20y-m-d',strtotime("-5 days"));
$sevenday = date('20y-m-d',strtotime("-6 days"));

echo "<input id='oneday' type='hidden' value='" . $oneday . "' ></input>";
echo "<input id='twoday' type='hidden' value='" . $twoday . "' ></input>";
echo "<input id='threeday' type='hidden' value='" . $threeday . "' ></input>";
echo "<input id='fourday' type='hidden' value='" . $fourday . "' ></input>";
echo "<input id='fiveday' type='hidden' value='" . $fiveday . "' ></input>";
echo "<input id='sixday' type='hidden' value='" . $sixday . "' ></input>";
echo "<input id='sevenday' type='hidden' value='" . $sevenday . "' ></input>";

$day1 = 0;
$day2 = 0;
$day3 = 0;
$day4 = 0;
$day5 = 0;
$day6 = 0;
$day7 = 0;






if (isset($_POST['time'])){

	$timeValue = 'true';

} else {

	$timeValue = 'false';
}


if ( $timeValue == 'true') {

	$timeCount = "SUM(time)";
    $checkStatus = "checked";	

} else {

	$timeCount = "count(1)";
	$checkStatus = "";
}


if (isset($_POST['taskType'])){

	$statusBinding = $_POST['taskType'];

	if ($statusBinding != "AND status = 'Kickback'"){

		$taskName = $_POST['taskType'];
		$taskName = str_replace("AND task = '", "", $taskName);
		$taskName = str_replace("AND status != '", "", $taskName);
		$taskName = str_replace("'", "", $taskName);
		$taskName = str_replace("Kickback", "ALL VIEW", $taskName);
		$taskName = str_replace("", "ALL VIEW + Kickbacks", $taskName);
			
	} else {

		$taskName = "Kickbacks Only";
	}

	if ($statusBinding === ""){

		$taskName = "ALL VIEW + Kickbacks";

	}

} else {

	$statusBinding = "AND status != 'Kickback'";
	$taskName = "Select Task Type";
}



$totaltime = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $oneday . "' $statusBinding ");
$totaltime1 = mysqli_fetch_array($totaltime);
$day1 = $totaltime1[0];


$totaltimetwo = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $twoday . "' $statusBinding ");
$totaltimetwo1 = mysqli_fetch_array($totaltimetwo);
$day2 = $totaltimetwo1[0];

$totaltimethree = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $threeday . "' $statusBinding ");
$totaltimethree1 = mysqli_fetch_array($totaltimethree);
$day3 = $totaltimethree1[0];

$totaltimefour = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $fourday . "' $statusBinding ");
$totaltimefour1 = mysqli_fetch_array($totaltimefour);
$day4 = $totaltimefour1[0];

$totaltimefive = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $fiveday . "' $statusBinding ");
$totaltimefive1 = mysqli_fetch_array($totaltimefive);
$day5 = $totaltimefive1[0];

$totaltimesix = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $sixday . "' $statusBinding ");
$totaltimesix1 = mysqli_fetch_array($totaltimesix);
$day6 = $totaltimesix1[0];

$totaltimeseven = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $sevenday . "' $statusBinding ");
$totaltimeseven1 = mysqli_fetch_array($totaltimeseven);
$day7 = $totaltimeseven1[0];



// Incomplete placed into inputs for javascript to grab

echo "<input id='day1' type='hidden' value='" . $day1 . "' ></input>";
echo "<input id='day2' type='hidden' value='" . $day2 . "' ></input>";
echo "<input id='day3' type='hidden' value='" . $day3 . "' ></input>";
echo "<input id='day4' type='hidden' value='" . $day4 . "' ></input>";
echo "<input id='day5' type='hidden' value='" . $day5 . "' ></input>";
echo "<input id='day6' type='hidden' value='" . $day6 . "' ></input>";
echo "<input id='day7' type='hidden' value='" . $day7 . "' ></input>";

?>
<div class="full-width-wrapper" style="margin-top: 0px !important">
	<div class="container5" style="display: none;">
		<div class="half-Wrapper-onsite">

			<div class="btn-group btn-group-justified" style="margin-bottom: 10px;">
			  <div class="btn-group">
			    <button type="button" id="graphDisplay1" class="btn btn-default active">Total Combined</button>
			  </div>
			  <div class="btn-group">
			    <button type="button" id="graphDisplay2" class="btn btn-default">Individual User</button>
			  </div>
			</div>
			<div id="graph1" class="panel">
					<div class="panel-default">
							<div class="panel-heading">
								<div class="panel-title">
								Onsite Total Daily Tasks <span class="sub-panel-title">- 7 Day View</span><div id="weekTotal" class="inline-input"></div><div class="weekTotal">Weekly Total:&nbsp; </div>
								</div>
							</div>
					</div>

					
						<canvas id="canvas" height="530px" width="1060px"  ></canvas>
					

						
					<script type="text/javascript">
						
						$( document ).ready(function() {
						
						// This is getting the date and adding it to the graph
						var oneday = $("#oneday").val();
						var twoday = $("#twoday").val();
						var threeday = $("#threeday").val();
						var fourday = $("#fourday").val();
						var fiveday = $("#fiveday").val();
						var sixday = $("#sixday").val();
						var sevenday = $("#sevenday").val();
						
						var day1 = $("#day1").val();
						var day2 = $("#day2").val();
						var day3 = $("#day3").val();
						var day4 = $("#day4").val();
						var day5 = $("#day5").val();
						var day6 = $("#day6").val();
						var day7 = $("#day7").val();
						
						var weekTotal1 = parseInt(day1);
						var weekTotal2 = parseInt(day2);
						var weekTotal3 = parseInt(day3);
						var weekTotal4 = parseInt(day4);
						var weekTotal5 = parseInt(day5);
						var weekTotal6 = parseInt(day6);
						var weekTotal7 = parseInt(day7);
						
						if (isNaN(weekTotal1)){ 
							weekTotal1 = 0;
						};
						
						if (isNaN(weekTotal2)){ 
							weekTotal2 = 0;
						};
						
						if (isNaN(weekTotal3)){ 
							weekTotal3 = 0;
						};
						
						if (isNaN(weekTotal4)){ 
							weekTotal4 = 0;
						};
						
						if (isNaN(weekTotal5)){ 
							weekTotal5 = 0;
						};
						
						if (isNaN(weekTotal6)){ 
							weekTotal6 = 0;
						};
						
						if (isNaN(weekTotal7)){ 
							weekTotal7 = 0;
						};
						
						var sum1 = weekTotal1 + weekTotal2;
						var sum2 = weekTotal3 + weekTotal4;
						var sum3 = weekTotal5 + weekTotal6;
						var sum4 = weekTotal7;
						
						var weekTotal = sum1+sum2+sum3+sum4;
						
						$("#weekTotal").html(weekTotal);
						
						var lineChartData = {
							labels : [ sevenday, sixday, fiveday, fourday, threeday, twoday, oneday],
							datasets : [
								{
									fillColor : "rgba(151,187,205,0.5)",
									strokeColor : "#4D5360",
									pointColor : "rgba(151,187,205,1)",
									pointStrokeColor : "#fff",
									data : [weekTotal7,weekTotal6,weekTotal5,weekTotal4,weekTotal3,weekTotal2,weekTotal1]
								},
								
							]
							
						}

					var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);
					
					});
					
					</script>
			</div>



<?php

$oneday = date('20y-m-d',strtotime("-0 days"));
$twoday = date('20y-m-d',strtotime("-1 days"));
$threeday = date('20y-m-d',strtotime("-2 days"));
$fourday = date('20y-m-d',strtotime("-3 days"));
$fiveday = date('20y-m-d',strtotime("-4 days"));
$sixday = date('20y-m-d',strtotime("-5 days"));
$sevenday = date('20y-m-d',strtotime("-6 days"));

echo "<input id='oneday' type='hidden' value='" . $oneday . "' ></input>";
echo "<input id='twoday' type='hidden' value='" . $twoday . "' ></input>";
echo "<input id='threeday' type='hidden' value='" . $threeday . "' ></input>";
echo "<input id='fourday' type='hidden' value='" . $fourday . "' ></input>";
echo "<input id='fiveday' type='hidden' value='" . $fiveday . "' ></input>";
echo "<input id='sixday' type='hidden' value='" . $sixday . "' ></input>";
echo "<input id='sevenday' type='hidden' value='" . $sevenday . "' ></input>";


function lineData1 ($con, $lineAccount1, $statusBinding, $timeCount){

$oneday = date('20y-m-d',strtotime("-0 days"));
$twoday = date('20y-m-d',strtotime("-1 days"));
$threeday = date('20y-m-d',strtotime("-2 days"));
$fourday = date('20y-m-d',strtotime("-3 days"));
$fiveday = date('20y-m-d',strtotime("-4 days"));
$sixday = date('20y-m-d',strtotime("-5 days"));
$sevenday = date('20y-m-d',strtotime("-6 days"));

$day1L = 0;
$day2L = 0;
$day3L = 0;
$day4L = 0;
$day5L = 0;
$day6L = 0;
$day7L = 0;

$totaltime = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $oneday . "' AND username = '" . $lineAccount1 . "' $statusBinding ");
$totaltime1 = mysqli_fetch_array($totaltime);
$day1L = $totaltime1[0];

$totaltimetwo = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $twoday . "' AND username = '" . $lineAccount1 . "' $statusBinding  ");
$totaltimetwo1 = mysqli_fetch_array($totaltimetwo);
$day2L = $totaltimetwo1[0];

$totaltimethree = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $threeday . "' AND username = '" . $lineAccount1 . "' $statusBinding ");
$totaltimethree1 = mysqli_fetch_array($totaltimethree);
$day3L = $totaltimethree1[0];

$totaltimefour = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $fourday . "' AND username = '" . $lineAccount1 . "' $statusBinding ");
$totaltimefour1 = mysqli_fetch_array($totaltimefour);
$day4L = $totaltimefour1[0];

$totaltimefive = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $fiveday . "' AND username = '" . $lineAccount1 . "' $statusBinding ");
$totaltimefive1 = mysqli_fetch_array($totaltimefive);
$day5L = $totaltimefive1[0];

$totaltimesix = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $sixday . "' AND username = '" . $lineAccount1 . "' $statusBinding ");
$totaltimesix1 = mysqli_fetch_array($totaltimesix);
$day6L = $totaltimesix1[0];

$totaltimeseven = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $sevenday . "' AND username = '" . $lineAccount1 . "' $statusBinding ");
$totaltimeseven1 = mysqli_fetch_array($totaltimeseven);
$day7L = $totaltimeseven1[0];



// Incomplete placed into inputs for javascript to grab

echo "<input id='day1L' type='hidden' value='" . $day1L . "' ></input>";
echo "<input id='day2L' type='hidden' value='" . $day2L . "' ></input>";
echo "<input id='day3L' type='hidden' value='" . $day3L . "' ></input>";
echo "<input id='day4L' type='hidden' value='" . $day4L . "' ></input>";
echo "<input id='day5L' type='hidden' value='" . $day5L . "' ></input>";
echo "<input id='day6L' type='hidden' value='" . $day6L . "' ></input>";
echo "<input id='day7L' type='hidden' value='" . $day7L . "' ></input>";



global $lineDataEcho1;

$lineDataEcho1 = "{
					fillColor : 'rgba(200,200,200,.1)',
					strokeColor : 'rgba(151,187,205,1)',
					pointColor : 'rgba(151,187,205,1)',
					pointStrokeColor : '#fff',
					data : [day7L,day6L,day5L,day4L,day3L,day2L,day1L]
				},";

}


function lineData2 ($con, $lineAccount2, $statusBinding, $timeCount){

$oneday = date('20y-m-d',strtotime("-0 days"));
$twoday = date('20y-m-d',strtotime("-1 days"));
$threeday = date('20y-m-d',strtotime("-2 days"));
$fourday = date('20y-m-d',strtotime("-3 days"));
$fiveday = date('20y-m-d',strtotime("-4 days"));
$sixday = date('20y-m-d',strtotime("-5 days"));
$sevenday = date('20y-m-d',strtotime("-6 days"));

$day1L = 0;
$day2L = 0;
$day3L = 0;
$day4L = 0;
$day5L = 0;
$day6L = 0;
$day7L = 0;

$totaltime = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $oneday . "' AND username = '" . $lineAccount2 . "' $statusBinding ");
$totaltime1 = mysqli_fetch_array($totaltime);
$day1L = $totaltime1[0];

$totaltimetwo = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $twoday . "' AND username = '" . $lineAccount2 . "' $statusBinding  ");
$totaltimetwo1 = mysqli_fetch_array($totaltimetwo);
$day2L = $totaltimetwo1[0];

$totaltimethree = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $threeday . "' AND username = '" . $lineAccount2 . "' $statusBinding ");
$totaltimethree1 = mysqli_fetch_array($totaltimethree);
$day3L = $totaltimethree1[0];

$totaltimefour = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $fourday . "' AND username = '" . $lineAccount2 . "' $statusBinding ");
$totaltimefour1 = mysqli_fetch_array($totaltimefour);
$day4L = $totaltimefour1[0];

$totaltimefive = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $fiveday . "' AND username = '" . $lineAccount2 . "' $statusBinding ");
$totaltimefive1 = mysqli_fetch_array($totaltimefive);
$day5L = $totaltimefive1[0];

$totaltimesix = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $sixday . "' AND username = '" . $lineAccount2 . "' $statusBinding ");
$totaltimesix1 = mysqli_fetch_array($totaltimesix);
$day6L = $totaltimesix1[0];

$totaltimeseven = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $sevenday . "' AND username = '" . $lineAccount2 . "' $statusBinding ");
$totaltimeseven1 = mysqli_fetch_array($totaltimeseven);
$day7L = $totaltimeseven1[0];

// Incomplete placed into inputs for javascript to grab
echo "<input id='day1L2' type='hidden' value='" . $day1L . "' ></input>";
echo "<input id='day2L2' type='hidden' value='" . $day2L . "' ></input>";
echo "<input id='day3L2' type='hidden' value='" . $day3L . "' ></input>";
echo "<input id='day4L2' type='hidden' value='" . $day4L . "' ></input>";
echo "<input id='day5L2' type='hidden' value='" . $day5L . "' ></input>";
echo "<input id='day6L2' type='hidden' value='" . $day6L . "' ></input>";
echo "<input id='day7L2' type='hidden' value='" . $day7L . "' ></input>";

global $lineDataEcho2;

$lineDataEcho2 = "{
					fillColor : 'rgba(150,150,150,.1)',
					strokeColor : '#FDB45C',
					pointColor : 'rgba(0,0,0,.0)',
					pointStrokeColor : '#FDB45C',
					data : [day7L2,day6L2,day5L2,day4L2,day3L2,day2L2,day1L2]
				},";

}



function lineData3 ($con, $lineAccount3, $statusBinding, $timeCount){

$oneday = date('20y-m-d',strtotime("-0 days"));
$twoday = date('20y-m-d',strtotime("-1 days"));
$threeday = date('20y-m-d',strtotime("-2 days"));
$fourday = date('20y-m-d',strtotime("-3 days"));
$fiveday = date('20y-m-d',strtotime("-4 days"));
$sixday = date('20y-m-d',strtotime("-5 days"));
$sevenday = date('20y-m-d',strtotime("-6 days"));

$day1L = 0;
$day2L = 0;
$day3L = 0;
$day4L = 0;
$day5L = 0;
$day6L = 0;
$day7L = 0;

$totaltime = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $oneday . "' AND username = '" . $lineAccount3 . "' $statusBinding ");
$totaltime1 = mysqli_fetch_array($totaltime);
$day1L = $totaltime1[0];

$totaltimetwo = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $twoday . "' AND username = '" . $lineAccount3 . "' $statusBinding  ");
$totaltimetwo1 = mysqli_fetch_array($totaltimetwo);
$day2L = $totaltimetwo1[0];

$totaltimethree = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $threeday . "' AND username = '" . $lineAccount3 . "' $statusBinding ");
$totaltimethree1 = mysqli_fetch_array($totaltimethree);
$day3L = $totaltimethree1[0];

$totaltimefour = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $fourday . "' AND username = '" . $lineAccount3 . "' $statusBinding ");
$totaltimefour1 = mysqli_fetch_array($totaltimefour);
$day4L = $totaltimefour1[0];

$totaltimefive = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $fiveday . "' AND username = '" . $lineAccount3 . "' $statusBinding ");
$totaltimefive1 = mysqli_fetch_array($totaltimefive);
$day5L = $totaltimefive1[0];

$totaltimesix = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $sixday . "' AND username = '" . $lineAccount3 . "' $statusBinding ");
$totaltimesix1 = mysqli_fetch_array($totaltimesix);
$day6L = $totaltimesix1[0];

$totaltimeseven = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $sevenday . "' AND username = '" . $lineAccount3 . "' $statusBinding ");
$totaltimeseven1 = mysqli_fetch_array($totaltimeseven);
$day7L = $totaltimeseven1[0];

// Incomplete placed into inputs for javascript to grab
echo "<input id='day1L3' type='hidden' value='" . $day1L . "' ></input>";
echo "<input id='day2L3' type='hidden' value='" . $day2L . "' ></input>";
echo "<input id='day3L3' type='hidden' value='" . $day3L . "' ></input>";
echo "<input id='day4L3' type='hidden' value='" . $day4L . "' ></input>";
echo "<input id='day5L3' type='hidden' value='" . $day5L . "' ></input>";
echo "<input id='day6L3' type='hidden' value='" . $day6L . "' ></input>";
echo "<input id='day7L3' type='hidden' value='" . $day7L . "' ></input>";

global $lineDataEcho3;

$lineDataEcho3 = "{
					fillColor : 'rgba(150,150,150,.1)',
					strokeColor : '#F7464A',
					pointColor : 'rgba(0,0,0,.0)',
					pointStrokeColor : '#F7464A',
					data : [day7L3,day6L3,day5L3,day4L3,day3L3,day2L3,day1L3]
				},";

}



function lineData4 ($con, $lineAccount4, $statusBinding, $timeCount){

$oneday = date('20y-m-d',strtotime("-0 days"));
$twoday = date('20y-m-d',strtotime("-1 days"));
$threeday = date('20y-m-d',strtotime("-2 days"));
$fourday = date('20y-m-d',strtotime("-3 days"));
$fiveday = date('20y-m-d',strtotime("-4 days"));
$sixday = date('20y-m-d',strtotime("-5 days"));
$sevenday = date('20y-m-d',strtotime("-6 days"));

$day1L = 0;
$day2L = 0;
$day3L = 0;
$day4L = 0;
$day5L = 0;
$day6L = 0;
$day7L = 0;

$totaltime = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $oneday . "' AND username = '" . $lineAccount4 . "' $statusBinding ");
$totaltime1 = mysqli_fetch_array($totaltime);
$day1L = $totaltime1[0];

$totaltimetwo = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $twoday . "' AND username = '" . $lineAccount4 . "' $statusBinding  ");
$totaltimetwo1 = mysqli_fetch_array($totaltimetwo);
$day2L = $totaltimetwo1[0];

$totaltimethree = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $threeday . "' AND username = '" . $lineAccount4 . "' $statusBinding ");
$totaltimethree1 = mysqli_fetch_array($totaltimethree);
$day3L = $totaltimethree1[0];

$totaltimefour = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $fourday . "' AND username = '" . $lineAccount4 . "' $statusBinding ");
$totaltimefour1 = mysqli_fetch_array($totaltimefour);
$day4L = $totaltimefour1[0];

$totaltimefive = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $fiveday . "' AND username = '" . $lineAccount4 . "' $statusBinding ");
$totaltimefive1 = mysqli_fetch_array($totaltimefive);
$day5L = $totaltimefive1[0];

$totaltimesix = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $sixday . "' AND username = '" . $lineAccount4 . "' $statusBinding ");
$totaltimesix1 = mysqli_fetch_array($totaltimesix);
$day6L = $totaltimesix1[0];

$totaltimeseven = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $sevenday . "' AND username = '" . $lineAccount4 . "' $statusBinding ");
$totaltimeseven1 = mysqli_fetch_array($totaltimeseven);
$day7L = $totaltimeseven1[0];

// Incomplete placed into inputs for javascript to grab
echo "<input id='day1L4' type='hidden' value='" . $day1L . "' ></input>";
echo "<input id='day2L4' type='hidden' value='" . $day2L . "' ></input>";
echo "<input id='day3L4' type='hidden' value='" . $day3L . "' ></input>";
echo "<input id='day4L4' type='hidden' value='" . $day4L . "' ></input>";
echo "<input id='day5L4' type='hidden' value='" . $day5L . "' ></input>";
echo "<input id='day6L4' type='hidden' value='" . $day6L . "' ></input>";
echo "<input id='day7L4' type='hidden' value='" . $day7L . "' ></input>";

global $lineDataEcho4;

$lineDataEcho4 = "{
					fillColor : 'rgba(150,150,150,.1)',
					strokeColor : '#949FB1',
					pointColor : 'rgba(0,0,0,.0)',
					pointStrokeColor : '#949FB1',
					data : [day7L4,day6L4,day5L4,day4L4,day3L4,day2L4,day1L4]
				},";

}


function lineData5 ($con, $lineAccount5, $statusBinding, $timeCount){

$oneday = date('20y-m-d',strtotime("-0 days"));
$twoday = date('20y-m-d',strtotime("-1 days"));
$threeday = date('20y-m-d',strtotime("-2 days"));
$fourday = date('20y-m-d',strtotime("-3 days"));
$fiveday = date('20y-m-d',strtotime("-4 days"));
$sixday = date('20y-m-d',strtotime("-5 days"));
$sevenday = date('20y-m-d',strtotime("-6 days"));

$day1L = 0;
$day2L = 0;
$day3L = 0;
$day4L = 0;
$day5L = 0;
$day6L = 0;
$day7L = 0;

$totaltime = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $oneday . "' AND username = '" . $lineAccount5 . "' $statusBinding ");
$totaltime1 = mysqli_fetch_array($totaltime);
$day1L = $totaltime1[0];

$totaltimetwo = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $twoday . "' AND username = '" . $lineAccount5 . "' $statusBinding  ");
$totaltimetwo1 = mysqli_fetch_array($totaltimetwo);
$day2L = $totaltimetwo1[0];

$totaltimethree = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $threeday . "' AND username = '" . $lineAccount5 . "' $statusBinding ");
$totaltimethree1 = mysqli_fetch_array($totaltimethree);
$day3L = $totaltimethree1[0];

$totaltimefour = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $fourday . "' AND username = '" . $lineAccount5 . "' $statusBinding ");
$totaltimefour1 = mysqli_fetch_array($totaltimefour);
$day4L = $totaltimefour1[0];

$totaltimefive = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $fiveday . "' AND username = '" . $lineAccount5 . "' $statusBinding ");
$totaltimefive1 = mysqli_fetch_array($totaltimefive);
$day5L = $totaltimefive1[0];

$totaltimesix = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $sixday . "' AND username = '" . $lineAccount5 . "' $statusBinding ");
$totaltimesix1 = mysqli_fetch_array($totaltimesix);
$day6L = $totaltimesix1[0];

$totaltimeseven = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $sevenday . "' AND username = '" . $lineAccount5 . "' $statusBinding ");
$totaltimeseven1 = mysqli_fetch_array($totaltimeseven);
$day7L = $totaltimeseven1[0];

// Incomplete placed into inputs for javascript to grab
echo "<input id='day1L5' type='hidden' value='" . $day1L . "' ></input>";
echo "<input id='day2L5' type='hidden' value='" . $day2L . "' ></input>";
echo "<input id='day3L5' type='hidden' value='" . $day3L . "' ></input>";
echo "<input id='day4L5' type='hidden' value='" . $day4L . "' ></input>";
echo "<input id='day5L5' type='hidden' value='" . $day5L . "' ></input>";
echo "<input id='day6L5' type='hidden' value='" . $day6L . "' ></input>";
echo "<input id='day7L5' type='hidden' value='" . $day7L . "' ></input>";

global $lineDataEcho5;

$lineDataEcho5 = "{
					fillColor : 'rgba(150,150,150,.1)',
					strokeColor : 'rgba(220,220,220,1)',
					pointColor : 'rgba(0,0,0,.0)',
					pointStrokeColor : 'rgba(220,220,220,1)',
					data : [day7L5,day6L5,day5L5,day4L5,day3L5,day2L5,day1L5]
				},";

}



function lineData6 ($con, $lineAccount6, $statusBinding, $timeCount){

$oneday = date('20y-m-d',strtotime("-0 days"));
$twoday = date('20y-m-d',strtotime("-1 days"));
$threeday = date('20y-m-d',strtotime("-2 days"));
$fourday = date('20y-m-d',strtotime("-3 days"));
$fiveday = date('20y-m-d',strtotime("-4 days"));
$sixday = date('20y-m-d',strtotime("-5 days"));
$sevenday = date('20y-m-d',strtotime("-6 days"));

$day1L = 0;
$day2L = 0;
$day3L = 0;
$day4L = 0;
$day5L = 0;
$day6L = 0;
$day7L = 0;

$totaltime = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $oneday . "' AND username = '" . $lineAccount6 . "' $statusBinding ");
$totaltime1 = mysqli_fetch_array($totaltime);
$day1L = $totaltime1[0];

$totaltimetwo = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $twoday . "' AND username = '" . $lineAccount6 . "' $statusBinding  ");
$totaltimetwo1 = mysqli_fetch_array($totaltimetwo);
$day2L = $totaltimetwo1[0];

$totaltimethree = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $threeday . "' AND username = '" . $lineAccount6 . "' $statusBinding ");
$totaltimethree1 = mysqli_fetch_array($totaltimethree);
$day3L = $totaltimethree1[0];

$totaltimefour = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $fourday . "' AND username = '" . $lineAccount6 . "' $statusBinding ");
$totaltimefour1 = mysqli_fetch_array($totaltimefour);
$day4L = $totaltimefour1[0];

$totaltimefive = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $fiveday . "' AND username = '" . $lineAccount6 . "' $statusBinding ");
$totaltimefive1 = mysqli_fetch_array($totaltimefive);
$day5L = $totaltimefive1[0];

$totaltimesix = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $sixday . "' AND username = '" . $lineAccount6 . "' $statusBinding ");
$totaltimesix1 = mysqli_fetch_array($totaltimesix);
$day6L = $totaltimesix1[0];

$totaltimeseven = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $sevenday . "' AND username = '" . $lineAccount6 . "' $statusBinding ");
$totaltimeseven1 = mysqli_fetch_array($totaltimeseven);
$day7L = $totaltimeseven1[0];

// Incomplete placed into inputs for javascript to grab
echo "<input id='day1L6' type='hidden' value='" . $day1L . "' ></input>";
echo "<input id='day2L6' type='hidden' value='" . $day2L . "' ></input>";
echo "<input id='day3L6' type='hidden' value='" . $day3L . "' ></input>";
echo "<input id='day4L6' type='hidden' value='" . $day4L . "' ></input>";
echo "<input id='day5L6' type='hidden' value='" . $day5L . "' ></input>";
echo "<input id='day6L6' type='hidden' value='" . $day6L . "' ></input>";
echo "<input id='day7L6' type='hidden' value='" . $day7L . "' ></input>";

global $lineDataEcho6;

$lineDataEcho6 = "{
					fillColor : 'rgba(150,150,150,.1)',
					strokeColor : '#46BFBD',
					pointColor : 'rgba(0,0,0,.0)',
					pointStrokeColor : '#46BFBD',
					data : [day7L6,day6L6,day5L6,day4L6,day3L6,day2L6,day1L6]
				},";

}


function lineData7 ($con, $lineAccount7, $statusBinding, $timeCount){

$oneday = date('20y-m-d',strtotime("-0 days"));
$twoday = date('20y-m-d',strtotime("-1 days"));
$threeday = date('20y-m-d',strtotime("-2 days"));
$fourday = date('20y-m-d',strtotime("-3 days"));
$fiveday = date('20y-m-d',strtotime("-4 days"));
$sixday = date('20y-m-d',strtotime("-5 days"));
$sevenday = date('20y-m-d',strtotime("-6 days"));

$day1L = 0;
$day2L = 0;
$day3L = 0;
$day4L = 0;
$day5L = 0;
$day6L = 0;
$day7L = 0;

$totaltime = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $oneday . "' AND username = '" . $lineAccount7 . "' $statusBinding ");
$totaltime1 = mysqli_fetch_array($totaltime);
$day1L = $totaltime1[0];

$totaltimetwo = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $twoday . "' AND username = '" . $lineAccount7 . "' $statusBinding  ");
$totaltimetwo1 = mysqli_fetch_array($totaltimetwo);
$day2L = $totaltimetwo1[0];

$totaltimethree = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $threeday . "' AND username = '" . $lineAccount7 . "' $statusBinding ");
$totaltimethree1 = mysqli_fetch_array($totaltimethree);
$day3L = $totaltimethree1[0];

$totaltimefour = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $fourday . "' AND username = '" . $lineAccount7 . "' $statusBinding ");
$totaltimefour1 = mysqli_fetch_array($totaltimefour);
$day4L = $totaltimefour1[0];

$totaltimefive = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $fiveday . "' AND username = '" . $lineAccount7 . "' $statusBinding ");
$totaltimefive1 = mysqli_fetch_array($totaltimefive);
$day5L = $totaltimefive1[0];

$totaltimesix = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $sixday . "' AND username = '" . $lineAccount7 . "' $statusBinding ");
$totaltimesix1 = mysqli_fetch_array($totaltimesix);
$day6L = $totaltimesix1[0];

$totaltimeseven = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date = '" . $sevenday . "' AND username = '" . $lineAccount7 . "' $statusBinding ");
$totaltimeseven1 = mysqli_fetch_array($totaltimeseven);
$day7L = $totaltimeseven1[0];

// Incomplete placed into inputs for javascript to grab
echo "<input id='day1L7' type='hidden' value='" . $day1L . "' ></input>";
echo "<input id='day2L7' type='hidden' value='" . $day2L . "' ></input>";
echo "<input id='day3L7' type='hidden' value='" . $day3L . "' ></input>";
echo "<input id='day4L7' type='hidden' value='" . $day4L . "' ></input>";
echo "<input id='day5L7' type='hidden' value='" . $day5L . "' ></input>";
echo "<input id='day6L7' type='hidden' value='" . $day6L . "' ></input>";
echo "<input id='day7L7' type='hidden' value='" . $day7L . "' ></input>";


global $lineDataEcho7;

$lineDataEcho7 = "{
					fillColor : 'rgba(150,150,150,.1)',
					strokeColor : '#32CD32',
					pointColor : 'rgba(0,0,0,.0)',
					pointStrokeColor : '#32CD32',
					data : [day7L7,day6L7,day5L7,day4L7,day3L7,day2L7,day1L7]
				},";

}


//This is where you set the user accounts
$lineAccount1 = 'rwilson';
$lineAccount2 = 'towens';
$lineAccount3 = 'jdiaz';
$lineAccount4 = 'bpendleton';
$lineAccount5 = 'swilson';
$lineAccount6 = 'afunk';
$lineAccount7 = 'alangford';

lineData1($con, $lineAccount1, $statusBinding, $timeCount);
lineData2($con, $lineAccount2, $statusBinding, $timeCount);
lineData3($con, $lineAccount3, $statusBinding, $timeCount);
lineData4($con, $lineAccount4, $statusBinding, $timeCount);
lineData5($con, $lineAccount5, $statusBinding, $timeCount);
lineData6($con, $lineAccount6, $statusBinding, $timeCount);
lineData7($con, $lineAccount7, $statusBinding, $timeCount);
?>

			<div id="graph2" class="panel" style="display: none;">
					<div class="panel-default">
							<div class="panel-heading">
								<div class="panel-title">
								Individual Daily Tasks <span class="sub-panel-title">- 7 Day View</span>
								</div>
							</div>
					</div>
						
					
						<canvas id="canvasLine2" height="530px" width="1060px"  ></canvas>
					

						
					<script type="text/javascript">
						
						$( document ).ready(function() {
						
						// This is getting the date and adding it to the graph
						var oneday = $("#oneday").val();
						var twoday = $("#twoday").val();
						var threeday = $("#threeday").val();
						var fourday = $("#fourday").val();
						var fiveday = $("#fiveday").val();
						var sixday = $("#sixday").val();
						var sevenday = $("#sevenday").val();
						
						//User 1
						var day1L = parseInt($("#day1L").val());
						var day2L = parseInt($("#day2L").val());
						var day3L = parseInt($("#day3L").val());
						var day4L = parseInt($("#day4L").val());
						var day5L = parseInt($("#day5L").val());
						var day6L = parseInt($("#day6L").val());
						var day7L = parseInt($("#day7L").val());


						//User 2
						var day1L2 = parseInt($("#day1L2").val());
						var day2L2 = parseInt($("#day2L2").val());
						var day3L2 = parseInt($("#day3L2").val());
						var day4L2 = parseInt($("#day4L2").val());
						var day5L2 = parseInt($("#day5L2").val());
						var day6L2 = parseInt($("#day6L2").val());
						var day7L2 = parseInt($("#day7L2").val());

						//User 3
						var day1L3 = parseInt($("#day1L3").val());
						var day2L3 = parseInt($("#day2L3").val());
						var day3L3 = parseInt($("#day3L3").val());
						var day4L3 = parseInt($("#day4L3").val());
						var day5L3 = parseInt($("#day5L3").val());
						var day6L3 = parseInt($("#day6L3").val());
						var day7L3 = parseInt($("#day7L3").val());
						
						//User 4
						var day1L4 = parseInt($("#day1L4").val());
						var day2L4 = parseInt($("#day2L4").val());
						var day3L4 = parseInt($("#day3L4").val());
						var day4L4 = parseInt($("#day4L4").val());
						var day5L4 = parseInt($("#day5L4").val());
						var day6L4 = parseInt($("#day6L4").val());
						var day7L4 = parseInt($("#day7L4").val());

						//User 5
						var day1L5 = parseInt($("#day1L5").val());
						var day2L5 = parseInt($("#day2L5").val());
						var day3L5 = parseInt($("#day3L5").val());
						var day4L5 = parseInt($("#day4L5").val());
						var day5L5 = parseInt($("#day5L5").val());
						var day6L5 = parseInt($("#day6L5").val());
						var day7L5 = parseInt($("#day7L5").val());

						//User 6
						var day1L6 = parseInt($("#day1L6").val());
						var day2L6 = parseInt($("#day2L6").val());
						var day3L6 = parseInt($("#day3L6").val());
						var day4L6 = parseInt($("#day4L6").val());
						var day5L6 = parseInt($("#day5L6").val());
						var day6L6 = parseInt($("#day6L6").val());
						var day7L6 = parseInt($("#day7L6").val());

						//User 7
						var day1L7 = parseInt($("#day1L7").val());
						var day2L7 = parseInt($("#day2L7").val());
						var day3L7 = parseInt($("#day3L7").val());
						var day4L7 = parseInt($("#day4L7").val());
						var day5L7 = parseInt($("#day5L7").val());
						var day6L7 = parseInt($("#day6L7").val());
						var day7L7 = parseInt($("#day7L7").val());
						
						//User 1
						if (isNaN(day1L)){ 
							day1L = 0;
						};
						
						if (isNaN(day2L)){ 
							day2L = 0;
						};
						
						if (isNaN(day3L)){ 
							day3L = 0;
						};
						
						if (isNaN(day4L)){ 
							day4L = 0;
						};
						
						if (isNaN(day5L)){ 
							day5L = 0;
						};
						
						if (isNaN(day6L)){ 
							day6L = 0;
						};
						
						if (isNaN(day7L)){ 
							day7L = 0;
						};

						//User 2
						if (isNaN(day1L2)){ 
							day1L2 = 0;
						};
						
						if (isNaN(day2L2)){ 
							day2L2 = 0;
						};
						
						if (isNaN(day3L2)){ 
							day3L2 = 0;
						};
						
						if (isNaN(day4L2)){ 
							day4L2 = 0;
						};
						
						if (isNaN(day5L2)){ 
							day5L2 = 0;
						};
						
						if (isNaN(day6L2)){ 
							day6L2 = 0;
						};
						
						if (isNaN(day7L2)){ 
							day7L2 = 0;
						};

						//User 3
						if (isNaN(day1L3)){ 
							day1L3 = 0;
						};
						
						if (isNaN(day2L3)){ 
							day2L3 = 0;
						};
						
						if (isNaN(day3L3)){ 
							day3L3 = 0;
						};
						
						if (isNaN(day4L3)){ 
							day4L3 = 0;
						};
						
						if (isNaN(day5L3)){ 
							day5L3 = 0;
						};
						
						if (isNaN(day6L3)){ 
							day6L3 = 0;
						};
						
						if (isNaN(day7L3)){ 
							day7L3 = 0;
						};

						//User 4
						if (isNaN(day1L4)){ 
							day1L4 = 0;
						};
						
						if (isNaN(day2L4)){ 
							day2L4 = 0;
						};
						
						if (isNaN(day3L4)){ 
							day3L4 = 0;
						};
						
						if (isNaN(day4L4)){ 
							day4L4 = 0;
						};
						
						if (isNaN(day5L4)){ 
							day5L4 = 0;
						};
						
						if (isNaN(day6L4)){ 
							day6L4 = 0;
						};
						
						if (isNaN(day7L4)){ 
							day7L4 = 0;
						};

						//User 5
						if (isNaN(day1L5)){ 
							day1L5 = 0;
						};
						
						if (isNaN(day2L5)){ 
							day2L5 = 0;
						};
						
						if (isNaN(day3L5)){ 
							day3L5 = 0;
						};
						
						if (isNaN(day4L5)){ 
							day4L5 = 0;
						};
						
						if (isNaN(day5L5)){ 
							day5L5 = 0;
						};
						
						if (isNaN(day6L5)){ 
							day6L5 = 0;
						};
						
						if (isNaN(day7L5)){ 
							day7L5 = 0;
						};

						//User 6
						if (isNaN(day1L6)){ 
							day1L6 = 0;
						};
						
						if (isNaN(day2L6)){ 
							day2L6 = 0;
						};
						
						if (isNaN(day3L6)){ 
							day3L6 = 0;
						};
						
						if (isNaN(day4L6)){ 
							day4L6 = 0;
						};
						
						if (isNaN(day5L6)){ 
							day5L6 = 0;
						};
						
						if (isNaN(day6L6)){ 
							day6L6 = 0;
						};
						
						if (isNaN(day7L6)){ 
							day7L6 = 0;
						};

						//User 7
						if (isNaN(day1L7)){ 
							day1L7 = 0;
						};
						
						if (isNaN(day2L7)){ 
							day2L7 = 0;
						};
						
						if (isNaN(day3L7)){ 
							day3L7 = 0;
						};
						
						if (isNaN(day4L7)){ 
							day4L7 = 0;
						};
						
						if (isNaN(day5L7)){ 
							day5L7 = 0;
						};
						
						if (isNaN(day6L7)){ 
							day6L7 = 0;
						};
						
						if (isNaN(day7L7)){ 
							day7L7 = 0;
						};

						var lineChartData = {
							labels : [ sevenday, sixday, fiveday, fourday, threeday, twoday, oneday],
							datasets : [
								<?php 
				        			echo $lineDataEcho1;
				        			echo $lineDataEcho2;
				        			echo $lineDataEcho3;
				        			echo $lineDataEcho4;
				        			echo $lineDataEcho5;
				        			echo $lineDataEcho6;
				        			echo $lineDataEcho7;
				        		 ?>
								
							]
							
						}

					var myLine = new Chart(document.getElementById("canvasLine2").getContext("2d")).Line(lineChartData);
					
					});
					
					</script>
			</div>

<?php

$oneday1 = date('20y-m-d',strtotime("-0 days"));
$twoday1 = date('20y-m-d',strtotime("-1 days"));
$threeday1 = date('20y-m-d',strtotime("-2 days"));
$fourday1 = date('20y-m-d',strtotime("-3 days"));
$fiveday1 = date('20y-m-d',strtotime("-4 days"));
$sixday1 = date('20y-m-d',strtotime("-5 days"));

$month1num = date('m',strtotime("-0 month"));
$month2num = date('m',strtotime("-1 month"));
$month3num = date('m',strtotime("-2 month"));
$month4num = date('m',strtotime("-3 month"));
$month5num = date('m',strtotime("-4 month"));
$month6num= date('m',strtotime("-5 month"));


$monthName1 = date('F', mktime(0, 0, 0, $month1num, 10));
$monthName2 = date('F', mktime(0, 0, 0, $month2num, 10));
$monthName3 = date('F', mktime(0, 0, 0, $month3num, 10));
$monthName4 = date('F', mktime(0, 0, 0, $month4num, 10));
$monthName5 = date('F', mktime(0, 0, 0, $month5num, 10));
$monthName6 = date('F', mktime(0, 0, 0, $month6num, 10));

echo "<input id='oneday1' type='hidden' value='" . $monthName1 . "' ></input>";
echo "<input id='twoday1' type='hidden' value='" . $monthName2 . "' ></input>";
echo "<input id='threeday1' type='hidden' value='" . $monthName3 . "' ></input>";
echo "<input id='fourday1' type='hidden' value='" . $monthName4 . "' ></input>";
echo "<input id='fiveday1' type='hidden' value='" . $monthName5 . "' ></input>";
echo "<input id='sixday1' type='hidden' value='" . $monthName6 . "' ></input>";

$day11 = 0;
$day21 = 0;
$day31 = 0;
$day41 = 0;
$day51 = 0;
$day61 = 0;






function barNumbers1 ($con, $userAccount1, $statusBinding){

$day111 = 0;
$day211 = 0;
$day311 = 0;
$day411 = 0;
$day511 = 0;
$day611 = 0;



$monthPlus1 = date('20y-m-0',strtotime("+1 month"));
$month1 = date('20y-m-0',strtotime("-0 month"));
$month2 = date('20y-m-0',strtotime("-1 month"));
$month3 = date('20y-m-0',strtotime("-2 month"));
$month4 = date('20y-m-0',strtotime("-3 month"));
$month5 = date('20y-m-0',strtotime("-4 month"));
$month6 = date('20y-m-0',strtotime("-5 month"));


$totaltime1 = mysqli_query($con, "SELECT count(1) FROM onsites WHERE date BETWEEN '" . $month1 . "' AND '" . $monthPlus1 . "' AND username = '" . $userAccount1 . "' $statusBinding ");
$totaltime11 = mysqli_fetch_array($totaltime1);
$day111 = $totaltime11[0];

$totaltimetwo1 = mysqli_query($con, "SELECT count(1) FROM onsites WHERE date BETWEEN '" . $month2 . "' AND '" . $month1 . "' AND username = '" . $userAccount1 . "' $statusBinding ");
$totaltimetwo11 = mysqli_fetch_array($totaltimetwo1);
$day211 = $totaltimetwo11[0];

$totaltimethree1 = mysqli_query($con, "SELECT count(1) FROM onsites WHERE date BETWEEN '" . $month3 . "' AND '" . $month2 . "' AND username = '" . $userAccount1 . "' $statusBinding ");
$totaltimethree11 = mysqli_fetch_array($totaltimethree1);
$day311 = $totaltimethree11[0];

$totaltimefour1 = mysqli_query($con, "SELECT count(1) FROM onsites WHERE date BETWEEN '" . $month4 . "' AND '" . $month3 . "' AND username = '" . $userAccount1 . "' $statusBinding ");
$totaltimefour11 = mysqli_fetch_array($totaltimefour1);
$day411 = $totaltimefour11[0];

$totaltimefive1 = mysqli_query($con, "SELECT count(1) FROM onsites WHERE date BETWEEN '" . $month5 . "' AND '" . $month4 . "' AND username = '" . $userAccount1 . "' $statusBinding ");
$totaltimefive11 = mysqli_fetch_array($totaltimefive1);
$day511 = $totaltimefive11[0];

$totaltimesix1 = mysqli_query($con, "SELECT count(1) FROM onsites WHERE date BETWEEN '" . $month6 . "' AND '" . $month5 . "' AND username = '" . $userAccount1 . "' $statusBinding ");
$totaltimesix11 = mysqli_fetch_array($totaltimesix1);
$day611 = $totaltimesix11[0];


echo "<input id='day111' type='hidden' value='" . $day111 . "' ></input>";
echo "<input id='day211' type='hidden' value='" . $day211 . "' ></input>";
echo "<input id='day311' type='hidden' value='" . $day311 . "' ></input>";
echo "<input id='day411' type='hidden' value='" . $day411 . "' ></input>";
echo "<input id='day511' type='hidden' value='" . $day511 . "' ></input>";
echo "<input id='day611' type='hidden' value='" . $day611 . "' ></input>";

global $accountData1;

$accountData1 = "{
	            label: 'My Second dataset',
	            fillColor: 'rgba(151,187,205,0.5)',
	            strokeColor: 'rgba(151,187,205,0.8)',
	            highlightFill: 'rgba(151,187,205,0.75)',
	            highlightStroke: 'rgba(151,187,205,1)',
	            data: [day611, day511, day411, day311, day211, day111]
	        },";


}


function barNumbers2 ($con, $userAccount2, $statusBinding, $timeCount){

$day112 = 0;
$day212 = 0;
$day312 = 0;
$day412 = 0;
$day512 = 0;
$day612 = 0;


$monthPlus1 = date('20y-m-0',strtotime("+1 month"));
$month1 = date('20y-m-0',strtotime("-0 month"));
$month2 = date('20y-m-0',strtotime("-1 month"));
$month3 = date('20y-m-0',strtotime("-2 month"));
$month4 = date('20y-m-0',strtotime("-3 month"));
$month5 = date('20y-m-0',strtotime("-4 month"));
$month6 = date('20y-m-0',strtotime("-5 month"));


$totaltime1 = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date BETWEEN '" . $month1 . "' AND '" . $monthPlus1 . "' AND username = '" . $userAccount2 . "' $statusBinding ");
$totaltime11 = mysqli_fetch_array($totaltime1);
$day112 = $totaltime11[0];

$totaltimetwo1 = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date BETWEEN '" . $month2 . "' AND '" . $month1 . "' AND username = '" . $userAccount2 . "' $statusBinding ");
$totaltimetwo11 = mysqli_fetch_array($totaltimetwo1);
$day212 = $totaltimetwo11[0];

$totaltimethree1 = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date BETWEEN '" . $month3 . "' AND '" . $month2 . "' AND username = '" . $userAccount2 . "' $statusBinding ");
$totaltimethree11 = mysqli_fetch_array($totaltimethree1);
$day312 = $totaltimethree11[0];

$totaltimefour1 = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date BETWEEN '" . $month4 . "' AND '" . $month3 . "' AND username = '" . $userAccount2 . "' $statusBinding ");
$totaltimefour11 = mysqli_fetch_array($totaltimefour1);
$day412 = $totaltimefour11[0];

$totaltimefive1 = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date BETWEEN '" . $month5 . "' AND '" . $month4 . "' AND username = '" . $userAccount2 . "' $statusBinding ");
$totaltimefive11 = mysqli_fetch_array($totaltimefive1);
$day512 = $totaltimefive11[0];

$totaltimesix1 = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date BETWEEN '" . $month6 . "' AND '" . $month5 . "' AND username = '" . $userAccount2 . "' $statusBinding ");
$totaltimesix11 = mysqli_fetch_array($totaltimesix1);
$day612 = $totaltimesix11[0];


echo "<input id='day112' type='hidden' value='" . $day112 . "' ></input>";
echo "<input id='day212' type='hidden' value='" . $day212 . "' ></input>";
echo "<input id='day312' type='hidden' value='" . $day312 . "' ></input>";
echo "<input id='day412' type='hidden' value='" . $day412 . "' ></input>";
echo "<input id='day512' type='hidden' value='" . $day512 . "' ></input>";
echo "<input id='day612' type='hidden' value='" . $day612 . "' ></input>";

global $accountData2;

$accountData2 = "{
	            label: 'My Second dataset',
	            fillColor: '#FDB45C',
	            strokeColor: 'rgba(151,187,205,0.8)',
	            highlightFill: 'rgba(151,187,205,0.75)',
	            highlightStroke: 'rgba(151,187,205,1)',
	            data: [day612, day512, day412, day312, day212, day112]
	        },";


}


function barNumbers3 ($con, $userAccount3, $statusBinding, $timeCount){

$day113 = 0;
$day213 = 0;
$day313 = 0;
$day413 = 0;
$day513 = 0;
$day613 = 0;


$monthPlus1 = date('20y-m-0',strtotime("+1 month"));
$month1 = date('20y-m-0',strtotime("-0 month"));
$month2 = date('20y-m-0',strtotime("-1 month"));
$month3 = date('20y-m-0',strtotime("-2 month"));
$month4 = date('20y-m-0',strtotime("-3 month"));
$month5 = date('20y-m-0',strtotime("-4 month"));
$month6 = date('20y-m-0',strtotime("-5 month"));


$totaltime1 = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date BETWEEN '" . $month1 . "' AND '" . $monthPlus1 . "' AND username = '" . $userAccount3 . "' $statusBinding ");
$totaltime11 = mysqli_fetch_array($totaltime1);
$day113 = $totaltime11[0];

$totaltimetwo1 = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date BETWEEN '" . $month2 . "' AND '" . $month1 . "' AND username = '" . $userAccount3 . "' $statusBinding ");
$totaltimetwo11 = mysqli_fetch_array($totaltimetwo1);
$day213 = $totaltimetwo11[0];

$totaltimethree1 = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date BETWEEN '" . $month3 . "' AND '" . $month2 . "' AND username = '" . $userAccount3 . "' $statusBinding ");
$totaltimethree11 = mysqli_fetch_array($totaltimethree1);
$day313 = $totaltimethree11[0];

$totaltimefour1 = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date BETWEEN '" . $month4 . "' AND '" . $month3 . "' AND username = '" . $userAccount3 . "' $statusBinding ");
$totaltimefour11 = mysqli_fetch_array($totaltimefour1);
$day413 = $totaltimefour11[0];

$totaltimefive1 = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date BETWEEN '" . $month5 . "' AND '" . $month4 . "' AND username = '" . $userAccount3 . "' $statusBinding ");
$totaltimefive11 = mysqli_fetch_array($totaltimefive1);
$day513 = $totaltimefive11[0];

$totaltimesix1 = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date BETWEEN '" . $month6 . "' AND '" . $month5 . "' AND username = '" . $userAccount3 . "' $statusBinding ");
$totaltimesix11 = mysqli_fetch_array($totaltimesix1);
$day613 = $totaltimesix11[0];

echo "<input id='day113' type='hidden' value='" . $day113 . "' ></input>";
echo "<input id='day213' type='hidden' value='" . $day213 . "' ></input>";
echo "<input id='day313' type='hidden' value='" . $day313 . "' ></input>";
echo "<input id='day413' type='hidden' value='" . $day413 . "' ></input>";
echo "<input id='day513' type='hidden' value='" . $day513 . "' ></input>";
echo "<input id='day613' type='hidden' value='" . $day613 . "' ></input>";

global $accountData3;

$accountData3 = "{
	            label: 'My Second dataset',
	            fillColor: '#F7464A',
	            strokeColor: 'rgba(151,187,205,0.8)',
	            highlightFill: 'rgba(151,187,205,0.75)',
	            highlightStroke: 'rgba(151,187,205,1)',
	            data: [day613, day513, day413, day313, day213, day113]
	        },";


}

function barNumbers4 ($con, $userAccount4, $statusBinding, $timeCount){

$day114 = 0;
$day214 = 0;
$day314 = 0;
$day414 = 0;
$day514 = 0;
$day614 = 0;


$monthPlus1 = date('20y-m-0',strtotime("+1 month"));
$month1 = date('20y-m-0',strtotime("-0 month"));
$month2 = date('20y-m-0',strtotime("-1 month"));
$month3 = date('20y-m-0',strtotime("-2 month"));
$month4 = date('20y-m-0',strtotime("-3 month"));
$month5 = date('20y-m-0',strtotime("-4 month"));
$month6 = date('20y-m-0',strtotime("-5 month"));


$totaltime1 = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date BETWEEN '" . $month1 . "' AND '" . $monthPlus1 . "' AND username = '" . $userAccount4 . "' $statusBinding ");
$totaltime11 = mysqli_fetch_array($totaltime1);
$day114 = $totaltime11[0];

$totaltimetwo1 = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date BETWEEN '" . $month2 . "' AND '" . $month1 . "' AND username = '" . $userAccount4 . "' $statusBinding ");
$totaltimetwo11 = mysqli_fetch_array($totaltimetwo1);
$day214 = $totaltimetwo11[0];

$totaltimethree1 = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date BETWEEN '" . $month3 . "' AND '" . $month2 . "' AND username = '" . $userAccount4 . "' $statusBinding ");
$totaltimethree11 = mysqli_fetch_array($totaltimethree1);
$day314 = $totaltimethree11[0];

$totaltimefour1 = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date BETWEEN '" . $month4 . "' AND '" . $month3 . "' AND username = '" . $userAccount4 . "' $statusBinding ");
$totaltimefour11 = mysqli_fetch_array($totaltimefour1);
$day414 = $totaltimefour11[0];

$totaltimefive1 = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date BETWEEN '" . $month5 . "' AND '" . $month4 . "' AND username = '" . $userAccount4 . "' $statusBinding ");
$totaltimefive11 = mysqli_fetch_array($totaltimefive1);
$day514 = $totaltimefive11[0];

$totaltimesix1 = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date BETWEEN '" . $month6 . "' AND '" . $month5 . "' AND username = '" . $userAccount4 . "' $statusBinding ");
$totaltimesix11 = mysqli_fetch_array($totaltimesix1);
$day614 = $totaltimesix11[0];

echo "<input id='day114' type='hidden' value='" . $day114 . "' ></input>";
echo "<input id='day214' type='hidden' value='" . $day214 . "' ></input>";
echo "<input id='day314' type='hidden' value='" . $day314 . "' ></input>";
echo "<input id='day414' type='hidden' value='" . $day414 . "' ></input>";
echo "<input id='day514' type='hidden' value='" . $day514 . "' ></input>";
echo "<input id='day614' type='hidden' value='" . $day614 . "' ></input>";

global $accountData4;

$accountData4 = "{
	            label: 'My Second dataset',
	            fillColor: '#949FB1',
	            strokeColor: 'rgba(151,187,205,0.8)',
	            highlightFill: 'rgba(151,187,205,0.75)',
	            highlightStroke: 'rgba(151,187,205,1)',
	            data: [day614, day514, day414, day314, day214, day114]
	        },";


}


function barNumbers5 ($con, $userAccount5, $statusBinding, $timeCount){

$day115 = 0;
$day215 = 0;
$day315 = 0;
$day415 = 0;
$day515 = 0;
$day615 = 0;


$monthPlus1 = date('20y-m-0',strtotime("+1 month"));
$month1 = date('20y-m-0',strtotime("-0 month"));
$month2 = date('20y-m-0',strtotime("-1 month"));
$month3 = date('20y-m-0',strtotime("-2 month"));
$month4 = date('20y-m-0',strtotime("-3 month"));
$month5 = date('20y-m-0',strtotime("-4 month"));
$month6 = date('20y-m-0',strtotime("-5 month"));


$totaltime1 = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date BETWEEN '" . $month1 . "' AND '" . $monthPlus1 . "' AND username = '" . $userAccount5 . "' $statusBinding ");
$totaltime11 = mysqli_fetch_array($totaltime1);
$day115 = $totaltime11[0];

$totaltimetwo1 = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date BETWEEN '" . $month2 . "' AND '" . $month1 . "' AND username = '" . $userAccount5 . "' $statusBinding ");
$totaltimetwo11 = mysqli_fetch_array($totaltimetwo1);
$day215 = $totaltimetwo11[0];

$totaltimethree1 = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date BETWEEN '" . $month3 . "' AND '" . $month2 . "' AND username = '" . $userAccount5 . "' $statusBinding ");
$totaltimethree11 = mysqli_fetch_array($totaltimethree1);
$day315 = $totaltimethree11[0];

$totaltimefour1 = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date BETWEEN '" . $month4 . "' AND '" . $month3 . "' AND username = '" . $userAccount5 . "' $statusBinding ");
$totaltimefour11 = mysqli_fetch_array($totaltimefour1);
$day415 = $totaltimefour11[0];

$totaltimefive1 = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date BETWEEN '" . $month5 . "' AND '" . $month4 . "' AND username = '" . $userAccount5 . "' $statusBinding ");
$totaltimefive11 = mysqli_fetch_array($totaltimefive1);
$day515 = $totaltimefive11[0];

$totaltimesix1 = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date BETWEEN '" . $month6 . "' AND '" . $month5 . "' AND username = '" . $userAccount5 . "' $statusBinding ");
$totaltimesix11 = mysqli_fetch_array($totaltimesix1);
$day615 = $totaltimesix11[0];

echo "<input id='day115' type='hidden' value='" . $day115 . "' ></input>";
echo "<input id='day215' type='hidden' value='" . $day215 . "' ></input>";
echo "<input id='day315' type='hidden' value='" . $day315 . "' ></input>";
echo "<input id='day415' type='hidden' value='" . $day415 . "' ></input>";
echo "<input id='day515' type='hidden' value='" . $day515 . "' ></input>";
echo "<input id='day615' type='hidden' value='" . $day615 . "' ></input>";

global $accountData5;

$accountData5 = "{
				label: 'My First dataset',
	            fillColor: 'rgba(220,220,220,0.5)',
	            strokeColor: 'rgba(220,220,220,1)',
	            highlightFill: 'rgba(220,220,220,0.75)',
	            highlightStroke: 'rgba(220,220,220,1)',
	            data: [day615, day515, day415, day315, day215, day115]
	        },";


}


function barNumbers6 ($con, $userAccount6, $statusBinding, $timeCount){

$day116 = 0;
$day216 = 0;
$day316 = 0;
$day416 = 0;
$day516 = 0;
$day616 = 0;

$monthPlus1 = date('20y-m-0',strtotime("+1 month"));
$month1 = date('20y-m-0',strtotime("-0 month"));
$month2 = date('20y-m-0',strtotime("-1 month"));
$month3 = date('20y-m-0',strtotime("-2 month"));
$month4 = date('20y-m-0',strtotime("-3 month"));
$month5 = date('20y-m-0',strtotime("-4 month"));
$month6 = date('20y-m-0',strtotime("-5 month"));


$totaltime1 = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date BETWEEN '" . $month1 . "' AND '" . $monthPlus1 . "' AND username = '" . $userAccount6 . "' $statusBinding ");
$totaltime11 = mysqli_fetch_array($totaltime1);
$day116 = $totaltime11[0];

$totaltimetwo1 = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date BETWEEN '" . $month2 . "' AND '" . $month1 . "' AND username = '" . $userAccount6 . "' $statusBinding ");
$totaltimetwo11 = mysqli_fetch_array($totaltimetwo1);
$day216 = $totaltimetwo11[0];

$totaltimethree1 = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date BETWEEN '" . $month3 . "' AND '" . $month2 . "' AND username = '" . $userAccount6 . "' $statusBinding ");
$totaltimethree11 = mysqli_fetch_array($totaltimethree1);
$day316 = $totaltimethree11[0];

$totaltimefour1 = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date BETWEEN '" . $month4 . "' AND '" . $month3 . "' AND username = '" . $userAccount6 . "' $statusBinding ");
$totaltimefour11 = mysqli_fetch_array($totaltimefour1);
$day416 = $totaltimefour11[0];

$totaltimefive1 = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date BETWEEN '" . $month5 . "' AND '" . $month4 . "' AND username = '" . $userAccount6 . "' $statusBinding ");
$totaltimefive11 = mysqli_fetch_array($totaltimefive1);
$day516 = $totaltimefive11[0];

$totaltimesix1 = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date BETWEEN '" . $month6 . "' AND '" . $month5 . "' AND username = '" . $userAccount6 . "' $statusBinding ");
$totaltimesix11 = mysqli_fetch_array($totaltimesix1);
$day616 = $totaltimesix11[0];

echo "<input id='day116' type='hidden' value='" . $day116 . "' ></input>";
echo "<input id='day216' type='hidden' value='" . $day216 . "' ></input>";
echo "<input id='day316' type='hidden' value='" . $day316 . "' ></input>";
echo "<input id='day416' type='hidden' value='" . $day416 . "' ></input>";
echo "<input id='day516' type='hidden' value='" . $day516 . "' ></input>";
echo "<input id='day616' type='hidden' value='" . $day616 . "' ></input>";

global $accountData6;

$accountData6 = "{
	            label: 'My Second dataset',
	            fillColor: '#46BFBD',
	            strokeColor: 'rgba(151,187,205,0.8)',
	            highlightFill: 'rgba(151,187,205,0.75)',
	            highlightStroke: 'rgba(151,187,205,1)',
	            data: [day616, day516, day416, day316, day216, day116]
	        },";


}


function barNumbers7 ($con, $userAccount7, $statusBinding, $timeCount){

$day117 = 0;
$day217 = 0;
$day317 = 0;
$day417 = 0;
$day517 = 0;
$day617 = 0;


$monthPlus1 = date('20y-m-0',strtotime("+1 month"));
$month1 = date('20y-m-0',strtotime("-0 month"));
$month2 = date('20y-m-0',strtotime("-1 month"));
$month3 = date('20y-m-0',strtotime("-2 month"));
$month4 = date('20y-m-0',strtotime("-3 month"));
$month5 = date('20y-m-0',strtotime("-4 month"));
$month6 = date('20y-m-0',strtotime("-5 month"));


$totaltime1 = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date BETWEEN '" . $month1 . "' AND '" . $monthPlus1 . "' AND username = '" . $userAccount7 . "' $statusBinding ");
$totaltime11 = mysqli_fetch_array($totaltime1);
$day117 = $totaltime11[0];

$totaltimetwo1 = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date BETWEEN '" . $month2 . "' AND '" . $month1 . "' AND username = '" . $userAccount7 . "' $statusBinding ");
$totaltimetwo11 = mysqli_fetch_array($totaltimetwo1);
$day217 = $totaltimetwo11[0];

$totaltimethree1 = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date BETWEEN '" . $month3 . "' AND '" . $month2 . "' AND username = '" . $userAccount7 . "' $statusBinding ");
$totaltimethree11 = mysqli_fetch_array($totaltimethree1);
$day317 = $totaltimethree11[0];

$totaltimefour1 = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date BETWEEN '" . $month4 . "' AND '" . $month3 . "' AND username = '" . $userAccount7 . "' $statusBinding ");
$totaltimefour11 = mysqli_fetch_array($totaltimefour1);
$day417 = $totaltimefour11[0];

$totaltimefive1 = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date BETWEEN '" . $month5 . "' AND '" . $month4 . "' AND username = '" . $userAccount7 . "' $statusBinding ");
$totaltimefive11 = mysqli_fetch_array($totaltimefive1);
$day517 = $totaltimefive11[0];

$totaltimesix1 = mysqli_query($con, "SELECT $timeCount FROM onsites WHERE date BETWEEN '" . $month6 . "' AND '" . $month5 . "' AND username = '" . $userAccount7 . "' $statusBinding ");
$totaltimesix11 = mysqli_fetch_array($totaltimesix1);
$day617 = $totaltimesix11[0];

echo "<input id='day117' type='hidden' value='" . $day117 . "' ></input>";
echo "<input id='day217' type='hidden' value='" . $day217 . "' ></input>";
echo "<input id='day317' type='hidden' value='" . $day317 . "' ></input>";
echo "<input id='day417' type='hidden' value='" . $day417 . "' ></input>";
echo "<input id='day517' type='hidden' value='" . $day517 . "' ></input>";
echo "<input id='day617' type='hidden' value='" . $day617 . "' ></input>";

global $accountData7;

$accountData7 = "{
	            label: 'My Second dataset',
	            fillColor: 'rgba(151,187,205,0.5)',
	            strokeColor: '#32CD32',
	            highlightFill: 'rgba(151,187,205,0.75)',
	            highlightStroke: '#32CD32',
	            data: [day617, day517, day417, day317, day217, day117]
	        },";


}


//This is where you set the user accounts
$userAccount1 = 'rwilson';
$userAccount2 = 'towens';
$userAccount3 = 'jdiaz';
$userAccount4 = 'bpendleton';
$userAccount5 = 'swilson';
$userAccount6 = 'afunk';
$userAccount7 = 'alangford';

barNumbers1($con, $userAccount1, $statusBinding, $timeCount);
barNumbers2($con, $userAccount2, $statusBinding, $timeCount);
barNumbers3($con, $userAccount3, $statusBinding, $timeCount);
barNumbers4($con, $userAccount4, $statusBinding, $timeCount);
barNumbers5($con, $userAccount5, $statusBinding, $timeCount);
barNumbers6($con, $userAccount6, $statusBinding, $timeCount);
barNumbers7($con, $userAccount7, $statusBinding, $timeCount);
?>

	<div class="panel">
		<div class="panel-default">
				<div class="panel-heading">
					<div class="panel-title">
					Month View <span class="sub-panel-title">- 6 Month View</span><div id="weekTotal" class="inline-input"></div>
					</div>
				</div>
		</div>
			
			<script src="chart/Chartblogs.js"></script>
				<canvas id="canvas4" height="530px" width="1060px"  ></canvas>
				
				
			<script type="text/javascript">
				
				$( document ).ready(function() {
				
				// This is getting the date and adding it to the graph
				var oneday1 = $("#oneday1").val();
				var twoday1 = $("#twoday1").val();
				var threeday1 = $("#threeday1").val();
				var fourday1 = $("#fourday1").val();
				var fiveday1 = $("#fiveday1").val();
				var sixday1 = $("#sixday1").val();
				

				//USER 1
				var day111 = parseInt($("#day111").val());
				var day211 = parseInt($("#day211").val());
				var day311 = parseInt($("#day311").val());
				var day411 = parseInt($("#day411").val());
				var day511 = parseInt($("#day511").val());
				var day611 = parseInt($("#day611").val());

				//USER 2
				var day112 = parseInt($("#day112").val());
				var day212 = parseInt($("#day212").val());
				var day312 = parseInt($("#day312").val());
				var day412 = parseInt($("#day412").val());
				var day512 = parseInt($("#day512").val());
				var day612 = parseInt($("#day612").val());

				//USER 3
				var day113 = parseInt($("#day113").val());
				var day213 = parseInt($("#day213").val());
				var day313 = parseInt($("#day313").val());
				var day413 = parseInt($("#day413").val());
				var day513 = parseInt($("#day513").val());
				var day613 = parseInt($("#day613").val());

				//USER 4
				var day114 = parseInt($("#day114").val());
				var day214 = parseInt($("#day214").val());
				var day314 = parseInt($("#day314").val());
				var day414 = parseInt($("#day414").val());
				var day514 = parseInt($("#day514").val());
				var day614 = parseInt($("#day614").val());

				//USER 5
				var day115 = parseInt($("#day115").val());
				var day215 = parseInt($("#day215").val());
				var day315 = parseInt($("#day315").val());
				var day415 = parseInt($("#day415").val());
				var day515 = parseInt($("#day515").val());
				var day615 = parseInt($("#day615").val());

				//USER 6
				var day116 = parseInt($("#day116").val());
				var day216 = parseInt($("#day216").val());
				var day316 = parseInt($("#day316").val());
				var day416 = parseInt($("#day416").val());
				var day516 = parseInt($("#day516").val());
				var day616 = parseInt($("#day616").val());

				//USER 7
				var day117 = parseInt($("#day117").val());
				var day217 = parseInt($("#day217").val());
				var day317 = parseInt($("#day317").val());
				var day417 = parseInt($("#day417").val());
				var day517 = parseInt($("#day517").val());
				var day617 = parseInt($("#day617").val());

				//User 1
				if (isNaN(day111)){ 
					day111 = 0;
				};
				
				if (isNaN(day211)){ 
					day211 = 0;
				};
				
				if (isNaN(day311)){ 
					day311 = 0;
				};
				
				if (isNaN(day411)){ 
					day411 = 0;
				};
				
				if (isNaN(day511)){ 
					day511 = 0;
				};
				
				if (isNaN(day611)){ 
					day611 = 0;
				};
				

				//User 2
				if (isNaN(day112)){ 
					day112 = 0;
				};
				
				if (isNaN(day212)){ 
					day212 = 0;
				};
				
				if (isNaN(day312)){ 
					day312 = 0;
				};
				
				if (isNaN(day412)){ 
					day412 = 0;
				};
				
				if (isNaN(day512)){ 
					day512 = 0;
				};
				
				if (isNaN(day612)){ 
					day612 = 0;
				};
				;


				//User 3
				if (isNaN(day113)){ 
					day113 = 0;
				};
				
				if (isNaN(day213)){ 
					day213 = 0;
				};
				
				if (isNaN(day313)){ 
					day313 = 0;
				};
				
				if (isNaN(day413)){ 
					day413 = 0;
				};
				
				if (isNaN(day513)){ 
					day513 = 0;
				};
				
				if (isNaN(day613)){ 
					day613 = 0;
				};


				//User 4
				if (isNaN(day114)){ 
					day114 = 0;
				};
				
				if (isNaN(day214)){ 
					day214 = 0;
				};
				
				if (isNaN(day314)){ 
					day314 = 0;
				};
				
				if (isNaN(day414)){ 
					day414 = 0;
				};
				
				if (isNaN(day514)){ 
					day514 = 0;
				};
				
				if (isNaN(day614)){ 
					day614 = 0;
				};
				


				//User 5
				if (isNaN(day115)){ 
					day115 = 0;
				};
				
				if (isNaN(day215)){ 
					day215 = 0;
				};
				
				if (isNaN(day315)){ 
					day315 = 0;
				};
				
				if (isNaN(day415)){ 
					day415 = 0;
				};
				
				if (isNaN(day515)){ 
					day515 = 0;
				};
				
				if (isNaN(day615)){ 
					day615 = 0;
				};
				

				//User 6
				if (isNaN(day116)){ 
					day116 = 0;
				};
				
				if (isNaN(day216)){ 
					day216 = 0;
				};
				
				if (isNaN(day316)){ 
					day316 = 0;
				};
				
				if (isNaN(day416)){ 
					day416 = 0;
				};
				
				if (isNaN(day516)){ 
					day516 = 0;
				};
				
				if (isNaN(day616)){ 
					day616 = 0;
				};
				

				//User 7
				if (isNaN(day117)){ 
					day117 = 0;
				};
				
				if (isNaN(day217)){ 
					day217 = 0;
				};
				
				if (isNaN(day317)){ 
					day317 = 0;
				};
				
				if (isNaN(day417)){ 
					day417 = 0;
				};
				
				if (isNaN(day517)){ 
					day517 = 0;
				};
				
				if (isNaN(day617)){ 
					day617 = 0;
				};
				


				var data = {
				    labels: [sixday1, fiveday1, fourday1, threeday1, twoday1, oneday1],
				    datasets: [

				        		<?php 
				        			echo $accountData1;
				 					echo $accountData2;
				 					echo $accountData3;
				 					echo $accountData4;
				 					echo $accountData5;
				 					echo $accountData6;
				 					echo $accountData7;
				        		 ?>
				    ]
				};
				
			var myLine = new Chart(document.getElementById("canvas4").getContext("2d")).Bar(data);

			});
			
			</script>
		</div>
	</div>

</div>	
<div class="container5" style="display: none;">
	<div class="right-Wrapper-onsite">


		<div class="panel" id="newUser" style="min-height: 300px;">
			<div class="panel-default">
				<div class="panel-heading">
					<div class="panel-title">
						Filters & Legend <span class="sub-panel-title"></span>
					</div>
				</div>
			</div>
			<div style="margin: 10px; margin-left: 20px; margin-bottom: 0px !important;">

				<form action="onsiteqa.php#btn5" method="POST">
					<strong>Time View: </strong>
					<input onChange="this.form.submit()" type="checkbox" name="time" value="true" style="width: 20px; height: 20px; margin: 5px; vertical-align: -5px;" <?= $checkStatus ?> >

					<strong>Task Type: </strong>
					<select onChange="this.form.submit()"  name="taskType"  style="height: 33px; width: 250px !important;" class="btn btn-primary input-standard contentForm">
						<?php echo '<option selected style="display: none;" value="' . $statusBinding . '" >' . $taskName . '</option>'; ?>
						<optgroup label="Standard Onsite Tasks">
							<option value="AND status != 'Kickback'">ALL VIEW</option>
							<option value="">ALL VIEW + Kickbacks</option>
							<option value="AND status = 'Kickback'">Kickbacks Only</option>
						    <option value="AND task = 'Basic Onsites'">Basic Onsites</option>
						    <option value="AND task = 'Google Analytics'">Google Analytics</option>
						    <option value="AND task = '301 redirects'">301 redirects</option>
				            <option value="AND task = 'Canonical tags'">Canonical tags</option>
				     	    <option value="AND task = 'Content Implementation'">Content Implementation</option>
						    <option value="AND task = 'Crazy egg'">Crazy egg</option>
						    <option value="AND task = 'Nofollow Tag(s)'">Nofollow Tag(s)</option>
						    <option value="AND task = 'Page Creation'">Page Creation</option>
						    <option value="AND task = 'Robots.txt file'">Robots.txt file</option>
						    <option value="AND task = 'Schema Tags'">Schema Tags</option>
						    <option value="AND task = 'Sitemap.xml file'">Sitemap.xml file</option>
						    <option value="AND task = 'Misc. Edits'">Misc. Edits</option>
						    <option value="AND task = 'Ranking Audit'">Ranking Audit</option>
						    <option value="AND task = 'CMS Testing'">CMS Testing</option>
					        <option value="AND task = 'Post Blog'">Post Blog</option>
    						<option value="AND task = 'Setup Blog'">Setup Blog</option>
					    </optgroup>
					    <optgroup label="Other Tasks">
						    <option value="AND task = 'GNA Skip'">GNA Skip</option>
						    <option value="AND task = 'Other'">Other</option>
					    </optgroup>
					</select>
				</form>

			</div>
				<hr style="margin-top: 11px; margin-bottom: 6px;">
			<div class="graphkey" style="float: left; width: 181px !important;">
				<ul style="margin: 5px;">
				<li id="tanBulletin"><span style="color: black; font-size: 14px;"><?= $lineAccount1 ?></span></li>
				<li id="tanBulletin2"><span style="color: black; font-size: 14px;"><?= $lineAccount2 ?></span></li>
				<li id="tanBulletin3"><span style="color: black; font-size: 14px;"><?= $lineAccount3 ?></span></li>
				<li id="tanBulletin4"><span style="color: black; font-size: 14px;"><?= $lineAccount4 ?></span></li>
				<li id="tanBulletin5"><span style="color: black; font-size: 14px;"><?= $lineAccount5 ?></span></li>
				<li id="tanBulletin6"><span style="color: black; font-size: 14px;"><?= $lineAccount6 ?></span></li>
				<li id="tanBulletin7"><span style="color: black; font-size: 14px;"><?= $lineAccount7 ?></span></li>
				</ul>
			</div>
			<div class="graphDescription" style="margin: 20px;">
				<p>
					<strong>Onsite Total Daily Tasks:</strong> This shows the total tasks being completed by the onsite team each day with a 7 day window.
				</p>
				<p>
					<strong>Individual Daily Tasks:</strong> This shows the total tasks being completed by the each member of the onsite team each day with a 7 day window.
				</p>
				<p>
					<strong>Month View:</strong> This shows the total tasks being completed by the each member of the onsite team each month for the past 6 months.
				</p>
				<p>
					<strong>Graph Viewing Scale: </strong> Each graph has a dynamic viewing scale, meaning the highest number will determine the top of the scale, and the rest of the data will be compared in relation to it.
				</p>
			</div>
		</div>
	</div>


</div>