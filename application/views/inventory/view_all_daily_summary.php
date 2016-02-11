<section class="content">
<div class="row">
<div class="col-md-8 col-sm-16 col-xs-18">
    <div><h1 class="page-header">All Daily Product Summary</h1></div>
    <table class="table table-bordered table-hover">
        <thead>
            <th>SI No.</th>
            <th>Product Code.</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>Discount</th>
            <th>Total</th>
            <th></th>
        </thead>
        <tbody class="inventory">
        <?php $i = 1;?>
        <?php foreach($all_daily_summary as $daily){ ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $daily->product_code;?></td>
                <td><?php echo $daily->totalquantity ;?></td>
                <td><?php echo $daily->subtotal ;?></td>
                <td><?php echo $daily->discount ;?></td>
                <td><?php echo $daily->total ;?></td>
            </tr>
        <?php }  ?>
        </tbody>
    </table>
</div>
</div>

<div class="row">
	<div class="col-md-3">
	<h3>Total Sell by Invoice</h3>
<table class="table-sell">
        <thead>           
            <th>Name</th>            
            <th>Total Sell</th>      
        </thead>
        <tbody class="inventory">
        <?php foreach($total_sold_by as $sell){ ?>
            <tr>              
                <td><?php echo $sell->sells_person_name ;?></td>
                <td><?php echo $sell->total_no_of_sell ;?></td>              
            </tr>
        <?php }  ?>
        </tbody>
    </table>
	</div>
	
	<div class="col-md-6">
	<h3>Total Sell by Quantity and Amount</h3>
	<table class="table-sell">
        <thead>
            <th>Name</th>
            <th>Quantity</th>
            <th>Amount</th>
        </thead>
        <tbody class="inventory">
        <?php foreach($total_sold_amount_by as $sell){ ?>
            <tr>
                <td><?php echo $sell->Seller ;?></td>
                <td><?php echo $sell->Quantity ;?></td>
                <td><?php echo $sell->TotalAmount ;?></td>
            </tr>
        <?php }  ?>
        </tbody>
    </table>
	</div>
</div>



	
	 
</section>
