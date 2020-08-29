<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Dashboard</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>"><i class="fas fa-fw fa-home"></i></a></li>
        </ol>
      </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3><?= $this->fungsi->count_item() ?></h3>

          <p>Items</p>
        </div>
        <div class="icon">
          <i class="fas fa-fw fa-shopping-cart"></i>
        </div>
        <a href="<?= site_url('item') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3><?= $this->fungsi->count_sale() ?></h3>

          <p>Sale</p>
        </div>
        <div class="icon">
          <i class="fas fa-fw fa-shipping-fast"></i>
        </div>
        <a href="<?= site_url('sale') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3><?= $this->fungsi->count_customer() ?></h3>

          <p>Customers</p>
        </div>
        <div class="icon">
          <i class="fas fa-fw fa-user-plus"></i>
        </div>
        <a href="<?= site_url('customer') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right" style="color: #fff;"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3><?= $this->fungsi->count_user() ?></h3>

          <p>Users</p>
        </div>
        <div class="icon">
          <i class="fas fa-fw fa-users"></i>
        </div>
        <a href="<?= site_url('user') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
</section>