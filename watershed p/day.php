<?php 

include 'includes/dbh.inc.php';

$date = $_POST['data'];





$sql = "UPDATE users SET active = '$block' WHERE user_id = '$id'";

$result = mysqli_query($conn, $sql);



?>