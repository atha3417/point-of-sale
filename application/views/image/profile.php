<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>My Profile</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>"><i class="fas fa-fw fa-home"></i></a></li>
          <li class="breadcrumb-item text-info">Profile</li>
          <li class="breadcrumb-item active">My Profile</li>
        </ol>
      </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-8">
        <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
    <div class="card mb-3 col-lg-8">
        <div class="row no-gutters">
            <div class="col-md-4" style="padding-top: 5px;">
                <img src="<?= base_url('assets/img/profile/'.$row->image) ?>" class="card-img">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                  <?php $date = indo_dates($row->password_updated); $time = $row->updated; ?>
                    <h5 class="card-title">Name : <?= $row->name; ?></h5>
                    <p class="card-text" style="padding-top: 5px;">Username : <?= $row->username; ?></p>
                    <p class="card-text" style="margin-top: -12px;">Address : <?= $row->address; ?></p>
                    <p class="card-text" style="margin-top: -12px;">
                      <small>
                        <b>Password Changed : <?= $date !== null ? $date : "has never been updated" ?><?= $time !== null ? " at ".$time : null ?></b>
                      </small>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <?php 
      function indo_dates($date) {
        if ($date !== null) {
          $d = substr($date,8,2);
          $m = substr($date,5,2);
          $y = substr($date,0,4);
          return $d.'/'.$m.'/'.$y;
        }
      }
    ?>
</section>