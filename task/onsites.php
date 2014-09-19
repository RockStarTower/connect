<form class="panel taskForm" method="post" action="task/onsitesh.php" style="padding-bottom: 5px;">
<div class="cusFormCon">
<div class="panel-default">
	<div class="panel-heading">
		<div class="panel-title">
		Onsites <span class="sub-panel-title">- Complete, Kickbacks, & Other</span>
		</div>
	</div>
</div>
<?php 
$oneday = date('20y-m-d',strtotime("-0 days"));
?>
<ul class="nav nav-tabs" role="tablist">
  <li id="taskStandard" class="active"><a href="#">Standard Task</a></li>
  <li id="taskOther" ><a href="#">Other Task</a></li>
</ul>
<div class="taskCon1">
  	<div class="leftForm">
  	<input class="sInputs" type="date" name="date" value="<?=$oneday?>" required /> </br>
  	<input class="sInputs"  type="number" name="clientid" placeholder="Client ID"  required/> </br>
  	<input class="sInputs" id="onsiteDomain" type="text" name="domain" placeholder="example.com"  required/> </br>
      <select class="sInputs" id="taskSelect" style="padding-bottom: 0px !important; padding-top: 0px !important;" name="task" required/>
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
       </select><br>
      <input class="sInputs quicktime" type="text" name="time" required placeholder="Time   .5 = half hour"/>
      <div class="show-this1">0.1</div>
      <div class="show-this2">0.25</div>
      <div class="show-this3">0.5</div>
      <div class="show-this4">0.75</div>
      <div class="show-this5">1</div>
  	<input class="sInputs" type="hidden" name="id" value="<?=$user_id?>" required/> 
  	<input class="sInputs" type="hidden" name="username" value="<?=$username?>" required/>  
  	</div>
  	<div class="rightForm">
  	<textarea style="width: 100%; margin-top: 2px; height: 114px !important;; padding: 13px;" class="input-standard contentForm ctextarea currentcontent" rows="10" cols="60" name="comment" placeholder="Please leave a comment. (Optional)" /></textarea> <br>
  	<div id="docCon">
  		<input type="text" class="sInputs doc" placeholder="Doc URL" name="doc[]" style="margin-left: 10px; width: 90%;" /><span class="btn btn-primary" id="plusDoc" style="font-size: 18px; width: 3%; padding: 1px; margin-left: 9px; padding-left: 9px; padding-right: 8px;margin-right: 0px;">+</span><br>
  	</div>
  	<input id="completeRadioSelect" class="radiostyling" type="radio" name="status" value="Complete"  />Complete 
  	<input id="kickbackRadioSelect" class="radiostyling" type="radio" name="status" value="Kickback"  />Kickback
      <div class="stockKickbackOption" style="height: -0px; width: 548px; margin: 10px; overflow: hidden;">
          <button type="button" style="margin: 2px;" class="btn btn-default quick1 bMargin">No Logins</button>
          <button type="button" style="margin: 2px;" class="btn btn-default quick2 bMargin">Bad Logins</button>
          <button type="button" style="margin: 2px;" class="btn btn-default quick3 bMargin">Need FTP</button>
          <button type="button" style="margin: 2px;" class="btn btn-default quick4 bMargin">Need Host</button>
          <button type="button" style="margin: 2px; width: 110px;" class="btn btn-default quick5 bMargin">Need CMS</button>
          <button type="button" style="margin: 2px;" class="btn btn-default quick6">Vague</button>
          <button type="button" style="margin: 2px;" class="btn btn-default quick7">Partial</button>
          <button type="button" style="margin: 2px;" class="btn btn-default quick8">Higher Access</button>
          <button type="button" style="margin: 2px;" class="btn btn-default quick9">404 Error</button>
          <button type="button" style="margin: 2px;" class="btn btn-default quick10">Cannot Complete</button>
      </div>
  	</div>
    
  	<div class="submitCon">
    	<input class="btn btn-success submitButton" type="Submit" name="Submit" />
  	</div>
  </div>
  </form>

<div class="taskCon2" style="display: none;">
<form method="post" action="task/onsitesh.php" style="padding: 0px; margin: 0px;">
  <div class="leftForm">
      <input class="sInputs" type="date" name="date" value="<?=$oneday?>" required /> </br>
      <input class="sInputs" id="onsiteDomain" type="text" name="domain" placeholder="example.com (optional)" />
        <select class="sInputs" id="taskSelect2" style="padding-bottom: 0px !important; padding-top: 0px !important;" name="task" required/>
          <option value="Traning & Meetings">Traning & Meetings</option>
          <option value="One on One">One on One</option>
          <option value="Self Learning">Self Learning</option>
          <option value="Sandbox Site">Sandbox Site</option>
          <option value="Other">Other</option>
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
      <textarea style="width: 100%; margin-top: 2px; height: 114px !important;; padding: 13px;" class="input-standard contentForm ctextarea " rows="10" cols="60" name="comment" placeholder="Please leave a comment. (Optional)" /></textarea> <br>

      <input class="radiostyling" type="radio" name="status" value="Other" checked />Other 

      </div>
      <div class="submitCon">
        <input class="btn btn-success submitButton" type="Submit" name="Submit" />
      </div>
    </form>
  </div>
</div>
