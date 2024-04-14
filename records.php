<?php
    include 'connect.php';


    $fetch = "SELECT * FROM `tbluserprofile` WHERE usertype = 'trainer'";
    $query = mysqli_query($connection,$fetch);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
</head>
<body>

    <div class="container min-vh-100 d-flex justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th>userID</th>
                    <th>firstname</th>
                    <th>lastname</th>
                    <th>gender</th>
                    <th>Trainer</th>

                </tr>
            </thead>

            <tbody>
            <?php
               
               if (mysqli_num_rows($query) > 0) {
                  
                   while ($row = mysqli_fetch_assoc($query)) {
                       echo "<tr>";
                       echo "<td>" . $row["userId"] . "</td>";
                       echo "<td>" . $row["firstname"] . "</td>";
                       echo "<td>" . $row["lastname"] . "</td>";
                       echo "<td>" . $row["gender"] . "</td>";
                       echo "<td>" . $row["usertype"] . "</td>";
                     
                      
                       echo "</tr>";
                   }
               } else {
                   echo "<tr><td colspan='4'>No records found</td></tr>";
               }
               ?>
            </tbody>



        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</body>
</html>

