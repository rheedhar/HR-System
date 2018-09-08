<?php 

  session_start();

?>



<!DOCTYPE html>

<html lang="en" dir="ltr">

  <head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="stylesheet" href="css/login.css">

    <title></title>

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

      <div class="container">

          <div class="logoh">Reset Password</div>

          <div class="login-item">

            <form action="includes/sfforgot.inc.php" method="post" class="form form-login">



              <div class="form-field">

                <label class="user" for="username"><span class="hidden">Email</span></label>

                <input type="text" name="email" placeholder="Email" required>

              </div>



              <div class="form-field">

                <input type="submit" name="submit" value="Submit">

              </div>



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

