<form class="panel taskForm" method="post" action="task/onsitesh.php" style="padding-bottom: 5px;">
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
	<input class="sInputs" type="date" name="date" value="<?=$oneday?>" required /> </br>
	<input class="sInputs" type="number" name="clientid" placeholder="Client ID" required /> </br>
	<input class="sInputs" type="text" name="domain" placeholder="example.com" required /> </br>
    <select class="sInputs" style="padding-bottom: 0px !important; padding-top: 0px !important;" name="task" required/>
    <optgroup label="Group 1">
      <option value=" " style="display: none;" default>Please Select a Task</option>
      <option value="Basic Edits – T,D,H1, and Alt ">Basic Edits – T,D,H1, and Alt </option>
      <option value="Google Analytics">Google Analytics</option>
      <option value="301 redirects">301 redirects</option>
      <option value="Canonical tags">Canonical tags</option>
      <option value="Content Implementation">Content Implementation</option>
      <option value="Crazy egg">Crazy egg</option>
      <option value="Nofollow Tag(s)">Nofollow Tag(s)</option>
      <option value="Page Creation">Page Creation</option>
      <option value="Robots.txt file">Robots.txt file</option>
      <option value="Schema Creation & Implementation">Schema Creation & Implementation</option>
      <option value="Sitemap.xml file">Sitemap.xml file</option>
      <option value="Misc. Edits">Misc. Edits</option>
      <option value="Ranking Audit">Ranking Audit</option>
      <option value="CMS Testing">CMS Testing</option>
      </optgroup>
      <optgroup label="Group 2">
      <option value="CMS Testing">GNA Skip</option>
      </optgroup>
     </select><br>
    <input class="sInputs quicktime" type="text" name="time" placeholder="Time   .5 = half hour"/>
    <div class="show-this1">0.1</div>
    <div class="show-this2">0.25</div>
    <div class="show-this3">0.5</div>
    <div class="show-this4">0.75</div>
    <div class="show-this5">1</div>
 
	<input class="sInputs" type="hidden" name="id" value="<?=$user_id?>" /> 
	<input class="sInputs" type="hidden" name="username" value="<?=$username?>" /> 
	<input class="sInputs" type="hidden" name="QAstatus" value="Pending QA" /> 
	</div>
	<div class="rightForm">
	<textarea style="width: 100%; margin-top: 2px; height: 153px !important; padding: 13px;" class="input-standard contentForm ctextarea currentcontent" rows="10" cols="60" name="comment" placeholder="Please leave a comment. (Optional)" /></textarea> </br>
	<input class="radiostyling" type="radio" name="status" value="Complete" required />Complete 
	<input class="radiostyling" type="radio" name="status" value="Incomplete" required />Incomplete 
	<input class="radiostyling" type="radio" name="status" value="kickback" required />Kickback
	</div>
	<div class="submitCon">
	<input class="submitButton" type="Submit" name="Submit" />
      
	</div>
</div>
</form>