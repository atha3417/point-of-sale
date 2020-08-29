<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="ml-2">Update Profile</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>"><i class="fas fa-fw fa-home"></i></a></li>
          <li class="breadcrumb-item text-info">Profile</li>
          <li class="breadcrumb-item active">My Profile</li>
          <li class="breadcrumb-item active">Update</li>
        </ol>
      </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="row ml-2 mt-2">
    <div class="col-md-5">
      <?= $this->session->flashdata('message'); ?>
      	<?= form_open_multipart('profile/my-profile/update'); ?>
        <div class="form-group">
          <input type="hidden" name="user_id" value="<?= $row->user_id  ?>">
          <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name" value="<?= $this->input->post('fullname') ?? $row->name ?>">
          <?= form_error('fullname', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" name="username" placeholder="Username" value="<?= $this->input->post('username') ?? $row->username ?>">
          <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
          <input type="text" class="form-control" id="city" name="city" value="<?= $this->input->post('city') ?? $row->city ?>">
          <?= form_error('city', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group">
			<div class="custom-file">
				<input type="file" class="custom-file-input" id="image" name="image">
				<label class="custom-file-label" for="image">Choose Image</label>
			</div>
			</div>
			<label>Current Image</label>
			<div class="">
				<a href="<?= base_url('assets/img/profile/'.$row->image) ?>" target="_blank" title="View Image On New tab">
  				  <img id="picture" src="<?= base_url('assets/img/profile/'.$row->image) ?>" alt="Your Profile" class="img-thumbnail">
		        </a>
			</div>
        <div class="form-group mt-4">
            <a href="<?= site_url('profile/my-profile/'.date('dmy')); ?>" class="btn btn-danger btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-fw fa-arrow-left"></i>
                </span>
                <span class="text">Cancel</span>
            </a>
            <button type="submit" name="update" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-fw fa-edit"></i>
                </span>
                <span class="text">Update</span>
            </button>
        </div>
    </div>
  </div>
</section>