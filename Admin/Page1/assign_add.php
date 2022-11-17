<?php
  session_start();
  $conn = new mysqli('localhost', 'root', '', 'service');

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  
  if(isset($_POST['add'])){
    $book = $_POST['book'];
    $worker = $_POST['worker'];
    

    $sql = "INSERT INTO assign (booking_id, worker_name) VALUES ('$book', '$worker')";
    if($conn->query($sql)){
      $_SESSION['success'] = 'Assign added successfully';
    }
    else{
      $_SESSION['error'] = $conn->error;
      //echo $conn->error;
    }

  }

  if(isset($_POST['edit_btn'])){
    $id = $_POST['edit_id'];
    $book = $_POST['edit_id2'];
    $worker = $_POST['worker'];
    $employee_name;
    $employee_phone;
    $customer_name;
    $customer_phone;
    $customer_email;
    $customer_service;
    $customer_facility;
    $customer_date;
    $customer_time;
    
    
    $sql = "UPDATE assign SET employee_name = '$worker' WHERE id = '$id'";
    if($conn->query($sql)){
        $sql2 = "SELECT employee_username,employee_phone FROM employees WHERE employee_username = '$worker'";
    $result = $conn->query($sql2);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $employee_name= $row["employee_username"];
        $employee_phone= $row["employee_phone"];
        
      }
    } else {
      echo "0 results";
    }
     $sql3 = "SELECT username,phone,email,service_name,facility,date,time FROM booking WHERE id = '$book'";
    $result = $conn->query($sql3);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        $customer_name= $row["username"];
        $customer_phone= $row["phone"];
        $customer_email= $row["email"];
        $customer_service= $row["service_name"];
        $customer_facility= $row["facility"];
        $customer_date= $row["date"];
        $customer_time= $row["time"];
        
        
        
      }
    } else {
      echo "0 results";
    }
    $_SESSION['employee_name'] = $employee_name;
    $_SESSION['employee_phone'] = $employee_phone;
    $_SESSION['customer_name'] = $customer_name;
    $_SESSION['customer_phone'] = $customer_phone;
    $_SESSION['customer_email'] = $customer_email;
    $_SESSION['customer_service'] = $customer_service;
    $_SESSION['customer_facility'] = $customer_facility;
    $_SESSION['customer_date'] = $customer_date;
    $_SESSION['customer_time'] = $customer_time;
    
    header("Location: mailer/");
    exit();
      
    }
    else{
      $_SESSION['error'] = $conn->error;
      //echo $conn->error;
      ;
    }
  }

  if(isset($_POST['delete'])){
    $id = $_POST['delete_id'];

    $sql = "DELETE FROM assign WHERE id = '$id'";
    if($conn->query($sql)){
      $_SESSION['success'] = 'Assign deleted successfully';
      
    }
    else{
      $_SESSION['error'] = $conn->error;
      //echo $conn->error;
    }
  }
  header("Location: assign_pending.php");
?>