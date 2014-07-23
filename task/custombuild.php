<?php $oneday = date('20y-m-d',strtotime("-0 days")); ?>

<form class="panel taskform" autocomplete="off"  method="post" action="task/custombuildh.php" >
<div class="panel-default">
	<div class="panel-heading">
		<div class="panel-title">
		Custom Web <span class="sub-panel-title">- Builds, Revisions, QA Kickbacks</span>
		</div>
	</div>
</div>
	<div class="row">
		<div class="cTitle">
			Date
		</div>
		<div class="cTitle">
			Price
		</div>
		<div class="cTitle">
			Base URL
		</div>
		<div class="cTitle">
			Total Time
		</div>
	</div>
	<div class="standard-wrapper">
		<input class="cInputs input-standard" id="firstcInput" type="date" name="date"  placeholder="yyyy-mm-dd" value="<?=$oneday?>" required />
		<input class="cInputs input-standard" type="text" name="price" placeholder="$2500" required />
		<input class="cInputs input-standard" type="text" name="url" placeholder="http://example.com/" required/>
		<input class="cInputs input-standard" id="totalTime" type="text" name="time" placeholder="Sum of subtasks" readonly />
	</div>
	<div class="sTitleCon">
		<div class="sTitle">
		Time
		</div>
		<div class="sTitle">
		Description
		</div>
	</div>
	
	<div id="subItem1" class="subItem">
		<div class="plusCon">
			<div id="plus1" class="add">
				+
			</div>
		</div>
		<input class="sTime" type="number" step="any" name="stime1" placeholder="Hours" />
		<input class="sTask" type="text" name="stask1" placeholder="Description..." />
	</div>
	
	<div id="subItem2" class="subItem">
		<div class="plusCon">
			<div id="plus2" class="add">
				+
			</div>
		</div>
		<input class="sTime" type="number" step="any" name="stime2" placeholder="Hours" />
		<input class="sTask" type="text" name="stask2" placeholder="Description..." />
	</div>
	
	<div id="subItem3" class="subItem">
		<div class="plusCon">
			<div id="plus3" class="add">
				+
			</div>
		</div>
		<input class="sTime" type="number" step="any" name="stime3" placeholder="Hours" />
		<input class="sTask" type="text" name="stask3" placeholder="Description..." />
	</div>
	
	<div id="subItem4" class="subItem">
		<div class="plusCon">
			<div id="plus4" class="add">
				+
			</div>
		</div>
		<input class="sTime" type="number" step="any" name="stime4" placeholder="Hours" />
		<input class="sTask" type="text" name="stask4" placeholder="Description..." />
	</div>
	
	<div id="subItem5" class="subItem">
		<div class="plusCon">
			<div id="plus5" class="add">
				+
			</div>
		</div>
		<input class="sTime" type="number" step="any" name="stime5" placeholder="Hours" />
		<input class="sTask" type="text" name="stask5" placeholder="Description..." />
	</div>
	
	<div id="subItem6" class="subItem">
		<div class="plusCon">
			<div id="plus6" class="add">
				+
			</div>
		</div>
		<input class="sTime" type="number" step="any" name="stime6" placeholder="Hours" />
		<input class="sTask" type="text" name="stask6" placeholder="Description..." />
	</div>
	
	<div id="subItem7" class="subItem">
		<div class="plusCon">
			<div id="plus7" class="add">
				+
			</div>
		</div>
		<input class="sTime" type="number" step="any" name="stime7" placeholder="Hours" />
		<input class="sTask" type="text" name="stask7" placeholder="Description..." />
	</div>
	
	<div id="subItem8" class="subItem">
		<div class="plusCon">
			<div id="plus8" class="add">
				+
			</div>
		</div>
		<input class="sTime" type="number" step="any" name="stime8" placeholder="Hours" />
		<input class="sTask" type="text" name="stask8" placeholder="Description..." />
	</div>
	
	<div id="subItem9" class="subItem">
		<div class="plusCon">
			<div id="plus9" class="add">
				+
			</div>
		</div>
		<input class="sTime" type="number" step="any" name="stime9" placeholder="Hours" />
		<input class="sTask" type="text" name="stask9" placeholder="Description..." />
	</div>
	
	<div id="subItem10" class="subItem">
		<div class="plusCon">
			<div id="plus10" class="add">
				+
			</div>
		</div>
		<input class="sTime" type="number" step="any" name="stime10" placeholder="Hours" />
		<input class="sTask" type="text" name="stask10" placeholder="Description..." />
	</div>
	
	<div id="subItem11" class="subItem">
		<div class="plusCon">
			<div id="plus11" class="add">
				+
			</div>
		</div>
		<input class="sTime" type="number" step="any" name="stime11" placeholder="Hours" />
		<input class="sTask" type="text" name="stask11" placeholder="Description..." />
	</div>
	
	<div id="subItem12" class="subItem">
		<div class="plusCon">
			<div id="plus12" class="add">
				+
			</div>
		</div>
		<input class="sTime" type="number" step="any" name="stime12" placeholder="Hours" />
		<input class="sTask" type="text" name="stask12" placeholder="Description..." />
	</div>
	
	<div id="subItem13" class="subItem">
		<div class="plusCon">
			<div id="plus13" class="add">
				+
			</div>
		</div>
		<input class="sTime" type="number" step="any" name="stime13" placeholder="Hours" />
		<input class="sTask" type="text" name="stask13" placeholder="Description..." />
	</div>
	
	<div id="subItem14" class="subItem">
		<div class="plusCon">
			<div id="plus14" class="add">
				+
			</div>
		</div>
		<input class="sTime" type="number" step="any" name="stime14" placeholder="Hours" />
		<input class="sTask" type="text" name="stask14" placeholder="Description..." />
	</div>
	
	<div id="subItem15" class="subItem">
		<div class="plusCon">
			<div id="plus15" class="add">
				+
			</div>
		</div>
		<input class="sTime" type="number" step="any" name="stime15" placeholder="Hours" />
		<input class="sTask" type="text" name="stask15" placeholder="Description..." />
	</div>

	<input class="cInputs" type="hidden" name="username" value="<?=$username?>" /> 
	<input class="cInputs" type="hidden" name="id" value="<?=$user_id?>" /> 
	
	<div class="submitCon">
		<div class="completeCheck">Task Completed?</div> <input value="Yes" class="checkbox" type="checkbox" name="finished"/>
	<input class="submitButton" type="Submit" name="Submit" />
	</div> 
</form>