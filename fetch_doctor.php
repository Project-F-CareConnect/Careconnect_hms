<?php
$con = mysqli_connect("localhost", "root", "", "hmsdb");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the doctor_id parameter is set
if (isset($_POST['doctor_id'])) {
    $doctor_id = $_POST['doctor_id'];
    // Query to retrieve the doctor's information based on the doctor_id
    $query = "SELECT * FROM doctor WHERE doctor_id = $doctor_id;";
    $result = mysqli_query($con, $query);
    if ($result) {
        $data = mysqli_fetch_assoc($result);
        if ($data) {
            // Return the doctor's information as JSON response
            echo json_encode(array('status' => 'success', 'data' => $data));
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Doctor not found.'));
        }
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Query failed.'));
    }
} else {
    echo json_encode(array('status' => 'error', 'message' => 'Missing doctor_id parameter.'));
}

mysqli_close($con);
?>
