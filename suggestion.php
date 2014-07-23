<?php
include 'header.php';
$oneday = date('20y-m-d',strtotime("-0 days"));
?>

<?php

	if(isset($_POST['closed'])) {

	$closed = $_POST['closed'];

		mysqli_query($con, "UPDATE feedback SET Status = 'closed' WHERE ID = '".$closed."'");

		header('Location: '.$_SERVER['REQUEST_URI']);
	}	
?>

<?php if ($user_role == 'admin') { ?>

		



	<div class="panel ticketPanel">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="panel-title">
				Open Tickets <span class="sub-panel-title">- Errors, Issues, and Feedback</span>
				</div>
			</div>
		</div>

	<?php
	$result = mysqli_query($con, 'SELECT * FROM feedback WHERE status = "open" ORDER BY date DESC LIMIT 20');

			if (!$result) {
				printf("Error: %s\n", mysqli_error($con));
				exit();
			}

			$i = 0;
			
			while ($row = mysqli_fetch_assoc($result)) {
			
				if (!$i++) echo "<table class='pResults' >
				<tr class=''>
				<th class='tTitle'>Type</th>
				<th class='tTitle'>Comment</th>
				<th class='tTitle'>Username</th>
				<th class='tTitle'>ID</th>
				<th class='tTitle'>Status</th>
				<th class='tTitle'>Date</th>
				</tr>";

				$Type = $row['Type'];
				$ID = $row['ID'];
				$Comment = $row['Comment'];
				$Username = $row['Username'];
				$Status = $row['Status'];
				$Date = $row['Date'];
				
				echo "<tr class=''>";
				echo "<td class='tCell'>" . $Type . "</td>";
				echo "<td style='min-width: 100px;' class='tCell'>" . $Comment . "</td>";
				echo "<td class='tCell'>" . $Username . "</td>";
				echo "<td class='tCell'>" . $ID . "</td>";
				echo "<td class='tCell' >" . $Status . "</td>";
				echo "<td class='tCell'>" . $Date . "</td>";
				echo "</tr>";
			}
			echo "</table>";
	?>

	</div>

	<div class="panel ticketPanel">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="panel-title">
				Closed Tickets <span class="sub-panel-title">- Errors, Issues, and Feedback</span>
				</div>
			</div>
		</div>

	<?php
	$result = mysqli_query($con, 'SELECT * FROM feedback WHERE status = "closed" ORDER BY date DESC LIMIT 20');

			if (!$result) {
				printf("Error: %s\n", mysqli_error($con));
				exit();
			}

			$i = 0;
			
			while ($row = mysqli_fetch_assoc($result)) {
			
				if (!$i++) echo "<table class='table table-striped' >
				<tr class=''>
				<th class='tTitle'>Type</th>
				<th class='tTitle'>Comment</th>
				<th class='tTitle'>Username</th>
				<th class='tTitle'>ID</th>
				<th class='tTitle'>Status</th>
				<th class='tTitle'>Date</th>
				</tr>";

				$Type = $row['Type'];
				$ID = $row['ID'];
				$Comment = $row['Comment'];
				$Username = $row['Username'];
				$Status = $row['Status'];
				$Date = $row['Date'];
				
				echo "<tr class=''>";
				echo "<td class='tCell'>" . $Type . "</td>";
				echo "<td style='min-width: 100px;' class='tCell'>" . $Comment . "</td>";
				echo "<td class='tCell'>" . $Username . "</td>";
				echo "<td class='tCell'>" . $ID . "</td>";
				echo "<td class='tCell' >" . $Status . "</td>";
				echo "<td class='tCell'>" . $Date . "</td>";
				echo "</tr>";
			}
			echo "</table>";
	?>

	</div>



	<form action="suggestion.php" id="suggestionForm" style=" max-width: 450px; margin: 0 auto !important; position: absolute !important; left: 0px; right: 0px;" class="panel taskform ticketform ticketPanel" autocomplete="off"  method="post" action="suggestionh.php" >
		<div class="panel-default">
			<div class="panel-heading">
				<div class="panel-title">
				Mark as Closed <span class="sub-panel-title">- Pick ID to mark as Closed</span>
				</div>
			</div>
		</div>
			<input type="number" class="input-standard feedbackNumber" name="closed" />
		<div class="submitCon noBackground" style="width: 200px;">
			<input class="submitButton btn-success" style="margin-right: 5px;" type="Submit" name="Submit" />
		</div> 
	</form>




	


<?php } else{ ?>
	
	<div id="centerDiv">
		<form id="suggestionForm" class="panel taskform" autocomplete="off"  method="post" action="suggestionh.php" >
			<div class="panel-default">
				<div class="panel-heading">
					<div class="panel-title">
					Feedback <span class="sub-panel-title">- Suggestions & Errors</span>
					</div>
				</div>
			</div>
				<br>
				<input style="width: 40%; margin: 40px; margin-left: 4%" class="sInputs" type="date" name="date" placeholder="yyyy-mm-dd" value="<?=$oneday?>" required /> 
				<br>
				<select style="width: 40%; margin: 40px; margin-left: 4%" class="sInputs" name="suggestionType" required >
					<option value=" " default>Please Select Type</option>
					<option value="suggestion">General Suggestion</option>
					<option value="boost_note">Boost Note</option>
					<option value="autobuilder">Auto Builder</option>
				</select>
				<textarea style="margin-left: 40px; margin-bottom: 20px; width: 90%; margin-left: 4%;" rows="8" cols="50" id="" name="overview" class="input-standard contentForm ctextarea"  placeholder="Describe issue or suggestion here..." required ></textarea>	
				<input type="hidden" name="username" value="<?=$username?>" />
				<input type="hidden" name="status" value="open" />
			
			<div class="submitCon noBackground">
				<input class="submitButton btn-success" style="margin-right: 40px;" type="Submit" name="Submit" />
			</div> 
		</form>
	</div>


<?php } ?>


	