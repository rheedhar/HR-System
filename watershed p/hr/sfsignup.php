<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1">
    <title>Register Users</title>
    <link rel="stylesheet" href="../css/signup.css">
  </head>
  <body>
    <section class="main-container">
      <div class="container">
        <div class="sign_logo">Register Users</div>
        <div class="signup_field">
          <form class="form" action="../includes/sfsignup.inc.php" method="post">
            <div class="input">
              <!--<label for="firstname">First Name</label>-->
              <input type="text" name="firstname" placeholder="First Name">
            </div>

            <div class="input">
              <!--<label for="lastname">Last Name</label>-->
              <input type="text" name="lastname" placeholder="Last Name">
            </div>

            <div class="input">
              <!--<label for="username">User Name</label>-->
              <input type="emai" name="email" placeholder="Email">
            </div>

            <div class="input">
              <!--<label for="email">Email</label>-->
              <input type="text" name="username" placeholder="Username">
            </div>

            <div class="input">
              <!--<label for="password">Password</label>-->
              <input type="password" name="password" placeholder="Password">
            </div>

            <?php

           $fullurl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
           if (strpos($fullurl, "signup=invalid")==true){
               echo "<p class='error'>invalid characters</p>";
           } else if(strpos($fullurl, "user=exist")==true) {
               echo "<p class='error'>Username already exist</p>";
           } else if(strpos($fullurl, "signup=success")==true) {
             echo "<p id='success'>User Registered Successful </p>";
           } else if(strpos($fullurl, "email=exist")==true){
               echo "<p class='error'>Email already exist</p>";
           }

            ?>

            <div class="input">
              <input type="submit" name="submit">
            </div>
          </form>

        </div>
      </div>
    </section>
  </body>
</html>
