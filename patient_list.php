<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php
$con = mysqli_connect("localhost", "root", "", "hmsdb");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Handle the form submission
if (isset($_POST['patient_submit'])) {
    
}

// Query to retrieve patient data
$query = "SELECT * FROM Patient;";
$result = mysqli_query($con, $query);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    </head>
    <body style="background-color:#3498DB;color:white;text-align:center;padding-top:50px;">
        <div class="container" style="text-align:left;">
            <center><h3>Patient List</h3></center><br>
            <table class="table table-hover">
            <thead>
                <tr>
                    <th>Patient ID</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th>Age</th>
                    <th>Gender</th>
                    <th>Admission Date</th>
                    <th>Mobile Number</th>
                    <th>Disease ID</th>
                    <th>Doctor ID</th>
                    <th>Room ID</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>
                        <td>' . $row['patient_id'] . '</td>
                        <td>' . $row['name'] . '</td>
                        <td>' . $row['address'] . '</td>
                        <td>' . $row['age'] . '</td>
                        <td>' . $row['gender'] . '</td>
                        <td>' . $row['admission_date'] . '</td>
                        <td>' . $row['mobile_number'] . '</td>
                        <td>' . $row['disease_id'] . '</td>
                        <td>' . $row['doctor_id'] . '</td>
                        <td>' . $row['room_id'] . '</td>
                    </tr>';
                }
                ?>
            </tbody>
        </table>
        <a href="admin-panel.php" class="btn btn-outline-light" onMouseOver="this.style.color='#0000FF'">Go Back</a>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>
