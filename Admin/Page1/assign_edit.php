<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['admin_name'])) {
  $admin_name = $_SESSION['admin_name'];
  include'header_4.php';
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
                                    <li class="active">Assign List Edit</li>
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
                                                        if(isset($_POST['edit_btn'])){

                                                            $id = $_POST['edit_id'];
                                                            
                                                            $query = "SELECT * FROM assign WHERE id='$id'";

                                                            $query_run = mysqli_query($conn, $query);

                                                            foreach ($query_run as $row) {
                                                              }
                                                      }
                                                              ?>
                                                    <label for="name" class="col-sm-5 control-label">Book id</label>
                                                    <div class="col-sm-9">
                                                      <input type="hidden" class="form-control" value="<?php echo $row['id'] ?>" id="edit_id" name="edit_id"  required>
                                                      <input type="hidden" class="form-control" value="<?php echo $_POST['edit_id2'] ?>" id="edit_id" name="edit_id2"  required>
                                                        <input type="text" placeholder="enter a book id" name="book"  value="<?php echo $row['booking_id'] ?>" class="form-control" required disabled>
                                                    </div>
                                                </div>
                                                <dv class="form-group">
                                                <div class="form-group">
                                
                                                  <label for="Phone" class="col-sm-5 control-label">Employee name</label>

                                                  <div class="col-sm-9">

                                                    <select name="worker" class="form-control" >
                                                      <option selected disabled >Choose Worker</option>
                                                      <?php
                                                            $conn = mysqli_connect('localhost', 'root', '', 'service');
                                                          if ($conn->connect_error) {
                                                              die("Connection failed: " . $conn->connect_error);
                                                          }
                                                          $query = "SELECT * FROM employees";
                                                          $query_run = mysqli_query($conn, $query);
                                                          if(mysqli_num_rows($query_run) > 0){
                                                                      while ($row = mysqli_fetch_assoc($query_run)) {
                                                      ?>
                                                      <option value="<?php echo $row['employee_username']; ?>" ><?php echo $row['employee_username']; ?></option>
                                                      <?php 
                                                                }
                                                        }else{
                                                              echo "no data found";
                                                              }
                                                    ?>
                                                    </select>
                                                  </div>
                                                </div>
                                              </div>
                                          </div>
                                          
                                        </div>
                                        <div style="margin:12px; margin-top: 215px;">
                                          
                                          <button type="button" onclick="location.href='assign_pending.php';" class="btn1 btn-danger btn-flat pull-left" data-dismiss="modal" style="margin-right: 12px;"><i class="fa fa-close"></i> Close</button>
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
    }else{
           header("Location: /cleaning/Admin/");
           exit();
      }
?>