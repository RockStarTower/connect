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
					Image Upload Reference <span class="sub-panel-title">- Acceptable Names & Sizes</span>
					</div>
				</div>
			</div>
			<div class="imageSizeCon">
		<?php if ($wireframe == 1){ ?>
			logo.png => (minWidth => 300, maxWidth => 600, minHeight => 50, maxHeight => 150) <br>
			lomogo.png => (minWidth => 50, maxWidth => 350, minHeight => 40, maxHeight => 350) <br>
			favicon.ico => (minWidth => 48, maxWidth => 64, minHeight => 48, maxHeight => 64) <br>
			slider1.jpg => (width => 880, height => 350) <br>
			slider2.jpg => (width => 880, height => 350) <br>
			slider3.jpg => (width => 880, height => 350) <br>
			image1.jpg => (width => 200, height => 290) <br>
			image2.jpg => (width => 200, height => 290) <br>
			image3.jpg => (width => 200, height => 290) <br>
		<?php } else if ($wireframe == 2){ ?>
			logo.png => (minWidth => 300, maxWidth => 600, minHeight => 100, maxHeight => 200) <br>
			lomogo.png => (minWidth => 50, maxWidth => 350, minHeight => 40, maxHeight => 350) <br>
			favicon.ico => (minWidth => 48, maxWidth => 64, minHeight => 48, maxHeight => 64) <br>
			slider1.jpg => (width => 960, height => 350) <br>
			slider2.jpg => (width => 960, height => 350) <br>
			slider3.jpg => (width => 960, height => 350) <br>
			image1.jpg => (width => 226, height => 150) <br>
			image2.jpg => (width => 226, height => 150) <br>
			image3.jpg => (width => 226, height => 150) <br>
			image4.jpg => (width => 226, height => 150) <br>
		<?php } else if ($wireframe == 3){ ?>
			logo.png => (minWidth => 300, maxWidth => 500, minHeight => 75, maxHeight => 125) <br>
			lomogo.png => (minWidth => 50, maxWidth => 350, minHeight => 40, maxHeight => 350) <br>
			favicon.ico => (minWidth => 48, maxWidth => 64, minHeight => 48, maxHeight => 64) <br>
			slider1.jpg => (width => 864, height => 350) <br>
			slider2.jpg => (width => 864, height => 350) <br>
			slider3.jpg => (width => 864, height => 350) <br>
			image1.jpg => (width => 274, height => 150) <br>
			image2.jpg => (width => 274, height => 150) <br>
			image3.jpg => (width => 274, height => 150) <br>
		<?php } else if ($wireframe == 4){ ?>
			logo.png => (minWidth => 280, maxWidth => 600, minHeight => 75, maxHeight => 200) <br>
			lomogo.png => (minWidth => 50, maxWidth => 350, minHeight => 40, maxHeight => 350) <br>
			favicon.ico => (minWidth => 48, maxWidth => 64, minHeight => 48, maxHeight => 64) <br>
			slider1.jpg => (width => 960, height => 350) <br>
			slider2.jpg => (width => 960, height => 350) <br>
			slider3.jpg => (width => 960, height => 350) <br>
			image1.jpg => (width => 307, height => 300) <br>
			image2.jpg => (width => 307, height => 300) <br>
			image3.jpg => (width => 307, height => 300) <br>
			image4.jpg => (width => 307, height => 300) <br>
		<?php } else if ($wireframe == 5){ ?>
			logo.png => (minWidth => 250, maxWidth => 600, minHeight => 75, maxHeight => 150) <br>
			lomogo.png => (minWidth => 50, maxWidth => 350, minHeight => 40, maxHeight => 350) <br>
			favicon.ico => (minWidth => 48, maxWidth => 64, minHeight => 48, maxHeight => 64) <br>
			slider1.jpg => (width => 960, height => 350) <br>
			slider2.jpg => (width => 960, height => 350) <br>
			slider3.jpg => (width => 960, height => 350) <br>
			image1.jpg => (width => 260, height => 250) <br>
			image2.jpg => (width => 260, height => 250) <br>
		<?php } else if ($wireframe == 6){ ?>
			logo.png => (minWidth => 250, maxWidth => 600, minHeight => 60, maxHeight => 150) <br>
			lomogo.png => (minWidth => 50, maxWidth => 350, minHeight => 40, maxHeight => 350) <br>
			favicon.ico => (minWidth => 48, maxWidth => 64, minHeight => 48, maxHeight => 64) <br>
			slider1.jpg => (width => 582, height => 350) <br>
			slider2.jpg => (width => 582, height => 350) <br>
			slider3.jpg => (width => 582, height => 350) <br>
			image1.jpg => (width => 262, height => 150) <br>
			image2.jpg => (width => 262, height => 150) <br>
		<?php } else if ($wireframe == 7){ ?>
			logo.png => (minWidth => 200, maxWidth => 450, minHeight => 60, maxHeight => 150) <br>
			lomogo.png => (minWidth => 50, maxWidth => 350, minHeight => 40, maxHeight => 350) <br>
			favicon.ico => (minWidth => 48, maxWidth => 64, minHeight => 48, maxHeight => 64) <br>
			slider1.jpg => (width => 1400, height => 300) <br>
			slider2.jpg => (width => 1400, height => 300) <br>
			slider3.jpg => (width => 1400, height => 300) <br>
			image1.jpg => (width => 288, height => 150) <br>
			image2.jpg => (width => 288, height => 150) <br>
			image3.jpg => (width => 288, height => 150) <br>
		<?php } else if ($wireframe == 8){ ?>
			logo.png => (minWidth => 150, maxWidth => 450, minHeight => 50, maxHeight => 120) <br>
			lomogo.png => (minWidth => 50, maxWidth => 350, minHeight => 40, maxHeight => 350) <br>
			favicon.ico => (minWidth => 48, maxWidth => 64, minHeight => 48, maxHeight => 64) <br>
			slider1.jpg => (width => 912, height => 350) <br>
			slider2.jpg => (width => 912, height => 350) <br>
			slider3.jpg => (width => 912, height => 350) <br>
			image1.jpg => (width => 212, height => 250) <br>
		<?php } else if ($wireframe == 9){ ?>
			logo.png => (minWidth => 150, maxWidth => 450, minHeight => 25, maxHeight => 100) <br>
			lomogo.png => (minWidth => 50, maxWidth => 350, minHeight => 40, maxHeight => 350) <br>
			favicon.ico => (minWidth => 48, maxWidth => 64, minHeight => 48, maxHeight => 64) <br>
			slider1.jpg => (width => 730, height => 350) <br>
			slider2.jpg => (width => 730, height => 350) <br>
			slider3.jpg => (width => 730, height => 350) <br>
			image1.jpg => (width => 150, height => 132) <br>
			image2.jpg => (width => 150, height => 132) <br>
			image3.jpg => (width => 150, height => 132) <br>
		<?php } else if ($wireframe == 10){ ?>
			logo.png => (minWidth => 250, maxWidth => 600, minHeight => 60, maxHeight => 120) <br>
			lomogo.png => (minWidth => 50, maxWidth => 350, minHeight => 40, maxHeight => 350) <br>
			favicon.ico => (minWidth => 48, maxWidth => 64, minHeight => 48, maxHeight => 64) <br>
			slider1.jpg => (width => 940, height => 350) <br>
			slider2.jpg => (width => 940, height => 350) <br>
			slider3.jpg => (width => 940, height => 350) <br>
			image1.jpg => (width => 150, height => 150) <br>
			image2.jpg => (width => 300, height => 200) <br>
			image3.jpg => (width => 300, height => 200) <br>
		<?php } else if ($wireframe == 11){ ?>
			logo.png => (minWidth => 150, maxWidth => 500, minHeight => 30, maxHeight => 100) <br>
			lomogo.png => (minWidth => 50, maxWidth => 350, minHeight => 40, maxHeight => 350) <br>
			favicon.ico => (minWidth => 48, maxWidth => 64, minHeight => 48, maxHeight => 64) <br>
			slider1.jpg => (width => 960, height => 350) <br>
			slider2.jpg => (width => 960, height => 350) <br>
			slider3.jpg => (width => 960, height => 350) <br>
			image1.jpg => (width => 220, height => 150) <br>
			image2.jpg => (width => 220, height => 150) <br>
			image3.jpg => (width => 220, height => 150) <br>
			image4.jpg => (width => 220, height => 150) <br>
		<?php } else if ($wireframe == 12){ ?>
			logo.png => (minWidth => 150, maxWidth => 350, minHeight => 30, maxHeight => 80) <br>
			lomogo.png => (minWidth => 50, maxWidth => 350, minHeight => 40, maxHeight => 350) <br>
			favicon.ico => (minWidth => 48, maxWidth => 64, minHeight => 48, maxHeight => 64) <br>
			slider1.jpg => (width => 940, height => 350) <br>
			slider2.jpg => (width => 940, height => 350) <br>
			slider3.jpg => (width => 940, height => 350) <br>
			image1.jpg => (width => 250, height => 250) <br>
			image2.jpg => (width => 190, height => 150) <br>
			image3.jpg => (width => 190, height => 150) <br>
			image4.jpg => (width => 190, height => 150) <br>
		<?php } else if ($wireframe == 13){ ?>
			logo.png => (minWidth => 150, maxWidth => 600, minHeight => 30, maxHeight => 100) <br>
			lomogo.png => (minWidth => 50, maxWidth => 350, minHeight => 40, maxHeight => 350) <br>
			favicon.ico => (minWidth => 48, maxWidth => 64, minHeight => 48, maxHeight => 64) <br>
			slider1.jpg => (width => 943, height => 345) <br>
			slider2.jpg => (width => 943, height => 345) <br>
			slider3.jpg => (width => 943, height => 345) <br>
			image1.jpg => (width => 130, height => 130) <br>
			image2.jpg => (width => 130, height => 130) <br>
			image3.jpg => (width => 130, height => 130) <br>
			image4.jpg => (width => 130, height => 130) <br>
		<?php } else if ($wireframe == 14){ ?>
			logo.png => (minWidth => 100, maxWidth => 202, minHeight => 100, maxHeight => 202) <br>
			lomogo.png => (minWidth => 50, maxWidth => 350, minHeight => 40, maxHeight => 350) <br>
			favicon.ico => (minWidth => 48, maxWidth => 64, minHeight => 48, maxHeight => 64) <br>
			slider1.jpg => (width => 760, height => 350) <br>
			slider2.jpg => (width => 760, height => 350) <br>
			slider3.jpg => (width => 760, height => 350) <br>
			image1.jpg => (width => 179, height => 179) <br>
			image2.jpg => (width => 179, height => 179) <br>
			image3.jpg => (width => 179, height => 179) <br>
			image4.jpg => (width => 179, height => 179) <br>
			image1.png => (width => 179, height => 179) <br>
			image2.png => (width => 179, height => 179) <br>
			image3.png => (width => 179, height => 179) <br>
			image4.png => (width => 179, height => 179) <br>
		<?php } else if ($wireframe == 15){ ?>
			logo.png => (minWidth => 100, maxWidth => 375, minHeight => 20, maxHeight => 60) <br>
			lomogo.png => (minWidth => 50, maxWidth => 350, minHeight => 40, maxHeight => 350) <br>
			favicon.ico => (minWidth => 48, maxWidth => 64, minHeight => 48, maxHeight => 64) <br>
			slider1.jpg => (width => 700, height => 350) <br>
			slider2.jpg => (width => 700, height => 350) <br>
			slider3.jpg => (width => 700, height => 350) <br>
			image1.jpg => (width => 339, height => 300) <br>
			image2.jpg => (width => 339, height => 300) <br>
			image3.jpg => (width => 700, height => 300) <br>
		<?php } else if ($wireframe == 16){ ?>
			logo.png => (minWidth => 100, maxWidth => 600, minHeight => 20, maxHeight => 100) <br>
			lomogo.png => (minWidth => 50, maxWidth => 350, minHeight => 40, maxHeight => 350) <br>
			favicon.ico => (minWidth => 48, maxWidth => 64, minHeight => 48, maxHeight => 64) <br>
			slider1.jpg => (width => 461, height => 271) <br>
			slider2.jpg => (width => 461, height => 271) <br>
			slider3.jpg => (width => 461, height => 271) <br>
			image1.jpg => (width => 185, height => 185) <br>
			image2.jpg => (width => 185, height => 185) <br>
			image3.jpg => (width => 185, height => 185) <br>
			image4.jpg => (width => 185, height => 185) <br>
		<?php } else if ($wireframe == 17){ ?>
			logo.png => (minWidth => 100, maxWidth => 450, minHeight => 20, maxHeight => 100) <br>
			lomogo.png => (minWidth => 50, maxWidth => 350, minHeight => 40, maxHeight => 350) <br>
			favicon.ico => (minWidth => 48, maxWidth => 64, minHeight => 48, maxHeight => 64) <br>
			slider1.jpg => (width => 462, height => 306) <br>
			slider2.jpg => (width => 462, height => 306) <br>
			slider3.jpg => (width => 462, height => 306) <br>
			image1.jpg => (width => 310, height => 310) <br>
			image2.jpg => (width => 310, height => 310) <br>
		<?php } else if ($wireframe == 18){ ?>
			logo.png => (minWidth => 100, maxWidth => 450, minHeight => 20, maxHeight => 100) <br>
			lomogo.png => (minWidth => 50, maxWidth => 350, minHeight => 40, maxHeight => 350) <br>
			favicon.ico => (minWidth => 48, maxWidth => 64, minHeight => 48, maxHeight => 64) <br>
			background.jpg => (width => 1064, height => 304) <br>
			background.png => (width => 1064, height => 304) <br>
			image1.jpg => (width => 479, height => 262) <br>
			image2.jpg => (width => 479, height => 262) <br>
			image3.jpg => (width => 479, height => 262) <br>
			icon1.png => (width => 50, height => 50) <br>
			icon2.png => (width => 50, height => 50) <br>
			icon3.png => (width => 50, height => 50) <br>
		<?php } else if ($wireframe == 19){ ?>
			logo.png => (minWidth => 250, maxWidth => 500, minHeight => 60, maxHeight => 100) <br>
			lomogo.png => (minWidth => 50, maxWidth => 350, minHeight => 40, maxHeight => 350) <br>
			favicon.ico => (minWidth => 48, maxWidth => 64, minHeight => 48, maxHeight => 64) <br>
			slider1.jpg => (width => 960, height => 350) <br>
			slider2.jpg => (width => 960, height => 350) <br>
			slider3.jpg => (width => 960, height => 350) <br>
			image1.jpg => (width => 175, height => 220) <br>
			image2.jpg => (width => 175, height => 220) <br>
			image3.jpg => (width => 175, height => 220) <br>
		<?php } else if ($wireframe == 20){ ?>
			logo.png => (minWidth => 100, maxWidth => 700, minHeight => 20, maxHeight => 100) <br>
			lomogo.png => (minWidth => 50, maxWidth => 350, minHeight => 40, maxHeight => 350) <br>
			favicon.ico => (minWidth => 48, maxWidth => 64, minHeight => 48, maxHeight => 64) <br>
			slider1.jpg => (width => 688, height => 500) <br>
			slider2.jpg => (width => 688, height => 248) <br>
			slider3.jpg => (width => 688, height => 248) <br>
			image1.jpg => (width => 371, height => 350) <br>
			image2.jpg => (width => 371, height => 350) <br>
			image3.jpg => (width => 371, height => 350) <br>
		<?php } else if ($wireframe == 21){ ?>
			logo.png => (minWidth => 100, maxWidth => 700, minHeight => 20, maxHeight => 100) <br>
			lomogo.png => (minWidth => 50, maxWidth => 350, minHeight => 40, maxHeight => 350) <br>
			favicon.ico => (minWidth => 48, maxWidth => 64, minHeight => 48, maxHeight => 64) <br>
			slider1.png => (width => 813, height => 230) <br>
			icon1.png => (width => 50, height => 50) <br>
			icon2.png => (width => 50, height => 50) <br>
			icon3.png => (width => 50, height => 50) <br>
		<?php } else if ($wireframe == 22){ ?>
			logo.png => (minWidth => 295, maxWidth => 500, minHeight => 88, maxHeight => 115) <br>
			lomogo.png => (minWidth => 50, maxWidth => 350, minHeight => 40, maxHeight => 350) <br>
			favicon.ico => (minWidth => 48, maxWidth => 64, minHeight => 48, maxHeight => 64) <br>
			slider1.jpg => (width => 960, height => 350) <br>
			slider2.jpg => (width => 960, height => 350) <br>
			slider3.jpg => (width => 960, height => 350) <br>
			image1.jpg => (width => 255, height => 180) <br>
			image2.jpg => (width => 255, height => 180) <br>
			image3.jpg => (width => 255, height => 180) <br>
		<?php } else if ($wireframe == 23){ ?>
			logo.png => (minWidth => 100, maxWidth => 300, minHeight => 20, maxHeight => 100) <br>
			lomogo.png => (minWidth => 50, maxWidth => 350, minHeight => 40, maxHeight => 350) <br>
			favicon.ico => (minWidth => 48, maxWidth => 64, minHeight => 48, maxHeight => 64) <br>
			slider1.jpg => (width => 960, height => 295) <br>
			slider2.jpg => (width => 960, height => 295) <br>
			slider3.jpg => (width => 960, height => 295) <br>
			image1.jpg => (width => 250, height => 250) <br>
			image2.jpg => (width => 250, height => 250) <br>
			image3.jpg => (width => 250, height => 250) <br>
		<?php } else if ($wireframe == 24){ ?>
			logo.png => (minWidth => 100, maxWidth => 300, minHeight => 20, maxHeight => 100) <br>
			lomogo.png => (minWidth => 50, maxWidth => 350, minHeight => 40, maxHeight => 350) <br>
			favicon.ico => (minWidth => 48, maxWidth => 64, minHeight => 48, maxHeight => 64) <br>
			slider1.jpg => (width => 960, height => 380) <br>
			slider2.jpg => (width => 960, height => 380) <br>
			slider3.jpg => (width => 960, height => 380) <br>
			image1.jpg => (width => 220, height => 150) <br>
			image2.jpg => (width => 220, height => 150) <br>
			image3.jpg => (width => 220, height => 150) <br>
			image4.jpg => (width => 715, height => 275) <br>
		<?php } else if ($wireframe == 25){ ?>
			logo.png => (minWidth => 100, maxWidth => 315, minHeight => 20, maxHeight => 100) <br>
			lomogo.png => (minWidth => 50, maxWidth => 350, minHeight => 40, maxHeight => 350) <br>
			favicon.ico => (minWidth => 48, maxWidth => 64, minHeight => 48, maxHeight => 64) <br>
			slider1.jpg => (width => 535, height => 300) <br>
			slider2.jpg => (width => 535, height => 300) <br>
			slider3.jpg => (width => 535, height => 300) <br>
			image1.jpg => (width => 250, height => 250) <br>
			image2.jpg => (width => 250, height => 250) <br>
			image3.jpg => (width => 250, height => 250) <br>
			background.jpg => (minWidth => 2000, maxWidth => 2300, minHeight => 600, maxHeight => 700) <br>
		<?php } else if ($wireframe == 26){ ?>
			logo.png => (minWidth => 200, maxWidth => 300, minHeight => 60, maxHeight => 150) <br>
			lomogo.png => (minWidth => 50, maxWidth => 350, minHeight => 40, maxHeight => 350) <br>
			favicon.ico => (minWidth => 48, maxWidth => 64, minHeight => 48, maxHeight => 64) <br>
			slider1.jpg => (width => 855, height => 333) <br>
			slider2.jpg => (width => 855, height => 333) <br>
			slider3.jpg => (width => 855, height => 333) <br>
			image1.jpg => (width => 179, height => 179) <br>
			image2.jpg => (width => 179, height => 179) <br>
			image3.jpg => (width => 179, height => 179) <br>
			image4.jpg => (width => 179, height => 179) <br>
			image1.png => (width => 179, height => 179) <br>
			image2.png => (width => 179, height => 179) <br>
			image3.png => (width => 179, height => 179) <br>
			image4.png => (width => 179, height => 179) <br>
		<?php } else if ($wireframe == 27){ ?>
			logo.png => (minWidth => 200, maxWidth => 300, minHeight => 90, maxHeight => 95) <br>
			lomogo.png => (minWidth => 50, maxWidth => 350, minHeight => 40, maxHeight => 350) <br>
			favicon.ico => (minWidth => 48, maxWidth => 64, minHeight => 48, maxHeight => 64) <br>
			slider1.jpg => (width => 1077, height => 450) <br>
			slider2.jpg => (width => 1077, height => 450) <br>
			slider3.jpg => (width => 1077, height => 450) <br>
			image1.jpg => (width => 344, height => 346) <br>
			image2.jpg => (width => 344, height => 346) <br>
		<?php } else if ($wireframe == 28){ ?>
			logo.png => (minWidth => 350, maxWidth => 657, minHeight => 90, maxHeight => 165) <br>
			lomogo.png => (minWidth => 50, maxWidth => 350, minHeight => 40, maxHeight => 350) <br>
			favicon.ico => (minWidth => 48, maxWidth => 64, minHeight => 48, maxHeight => 64) <br>
			slider1.jpg => (width => 437, height => 200) <br>
			slider2.jpg => (width => 437, height => 200) <br>
			slider3.jpg => (width => 437, height => 200) <br>
			slider4.jpg => (width => 437, height => 200) <br>
			image1.jpg => (width => 575, height => 250) <br>
		<?php } else if ($wireframe == 29){ ?>
			logo.png => (minWidth => 100, maxWidth => 300, minHeight => 20, maxHeight => 100) <br>
			lomogo.png => (minWidth => 50, maxWidth => 350, minHeight => 40, maxHeight => 350) <br>
			favicon.ico => (minWidth => 48, maxWidth => 64, minHeight => 48, maxHeight => 64) <br>
			slider1.jpg => (width => 539, height => 350) <br>
			slider2.jpg => (width => 539, height => 350) <br>
			slider3.jpg => (width => 539, height => 350) <br>
			image1.jpg => (width => 307, height => 175) <br>
			image2.jpg => (width => 307, height => 175) <br>
			image3.jpg => (width => 307, height => 175) <br>
			background.jpg => (minWidth => 2000, maxWidth => 2300, minHeight => 600, maxHeight => 700) <br>
		<?php } else if ($wireframe == 30){ ?>
			logo.png => (minWidth => 100, maxWidth => 300, minHeight => 20, maxHeight => 100) <br>
			lomogo.png => (minWidth => 50, maxWidth => 350, minHeight => 40, maxHeight => 350) <br>
			favicon.ico => (minWidth => 48, maxWidth => 64, minHeight => 48, maxHeight => 64) <br>
			slider1.jpg => (width => 652, height => 319) <br>
			slider2.jpg => (width => 652, height => 319) <br>
			slider3.jpg => (width => 652, height => 319) <br>
			image1.jpg => (width => 150, height => 132) <br>
			image2.jpg => (width => 150, height => 132) <br>
			image3.jpg => (width => 150, height => 132) <br>
			image1.png => (width => 150, height => 132) <br>
			image2.png => (width => 150, height => 132) <br>
			image3.png => (width => 150, height => 132) <br>
		<?php } ?>
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
								First make sure you are using the correct naming conventions for the images you want to upload. Every letter is lowercase, there are no spaces or dashes. If they are named incorrectly or the wrong size it will show up in the upload errors box. You will need to re-upload that file as it will automatically be deleted.
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

<?php if(!isset($_GET['domain']) & !isset($_GET['wireframe'])){ ?>

		<div class="panel taskform"  >
					
			<div class="panel-default">
				<div class="panel-heading">
					<div class="panel-title">
					Domains Ready <span class="sub-panel-title">-  Oldest Domains Ascending</span>
					</div>
				</div>
			</div>

		<?php
		$result = mysqli_query($con, 'SELECT * FROM ticket WHERE status = "design" ORDER BY date ASC LIMIT 20');

				if (!$result) {
					printf("Error: %s\n", mysqli_error($con));
					exit();
				}

				$i = 0;
				
				while ($row = mysqli_fetch_assoc($result)) {
				
					if (!$i++) echo "<table class='table table-striped' >
					<tr class=''>
					<th class='tTitle titleFont'>Date</th>
					<th class='tTitle titleFont'>Content Creator</th>
					<th class='tTitle titleFont'>URL</th>
					<th class='tTitle titleFont'>Wireframe</th>
					<th class='tTitle titleFont'>Language</th>
					<th class='tTitle titleFont'>Design Link</th>
					</tr>";

					$date = $row['date'];
					$username = $row['username'];
					$url = $row['url'];
					$wireframe = $row['wireframe'];
					$language = $row['language'];
					
					echo "<tr class=''>";
					echo "<td class='tCell'>" . $date . "</td>";
					echo "<td class='tCell'>" . $username . "</td>";
					echo "<td class='tCell'>" . $url . "</td>";
					echo "<td class='tCell'>" . $wireframe . "</td>";
					echo "<td class='tCell'>" . $language . "</td>";
					echo "<td class='tCell' ><a href='designbuilder.php?domain=".$url."&wireframe=".$wireframe."'><input type='hidden' id='domain' name='domain' value='$url'/><input style='margin: 0px; height: 24px; padding: 2px;' class='submitButton btn-primary' type='button' value='Add Images' /></a></td>";
					echo "</tr>";
				}
				echo "</table>";
		?>

		</div>
	</div>

<?php } ?>

<style>
.validation {
	margin: 2px !important;
}
label {
	margin: 0px;
	padding-top: 12px !important;
}
</style>
