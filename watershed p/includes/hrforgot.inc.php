<?php
session_start();

if(isset($_POST['submit'])){
    include 'dbh.inc.php';

    $email = mysqli_real_escape_string($conn, $_POST['email']);

    if(empty($email)){
      header('Location: ../hrpassword.php?email=empty');
      exit();
    } else {
      $sql = "SELECT * FROM hr WHERE hr_email ='$email'";
      $result = mysqli_query($conn, $sql);
      $resultCheck = mysqli_num_rows($result);
      if($resultCheck == 0){
        $_SESSION['message'] = "User with that email doesn't exist!";
        header('Location: ../error.php');
        exit();
      } else {
        $row = mysqli_fetch_assoc($result);

        $email = $row['hr_email'];
        $hash = $row['hash'];
        $firstname = $row['hr_first'];
        
        $_SESSION['message'] = "<p>Please check your email <span>$email</span>"
        . " for a confirmation link to complete your password reset!</p>";

        $to = $email;
        $subject = 'Password Reset Link';
        $message_body = '
        Hello '.$firstname.',

        You have requested password reset!

        Please click this link to reset your password:

        https://fareedatbello1.000webhostapp.com/watershed%20p/hr_reset.php?email='.$email.'&hash='.$hash;  

        mail($to, $subject, $message_body);

        header("location: ../success.php");
      }
    }


} 

?>
