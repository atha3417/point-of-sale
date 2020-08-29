<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Stocks Reports</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>"><i class="fas fa-fw fa-home"></i></a></li>
          <li class="breadcrumb-item active">Report</li>
          <li class="breadcrumb-item active"><a href="">Stock</a></li>
        </ol>
      </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
  <?= $this->session->flashdata('message'); ?>
  <div class="modal-body table-responsive">
   <h6>Export Data</h6>
    <table class="table table-hover mt-3" id="report">
      <thead>
        <tr>
          <th scope="col">Barcode</th>
          <th scope="col">Item Name</th>
          <th scope="col">Type</th>
          <th scope="col">Qty</th>
          <th scope="col">Date</th>
          <th scope="col"><i class="fas fa-fw fa-cog"></i></th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach($row as $key => $data) { ?>
        <tr>
          <td scope="row"><?= $data->barcode; ?></td>
          <td scope="row"><?= $data->item_name; ?></td>
          <td scope="row"><?= $data->type; ?></td>
          <td scope="row"><?= $data->qty; ?></td>
          <td scope="row"><?= indo_date($data->date); ?></td>
          <td scope="row"><a href="" class="btn btn-xs btn-secondary" id="set_dtl" 
                  data-toggle="modal" 
                  data-target="#modal-detail" 
                  data-barcode="<?= $data->barcode ?>" 
                  data-itemname="<?= $data->item_name ?>" 
                  data-type="<?= $data->type ?>" 
                  data-suppliername="<?= $data->supplier_name ?>" 
                  data-detail="<?= $data->detail ?>" 
                  data-qty="<?= $data->qty ?>" 
                  data-username="<?= $data->user_name ?>" 
                  data-date="<?= indo_date($data->date); ?>">
                  <i class="fas fa-fw fa-info"></i>
                       </a>
                      <a href="<?= base_url('report/stockdel/').$data->stock_id; ?>" onclick="return confirm('Are you sure want to delete <?= $data->item_name; ?>, whoose type is <?= $data->type ?> ?');" class="btn btn-xs btn-danger"><i class="fas fa-fw fa-trash"></i></a>
          </td>
        </tr>
      <?php }; ?>
      </tbody>
    </table>
  </div>

  <!-- Modal -->
<div class="modal fade" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="ItemModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="ItemModalLabel"><strong>Stock Detail</strong></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body table-responsive">
        <table class="table table-hover" id="pagination">
          <tbody>
            <tr>
              <th scope="row">Barcode</th>
              <td><span id="barcode"></span></td>
            </tr>
            <tr>
              <th scope="row">Item Name</th>
              <td><span id="item_name"></span></td>
            </tr>
            <tr>
              <th scope="row">Type</th>
              <td><span id="type"></span></td>
            </tr>
            <tr>
              <th scope="row">Qty</th>
              <td><span id="qty"></span></td>
            </tr>
            <tr>
              <th scope="row">Supplier Name</th>
              <td><span id="supplier_name"></span></td>
            </tr>
            <tr>
              <th scope="row">Information</th>
              <td><span id="detail"></span></td>
            </tr>
            <tr>
              <th scope="row">Date</th>
              <td><span id="date"></span></td>
            </tr>
            <tr>
              <th scope="row">User</th>
              <td><span id="user"></span></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
    </div>
  </div>
</div>
</section>



<script>
  $(document).ready(function() {
    $(document).on('click', '#set_dtl', function() {
      var barcode = $(this).data('barcode');
      var itemname = $(this).data('itemname');
      var type = $(this).data('type');
      var detail = $(this).data('detail');
      var suppliername = $(this).data('suppliername');
      var qty = $(this).data('qty');
      var date = $(this).data('date');
      var user = $(this).data('username');
      $('#barcode').text(barcode);
      $('#item_name').text(itemname);
      $('#type').text(type);
      $('#detail').text(detail);
      $('#supplier_name').text(suppliername);
      $('#qty').text(qty);
      $('#date').text(date);
      $('#user').text(user);
    })
  })

  <?php 
  $filename = 'customer-date-'.date('d/m/y').'-'.substr(md5(rand()),0,10) ;
  $date = date('d/m/y'); ?>
  $(document).ready(function() {
      $('#report').DataTable({
         dom : 'Bfrtip',
         buttons: [
            {
               extend : 'pdf',
               oriented : 'portrait',
               pageSize : 'Legal',
               title : 'Stock Report Date <?= $date ?>',
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
               title : 'Stock Report Date <?= $date ?>'
            },
            {
               extend : 'print',
               title : 'Stock Report Date <?= $date ?>'
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