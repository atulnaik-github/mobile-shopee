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
                 <label class="col-sm-2 col-form-label">Brand Name</label>
                 <div class="col-sm-4">
                   <select name="brand_name" id="brand_name" class="form-control">
                     <option value="">Select Brand</option>
                     <?php foreach ($brand_list as $row) : ?>
                       <option value="<?= $row['id'] ?>"><?= ucwords($row['brand_name']) ?></option>
                     <?php endforeach; ?>
                   </select>
                 </div>
                 <label class="col-sm-2 col-form-label">Product Name</label>
                 <div class="col-sm-4">
                   <select name="product_name" id="product_name" class="form-control">
                     <option value="">Select Product</option>
                     <?php foreach ($products_list as $row) : ?>
                       <option value="<?= $row['id'] ?>"><?= ucwords($row['product_name']) ?></option>
                     <?php endforeach; ?>
                   </select>
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
       url: base_url + "get-product-list-data?" + "<?= $_SERVER['QUERY_STRING'] ?>",
       type: 'POST'
     },
   });
 </script>
 <!-- /.content-wrapper -->