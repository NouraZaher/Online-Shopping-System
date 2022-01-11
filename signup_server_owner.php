<?php
include('include/config.php');

$id = '0';
$full_name = "";
$username = "";
$password = "";
$address = "";
$bdate = "";
$phone_number = '0';


	if (isset($_POST['submit'])) {
		$username = $_POST['username'];
		$full_name = $_POST['full_name'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $bdate = $_POST['bdate'];
    $phone_number = $_POST['phone_number'];


           $check = "SELECT username FROM user_signup WHERE username='$username'" ;
           $duplicate = mysqli_query($db,$check);
           if (mysqli_num_rows($duplicate)>0){
            include('register.php');
            include('include/error.php');
          } else {

    $sql = "INSERT INTO user_signup (username, full_name ,password, address, bdate, phone_number, role) VALUES ('$username','$full_name' ,'$password' ,'$address','$bdate','$phone_number', 'owner')";
    if(mysqli_query($db, $sql)){
      include('index.php');
      include('include/success.php');
    } else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}

}
}
?>
