<?php
include ("config.php");
$date = date("y-m-d");

$domain = $_GET['domain'];


$totaltime = mysqli_query($con, "SELECT * FROM ticket WHERE url = '" . $domain . "' ");
$totaltime1 = mysqli_fetch_array($totaltime);
$status = $totaltime1['status'];

if ($status != 'design'){
		if(isset($_GET['domain'])){

		$domain_name = $_GET['domain'];
		$file_path = ('dropzone/content/' . $domain_name . '/content.json');


		$file = $file_path;

		if(!file_exists($file)){ // file does not exist
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

		mysqli_query($con, "UPDATE ticket  SET status = 'completed', date = '$date' WHERE url = '$domain_name'");

	} else {
		echo 'No domain Set.';
	}
} else{
	echo "Status in Design.";
}

?>