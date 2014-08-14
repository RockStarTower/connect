<?php
include 'header.php';
?>




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

/*grabbing information for incomplete again */

$result1 = mysqli_query($con, "SELECT count(1) FROM custom WHERE finished = 'Incomplete' AND date = '" . $oneday . "' ");
$row1 = mysqli_fetch_array($result1);
$day1 = $row1[0];


$result2 = mysqli_query($con, "SELECT count(1) FROM custom WHERE finished = 'Incomplete' AND date = '" . $twoday . "' ");
$row2 = mysqli_fetch_array($result2);
$day2 = $row2[0];


$result3 = mysqli_query($con, "SELECT count(1) FROM custom WHERE finished = 'Incomplete' AND date = '" . $threeday . "' ");
$row3 = mysqli_fetch_array($result3);
$day3 = $row3[0];


$result4 = mysqli_query($con, "SELECT count(1) FROM custom WHERE finished = 'Incomplete' AND date = '" . $fourday . "' ");
$row4 = mysqli_fetch_array($result4);
$day4 = $row4[0];


$result5 = mysqli_query($con, "SELECT count(1) FROM custom WHERE finished = 'Incomplete' AND date = '" . $fiveday . "' ");
$row5 = mysqli_fetch_array($result5);
$day5 = $row5[0];

$result6 = mysqli_query($con, "SELECT count(1) FROM custom WHERE finished = 'Incomplete' AND date = '" . $sixday . "' ");
$row6 = mysqli_fetch_array($result6);
$day6 = $row6[0];

$result7 = mysqli_query($con, "SELECT count(1) FROM custom WHERE finished = 'Incomplete' AND date = '" . $sevenday . "' ");
$row7 = mysqli_fetch_array($result7);
$day7 = $row7[0];

/* grabbing information for completed */

$result1c = mysqli_query($con, "SELECT count(1) FROM custom WHERE finished = 'Completed' AND date = '" . $oneday . "' ");
$row1c = mysqli_fetch_array($result1c);
$day1c = $row1c[0];

$result2c = mysqli_query($con, "SELECT count(1) FROM custom WHERE finished = 'Completed' AND date = '" . $twoday . "' ");
$row2c = mysqli_fetch_array($result2c);
$day2c = $row2c[0];

$result3c = mysqli_query($con, "SELECT count(1) FROM custom WHERE finished = 'Completed' AND date = '" . $threeday . "' ");
$row3c = mysqli_fetch_array($result3c);
$day3c = $row3c[0];

$result4c = mysqli_query($con, "SELECT count(1) FROM custom WHERE finished = 'Completed' AND date = '" . $fourday . "' ");
$row4c = mysqli_fetch_array($result4c);
$day4c = $row4c[0];

$result5c = mysqli_query($con, "SELECT count(1) FROM custom WHERE finished = 'Completed' AND date = '" . $fiveday . "' ");
$row5c = mysqli_fetch_array($result5c);
$day5c = $row5c[0];

$result6c = mysqli_query($con, "SELECT count(1) FROM custom WHERE finished = 'Completed' AND date = '" . $sixday . "' ");
$row6c = mysqli_fetch_array($result6c);
$day6c = $row6c[0];

$result7c = mysqli_query($con, "SELECT count(1) FROM custom WHERE finished = 'Completed' AND date = '" . $sevenday . "' ");
$row7c = mysqli_fetch_array($result7c);
$day7c = $row7c[0];

//total incomplete

$incomplete1 = mysqli_query($con, "SELECT count(1) FROM custom WHERE finished = 'Incomplete' ");
$incomplete = mysqli_fetch_array($incomplete1);
$incompletetasks = $incomplete[0];

//total Completed

$completed1 = mysqli_query($con, "SELECT count(1) FROM custom WHERE finished = 'Completed' ");
$completed = mysqli_fetch_array($completed1);
$completedtasks = $completed[0];

// Total amount done by specific user 

$firstuser = "sparker";
$seconduser = "dbarrington";
$thirduser = "tmwaruka";
$fourthuser = "jcarroll";


$user1 = mysqli_query($con, "SELECT count(1) FROM custom WHERE finished = 'Completed' AND username ='" . $firstuser . "' ");
$user1one = mysqli_fetch_array($user1);
$userone = $user1one[0];

$user2 = mysqli_query($con, "SELECT count(1) FROM custom WHERE finished = 'Completed' AND username ='" . $seconduser . "' ");
$user2two = mysqli_fetch_array($user2);
$usertwo = $user2two[0];

$user3 = mysqli_query($con, "SELECT count(1) FROM custom WHERE finished = 'Completed' AND username ='" . $thirduser . "' ");
$user3three = mysqli_fetch_array($user3);
$userthree = $user3three[0];

$user4 = mysqli_query($con, "SELECT count(1) FROM custom WHERE finished = 'Completed' AND username ='" . $fourthuser . "' ");
$user4fourth = mysqli_fetch_array($user4);
$userfour = $user4fourth[0];


// Incomplete placed into inputs for javascript to grab

echo "<input id='day1' type='hidden' value='" . $day1 . "' ></input>";
echo "<input id='day2' type='hidden' value='" . $day2 . "' ></input>";
echo "<input id='day3' type='hidden' value='" . $day3 . "' ></input>";
echo "<input id='day4' type='hidden' value='" . $day4 . "' ></input>";
echo "<input id='day5' type='hidden' value='" . $day5 . "' ></input>";
echo "<input id='day6' type='hidden' value='" . $day6 . "' ></input>";
echo "<input id='day7' type='hidden' value='" . $day7 . "' ></input>";

// completed placed into inputs for javascript to grab

echo "<input id='day1c' type='hidden' value='" . $day1c . "' ></input>";
echo "<input id='day2c' type='hidden' value='" . $day2c . "' ></input>";
echo "<input id='day3c' type='hidden' value='" . $day3c . "' ></input>";
echo "<input id='day4c' type='hidden' value='" . $day4c . "' ></input>";
echo "<input id='day5c' type='hidden' value='" . $day5c . "' ></input>";
echo "<input id='day6c' type='hidden' value='" . $day6c . "' ></input>";
echo "<input id='day7c' type='hidden' value='" . $day7c . "' ></input>";


?>

<div class="body-wrapper">

	<div class="lSide">
	
		<div class="pickTask">
			<div class="pickTaskContainer" id="subTasksIcon" >
				<img class="taskIcon"  src="images/subtasks.png" />
				<div class="taskText">
					Sub Task Report
				</div>
			</div>
		</div>

	</div>


	<div class="left-wrapper">

		<div class="panel">
			<div class="panel-default">
					<div class="panel-heading">
						<div class="panel-title">
						Burn Down <span class="sub-panel-title">- All Users</span>
						</div>
					</div>
				</div>
				
			<script src="chart/Chartcustom.js"></script>
			<style>
				canvas{
				}
			</style>
			
				<div class="graphkey">
					<ul style="margin: 5px;">
					<li id="blueBulletin"><span style="color: black; font-size: 14px;">Tasks In Progress</span></li> 
					<li id="tanBulletin"><span style="color: black; font-size: 14px;">Tasks Completed</span></li>
					</ul>
				</div>
			
				<canvas id="canvas"  height="530px" width="1060px" ></canvas>
			

				
			<script>
				
				// This is getting the date and adding it to the graph
				var oneday = $("#oneday").val();
				var twoday = $("#twoday").val();
				var threeday = $("#threeday").val();
				var fourday = $("#fourday").val();
				var fiveday = $("#fiveday").val();
				var sixday = $("#sixday").val();
				var sevenday = $("#sevenday").val();
				
				//this is setting the varibales for all the incomplete tasks
				var day1 = $("#day1").val();
				var day2 = $("#day2").val();
				var day3 = $("#day3").val();
				var day4 = $("#day4").val();
				var day5 = $("#day5").val();
				var day6 = $("#day6").val();
				var day7 = $("#day7").val();
				
				//this is setting the variables for the completed tasks
				var day1c = $("#day1c").val();
				var day2c = $("#day2c").val();
				var day3c = $("#day3c").val();
				var day4c = $("#day4c").val();
				var day5c = $("#day5c").val();
				var day6c = $("#day6c").val();
				var day7c = $("#day7c").val();
				
				var lineChartData = {
					labels : [ sevenday, sixday, fiveday, fourday, threeday, twoday, oneday],
					datasets : [
						{
							fillColor : "rgba(220,220,220,0.5)",
							strokeColor : "rgba(220,220,220,1)",
							pointColor : "rgba(220,220,220,1)",
							pointStrokeColor : "#fff",
							data : [day7,day6,day5,day4,day3,day2,day1]
						},
						{
							fillColor : "rgba(151,187,205,0.5)",
							strokeColor : "rgba(151,187,205,1)",
							pointColor : "rgba(151,187,205,1)",
							pointStrokeColor : "#fff",
							data : [day7c,day6c,day5c,day4c,day3c,day2c,day1c]
						}
					]
					
				}

			var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);
			
			</script>
		</div>
		
		<div class="panel">
						
			<div class="panel-default">
				<div class="panel-heading">
					<div class="panel-title">
					Statistics <span class="sub-panel-title">- Totals By User</span>
					</div>
				</div>
			</div>
			<div class="reportL">
				<div class="reportNumberTitle">
					All Time Totals
				</div>
				<div class="reportNumbers"><span>Total incomplete tasks: </span><?php echo $incompletetasks ?></div>
				<div class="reportNumbers"><span>Total completed tasks: </span><?php echo $completedtasks ?></div>
			</div>
			<div class="reportR">
				<div class="reportNumberTitle">
					Total By User
				</div>
				<div class="reportNumbers"><span>Total by <?php echo $firstuser ?>: </span><?php echo $userone ?></div>
				<div class="reportNumbers"><span>Total by <?php echo $seconduser ?>: </span><?php echo $usertwo ?></div>
				<div class="reportNumbers"><span>Total by <?php echo $thirduser ?>: </span><?php echo $userthree ?></div>
				<div class="reportNumbers"><span>Total by <?php echo $fourthuser ?>: </span><?php echo $userfour ?></div>
			</div>
		</div>	

	</div>	
		
	<div class="right-wrapper">
		
		<div class="right-margin">

				<div class="panel">
				
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Latest Tasks <span class="sub-panel-title">- All Types</span>
							</div>
						</div>
					</div>
				
					<?php

					



					$result = mysqli_query($con, 'SELECT * FROM custom ORDER BY date DESC LIMIT 20');

					if (!$result) {
						printf("Error: %s\n", mysqli_error($con));
						exit();
					}


					echo "<table class='pResults' >
					<tr class='tRow'>
					<th class='tTitle'>Username</th>
					<th class='tTitle'>Date</th>
					<th class='tTitle'>Price</th>
					<th class='tTitle'>URL</th>
					<th class='tTitle'>Time</th>
					<th class='tTitle'>Status</th>
					</tr>";


					while ($row = mysqli_fetch_assoc($result)) {

						$username = $row['username'];
						$date = $row['date'];
						$price = $row['price'];
						$url = $row['url'];
						$time = $row['time'];
						$finished = $row['finished'];
						
						echo "<tr class='tRow'>";
						echo "<td class='tCell'>" . $username . "</td>";
						echo "<td style='min-width: 100px;' class='tCell'>" . $date . "</td>";
						echo "<td class='tCell'>" . $price . "</td>";
						echo "<td class='tCell'>" . $url . "</td>";
						echo "<td class='tCell'>" . $time . "</td>";
						echo "<td class='tCell'>" . $finished . "</td>";
						echo "</tr>";
					}
					echo "</table>";


					?>
				</div>
				
			
				<div class="panel">
				
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Completed <span class="sub-panel-title">- Last 10 Completed Tasks</span>
							</div>
						</div>
					</div>
				
					<?php




					$result = mysqli_query($con, 'SELECT * FROM custom WHERE finished = "Completed" ORDER BY date DESC LIMIT 10');

					if (!$result) {
						printf("Error: %s\n", mysqli_error($con));
						exit();
					}


					echo "<table class='pResults' >
					<tr class='tRow'>
					<th class='tTitle'>Username</th>
					<th class='tTitle'>Date</th>
					<th class='tTitle'>Price</th>
					<th class='tTitle'>URL</th>
					<th class='tTitle'>Time</th>
					<th class='tTitle'>Status</th>
					</tr>";


					while ($row = mysqli_fetch_assoc($result)) {

						$username = $row['username'];
						$date = $row['date'];
						$price = $row['price'];
						$url = $row['url'];
						$time = $row['time'];
						$finished = $row['finished'];
						
						echo "<tr class='tRow'>";
						echo "<td class='tCell'>" . $username . "</td>";
						echo "<td style='min-width: 100px;' class='tCell'>" . $date . "</td>";
						echo "<td class='tCell'>" . $price . "</td>";
						echo "<td class='tCell'>" . $url . "</td>";
						echo "<td class='tCell'>" . $time . "</td>";
						echo "<td class='tCell'>" . $finished . "</td>";
						echo "</tr>";
					}
					
					echo "</table>";

					?>
				</div>
				
				<div class="panel">
				
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Incomplete <span class="sub-panel-title">- Last 10 Incomplete Tasks</span>
							</div>
						</div>
					</div>
				
					<?php





					$result = mysqli_query($con, 'SELECT * FROM custom WHERE finished = "Incomplete" ORDER BY date DESC LIMIT 10');

					if (!$result) {
						printf("Error: %s\n", mysqli_error($con));
						exit();
					}


					echo "<table class='pResults' >
					<tr class='tRow'>
					<th class='tTitle'>Username</th>
					<th class='tTitle'>Date</th>
					<th class='tTitle'>Price</th>
					<th class='tTitle'>URL</th>
					<th class='tTitle'>Time</th>
					<th class='tTitle'>Status</th>
					</tr>";


					while ($row = mysqli_fetch_assoc($result)) {

						$username = $row['username'];
						$date = $row['date'];
						$price = $row['price'];
						$url = $row['url'];
						$time = $row['time'];
						$finished = $row['finished'];
						
						echo "<tr class='tRow'>";
						echo "<td class='tCell'>" . $username . "</td>";
						echo "<td style='min-width: 100px;' class='tCell'>" . $date . "</td>";
						echo "<td class='tCell'>" . $price . "</td>";
						echo "<td class='tCell'>" . $url . "</td>";
						echo "<td class='tCell'>" . $time . "</td>";
						echo "<td class='tCell'>" . $finished . "</td>";
						echo "</tr>";
					}
					
					echo "</table>";


					?>
				</div>
					
		</div>
		
	</div>
	
	<div class="full-width">
	
		<div id="subTasks" class="working">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="panel-title">
				All Users Detailed view <span class="sub-panel-title">- Completed Tasks with Sub Tasks</span>
				</div>
			</div>
		</div>
		<?php




		$result = mysqli_query($con, 'SELECT * FROM custom WHERE finished = "Completed" ORDER BY date DESC LIMIT 50');

		if (!$result) {
			printf("Error: %s\n", mysqli_error($con));
			exit();
		}


		
		
		


		while ($row = mysqli_fetch_assoc($result)) {

			$username = $row['username'];
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
			
		
			echo "<div class='row'>
			<div class='lTitle'>Username</div>
			<div class='lTitle'>Date</div>
			<div class='lTitle'>Price</div>
			<div class='lTitle'>URL</div>
			<div class='lTitle'>Total Time</div>
			</div>";
			
			
			echo "<form class='progressForm' autocomplete='off' method='post' action='task/customupdateh.php'>";
			
			echo "<div class='titleInfo'>";
			echo "<li class='lCell'>" . $username . "</li>";
			echo "<li class='lCell'>" . $date . "</li>";
			echo "<li class='lCell'>" . $price . "</li>";
			echo "<li class='lCell'>" . $url . "</li>";
			echo "<li class='lCell'>" . $time . "</li>";
			echo "</div>";
			
			echo "<div class='sub-task-title'><div class='sub-task-text'>Sub Tasks</div></div>";
			echo "<div class='sub-task-body'>";
			
			echo "<div class='zebraDark'>";
			echo $time1 == 0 ? '' : "<li class='subcellt'>" . $time1 . "</li>";
			echo $time1 == 0 ? '' : "<li class='subcell'>" . stripslashes($description1) . "</li><br>";
			echo "</div>";
			
			echo $time2 == 0 ? '' : "<li class='subcellt'>" . $time2 . "</li>";
			echo $time2 == 0 ? '' : "<li class='subcell'>" . stripslashes($description2) . "</li><br>";
			
			echo "<div class='zebraDark'>";
			echo $time3 == 0 ? '' : "<li class='subcellt'>" . $time3 . "</li>";
			echo $time3 == 0 ? '' : "<li class='subcell'>" . stripslashes($description3) . "</li><br>";
			echo "</div>";
			
			echo $time4 == 0 ? '' : "<li class='subcellt'>" . $time4 . "</li>";
			echo $time4 == 0 ? '' : "<li class='subcell'>" . stripslashes($description4) . "</li><br>";
			
			echo "<div class='zebraDark'>";
			echo $time5 == 0 ? '' : "<li class='subcellt'>" . $time5 . "</li>";
			echo $time5 == 0 ? '' : "<li class='subcell'>" . stripslashes($description5) . "</li><br>";
			echo "</div>";
			
			echo $time6 == 0 ? '' : "<li class='subcellt'>" . $time6 . "</li>";
			echo $time6 == 0 ? '' : "<li class='subcell'>" . stripslashes($description6) . "</li><br>";
			
			echo "<div class='zebraDark'>";
			echo $time7 == 0 ? '' : "<li class='subcellt'>" . $time7 . "</li>";
			echo $time7 == 0 ? '' : "<li class='subcell'>" . stripslashes($description7) . "</li><br>";
			echo "</div>";
			
			echo $time8 == 0 ? '' : "<li class='subcellt'>" . $time8 . "</li>";
			echo $time8 == 0 ? '' : "<li class='subcell'>" . stripslashes($description8) . "</li><br>";
			
			echo "<div class='zebraDark'>";
			echo $time9 == 0 ? '' : "<li class='subcellt'>" . $time9 . "</li>";
			echo $time9 == 0 ? '' : "<li class='subcell'>" . stripslashes($description9) . "</li><br>";
			echo "</div>";
			
			echo $time10 == 0 ? '' : "<li class='subcellt'>" . $time10 . "</li>";
			echo $time10 == 0 ? '' : "<li class='subcell'>" . stripslashes($description10) . "</li><br>";
			
			echo "<div class='zebraDark'>";
			echo $time11 == 0 ? '' : "<li class='subcellt'>" . $time11 . "</li>";
			echo $time11 == 0 ? '' : "<li class='subcell'>" . stripslashes($description11) . "</li><br>";
			echo "</div>";
			
			echo $time12 == 0 ? '' : "<li class='subcellt'>" . $time12 . "</li>";
			echo $time12 == 0 ? '' : "<li class='subcell'>" . stripslashes($description12) . "</li><br>";
			
			echo "<div class='zebraDark'>";
			echo $time13 == 0 ? '' : "<li class='subcellt'>" . $time13 . "</li>";
			echo $time13 == 0 ? '' : "<li class='subcell'>" . stripslashes($description13) . "</li><br>";
			echo "</div>";
			
			echo $time14 == 0 ? '' : "<li class='subcellt'>" . $time14 . "</li>";
			echo $time14 == 0 ? '' : "<li class='subcell'>" . stripslashes($description14) . "</li><br>";
			
			echo "<div class='zebraDark'>";
			echo $time15 == 0 ? '' : "<li class='subcellt'>" . $time15 . "</li>";
			echo $time15 == 0 ? '' : "<li class='subcell'>" . stripslashes($description15) . "</li><br>";
			echo "</div>";
			
			echo "</div>";
			
			
			

			echo "</form>";
		}



		?>
	</div>
		
	</div>

	
	
	
	
</div>

