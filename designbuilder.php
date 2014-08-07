<?php
include 'header.php';

	if(isset($_GET['domain']) & isset($_GET['wireframe'])){

		$domain_name = $_GET['domain'];
		$wireframe = $_GET['wireframe'];

		$file_path = ('dropzone/content/' . $domain_name . '/content.json');

		if(!file_exists($file_path)){ // file does not exist
		    die('Domain not found');
		} 

	}

?>
<script src="dropzone/dropzone.js"></script>
<link rel="stylesheet" type="text/css" href="dropzone/css/basic.css">
<link rel="stylesheet" type="text/css" href="dropzone/css/dropzone.css">

<div class="body-wrapper">

	<div class="lSide">

	</div>

	<div class="left-wrapper">

	<?php if(!isset($_GET['domain']) & !isset($_GET['wireframe'])){

			echo '<form class="panel taskform" autocomplete="off"  method="get" action="designbuilder.php" >
				
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
						<input style="margin: 20px;" class="submitButton btn-success" type="submit" />
						</form>';

		} else { ?>

		<div class="panel">
			<div class="panel-default">
				<div class="panel-heading">
					<div class="panel-title">
					Image Uploader <span class="sub-panel-title">- Drag and Drop or Click  </span>
					</div>

				</div>
			</div>

			<form id="dropzone_form" action="dropzone/upload.php" class="dropzone" method="post" enctype="multipart/form-data">
				<input style="display:none;" type="file" name="file" multiple />
				<input type="hidden" id="domain_field" name="domain" value="<?=$domain_name?>" />
				<input type="hidden" name="wireframe" value="<?=$wireframe;?>" />
			</form>
			<div class="submit-button">
			<button data-domain="<?=$domain_name?>" data-wireframe="<?=$wireframe?>" id="button_id" style="margin: 20px; margin-top: -45px;" type="button" class="submitButton btn-success btn-valid">Submit</button>
			</div>
		</div>
		<div class="panel">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Upload Errors <span class="sub-panel-title">- Image Sizes and Names</span>
							</div>
						</div>
					</div>
				
				<div id="image_error"></div>
			
			</div>

	</div>
	<div class="right-wrapper">
		<div class="right-margin">

			<div class="panel">
					<div class="panel-default">
						<div class="panel-heading">
							<div class="panel-title">
							Image Alt Text <span class="sub-panel-title">- Enter Image Alt Text</span>
							</div>
						</div>
					</div>
				
				<?php function wireframe1(){ ?>
					<label for="logo_alt">Logo Alt Text:</label>
					<input type="text" id="logo_alt" name="logo_alt" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Logo Alt Text" required />
					<hr style="width: 90%; opacity: .5;">
					<label for="slider1">Slider 1 Alt Text:</label>
					<input type="text" id="slider1" name="slider1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 1 Alt Text" required />
					<label for="slider2">Slider 2 Alt Text:</label>
					<input type="text" id="slider2" name="slider2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 2 Alt Text" required />
					<label for="slider3">Slider 3 Alt Text:</label>
					<input type="text" id="slider3" name="slider3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 3 Alt Text" required />
					<hr style="width: 90%; opacity: .5">
					<label for="image1">Image 1 Alt Text:</label>
					<input type="text" id="image1" name="image1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 1 Alt Text" required />
					<label for="image2">Image 2 Alt Text:</label>
					<input type="text" id="image2" name="image2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 2 Alt Text" required />
					<label for="image3">Image 3 Alt Text:</label>
					<input type="text" id="image3" name="image3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 3 Alt Text" required />

				<?php } ?>

				<?php function wireframe2(){ ?>
					<label for="logo_alt">Logo Alt Text:</label>
					<input type="text" id="logo_alt" name="logo_alt" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Logo Alt Text" required />
					<hr style="width: 90%; opacity: .5;">
					<label for="slider1">Slider 1 Alt Text:</label>
					<input type="text" id="slider1" name="slider1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 1 Alt Text" required />
					<label for="slider2">Slider 2 Alt Text:</label>
					<input type="text" id="slider2" name="slider2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 2 Alt Text" required />
					<label for="slider3">Slider 3 Alt Text:</label>
					<input type="text" id="slider3" name="slider3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 3 Alt Text" required />
					<hr style="width: 90%; opacity: .5">
					<label for="image1">Image 1 Alt Text:</label>
					<input type="text" id="image1" name="image1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 1 Alt Text" required />
					<label for="image2">Image 2 Alt Text:</label>
					<input type="text" id="image2" name="image2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 2 Alt Text" required />
					<label for="image3">Image 3 Alt Text:</label>
					<input type="text" id="image3" name="image3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 3 Alt Text" required />
				<?php } ?>

				<?php function wireframe3(){ ?>
					<label for="logo_alt">Logo Alt Text:</label>
					<input type="text" id="logo_alt" name="logo_alt" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Logo Alt Text" required />
					<hr style="width: 90%; opacity: .5;">
					<label for="slider1">Slider 1 Alt Text:</label>
					<input type="text" id="slider1" name="slider1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 1 Alt Text" required />
					<label for="slider2">Slider 2 Alt Text:</label>
					<input type="text" id="slider2" name="slider2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 2 Alt Text" required />
					<label for="slider3">Slider 3 Alt Text:</label>
					<input type="text" id="slider3" name="slider3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 3 Alt Text" required />
					<hr style="width: 90%; opacity: .5">
					<label for="image1">Image 1 Alt Text:</label>
					<input type="text" id="image1" name="image1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 1 Alt Text" required />
					<label for="image2">Image 2 Alt Text:</label>
					<input type="text" id="image2" name="image2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 2 Alt Text" required />
					<label for="image3">Image 3 Alt Text:</label>
					<input type="text" id="image3" name="image3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 3 Alt Text" required />
				<?php } ?>

				<?php function wireframe4(){ ?>
					<label for="logo_alt">Logo Alt Text:</label>
					<input type="text" id="logo_alt" name="logo_alt" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Logo Alt Text" required />
					<hr style="width: 90%; opacity: .5;">
					<label for="slider1">Slider 1 Alt Text:</label>
					<input type="text" id="slider1" name="slider1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 1 Alt Text" required />
					<label for="slider2">Slider 2 Alt Text:</label>
					<input type="text" id="slider2" name="slider2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 2 Alt Text" required />
					<label for="slider3">Slider 3 Alt Text:</label>
					<input type="text" id="slider3" name="slider3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 3 Alt Text" required />
					<hr style="width: 90%; opacity: .5">
					<label for="image1">Image 1 Alt Text:</label>
					<input type="text" id="image1" name="image1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 1 Alt Text" required />
					<label for="image2">Image 2 Alt Text:</label>
					<input type="text" id="image2" name="image2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 2 Alt Text" required />
					<label for="image3">Image 3 Alt Text:</label>
					<input type="text" id="image3" name="image3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 3 Alt Text" required />
					<label for="image4">Image 4 Alt Text:</label>
					<input type="text" id="image4" name="image4" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 4 Alt Text" required />
				<?php } ?>

				<?php function wireframe5(){ ?>
					<label for="logo_alt">Logo Alt Text:</label>
					<input type="text" id="logo_alt" name="logo_alt" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Logo Alt Text" required />
					<hr style="width: 90%; opacity: .5;">
					<label for="slider1">Slider 1 Alt Text:</label>
					<input type="text" id="slider1" name="slider1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 1 Alt Text" required />
					<label for="slider2">Slider 2 Alt Text:</label>
					<input type="text" id="slider2" name="slider2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 2 Alt Text" required />
					<label for="slider3">Slider 3 Alt Text:</label>
					<input type="text" id="slider3" name="slider3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 3 Alt Text" required />
					<hr style="width: 90%; opacity: .5">
					<label for="image1">Image 1 Alt Text:</label>
					<input type="text" id="image1" name="image1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 1 Alt Text" required />
					<label for="image2">Image 2 Alt Text:</label>
					<input type="text" id="image2" name="image2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 2 Alt Text" required />
				<?php } ?>

				<?php function wireframe6(){ ?>
					<label for="logo_alt">Logo Alt Text:</label>
					<input type="text" id="logo_alt" name="logo_alt" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Logo Alt Text" required />
					<hr style="width: 90%; opacity: .5;">
					<label for="slider1">Slider 1 Alt Text:</label>
					<input type="text" id="slider1" name="slider1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 1 Alt Text" required />
					<label for="slider2">Slider 2 Alt Text:</label>
					<input type="text" id="slider2" name="slider2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 2 Alt Text" required />
					<label for="slider3">Slider 3 Alt Text:</label>
					<input type="text" id="slider3" name="slider3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 3 Alt Text" required />
					<hr style="width: 90%; opacity: .5">
					<label for="image1">Image 1 Alt Text:</label>
					<input type="text" id="image1" name="image1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 1 Alt Text" required />
					<label for="image2">Image 2 Alt Text:</label>
					<input type="text" id="image2" name="image2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 2 Alt Text" required />
				<?php } ?>

				<?php function wireframe7(){ ?>
					<label for="logo_alt">Logo Alt Text:</label>
					<input type="text" id="logo_alt" name="logo_alt" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Logo Alt Text" required />
					<hr style="width: 90%; opacity: .5;">
					<label for="slider1">Slider 1 Alt Text:</label>
					<input type="text" id="slider1" name="slider1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 1 Alt Text" required />
					<label for="slider2">Slider 2 Alt Text:</label>
					<input type="text" id="slider2" name="slider2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 2 Alt Text" required />
					<label for="slider3">Slider 3 Alt Text:</label>
					<input type="text" id="slider3" name="slider3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 3 Alt Text" required />
					<hr style="width: 90%; opacity: .5">
					<label for="image1">Image 1 Alt Text:</label>
					<input type="text" id="image1" name="image1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 1 Alt Text" required />
					<label for="image2">Image 2 Alt Text:</label>
					<input type="text" id="image2" name="image2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 2 Alt Text" required />
					<label for="image3">Image 3 Alt Text:</label>
					<input type="text" id="image3" name="image3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 3 Alt Text" required />
				<?php } ?>

				<?php function wireframe8(){ ?>
					<label for="logo_alt">Logo Alt Text:</label>
					<input type="text" id="logo_alt" name="logo_alt" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Logo Alt Text" required />
					<hr style="width: 90%; opacity: .5;">
					<label for="slider1">Slider 1 Alt Text:</label>
					<input type="text" id="slider1" name="slider1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 1 Alt Text" required />
					<label for="slider2">Slider 2 Alt Text:</label>
					<input type="text" id="slider2" name="slider2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 2 Alt Text" required />
					<label for="slider3">Slider 3 Alt Text:</label>
					<input type="text" id="slider3" name="slider3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 3 Alt Text" required />
					<hr style="width: 90%; opacity: .5">
					<label for="image1">Image 1 Alt Text:</label>
					<input type="text" id="image1" name="image1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 1 Alt Text" required />
				<?php } ?>

				<?php function wireframe9(){ ?>
					<label for="logo_alt">Logo Alt Text:</label>
					<input type="text" id="logo_alt" name="logo_alt" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Logo Alt Text" required />
					<hr style="width: 90%; opacity: .5;">
					<label for="slider1">Slider 1 Alt Text:</label>
					<input type="text" id="slider1" name="slider1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 1 Alt Text" required />
					<label for="slider2">Slider 2 Alt Text:</label>
					<input type="text" id="slider2" name="slider2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 2 Alt Text" required />
					<label for="slider3">Slider 3 Alt Text:</label>
					<input type="text" id="slider3" name="slider3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 3 Alt Text" required />
					<hr style="width: 90%; opacity: .5">
					<label for="image1">Image 1 Alt Text:</label>
					<input type="text" id="image1" name="image1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 1 Alt Text" required />
					<label for="image2">Image 2 Alt Text:</label>
					<input type="text" id="image2" name="image2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 2 Alt Text" required />
					<label for="image3">Image 3 Alt Text:</label>
					<input type="text" id="image3" name="image3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 3 Alt Text" required />
				<?php } ?>

				<?php function wireframe10(){ ?>
					<label for="logo_alt">Logo Alt Text:</label>
					<input type="text" id="logo_alt" name="logo_alt" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Logo Alt Text" required />
					<hr style="width: 90%; opacity: .5;">
					<label for="slider1">Slider 1 Alt Text:</label>
					<input type="text" id="slider1" name="slider1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 1 Alt Text" required />
					<label for="slider2">Slider 2 Alt Text:</label>
					<input type="text" id="slider2" name="slider2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 2 Alt Text" required />
					<label for="slider3">Slider 3 Alt Text:</label>
					<input type="text" id="slider3" name="slider3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 3 Alt Text" required />
					<hr style="width: 90%; opacity: .5">
					<label for="image1">Image 1 Alt Text:</label>
					<input type="text" id="image1" name="image1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 1 Alt Text" required />
					<label for="image2">Image 2 Alt Text:</label>
					<input type="text" id="image2" name="image2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 2 Alt Text" required />
					<label for="image3">Image 3 Alt Text:</label>
					<input type="text" id="image3" name="image3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 3 Alt Text" required />
					<label for="image4">Image 4 Alt Text:</label>
					<input type="text" id="image4" name="image4" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 4 Alt Text" required />
				<?php } ?>

				<?php function wireframe11(){ ?>
					<label for="logo_alt">Logo Alt Text:</label>
					<input type="text" id="logo_alt" name="logo_alt" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Logo Alt Text" required />
					<hr style="width: 90%; opacity: .5;">
					<label for="slider1">Slider 1 Alt Text:</label>
					<input type="text" id="slider1" name="slider1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 1 Alt Text" required />
					<label for="slider2">Slider 2 Alt Text:</label>
					<input type="text" id="slider2" name="slider2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 2 Alt Text" required />
					<label for="slider3">Slider 3 Alt Text:</label>
					<input type="text" id="slider3" name="slider3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 3 Alt Text" required />
					<hr style="width: 90%; opacity: .5">
					<label for="image1">Image 1 Alt Text:</label>
					<input type="text" id="image1" name="image1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 1 Alt Text" required />
					<label for="image2">Image 2 Alt Text:</label>
					<input type="text" id="image2" name="image2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 2 Alt Text" required />
					<label for="image3">Image 3 Alt Text:</label>
					<input type="text" id="image3" name="image3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 3 Alt Text" required />
					<label for="image4">Image 4 Alt Text:</label>
					<input type="text" id="image4" name="image4" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 4 Alt Text" required />
				<?php } ?>

				<?php function wireframe12(){ ?>
					<label for="logo_alt">Logo Alt Text:</label>
					<input type="text" id="logo_alt" name="logo_alt" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Logo Alt Text" required />
					<hr style="width: 90%; opacity: .5;">
					<label for="slider1">Slider 1 Alt Text:</label>
					<input type="text" id="slider1" name="slider1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 1 Alt Text" required />
					<label for="slider2">Slider 2 Alt Text:</label>
					<input type="text" id="slider2" name="slider2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 2 Alt Text" required />
					<label for="slider3">Slider 3 Alt Text:</label>
					<input type="text" id="slider3" name="slider3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 3 Alt Text" required />
					<hr style="width: 90%; opacity: .5">
					<label for="image1">Image 1 Alt Text:</label>
					<input type="text" id="image1" name="image1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 1 Alt Text" required />
					<label for="image2">Image 2 Alt Text:</label>
					<input type="text" id="image2" name="image2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 2 Alt Text" required />
					<label for="image3">Image 3 Alt Text:</label>
					<input type="text" id="image3" name="image3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 3 Alt Text" required />
					<label for="image4">Image 4 Alt Text:</label>
					<input type="text" id="image4" name="image4" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 4 Alt Text" required />
				<?php } ?>

				<?php function wireframe13(){ ?>
					<label for="logo_alt">Logo Alt Text:</label>
					<input type="text" id="logo_alt" name="logo_alt" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Logo Alt Text" required />
					<hr style="width: 90%; opacity: .5;">
					<label for="slider1">Slider 1 Alt Text:</label>
					<input type="text" id="slider1" name="slider1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 1 Alt Text" required />
					<label for="slider2">Slider 2 Alt Text:</label>
					<input type="text" id="slider2" name="slider2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 2 Alt Text" required />
					<label for="slider3">Slider 3 Alt Text:</label>
					<input type="text" id="slider3" name="slider3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 3 Alt Text" required />
					<hr style="width: 90%; opacity: .5">
					<label for="image1">Image 1 Alt Text:</label>
					<input type="text" id="image1" name="image1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 1 Alt Text" required />
					<label for="image2">Image 2 Alt Text:</label>
					<input type="text" id="image2" name="image2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 2 Alt Text" required />
					<label for="image3">Image 3 Alt Text:</label>
					<input type="text" id="image3" name="image3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 3 Alt Text" required />
					<label for="image4">Image 4 Alt Text:</label>
					<input type="text" id="image4" name="image4" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 4 Alt Text" required />
				<?php } ?>

				<?php function wireframe14(){ ?>
					<label for="logo_alt">Logo Alt Text:</label>
					<input type="text" id="logo_alt" name="logo_alt" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Logo Alt Text" required />
					<hr style="width: 90%; opacity: .5;">
					<label for="slider1">Slider 1 Alt Text:</label>
					<input type="text" id="slider1" name="slider1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 1 Alt Text" required />
					<label for="slider2">Slider 2 Alt Text:</label>
					<input type="text" id="slider2" name="slider2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 2 Alt Text" required />
					<label for="slider3">Slider 3 Alt Text:</label>
					<input type="text" id="slider3" name="slider3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 3 Alt Text" required />
					<hr style="width: 90%; opacity: .5">
					<label for="image1">Image 1 Alt Text:</label>
					<input type="text" id="image1" name="image1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 1 Alt Text" required />
					<label for="image2">Image 2 Alt Text:</label>
					<input type="text" id="image2" name="image2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 2 Alt Text" required />
					<label for="image3">Image 3 Alt Text:</label>
					<input type="text" id="image3" name="image3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 3 Alt Text" required />
					<label for="image4">Image 4 Alt Text:</label>
					<input type="text" id="image4" name="image4" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 4 Alt Text" required />
				<?php } ?>

				<?php function wireframe15(){ ?>
					<label for="logo_alt">Logo Alt Text:</label>
					<input type="text" id="logo_alt" name="logo_alt" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Logo Alt Text" required />
					<hr style="width: 90%; opacity: .5;">
					<label for="slider1">Slider 1 Alt Text:</label>
					<input type="text" id="slider1" name="slider1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 1 Alt Text" required />
					<label for="slider2">Slider 2 Alt Text:</label>
					<input type="text" id="slider2" name="slider2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 2 Alt Text" required />
					<label for="slider3">Slider 3 Alt Text:</label>
					<input type="text" id="slider3" name="slider3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 3 Alt Text" required />
					<hr style="width: 90%; opacity: .5">
					<label for="image1">Image 1 Alt Text:</label>
					<input type="text" id="image1" name="image1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 1 Alt Text" required />
					<label for="image2">Image 2 Alt Text:</label>
					<input type="text" id="image2" name="image2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 2 Alt Text" required />
					<label for="image3">Image 3 Alt Text:</label>
					<input type="text" id="image3" name="image3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 3 Alt Text" required />
				<?php } ?>

				<?php function wireframe16(){ ?>
					<label for="logo_alt">Logo Alt Text:</label>
					<input type="text" id="logo_alt" name="logo_alt" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Logo Alt Text" required />
					<hr style="width: 90%; opacity: .5;">
					<label for="slider1">Slider 1 Alt Text:</label>
					<input type="text" id="slider1" name="slider1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 1 Alt Text" required />
					<label for="slider2">Slider 2 Alt Text:</label>
					<input type="text" id="slider2" name="slider2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 2 Alt Text" required />
					<label for="slider3">Slider 3 Alt Text:</label>
					<input type="text" id="slider3" name="slider3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 3 Alt Text" required />
					<hr style="width: 90%; opacity: .5">
					<label for="image1">Image 1 Alt Text:</label>
					<input type="text" id="image1" name="image1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 1 Alt Text" required />
					<label for="image2">Image 2 Alt Text:</label>
					<input type="text" id="image2" name="image2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 2 Alt Text" required />
					<label for="image3">Image 3 Alt Text:</label>
					<input type="text" id="image3" name="image3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 3 Alt Text" required />
					<label for="image4">Image 4 Alt Text:</label>
					<input type="text" id="image4" name="image4" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 4 Alt Text" required />
				<?php } ?>

				<?php function wireframe17(){ ?>
					<label for="logo_alt">Logo Alt Text:</label>
					<input type="text" id="logo_alt" name="logo_alt" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Logo Alt Text" required />
					<hr style="width: 90%; opacity: .5;">
					<label for="slider1">Slider 1 Alt Text:</label>
					<input type="text" id="slider1" name="slider1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 1 Alt Text" required />
					<label for="slider2">Slider 2 Alt Text:</label>
					<input type="text" id="slider2" name="slider2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 2 Alt Text" required />
					<label for="slider3">Slider 3 Alt Text:</label>
					<input type="text" id="slider3" name="slider3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 3 Alt Text" required />
					<hr style="width: 90%; opacity: .5">
					<label for="image1">Image 1 Alt Text:</label>
					<input type="text" id="image1" name="image1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 1 Alt Text" required />
					<label for="image2">Image 2 Alt Text:</label>
					<input type="text" id="image2" name="image2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 2 Alt Text" required />
				<?php } ?>

				<?php function wireframe18(){ ?>
					<label for="logo_alt">Logo Alt Text:</label>
					<input type="text" id="logo_alt" name="logo_alt" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Logo Alt Text" required />
					<hr style="width: 90%; opacity: .5;">
					<label for="slider1">Slider 1 Alt Text:</label>
					<input type="text" id="slider1" name="slider1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 1 Alt Text" required />
					<label for="slider2">Slider 2 Alt Text:</label>
					<input type="text" id="slider2" name="slider2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 2 Alt Text" required />
					<label for="slider3">Slider 3 Alt Text:</label>
					<input type="text" id="slider3" name="slider3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 3 Alt Text" required />
					<hr style="width: 90%; opacity: .5">
					<label for="image1">Image 1 Alt Text:</label>
					<input type="text" id="image1" name="image1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 1 Alt Text" required />
					<label for="image2">Image 2 Alt Text:</label>
					<input type="text" id="image2" name="image2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 2 Alt Text" required />
					<label for="image3">Image 3 Alt Text:</label>
					<input type="text" id="image3" name="image3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 3 Alt Text" required />
					<label for="image4">Image 4 Alt Text:</label>
					<input type="text" id="image4" name="image4" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 4 Alt Text" required />
				<?php } ?>

				<?php function wireframe19(){ ?>
					<label for="logo_alt">Logo Alt Text:</label>
					<input type="text" id="logo_alt" name="logo_alt" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Logo Alt Text" required />
					<hr style="width: 90%; opacity: .5;">
					<label for="slider1">Slider 1 Alt Text:</label>
					<input type="text" id="slider1" name="slider1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 1 Alt Text" required />
					<label for="slider2">Slider 2 Alt Text:</label>
					<input type="text" id="slider2" name="slider2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 2 Alt Text" required />
					<label for="slider3">Slider 3 Alt Text:</label>
					<input type="text" id="slider3" name="slider3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 3 Alt Text" required />
					<hr style="width: 90%; opacity: .5">
					<label for="image1">Image 1 Alt Text:</label>
					<input type="text" id="image1" name="image1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 1 Alt Text" required />
					<label for="image2">Image 2 Alt Text:</label>
					<input type="text" id="image2" name="image2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 2 Alt Text" required />
					<label for="image3">Image 3 Alt Text:</label>
					<input type="text" id="image3" name="image3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 3 Alt Text" required />
				<?php } ?>

				<?php function wireframe20(){ ?>
					<label for="logo_alt">Logo Alt Text:</label>
					<input type="text" id="logo_alt" name="logo_alt" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Logo Alt Text" required />
					<hr style="width: 90%; opacity: .5;">
					<label for="slider1">Slider 1 Alt Text:</label>
					<input type="text" id="slider1" name="slider1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 1 Alt Text" required />
					<label for="slider2">Slider 2 Alt Text:</label>
					<input type="text" id="slider2" name="slider2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 2 Alt Text" required />
					<label for="slider3">Slider 3 Alt Text:</label>
					<input type="text" id="slider3" name="slider3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 3 Alt Text" required />
					<hr style="width: 90%; opacity: .5">
					<label for="image1">Image 1 Alt Text:</label>
					<input type="text" id="image1" name="image1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 1 Alt Text" required />
					<label for="image2">Image 2 Alt Text:</label>
					<input type="text" id="image2" name="image2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 2 Alt Text" required />
					<label for="image3">Image 3 Alt Text:</label>
					<input type="text" id="image3" name="image3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 3 Alt Text" required />
				<?php } ?>

				<?php function wireframe21(){ ?>
					<label for="logo_alt">Logo Alt Text:</label>
					<input type="text" id="logo_alt" name="logo_alt" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Logo Alt Text" required />
					<hr style="width: 90%; opacity: .5">
					<label for="slider1">Slider 1 Alt Text:</label>
					<input type="text" id="slider1" name="slider1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 1 Alt Text" required />
					<hr style="width: 90%; opacity: .5">
					<label for="icon1">Image 1 Alt Text:</label>
					<input type="text" id="icon1" name="icon1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Icon 1 Alt Text" required />
					<label for="icon2">Image 2 Alt Text:</label>
					<input type="text" id="icon2" name="icon2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Icon 2 Alt Text" required />
					<label for="icon3">Image 3 Alt Text:</label>
					<input type="text" id="icon3" name="icon3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Icon 3 Alt Text" required />
				<?php } ?>

				<?php function wireframe22(){ ?>
					<label for="logo_alt">Logo Alt Text:</label>
					<input type="text" id="logo_alt" name="logo_alt" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Logo Alt Text" required />
					<hr style="width: 90%; opacity: .5;">
					<label for="slider1">Slider 1 Alt Text:</label>
					<input type="text" id="slider1" name="slider1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 1 Alt Text" required />
					<label for="slider2">Slider 2 Alt Text:</label>
					<input type="text" id="slider2" name="slider2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 2 Alt Text" required />
					<label for="slider3">Slider 3 Alt Text:</label>
					<input type="text" id="slider3" name="slider3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 3 Alt Text" required />
					<hr style="width: 90%; opacity: .5">
					<label for="image1">Image 1 Alt Text:</label>
					<input type="text" id="image1" name="image1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 1 Alt Text" required />
					<label for="image2">Image 2 Alt Text:</label>
					<input type="text" id="image2" name="image2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 2 Alt Text" required />
					<label for="image3">Image 3 Alt Text:</label>
					<input type="text" id="image3" name="image3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 3 Alt Text" required />
					<label for="image4">Image 4 Alt Text:</label>
					<input type="text" id="image4" name="image4" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 4 Alt Text" required />
				<?php } ?>

				<?php function wireframe23(){ ?>
					<label for="logo_alt">Logo Alt Text:</label>
					<input type="text" id="logo_alt" name="logo_alt" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Logo Alt Text" required />
					<hr style="width: 90%; opacity: .5;">
					<label for="slider1">Slider 1 Alt Text:</label>
					<input type="text" id="slider1" name="slider1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 1 Alt Text" required />
					<label for="slider2">Slider 2 Alt Text:</label>
					<input type="text" id="slider2" name="slider2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 2 Alt Text" required />
					<label for="slider3">Slider 3 Alt Text:</label>
					<input type="text" id="slider3" name="slider3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 3 Alt Text" required />
					<hr style="width: 90%; opacity: .5">
					<label for="image1">Image 1 Alt Text:</label>
					<input type="text" id="image1" name="image1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 1 Alt Text" required />
					<label for="image2">Image 2 Alt Text:</label>
					<input type="text" id="image2" name="image2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 2 Alt Text" required />
					<label for="image3">Image 3 Alt Text:</label>
					<input type="text" id="image3" name="image3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 3 Alt Text" required />
				<?php } ?>

				<?php function wireframe24(){ ?>
					<label for="logo_alt">Logo Alt Text:</label>
					<input type="text" id="logo_alt" name="logo_alt" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Logo Alt Text" required />
					<hr style="width: 90%; opacity: .5;">
					<label for="slider1">Slider 1 Alt Text:</label>
					<input type="text" id="slider1" name="slider1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 1 Alt Text" required />
					<label for="slider2">Slider 2 Alt Text:</label>
					<input type="text" id="slider2" name="slider2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 2 Alt Text" required />
					<label for="slider3">Slider 3 Alt Text:</label>
					<input type="text" id="slider3" name="slider3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 3 Alt Text" required />
					<hr style="width: 90%; opacity: .5">
					<label for="image1">Image 1 Alt Text:</label>
					<input type="text" id="image1" name="image1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 1 Alt Text" required />
					<label for="image2">Image 2 Alt Text:</label>
					<input type="text" id="image2" name="image2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 2 Alt Text" required />
					<label for="image3">Image 3 Alt Text:</label>
					<input type="text" id="image3" name="image3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 3 Alt Text" required />
					<label for="image4">Image 4 Alt Text:</label>
					<input type="text" id="image4" name="image4" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 4 Alt Text" required />
				<?php } ?>

				<?php function wireframe25(){ ?>
					<label for="logo_alt">Logo Alt Text:</label>
					<input type="text" id="logo_alt" name="logo_alt" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Logo Alt Text" required />
					<hr style="width: 90%; opacity: .5;">
					<label for="slider1">Slider 1 Alt Text:</label>
					<input type="text" id="slider1" name="slider1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 1 Alt Text" required />
					<label for="slider2">Slider 2 Alt Text:</label>
					<input type="text" id="slider2" name="slider2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 2 Alt Text" required />
					<label for="slider3">Slider 3 Alt Text:</label>
					<input type="text" id="slider3" name="slider3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 3 Alt Text" required />
					<hr style="width: 90%; opacity: .5">
					<label for="image1">Image 1 Alt Text:</label>
					<input type="text" id="image1" name="image1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 1 Alt Text" required />
					<label for="image2">Image 2 Alt Text:</label>
					<input type="text" id="image2" name="image2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 2 Alt Text" required />
					<label for="image3">Image 3 Alt Text:</label>
					<input type="text" id="image3" name="image3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 3 Alt Text" required />
				<?php } ?>

				<?php function wireframe26(){ ?>
					<label for="logo_alt">Logo Alt Text:</label>
					<input type="text" id="logo_alt" name="logo_alt" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Logo Alt Text" required />
					<hr style="width: 90%; opacity: .5;">
					<label for="slider1">Slider 1 Alt Text:</label>
					<input type="text" id="slider1" name="slider1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 1 Alt Text" required />
					<label for="slider2">Slider 2 Alt Text:</label>
					<input type="text" id="slider2" name="slider2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 2 Alt Text" required />
					<label for="slider3">Slider 3 Alt Text:</label>
					<input type="text" id="slider3" name="slider3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 3 Alt Text" required />
					<hr style="width: 90%; opacity: .5">
					<label for="image1">Image 1 Alt Text:</label>
					<input type="text" id="image1" name="image1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 1 Alt Text" required />
					<label for="image2">Image 2 Alt Text:</label>
					<input type="text" id="image2" name="image2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 2 Alt Text" required />
					<label for="image3">Image 3 Alt Text:</label>
					<input type="text" id="image3" name="image3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 3 Alt Text" required />
					<label for="image4">Image 4 Alt Text:</label>
					<input type="text" id="image4" name="image4" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 4 Alt Text" required />
				<?php } ?>

				<?php function wireframe27(){ ?>
					<label for="logo_alt">Logo Alt Text:</label>
					<input type="text" id="logo_alt" name="logo_alt" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Logo Alt Text" required />
					<hr style="width: 90%; opacity: .5;">
					<label for="slider1">Slider 1 Alt Text:</label>
					<input type="text" id="slider1" name="slider1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 1 Alt Text" required />
					<label for="slider2">Slider 2 Alt Text:</label>
					<input type="text" id="slider2" name="slider2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 2 Alt Text" required />
					<label for="slider3">Slider 3 Alt Text:</label>
					<input type="text" id="slider3" name="slider3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 3 Alt Text" required />
					<hr style="width: 90%; opacity: .5">
					<label for="image1">Image 1 Alt Text:</label>
					<input type="text" id="image1" name="image1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 1 Alt Text" required />
					<label for="image2">Image 2 Alt Text:</label>
					<input type="text" id="image2" name="image2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 2 Alt Text" required />
				<?php } ?>

				<?php function wireframe28(){ ?>
					<label for="logo_alt">Logo Alt Text:</label>
					<input type="text" id="logo_alt" name="logo_alt" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Logo Alt Text" required />
					<hr style="width: 90%; opacity: .5;">
					<label for="slider1">Slider 1 Alt Text:</label>
					<input type="text" id="slider1" name="slider1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 1 Alt Text" required />
					<label for="slider2">Slider 2 Alt Text:</label>
					<input type="text" id="slider2" name="slider2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 2 Alt Text" required />
					<label for="slider3">Slider 3 Alt Text:</label>
					<input type="text" id="slider3" name="slider3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 3 Alt Text" required />
					<hr style="width: 90%; opacity: .5">
					<label for="image1">Image 1 Alt Text:</label>
					<input type="text" id="image1" name="image1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 1 Alt Text" required />
				<?php } ?>

				<?php function wireframe29(){ ?>
					<label for="logo_alt">Logo Alt Text:</label>
					<input type="text" id="logo_alt" name="logo_alt" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Logo Alt Text" required />
					<hr style="width: 90%; opacity: .5;">
					<label for="slider1">Slider 1 Alt Text:</label>
					<input type="text" id="slider1" name="slider1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 1 Alt Text" required />
					<label for="slider2">Slider 2 Alt Text:</label>
					<input type="text" id="slider2" name="slider2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 2 Alt Text" required />
					<label for="slider3">Slider 3 Alt Text:</label>
					<input type="text" id="slider3" name="slider3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 3 Alt Text" required />
					<hr style="width: 90%; opacity: .5">
					<label for="image1">Image 1 Alt Text:</label>
					<input type="text" id="image1" name="image1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 1 Alt Text" required />
					<label for="image2">Image 2 Alt Text:</label>
					<input type="text" id="image2" name="image2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 2 Alt Text" required />
					<label for="image3">Image 3 Alt Text:</label>
					<input type="text" id="image3" name="image3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 3 Alt Text" required />
				<?php } ?>

				<?php function wireframe30(){ ?>
					<label for="logo_alt">Logo Alt Text:</label>
					<input type="text" id="logo_alt" name="logo_alt" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Logo Alt Text" required />
					<hr style="width: 90%; opacity: .5;">
					<label for="slider1">Slider 1 Alt Text:</label>
					<input type="text" id="slider1" name="slider1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 1 Alt Text" required />
					<label for="slider2">Slider 2 Alt Text:</label>
					<input type="text" id="slider2" name="slider2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 2 Alt Text" required />
					<label for="slider3">Slider 3 Alt Text:</label>
					<input type="text" id="slider3" name="slider3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Slider 3 Alt Text" required />
					<hr style="width: 90%; opacity: .5">
					<label for="image1">Image 1 Alt Text:</label>
					<input type="text" id="image1" name="image1" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 1 Alt Text" required />
					<label for="image2">Image 2 Alt Text:</label>
					<input type="text" id="image2" name="image2" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 2 Alt Text" required />
					<label for="image3">Image 3 Alt Text:</label>
					<input type="text" id="image3" name="image3" class="input-standard contentForm validation alttext" data-min="3" data-max="100" placeholder="Image 3 Alt Text" required />
				<?php } ?>

				<?php
			switch($wireframe) {
								
				case 1:
					wireframe1();
					break;
				case 2:
					wireframe2();
					break;
				case 3:
					wireframe3();
					break;
				case 4:
					wireframe4();
					break;
				case 5:
					wireframe5();
					break;
				case 6:
					wireframe6();
					break;
				case 7:
					wireframe7();
					break;
				case 8:
					wireframe8();
					break;
				case 9:
					wireframe9();
					break;
				case 10:
					wireframe10();
					break;
				case 11:
					wireframe11();
					break;
				case 12:
					wireframe12();
					break;	
				case 13:
					wireframe13();
					break;	
				case 14:
					wireframe14();
					break;	
				case 15:
					wireframe15();
					break;
				case 16:
					wireframe16();
					break;
				case 17:
					wireframe17();
					break;
				case 18:
					wireframe18();
					break;
				case 19:
					wireframe19();
					break;
				case 20:
					wireframe20();
					break;
				case 21:
					wireframe21();
					break;
				case 22:
					wireframe22();
					break;
				case 23:
					wireframe23();
					break;
				case 24:
					wireframe24();
					break;
				case 25:
					wireframe25();
					break;
				case 26:
					wireframe26();
					break;
				case 27:
					wireframe27();
					break;
				case 28:
					wireframe28();
					break;
				case 29:
					wireframe29();
					break;
				case 30:
					wireframe30();
					break;
			} ?>
			
			</div>
				
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
								First make sure you are using the correct naming conventions for the images you want to upload. Here is an example for each image type: logo.png, favicon.ico, slider1.jpg, image1.jpg, icon1.png, background.png. If they are named incorrectly or the wrong size it it will show up in the upload errors box. You will need to re-upload that file as it will automatically be deleted.
						    </div>
						  </li>
						</ul>
						<ul class="media-list">
						  <li class="media">
						    <div class="media-body">
						    	<h4 class="media-heading">Step 2</h4>
						    	Once all the images are uploaded and there are no errors. Enter in the Alt Text (a very short description of the image). When all the Alt text has been validated the submit button will appear. Once you click submit you are finished!
						    </div>
						  </li>
						</ul>
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
		</div>	
	</div>
</div>


<?php } ?>


