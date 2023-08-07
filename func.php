<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
$con = mysqli_connect("localhost", "root", "", "hmsdb", "3306");

if (isset($_POST['login_submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $query = "select * from logintb where username='$username' and password='$password';";
  $result = mysqli_query($con, $query);
  if (mysqli_num_rows($result) == 1) {
    $_SESSION['username'] = $username;
    header("Location:admin-panel.php");
  } else
    header("Location:error.php");
}

if (isset($_POST['update_data'])) {
  $contact = $_POST['contact'];
  $status = $_POST['status'];
  $query = "update appointmenttb set payment='$status' where contact='$contact';";
  $result = mysqli_query($con, $query);
  if ($result)
    header("Location:updated.php");
}

// Insert data into doctor table
function display_docs()
{
  global $con;
  $query = "select * from doctor";
  $result = mysqli_query($con, $query);
  while ($row = mysqli_fetch_array($result)) {
    $name = $row['name'];
    echo '<option value="' . $name . '">' . $name . '</option>';

    $phone_no = $row['phone_no'];
    echo '<option value="' . $phone_no . '">' . $phone_no . '</option>';

    $specialization = $row['specialization'];
    echo '<option value="' . $specialization . '">' . $specialization . '</option>';
  }
}
if (isset($_POST['doc_sub'])) {
  $name = $_POST['name'];
  $phone_no = $_POST['phone_no'];
  $specialization = $_POST['specialization'];
  $query = "insert into doctor(name,specialization,phone_no)values('$name','$specialization','$phone_no')";
  $result = mysqli_query($con, $query);
  if ($result)
    header("Location:adddoc.php");
}
//Insert data in Nurse table

function display_nurse()
{
  global $con;
  $query = "select * from nurse";
  $result = mysqli_query($con, $query);
  while ($row = mysqli_fetch_array($result)) {
    $name = $row['name'];
    $phone_no = $row['phone_no'];
    $room_id = $row['room_id'];
    echo '<option value="' . $name . '">' . $name . '</option>';
    echo '<option value="' . $phone_no . '">' . $phone_no . '</option>';
    echo '<option value="' . $room_id . '">' . $room_id . '</option>';
  }
}
if (isset($_POST['nurse_sub'])) {
  $name = $_POST['name'];
  $phone_no = $_POST['phone_no'];
  $room_id = $_POST['room_id'];
  $query = "insert into nurse(name,phone_no,room_id)values('$name','$phone_no','$room_id')";
  $result = mysqli_query($con, $query);
  if ($result)
    header("Location:addnurse.php");
}

//for wardboy

function display_wboy()
{
  global $con;
  $query = "select * from ward_boys";
  $result = mysqli_query($con, $query);
  while ($row = mysqli_fetch_array($result)) {
    $name = $row['name'];
    $phone_no = $row['phone_no'];
    $room_id = $row['room_id'];
    echo '<option value="' . $name . '">' . $name . '</option>';
    echo '<option value="' . $phone_no . '">' . $phone_no . '</option>';
    echo '<option value="' . $room_id . '">' . $room_id . '</option>';
  }
}
if (isset($_POST['wboy_sub'])) {
  $name = $_POST['name'];
  $phone_no = $_POST['phone_no'];
  $room_id = $_POST['room_id'];
  $query = "insert into ward_boys(name,phone_no,room_id)values('$name','$phone_no','$room_id')";
  $result = mysqli_query($con, $query);
  if ($result)
    header("Location:addwardboys.php");
}


function display_admin_panel()
{

  echo '<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
  <a class="navbar-brand" href="#"><i class="fa fa-user-plus" aria-hidden="true"></i> CareConnect</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
     <ul class="navbar-nav mr-auto">
       <li class="nav-item">
        <a class="nav-link" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="#"></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="post" action="search.php">
      <input class="form-control mr-sm-2" type="text" placeholder="enter contact number" aria-label="Search" name="contact">

      <input type="submit" class="btn btn-outline-light my-2 my-sm-0 btn btn-outline-light" id="inputbtn" name="search_submit" value="Search">

    </form>
  </div>
</nav>

<!-- Navbar ends here -->

  </head>


  <style type="text/css">
    button:hover{cursor:pointer;}
    #inputbtn:hover{cursor:pointer;}
  </style>


  <body style="padding-top:50px;">
 <div class="jumbotron" id="ab1"></div>
   <div class="container-fluid" style="margin-top:50px;">
    <div class="row">
  <div class="col-md-4">
    <div class="list-group" id="list-tab" role="tablist">
      <a class="list-group-item list-group-item-action active" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home">Appointment</a>

      <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">Bill</a>

      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-settings" role="tab" aria-controls="settings">Doctors Section</a>

      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-n-settings" role="tab" aria-controls="settings">Nurse Section</a>

      <a class="list-group-item list-group-item-action" id="list-settings-list" data-toggle="list" href="#list-w-settings" role="tab" aria-controls="settings">Wardboys Section</a>

    </div><br>
  </div>

  <div class="col-md-8">
    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">

            
              <center><h4>Create an appointment</h4></center><br>
              <form class="form-group" method="post" action="appointment.php">
                <div class="row">
                  <div class="col-md-4"><label>Name:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control" name="name"></div><br><br>
                  
                  <div class="col-md-4"><label>Address</label></div>
                  <div class="col-md-8"><input type="text" class="form-control"  name="address"></div><br><br>

                  <div class="col-md-4"><label>Age</label></div>
                  <div class="col-md-8"><input type="text" class="form-control"  name="age"></div><br><br>

                  <div class="col-md-4"><label>Gender:</label></div>
                  <div class="col-md-8">
                    <select name="payment" class="form-control" >
                      <option value="Female">Female</option>
                      <option value="Male">Male</option>
                      <option value="Other">Other</option>
                    </select>
                  </div><br><br><br>

                  <div class="col-md-4"><label>Mobile Number:</label></div>
                  <div class="col-md-8"><input type="text" class="form-control"  name="mobile_number"></div><br><br>

                  <div class="col-md-4"><label>Disease ID</label></div>
                  <div class="col-md-8">
                   <select name="disease_id" class="form-control" >
                     <option value="10000">1.Fever </option>
                     <option value="10001">2.Typhoid </option>
                     <option value="10002">3.Dengue </option>
                     <option value="10003">4.Burns </option>
                     <option value="10004">5.Kidney Stone </option>
                     <option value="10005">6.Hand Fracture </option>
                     <option value="10006">7.Migrane </option>
                     <option value="10007">8.Blood Cancer </option>
                     <option value="10008">9.Syphilis </option>
                     <option value="10009">10.Head Injuries </option>
                     <option value="10010">11.Cardiomyopathy </option>
                     <option value="10011">12.AIDS </option>
                     <option value="10012">13.Brest Cancer </option>
                     <option value="10013">14.Hernias </option>
                     
                     
                      <?php display_docs();?>
                    </select>
                  </div><br><br>

                  <div class="col-md-4"><label>Doctor ID</label></div>
                  <div class="col-md-8">
                   <select name="doctor_id" class="form-control" >
                   <option value="9000">1.Kushal Sharma </option>
                   <option value="9003">2.Amrit Giri </option>
                   <option value="9004">3.kiran Subedi </option>
                   <option value="9007">4.Nishanta Chapagain</option>
                   <option value="9009">5.Monika Karki </option>
                   <option value="9006">6.Mandakini Sapkota </option>
                      <?php display_docs();?>
                    </select>
                  </div><br><br>

                  <div class="col-md-4"><label>Room ID</label></div>
                  <div class="col-md-8">
                   <select name="room_id" class="form-control" >
                     <option value="100"> 100.ICU </option>
                     <option value="101"> 101.Emergency </option>
                     <option value="102"> 102.OT </option>
                     <option value="103"> 103.General </option>
                     <option value="104"> 104.ICU </option>
                     <option value="105"> 105.Emergency</option>
                     <option value="106"> 106.OT</option>
                     <option value="107"> 107.General </option>
                     <option value="108"> 108.Emergency </option>
                     <option value="109"> 109.OT </option>
                      
                      <?php display_docs();?>
                    </select>
                  </div><br><br>

                                  <div class="col-md-4">
                    <input style="margin-left:108%"; type="submit" name="entry_submit" value="Create new entry" class="btn btn-primary" id="inputbtn">
                  </div>
                
                </div>

                <div class="col-md-4">
                  <a href="patient_list.php" style="margin-top:20px; margin-left: 107%; background-color:Tomato;"; class="btn btn-primary" id="inputbtn"> Show patient list</a>
              </div>
              </form>
           
            </div>
          </div>
        </div><br>
      </div>

      <!-- Bill Section -->


      <div class="tab-pane fade" id="list-profile" role="tabpanel" aria-labelledby="list-profile-list">
      <div class="card">

        <div class="card-body">
        <center><h4>Generate bill:</h4></center><br>
        <form class="form-inline my-2 my-lg-0" method="post" action="generate_bill.php">


        <div class="col-md-4"><label>Patient Id:</label></div>
        <input style="margin-left:-90px;" class="form-control mr-sm-2 col-md-8" type="text" placeholder="Enter Patient Id:" aria-label="Search" name="patient_id"><br><br><br>


        <input style="margin-top:20px; margin-left: 46%"; type="submit" name="generate_bill" value="Generate bill" class="btn btn-primary">
        

      </form>
      </div>
      </div><br><br>
    </div>

      <!-- Doctor Section-->
     
      <div class="tab-pane fade" id="list-settings" role="tabpanel" aria-labelledby="list-settings-list">
      <form class="form-group" method="post" action="func.php">
        <label>Doctors name: </label>
        <input type="text" name="name" placeholder="Enter doctor name" class="form-control">
        

        <label style="margin-top:10px";>Specialization: </label>
        <select name="specialization" class="form-control">
          <option value="General Physician">General Physician</option>
          <option value="Cardiology">Cardiology</option>
        </select>

        <label>Phone Number: </label>
        <input type="text" name="phone_no" placeholder="Enter Phone Number" class="form-control">

        <input style="margin-top:20px"; type="submit" name="doc_sub" value="Add Doctor" class="btn btn-primary">

        <div class="col-md-4">
                  <a href="doctor_list.php" style="margin-top:20px; margin-left: -4%; background-color:Tomato;"; class="btn btn-primary" id="inputbtn"> Show Doctor list</a>
              </div>

        

      </form>
    </div>

<!-- for nurse -->


      <div class="tab-pane fade" id="list-n-settings" role="tabpanel" aria-labelledby="list-settings-list">
        <form class="form-group" method="post" action="func.php">
          <label>Nurse name: </label>
          <input type="text" name="name" placeholder="Enter Nurse name" class="form-control">

          <label style="margin-top:10px";>Room id: </label>
          <select name="room_id" class="form-control">
          <option value="100"> 100.ICU </option>
          <option value="101"> 101.Emergency </option>
          <option value="102"> 102.OT </option>
          <option value="103"> 103.General </option>
          <option value="104"> 104.ICU </option>
          <option value="105"> 105.Emergency</option>
          <option value="106"> 106.OT</option>
          <option value="107"> 107.General </option>
          <option value="108"> 108.Emergency </option>
          <option value="109"> 109.OT </option>
          </select>

          <label>Phone Number: </label>
        <input type="text" name="phone_no" placeholder="Enter Phone Number" class="form-control">

          
          <br>
          <input type="submit" name="nurse_sub" value="Add Nurse" class="btn btn-primary">

          <div class="col-md-4">
                  <a href="nurse_list.php" style="margin-top:20px; margin-left: -4%; background-color:Tomato;"; class="btn btn-primary" id="inputbtn"> Show Nurse list</a>
              </div>

        </form>
      </div>
      
<!-- for wardboys -->

      <div class="tab-pane fade" id="list-w-settings" role="tabpanel" aria-labelledby="list-settings-list">
        <form class="form-group" method="post" action="func.php">
          <label>Wardboy name: </label>
          <input type="text" name="name" placeholder="Enter Wardboy name" class="form-control">

          <label style="margin-top:10px";>Room id: </label>
          <select name="room_id" class="form-control">
          <option value="100"> 100.ICU </option>
          <option value="101"> 101.Emergency </option>
          <option value="102"> 102.OT </option>
          <option value="103"> 103.General </option>
          <option value="104"> 104.ICU </option>
          <option value="105"> 105.Emergency</option>
          <option value="106"> 106.OT</option>
          <option value="107"> 107.General </option>
          <option value="108"> 108.Emergency </option>
          <option value="109"> 109.OT </option>
          </select>

          <label>Phone Number: </label>
        <input type="text" name="phone_no" placeholder="Enter Phone Number" class="form-control">

          <br>
          <input type="submit" name="wboy_sub" value="Add Wardboy" class="btn btn-primary">

          <div class="col-md-4">
          <a href="wardbys_list.php" style="margin-top:20px; margin-left: -4%; background-color:Tomato;"; class="btn btn-primary" id="inputbtn"> Show wardboys list</a>
      </div>

        </form>
      </div>

      

      
    </div>
  </div>
</div>
   </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    <!--Sweet alert js-->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>
  </body>
</html>';
}
