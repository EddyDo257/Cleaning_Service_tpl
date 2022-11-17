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
                                    <li><a href="index.php">Dashboard</a></li>
                                    <li class="active">Employee List</li>
                                    
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
                                  <form action='employee-report.php' method='POST'>
                                                     <button class='btn btn-primary btn-sm edit btn-flat' type='submit' name='edit_detail'><i class="fa fa-file-pdf-o"></i> Report in PDF</button>
                              </form>
                              <p>
                                <div class="box-header with-border">
                              <a href="#addnew" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>

                            </div>
                                
                            </div>

                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                     <?php
                                    $conn = mysqli_connect('localhost', 'root', '', 'service');
                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }
                                    $query = "SELECT * FROM employees";
                                    $query_run = mysqli_query($conn, $query);

                        ?>
                                    <thead>
                                        <tr>
                            
                                            <th> id </th>
                                            <th> Name </th>
                                            <th> Username  </th>
                                            <th> Email_Address</th>
                                            <th> Phone_number</th>
                                            <th> Password </th>
                                            <th> Time_saved </th>
                                            <th> Update </th>
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
                                                    <td><?php echo $row['employee_name']; ?></td>
                                                    <td><?php echo $row['employee_username']; ?></td>
                                                    <td><?php echo $row['employee_email']; ?></td>
                                                    <td><?php echo $row['employee_phone']; ?></td>
                                                    <td><?php echo $row['employee_password']; ?></td>
                                                    <td><?php echo $row['time_saved']; ?></td>
                                                    <td>
                                                        <form action='employee_edit.php' method='POST'>
                                                                <input type="hidden" name="edit_id" value="<?php echo $row['id']; ?>">
                                                                 <button class='btn btn-success btn-sm edit btn-flat' type='submit' name='edit_btn'><i class='fa fa-edit'></i> Edit</button>
                                                        </form>
                                                      </td>
                                                      <td>
                                                        <form action='employee_add.php' method='POST'>
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
        <div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Customer record</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" method="POST" action="employee_add.php" enctype="multipart/form-data">
                <div class="container-fluid">
                    <div class="row">
                      <div class="form-group">
                        <label for="name" class="col-sm-12 control-label">Name</label>
                            <div class="col-sm-12">
                               <input type="text" placeholder="enter a name" name="name"  class="form-control" required>
                            </div>
                       </div>
                      <div class="form-group">
                        <label for="email" class="col-sm-12 control-label">Username</label>
                        <div class="col-sm-12">
                        <input type="text" placeholder="enter a username" name="username"  class="form-control" required>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="email" class="col-sm-12 control-label">Email</label>
                        <div class="col-sm-12">
                         <input type="email" placeholder="enter a email" name="email"  class="form-control" required>
                        </div>
                      </div>
                                              <div class="form-group">
                                                  <label for="phone" class="col-sm-12 control-label">Phone</label>
                                                  <div class="col-sm-12">
                                                      <input type="tel" name="phone" placeholder="enter a phone"  class="form-control" required>
                                                  </div>
                                              </div>
                                              <div class="form-group">
                                                  <label for="password" class="col-sm-12 control-label">password</label>
                                                  <div class="col-sm-12">
                                                      <input type="text" name="password" placeholder="enter a password"  class="form-control" required>
                                                  </div>
                                              </div>  
                    </div>
                </div>
            
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary btn-flat" name="add">Save</button>
              </div>
            </form>
            </div>
          </div>
        </div>
    <?php 
    include'footer.php';
    include'script.php';
    }else{
           header("Location: /cleaning/Admin/");
           exit();
      }
?>