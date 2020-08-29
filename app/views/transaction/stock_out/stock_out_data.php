<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Stock Out</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>"><i class="fas fa-fw fa-home"></i></a></li>
          <li class="breadcrumb-item active">Transaction</li>
          <li class="breadcrumb-item active"><a href="">Stock</a></li>
          <li class="breadcrumb-item active"><a href="">Out</a></li>
        </ol>
      </div>
    </div>
</section>

    <!-- Main content -->
<section class="content">
<a href="<?= site_url('stock/out/add'); ?>" class="btn btn-primary mb-3"><i class="fas fa-fw fa-plus"> </i>&nbsp;&nbsp; Add New Stock Out</a>
<?= $this->session->flashdata('message'); ?>
<div class="table-responsive">
	<table class="table table-hover mt-3" id="pagination">
	  <thead>
	    <tr>
	      <th scope="col">#</th>
	      <th scope="col">Barcode</th>
	      <th scope="col">Product Item</th>
	      <th scope="col">Qty</th>
	      <th scope="col">Date</th>
	      <th scope="col">Actions</th>
	    </tr>
	  </thead>
	  <tbody>
		<?php
	    $no = 1;
	    foreach($row as $key => $data) { ?>
	    <tr>
	      <th scope="row"><?= $no++; ?></th>
	      <td scope="row"><?= $data->barcode; ?></td>
	      <td scope="row"><?= $data->item_name; ?></td>
	      <td scope="row"><?= $data->qty; ?></td>
	      <td scope="row" class="text-center"><?= indo_date($data->date); ?></td>
	      <td scope="row"><a href="" class="badge badge-pill badge-secondary" id="set_dtl" 
					      	data-toggle="modal" 
					      	data-target="#modal-detail" 
					      	data-barcode="<?= $data->barcode ?>" 
					      	data-itemname="<?= $data->item_name ?>" 
					      	data-detail="<?= $data->detail ?>" 
					      	data-suppliername="<?= $data->supplier_name ?>" 
					      	data-qty="<?= $data->qty ?>" 
					      	data-date="<?= indo_date($data->date); ?>">
					      	details
					      </a>
	                      <a href="<?= base_url('stock/out/del/').$data->stock_id.'/'.$data->item_id; ?>" onclick="return confirm('Are you sure want to delete <?= $data->item_name; ?>, whoose stock out is <?= $data->qty; ?> ?');" class="badge badge-pill badge-danger">delete</a>
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
  $(document).ready(function() {
    $(document).on('click', '#set_dtl', function() {
      var barcode = $(this).data('barcode');
      var itemname = $(this).data('itemname');
      var detail = $(this).data('detail');
      var suppliername = $(this).data('suppliername');
      var qty = $(this).data('qty');
      var date = $(this).data('date');
      $('#barcode').text(barcode);
      $('#item_name').text(itemname);
      $('#detail').text(detail);
      $('#supplier_name').text(suppliername);
      $('#qty').text(qty);
      $('#date').text(date);
    })
  })
</script>