<?php
  session_start();
  if (isset($_SESSION['id']) && isset($_SESSION['worker_name'])) {
  $userrname = $_SESSION['worker_name'];
 ?>
<!DOCTYPE html>
<html>
<head>
    <title>Confirmation order</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
        .divbtn{
            margin-left: 800px;
        }
        .button {
              background-color: #4CAF50;
              border: none;
              color: white;
              padding: 15px 32px;
              text-align: center;
              text-decoration: none;
              display: inline-block;
              font-size: 16px;
              margin: 4px 2px;
              cursor: pointer;
            }
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
            background-color: #fff;
        }
        .head_company{
            display: flex;
            align-items: center;
            flex-direction: row;
            align-items: stretch;
            width: 100%;
            /*background-color: red;*/
        }
        .head_company__1{
            background-color: grey;
            /*background-color: red;*/
        }
        .head_company_2{
            display: flex;
            align-items: center;
            flex-direction: row;
            align-items: stretch;
            width: 100%;
            /*background-color: red;*/
        }
        .f1_head{
            /*background-color: blue;*/
            width: 90%;
        }
        .f2_head{
            /*background-color: green;*/
            width: 30%;
        }
        .f1_head_2{
            /*background-color: blue;*/
            width: 50%;
        }
        .f2_head_2{
            /*background-color: green;*/
            width: 50%;
        }
        .f1_head_21{
            /*background-color: blue;*/
            width: 90%;
        }
        .f2_head_21{
            /*background-color: green;*/
            width: 50%;
        }
        .f1_head_content{
            display: flex;
            flex-direction: column;
        }
        .f1_head_content_2{
            display: flex;
            flex-direction: column;
        }
        .f1_head_content_1{
            display: flex;
            flex-direction: column;
        }
    </style>
</head>
<body>
  <div>
    <?php
      $conn = mysqli_connect('localhost', 'root', '', 'service');
      if(isset($_POST['c_btn'])){

        $id = $_POST['c_id'];
        $query = "SELECT * FROM booking WHERE id='$id'";
        $query_run = mysqli_query($conn, $query);
        foreach ($query_run as $row) {
        }
        }
    ?>
    <div class="invoice-box" id="invoice-box">
        <div class="head_company" >
            <div class="f1_head">
                <div class="f1_head_content" style="font-weight: bold;">
                   <h3>CITY FUGIMATORS LTD</h3> 
                   <div>18 KG 33 AVE, KIGALI</div> 
                   <div>+250 79 0614 111</div> 
                   <div>FUMIGATOR12@GMAIL.COM</div> 
                   <div>WWW.CITY_FUMIGATORS.COM</div> 
                </div>
            </div>
            <div class="f2_head">
                <img src="11.png" style="top: 0;">
            </div>
        </div>
        <div class="head_company_1" >
            <h4 style="text-align:right;margin-top: 24px;">Customer Details</h4>
        </div>
        <div class="head_company_2" >
            <div class="f1_head_2">
                <div class="f1_head_content_1">
                   <div class="input-group ">
                      <span class="input-group-text " id="basic-addon2" style="background-color: #7db5db; color: white;width: 102px;">Name</span>
                      <label type="text" class="form-control"><?php echo $row['username']; ?></label>
                    </div>
                    <div class="input-group">
                      <span class="input-group-text " id="basic-addon2" style="background-color: #7db5db; color: white;width: 102px;">Phone</span>
                      <label type="text" class="form-control"><?php echo $row['phone']; ?></label>
                    </div>
                    <div class="input-group">
                      <span class="input-group-text " id="basic-addon2" style="background-color: #7db5db; color: white;width: 102px;">Email</span>
                      <label type="text" class="form-control"><?php echo $row['email']; ?></label>
                    </div> 
                </div>
            </div>
            <div class="f2_head_2">
                <div class="f1_head_content_2">
                   <div class="input-group ">
                      <span class="input-group-text " id="basic-addon2" style="background-color: #7db5db; color: white; width: 102px;">Location</span>
                      <label type="text" class="form-control"><?php echo $row['city']; ?></label>
                    </div>
                    <div class="input-group">
                      <span class="input-group-text " id="basic-addon2" style="background-color: #7db5db; color: white; width: 102px;">District</span>
                      <label type="text" class="form-control"><?php echo $row['district']; ?></label>
                    </div>
                    <div class="input-group">
                      <span class="input-group-text " id="basic-addon2" style="background-color: #7db5db; color: white; width: 102px;">Avenue</span>
                      <label type="text" class="form-control"><?php echo $row['avenue']; ?></label>
                    </div>
                </div>
            </div>
        </div>
        <p>
        <div class="head_company_2" >
            <div class="f1_head_2">
                <div class="f1_head_content_1">
                   <div class="input-group ">
                      <span class="input-group-text " id="basic-addon2" style="background-color: #7db5db; color: white;width: 129px;">Service needed</span>
                      <label type="text" class="form-control"><?php echo $row['service_name']; ?></label>
                    </div>
                    <div class="input-group">
                      <span class="input-group-text " id="basic-addon2" style="background-color: #7db5db; color: white;width: 129px;">Service type</span>
                      <label type="text" class="form-control"><?php echo $row['facility']; ?></label>
                    </div> 
                </div>
            </div>
            <div class="f2_head_2">
                <div class="f1_head_content_2">
                   <div class="input-group ">
                      <span class="input-group-text " id="basic-addon2" style="background-color: #7db5db; color: white; width: 112px;">Time needed</span>
                      <label type="text" class="form-control"><?php echo $row['time']; ?></label>
                    </div>
                    <div class="input-group">
                      <span class="input-group-text " id="basic-addon2" style="background-color: #7db5db; color: white; width: 112px;">Date needed</span>
                      <label type="text" class="form-control"><?php echo $row['date']; ?></label>
                    </div>
                </div>
            </div>
        </div>
        <p>
        <h6 style="text-align:center;background-color: #7db5db;color: white;font-weight: bold;">REQUEST DESCRIPTION</h6>
        <label type="text" class="form-control" style="height: 100px;"><?php echo $row['description']; ?></label>
        <p>
        <h6 style="text-align:center;background-color: #7db5db;color: white;font-weight: bold;">DESCRIPTION OF WORK COMPLETED</h6>
        <label type="text" class="form-control" style="height: 100px;"></label>
        <p>
        <h6 style="text-align:center;background-color: #7db5db;color: white;font-weight: bold;">EXPLANATION OF WORK INCOMPLETE WORK</h6>
        <label type="text" class="form-control" style="height: 100px;"></label>
        <p>
        <div class="head_company_2" >
            <div class="f1_head_21">
                <div class="f1_head_content_1">
                   <div class="input-group ">
                      <span class="input-group-text " id="basic-addon2" style="background-color: #7db5db; color: white;width: 200px;">WORK DONE BY</span>
                      <label type="text" class="form-control"></label>
                    </div>
                    <div class="input-group">
                      <span class="input-group-text " id="basic-addon2" style="background-color: #7db5db; color: white;width: 200px;">WORK APPROVED BY</span>
                      <label type="text" class="form-control"></label>
                    </div> 
                </div>
            </div>
            <div class="f2_head_21">
                <div class="f1_head_content_2">
                   <div class="input-group ">
                      <span class="input-group-text " id="basic-addon2" style="background-color: #7db5db; color: white; width: 120px;">SIGNATURE</span>
                      <label type="text" class="form-control"></label>
                    </div>
                    <div class="input-group">
                      <span class="input-group-text " id="basic-addon2" style="background-color: #7db5db; color: white; width: 120px;">SIGNATURE</span>
                      <label type="text" class="form-control"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="divbtn">
        <input type="button" class="button" value="Cancel" onclick="back()">
        <input type="button" class="button" value="Confirm" onclick="clickme()">
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js"></script>
<!-- <script type="text/javascript">
  var myNumber = (Math.floor(Math.random()*100) +1);
  let utc = new Date().toISOString().slice(0, 10);
  document.getElementById("da").innerHTML= utc;
  document.getElementById("nu").innerHTML= myNumber;
</script> -->
<script type="text/javascript">
    function clickme(){
        var element = document.getElementById('invoice-box');
        html2pdf(element, {
          margin:       10,
          filename:     'Confirmation_order.pdf',
          html2canvas:  { scale: 2, logging: true, dpi: 192, letterRendering: true },
          jsPDF:        { unit: 'mm', format: 'a4', orientation: 'portrait' }
        });
        setTimeout(function()
        { 
          window.location.href = "index.php"
         }, 3000);
        
    }
  function back(){
    window.location.href = "/cleaning/Admin/Page2/assign.php"
  }
</script>
</body>
</html>
<?php 
      }else{
           header("Location: /cleaning/Admin/Page2/");
           exit();
      }
       ?>