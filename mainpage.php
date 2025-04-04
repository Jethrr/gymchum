<?php 
    include 'connect.php';
    session_start();
    $fetch = "SELECT usertype FROM `tbluserprofile`";

    $query = mysqli_query($connection,$fetch);
   
    $currentuser = $_SESSION['user']; 
    

    $dataQuery = "SELECT * FROM tblappointments WHERE userId = $currentuser ORDER BY `tblappointments`.`status` ASC";
  
    $res = mysqli_query($connection, $dataQuery);
    
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
  <nav class="p-5 flex items-center justify-between text-black shadow-md">
      <div class="logo-div flex items-center ml-10">
      
        <h1 class="font-bold text-2xl ">GYMCHUM</h1>

        
      </div>
      <div
        class="nav-link flex justify-between items-center space-x-4 ml-auto mr-10 font-bold p-2 text-l"
      > 
      </div>


      
      <div class="userProfile w-10 mr-28 flex items-center gap-3">
          <?php
              if (mysqli_num_rows($query) > 0) {
                  $row = mysqli_fetch_assoc($query);
                  echo '<h1 class="font-bold text-xl bg-green-200 pl-3 pr-3 rounded-full">' . 'User' . '</h1>';
              }
        ?>
       <img src="images/profile.png" class="user-profile cursor-pointer"  onclick="openDropdown();">
       <ul class="dropdown hidden absolute right-0 top-12 bg-white shadow-md rounded-md p-2" id="dropdown">
        <li><a href="#">Profile</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>

    </div>
	
	
    </nav>
    

    <!-- main section tab -->
    <main class="flex-1 flex shadow-lg bg-white rounded">
    <div class="sidebar shadow p-3 bg-white pt-5 w-72">
        <a href="mainpage.php" class="block p-3 hover:bg-gray-200"><i class="fa-regular fa-calendar-days mr-1"></i>Bookings</a>
        <a href="appointment.php" class="block p-3 hover:bg-gray-200"><i class="fa-regular fa-calendar-check mr-1"></i>Book an appointment</a>

        <a class="more block p-3 hover:bg-gray-200 cursor-pointer" id="more"><i class="fa-solid fa-bars"></i> More</a>
        <div id="popup" class="hidden absolute bg-gray-200 shadow-lg rounded w-60 mt-2 mr-10">
            <a href="user-settings.php" class="block p-3 hover:bg-gray-200">Settings</a>
            <a href="logout.php" class="block p-3">Logout</a>
        </div>
    </div>
    <section class="side-main flex-1 bg-gray-100">
        <!-- Your main content goes here -->
     
        <div class="headings ml-20 mr-20 mt-10">
          <h1 class="font-bold text-2xl">Booking</h1>
          <p>View your bookings here</p>
        </div>
        <div class="overflow-auto rounded-lg shadow hidden md:block mt-5 bg-gray-100 m-20">
            <table class="w-full">
              <thead class="bg-gray-200 border-b-2 border-gray-200">
              <tr>
             
                <th class="w-20 p-3 text-sm font-semibold tracking-wide text-left">Coach</th>
                <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left">Date</th>
                <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left">Time</th>
                <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left">Service</th>
                <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left">Status</th>
                <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left"></th>
              </tr>
              </thead>
              <tbody class="divide-y divide-gray-100">
              <?php
                    
                    if (mysqli_num_rows($res) > 0) {
                        
                        while ($row = mysqli_fetch_assoc($res)) {
                          echo "<tr>";
                         
                          echo "<td class='p-3 text-sm text-gray-700 whitespace-nowrap'>" . $row["coach"] . "</td>";
                          echo "<td class='p-3 text-sm text-gray-700 whitespace-nowrap'>" . $row["dates"] . "</td>";
                          echo "<td class='p-3 text-sm text-gray-700 whitespace-nowrap'>" . $row["timee"] . "</td>";
                          echo "<td class='p-3 text-sm text-gray-700 whitespace-nowrap'>" . $row["services"] . "</td>";
                          
                          $statusClass = '';
                          if ($row["status"] == 'Confirmed') {
                              $statusClass = 'text-green-600 font-bold'; 
                          } else if ($row["status"] == 'Decline') {
                              $statusClass = 'text-red-600 font-bold'; 
                          } else {
                            $statusClass = 'text-black font-bold'; 
                          }
                  
                          echo "<td class='p-3 text-sm text-gray-700 whitespace-nowrap " . $statusClass . "'>" . $row["status"] . "</td>";
                  
                          
                          echo "<td class='p-3 text-sm text-gray-700 whitespace-nowrap'>" . '<button class="bg-black text-white pl-5 pr-5 pt-1 pb-1 rounded-full font-semibold" onclick="openCancel(\'' . $row["appointmentId"] . '\')">Edit</button>' . "</td>";

                          echo "</tr>";
                          
                        }
                    } else {
                        echo "<tr><td colspan='4' class ='p-5'>No records found</td></tr>";
                    }
                    ?>
              </tbody>
            </table>
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



   

    <script src="js/script.js"></script>
    
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



    <script>
       const dropdown = document.getElementById("more");
       const popup = document.getElementById("popup");

      dropdown.addEventListener("click", function toggleDropDown() {
          popup.classList.toggle("hidden");
      });


        document.addEventListener("click", function closeDropDown(event) {
            if (!popup.contains(event.target) && event.target !== dropdown) {
                popup.classList.add("hidden");
            }
        });

    </script>
  </body>
</html>
