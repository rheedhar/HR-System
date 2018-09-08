<?php
/* Password reset process, updates database with new user password */
session_start();

// Make sure the form is being submitted with method="post"
  if(isset($_POST['submit'])) { 
      
     include_once "dbh.inc.php";
     
    // Make sure the two passwords match
    if ( $_POST['newpassword'] == $_POST['confirmpassword'] ) { 

        $new_password = password_hash($_POST['newpassword'], PASSWORD_DEFAULT);
        
        // We get $_POST['email'] and $_POST['hash'] from the hidden input field of reset.php form
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $hash = mysqli_real_escape_string($conn, $_POST['hash']);
        
        $sql = "UPDATE hr SET hr_password='$new_password', hash='$hash' WHERE hr_email='$email'";

        if ( mysqli_query($conn, $sql) ) {

        $_SESSION['message'] = "Your password has been reset successfully!";
        header("location: ../success.php");    

        }

    }
    else {
        $_SESSION['message'] = "Two passwords you entered don't match, try again!";
        header("location: ../error.php");    
    }

}
?>