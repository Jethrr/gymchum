<?php 
    include 'connect.php';
 

    $fetch = "SELECT usertype FROM `tbluserprofile`";
    $query = mysqli_query($connection,$fetch);

    $fetch1 = "SELECT * FROM `tbluserprofile` WHERE usertype = 'trainer'";
    $query2 = mysqli_query($connection,$fetch1);
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
                  echo '<h1 class="font-bold text-xl bg-green-200 pl-3 pr-3 rounded-full">' . $row['usertype'] . '</h1>';
              }
        ?>
        <img src="images/profile.png" class="user-profile " id="userProf">
      </div>
    </nav>


    <!-- main section tab -->
    <main class="flex-1 flex shadow-lg bg-white rounded">
    <div class="sidebar shadow p-3 bg-white pt-5 w-72">
        <a href="mainpage.php" class="block p-3 hover:bg-gray-200"><i class="fa-regular fa-calendar-days mr-1"></i>Bookings</a>
        <a href="appointment.php" class="block p-3 hover:bg-gray-200"><i class="fa-regular fa-calendar-check mr-1"></i>Book an appointment</a>
        <a href="membership.php" class="block p-3"><i class="fa-solid fa-user mr-1"></i>Membership</a>
        <a class="more block p-3 hover:bg-gray-200"><i class="fa-solid fa-bars"></i> More</a>
        <div id="popup" class="hidden absolute bg-gray-200 shadow-lg rounded w-40 mt-2 mr-10">
            <a href="" class="block p-3 hover:bg-gray-200">Settings</a>
            <a href="logout.php" class="block p-3">Logout</a>
        </div>
    </div>
    <section class="side-main flex-1 bg-gray-100 p-10">
        <!-- Your main content goes here -->
     
        <h1 class="text-3xl  font-bold mt-10">Available Coaches</h1>
        <p>Find the right coach for you</p>

        <div class="overflow-auto rounded-lg shadow hidden md:block mt-5 bg-gray-100">
            <table class="w-full">
              <thead class="bg-gray-50 border-b-2 border-gray-200">
              <tr>
                <th class="w-20 p-3 text-sm font-semibold tracking-wide text-left">Status</th>
                <th class="w-20 p-3 text-sm font-semibold tracking-wide text-left">Firstname</th>
                <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left">Lastname</th>
                <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left">Gender</th>
                <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left">Position</th>
                <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left"></th>
              </tr>
              </thead>
              <tbody class="divide-y divide-gray-100">
              <?php
                    
                    if (mysqli_num_rows($query2) > 0) {
                        
                        while ($row = mysqli_fetch_assoc($query2)) {
                          echo "<tr>";
                          echo "<td class='p-3 text-sm text-gray-700 whitespace-nowrap'>". 'N/A' . "</td>";
                          echo "<td class='p-3 text-sm text-gray-700 whitespace-nowrap'>" . $row["firstname"] . "</td>";
                          echo "<td class='p-3 text-sm text-gray-700 whitespace-nowrap'>" . $row["lastname"] . "</td>";
                          echo "<td class='p-3 text-sm text-gray-700 whitespace-nowrap'>" . $row["gender"] . "</td>";
                          echo "<td class='p-3 text-sm text-gray-700 whitespace-nowrap'>" . $row["usertype"] . "</td>";
                          echo "<td class='p-3 text-sm text-gray-700 whitespace-nowrap'>" . '<button class="bg-black text-white pl-5 pr-5 pt-1 pb-1 rounded-full font-semibold" onclick="openBookingsTab(\'' . $row["firstname"] . '\')">Book</button>' . "</td>";

                          echo "</tr>";
                          
                        }
                    } else {
                        echo "<tr><td colspan='4'>No records found</td></tr>";
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
