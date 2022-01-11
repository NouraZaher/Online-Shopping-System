<?php
	include('include/config.php');



if (isset($_GET['fav'])) {

	$store_id = $_GET['fav'];
	$username = $_SESSION['username'];
	$sql = "INSERT INTO fav (username, store_id ) VALUES ('$username', '$store_id')";
	if(mysqli_query($db, $sql)){
		header('location: homepage.php');
	} else{
	echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
 }

}
?>
