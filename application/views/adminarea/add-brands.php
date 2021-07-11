 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <section class="content-header">
     <h1>
       Add Brands
     </h1>
     <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
       <li><a href="#">Setting</a></li>
       <li class="active">Add Brands</li>
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
           <form role="form" action="<?= base_url('master/add-brands'); ?>" method="post" enctype="multipart/form-data">
             <div class="box-body row">
               <div class="form-group col-md-12">
                 <label>Brand Name</label>
                 <input type="hidden" name="txt_id" value="<?= !empty($edit_brand[0]['id']) ? $edit_brand[0]['id'] : ''; ?>">
                 <input type=" text" class="form-control" required name="brand_name" value="<?= !empty($edit_brand[0]['brand_name']) ? $edit_brand[0]['brand_name'] : ''; ?>">
               </div>
               <div class="form-group col-md-12">
                 <label>Brand Image</label>
                 <input type="file" class="form-control" name="brand_image" value="<?= !empty($edit_brand[0]['brand_image']) ? $edit_brand[0]['brand_image'] : ''; ?>">
                 <input type="hidden" name="old_img" value="<?= !empty($edit_brand[0]['brand_image']) ? $edit_brand[0]['brand_image'] : ''; ?>">
               </div>
             </div>
             <div class="box-footer">
               <button type="submit" class="btn btn-primary" name="submit">Submit</button>
             </div>
           </form>
           <!-- /.box -->
         </div>
       </div>
       <div class="col-md-8">
         <div class="box box-primary">
           <div class="box-body table-responsive">
             <table id="example" class="table table-striped table-bordered">
               <thead>
                 <tr>
                   <th width="5%">Sr</th>
                   <th>Brand Name</th>
                   <th>Image</th>
                   <th width="20%">Action</th>
                 </tr>
               </thead>
               <tbody>
                 <?php foreach ($brands as $key => $row) : ?>
                   <tr>
                     <td><?= $key + 1; ?></td>
                     <td><?= ucwords($row['brand_name']); ?></td>
                     <td><img src="<?= base_url(); ?><?= $row['brand_image']; ?>" class="img-thumbnail" alt="" style="height: 50px;"></td>
                     <td>
                       <a href="<?= base_url() ?>master/edit-brands/<?= $row['id']; ?>" class=" btn btn-sm btn-warning btn-xs"><i class="fa fa-pencil"></i></a>&emsp;
                       <a href="<?= base_url() ?>master/delete-brands/<?= $row['id']; ?>" onclick="return confirm('Do you really want delete?')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
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