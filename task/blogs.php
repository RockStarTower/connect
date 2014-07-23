
<?php $oneday = date('20y-m-d',strtotime("-0 days")); ?>


<form class="panel taskForm" method="post" action="task/blogsh.php" >
<div class="cusFormCon">
<div class="panel-default">
	<div class="panel-heading">
		<div class="panel-title">
		Blogs <span class="sub-panel-title">- New & QA Kickbacks</span>
		</div>
	</div>
</div>
	<div class="leftForm">
	<input class="sInputs" type="date" name="date" placeholder="yyyy-mm-dd" value="<?=$oneday?>" required /> </br>
	<input class="sInputs" type="number" name="amount" placeholder="Number of blogs completed" required ></br>
	<input class="sInputs" type="text" name="time" placeholder="Time   .5 = half hour"/>
	<input class="sInputs" type="hidden" name="id" value="<?=$user_id?>" /> 
	<input class="sInputs" type="hidden" name="username" value="<?=$username?>" /> 
	</div>
	<div class="rightForm">
	<textarea class="textAreaB" rows="10" cols="60" name="comment" placeholder="List each blog URL here." /></textarea> </br>
	</div>
	<div class="submitCon">
	<input class="submitButton" type="Submit" name="Submit" />
	</div>
</div>
</form>