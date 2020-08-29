<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Sale Detail</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>"><i class="fas fa-fw fa-home"></i></a></li>
          <li class="breadcrumb-item active">Report</li>
          <li class="breadcrumb-item active"><a href="<?= site_url('report/sale'); ?>">Sale</a></li>
          <li class="breadcrumb-item active"><a href="">Detail</a></li>
        </ol>
      </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="table-responsive ml-1">
    <table class="table table-hover mt-3" id="sale">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Item Name</th>
          <th scope="col">Qty</th>
          <th scope="col">Price</th>
          <th scope="col">Discount Item</th>
          <th scope="col">Total</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach($row->result() as $key => $data) { ?>
        <tr>
          <th scope="row"><?= $no++; ?></th>
          <td scope="row"><?= $data->item_name; ?></td>
          <td scope="row"><?= $data->qty; ?></td>
          <td scope="row"><?= indo_currency($data->price); ?></td>
          <td scope="row"><?= indo_currency($data->discount_item); ?></td>
          <td scope="row"><?= indo_currency($data->total); ?></td>
        </tr>
      <?php }; ?>
      </tbody>
    </table>
    <div class="mt-4">
    </div>
  </div>

  <script>
  <?php 
    $date = date('d/m/y');
    $filename = 'sale-detail-date-'.$date;
  ?>
  $(document).ready(function() {
       $('#sale').DataTable({
           columnDefs: [
               {
                   "searchable" : false,
                   "orderable" : false,
                   "targets" : 5
               }
           ]
       })
   })
  </script>
</section>