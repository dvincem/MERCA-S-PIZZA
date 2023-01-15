<?php
include "config.php";
session_start();
if($_SESSION['usertype']!="hr" || !isset($_SESSION['usertype'])){ 
    echo '<script>alert("Unauthorized Web Access")</script>';
    echo '<script>window.location.href="dashboard.php"</script>';

}else{
   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/dashboard.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <title>Employees</title>
    <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
        </script>
    <link rel="stylesheet" href="css/main.min.css">
    <script>
        $(document).ready(function(){
            $('table tr').click(function(){
                var id = $(this).attr('row_id');
                window.open("http://localhost/MERCAPIZZA/webpage2.php?id=" + id);
            });
        });
    </script>
    </head>
<body style="background-image: url(bg.webp);
            no-repeat center center fixed; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;">
    <input type="checkbox" id="check">
    <label for="check">
      <i class="fas fa-bars" id="btn"></i>
      <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
      <header>Employee List</header>
      <a href="dashboard.php" >
        <i class="fas fa-qrcode"></i>
        <span>Dashboard</span>
      </a>
      <a href="index.php" >
        <i class="fas fa-link"></i>
        <span>POS A</span>
      </a>
      <a href="sales_pos_a.php">
        <i class="fas fa-stream"></i>
        <span>Sales POS A</span>
      </a>
      <a href="payroll_emplist.php" class="active">
         <i class="fas fa-calendar"></i>
        <span>Payroll</span>
      </a>
      <a href="payroll_report.php">
        <i class="fas fa-stream"></i>
        <span>Payroll Report</span>
      </a>
      <a href="employee_list.php">
        <i class="far fa-question-circle"></i>
        <span>Employee List</span>
      </a>
      <a href="Wp3POS.php">
      <i class="fas fa-link"></i>
        <span>POS B</span>
      </a>
      <a href="sales_pos_b.php">
      <i class="fas fa-stream"></i>
        <span>Sales POS B</span>
      </a>
      <a href="employee_list.php">
        <i class="far fa-question-circle"></i>
        <span>User Account</span>
      </a>
      <a href="employee_list.php">
        <i class="far fa-qr-code"></i>
        <span>Logout</span>
      </a>
    </div>
    <br>
    <br>
    <br>
    <br>
<section id="main">

<div class="container-sm form-group border p-3  justify-content-center border-dark rounded" id="empdetailscontainer" style="background-color: #EDE1CF;">
    <!-- ADDED HEADER -->
    <div class="row my-2">
      <div class="col-lg-4">
          <h2 style= "font-weight: bold;">Employee Payroll</h2>
      </div>
    </div>
    <div class="row my-2 gy-5 gx-10 justify-content-center">
        <div class="col-lg-12 d-flex justify-content-center">
        <table class="table table-hover border-dark">
  <thead>
    <tr>
      <th scope="col">Employee Number</th>
      <th scope="col">Employee Name</th>
      <th scope="col">Gender</th>
      <th scope="col">Date of Birth</th>
      <th scope="col">Nationality</th>
      <th scope="col">Civil Status</th>
      <th scope="col">Designation</th>
      <th scope="col">Department</th>
      <th scope="col">Employee Status</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $query = "SELECT * FROM employee";
    $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
    if (mysqli_num_rows($run_query) > 0){
    while ($row = mysqli_fetch_array($run_query)){
        $employeeid = $row['employeenumber'];
        $employeename = $row['employeename'];
        $gender = $row['gender'];
        $birthdate = $row['birthdate'];
        $nationality = $row['nationality'];
        $civilstatus = $row['civilstatus'];
        $designation = $row['designation'];
        $department = $row['department'];
        $id = $row['id'];
        $employeestatus = $row['employeestatus'];
        echo '<tr row_id="'.$id.'">';
        echo '<th scope="row">'.$employeeid.'</th>';
        echo '<td>'.$employeename.'</td>';
        echo '<td>'.$gender.'</td>';
        echo '<td>'.$birthdate.'</td>';
        echo '<td>'.$nationality.'</td>';
        echo '<td>'.$civilstatus.'</td>';
        echo '<td>'.$designation.'</td>';
        echo '<td>'.$department.'</td>';
        echo '<td>'.$employeestatus.'</td>';
        echo '</tr>';
        echo '</a>';
        ?>
        </a>
        <?php

    }}
    ?>
  
  </tbody>
</table>
        </div>
    </div>


</div>

</section>

</body>
</html>
<?php }?>