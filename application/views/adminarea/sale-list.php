 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <section class="content-header">
    <h1>
      Advance Search
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Setting</a></li>
      <li class="active">Advance Search</li>
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
        <form role="form" action="<?= base_url('Adminarea/sale-list'); ?>" method="post" enctype="multipart/form-data">
          <div class="box-body">
         <div class="form-group row">
           <label class="col-sm-2 col-form-label">Customer Name</label>
             <div class="col-sm-4">
              <input type="text" class="form-control" name="cust_name">
            </div>
             <label class="col-sm-2 col-form-label">Mobile No</label>
             <div class="col-sm-4">
              <input type="text" class="form-control" name="mob_no">
            </div>
          </div>
          <div class="form-group row">
              <label class="col-sm-2 col-form-label">From Date</label>
             <div class="col-sm-4">
              <input type="date" class="form-control" name="from_date">
            </div>  
             <label class="col-sm-2 col-form-label">To Date</label>
             <div class="col-sm-4">
              <input type="date" class="form-control" name="to_date">
            </div>
          </div>
            </div>
            <div class="box-footer">
            <center><button type="submit" class="btn btn-primary">Search</button></center>
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
                  <th>Mobile No</th>
                  <th>Brand Name</th>
                  <th>RAM</th>
                  <th>Internal Storage</th>
                  <th>Battery Capacity</th>
                  <th>Quantity</th>
                  <th>Sale Price</th>
                  <th>Purchase Price</th>
                  <th>Date</th>
                  <th width="10%">Action</th>        
                </tr>
                </thead>
                 <tbody>
                  <?php foreach ($saleli as $key => $row):?>
                    <tr>
                      <td><?= $key+1;?></td>
                      <td><?= $row['cust_name'];?></td>
                      <td><?= $row['date'];?></td>
                      <td><?= $row['mob_no'];?></td>
                      <td><?= $row['brand_name'];?></td>
                      <td><?= $row['ram'];?></td>
                      <td><?= $row['inte_stor'];?></td>
                      <td><?= $row['bat_cap'];?></td>
                      <td><?= $row['que'];?></td>
                      <td><?= $row['price'];?></td>
                      <td><?= $row['pur_price'];?></td>
                      <td><?= $row['date'];?></td>
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
