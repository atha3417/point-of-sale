<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="ml-2">Add User</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>"><i class="fas fa-fw fa-home"></i></a></li>
          <li class="breadcrumb-item active"><a href="<?= site_url('user'); ?>">Users</a></li>
          <li class="breadcrumb-item active"><a href="">Add</a></li>
        </ol>
      </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="row ml-2 mt-2">
    <div class="col-md-5">
        <form action="" method="post">
            <div class="form-group">
              <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name" value="<?= set_value('fullname'); ?>">
              <?= form_error('fullname', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= set_value('username'); ?>">
              <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" id="city" name="city" placeholder="City" value="<?= set_value('city'); ?>">
              <?= form_error('city', '<small class="text-danger">', '</small>'); ?>
            </div>
            <div class="form-group">
              <select class="form-control" id="level" name="level">
                <option value="">-- Choose Role --</option>
                <option value="1" <?= set_value('level') == 1 ? "selected" : null ?>>Admin</option>
                <option value="2" <?= set_value('level') == 2 ? "selected" : null ?>>Cashier</option>
                <?= form_error('level', '<small class="text-danger">', '</small>'); ?>
              </select>
            </div>
            <input type="hidden"></input>
            <div class="form-group mt-4">
                <a href="<?= site_url('user'); ?>" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-fw fa-arrow-left"></i>
                    </span>
                    <span class="text">Cancel</span>
                </a>
                <button type="submit" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-fw fa-user-plus"></i>
                    </span>
                    <span class="text">Add User</span>
                </button>
            </div>
        </form>
    </div>
  </div>
</section>