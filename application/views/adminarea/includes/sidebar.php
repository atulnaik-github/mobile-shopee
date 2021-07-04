 <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= site_url('assets/commonarea/'); ?>dist/img/avatar5.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active"><a href="<?= site_url('admin-dashboard')?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
        <!--<li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel 1</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="#!"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="#!"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel 2</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul> 
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li>-->
        <li class="treeview">
         <li class=""> <a href="<?= site_url('Adminarea/repairs'); ?>">
            <i class="fa fa-wrench"></i> <span>Repair</span>
            <span class="pull-right-container">
           </span>
          </a>
        </li>
         <li class="treeview">
         <li class=""> <a href="<?= site_url('Adminarea/repairing_list'); ?>">
            <i class="fa fa-file"></i> <span>Repairing List</span>
            <span class="pull-right-container">
           </span>
          </a>
        </li>
<li class="treeview">
         <li class=""> <a href="<?= site_url('Adminarea/sale'); ?>">
            <i class="fa fa-edit"></i> <span>Sale</span>
            <span class="pull-right-container">
           </span>
          </a>
        </li>
        <li class="treeview">
         <li class=""> <a href="<?= site_url('Adminarea/sale_list'); ?>">
            <i class="fa fa-file"></i> <span>Sale List</span>
            <span class="pull-right-container">
           </span>
          </a>
        </li>

 <li class="treeview">
          <a href="#!">
            <i class="fa fa-book"></i> <span>Master Section</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?= site_url('Adminarea/brands'); ?>"><i class="fa fa-circle-o"></i> Add Brands</a></li>
            <li><a href="<?= site_url('Adminarea/brand_list'); ?>"><i class="fa fa-circle-o"></i> Brand List</a></li>
            <li><a href="<?= site_url('Adminarea/products'); ?>"><i class="fa fa-circle-o"></i> Add Products</a></li>
            <li><a href="<?= site_url('Adminarea/product_list'); ?>"><i class="fa fa-circle-o"></i> Product List</a></li>
            <li><a href="<?= site_url('Adminarea/staff'); ?>"><i class="fa fa-circle-o"></i> Add Staff</a></li>
            <li><a href="<?= site_url('Adminarea/staff_list'); ?>"><i class="fa fa-circle-o"></i> Staff List</a></li>
            <li><a href="<?= site_url('Adminarea/supplier'); ?>"><i class="fa fa-circle-o"></i> Add Supplier</a></li>
            <li><a href="<?= site_url('Adminarea/supplier_list'); ?>"><i class="fa fa-circle-o"></i> Supplier List</a></li>
           <li><a href="<?= site_url('Adminarea/purchase'); ?>"><i class="fa fa-circle-o"></i> Add Purchase</a></li>
           <li><a href="<?= site_url('Adminarea/purchase_list'); ?>"><i class="fa fa-circle-o"></i> Purchase List</a></li>
          </ul>
        </li>
      <li><a href="#!"><i class="fa fa-file"></i> <span>Customer List</span></a></li>
      <li><a href="<?= site_url('Adminarea/reports'); ?>"><i class="fa fa-list"></i> <span>Reports</span></a></li>
      <li class="treeview">
          <a href="#">
            <i class="fa fa-cog"></i> <span>Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="#!"><i class="fa fa-circle-o"></i> Profile</a></li>
            <li><a href="<?= site_url('admin-change-password')?>"><i class="fa fa-circle-o"></i> Change Password</a></li>
            <li><a href="#!"><i class="fa fa-circle-o"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
