<?php
include('include/config.php');





	if (isset($_POST['submit'])) {
		$order_id = $_POST['order_id'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['order_address'];
		$quantity = $_POST['quantity'];



    mysqli_query($db, "UPDATE orders SET phone_number ='$phone_number', address='$address', quantity = '$quantity',def = 'ordered' WHERE order_id = '$order_id'");
    header('location : homepage.php');

}

if (isset($_GET['del'])) {
	$order_id = $_GET['del'];
	mysqli_query($db, "DELETE FROM orders WHERE order_id=$order_id");
	header('location: cartviewpage.php');
}
?>
