<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Nafrozen | Murah Mudah Cepat</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"> -->
  <!-- <link rel="stylesheet" href="<?= base_url(); ?>assets/dataTables/jquery.dataTables.min.css"> -->
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link href="<?= base_url() ?>assets/dataTables/DataTables-1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
</head>
<body class="hold-transition layout-fixed sidebar-mini <?= $this->uri->segment(1) !== 'chat' ? null : "sidebar-collapse"  ?>">

<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <?php if($this->fungsi->user_login()->level == 1 && $this->uri->segment(1) !== 'chat') { ?>
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <?php } ?>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?= base_url('dashboard'); ?>" class="nav-link <?= $this->uri->segment(1) == 'dashboard' ? "active" : null; ?>">Dashboard</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-fw fa-user"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">User Profile</span>
          <div class="dropdown-divider"></div>
            <div class="text-center">
              <img src="<?= base_url('assets/img/profile/').$this->fungsi->user_login()->image; ?>" with="100%" alt="Your Picture">
            </div>
          <div class="dropdown-divider"></div>
          <a href="<?= site_url('profile/my-profile/'.date('dmy')) ?>" class="dropdown-item">
            <i class="fas fa-fw fa-user mr-2"></i> <?= ucfirst($this->fungsi->user_login()->name); ?>
          </a>
          <div class="dropdown-divider"></div>
          <a href="<?= site_url('auth/logout') ?>" class="dropdown-item" onclick="return confirm('Are You Sure Want to Sign Out?')">
            <i class="fas fa-fw fa-sign-out-alt mr-2"></i> Sign Out
          </a>
          <div class="dropdown-divider"></div>
        </div>
      </li>
      <li class="nav-item">
        
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= site_url('dashboard'); ?>" class="brand-link">
      <img src="<?= base_url(); ?>assets/dist/img/favicon.png"
           class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">
        Nafrozen
        <?php if($this->fungsi->user_login()->level == 1) { ?>
          <small style="font-size: 12px;">Admin</small>
        <?php } ?>
      </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('assets/img/profile/'); ?>sidebar-image.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <?php $address = ucfirst($this->fungsi->user_login()->address); ?>
          <a href="" class="d-block" style="font-size: 20px"><?= ucfirst($this->fungsi->user_login()->name); ?></a>
          <small style="color: #C9CBCD;"><?= ucfirst($this->fungsi->user_login()->username); ?> | <?= $address !== null ? $address : "Indonesia"; ?></small>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview">
            <a href="<?= site_url('dashboard'); ?>" class="nav-link <?= $this->uri->segment(1) == 'dashboard' || $this->uri->segment(1) == '' ? "active" : '' ?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          <li class="nav-item">
            <a href="<?= site_url('supplier'); ?>" class="nav-link <?= $this->uri->segment(1) == 'supplier' ? "active" : '' ?>">
              <i class="nav-icon fas fa-fw fa-truck"></i>
              <p>
                Suppliers
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?= site_url('customer') ?>" class="nav-link <?= $this->uri->segment(1) == 'customer' ? "active" : '' ?>">
              <i class="nav-icon fas fa-fw fa-users"></i>
              <p>Customers</p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?= $this->uri->segment(1) == 'category' || $this->uri->segment(1) == 'unit' || $this->uri->segment(1) == 'item' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-fw fa-boxes"></i>
              <p>
                Products
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= site_url('category') ?>" class="nav-link <?= $this->uri->segment(1) == 'category' ? "active" : '' ?>">
                  <i class="far fa-fw fa-circle nav-icon text-info"></i>
                  <p>Categories</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= site_url('unit') ?>" class="nav-link <?= $this->uri->segment(1) == 'unit' ? "active" : '' ?>">
                  <i class="far fa-fw fa-circle nav-icon text-info"></i>
                  <p>Units</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= site_url('item') ?>" class="nav-link <?= $this->uri->segment(1) == 'item' ? "active" : '' ?>">
                  <i class="far fa-fw fa-circle nav-icon text-info"></i>
                  <p>Items</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?= $this->uri->segment(2) == 'in' || $this->uri->segment(2) == 'out' || $this->uri->segment(1) == 'sale' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-cart-plus"></i>
              <p>
                Transactions
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= site_url('sale/') ?>" class="nav-link <?= $this->uri->segment(1) == 'sale' ? "active" : '' ?>">
                  <i class="far fa-fw fa-circle nav-icon text-info"></i>
                  <p>Sales</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= site_url('stock/in') ?>" class="nav-link <?= $this->uri->segment(2) == 'in' ? "active" : '' ?>">
                  <i class="far fa-fw fa-circle nav-icon text-info"></i>
                  <p>Stock In</p>
                </a>
              <li class="nav-item">
                <a href="<?= site_url('stock/out') ?>" class="nav-link <?= $this->uri->segment(2) == 'out' ? "active" : '' ?>">
                  <i class="far fa-fw fa-circle nav-icon text-info"></i>
                  <p>Stock Out</p>
                </a>
              </li>
            </ul>
          </li>
          <?php if($this->fungsi->user_login()->level == 1) { ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?= $this->uri->segment(1) == 'report'  ? 'active' : '' ?>">
              <i class="nav-icon fas fa-fw fa-chart-pie"></i>
              <p>
                Reports
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= site_url('report/sale') ?>" class="nav-link <?= $this->uri->segment(2) == 'sale' ? "active" : '' ?>">
                  <i class="far fa-fw fa-circle nav-icon text-info"></i>
                  <p>Sales</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= site_url('report/stock') ?>" class="nav-link <?= $this->uri->segment(2) == 'stock' ? "active" : '' ?>">
                  <i class="far fa-fw fa-circle nav-icon text-info"></i>
                  <p>Stocks</p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>
          <?php if($this->fungsi->user_login()->level == 1) { ?>
          <li class="nav-header">Settings</li>
          <li class="nav-item">
            <a href="<?= site_url('user'); ?>" class="nav-link <?= $this->uri->segment(1) == 'user' ? "active" : '' ?>">
              <i class="nav-icon fas fa-fw fa-user-friends"></i>
              <p>Users</p>
            </a>
          </li>
          <?php } ?>
          <li class="nav-header">Users</li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link <?= $this->uri->segment(1) == 'profile' ? 'active' : '' ?>">
              <i class="nav-icon fas fa-fw fa-user"></i>
              <p>
                Profile
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= site_url('profile/my-profile/'.date('dmy')); ?>" class="nav-link <?= $this->uri->segment(3) == date('dmy') ? "active" : '' ?>">
                  <i class="far fa-fw fa-circle nav-icon text-info"></i>
                  <p>My Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= site_url('profile/my-profile/update/'); ?>" class="nav-link <?= $this->uri->segment(3) == 'update' ? "active" : '' ?>">
                  <i class="far fa-fw fa-circle nav-icon text-info"></i>
                  <p>Update Profile</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= site_url('profile/my-profile/confirm-password/'); ?>" class="nav-link <?= $this->uri->segment(3) == 'change-password' ? "active" : '' ?>">
                  <i class="far fa-fw fa-circle nav-icon text-info"></i>
                  <p>Change Password</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
              <i class="fas fa-fw fa-cog nav-icon"></i>
              <p>Customize Pages</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" onclick="return confirm('Are You Sure Want to Sign Out?')" href="<?= base_url('auth/logout') ?>" role="button">
              <i class="fas fa-fw fa-sign-out-alt nav-icon"></i>
              <p>Sign Out</p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- jQuery -->
  <script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php echo $contents ?>
  </div>
  <!-- /.content-wrapper -->

  <?php 
  if($this->uri->segment(1) !== 'chat') { ?>
    <footer class="main-footer text-center">
      Copyright &copy; 2020. <strong>Nafrozen</strong> All rights
      reserved.
    </footer>
  <?php } ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url(); ?>assets/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="<?= base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url(); ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- My Script -->
<script>
        $(document).ready(function() {
            var cek = $('.form-checkbox').val();
            $('.form-checkbox').click(function() {
                if ($(this).is(':checked')) {
                    $('.form-password').attr('type', 'text');
                } else {
                    $('.form-password').attr('type', 'password');
                }
            });
        });


        $(document).ready(function() {
          $('#pagination').DataTable({
            columnDefs: [
              {
                "searchable": false,
                "orderable": false,
                "targets": -1
              }
            ]
          })
        })
    </script>
</body>
</html>
