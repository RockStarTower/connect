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

$totaltime = mysqli_query($con, "SELECT count(1) FROM ticket WHERE status='completed' AND date = '" . $oneday . "' ");
$totaltime1 = mysqli_fetch_array($totaltime);
$day1 = $totaltime1[0];


$totaltimetwo = mysqli_query($con, "SELECT count(1) FROM ticket WHERE status='completed' AND date = '" . $twoday . "' ");
$totaltimetwo1 = mysqli_fetch_array($totaltimetwo);
$day2 = $totaltimetwo1[0];

$totaltimethree = mysqli_query($con, "SELECT count(1) FROM ticket WHERE status='completed' AND date = '" . $threeday . "' ");
$totaltimethree1 = mysqli_fetch_array($totaltimethree);
$day3 = $totaltimethree1[0];

$totaltimefour = mysqli_query($con, "SELECT count(1) FROM ticket WHERE status='completed' AND date = '" . $fourday . "' ");
$totaltimefour1 = mysqli_fetch_array($totaltimefour);
$day4 = $totaltimefour1[0];

$totaltimefive = mysqli_query($con, "SELECT count(1) FROM ticket WHERE status='completed' AND date = '" . $fiveday . "' ");
$totaltimefive1 = mysqli_fetch_array($totaltimefive);
$day5 = $totaltimefive1[0];

$totaltimesix = mysqli_query($con, "SELECT count(1) FROM ticket WHERE status='completed' AND date = '" . $sixday . "' ");
$totaltimesix1 = mysqli_fetch_array($totaltimesix);
$day6 = $totaltimesix1[0];

$totaltimeseven = mysqli_query($con, "SELECT count(1) FROM ticket WHERE status='completed' AND date = '" . $sevenday . "' ");
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

	<form class="panel taskform" autocomplete="off"  method="get" action="downloader.php" >
				
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
			</form>

			<div class="panel taskform"  >
					
			<div class="panel-default">
				<div class="panel-heading">
					<div class="panel-title">
					Completed Files <span class="sub-panel-title">- Domains Ready For Download </span>
					</div>
				</div>
			</div>

		<?php
		$result = mysqli_query($con, 'SELECT * FROM ticket WHERE status = "development" ORDER BY date ASC LIMIT 20');

				if (!$result) {
					printf("Error: %s\n", mysqli_error($con));
					exit();
				}

				$i = 0;
				
				while ($row = mysqli_fetch_assoc($result)) {
				
					if (!$i++) echo "<table class='table table-striped' >
					<tr class=''>
					<th class='tTitle titleFont'>Date</th>
					<th class='tTitle titleFont'>Content Creator</th>
					<th class='tTitle titleFont'>URL</th>
					<th class='tTitle titleFont'>Wireframe</th>
					<th class='tTitle titleFont'>Language</th>
					<th class='tTitle titleFont'>Design Link</th>
					</tr>";

					$date = $row['date'];
					$username = $row['username'];
					$url = $row['url'];
					$wireframe = $row['wireframe'];
					$language = $row['language'];
					
					echo "<tr class=''>";
					echo "<td class='tCell'>" . $date . "</td>";
					echo "<td class='tCell'>" . $username . "</td>";
					echo "<td class='tCell'>" . $url . "</td>";
					echo "<td class='tCell'>" . $wireframe . "</td>";
					echo "<td class='tCell'>" . $language . "</td>";
					echo "<td class='tCell' ><form method='get' action='downloader.php' ><input type='hidden' id='domain' name='domain' value='$url'/><input style='margin: 0px; height: 24px; padding: 2px;' class='submitButton btn-primary' type='submit' value='Download' /></form></td>";
					echo "</tr>";
				}
				echo "</table>";
		?>

		
	</div>

	</div>



	<div class="right-wrapper">
		<div class="right-margin">
			<div class="panel panel-info">
					 <div class="panel-heading">
						 <h3 class="panel-title"><i class="fa fa-lightbulb-o"></i> Autobuilder Instructions For Developers</h3>
				 	 </div>
				 	<div class="panel-body docPanel">
						<ul class="media-list">
							<b>AutoBuilder has been designed to make your work fast and simple. If you have any feedback, 
							suggestions, or if you need to report errors please fill out the <a href="suggestion.php">Contact</a> page.</b> <br>
						  <li class="media">
						    <div class="media-body">
						    	<h4 class="media-heading">Step 1</h4>
								First you need to download the correct file. To do this paste in the URL of the website. It should automattically remove the "https://www.", if it does not, you will need to manually remove it. Once you have the URl entered just hit download. 
						    </div>
						  </li>
						</ul>
						<ul class="media-list">
						  <li class="media">
						    <div class="media-body">
						    	<h4 class="media-heading">Step 2</h4>
						    	The json file should be named "content.json". It may default to "content(1).json" if you already have one there. Be sure to rename it if it does.Once you have the content.json file, use the autobuilder plugin to upload the file. This will be the last step that automatically builds the site.
						    </div>
						  </li>
						</ul>
					</div>
				</div>
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
	</div>

</div>
