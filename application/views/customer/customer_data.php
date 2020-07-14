<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Customers</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>"><i class="fas fa-fw fa-home"></i></a></li>
          <li class="breadcrumb-item active"><a href="<?= site_url('customer'); ?>">Customer</a></li>
        </ol>
      </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
  <a href="<?= site_url('customer/add'); ?>" class="btn btn-primary mb-3"><i class="fas fa-fw fa-user-plus"></i> Add New Customer</a>
  <a href="<?= site_url('customer/import'); ?>" class="btn btn-success mb-3"><i class="fas fa-fw fa-file-upload"></i> Import Excel</a>
  <a href="<?= site_url('customer/deleteAll'); ?>" class="btn btn-danger mb-3" onclick="return confirm('Are You Sure Want to Delete All Customers??')"><i class="fas fa-fw fa-trash"></i> Delete All</a>
  <?= $this->session->flashdata('message'); ?>
  <div class="table-responsive">
    <h6>Export Data</h6>
    <table class="table table-hover mt-3" id="customer">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">gender</th>
          <th scope="col">Phone</th>
          <th scope="col">Address</th>
          <th scope="col" class="text-center"><i class="fas fa-fw fa-cog"></i></th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach($row->result() as $key => $data) { ?>
        <tr>
          <td scope="row"><?= $data->name; ?></td>
          <td scope="row"><?= $data->gender === 'M' ? "Men" : "Women" ?></td>
          <td scope="row"><?= $data->phone; ?></td>
          <td scope="row"><?= $data->address; ?></td>
          <td scope="row" class="text-center"><a href="<?= base_url('customer/edit/').$data->customer_id; ?>" class="btn btn-xs btn-success"><i class="fas fa-fw fa-edit"></i></a>
                          <a href="<?= base_url('customer/deletecustomer/').$data->customer_id; ?>" onclick="return confirm('Are you sure want to delete <?= $data->name; ?> ?');" class="btn btn-xs btn-danger"><i class="fas fa-fw fa-trash"></i></a>
          </td>
        </tr>
      <?php }; ?>
      </tbody>
    </table>
  </div>
  
  <script>
  <?php 
  $filename = 'customer-date-'.date('d/m/y').'-'.substr(md5(rand()),0,10) ;
  $date = date('d/m/y'); ?>
  $(document).ready(function() {
      $('#customer').DataTable({
         dom : 'Bfrtip',
         buttons: [
            {
               extend : 'pdf',
               oriented : 'portrait',
               pageSize : 'Legal',
               title : 'Customer Date <?= $date ?>',
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
               title : 'Customer Date <?= $date ?>'
            },
            {
               extend : 'print',
               title : 'Customer Date <?= $date ?>'
            },
            'copy'
         ],
         columnDefs: [
            {
               "searchable" : false,
               "orderable" : false,
               "targets" : 4
            }
        ]
      })
   })
  </script>
</section>
