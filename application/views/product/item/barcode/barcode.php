<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="ml-2 text-info"><strong>Barcode Generator</strong></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>"><i class="fas fa-fw fa-home"></i></a></li>
              <li class="breadcrumb-item text-info">Item</li>
              <li class="breadcrumb-item active">Barcode</li>
              <li class="breadcrumb-item active">Generator</li>
            </ol>
          </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Barcode -->
      <div class="box ml-4">
        <div class="box-header">
          <h3 class="box-title">Barcode Generator<i class="fas fa-fw fa-barcode"></i></h3>
        </div>
        <div class="box-body">
          <?php 
            $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
            echo '<img style="width: 25%;" src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->barcode, $generator::TYPE_CODE_128)) . '">';
          ?>
          <div class="ml-2" style="font-size: 20px;"><?= $row->barcode; ?></div>
        </div>
      </div>
    <br><br>
    <a href="<?= site_url('item'); ?>" class="btn btn-success btn-icon-split ml-4">
      <span class="icon text-white-50">
          <i class="fas fa-fw fa-arrow-left"></i>
      </span>
      <span class="text">Back</span>
    </a>
    <a href="<?= base_url('item/barcode_print/').$row->item_id; ?>" target="_blank" onclick="return confirm('Are you sure want to print barcode <?= $row->barcode; ?> ?');" class="btn btn-secondary btn-icon-split ml-2">
      <span class="icon text-white-50">
          <i class="fas fa-fw fa-print"></i>
      </span>
      <span class="text">Print Barcode</span>
    </a>
    </section>