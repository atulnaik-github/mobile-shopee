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
           <br>
           <!-- /.box-header -->
           <!-- form start -->
           <form role="form" method="get" enctype="multipart/form-data">
             <div class="box-body">
               <div class="form-group row">
                 <label class="col-sm-1 col-form-label">From Date</label>
                 <div class="col-sm-3">
                   <input type="date" class="form-control" name="from_date">
                 </div>
                 <label class="col-sm-1 col-form-label">To Date</label>
                 <div class="col-sm-3">
                   <input type="date" class="form-control" name="to_date">
                 </div>
                 <label class="col-sm-1 col-form-label">Status</label>
                 <div class="col-sm-3">
                   <select name="status" id="status" class="form-control">
                     <option value="">Select Status</option>
                     <option value="1">Pending</option>
                     <option value="2">In-Process</option>
                     <option value="3">Completed</option>
                   </select>
                 </div>
               </div>
             </div>
             <div class="box-footer">
               <button type="submit" class="btn btn-primary">Search</button>
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

   </section>
 </div>
 <script type="text/javascript">
   $("#example").dataTable({
     "serverSide": true,
     "processing": true,
     "order": [
       [0, "desc"]
     ],
     "ajax": {
       url: base_url + "get-repair-list-data?" + "<?= $_SERVER['QUERY_STRING'] ?>",
       type: 'POST'
     },
   });
 </script>
 <!-- /.content-wrapper -->