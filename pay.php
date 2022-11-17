<?php 
session_start();
if (isset($_SESSION['usernamee']) && isset($_SESSION['email']) && isset($_SESSION['phone'])) {

    $conn = new mysqli('localhost', 'root','', 'service');

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  
  if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['city'])&& isset($_POST['district'])&& isset($_POST['avenue'])&& isset($_POST['service'])&& isset($_POST['service_type'])&& isset($_POST['date'])&& isset($_POST['time'])&& isset($_POST['description'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $district = $_POST['district'];
    $avenue = $_POST['avenue'];
    $service = $_POST['service'];
    $service_type = $_POST['service_type'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $description = $_POST['description'];
    $amount;

    if ($service == "House cleaning") {
        $amount = 30000;
    }elseif ($service == "Garden cleaning") {
        $amount = 50000;
    }elseif ($service == "Fumigation") {
        $amount = 60000;
    }elseif ($service == "Painting") {
        $amount = 15000;
    }
    
  }else{
    header("Location: index.php");
     exit();
  }
 ?>
<!DOCTYPE html>
<html>
<head>
    <title>Payment Method</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="style.css" rel="stylesheet">
  <style>
        
    </style>
</head>
<body>
  <div class="containe_pay" style="z-index:999;" id="pay">
        <div class="header_pay">Payement Option</div>
        <div class="container_content">
            <div class="container_left">
                <div class="container_left_title">
                    Pay with
                </div>
                <div class="container_left_radio">
                    <div class="container_left_radio1">
                        <input type="radio" id="MTN" name="fav_language" value="MTN" checked><label
                            for="html">MTN Momo</label><br>
                    </div>
                    <div class="container_left_radio1">
                        <input type="radio" id="Airtel" name="fav_language" value="Airtel"><label
                            for="html">Airtel Money</label><br>
                    </div>
                </div>
            </div>
            <div class="container_right_mtn" id="MTN_content">
                <input type="hidden" id="username" value="<?php echo $username; ?>">
                <input type="hidden" id="email" value="<?php echo $email; ?>">
                <input type="hidden" id="phone" value="<?php echo $phone; ?>">
                <input type="hidden" id="city" value="<?php echo $city; ?>">
                <input type="hidden" id="avenue" value="<?php echo $avenue; ?>">
                <input type="hidden" id="district" value="<?php echo $district; ?>">
                <input type="hidden" id="service" value="<?php echo $service; ?>">
                <input type="hidden" id="service_type" value="<?php echo $service_type; ?>">
                <input type="hidden" id="date" value="<?php echo $date; ?>">
                <input type="hidden" id="time" value="<?php echo $time; ?>">
                <input type="hidden" id="description" value="<?php echo $description; ?>">
                <input type="hidden" id="amount" value="<?php echo $amount; ?>">



                <div class="container_right_total">
                    <div class="payment_total">
                        <div>Order Details </div>
                        <div id="landsize-div"><?php echo $service; ?></div>
                    </div>
                    <div class="payment_total">
                        <div>Facility Details </div>
                        <div id="landsize-div"><?php echo $service_type; ?></div>
                    </div>
                    <div class="payment_total">
                        <div>Charge</div>
                        <div><span>RWF </span><span><?php echo $amount; ?></span></div>
                    </div>
                    <hr>
                    <div class="payment_total">
                        <div>Bill to Pay</div>
                        <div id="total-amount">RWF <b class="amount-div"><?php echo $amount; ?></b></div>
                    </div>  
                </div>
                <div class="container_right_content1">
                    <div>
                        Pay with MTN momo:
                        <p>
                    </div>
                    <div class="content_mtn">
                        <img src="mtn.png" width="82px;" height="52px;" class="img">
                    </div>
                </div>
                <div class="container_right_content2">
                    Enter your MTN phone number to pay
                    <div class="content_mtn1">
                        <input oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" type="text" class="input" placeholder="07*****" id="paynum">
                        <button class="pay_button ">Pay Rwf <b class="amount-div"><?php echo $amount; ?></b></button>
                    </div>
                    <div class="subtitle">After you press pay, You will be prompted to submit your Mobile Money PIN on
                        your phone to complete the payment</div>
                </div>
                <div class="buttons_back">
                    <div class="backbtn1">
                        <a href="#" class="btnText" onclick="return ck()">
                            <span class="iconify" data-icon="tabler:arrow-back"></span>
                            <span class="btnText">Back</span>
                        </a>

                    </div>
                    <div class="backbtn1">
                        <a href="#" class="btnText" onclick="SaveToDb();">
                            <span class="iconify" data-icon="ic:sharp-done-all"></span>
                            <span class="btnText">Done</span>
                        </a>

                    </div>

                </div>
            </div>
            <div class="container_right_airtel" id="Airtel_content">
                <div class="container_right_total">
                    <div class="payment_total">
                        <div>Order Details </div>
                        <div id="landsize-div">Garden Cleaning</div>
                    </div>
                    <div class="payment_total">
                        <div>Facility Details </div>
                        <div id="landsize-div">House</div>
                    </div>
                    <div class="payment_total">
                        <div>Charge</div>
                        <div><span>RWF </span><span><?php echo $amount; ?></span></div>
                    </div>
                    <hr>
                    <div class="payment_total">
                        <div>Bill to Pay</div>
                        <div id="total-amount">RWF <b class="amount-div"><?php echo $amount; ?></b></div>
                    </div>
                    
                </div>
                <div class="container_right_content1">
                    <div>
                        Pay with Airtel Money:
                        <p>
                    </div>
                    <div class="content_mtn">
                        <img src="airtel.png" width="82px;" height="52px;" class="img">
                    </div>
                </div>
                <div class="container_right_content2">
                    Enter your Airtel phone number to pay
                    <div class="content_mtn1">
                        <input type="text" class="input" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" placeholder="07*****" id="paynum1">
                        <button class="pay_button ">Pay Rwf <b class="amount-div"><?php echo $amount; ?></b></button>
                    </div>
                    <div class="subtitle">After you press pay, You will be prompted to submit your Mobile Money PIN on
                        your phone to complete the payment</div>
                </div>
                <div class="buttons_back">
                    <div class="backbtn1">
                        <a href="index.php" class="btnText">
                            <span class="iconify" data-icon="tabler:arrow-back"></span>
                            <span class="btnText">Back</span>
                        </a>

                    </div>
                    <div class="backbtn1">
                        <a class="btnText" onclick="SaveToDb();">
                            <span class="iconify" data-icon="ic:sharp-done-all"></span>
                            <span class="btnText">Done</span>
                        </a>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var a = 5;
        var a1 = 500;
        b1 = 2000;



        ///////////////////////// end of custome code ///////////////////////////////////////


        const details = document.getElementById('pop');
        const pay = document.getElementById('pay');


        function ck() {

            details.style.display = "block";
            pay.style.display = "none";

            return false;
        }

        function kc() {
            // window.location.href = "index.html";

            return false;
        }
        $('input[type=radio][name=fav_language]').on('change', function () {
            var MTN = document.getElementById('MTN').checked;
            var Airtel = document.getElementById('MTN').checked;
            var x = document.getElementById("MTN_content");
            var y = document.getElementById("Airtel_content");
            switch ($(this).val()) {
                case 'MTN':
                    x.style.display = "flex";
                    y.style.display = "none";
                    break;
                case 'Airtel':
                    y.style.display = "flex";
                    x.style.display = "none";
                    break;
            }
        });

        function SaveToDb() {
            var pay1=document.getElementById("paynum1").value;
            var pay2=document.getElementById("paynum").value;
            if (pay1 == "" & pay2== "") {
                
                alert("Phone number must be filled out");
                
            }else {
                const username=document.getElementById("username").value;
                const email=document.getElementById("email").value;
                const phone=document.getElementById("phone").value;
                const city=document.getElementById("city").value;
                const avenue=document.getElementById("avenue").value;
                const district=document.getElementById("district").value;
                const service=document.getElementById("service").value;
                const service_type=document.getElementById("service_type").value;
                const date=document.getElementById("date").value;
                const time=document.getElementById("time").value;
                const description=document.getElementById("description").value;
                const amount=document.getElementById("amount").value;

                localStorage.setItem("username", username);
                localStorage.setItem("email", email);
                localStorage.setItem("phone", phone);
                localStorage.setItem("city", city);
                localStorage.setItem("district", district);
                localStorage.setItem("avenue", avenue);
                localStorage.setItem("service", service);
                localStorage.setItem("service_type", service_type);
                localStorage.setItem("date", date);
                localStorage.setItem("time", time);
                localStorage.setItem("description", description);
                localStorage.setItem("amount", amount);
                window.location.href = "http://localhost/cleaning/display.php"
            }
        }
    </script>
</body>
</html>
<?php 
}else{
     header("Location: login.php");
     exit();
}
 ?>
