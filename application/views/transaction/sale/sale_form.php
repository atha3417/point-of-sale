<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Sales</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="<?= base_url('dashboard'); ?>"><i class="fas fa-fw fa-home"></i></a></li>
          <li class="breadcrumb-item active">Transaction</li>
          <li class="breadcrumb-item active"><a href="<?= site_url('sale'); ?>">Sales</a></li>
        </ol>
      </div>
    </div>
</section>

<!-- Main Content -->
<section class="content">
	<div class="row">
	    <div class="col-lg-4">
	      <div class="small-box" style="background-color: #fff;">
	      	<table width="100%">
	      		<tr>
	      			<td style="vertical-align: top;">
	      				<div class="mt-3 ml-2">
	      					<label for="date">Date</label>
	      				</div>
	      			</td>
	      			<td>
	      				<div class="form-group mt-2 mr-3" style="width: 242px;">
	      					<input type="date" class="form-control" id="date" value="<?= date('Y-m-d') ?>" readonly autocomplete="off">
	      				</div>
	      			</td>
      			</tr>
      			<tr>
	      			<td style="vertical-align: top; width: 30%;">
						<div class="mt-2 ml-2">
							<label for="user">Cashier</label>
						</div>
					</td>
					<td>
	      				<div class="form-group" style="width: 242px;">
	      					<input type="text" id="user" value="<?= $this->fungsi->user_login()->name ?>" class="form-control" readonly autocomplete="off">
	      				</div>
	      			</td>
	      		</tr>
	      		<tr>
	      			<td style="vertical-align: top;">
						<div class="mt-3 ml-2">
							<label for="customer">Customer</label>
						</div>
					</td>
					<td>
	      				<div class="form-group" style="width: 242px;">
	      					<select  id="customer" class="form-control">
								<option value="">All</option>
								<?php foreach($customer as $cust => $value) {
									echo '<option value="'.$value->customer_id.'">'.$value->name.'</option>';
								} ?>
							</select>
	      				</div>
	      			</td>
	      		</tr>
	      	</table>
	    </div>
	</div>
	<div class="col-lg-4">
	      <div class="small-box" style="background-color: #fff;">
	      	<table width="100%">
	      		<tr>
	      			<td style="vertical-align: top;">
	      				<div class="mt-3 ml-2">
	      					<label for="barcode">Barcode</label>
	      				</div>
	      			<td>
	      				<div class="form-group input-group mt-2 ml-4" style="width: 242px;">
							<input type="hidden" id="item_id">
							<input type="hidden" id="price">
							<input type="hidden" id="stock">
							<input type="hidden" id="qty_cart">
							<input type="text" id="barcode" class="form-control" autofocusm autocomplete="off">
							<span class="input-group-btn">
								<button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-item">
									<i class="fas fa-fw fa-search"></i>
								</button>
							</span>
						</div>
	      			</td>
      			</tr>
      			<tr>
      				<td style="vertical-align: top;">
						<div class="ml-2 mt-2">
							<label for="qty">Qty</label>
						</div>
					</td>
					<td>
						<div class="form-group ml-4" style="width: 242px;">
							<div class="row">
								<div class="col-md-6">
									<input type="number" id="qty" value="1" class="form-control" autocomplete="off">
								</div>
								<div class="col-md-6">
									<input type="number" id="show_stock" value="0" class="form-control" readonly autocomplete="off">
								</div>
							</div>
						</div>
					</td>
      			</tr>
      			<tr>
      				<td></td>
      				<td>
						<div class="form-group ml-4" style="vertical-align: top;">
							<button type="button" id="add_cart" class="btn btn-primary">
								<i class="fas fa-fw fa-cart-plus"></i> Add to Cart
							</button>
						</div>
					</td>
      			</tr>
	      	</table>
	    </div>
    	<div class="small-box" style="background-color: #fff; width: 356px; height: 175px; margin-left: 365px; margin-top: -195px;">
    		<div align="right">
    			<h4 class="mr-3 pt-1">Invoice <b><span id="invoice"><?= $invoice ?></span></b></h4>
    			<h1 class="mr-3"><b>Rp. <span id="grand_total2" style="font-size: 50pt">0</span></b></h1>
    		</div>
    	</div>
    	<div class="small-box" style="background-color: #fff; width: 1092px; margin-left: -369px; border-right: 10px solid #fff; border-left: 10px solid #fff; border-top: 10px solid #fff; border-bottom: 0.1px solid #fff">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>#</th>
						<th>Barcode</th>
						<th>Product Item</th>
						<th>Price</th>
						<th>Qty</th>
						<th>Discount Item</th>
						<th>Total</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody id="cart_table">
					<?php $this->view('transaction/sale/cart_data') ?>
				</tbody>
			</table>
		</div>
		<div class="small-box" style="background-color: #fff; margin-left: -370px; width: 394px;">
			<table>
				<tr>
					<td style="vertical-align: top; width: 30%;">
						<label class="mt-3 ml-2" for="sub_total">Sub Total</label>
					</td>
					<td>
						<div class="form-group mt-2" style="margin-left: 60px;">
							<input type="number" id="sub_total" value="" class="form-control" readonly autocomplete="off">
						</div>
					</td>
				</tr>
				<tr>
					<td style="vertical-align: top; width: 30%;">
						<label class="mt-3 ml-2" for="discount">Discount (%)</label>
					</td>
					<td>
						<div class="form-group" style="margin-left: 60px;">
							<input type="number" id="discount" value="0" min="0" max="100" class="form-control" autocomplete="off">
						</div>
					</td>
				</tr>
				<tr>
					<td style="vertical-align: top;">
						<label class="mt-3 ml-2" for="grand_total">Grand Total</label>
					</td>
					<td>
						<div class="form-group" style="margin-left: 60px;">
							<input type="number" id="grand_total" class="form-control" readonly autocomplete="off">
						</div>
					</td>
				</tr>
			</table>
		</div>
		<div class="row">
			<div class="col-lg-3" style="margin-left: 40px; margin-top: -195.2px;">
				<div class="small-box" style="background-color: #fff; width: 370px;">
					<table>
						<tr>
							<td style="vertical-align: top;">
								<label class="mt-3 ml-2" for="cash">Cash</label>
							</td>
							<td>
								<div>
									<div class="form-group mt-2" style="margin-left: 89px;">
										<input type="number" id="cash" value="0" min="0" class="form-control" autocomplete="off">
									</div>
								</div>
							</td>
						</tr>
						<tr>
							<td style="vertical-align: top;">
								<label class="mt-3 ml-2" for="change">Change</label>
							</td>
							<td>
								<div>
									<div class="form-group" style="margin-left: 89px;">
										<input type="number" id="change" class="form-control" readonly autocomplete="off">
									</div>
								</div>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-3" style="margin-left: 422px; margin-top: -195.2px;">
				<div class="small-box" style="background-color: #fff; width: 300px;">
					<table>
						<tr>
							<td style="vertical-align: top;">
								<label class="mt-3 ml-2" for="note">Note</label>
							</td>
							<td>
								<div>
									<div class="form-group mt-2 pb-2" style="margin-left: 30px;">
										<textarea id="note" rows="3" cols="24" class="form-control"></textarea>
									</div>
								</div>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="row" style="margin-bottom: 150px;">
			<div style="margin-left: 46px; margin-top: -60px;">
				<button id="proccess_payment" class="btn btn-success pb-2">
					<i class="fas fa-fw fa-check"></i> Proccess Payment
				</button>
			</div>
		</div>
		<div class="row">
			<div style="margin-top: -210px; margin-left: 230px;">
				<button id="cancel_payment" class="btn btn-warning">
					<i class="fas fa-fw fa-sync-alt"></i> Cancel
				</button>
			</div>
		</div>


		<!-- Modal Add Product Item -->
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
		            <tr class="text-center">
		              <th scope="col">#</th>
		              <th scope="col">Barcode</th>
		              <th scope="col">Name</th>
		              <th scope="col">Price</th>
		              <th scope="col">Stock</th>
		              <th scope="col">Actions</th>
		            </tr>
		          </thead>
		          <tbody>
		            <?php 
		            $no = 1;
		            foreach($item as $i => $data) { ?>
		            <tr class="text-center">
		              <th scope="row"><?= $no++ ?></th>
		              <td scope="row"><?= $data->barcode ?></td>
		              <td scope="row"><?= $data->name ?></td>
		              <td scope="row"><?= indo_currency($data->price) ?></td>
		              <td scope="row"><?= $data->stock ?></td>
		              <td scope="row">
		                <button class="btn btn-xs badge-success rounded-pill" id="select" 
		                  data-id="<?= $data->item_id ?>"
		                  data-barcode="<?= $data->barcode ?>"
		                  data-price="<?= $data->price ?>"
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

		<!-- Modal Edit Cart Item -->
		<div class="modal fade" id="modal-item-edit" tabindex="-1" role="dialog" aria-labelledby="editItemModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content" style="width: 600px !important; margin-left: -40px !important;">
		      <div class="modal-header">
		        <h5 class="modal-title" id="editItemModalLabel">Update Product Item</h5>
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      <div class="modal-body">
		        <input type="hidden" id="cartid_item">
		        <div class="form-group">
		        	<label for="product_item">Product Item</label>
		        	<div class="row">
		        		<div class="col-md-5">
		        			<input type="text" id="barcode_item" class="form-control" readonly autocomplete="off">
		        		</div>
		        		<div class="col-md-7">
		        			<input type="text" id="product_item" class="form-control" readonly autocomplete="off">
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<label for="price_item">Price</label>
		        	<input type="number" id="price_item" min="0" class="form-control" autocomplete="off">
		        </div>
		        <div class="form-group">
		        	<div class="row">
		        		<div class="col-md-6">
				        	<label for="qty_item">Qty</label>
				        	<input type="number" id="qty_item" min="1" class="form-control" autocomplete="off">
		        		</div>
		        		<div class="col-md-6">
		        			<label>Stock Item</label>
				        	<input type="number" id="stock_item" class="form-control" readonly autocomplete="off">
		        		</div>
		        	</div>
		        </div>
		        <div class="form-group">
		        	<label for="total_before">Total Before Discount</label>
		        	<input type="number" id="total_before" class="form-control" readonly autocomplete="off">
		        </div>
		        <div class="form-group">
		        	<label for="discount_item">Discount per Item</label>
		        	<input type="number" id="discount_item" min="0" class="form-control" autocomplete="off">
		        </div>
		        <div class="form-group">
		        	<label for="total_item">Total After Discount</label>
		        	<input type="number" id="total_item" class="form-control" readonly autocomplete="off">
		        </div>
		      </div>
		      <div class="modal-footer">
		      	<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
		      	<button type="button" id="edit_cart" class="btn btn-primary">Update</button>
		      </div>
		    </div>
		  </div>
		</div>


		<script>
		  $(document).on('click', '#select', function() {
		  	var barcode = $(this).data('barcode')
		  	$('#item_id').val($(this).data('id'))
		  	$('#barcode').val(barcode)
		  	$('#price').val($(this).data('price'))
		  	$('#stock').val($(this).data('stock'))
		  	$('#show_stock').val($(this).data('stock'))
		  	$('#modal-item').modal('hide')

		  	get_cart_qty(barcode)
		  })

		  function get_cart_qty(barcode) {
		  	$('#cart_table tr').each(function() {
		  		var qty_cart = $("#cart_table td.barcode:contains('"+barcode+"')").parent().find("td").eq(4).html()
		  		if (qty_cart != null) {
			  		$('#qty_cart').val(qty_cart)
		  		} else {
		  			$('#qty_cart').val(0)
		  		}
		  	})
		  }

		  $(document).on('click', '#add_cart', function() {
		  	var item_id = $('#item_id').val()
		  	var price = $('#price').val()
		  	var stock = $('#stock').val()
		  	var qty = $('#qty').val()
		  	var qty_cart = $('#qty_cart').val()
		  	if (item_id == '') {
		  		alert('Product No Selected!')
		  		$('#barcode').focus()
		  	} else if (stock < 1 || parseInt(stock) < (parseInt(qty_cart) + parseInt(qty))) {
		  		alert('Insufficient Stock!')
		  		$('#qty').focus()
		  	} else {
		  		$.ajax({
		  			type: 'POST',
		  			url: '<?= base_url('sale/proccess') ?>',
		  			data: {'add_cart' : true, 'item_id' : item_id, 'price' : price, 'qty' : qty},
		  			dataType: 'json',
		  			success: function(result) {
		  				if(result.success == true) {
		  					$('#cart_table').load('<?= base_url('sale/cart_data') ?>', function () {
		  						calculate()
		  					})
		  					$('#item_id').val('')
		  					$('#barcode').val('')
		  					$('#show_stock').val(0)
		  					$('#qty').val('1')
		  					$('#barcode').focus()
		  				} else {
		  					alert('Failed to Add Item to Cart!')
		  				}
		  			}
		  		})
		  	}
		  })

		  $(document).on('click', '#del-cart', function() {
		  	if (confirm('Are You Sure Want to Delete This Item?')) {
		  		var cart_id = $(this).data('cartid')
		  		$.ajax({
		  			type : 'POST',
		  			url: '<?= base_url('sale/cart_del') ?>',
		  			dataType: 'json',
		  			data: {'cart_id': cart_id},
		  			success: function(result) {
		  				if (result.success == true) {
		  					$('#cart_table').load('<?= base_url('sale/cart_data') ?>', function () {
		  						calculate()
		  					})
		  				} else {
		  					alert('Failed to Delete Item Cart!');
		  				}
		  			}
		  		})
		  	}
		  })

		  $(document).on('click', '#update_cart', function() {
		  	$('#cartid_item').val($(this).data('cartid'))
		  	$('#barcode_item').val($(this).data('barcode'))
		  	$('#product_item').val($(this).data('product'))
		  	$('#stock_item').val($(this).data('stock'))
		  	$('#price_item').val($(this).data('price'))
		  	$('#qty_item').val($(this).data('qty'))
		  	$('#total_before').val($(this).data('price')) * $(this).data('qty')
		  	$('#discount_item').val($(this).data('discount'))
		  	$('#total_item').val($(this).data('total'))
		  })

		  function count_edit_modal() {
		  	var price = $('#price_item').val()
		  	var qty = $('#qty_item').val()
		  	var discount = $('#discount_item').val()

		  	total_before = price * qty
		  	$('#total_before').val(total_before)

		  	total = (price - discount) * qty
		  	$('#total_item').val(total)

		  	if (discount == '') {
		  		$('#discount_item').val(0)
		  	}
		  }
		  $(document).on('keyup mouseup', '#price_item, #qty_item, #discount_item', function() {
		  	count_edit_modal()
		  })

		  $(document).on('click', '#edit_cart', function() {
		  	var cart_id = $('#cartid_item').val()
		  	var price = $('#price_item').val()
		  	var qty = $('#qty_item').val()
		  	var discount = $('#discount_item').val()
		  	var total = $('#total_item').val()
		  	var stock = $('#stock_item').val()
		  	if (price == '' || price < 1) {
		  		alert('Price Cannot be Empty!')
		  		$('#price_item').focus()
		  		$('#price_item').val(1)
		  	} else if (qty == 0 || qty < 1) {
		  		alert('Qty Cannot be Empty!')
		  		$('#qty_item').focus()
		  		$('#qty_item').val(1)
		  	} else if (parseInt(qty) > parseInt(stock)) {
		  		alert('Insufficient Stock!')
		  		$('#qty_item').focus()
		  		$('#qty_item').val(1)
		  	} else {
		  		$.ajax({
		  			type: 'POST',
		  			url: '<?= base_url('sale/proccess') ?>',
		  			data: {'edit_cart' : true, 'cart_id' : cart_id, 'price' : price, 'qty' : qty, 'discount' : discount, 'total' : total},
		  			dataType: 'json',
		  			success: function(result) {
		  				if(result.success == true) {
		  					$('#cart_table').load('<?= base_url('sale/cart_data') ?>', function () {
		  						calculate()
		  					})
		  					alert('Item Updated!')
		  					$('#modal-item-edit').modal('hide')
		  				} else {
		  					alert('Failed to Update Item to Cart!')
		  					$('#modal-item-edit').modal('hide')
		  				}
		  			}
		  		})
		  	}
		  })


		  function calculate() {
		  	var subtotal = 0;
		  	$('#cart_table tr').each(function() {
		  		subtotal += parseInt($(this).find('#total').text())
		  	})
		  	isNaN(subtotal) ? $('#sub_total').val(0) : $('#sub_total').val(subtotal)

		  	var discount = $('#discount').val()
		  	var grand_total =  subtotal - (discount * subtotal / 100)
		  	if (isNaN(grand_total)) {
		  		$('#grand_total').val(0)
		  		$('#grand_total2').text(0)
		  	} else {
		  		$('#grand_total').val(grand_total)
		  		$('#grand_total2').text(grand_total)
		  	}

		  	var cash = $('#cash').val()
		  		cash != 0 ? $('#change').val(cash - grand_total) : $('#change').val(0)

		  		if (discount == '') {
			  		$('#discount').val(0)
			  	}
		  }

		  $(document).on('keyup mouseup', '#discount, #cash, #discount_item', function() {
		  	calculate()
		  })

		  $(document).ready(function() {
		  	calculate()
		  })

		  // Proccess Payment
		  $(document).on('click', '#proccess_payment', function() {
		  	var customer_id = $('#customer').val()
		  	var subtotal = $('#sub_total').val()
		  	var discount = $('#discount').val()
		  	var grandtotal = $('#grand_total').val()
		  	var cash = $('#cash').val()
		  	var change = $('#change').val()
		  	var note = $('#note').val()
		  	var date = $('#date').val()
		  	if (subtotal < 1) {
		  		alert('No Product Selected!')
		  		$('#barcode').focus()
		  	} else if (cash < 1) {
		  		alert('Enter The Amount of Money First!')
		  		$('#cash').val(0)
		  		$('#cash').focus()
		  	} else {
		  		if (confirm('Are You Sure Want to Proccess This Transaction?')) {
		  			$.ajax({
		  				type: 'POST',
		  				url: '<?= base_url('sale/proccess') ?>',
		  				data: {'proccess_payment' : true, 'customer_id' : customer_id, 'subtotal' : subtotal,
		  						'discount' : discount, 'grandtotal' : grandtotal, 'cash' : cash, 'change' : change,
		  						'note' : note, 'date' : date},
  						dataType: 'json',
  						success: function(result) {
  							if (result.success) {
  								alert('Transaction Success!')
  								window.open('<?= base_url('sale/print/') ?>' + result.sale_id, '_blank')
  							} else {
  								alert('Transaction Failed')
  							}
  							location.href='<?= base_url('sale/') ?>'
  						}
		  			})
		  		}
		  	}
		  })

		  $(document).on('click', '#cancel_payment', function() {
		  	if (confirm('Are You Sure Want to Cancel This Payment?')) {
		  		$.ajax({
		  			type: 'POST',
		  			url: '<?= base_url('sale/cart_del') ?>',
		  			data: {'cancel_payment' : true},
		  			dataType: 'json',
		  			success: function(result) {
		  				if (result.success == true) {
		  					alert('Cancel Payment Success!')
		  					$('#cart_table').load('<?= base_url('sale/cart_data') ?>', function() {
		  						calculate()
		  					})
		  				}
		  			}
		  		})
		  		$('#discount').val(0)
		  		$('#cash').val(0)
		  		$('#customer').val('').change()
		  		$('#barcode').val('')
		  		$('#barcode').focus()
		  	}
		  })
		</script>
</section>

