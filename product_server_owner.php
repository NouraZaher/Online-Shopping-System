<?php
include('include/config.php');

$product_name ="";
$product_img ="";
$product_price='';
$product_description="";
$product_discount='';
$product_cost='';
$quantity = '';


	if (isset($_POST['submit'])) {
		$store_id = $_SESSION['store_id'];
		$product_name = $_POST['product_name'];
		$product_price = $_POST['product_price'];
		$product_description = $_POST['product_description'];
		$product_discount = $_POST['product_discount'];
		$product_cost = $_POST['product_cost'];
		$quantity = $_POST['quantity'];

		$image_dir= 'C:/wamp64/www/OSS/uploads/';
		move_uploaded_file($_FILES['product_img']['tmp_name'], $image_dir. $_FILES['product_img']['name']);
		$image =  $_FILES['product_img']['name'];


    $sql = "INSERT INTO products (store_id, product_name ,product_img,product_price,product_description,product_discount,product_cost,quantity ) VALUES ('$store_id', '$product_name', 'uploads/".$image."', '$product_price','$product_description','$product_discount','$product_cost','$quantity')";
    if(mysqli_query($db, $sql)){
      header('location: productpage_owner.php');
    } else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}
}

if (isset($_GET['del'])) {
	$product_id = $_GET['del'];
	mysqli_query($db, "DELETE FROM products WHERE product_id=$product_id");
	$_SESSION['message'] = "Address deleted!";
	header('location: productpage_owner.php');
}

if (isset($_POST['edit1'])) {
	$store_id = $_SESSION['store_id'];
	$product_id =  $_SESSION['product_id'];
	$product_name = $_POST['product_name'];
	$product_price = $_POST['product_price'];
	$product_description = $_POST['product_description'];
	$product_discount = $_POST['product_discount'];
	$product_cost = $_POST['product_cost'];

	$image_dir= 'uploads/';
	move_uploaded_file($_FILES['product_img']['tmp_name'], $image_dir. $_FILES['product_img']['name']);
	$image =  $_FILES['product_img']['name'];

	mysqli_query($db, "UPDATE products SET products.product_name='$product_name',products.product_img='uploads/".$image."', products.product_price='$product_price',
  products.product_description='$product_description',products.product_discount='$product_discount',products.product_cost='$product_cost' WHERE products.product_id= '$product_id' ");
	$_SESSION['message'] = "Address updated!";
	header('location: productpage_owner.php');
}

?>
