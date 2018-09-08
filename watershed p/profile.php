<?php 
session_start();

if(!isset($_SESSION['u_id'])){
     header('Location: index.html');
} else 
     
     if((time() - $_SESSION['time_stamp']) > 900){
         header('Location: logout.php');
     } else {
   
   $first = $_SESSION['u_first'];
   $last = $_SESSION['u_last'];
   $image = $_SESSION['u_image'];
   $qualification = $_SESSION['u_qualification'] ;
   $skill = $_SESSION['u_skills'];
   $talents = $_SESSION['u_talents'];
   $ability = $_SESSION['u_ability'];
   $leave = $_SESSION['u_leave'];
   $reports = $_SESSION['u_report'];
   $performance = $_SESSION['u_performance'];
   $current = $_SESSION['u_current'];
   $position =  $_SESSION['u_position'];
   $image = $_SESSION['u_image'];
   $description = $_SESSION['u_description'];
   $dob =  $_SESSION['dob'];
   $department = $_SESSION['u_department'];
   $supervisor = $_SESSION['u_supervisor'];
   $strength = $_SESSION['strength'];
   $weakness = $_SESSION['weakness'];
   
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
    <title>Profile</title>\
    <link rel="stylesheet" href="css/profile.css">
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
      <iframe src="https://calendar.google.com/calendar/embed?src=chkjs444qcjo9vdds3m987mh0k%40group.calendar.google.com&ctz=Africa%2FLagos" style="border: 0" width="800" height="600" frameborder="0" scrolling="no"></iframe>
      
      <div class="main">
        <header class="firstHeader">
          <div class="detail">
            <h2><?php echo $first.' '.$last; ?></h2>
            <p><?php echo $position; ?></p>
            <p><?php echo $description; ?></p>
            
          </div>

          <div class="image">
            <img src="<?php echo 'includes/'.$image; ?>" alt="profile picture">
          </div>
        </header>

        <section>
          <div class="personal">
            <div class="phead">
              <h3>General Information</h3>
            </div>
            <p>Date of Birth: <span><?php echo $dob; ?></span></p>
            <p>Age: <span><?php echo $age ?></span></p>
            <p>Department: <span><?php echo $department; ?></span></p>
            <p>Supervisor: <span><?php echo $supervisor; ?></span></p>
          </div>
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
            <p><?php echo $skill; ?></p>
          </div>

          <div class="personal">
            <div class="phead">
              <h3>Talents</h3>
            </div>
            <p><?php echo $talents; ?></p>
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
            <p><?php echo $reports; ?></p>
          </div>


        </section>

      <section class='calender'>
        <input type="date">
        
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
        
        
        <button>Add Score</button>
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
      
    <footer id="footer">
      <div class="copyright">
				<span class="not">&copy; 2018</span>
			</div>
    </footer>
    
    <script src="js/profile.js"></script>

  </body>
</html>



