<section class="content">
<div class="row">
    <div class="col-md-12 col-sm-16 col-xs-18">

<!--
		<form action="" method="POST" role="form">
			<legend>Search Porducts</legend>

			<div class="form-group">
				<input type="hidden" class="form-control" name="product_id" id="product_id">
				<input type="text" class="form-control" name="product_price" id="product_price" placeholder="Product Price" autocomplete="off">
				<input type="text" class="form-control" name="product_code" id="product_code" placeholder="Product Code" autocomplete="off">
			</div>

		</form>
-->
    <div>
        <h1 class="page-header">Invoice</h1>
    </div>
		<!--
		<div style="top: 2970px; right: 0px;" id="rightDiv">

			<p>online service</p>



			<a href="skype:nizam.simura?call" marked="1">
				<img border="0" alt="Skype: Nizam" src="/images/skype.gif">
			</a>

			<a href="skype:sales-wifiezcast?call" marked="1">
				<img border="0" alt="Skype: sales-wifiezcast" src="/images/skype.gif">
			</a>


		</div>


		-->
    <form  role="form" action="<?=  base_url()?>inventory/save_invoice" method="post">

    <div class="box-body">

		<div class="row">
			<div class="col-md-4">
				<div class="form-group">

				<?php
				$attributes = 'class="form-control"';
				echo '<label for="phone" class="control-label col-xs-2">Sells Person</label>';
				echo '<div class="col-xs-10">';
				echo form_dropdown('sellsperson',$sells_person_drop_down,set_value('sellsperson'),$attributes);
				?>
					</div>
				</div>
			</div>
		</div>


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
						<input type="text" name="phone" class="form-control" placeholder="Phone" >
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
						<input type="text" name="order_date" class="form-control" value="<?php echo date('Y-m-d'); ?>" readonly="readonly">
					</div>
				</div>
				
				<div class="form-group">
					<label for="invoice-no" class="control-label col-xs-2">Invoice</label>
					<div class="col-xs-10">
						<input type="text" name="invoice-no" class="form-control" placeholder="Invoice No." value="<?php echo $invoiceno?>" readonly="readonly">
					</div>
				</div>
				
				<div class="form-group">
					<label for="location" class="control-label col-xs-2">Address</label>
					<div class="col-xs-10">
						<input type="text" name="address" class="form-control" placeholder="Address">
					</div>
				</div>
			</div>
        </div> 
    </div>
<div class="col-md-9">
	
       <table class="table table-bordered table-hover invtable">
        <thead>
            <th>No</th>
            <th colspan="4">Product ID</th>
            <th>Quantity</th>
            <th>Unit Price</th>
			<th>Discount Amount</th>
            <th>Discount (%)</th>
            <th>Total</th>
            <th><a id="add" class="btn btn-primary" href="#"><i class="fa fa-plus"></i></a></th>
        </thead>
        <tbody class="detail">
        <tr>
            <td class="no">1</td>
            <td colspan="4">
				<?php
				$attributes = 'class="form-control" id="proCode"';
				echo form_dropdown('productcode[]',$product,set_value('productcode'),$attributes);
				?>
				<!--<input type="text" class="form-control code " id="pcode" name="code[]">-->
			</td>
            <td><input type="text" class="form-control quantity" name="quantity[]" required="required"></td>
            <td><input type="text" class="form-control price" value="" id="price" name="price[]" required="required"></td>
			<td><input type="text" class="form-control discount-amount" name="discountamount[]"></td>
            <td><input type="text" class="form-control discount" name="discount[]"></td>
            <td><input type="text" class="form-control amount" name="amount[]" readonly="readonly"></td>
            <td><a href="#" class="btn btn-primary remove"><i class="fa fa-times"></i></a></td>
        </tr>
        </tbody>
        <tfoot>
            <th class="no-style" colspan="8"></th>
            <th >Total</th>
            <th style="text-align: center; background: silver;" colspan="1" ><span class="total"></span> tk</th>
        </tfoot>
		   <tfoot>
		   <th class="no-style" colspan="8"></th>
		   <th >Subtotal</th>
		   <th style="text-align: center; background: silver;" colspan="1" ><span class="subtotal"></span> tk</th>
		   </tfoot>
		<tfoot>
            <th class="no-style" colspan="8"></th>
            <th >Discount</th>
            <th style="text-align: center; background: silver;" colspan="1" ><span class="discount"></span> tk</th>
        </tfoot>

    </table>
        <div><b>In Words :</b> <span class="inWord"></span>
			<input type="hidden" class="form-control " id="inword" name="inword">
		</div>



    <input type="submit" class="btn btn-primary inv-btn" name="save" value="Print">
    <!--<input type="submit" class="btn btn-primary inv-btn" name="print" value="Print" formtarget="_blank">-->
	
	</div>
</form>

</div>
</div>
</section>

