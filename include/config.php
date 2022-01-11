
<?php
if(session_id() == ''){
	session_start();
}

$db = mysqli_connect('localhost', 'root', '', 'oss');
if (!$db){
die('Could not connect: ' . mysql_error());
}
 ?>
