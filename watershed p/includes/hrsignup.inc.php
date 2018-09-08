<?php
session_start();
  if(isset($_POST['submit'])) {

    include_once "dbh.inc.php";

    $first = mysqli_real_escape_string($conn, $_POST['firstname']);
    $last = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $hash = mysqli_real_escape_string($conn,  md5( rand(0, 1000) ) );


    //ERROR HANDLERS
    //check for empty fields

    if(empty($first) || empty($last) || empty($email) || empty($username) || empty($password)){
      header("Location: ../hr/hrsignup.php?signup=empty");
      exit();
    } else {
      // check input characters
      if(!preg_match("/^[a-zA-Z]*$/", $first) || !preg_match("/^[a-zA-Z]*$/", $last)){
        header("Location: ../hr/hrsignup.php?signup=invalid");
        exit();
      } else {
         // check if email is invalid
         if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
           header("Location: ../hr/hrsignup.php");
           exit();
         } else {
           // check if username already exist
           $sql = "SELECT * FROM hr WHERE hr_username = '$username'";
           $sql1 = "SELECT * FROM hr WHERE hr_email = '$email'";
           $result = mysqli_query($conn, $sql);
           $resultCheck = mysqli_num_rows($result);
           $result1 = mysqli_query($conn, $sql1);
           $resultCheck1 = mysqli_num_rows($result1);

           if($resultCheck > 0){
             header("Location: ../hr/hrsignup.php?user=exist");
             exit();
           }else if($resultCheck1 > 0){
               header("Location: ../hr/hrsignup.php?email=exist");
               exit();
           } else {
             //Hashing the password
             $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
             // insert user into database;
             $sql = "INSERT INTO hr(hr_first, hr_last, hr_email, hr_username, hr_password, hash) VALUES('$first', '$last', '$email', '$username', '$hashedPwd', '$hash')";
             
             
             mysqli_query($conn, $sql);
             $_SESSION['message'] = "Congratulations! You have successfully signed up.";
             header("location: ../success.php");
             exit();
           }
         }
      }
    }





  } else {
    header("Location: ../hr/hrsignup.php");
  }




?>
