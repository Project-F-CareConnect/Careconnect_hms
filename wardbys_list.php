<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<?php
$con = mysqli_connect("localhost", "root", "", "hmsdb");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if a delete request has been sent
if (isset($_GET['delete'])) {
    $wardboy_id = $_GET['delete'];
    // Query to delete the wardboy with the specified ID
    $delete_query = "DELETE FROM ward_boys WHERE wardboys_id = $wardboy_id;";
    mysqli_query($con, $delete_query);
}

// Query to retrieve wardboy data
$query = "SELECT * FROM ward_boys;";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
        integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>

<body style="background-color:#3498DB;color:white;text-align:center;padding-top:50px;">
    <div class="container" style="text-align:left;">
        <center>
            <h3>Wardboy List</h3>
        </center><br>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Wardboy ID</th>
                    <th>Name</th>
                    <th>Mobile Number</th>
                    <th>Room number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>
                        <td>' . $row['wardboys_id'] . '</td>
                        <td>' . $row['name'] . '</td>
                        <td>' . $row['phone_no'] . '</td>
                        <td>' . $row['room_id'] . '</td>
                        <td><a href="?delete=' . $row['wardboys_id'] . '" class="btn btn-danger" onclick="return confirmDelete()">Delete</a></td>
                    </tr>';
                }
                ?>
            </tbody>
        </table>
        <a href="admin-panel.php" class="btn btn-outline-light" onMouseOver="this.style.color='#0000FF'">Go Back</a>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
        crossorigin="anonymous"></script>

    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this wardboy?");
        }
    </script>
</body>

</html>
