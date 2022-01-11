<?php
include('include/config.php');


if (isset($_GET['edit'])) {
  $order_id = $_GET['edit'];

	mysqli_query($db, "UPDATE orders SET def = 'sent' WHERE order_id= '$order_id' ");
	header('location: orderpage_owner.php');
}

?>
