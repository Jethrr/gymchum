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
  </head>
    <div class="container">
      <nav class="m-0 p-3 flex items-center justify-between text-black">
        <div class="logo-div flex items-center ">
          <img id="img-logo" src="logo.png" class="w-24" />
          <h1 class="ml-0 font-bold text-3xl">GYMCHUM</h1>
        </div>
       
      </nav>
      <div class="row justify-content-center align-items-center vh-100">
        <div class="col-lg-4 col-md-6 col-sm-8">
          <div class="card shadow rounded-3 border-0">
            <div class="card-body">
              <h3 class="text-center mb-4 font-bold text-3xl">Welcome</h3>

              <form method="post" action="validate.php">
                <div class="form-floating mb-3">
                  <input
                    type="text"
                    class="form-control"
                    id="username"
                    name="username"
                    placeholder="username"
                    required
                    autofocus
                  />
                  <label for="username">Username</label>
                </div>
                <div class="form-floating mb-3">
                  <input
                    type="password"
                    class="form-control"
                    id="password"
                    name="password"
                    placeholder="password"
                    required
                  />
                  <label for="password">Password</label>
                </div>
                <button type="submit" class="btn btn-primary w-100 bg-black">
                  Login
                </button>
              </form>
              <p class="text-center mt-3">
                Don't have an account? <a href="register.php">Register now</a>.
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
