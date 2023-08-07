<?php
$con = mysqli_connect("localhost", "root", "", "hmsdb");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$name = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the name and specialization fields are not empty
    if (empty($name)) {
        echo "Please enter a name.";
        exit;
    }

    if (empty($specialization)) {
        echo "Please enter a specialization.";
        exit;
    }

    // Retrieve the form data from the POST request
    $doctor_id = $_POST['doctor_id'];
    $name = $_POST['name'];
    $specialization = $_POST['specialization'];
    $phone_no = mysqli_real_escape_string($con, $phone_no);

    // Prepare the update query
    $update_query = "UPDATE doctor SET name='$name', specialization='$specialization', phone_no='$phone_no'";

    // Execute the update query
    if (mysqli_query($con, $update_query)) {
        // The update was successful, you can redirect the user to the doctor list page or show a success message
        header("Location: doctor_list.php?success");
        exit;
    } else {
        // Handle the case where the update failed
        echo "Error updating doctor: " . mysqli_error($con);
    }
} else {
    // The update form was not submitted
}

// Show a success message if the update was successful
if (isset($_GET['success'])) {
    echo "Your data has been updated successfully.";
}

mysqli_close($con);
?>
