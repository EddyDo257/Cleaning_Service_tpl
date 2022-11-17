<?php 
  include'header.php';
 ?>
 <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li class="active">Booking List Edit</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <p>
                      <form class="form-horizontal" method="POST" action="booking_add.php" enctype="multipart/form-data">
                                    <div class="container-fluid">
                                      <div class="row">
                                        <div class="col-sm-12">
                                          <div class="row">
                                            <div class="col-8 col-sm-6">
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-5 control-label">Name</label>
                                                    <div class="col-sm-9">
                                                        <select name="name" class="form-control" >
                                                      <option selected disabled >Choose User</option>
                                                      <?php
                                                            $conn = mysqli_connect('localhost', 'root', '', 'service');
                                                          if ($conn->connect_error) {
                                                              die("Connection failed: " . $conn->connect_error);
                                                          }
                                                          $query = "SELECT * FROM users";
                                                          $query_run = mysqli_query($conn, $query);
                                                          if(mysqli_num_rows($query_run) > 0){
                                                                      while ($row = mysqli_fetch_assoc($query_run)) {
                                                      ?>
                                                      <option value="<?php echo $row['name']; ?>" ><?php echo $row['name']; ?></option>
                                                      <?php 
                                                                }
                                                        }else{
                                                              echo "no data found";
                                                              }
                                                    ?>
                                                    </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                  <?php
                                                      $conn = mysqli_connect('localhost', 'root', '', 'service');
                                                      if(isset($_POST['edit_btn'])){

                                                          $id = $_POST['edit_id'];
                                                          $query = "SELECT * FROM booking WHERE id='$id'";

                                                          $query_run = mysqli_query($conn, $query);

                                                          foreach ($query_run as $row) {
                                                            }
                                                    }
                                                            ?>
                                                    <label for="email" class="col-sm-5 control-label">Email</label>
                                                    <div class="col-sm-9">
                                                      <input type="hidden" class="form-control" value="<?php echo $row['id'] ?>" id="edit_id" name="edit_id"  required>
                                                        <input type="email" value="<?php echo $row['email'] ?>" name="email"  class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tel" class="col-sm-5 control-label">Phone</label>
                                                    <div class="col-sm-9">
                                                        <input type="tel" name="phone" value="<?php echo $row['phone'] ?>"  class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tel" class="col-sm-5 control-label">City</label>
                                                    <div class="col-sm-9">
                                                      <select name="city" class="form-control"  required>
                                                            <option selected>Select your Area</option>
                                                            <option value="Kigali">Kigali</option>
                                                            <option value="Northern">Northern Province</option>
                                                      </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tel" class="col-sm-5 control-label">District</label>
                                                    <div class="col-sm-9">
                                                      <select name="district" class="form-control"  required>
                                                            <option selected>Choose district</option>
                                                            <option value="Gasabo">Gasabo</option>
                                                            <option value="Kicukiro">Kicukiro</option>
                                                            <option value="Nyarugenge">Nyarugenge</option>
                                                      </select>
                                                    </div>
                                                </div>
                                              </div>
                                              <div class="col-8 col-sm-6">
                                                <div class="form-group">
                                                    <label for="avenue" class="col-sm-5 control-label">Avenue</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="avenue" value="<?php echo $row['avenue'] ?>"  class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tel" class="col-sm-5 control-label">Service</label>
                                                    <div class="col-sm-9">
                                                      <select name="service" class="form-control"  required>
                                                              <option selected>Choose Services</option>
                                                              <option value="house">HOUSE Cleaning</option>
                                                              <option value="garden">GARDEN CLEANING</option>
                                                              <option value="Sanitation">SANITIZATION</option>
                                                              <option value="PAINTING">PAINTING</option>
                                                      </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tel" class="col-sm-5 control-label">Service Type</label>
                                                    <div class="col-sm-9">
                                                      <select name="service_type" class="form-control"  required>
                                                            <option selected>Choose</option>
                                                            <option value="House">House</option>
                                                            <option value="Building">Building</option>
                                                      </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="date" class="col-sm-5 control-label">Date</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" name="date" value="<?php echo $row['date'] ?>"   class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="time" class="col-sm-5 control-label">Time</label>
                                                    <div class="col-sm-9">
                                                        <input type="time" name="time" class="form-control" value="<?php echo $row['time'] ?>"  required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="description" class="col-sm-5 control-label">Description</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="description"  value="<?php echo $row['description'] ?>"  class="form-control" required>
                                                    </div>
                                                </div>
                                              </div>
                                          </div>
                                          
                                        </div>
                                        <div style="margin:12px;">
                                          
                                          <button type="button" onclick="location.href='booking.php';" class="btn1 btn-danger btn-flat pull-left" data-dismiss="modal" style="margin-right: 12px;"><i class="fa fa-close"></i> Close</button>
                                          <button type="submit" class="btn1 btn-success btn-flat" name="edit_btn"><i class="fa fa-check-square-o"></i> Update</button>
                                        </div>
                                      </div>
                                    </div>
                                
                                  </form>      
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    <?php 
    include'footer.php';
    include'script.php';
?>