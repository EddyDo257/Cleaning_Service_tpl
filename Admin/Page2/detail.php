<?php 
session_start();
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
                                    <li class="active">Detail Order</li>
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
                          <form class="form-horizontal" method="POST" action="assign_add.php" enctype="multipart/form-data">
                                    <div class="container-fluid">
                                      <div class="row">
                                        <div class="col-sm-12">
                                          <div class="row">
                                            <div class="col-8 col-sm-6">
                                                <div class="form-group">
                                                  <?php
                                                      $conn = mysqli_connect('localhost', 'root', '', 'service');
                                                      if(isset($_POST['edit_detail'])){

                                                          $id = $_POST['edit_id2'];
                                                          $query = "SELECT * FROM booking WHERE id='$id'";

                                                          $query_run = mysqli_query($conn, $query);

                                                          foreach ($query_run as $row) {
                                                            }
                                                    }
                                                            ?>
                                                    <label for="email" class="col-sm-5 control-label">Customer Name</label>
                                                    <div class="col-sm-9">
                                                      <input type="hidden" class="form-control" value="<?php echo $row['id'] ?>" id="edit_id" name="edit_id" style="color: black;" required>
                                                        <input type="text" value="<?php echo $row['username'] ?>" name="username" style="color: black;font-weight: bold;font-size: 20px;" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tel" class="col-sm-5 control-label">Email</label>
                                                    <div class="col-sm-9">
                                                        <input type="tel" name="email" value="<?php echo $row['email'] ?>" style="color: black;font-weight: bold;font-size: 20px;" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tel" class="col-sm-5 control-label">Phone</label>
                                                    <div class="col-sm-9">
                                                        <input type="tel" name="phone" value="<?php echo $row['phone'] ?>" style="color: black;font-weight: bold;font-size: 20px;" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tel" class="col-sm-5 control-label">City</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="phone" value="<?php echo $row['city'] ?>" style="color: black;font-weight: bold;font-size: 20px;" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tel" class="col-sm-5 control-label">District</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="phone" value="<?php echo $row['district'] ?>" style="color: black;font-weight: bold;font-size: 20px;" class="form-control" disabled>
                                                    </div>
                                                </div>
                                              </div>
                                              <div class="col-8 col-sm-6">
                                                <div class="form-group">
                                                    <label for="avenue" class="col-sm-5 control-label">Avenue</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="avenue" value="<?php echo $row['avenue'] ?>" style="color: black;font-weight: bold;font-size: 20px;" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tel" class="col-sm-5 control-label">Service</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="avenue" value="<?php echo $row['service'] ?>" style="color: black;font-weight: bold;font-size: 20px;" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="tel" class="col-sm-5 control-label">Service Type</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="avenue" value="<?php echo $row['service_type'] ?>" style="color: black;font-weight: bold;font-size: 20px;" class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="date" class="col-sm-5 control-label">Date</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="date" value="<?php echo $row['date'] ?>" style="color: black;font-weight: bold;font-size: 20px;"  class="form-control" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="time" class="col-sm-5 control-label">Time</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="time" class="form-control" value="<?php echo $row['time'] ?>" style="color: black;font-weight: bold;font-size: 20px;" disabled>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="description" class="col-sm-5 control-label">Description</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" name="description"  value="<?php echo $row['description'] ?>" style="color: black;font-weight: bold;font-size: 20px;" class="form-control" disabled>
                                                    </div>
                                                </div>
                                              </div>
                                          </div>
                                          
                                        </div>
                                        <div style="margin:12px;">
                                          
                                          <button type="button" onclick="location.href='assign.php';" class="btn1 btn-danger btn-flat pull-left" data-dismiss="modal" style="margin-right: 12px;"><i class="fa fa-close"></i> Close</button>
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

