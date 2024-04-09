<?php
    include 'connect.php';


    $fetch = "SELECT * FROM `tbluserprofile`";
    $query = mysqli_query($connection,$fetch);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
    
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
                    <th>picture</th>

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
                       echo "<td>" . $row["picture"] . "</td>";
                      
                       echo "</tr>";
                   }
               } else {
                   echo "<tr><td colspan='4'>No records found</td></tr>";
               }
               ?>
            </tbody>



        </table>
    </div>
    
</body>
</html>

