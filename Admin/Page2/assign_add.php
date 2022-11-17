<?php
  session_start();
  $conn = new mysqli('localhost', 'root', '', 'service');

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  
  if(isset($_POST['edit_btn'])){
    $id = $_POST['edit_id'];

    $sql = "UPDATE assign SET task = 'Complete' WHERE id = '$id'";
    if($conn->query($sql)){
      $_SESSION['success'] = 'Report successfully Saved';
      
    }
    else{
      $_SESSION['error'] = $conn->error;
      //echo $conn->error;
      ;
    }
  }
  header('location: assign.php');
?>