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
        <form role="form" action="<?= base_url('Adminarea/repair'); ?>" method="post" enctype="multipart/form-data">
          <div class="box-body">
         <div class="form-group row">
           <label class="col-sm-2 col-form-label">Customer Name</label>
             <div class="col-sm-4">
              <input type="text" class="form-control" name="cust_name">
            </div>
            <label class="col-sm-2 col-form-label">Address</label>
             <div class="col-sm-4">
              <input type="text" class="form-control" name="address">
            </div>
          </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Brand Name</label>
             <div class="col-sm-4">
              <input type="text" class="form-control" name="brand_name">
            </div>  
             <label class="col-sm-2 col-form-label">Mobile No</label>
             <div class="col-sm-4">
              <input type="text" class="form-control" name="mob_no">
            </div>
          </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Model</label>
             <div class="col-sm-4">
              <input type="text" class="form-control" name="model">
            </div>
               <label class="col-sm-2 col-form-label">IMEI Number</label>
               <div class="col-sm-4">
                <input type="text" class="form-control" name="imei">
               </div>
              
            </div>
            <div class="form-group row">
              <label class="col-sm-2 col-form-label">Fault Description</label>
             <div class="col-sm-4">
              <input type="text" class="form-control" name="fault_desc">
            </div>
               <label class="col-sm-2 col-form-label">Amount</label>
               <div class="col-sm-4">
                <input type="text" class="form-control" name="amount">
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
                  <?php foreach ($repairs as $key => $row):?>
                    <tr>
                      <td><?= $key+1;?></td>
                      <td><?= $row['cust_name'];?></td>
                      <td><?= $row['date'];?></td>
                      <td><?= $row['address'];?></td>
                      <td><?= $row['brand_name'];?></td>
                      <td><?= $row['mob_no'];?></td>
                      <td><?= $row['model'];?></td>
                      <td><?= $row['imei'];?></td>
                      <td><?= $row['fault_desc'];?></td>
                      <td><?= $row['amount'];?></td>
                      <td><?= $row['status'];?></td>
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
