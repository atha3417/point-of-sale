<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="ml-2">Add Stock In</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>"><i class="fas fa-fw fa-home"></i></a></li>
              <li class="breadcrumb-item active">Transaction</li>
              <li class="breadcrumb-item active"><a href="<?= site_url('stock/in'); ?>">Stock</a></li>
              <li class="breadcrumb-item active"><a href="<?= site_url('stock/in'); ?>">In</a></li>
              <li class="breadcrumb-item active"><a href="">Add</a></li>
            </ol>
          </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row ml-2 mt-2">
        <div class="col-md-5">
            <form action="<?= site_url('stock/proccess'); ?>" method="post">
                <div class="form-group">
                  <label>Date</label>
                  <input type="date" class="form-control" name="date" value="<?= date('Y-m-d') ?>" required>
                </div>
                <div>
                  <label for="barcode">Barcode</label>
                </div>
                <div class="form-group input-group">
                  <input type="hidden" name="item_id" id="item_id">
                  <input type="text" name="barcode" id="barcode" class="form-control" required autofocus>
                  <span class="input-group-btn">
                    <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
                      <i class="fas fa-fw fa-search"></i>
                    </button>
                  </span>
                </div>
                <div class="form-group">
                  <label for="item_name">Item Name</label>
                  <input type="text" class="form-control" name="item_name" id="item_name" readonly>
                </div>
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-8">
                      <label>Item Unit</label>
                      <input type="text" name="unit_name" id="unit_name" value="-" class="form-control" readonly>
                    </div>
                    <div class="col-md-4">
                      <label for="stock">Initial Stock</label>
                      <input type="text" name="stock" id="stock" value="-" class="form-control" readonly>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="item_name">Information</label>
                  <input type="text" class="form-control" name="detail" placeholder="Kulakan / Tambahan / etc" required>
                </div>
                <div class="form-group">
                  <label for="item_name">Supplier</label>
                  <select name="supplier" class="form-control">
                    <option value="">-- Select Supplier --</option>
                    <?php foreach($supplier as $i => $data) {
                      echo '<option value="'.$data->supplier_id.'">'.$data->name.'</option>';
                    } ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="item_name">Qty</label>
                  <input type="number" class="form-control" name="qty" required>
                </div>

                <div class="form-group mt-4">
                    <a href="<?= site_url('stock/in'); ?>" class="btn btn-danger btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-fw fa-arrow-left"></i>
                        </span>
                        <span class="text">Cancel</span>
                    </a>
                    <button type="submit" name="in_add" class="btn btn-primary btn-icon-split">
                      <span class="icon text-white-50">
                          <i class="fas fa-fw fa-inbox"></i>
                      </span>
                      <span class="text">Add Stock In</span>
                    </button>
                </div>
            </form>
        </div>
      </div>
    </section>

<!-- Modal -->
<div class="modal fade" id="modal-item" tabindex="-1" role="dialog" aria-labelledby="ItemModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="width: 1000px !important; margin-left: -242px !important;">
      <div class="modal-header">
        <h5 class="modal-title" id="ItemModalLabel">Select Product Item</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body table-responsive">
        <table class="table table-hover" id="pagination">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Barcode</th>
              <th scope="col">Name</th>
              <th scope="col">Unit</th>
              <th scope="col">Price</th>
              <th scope="col">Stock</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $no = 1;
            foreach($item as $i => $data) { ?>
            <tr>
              <th scope="row"><?= $no++ ?></th>
              <td><?= $data->barcode ?></td>
              <td><?= $data->name ?></td>
              <td><?= $data->unit_name ?></td>
              <td class="text-right"><?= indo_currency($data->price) ?></td>
              <td class="text-right"><?= $data->stock ?></td>
              <td class="text-right">
                <button class="btn btn-xs badge-success rounded-pill" id="select" 
                  data-id="<?= $data->item_id ?>"
                  data-barcode="<?= $data->barcode ?>"
                  data-name="<?= $data->name ?>"
                  data-unit="<?= $data->unit_name ?>"
                  data-stock="<?= $data->stock ?>">
                  <i class="fas fa-fw fa-check"></i> Select
                </button>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<script>
  $(document).ready(function() {
    $(document).on('click', '#select', function() {
      var item_id = $(this).data('id');
      var barcode = $(this).data('barcode');
      var name = $(this).data('name');
      var unit_name = $(this).data('unit');
      var stock = $(this).data('stock');
      $('#item_id').val(item_id);
      $('#barcode').val(barcode);
      $('#item_name').val(name);
      $('#unit_name').val(unit_name);
      $('#stock').val(stock);
      $('#modal-item').modal('hide');
    })
  })
</script>