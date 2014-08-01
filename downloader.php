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

} else {
	echo 'No domain Set.';
}
?>