<?php
session_start();

if(!isset($_SESSION['h_id'])){
     header('Location: index.html');
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Profile</title>\
        <link rel="stylesheet" href="css/profile.css">
    </head>
    <body>
        <div>
            <h1>Hello, Welcome Back</h1>
            <p><a href='registered.php'>Click me to view everyone</a></p>
        </div>
    </body>
</html>