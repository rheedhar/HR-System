<?php
session_start();

  if(isset($_POST['submit'])) {

    include_once "dbh.inc.php";
    
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $first = mysqli_real_escape_string($conn, $_POST['firstname']);
    $last = mysqli_real_escape_string($conn, $_POST['lastname']);
    $qualification = mysqli_real_escape_string($conn, $_POST['qualification']);
    $skills = mysqli_real_escape_string($conn, $_POST['skills']);
    $talents = mysqli_real_escape_string($conn, $_POST['talents']);
    $ability = mysqli_real_escape_string($conn, $_POST['ability']);
    $leave = mysqli_real_escape_string($conn, $_POST['leave']);
    $report = mysqli_real_escape_string($conn, $_POST['report']);
    $position = mysqli_real_escape_string($conn, $_POST['position']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $dob = $_POST['dob']; 
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $supervisor = mysqli_real_escape_string($conn, $_POST['supervisor']);
    $strength = mysqli_real_escape_string($conn, $_POST['strength']);
    $weakness = mysqli_real_escape_string($conn, $_POST['weakness']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']); 
    $marital = mysqli_real_escape_string($conn, $_POST['marital']); 
    $state = mysqli_real_escape_string($conn, $_POST['state']); 
    $lga = mysqli_real_escape_string($conn, $_POST['lga']); 
    $startdate = mysqli_real_escape_string($conn, $_POST['start']); 
    $achievement = mysqli_real_escape_string($conn, $_POST['achievement']); 
    $status = mysqli_real_escape_string($conn, $_POST['status']); 
     
    
    $sql ="SELECT * FROM users WHERE user_username ='$username'";
    $result = mysqli_query($conn, $sql);
    $row =mysqli_fetch_assoc($result);
      
    $image = $row['user_image'];
    
    
    

      if(isset($_FILES['upload'])){
        $file_name = ""; 
        $file_name = $_FILES['upload']['name'];
        $file_type = $_FILES['upload']['type'];
        $file_tmp_name = $_FILES['upload']['tmp_name'];
        $file_size = $_FILES['upload']['size'];
        $target_dir = "";
         
        // target directory
        $target_dir = "uploads/";
        $user_image = '';
      
        // uploading file
        if(move_uploaded_file($file_tmp_name,$target_dir.$file_name)) {
          $user_image = $target_dir.$file_name;
        }
        
        if($file_size === 0){
            $sql = "UPDATE users SET user_first = '$first', user_last = '$last', user_qualification = '$qualification', user_skills = '$skills', user_talents= '$talents', user_ability = '$ability', user_leave = '$leave', user_report = '$report', user_position= '$position', user_image = '$image', user_description = '$description', user_dob = '$dob', user_department= '$department', user_supervisor= '$supervisor', user_strength = '$strength', user_gender = '$gender', user_marital = '$marital', user_state = '$state', user_lga = '$lga', user_startdate = '$startdate', user_achievement = '$achievement', user_status = '$status', user_weakness= '$weakness' WHERE user_username = '$username'";
              
         if (mysqli_query($conn, $sql)){
              $_SESSION['message'] = "Congratulations! Records Updated Successfully";
              header("location: ../usersuccess.php");
         } else {
             echo 'Records not updated';
         }
         
        } else {
            $sql = "UPDATE users SET user_first = '$first', user_last = '$last', user_qualification = '$qualification', user_skills = '$skills', user_talents= '$talents', user_ability = '$ability', user_leave = '$leave', user_report = '$report', user_position= '$position', user_image = '$user_image', user_description = '$description', user_dob = '$dob', user_department= '$department', user_supervisor= '$supervisor', user_strength = '$strength', user_gender = '$gender', user_marital = '$marital', user_state = '$state', user_lga = '$lga', user_startdate = '$startdate', user_achievement = '$achievement', user_status = '$status', user_weakness= '$weakness' WHERE user_username = '$username'";
              
         if (mysqli_query($conn, $sql)){
              $_SESSION['message'] = "Congratulations! Records Updated Successfully";
              header("location: ../usersuccess.php");
         } else {
             echo 'Records not updated';
         }
         
        }
          
        
                 
    } else {
      echo 'No file selected';
    }
           
 } else {
    header("Location: ../index.html");
  }

?>