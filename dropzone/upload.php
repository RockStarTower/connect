<?php
include('../config.php');
$ds = DIRECTORY_SEPARATOR; //1
 
$domain = $_POST['domain']; //2
$domain_dir = 'content/' . $domain;
$wireframe = $_POST['wireframe'];
$response = '';
$error = false;
$filename_array = array(
	'logo.png',
	'favicon.ico',
	'slider1.jpg',
	'slider1.png',
	'slider2.jpg',
	'slider3.jpg',
	'slider4.jpg',
	'image1.jpg',
	'image2.jpg',
	'image3.jpg',
	'image4.jpg',
	'image1.png',
	'image2.png',
	'image3.png',
	'image4.png',
	'icon1.png',
	'icon2.png',
	'icon3.png',
	'background.jpg',
	'background.png',
	'lomogo.png'
);


if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];          
	
	$filename = $_FILES['file']['name'];
	
	if ($filename == 'favicon.ico'){

		if (!file_exists($domain_dir)) {
			mkdir($domain_dir, 0777, true);
			if (!file_exists($domain_dir)) {
				die('Failed to create directory');
			}
		}

		$targetPath = dirname( __FILE__ ) . $ds . 'content' . $ds. $domain . $ds;  
		$targetFile =  $targetPath. $_FILES['file']['name'];  
		move_uploaded_file($tempFile,$targetFile); 

	}
	
	if( in_array($filename, $filename_array) && $filename != 'favicon.ico' ) {

		if (!file_exists($domain_dir)) {
			mkdir($domain_dir, 0777, true);
			if (!file_exists($domain_dir)) {
				die('Failed to create directory');
			}
		}



		$targetPath = dirname( __FILE__ ) . $ds . 'content' . $ds. $domain . $ds;  
	 
		$targetFile =  $targetPath. $_FILES['file']['name'];  
	 
		move_uploaded_file($tempFile,$targetFile); 

		$imagesize = getimagesize($targetFile);
		
		$arrLen = count($design_dimensions[$wireframe][$filename]);

		if ($arrLen == 2) {
		
			if ( !(($imagesize[0] == $design_dimensions[$wireframe][$filename]['width']) && ($imagesize[1] == $design_dimensions[$wireframe][$filename]['height'])) ) {
				
				unlink($targetFile);
				
				$response = '<div style="margin: 5px;">' . $filename . ' was not the right size. ' . $imagesize[0] . ' x ' . $imagesize[1] . '</div>';
				$error = true;
				
			}

				
		
		} else {

			if ( !( $imagesize[0] >= $design_dimensions[$wireframe][$filename]['minWidth'] && $imagesize[0] <= $design_dimensions[$wireframe][$filename]['maxWidth'] ) && !( $imagesize[1] >= $design_dimensions[$wireframe][$filename]['minHeight'] && $imagesize[1] <= $design_dimensions[$wireframe][$filename]['maxHeight'] ) ) {
				
				unlink($targetFile);
				
				$response = '<div style="margin: 5px;">' . $filename . ' was not the right size. ' . $imagesize[0] . ' x ' . $imagesize[1] . ' minWidth: ' . $design_dimensions[$wireframe][$filename]['minWidth'] . ' maxWidth: ' . $design_dimensions[$wireframe][$filename]['maxWidth'] . ' minHeight: ' . $design_dimensions[$wireframe][$filename]['minHeight'] . ' maxHeight: ' . $design_dimensions[$wireframe][$filename]['maxHeight'] . '</div>';
				$error = true;

			}

			

		}
		
    } else {
		
		if ($filename != 'favicon.ico'){
			$response =  '<div style="margin: 5px;">' . $filename . ' was named incorrectly.' . '</div>';
			$error = true;
		} else {
			$error = false;
		}
	}
}

if (!$error) {
	$response = 'success';
}

echo $response;

?>