<?php

if(isset($_GET['domain'])){

	$domain_name = $_GET['domain'];
	$json_file = file_get_contents('dropzone/content/' . $domain_name . '/content.json');
	$file_path = ('dropzone/content/' . $domain_name . '/content.json');

	$file = basename($json_file);
	$file = $file_path;

	if(!$file){ // file does not exist
	    die('file not found');
	} else {
	    header("Cache-Control: public");
	    header("Content-Description: File Transfer");
	    header("Content-Disposition: attachment; filename=content.json");
	    header("Content-Type: application/json");
	    header("Content-Transfer-Encoding: binary");
	    // read the file from disk
	    readfile($file);
	}

}

?>

<?php
if(!isset($_GET['domain'])){


include 'header.php';



	
?>


<div class="body-wrapper">

	<div class="lSide">

	</div>

	<div class="left-wrapper">

		<?php if(!isset($_GET['domain']) & !isset($_GET['wireframe'])){

			echo '<form class="panel taskform" autocomplete="off"  method="get" action="devbuilder.php" >
				
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Domain Information <span class="sub-panel-title">- Set Domain to Download</span>
							</div>
						</div>
					</div>
					
						<label for="domain_url">Domain URL:</label>
						<input type="text" id="domain" name="domain" class="input-standard contentForm" placeholder="example.com" required />
						<input style="margin: 20px;" class="submitButton btn-success" type="submit" value="Download" />
						</form>';

		} else{ ?>


		<?php } ?>
	</div>

	<div class="right-wrapper">
		<div class="right-margin">
			<div class="panel panel-info">
					 <div class="panel-heading">
						 <h3 class="panel-title"><i class="fa fa-lightbulb-o"></i> Autobuilder Instructions For Designers</h3>
				 	 </div>
				 	<div class="panel-body docPanel">
						<ul class="media-list">
							<b>AutoBuilder has been designed to make your work fast and simple. If you have any feedback, 
							suggestions, or if you need to report errors please fill out the <a href="suggestion.php">Contact</a> page.</b> <br>
						  <li class="media">
						    <div class="media-body">
						    	<h4 class="media-heading">Step 1</h4>
								First you need to download the correct file. To do this paste in the URL of the website. It should automattically remove the "https://www.", if it does not, you will need to manually remove it. Once you have the URl entered just hit download. 
						    </div>
						  </li>
						</ul>
						<ul class="media-list">
						  <li class="media">
						    <div class="media-body">
						    	<h4 class="media-heading">Step 2</h4>
						    	The json file should be named "content.json". It may default to "content(1).json" if you already have one there. Be sure to rename it if it does.Once you have the content.json file, use the autobuilder plugin to upload the file. This will be the last step that automatically builds the site.
						    </div>
						  </li>
						</ul>
					</div>
				</div>
			<div class="panel">
				<div class="panel-default">
					<div class="panel-heading">
						<div class="panel-title">
						Note Pad <span class="sub-panel-title"> - Quick Notes</span>
						</div>
					</div>
				</div>
				<textarea class="input-standard contentNotes" name="contentNotes" placeholder="Enter any notes here..."></textarea>
			</div>
		</div>	
	</div>

</div>

<?php } ?>