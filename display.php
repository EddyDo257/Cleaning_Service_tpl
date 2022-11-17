
<!DOCTYPE html>
<html>
<head>
    <title>Confirmation order</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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
            background-color: #e6e8e8;
        }

        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }

        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }

        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }

        .invoice-box table tr.top table td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }

        .invoice-box table tr.information table td {
            padding-bottom: 40px;
        }

        .invoice-box table tr.heading td {
            background: #eee;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }

        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }

        .invoice-box table tr.item td {
            border-bottom: 1px solid #eee;
        }

        .invoice-box table tr.item.last td {
            border-bottom: none;
        }

        .invoice-box table tr.total td:nth-child(2) {
            font-weight: bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }

            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }

        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }

        .rtl table {
            text-align: right;
        }

        .rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>
<body>
  <div>
    <div class="invoice-box" id="invoice-box">
        <h3 style="text-align: center;"><u>CONFIRMATION_ORDER</u></h3>
        <table cellpadding="0" cellspacing="0">
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            
                            <td>
                                <img src="11.png"/>
                            </td>

                            <td style="font-weight: bold;">
                                <div style="margin-top: 52px;">
                                  Cleaning service #: <span id="nu"></span><br>
                                Created: <span id="da"></span><br>  
                                </div>
                                
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            
                            <td style="font-weight: bold;">
                                <h3><u>COMPANY INFORMATION</u></h3>
                                Company : City Fumigator LTD.<br>
                                Location: 18 KG 33 Ave, Kigali<br>
                                Telephone: +250 788 627 179
                            </td>

                            <td style="font-weight: bold;">
                                <h3><u>CUSTOMER INFORMATION</u></h3>
                                Name:<span id="username"></span><br>
                                Phone:<span id="phone"></span><br>
                                Email:<span id="email"></span><br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>
                    DETAILS OF ORDER
                </td>

                <td>
                    
                </td>
            </tr>
            <tr class="item">
                <td>
                    Area
                </td>
                <td id="city"></td>
            </tr>
            <tr class="item">
                <td >
                    district
                </td>
                <td id="district"></td>
            </tr>
            <tr class="item">
                <td>
                    street
                </td>
                <td id="avenue"></td>
            </tr>
            <tr class="item">
                <td>
                    service
                </td>
                <td id="service"></td>
            </tr>
            <tr class="item">
                <td>
                    facility
                </td>
                <td id="service_type"></td>
            </tr>
            <tr class="item">
                <td>
                    Date
                </td>
                <td id="date"></td>
            </tr>
            <tr class="item">
                <td>
                    Time
                </td>
                <td id="time"></td>
            </tr>
            <tr class="item">
                <td>
                    Description
                </td>
                <td id="description"></td>
            </tr>
            <tr class="total">
                <td></td>

                <td>
                    Bill paid: Rwf <span id="amount"></span>
                </td>
            </tr>
        </table>
    </div>
    <div class="divbtn">
        <input type="button" class="button" value="Download" onclick="clickme()">
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js"></script>
<script type="text/javascript">
   const username =localStorage.getItem("username");
   const email =localStorage.getItem("email");
   const phone =localStorage.getItem("phone");
   const city =localStorage.getItem("city");
   const district =localStorage.getItem("district");
   const avenue =localStorage.getItem("avenue");
   const service =localStorage.getItem("service");
   const service_type =localStorage.getItem("service_type");
   const date =localStorage.getItem("date");
   const time =localStorage.getItem("time");
   const description =localStorage.getItem("description");
   const amount =localStorage.getItem("amount");
   document.getElementById("username").innerHTML = username;
   document.getElementById("email").innerHTML = email;
   document.getElementById("phone").innerHTML = phone;
   document.getElementById("city").innerHTML = city;
   document.getElementById("district").innerHTML = district;
   document.getElementById("avenue").innerHTML = avenue;
   document.getElementById("service_type").innerHTML = service_type;
   document.getElementById("service").innerHTML = service;
   document.getElementById("date").innerHTML = date;
   document.getElementById("time").innerHTML = time;
   document.getElementById("description").innerHTML = description;
   document.getElementById("amount").innerHTML = amount;

</script>
<script type="text/javascript">
  var myNumber = (Math.floor(Math.random()*100) +1);
  let utc = new Date().toISOString().slice(0, 10);
  document.getElementById("da").innerHTML= utc;
  document.getElementById("nu").innerHTML= myNumber;
</script>
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
        var username = document.getElementById('username').innerHTML;
        var phone = document.getElementById('phone').innerHTML;
        var email = document.getElementById('email').innerHTML;
        var city = document.getElementById('city').innerHTML;
        var district = document.getElementById('district').innerHTML;
        var avenue = document.getElementById('avenue').innerHTML;
        var service = document.getElementById('service').innerHTML;
        var service_type = document.getElementById('service_type').innerHTML;
        var time = document.getElementById('time').innerHTML;
        var date = document.getElementById('date').innerHTML;
        var description = document.getElementById('description').innerHTML;
        var amount = document.getElementById('amount').innerHTML;
           

           $.ajax({
           url : 'http://localhost/cleaning/send.php?usernamee="'+username+'"&phone="'+phone+'"&email="'+email+'"&city="'+city+'"&district="'+district+'"&avenue="'+avenue+'"&service_name="'+service+'"&facility="'+service_type+'"&time="'+time+'"&date="'+date+'"&description="'+description+'"&amount="'+amount+'"', // your php file
           type : 'GET', // type of the HTTP request
           success : function(data){
            console.log("Done")
            localStorage.clear();
            window.location.href = "done.php"

           }
        });

         }, 3000);
        
    }
  function back(){
    window.location.href = "index.php"
  }
</script>
</body>
</html>
