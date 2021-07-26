 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <section class="content-header">
     <h1>
       Reports Section
     </h1>
     <ol class="breadcrumb">
       <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
       <li><a href="#">Setting</a></li>
       <li class="active">Report Section</li>
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
           <form role="form" method="get" enctype="multipart/form-data">
             <div class="box-body">
               <div class="row">
                 <div class="form-group col-sm-4">
                   <label for="">Select Report</label>
                   <select class="form-control" name="report-name" id="report-name">
                     <option value="">Select</option>
                     <option value="purchase">Purchase</option>
                     <option value="repair">Repair</option>
                     <option value="sale">Sale</option>
                     <option value="customer-list">Customer List</option>
                   </select>
                 </div>
               </div>
               <!-- <div class="form-group col-md-3">
                <label>Brand Image</label>
                <input type="file" class="form-control" name="brand_image">
              </div> -->
               <!-- <div class="col-sm-4">
                 <label class="col-sm-4 col-form-label"> Report Format</label><br>
                 <select class="col-sm-8 col-form-label">
                   <option value="Select">Select</option>
                   <option value="riya">.docx</option>
                   <option value="niya">.pdf</option>
                 </select>
               </div> -->
             </div>
             <div class="box-footer">
               <button type="button" class="btn btn-primary" id="show-report" name="submit">View Report</button>
             </div>
           </form>
           <!-- /.box -->
         </div>
       </div>
     </div>
     <!-- /.row -->
     <div class="box box-primary" id="show-repair-list" style="display: none;">
       <div class="box-body table-responsive">
         <table id="repair-list" class="table table-striped table-bordered">
           <thead>
             <tr>
               <th width="5%">Sr</th>
               <th>Date</th>
               <th>Customer Name</th>
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

           </tbody>
         </table>
       </div>
     </div>
     <div class="box box-primary" id="show-product-list" style="display: none;">
       <div class="box-body table-responsive">
         <table id="product-list" class="table table-striped table-bordered">
           <thead>
             <tr>
               <th width="5%">Sr</th>
               <th>Date</th>
               <th>Brand Name</th>
               <th>Product Name</th>
               <th>RAM</th>
               <th>Internal Storage</th>
               <th>Battery Capacity</th>
               <th>Operating System</th>
               <th>Network Type </th>
               <th>Screen Size</th>
               <th>Primary Camera</th>
               <th>Secondry Camera</th>
               <th>MRP</th>
               <th>Sale Price</th>
               <th width="10%">Action</th>
             </tr>
           </thead>
           <tbody>
           </tbody>
         </table>
       </div>
     </div>
     <div class="box box-primary" id="show-sale-list" style="display: none;">
       <div class="box-body table-responsive">
         <table id="sale-list" class="table table-striped table-bordered">
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
               <th width="10%">Action</th>
             </tr>
           </thead>
           <tbody>
           </tbody>
         </table>
       </div>
     </div>
     <div class="box box-primary" id="show-customer-list" style="display: none;">
       <div class="box-body table-responsive">
         <table id="customer-list" class="table table-striped table-bordered">
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


 <!-- /.content-wrapper -->

 <script type="text/javascript">
   $("#repair-list").dataTable({
     "serverSide": true,
     "processing": true,
     "dom": 'Bfrtip',
     "lengthMenu": [
       [10, 25, 50, 100, ],
       ['10', '25', '50', '100']
     ],
     "buttons": [
       'csv', 'excel', 'pdf', 'pageLength'
     ],
     "order": [
       [0, "desc"]
     ],
     "ajax": {
       url: base_url + "get-repair-list-data?" + "<?= $_SERVER['QUERY_STRING'] ?>",
       type: 'POST'
     },
   });
 </script>
 <script type="text/javascript">
   $("#product-list").dataTable({
     "serverSide": true,
     "processing": true,
     "order": [
       [0, "desc"]
     ],
     "dom": 'Bfrtip',
     "lengthMenu": [
       [10, 25, 50, 100, ],
       ['10', '25', '50', '100']
     ],
     "buttons": [
       'csv', 'excel', 'pdf', 'pageLength'
     ],
     "order": [
       [0, "desc"]
     ],
     "ajax": {
       url: base_url + "get-product-list-data?" + "<?= $_SERVER['QUERY_STRING'] ?>",
       type: 'POST'
     },
   });
 </script>
 <script type="text/javascript">
   $("#sale-list").dataTable({
     "serverSide": true,
     "processing": true,
     "dom": 'Bfrtip',
     "lengthMenu": [
       [10, 25, 50, 100, ],
       ['10', '25', '50', '100']
     ],
     "buttons": [
       'csv', 'excel', 'pdf', 'pageLength'
     ],
     "order": [
       [0, "desc"]
     ],
     "ajax": {
       url: base_url + "get-sale-list-data?" + "<?= $_SERVER['QUERY_STRING'] ?>",
       type: 'POST'
     },
   });
 </script>
 <script type="text/javascript">
   $("#customer-list").dataTable({
     "serverSide": true,
     "processing": true,
     "dom": 'Bfrtip',
     "lengthMenu": [
       [10, 25, 50, 100, ],
       ['10', '25', '50', '100']
     ],
     "buttons": [
       'csv', 'excel', 'pdf', 'pageLength'
     ],
     "order": [
       [0, "desc"]
     ],
     "ajax": {
       url: base_url + "get-sale-list-data?" + "<?= $_SERVER['QUERY_STRING'] ?>",
       type: 'POST'
     },
   });
 </script>
 <script>
   $('#show-report').click(function(e) {
     var report_name = $('#report-name').val();

     if (report_name != '') {
       if (report_name == 'purchase') {
         $('#show-product-list').css('display', 'block');
         $('#show-repair-list').css('display', 'none');
         $('#show-sale-list').css('display', 'none');
         $('#show-customer-list').css('display', 'none');
       } else if (report_name == 'repair') {
         $('#show-repair-list').css('display', 'block');
         $('#show-product-list').css('display', 'none');
         $('#show-sale-list').css('display', 'none');
         $('#show-customer-list').css('display', 'none');
       } else if (report_name == 'sale') {
         $('#show-sale-list').css('display', 'block');
         $('#show-repair-list').css('display', 'none');
         $('#show-product-list').css('display', 'none');
         $('#show-customer-list').css('display', 'none');
       } else if (report_name == 'customer-list') {
         $('#show-customer-list').css('display', 'block');
         $('#show-sale-list').css('display', 'none');
         $('#show-repair-list').css('display', 'none');
         $('#show-product-list').css('display', 'none');
       }
     } else {
       alert('Please select report name');
     }
   });
 </script>