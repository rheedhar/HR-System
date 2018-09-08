<?php 

include 'includes/dbh.inc.php';

$block = $_POST['data'];
$id = $_POST['staff'];
$sql = "UPDATE users SET active = '$block' WHERE user_id = '$id'";

$result = mysqli_query($conn, $sql);



?>