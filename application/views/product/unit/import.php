<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="ml-2"><strong class="text-info">Import</strong> Excel</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>"><i class="fas fa-fw fa-home"></i></a></li>
          <li class="breadcrumb-item text-info">Product</li>
          <li class="breadcrumb-item active">Unit</li>
          <li class="breadcrumb-item active">Import</li>
        </ol>
      </div>
    </div>
</section>

<!-- Main content -->
<section class="content">
  <div class="row ml-2 mt-2">
    <div class="col-md-5">
        <form action="<?= site_url('unit/proccess'); ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Excel File</label>
                <div class="custom-file">
                    <label class="custom-file-label" for="file">Choose file</label>
                    <input type="file" class="custom-file-input" name="file" id="file" aria-describedby="inputGroupFileAddon01" required>
                </div>
            </div>
            <div class="form-group mt-4">
                <a href="<?= site_url('unit'); ?>" class="btn btn-danger btn-icon-split">Cancel</a>
                <a href="<?= site_url('assets/file/format/unit.xlsx'); ?>" target="_blank" class="btn btn-success btn-icon-split" download>Format</a>
                <input type="submit" name="import" value="Import File" class="btn btn-primary">
            </div>
        </form>
    </div>
  </div>
</section>