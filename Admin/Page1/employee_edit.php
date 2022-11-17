<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['admin_name'])) {
  $admin_name = $_SESSION['admin_name'];
  include'header_3.php';
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
                                    <li class="active">Employee List Edit</li>
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
                            <form class="form-horizontal" method="POST" action="employee_add.php" enctype="multipart/form-data">
                                    <div class="container-fluid">
                                      <div class="row">
                                          <div class="form-group">
                                              <div class="form-group">
                                                <?php
                                                      $conn = mysqli_connect('localhost', 'root', '', 'service');
                                                      if(isset($_POST['edit_btn'])){

                                                          $id = $_POST['edit_id'];
                                                          $query = "SELECT * FROM employees WHERE id='$id'";

                                                          $query_run = mysqli_query($conn, $query);

                                                          foreach ($query_run as $row) {
                                                            }
                                                    }
                                                            ?>
                                                  <label for="name" class="col-sm-12 control-label">Name</label>
                                                  <div class="col-sm-12">
                                                    <input type="hidden" class="form-control" value="<?php echo $row['id'] ?>" id="edit_id" name="edit_id"  required>
                                                      <input type="text" placeholder="enter a name" name="name"  value="<?php echo $row['employee_name'] ?>" class="form-control" required>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label for="email" class="col-sm-12 control-label">Username</label>
                                                  <div class="col-sm-12">
                                                      <input type="text" placeholder="enter a username" name="username"  value="<?php echo $row['employee_username'] ?>" class="form-control" required>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label for="email" class="col-sm-12 control-label">Email</label>
                                                  <div class="col-sm-12">
                                                      <input type="email" placeholder="enter a email" name="email"  value="<?php echo $row['employee_email'] ?>" class="form-control" required>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label for="phone" class="col-sm-12 control-label">Phone</label>
                                                  <div class="col-sm-12">
                                                      <input type="tel" name="phone" placeholder="enter a phone"  value="<?php echo $row['employee_phone'] ?>" class="form-control" required>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label for="password" class="col-sm-12 control-label">password</label>
                                                  <div class="col-sm-12">
                                                      <input type="text" name="password" placeholder="enter a password"  value="<?php echo $row['employee_password'] ?>" class="form-control" required>
                                                  </div>
                                              </div>
                                          </div>  
                                        </div>
                                        <div style="margin:12px; ">
                                          <button type="button" onclick="location.href='employee.php';" class="btn1 btn-danger btn-flat pull-left" data-dismiss="modal" style="margin-right: 12px;"><i class="fa fa-close"></i> Close</button>
                                  <button type="submit" class="btn1 btn-success btn-flat" name="edit_btn"><i class="fa fa-check-square-o" ></i> Update</button>
                                        </div>
                                      </div>
                                    </div>
                                <div class="modal-footer1">
                                  
                                  </form>    
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    <?php 
    include'footer.php';
    include'script.php';
    }else{
           header("Location: /project/cleaning/Admin/");
           exit();
      }
?>