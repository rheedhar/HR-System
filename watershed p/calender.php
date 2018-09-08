<?php 

include 'includes/dbh.inc.php';

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$startDate = $_POST['start'];
$endDate = $_POST['end'];
$score = $_POST['score'];
$week = $_POST['week'];
$sql =  "INSERT INTO Calender(first_name, last_name, start_date, end_date, score, week) VALUES('$fname', '$lname', '$startDate', '$endDate', '$score', '$week')";


  if(mysqli_query($conn, $sql)){
      echo "Score saved Successfully";
  } else {
      echo "Score not saved Successfully";
  }

?>