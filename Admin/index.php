<?php

session_start();

$host="localhost";
$user="root";
$password="";
$db="service";

$data=mysqli_connect($host,$user,$password,$db);
if ($data === false) {
  die("connection error");
}

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        //$username_err = "Please enter username.";
        header("Location: index.php?error=Please enter username");
        exit();
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        //$password_err = "Please enter your password.";
        header("Location: index.php?error=Please enter your password");
        exit();
    } else{
        $password = trim($_POST["password"]);
    }
    
    $sql="select * from login where username = '".$username."' AND password = '".$password."'";
    $result=mysqli_query($data,$sql);
    $row=mysqli_fetch_array($result);

    if ($row['user_type'] == "Employee") {
      $_SESSION['id'] = $row['id'];
      $_SESSION['worker_name'] = $row['username'];
      $_SESSION['user_type_worker'] = $row['user_type'];
      header("Location: Page2/index.php?");
    }
    elseif ($row['user_type'] == "Admin") {
      $_SESSION['id'] = $row['id'];
      $_SESSION['admin_name'] = $row['username'];
      $_SESSION['user_type'] = $row['user_type'];
      header("Location: Page1/index.php");
    }
    else{
      header("Location: index.php?error=Username or password are incorrect");
        exit();
    }
    // Close connection
    mysqli_close($data);
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Cleaning service login Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="w3hubs.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300i,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
      body{
      background-color: #f0f2f5;
      font-family: "Nunito Sans";
      }
      .login-form{
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, .1), 0 8px 16px rgba(0, 0, 0, .1);
      background-color: #fcfcfc;
      padding: 25px;
      }
      h3{
      padding-left:30px;
      padding-right: 20px;
      }
      .btn-custom{
      background-color: #1877f2;
      border: none;
      border-radius: 6px;
      font-size: 20px;
      line-height: 28px;
      color: #fff;
      font-weight:700;
      height: 48px;
      }
      .btn-custom{
      color: #fff !important;
      }
      input{
      height: 52px;
      font-size: 18px !important;
      color: #f2f2f2;
      }
      .form-control:focus{
      box-shadow: 0 0 0 0 rgba(13,110,253,.25);
      }
      a{
      text-decoration: none;
      }
      a:hover{
      text-decoration: underline;
      }
      @media(max-width: 768px){
        .col-md-7,p{
          display: none;
        }
        input{
          font-size: 16px !important;
        }
        .login-form{
          box-shadow: none;
        }
        
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row align-items-center justify-content-center vh-100">
        <div class="col-md-5">

          <form class="login-form" action="#" method="POST">
              <h2 style="text-align: center;">Admin & Employee Form</h2>
            <hr>
            <?php if (isset($_GET['error'])) { ?>
              <div class="alert alert-danger" role="alert">
                    <?php echo $_GET['error']; ?>
              </div>
            <?php } ?>
            <div class="input-group mb-3">
              <span class="input-group-text w-40 icon" id="basic-addon1" style="background-color: #1d7dbf; color: white;"><i class="fa fa-user"></i></span>
              <input type="text" class="form-control" name="username" placeholder="Enter Username" aria-label="Username" aria-describedby="basic-addon1">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text w-40 icon" id="basic-addon2" style="background-color: #1d7dbf; color: white;"><i class="fa fa-key"></i></span>
              <input type="password" class="form-control" name="password" placeholder="Enter password" aria-label="Username" aria-describedby="basic-addon2">
            </div>
            <div class="d-grid gap-2 col-12 mx-auto">
              <button type="submit" class="btn btn-primary btn-lg">Login</button>
            </div>
            <div class="text-center pt-3 pb-3">
              <!-- <a href="#" class="">Forgotten password?</a> -->
              <hr>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>