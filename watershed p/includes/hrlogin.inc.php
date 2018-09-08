<?php
session_start();
  if(isset($_POST['submit'])) {

    include 'dbh.inc.php';

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    //ERROR HANDLERS
    //check if input is empty;

    if(empty($username) || empty($password)) {
      header("Location: ../hrlogin.php");
      exit();
    } else {
      $sql ="SELECT * FROM hr WHERE hr_email ='$username' OR hr_username = '$username'";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);
      if($resultCheck < 1 ){
        header("Location: ../hrlogin.php?login=invalid");
        exit();
      }else {
        if($row = mysqli_fetch_assoc($result)){
            $hashedPwdcheck = password_verify($password, $row['hr_password']);
          if($hashedPwdcheck == false) {
           header("Location: ../hrlogin.php?login=invalid");
           exit();
          } elseif ($hashedPwdcheck == true) {
            $_SESSION['h_id'] = $row['hr_id'];
            $_SESSION['h_first'] = $row['hr_first'];
            $_SESSION['h_last'] = $row['hr_last'];
            $_SESSION['h_email'] = $row['hr_email'];
            $_SESSION['h_username'] = $row['hr_username'];
            $_SESSION['time_stamp'] = time();
            header("Location: ../hrprofile.php");
            exit();
          }
        }
      }
    }


  } else {
    header("Location: ../hrlogin.php?login=error");
    exit();
  }
