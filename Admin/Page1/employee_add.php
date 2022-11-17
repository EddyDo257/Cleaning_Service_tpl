<?php
  session_start();
  $conn = new mysqli('localhost', 'root', '', 'service');

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  
  if(isset($_POST['add'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    

    $sql = "INSERT INTO employees (employee_name, employee_email, employee_phone, employee_username, employee_password) VALUES ('$name', '$email', '$phone', '$username', '$password')";
    if($conn->query($sql)){

      $get_last_record = "SELECT id FROM employees ORDER BY id DESC LIMIT 1";
       $result_query = mysqli_query($conn,$get_last_record);
       $data_from_query = mysqli_fetch_assoc($result_query);
       $code = $data_from_query['id'];
       //echo $code;
       $sql1 = "INSERT INTO login (username,password,user_type) VALUES ('$username','$password','Employee')";
       if($conn->query($sql1)){
        $_SESSION['success'] = 'Employee added successfully';
       } else{
        $_SESSION['error'] = $conn->error;
       }
    }
    else{
      $_SESSION['error'] = $conn->error;
      //echo $conn->error;
    }

  }

  if(isset($_POST['edit_btn'])){
    $id = $_POST['edit_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "UPDATE employees SET employee_name = '$name', employee_email = '$email', employee_phone = '$phone', employee_username = '$username', employee_password = '$password' WHERE id = '$id'";
    if($conn->query($sql)){
      $_SESSION['success'] = 'Employee updated successfully';
      
    }
    else{
      $_SESSION['error'] = $conn->error;
      //echo $conn->error;
      ;
    }
  }

  if(isset($_POST['delete'])){
    $id = $_POST['delete_id'];

    $sql = "DELETE FROM employees WHERE id = '$id'";
    if($conn->query($sql)){
      $_SESSION['success'] = 'Employee deleted successfully';
      
    }
    else{
      $_SESSION['error'] = $conn->error;
      //echo $conn->error;
    }
  }
  header('location: employee.php');
?>