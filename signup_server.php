<?php
include('include/config.php');

$id = '0';
$full_name = "";
$username = "";
$password = "";



	if (isset($_POST['submit'])) {
		$username = $_POST['username'];
		$full_name = $_POST['full_name'];
    $password = $_POST['password'];

           $check = "SELECT username FROM user_signup WHERE username='$username'" ;
           $duplicate = mysqli_query($db,$check);
           if (mysqli_num_rows($duplicate)>0){
            include('signup.php');
            include('include/error.php');
          } else {

    $sql = "INSERT INTO user_signup (username, full_name ,password,role) VALUES ('$username','$full_name' ,'$password', 'customer')";
    if(mysqli_query($db, $sql)){
      include('logincustomer.php');
      include('include/success.php');
    } else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
}

}
}
?>
