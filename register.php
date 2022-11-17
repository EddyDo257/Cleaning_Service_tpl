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


  $username= trim($_POST["username"]);
  $email= trim($_POST["email"]);
  $phone= trim($_POST["phone"]);
    // Check if username is empty

    $sql4= "SELECT username FROM customer WHERE username = '$username'";
    $checkSQL = mysqli_query($data, $sql4);

    if(mysqli_num_rows($checkSQL) != 0) {
       header("Location: register.php?error=Username already exists&username=&email=$email&phone=$phone");
       exit();
    }

    $sql5= "SELECT email FROM customer WHERE email = '$email'";
    $checkSQL1 = mysqli_query($data, $sql5);

    if(mysqli_num_rows($checkSQL1) != 0) {
       header("Location: register.php?error=Email already exists&username=$username&email=&phone=$phone");
       exit();
    }

    $sql6= "SELECT phone FROM customer WHERE phone = '$phone'";
    $checkSQL2 = mysqli_query($data, $sql6);

    if(mysqli_num_rows($checkSQL2) != 0) {
       header("Location: register.php?error=Phone already exists&username=$username&email=$email&phone=");
       exit();
    }

    if(trim($_POST["password"]) != trim($_POST["password_again"])){
        //$username_err = "Please enter username.";
        header("Location: register.php?error=Password don't match&username=$username&email=$email&phone=$phone");
        exit();
    } else{
        $password = trim($_POST["password"]);
    }
    
    $sql2 = "INSERT INTO customer(username, email, password, phone) VALUES('$username', '$email', '$password', '$phone')";
           $result2 = mysqli_query($data, $sql2);
           if ($result2) {
             header("Location: Reg/");
           exit();
           }else {
              header("Location: register.php?error=Error on registration form");
            exit();
           }
    // Close connection
    mysqli_close($data);
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Cleaning service Register Page</title>
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
      background-color: #fff;
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
        <div class="col-md-7">
          <img src="12.png" class="w-100">
           <!-- <h3>Facebook helps you connect and share with the people in your life.</h3> -->
        </div>
        <div class="col-md-5">
          <form class="login-form" action="#" method="POST">
            <h2 style="text-align: center;">Register Form</h2>
            <hr>
            <?php if (isset($_GET['error'])) { ?>
              <div class="alert alert-danger" role="alert">
                    <?php echo $_GET['error']; ?>
              </div>
            <?php } ?>
            <div class="input-group mb-3">
              <span class="input-group-text " id="basic-addon2" style="background-color: #1d7dbf; color: white; width: 42px;"><i class="fa fa-user fa-2xl"></i></span>
              <input type="text" class="form-control" name="username" <?php if (isset($_GET['error'])) { ?> value="<?php echo $_GET['username']; ?>" <?php } ?> placeholder="Enter username" aria-label="username" aria-describedby="basic-addon2">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text " id="basic-addon2" style="background-color: #1d7dbf; color: white; width: 42px;"><i class="fa fa-envelope-o"></i></span>
              <input type="text" class="form-control" name="email" <?php if (isset($_GET['error'])) { ?> value="<?php echo $_GET['email']; ?>" <?php } ?> placeholder="Enter email" aria-label="email" aria-describedby="basic-addon2">
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text " id="basic-addon2" style="background-color: #1d7dbf; color: white;width: 42px;"><i class="fa fa-mobile" style="width: 55px;font-size: 32px;"></i></span>
              <input type="text" class="form-control" name="phone" <?php if (isset($_GET['error'])) { ?> value="<?php echo $_GET['phone']; ?>" <?php } ?> placeholder="Enter phone" aria-label="phone" aria-describedby="basic-addon2" required>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text " id="basic-addon2" style="background-color: #1d7dbf; color: white;width: 42px;"><i class="fa fa-key"></i></span>
              <input type="password" class="form-control" name="password" placeholder="Enter password" aria-label="password" aria-describedby="basic-addon2" required>
            </div>
            <div class="input-group mb-3">
              <span class="input-group-text " id="basic-addon1" style="background-color: #1d7dbf; color: white;width: 42px;"><i class="fa fa-key"></i></span>
              <input type="password" class="form-control" name="password_again" placeholder="Enter password again" aria-label="password_again" aria-describedby="basic-addon1" required>
            </div>
            <div class="d-grid gap-2 col-12 mx-auto">
              <button type="submit" class="btn btn-primary btn-lg">Register account</button>
            </div>
            <div class="text-center pt-3 pb-3">
              <a href="login.php" class="">Already have account? Login in</a>
              <hr>
              <!-- <button type="button" class="btn btn-success btn-lg mt-3" onclick="next()">Create New Account</button> -->
            </div>
          </form>
          <!-- <p class="pt-3 text-center"><b>Register Page for Customer</b></p> -->
        </div>
      </div>
    </div>
    <script type="text/javascript">
      function next(){
        window.location.href = "register.php"
      }
    </script>
  </body>
</html>