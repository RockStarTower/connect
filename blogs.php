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

$day1 = 0;
$day2 = 0;
$day3 = 0;
$day4 = 0;
$day5 = 0;
$day6 = 0;
$day7 = 0;

$totaltime = mysqli_query($con, "SELECT SUM(amount) FROM blogs WHERE date = '" . $oneday . "' ");
$totaltime1 = mysqli_fetch_array($totaltime);
$day1 = $totaltime1[0];


$totaltimetwo = mysqli_query($con, "SELECT SUM(amount) FROM blogs WHERE date = '" . $twoday . "' ");
$totaltimetwo1 = mysqli_fetch_array($totaltimetwo);
$day2 = $totaltimetwo1[0];

$totaltimethree = mysqli_query($con, "SELECT SUM(amount) FROM blogs WHERE date = '" . $threeday . "' ");
$totaltimethree1 = mysqli_fetch_array($totaltimethree);
$day3 = $totaltimethree1[0];

$totaltimefour = mysqli_query($con, "SELECT SUM(amount) FROM blogs WHERE date = '" . $fourday . "' ");
$totaltimefour1 = mysqli_fetch_array($totaltimefour);
$day4 = $totaltimefour1[0];

$totaltimefive = mysqli_query($con, "SELECT SUM(amount) FROM blogs WHERE date = '" . $fiveday . "' ");
$totaltimefive1 = mysqli_fetch_array($totaltimefive);
$day5 = $totaltimefive1[0];

$totaltimesix = mysqli_query($con, "SELECT SUM(amount) FROM blogs WHERE date = '" . $sixday . "' ");
$totaltimesix1 = mysqli_fetch_array($totaltimesix);
$day6 = $totaltimesix1[0];

$totaltimeseven = mysqli_query($con, "SELECT SUM(amount) FROM blogs WHERE date = '" . $sevenday . "' ");
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


<div class="body-wrapper">

	<div class="lSide">
		
	</div>	
	
	<div class="left-wrapper">
		
		<div class="panel">
			<div class="panel-default">
					<div class="panel-heading">
						<div class="panel-title">
						Daily Completed Blogs <span class="sub-panel-title">- All Users</span><div id="weekTotal" class="inline-input"></div><div class="weekTotal">Weekly Total:&nbsp; </div>
						</div>
					</div>
				</div>
				
			<script src="chart/Chartblogs.js"></script>
			<style>
				canvas{
				}
			</style>
			
				<div class="graphkey">
					<ul style="margin: 5px;">
					<li id="tanBulletin"><span style="color: black; font-size: 14px;">Blogs Completed</span></li>
					</ul>
				</div>
			
				<canvas id="canvas"  height="530px" width="1060px" ></canvas>
			

				
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
				
				console.log(weekTotal);
				
				$("#weekTotal").html(weekTotal);
				
				var lineChartData = {
					labels : [ sevenday, sixday, fiveday, fourday, threeday, twoday, oneday],
					datasets : [
						{
							fillColor : "rgba(151,187,205,0.5)",
							strokeColor : "rgba(151,187,205,1)",
							pointColor : "rgba(151,187,205,1)",
							pointStrokeColor : "#fff",
							data : [day7,day6,day5,day4,day3,day2,day1]
						},
						
					]
					
				}

			var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);
			
			});
			
			</script>
		</div>
		
		
	</div>
		
	<div class="right-wrapper">
	
		<div class="right-margin">
		
			<div class="panel">
					
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Latest Submissions <span class="sub-panel-title">- Last 30 Submissions</span>
							</div>
						</div>
					</div>
				
					<?php




					$result = mysqli_query($con, 'SELECT * FROM blogs ORDER BY date DESC LIMIT 30');

					if (!$result) {
						printf("Error: %s\n", mysqli_error($con));
						exit();
					}


					echo "<table class='pResults' >
					<tr class='tRow'>
					<th class='tTitle'>Username</th>
					<th class='tTitle'>Date</th>
					<th class='tTitle'>amount</th>
					<th class='tTitle'>Time</th>
					<th class='tTitle'>Blogs</th>
					</tr>";


					while ($row = mysqli_fetch_assoc($result)) {

						$username = $row['username'];
						$date = $row['date'];
						$amount = $row['amount'];
						$time = $row['time'];
						$comment = $row['comment'];
						
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
			</div>
	</div>
	
</div>
