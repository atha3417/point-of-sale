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
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="<?= site_url('dashboard/'); ?>"><b>NAFROZEN</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Sign in to start your session</p>

        <?= $this->session->flashdata('message') ?>
        
      <form action="" method="post">
        <div class="form-group mb-3">
          <input type="text" name="name" class="form-control" placeholder="Enter Full Name..." value="<?= set_value('name'); ?>" autocomplete="off" autofocus>
          <?= form_error('name', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Enter Username..." value="<?= set_value('username'); ?>" autocomplete="off">
          <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group mb-3">
          <input type="text" name="city" class="form-control" placeholder="Enter Your City..." value="<?= set_value('city'); ?>" autocomplete="off">
          <?= form_error('city', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Enter Password...">
          <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
        </div>
        <div class="form-group mb-3">
          <input type="password" name="passconf" class="form-control" placeholder="Enter Confirmation Password...">
          <?= form_error('passconf', '<small class="text-danger">', '</small>'); ?>
        </div>
          <div class="row">
            <!-- /.col -->
            <div class="col">
              <button type="submit" name="register" style="border-radius: 100px;" class="btn btn-primary btn-block p-2">Create an Account</button>
              <hr>
              <div class="text-center">
                <a href="<?= base_url('auth/login'); ?>">Already have an account?</a>
              </div>
            </div>
            <!-- /.col -->
          </div>
        </div>
      </form>
      <!-- /.social-auth-links -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?= base_url(); ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url(); ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url(); ?>assets/dist/js/adminlte.min.js"></script>

</body>
</html>
