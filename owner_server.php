<?php
	include('include/config.php');

$store_name = "";
$store_address = "";
$store_phonenumber = '0';
$store_category = "";

	if (isset($_POST['submit'])) {
    $username = $_SESSION['username'];
    $store_name = $_POST['store_name'];
    $store_address = $_POST['store_address'];
		$store_phonenumber = $_POST['store_phonenumber'];
		$store_category = $_POST['store_category'];

    $sql = "INSERT INTO stores (username, store_name ,store_address,store_phonenumber,store_category ) VALUES ('$username', '$store_name', '$store_address', '$store_phonenumber','$store_category')";
    if(mysqli_query($db, $sql)){
      header('location: ownerpage.php');
    } else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
}

if (isset($_GET['del'])) {
	$store_id = $_GET['del'];
	mysqli_query($db, "DELETE FROM stores WHERE store_id=$store_id");
	mysqli_query($db, "DELETE FROM products WHERE store_id=$store_id");
	$_SESSION['message'] = "Address deleted!";
	header('location: ownerpage.php');
}

if (isset($_POST['edit1'])) {
	$store_id = $_SESSION['store_id'];
	$username = $_SESSION['username'];
	$store_name = $_POST['store_name'];
	$store_address = $_POST['store_address'];
	$store_phonenumber= $_POST['store_phonenumber'];
	$store_category = $_POST['store_category'];

	mysqli_query($db, "UPDATE stores SET stores.store_id = '$store_id', stores.username='$username', stores.store_name='$store_name', stores.store_address='$store_address',
  stores.store_phonenumber='$store_phonenumber',store.store_category = '$store_category'  WHERE stores.store_id= '$store_id' ");
	$_SESSION['message'] = "Address updated!";
	header('location: ownerpage.php');
}

?>
