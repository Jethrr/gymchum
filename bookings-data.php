<?php 
    include 'connect.php';

    $fetch = "SELECT usertype FROM `tbluserprofile`";
    $query = mysqli_query($connection,$fetch);

    $fetch1 = "SELECT * FROM `tbluserprofile` WHERE usertype = 'trainer'";
    $query2 = mysqli_query($connection,$fetch1);
    $firstname = $_GET['coach'];

    $getData = "SELECT * FROM `tblappointments` WHERE coach = '$firstname'";
    $getQuery = mysqli_query($connection, $getData);
   


    if(isset($_POST['btnSave'])){
       
         
         $txtdate = mysqli_real_escape_string($connection, $_POST['booking-date']); 
         $txttime = mysqli_real_escape_string($connection, $_POST['booking-time']); 
         $txtservice = mysqli_real_escape_string($connection, $_POST['coaching-service']); 
         session_start();
         $userData = $_SESSION["user"];
      
        
      
         $myquery = "UPDATE  tblappointments SET dates = '$txtdate', timee = '$txttime', services = '$txtservice' WHERE coach = '$firstname'"; 
         $myresult = mysqli_query($connection,$myquery); 
         
        
        
        echo "<script>alert('Sucess!');</script>";

        }


        if(isset($_POST['btnDelete'])){
         
          $myquery = "DELETE FROM tblappointments WHERE coach = '$firstname'"; 
          $myresult = mysqli_query($connection,$myquery); 
         
          echo "<script>alert('Appointment deleted!');</script>";
      }

   
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="/css/style.css" />
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
   
  </head>
  <body class="flex flex-col min-h-screen">

  <!-- navigation bar -->
  <nav class="p-5 flex items-center justify-between text-black ">
      <div class="logo-div flex items-center ml-10">
      
        <h1 class="font-bold text-2xl ">GYMCHUM</h1>

        
      </div>
      <div
        class="nav-link flex justify-between items-center space-x-4 ml-auto mr-10 font-bold p-2 text-l"
      > 
      </div>


      
      <div class="userProfile w-10 mr-28 flex items-center gap-3" id="user-profile">
          <?php
              if (mysqli_num_rows($query) > 0) {
                  $row = mysqli_fetch_assoc($query);
                  echo '<h1 class="font-bold text-xl bg-gray-200 pl-3 pr-3 rounded-full">' . $row['usertype'] . '</h1>';
              }
        ?>
        <img src="images/profile.png" class="user-profile " id="userProf">
      </div>
    </nav>


    <!-- main section tab -->
    <main class="flex-1 flex shadow-lg bg-white rounded">
    <div class="sidebar shadow p-3  bg-white pt-5 w-72">
        <a href="mainpage.php" class="block p-3  hover:bg-gray-200"><i class="fa-regular fa-calendar-days mr-1"></i>Bookings</a>
        <a href="appointment.php" class="block p-3  hover:bg-gray-200"><i class="fa-regular fa-calendar-check mr-1"></i>Book an appointment</a>
        <a href="membership.php" class="block p-3 "><i class="fa-solid fa-user mr-1"></i>Membership</a>
    </div>
    <section class="side-main flex-1 bg-gray-100 p-10">
        <!-- Your main content goes here -->
    
        <p><a href="mainpage.php"><span><<</span> Go back</a></p>

        <div class="bookings-nav h-3/4 my-16 flex justify-center items-center ">
        <form method="POST" class="bg-white p-5 h-full w-full max-w-2xl rounded-md">
                <h1 class="text-3xl font-bold mb-5">Edit Bookings</h1>
                <label class="font-semibold text-xl" for="booking-date">Date</label>
                <br>
                <input type="date" id="booking-date" name="booking-date" required class="border border-black w-full p-3" value="<?php 
                    
                    if ($getQuery->num_rows > 0) {
                   
                      while($row = $getQuery->fetch_assoc()) {
                        echo $row["dates"];
                      }
                    } else {
                      echo "0 results";
                    }
                ?>">
                <br><br>
                
                <label class="font-semibold text-xl" for="booking-time">Time</label>
                <br>
                <select id="booking-time" name="booking-time" required class="border border-black w-full p-3">
                    <option value="" disabled selected></option> 
                    <option value="9:00AM - 10:00AM">9:00AM - 10:00AM</option>
                    <option value="10:30AM - 11:30AM">10:30AM - 11:30AM</option>
                    <option value=" 1:00AM - 2:00AM">1:00AM - 2:00AM</option>
                </select><br><br>
                
                <label class="font-semibold text-xl" for="coaching-service">Coaching Service</label>
                <br>
                <select id="coaching-service" name="coaching-service" required class="border border-black w-full p-3">
                    <option value="" disabled selected><?php
                       
                      
                    ?></option> 
                    
                    <option value="Coaching">Coaching</option>
                    <option value="Conditioning">Conditioning</option>
                    <option value="Fitness Assessments">Fitness Assessments</option>
                </select><br><br>
                <button type="submit" class="bg-red-700 text-white p-5 w-28 float-end ml-3" name="btnDelete">Delete</button>
                <button type="submit" class="bg-black text-white p-5 w-28 float-end" name="btnSave">Save</button>
               
        </form>

        </div>





  


    </section>
    </main>


    <!-- footertab -->
    <footer
      class="bg-black text-white mt-auto p-3 flex items-center justify-center"
    >
      <div class="footer-content flex items-center justify-center space-x-4">
        <div>
          <h2>Jether Omictin</h2>
          <h2>BSCS-2</h2>
        </div>
        <div>
          <h2>Karl Christian Ajero</h2>
          <h2>BSCS-2</h2>
        </div>
      </div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
    <script src="script.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
      integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
