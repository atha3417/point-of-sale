<section class="content-header">
   <div class="container-fluid">
     <div class="row mb-2">
       <div class="col-sm-6">
         <h1>Items</h1>
       </div>
       <div class="col-sm-6">
         <ol class="breadcrumb float-sm-right">
           <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>"><i class="fas fa-fw fa-home"></i></a></li>
           <li class="breadcrumb-item active">Products</li>
           <li class="breadcrumb-item active"><a href="<?= site_url('item'); ?>">Item</a></li>
         </ol>
       </div>
     </div>
 </section>

 <!-- Main content -->
 <section class="content">
   <a href="<?= site_url('item/add'); ?>" class="btn btn-primary mb-3"><i class="fas fa-fw fa-plus"></i> Add New Item</a>
   <!-- <a href="<?= site_url('item/import'); ?>" class="btn btn-success mb-3"><i class="fas fa-fw fa-file-upload"></i> Import Excel</a> -->
   <a href="<?= site_url('item/deleteAll'); ?>" class="btn btn-danger mb-3" onclick="return confirm('Are you sure want to delete all item ??');"><i class="fas fa-fw fa-trash"></i> Delete All</a>
   <?= $this->session->flashdata('message'); ?>
   <div class="table-responsive">
     <h6>Export Data</h6>
     <table class="table table-hover mt-3" id="item">
       <thead>
         <tr>
           <th scope="col">Barcode</th>
           <th scope="col">Name</th>
           <th scope="col" class="text-center">Price</th>
           <th scope="col" class="text-center">Stock</th>
           <th scope="col" class="text-center"><i class="fas fa-fw fa-image"></i></th>
           <th scope="col" class="text-center"><i class="fas fa-fw fa-cog"></i></th>
         </tr>
       </thead>
       <tbody>
         <?php
         foreach($row->result() as $key => $data) { ?>
         <tr>
           <td scope="row">
             <?= $data->barcode; ?>
             &nbsp;&nbsp;
             <a href="<?= base_url('item/barcode/').$data->item_id; ?>" class="btn btn-xs btn-secondary"><i class="fas fa-fw fa-barcode"></i></a>
             <a href="<?= base_url('item/qrcode/').$data->item_id; ?>" class="btn btn-xs btn-secondary"><i class="fas fa-fw fa-qrcode"></i></a>
           </td>
           <td><?= $data->name; ?></td>
           <td class="text-center"><?= indo_currency($data->price); ?></td>
           <td class="text-center"><?= $data->stock; ?></td>
           <td class="text-center">
             <?php if($data->image != null) { ?>
               <img class="img-thumbnail material-boxed" style="width: 70px !important;" src="<?= base_url('assets/img/product/'.$data->image); ?>" alt="<?= $data->image; ?>">
             <?php } ?>
           </td>
           <td class="text-center">
              <a href="<?= base_url('item/edit/').$data->item_id; ?>" class="btn btn-xs btn-success"><i class="fas fa-fw fa-edit"></i></a>
             <a href="<?= base_url('item/deleteitem/').$data->item_id; ?>" onclick="return confirm('Are you sure want to delete <?= $data->name; ?> ?');" class="btn btn-xs btn-danger"><i class="fas fa-fw fa-trash"></i></a>
           </td>
         </tr>
       <?php }; ?>
       </tbody>
     </table>
   </div>

 </section>
<script>
<?php 
$date = date('d/m/y');
$filename = 'item-date-'.$date; ?>
$(document).ready(function() {
   $('#item').DataTable({
     dom : 'Bfrtip',
     buttons: [
         {
            extend : 'pdf',
            oriented : 'portrait',
            pageSize : 'Legal',
            title : 'Item Date <?= $date ?>',
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
            title : 'Item Date <?= $date ?>'
         },
         {
            extend : 'print',
            title : 'Item Date <?= $date ?>'
         },
         'copy'
      ],
     "columnDefs": [
       {
         "searchable": false,
         "orderable": false,
         "targets": [4, 5]
       }
     ]
   })
})
</script>



<!-- <script>
<?php 
$filename = 'item-date-'.date('d/m/y').'-'.substr(md5(rand()),0,10) ;
$date = date('d/m/y'); ?>
$(document).ready(function() {
   $('#item').DataTable({
     "processing": true,
     "serverSide": true,
     "ajax": {
       "url": "<?= site_url('item/get_ajax'); ?>",
       "type": "POST"
     },
     dom : 'Bfrtip',
     buttons: [
         {
            extend : 'pdf',
            oriented : 'portrait',
            pageSize : 'Legal',
            title : 'Item Date <?= $date ?>',
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
            title : 'Item Date <?= $date ?>'
         },
         {
            extend : 'print',
            title : 'Item Date <?= $date ?>'
         },
         'copy'
      ],
     "columnDefs": [
       // {
       //   "targets": [1, 2, 3, 4, 5],
       //   "className": 'text-center'
       // },
       {
         "targets": [0, 1, 2, 3, 4, 5],
         "orderable": false
       }
     ]
   })
})
</script> -->