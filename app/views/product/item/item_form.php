<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <?php if($page == 'add') { ?>
            <h1 class="ml-2">Add Item</h1>
            <?php } ?>
            <?php if($page == 'edit') { ?>
            <h1 class="ml-2">Update Item</h1>
            <?php } ?>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= site_url('dashboard'); ?>"><i class="fas fa-fw fa-home"></i></a></li>
              <li class="breadcrumb-item active">Products</li>
              <li class="breadcrumb-item active"><a href="<?= site_url('item'); ?>">Item</a></li>
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
      <?= $this->session->flashdata('error'); ?>
      <?= $this->session->flashdata('message'); ?>
      <div class="row ml-2 mt-2">
        <div class="col-md-5">
              <?php echo form_open_multipart('item/proccess'); ?>
                <div class="form-group">
                  <input type="hidden" name="id" value="<?= $row->item_id; ?>">
                  <input type="text" class="form-control" id="product_name" name="product_name" placeholder="Product Name" value="<?= $row->name; ?>" required>
                </div>
                <div class="form-group">
                  <select name="category" id="category" class="form-control" required>
                    <option value="">-- Choose Category --</option>
                    <?php foreach($category->result() as $key => $data) { ?>
                    <option value="<?= $data->category_id; ?>" <?= $data->category_id == $row->category_id ? "selected" : null ?>><?= $data->name; ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="form-group">
                  <?php echo form_dropdown('unit', $unit, $selectedunit,
                    ['class' => 'form-control', 'required' => 'required']); ?>
                </div>
                <div class="form-group">
                  <input type="number" class="form-control" id="price" name="price" placeholder="Product Price" value="<?= $row->price; ?>" required>
                </div>
                <?php if($this->fungsi->user_login()->username == 'Admin') { ?>
                <div class="form-group">
                  <input type="number" class="form-control" id="stock" name="stock" placeholder="Product Stock" value="<?= $row->stock; ?>" required>
                </div>
                <?php } ?>
                <?php if($page == 'add') { ?>
                <small class="text-info">Leave Blank If You Don't Want to Add it <i class="fas fa-fw fa-arrow-down"></i></small>
                <?php } ?>
                <?php if($page == 'edit') { ?>
                <small class="text-info">Leave Blank If You Don't Want to Change it <i class="fas fa-fw fa-arrow-down"></i></small>
                <?php } ?>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" name="image" id="customFile">
                  <label class="custom-file-label" for="customFile">Choose file</label>
                  <?php if($page == 'edit') { ?>
                    <?php if($row->image != null) { ?>
                      <label for="img-edit" class="mt-2">Current Image<i class="fas fa-fw fa-arrow-down text-info"></i></label>
                    <?php } ?>
                  <?php } ?>
                </div>
                <?php if($page == 'edit') {
                    if($row->image != null) { ?>
                      <div class="form-group">
                        <a href="<?= base_url('assets/img/product/'.$row->image); ?>" title="View Image On New Window" target="_blank">
                          <img class="img-thumbnail mt-2 material-boxed" id="img-edit" style="width: 40% !important;" src="<?= base_url('assets/img/product/'.$row->image); ?>" alt="<?= $row->image; ?>">
                        </a>
                      </div>    
                    <?php } ?>
                  <?php } ?>
                <div class="form-group mt-4">
                    <a href="<?= site_url('item'); ?>" class="btn btn-danger btn-icon-split">
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
                      <span class="text">Add Item</span>
                      <?php } ?>

                      <?php if($page == 'edit') { ?>
                      <span class="icon text-white-50">
                          <i class="fas fa-fw fa-edit"></i>
                      </span>
                      <span class="text">Update</span>
                      <?php } ?>
                    </button>
                </div>
            <?php echo form_close(); ?>
        </div>
      </div>
    </section>