<?php
include 'header.php';

	if(isset($_GET['domain']) && isset($_GET['wireframe']) && isset($_GET['language'])){

		$domain_name = $_GET['domain'];
		$wireframe = $_GET['wireframe'];
		$wf_array = $content_array[$wireframe];
		$language = $_GET['language'];
	}
	// test note
?>		


<div class="body-wrapper">
		
	<div class="lSide">
	<?php if(isset($_GET['domain']) && isset($_GET['wireframe']) && isset($_GET['language'])){ ?>
		<div class="pickTask">
			<div class="pickTaskContainer" style="opacity: 1;" id="step1">
				<img class="taskIcon tnumbers"  src="images/number-1.png" />
				<div class="taskText">
					Meta
				</div>
			</div>
			<div class="pickTaskContainer" id="step2">
				<img class="taskIcon tnumbers"  src="images/number-2.png" />
				<div class="taskText">
					Navigation
				</div>
			</div>
			<div class="pickTaskContainer" id="step3">
				<img class="taskIcon tnumbers" src="images/number-3.png" />
				<div class="taskText">
					Home
				</div>
			</div>
			<div class="pickTaskContainer" id="step4">
				<img class="taskIcon tnumbers" src="images/number-4.png" />
				<div class="taskText">
					Content
				</div>
			</div>
		</div>
		<img id="dots" src="images/dots.png" />
		<a id="feedbackLink" href="suggestion.php"><div id="feedback">Errors &<br>Feedback</div></a>
		<?php if ($user_role == 'admin'){ ?>
		<button class="standard-button" id="autofill">Auto Fill</button>
		<?php } ?>
		<?php if ($user_role == 'blogs' || $user_role == 'admin'){ ?>
			<div id="devModeBox">
				<input type="checkbox" id="devMode" /> Dev Mode
			</div>
		<?php } ?>
	<?php } ?>
	</div>

	<div class="left-wrapper">
	
	<?php
		
		if(!isset($_GET['domain']) && !isset($_GET['wireframe']) && !isset($_GET['language'])){

			echo '<form class="panel taskform" autocomplete="off"  method="get" action="contentbuilder.php" >
				
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Domain Information <span class="sub-panel-title">- Set Domain & Wireframe </span>
							</div>
						</div>
					</div>
					
						<label for="domain_url">Domain URL:</label>
						<input type="text" id="domain" name="domain" class="input-standard contentForm" placeholder="example.com" required />

						<label for="wireframe_number">Wireframe Number:</label>
						<input type="number" min="1" max="30" id="wireframe" name="wireframe" class="input-standard contentForm" placeholder="Wireframe Number" required />
						<label for="language">Language:</label>
						<select name="language"  class="input-standard contentForm" id="language">
							<option value="english">English</option>
							<option value="spanish">Spanish</option>
							<option value="french">French</option>
						</select>	
						<input style="margin: 20px; margin-right: 38px;" class="submitButton btn-success" type="submit" />
						</form>';
		}	
		
				
	?>

	<?php function wireframe1($wf_array, $domain_name, $username, $wireframe, $language){ 
	
		$tt = $wf_array['title_tag'];
		$md = $wf_array['meta_description'];
		$st = $wf_array['site_tagline'];	
		$cta = $wf_array['call_to_actions'];
		$pt = $wf_array['page_titles'];
		$pc = $wf_array['page_content'];
		$pn = $wf_array['navigation_page_names'];
		$ch = $wf_array['content_headings'];
		$cb = $wf_array['content_boxes'];
		$hpt = $wf_array['homepage_title'];
		
	?>
			<form id="wireframeForm" class="panel taskform" autocomplete="off">
				
				<div id="contentp1" >

					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 1 <span class="sub-panel-title">- Meta & Title Information - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="author_nickname">Author Nickname:</label>
						<input type="text" id="author_nickname" name="author_nickname" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="Author Nickname" required />
						
						<label for="title_tag">Title Tag:</label>
						<input type="text" id="title_tag" name="title_tag" class="input-standard contentForm validation" data-min="<?=$tt['min']?>" data-max="<?=$tt['max']?>" placeholder="Title Tag" required />
						
						<label for="title_tagline">Title Tagline:</label>
						<input type="text" id="title_tagline" name="tagline" class="input-standard contentForm validation" data-min="<?=$st['min']?>" data-max="<?=$st['max']?>" placeholder="Title Tagline" required />
						
						<label for="meta_description">Meta Description:</label>
						<input type="text" id="meta_description" name="meta_description" class="input-standard contentForm validation" data-min="<?=$md['min']?>" data-max="<?=$md['max']?>" placeholder="Meta Description" required />
						
						<div class="submitCon noBackground">
							<input id="next1" class="submitButton" value="Next" readonly />
						</div> 	
						
				</div>
				
				<div id="contentp2" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 2 <span class="sub-panel-title">- Navigation - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page">About Page:</label>
						<input type="text" id="about_page" name="content[about][nav]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page" required />
						
						<label for="Page_1">Page 1:</label>
						<input type="text" id="Page_1" name="content[page1][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 1" required />
						
						<label for="Page_2">Page 2:</label>
						<input type="text" id="Page_2" name="content[page2][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 2" required />
						
						<label for="Page_3">Page 3:</label>
						<input type="text" id="Page_3" name="content[page3][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 3" required />
						
						<div class="submitCon noBackground">
							<input id="prev2" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next2" class="submitButton" value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp3" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 3 <span class="sub-panel-title">- Home Page - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="slider_1">Slider Call to Action:</label>
						<input type="text" id="slider_1" name="content[page1][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 1" required />
						
						<label for="slider_2"></label>
						<input type="text" id="slider_2" name="content[page2][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 2" required />
						
						<label for="slider_3"></label>
						<input type="text" id="slider_3" name="content[page3][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 3" required />
						
						<label for="home_page_title">Home Page title:</label>
						<input type="text" id="home_page_title" name="content[homepage][content][homepage_title]" class="input-standard contentForm validation" data-min="<?=$hpt['min']?>" data-max="<?=$hpt['max']?>" placeholder="Home Page title" />
						
						<label for="content_heading_1">Content Heading 1:</label>
						<input type="text" id="content_heading_1" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 1" required />

						<p>
							<label class="tLabel" for="top_content_box">Content Box 1:</label>
							<textarea rows="8" cols="50" id="top_content_box" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Top Content Box" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<label for="content_heading_2">Content Heading 2:</label>
						<input type="text" id="content_heading_2" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 2" required />

						<p>
							<label class="tLabel" for="content_box_2">Content Box 2:</label>
							<textarea rows="8" cols="50" id="content_box_2" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 2" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<label for="content_heading_3">Content Heading 3:</label>
						<input type="text" id="content_heading_3" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 3" required />

						<p>
							<label class="tLabel" for="content_box_3">Content Box 3:</label>
							<textarea rows="8" cols="50" id="content_box_3" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 3" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<div class="submitCon noBackground">
							<input id="prev3" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next3" class="submitButton"  value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp4" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 4 <span class="sub-panel-title">- Content Pages - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page_title">About Page Title:</label>
						<input type="text" id="about_page_title" name="content[about][title]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page Title" required />
						<p>
							<label class="tLabel" for="about_page_content">About Page Content:</label>
							<textarea rows="8" cols="50" id="about_page_content" name="content[about][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="About Page Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_1_title">Page 1 Title:</label>
							<input type="text" id="page_1_title" name="content[page1][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 1 Title" required />
						<p>
							<label class="tLabel" for="page_1_content">Page 1 Content:</label>
							<textarea rows="8" cols="50" id="page_1_content" name="content[page1][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 1 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_2_title">Page 2 Title:</label>
							<input type="text" id="page_2_title" name="content[page2][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 2 Title" required />
						<p>
							<label class="tLabel" for="page_2_content">Page 2 Content:</label>
							<textarea rows="8" cols="50" id="page_2_content" name="content[page2][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 2 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<label for="page_3_title">Page 3 Title:</label>
						<input type="text" id="page_3_title" name="content[page3][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 3 Title" required />
						<p>
							<label class="tLabel" for="page_3_content">Page 3 Content:</label>
							<textarea rows="8" cols="50" id="page_3_content" name="content[page3][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 3 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<input type="hidden" name="username" value="<?=$username?>" />
						<input type="hidden" name="site_url" value="<?=$domain_name?>" />
						<input type="hidden" name="wireframe" value="<?=$wireframe?>" />
						<input type="hidden" name="language" value="<?=$language?>" />
						<div class="submitCon noBackground">
							<input id="prev4" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input class="submitButton btn-success btn-valid" type="Submit" name="Submit" />
						</div> 
				</div>
			
			</form>
	<?php } ?>
	
	<?php function wireframe2($wf_array, $domain_name, $username, $wireframe, $language){ 
	
		$tt = $wf_array['title_tag'];
		$md = $wf_array['meta_description'];	
		$cta = $wf_array['call_to_actions'];
		$pt = $wf_array['page_titles'];
		$pc = $wf_array['page_content'];
		$pn = $wf_array['navigation_page_names'];
		$ch = $wf_array['content_headings'];
		$cb = $wf_array['content_boxes'];
		$hpt = $wf_array['homepage_title'];
		
	?>
		
			<form id="wireframeForm" class="panel taskform" autocomplete="off" >

				<div id="contentp1" >
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 1 <span class="sub-panel-title">- Meta & Title Information - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="author_nickname">Author Nickname:</label>
						<input type="text" id="author_nickname" name="author_nickname" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="Author Nickname" required />
						
						<label for="title_tag">Title Tag:</label>
						<input type="text" id="title_tag" name="title_tag" class="input-standard contentForm validation" data-min="<?=$tt['min']?>" data-max="<?=$tt['max']?>" placeholder="Title Tag" required />
						
						<label for="meta_description">Meta Description:</label>
						<input type="text" id="meta_description" name="meta_description" class="input-standard contentForm validation" data-min="<?=$md['min']?>" data-max="<?=$md['max']?>" placeholder="Meta Description" required />
						
						<div class="submitCon noBackground">
							<input id="next1" class="submitButton" value="Next" readonly />
						</div> 	
						
				</div>
				
				<div id="contentp2" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 2 <span class="sub-panel-title">- Navigation - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page">About Page:</label>
						<input type="text" id="about_page" name="content[about][nav]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page" required />
						
						<label for="Page_1">Page 1:</label>
						<input type="text" id="Page_1" name="content[page1][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 1" required />
						
						<label for="Page_2">Page 2:</label>
						<input type="text" id="Page_2" name="content[page2][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 2" required />
						
						<label for="Page_3">Page 3:</label>
						<input type="text" id="Page_3" name="content[page3][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 3" required />
						
						<div class="submitCon noBackground">
							<input id="prev2" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next2" class="submitButton" value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp3" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 3 <span class="sub-panel-title">- Home Page - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="slider_1">Slider Call to Action:</label>
						<input type="text" id="slider_1" name="content[page1][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 1" required />
						
						<label for="slider_2"></label>
						<input type="text" id="slider_2" name="content[page2][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 2" required />
						
						<label for="slider_3"></label>
						<input type="text" id="slider_3" name="content[page3][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 3" required />
						
						<label for="home_page_title">Home Page title:</label>
						<input type="text" id="home_page_title" name="content[homepage][content][homepage_title]" class="input-standard contentForm validation" data-min="<?=$hpt['min']?>" data-max="<?=$hpt['max']?>" placeholder="Home Page title" required />
						
						<label for="content_heading_1">Content Heading 1:</label>
						<input type="text" id="content_heading_1" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 1" required />
						
						<p>
							<label class="tLabel" for="top_content_box">Content Box 1:</label>
							<textarea rows="8" cols="50" id="top_content_box" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Top Content Box" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<label for="content_heading_2">Content Heading 2:</label>
						<input type="text" id="content_heading_2" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 2" required />
						<p>
							<label class="tLabel" for="content_box_2">Content Box 2:</label>
							<textarea rows="8" cols="50" id="content_box_2" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 2" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<label for="content_heading_3">Content Heading 3:</label>
						<input type="text" id="content_heading_3" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 3" required />
						<p>
							<label class="tLabel" for="content_box_3">Content Box 3:</label>
							<textarea rows="8" cols="50" id="content_box_3" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 3" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<label for="content_heading_4">Content Heading 4:</label>
						<input type="text" id="content_heading_4" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 4" required />
						<p>
							<label class="tLabel" for="content_box_4">Content Box 4:</label>
							<textarea rows="8" cols="50" id="content_box_4" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 4" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<div class="submitCon noBackground">
							<input id="prev3" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next3" class="submitButton"  value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp4" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 4 <span class="sub-panel-title">- Content Pages - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page_title">About Page Title:</label>
						<input type="text" id="about_page_title" name="content[about][title]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page Title" required />
						<p>
							<label class="tLabel" for="about_page_content">About Page Content:</label>
							<textarea rows="8" cols="50" id="about_page_content" name="content[about][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="About Page Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_1_title">Page 1 Title:</label>
							<input type="text" id="page_1_title" name="content[page1][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 1 Title" required />
						<p>
							<label class="tLabel" for="page_1_content">Page 1 Content:</label>
							<textarea rows="8" cols="50" id="page_1_content" name="content[page1][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 1 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_2_title">Page 2 Title:</label>
							<input type="text" id="page_2_title" name="content[page2][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 2 Title" required />
						<p>
							<label class="tLabel" for="page_2_content">Page 2 Content:</label>
							<textarea rows="8" cols="50" id="page_2_content" name="content[page2][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 2 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<label for="page_3_title">Page 3 Title:</label>
						<input type="text" id="page_3_title" name="content[page3][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 3 Title" required />
						<p>
							<label class="tLabel" for="page_3_content">Page 3 Content:</label>
							<textarea rows="8" cols="50" id="page_3_content" name="content[page3][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 3 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<input type="hidden" name="username" value="<?=$username?>" />
						<input type="hidden" name="site_url" value="<?=$domain_name?>" />
						<input type="hidden" name="wireframe" value="<?=$wireframe?>" />
						<input type="hidden" name="language" value="<?=$language?>" />
						<div class="submitCon noBackground">
							<input id="prev4" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input class="submitButton btn-success btn-valid" type="Submit" name="Submit" />
						</div> 
				</div>
			
			</form>
	<?php } ?>
	
	<?php function wireframe3($wf_array, $domain_name, $username, $wireframe, $language){ 
	
		$tt = $wf_array['title_tag'];
		$md = $wf_array['meta_description'];
		$st = $wf_array['site_tagline'];	
		$cta = $wf_array['call_to_actions'];
		$pt = $wf_array['page_titles'];
		$pc = $wf_array['page_content'];
		$pn = $wf_array['navigation_page_names'];
		$ch = $wf_array['content_headings'];
		$cb = $wf_array['content_boxes'];
		$hpt = $wf_array['homepage_title'];
		
	?>
		
			<form id="wireframeForm" class="panel taskform" autocomplete="off" >

				<div id="contentp1" >
				
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 1 <span class="sub-panel-title">- Meta & Title Information - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="author_nickname">Author Nickname:</label>
						<input type="text" id="author_nickname" name="author_nickname" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="Author Nickname" required />
						
						<label for="title_tag">Title Tag:</label>
						<input type="text" id="title_tag" name="title_tag" class="input-standard contentForm validation" data-min="<?=$tt['min']?>" data-max="<?=$tt['max']?>" placeholder="Title Tag" required />
						
						<label for="title_tagline">Title Tagline:</label>
						<input type="text" id="title_tagline" name="tagline" class="input-standard contentForm validation" data-min="<?=$st['min']?>" data-max="<?=$st['max']?>" placeholder="Title Tagline" required />
						
						<label for="meta_description">Meta Description:</label>
						<input type="text" id="meta_description" name="meta_description" class="input-standard contentForm validation" data-min="<?=$md['min']?>" data-max="<?=$md['max']?>" placeholder="Meta Description" required />
						
						<div class="submitCon noBackground">
							<input id="next1" class="submitButton" value="Next" readonly />
						</div> 	
						
				</div>
				
				<div id="contentp2" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 2 <span class="sub-panel-title">- Navigation - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page">About Page:</label>
						<input type="text" id="about_page" name="content[about][nav]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page" required />
						
						<label for="Page_1">Page 1:</label>
						<input type="text" id="Page_1" name="content[page1][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 1" required />
						
						<label for="Page_2">Page 2:</label>
						<input type="text" id="Page_2" name="content[page2][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 2" required />
						
						<label for="Page_3">Page 3:</label>
						<input type="text" id="Page_3" name="content[page3][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 3" required />
						
						<div class="submitCon noBackground">
							<input id="prev2" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next2" class="submitButton" value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp3" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 3 <span class="sub-panel-title">- Home Page - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="slider_1">Slider Call to Action:</label>
						<input type="text" id="slider_1" name="content[page1][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 1" required />
						
						<label for="slider_2"></label>
						<input type="text" id="slider_2" name="content[page2][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 2" required />
						
						<label for="slider_3"></label>
						<input type="text" id="slider_3" name="content[page3][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 3" required />
						
						<label for="home_page_title">Home Page title:</label>
						<input type="text" id="home_page_title" name="content[homepage][content][homepage_title]" class="input-standard contentForm validation" data-min="<?=$hpt['min']?>" data-max="<?=$hpt['max']?>" placeholder="Home Page title" required />
						
						<label for="content_heading_1">Content Heading 1:</label>
						<input type="text" id="content_heading_1" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 1" required />
						
						<p>
							<label class="tLabel" for="top_content_box">Content Box 1:</label>
							<textarea rows="8" cols="50" id="top_content_box" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Top Content Box" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<label for="content_heading_2">Content Heading 2:</label>
						<input type="text" id="content_heading_2" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 2" required />
						<p>
							<label class="tLabel" for="content_box_2">Content Box 2:</label>
							<textarea rows="8" cols="50" id="content_box_2" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 2" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<label for="content_heading_3">Content Heading 3:</label>
						<input type="text" id="content_heading_3" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 3" required />
						<p>
							<label class="tLabel" for="content_box_3">Content Box 3:</label>
							<textarea rows="8" cols="50" id="content_box_3" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 3" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<div class="submitCon noBackground">
							<input id="prev3" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next3" class="submitButton"  value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp4" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 4 <span class="sub-panel-title">- Content Pages - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page_title">About Page Title:</label>
						<input type="text" id="about_page_title" name="content[about][title]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page Title" required />
						<p>
							<label class="tLabel" for="about_page_content">About Page Content:</label>
							<textarea rows="8" cols="50" id="about_page_content" name="content[about][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="About Page Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_1_title">Page 1 Title:</label>
							<input type="text" id="page_1_title" name="content[page1][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 1 Title" required />
						<p>
							<label class="tLabel" for="page_1_content">Page 1 Content:</label>
							<textarea rows="8" cols="50" id="page_1_content" name="content[page1][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 1 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_2_title">Page 2 Title:</label>
							<input type="text" id="page_2_title" name="content[page2][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 2 Title" required />
						<p>
							<label class="tLabel" for="page_2_content">Page 2 Content:</label>
							<textarea rows="8" cols="50" id="page_2_content" name="content[page2][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 2 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<label for="page_3_title">Page 3 Title:</label>
						<input type="text" id="page_3_title" name="content[page3][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 3 Title" required />
						<p>
							<label class="tLabel" for="page_3_content">Page 3 Content:</label>
							<textarea rows="8" cols="50" id="page_3_content" name="content[page3][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 3 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<input type="hidden" name="username" value="<?=$username?>" />
						<input type="hidden" name="site_url" value="<?=$domain_name?>" />
						<input type="hidden" name="wireframe" value="<?=$wireframe?>" />
						<input type="hidden" name="language" value="<?=$language?>" />
						<div class="submitCon noBackground">
							<input id="prev4" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input class="submitButton btn-success btn-valid" type="Submit" name="Submit" />
						</div> 
				</div>
			
			</form>
	<?php } ?>
	
	<?php function wireframe4($wf_array, $domain_name, $username, $wireframe, $language){ 
	
		$tt = $wf_array['title_tag'];
		$md = $wf_array['meta_description'];	
		$cta = $wf_array['call_to_actions'];
		$pt = $wf_array['page_titles'];
		$pc = $wf_array['page_content'];
		$pn = $wf_array['navigation_page_names'];
		$ch = $wf_array['content_headings'];
		$cb = $wf_array['content_boxes'];
		$hpt = $wf_array['homepage_title'];
		
	?>
		
			<form id="wireframeForm" class="panel taskform" autocomplete="off" >

				<div id="contentp1" >
				
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 1 <span class="sub-panel-title">- Meta & Title Information - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="author_nickname">Author Nickname:</label>
						<input type="text" id="author_nickname" name="author_nickname" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="Author Nickname" required />
						
						<label for="title_tag">Title Tag:</label>
						<input type="text" id="title_tag" name="title_tag" class="input-standard contentForm validation" data-min="<?=$tt['min']?>" data-max="<?=$tt['max']?>" placeholder="Title Tag" required />
						
						<label for="meta_description">Meta Description:</label>
						<input type="text" id="meta_description" name="meta_description" class="input-standard contentForm validation" data-min="<?=$md['min']?>" data-max="<?=$md['max']?>" placeholder="Meta Description" required />
						
						<div class="submitCon noBackground">
							<input id="next1" class="submitButton" value="Next" readonly />
						</div> 	
						
				</div>
				
				<div id="contentp2" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 2 <span class="sub-panel-title">- Navigation - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page">About Page:</label>
						<input type="text" id="about_page" name="content[about][nav]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page" required />
						
						<label for="Page_1">Page 1:</label>
						<input type="text" id="Page_1" name="content[page1][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 1" required />
						
						<label for="Page_2">Page 2:</label>
						<input type="text" id="Page_2" name="content[page2][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 2" required />
						
						<label for="Page_3">Page 3:</label>
						<input type="text" id="Page_3" name="content[page3][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 3" required />
						
						<div class="submitCon noBackground">
							<input id="prev2" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next2" class="submitButton" value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp3" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 3 <span class="sub-panel-title">- Home Page - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="slider_1">Slider Call to Action:</label>
						<input type="text" id="slider_1" name="content[page1][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 1" required />
						
						<label for="slider_2"></label>
						<input type="text" id="slider_2" name="content[page2][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 2" required />
						
						<label for="slider_3"></label>
						<input type="text" id="slider_3" name="content[page3][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 3" required />
						
						<label for="home_page_title">Home Page title:</label>
						<input type="text" id="home_page_title" name="content[homepage][content][homepage_title]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="Home Page title" required />
						
						<label for="content_heading_1">Content Heading 1:</label>
						<input type="text" id="content_heading_1" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 1" required />
						
						<p>
							<label class="tLabel" for="top_content_box">Content Box 1:</label>
							<textarea rows="8" cols="50" id="top_content_box" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Top Content Box" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<label for="content_heading_2">Content Heading 2:</label>
						<input type="text" id="content_heading_2" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 2" required />
						<p>
							<label class="tLabel" for="content_box_2">Content Box 2:</label>
							<textarea rows="8" cols="50" id="content_box_2" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 2" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<label for="content_heading_3">Content Heading 3:</label>
						<input type="text" id="content_heading_3" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 3" required />
						<p>
							<label class="tLabel" for="content_box_3">Content Box 3:</label>
							<textarea rows="8" cols="50" id="content_box_3" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 3" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<label for="content_heading_4">Content Heading 4:</label>
						<input type="text" id="content_heading_4" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 4" required />
						<p>
							<label class="tLabel" for="content_box_4">Content Box 4:</label>
							<textarea rows="8" cols="50" id="content_box_4" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 4" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<div class="submitCon noBackground">
							<input id="prev3" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next3" class="submitButton"  value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp4" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 4 <span class="sub-panel-title">- Content Pages - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page_title">About Page Title:</label>
						<input type="text" id="about_page_title" name="content[about][title]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page Title" required />
						<p>
							<label class="tLabel" for="about_page_content">About Page Content:</label>
							<textarea rows="8" cols="50" id="about_page_content" name="content[about][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="About Page Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_1_title">Page 1 Title:</label>
							<input type="text" id="page_1_title" name="content[page1][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 1 Title" required />
						<p>
							<label class="tLabel" for="page_1_content">Page 1 Content:</label>
							<textarea rows="8" cols="50" id="page_1_content" name="content[page1][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 1 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_2_title">Page 2 Title:</label>
							<input type="text" id="page_2_title" name="content[page2][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 2 Title" required />
						<p>
							<label class="tLabel" for="page_2_content">Page 2 Content:</label>
							<textarea rows="8" cols="50" id="page_2_content" name="content[page2][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 2 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<label for="page_3_title">Page 3 Title:</label>
						<input type="text" id="page_3_title" name="content[page3][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 3 Title" required />
						<p>
							<label class="tLabel" for="page_3_content">Page 3 Content:</label>
							<textarea rows="8" cols="50" id="page_3_content" name="content[page3][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 3 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<input type="hidden" name="username" value="<?=$username?>" />
						<input type="hidden" name="site_url" value="<?=$domain_name?>" />
						<input type="hidden" name="wireframe" value="<?=$wireframe?>" />
						<input type="hidden" name="language" value="<?=$language?>" />
						<div class="submitCon noBackground">
							<input id="prev4" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input class="submitButton btn-success btn-valid" type="Submit" name="Submit" />
						</div> 
				</div>
			
			</form>
	<?php } ?>
	
	<?php function wireframe5($wf_array, $domain_name, $username, $wireframe, $language){ 
	
		$tt = $wf_array['title_tag'];
		$md = $wf_array['meta_description'];	
		$cta = $wf_array['call_to_actions'];
		$pt = $wf_array['page_titles'];
		$pc = $wf_array['page_content'];
		$pn = $wf_array['navigation_page_names'];
		$ch = $wf_array['content_headings'];
		$cb = $wf_array['content_boxes'];
		$hpt = $wf_array['homepage_title'];
		
	?>
		
			<form id="wireframeForm" class="panel taskform" autocomplete="off" >

				<div id="contentp1" >
				
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 1 <span class="sub-panel-title">- Meta & Title Information - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="author_nickname">Author Nickname:</label>
						<input type="text" id="author_nickname" name="author_nickname" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="Author Nickname" required />
						
						<label for="title_tag">Title Tag:</label>
						<input type="text" id="title_tag" name="title_tag" class="input-standard contentForm validation" data-min="<?=$tt['min']?>" data-max="<?=$tt['max']?>" placeholder="Title Tag" required />
						
						<label for="meta_description">Meta Description:</label>
						<input type="text" id="meta_description" name="meta_description" class="input-standard contentForm validation" data-min="<?=$md['min']?>" data-max="<?=$md['max']?>" placeholder="Meta Description" required />
						
						<div class="submitCon noBackground">
							<input id="next1" class="submitButton" value="Next" readonly />
						</div> 	
						
				</div>
				
				<div id="contentp2" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 2 <span class="sub-panel-title">- Navigation - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page">About Page:</label>
						<input type="text" id="about_page" name="content[about][nav]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page" required />
						
						<label for="Page_1">Page 1:</label>
						<input type="text" id="Page_1" name="content[page1][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 1" required />
						
						<label for="Page_2">Page 2:</label>
						<input type="text" id="Page_2" name="content[page2][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 2" required />
						
						<label for="Page_3">Page 3:</label>
						<input type="text" id="Page_3" name="content[page3][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 3" required />
						
						<div class="submitCon noBackground">
							<input id="prev2" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next2" class="submitButton" value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp3" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 3 <span class="sub-panel-title">- Home Page - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="slider_1">Slider Call to Action:</label>
						<input type="text" id="slider_1" name="content[page1][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 1" required />
						
						<label for="slider_2"></label>
						<input type="text" id="slider_2" name="content[page2][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 2" required />
						
						<label for="slider_3"></label>
						<input type="text" id="slider_3" name="content[page3][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 3" required />
						
						<label for="home_page_title">Home Page title:</label>
						<input type="text" id="home_page_title" name="content[homepage][content][homepage_title]" class="input-standard contentForm validation" data-min="<?=$hpt['min']?>" data-max="<?=$hpt['max']?>" placeholder="Home Page title" required />
						
						<label for="content_heading_1">Content Heading 1:</label>
						<input type="text" id="content_heading_1" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 1" required />
						
						<p>
							<label class="tLabel" for="content_box_1">Content Box 1:</label>
							<textarea rows="8" cols="50" id="content_box_1" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 1" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<label for="content_heading_2">Content Heading 2:</label>
						<input type="text" id="content_heading_2" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 2" required />
						<p>
							<label class="tLabel" for="content_box_2">Content Box 2:</label>
							<textarea rows="8" cols="50" id="content_box_2" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 2" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<label for="content_heading_3">Content Heading 3:</label>
						<input type="text" id="content_heading_3" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 3" required />
						<p>
							<label class="tLabel" for="content_box_3">Content Box 3:</label>
							<textarea rows="8" cols="50" id="content_box_3" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 3" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<label for="content_heading_4">Content Heading 4:</label>
						<input type="text" id="content_heading_4" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 4" required />
						<p>
							<label class="tLabel" for="content_box_4">Content Box 4:</label>
							<textarea rows="8" cols="50" id="content_box_4" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 4" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<div class="submitCon noBackground">
							<input id="prev3" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next3" class="submitButton"  value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp4" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 4 <span class="sub-panel-title">- Content Pages - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page_title">About Page Title:</label>
						<input type="text" id="about_page_title" name="content[about][title]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page Title" required />
						<p>
							<label class="tLabel" for="about_page_content">About Page Content:</label>
							<textarea rows="8" cols="50" id="about_page_content" name="content[about][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="About Page Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_1_title">Page 1 Title:</label>
							<input type="text" id="page_1_title" name="content[page1][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 1 Title" required />
						<p>
							<label class="tLabel" for="page_1_content">Page 1 Content:</label>
							<textarea rows="8" cols="50" id="page_1_content" name="content[page1][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 1 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_2_title">Page 2 Title:</label>
							<input type="text" id="page_2_title" name="content[page2][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 2 Title" required />
						<p>
							<label class="tLabel" for="page_2_content">Page 2 Content:</label>
							<textarea rows="8" cols="50" id="page_2_content" name="content[page2][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 2 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<label for="page_3_title">Page 3 Title:</label>
						<input type="text" id="page_3_title" name="content[page3][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 3 Title" required />
						<p>
							<label class="tLabel" for="page_3_content">Page 3 Content:</label>
							<textarea rows="8" cols="50" id="page_3_content" name="content[page3][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 3 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<input type="hidden" name="username" value="<?=$username?>" />
						<input type="hidden" name="site_url" value="<?=$domain_name?>" />
						<input type="hidden" name="wireframe" value="<?=$wireframe?>" />
						<input type="hidden" name="language" value="<?=$language?>" />
						<div class="submitCon noBackground">
							<input id="prev4" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input class="submitButton btn-success btn-valid" type="Submit" name="Submit" />
						</div> 
				</div>
			
			</form>
	<?php } ?>
	
	<?php function wireframe6($wf_array, $domain_name, $username, $wireframe, $language){ 
	
		$tt = $wf_array['title_tag'];
		$md = $wf_array['meta_description'];	
		$cta = $wf_array['call_to_actions'];
		$pt = $wf_array['page_titles'];
		$pc = $wf_array['page_content'];
		$pn = $wf_array['navigation_page_names'];
		$ch = $wf_array['content_headings'];
		$cb = $wf_array['content_boxes'];
		$hpt = $wf_array['homepage_title'];
		$tc = $wf_array['top_content'];
		
	?>
		
			<form id="wireframeForm" class="panel taskform" autocomplete="off" >

				<div id="contentp1" >
				
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 1 <span class="sub-panel-title">- Meta & Title Information - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="author_nickname">Author Nickname:</label>
						<input type="text" id="author_nickname" name="author_nickname" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="Author Nickname" required />
						
						<label for="title_tag">Title Tag:</label>
						<input type="text" id="title_tag" name="title_tag" class="input-standard contentForm validation" data-min="<?=$tt['min']?>" data-max="<?=$tt['max']?>" placeholder="Title Tag" required />
						
						<label for="meta_description">Meta Description:</label>
						<input type="text" id="meta_description" name="meta_description" class="input-standard contentForm validation" data-min="<?=$md['min']?>" data-max="<?=$md['max']?>" placeholder="Meta Description" required />
						
						<div class="submitCon noBackground">
							<input id="next1" class="submitButton" value="Next" readonly />
						</div> 	
						
				</div>
				
				<div id="contentp2" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 2 <span class="sub-panel-title">- Navigation - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page">About Page:</label>
						<input type="text" id="about_page" name="content[about][nav]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page" required />
						
						<label for="Page_1">Page 1:</label>
						<input type="text" id="Page_1" name="content[page1][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 1" required />
						
						<label for="Page_2">Page 2:</label>
						<input type="text" id="Page_2" name="content[page2][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 2" required />
						
						<label for="Page_3">Page 3:</label>
						<input type="text" id="Page_3" name="content[page3][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 3" required />
						
						<div class="submitCon noBackground">
							<input id="prev2" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next2" class="submitButton" value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp3" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 3 <span class="sub-panel-title">- Home Page - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="slider_1">Slider Call to Action:</label>
						<input type="text" id="slider_1" name="content[page1][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 1" required />
						
						<label for="slider_2"></label>
						<input type="text" id="slider_2" name="content[page2][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 2" required />
						
						<label for="slider_3"></label>
						<input type="text" id="slider_3" name="content[page3][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 3" required />
						
						<label for="home_page_title">Home Page title:</label>
						<input type="text" id="home_page_title" name="content[homepage][content][homepage_title]" class="input-standard contentForm validation" data-min="<?=$hpt['min']?>" data-max="<?=$hpt['max']?>" placeholder="Home Page title" required />
						
						<p>
							<label class="tLabel" for="top_content_box">Content Box 1:</label>
							<textarea rows="8" cols="50" id="top_content_box" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$tc['min']?>" data-max="<?=$tc['max']?>" placeholder="Top Content Box" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<label for="content_heading_2">Content Heading 2:</label>
						<input type="text" id="content_heading_2" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 2" required />

						<p>
							<label class="tLabel" for="content_box_2">Content Box 2:</label>
							<textarea rows="8" cols="50" id="content_box_2" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 2" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<label for="content_heading_3">Content Heading 3:</label>
						<input type="text" id="content_heading_3" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 3" required />

						<p>
							<label class="tLabel" for="content_box_3">Content Box 3:</label>
							<textarea rows="8" cols="50" id="content_box_3" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 3" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<div class="submitCon noBackground">
							<input id="prev3" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next3" class="submitButton"  value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp4" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 4 <span class="sub-panel-title">- Content Pages - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page_title">About Page Title:</label>
						<input type="text" id="about_page_title" name="content[about][title]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page Title" required />
						<p>
							<label class="tLabel" for="about_page_content">About Page Content:</label>
							<textarea rows="8" cols="50" id="about_page_content" name="content[about][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="About Page Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_1_title">Page 1 Title:</label>
							<input type="text" id="page_1_title" name="content[page1][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 1 Title" required />
						<p>
							<label class="tLabel" for="page_1_content">Page 1 Content:</label>
							<textarea rows="8" cols="50" id="page_1_content" name="content[page1][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 1 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_2_title">Page 2 Title:</label>
							<input type="text" id="page_2_title" name="content[page2][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 2 Title" required />
						<p>
							<label class="tLabel" for="page_2_content">Page 2 Content:</label>
							<textarea rows="8" cols="50" id="page_2_content" name="content[page2][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 2 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<label for="page_3_title">Page 3 Title:</label>
						<input type="text" id="page_3_title" name="content[page3][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 3 Title" required />
						<p>
							<label class="tLabel" for="page_3_content">Page 3 Content:</label>
							<textarea rows="8" cols="50" id="page_3_content" name="content[page3][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 3 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<input type="hidden" name="username" value="<?=$username?>" />
						<input type="hidden" name="site_url" value="<?=$domain_name?>" />
						<input type="hidden" name="wireframe" value="<?=$wireframe?>" />
						<input type="hidden" name="language" value="<?=$language?>" />
						<div class="submitCon noBackground">
							<input id="prev4" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input class="submitButton btn-success btn-valid" type="Submit" name="Submit" />
						</div> 
				</div>
			
			</form>
	<?php } ?>

	<?php function wireframe7($wf_array, $domain_name, $username, $wireframe, $language){ 
	
		$tt = $wf_array['title_tag'];
		$st = $wf_array['site_tagline'];
		$md = $wf_array['meta_description'];	
		$pt = $wf_array['page_titles'];
		$pc = $wf_array['page_content'];
		$pn = $wf_array['navigation_page_names'];
		$ch = $wf_array['content_headings'];
		$cb = $wf_array['content_boxes'];
		$hpt = $wf_array['homepage_title'];
		
	?>
		
			<form id="wireframeForm" class="panel taskform" autocomplete="off" >

				<div id="contentp1" >
				
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 1 <span class="sub-panel-title">- Meta & Title Information - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="author_nickname">Author Nickname:</label>
						<input type="text" id="author_nickname" name="author_nickname" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="Author Nickname" required />
						
						<label for="title_tag">Title Tag:</label>
						<input type="text" id="title_tag" name="title_tag" class="input-standard contentForm validation" data-min="<?=$tt['min']?>" data-max="<?=$tt['max']?>" placeholder="Title Tag" required />

						<label for="title_tagline">Title Tagline:</label>
						<input type="text" id="title_tagline" name="tagline" class="input-standard contentForm validation" data-min="<?=$st['min']?>" data-max="<?=$st['max']?>" placeholder="Title Tagline" required />
						
						<label for="meta_description">Meta Description:</label>
						<input type="text" id="meta_description" name="meta_description" class="input-standard contentForm validation" data-min="<?=$md['min']?>" data-max="<?=$md['max']?>" placeholder="Meta Description" required />
						
						<div class="submitCon noBackground">
							<input id="next1" class="submitButton" value="Next" readonly />
						</div> 	
						
				</div>
				
				<div id="contentp2" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 2 <span class="sub-panel-title">- Navigation - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page">About Page:</label>
						<input type="text" id="about_page" name="content[about][nav]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page" required />
						
						<label for="Page_1">Page 1:</label>
						<input type="text" id="Page_1" name="content[page1][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 1" required />
						
						<label for="Page_2">Page 2:</label>
						<input type="text" id="Page_2" name="content[page2][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 2" required />
						
						<label for="Page_3">Page 3:</label>
						<input type="text" id="Page_3" name="content[page3][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 3" required />
						
						<div class="submitCon noBackground">
							<input id="prev2" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next2" class="submitButton" value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp3" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 3 <span class="sub-panel-title">- Home Page - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="home_page_title">Home Page title:</label>
						<input type="text" id="home_page_title" name="content[homepage][content][homepage_title]" class="input-standard contentForm validation" data-min="<?=$hpt['min']?>" data-max="<?=$hpt['max']?>" placeholder="Home Page title" required />
						
						<label for="content_heading_1">Content Heading 1:</label>
						<input type="text" id="content_heading_1" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 1" required />
						
						<p>
							<label class="tLabel" for="top_content_box">Content Box 1:</label>
							<textarea rows="8" cols="50" id="top_content_box" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Top Content Box" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="content_heading_2">Content Heading 2:</label>
							<input type="text" id="content_heading_2" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 2" required />
						<p>
							<label class="tLabel" for="content_box_2">Content Box 2:</label>
							<textarea rows="8" cols="50" id="content_box_2" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 2" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

							<label for="content_heading_3">Content Heading 3:</label>
							<input type="text" id="content_heading_3" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 3" required />
						<p>
							<label class="tLabel" for="content_box_3">Content Box 3:</label>
							<textarea rows="8" cols="50" id="content_box_3" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 3" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<div class="submitCon noBackground">
							<input id="prev3" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next3" class="submitButton"  value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp4" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 4 <span class="sub-panel-title">- Content Pages - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page_title">About Page Title:</label>
						<input type="text" id="about_page_title" name="content[about][title]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page Title" required />
						<p>
							<label class="tLabel" for="about_page_content">About Page Content:</label>
							<textarea rows="8" cols="50" id="about_page_content" name="content[about][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="About Page Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_1_title">Page 1 Title:</label>
							<input type="text" id="page_1_title" name="content[page1][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 1 Title" required />
						<p>
							<label class="tLabel" for="page_1_content">Page 1 Content:</label>
							<textarea rows="8" cols="50" id="page_1_content" name="content[page1][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 1 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_2_title">Page 2 Title:</label>
							<input type="text" id="page_2_title" name="content[page2][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 2 Title" required />
						<p>
							<label class="tLabel" for="page_2_content">Page 2 Content:</label>
							<textarea rows="8" cols="50" id="page_2_content" name="content[page2][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 2 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<label for="page_3_title">Page 3 Title:</label>
						<input type="text" id="page_3_title" name="content[page3][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 3 Title" required />
						<p>
							<label class="tLabel" for="page_3_content">Page 3 Content:</label>
							<textarea rows="8" cols="50" id="page_3_content" name="content[page3][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 3 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<input type="hidden" name="username" value="<?=$username?>" />
						<input type="hidden" name="site_url" value="<?=$domain_name?>" />
						<input type="hidden" name="wireframe" value="<?=$wireframe?>" />
						<input type="hidden" name="language" value="<?=$language?>" />
						<div class="submitCon noBackground">
							<input id="prev4" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input class="submitButton btn-success btn-valid" type="Submit" name="Submit" />
						</div> 
				</div>
			
			</form>
	<?php } ?>

	<?php function wireframe8($wf_array, $domain_name, $username, $wireframe, $language){ 
	
		$tt = $wf_array['title_tag'];
		$md = $wf_array['meta_description'];	
		$pt = $wf_array['page_titles'];
		$cta = $wf_array['call_to_actions'];
		$pc = $wf_array['page_content'];
		$pn = $wf_array['navigation_page_names'];
		$ch = $wf_array['content_headings'];
		$cb = $wf_array['content_boxes'];
		$hpt = $wf_array['homepage_title'];
		
	?>
		
			<form id="wireframeForm" class="panel taskform" autocomplete="off" >

				<div id="contentp1" >
				
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 1 <span class="sub-panel-title">- Meta & Title Information - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="author_nickname">Author Nickname:</label>
						<input type="text" id="author_nickname" name="author_nickname" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="Author Nickname" required />
						
						<label for="title_tag">Title Tag:</label>
						<input type="text" id="title_tag" name="title_tag" class="input-standard contentForm validation" data-min="<?=$tt['min']?>" data-max="<?=$tt['max']?>" placeholder="Title Tag" required />

			
						<label for="meta_description">Meta Description:</label>
						<input type="text" id="meta_description" name="meta_description" class="input-standard contentForm validation" data-min="<?=$md['min']?>" data-max="<?=$md['max']?>" placeholder="Meta Description" required />
						
						<div class="submitCon noBackground">
							<input id="next1" class="submitButton" value="Next" readonly />
						</div> 	
						
				</div>
				
				<div id="contentp2" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 2 <span class="sub-panel-title">- Navigation - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page">About Page:</label>
						<input type="text" id="about_page" name="content[about][nav]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page" required />
						
						<label for="Page_1">Page 1:</label>
						<input type="text" id="Page_1" name="content[page1][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 1" required />
						
						<label for="Page_2">Page 2:</label>
						<input type="text" id="Page_2" name="content[page2][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 2" required />
						
						<label for="Page_3">Page 3:</label>
						<input type="text" id="Page_3" name="content[page3][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 3" required />
						
						<div class="submitCon noBackground">
							<input id="prev2" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next2" class="submitButton" value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp3" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 3 <span class="sub-panel-title">- Home Page - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>

						<label for="slider_1">Slider Call to Action:</label>
						<input type="text" id="slider_1" name="content[page1][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 1" required />
						
						<label for="slider_2"></label>
						<input type="text" id="slider_2" name="content[page2][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 2" required />
						
						<label for="slider_3"></label>
						<input type="text" id="slider_3" name="content[page3][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 3" required />
					
						<label for="home_page_title">Home Page title:</label>
						<input type="text" id="home_page_title" name="content[homepage][content][homepage_title]" class="input-standard contentForm validation" data-min="<?=$hpt['min']?>" data-max="<?=$hpt['max']?>" placeholder="Home Page title" required />
						
						<label for="content_heading_1">Content Heading 1:</label>
						<input type="text" id="content_heading_1" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 1" required />
						
						<p>
							<label class="tLabel" for="top_content_box">Content Box 1:</label>
							<textarea rows="8" cols="50" id="top_content_box" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Top Content Box" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="content_heading_2">Content Heading 2:</label>
							<input type="text" id="content_heading_2" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 2" required />
						<p>
							<label class="tLabel" for="content_box_2">Content Box 2:</label>
							<textarea rows="8" cols="50" id="content_box_2" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 2" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

							<label for="content_heading_3">Content Heading 3:</label>
							<input type="text" id="content_heading_3" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 3" required />
						<p>
							<label class="tLabel" for="content_box_3">Content Box 3:</label>
							<textarea rows="8" cols="50" id="content_box_3" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 3" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

							<label for="content_heading_4">Content Heading 4:</label>
							<input type="text" id="content_heading_4" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 4" required />
						<p>
							<label class="tLabel" for="content_box_4">Content Box 4:</label>
							<textarea rows="8" cols="50" id="content_box_4" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 4" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<div class="submitCon noBackground">
							<input id="prev3" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next3" class="submitButton"  value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp4" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 4 <span class="sub-panel-title">- Content Pages - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page_title">About Page Title:</label>
						<input type="text" id="about_page_title" name="content[about][title]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page Title" required />
						<p>
							<label class="tLabel" for="about_page_content">About Page Content:</label>
							<textarea rows="8" cols="50" id="about_page_content" name="content[about][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="About Page Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_1_title">Page 1 Title:</label>
							<input type="text" id="page_1_title" name="content[page1][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 1 Title" required />
						<p>
							<label class="tLabel" for="page_1_content">Page 1 Content:</label>
							<textarea rows="8" cols="50" id="page_1_content" name="content[page1][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 1 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_2_title">Page 2 Title:</label>
							<input type="text" id="page_2_title" name="content[page2][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 2 Title" required />
						<p>
							<label class="tLabel" for="page_2_content">Page 2 Content:</label>
							<textarea rows="8" cols="50" id="page_2_content" name="content[page2][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 2 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<label for="page_3_title">Page 3 Title:</label>
						<input type="text" id="page_3_title" name="content[page3][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 3 Title" required />
						<p>
							<label class="tLabel" for="page_3_content">Page 3 Content:</label>
							<textarea rows="8" cols="50" id="page_3_content" name="content[page3][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 3 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<input type="hidden" name="username" value="<?=$username?>" />
						<input type="hidden" name="site_url" value="<?=$domain_name?>" />
						<input type="hidden" name="wireframe" value="<?=$wireframe?>" />
						<input type="hidden" name="language" value="<?=$language?>" />
						<div class="submitCon noBackground">
							<input id="prev4" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input class="submitButton btn-success btn-valid" type="Submit" name="Submit" />
						</div> 
				</div>
			
			</form>
	<?php } ?>

	<?php function wireframe9($wf_array, $domain_name, $username, $wireframe, $language){ 
	
		$tt = $wf_array['title_tag'];
		$md = $wf_array['meta_description'];	
		$pt = $wf_array['page_titles'];
		$cta = $wf_array['call_to_actions'];
		$pc = $wf_array['page_content'];
		$pn = $wf_array['navigation_page_names'];
		$ch = $wf_array['content_headings'];
		$cb = $wf_array['content_boxes'];
		$hpt = $wf_array['homepage_title'];
		
	?>
		

			<form id="wireframeForm" class="panel taskform" autocomplete="off" >
				<div id="contentp1" >
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 1 <span class="sub-panel-title">- Meta & Title Information - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="author_nickname">Author Nickname:</label>
						<input type="text" id="author_nickname" name="author_nickname" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="Author Nickname" required />
						
						<label for="title_tag">Title Tag:</label>
						<input type="text" id="title_tag" name="title_tag" class="input-standard contentForm validation" data-min="<?=$tt['min']?>" data-max="<?=$tt['max']?>" placeholder="Title Tag" required />

						<label for="meta_description">Meta Description:</label>
						<input type="text" id="meta_description" name="meta_description" class="input-standard contentForm validation" data-min="<?=$md['min']?>" data-max="<?=$md['max']?>" placeholder="Meta Description" required />
						
						<div class="submitCon noBackground">
							<input id="next1" class="submitButton" value="Next" readonly />
						</div> 	
						
				</div>
				
				<div id="contentp2" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 2 <span class="sub-panel-title">- Navigation - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page">About Page:</label>
						<input type="text" id="about_page" name="content[about][nav]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page" required />
						
						<label for="Page_1">Page 1:</label>
						<input type="text" id="Page_1" name="content[page1][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 1" required />
						
						<label for="Page_2">Page 2:</label>
						<input type="text" id="Page_2" name="content[page2][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 2" required />
						
						<label for="Page_3">Page 3:</label>
						<input type="text" id="Page_3" name="content[page3][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 3" required />
						
						<div class="submitCon noBackground">
							<input id="prev2" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next2" class="submitButton" value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp3" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 3 <span class="sub-panel-title">- Home Page - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>

						<label for="slider_1">Slider Call to Action:</label>
						<input type="text" id="slider_1" name="content[page1][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 1" required />
						
						<label for="slider_2"></label>
						<input type="text" id="slider_2" name="content[page2][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 2" required />
						
						<label for="slider_3"></label>
						<input type="text" id="slider_3" name="content[page3][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 3" required />
					
						<label for="home_page_title">Home Page title:</label>
						<input type="text" id="home_page_title" name="content[homepage][content][homepage_title]" class="input-standard contentForm validation" data-min="<?=$hpt['min']?>" data-max="<?=$hpt['max']?>" placeholder="Home Page title" required />
						
						<label for="content_heading_1">Content Heading 1:</label>
						<input type="text" id="content_heading_1" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 1" required />
						
						<p>
							<label class="tLabel" for="top_content_box">Content Box 1:</label>
							<textarea rows="8" cols="50" id="top_content_box" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Top Content Box" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="content_heading_2">Content Heading 2:</label>
							<input type="text" id="content_heading_2" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 2" required />
						<p>
							<label class="tLabel" for="content_box_2">Content Box 2:</label>
							<textarea rows="8" cols="50" id="content_box_2" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 2" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

							<label for="content_heading_3">Content Heading 3:</label>
							<input type="text" id="content_heading_3" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 3" required />
						<p>
							<label class="tLabel" for="content_box_3">Content Box 3:</label>
							<textarea rows="8" cols="50" id="content_box_3" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 3" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<div class="submitCon noBackground">
							<input id="prev3" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next3" class="submitButton"  value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp4" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 4 <span class="sub-panel-title">- Content Pages - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page_title">About Page Title:</label>
						<input type="text" id="about_page_title" name="content[about][title]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page Title" required />
						<p>
							<label class="tLabel" for="about_page_content">About Page Content:</label>
							<textarea rows="8" cols="50" id="about_page_content" name="content[about][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="About Page Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_1_title">Page 1 Title:</label>
							<input type="text" id="page_1_title" name="content[page1][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 1 Title" required />
						<p>
							<label class="tLabel" for="page_1_content">Page 1 Content:</label>
							<textarea rows="8" cols="50" id="page_1_content" name="content[page1][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 1 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_2_title">Page 2 Title:</label>
							<input type="text" id="page_2_title" name="content[page2][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 2 Title" required />
						<p>
							<label class="tLabel" for="page_2_content">Page 2 Content:</label>
							<textarea rows="8" cols="50" id="page_2_content" name="content[page2][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 2 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<label for="page_3_title">Page 3 Title:</label>
						<input type="text" id="page_3_title" name="content[page3][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 3 Title" required />
						<p>
							<label class="tLabel" for="page_3_content">Page 3 Content:</label>
							<textarea rows="8" cols="50" id="page_3_content" name="content[page3][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 3 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<input type="hidden" name="username" value="<?=$username?>" />
						<input type="hidden" name="site_url" value="<?=$domain_name?>" />
						<input type="hidden" name="wireframe" value="<?=$wireframe?>" />
						<input type="hidden" name="language" value="<?=$language?>" />
						<div class="submitCon noBackground">
							<input id="prev4" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input class="submitButton btn-success btn-valid" type="Submit" name="Submit" />
						</div>

				</div>
			
			</form>
	<?php } ?>

	<?php function wireframe10($wf_array, $domain_name, $username, $wireframe, $language){ 
	
		$tt = $wf_array['title_tag'];
		$md = $wf_array['meta_description'];	
		$pt = $wf_array['page_titles'];
		$cta = $wf_array['call_to_actions'];
		$pc = $wf_array['page_content'];
		$pn = $wf_array['navigation_page_names'];
		$ch = $wf_array['content_headings'];
		$cb = $wf_array['content_boxes'];
		$hpt = $wf_array['homepage_title'];
		
	?>
		
			<form id="wireframeForm" class="panel taskform" autocomplete="off" >
				<div id="contentp1" >
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 1 <span class="sub-panel-title">- Meta & Title Information - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="author_nickname">Author Nickname:</label>
						<input type="text" id="author_nickname" name="author_nickname" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="Author Nickname" required />
						
						<label for="title_tag">Title Tag:</label>
						<input type="text" id="title_tag" name="title_tag" class="input-standard contentForm validation" data-min="<?=$tt['min']?>" data-max="<?=$tt['max']?>" placeholder="Title Tag" required />

						<label for="meta_description">Meta Description:</label>
						<input type="text" id="meta_description" name="meta_description" class="input-standard contentForm validation" data-min="<?=$md['min']?>" data-max="<?=$md['max']?>" placeholder="Meta Description" required />
						
						<div class="submitCon noBackground">
							<input id="next1" class="submitButton" value="Next" readonly />
						</div> 	
						
				</div>
				
				<div id="contentp2" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 2 <span class="sub-panel-title">- Navigation - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page">About Page:</label>
						<input type="text" id="about_page" name="content[about][nav]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page" required />
						
						<label for="Page_1">Page 1:</label>
						<input type="text" id="Page_1" name="content[page1][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 1" required />
						
						<label for="Page_2">Page 2:</label>
						<input type="text" id="Page_2" name="content[page2][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 2" required />
						
						<label for="Page_3">Page 3:</label>
						<input type="text" id="Page_3" name="content[page3][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 3" required />
						
						<div class="submitCon noBackground">
							<input id="prev2" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next2" class="submitButton" value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp3" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 3 <span class="sub-panel-title">- Home Page - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>

						<label for="slider_1">Slider Call to Action:</label>
						<input type="text" id="slider_1" name="content[page1][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 1" required />
						
						<label for="slider_2"></label>
						<input type="text" id="slider_2" name="content[page2][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 2" required />
						
						<label for="slider_3"></label>
						<input type="text" id="slider_3" name="content[page3][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 3" required />
					
						<label for="home_page_title">Home Page title:</label>
						<input type="text" id="home_page_title" name="content[homepage][content][homepage_title]" class="input-standard contentForm validation" data-min="<?=$hpt['min']?>" data-max="<?=$hpt['max']?>" placeholder="Home Page title" required />
						
						<label for="content_heading_1">Content Heading 1:</label>
						<input type="text" id="content_heading_1" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 1" required />
						
						<p>
							<label class="tLabel" for="top_content_box">Content Box 1:</label>
							<textarea rows="8" cols="50" id="top_content_box" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Top Content Box" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="content_heading_2">Content Heading 2:</label>
							<input type="text" id="content_heading_2" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 2" required />
						<p>
							<label class="tLabel" for="content_box_2">Content Box 2:</label>
							<textarea rows="8" cols="50" id="content_box_2" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 2" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<p>
							<label class="tLabel" for="content_box_3">Content Box 3:</label>
							<textarea rows="8" cols="50" id="content_box_3" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 3" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<div class="submitCon noBackground">
							<input id="prev3" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next3" class="submitButton"  value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp4" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 4 <span class="sub-panel-title">- Content Pages - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page_title">About Page Title:</label>
						<input type="text" id="about_page_title" name="content[about][title]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page Title" required />
						<p>
							<label class="tLabel" for="about_page_content">About Page Content:</label>
							<textarea rows="8" cols="50" id="about_page_content" name="content[about][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="About Page Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_1_title">Page 1 Title:</label>
							<input type="text" id="page_1_title" name="content[page1][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 1 Title" required />
						<p>
							<label class="tLabel" for="page_1_content">Page 1 Content:</label>
							<textarea rows="8" cols="50" id="page_1_content" name="content[page1][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 1 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_2_title">Page 2 Title:</label>
							<input type="text" id="page_2_title" name="content[page2][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 2 Title" required />
						<p>
							<label class="tLabel" for="page_2_content">Page 2 Content:</label>
							<textarea rows="8" cols="50" id="page_2_content" name="content[page2][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 2 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<label for="page_3_title">Page 3 Title:</label>
						<input type="text" id="page_3_title" name="content[page3][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 3 Title" required />
						<p>
							<label class="tLabel" for="page_3_content">Page 3 Content:</label>
							<textarea rows="8" cols="50" id="page_3_content" name="content[page3][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 3 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<input type="hidden" name="username" value="<?=$username?>" />
						<input type="hidden" name="site_url" value="<?=$domain_name?>" />
						<input type="hidden" name="wireframe" value="<?=$wireframe?>" />
						<input type="hidden" name="language" value="<?=$language?>" />
						<div class="submitCon noBackground">
							<input id="prev4" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input class="submitButton btn-success btn-valid" type="Submit" name="Submit" />
						</div>

				</div>
			
			</form>
	<?php } ?>
	
	<?php function wireframe11($wf_array, $domain_name, $username, $wireframe, $language){ 
	
		$tt = $wf_array['title_tag'];
		$md = $wf_array['meta_description'];	
		$pt = $wf_array['page_titles'];
		$cta = $wf_array['call_to_actions'];
		$pc = $wf_array['page_content'];
		$pn = $wf_array['navigation_page_names'];
		$ch = $wf_array['content_headings'];
		$cb = $wf_array['content_boxes'];
		$hpt = $wf_array['homepage_title'];
		$tc = $wf_array['top_content'];
		$tch = $wf_array['top_content_heading'];
	?>
		
			<form id="wireframeForm" class="panel taskform" autocomplete="off" >
				<div id="contentp1" >
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 1 <span class="sub-panel-title">- Meta & Title Information - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="author_nickname">Author Nickname:</label>
						<input type="text" id="author_nickname" name="author_nickname" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="Author Nickname" required />
						
						<label for="title_tag">Title Tag:</label>
						<input type="text" id="title_tag" name="title_tag" class="input-standard contentForm validation" data-min="<?=$tt['min']?>" data-max="<?=$tt['max']?>" placeholder="Title Tag" required />

						<label for="meta_description">Meta Description:</label>
						<input type="text" id="meta_description" name="meta_description" class="input-standard contentForm validation" data-min="<?=$md['min']?>" data-max="<?=$md['max']?>" placeholder="Meta Description" required />
						
						<div class="submitCon noBackground">
							<input id="next1" class="submitButton" value="Next" readonly />
						</div> 	
						
				</div>
				
				<div id="contentp2" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 2 <span class="sub-panel-title">- Navigation - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page">About Page:</label>
						<input type="text" id="about_page" name="content[about][nav]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page" required />
						
						<label for="Page_1">Page 1:</label>
						<input type="text" id="Page_1" name="content[page1][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 1" required />
						
						<label for="Page_2">Page 2:</label>
						<input type="text" id="Page_2" name="content[page2][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 2" required />
						
						<label for="Page_3">Page 3:</label>
						<input type="text" id="Page_3" name="content[page3][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 3" required />
						
						<div class="submitCon noBackground">
							<input id="prev2" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next2" class="submitButton" value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp3" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 3 <span class="sub-panel-title">- Home Page - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>

						<label for="slider_1">Slider Call to Action:</label>
						<input type="text" id="slider_1" name="content[page1][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 1" required />
						
						<label for="slider_2"></label>
						<input type="text" id="slider_2" name="content[page2][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 2" required />
						
						<label for="slider_3"></label>
						<input type="text" id="slider_3" name="content[page3][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 3" required />
					
						<label for="home_page_title">Home Page title:</label>
						<input type="text" id="home_page_title" name="content[homepage][content][homepage_title]" class="input-standard contentForm validation" data-min="<?=$hpt['min']?>" data-max="<?=$hpt['max']?>" placeholder="Home Page title" required />
						
						<label for="content_heading_1">Content Heading 1:</label>
						<input type="text" id="content_heading_1" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$tch['min']?>" data-max="<?=$tch['max']?>" placeholder="Content Heading 1" required />
						
						<p>
							<label class="tLabel" for="top_content_box">Content Box 1:</label>
							<textarea rows="8" cols="50" id="top_content_box" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$tc['min']?>" data-max="<?=$tc['max']?>" placeholder="Top Content Box" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="content_heading_2">Content Heading 2:</label>
							<input type="text" id="content_heading_2" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 2" required />
						<p>
							<label class="tLabel" for="content_box_2">Content Box 2:</label>
							<textarea rows="8" cols="50" id="content_box_2" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 2" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

							<label for="content_heading_3">Content Heading 3:</label>
							<input type="text" id="content_heading_3" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 3" required />
						<p>
							<label class="tLabel" for="content_box_3">Content Box 3:</label>
							<textarea rows="8" cols="50" id="content_box_3" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 3" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

							<label for="content_heading_4">Content Heading 4:</label>
							<input type="text" id="content_heading_4" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 4" required />
						<p>
							<label class="tLabel" for="content_box_4">Content Box 4:</label>
							<textarea rows="8" cols="50" id="content_box_4" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 4" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

							<label for="content_heading_5">Content Heading 5:</label>
							<input type="text" id="content_heading_5" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 5" required />
						<p>
							<label class="tLabel" for="content_box_5">Content Box 5:</label>
							<textarea rows="8" cols="50" id="content_box_5" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 5" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<div class="submitCon noBackground">
							<input id="prev3" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next3" class="submitButton"  value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp4" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 4 <span class="sub-panel-title">- Content Pages - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page_title">About Page Title:</label>
						<input type="text" id="about_page_title" name="content[about][title]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page Title" required />
						<p>
							<label class="tLabel" for="about_page_content">About Page Content:</label>
							<textarea rows="8" cols="50" id="about_page_content" name="content[about][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="About Page Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_1_title">Page 1 Title:</label>
							<input type="text" id="page_1_title" name="content[page1][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 1 Title" required />
						<p>
							<label class="tLabel" for="page_1_content">Page 1 Content:</label>
							<textarea rows="8" cols="50" id="page_1_content" name="content[page1][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 1 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_2_title">Page 2 Title:</label>
							<input type="text" id="page_2_title" name="content[page2][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 2 Title" required />
						<p>
							<label class="tLabel" for="page_2_content">Page 2 Content:</label>
							<textarea rows="8" cols="50" id="page_2_content" name="content[page2][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 2 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<label for="page_3_title">Page 3 Title:</label>
						<input type="text" id="page_3_title" name="content[page3][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 3 Title" required />
						<p>
							<label class="tLabel" for="page_3_content">Page 3 Content:</label>
							<textarea rows="8" cols="50" id="page_3_content" name="content[page3][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 3 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<input type="hidden" name="username" value="<?=$username?>" />
						<input type="hidden" name="site_url" value="<?=$domain_name?>" />
						<input type="hidden" name="wireframe" value="<?=$wireframe?>" />
						<input type="hidden" name="language" value="<?=$language?>" />
						<div class="submitCon noBackground">
							<input id="prev4" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input class="submitButton btn-success btn-valid" type="Submit" name="Submit" />
						</div>

				</div>
			
			</form>
	<?php } ?>

	<?php function wireframe12($wf_array, $domain_name, $username, $wireframe, $language){ 
	
		$tt = $wf_array['title_tag'];
		$md = $wf_array['meta_description'];	
		$pt = $wf_array['page_titles'];
		$cta = $wf_array['call_to_actions'];
		$pc = $wf_array['page_content'];
		$pn = $wf_array['navigation_page_names'];
		$cb = $wf_array['content_boxes'];
		$hpt = $wf_array['homepage_title'];
		$tc = $wf_array['top_content'];
		
	?>
		
			<form id="wireframeForm" class="panel taskform" autocomplete="off" >
				<div id="contentp1" >
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 1 <span class="sub-panel-title">- Meta & Title Information - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="author_nickname">Author Nickname:</label>
						<input type="text" id="author_nickname" name="author_nickname" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="Author Nickname" required />
						
						<label for="title_tag">Title Tag:</label>
						<input type="text" id="title_tag" name="title_tag" class="input-standard contentForm validation" data-min="<?=$tt['min']?>" data-max="<?=$tt['max']?>" placeholder="Title Tag" required />

						<label for="meta_description">Meta Description:</label>
						<input type="text" id="meta_description" name="meta_description" class="input-standard contentForm validation" data-min="<?=$md['min']?>" data-max="<?=$md['max']?>" placeholder="Meta Description" required />
						
						<div class="submitCon noBackground">
							<input id="next1" class="submitButton" value="Next" readonly />
						</div> 	
						
				</div>
				
				<div id="contentp2" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 2 <span class="sub-panel-title">- Navigation - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page">About Page:</label>
						<input type="text" id="about_page" name="content[about][nav]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page" required />
						
						<label for="Page_1">Page 1:</label>
						<input type="text" id="Page_1" name="content[page1][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 1" required />
						
						<label for="Page_2">Page 2:</label>
						<input type="text" id="Page_2" name="content[page2][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 2" required />
						
						<label for="Page_3">Page 3:</label>
						<input type="text" id="Page_3" name="content[page3][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 3" required />
						
						<div class="submitCon noBackground">
							<input id="prev2" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next2" class="submitButton" value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp3" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 3 <span class="sub-panel-title">- Home Page - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>

						<label for="slider_1">Slider Call to Action:</label>
						<input type="text" id="slider_1" name="content[page1][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 1" required />
						
						<label for="slider_2"></label>
						<input type="text" id="slider_2" name="content[page2][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 2" required />
						
						<label for="slider_3"></label>
						<input type="text" id="slider_3" name="content[page3][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 3" required />
					
						<label for="home_page_title">Home Page title:</label>
						<input type="text" id="home_page_title" name="content[homepage][content][homepage_title]" class="input-standard contentForm validation" data-min="<?=$hpt['min']?>" data-max="<?=$hpt['max']?>" placeholder="Home Page title" required />
						
						<p>
							<label class="tLabel" for="top_content_box">Content Box 1:</label>
							<textarea rows="8" cols="50" id="top_content_box" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$tc['min']?>" data-max="<?=$tc['max']?>" placeholder="Top Content Box" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<p>
							<label class="tLabel" for="content_box_2">Content Box 2:</label>
							<textarea rows="8" cols="50" id="content_box_2" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 2" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<p>
							<label class="tLabel" for="content_box_3">Content Box 3:</label>
							<textarea rows="8" cols="50" id="content_box_3" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 3" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<p>
							<label class="tLabel" for="content_box_4">Content Box 4:</label>
							<textarea rows="8" cols="50" id="content_box_4" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 4" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<div class="submitCon noBackground">
							<input id="prev3" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next3" class="submitButton"  value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp4" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 4 <span class="sub-panel-title">- Content Pages - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page_title">About Page Title:</label>
						<input type="text" id="about_page_title" name="content[about][title]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page Title" required />
						<p>
							<label class="tLabel" for="about_page_content">About Page Content:</label>
							<textarea rows="8" cols="50" id="about_page_content" name="content[about][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="About Page Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_1_title">Page 1 Title:</label>
							<input type="text" id="page_1_title" name="content[page1][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 1 Title" required />
						<p>
							<label class="tLabel" for="page_1_content">Page 1 Content:</label>
							<textarea rows="8" cols="50" id="page_1_content" name="content[page1][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 1 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_2_title">Page 2 Title:</label>
							<input type="text" id="page_2_title" name="content[page2][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 2 Title" required />
						<p>
							<label class="tLabel" for="page_2_content">Page 2 Content:</label>
							<textarea rows="8" cols="50" id="page_2_content" name="content[page2][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 2 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<label for="page_3_title">Page 3 Title:</label>
						<input type="text" id="page_3_title" name="content[page3][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 3 Title" required />
						<p>
							<label class="tLabel" for="page_3_content">Page 3 Content:</label>
							<textarea rows="8" cols="50" id="page_3_content" name="content[page3][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 3 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<input type="hidden" name="username" value="<?=$username?>" />
						<input type="hidden" name="site_url" value="<?=$domain_name?>" />
						<input type="hidden" name="wireframe" value="<?=$wireframe?>" />
						<input type="hidden" name="language" value="<?=$language?>" />
						<div class="submitCon noBackground">
							<input id="prev4" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input class="submitButton btn-success btn-valid" type="Submit" name="Submit" />
						</div>

				</div>
			
			</form>
	<?php } ?>

	<?php function wireframe13($wf_array, $domain_name, $username, $wireframe, $language){ 
	
		$tt = $wf_array['title_tag'];
		$md = $wf_array['meta_description'];	
		$pt = $wf_array['page_titles'];
		$pc = $wf_array['page_content'];
		$pn = $wf_array['navigation_page_names'];
		$cb = $wf_array['content_boxes'];
		$ch = $wf_array['content_headings'];
		$hpt = $wf_array['homepage_title'];
		
	?>
		
			<form id="wireframeForm" class="panel taskform" autocomplete="off" >
				<div id="contentp1" >
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 1 <span class="sub-panel-title">- Meta & Title Information - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="author_nickname">Author Nickname:</label>
						<input type="text" id="author_nickname" name="author_nickname" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="Author Nickname" required />
						
						<label for="title_tag">Title Tag:</label>
						<input type="text" id="title_tag" name="title_tag" class="input-standard contentForm validation" data-min="<?=$tt['min']?>" data-max="<?=$tt['max']?>" placeholder="Title Tag" required />

						<label for="meta_description">Meta Description:</label>
						<input type="text" id="meta_description" name="meta_description" class="input-standard contentForm validation" data-min="<?=$md['min']?>" data-max="<?=$md['max']?>" placeholder="Meta Description" required />
						
						<div class="submitCon noBackground">
							<input id="next1" class="submitButton" value="Next" readonly />
						</div> 	
						
				</div>
				
				<div id="contentp2" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 2 <span class="sub-panel-title">- Navigation - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page">About Page:</label>
						<input type="text" id="about_page" name="content[about][nav]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page" required />
						
						<label for="Page_1">Page 1:</label>
						<input type="text" id="Page_1" name="content[page1][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 1" required />
						
						<label for="Page_2">Page 2:</label>
						<input type="text" id="Page_2" name="content[page2][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 2" required />
						
						<label for="Page_3">Page 3:</label>
						<input type="text" id="Page_3" name="content[page3][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 3" required />
						
						<div class="submitCon noBackground">
							<input id="prev2" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next2" class="submitButton" value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp3" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 3 <span class="sub-panel-title">- Home Page - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="home_page_title">Home Page title:</label>
						<input type="text" id="home_page_title" name="content[homepage][content][homepage_title]" class="input-standard contentForm validation" data-min="<?=$hpt['min']?>" data-max="<?=$hpt['max']?>" placeholder="Home Page title" required />
						
						<label for="content_heading_1">Content Heading 1:</label>
						<input type="text" id="content_heading_1" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 1" required />

						<p>
							<label class="tLabel" for="top_content_box">Content Box 1:</label>
							<textarea rows="8" cols="50" id="top_content_box" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Top Content Box" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<label for="content_heading_2">Content Heading 2:</label>
						<input type="text" id="content_heading_2" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 2" required />

						<p>
							<label class="tLabel" for="content_box_2">Content Box 2:</label>
							<textarea rows="8" cols="50" id="content_box_2" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 2" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<label for="content_heading_3">Content Heading 3:</label>
						<input type="text" id="content_heading_3" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 3" required />

						<p>
							<label class="tLabel" for="content_box_3">Content Box 3:</label>
							<textarea rows="8" cols="50" id="content_box_3" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 3" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<label for="content_heading_4">Content Heading 4:</label>
						<input type="text" id="content_heading_4" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 4" required />

						<p>
							<label class="tLabel" for="content_box_4">Content Box 4:</label>
							<textarea rows="8" cols="50" id="content_box_4" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 4" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<div class="submitCon noBackground">
							<input id="prev3" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next3" class="submitButton"  value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp4" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 4 <span class="sub-panel-title">- Content Pages - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page_title">About Page Title:</label>
						<input type="text" id="about_page_title" name="content[about][title]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page Title" required />
						<p>
							<label class="tLabel" for="about_page_content">About Page Content:</label>
							<textarea rows="8" cols="50" id="about_page_content" name="content[about][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="About Page Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_1_title">Page 1 Title:</label>
							<input type="text" id="page_1_title" name="content[page1][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 1 Title" required />
						<p>
							<label class="tLabel" for="page_1_content">Page 1 Content:</label>
							<textarea rows="8" cols="50" id="page_1_content" name="content[page1][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 1 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_2_title">Page 2 Title:</label>
							<input type="text" id="page_2_title" name="content[page2][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 2 Title" required />
						<p>
							<label class="tLabel" for="page_2_content">Page 2 Content:</label>
							<textarea rows="8" cols="50" id="page_2_content" name="content[page2][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 2 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<label for="page_3_title">Page 3 Title:</label>
						<input type="text" id="page_3_title" name="content[page3][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 3 Title" required />
						<p>
							<label class="tLabel" for="page_3_content">Page 3 Content:</label>
							<textarea rows="8" cols="50" id="page_3_content" name="content[page3][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 3 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<input type="hidden" name="username" value="<?=$username?>" />
						<input type="hidden" name="site_url" value="<?=$domain_name?>" />
						<input type="hidden" name="wireframe" value="<?=$wireframe?>" />
						<input type="hidden" name="language" value="<?=$language?>" />
						<div class="submitCon noBackground">
							<input id="prev4" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input class="submitButton btn-success btn-valid" type="Submit" name="Submit" />
						</div>

				</div>
			
			</form>
	<?php } ?>

	<?php function wireframe14($wf_array, $domain_name, $username, $wireframe, $language){ 
	
		$tt = $wf_array['title_tag'];
		$md = $wf_array['meta_description'];	
		$pt = $wf_array['page_titles'];
		$pc = $wf_array['page_content'];
		$pn = $wf_array['navigation_page_names'];
		$cb = $wf_array['content_boxes'];
		$ch = $wf_array['content_headings'];
		$hpt = $wf_array['homepage_title'];
		$cta = $wf_array['call_to_actions'];
		
	?>
		
			<form id="wireframeForm" class="panel taskform" autocomplete="off" >
				<div id="contentp1" >
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 1 <span class="sub-panel-title">- Meta & Title Information - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="author_nickname">Author Nickname:</label>
						<input type="text" id="author_nickname" name="author_nickname" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="Author Nickname" required />
						
						<label for="title_tag">Title Tag:</label>
						<input type="text" id="title_tag" name="title_tag" class="input-standard contentForm validation" data-min="<?=$tt['min']?>" data-max="<?=$tt['max']?>" placeholder="Title Tag" required />

						<label for="meta_description">Meta Description:</label>
						<input type="text" id="meta_description" name="meta_description" class="input-standard contentForm validation" data-min="<?=$md['min']?>" data-max="<?=$md['max']?>" placeholder="Meta Description" required />
						
						<div class="submitCon noBackground">
							<input id="next1" class="submitButton" value="Next" readonly />
						</div> 	
						
				</div>
				
				<div id="contentp2" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 2 <span class="sub-panel-title">- Navigation - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page">About Page:</label>
						<input type="text" id="about_page" name="content[about][nav]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page" required />
						
						<label for="Page_1">Page 1:</label>
						<input type="text" id="Page_1" name="content[page1][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 1" required />
						
						<label for="Page_2">Page 2:</label>
						<input type="text" id="Page_2" name="content[page2][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 2" required />
						
						<label for="Page_3">Page 3:</label>
						<input type="text" id="Page_3" name="content[page3][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 3" required />
						
						<div class="submitCon noBackground">
							<input id="prev2" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next2" class="submitButton" value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp3" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 3 <span class="sub-panel-title">- Home Page - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
						<label for="slider_1">Slider Call to Action:</label>
						<input type="text" id="slider_1" name="content[page1][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 1" required />
						
						<label for="slider_2"></label>
						<input type="text" id="slider_2" name="content[page2][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 2" required />
						
						<label for="slider_3"></label>
						<input type="text" id="slider_3" name="content[page3][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 3" required />
					
						<label for="home_page_title">Home Page title:</label>
						<input type="text" id="home_page_title" name="content[homepage][content][homepage_title]" class="input-standard contentForm validation" data-min="<?=$hpt['min']?>" data-max="<?=$hpt['max']?>" placeholder="Home Page title" required />
						
						<label for="content_heading_1">Content Heading 1:</label>
						<input type="text" id="content_heading_1" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 1" required />

						<p>
							<label class="tLabel" for="top_content_box">Content Box 1:</label>
							<textarea rows="8" cols="50" id="top_content_box" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Top Content Box" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<label for="content_heading_2">Content Heading 2:</label>
						<input type="text" id="content_heading_2" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 2" required />

						<p>
							<label class="tLabel" for="content_box_2">Content Box 2:</label>
							<textarea rows="8" cols="50" id="content_box_2" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 2" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<label for="content_heading_3">Content Heading 3:</label>
						<input type="text" id="content_heading_3" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 3" required />

						<p>
							<label class="tLabel" for="content_box_3">Content Box 3:</label>
							<textarea rows="8" cols="50" id="content_box_3" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 3" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<label for="content_heading_4">Content Heading 4:</label>
						<input type="text" id="content_heading_4" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 4" required />

						<p>
							<label class="tLabel" for="content_box_4">Content Box 4:</label>
							<textarea rows="8" cols="50" id="content_box_4" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 4" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<div class="submitCon noBackground">
							<input id="prev3" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next3" class="submitButton"  value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp4" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 4 <span class="sub-panel-title">- Content Pages - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page_title">About Page Title:</label>
						<input type="text" id="about_page_title" name="content[about][title]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page Title" required />
						<p>
							<label class="tLabel" for="about_page_content">About Page Content:</label>
							<textarea rows="8" cols="50" id="about_page_content" name="content[about][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="About Page Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_1_title">Page 1 Title:</label>
							<input type="text" id="page_1_title" name="content[page1][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 1 Title" required />
						<p>
							<label class="tLabel" for="page_1_content">Page 1 Content:</label>
							<textarea rows="8" cols="50" id="page_1_content" name="content[page1][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 1 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_2_title">Page 2 Title:</label>
							<input type="text" id="page_2_title" name="content[page2][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 2 Title" required />
						<p>
							<label class="tLabel" for="page_2_content">Page 2 Content:</label>
							<textarea rows="8" cols="50" id="page_2_content" name="content[page2][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 2 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<label for="page_3_title">Page 3 Title:</label>
						<input type="text" id="page_3_title" name="content[page3][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 3 Title" required />
						<p>
							<label class="tLabel" for="page_3_content">Page 3 Content:</label>
							<textarea rows="8" cols="50" id="page_3_content" name="content[page3][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 3 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<input type="hidden" name="username" value="<?=$username?>" />
						<input type="hidden" name="site_url" value="<?=$domain_name?>" />
						<input type="hidden" name="wireframe" value="<?=$wireframe?>" />
						<input type="hidden" name="language" value="<?=$language?>" />
						<div class="submitCon noBackground">
							<input id="prev4" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input class="submitButton btn-success btn-valid" type="Submit" name="Submit" />
						</div>

				</div>
			
			</form>
	<?php } ?>

	<?php function wireframe15($wf_array, $domain_name, $username, $wireframe, $language){ 
	
		$tt = $wf_array['title_tag'];
		$md = $wf_array['meta_description'];	
		$pt = $wf_array['page_titles'];
		$pc = $wf_array['page_content'];
		$pn = $wf_array['navigation_page_names'];
		$cb = $wf_array['content_boxes'];
		$ch = $wf_array['content_headings'];
		$cta = $wf_array['call_to_actions'];
		$hpt = $wf_array['homepage_title'];
		
	?>
		
			<form id="wireframeForm" class="panel taskform" autocomplete="off" >
				<div id="contentp1" >
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 1 <span class="sub-panel-title">- Meta & Title Information - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="author_nickname">Author Nickname:</label>
						<input type="text" id="author_nickname" name="author_nickname" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="Author Nickname" required />
						
						<label for="title_tag">Title Tag:</label>
						<input type="text" id="title_tag" name="title_tag" class="input-standard contentForm validation" data-min="<?=$tt['min']?>" data-max="<?=$tt['max']?>" placeholder="Title Tag" required />

						<label for="meta_description">Meta Description:</label>
						<input type="text" id="meta_description" name="meta_description" class="input-standard contentForm validation" data-min="<?=$md['min']?>" data-max="<?=$md['max']?>" placeholder="Meta Description" required />
						
						<div class="submitCon noBackground">
							<input id="next1" class="submitButton" value="Next" readonly />
						</div> 	
						
				</div>
				
				<div id="contentp2" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 2 <span class="sub-panel-title">- Navigation - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page">About Page:</label>
						<input type="text" id="about_page" name="content[about][nav]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page" required />
						
						<label for="Page_1">Page 1:</label>
						<input type="text" id="Page_1" name="content[page1][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 1" required />
						
						<label for="Page_2">Page 2:</label>
						<input type="text" id="Page_2" name="content[page2][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 2" required />
						
						<label for="Page_3">Page 3:</label>
						<input type="text" id="Page_3" name="content[page3][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 3" required />
						
						<div class="submitCon noBackground">
							<input id="prev2" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next2" class="submitButton" value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp3" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 3 <span class="sub-panel-title">- Home Page - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>

						<label for="slider_1">Slider Call to Action:</label>
						<input type="text" id="slider_1" name="content[page1][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 1" required />
						
						<label for="slider_2"></label>
						<input type="text" id="slider_2" name="content[page2][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 2" required />
						
						<label for="slider_3"></label>
						<input type="text" id="slider_3" name="content[page3][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 3" required />
					
						<label for="home_page_title">Home Page title:</label>
						<input type="text" id="home_page_title" name="content[homepage][content][homepage_title]" class="input-standard contentForm validation" data-min="<?=$hpt['min']?>" data-max="<?=$hpt['max']?>" placeholder="Home Page title" required />
						
						<label for="content_heading_1">Content Heading 1:</label>
						<input type="text" id="content_heading_1" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 1" required />

						<p>
							<label class="tLabel" for="top_content_box">Content Box 1:</label>
							<textarea rows="8" cols="50" id="top_content_box" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Top Content Box" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<label for="content_heading_2">Content Heading 2:</label>
						<input type="text" id="content_heading_2" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 2" required />

						<p>
							<label class="tLabel" for="content_box_2">Content Box 2:</label>
							<textarea rows="8" cols="50" id="content_box_2" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 2" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<label for="content_heading_3">Content Heading 3:</label>
						<input type="text" id="content_heading_3" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 3" required />

						<p>
							<label class="tLabel" for="content_box_3">Content Box 3:</label>
							<textarea rows="8" cols="50" id="content_box_3" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 3" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<div class="submitCon noBackground">
							<input id="prev3" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next3" class="submitButton"  value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp4" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 4 <span class="sub-panel-title">- Content Pages - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page_title">About Page Title:</label>
						<input type="text" id="about_page_title" name="content[about][title]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page Title" required />
						<p>
							<label class="tLabel" for="about_page_content">About Page Content:</label>
							<textarea rows="8" cols="50" id="about_page_content" name="content[about][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="About Page Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_1_title">Page 1 Title:</label>
							<input type="text" id="page_1_title" name="content[page1][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 1 Title" required />
						<p>
							<label class="tLabel" for="page_1_content">Page 1 Content:</label>
							<textarea rows="8" cols="50" id="page_1_content" name="content[page1][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 1 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_2_title">Page 2 Title:</label>
							<input type="text" id="page_2_title" name="content[page2][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 2 Title" required />
						<p>
							<label class="tLabel" for="page_2_content">Page 2 Content:</label>
							<textarea rows="8" cols="50" id="page_2_content" name="content[page2][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 2 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<label for="page_3_title">Page 3 Title:</label>
						<input type="text" id="page_3_title" name="content[page3][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 3 Title" required />
						<p>
							<label class="tLabel" for="page_3_content">Page 3 Content:</label>
							<textarea rows="8" cols="50" id="page_3_content" name="content[page3][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 3 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<input type="hidden" name="username" value="<?=$username?>" />
						<input type="hidden" name="site_url" value="<?=$domain_name?>" />
						<input type="hidden" name="wireframe" value="<?=$wireframe?>" />
						<input type="hidden" name="language" value="<?=$language?>" />
						<div class="submitCon noBackground">
							<input id="prev4" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input class="submitButton btn-success btn-valid" type="Submit" name="Submit" />
						</div>
				</div>
			</form>
	<?php } ?>

	<?php function wireframe16($wf_array, $domain_name, $username, $wireframe, $language){ 
	
		$tt = $wf_array['title_tag'];
		$md = $wf_array['meta_description'];	
		$pt = $wf_array['page_titles'];
		$pc = $wf_array['page_content'];
		$pn = $wf_array['navigation_page_names'];
		$cb = $wf_array['content_boxes'];
		$ch = $wf_array['content_headings'];
		$hpt = $wf_array['homepage_title'];
		
	?>
		
			<form id="wireframeForm" class="panel taskform" autocomplete="off" >
				<div id="contentp1" >
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 1 <span class="sub-panel-title">- Meta & Title Information - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="author_nickname">Author Nickname:</label>
						<input type="text" id="author_nickname" name="author_nickname" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="Author Nickname" required />
						
						<label for="title_tag">Title Tag:</label>
						<input type="text" id="title_tag" name="title_tag" class="input-standard contentForm validation" data-min="<?=$tt['min']?>" data-max="<?=$tt['max']?>" placeholder="Title Tag" required />

						<label for="meta_description">Meta Description:</label>
						<input type="text" id="meta_description" name="meta_description" class="input-standard contentForm validation" data-min="<?=$md['min']?>" data-max="<?=$md['max']?>" placeholder="Meta Description" required />
						
						<div class="submitCon noBackground">
							<input id="next1" class="submitButton" value="Next" readonly />
						</div> 	
						
				</div>
				
				<div id="contentp2" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 2 <span class="sub-panel-title">- Navigation - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page">About Page:</label>
						<input type="text" id="about_page" name="content[about][nav]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page" required />
						
						<label for="Page_1">Page 1:</label>
						<input type="text" id="Page_1" name="content[page1][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 1" required />
						
						<label for="Page_2">Page 2:</label>
						<input type="text" id="Page_2" name="content[page2][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 2" required />
						
						<label for="Page_3">Page 3:</label>
						<input type="text" id="Page_3" name="content[page3][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 3" required />
						
						<div class="submitCon noBackground">
							<input id="prev2" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next2" class="submitButton" value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp3" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 3 <span class="sub-panel-title">- Home Page - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="home_page_title">Home Page title:</label>
						<input type="text" id="home_page_title" name="content[homepage][content][homepage_title]" class="input-standard contentForm validation" data-min="<?=$hpt['min']?>" data-max="<?=$hpt['max']?>" placeholder="Home Page title" required />
						
						<label for="content_heading_1">Content Heading 1:</label>
						<input type="text" id="content_heading_1" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 1" required />

						<p>
							<label class="tLabel" for="top_content_box">Content Box 1:</label>
							<textarea rows="8" cols="50" id="top_content_box" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Top Content Box" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<label for="content_heading_2">Content Heading 2:</label>
						<input type="text" id="content_heading_2" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 2" required />

						<p>
							<label class="tLabel" for="content_box_2">Content Box 2:</label>
							<textarea rows="8" cols="50" id="content_box_2" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 2" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<label for="content_heading_3">Content Heading 3:</label>
						<input type="text" id="content_heading_3" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 3" required />

						<p>
							<label class="tLabel" for="content_box_3">Content Box 3:</label>
							<textarea rows="8" cols="50" id="content_box_3" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 3" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<label for="content_heading_4">Content Heading 4:</label>
						<input type="text" id="content_heading_4" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 4" required />

						<p>
							<label class="tLabel" for="content_box_4">Content Box 4:</label>
							<textarea rows="8" cols="50" id="content_box_4" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 4" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						
						<div class="submitCon noBackground">
							<input id="prev3" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next3" class="submitButton"  value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp4" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 4 <span class="sub-panel-title">- Content Pages - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page_title">About Page Title:</label>
						<input type="text" id="about_page_title" name="content[about][title]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page Title" required />
						<p>
							<label class="tLabel" for="about_page_content">About Page Content:</label>
							<textarea rows="8" cols="50" id="about_page_content" name="content[about][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="About Page Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_1_title">Page 1 Title:</label>
							<input type="text" id="page_1_title" name="content[page1][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 1 Title" required />
						<p>
							<label class="tLabel" for="page_1_content">Page 1 Content:</label>
							<textarea rows="8" cols="50" id="page_1_content" name="content[page1][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 1 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_2_title">Page 2 Title:</label>
							<input type="text" id="page_2_title" name="content[page2][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 2 Title" required />
						<p>
							<label class="tLabel" for="page_2_content">Page 2 Content:</label>
							<textarea rows="8" cols="50" id="page_2_content" name="content[page2][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 2 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<label for="page_3_title">Page 3 Title:</label>
						<input type="text" id="page_3_title" name="content[page3][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 3 Title" required />
						<p>
							<label class="tLabel" for="page_3_content">Page 3 Content:</label>
							<textarea rows="8" cols="50" id="page_3_content" name="content[page3][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 3 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<input type="hidden" name="username" value="<?=$username?>" />
						<input type="hidden" name="site_url" value="<?=$domain_name?>" />
						<input type="hidden" name="wireframe" value="<?=$wireframe?>" />
						<input type="hidden" name="language" value="<?=$language?>" />
						<div class="submitCon noBackground">
							<input id="prev4" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input class="submitButton btn-success btn-valid" type="Submit" name="Submit" />
						</div>
				</div>
			</form>
	<?php } ?>

	<?php function wireframe17($wf_array, $domain_name, $username, $wireframe, $language){ 
	
		$tt = $wf_array['title_tag'];
		$md = $wf_array['meta_description'];	
		$pt = $wf_array['page_titles'];
		$pc = $wf_array['page_content'];
		$pn = $wf_array['navigation_page_names'];
		$cb = $wf_array['content_boxes'];
		$ch = $wf_array['content_headings'];
		$hpt = $wf_array['homepage_title'];
		
	?>
		
			<form id="wireframeForm" class="panel taskform" autocomplete="off" >
				<div id="contentp1" >
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 1 <span class="sub-panel-title">- Meta & Title Information - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="author_nickname">Author Nickname:</label>
						<input type="text" id="author_nickname" name="author_nickname" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="Author Nickname" required />
						
						<label for="title_tag">Title Tag:</label>
						<input type="text" id="title_tag" name="title_tag" class="input-standard contentForm validation" data-min="<?=$tt['min']?>" data-max="<?=$tt['max']?>" placeholder="Title Tag" required />

						<label for="meta_description">Meta Description:</label>
						<input type="text" id="meta_description" name="meta_description" class="input-standard contentForm validation" data-min="<?=$md['min']?>" data-max="<?=$md['max']?>" placeholder="Meta Description" required />
						
						<div class="submitCon noBackground">
							<input id="next1" class="submitButton" value="Next" readonly />
						</div> 	
						
				</div>
				
				<div id="contentp2" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 2 <span class="sub-panel-title">- Navigation - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page">About Page:</label>
						<input type="text" id="about_page" name="content[about][nav]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page" required />
						
						<label for="Page_1">Page 1:</label>
						<input type="text" id="Page_1" name="content[page1][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 1" required />
						
						<label for="Page_2">Page 2:</label>
						<input type="text" id="Page_2" name="content[page2][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 2" required />
						
						<label for="Page_3">Page 3:</label>
						<input type="text" id="Page_3" name="content[page3][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 3" required />
						
						<div class="submitCon noBackground">
							<input id="prev2" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next2" class="submitButton" value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp3" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 3 <span class="sub-panel-title">- Home Page - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>

						<label for="home_page_title">Home Page title:</label>
						<input type="text" id="home_page_title" name="content[homepage][content][homepage_title]" class="input-standard contentForm validation" data-min="<?=$hpt['min']?>" data-max="<?=$hpt['max']?>" placeholder="Home Page title" required />
						
						<label for="content_heading_1">Content Heading 1:</label>
						<input type="text" id="content_heading_1" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 1" required />

						<p>
							<label class="tLabel" for="top_content_box">Content Box 1:</label>
							<textarea rows="8" cols="50" id="top_content_box" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Top Content Box" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<label for="content_heading_2">Content Heading 2:</label>
						<input type="text" id="content_heading_2" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 2" required />

						<p>
							<label class="tLabel" for="content_box_2">Content Box 2:</label>
							<textarea rows="8" cols="50" id="content_box_2" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 2" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<label for="content_heading_3">Content Heading 3:</label>
						<input type="text" id="content_heading_3" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 3" required />

						<p>
							<label class="tLabel" for="content_box_3">Content Box 3:</label>
							<textarea rows="8" cols="50" id="content_box_3" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 3" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<div class="submitCon noBackground">
							<input id="prev3" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next3" class="submitButton"  value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp4" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 4 <span class="sub-panel-title">- Content Pages - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page_title">About Page Title:</label>
						<input type="text" id="about_page_title" name="content[about][title]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page Title" required />
						<p>
							<label class="tLabel" for="about_page_content">About Page Content:</label>
							<textarea rows="8" cols="50" id="about_page_content" name="content[about][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="About Page Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_1_title">Page 1 Title:</label>
							<input type="text" id="page_1_title" name="content[page1][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 1 Title" required />
						<p>
							<label class="tLabel" for="page_1_content">Page 1 Content:</label>
							<textarea rows="8" cols="50" id="page_1_content" name="content[page1][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 1 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_2_title">Page 2 Title:</label>
							<input type="text" id="page_2_title" name="content[page2][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 2 Title" required />
						<p>
							<label class="tLabel" for="page_2_content">Page 2 Content:</label>
							<textarea rows="8" cols="50" id="page_2_content" name="content[page2][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 2 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<label for="page_3_title">Page 3 Title:</label>
						<input type="text" id="page_3_title" name="content[page3][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 3 Title" required />
						<p>
							<label class="tLabel" for="page_3_content">Page 3 Content:</label>
							<textarea rows="8" cols="50" id="page_3_content" name="content[page3][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 3 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<input type="hidden" name="username" value="<?=$username?>" />
						<input type="hidden" name="site_url" value="<?=$domain_name?>" />
						<input type="hidden" name="wireframe" value="<?=$wireframe?>" />
						<input type="hidden" name="language" value="<?=$language?>" />
						<div class="submitCon noBackground">
							<input id="prev4" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input class="submitButton btn-success btn-valid" type="Submit" name="Submit" />
						</div>
				</div>
			</form>
	<?php } ?>

	<?php function wireframe18($wf_array, $domain_name, $username, $wireframe, $language){ 
	
		$tt = $wf_array['title_tag'];
		$md = $wf_array['meta_description'];	
		$pt = $wf_array['page_titles'];
		$pc = $wf_array['page_content'];
		$pn = $wf_array['navigation_page_names'];
		$cb = $wf_array['content_boxes'];
		$ch = $wf_array['content_headings'];
		$ctat = $wf_array['call_to_action_titles'];
		$ctac = $wf_array['call_to_action_content'];
		$hpt = $wf_array['homepage_title'];
		$tagline = $wf_array['tagline'];
		
	?>
		
			<form id="wireframeForm" class="panel taskform" autocomplete="off" >
				<div id="contentp1" >
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 1 <span class="sub-panel-title">- Meta & Title Information - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="author_nickname">Author Nickname:</label>
						<input type="text" id="author_nickname" name="author_nickname" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="Author Nickname" required />
						
						<label for="title_tag">Title Tag:</label>
						<input type="text" id="title_tag" name="title_tag" class="input-standard contentForm validation" data-min="<?=$tt['min']?>" data-max="<?=$tt['max']?>" placeholder="Title Tag" required />

						<label for="meta_description">Meta Description:</label>
						<input type="text" id="meta_description" name="meta_description" class="input-standard contentForm validation" data-min="<?=$md['min']?>" data-max="<?=$md['max']?>" placeholder="Meta Description" required />
						
						<div class="submitCon noBackground">
							<input id="next1" class="submitButton" value="Next" readonly />
						</div> 	
						
				</div>
				
				<div id="contentp2" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 2 <span class="sub-panel-title">- Navigation - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page">About Page:</label>
						<input type="text" id="about_page" name="content[about][nav]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page" required />
						
						<label for="Page_1">Page 1:</label>
						<input type="text" id="Page_1" name="content[page1][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 1" required />
						
						<label for="Page_2">Page 2:</label>
						<input type="text" id="Page_2" name="content[page2][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 2" required />
						
						<label for="Page_3">Page 3:</label>
						<input type="text" id="Page_3" name="content[page3][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 3" required />
						
						<div class="submitCon noBackground">
							<input id="prev2" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next2" class="submitButton" value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp3" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 3 <span class="sub-panel-title">- Home Page - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>

						<label for="slider_1">Call to Action Titles:</label>
						<input type="text" id="slider_1" name="content[page1][call_to_action_titles]" class="input-standard contentForm validation" data-min="<?=$ctat['min']?>" data-max="<?=$ctat['max']?>" placeholder="Call to Action Title Page 1" required />
						
						<label for="slider_2"></label>
						<input type="text" id="slider_2" name="content[page2][call_to_action_titles]" class="input-standard contentForm validation" data-min="<?=$ctat['min']?>" data-max="<?=$ctat['max']?>" placeholder="Call to Action Title Page 2" required />
						
						<label for="slider_3"></label>
						<input type="text" id="slider_3" name="content[page3][call_to_action_titles]" class="input-standard contentForm validation" data-min="<?=$ctat['min']?>" data-max="<?=$ctat['max']?>" placeholder="Call to Action Title Page 3" required />
						
						<label for="slider_1">Call to Action Content:</label>
						<input type="text" id="slider_1" name="content[page1][call_to_action_content]" class="input-standard contentForm validation" data-min="<?=$ctac['min']?>" data-max="<?=$ctac['max']?>" placeholder="Call to Action Content Page 1" required />
						
						<label for="slider_2"></label>
						<input type="text" id="slider_2" name="content[page2][call_to_action_content]" class="input-standard contentForm validation" data-min="<?=$ctac['min']?>" data-max="<?=$ctac['max']?>" placeholder="Call to Action Content Page 2" required />
						
						<label for="slider_3"></label>
						<input type="text" id="slider_3" name="content[page3][call_to_action_content]" class="input-standard contentForm validation" data-min="<?=$ctac['min']?>" data-max="<?=$ctac['max']?>" placeholder="Call to Action Content Page 3" required />

						<label for="intro_message_button_label">Intro Message Label:</label>
						<input type="text" id="intro_message_button_label" name="content[homepage][intro_message_label]" class="input-standard contentForm validation" data-min="<?=$ctat['min']?>" data-max="<?=$ctat['max']?>" placeholder="Intro Message Content" required />

						<label for="intro_message">Intro Message Content:</label>
						<input type="text" id="intro_message" name="content[homepage][intro_message_content]" class="input-standard contentForm validation" data-min="<?=$tagline['min']?>" data-max="<?=$tagline['max']?>" placeholder="Intro Message Content" required />
						
						<label for="content_heading_1">Content Heading 1:</label>
						<input type="text" id="content_heading_1" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 1" required />

						<p>
							<label class="tLabel" for="top_content_box">Content Box 1:</label>
							<textarea rows="8" cols="50" id="top_content_box" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Top Content Box" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<label for="content_heading_2">Content Heading 2:</label>
						<input type="text" id="content_heading_2" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 2" required />

						<p>
							<label class="tLabel" for="content_box_2">Content Box 2:</label>
							<textarea rows="8" cols="50" id="content_box_2" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 2" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<label for="content_heading_3">Content Heading 3:</label>
						<input type="text" id="content_heading_3" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 3" required />

						<p>
							<label class="tLabel" for="content_box_3">Content Box 3:</label>
							<textarea rows="8" cols="50" id="content_box_3" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 3" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<div class="submitCon noBackground">
							<input id="prev3" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next3" class="submitButton"  value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp4" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 4 <span class="sub-panel-title">- Content Pages - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page_title">About Page Title:</label>
						<input type="text" id="about_page_title" name="content[about][title]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page Title" required />
						<p>
							<label class="tLabel" for="about_page_content">About Page Content:</label>
							<textarea rows="8" cols="50" id="about_page_content" name="content[about][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="About Page Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_1_title">Page 1 Title:</label>
							<input type="text" id="page_1_title" name="content[page1][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 1 Title" required />
						<p>
							<label class="tLabel" for="page_1_content">Page 1 Content:</label>
							<textarea rows="8" cols="50" id="page_1_content" name="content[page1][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 1 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_2_title">Page 2 Title:</label>
							<input type="text" id="page_2_title" name="content[page2][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 2 Title" required />
						<p>
							<label class="tLabel" for="page_2_content">Page 2 Content:</label>
							<textarea rows="8" cols="50" id="page_2_content" name="content[page2][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 2 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<label for="page_3_title">Page 3 Title:</label>
						<input type="text" id="page_3_title" name="content[page3][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 3 Title" required />
						<p>
							<label class="tLabel" for="page_3_content">Page 3 Content:</label>
							<textarea rows="8" cols="50" id="page_3_content" name="content[page3][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 3 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<input type="hidden" name="username" value="<?=$username?>" />
						<input type="hidden" name="site_url" value="<?=$domain_name?>" />
						<input type="hidden" name="wireframe" value="<?=$wireframe?>" />
						<input type="hidden" name="language" value="<?=$language?>" />
						<div class="submitCon noBackground">
							<input id="prev4" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input class="submitButton btn-success btn-valid" type="Submit" name="Submit" />
						</div>
				</div>
			</form>
	<?php } ?>

	<?php function wireframe19($wf_array, $domain_name, $username, $wireframe, $language){ 
	
		$tt = $wf_array['title_tag'];
		$md = $wf_array['meta_description'];	
		$pt = $wf_array['page_titles'];
		$pc = $wf_array['page_content'];
		$pn = $wf_array['navigation_page_names'];
		$cb = $wf_array['content_boxes'];
		$ch = $wf_array['content_headings'];
		$hpt = $wf_array['homepage_title'];
		
	?>
		
			<form id="wireframeForm" class="panel taskform" autocomplete="off" >
				<div id="contentp1" >
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 1 <span class="sub-panel-title">- Meta & Title Information - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="author_nickname">Author Nickname:</label>
						<input type="text" id="author_nickname" name="author_nickname" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="Author Nickname" required />
						
						<label for="title_tag">Title Tag:</label>
						<input type="text" id="title_tag" name="title_tag" class="input-standard contentForm validation" data-min="<?=$tt['min']?>" data-max="<?=$tt['max']?>" placeholder="Title Tag" required />

						<label for="meta_description">Meta Description:</label>
						<input type="text" id="meta_description" name="meta_description" class="input-standard contentForm validation" data-min="<?=$md['min']?>" data-max="<?=$md['max']?>" placeholder="Meta Description" required />
						
						<div class="submitCon noBackground">
							<input id="next1" class="submitButton" value="Next" readonly />
						</div> 	
						
				</div>
				
				<div id="contentp2" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 2 <span class="sub-panel-title">- Navigation - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page">About Page:</label>
						<input type="text" id="about_page" name="content[about][nav]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page" required />
						
						<label for="Page_1">Page 1:</label>
						<input type="text" id="Page_1" name="content[page1][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 1" required />
						
						<label for="Page_2">Page 2:</label>
						<input type="text" id="Page_2" name="content[page2][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 2" required />
						
						<label for="Page_3">Page 3:</label>
						<input type="text" id="Page_3" name="content[page3][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 3" required />
						
						<div class="submitCon noBackground">
							<input id="prev2" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next2" class="submitButton" value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp3" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 3 <span class="sub-panel-title">- Home Page - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>

						<label for="home_page_title">Home Page title:</label>
						<input type="text" id="home_page_title" name="content[homepage][content][homepage_title]" class="input-standard contentForm validation" data-min="<?=$hpt['min']?>" data-max="<?=$hpt['max']?>" placeholder="Home Page title" required />
						
						<label for="content_heading_1">Content Heading 1:</label>
						<input type="text" id="content_heading_1" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 1" required />

						<p>
							<label class="tLabel" for="top_content_box">Content Box 1:</label>
							<textarea rows="8" cols="50" id="top_content_box" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Top Content Box" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<label for="content_heading_2">Content Heading 2:</label>
						<input type="text" id="content_heading_2" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 2" required />

						<p>
							<label class="tLabel" for="content_box_2">Content Box 2:</label>
							<textarea rows="8" cols="50" id="content_box_2" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 2" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<label for="content_heading_3">Content Heading 3:</label>
						<input type="text" id="content_heading_3" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 3" required />

						<p>
							<label class="tLabel" for="content_box_3">Content Box 3:</label>
							<textarea rows="8" cols="50" id="content_box_3" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 3" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<div class="submitCon noBackground">
							<input id="prev3" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next3" class="submitButton"  value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp4" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 4 <span class="sub-panel-title">- Content Pages - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page_title">About Page Title:</label>
						<input type="text" id="about_page_title" name="content[about][title]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page Title" required />
						<p>
							<label class="tLabel" for="about_page_content">About Page Content:</label>
							<textarea rows="8" cols="50" id="about_page_content" name="content[about][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="About Page Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_1_title">Page 1 Title:</label>
							<input type="text" id="page_1_title" name="content[page1][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 1 Title" required />
						<p>
							<label class="tLabel" for="page_1_content">Page 1 Content:</label>
							<textarea rows="8" cols="50" id="page_1_content" name="content[page1][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 1 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_2_title">Page 2 Title:</label>
							<input type="text" id="page_2_title" name="content[page2][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 2 Title" required />
						<p>
							<label class="tLabel" for="page_2_content">Page 2 Content:</label>
							<textarea rows="8" cols="50" id="page_2_content" name="content[page2][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 2 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<label for="page_3_title">Page 3 Title:</label>
						<input type="text" id="page_3_title" name="content[page3][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 3 Title" required />
						<p>
							<label class="tLabel" for="page_3_content">Page 3 Content:</label>
							<textarea rows="8" cols="50" id="page_3_content" name="content[page3][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 3 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<input type="hidden" name="username" value="<?=$username?>" />
						<input type="hidden" name="site_url" value="<?=$domain_name?>" />
						<input type="hidden" name="wireframe" value="<?=$wireframe?>" />
						<input type="hidden" name="language" value="<?=$language?>" />
						<div class="submitCon noBackground">
							<input id="prev4" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input class="submitButton btn-success btn-valid" type="Submit" name="Submit" />
						</div>
				</div>
			</form>
	<?php } ?>

	<?php function wireframe20($wf_array, $domain_name, $username, $wireframe, $language){ 
	
		$tt = $wf_array['title_tag'];
		$md = $wf_array['meta_description'];	
		$pt = $wf_array['page_titles'];
		$pc = $wf_array['page_content'];
		$pn = $wf_array['navigation_page_names'];
		$cb = $wf_array['content_boxes'];
		$ch = $wf_array['content_headings'];
		$cta = $wf_array['call_to_actions'];
		$hpt = $wf_array['homepage_title'];
		
	?>
		
			<form id="wireframeForm" class="panel taskform" autocomplete="off" >
				<div id="contentp1" >
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 1 <span class="sub-panel-title">- Meta & Title Information - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="author_nickname">Author Nickname:</label>
						<input type="text" id="author_nickname" name="author_nickname" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="Author Nickname" required />
						
						<label for="title_tag">Title Tag:</label>
						<input type="text" id="title_tag" name="title_tag" class="input-standard contentForm validation" data-min="<?=$tt['min']?>" data-max="<?=$tt['max']?>" placeholder="Title Tag" required />

						<label for="meta_description">Meta Description:</label>
						<input type="text" id="meta_description" name="meta_description" class="input-standard contentForm validation" data-min="<?=$md['min']?>" data-max="<?=$md['max']?>" placeholder="Meta Description" required />
						
						<div class="submitCon noBackground">
							<input id="next1" class="submitButton" value="Next" readonly />
						</div> 	
						
				</div>
				
				<div id="contentp2" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 2 <span class="sub-panel-title">- Navigation - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page">About Page:</label>
						<input type="text" id="about_page" name="content[about][nav]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page" required />
						
						<label for="Page_1">Page 1:</label>
						<input type="text" id="Page_1" name="content[page1][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 1" required />
						
						<label for="Page_2">Page 2:</label>
						<input type="text" id="Page_2" name="content[page2][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 2" required />
						
						<label for="Page_3">Page 3:</label>
						<input type="text" id="Page_3" name="content[page3][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 3" required />
						
						<div class="submitCon noBackground">
							<input id="prev2" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next2" class="submitButton" value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp3" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 3 <span class="sub-panel-title">- Home Page - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>

						<label for="slider_1">Slider Call to Action:</label>
						<input type="text" id="slider_1" name="content[page1][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 1" required />
						
						<label for="slider_2"></label>
						<input type="text" id="slider_2" name="content[page2][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 2" required />
						
						<label for="slider_3"></label>
						<input type="text" id="slider_3" name="content[page3][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 3" required />

						<label for="home_page_title">Home Page title:</label>
						<input type="text" id="home_page_title" name="content[homepage][content][homepage_title]" class="input-standard contentForm validation" data-min="<?=$hpt['min']?>" data-max="<?=$hpt['max']?>" placeholder="Home Page title" required />
						
						<label for="content_heading_1">Content Heading 1:</label>
						<input type="text" id="content_heading_1" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 1" required />

						<p>
							<label class="tLabel" for="top_content_box">Content Box 1:</label>
							<textarea rows="8" cols="50" id="top_content_box" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Top Content Box" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<label for="content_heading_2">Content Heading 2:</label>
						<input type="text" id="content_heading_2" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 2" required />

						<p>
							<label class="tLabel" for="content_box_2">Content Box 2:</label>
							<textarea rows="8" cols="50" id="content_box_2" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 2" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<label for="content_heading_3">Content Heading 3:</label>
						<input type="text" id="content_heading_3" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 3" required />

						<p>
							<label class="tLabel" for="content_box_3">Content Box 3:</label>
							<textarea rows="8" cols="50" id="content_box_3" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 3" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<div class="submitCon noBackground">
							<input id="prev3" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next3" class="submitButton"  value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp4" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 4 <span class="sub-panel-title">- Content Pages - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page_title">About Page Title:</label>
						<input type="text" id="about_page_title" name="content[about][title]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page Title" required />
						<p>
							<label class="tLabel" for="about_page_content">About Page Content:</label>
							<textarea rows="8" cols="50" id="about_page_content" name="content[about][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="About Page Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_1_title">Page 1 Title:</label>
							<input type="text" id="page_1_title" name="content[page1][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 1 Title" required />
						<p>
							<label class="tLabel" for="page_1_content">Page 1 Content:</label>
							<textarea rows="8" cols="50" id="page_1_content" name="content[page1][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 1 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_2_title">Page 2 Title:</label>
							<input type="text" id="page_2_title" name="content[page2][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 2 Title" required />
						<p>
							<label class="tLabel" for="page_2_content">Page 2 Content:</label>
							<textarea rows="8" cols="50" id="page_2_content" name="content[page2][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 2 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<label for="page_3_title">Page 3 Title:</label>
						<input type="text" id="page_3_title" name="content[page3][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 3 Title" required />
						<p>
							<label class="tLabel" for="page_3_content">Page 3 Content:</label>
							<textarea rows="8" cols="50" id="page_3_content" name="content[page3][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 3 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<input type="hidden" name="username" value="<?=$username?>" />
						<input type="hidden" name="site_url" value="<?=$domain_name?>" />
						<input type="hidden" name="wireframe" value="<?=$wireframe?>" />
						<input type="hidden" name="language" value="<?=$language?>" />
						<div class="submitCon noBackground">
							<input id="prev4" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input class="submitButton btn-success btn-valid" type="Submit" name="Submit" />
						</div>
				</div>
			</form>
	<?php } ?>

	<?php function wireframe21($wf_array, $domain_name, $username, $wireframe, $language){ 
	
		$tt = $wf_array['title_tag'];
		$md = $wf_array['meta_description'];	
		$pt = $wf_array['page_titles'];
		$pc = $wf_array['page_content'];
		$pn = $wf_array['navigation_page_names'];
		$cb = $wf_array['content_boxes'];
		$ch = $wf_array['content_headings'];
		$cta = $wf_array['call_to_actions'];
		$hpt = $wf_array['homepage_title'];
		
	?>
		
			<form id="wireframeForm" class="panel taskform" autocomplete="off" >
				<div id="contentp1" >
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 1 <span class="sub-panel-title">- Meta & Title Information - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="author_nickname">Author Nickname:</label>
						<input type="text" id="author_nickname" name="author_nickname" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="Author Nickname" required />
						
						<label for="title_tag">Title Tag:</label>
						<input type="text" id="title_tag" name="title_tag" class="input-standard contentForm validation" data-min="<?=$tt['min']?>" data-max="<?=$tt['max']?>" placeholder="Title Tag" required />

						<label for="meta_description">Meta Description:</label>
						<input type="text" id="meta_description" name="meta_description" class="input-standard contentForm validation" data-min="<?=$md['min']?>" data-max="<?=$md['max']?>" placeholder="Meta Description" required />
						
						<div class="submitCon noBackground">
							<input id="next1" class="submitButton" value="Next" readonly />
						</div> 	
						
				</div>
				
				<div id="contentp2" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 2 <span class="sub-panel-title">- Navigation - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page">About Page:</label>
						<input type="text" id="about_page" name="content[about][nav]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page" required />
						
						<label for="Page_1">Page 1:</label>
						<input type="text" id="Page_1" name="content[page1][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 1" required />
						
						<label for="Page_2">Page 2:</label>
						<input type="text" id="Page_2" name="content[page2][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 2" required />
						
						<label for="Page_3">Page 3:</label>
						<input type="text" id="Page_3" name="content[page3][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 3" required />
						
						<div class="submitCon noBackground">
							<input id="prev2" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next2" class="submitButton" value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp3" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 3 <span class="sub-panel-title">- Home Page - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>

						<label for="slider_1">Slider Call to Action:</label>
						<input type="text" id="slider_1" name="content[page1][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 1" required />
						

						<label for="home_page_title">Home Page title:</label>
						<input type="text" id="home_page_title" name="content[homepage][content][homepage_title]" class="input-standard contentForm validation" data-min="<?=$hpt['min']?>" data-max="<?=$hpt['max']?>" placeholder="Home Page title" required />
						
						<label for="content_heading_1">Content Heading 1:</label>
						<input type="text" id="content_heading_1" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 1" required />

						<p>
							<label class="tLabel" for="top_content_box">Content Box 1:</label>
							<textarea rows="8" cols="50" id="top_content_box" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Top Content Box" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<label for="content_heading_2">Content Heading 2:</label>
						<input type="text" id="content_heading_2" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 2" required />

						<p>
							<label class="tLabel" for="content_box_2">Content Box 2:</label>
							<textarea rows="8" cols="50" id="content_box_2" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 2" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<label for="content_heading_3">Content Heading 3:</label>
						<input type="text" id="content_heading_3" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 3" required />

						<p>
							<label class="tLabel" for="content_box_3">Content Box 3:</label>
							<textarea rows="8" cols="50" id="content_box_3" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 3" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<div class="submitCon noBackground">
							<input id="prev3" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next3" class="submitButton"  value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp4" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 4 <span class="sub-panel-title">- Content Pages - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page_title">About Page Title:</label>
						<input type="text" id="about_page_title" name="content[about][title]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page Title" required />
						<p>
							<label class="tLabel" for="about_page_content">About Page Content:</label>
							<textarea rows="8" cols="50" id="about_page_content" name="content[about][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="About Page Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_1_title">Page 1 Title:</label>
							<input type="text" id="page_1_title" name="content[page1][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 1 Title" required />
						<p>
							<label class="tLabel" for="page_1_content">Page 1 Content:</label>
							<textarea rows="8" cols="50" id="page_1_content" name="content[page1][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 1 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_2_title">Page 2 Title:</label>
							<input type="text" id="page_2_title" name="content[page2][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 2 Title" required />
						<p>
							<label class="tLabel" for="page_2_content">Page 2 Content:</label>
							<textarea rows="8" cols="50" id="page_2_content" name="content[page2][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 2 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<label for="page_3_title">Page 3 Title:</label>
						<input type="text" id="page_3_title" name="content[page3][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 3 Title" required />
						<p>
							<label class="tLabel" for="page_3_content">Page 3 Content:</label>
							<textarea rows="8" cols="50" id="page_3_content" name="content[page3][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 3 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<input type="hidden" name="username" value="<?=$username?>" />
						<input type="hidden" name="site_url" value="<?=$domain_name?>" />
						<input type="hidden" name="wireframe" value="<?=$wireframe?>" />
						<input type="hidden" name="language" value="<?=$language?>" />
						<div class="submitCon noBackground">
							<input id="prev4" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input class="submitButton btn-success btn-valid" type="Submit" name="Submit" />
						</div>
				</div>
			</form>
	<?php } ?>

	<?php function wireframe22($wf_array, $domain_name, $username, $wireframe, $language){ 
	
		$tt = $wf_array['title_tag'];
		$md = $wf_array['meta_description'];	
		$pt = $wf_array['page_titles'];
		$pc = $wf_array['page_content'];
		$pn = $wf_array['navigation_page_names'];
		$cb = $wf_array['content_boxes'];
		$ch = $wf_array['content_headings'];
		$cta = $wf_array['call_to_actions'];
		$hpt = $wf_array['homepage_title'];
		
	?>
		
			<form id="wireframeForm" class="panel taskform" autocomplete="off" >
				<div id="contentp1" >
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 1 <span class="sub-panel-title">- Meta & Title Information - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="author_nickname">Author Nickname:</label>
						<input type="text" id="author_nickname" name="author_nickname" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="Author Nickname" required />
						
						<label for="title_tag">Title Tag:</label>
						<input type="text" id="title_tag" name="title_tag" class="input-standard contentForm validation" data-min="<?=$tt['min']?>" data-max="<?=$tt['max']?>" placeholder="Title Tag" required />

						<label for="meta_description">Meta Description:</label>
						<input type="text" id="meta_description" name="meta_description" class="input-standard contentForm validation" data-min="<?=$md['min']?>" data-max="<?=$md['max']?>" placeholder="Meta Description" required />
						
						<div class="submitCon noBackground">
							<input id="next1" class="submitButton" value="Next" readonly />
						</div> 	
						
				</div>
				
				<div id="contentp2" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 2 <span class="sub-panel-title">- Navigation - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page">About Page:</label>
						<input type="text" id="about_page" name="content[about][nav]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page" required />
						
						<label for="Page_1">Page 1:</label>
						<input type="text" id="Page_1" name="content[page1][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 1" required />
						
						<label for="Page_2">Page 2:</label>
						<input type="text" id="Page_2" name="content[page2][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 2" required />
						
						<label for="Page_3">Page 3:</label>
						<input type="text" id="Page_3" name="content[page3][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 3" required />
						
						<div class="submitCon noBackground">
							<input id="prev2" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next2" class="submitButton" value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp3" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 3 <span class="sub-panel-title">- Home Page - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>

						<label for="slider_1">Slider Call to Action:</label>
						<input type="text" id="slider_1" name="content[page1][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 1" required />
						
						<label for="slider_2"></label>
						<input type="text" id="slider_2" name="content[page2][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 2" required />
						
						<label for="slider_3"></label>
						<input type="text" id="slider_3" name="content[page3][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 3" required />

						<label for="home_page_title">Home Page title:</label>
						<input type="text" id="home_page_title" name="content[homepage][content][homepage_title]" class="input-standard contentForm validation" data-min="<?=$hpt['min']?>" data-max="<?=$hpt['max']?>" placeholder="Home Page title" required />
						
						<label for="content_heading_1">Content Heading 1:</label>
						<input type="text" id="content_heading_1" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 1" required />

						<p>
							<label class="tLabel" for="top_content_box">Content Box 1:</label>
							<textarea rows="8" cols="50" id="top_content_box" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Top Content Box" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<label for="content_heading_2">Content Heading 2:</label>
						<input type="text" id="content_heading_2" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 2" required />

						<p>
							<label class="tLabel" for="content_box_2">Content Box 2:</label>
							<textarea rows="8" cols="50" id="content_box_2" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 2" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<label for="content_heading_3">Content Heading 3:</label>
						<input type="text" id="content_heading_3" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 3" required />

						<p>
							<label class="tLabel" for="content_box_3">Content Box 3:</label>
							<textarea rows="8" cols="50" id="content_box_3" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 3" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<div class="submitCon noBackground">
							<input id="prev3" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next3" class="submitButton"  value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp4" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 4 <span class="sub-panel-title">- Content Pages - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page_title">About Page Title:</label>
						<input type="text" id="about_page_title" name="content[about][title]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page Title" required />
						<p>
							<label class="tLabel" for="about_page_content">About Page Content:</label>
							<textarea rows="8" cols="50" id="about_page_content" name="content[about][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="About Page Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_1_title">Page 1 Title:</label>
							<input type="text" id="page_1_title" name="content[page1][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 1 Title" required />
						<p>
							<label class="tLabel" for="page_1_content">Page 1 Content:</label>
							<textarea rows="8" cols="50" id="page_1_content" name="content[page1][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 1 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_2_title">Page 2 Title:</label>
							<input type="text" id="page_2_title" name="content[page2][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 2 Title" required />
						<p>
							<label class="tLabel" for="page_2_content">Page 2 Content:</label>
							<textarea rows="8" cols="50" id="page_2_content" name="content[page2][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 2 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<label for="page_3_title">Page 3 Title:</label>
						<input type="text" id="page_3_title" name="content[page3][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 3 Title" required />
						<p>
							<label class="tLabel" for="page_3_content">Page 3 Content:</label>
							<textarea rows="8" cols="50" id="page_3_content" name="content[page3][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 3 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<input type="hidden" name="username" value="<?=$username?>" />
						<input type="hidden" name="site_url" value="<?=$domain_name?>" />
						<input type="hidden" name="wireframe" value="<?=$wireframe?>" />
						<input type="hidden" name="language" value="<?=$language?>" />
						<div class="submitCon noBackground">
							<input id="prev4" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input class="submitButton btn-success btn-valid" type="Submit" name="Submit" />
						</div>
				</div>
			</form>
	<?php } ?>

	<?php function wireframe23($wf_array, $domain_name, $username, $wireframe, $language){ 
	
		$tt = $wf_array['title_tag'];
		$md = $wf_array['meta_description'];	
		$pt = $wf_array['page_titles'];
		$pc = $wf_array['page_content'];
		$pn = $wf_array['navigation_page_names'];
		$cb = $wf_array['content_boxes'];
		$ch = $wf_array['content_headings'];
		$hpt = $wf_array['homepage_title'];
		
	?>
		
			<form id="wireframeForm" class="panel taskform" autocomplete="off" >
				<div id="contentp1" >
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 1 <span class="sub-panel-title">- Meta & Title Information - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="author_nickname">Author Nickname:</label>
						<input type="text" id="author_nickname" name="author_nickname" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="Author Nickname" required />
						
						<label for="title_tag">Title Tag:</label>
						<input type="text" id="title_tag" name="title_tag" class="input-standard contentForm validation" data-min="<?=$tt['min']?>" data-max="<?=$tt['max']?>" placeholder="Title Tag" required />

						<label for="meta_description">Meta Description:</label>
						<input type="text" id="meta_description" name="meta_description" class="input-standard contentForm validation" data-min="<?=$md['min']?>" data-max="<?=$md['max']?>" placeholder="Meta Description" required />
						
						<div class="submitCon noBackground">
							<input id="next1" class="submitButton" value="Next" readonly />
						</div> 	
						
				</div>
				
				<div id="contentp2" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 2 <span class="sub-panel-title">- Navigation - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page">About Page:</label>
						<input type="text" id="about_page" name="content[about][nav]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page" required />
						
						<label for="Page_1">Page 1:</label>
						<input type="text" id="Page_1" name="content[page1][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 1" required />
						
						<label for="Page_2">Page 2:</label>
						<input type="text" id="Page_2" name="content[page2][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 2" required />
						
						<label for="Page_3">Page 3:</label>
						<input type="text" id="Page_3" name="content[page3][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 3" required />
						
						<div class="submitCon noBackground">
							<input id="prev2" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next2" class="submitButton" value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp3" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 3 <span class="sub-panel-title">- Home Page - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>

						<label for="home_page_title">Home Page title:</label>
						<input type="text" id="home_page_title" name="content[homepage][content][homepage_title]" class="input-standard contentForm validation" data-min="<?=$hpt['min']?>" data-max="<?=$hpt['max']?>" placeholder="Home Page title" required />
						
						<label for="content_heading_1">Content Heading 1:</label>
						<input type="text" id="content_heading_1" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 1" required />

						<p>
							<label class="tLabel" for="top_content_box">Content Box 1:</label>
							<textarea rows="8" cols="50" id="top_content_box" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Top Content Box" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<label for="content_heading_2">Content Heading 2:</label>
						<input type="text" id="content_heading_2" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 2" required />

						<p>
							<label class="tLabel" for="content_box_2">Content Box 2:</label>
							<textarea rows="8" cols="50" id="content_box_2" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 2" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<label for="content_heading_3">Content Heading 3:</label>
						<input type="text" id="content_heading_3" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 3" required />

						<p>
							<label class="tLabel" for="content_box_3">Content Box 3:</label>
							<textarea rows="8" cols="50" id="content_box_3" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 3" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<div class="submitCon noBackground">
							<input id="prev3" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next3" class="submitButton"  value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp4" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 4 <span class="sub-panel-title">- Content Pages - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page_title">About Page Title:</label>
						<input type="text" id="about_page_title" name="content[about][title]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page Title" required />
						<p>
							<label class="tLabel" for="about_page_content">About Page Content:</label>
							<textarea rows="8" cols="50" id="about_page_content" name="content[about][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="About Page Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_1_title">Page 1 Title:</label>
							<input type="text" id="page_1_title" name="content[page1][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 1 Title" required />
						<p>
							<label class="tLabel" for="page_1_content">Page 1 Content:</label>
							<textarea rows="8" cols="50" id="page_1_content" name="content[page1][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 1 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_2_title">Page 2 Title:</label>
							<input type="text" id="page_2_title" name="content[page2][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 2 Title" required />
						<p>
							<label class="tLabel" for="page_2_content">Page 2 Content:</label>
							<textarea rows="8" cols="50" id="page_2_content" name="content[page2][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 2 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<label for="page_3_title">Page 3 Title:</label>
						<input type="text" id="page_3_title" name="content[page3][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 3 Title" required />
						<p>
							<label class="tLabel" for="page_3_content">Page 3 Content:</label>
							<textarea rows="8" cols="50" id="page_3_content" name="content[page3][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 3 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<input type="hidden" name="username" value="<?=$username?>" />
						<input type="hidden" name="site_url" value="<?=$domain_name?>" />
						<input type="hidden" name="wireframe" value="<?=$wireframe?>" />
						<input type="hidden" name="language" value="<?=$language?>" />
						<div class="submitCon noBackground">
							<input id="prev4" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input class="submitButton btn-success btn-valid" type="Submit" name="Submit" />
						</div>
				</div>
			</form>
	<?php } ?>

	<?php function wireframe24($wf_array, $domain_name, $username, $wireframe, $language){ 
	
		$tt = $wf_array['title_tag'];
		$md = $wf_array['meta_description'];	
		$pt = $wf_array['page_titles'];
		$pc = $wf_array['page_content'];
		$cta = $wf_array['call_to_actions'];
		$pn = $wf_array['navigation_page_names'];
		$cb = $wf_array['content_boxes'];
		$ch = $wf_array['content_headings'];
		$bch = $wf_array['bottom_content_heading'];
		$bc = $wf_array['bottom_content'];
		$hpt = $wf_array['homepage_title'];
		
	?>
		
			<form id="wireframeForm" class="panel taskform" autocomplete="off" >
				<div id="contentp1" >
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 1 <span class="sub-panel-title">- Meta & Title Information - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="author_nickname">Author Nickname:</label>
						<input type="text" id="author_nickname" name="author_nickname" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="Author Nickname" required />
						
						<label for="title_tag">Title Tag:</label>
						<input type="text" id="title_tag" name="title_tag" class="input-standard contentForm validation" data-min="<?=$tt['min']?>" data-max="<?=$tt['max']?>" placeholder="Title Tag" required />

						<label for="meta_description">Meta Description:</label>
						<input type="text" id="meta_description" name="meta_description" class="input-standard contentForm validation" data-min="<?=$md['min']?>" data-max="<?=$md['max']?>" placeholder="Meta Description" required />
						
						<div class="submitCon noBackground">
							<input id="next1" class="submitButton" value="Next" readonly />
						</div> 	
						
				</div>
				
				<div id="contentp2" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 2 <span class="sub-panel-title">- Navigation - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page">About Page:</label>
						<input type="text" id="about_page" name="content[about][nav]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page" required />
						
						<label for="Page_1">Page 1:</label>
						<input type="text" id="Page_1" name="content[page1][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 1" required />
						
						<label for="Page_2">Page 2:</label>
						<input type="text" id="Page_2" name="content[page2][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 2" required />
						
						<label for="Page_3">Page 3:</label>
						<input type="text" id="Page_3" name="content[page3][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 3" required />
						
						<div class="submitCon noBackground">
							<input id="prev2" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next2" class="submitButton" value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp3" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 3 <span class="sub-panel-title">- Home Page - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>

						<label for="slider_1">Slider Call to Action:</label>
						<input type="text" id="slider_1" name="content[page1][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 1" required />
						
						<label for="slider_2"></label>
						<input type="text" id="slider_2" name="content[page2][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 2" required />
						
						<label for="slider_3"></label>
						<input type="text" id="slider_3" name="content[page3][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 3" required />

						<label for="home_page_title">Home Page title:</label>
						<input type="text" id="home_page_title" name="content[homepage][content][homepage_title]" class="input-standard contentForm validation" data-min="<?=$hpt['min']?>" data-max="<?=$hpt['max']?>" placeholder="Home Page title" required />
						
						<label for="content_heading_1">Content Heading 1:</label>
						<input type="text" id="content_heading_1" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 1" required />

						<p>
							<label class="tLabel" for="top_content_box">Content Box 1:</label>
							<textarea rows="8" cols="50" id="top_content_box" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Top Content Box" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<label for="content_heading_2">Content Heading 2:</label>
						<input type="text" id="content_heading_2" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 2" required />

						<p>
							<label class="tLabel" for="content_box_2">Content Box 2:</label>
							<textarea rows="8" cols="50" id="content_box_2" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 2" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<label for="content_heading_3">Content Heading 3:</label>
						<input type="text" id="content_heading_3" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 3" required />

						<p>
							<label class="tLabel" for="content_box_3">Content Box 3:</label>
							<textarea rows="8" cols="50" id="content_box_3" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 3" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<label for="bottom_content_heading">Bottom Content Heading:</label>
						<input type="text" id="bottom_content_heading" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$bch['min']?>" data-max="<?=$bch['max']?>" placeholder="Bottom Content Heading" required />

						<p>
							<label class="tLabel" for="bottom_content">Bottom Content</label>
							<textarea rows="8" cols="50" id="bottom_content" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$bc['min']?>" data-max="<?=$bc['max']?>" placeholder="Bottom Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<div class="submitCon noBackground">
							<input id="prev3" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next3" class="submitButton"  value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp4" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 4 <span class="sub-panel-title">- Content Pages - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page_title">About Page Title:</label>
						<input type="text" id="about_page_title" name="content[about][title]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page Title" required />
						<p>
							<label class="tLabel" for="about_page_content">About Page Content:</label>
							<textarea rows="8" cols="50" id="about_page_content" name="content[about][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="About Page Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_1_title">Page 1 Title:</label>
							<input type="text" id="page_1_title" name="content[page1][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 1 Title" required />
						<p>
							<label class="tLabel" for="page_1_content">Page 1 Content:</label>
							<textarea rows="8" cols="50" id="page_1_content" name="content[page1][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 1 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_2_title">Page 2 Title:</label>
							<input type="text" id="page_2_title" name="content[page2][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 2 Title" required />
						<p>
							<label class="tLabel" for="page_2_content">Page 2 Content:</label>
							<textarea rows="8" cols="50" id="page_2_content" name="content[page2][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 2 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<label for="page_3_title">Page 3 Title:</label>
						<input type="text" id="page_3_title" name="content[page3][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 3 Title" required />
						<p>
							<label class="tLabel" for="page_3_content">Page 3 Content:</label>
							<textarea rows="8" cols="50" id="page_3_content" name="content[page3][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 3 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<input type="hidden" name="username" value="<?=$username?>" />
						<input type="hidden" name="site_url" value="<?=$domain_name?>" />
						<input type="hidden" name="wireframe" value="<?=$wireframe?>" />
						<input type="hidden" name="language" value="<?=$language?>" />
						<div class="submitCon noBackground">
							<input id="prev4" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input class="submitButton btn-success btn-valid" type="Submit" name="Submit" />
						</div>
				</div>
			</form>
	<?php } ?>

	<?php function wireframe25($wf_array, $domain_name, $username, $wireframe, $language){ 
	
		$tt = $wf_array['title_tag'];
		$md = $wf_array['meta_description'];	
		$pt = $wf_array['page_titles'];
		$pc = $wf_array['page_content'];
		$pn = $wf_array['navigation_page_names'];
		$cb = $wf_array['content_boxes'];
		$ch = $wf_array['content_headings'];
		$hpt = $wf_array['homepage_title'];
		
	?>
		
			<form id="wireframeForm" class="panel taskform" autocomplete="off" >
				<div id="contentp1" >
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 1 <span class="sub-panel-title">- Meta & Title Information - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="author_nickname">Author Nickname:</label>
						<input type="text" id="author_nickname" name="author_nickname" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="Author Nickname" required />
						
						<label for="title_tag">Title Tag:</label>
						<input type="text" id="title_tag" name="title_tag" class="input-standard contentForm validation" data-min="<?=$tt['min']?>" data-max="<?=$tt['max']?>" placeholder="Title Tag" required />

						<label for="meta_description">Meta Description:</label>
						<input type="text" id="meta_description" name="meta_description" class="input-standard contentForm validation" data-min="<?=$md['min']?>" data-max="<?=$md['max']?>" placeholder="Meta Description" required />
						
						<div class="submitCon noBackground">
							<input id="next1" class="submitButton" value="Next" readonly />
						</div> 	
						
				</div>
				
				<div id="contentp2" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 2 <span class="sub-panel-title">- Navigation - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page">About Page:</label>
						<input type="text" id="about_page" name="content[about][nav]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page" required />
						
						<label for="Page_1">Page 1:</label>
						<input type="text" id="Page_1" name="content[page1][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 1" required />
						
						<label for="Page_2">Page 2:</label>
						<input type="text" id="Page_2" name="content[page2][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 2" required />
						
						<label for="Page_3">Page 3:</label>
						<input type="text" id="Page_3" name="content[page3][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 3" required />
						
						<div class="submitCon noBackground">
							<input id="prev2" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next2" class="submitButton" value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp3" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 3 <span class="sub-panel-title">- Home Page - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>

						<label for="home_page_title">Home Page title:</label>
						<input type="text" id="home_page_title" name="content[homepage][content][homepage_title]" class="input-standard contentForm validation" data-min="<?=$hpt['min']?>" data-max="<?=$hpt['max']?>" placeholder="Home Page title" required />
						
						<label for="content_heading_1">Content Heading 1:</label>
						<input type="text" id="content_heading_1" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 1" required />

						<p>
							<label class="tLabel" for="top_content_box">Content Box 1:</label>
							<textarea rows="8" cols="50" id="top_content_box" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Top Content Box" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<label for="content_heading_2">Content Heading 2:</label>
						<input type="text" id="content_heading_2" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 2" required />

						<p>
							<label class="tLabel" for="content_box_2">Content Box 2:</label>
							<textarea rows="8" cols="50" id="content_box_2" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 2" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<label for="content_heading_3">Content Heading 3:</label>
						<input type="text" id="content_heading_3" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 3" required />

						<p>
							<label class="tLabel" for="content_box_3">Content Box 3:</label>
							<textarea rows="8" cols="50" id="content_box_3" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 3" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<div class="submitCon noBackground">
							<input id="prev3" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next3" class="submitButton"  value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp4" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 4 <span class="sub-panel-title">- Content Pages - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page_title">About Page Title:</label>
						<input type="text" id="about_page_title" name="content[about][title]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page Title" required />
						<p>
							<label class="tLabel" for="about_page_content">About Page Content:</label>
							<textarea rows="8" cols="50" id="about_page_content" name="content[about][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="About Page Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_1_title">Page 1 Title:</label>
							<input type="text" id="page_1_title" name="content[page1][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 1 Title" required />
						<p>
							<label class="tLabel" for="page_1_content">Page 1 Content:</label>
							<textarea rows="8" cols="50" id="page_1_content" name="content[page1][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 1 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_2_title">Page 2 Title:</label>
							<input type="text" id="page_2_title" name="content[page2][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 2 Title" required />
						<p>
							<label class="tLabel" for="page_2_content">Page 2 Content:</label>
							<textarea rows="8" cols="50" id="page_2_content" name="content[page2][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 2 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<label for="page_3_title">Page 3 Title:</label>
						<input type="text" id="page_3_title" name="content[page3][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 3 Title" required />
						<p>
							<label class="tLabel" for="page_3_content">Page 3 Content:</label>
							<textarea rows="8" cols="50" id="page_3_content" name="content[page3][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 3 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<input type="hidden" name="username" value="<?=$username?>" />
						<input type="hidden" name="site_url" value="<?=$domain_name?>" />
						<input type="hidden" name="wireframe" value="<?=$wireframe?>" />
						<input type="hidden" name="language" value="<?=$language?>" />
						<div class="submitCon noBackground">
							<input id="prev4" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input class="submitButton btn-success btn-valid" type="Submit" name="Submit" />
						</div>
				</div>
			</form>
	<?php } ?>

	<?php function wireframe26($wf_array, $domain_name, $username, $wireframe, $language){ 
	
		$tt = $wf_array['title_tag'];
		$md = $wf_array['meta_description'];	
		$pt = $wf_array['page_titles'];
		$pc = $wf_array['page_content'];
		$pn = $wf_array['navigation_page_names'];
		$cb = $wf_array['content_boxes'];
		$ch = $wf_array['content_headings'];
		$hpt = $wf_array['homepage_title'];
		$cta = $wf_array['call_to_actions'];
		
	?>
		
			<form id="wireframeForm" class="panel taskform" autocomplete="off" >
				<div id="contentp1" >
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 1 <span class="sub-panel-title">- Meta & Title Information - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="author_nickname">Author Nickname:</label>
						<input type="text" id="author_nickname" name="author_nickname" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="Author Nickname" required />
						
						<label for="title_tag">Title Tag:</label>
						<input type="text" id="title_tag" name="title_tag" class="input-standard contentForm validation" data-min="<?=$tt['min']?>" data-max="<?=$tt['max']?>" placeholder="Title Tag" required />

						<label for="meta_description">Meta Description:</label>
						<input type="text" id="meta_description" name="meta_description" class="input-standard contentForm validation" data-min="<?=$md['min']?>" data-max="<?=$md['max']?>" placeholder="Meta Description" required />
						
						<div class="submitCon noBackground">
							<input id="next1" class="submitButton" value="Next" readonly />
						</div> 	
						
				</div>
				
				<div id="contentp2" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 2 <span class="sub-panel-title">- Navigation - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page">About Page:</label>
						<input type="text" id="about_page" name="content[about][nav]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page" required />
						
						<label for="Page_1">Page 1:</label>
						<input type="text" id="Page_1" name="content[page1][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 1" required />
						
						<label for="Page_2">Page 2:</label>
						<input type="text" id="Page_2" name="content[page2][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 2" required />
						
						<label for="Page_3">Page 3:</label>
						<input type="text" id="Page_3" name="content[page3][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 3" required />
						
						<div class="submitCon noBackground">
							<input id="prev2" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next2" class="submitButton" value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp3" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 3 <span class="sub-panel-title">- Home Page - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
						<label for="slider_1">Slider Call to Action:</label>
						<input type="text" id="slider_1" name="content[page1][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 1" required />
						
						<label for="slider_2"></label>
						<input type="text" id="slider_2" name="content[page2][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 2" required />
						
						<label for="slider_3"></label>
						<input type="text" id="slider_3" name="content[page3][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 3" required />

						<label for="home_page_title">Home Page title:</label>
						<input type="text" id="home_page_title" name="content[homepage][content][homepage_title]" class="input-standard contentForm validation" data-min="<?=$hpt['min']?>" data-max="<?=$hpt['max']?>" placeholder="Home Page title" required />
						
						<label for="content_heading_1">Content Heading 1:</label>
						<input type="text" id="content_heading_1" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 1" required />

						<p>
							<label class="tLabel" for="top_content_box">Content Box 1:</label>
							<textarea rows="8" cols="50" id="top_content_box" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Top Content Box" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<label for="content_heading_2">Content Heading 2:</label>
						<input type="text" id="content_heading_2" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 2" required />

						<p>
							<label class="tLabel" for="content_box_2">Content Box 2:</label>
							<textarea rows="8" cols="50" id="content_box_2" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 2" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<label for="content_heading_3">Content Heading 3:</label>
						<input type="text" id="content_heading_3" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 3" required />

						<p>
							<label class="tLabel" for="content_box_3">Content Box 3:</label>
							<textarea rows="8" cols="50" id="content_box_3" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 3" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<label for="content_heading_4">Content Heading 4:</label>
						<input type="text" id="content_heading_4" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 4" required />

						<p>
							<label class="tLabel" for="content_box_4">Content Box 4:</label>
							<textarea rows="8" cols="50" id="content_box_4" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 4" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<div class="submitCon noBackground">
							<input id="prev3" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next3" class="submitButton"  value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp4" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 4 <span class="sub-panel-title">- Content Pages - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page_title">About Page Title:</label>
						<input type="text" id="about_page_title" name="content[about][title]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page Title" required />
						<p>
							<label class="tLabel" for="about_page_content">About Page Content:</label>
							<textarea rows="8" cols="50" id="about_page_content" name="content[about][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="About Page Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_1_title">Page 1 Title:</label>
							<input type="text" id="page_1_title" name="content[page1][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 1 Title" required />
						<p>
							<label class="tLabel" for="page_1_content">Page 1 Content:</label>
							<textarea rows="8" cols="50" id="page_1_content" name="content[page1][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 1 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_2_title">Page 2 Title:</label>
							<input type="text" id="page_2_title" name="content[page2][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 2 Title" required />
						<p>
							<label class="tLabel" for="page_2_content">Page 2 Content:</label>
							<textarea rows="8" cols="50" id="page_2_content" name="content[page2][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 2 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<label for="page_3_title">Page 3 Title:</label>
						<input type="text" id="page_3_title" name="content[page3][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 3 Title" required />
						<p>
							<label class="tLabel" for="page_3_content">Page 3 Content:</label>
							<textarea rows="8" cols="50" id="page_3_content" name="content[page3][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 3 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<input type="hidden" name="username" value="<?=$username?>" />
						<input type="hidden" name="site_url" value="<?=$domain_name?>" />
						<input type="hidden" name="wireframe" value="<?=$wireframe?>" />
						<input type="hidden" name="language" value="<?=$language?>" />
						<div class="submitCon noBackground">
							<input id="prev4" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input class="submitButton btn-success btn-valid" type="Submit" name="Submit" />
						</div>
				</div>
			</form>
	<?php } ?>

	<?php function wireframe27($wf_array, $domain_name, $username, $wireframe, $language){ 
	
		$tt = $wf_array['title_tag'];
		$md = $wf_array['meta_description'];	
		$pt = $wf_array['page_titles'];
		$pc = $wf_array['page_content'];
		$pn = $wf_array['navigation_page_names'];
		$cb = $wf_array['content_boxes'];
		$ch = $wf_array['content_headings'];
		$hpt = $wf_array['homepage_title'];
		$cta = $wf_array['call_to_actions'];
		
	?>
		
			<form id="wireframeForm" class="panel taskform" autocomplete="off" >
				<div id="contentp1" >
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 1 <span class="sub-panel-title">- Meta & Title Information - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="author_nickname">Author Nickname:</label>
						<input type="text" id="author_nickname" name="author_nickname" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="Author Nickname" required />
						
						<label for="title_tag">Title Tag:</label>
						<input type="text" id="title_tag" name="title_tag" class="input-standard contentForm validation" data-min="<?=$tt['min']?>" data-max="<?=$tt['max']?>" placeholder="Title Tag" required />

						<label for="meta_description">Meta Description:</label>
						<input type="text" id="meta_description" name="meta_description" class="input-standard contentForm validation" data-min="<?=$md['min']?>" data-max="<?=$md['max']?>" placeholder="Meta Description" required />
						
						<div class="submitCon noBackground">
							<input id="next1" class="submitButton" value="Next" readonly />
						</div> 	
						
				</div>
				
				<div id="contentp2" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 2 <span class="sub-panel-title">- Navigation - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page">About Page:</label>
						<input type="text" id="about_page" name="content[about][nav]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page" required />
						
						<label for="Page_1">Page 1:</label>
						<input type="text" id="Page_1" name="content[page1][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 1" required />
						
						<label for="Page_2">Page 2:</label>
						<input type="text" id="Page_2" name="content[page2][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 2" required />
						
						<label for="Page_3">Page 3:</label>
						<input type="text" id="Page_3" name="content[page3][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 3" required />
						
						<div class="submitCon noBackground">
							<input id="prev2" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next2" class="submitButton" value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp3" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 3 <span class="sub-panel-title">- Home Page - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>

						<label for="slider_1">Slider Call to Action:</label>
						<input type="text" id="slider_1" name="content[page1][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 1" required />
						
						<label for="slider_2"></label>
						<input type="text" id="slider_2" name="content[page2][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 2" required />
						
						<label for="slider_3"></label>
						<input type="text" id="slider_3" name="content[page3][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 3" required />

						<label for="home_page_title">Home Page title:</label>
						<input type="text" id="home_page_title" name="content[homepage][content][homepage_title]" class="input-standard contentForm validation" data-min="<?=$hpt['min']?>" data-max="<?=$hpt['max']?>" placeholder="Home Page title" required />
						
						<label for="content_heading_1">Content Heading 1:</label>
						<input type="text" id="content_heading_1" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 1" required />

						<p>
							<label class="tLabel" for="top_content_box">Content Box 1:</label>
							<textarea rows="8" cols="50" id="top_content_box" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Top Content Box" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<label for="content_heading_2">Content Heading 2:</label>
						<input type="text" id="content_heading_2" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 2" required />

						<p>
							<label class="tLabel" for="content_box_2">Content Box 2:</label>
							<textarea rows="8" cols="50" id="content_box_2" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 2" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<div class="submitCon noBackground">
							<input id="prev3" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next3" class="submitButton"  value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp4" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 4 <span class="sub-panel-title">- Content Pages - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page_title">About Page Title:</label>
						<input type="text" id="about_page_title" name="content[about][title]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page Title" required />
						<p>
							<label class="tLabel" for="about_page_content">About Page Content:</label>
							<textarea rows="8" cols="50" id="about_page_content" name="content[about][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="About Page Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_1_title">Page 1 Title:</label>
							<input type="text" id="page_1_title" name="content[page1][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 1 Title" required />
						<p>
							<label class="tLabel" for="page_1_content">Page 1 Content:</label>
							<textarea rows="8" cols="50" id="page_1_content" name="content[page1][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 1 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_2_title">Page 2 Title:</label>
							<input type="text" id="page_2_title" name="content[page2][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 2 Title" required />
						<p>
							<label class="tLabel" for="page_2_content">Page 2 Content:</label>
							<textarea rows="8" cols="50" id="page_2_content" name="content[page2][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 2 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<label for="page_3_title">Page 3 Title:</label>
						<input type="text" id="page_3_title" name="content[page3][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 3 Title" required />
						<p>
							<label class="tLabel" for="page_3_content">Page 3 Content:</label>
							<textarea rows="8" cols="50" id="page_3_content" name="content[page3][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 3 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<input type="hidden" name="username" value="<?=$username?>" />
						<input type="hidden" name="site_url" value="<?=$domain_name?>" />
						<input type="hidden" name="wireframe" value="<?=$wireframe?>" />
						<input type="hidden" name="language" value="<?=$language?>" />
						<div class="submitCon noBackground">
							<input id="prev4" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input class="submitButton btn-success btn-valid" type="Submit" name="Submit" />
						</div>
				</div>
			</form>
	<?php } ?>

	<?php function wireframe28($wf_array, $domain_name, $username, $wireframe, $language){ 
	
		$tt = $wf_array['title_tag'];
		$md = $wf_array['meta_description'];	
		$pt = $wf_array['page_titles'];
		$pc = $wf_array['page_content'];
		$pn = $wf_array['navigation_page_names'];
		$cb = $wf_array['content_boxes'];
		$ch = $wf_array['content_headings'];
		$hpt = $wf_array['homepage_title'];
		$cta = $wf_array['call_to_actions'];
		$bc = $wf_array['bottom_content'];
		
	?>
		
			<form id="wireframeForm" class="panel taskform" autocomplete="off" >
				<div id="contentp1" >
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 1 <span class="sub-panel-title">- Meta & Title Information - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="author_nickname">Author Nickname:</label>
						<input type="text" id="author_nickname" name="author_nickname" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="Author Nickname" required />
						
						<label for="title_tag">Title Tag:</label>
						<input type="text" id="title_tag" name="title_tag" class="input-standard contentForm validation" data-min="<?=$tt['min']?>" data-max="<?=$tt['max']?>" placeholder="Title Tag" required />

						<label for="meta_description">Meta Description:</label>
						<input type="text" id="meta_description" name="meta_description" class="input-standard contentForm validation" data-min="<?=$md['min']?>" data-max="<?=$md['max']?>" placeholder="Meta Description" required />
						
						<div class="submitCon noBackground">
							<input id="next1" class="submitButton" value="Next" readonly />
						</div> 	
						
				</div>
				
				<div id="contentp2" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 2 <span class="sub-panel-title">- Navigation - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page">About Page:</label>
						<input type="text" id="about_page" name="content[about][nav]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page" required />
						
						<label for="Page_1">Page 1:</label>
						<input type="text" id="Page_1" name="content[page1][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 1" required />
						
						<label for="Page_2">Page 2:</label>
						<input type="text" id="Page_2" name="content[page2][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 2" required />
						
						<label for="Page_3">Page 3:</label>
						<input type="text" id="Page_3" name="content[page3][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 3" required />
						
						<div class="submitCon noBackground">
							<input id="prev2" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next2" class="submitButton" value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp3" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 3 <span class="sub-panel-title">- Home Page - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>

						<label for="slider_1">Slider Call to Action:</label>
						<input type="text" id="slider_1" name="content[page1][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 1" required />
						
						<label for="slider_2"></label>
						<input type="text" id="slider_2" name="content[page2][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 2" required />
						
						<label for="slider_3"></label>
						<input type="text" id="slider_3" name="content[page3][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 3" required />

						<label for="slider_4"></label>
						<input type="text" id="slider_4" name="content[page4][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 4" required />

						<label for="home_page_title">Home Page title:</label>
						<input type="text" id="home_page_title" name="content[homepage][content][homepage_title]" class="input-standard contentForm validation" data-min="<?=$hpt['min']?>" data-max="<?=$hpt['max']?>" placeholder="Home Page title" required />
						
						<label for="content_heading_1">Content Heading 1:</label>
						<input type="text" id="content_heading_1" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 1" required />

						<p>
							<label class="tLabel" for="top_content_box">Content Box 1:</label>
							<textarea rows="8" cols="50" id="top_content_box" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Top Content Box" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<label for="content_heading_2">Content Heading 2:</label>
						<input type="text" id="content_heading_2" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 2" required />

						<p>
							<label class="tLabel" for="content_box_2">Content Box 2:</label>
							<textarea rows="8" cols="50" id="content_box_2" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 2" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<label for="content_heading_3">Content Heading 3:</label>
						<input type="text" id="content_heading_3" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 3" required />

						<p>
							<label class="tLabel" for="content_box_3">Content Box 3:</label>
							<textarea rows="8" cols="50" id="content_box_3" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 3" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<p>
							<label class="tLabel" for="bottom_content">Bottom Content</label>
							<textarea rows="8" cols="50" id="bottom_content" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$bc['min']?>" data-max="<?=$bc['max']?>" placeholder="Bottom Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<div class="submitCon noBackground">
							<input id="prev3" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next3" class="submitButton"  value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp4" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 4 <span class="sub-panel-title">- Content Pages - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page_title">About Page Title:</label>
						<input type="text" id="about_page_title" name="content[about][title]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page Title" required />
						<p>
							<label class="tLabel" for="about_page_content">About Page Content:</label>
							<textarea rows="8" cols="50" id="about_page_content" name="content[about][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="About Page Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_1_title">Page 1 Title:</label>
							<input type="text" id="page_1_title" name="content[page1][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 1 Title" required />
						<p>
							<label class="tLabel" for="page_1_content">Page 1 Content:</label>
							<textarea rows="8" cols="50" id="page_1_content" name="content[page1][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 1 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_2_title">Page 2 Title:</label>
							<input type="text" id="page_2_title" name="content[page2][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 2 Title" required />
						<p>
							<label class="tLabel" for="page_2_content">Page 2 Content:</label>
							<textarea rows="8" cols="50" id="page_2_content" name="content[page2][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 2 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<label for="page_3_title">Page 3 Title:</label>
						<input type="text" id="page_3_title" name="content[page3][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 3 Title" required />
						<p>
							<label class="tLabel" for="page_3_content">Page 3 Content:</label>
							<textarea rows="8" cols="50" id="page_3_content" name="content[page3][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 3 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<input type="hidden" name="username" value="<?=$username?>" />
						<input type="hidden" name="site_url" value="<?=$domain_name?>" />
						<input type="hidden" name="wireframe" value="<?=$wireframe?>" />
						<input type="hidden" name="language" value="<?=$language?>" />
						<div class="submitCon noBackground">
							<input id="prev4" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input class="submitButton btn-success btn-valid" type="Submit" name="Submit" />
						</div>
				</div>
			</form>
	<?php } ?>

	<?php function wireframe29($wf_array, $domain_name, $username, $wireframe, $language){ 
	
		$tt = $wf_array['title_tag'];
		$md = $wf_array['meta_description'];	
		$pt = $wf_array['page_titles'];
		$pc = $wf_array['page_content'];
		$pn = $wf_array['navigation_page_names'];
		$cb = $wf_array['content_boxes'];
		$ch = $wf_array['content_headings'];
		$hpt = $wf_array['homepage_title'];
		
	?>
		
			<form id="wireframeForm" class="panel taskform" autocomplete="off" >
				<div id="contentp1" >
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 1 <span class="sub-panel-title">- Meta & Title Information - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="author_nickname">Author Nickname:</label>
						<input type="text" id="author_nickname" name="author_nickname" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="Author Nickname" required />
						
						<label for="title_tag">Title Tag:</label>
						<input type="text" id="title_tag" name="title_tag" class="input-standard contentForm validation" data-min="<?=$tt['min']?>" data-max="<?=$tt['max']?>" placeholder="Title Tag" required />

						<label for="meta_description">Meta Description:</label>
						<input type="text" id="meta_description" name="meta_description" class="input-standard contentForm validation" data-min="<?=$md['min']?>" data-max="<?=$md['max']?>" placeholder="Meta Description" required />
						
						<div class="submitCon noBackground">
							<input id="next1" class="submitButton" value="Next" readonly />
						</div> 	
						
				</div>
				
				<div id="contentp2" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 2 <span class="sub-panel-title">- Navigation - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page">About Page:</label>
						<input type="text" id="about_page" name="content[about][nav]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page" required />
						
						<label for="Page_1">Page 1:</label>
						<input type="text" id="Page_1" name="content[page1][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 1" required />
						
						<label for="Page_2">Page 2:</label>
						<input type="text" id="Page_2" name="content[page2][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 2" required />
						
						<label for="Page_3">Page 3:</label>
						<input type="text" id="Page_3" name="content[page3][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 3" required />
						
						<div class="submitCon noBackground">
							<input id="prev2" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next2" class="submitButton" value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp3" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 3 <span class="sub-panel-title">- Home Page - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>

						<label for="home_page_title">Home Page title:</label>
						<input type="text" id="home_page_title" name="content[homepage][content][homepage_title]" class="input-standard contentForm validation" data-min="<?=$hpt['min']?>" data-max="<?=$hpt['max']?>" placeholder="Home Page title" required />
						
						<label for="content_heading_1">Content Heading 1:</label>
						<input type="text" id="content_heading_1" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 1" required />

						<p>
							<label class="tLabel" for="top_content_box">Content Box 1:</label>
							<textarea rows="8" cols="50" id="top_content_box" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Top Content Box" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<label for="content_heading_2">Content Heading 2:</label>
						<input type="text" id="content_heading_2" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 2" required />

						<p>
							<label class="tLabel" for="content_box_2">Content Box 2:</label>
							<textarea rows="8" cols="50" id="content_box_2" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 2" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<label for="content_heading_3">Content Heading 3:</label>
						<input type="text" id="content_heading_3" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 3" required />

						<p>
							<label class="tLabel" for="content_box_3">Content Box 3:</label>
							<textarea rows="8" cols="50" id="content_box_3" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 3" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<div class="submitCon noBackground">
							<input id="prev3" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next3" class="submitButton"  value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp4" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 4 <span class="sub-panel-title">- Content Pages - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page_title">About Page Title:</label>
						<input type="text" id="about_page_title" name="content[about][title]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page Title" required />
						<p>
							<label class="tLabel" for="about_page_content">About Page Content:</label>
							<textarea rows="8" cols="50" id="about_page_content" name="content[about][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="About Page Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_1_title">Page 1 Title:</label>
							<input type="text" id="page_1_title" name="content[page1][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 1 Title" required />
						<p>
							<label class="tLabel" for="page_1_content">Page 1 Content:</label>
							<textarea rows="8" cols="50" id="page_1_content" name="content[page1][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 1 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_2_title">Page 2 Title:</label>
							<input type="text" id="page_2_title" name="content[page2][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 2 Title" required />
						<p>
							<label class="tLabel" for="page_2_content">Page 2 Content:</label>
							<textarea rows="8" cols="50" id="page_2_content" name="content[page2][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 2 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<label for="page_3_title">Page 3 Title:</label>
						<input type="text" id="page_3_title" name="content[page3][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 3 Title" required />
						<p>
							<label class="tLabel" for="page_3_content">Page 3 Content:</label>
							<textarea rows="8" cols="50" id="page_3_content" name="content[page3][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 3 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<input type="hidden" name="username" value="<?=$username?>" />
						<input type="hidden" name="site_url" value="<?=$domain_name?>" />
						<input type="hidden" name="wireframe" value="<?=$wireframe?>" />
						<input type="hidden" name="language" value="<?=$language?>" />
						<div class="submitCon noBackground">
							<input id="prev4" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input class="submitButton btn-success btn-valid" type="Submit" name="Submit" />
						</div>
				</div>
			</form>
	<?php } ?>

	<?php function wireframe30($wf_array, $domain_name, $username, $wireframe, $language){ 
	
		$tt = $wf_array['title_tag'];
		$md = $wf_array['meta_description'];	
		$pt = $wf_array['page_titles'];
		$pc = $wf_array['page_content'];
		$pn = $wf_array['navigation_page_names'];
		$cb = $wf_array['content_boxes'];
		$ch = $wf_array['content_headings'];
		$hpt = $wf_array['homepage_title'];
		$cta = $wf_array['call_to_actions'];
		
	?>
		
			<form id="wireframeForm" class="panel taskform" autocomplete="off" >
				<div id="contentp1" >
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 1 <span class="sub-panel-title">- Meta & Title Information - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="author_nickname">Author Nickname:</label>
						<input type="text" id="author_nickname" name="author_nickname" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="Author Nickname" required />
						
						<label for="title_tag">Title Tag:</label>
						<input type="text" id="title_tag" name="title_tag" class="input-standard contentForm validation" data-min="<?=$tt['min']?>" data-max="<?=$tt['max']?>" placeholder="Title Tag" required />

						<label for="meta_description">Meta Description:</label>
						<input type="text" id="meta_description" name="meta_description" class="input-standard contentForm validation" data-min="<?=$md['min']?>" data-max="<?=$md['max']?>" placeholder="Meta Description" required />
						
						<div class="submitCon noBackground">
							<input id="next1" class="submitButton" value="Next" readonly />
						</div> 	
						
				</div>
				
				<div id="contentp2" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 2 <span class="sub-panel-title">- Navigation - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page">About Page:</label>
						<input type="text" id="about_page" name="content[about][nav]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page" required />
						
						<label for="Page_1">Page 1:</label>
						<input type="text" id="Page_1" name="content[page1][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 1" required />
						
						<label for="Page_2">Page 2:</label>
						<input type="text" id="Page_2" name="content[page2][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 2" required />
						
						<label for="Page_3">Page 3:</label>
						<input type="text" id="Page_3" name="content[page3][nav]" class="input-standard contentForm validation" data-min="<?=$pn['min']?>" data-max="<?=$pn['max']?>" placeholder="Page 3" required />
						
						<div class="submitCon noBackground">
							<input id="prev2" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next2" class="submitButton" value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp3" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 3 <span class="sub-panel-title">- Home Page - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>

						<label for="slider_1">Slider Call to Action:</label>
						<input type="text" id="slider_1" name="content[page1][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 1" required />
						
						<label for="slider_2"></label>
						<input type="text" id="slider_2" name="content[page2][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 2" required />
						
						<label for="slider_3"></label>
						<input type="text" id="slider_3" name="content[page3][slider_content]" class="input-standard contentForm validation" data-min="<?=$cta['min']?>" data-max="<?=$cta['max']?>" placeholder="Call to Action Page 3" required />

						<label for="home_page_title">Home Page title:</label>
						<input type="text" id="home_page_title" name="content[homepage][content][homepage_title]" class="input-standard contentForm validation" data-min="<?=$hpt['min']?>" data-max="<?=$hpt['max']?>" placeholder="Home Page title" required />
						
						<label for="content_heading_1">Content Heading 1:</label>
						<input type="text" id="content_heading_1" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 1" required />

						<p>
							<label class="tLabel" for="top_content_box">Content Box 1:</label>
							<textarea rows="8" cols="50" id="top_content_box" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Top Content Box" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<label for="content_heading_2">Content Heading 2:</label>
						<input type="text" id="content_heading_2" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 2" required />

						<p>
							<label class="tLabel" for="content_box_2">Content Box 2:</label>
							<textarea rows="8" cols="50" id="content_box_2" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 2" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>

						<label for="content_heading_3">Content Heading 3:</label>
						<input type="text" id="content_heading_3" name="content[homepage][title][]" class="input-standard contentForm validation" data-min="<?=$ch['min']?>" data-max="<?=$ch['max']?>" placeholder="Content Heading 3" required />

						<p>
							<label class="tLabel" for="content_box_3">Content Box 3:</label>
							<textarea rows="8" cols="50" id="content_box_3" name="content[homepage][box][]" class="input-standard contentForm ctextarea validation" data-min="<?=$cb['min']?>" data-max="<?=$cb['max']?>" placeholder="Content Box 3" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<div class="submitCon noBackground">
							<input id="prev3" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input id="next3" class="submitButton"  value="Next" readonly />
						</div> 
				</div>
				
				<div id="contentp4" style="display: none;">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Content Part 4 <span class="sub-panel-title">- Content Pages - <?=$domain_name?> <span class="charcount"></span></span>
							</div>
						</div>
					</div>
					
						<label for="about_page_title">About Page Title:</label>
						<input type="text" id="about_page_title" name="content[about][title]" class="input-standard contentForm validation" data-min="3" data-max="100" placeholder="About Page Title" required />
						<p>
							<label class="tLabel" for="about_page_content">About Page Content:</label>
							<textarea rows="8" cols="50" id="about_page_content" name="content[about][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="About Page Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_1_title">Page 1 Title:</label>
							<input type="text" id="page_1_title" name="content[page1][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 1 Title" required />
						<p>
							<label class="tLabel" for="page_1_content">Page 1 Content:</label>
							<textarea rows="8" cols="50" id="page_1_content" name="content[page1][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 1 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
							<label for="page_2_title">Page 2 Title:</label>
							<input type="text" id="page_2_title" name="content[page2][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 2 Title" required />
						<p>
							<label class="tLabel" for="page_2_content">Page 2 Content:</label>
							<textarea rows="8" cols="50" id="page_2_content" name="content[page2][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 2 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						
						<label for="page_3_title">Page 3 Title:</label>
						<input type="text" id="page_3_title" name="content[page3][title]" class="input-standard contentForm validation" data-min="<?=$pt['min']?>" data-max="<?=$pt['max']?>" placeholder="Page 3 Title" required />
						<p>
							<label class="tLabel" for="page_3_content">Page 3 Content:</label>
							<textarea rows="8" cols="50" id="page_3_content" name="content[page3][content]" class="input-standard contentForm ctextarea validation" data-min="<?=$pc['min']?>" data-max="<?=$pc['max']?>" placeholder="Page 3 Content" required ></textarea>
							<span class="edit_link" > Use Visual Editor</span>
						</p>
						<input type="hidden" name="username" value="<?=$username?>" />
						<input type="hidden" name="site_url" value="<?=$domain_name?>" />
						<input type="hidden" name="wireframe" value="<?=$wireframe?>" />
						<input type="hidden" name="language" value="<?=$language?>" />
						<div class="submitCon noBackground">
							<input id="prev4" style="margin-left: 20px;float: left;" class="submitButton" value="Previous" readonly />
							<input class="submitButton btn-success btn-valid" type="Submit" name="Submit" />
						</div>
				</div>
			</form>
	<?php } ?>


	<?php
	if(isset($_GET['wireframe'])){

		switch($wireframe) {
						
			case 1:
				wireframe1($wf_array, $domain_name, $username, $wireframe, $language);
				break;
			case 2:
				wireframe2($wf_array, $domain_name, $username, $wireframe, $language);
				break;
			case 3:
				wireframe3($wf_array, $domain_name, $username, $wireframe, $language);
				break;
			case 4:
				wireframe4($wf_array, $domain_name, $username, $wireframe, $language);
				break;
			case 5:
				wireframe5($wf_array, $domain_name, $username, $wireframe, $language);
				break;
			case 6:
				wireframe6($wf_array, $domain_name, $username, $wireframe, $language);
				break;
			case 7:
				wireframe7($wf_array, $domain_name, $username, $wireframe, $language);
				break;
			case 8:
				wireframe8($wf_array, $domain_name, $username, $wireframe, $language);
				break;
			case 9:
				wireframe9($wf_array, $domain_name, $username, $wireframe, $language);
				break;
			case 10:
				wireframe10($wf_array, $domain_name, $username, $wireframe, $language);
				break;
			case 11:
				wireframe11($wf_array, $domain_name, $username, $wireframe, $language);
				break;
			case 12:
				wireframe12($wf_array, $domain_name, $username, $wireframe, $language);
				break;	
			case 13:
				wireframe13($wf_array, $domain_name, $username, $wireframe, $language);
				break;	
			case 14:
				wireframe14($wf_array, $domain_name, $username, $wireframe, $language);
				break;	
			case 15:
				wireframe15($wf_array, $domain_name, $username, $wireframe, $language);
				break;
			case 16:
				wireframe16($wf_array, $domain_name, $username, $wireframe, $language);
				break;
			case 17:
				wireframe17($wf_array, $domain_name, $username, $wireframe, $language);
				break;
			case 18:
				wireframe18($wf_array, $domain_name, $username, $wireframe, $language);
				break;
			case 19:
				wireframe19($wf_array, $domain_name, $username, $wireframe, $language);
				break;
			case 20:
				wireframe20($wf_array, $domain_name, $username, $wireframe, $language);
				break;
			case 21:
				wireframe21($wf_array, $domain_name, $username, $wireframe, $language);
				break;
			case 22:
				wireframe22($wf_array, $domain_name, $username, $wireframe, $language);
				break;
			case 23:
				wireframe23($wf_array, $domain_name, $username, $wireframe, $language);
				break;
			case 24:
				wireframe24($wf_array, $domain_name, $username, $wireframe, $language);
				break;
			case 25:
				wireframe25($wf_array, $domain_name, $username, $wireframe, $language);
				break;
			case 26:
				wireframe26($wf_array, $domain_name, $username, $wireframe, $language);
				break;
			case 27:
				wireframe27($wf_array, $domain_name, $username, $wireframe, $language);
				break;
			case 28:
				wireframe28($wf_array, $domain_name, $username, $wireframe, $language);
				break;
			case 29:
				wireframe29($wf_array, $domain_name, $username, $wireframe, $language);
				break;
			case 30:
				wireframe30($wf_array, $domain_name, $username, $wireframe, $language);
				break;

			}}
					
			?>
	
	</div>



<div id="edit_wrap" style="display: none;"><span class="close">Close</span><textarea class="textarea"></textarea></div>
	<div class="right-wrapper">

		<div class="right-margin">

			<div class="panel">
				<div class="panel-default">
					<div class="panel-heading">
						<div class="panel-title">
						Progress <span class="sub-panel-title"> - Form Completion Progress</span>
						</div>
					</div>
				</div>
					<div style="margin-bottom: 1px;"class="progress">
			  <div id="formProgress" class="progress-bar progress-bar-striped active"  role="progressbar" aria-valuemin="0" aria-valuemax="100" >
			  </div>
			</div>

			</div>
			
			<!--
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
			-->
			<div class="panel panel-info">
				 <div class="panel-heading">
					 <h3 class="panel-title"><i class="fa fa-lightbulb-o"></i> Autobuilder Instructions For Content Writers</h3>
			 	 </div>
			 	 <div class="glyphicon glyphicon-send airplaneExtra">
			 	 </div>
			 	<div class="panel-body docPanel">
					<ul class="media-list">
						<b>AutoBuilder has been designed to make your work fast and simple. If you have any feedback, 
						suggestions, or if you need to report errors please fill out the <a href="suggestion.php">Contact</a> page.</b> <br>
					  <li class="media">
					    <div class="media-body">
					    	<h4 class="media-heading">Step 1</h4>
							First you need to generate the correct form. To do this enter in the domain name (without the http//www.), the wireframe number, 
					    	and select the language. After hitting submit this should bring you to a new page with the correct form generated. Remember to double check
					    	the domain and wireframe!
					    </div>
					  </li>
					</ul>
					<ul class="media-list">
					  <li class="media">
					    <div class="media-body">
					    	<h4 class="media-heading">Step 2</h4>
					    	Once the form is generated. It will be broken up into four different parts. You can use the left panel to jump around to different parts of the form. It will
					    	show you which part you are on. You can begin to fill out the form. Selected inputs are highlighted in blue. If they are a valid character length it will turn green. If they are invalid they will turn red.
					    </div>
					  </li>
					</ul>
					<ul class="media-list">
					  <li class="media">
					    <div class="media-body">
					    	<h4 class="media-heading">Step 3</h4>
					      	In order for the submit button to appear, every input will need to be highlighted green. If all the 
					      	informatino looks good just click submit and you're done! This will create a file that design and development can use by entering in the same domain name.
					    </div>
					  </li>
					</ul>
				</div>
			</div>
			<div id="contentSuccess" class="alert alert-success" role="alert" style="width: 100%; height: 20px; text-align: center; margin: 0px !important; padding-left: 0px; padding-right: 0px;"></div>
		</div>

	</div>
</div>

<div class="overlay"></div>
</body>
</html>

