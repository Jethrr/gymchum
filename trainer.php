<?php 
    include 'connect.php';
    session_start();
    $fetch = "SELECT usertype FROM `tbluserprofile`";
    $query = mysqli_query($connection,$fetch);

   
    $currentUserName = $_SESSION['username'];

 
 
   

    // $sql1 = "SELECT a.*, u.firstname AS userName, s.emailadd AS emailAdd FROM `tblappointments` a JOIN `tbluserprofile` u ON a.userId = u.userId JOIN `tbluseraccount` s ON a.userId = s.acctId WHERE a.coach  = '$currentUserName' ";

    // $res = mysqli_query($connection, $sql1);

    $sql_pending = "SELECT a.*, u.firstname AS userName, s.emailadd AS emailAdd 
                FROM `tblappointments` a 
                JOIN `tbluserprofile` u ON a.userId = u.userId 
                JOIN `tbluseraccount` s ON a.userId = s.acctId 
                WHERE a.coach = '$currentUserName' 
                AND a.status = 'Pending'";
    $res_pending = mysqli_query($connection, $sql_pending);


    $sql_confirmed = "SELECT a.*, u.firstname AS userName, s.emailadd AS emailAdd 
                  FROM `tblappointments` a 
                  JOIN `tbluserprofile` u ON a.userId = u.userId 
                  JOIN `tbluseraccount` s ON a.userId = s.acctId 
                  WHERE a.coach = '$currentUserName' 
                  AND a.status = 'Confirmed'";
    $res_confirmed = mysqli_query($connection, $sql_confirmed);




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
    <script
  src="https://code.jquery.com/jquery-3.7.1.js"
  integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
  crossorigin="anonymous"></script>
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
                  echo '<h1 class="font-bold text-xl bg-green-200 pl-3 pr-3 rounded-full">' . 'Trainer' . '</h1>';
              }
        ?>
        <img src="images/profile.png" class="user-profile ">
      </div>
    </nav>


    <!-- main section tab -->
    <main class="flex-1 flex shadow-lg bg-white rounded">
    <div class="sidebar shadow p-3  bg-white pt-5 w-72">
      
        <a href="trainer.php" class="block p-3  hover:bg-gray-200"><i class="fa-regular fa-calendar-check mr-1"></i>Appointments</a>
        <a href="settings-trainer.php" class="block p-3 "><i class="fa-solid fa-gear mr-1"></i>Settings</a>
        <a class="more block p-3 hover:bg-gray-200 cursor-pointer" id="more"><i class="fa-solid fa-bars"></i> More</a>
        <div id="popup" class="hidden absolute bg-gray-200 shadow-lg rounded w-60 mt-2 mr-10">
            <a href="logout.php" class="block p-3">Logout</a>
        </div>
    </div>
    <section class="side-main flex-1 bg-gray-100">
        <!-- Your main content goes here -->
     
        <div class="headings ml-20 mr-20 mt-10">
          <h1 class="font-bold text-2xl">Available Booking</h1>
          <p>See bookings here</p>
        </div>
        <div class="overflow-auto rounded-lg shadow hidden md:block mt-5 bg-gray-100 m-20">
    <table class="w-full table-fixed">
        <thead class="bg-gray-200 border-b-2 border-gray-200">
            <tr>
                <th class="w-1/6 p-3 text-sm font-semibold tracking-wide text-left">Name</th>
                <th class="w-1/6 p-3 text-sm font-semibold tracking-wide text-left">Email</th>
                <th class="w-1/6 p-3 text-sm font-semibold tracking-wide text-left">Date</th>
                <th class="w-1/6 p-3 text-sm font-semibold tracking-wide text-left">Time</th>
                <th class="w-1/6 p-3 text-sm font-semibold tracking-wide text-left">Service</th>
                <th class="w-1/6 p-3 text-sm font-semibold tracking-wide text-left">Actions</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            <?php
            if (mysqli_num_rows($res_pending) > 0) {
                while ($row = mysqli_fetch_assoc($res_pending)) {
                    echo "<tr>";
                    echo "<td class='w-1/6 p-3 text-sm text-gray-700 whitespace-nowrap'>" . $row["userName"] . "</td>";
                    echo "<td class='w-1/6 p-3 text-sm text-gray-700 whitespace-nowrap'>" . $row["emailAdd"] . "</td>";
                    echo "<td class='w-1/6 p-3 text-sm text-gray-700 whitespace-nowrap'>" . $row["dates"] . "</td>";
                    echo "<td class='w-1/6 p-3 text-sm text-gray-700 whitespace-nowrap'>" . $row["timee"] . "</td>";
                    echo "<td class='w-1/6 p-3 text-sm text-gray-700 whitespace-nowrap'>" . $row["services"] . "</td>";
                    echo "<td class='w-1/6 p-3 text-sm text-gray-700 whitespace-nowrap'>";
                    echo '<button name="btnConfirmBook" class="btnOpenConfirm bg-black text-white pl-5 pr-5 pt-1 pb-1 rounded-full font-semibold" " id="btnConfirm" value="' . $row["appointmentId"] . '" onclick="confirmBooking(' . $row["appointmentId"] . ')">Confirm</button>';
                    echo '<button class="bg-red-700 text-white pl-5 pr-5 pt-1 pb-1 rounded-full font-semibold" onclick="deleteBooking(' . $row["appointmentId"] . ')">Decline</button>';

                    

                    // echo '<button class="bg-red-700 text-white pl-5 pr-5 pt-1 pb-1 rounded-full font-semibold" onclick="openCancelDialog(\'' . $row["userName"] . '\')">Decline</button>';
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6' class ='p-5'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>


<div class="headings ml-20 mr-20 mt-10">
          <h1 class="font-bold text-2xl">Confirmed Booking</h1>
          <p>Your bookings here</p>
        </div>

<div class="overflow-auto rounded-lg shadow hidden md:block mt-5 bg-gray-100 m-20">
    <table class="w-full table-fixed">
        <thead class="bg-gray-200 border-b-2 border-gray-200">
            <tr>
                <th class="w-1/6 p-3 text-sm font-semibold tracking-wide text-left">Name</th>
                <th class="w-1/6 p-3 text-sm font-semibold tracking-wide text-left">Email</th>
                <th class="w-1/6 p-3 text-sm font-semibold tracking-wide text-left">Date</th>
                <th class="w-1/6 p-3 text-sm font-semibold tracking-wide text-left">Time</th>
                <th class="w-1/6 p-3 text-sm font-semibold tracking-wide text-left">Service</th>
             
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
            <?php
            if (mysqli_num_rows($res_confirmed) > 0) {
                while ($row = mysqli_fetch_assoc($res_confirmed )) {
                    echo "<tr>";
                    echo "<td class='w-1/6 p-3 text-sm text-gray-700 whitespace-nowrap'>" . $row["userName"] . "</td>";
                    echo "<td class='w-1/6 p-3 text-sm text-gray-700 whitespace-nowrap'>" . $row["emailAdd"] . "</td>";
                    echo "<td class='w-1/6 p-3 text-sm text-gray-700 whitespace-nowrap'>" . $row["dates"] . "</td>";
                    echo "<td class='w-1/6 p-3 text-sm text-gray-700 whitespace-nowrap'>" . $row["timee"] . "</td>";
                    echo "<td class='w-1/6 p-3 text-sm text-gray-700 whitespace-nowrap'>" . $row["services"] . "</td>";
                 
                    

                    // echo '<button class="bg-red-700 text-white pl-5 pr-5 pt-1 pb-1 rounded-full font-semibold" onclick="openCancelDialog(\'' . $row["userName"] . '\')">Decline</button>';
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6' class ='p-5'>No records found</td></tr>";
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




    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
    <script src="./js/script.js"></script>
    
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


    function confirmBooking(appointmentId) {
    swal({
        title: "Are you sure?",
        text: "Once confirmed, this appointment will be marked as confirmed!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willConfirm) => {
        if (willConfirm) {
            // User clicked the confirm button
            // Perform the update operation
            $.ajax({
                type: 'POST',
                url: 'confirm.php', // Replace 'your_php_script.php' with the actual path to your PHP script
                data: {appointmentId: appointmentId }, 
                success: function(response) {
                    swal("Success!", "Appointment confirmed successfully!", "success");
                    // Reload the page

                    setTimeout(function() {
                      location.reload();
                    }, 3000); 
                  
                },
                error: function() {
                    swal("Error!", "Failed to confirm appointment!", "error");
                }
            });
        } else {
          
        }
    });
}




    function deleteBooking(appointmentId) {
        swal({
            title: "Are you sure?",
            text: "Once decline, this appointment will be permanently decline!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                // User clicked the delete button
                // Perform the delete operation
                $.ajax({
                    type: 'POST',
                    url: 'decline.php',
                    data: { appointmentId: appointmentId },
                    success: function(response) {
                        swal("Appointment Successfully Decline!", {
                            icon: "success",
                        });
                        // Optionally, reload the page or update the table
                    setTimeout(function() {
                      location.reload();
                    }, 3000); 
                    },
                    error: function() {
                        swal("Error!", "Failed to delete appointment!", "error");
                    }
                });
            } else {
             
            }
        });
    }



   
</script>



  </body>
</html>
