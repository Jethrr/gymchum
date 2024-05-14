<?php 
    include 'connect.php';
    session_start();
    $fetch = "SELECT usertype FROM `tbluserprofile`";



    $query = mysqli_query($connection,$fetch);
   
    $currentuser = $_SESSION['user']; 
    

    $dataQuery = "SELECT * FROM tblappointments";
  
    $res = mysqli_query($connection, $dataQuery);

    $userRecords = "SELECT * FROM `tbluserprofile`";
    $userQuery = mysqli_query($connection, $userRecords);

    $userProfile = "SELECT * FROM `tbluseraccount`";
    $profileQuery = mysqli_query($connection, $userProfile);

    $totalUser = "SELECT COUNT(*) AS totalUser FROM `tbluserprofile` WHERE usertype = 'User'"; 
    $totalUserQuery = mysqli_query($connection, $totalUser);



    
    $totalTrainer = "SELECT COUNT(*) AS totalTrainer FROM `tbluserprofile` WHERE usertype = 'Trainer'"; 
    $totalTrainerQuery = mysqli_query($connection, $totalTrainer);

    $totalConfirmed = "SELECT COUNT(*) AS totalConfirmed FROM `tblappointments` WHERE status = 'Confirmed'"; 
    $totalConfirmedQuery = mysqli_query($connection, $totalConfirmed);

    $totalBookings = "SELECT COUNT(*) AS bookings_count FROM `tblappointments`"; 
    $totalBookingsQuery = mysqli_query($connection, $totalBookings);
    

    $userActive = "SELECT COUNT(*) AS totalActive FROM `tbluserprofile` WHERE status = 'Active'";
    $userActiveQuery = mysqli_query($connection, $userActive);
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
                  echo '<h1 class="font-bold text-xl bg-green-200 pl-3 pr-3 rounded-full">' . 'Admin' . '</h1>';
              }
        ?>
       <img src="images/profile.png" class="user-profile cursor-pointer" id="userDropdownBtn">
    <!-- <div class="dropdown-menu hidden absolute top-12 right-0 bg-white shadow-lg rounded w-40">
        <a href="#" class="block p-2 hover:bg-gray-200">Log Out</a>
        <a href="#" class="block p-2 hover:bg-gray-200">Settings</a>
    </div> -->
    </div>
	
	
    </nav>
    

    <!-- main section tab -->
    <main class="flex-1 flex shadow-lg bg-white rounded">
    <div class="sidebar shadow p-3 bg-white pt-5 w-72">
        <a href="admin.php" class="block p-3 hover:bg-gray-200"><i class="fa-regular fa-calendar-days mr-1"></i>Records</a>
    
       
        <a class="more block p-3 hover:bg-gray-200 cursor-pointer" id="more"><i class="fa-solid fa-bars"></i> More</a>
        <div id="popup" class="hidden absolute bg-gray-200 shadow-lg rounded w-60 mt-2 mr-10">
          
            <a href="logout.php" class="block p-3">Logout</a>
        </div>


        
    </div>
    <section class="side-main flex-1 bg-gray-100">
        <!-- Your main content goes here -->
     
        <div class="headings ml-20 mr-20 mt-10">
          <h1 class="font-bold text-2xl">Booking</h1>
          <p>All bookings</p>
          <div class="filter-options mt-5">
            <select id="statusFilter" class="bg-gray-200 p-2 rounded" onchange="filterTable()">
              <option value="All">All</option>
              <option value="Confirmed">Confirmed</option>
              <option value="Decline">Decline</option>
              <option value="Cancelled">Cancelled</option>
            </select>
         </div>
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
                          
                          echo "<td class='p-3 text-sm text-gray-700 whitespace-nowrap'>" . '<button class="bg-black text-white pl-5 pr-5 pt-1 pb-1 rounded-full font-semibold" ">Edit</button>' . "</td>";

                          echo "</tr>";
                          
                        }
                    } else {
                        echo "<tr><td colspan='4'>No records found</td></tr>";
                    }
                    ?>
              </tbody>
            </table>
       </div>
    


       <div class="headings ml-20 mr-20 mt-10">
          <h1 class="font-bold text-2xl">Accounts</h1>
          <p>All Accounts</p>

          
        </div>




        <div class="search-container ml-20 mr-20 mt-5">
            <input type="text" id="searchInput" onkeyup="searchTable()" placeholder="Search" class="p-2 border rounded w-full">
        </div>

       
        <div class="overflow-auto rounded-lg shadow hidden md:block mt-5 bg-gray-100 m-20">
            <table class="w-full" id="userTable">
              <thead class="bg-gray-200 border-b-2 border-gray-200">
              <tr>
             
                <th class="w-20 p-3 text-sm font-semibold tracking-wide text-left">Firsname</th>
                <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left">Lastname</th>
                <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left">Gender</th>
                <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left">Usertype</th>
                <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left">Status</th>
              </tr>
              </thead>
              <tbody class="divide-y divide-gray-100">
              <?php
                    
                    if (mysqli_num_rows($userQuery) > 0) {
                        
                        while ($row = mysqli_fetch_assoc($userQuery)) {
                          echo "<tr>";
                         
                          echo "<td class='p-3 text-sm text-gray-700 whitespace-nowrap'>" . $row["firstname"] . "</td>";
                          echo "<td class='p-3 text-sm text-gray-700 whitespace-nowrap'>" . $row["lastname"] . "</td>";
                          echo "<td class='p-3 text-sm text-gray-700 whitespace-nowrap'>" . $row["gender"] . "</td>";
                          echo "<td class='p-3 text-sm text-gray-700 whitespace-nowrap'>" . $row["usertype"] . "</td>";
                          $statusClass = '';
                          if ($row["status"] == 'Active') {
                              $statusClass = 'text-green-600 font-bold'; 
                          } else if ($row["status"] == 'Inactive') {
                              $statusClass = 'text-red-600 font-bold'; 
                          } else {
                            $statusClass = 'text-black font-bold'; 
                          }
                          echo "<td class='p-3 text-sm text-gray-700 whitespace-nowrap " . $statusClass . "'>" . $row["status"] . "</td>";
                          
                         

                          echo "</tr>";
                          
                        }
                    } else {
                        echo "<tr><td colspan='4'>No records found</td></tr>";
                    }
                    ?>
              </tbody>
            </table>
       </div>


       
       <div class="headings ml-20 mr-20 mt-10">
          <h1 class="font-bold text-2xl">Profile Information</h1>
          <p>Profile Details and Information</p>
        </div>

        <div class="searchInfoContainer ml-20 mr-20 mt-5">
            <input type="text" id="search-info" onkeyup="searchInfo()" placeholder="Search" class="p-2 border rounded w-full">
        </div>

        <div class="overflow-auto rounded-lg shadow hidden md:block mt-5 bg-gray-100 m-20">
        <table class="w-full infoTable">
              <thead class="bg-gray-200 border-b-2 border-gray-200">
              <tr>
             
                <th class="w-20 p-3 text-sm font-semibold tracking-wide text-left w-1/2">Username</th>
                <th class="w-24 p-3 text-sm font-semibold tracking-wide text-left w-1/2">Email</th>
                
               
              </tr>
              </thead>
              <tbody class="divide-y divide-gray-100">
              <?php
                    
                    if (mysqli_num_rows($profileQuery) > 0) {
                        
                        while ($row = mysqli_fetch_assoc($profileQuery)) {
                          echo "<tr>";
                         
                          echo "<td class='p-3 text-sm text-gray-700 whitespace-nowrap'>" . $row["username"] . "</td>";
                          echo "<td class='p-3 text-sm text-gray-700 whitespace-nowrap'>" . $row["emailadd"] . "</td>";
                        
                          
                         
                          echo "</tr>";
                          
                        }
                    } else {
                        echo "<tr><td colspan='4'>No records found</td></tr>";
                    }
                    ?>
              </tbody>
            </table>
       </div>

       <div class="headings ml-20 mr-20 mt-10">
          <h1 class="font-bold text-2xl">Statistics</h1>
         
        </div>
        <div class="overflow-auto rounded-lg shadow hidden md:block mt-5 bg-gray-100 m-20">
            <table class="w-full">
              <thead class="bg-black border-b-2 border-gray-200 text-white">
              <tr>
             
                <th class="w-20 p-3 text-sm font-semibold tracking-wide text-left w-1/2">Total Number of Users</th>
            
                
               
              </tr>
              </thead>
              <tbody class="divide-y divide-gray-100">
              <?php
                    
                    if (mysqli_num_rows($totalUserQuery) > 0) {
                        
                        while ($row = mysqli_fetch_assoc($totalUserQuery)) {
                          echo "<tr>";
                         
                          echo "<td class='p-3 text-sm text-gray-700 whitespace-nowrap font-bold'>" . $row["totalUser"] . "</td>";
                          
                        
                          
                         
                          echo "</tr>";
                          
                        }
                    } else {
                        echo "<tr><td colspan='4'>No records found</td></tr>";
                    }
                    ?>
              </tbody>
            </table>
       </div>


       <div class="overflow-auto rounded-lg shadow hidden md:block mt-5 bg-gray-100 m-20">
            <table class="w-full">
              <thead class="bg-black border-b-2 border-gray-200 text-white">
              <tr>
             
                <th class="w-20 p-3 text-sm font-semibold tracking-wide text-left w-1/2">Total Number of Trainers</th>
            
                
               
              </tr>
              </thead>
              <tbody class="divide-y divide-gray-100">
              <?php
                    
                    if (mysqli_num_rows($totalTrainerQuery) > 0) {
                        
                        while ($row = mysqli_fetch_assoc($totalTrainerQuery)) {
                          echo "<tr>";
                         
                          echo "<td class='p-3 text-sm text-gray-700 whitespace-nowrap font-bold'>" . $row["totalTrainer"] . "</td>";
                          
                        
                          
                         
                          echo "</tr>";
                          
                        }
                    } else {
                        echo "<tr><td colspan='4'>No records found</td></tr>";
                    }
                    ?>
              </tbody>
            </table>
       </div>


        <div class="overflow-auto rounded-lg shadow hidden md:block mt-5 bg-gray-100 m-20">
            <table class="w-full">
              <thead class="bg-black border-b-2 border-gray-200 text-white">
              <tr>
             
                <th class="w-20 p-3 text-sm font-semibold tracking-wide text-left w-1/2">Total Number of Bookings</th>
            
                
               
              </tr>
              </thead>
              <tbody class="divide-y divide-gray-100">
              <?php
                    
                    if (mysqli_num_rows($totalBookingsQuery) > 0) {
                        
                        while ($row = mysqli_fetch_assoc($totalBookingsQuery)) {
                          echo "<tr>";
                         
                          echo "<td class='p-3 text-sm text-gray-700 whitespace-nowrap font-bold'>" . $row["bookings_count"] . "</td>";
                          
                        
                          
                         
                          echo "</tr>";
                          
                        }
                    } else {
                        echo "<tr><td colspan='4'>No records found</td></tr>";
                    }
                    ?>
              </tbody>
            </table>
       </div>


       <div class="overflow-auto rounded-lg shadow hidden md:block mt-5 bg-gray-100 m-20">
            <table class="w-full">
              <thead class="bg-black border-b-2 border-gray-200 text-white">
              <tr>
             
                <th class="w-20 p-3 text-sm font-semibold tracking-wide text-left w-1/2">Number of Confirmed  Bookings</th>
            
                
               
              </tr>
              </thead>
              <tbody class="divide-y divide-gray-100">
              <?php
                    
                    if (mysqli_num_rows($totalConfirmedQuery) > 0) {
                        
                        while ($row = mysqli_fetch_assoc($totalConfirmedQuery)) {
                          echo "<tr>";
                         
                          echo "<td class='p-3 text-sm text-gray-700 whitespace-nowrap font-bold'>" . $row["totalConfirmed"] . "</td>";
                          
                        
                          
                         
                          echo "</tr>";
                          
                        }
                    } else {
                        echo "<tr><td colspan='4'>No records found</td></tr>";
                    }
                    ?>
              </tbody>
            </table>
       </div>

       <div class="overflow-auto rounded-lg shadow hidden md:block mt-5 bg-gray-100 m-20">
            <table class="w-full">
              <thead class="bg-black border-b-2 border-gray-200 text-white">
              <tr>
             
                <th class="w-20 p-3 text-sm font-semibold tracking-wide text-left w-1/2">Active Accounts</th>
            
                
               
              </tr>
              </thead>
              <tbody class="divide-y divide-gray-100">
              <?php
                    
                    if (mysqli_num_rows($userActiveQuery) > 0) {
                        
                        while ($row = mysqli_fetch_assoc($userActiveQuery)) {
                          echo "<tr>";
                         
                          echo "<td class='p-3 text-sm text-gray-700 whitespace-nowrap font-bold'>" . $row["totalActive"] . "</td>";
                          
                        
                          
                         
                          echo "</tr>";
                          
                        }
                    } else {
                        echo "<tr><td colspan='4'>No records found</td></tr>";
                    }
                    ?>
              </tbody>
            </table>
       </div>
    


       <div class="grid grid-cols-2 gap-4 p-10">
            <div class="border p-4">
              <h1 class="font-bold">Bookings</h1>
                <img src="/images/bookings.png" alt="Image 1" class="w-full h-full object-cover">
            </div>
            <div class="border p-4">
            <h1 class="font-bold">Gender</h1>
                <img src="/images/gender.png" alt="Image 2" class="w-full h-full object-cover">
            </div>
            <div class="border p-4">
            <h1 class="font-bold">User Status</h1>
                <img src="/images/userstatus.png" alt="Image 3" class="w-full h-full object-cover">
            </div>
            <div class="border p-4">
            <h1 class="font-bold">User Types</h1>
                <img src="/images/usertypes.png" alt="Image 4" class="w-full h-full object-cover">
            </div>
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


        function filterTable() {
            const filterValue = document.getElementById('statusFilter').value;
            const table = document.querySelector('table tbody');
            const rows = Array.from(table.rows);

            rows.forEach(row => {
              const status = row.cells[4].textContent.trim();
              if (filterValue === 'All' || status === filterValue) {
                row.style.display = '';
              } else {
                row.style.display = 'none';
              }
            });
       }



       function searchTable() {
    
              var input, filter, table, tr, td, i, txtValue;
              input = document.getElementById("searchInput");
              filter = input.value.toUpperCase();
              table = document.getElementById("userTable");
              tr = table.getElementsByTagName("tr");

              
              for (i = 0; i < tr.length; i++) {
                  td = tr[i].getElementsByTagName("td")[0]; // Change index to match the column you want to search
                  if (td) {
                      txtValue = td.textContent || td.innerText;
                      if (txtValue.toUpperCase().indexOf(filter) > -1) {
                          tr[i].style.display = "";
                      } else {
                          tr[i].style.display = "none";
                      }
                  }
              }
        }

        function searchInfo() {
              var input, filter, table, tr, td, i, txtValue;
              input = document.getElementById("search-info");
              filter = input.value.toUpperCase();
              table = document.getElementsByClassName("infoTable")[0]; 
              tr = table.getElementsByTagName("tr");

              for (i = 1; i < tr.length; i++) { // Start from 1 to skip the header row
                  td = tr[i].getElementsByTagName("td")[0]; // Change index to match the column you want to search
                  if (td) {
                      txtValue = td.textContent || td.innerText;
                      if (txtValue.toUpperCase().indexOf(filter) > -1) {
                          tr[i].style.display = "";
                      } else {
                          tr[i].style.display = "none";
                      }
                  }
              }
        }


   

    </script>
  </body>
</html>
