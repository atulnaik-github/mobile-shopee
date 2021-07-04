 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <section class="content-header">
    <h1>
      Add Staff
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Setting</a></li>
      <li class="active">Add Staff</li>
    </ol>
  </section>

   <!-- Main content -->
   <section class="content">

    <div class="row">
     <div class="col-md-12">
      <!-- general form elements -->
      <div class="box box-primary">
        <div class="box-header with-border">
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form role="form" action="<?= base_url('Adminarea/add_staff'); ?>" method="post" enctype="multipart/form-data">
          <div class="box-body">
             <div class="form-group row">
             <label class="col-sm-1 col-form-label">Staff Name</label>
             <div class="col-sm-4">
              <input type="text" class="form-control" name="staff_name">
            </div>
            <label class="col-sm-2 col-form-label">Username</label>
             <div class="col-sm-4">
              <input type="text" class="form-control" name="user_name">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-1 col-form-label">Password</label>
             <div class="col-sm-4">
              <input type="password" class="form-control" name="password">
            </div>
               <label class="col-sm-2 col-form-label">Staff Address</label>
             <div class="col-sm-4">
              <input type="text" class="form-control" name="staff_add">
            </div>     
           </div>
            <div class="form-group row">
               <label class="col-sm-1 col-form-label">Mobile No</label>
               <div class="col-sm-4">
               <input type="text" class="form-control" name="mob_no">
               </div>
               <label class="col-sm-2 col-form-label">Email</label>
               <div class="col-sm-4">
               <input type="email" class="form-control" name="email"> 
               </div>      
           </div>
           <div class="form-group row">
               <label class="col-sm-1 col-form-label">Upload Photo</label>
               <div class="col-sm-4">
               <input type="file" class="form-control" name="file_up">
             </div>       
           </div>
            
           </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
      <!-- /.box -->
      </div>
    </div>
    <!-- /.row -->

   <div class="box box-primary">
              <div class="box-body table-responsive">
                <table id="example" class="table table-striped table-bordered">
                <thead>
                <tr>
                  <th width="5%">Sr</th>
                  <th>Staff Name</th>
                  <th>Username</th>
                  <th>Password</th>
                  <th>Staff Address</th>
                  <th>Mobile No</th>
                  <th>Email </th>
                  <th>Upload Photo</th>
                  <th width="10%">Action</th>        
                </tr>
                </thead>
                 <tbody>
                  <?php foreach ($staff as $key => $row):?>
                    <tr>
                      <td><?= $key+1;?></td>
                      <td><?= $row['staff_name'];?></td>
                      <td><?= $row['user_name'];?></td>
                      <td><?= $row['password'];?></td>
                      <td><?= $row['staff_add'];?></td>
                      <td><?= $row['mob_no'];?></td>
                      <td><?= $row['email'];?></td>
                      <td><?= $row['file_up'];?></td>
                      <td>
                        <a href="" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>&emsp;
                        <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                  <?php endforeach;?>
                 </tbody>
                </table>
              </div>
          </div>
  

  </section>

</div>
 <script type="text/javascript">
    $("#example").dataTable();
  </script>
  <!-- /.content-wrapper -->
