<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Change Password</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>"><i class="fas fa-fw fa-home"></i></a></li>
          <li class="breadcrumb-item text-info">Profile</li>
          <li class="breadcrumb-item active">My Profile</li>
          <li class="breadcrumb-item active">Change Password</li>
        </ol>
      </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-lg-5 mt-4">

			<?= $this->session->flashdata('message'); ?>
			<form action="<?= base_url('profile/changepassword'); ?>" method="post">
  				<div class="form-group">
				    <input type="password" class="form-control" name="password" placeholder="New Password">
				    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
  				</div>
  				<div class="form-group">
				    <input type="password" class="form-control" name="passconf" placeholder="Confirm New Password">
				    <?= form_error('passconf', '<small class="text-danger pl-3">', '</small>'); ?>
  				</div>
  				<div class="form-group mt-4">
            <a href="<?= base_url('profile/my-profile/change-password/cancel') ?>" class="btn btn-danger"><i class="fas fa-fw fa-arrow-left"></i> Cancel</a>
  					<button type="submit" class="btn btn-primary"><i class="fas fas fa-edit"></i> Change Password</button>
  				</div>
			</form>
		</div>
	</div>
</section>