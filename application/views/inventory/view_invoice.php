<section class="content">
<div class="row">
    <div class="col-md-12 col-sm-16 col-xs-18">
    <div>
        <h1 class="page-header">Invoice</h1>
    </div>
    <form  role="form" action="<?=  base_url()?>inventory/save_invoice" method="post">
    <div class="box-body">
        <div class="row">
			<div class="col-md-4">
				<div class="form-group">
					<label for="name" class="control-label col-xs-2">Name</label>
					<div class="col-xs-10">
						<input type="text" name="name" class="form-control" placeholder="Customer Name">
					</div>
				</div>

				<div class="form-group">
					<label for="phone" class="control-label col-xs-2">Phone</label>
					<div class="col-xs-10">
						<input type="text" name="phone" class="form-control" placeholder="Phone">
					</div>
				</div>
				
				<div class="form-group">
					<label for="email" class="control-label col-xs-2">Email</label>
					<div class="col-xs-10">
						<input type="text" name="email" class="form-control" placeholder="Email">
					</div>
				</div>
			</div>		
		    
			<div class="col-md-4">
				<div class="form-group">
					<label for="date" class="control-label col-xs-2">Date</label>
					<div class="col-xs-10">
						<input type="text" name="date" class="form-control" value="<?php echo date('d/m/Y'); ?>" readonly="readonly">
					</div>
				</div>
				
				<div class="form-group">
					<label for="invoice-no" class="control-label col-xs-2">Invoice</label>
					<div class="col-xs-10">
						<input type="text" name="invoice-no" class="form-control" placeholder="Invoice No.">
					</div>
				</div>
				
				<div class="form-group">
					<label for="location" class="control-label col-xs-2">Address</label>
					<div class="col-xs-10">
						<input type="text" name="location" class="form-control" placeholder="Address">
					</div>
				</div>
			</div>
        </div> 
    </div>
<div class="col-md-7">
       <table class="table table-bordered table-hover">
        <thead>
            <th>No</th>
            <th>Product ID</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Discount</th>
            <th>Total</th>
            <th><input type="button" value="+" id="add" class="btn btn-primary"></th>
        </thead>
        <tbody class="detail">
        <tr>
            <td class="no">1</td>
			<td class="no"><?php
				$attributes = 'class="form-control" id="form-product"';
				echo form_dropdown('productname',$product,set_value('product'),$attributes);
				?>
			</td>
            <!--<td><input type="text" class="form-control productname" name="productname[]"></td>-->

            <td><input type="text" class="form-control quantity" name="quantity[]"></td>
            <td><input type="text" class="form-control price" name="price[]"></td>
            <td><input type="text" class="form-control discount" name="discount[]"></td>
            <td><input type="text" class="form-control amount" name="amount[]" readonly="readonly"></td>
            <td><a href="#" class="remove">Delete</a> </td>
        </tr>
        </tbody>
        <tfoot>
            <th colspan="3"></th>
            <th >Total</th>
            <th style="text-align: center; background: silver;" colspan="3" ><span class="total"></span> tk</th>
        </tfoot>
    </table>
        <div><b>In Words :</b> <span class="inWord"></span></div>

    <input type="submit" class="btn btn-primary inv-btn" name="save" value="Save">
    <input type="submit" class="btn btn-primary inv-btn" name="print" value="Print" formtarget="_blank">
	
	</div>
</form>

</div>
</div>
</section>

