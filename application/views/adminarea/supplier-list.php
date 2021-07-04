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
        <form role="form">
          <div class="box-body">
             <div class="form-group row">
             <label class="col-sm-1 col-form-label">Supplier Name</label>
             <div class="col-sm-4">
              <input type="text" class="form-control" name="vendor_name">
            </div>
            <label class="col-sm-1 col-form-label">Supplier Address</label>
             <div class="col-sm-4">
              <input type="text" class="form-control" name="vendor_add">
            </div>
          </div>   
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
            <center><button type="submit" class="btn btn-primary">Submit</button></center>
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
                  <th>Supplier Name</th>
                  <th>Supplier Address</th>
                  <th>Date</th>
                  <th>Email </th>
                  <th>Mobile No</th>
                  <th width="10%">Action</th>      
                </tr>
                </thead>
                 <tbody>
                  <?php foreach ($supplierli as $key => $row):?>
                    <tr>
                      <td><?= $key+1;?></td>
                      <td><?= $row['supplier_name'];?></td>
                      <td><?= $row['supplier_add'];?></td>
                      <td><?= $row['date'];?></td>
                      <td><?= $row['supplier_email'];?></td>
                      <td><?= $row['mob_no'];?></td>
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