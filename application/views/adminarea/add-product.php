 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <section class="content-header">
     <h1>
       Add Product
     </h1>
     <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
       <li><a href="#">Setting</a></li>
       <li class="active">Add Product</li>
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
           <form role="form" action="<?= base_url('Adminarea/add_product'); ?>" method="post" enctype="multipart/form-data">
             <div class="box-body">
               <div class="form-group row">
                 <input type="hidden" name="txt_id" value="<?= !empty($edit_data[0]['id']) ? $edit_data[0]['id'] : ''; ?>">
                 <label class="col-sm-2 col-form-label">Brand Name</label>
                 <div class="col-sm-4">
                   <select name="brand_name" id="brand_name" class="form-control" required>
                     <option value="">Select Brand</option>
                     <?php
                      $brand = !empty($edit_data[0]['brand_name']) ? $edit_data[0]['brand_name'] : '';
                      ?>
                     <?php foreach ($brand_list as $row) : ?>
                       <option value="<?= $row['id'] ?>" <?php if ($row['id'] == $brand) {
                                                            echo "selected";
                                                          } ?>><?= ucwords($row['brand_name']) ?></option>
                     <?php endforeach; ?>
                   </select>
                 </div>

                 <label class="col-sm-2 col-form-label">Product Name</label>
                 <div class="col-sm-4">
                   <input type="text" class="form-control" required value="<?= !empty($edit_data[0]['product_name']) ? $edit_data[0]['product_name'] : ''; ?>" name="product_name">
                 </div>

               </div>
               <div class="form-group row">
                 <label class="col-sm-2 col-form-label">RAM</label>
                 <div class="col-sm-4">
                   <input type="text" class="form-control" required value="<?= !empty($edit_data[0]['ram']) ? $edit_data[0]['ram'] : ''; ?>" name="ram">
                 </div>
                 <label class="col-sm-2 col-form-label">Internal Storage</label>
                 <div class="col-sm-4">
                   <input type="text" class="form-control" required value="<?= !empty($edit_data[0]['internal_storage']) ? $edit_data[0]['internal_storage'] : ''; ?>" name="internal_storage">
                 </div>

               </div>
               <div class="form-group row">
                 <label class="col-sm-2 col-form-label">Battery Capacity</label>
                 <div class="col-sm-4">
                   <input type="text" class="form-control" required value="<?= !empty($edit_data[0]['battery_capacity']) ? $edit_data[0]['battery_capacity'] : ''; ?>" name="battery_capacity">
                 </div>
                 <label class="col-sm-2 col-form-label">Operating System</label>
                 <div class="col-sm-4">
                   <input type="text" class="form-control" required value="<?= !empty($edit_data[0]['os']) ? $edit_data[0]['os'] : ''; ?>" name="os">
                 </div>

               </div>
               <div class="form-group row">
                 <label class="col-sm-2 col-form-label">Network Type</label>
                 <div class="col-sm-4">
                   <input type="text" class="form-control" required value="<?= !empty($edit_data[0]['network_type']) ? $edit_data[0]['network_type'] : ''; ?>" name="network_type">
                 </div>
                 <label class="col-sm-2 col-form-label">Screen Size</label>
                 <div class="col-sm-4">
                   <input type="text" class="form-control" required value="<?= !empty($edit_data[0]['screen_size']) ? $edit_data[0]['screen_size'] : ''; ?>" name="screen_size">
                 </div>

               </div>
               <div class="form-group row">
                 <label class="col-sm-2 col-form-label">Primary Camera</label>
                 <div class="col-sm-4">
                   <input type="text" class="form-control" required value="<?= !empty($edit_data[0]['primary_camera']) ? $edit_data[0]['primary_camera'] : ''; ?>" name="primary_camera">
                 </div>
                 <label class="col-sm-2 col-form-label">Secondry Camera</label>
                 <div class="col-sm-4">
                   <input type="text" class="form-control" required value="<?= !empty($edit_data[0]['secondary_camera']) ? $edit_data[0]['secondary_camera'] : ''; ?>" name="secondary_camera">
                 </div>
               </div>
               <div class="form-group row">
                 <label class="col-sm-2 col-form-label">Quantity</label>
                 <div class="col-sm-4">
                   <input type="text" class="form-control" required value="<?= !empty($edit_data[0]['quantity']) ? $edit_data[0]['quantity'] : ''; ?>" name="quantity" id="quantity">
                 </div>
                 <label class="col-sm-2 col-form-label">MRP</label>
                 <div class="col-sm-4">
                   <input type="text" class="form-control" required value="<?= !empty($edit_data[0]['mrp']) ? $edit_data[0]['mrp'] : ''; ?>" name="mrp" id="mrp">
                 </div>
               </div>
               <div class="form-group row">
                 <label class="col-sm-2 col-form-label">Total Amount</label>
                 <div class="col-sm-4">
                   <input type="text" class="form-control" readonly required value="<?= !empty($edit_data[0]['total_amount']) ? $edit_data[0]['total_amount'] : ''; ?>" name="total_amount" id="total_amount">
                 </div>
                 <label class="col-sm-2 col-form-label">Sale Price (Per Item)</label>
                 <div class="col-sm-4">
                   <input type="text" class="form-control" required value="<?= !empty($edit_data[0]['sale_price']) ? $edit_data[0]['sale_price'] : ''; ?>" name="sale_price">
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
               <th>Brand Name</th>
               <th>Product Name</th>
               <th>RAM</th>
               <th>Internal Storage</th>
               <th>Battery Capacity</th>
               <th>Operating System</th>
               <th>Primary Camera</th>
               <th>Secondry Camera</th>
               <th>MRP</th>
               <th>Sale Price</th>
               <th width="10%">Action</th>
             </tr>
           </thead>
           <tbody>
             <?php foreach ($products as $key => $row) : ?>
               <tr>
                 <td><?= $key + 1; ?></td>
                 <td><?= $row['brand']; ?></td>
                 <td><?= $row['product_name']; ?></td>
                 <td><?= $row['ram']; ?></td>
                 <td><?= $row['internal_storage']; ?></td>
                 <td><?= $row['battery_capacity']; ?></td>
                 <td><?= $row['os']; ?></td>
                 <td><?= $row['primary_camera']; ?></td>
                 <td><?= $row['secondary_camera']; ?></td>
                 <td><?= $row['mrp']; ?></td>
                 <td><?= $row['sale_price']; ?></td>
                 <td>
                   <a href="<?= base_url() ?>edit-product/<?= $row['product_id']; ?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
                   <a href="<?= base_url() ?>delete-product/<?= $row['product_id']; ?>" onclick="return confirm('Do you really want delete?')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
                 </td>
               </tr>
             <?php endforeach; ?>
           </tbody>
         </table>
       </div>
     </div>
   </section>
 </div>
 <script type="text/javascript">
   $("#example").dataTable();

   $('#mrp,#quantity').keyup(function(e) {
     var quantity = $('#quantity').val();
     var mrp = $('#mrp').val();
     var total_amount = quantity * mrp;
     $('#total_amount').val(total_amount);
   });
 </script>
 <!-- /.content-wrapper -->