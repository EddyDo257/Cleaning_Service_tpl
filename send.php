<?php

if(isset($_GET["usernamee"]) && isset($_GET["phone"]) && isset($_GET["email"]) && isset($_GET["city"]) && isset($_GET["district"]) && isset($_GET["avenue"]) && isset($_GET["service_name"]) && isset($_GET["facility"]) && isset($_GET["time"]) && isset($_GET["date"]) && isset($_GET["description"])&& isset($_GET["amount"])) {

   $usernamee = $_GET["usernamee"]; // get temperature value from HTTP GET
   $phone = $_GET["phone"]; 
   $email = $_GET["email"]; // get temperature value from HTTP GET
   $city = $_GET["city"]; 
   $district = $_GET["district"]; // get temperature value from HTTP GET
   $avenue = $_GET["avenue"]; 
   $service_name = $_GET["service_name"]; // get temperature value from HTTP GET
   $facility = $_GET["facility"]; 
   $time = $_GET["time"]; // get temperature value from HTTP GET
   $date = $_GET["date"]; 
   $description = $_GET["description"]; // get temperature value from HTTP GET
   $amount = $_GET["amount"]; // get temperature value from HTTP GET
   

   $host="localhost";
   $user="root";
  $password="";
  $db="service";
  

   // Create connection
   $conn = new mysqli($host, $user, $password, $db);
   // Check connection
   if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
   }



   /*$sql = "UPDATE  tbl_hum_temp SET Humidity='$humidity', Temperature='$temperature' WHERE ID=1";*/
$sql = "INSERT INTO booking (username,email,phone,city,district,avenue,service_name,facility,date,time,description,amount) VALUES ($usernamee,$email,$phone,$city,$district,$avenue,$service_name,$facility,$date,$time,$description,$amount)";

   if ($conn->query($sql) === TRUE) {
      $get_last_record = "SELECT id FROM booking ORDER BY id DESC LIMIT 1";
       $result_query = mysqli_query($conn,$get_last_record);
       $data_from_query = mysqli_fetch_assoc($result_query);
       $code = $data_from_query['id'];
       //echo $code;
       $sql1 = "INSERT INTO assign (booking_id) VALUES ('$code')";
       if($conn->query($sql1)){
         echo "New record created successfully";
       }
   } else {
      echo "Error: " . $sql . " => " . $conn->error;
   }

   $conn->close();
} else {
   echo "Records are not set";
}
?>