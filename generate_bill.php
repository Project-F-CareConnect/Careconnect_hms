<?php
$con=mysqli_connect("localhost","root","","hmsdb");
if(isset($_POST['generate_bill'])){
  $patient_id=$_POST['patient_id'];
 $query="select * from Patient join room on Patient.room_id = room.room_id where patient_id='$patient_id';";
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
  <center><h3>Receipt to:</h3></center><br>
  <table class="table table-hover">
  <thead>
    <tr>
      <th>Bill id</th>
      <th>Billing Date</th>
      <th>Patient Id</th>
      <th>Name</th>
      <th>No. of Days in Hospital</th>
      <th>Total Amount</th>

    </tr>
  </thead>
  <tbody>
  ';
  while($row=mysqli_fetch_array($result)){
    $bill_id=$row['bill_id'];
    $billing_date = date('Y-m-d');
    $patient_id=$row['patient_id'];
    $name=$row['name'];
    $admission_date=$row['admission_date'];
    $charge_per_day=$row['charge_per_day'];
  

    // Calculate the number of days between billing_date and admission_date
    $datetime1 = new DateTime($billing_date);
    $datetime2 = new DateTime($admission_date);
    $interval = $datetime1->diff($datetime2);
    $no_of_days= $interval->days;
    
    $Total_amount=$no_of_days*$charge_per_day;

    // Debug statements
// echo "Charge Per Day: " . $charge_per_day . "<br>";
// echo "Admission Date: " . $admission_date . "<br>";
// echo "Total Amount: " . $Total_amount . "<br>";


    
    echo '<tr>
      <td>205</td>
      <td>'.$billing_date.'</td>
      <td>'.$patient_id.'</td>
      <td>'.$name.'</td>
      <td>'.$no_of_days.'</td>
      <td>Rs.'.$Total_amount.'</td>
    </tr>';
    
  }
  
echo '</tbody>
</table>
<a href="admin-panel.php" class="btn btn-outline-light" >Go Back</a>
</div> 
<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>

  
</html>';
}

?>