<?php
include 'connect.php';

$loginMessage = "";

if(isset($_POST['login'])){
    $uname = mysqli_real_escape_string($connection, $_POST['txtusername']);
    $pword = mysqli_real_escape_string($connection, $_POST['txtpassword']);

    $query = "SELECT u.*, p.* FROM tbluseraccount u 
    JOIN tbluserprofile p ON u.acctid = p.userId
    WHERE u.username = '$uname'";
   

    
    $result = mysqli_query($connection, $query);
 

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
   
        $dbHashedPassword = $row['password'];
       
        
        
        if(password_verify($pword,$dbHashedPassword)){
          session_start();
          $_SESSION['user'] = $row;
          session_regenerate_id(true);
          $loginMessage = "Login successful.";
          if($row['usertype'] == 'Trainer'){
          
            echo '<script>setTimeout(function(){window.location.href="trainer.php";}, 5000);</script>';
        } else {
            
            echo '<script>setTimeout(function(){window.location.href="mainpage.php";}, 5000);</script>';
        }
        
          exit();

        } else {
          $loginMessage = "Invalid password.";
        }
        // if($pword == $row['password']) {
        //     session_start();
        //     $_SESSION['username'] = $uname;

           

        //     $loginMessage = "Login successful.";
        //     echo "<script>
        //     window.onload = function() {
        //       var messageBox = document.querySelector('.message-box');
        //       if (messageBox.classList.contains('active')) {
        //           setTimeout(function() {
        //               window.location.href = 'mainpage.php';
        //           }, 2000); 
        //       }
        //   };
        //     </script>";
        // } else if(password_verify($pword, $dbHashedPassword)){
        //     session_start();
        //     $_SESSION['username'] = $uname;
        //     $loginMessage = "Login successful.";
        //     echo "<script>
           
        //     window.onload = function() {
        //       var messageBox = document.querySelector('.message-box');
        //       if (messageBox.classList.contains('active')) {
        //           setTimeout(function() {
        //               window.location.href = 'mainpage.php';
        //           }, 2000); 
        //       }
        //   };
        //     </script>";
        // } else {
        //     $loginMessage = "Invalid password.";


        // }
    } else {
        $loginMessage = "Invalid username or password.";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="style.css">

    <script src="https://cdn.tailwindcss.com"></script>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />

    <style>
      .message-box {
        display: none;
        padding: 10px 20px;
        border-radius: 5px;
        background-color: greenyellow;
        color: #000;
        opacity: 0.9;
        position: fixed;
        top: 20px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 9999;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }

      .message-box.active {
        display: block;
      }

      .close-btn {
        float: right;
        margin-left: 10px;
        cursor: pointer;
        color: #000;
        background-color: greenyellow;
        font-size: 20px;
      }

    </style>
  </head>

  <body >
    
 
    <div class="container ">
      <nav class="m-0 p-3 flex items-center justify-between text-black">
        <div class="logo-div flex items-center ">
          <img id="img-logo" src="images/logo.png" class="w-24" />
          <h1 class="ml-0 font-bold text-3xl">GYMCHUM</h1>
        </div>
       
      </nav>



      <div class="row justify-content-center align-items-center vh-100">
      <div class="col-lg-4 col-md-6 col-sm-8  my-5">
          <div class="card shadow rounded-3 border-0">
            <div class="card-body">
            <div class="pLogin p-2 m-0">
              <h3 class="text-center font-bold text-3xl">Welcome</h3>
             
              <p class="text-center mb-3 text-gray-400">Login to your account</p>
              </div>

              
      <div class="message-box <?php echo ($loginMessage != "") ? 'active' : ''; ?>">
            <span class="close-btn" onclick="this.parentElement.classList.remove('active');">&times;</span>
            <?php echo $loginMessage; ?>
        </div>
             
              <form method="post">
                <div class="form-floating mb-3">
                  <input
                    type="text"
                    class="form-control"
                    id="username"
                    name="txtusername"
                    placeholder="username"
                    required
                    autofocus
                  />
                  <label for="username">Username</label>
                </div>
                <div class="form-floating mb-3">
                  <input
                  type ="password"
                    class="form-control"
                    id="password"
                    name="txtpassword"
                    placeholder="password"
                    required
                  />
                  <label for="password">Password</label>
                </div>
                <button type="submit" class="btn btn-primary w-100 bg-black" name="login">
                  Login
                </button>
              </form>
              <p class="text-center mt-3">
                Don't have an account? <a href="register.php " class="underline">Register now</a>.
              </p>
            </div>
          </div>
        </div>
      </div>
      
    </div>

    <div class="message-box <?php echo ($loginMessage != "") ? 'active' : ''; ?>">
            <span class="close-btn" onclick="this.parentElement.classList.remove('active');">&times;</span>
            <?php echo $loginMessage; ?>
        </div>

   

 

    <footer
      class="bg-black text-white mt-auto p-3 flex items-center justify-center"
    >
      <div class="footer-content flex items-center justify-center space-x-4">
        <div>
          <h2>Jether Omictin</h2>
          <h2>BSCS-2</h2>
        </div>
      </div>
    </footer>


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
  </body>
</html>
