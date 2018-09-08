<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Success</title>
  <link rel="stylesheet" href="css/message.css">
</head>
<body>
<div class="form">
    <h1><?= 'Success'; ?></h1>
    <p>
    <?php 
    if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ):
        echo $_SESSION['message'];    
    else:
        header( "location: index.php" );
    endif;
    ?>
    </p>
    <a href="index.html"><button class="button button-block"/>Home</button></a>
</div>
</body>
</html>
