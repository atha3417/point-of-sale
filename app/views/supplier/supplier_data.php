<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Suppliers</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>"><i class="fas fa-fw fa-home"></i></a></li>
          <li class="breadcrumb-item active"><a href="">Supplier</a></li>
        </ol>
      </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
  <a href="<?= site_url('supplier/add'); ?>" class="btn btn-primary mb-3"><i class="fas fa-fw fa-plus"></i> Add New Supplier</a>
  <a href="<?= site_url('supplier/import'); ?>" class="btn btn-success mb-3"><i class="fas fa-fw fa-file-upload"></i> Import Excel</a>
  <a href="<?= site_url('supplier/deleteAll'); ?>" class="btn btn-danger mb-3" onclick="return confirm('Are You Sure Want to Delete All Suppliers??')"><i class="fas fa-fw fa-trash"></i> Delete All</a>
  <?= $this->session->flashdata('message'); ?>
  <div class="table-responsive">
     <h6>Export Data</h6>
    <table class="table table-hover mt-3" id="supplier">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Phone</th>
          <th scope="col">Address</th>
          <th scope="col">Description</th>
          <th scope="col" width="120" class="text-center"><i class="fas fa-fw fa-cog"></i></th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach($row->result() as $key => $data) { ?>
        <tr>
          <td scope="row"><?= $data->name; ?></td>
          <td scope="row"><?= $data->phone; ?></td>
          <td scope="row"><?= $data->address; ?></td>
          <td scope="row"><?= $data->description; ?></td>
          <td scope="row" class="text-center"><a href="<?= base_url('supplier/edit/').$data->supplier_id; ?>" class="btn btn-xs btn-success"><i class="fas fa-fw fa-edit"></i></a>
                          <a href="<?= base_url('supplier/deletesupplier/').$data->supplier_id; ?>" onclick="return confirm('Are you sure want to delete <?= $data->name; ?> ?');" class="btn btn-xs btn-danger"><i class="fas fa-fw fa-trash"></i></a>

                          <!-- <a href="" data-toggle="modal" data-target="#modal-delete" onclick="$('#modal-delete #formDelete').attr('action', '<?= site_url('supplier/deletesupplier/').$data->supplier_id; ?>')" class="btn btn-sm btn-danger">delete</a> -->
        </tr>
      <?php }; ?>
      </tbody>
    </table>
  </div>




<!-- Modal For Confirmation -->
<!-- <div class="modal fade" id="modal-delete" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="staticBackdropLabel"><strong>Delete Confirmation</strong></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5>Are You Sure Want to Delete <?= $data->name ?> ?</h5>
      </div>
      <div class="modal-footer">
        <form action="" id="formDelete" method="post">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div> -->
</section>

<script>
<?php 
$filename = 'supplier-date-'.date('d/m/y').'-'.substr(md5(rand()),0,10) ;
$date = date('d/m/y'); ?>
$(document).ready(function() {
     $('#supplier').DataTable({
         dom : 'Bfrtip',
         buttons: [
           {
             extend : 'pdf',
             oriented : 'portrait',
             pageSize : 'Legal',
             title : 'Supplier Date <?= $date ?>',
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
            title : 'Supplier Date <?= $date ?>'
           },
           {
            extend : 'print',
            title : 'Supplier Date <?= $date ?>'
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
