<?php
$con=mysqli_connect("localhost","root","","hmsdb");
if(isset($_POST['search_submit'])){
  $contact=$_POST['contact'];
 $query="select * from Patient where mobile_number='$contact';";
 $result=mysqli_query($con,$query);
 echo '<!DOCTYPE html>
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
  <center><h3>Search Results</h3></center><br>
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
  ';

  while($row=mysqli_fetch_array($result)){
    $patient_id = $row['patient_id'];
    $name = $row['name'];
  $address = $row['address'];
  $age = $row['age'];
  $gender = $row['gender'];
  $admission_date = $row['admission_date'];
  $mobile_number = $row['mobile_number'];
  $disease_id = $row['disease_id'];
  $doctor_id = $row['doctor_id'];  
  $room_id = $row['room_id'];

    echo '<tr>
    <td>'.$patient_id.'</td>
      <td>'.$name.'</td>
      <td>'.$address.'</td>
      <td>'.$age.'</td>
      <td>'.$gender.'</td>
      <td>'.$admission_date.'</td>
      <td>'.$mobile_number.'</td>
      <td>'.$disease_id.'</td>
      <td>'.$doctor_id.'</td>
      <td>'.$room_id.'</td>
      
    </tr>';
  }
echo '</tbody></table></div> 
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>';
}

?>