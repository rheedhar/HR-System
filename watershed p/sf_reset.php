<?php

session_start();



// Make sure email and hash variables aren't empty

if( isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash']) ){

    

    include_once "includes/dbh.inc.php";

    

    $email = mysqli_real_escape_string($conn, $_GET['email']);

    $hash =  mysqli_real_escape_string($conn, $_GET['hash']);



    // Make sure user email with matching hash exist

    $sql = "SELECT * FROM users WHERE user_email='$email' AND hash='$hash'";

    $result = mysqli_query($conn, $sql);

    $resultCheck = mysqli_num_rows($result);



    if ( $resultCheck == 0 )

    { 

        $_SESSION['message'] = "You have entered invalid URL for password reset!";

        header("location: error.php");

    }

}

else {

    $_SESSION['message'] = "Sorry, verification failed, try again!";

    header("location: error.php");  

}

?>



<!DOCTYPE html>

<html lang="en" dir="ltr">

  <head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale = 1">

    <title>Password Reset</title>

    <link rel="stylesheet" href="css/signup.css">

  </head>

  <body>

    <header>

      <nav class="navBar">

        <nav class="wrapper">

          <div class="logo"><a href="#">WS</a></div>

          <input type="checkbox" id="menu-toggle">

          <label for="menu-toggle" class="label-toggle"><i class="fas fa-bars"></i></label>

          <ul>

            <li><a href="#">Calender</a></li>

            <li><a href="#">Handbook</a></li>

            <li><a href="sflogin.php">Staff Login</a></li>

            <li><a href="hrlogin.php">HR Login</a></li>

            <li><a href="#">News</a></li>

          </ul>

        </nav>

      </nav>

    </header>

    

    <section class="main-container">

      <div class="container">

        <div class="sign_logo">Reset Password</div>

        <div class="signup_field">



          <form class="form" action="includes/sf_resetpassword.inc.php" method="post">



            <div class="input">

              <label for="newpassword">New Password</label>

              <input class="input1" type="password" name="newpassword">

            </div>



            <div class="input">

              <label for="confirmpassword">Confirm Password</label>

              <input class="input1" type="password" name="confirmpassword">

            </div>



            <input type="hidden" name="email" value="<?= $email ?>">

            <input type="hidden" name="hash" value="<?= $hash ?>">



            <div class="input">

              <input class="input1" type="submit" name="submit">

            </div>

          </form>



        </div>

      </div>

    </section>

    

    <footer id="footer">

      <div class="copyright">

				<span class="not">&copy; <?php echo date('Y'); ?></span>

			</div>

    </footer>

  </body>

</html>

