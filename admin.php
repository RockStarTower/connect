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

$number = mysqli_query($con, 'SELECT * FROM users');
$num = mysqli_num_rows($number);
?>

<div class="full-width-wrapper">
	<div class="panel panel-default">
	<div class="panel-body" style="padding: 0px;">
		<ul class="nav nav-pills nav-stacked">
		  <li id="userbtn1" style="width: 120px; margin: 5; float: left;" class="active">
		    <a id="currentUsers" href="#">
		      <span style="margin: 2px;" class="badge pull-right"><?php echo $num ?></span>
		      Users
		    </a>
		  </li>
		  <li id="userbtn2" style="width: 120px; margin: 5; float: left;" >
		    <a href="#">
		      New User
		    </a>
		  </li>
		</ul>
		</div>
</div>
	
</div>

<div id="accAlert" class="alert alert-info" role="alert"></div>




<div class="panel adminPanel" style="min-width: 780px;">
		<div class="panel-default">
			<div class="panel-heading">
				<div class="panel-title">
				<span class="glyphicon glyphicon-folder-open">&nbsp;</span> User Accounts <span class="sub-panel-title">- (click text to edit)</span>
				</div>
			</div>
		</div>

	<?php
	$result = mysqli_query($con, 'SELECT * FROM users ');

			if (!$result) {
				printf("Error: %s\n", mysqli_error($con));
				exit();
			}

			$i = 0;
			
			while ($row = mysqli_fetch_assoc($result)) {

				if (!$i++) echo "<table class='table table-striped' >
				<tr class=''>
				<th class='tTitle'>Firstname</th>
				<th class='tTitle'>Lastname</th>
				<th class='tTitle'>Email</th>
				<th class='tTitle'>Username</th>
				<th class='tTitle'>ID</th>
				<th class='tTitle'>Role</th>
				<th class='tTitle'>Manager</th>
				<th class='tTitle'>Status</th>
				</tr>";

				$firstname = $row['firstname'];
				$lastname = $row['lastname'];
				$email = $row['email'];
				$username = $row['username'];
				$id = $row['id'];
				$role = $row['role'];
				$manager = $row['manager'];
				$status = $row['status'];

				if ($manager == "true"){
					$results = "checked";
				} else{
					$results = "";
				}


				echo "<tr id=" . $id . " class='userTable'>
					<td class='tCell' id='firstname" . $id . "'  contenteditable>" . $firstname . "</td>
					<td class='tCell' id='lastname" . $id . "' contenteditable>" . $lastname . "</td>
					<td class='tCell' id='email" . $id . "' contenteditable>" . $email . "</td>
					<td class='tCell' id='username" . $id . "' >" . $username . "</td>
					<td class='tCell' id='id" . $id . "' >" . $id . "</td>
					<td class='tCell'>
						<select id='role" . $id . "' name='role' style='height: 33px;' class='btn btn-primary input-standard contentForm' id='language'>
							<option selected style='display: none;'>". $role . "</option>
							<option id='content" . $id . "'>content</option>
							<option id='blog" . $id . "'>blogs</option>
							<option id='design" . $id . "'>design</option>
							<option id='onsite" . $id . "'>onsite</option>
							<option id='custom" . $id . "'>custom</option>
							<option id='admin" . $id . "'>admin</option>
						</select>
						</div></td>
					<td class='tCell'><input class='mCheck' id='manager" . $id . "' type='checkbox' $results /></td>
					<td class='tCell'>
						<select id='status" . $id . "' name='status' style='height: 33px;' class='btn btn-primary input-standard contentForm' id='language'>
							<option id='selectedOne". $id . "' selected style='display: none;'>". $status . "</option>
							<option id='content" . $id . "'>active</option>
							<option id='blog" . $id . "'>pending</option>
							<option id='design" . $id . "'>inactive</option>
						</select>
						</div></td>
				</tr>";

			}
			echo "</table>";
	?>

	</div>

<?php include 'form.php'; ?>