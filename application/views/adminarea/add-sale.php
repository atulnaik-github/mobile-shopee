 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <section class="content-header">
     <h1>
       Sales
     </h1>
     <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
       <li><a href="#">Setting</a></li>
       <li class="active">Sales</li>
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
           <form role="form" action="<?= base_url('Adminarea/add_sale'); ?>" method="post" enctype="multipart/form-data">
             <div class="box-body">
               <div class="form-group row">
                 <input type="hidden" name="txt_id" value="<?= !empty($edit_data[0]['id']) ? $edit_data[0]['id'] : '' ?>">
                 <label class="col-sm-2 col-form-label">Customer Name</label>
                 <div class="col-sm-4">
                   <input type="text" value="<?= !empty($edit_data[0]['cust_name']) ? $edit_data[0]['cust_name'] : '' ?>" class="form-control" required name="cust_name">
                 </div>
                 <label class="col-sm-2 col-form-label">Mobile No</label>
                 <div class="col-sm-4">
                   <input type="text" value="<?= !empty($edit_data[0]['mob_no']) ? $edit_data[0]['mob_no'] : '' ?>" class="form-control" required name="mob_no" maxlength="10">
                 </div>
               </div>
               <div class="form-group row">
                 <label class="col-sm-2 col-form-label">Brand Name</label>
                 <div class="col-md-4">
                   <select name="brand_name" id="brand_name" required class="form-control">
                     <option value="">Select Brand</option>
                     <?php
                      $brand = !empty($edit_data[0]['brand_name']) ? $edit_data[0]['brand_name'] : '';
                      ?>
                     <?php foreach ($brands as $row) : ?>
                       <option value="<?= $row['id'] ?>" <?php if ($row['id'] == $brand) {
                                                            echo "selected";
                                                          } ?>><?= ucwords($row['brand_name']) ?></option>
                     <?php endforeach; ?>
                   </select>
                 </div>
                 <label class="col-sm-2 col-form-label">Product Name</label>
                 <div class="col-md-4">
                   <select name="product_name" id="product_name" required required class="form-control">
                     <option value="">Select Product</option>
                     <?php
                      $brand = !empty($edit_data[0]['product_name']) ? $edit_data[0]['product_name'] : '';
                      ?>
                     <?php foreach ($product as $row) : ?>
                       <option value="<?= $row['id'] ?>" <?php if ($row['id'] == $brand) {
                                                            echo "selected";
                                                          } ?>><?= ucwords($row['product_name']) ?></option>
                     <?php endforeach; ?>
                   </select>
                 </div>
               </div>
               <div class="form-group row">
                 <label class="col-sm-2 col-form-label">RAM</label>
                 <div class="col-sm-4">
                   <input type="text" value="<?= !empty($edit_data[0]['ram']) ? $edit_data[0]['ram'] : '' ?>" class="form-control" required name="ram">
                 </div>
               </div>
               <div class="form-group row">
                 <label class="col-sm-2 col-form-label">Internal Storage</label>
                 <div class="col-sm-4">
                   <input type="text" value="<?= !empty($edit_data[0]['inte_stor']) ? $edit_data[0]['inte_stor'] : '' ?>" class="form-control" required name="inte_stor">
                 </div>
                 <label class="col-sm-2 col-form-label">Battery Capacity</label>
                 <div class="col-sm-4">
                   <input type="text" value="<?= !empty($edit_data[0]['bat_cap']) ? $edit_data[0]['bat_cap'] : '' ?>" class="form-control" required name="bat_cap">
                 </div>
               </div>
               <div class="form-group row">
                 <label class="col-sm-2 col-form-label">Quantity</label>
                 <div class="col-sm-4">
                   <input type="text" value="<?= !empty($edit_data[0]['que']) ? $edit_data[0]['que'] : '' ?>" class="form-control" required name="que" id="quantity">
                 </div>
                 <label class="col-sm-2 col-form-label">Sale Price</label>
                 <div class="col-sm-4">
                   <input type="text" value="<?= !empty($edit_data[0]['price']) ? $edit_data[0]['price'] : '' ?>" class="form-control" required name="price" id="mrp">
                 </div>
               </div>
               <div class="form-group row">
                 <label class="col-sm-2 col-form-label">Total Price</label>
                 <div class="col-sm-4">
                   <input type="text" value="<?= !empty($edit_data[0]['pur_price']) ? $edit_data[0]['pur_price'] : '' ?>" class="form-control" readonly name="pur_price" id="total_amount">
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
               <th>Date</th>
               <th>Customer Name</th>
               <th>Mobile No</th>
               <!-- <th>Brand Name</th> -->
               <th>RAM</th>
               <th>Internal Storage</th>
               <th>Quantity</th>
               <th>Sale Price</th>
               <th>Purchase Price</th>
               <th width="10%">Action</th>
             </tr>
           </thead>
           <tbody>
             <?php foreach ($sale as $key => $row) : ?>
               <tr>
                 <td><?= $key + 1; ?></td>
                 <td><?= date('d M,Y', strtotime($row['created_at'])); ?></td>
                 <td><?= $row['cust_name']; ?></td>
                 <td><?= $row['mob_no']; ?></td>
                 <!-- <td><?= $row['brand_name']; ?></td> -->
                 <td><?= $row['ram']; ?></td>
                 <td><?= $row['inte_stor']; ?></td>
                 <td><?= $row['que']; ?></td>
                 <td><?= $row['price']; ?></td>
                 <td><?= $row['pur_price']; ?></td>
                 <td>
                   <a href="<?= base_url() ?>edit-sale/<?= $row['id']; ?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
                   <a href="<?= base_url() ?>delete-sale/<?= $row['id']; ?>" onclick="return confirm('Do you really want delete?')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
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