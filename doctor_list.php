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
    $doctor_id = $_GET['delete'];
    // Query to delete the doctor with the specified ID
    $delete_query = "DELETE FROM doctor WHERE doctor_id = $doctor_id;";
    mysqli_query($con, $delete_query);
}

// Query to retrieve patient data
$query = "SELECT * FROM doctor;";
$result = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<style>
        /* Custom CSS to change the font color to black in the update modal */
        .modal-content {
            color: black;
        }
    </style>

<body style="background-color:#3498DB;color:white;text-align:center;padding-top:50px;">
    <div class="container" style="text-align:left;">
        <center>
            <h3>Doctor List</h3>
        </center><br>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Doctor ID</th>
                    <th>Name</th>
                    <th>Specialization</th>
                    <th>Mobile Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>
                        <td>' . $row['doctor_id'] . '</td>
                        <td>' . $row['name'] . '</td>
                        <td>' . $row['specialization'] . '</td>
                        <td>' . $row['phone_no'] . '</td>
                        <td>
                            <a href="?delete=' . $row['doctor_id'] . '" class="btn btn-danger"
                                onclick="return confirmDelete()">Delete</a>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateModal" data-id="' . $row['doctor_id'] . '">Update</button>
                        </td>
                    </tr>';
                }
                ?>
            </tbody>
        </table>
        <a href="admin-panel.php" class="btn btn-outline-light" onMouseOver="this.style.color='#0000FF'">Go Back</a>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
    // JavaScript to populate the update modal with the current doctor's information
    $('#updateModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var doctorId = button.data('id'); // Extract doctor ID from data-id attribute
        var modal = $(this);

        // AJAX call to fetch the current doctor's information
        $.ajax({
            url: 'fetch_doctor.php',
            type: 'POST',
            data: { doctor_id: doctorId },
            dataType: 'json',
            success: function (response) {
                if (response.status === 'success') {
                    // Populate the form fields with the current doctor's information
                    modal.find('#doctor_id').val(response.data.doctor_id);
                    modal.find('#name').val(response.data.name);
                    modal.find('#specialization').val(response.data.specialization);
                    modal.find('#phone_no').val(response.data.phone_no);
                } else {
                    // Handle error case
                    alert('Failed to fetch doctor information.');
                }
            },
            error: function (xhr, status, error) {
                // Handle error case
                alert('An error occurred while fetching doctor information.');
            }
        });
    });
</script>

    <!-- The Bootstrap modal for updating the doctor's information -->
    <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Doctor Information</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- The update form goes here -->
                    <form method="post" action="update-doctor.php">
                        <input type="hidden" name="doctor_id" id="doctor_id" value="">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="specialization">Specialization</label>
                            <input type="text" class="form-control" id="specialization" name="specialization" required>
                        </div>
                        <div class="form-group">
                            <label for="phone_no">Mobile Number</label>
                            <input type="text" class="form-control" id="phone_no" name="phone_no" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
