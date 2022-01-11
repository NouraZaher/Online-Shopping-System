<?php
	include('include/config.php');

	if (isset($_POST['submit'])) {
    echo "yes";
    $search_name = $_POST['search_name'];
    header("Location: homepage-sq.php?search=".$search_name);

}
?>
