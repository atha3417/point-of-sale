<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="ml-2">Update User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>"><i class="fas fa-fw fa-home"></i></a></li>
              <li class="breadcrumb-item active"><a href="<?= site_url('user'); ?>">Users</a></li>
              <li class="breadcrumb-item active"><a href="">Update</a></li>
            </ol>
          </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <h5 class="ml-3 mb-3">On User : "<?= $row->name; ?>"</h5>
      <div class="row ml-2 mt-2">
        <div class="col-md-5">
          <?= $this->session->flashdata('message'); ?>
            <form action="" method="post">
                <div class="form-group">
                  <input type="hidden" name="user_id" value="<?= $row->user_id  ?>">
                  <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name" value="<?= $this->input->post('fullname') ?? $row->name ?>">
                  <?= form_error('fullname', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="username" name="username" placeholder="Username" value="<?= $this->input->post('username') ?? $row->username ?>">
                  <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                </div>
                <small class="text-info">Leave Blank If You Don't Want to Change it <i class="fas fa-fw fa-arrow-down"></i></small>
                <div class="form-group">
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="<?= $this->input->post('password') ?>">
                  <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                </div>
                <small class="text-info">Leave Blank If You Don't Want to Change it <i class="fas fa-fw fa-arrow-down"></i></small>
                <div class="form-group">
                  <input type="password" class="form-control" id="passconf" name="passconf" placeholder="Confirm Password" value="<?= $this->input->post('passconf') ?>">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" id="image" name="image" placeholder="Sidebar Image" value="<?= $this->input->post('image') ?? $row->image ?>">
                </div>
                <div class="form-group">
                  <textarea class="form-control" id="address" name="address" rows="1" placeholder="Address"><?= $this->input->post('address') ?? $row->address ?></textarea>
                  <?= form_error('address', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group">
                  <select class="form-control" id="level" name="level">
                    <optgroup label="-- Choose Role --">
                      <?php $level = $this->input->post('level') ? $this->input->post('level') : $row->level ?>
                      <option value="1">Admin</option>
                      <option value="2" <?= $level == 2 ? 'selected' : null ?>>Cashier</option>
                    </optgroup>
                  </select>
                  <?= form_error('level', '<small class="text-danger">', '</small>'); ?>
                </div>
                <div class="form-group mt-4">
                    <a href="<?= site_url('user'); ?>" class="btn btn-danger btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-fw fa-arrow-left"></i>
                        </span>
                        <span class="text">Cancel</span>
                    </a>
                    <button type="submit" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-fw fa-edit"></i>
                        </span>
                        <span class="text">Update</span>
                    </button>
                </div>
            </form>
        </div>
      </div>
    </section>