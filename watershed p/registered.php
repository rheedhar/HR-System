<?php 

session_start();



if(!isset($_SESSION['h_id'])){

     header('Location: index.html');

} else 

   if((time() - $_SESSION['time_stamp']) > 900){

         header('Location: logout.php');

     } else {



include 'includes/dbh.inc.php';



$sql = 'SELECT * FROM users';

$result = mysqli_query($conn, $sql);



}



?>





<!DOCTYPE html>

<html lang="en" dir="ltr">

  <head>

    <meta charset="utf-8">

    <title>Registered Users</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <link rel="stylesheet" href="css/register.css">

  </head>

  <body>

    <div class="">

      <table id="table">

        <thead>

          <tr>

            <th>Id</th>

            <th>First Name</th>

            <th>Last Name</th>

            <th>Email</th>

            <th>Username</th>

            <th>Profile</th>

            <th>Status</th>

            <th>Block</th>

          </tr>

        </thead>

        <tbody>

          <?php 

          $no = 1;

        while ($row = mysqli_fetch_assoc($result)) {

          echo 

          "<tr>

            <td>".$no."</td>

            <td>".$row['user_first']."</td>

            <td>".$row['user_last']."</td>

            <td>".$row['user_email']."</td>

            <td><span class='user'>".$row['user_username']."</span></td>

            <td><a href='usersprofile.php?user=".$row['user_id']."'>view profile</a></td>

            <td><span class='active'>".$row['active']."</span></td>

            <td>

             <input type='checkbox' data-staff-id='".$row['user_id']."' class='changeStatus'>

            </td>

          </tr>";

          $no++;

        }

        

          ?>

        </tbody>

      </table>

      

    </div>

    

     <script src="js/register.js">
     </script>

  </body>

</html>