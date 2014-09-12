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
	<input class="sInputs"  type="number" name="clientid" placeholder="Client ID"  required/> </br>
	<input class="sInputs" id="onsiteDomain" type="text" name="domain" placeholder="example.com"  required/> </br>
    <select class="sInputs" id="taskSelect" style="padding-bottom: 0px !important; padding-top: 0px !important;" name="task" required/>
    <optgroup label="Standard Onsite Tasks">
      <option value="Basic Onsites">Basic Onsites</option>
      <option value="Google Analytics">Google Analytics</option>
      <option value="301 redirects">301 redirects</option>
      <option value="Canonical tags">Canonical tags</option>
      <option value="Content Implementation">Content Implementation</option>
      <option value="Crazy egg">Crazy egg</option>
      <option value="Nofollow Tag(s)">Nofollow Tag(s)</option>
      <option value="Page Creation">Page Creation</option>
      <option value="Robots.txt file">Robots.txt file</option>
      <option value="Schema Tags">Schema Tags</option>
      <option value="Sitemap.xml file">Sitemap.xml file</option>
      <option value="Misc. Edits">Misc. Edits</option>
      <option value="Ranking Audit">Ranking Audit</option>
      <option value="CMS Testing">CMS Testing</option>
      <option value="Post Blog">Post Blog</option>
      <option value="Setup Blog">Setup Blog</option>
      </optgroup>
      <optgroup label="Other Tasks">
      <option value="GNA Skip">GNA Skip</option>
      <option value="Other">Other</option>
      </optgroup>
     </select><br>
    <input class="sInputs quicktime" type="text" name="time" required placeholder="Time   .5 = half hour"/>
    <div class="show-this1">0.1</div>
    <div class="show-this2">0.25</div>
    <div class="show-this3">0.5</div>
    <div class="show-this4">0.75</div>
    <div class="show-this5">1</div>
 
	<input class="sInputs" type="hidden" name="id" value="<?=$user_id?>" required/> 
	<input class="sInputs" type="hidden" name="username" value="<?=$username?>" required/> 
	<input class="sInputs" type="hidden" name="QAstatus" value="Pending QA" required/> 
	</div>
	<div class="rightForm">
	<textarea style="width: 100%; margin-top: 2px; height: 114px !important;; padding: 13px;" class="input-standard contentForm ctextarea currentcontent" rows="10" cols="60" name="comment" placeholder="Please leave a comment. (Optional)" /></textarea> <br>

	<div id="docCon">
		<input type="text" class="sInputs doc" placeholder="Doc URL" name="doc[]" style="margin-left: 10px; width: 90%;" /><span class="btn btn-primary" id="plusDoc" style="font-size: 18px; width: 3%; padding: 1px; margin-left: 9px; padding-left: 9px; padding-right: 8px;margin-right: 0px;">+</span><br>
	</div>

	<input class="radiostyling" type="radio" name="status" value="Complete"  />Complete 
	<input class="radiostyling" type="radio" name="status" value="Other"  />Other 
	<input class="radiostyling" type="radio" name="status" value="Kickback"  />Kickback
	</div>
	<div class="submitCon">
  	<input class="btn btn-success submitButton" type="Submit" name="Submit" />
	</div>
</div>
</form>