<?php
include 'connect.php';
session_start();
$fetch = "SELECT usertype FROM `tbluserprofile`";
$query = mysqli_query($connection,$fetch);

$currentUser = $_SESSION['user'];

$fetch1 = "SELECT * FROM `tbluserprofile` WHERE usertype = 'Trainer'";
$query2 = mysqli_query($connection,$fetch1);

$user = "SELECT * FROM `tbluserprofile` WHERE userId = $currentUser";
$userQuery = mysqli_query($connection,$user);



// if(isset($_POST['update'])){
//     $fname = mysqli_real_escape_string($connection, $_POST['firstname']);
//     $lname = mysqli_real_escape_string($connection, $_POST['lastname']);
//     $gender = mysqli_real_escape_string($connection, $_POST['gender']);


//     $updateUser = "UPDATE `tbluserprofile` SET firstname = '$fname', lastname = '$lname', gender = '$gender' WHERE userId = '$currentUser'";
//     $updateQuery = mysqli_query($connection,$updateUser);
    
    

//     $registerMessage = "Updated successfully.";
// }


// if(isset($_POST['deactivate'])){
  


//     $deactUser = "UPDATE `tbluserprofile` SET status = 'Inactive' WHERE userId = '$currentUser'";
//     $deactQuery = mysqli_query($connection,$deactUser);
    
    

//     $registerMessage = "Your account is deactivated. You are redirected back to the login page";
//     echo '<script>setTimeout(function(){window.location.href="logout.php";}, 5000);</script>';
// }





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

  <div class="message-box <?php echo ($registerMessage != "") ? 'active' : ''; ?>">
            <span class="close-btn" onclick="this.parentElement.classList.remove('active');">&times;</span>
            <?php echo $registerMessage; ?>
        </div>


       


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
                  echo '<h1 class="font-bold text-xl bg-green-200 pl-3 pr-3 rounded-full">' . 'Trainer'. '</h1>';
              }
        ?>
        <img src="images/profile.png" class="user-profile " id="userProf">
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
    <section class="side-main flex-1 bg-gray-100 p-10">

    <p><a href="trainer.php"><span><<</span> Go back</a></p>
        <!-- Your main content goes here -->
        <div class="header-section">
        <h1 class="text-3xl  font-bold mt-10">Account Information</h1>
        <p>Configure your settings in this page</p>
      
        </div>
       
       
       
        

        <div class="information-col h-full border-black mt-5 border-solid border-black">
      
        <?php 
            if ($userQuery->num_rows > 0) {
                while($row = $userQuery->fetch_assoc()) {
                    echo "<form method='POST' id='booking-form'>";
                    echo "<p class='text-xl mb-1 font-semibold'>Firstname</p>";
                    echo "<input class='w-full p-2 mb-5 rounded-xl' type='text' name='firstname' value='".$row["firstname"]."'><br>";
                    echo "<p class='text-xl mb-1 font-semibold'>Lastname</p>";
                    echo "<input class='w-full p-2 mb-5 rounded-xl' type='text' name='lastname' value='".$row["lastname"]."'><br>";
                    echo "<p class='text-xl mb-1 font-semibold'>Gender</p>";
                    echo "<input class='w-full p-2 mb-5 rounded-xl' type='text' name='gender' value='".$row["gender"]."'><br><br>";
                    echo "<input class='float-end pt-3 pb-3 pr-10 pl-10 cursor-pointer bg-black text-white mr-5' data-current-user='".$_SESSION['user']."' type='button' name='update' value='Save' onclick='confirmUpdate(event);'>";
                    echo "<button class='float-end pt-3 pb-3 pr-5 pl-5 cursor-pointer bg-red-600 text-white mr-5' data-current-user='".$_SESSION['user']."' type='button' name='deactivate' value='Deactivate'>Deactivate</button>";
                    echo "</form>";
                }
            } else {
                echo "0 results";
            }
          ?>


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
    <script src="/js/script.js"></script>
   

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


        $(document).ready(function() {
    $('button[name="deactivate"]').click(function() {
        var currUser = $(this).data('current-user'); // Use data-current-user
        swal({
            title: "Confirmation",
            text: "Are you sure you want to deactivate your account?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: 'POST',
                    url: 'userDeactivate.php',
                    data: { deactivate: true, userId: currUser }, // Send userId as currentUser
                    success: function(response) {
                        swal("Account Successfully Deactivated!", {
                            icon: "success",
                        });
                        setTimeout(function() {
                            window.location.href = 'login.php';
                        }, 2000);
                    },
                    error: function() {
                        swal("Error!", "Failed to deactivate account!", "error");
                    }
                });
            }
        });
    });
});


$('input[name="update"]').click(function() {
        var currUser = $(this).data('current-user');
        var firstname = $('input[name="firstname"]').val();
        var lastname = $('input[name="lastname"]').val();
        var gender = $('input[name="gender"]').val();
        
        swal({
            title: "Confirmation",
            text: "Are you sure you want to save the changes?",
            icon: "warning",
            buttons: true,
            dangerMode: false,
        })
        .then((willUpdate) => {
            if (willUpdate) {
                $.ajax({
                    type: 'POST',
                    url: 'userUpdate.php',
                    data: { update: true, userId: currUser, firstname: firstname, lastname: lastname, gender: gender },
                    success: function(response) {
                        swal("Changes Saved Successfully!", {
                            icon: "success",
                        });
                        setTimeout(function() {
                            location.reload();
                        }, 3000);
                    },
                    error: function() {
                        swal("Error!", "Failed to save changes!", "error");
                    }
                });
            }
        });
    });




   





    </script>
  </body>
</html>
