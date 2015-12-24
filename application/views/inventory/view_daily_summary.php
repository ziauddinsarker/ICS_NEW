<section class="content">
<div class="row">
<div class="col-md-8 col-sm-16 col-xs-18">
    <div>
        <h1 class="page-header">Daily Summery</h1>
        <h3>Today: <?php echo date("d-m-y");?></h3>
    </div>
    <a class="btn btn-default" href="<?php base_url();?>invoice">New Invoice</a>
    <table class="table table-bordered table-hover">
        <thead>
            <th>SI No.</th>
            <th>Date</th>
            <th>Product Code.</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th>Discount</th>
            <th>Total</th>
            <th></th>
        </thead>
        <tbody class="inventory">
        <?php $i = 1;?>
        <?php foreach($daily_summary as $daily){ ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $daily->date;?></td>
                <td><?php echo $daily->product_code;?></td>
                <td><?php echo $daily->price;?></td>
                <td><?php echo $daily->totalquantity ;?></td>
                <td><?php echo $daily->subtotal ;?></td>
                <td><?php echo $daily->discount ;?></td>
                <td><?php echo $daily->total ;?></td>
                <!--
                <td><a class="btn btn-default" href="<?php // base_url();?>edit_product/<?php //echo $inv->customer_id ;?>">Edit</a>  <a class="btn btn-default" href="<?php //base_url();?>delete_product/<?php //echo $inv->customer_id ;?>">Delete</a></td>
                -->
            </tr>
        <?php }  ?>
        </tbody>
    </table>
</div>
</div>
</section>
