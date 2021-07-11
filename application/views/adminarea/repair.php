 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <section class="content-header">
     <h1>
       Mobile Repairing
     </h1>
     <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
       <li><a href="#">Setting</a></li>
       <li class="active">Repair</li>
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
           <form role="form" action="<?= base_url('repair-action'); ?>" method="post" enctype="multipart/form-data">
             <div class="box-body">
               <div class="form-group row">
                 <label class="col-sm-2 col-form-label">Customer Name</label>
                 <div class="col-sm-4">
                   <input type="hidden" name="txt_id" value="<?= !empty($edit_data[0]['id']) ? $edit_data[0]['id'] : ''; ?>">
                   <input type="text" class="form-control" required value="<?= !empty($edit_data[0]['cust_name']) ? $edit_data[0]['cust_name'] : ''; ?>" name="cust_name">
                 </div>
                 <label class="col-sm-2 col-form-label">Address</label>
                 <div class="col-sm-4">
                   <input type="text" class="form-control" required value="<?= !empty($edit_data[0]['address']) ? $edit_data[0]['address'] : ''; ?>" name="address">
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
                     <?php foreach ($brand_list as $row) : ?>
                       <option value="<?= $row['id'] ?>" <?php if ($row['id'] == $brand) {
                                                            echo "selected";
                                                          } ?>><?= ucwords($row['brand_name']) ?></option>
                     <?php endforeach; ?>
                   </select>
                 </div>
                 <label class="col-sm-2 col-form-label">Mobile No</label>
                 <div class="col-sm-4">
                   <input type="text" class="form-control" required value="<?= !empty($edit_data[0]['mob_no']) ? $edit_data[0]['mob_no'] : ''; ?>" name="mob_no" maxlength="10">
                 </div>
               </div>
               <div class="form-group row">
                 <label class="col-sm-2 col-form-label">Model</label>
                 <div class="col-sm-4">
                   <input type="text" class="form-control" required value="<?= !empty($edit_data[0]['model']) ? $edit_data[0]['model'] : ''; ?>" name="model">
                 </div>
                 <label class="col-sm-2 col-form-label">IMEI Number</label>
                 <div class="col-sm-4">
                   <input type="text" class="form-control" required value="<?= !empty($edit_data[0]['imei']) ? $edit_data[0]['imei'] : ''; ?>" name="imei">
                 </div>
               </div>
               <div class="form-group row">
                 <label class="col-sm-2 col-form-label">Fault Description</label>
                 <div class="col-sm-4">
                   <input type="text" class="form-control" required value="<?= !empty($edit_data[0]['fault_desc']) ? $edit_data[0]['fault_desc'] : ''; ?>" name="fault_desc">
                 </div>
                 <label class="col-sm-2 col-form-label">Amount</label>
                 <div class="col-sm-4">
                   <input type="text" class="form-control" required value="<?= !empty($edit_data[0]['amount']) ? $edit_data[0]['amount'] : ''; ?>" name="amount">
                 </div>
               </div>
               <div class="form-group row">
                 <label class="col-sm-2 col-form-label">Status</label>
                 <div class="col-sm-4">
                   <select name="status" id="status" class="form-control">
                     <option value="">Select Status</option>
                     <option value="1" <?php if (!empty($edit_data[0]['status']) && $edit_data[0]['status'] == '1') {
                                          echo "selected";
                                        } ?>>Pending</option>
                     <option value="2" <?php if (!empty($edit_data[0]['status']) && $edit_data[0]['status'] == '2') {
                                          echo "selected";
                                        } ?>>In-Process</option>
                     <option value="3" <?php if (!empty($edit_data[0]['status']) && $edit_data[0]['status'] == '3') {
                                          echo "selected";
                                        } ?>>Completed</option>
                   </select>
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
               <th>Customer Name</th>
               <th>Date</th>
               <th>Address</th>
               <th>Brand Name </th>
               <th>Mobile No </th>
               <th>Model</th>
               <th>IMEI Number</th>
               <th>Fault Description</th>
               <th>Amount</th>
               <th>Status</th>
               <th width="10%">Action</th>
             </tr>
           </thead>
           <tbody>
             <?php foreach ($repairs as $key => $row) : ?>
               <tr>
                 <td><?= $key + 1; ?></td>
                 <td><?= $row['cust_name']; ?></td>
                 <td><?= date('d M Y', strtotime($row['created_at'])); ?></td>
                 <td><?= $row['address']; ?></td>
                 <td><?= $row['brand']; ?></td>
                 <td><?= $row['mob_no']; ?></td>
                 <td><?= $row['model']; ?></td>
                 <td><?= $row['imei']; ?></td>
                 <td><?= $row['fault_desc']; ?></td>
                 <td><?= $row['amount']; ?></td>
                 <td>
                   <?php if ($row['status'] == '1') { ?>
                     <span class="btn btn-xs btn-info">Pending</span>
                   <?php } else if ($row['status'] == '2') { ?>
                     <span class="btn btn-xs btn-warning">In-Process</span>
                   <?php } else if ($row['status'] == '3') { ?>
                     <span class="btn btn-xs btn-success">Completed</span>
                   <?php } ?>
                 </td>
                 <td>
                   <a href="<?= base_url() ?>edit-repair/<?= $row['repair_id']; ?>" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
                   <a href="<?= base_url() ?>delete-repair/<?= $row['repair_id']; ?>" onclick="return confirm('Do you really want delete?')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a>
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
 </script>
 <!-- /.content-wrapper -->