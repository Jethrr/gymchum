<?php    
    include 'connect.php';    
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <div class="container">
      <nav class="m-0 p-3 flex items-center justify-between text-black">
        <div class="logo-div flex items-center">
          <img
            id="img-logo"
            src="logo.png"
            class="w-24"
          />
          <h1 class="ml-0 font-bold text-3xl">GYMCHUM</h1>
        </div>
      </nav>
      <div class="row justify-content-center align-items-center vh-100">
        <div class="col-lg-4 col-md-6 col-sm-8">
          <h1 class="regText p-3 font-bold text-3xl">Sign Up</h1>
          <hr />
          <br />
          <div class="card shadow rounded-3 border-0">
            <div class="card-body">
              <h3 class="text-left mb-4 font-semibold text-2xl">
                Enter your account details
              </h3>

              <form method="post">
                <div class="form-floating mb-3">
                  <input
                    type="text"
                    class="form-control"
                    id="name"
                    name="txtfirstname"
                    placeholder="name"
                    required
                    autofocus
                  />
                  <label for="name">Firstname</label>
                </div>
                <div class="form-floating mb-3">
                  <input
                    type="text"
                    class="form-control"
                    id="username"
                    name="txtlastname"
                    placeholder="username"
                    required
                  />
                  <label for="username">Lastname</label>
                </div>
              
                
                <div class="form-floating mb-3">
                  <input
                    type="email"
                    class="form-control"
                    id="txtemail"
                    name="txtemail"
                    placeholder="Enter email"
                    required
                  />
                  <label for="email">Email</label>
                </div>

                <div class="form-floating mb-3">
                  <input
                    type="text"
                    class="form-control"
                    id="username"
                    name="txtusername"
                    placeholder="Username"
                    required
                  />
                  <label for="username">Username</label>
                </div>

                <div class="form-floating mb-3">
                  <input
                    type="text"
                    class="form-control"
                    id="password"
                    name="txtpassword"
                    placeholder="password"
                    required
                  />
                  <label for="password">Password</label>
                </div>

                <div class="form-floating mb-3">
                                    <select class="form-select" aria-label="Default select example" id="gender" name="txtgender">
                                        <option selected>Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Others">Other</option>
                                    </select>
                                </div>

                <input type="submit" class="btn btn-primary w-100 bg-black" name="btnRegister" value="Register">
                 
            
              </form>
              <p class="text-center mt-3">
                Already have an account? <a href="login.html">Login here</a>.
              </p>
            </div>
          </div>
        </div>
      </div>
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

    <script src="script.js"></script>

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



<?php	 
	if(isset($_POST['btnRegister'])){		
		//retrieve data from form and save the value to a variable
		//for tbluserprofile
		$fname=$_POST['txtfirstname'];		
		$lname=$_POST['txtlastname'];
		$gender=$_POST['txtgender'];
		
		//for tbluseraccount
		$email=$_POST['txtemail'];		
		$uname=$_POST['txtusername'];
		$pword=$_POST['txtpassword'];
		

		//save data to tbluserprofile			
		$sql1 ="Insert into tbluserprofile(firstname,lastname,gender) values('".$fname."','".$lname."','".$gender."')";
		mysqli_query($connection,$sql1);
		
        $pwordHash = password_hash($pword,PASSWORD_DEFAULT);

		//Check tbluseraccount if username is already existing. Save info if false. Prompt msg if true.
		$sql2 ="Select * from tbluseraccount where username='".$uname."'";
		$result = mysqli_query($connection,$sql2);
		$row = mysqli_num_rows($result);
		if($row == 0){
			$sql ="Insert into tbluseraccount(emailadd,username,password) values('".$email."','".$uname."','".$pwordHash."')";
			mysqli_query($connection,$sql);
			echo "<script language='javascript'>
						alert('New record saved.');
				  </script>";
			//header("location: index.php");
		}else{
			echo "<script language='javascript'>
						alert('Username already existing');
				  </script>";
		}
			
		
	}
		

?>


