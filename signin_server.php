<?php
include('include/config.php');

$username = "";
$password = "";

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $_SESSION['username'] = $username;

$signin_query = "SELECT * FROM user_signup WHERE username='$username' AND password='$password'";
$results = mysqli_query($db, $signin_query);
$row = mysqli_fetch_array($results);
if (mysqli_num_rows($results) == 1) {
  if($row['role'] == "customer"){
header('location: homepage.php');
}
else {
  include('logincustomer.php');
  include('include/WrongType_customer.php');
}
}

else {
  include('logincustomer.php');
  include('include/WrongType_customer.php');
}
}

 ?>
