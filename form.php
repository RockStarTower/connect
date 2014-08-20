<div  id="newUser" style="display: none; margin-top: 0px;" class="full-width-wrapper">
	<div class="panel panel-default">
	  	<div class="panel-heading">
			<div class="panel-title">
			<span class="glyphicon glyphicon-folder-open">&nbsp;</span> New User <span class="sub-panel-title">- Create New User Account</span>
			</div>
		</div>
	  <div class="panel-body">
		    <form style="max-width: 500px;"  action="insert.php" method="POST">
			<input class="form-control" type="text" placeholder="First Name" name="firstname" required><br>
			<input class="form-control" type="text" name="lastname" placeholder="Last Name" required><br>
			<input class="form-control" type="email" name="email" placeholder="Email" required><br>
			<input class="form-control" type="username" name="username" placeholder="Username" required><br>
			<input class="form-control" type="password" name="password" placeholder="Password" required><br>
			<select style="margin: 0px;" name='role' style='height: 33px;' class='form-control input-standard contentForm' id='language'>
							<option selected style='display: none;'>User Role</option>
							<option >content</option>
							<option >blogs</option>
							<option >design</option>
							<option >onsite</option>
							<option >custom</option>
							<option >admin</option>
							<option >QA</option>
						</select><br>
			<input class="btn btn-primary" type="submit">
			</form>
	  </div>
	</div>
</div>

