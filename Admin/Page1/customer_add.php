<?php
  session_start();
  $conn = new mysqli('localhost', 'root', '', 'service');

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }


  if(isset($_POST['delete'])){
    $id = $_POST['delete_id'];

    $sql = "DELETE FROM customer WHERE id = '$id'";
    if($conn->query($sql)){
      $_SESSION['success'] = 'Customer deleted successfully';
      
    }
    else{
      $_SESSION['error'] = $conn->error;
      //echo $conn->error;
    }
  }
  header('location: customer.php');
?>