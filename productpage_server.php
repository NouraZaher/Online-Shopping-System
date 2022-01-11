<?php
	include('include/config.php');


	if (isset($_GET['add'])) {
    $username = $_SESSION['username'];
    $store_id = $_SESSION['store_id'];
    $product_id = $_GET['add'];
		$query = "SELECT product_discount FROM products WHERE product_id = '$product_id' ";
		$getresult =  mysqli_query($db, $query);
		while ($row = mysqli_fetch_array($getresult)) {
			$product_discount = $row['product_discount'];
		}

    $sql = "INSERT INTO orders (customerName, store_id, product_id,product_discount, def ) VALUES ('$username', '$store_id', '$product_id','$product_discount','cart')";
    if(mysqli_query($db, $sql)){
      $_SESSION['store_id'] = $store_id;
      header('location: productpage.php');
    } else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
}
?>
