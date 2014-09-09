<?php
include "header.php";
?>

<script>
$(document).ready(function(){

	function tabs (data, data2){

		$(".tabbox").removeClass("active");
		$(data2).addClass("active");

		$(".activetab").css("display","none");
		$(data).css("display","block");

	}

	$("#domainNav").click(function(){

		tabs("#domain", "#domainNav");

	});

	$("#domainNav2").click(function(){

		tabs("#domain2", "#domainNav2");

	});

	$("#domainNav3").click(function(){

		tabs("#domain3", "#domainNav3");

	});

	$("#domainNav4").click(function(){

		tabs("#domain4", "#domainNav4");

	});

	$("#domainNav5").click(function(){

		tabs("#domain5", "#domainNav5");

	});

	$("#domainNav6").click(function(){

		tabs("#domain6", "#domainNav6");

	});

	$("#domainNav7").click(function(){

		tabs("#domain7", "#domainNav7");

	});

	$("#domainNav8").click(function(){

		tabs("#domain8", "#domainNav8");

	});

	$("#domainNav9").click(function(){

		tabs("#domain9", "#domainNav9");

	});

	$("#domainNav10").click(function(){

		tabs("#domain10", "#domainNav10");

	});


  	$("#addurlrow").click(function(){

  		if ( $(".urlcon2").hasClass("displayed") ){

  			$(".urlcon2").css("display","none");
  			$(".urlcon2").removeClass("displayed");
  			$(this).text("Show All");

  		} else {

	  		$(".urlcon2").css("display","block");
	  		$(".urlcon2").addClass("displayed");
  			$(this).text("Hide All");
  		}

  	});

});

</script>

<style>

	.audittaskForm {
	width: 99%;
	float: left;
	background-color: #fff !important;
	}

	.audittext {
	padding: 10px;
	}

	.auditpanel {
	width: 100%;
	min-height: 120px;
	background-color: #fff;
	border: 1px solid transparent;
	border-radius: 4px;
	-webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
	box-shadow: 0 1px 1px rgba(0,0,0,.05);
	width: 100%;
	margin-bottom: 0px;
	}

</style>

	<div class="full-width-wrapper">
		<form class="auditpanel taskForm" method="get" action="audit.php">
			<div class="panel-default">
				<div class="panel-heading">
					<div class="panel-title">
						<span class="glyphicon glyphicon-eye-open"></span>
						Audit <span class="sub-panel-title">- Set domain for SEO review</span>
					</div>
	         	</div>
	         </div>	

	         <div class="urlcon">
			 	<label for="domain_url" class="domaintext">Domain URL:</label>
	         	<input type="text" name="domain" class="input-standard contentForm domaintext"/>
			 </div>

	         <div id="urlcon2" class="urlcon2" style="display: none;">
	         	<label for="domain_url" class="domaintext2">Domain URL:</label>
	         	<input type="text" name="domain2" class="input-standard contentForm domaintext2"/>
	         </div>

	         <div class="urlcon2" style="display: none;">
	         	<label for="domain_url" class="domaintext3">Domain URL:</label>
	         	<input type="text" name="domain3" class="input-standard contentForm domaintext3"/>
	         </div>

	         <div class="urlcon2" style="display: none;">
	         	<label for="domain_url" class="domaintext4">Domain URL:</label>
	         	<input type="text" name="domain4" class="input-standard contentForm domaintext4"/>
	         </div>

	         <div class="urlcon2" style="display: none;">
	         	<label for="domain_url" class="domaintext5">Domain URL:</label>
	         	<input type="text" name="domain5" class="input-standard contentForm domaintext5"/>
	         </div>

 			<div id="urlcon2" class="urlcon2" style="display: none;">
	         	<label for="domain_url" class="domaintext6">Domain URL:</label>
	         	<input type="text" name="domain6" class="input-standard contentForm domaintext6"/>
	         </div>

	         <div class="urlcon2" style="display: none;">
	         	<label for="domain_url" class="domaintext7">Domain URL:</label>
	         	<input type="text" name="domain7" class="input-standard contentForm domaintext7"/>
	         </div>

	         <div class="urlcon2" style="display: none;">
	         	<label for="domain_url" class="domaintext8">Domain URL:</label>
	         	<input type="text" name="domain8" class="input-standard contentForm domaintext8"/>
	         </div>

	         <div class="urlcon2" style="display: none;">
	         	<label for="domain_url" class="domaintext9">Domain URL:</label>
	         	<input type="text" name="domain9" class="input-standard contentForm domaintext9"/>
	         </div>

	         <div class="urlcon2" style="display: none;">
	         	<label for="domain_url" class="domaintext10">Domain URL:</label>
	         	<input type="text" name="domain10" class="input-standard contentForm domaintext10"/>
	         </div>


	         <div id="addurlrow" class="btn btn-primary" style="margin-left: 7px;">Show All</div>
	         	<input type="submit" name="submit" value="Submit" class="btn btn-success"/>
	         

	    <ul class="nav nav-tabs" role="tablist" style= "margin-top: 20px">
		  <li id="domainNav" class="tabbox domainnavtab1 active"><a href="#">Domain1</a></li>
		  <li id="domainNav2" class="tabbox domainnavtab2"><a href="#">Domain2</a></li>
		  <li id="domainNav3" class="tabbox domainnavtab3"><a href="#">Domain3</a></li>
		  <li id="domainNav4" class="tabbox domainnavtab4"><a href="#">Domain4</a></li>
		  <li id="domainNav5"class="tabbox domainnavtab5"><a href="#">Domain5</a></li>
		  <li id="domainNav6" class="tabbox domainnavtab6"><a href="#">Domain6</a></li>
		  <li id="domainNav7" class="tabbox domainnavtab7"><a href="#">Domain7</a></li>
		  <li id="domainNav8" class="tabbox domainnavtab8"><a href="#">Domain8</a></li>
		  <li id="domainNav9"class="tabbox domainnavtab9"><a href="#">Domain9</a></li>
		  <li id="domainNav10"class="tabbox domainnavtab10"><a href="#">Domain10</a></li>
		</ul>

		</form>

	    <div class="working auditPanel">    
	    <div class="audittext" style="max-height: 500px; overflow-y: scroll">
	    
		<?php

	    	include 'audit_class.php';





	    	echo '<div id="domain" class="activetab activated" displayStatus="show">';
	    	if (isset($_GET['domain'])) {
	      	 	$audit = new audit($_GET['domain']);
	       		$audit->printAll();
	    	}
	    	echo '</div>';

	   

	    	echo '<div id="domain2" class="activetab" style="display: none" displayStatus="hide">';
	    	if (isset($_GET['domain2'])) {
	      	 	$audit2 = new audit($_GET['domain2']);
	       		$audit2->printAll();
	    	}
	    	echo '</div>';

	    	echo '<div id="domain3" class="activetab" style="display: none" displayStatus="hide">';
	    	if (isset($_GET['domain3'])) {
	      	 	$audit3 = new audit($_GET['domain3']);
	       		$audit3->printAll();
	    	}
	    	echo '</div>';

			echo '<div id="domain4" class="activetab" style="display: none" displayStatus="hide">';
	    	if (isset($_GET['domain4'])) {
	      	 	$audit4 = new audit($_GET['domain4']);
	       		$audit4->printAll();
	    	}
	    	echo '</div>';

	    	echo '<div id="domain5" class="activetab" style="display: none" displayStatus="hide">';
	    	if (isset($_GET['domain5'])) {
	      	 	$audit5 = new audit($_GET['domain5']);
	       		$audit5->printAll();
	    	}
	    	echo '</div>';

	    	echo '<div id="domain6" class="activetab" style="display: none" displayStatus="hide">';
	    	if (isset($_GET['domain6'])) {
	      	 	$audit6 = new audit($_GET['domain6']);
	       		$audit6->printAll();
	    	}
	    	echo '</div>';

	    	echo '<div id="domain7" class="activetab" style="display: none" displayStatus="hide">';
	    	if (isset($_GET['domain7'])) {
	      	 	$audit7 = new audit($_GET['domain7']);
	       		$audit7->printAll();
	    	}
	    	echo '</div>';

			echo '<div id="domain8" class="activetab" style="display: none" displayStatus="hide">';
	    	if (isset($_GET['domain8'])) {
	      	 	$audit8 = new audit($_GET['domain8']);
	       		$audit8->printAll();
	    	}
	    	echo '</div>';

	    	echo '<div id="domain9" class="activetab" style="display: none" displayStatus="hide">';
	    	if (isset($_GET['domain9'])) {
	      	 	$audit9 = new audit($_GET['domain9']);
	       		$audit9->printAll();
	    	}
	    	echo '</div>';

	    	echo '<div id="domain10" class="activetab" style="display: none" displayStatus="hide">';
	    	if (isset($_GET['domain10'])) {
	      	 	$audit10 = new audit($_GET['domain10']);
	       		$audit10->printAll();
	    	}
	    	echo '</div>';
		?>	    
	</div>
	</div>
</div>