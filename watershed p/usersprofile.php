<?php 

session_start();



if(!isset($_SESSION['h_id'])){

     header('Location: index.html');

} else {



$userid = $_GET['user'];



include ('includes/dbh.inc.php');





    $sql ="SELECT * FROM users WHERE user_id ='$userid'";

    $result = mysqli_query($conn, $sql);

    $row =mysqli_fetch_assoc($result);

      

    $id = $row['user_id'];

    $first = $row['user_first'];

    $last = $row['user_last'];

    $email = $row['user_email'];

    $username = $row['user_username'];

    $image = $row['user_image'];

    $qualification = $row['user_qualification'];

    $skills = $row['user_skills'];

    $talents = $row['user_talents'];

    $ability = $row['user_ability'];

    $leave = $row['user_leave'];

    $report = $row['user_report'];

    $performance = $row['user_performance'];

    $u_current = $row['user_current'];

    $u_position = $row['user_position'];

    $u_image = $row['user_image'];

    $u_description = $row['user_description'];

    $dob = $row['user_dob'];

    $u_department = $row['user_department'];

    $u_supervisor = $row['user_supervisor'];

    $strength = $row['user_strength'];

    $weakness = $row['user_weakness'];

    $gender = $row['user_gender'];

    $Marital = $row['user_marital'];

    $state = $row['user_state'];

    $lga = $row['user_lga'];

    $startdate = $row['user_startdate'];

    $achievement = $row['user_achievement'];

    $status = $row['user_status'];

}



function explodedata($var){ 

    $pieces = explode(",", $var); 

    foreach($pieces as $element) { 

        echo $element."<br/>"; 

        

    } 

    

}



$age = date_diff(date_create($dob), date_create('now'))->y;



?>






<!DOCTYPE html>

<html lang="en" dir="ltr">

  <head>

    <meta charset="utf-8">

    <title>Profile</title>

    <link rel="stylesheet" href="css/profile.css">

    <link rel="stylesheet" href="../css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  </head>

  <body>

   <div class="topnav" id="myTopnav">

      <a href="" class="active1">Home</a>

       <a href="../ExtraXml_dump/php/Register.php" >Ciser Data</a>

       <a href="../php/site_schedule.php" >site_schedule</a>

       <a href="../watershed p/registered.php" >registered Users</a>

       <a href="../watershed p/hr/sfsignup.php" >Staff signup</a>

        <a href="../watershed p/logout.php"  class="logout">Logout</a>

       <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>

   </div>

      <div class="main" id="main">

        <header>

          <div class="detail">

            <h2><?php echo $first.' '.$last; ?></h2>

            <p><?php echo $u_position; ?></p>

            <p><?php echo $u_description; ?></p>

          </div>



          <div class="image">

            <img src="<?php echo 'includes/'.$u_image; ?>" alt="profile picture">

            <button id="mybtn">Edit Profile</button>

          </div>

          

        </header>

        

             <div id="mymodal" class="modal">

                 <span class="close">&times;</span>

                  <form id ="editform" class="modal-content ajax" method="post" action="includes/users.inc.php" enctype="multipart/form-data">

                      <p>Personal Information</p>

                      

                      <label>First Name</label>

                      <input type='text' name='firstname' placeholder='first name' value="<?php echo $first; ?>">

                      

                      <label>last Name</label>

                      <input type='text' name='lastname' placeholder='last name' value="<?php echo $last; ?>">

                      

                      <label>Date of Birth</label>

                      <input type='date' name='dob' placeholder='Date of Birth' value="<?php echo $dob; ?>">

                      

                      <label>Gender</label>

                      <input type='text' name='gender' placeholder='Gender' value="<?php echo $gender; ?>">

                      

                      <label>Marital Status</label>

                      <input type='text' name='marital' placeholder='Marital Status' value="<?php echo $Marital; ?>">

                      

                      <label>State of Origin</label>

                      <input type='text' name='state' placeholder='State of Origin' value="<?php echo $state; ?>">

                      

                      <label>L.G.A</label>

                      <input type='text' name='lga' placeholder='L.G.A' value="<?php echo $lga; ?>">

                      

                      

                      

                      <p>Employment Information</p>

                      

                      <label>Start Date</label>

                      <input type='date' name='start' value="<?php echo $startdate; ?>">

                      

                      <label>Position</label>

                      <textarea name='position'><?php echo $u_position; ?></textarea>

                      

                      <label>Job Description</label>

                      <textarea name='description'><?php echo $u_description; ?></textarea>

                      

                      <label>Employment Status</label>

                      <input type='text' name='status' value="<?php echo $status; ?>">

                      

                      <label>Department</label>

                      <textarea name='department'><?php echo $u_department; ?></textarea>

                      

                      <label>Supervisor</label>

                      <textarea name='supervisor'><?php echo $u_supervisor; ?></textarea>

                      

                      <label>Qualifications</label>

                      <textarea name='qualification'><?php echo $qualification; ?></textarea>

                      

                      <label>Skills</label>

                      <textarea name='skills'><?php echo $skills; ?></textarea>

                      

                      <label>Achievements</label>

                      <textarea name='achievement'><?php echo $achievement; ?></textarea>

                      

                      <label>Talents</label>

                      <textarea name='talents'><?php echo $talents; ?></textarea>

                      

                      <label>Ability</label>

                      <textarea name='ability'><?php echo $ability; ?></textarea>

                      

                      <label>Strengths</label>

                      <textarea name='strength'><?php echo $strength; ?></textarea>

                      

                      <label>Weaknesses</label>

                      <textarea name='weakness'><?php echo $weakness; ?></textarea>

                      

                      <label>Leave</label>

                      <textarea name='leave'><?php echo $leave; ?></textarea>

                      

                      <label>Comments</label>

                      <textarea name='report'><?php echo $report; ?></textarea>

                      

                      <input type="file" name="upload" id="file">

                      

                      <input type='hidden' name='username' id="username" value='<?php echo $username; ?>'>

                      

                      <input id ='mybutton' type='submit' name='submit' value='save'>

                  </form>

              </div>



        <section>

          <div class="personal">

            <div class="pheader">

              <h1>Personal Information</h1>

            </div>

            <p>Gender: <span><?php echo $gender ; ?></span></p>

            <p>Date of Birth: <span><?php echo $dob ; ?></span></p>

            <p>Age: <span><?php echo  $age ?></span></p>

            <p>Marital Status: <span><?php echo $Marital ; ?></span></p>

            <p>State of Origin: <span><?php echo $state ; ?></span></p>

            <p>L.G.A: <span><?php echo $lga ; ?></span></p>

            

          </div>

          

          <div class="pheader">

              <h1>Employment Information</h1>

          </div>



          <p>Start Date: <span><?php echo $startdate ; ?></span></p>

          <p>Department: <span><?php echo $u_department ; ?></span></p>

          <p>Employment Status: <span><?php echo $status ; ?></span></p>

          <p>Supervisor: <span><?php echo $u_supervisor ; ?></span></p>

          

          <div class="personal">

            <div class="phead">

              <h3>Qualification</h3>

            </div>

              <p><?php explodedata($qualification); ?></p>

          </div>



          <div class="personal">

            <div class="phead">

              <h3>Skills</h3>

            </div>

            <p><?php echo $skills ; ?></p>

          </div>



          <div class="personal">

            <div class="phead">

              <h3>Talents</h3>

            </div>

            <p><?php echo $talents ; ?></p>

          </div>

          

          <div class="personal">

            <div class="phead">

              <h3>Abilities</h3>

            </div>

            <p><?php echo $ability; ?></p>

          </div>

          

          

          <div class="personal">

            <div class="phead">

              <h3>Strengths</h3>

            </div>

            <p><?php echo $strength; ?></p>

          </div>

          

           <div class="personal">

            <div class="phead">

              <h3>Achievements</h3>

            </div>

            <p><?php echo $achievement; ?></p>

          </div>

          

          <div class="personal">

            <div class="phead">

              <h3>Weakness</h3>

            </div>

            <p><?php echo $weakness; ?></p>

          </div>

          

          <div class="personal">

            <div class="phead">

              <h3>Leave Period</h3>

            </div>

            <p><?php echo $leave; ?></p>

          </div>

          

          <div class="personal">

            <div class="phead">

              <h3>Comments</h3>

            </div>

            <p><?php echo $report; ?></p>

          </div>

          

          <!-- Building a calender-->

          <!--<iframe src="https://calendar.google.com/calendar/embed?showTitle=0&amp;showNav=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;showTz=0&amp;height=300&amp;wkst=1&amp;bgcolor=%23ffffff&amp;src=chkjs444qcjo9vdds3m987mh0k%40group.calendar.google.com&amp;color=%2323164E&amp;ctz=Africa%2FLagos" style="border-width:0" width="200" height="250" frameborder="0" scrolling="no"></iframe>-->



        </section>



        <div class="pheader">

              <h1>Monthly Reports</h1>

          </div>

        <section class='calender'>

        <input type="date" id="selectDate">





        <div id="scoremodal">

            <span class="scoreclose">&times;</span>

            <form id='calender'>

            <label>First Name</label>

            <input type="text" id="fname" name="fname">

            

            <label>Last Name</label>

            <input type="text"  id="lname" name="lname">

            

            <label>Start Date</label>

            <input type="date" id="start_date" name="start">

            

            <label>End Date</label>

            <input type="date"  id="end_date" name="end">

            

            <input type="text" placeholder="Score(%)"  id="score" name="score">

            

            <input type="text" placeholder="Week"  id="week" name="week">

            

            <button type="submit" class="saveScore">Save</button>

        </form>

        </div

        

        

        <button id="addscore">Add Score</button>



        <div class='label'>

           <h1 class='week'>Week 1</h1>

           <h1 class='week'>Week 2</h1> 

           <h1 class='week'>Week 3</h1> 

           <h1 class='week'>Week 4</h1> 

        </div>

        

        <div class='mainBar'>

            <div class='barContainer'>

                <div class='bar color1'>30%</div>

            </div>

        

            <div class='barContainer'>

                <div class='bar color2'>80%</div>

            </div>

        

            <div class='barContainer'>

                <div class='bar color3'>65%</div>

            </div>

        

            <div class='barContainer'>

                <div class='bar color4'>49%</div>

            </div> 

        </div>

        

    </section>



      </div>

      

      <script src="js/usersprofile.js"></script>

  </body>

</html>







