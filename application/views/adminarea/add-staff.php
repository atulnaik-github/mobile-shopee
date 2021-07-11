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
           <form role="form" action="<?= base_url('add-staff'); ?>" method="post" enctype="multipart/form-data">
             <div class="box-body">
               <div class="form-group row">
                 <input type="hidden" name="txt_id" value="<?= !empty($edit_data[0]['id']) ? $edit_data[0]['id'] : ''; ?>">
                 <label class="col-sm-1 col-form-label">Staff Name</label>
                 <div class="col-sm-4">
                   <input type="text" class="form-control" required value="<?= !empty($edit_data[0]['staff_name']) ? $edit_data[0]['staff_name'] : ''; ?>" name="staff_name">
                 </div>
                 <label class="col-sm-2 col-form-label">Username</label>
                 <div class="col-sm-4">
                   <input type="text" class="form-control" required value="<?= !empty($edit_data[0]['user_name']) ? $edit_data[0]['user_name'] : ''; ?>" name="user_name">
                 </div>
               </div>
               <div class="form-group row">

                 <label class="col-sm-1 col-form-label">Password</label>
                 <div class="col-sm-4">
                   <input type="password" class="form-control" required value="<?= !empty($edit_data[0]['password']) ? $edit_data[0]['password'] : ''; ?>" name="password">
                 </div>
                 <label class="col-sm-2 col-form-label">Staff Address</label>
                 <div class="col-sm-4">
                   <input type="text" class="form-control" required value="<?= !empty($edit_data[0]['address']) ? $edit_data[0]['address'] : ''; ?>" name="address">
                 </div>
               </div>
               <div class="form-group row">
                 <label class="col-sm-1 col-form-label">Mobile No</label>
                 <div class="col-sm-4">
                   <input type="text" class="form-control" required value="<?= !empty($edit_data[0]['mobile_number']) ? $edit_data[0]['mobile_number'] : ''; ?>" name="mobile_number" maxlength="10">
                 </div>
                 <label class="col-sm-2 col-form-label">Email</label>
                 <div class="col-sm-4">
                   <input type="email" class="form-control" required value="<?= !empty($edit_data[0]['email']) ? $edit_data[0]['email'] : ''; ?>" name="email">
                 </div>
               </div>
               <div class="form-group row">
                 <label class="col-sm-1 col-form-label">Upload Photo</label>
                 <div class="col-sm-4">
                   <input type="file" class="form-control" name="profile">
                   <input type="hidden" name="old_img" value="<?= !empty($edit_data[0]['profile']) ? $edit_data[0]['profile'] : ''; ?>">
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

     <div class="row">
       <div class="col-md-12">
         <!-- general form elements -->
         <div class="box box-primary">
           <div class="box-header with-border">
           </div>
           <!-- /.box-header -->
           <!-- form start -->
           <form role="form" method="get">
             <div class="box-body">
               <div class="form-group row">
                 <label class="col-sm-1 col-form-label">From Date</label>
                 <div class="col-sm-4">
                   <input type="date" class="form-control" name="from_date">
                 </div>
                 <label class="col-sm-1 col-form-label">To Date</label>
                 <div class="col-sm-4">
                   <input type="date" class="form-control" name="to_date">
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

     <div class="box box-primary">
       <div class="box-body table-responsive">
         <table id="example" class="table table-striped table-bordered">
           <thead>
             <tr>
               <th width="5%">Sr</th>
               <th>Staff Name</th>
               <th>Username</th>
               <th>Staff Address</th>
               <th>Mobile No</th>
               <th>Email </th>
               <!-- <th>Upload Photo</th> -->
               <th width="10%">Action</th>
             </tr>
           </thead>
           <tbody>
           </tbody>
         </table>
       </div>
     </div>


   </section>

 </div>
 <script type="text/javascript">
   $("#example").dataTable({
     "serverSide": true,
     "processing": true,
     "order": [
       [0, "desc"]
     ],
     "ajax": {
       url: base_url + "get-staff-list-data?" + "<?= $_SERVER['QUERY_STRING'] ?>",
       type: 'POST'
     },
   });
 </script>
 <!-- /.content-wrapper -->