<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['admin_name'])) {
  $admin_name = $_SESSION['admin_name'];
  include'header_5.php';
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
                                    <li><a href="index.php">Dashboard</a></li>
                                    <li class="active">Order assignment List</li>
                                    
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
                            <div class="card-header">
                                <?php
                                  if(isset($_SESSION['error'])){
                                    echo "
                                      <div class='alert alert-danger alert-dismissible'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                        <h4></i> Error!</h4>
                                        ".$_SESSION['error']."
                                      </div>
                                    ";
                                    unset($_SESSION['error']);
                                  }
                                  if(isset($_SESSION['success'])){
                                    echo "
                                      <div class='alert alert-success alert-dismissible'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                        <h4></i> Success!</h4>
                                        ".$_SESSION['success']."
                                      </div>
                                    ";
                                    unset($_SESSION['success']);
                                  }
                                ?>
                                <form action='assign-report_pending.php' method='POST'>
                                <button class='btn btn-primary btn-sm edit btn-flat' type='submit' name='edit_detail'><i class="fa fa-file-pdf-o"></i> Report in PDF</button>
                              </form>
                            </div>

                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                     <?php
                                    $conn = mysqli_connect('localhost', 'root', '', 'service');
                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }
                                    $query = "SELECT * FROM assign where  task='pending...'";
                                    $query_run = mysqli_query($conn, $query);

                        ?>
                                    <thead>
                                        <tr>
                            
                                            <th> Id </th>
                                            <th> Booking_id </th>
                                            <th> Employee_name  </th>
                                            <th> Time </th>
                                            <th> Work_Status </th>
                                            <th> Detail_order</th>
                                            <th> Assign </th>
                                            <th> Delete </th>
                                            
                                          </tr>
                                    </thead>
                                    <tbody>
                                      <?php
                                      if(mysqli_num_rows($query_run) > 0){
                                                  while ($row = mysqli_fetch_assoc($query_run)) {
                                      ?>
                                                    <tr>
                                                    <td><?php echo $row['id']; ?></td>
                                                    <td><?php echo $row['booking_id']; ?></td>
                                                    <td><?php echo $row['employee_name']; ?></td>
                                                    <td><?php echo $row['time']; ?></td>
                                                    <?php
                                                    $yy= $row['task'];
                                                    if($yy == "pending..."){
                                                      ?>
                                                      <td>
                                                        <span class="badge badge-warning">Pending..</span>
                                                        </td>
                                                      <?php
                                                    }else{
                                                      ?>
                                                      <td>
                                                        <span class="badge badge-primary">Complete</span>
                                                        </td>
                                                      <?php
                                                    }
                                                    ?>
                                                    <td>
                                                        <form action='detail.php' method='POST'>
                                                                <input type="hidden" name="edit_id2" value="<?php echo $row['booking_id']; ?>">
                                                                 <button class='btn btn-success btn-sm edit btn-flat' type='submit' name='edit_detail'><i class='fa fa-info-circle'></i> Detail</button>
                                                        </form>
                                                      </td>
                                                    <td>
                                                        <form action='assign_edit.php' method='POST'>
                                                                <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                                                <input type="hidden" name="edit_id2" value="<?php echo $row['booking_id']; ?>">
                                                                 <button class='btn btn-success btn-sm edit btn-flat' type='submit' name='edit_btn'><i class='fa fa-edit'></i> Assign</button>
                                                        </form>
                                                      </td>
                                                      <td>
                                                        <form action='assign_add.php' method='POST'>
                                                                <input type="hidden" name="delete_id" value="<?php echo $row['id']; ?>">
                                                                
                                                                 <button class='btn btn-danger btn-sm delete btn-flat' type='submit' name="delete"><i class='fa fa-trash'></i> Delete</button>
                                                        </form>
                                                      </td>
                                                    
                                                  </tr>
                                                  <?php 
                                                }
                                        }else{
                                              echo "no data found";
                                              }
                                                  ?>
                                      
                                    </tbody>
                                </table>
                            </div>
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