<?php

$wireframe = $_POST['wireframe'];
$domain = $_POST['domain'];

$json_file = file_get_contents('content/' . $domain . '/content.json');

$json_data = json_decode($json_file, true);

$filename_array = array(
	'logo.png',
	'favicon.ico',
	'slider1.jpg',
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

foreach ($filename_array as $file) {
    $image_file = @file_get_contents('content/' . $domain . '/' . $file);
    $file_sub4 = substr($file, 0, 4);
    $file_base = substr($file, 0, -4);
    if ($image_file) {
        switch(true) {
            case $file_sub4 == 'imag' || $file_sub4 == 'icon':
                    $json_data['content']['homepage']['images'][] = base64_encode($image_file);
                break;
            case $file_sub4 == 'back':
                    $json_data['content']['homepage']['background'] = base64_encode($image_file);
                break;
            case $file_sub4 == 'slid':
                for ($i = 1; $i <= 4; $i++) {
                   $slider_images = @file_get_contents('content/' . $domain . '/' . 'slider' . $i . '.jpg');
                    if ($file_base != 'slider4') {
                        $json_data['content']['page' . $i]['slider_image'] = base64_encode($slider_images);
                    } else {
                        $json_data['content']['about']['slider_image'] = base64_encode($slider_images);
                    }
                }
                break;
            case $file_sub4 == 'logo' || $file_sub4 == 'favi' || $file_sub4 == 'lomo':
                    $json_data[$file_base] = base64_encode($image_file);
                break;
        }
    }
}

$json_data['content']['alttext'] = $_POST['alttext'];

$encode = json_encode($json_data);

if (file_put_contents('content/' . $domain . '/content.json', $encode)) {
    echo 'Content Updated!';
} else {
    echo "Error With Update";
}

?>