<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <?php if($page == 'add') { ?>
            <h1 class="ml-2">Add Supplier</h1>
            <?php } ?>
            <?php if($page == 'edit') { ?>
            <h1 class="ml-2">Update Supplier</h1>
            <?php } ?>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>"><i class="fas fa-fw fa-home"></i></a></li>
              <li class="breadcrumb-item active"><a href="<?= site_url('supplier'); ?>">Supplier</a></li>
              <?php if($page == 'edit') { ?>
              <li class="breadcrumb-item active"><a href="">Update</a></li>
              <?php } ?>
              <?php if($page == 'add') { ?>
              <li class="breadcrumb-item active"><a href="">Add</a></li>
              <?php } ?>
            </ol>
          </div>
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row ml-2 mt-2">
        <div class="col-md-5">
            <form action="<?= site_url('supplier/proccess'); ?>" method="post">
                <div class="form-group">
                  <input type="hidden" name="id" value="<?= $row->supplier_id; ?>">
                  <input type="text" class="form-control" id="supplier_name" name="supplier_name" placeholder="Supplier Name" value="<?= $row->name; ?>" required>
                </div>
                <div class="form-group">
                  <input type="number" class="form-control" id="phone" name="phone" placeholder="Phone Number" value="<?= $row->phone; ?>" required>
                </div>
                <div class="form-group">
                  <textarea  class="form-control" id="addr" name="addr" placeholder="Address" required><?= $row->address; ?></textarea>
                </div>
                <div class="form-group">
                  <textarea  class="form-control" id="desc" name="desc" placeholder="Description"><?= $row->description; ?></textarea>
                </div>
                <div class="form-group mt-4">
                    <a href="<?= site_url('supplier'); ?>" class="btn btn-danger btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-fw fa-arrow-left"></i>
                        </span>
                        <span class="text">Cancel</span>
                    </a>
                    <button type="submit" name="<?= $page; ?>" class="btn btn-primary btn-icon-split">
                      <?php if($page == 'add') { ?>
                      <span class="icon text-white-50">
                          <i class="fas fa-fw fa-plus"></i>
                      </span>
                      <span class="text">Add Supplier</span>
                      <?php } ?>

                      <?php if($page == 'edit') { ?>
                      <span class="icon text-white-50">
                          <i class="fas fa-fw fa-edit"></i>
                      </span>
                      <span class="text">Update</span>
                      <?php } ?>
                    </button>
                </div>
            </form>
        </div>
      </div>
    </section>