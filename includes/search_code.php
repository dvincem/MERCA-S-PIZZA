<?php

    if (isset($_POST['search_pos_a'])) {

        require 'config.php';
        
        $salesNum = $_POST ['searchNum'];
        $query = "SELECT * FROM sales_pos_a WHERE SalesNumber = '$salesNum'";
        $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if (mysqli_num_rows($run_query) > 0) {
            header("location: ../sales_pos_a.php?success&salesnum=".$salesNum."");
            exit();
        }
        elseif (empty($salesNum)) {
            header("location: ../sales_pos_a.php?error1=empty");
            exit();
        }
        else {
            header("location: ../sales_pos_a.php?error2=norecord");
            exit();
        }
        exit();
    }

    if (isset($_POST['search_pos_b'])) {

        require 'config.php';
        
        $salesNum = $_POST ['searchNum'];
        $query = "SELECT * FROM sales_pos_b WHERE SalesNumber = '$salesNum'";
        $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if (mysqli_num_rows($run_query) > 0) {
            header("location: ../sales_pos_b.php?success&salesnum=".$salesNum."");
        }
        elseif (empty($salesNum)) {
            header("location: ../sales_pos_b.php?error1=empty");
        }
        else {
            header("location: ../sales_pos_b.php?error2=norecord");
        }
    }

    // EMPLOYEE LIST 
    if (isset($_POST['search_emp_list'])) {

        require 'config.php';
        
        $empNum = $_POST ['searchNum'];
        $query = "SELECT * FROM employee WHERE employeenumber = '$empNum'";
        $run_query = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if (mysqli_num_rows($run_query) > 0) {
            header("location: ../employee_list.php?success&empNum=".$empNum."");
        }
        elseif (empty($empNum)) {
            header("location: ../employee_list.php?error1=empty");
        }
        else {
            header("location: ../employee_list.php?error2=norecord");
        }
    }
?>