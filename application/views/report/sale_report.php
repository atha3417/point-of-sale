<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Sale Report</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>"><i class="fas fa-fw fa-home"></i></a></li>
          <li class="breadcrumb-item active">Report</li>
          <li class="breadcrumb-item active"><a href="">Sale</a></li>
        </ol>
      </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
  <?= $this->session->flashdata('message'); ?>
  <div class="table-responsive">
    <h6>Export Data</h6>
    <table class="table table-hover mt-3" id="report">
      <thead>
        <tr>
          <th scope="col">Invoice</th>
          <th scope="col">Customer</th>
          <th scope="col">Total</th>
          <th scope="col">Discount</th>
          <th scope="col">Grand Total</th>
          <th scope="col">Date</th>
          <th scope="col" width="120" class="text-center"><i class="fas fa-fw fa-cog"></i></th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach($row->result() as $key => $data) { ?>
        <tr>
          <td scope="row"><?= $data->invoice; ?></td>
          <td scope="row"><?= $data->customer_id == null ? "All" : $data->customer_name ?></td>
          <td scope="row"><?= indo_currency($data->total_price); ?></td>
          <td scope="row"><?= $data->discount; ?> %</td>
          <td scope="row"><?= indo_currency($data->final_total); ?></td>
          <td scope="row"><?= indo_date($data->date); ?></td>
          <td scope="row" class="text-center" width="200px">
            <a href="<?=  base_url('report/sale/detail/').$data->sale_id ?>" class="badge badge-pill badge-secondary">details</a>
            <a href="<?= base_url('sale/print/').$data->sale_id; ?>" target="_blank" class="badge badge-pill badge-primary">print</a>
            <a href="<?= base_url('report/sale/del/').$data->sale_id; ?>" class="badge badge-pill badge-danger" onclick="return confirm('Are you sure want to delete invoice <?= $data->invoice ?> ?');">delete</a>
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
          <h4 class="modal-title" id="ItemModalLabel"><strong>Stock Out Detail</strong></h4>
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
                <th scope="row">Information</th>
                <td><span id="detail"></span></td>
              </tr>
              <tr>
                <th scope="row">Supplier Name</th>
                <td><span id="supplier_name"></span></td>
              </tr>
              <tr>
                <th scope="row">Qty</th>
                <td><span id="qty"></span></td>
              </tr>
              <tr>
                <th scope="row">Date</th>
                <td><span id="date"></span></td>
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
  <?php 
  $filename = 'sale-report-date-'.date('d/m/y').'-'.substr(md5(rand()),0,10) ;
  $date = date('d/m/y'); ?>
  $(document).ready(function() {
     $('#report').DataTable({
         dom : 'Bfrtip',
         buttons: [
            {
               extend : 'pdf',
               oriented : 'portrait',
               pageSize : 'Legal',
               title : 'Sale Report Date <?= $date ?>',
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
               title : 'Sale Report Date <?= $date ?>'
            },
            {
               extend : 'print',
               title : 'Sale Report Date <?= $date ?>'
            },
            'copy'
         ],
         columnDefs: [
             {
                 "searchable" : false,
                 "orderable" : false,
                 "targets" : 6
             }
         ]
     })
    })
</script>