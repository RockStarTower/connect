<form class="panel taskForm" method="post" action="task/onsitesh.php" >
<div class="cusFormCon">
<div class="panel-default">
	<div class="panel-heading">
		<div class="panel-title">
		Onsites <span class="sub-panel-title">- Complete, Incomplete & Kickbacks</span>
		</div>
	</div>
</div>
<?php 
$oneday = date('20y-m-d',strtotime("-0 days"));
?>

	<div class="leftForm">
	<input class="sInputs" type="number" name="clientid" placeholder="Client ID" required /> </br>
	<input class="sInputs" type="text" name="domain" placeholder="example.com" required /> </br>
    <select class="sInputs" name="task" required/>
      <option value=" " default>Please Select a Task</option></option>
      <option value="onsiteimplementation">Onsite Implementation</option>
      <option value="onsiteimplementation">Onsite Implementation</option>
      <option value="advonsites">Advanced Onsite Implementation</option>
      <option value="onsiteimplementation">Onsite Implementation</option>
      <option value="onsiteimplementation">Onsite Implementation</option>
      <option value="onsiteimplementation">Onsite Implementation</option>
      <option value="onsitescript">Onsite Script</option>
     </select><br>
	<input class="sInputs" type="date" name="date" value="<?=$oneday?>" required /> </br>
    <input class="sInputs quicktime" type="text" name="time" placeholder="Time   .5 = half hour"/>
    <div class="show-this1">0.1</div>
    <div class="show-this2">0.25</div>
    <div class="show-this3">0.5</div>
    <div class="show-this4">0.75</div>
    <div class="show-this5">1</div>
 
	<input class="sInputs" type="hidden" name="id" value="<?=$user_id?>" /> 
	<input class="sInputs" type="hidden" name="username" value="<?=$username?>" /> 
	</div>
	<div class="rightForm">
	<textarea style="width: 100%; margin-top: 2px; height: 153px !important;" class="input-standard contentForm ctextarea currentcontent" rows="10" cols="60" name="comment" placeholder="Please leave a comment. (Optional)" /></textarea> </br>
	<input class="radiostyling" type="radio" name="status" value="Complete" required />Complete 
	<input class="radiostyling" type="radio" name="status" value="Incomplete" required />Incomplete 
	<input class="radiostyling" type="radio" name="status" value="kickback" required />Kickback
	</div>
	<div class="submitCon">
	<input class="submitButton" type="Submit" name="Submit" />
      
	</div>
</div>
</form>