 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <section class="content-header">
     <h1>
       Add Supplier
     </h1>
     <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
       <li><a href="#">Setting</a></li>
       <li class="active">Add Supplier</li>
     </ol>
   </section>

   <!-- Main content -->
   <section class="content">

     <div class="row">
       <div class="col-md-4">
         <!-- general form elements -->
         <div class="box box-primary">
           <div class="box-header with-border">
           </div>
           <!-- /.box-header -->
           <!-- form start -->
           <form role="form" action="<?= base_url('Adminarea/add_supplier'); ?>" method="post" enctype="multipart/form-data">
             <div class="box-body">
               <div class="form-group row">
                 <label class="col-sm-3 col-form-label">Supplier Name</label>
                 <div class="col-sm-9">
                   <input type="hidden" name="txt_id" value="<?= !empty($edit_data[0]['id']) ? $edit_data[0]['id'] : ''; ?>">
                   <input type="text" class="form-control" required name="name" value="<?= !empty($edit_data[0]['name']) ? $edit_data[0]['name'] : ''; ?>">
                 </div>
                 <div class="clearfix"></div>
                 <br>
                 <label class="col-sm-3 col-form-label">Supplier Address</label>
                 <div class="col-sm-9">
                   <input type="text" class="form-control" required name="address" value="<?= !empty($edit_data[0]['address']) ? $edit_data[0]['address'] : ''; ?>">
                 </div>
               </div>
               <div class="form-group row">
                 <label class="col-sm-3 col-form-label">Email</label>
                 <div class="col-sm-9">
                   <input type="email" class="form-control" required name="email" value="<?= !empty($edit_data[0]['email']) ? $edit_data[0]['email'] : ''; ?>">
                 </div>
                 <br><br><br>
                 <label class="col-sm-3 col-form-label">Mobile No</label>
                 <div class="col-sm-9">
                   <input type="text" class="form-control" maxlength="10" required name="mobile" value="<?= !empty($edit_data[0]['mobile']) ? $edit_data[0]['mobile'] : ''; ?>">
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
       <div class="col-md-8">
         <div class="box box-primary">
           <div class="box-body table-responsive">
             <table id="example" class="table table-striped table-bordered">
               <thead>
                 <tr>
                   <th width="5%">Sr</th>
                   <th>Supplier Name</th>
                   <th>Supplier Address</th>
                   <th>Email </th>
                   <th>Mobile No</th>
                   <th width="10%">Action</th>
                 </tr>
               </thead>
               <tbody>
                 <?php foreach ($supplier as $key => $row) : ?>
                   <tr>
                     <td><?= $key + 1; ?></td>
                     <td><?= $row['name']; ?></td>
                     <td><?= $row['address']; ?></td>
                     <td><?= $row['email']; ?></td>
                     <td><?= $row['mobile']; ?></td>
                     <td>
                       <a href="<?= base_url() ?>edit-supplier/<?= $row['id']; ?>" class="btn btn-sm btn-warning btn-xs"><i class="fa fa-pencil"></i></a>
                       <a href="<?= base_url() ?>delete-supplier/<?= $row['id']; ?>" onclick="return confirm('Do you really want delete?')" class="btn btn-sm btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                     </td>
                   </tr>
                 <?php endforeach; ?>
               </tbody>
             </table>
           </div>
         </div>
       </div>
     </div>
     <!-- /.row -->
   </section>

 </div>
 <script type="text/javascript">
   $("#example").dataTable();
 </script>
 <!-- /.content-wrapper -->