<?php
  session_start();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="css/login.css">
    <title>Log in </title>
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
            <li><a href="#">News</a></li>
            <li>
                <a>HR</a>
                <ul>
                    <li><a href="hrlogin.php">Login</a></li>
                    <li><a href="hr/hrsignup.php">Sign up</a></li>
                </ul>
            </li>
            <li><a href="sflogin.php">Login</a></li>
          </ul>
        </nav>
      </nav>
    </header>

    <div class="container1">
<!--- User Sign in-->
      <div class="container">
          <div class="logoh">HR Login</div>
          <div class="login-item">
            <form action="includes/hrlogin.inc.php" method="post" class="form form-login">

              <div class="form-field">
                <label class="user"for="username"><span class="hidden">Username</span></label>
                <input type="text" name="username" placeholder="Username / Email" required>
              </div>

              <div class="form-field">
                <label class="lock"for="password"><span class="hidden">Password</span></label>
                <input type="password" name="password" placeholder="Password" required>
              </div>

              <div class="form-field">
                <input type="submit" name="submit" value="Log in">
              </div>
              
              <div class="forgot">
                  <a href="hrpassword.php">Forgot Password?</a>
              </div>

              <?php

             $fullurl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
             if (strpos($fullurl, "login=invalid")==true){
                 echo "<p id='error'>Invalid Parameters</p>";
             }

             ?>

            </form>
        </div>

      </div>

    </div>
    
    <footer id="footer">
      <div class="copyright">
				<span class="not">&copy; <?php echo date('Y'); ?></span>
			</div>
    </footer>


  </body>
</html>
