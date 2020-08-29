<section class="content-header">
   <div class="container-fluid">
      <div class="row mb-2">
         <div class="col-sm-6">
            <h1>Users</h1>
         </div>
         <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>"><i class="fas fa-fw fa-home"></i></a></li>
              <li class="breadcrumb-item active"><a href="">Users</a></li>
            </ol>
         </div>
      </div>
   </div>
 </section>

 <!-- Main content -->
 <section class="content">
   <a href="<?= site_url('user/add'); ?>" class="btn btn-primary mb-3"><i class="fas fa-fw fa-user-plus"></i> Add New User</a>
   <?= $this->session->flashdata('message'); ?>
   <div class="table-responsive">
     <table class="table table-hover mt-3" id="user">
       <thead>
         <tr>
           <th scope="col">Name</th>
           <th scope="col">Username</th>
           <th scope="col">City</th>
           <th scope="col">Level</th>
           <th scope="col"><i class="fas fa-fw fa-cog"></i></th>
         </tr>
       </thead>
       <tbody>
         <?php
         foreach($row as $data) { ?>
         <tr>
           <td scope="row"><?= $data['name']; ?></td>
           <td scope="row"><?= $data['username']; ?></td>
           <td scope="row"><?= $data['city']; ?></td>
           <td scope="row"><?= $data['level'] == 1 ? "Admin" : "Cashier"; ?></td>
           <td scope="row">
            <?php if ($data['is_active'] <= 0): ?>
              <a href="<?= base_url('auth/activate/').$data['user_id']; ?>" class="btn btn-xs btn-warning" title="Activate this user">
                <i class="fas fa-fw fa-door-open"></i>
              </a>
            <?php elseif ($data['is_active'] > 0): ?>
              <a href="<?= base_url('auth/deactivate/').$data['user_id']; ?>" class="btn btn-xs btn-warning" title="Deactivate this user">
                <i class="fas fa-fw fa-door-closed"></i>
              </a>
            <?php endif; ?>
            <a href="<?= base_url('user/deleteuser/').$data['user_id']; ?>" onclick="return confirm('Are you sure want to delete <?= $data['name']; ?> ?');" class="btn btn-xs btn-danger">
              <i class="fas fa-fw fa-trash"></i>
            </a>
         </tr>
       <?php }; ?>
       </tbody>
     </table>
   </div>

 </section>

<script>
<?php 
$filename = 'user-date-'.date('d/m/y').'-'.substr(md5(rand()),0,10);
$date = date('d/m/y'); ?>
$(document).ready(function() {
  $('#user').DataTable({
      dom : 'Bfrtip',
      buttons: [
         {
            extend : 'pdf',
            oriented : 'portrait',
            pageSize : 'Legal',
            title : 'User Date <?= $date ?>',
            filename : '<?= $filename ?>',
            download : 'download'
         },
         {
            extend : 'csv',
            filename : '<?= $filename ?>'
         },
         {
            extend : 'excel',
            filename : '<?= $filename ?>',
            title : 'User Date <?= $date ?>'
         },
         {
            extend : 'print',
            title : 'User Date <?= $date ?>'
         },
         'copy'
      ],
      columnDefs: [
         {
            "searchable" : false,
            "orderable" : false,
            "targets" : 4
         },
         {
            "searchable" : false,
            "targets" : 3
         }
      ]
   })
})
</script>