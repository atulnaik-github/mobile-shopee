 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
  <section class="content-header">
    <h1>
      Edit Vendor
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Setting</a></li>
      <li class="active">Edit Vendor</li>
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
             <label class="col-sm-2 col-form-label">Vendor Name</label>
             <div class="col-sm-4">
              <input type="text" class="form-control" name="vendor_name">
            </div>
            <label class="col-sm-2 col-form-label">Vendor Address</label>
             <div class="col-sm-4">
              <input type="text" class="form-control" name="vendor_add">
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Email</label>
             <div class="col-sm-4">
              <input type="email" class="form-control" name="ven_email">
            </div>
                <label class="col-sm-2 col-form-label">Mobile No</label>
               <div class="col-sm-4">
               <input type="text" class="form-control" name="mob_no">
               </div>    
           </div>
            
           </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
      </div>
      <!-- /.box -->
      </div>
    </div>
    <!-- /.row -->
    <div id="bootstrap-data-table_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
  <div class="row"><div class="col-sm-12 col-md-6">
  <div class="dataTables_length" id="bootstrap-data-table_length">
    <label>Show <select name="bootstrap-data-table_length" aria-controls="bootstrap-data-table" class="form-control form-control-sm">
      <option value="10">10</option>
      <option value="20">20</option>
      <option value="50">50</option>
      <option value="-1">All</option>
    </select> entries</label></div></div>
    <div class="col-sm-12 col-md-6">
      <div id="bootstrap-data-table_filter" class="dataTables_filter">
        <label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="bootstrap-data-table"></label>
      </div>
    </div>
   </div>
        <div class="row">
          <div class="col-sm-12">
          <table id="bootstrap-data-table" class="table table-striped table-bordered tfont dataTable no-footer" role="grid" aria-describedby="bootstrap-data-table_info">
                <thead style=" color:#32617d;">
                  <tr role="row">
                    <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-label="Sr: activate to sort column ascending" style="width: 27px;">Sr</th>
                    <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-label="Vendor: activate to sort column ascending" style="width: 120px;">Vendor Name</th>
                    <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-label="Address: activate to sort column ascending" style="width: 130px;">Vender Address</th>
                    <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 120px;">Email</th>
                    <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-label="Mobile: activate to sort column ascending" style="width: 120px;">Mobile No</th>           
                    <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table" rowspan="1" colspan="1" aria-label="Action: activate to sort column ascending" style="width: 70px;">Action</th>        
                    <td><a href="" class="btn btn-success">Edit</a>
                    <a href="" class="btn btn-danger" onclick="return confirm('Are you sure ?');">Delete</a>
                    </td></tr>
                     </thead>  </table></div>
                   <div class="row">
                  <div class="col-sm-12 col-md-5">
                    <div class="dataTables_info" id="bootstrap-data-table_info" role="status" aria-live="polite">Showing 1 to 10 of 730 entries</div></div>
                    <div class="col-sm-12 col-md-7">
                      <div class="dataTables_paginate paging_simple_numbers" id="bootstrap-data-table_paginate">
                        <ul class="pagination">
                          <li class="paginate_button page-item previous disabled" id="bootstrap-data-table_previous">
                            <a href="#" aria-controls="bootstrap-data-table" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active">
                            <li class="paginate_button page-item next" id="bootstrap-data-table_next">
                              <a href="#" aria-controls="bootstrap-data-table" data-dt-idx="8" tabindex="0" class="page-link">Next</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
         </div>
        

  </section>

</div>
 
  <!-- /.content-wrapper -->
