<?php 
session_start();
if (isset($_SESSION['usernamee']) && isset($_SESSION['email']) && isset($_SESSION['phone'])) {
    $user = $_SESSION['usernamee'];
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Fumigator Ltd</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="Cleaning Company Website Template" name="keywords">
        <meta content="Cleaning Company Website Template" name="description">

        <!-- Favicon -->
        <link href="img/favicon.ico" rel="icon">

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400&display=swap" rel="stylesheet">
        
        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" integrity="sha512-Tn2m0TIpgVyTzzvmxLNuqbSJH3JP8jm+Cy3hvHrW7ndTDcJ1w5mBiksqDBb8GpE2ksktFvDB/ykZ0mDpsZj20w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
        <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <div class="wrapper">
            <!-- Header Start -->
            <div class="header home">
                <div class="container-fluid">
                    <div class="header-top row align-items-center">
                        <div class="col-lg-3">
                            <div class="brand w-50" >
                                <img src="11.png">
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <!-- <div class="topbar">
                                <div class="topbar-col">
                                    <a href="tel:+012 345 67890"><i class="fa fa-phone-alt"></i>+012 345 67890</a>
                                </div>
                                <div class="topbar-col">
                                    <a href="mailto:info@example.com"><i class="fa fa-envelope"></i>info@example.com</a>
                                </div>
                                <div class="topbar-col">
                                    <div class="topbar-social">
                                       <a href="https://freewebsitecode.com/"><i class="fab fa-twitter"></i></a>
                                    <a href="https://facebook.com/freewebsitecode"><i class="fab fa-facebook-f"></i></a>
                                    <a href="https://freewebsitecode.com/"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="https://freewebsitecode.com/"><i class="fab fa-instagram"></i></a>
                                    <a href="https://www.youtube.com/channel/UC9HlQRmKgG3jeVD_fBxj1Pw/videos"><i class="fab fa-youtube"></i></a>
                                    </div>
                                </div>
                            </div> -->
                            <div class="navbar navbar-expand-lg bg-light navbar-light">
                                <a href="#" class="navbar-brand">MENU</a>
                                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                                    <div class="navbar-nav ml-auto">
                                        <a href="index.php" class="nav-item nav-link active">Home</a>
                                        <a href="#about1" class="nav-item nav-link">About</a>
                                        <a href="#service1" class="nav-item nav-link">Service</a>
                                        <a href="#infoo" class="nav-item nav-link">Information</a>
                                        <a href="#price" class="nav-item nav-link">Pricing</a>
                                        <a href="index.php" class="btn" style="font-size: 15px;"><b><?php echo $user; ?></b></a>
                                        <a href="logout.php" class="btn" style="font-size: 15px;"><b>LogOut</b></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="hero row align-items-center">
                        <div class="col-md-7">
                            <h2>Best & Trusted</h2>
                            <h2><span>Cleaning</span> Service</h2>
                        </div>
                        <div class="col-md-5" id="bookk">
                            <div class="form">
                                <h3>Get Clean Services</h3>
                                <form action="pay.php" method="post">
                                    <div class="form-row">
                                        <div class="col-md-6 form-group">
                                            <input class="form-control" type="hidden" name="username" value="<?php echo $_SESSION['usernamee']; ?>" required>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <input class="form-control" type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>" required>
                                        </div>
                                        
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 form-group">
                                            <input class="form-control" type="hidden" name="phone" value="<?php echo $_SESSION['phone']; ?>" required>
                                        </div>
                                        <?php if (isset($_GET['error'])) { ?>
                                          <div class="alert alert-danger" role="alert">
                                                <?php echo $_GET['error']; ?>
                                          </div>
                                        <?php } ?>

                                        <div class="col-md-12 form-group">
                                            <select class="custom-select" id="city" name="city" required>
                                              <option selected>Select your location</option>
                                              <option value="Kigali">Kigali</option>
                                              <option value="Northern">Northern Province</option>
                                            </select>
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 form-group">
                                            <select class="custom-select" name="district" id="district" required>
                                              <option selected>Choose district</option>
                                              <option value="Gasabo" id="option1">Gasabo</option>
                                              <option value="Kicukiro" id="option2">Kicukiro</option>
                                              <option value="Nyarugenge" id="option3">Nyarugenge</option>
                                            </select>
                                            
                                        </div>
                                        <div class="col-md-6 form-group">
                                          <input type="text" id="avenue" name="avenue" placeholder="Format: kk-234-34" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 form-group">
                                            <select class="custom-select" name="service" id="service" required>
                                                <option selected>Choose Services</option>
                                                <option value="House cleaning">House Cleaning</option>
                                                <option value="Garden cleaning">Garden Cleaning</option>
                                                <option value="Fumigation">Fumigation</option>
                                                <option value="Painting">Painting</option>
                                              </select>
                                        </div>
                                        <div class="col-md-6 form-group">
                                          <select class="custom-select" name="service_type" id="service_type" required>
                                            <option selected>Choose Facility</option>
                                            <option value="House">House</option>
                                            <option value="Building">Building</option>
                                          </select>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-6 form-group">
                                            <input type="date" name="date" class="form-control" value="" required="required"/>
                                        </div>
                                        <div class="col-md-6 form-group">
                                          <input type="time" class="form-control" name="time" value="" required="required" />
                                        </div>
                                    </div>
                                    <textarea class="form-control" name="description" id="description" placeholder="Add other suggestion"></textarea>
                                    <button type="submit" class="btn btn-block">Book Service</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Header End -->
            
            
            <!-- About Start -->
            <div class="about" id="about1">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 col-md-6">
                            <div class="about-img">
                                <img src="img/about.jpg" alt="Image">
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-6">
                            <div class="about-text">
                                <h2><span>10</span> Years Experience</h2>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem.
                                </p>
                                <p>
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem. Curabitur non nisl nec nisi scelerisque maximus. Aenean consectetur convallis porttitor. Aliquam interdum at lacus non blandit.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- About End -->


            <!-- Service Start -->
            <div class="service" id="service1">
                <div class="container">
                    <div class="section-header">
                        <p>Our Services</p>
                        <h2>Provide Services For Cleaning</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="service-item">
                                <img src="img/service-1.jpg" alt="Service">
                                <h3>House Interior Cleaning</h3>
                                <p>
                                    Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="service-item">
                                <img src="img/service-2.jpg" alt="Service">
                                <h3>Garden Cleaning</h3>
                                <p>
                                    Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare
                                </p>
                                
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="service-item">
                                <img src="img/service-3.jpg" alt="Service">
                                <h3>Fumigation Service</h3>
                                <p>
                                    Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare
                                </p>
                                
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="service-item">
                                <img src="img/service-4.jpg" alt="Service">
                                <h3>Painting Service</h3>
                                <p>
                                    Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare
                                </p>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Service End -->
            
            
            <!-- Feature Start -->
            <div class="feature" id="infoo">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="section-header left">
                                <p>Why Choose Us</p>
                                <h2>Expert Cleaners and World Class Services</h2>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate. Aliquam metus tortor, auctor id gravida condimentum, viverra quis sem. Curabitur non nisl nec nisi scelerisque maximus. Aenean consectetur convallis porttitor. Aliquam interdum at lacus non blandit.
                            </p>
                            
                        </div>
                        <div class="col-md-7">
                            <div class="row align-items-center feature-item">
                                <div class="col-5">
                                    <img src="img/feature-1.jpg" alt="Feature">
                                </div>
                                <div class="col-7">
                                    <h3>Expert Cleaners</h3>
                                    <p>
                                        Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate.
                                    </p>
                                </div>
                            </div>
                            <div class="row align-items-center feature-item">
                                <div class="col-5">
                                    <img src="img/feature-2.jpg" alt="Feature">
                                </div>
                                <div class="col-7">
                                    <h3>Reasonable Prices</h3>
                                    <p>
                                        Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate.
                                    </p>
                                </div>
                            </div>
                            <div class="row align-items-center feature-item">
                                <div class="col-5">
                                    <img src="img/feature-3.jpg" alt="Feature">
                                </div>
                                <div class="col-7">
                                    <h3>Quick & Best Services</h3>
                                    <p>
                                        Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulputate.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Feature End -->
            
            
            
            <!-- Pricing Plan Start -->
            <div class="price" id="price">
                <div class="container">
                    <div class="section-header">
                        <p>Pricing Plan</p>
                        <h2>No Extra Hidden Charges</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="price-item">
                                <div class="price-header">
                                    <div class="price-icon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <div class="price-title">
                                        <h2>House cleaning</h2>
                                    </div>
                                    <div class="price-pricing">
                                        <h3><small>Rwf</small>30.000</h3>
                                    </div>
                                </div>
                                <div class="price-body">
                                    <div class="price-des">
                                        <ul>
                                            <li>Bedrooms cleaning</li>
                                            <li>Bathrooms cleaning</li>
                                            <li>Living room Cleaning</li>
                                            <li>Vacuum Cleaning</li>
                                            <li>Within 6 Hours</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="price-footer">
                                    <div class="price-action">
                                        <a href="#bookk" id="book"><i class="fa fa-shopping-cart" ></i>Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="price-item featured-item">
                                <div class="price-header">
                                    <div class="price-icon">
                                        <i class="fas fa-tree"></i>
                                    </div>
                                    <div class="price-title">
                                        <h2>Garden cleaning</h2>
                                    </div>
                                    <div class="price-pricing">
                                        <h3><small>Rwf</small>50.000</h3>
                                    </div>
                                </div>
                                <div class="price-body">
                                    <div class="price-des">
                                        <ul>
                                            <li>5 Bedrooms cleaning</li>
                                            <li>3 Bathrooms cleaning</li>
                                            <li>2 Living room Cleaning</li>
                                            <li>Vacuum Cleaning</li>
                                            <li>Within 6 Hours</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="price-footer">
                                    <div class="price-action">
                                        <a href="#bookk" id="book"><i class="fa fa-shopping-cart"></i>Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="price-item">
                                <div class="price-header">
                                    <div class="price-icon">
                                        <i class="fas fa-paint-roller"></i>
                                    </div>
                                    <div class="price-title">
                                        <h2>Painting</h2>
                                    </div>
                                    <div class="price-pricing">
                                        <h3><small>Rwf</small>15.000</h3>
                                    </div>
                                </div>
                                <div class="price-body">
                                    <div class="price-des">
                                        <ul>
                                            <li>Bedrooms painting</li>
                                            <li>Bathrooms painting</li>
                                            <li>Living room painting</li>
                                            <li>Outdoor painting</li>
                                            <li>Within 12 Hours</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="price-footer">
                                    <div class="price-action">
                                        <a href="#bookk" id="book"><i class="fa fa-shopping-cart"></i>Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="price-item">
                                <div class="price-header">
                                    <div class="price-icon">
                                        <i class="fab fa-cloudversify"></i>
                                    </div>
                                    <div class="price-title">
                                        <h2>Fumigation</h2>
                                    </div>
                                    <div class="price-pricing">
                                        <h3><small>Rwf</small>60.000</h3>
                                    </div>
                                </div>
                                <div class="price-body">
                                    <div class="price-des">
                                        <ul>
                                            <li>House cleaning</li>
                                            <li>Building cleaning</li>
                                            <li>Within 12 Hours</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="price-footer">
                                    <div class="price-action">
                                        <a href="#bookk" id="book"><i class="fa fa-shopping-cart"></i>Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- Pricing Plan End -->

            <!-- Footer Start -->
            <div class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-lg-3">
                            <div class="footer-contact">
                                <h2>Get In Touch</h2>
                                <p><i class="fa fa-map-marker-alt"></i>18 KG 33 Ave, Kigali</p>
                                <p><i class="fa fa-phone-alt"></i>+250 78 253 194</p>
                                <p><i class="fa fa-envelope"></i>Fumigator@gmail.com</p>
                                
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="footer-link">
                                <h2>Useful Link</h2>
                                <a href="#">About Us</a>
                                <a href="#">Our Story</a>
                                <a href="#">Our Services</a>
                                <a href="#">Our Projects</a>
                                <a href="#">Contact Us</a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="footer-link">
                                <h2>Useful Link</h2>
                                <a href="#">Our Clients</a>
                                <a href="#">Clients Review</a>
                                <a href="#">Ongoing Project</a>
                                <a href="#">Customer Support</a>
                                <a href="#">FAQs</a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="footer-form">
                                <h2>Stay Updated</h2>
                                <p>
                                    Lorem ipsum dolor sit amet, adipiscing elit. Etiam accumsan lacus eget velit
                                </p>
                                
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <!-- Footer End -->
            
            <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        </div>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>
        <script src="lib/isotope/isotope.pkgd.min.js"></script>
        <script src="lib/lightbox/js/lightbox.min.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
        <script type="text/javascript">
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    document.querySelector(this.getAttribute('href')).scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            });
        </script>
        <script type="text/javascript">
            $('#district').attr('disabled', 'disabled');
            $('#city').on('change', function(){
                 //or alert($(this).val());
                var s = this.value;
                if (s=="Kigali") {
                    document.getElementById("option1").value="Gasabo";
                    document.getElementById("option2").value="Kicukiro";
                    document.getElementById("option3").value="Nyarugenge";
                    document.getElementById("option1").innerHTML="Gasabo";
                    document.getElementById("option2").innerHTML="Kicukiro";
                    document.getElementById("option3").innerHTML="Nyarugenge";
                    $('#district').removeAttr('disabled');
                }else if(s=="Northern"){
                    document.getElementById("option1").value="Musanze";
                    document.getElementById("option2").value="Gakenke";
                    document.getElementById("option3").value="Gicumbi";
                    document.getElementById("option1").innerHTML="Musanze";
                    document.getElementById("option2").innerHTML="Gakenke";
                    document.getElementById("option3").innerHTML="Gicumbi";
                    $('#district').removeAttr('disabled');
                }else{
                   $("#district").show();
                   $('#district').attr('disabled', 'disabled'); 
                }
            });
        </script>
    </body>
</html>
<?php 
}else{
     header("Location: login.php");
     exit();
}
 ?>
