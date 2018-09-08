<?php
session_start();
  if(isset($_POST['submit'])) {

    include 'dbh.inc.php';

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    //ERROR HANDLERS
    //check if input is empty;

    if(empty($username) || empty($password)) {
      header("Location: ../sflogin.php");
      exit();
    } else {
      $sql ="SELECT * FROM users WHERE user_email ='$username' OR user_username = '$username'";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);
      if($resultCheck < 1 ){
        header("Location: ../sflogin.php?login=invalid");
        exit();
      }else {
        if($row = mysqli_fetch_assoc($result)){
            $hashedPwdcheck = password_verify($password, $row['user_password']);
          if($hashedPwdcheck == false) {
           header("Location: ../sflogin.php?login=invalid");
           exit();
          } elseif ($hashedPwdcheck == true && $row['active']=='active') {
            $_SESSION['u_id'] = $row['user_id'];
            $_SESSION['u_first'] = $row['user_first'];
            $_SESSION['u_last'] = $row['user_last'];
            $_SESSION['u_email'] = $row['user_email'];
            $_SESSION['u_username'] = $row['user_username'];
            $_SESSION['u_image'] = $row['user_image'];
            $_SESSION['u_qualification'] = $row['user_qualification'];
            $_SESSION['u_skills'] = $row['user_skills'];
            $_SESSION['u_talents'] = $row['user_talents'];
            $_SESSION['u_ability'] = $row['user_ability'];
            $_SESSION['u_leave'] = $row['user_leave'];
            $_SESSION['u_report'] = $row['user_report'];
            $_SESSION['u_performance'] = $row['user_performance'];
            $_SESSION['u_current'] = $row['user_current'];
            $_SESSION['u_position'] = $row['user_position'];
            $_SESSION['u_image'] = $row['user_image'];
            $_SESSION['u_description'] = $row['user_description'];
            $_SESSION['dob'] = $row['user_dob'];
            $_SESSION['u_department'] = $row['user_department'];
            $_SESSION['u_supervisor'] = $row['user_supervisor'];
            $_SESSION['strength'] = $row['user_strength'];
            $_SESSION['weakness'] = $row['user_weakness'];
            $_SESSION['time_stamp'] = time();
            header("Location: ../profile.php");
            exit();
          } else {
             header("Location: ../index.html"); 
          }
        }
      }
    }


  } else {
    header("Location: ../index.html");
    exit();
  }
