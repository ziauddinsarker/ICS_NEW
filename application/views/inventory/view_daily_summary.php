<section class="content">
<div class="row">
<div class="col-md-8 col-sm-16 col-xs-18">
    <div>
         <h1 class="page-header">Daily Sell Summary</h1>
        <a class="btn btn-default" href="<?php base_url();?>get_all_daily_product_summary">All Product Sell Summary</a>
        <?php foreach($sell_today as $sell){ ?>
            <?php echo "<h4>Total Sell Today: " . $sell->total_sell_today ."</h4>" ?>

        <?php }  ?>
       
        <form class="form-inline" role="form" action="<?=  base_url()?>inventory/get_daily_product_summary" method="post">
            <input type="text" class="form-control" value="<?php echo $show_date ?>" name="date" id="date" placeholder="Date" onchange="this.form.submit()" required>
            <noscript><input type="submit" value="Submit"></noscript>
        </form>

        <form class="form-inline" role="form" action="<?=  base_url()?>inventory/getreport" method="post">
            <input type="hidden" class="form-control" name="datereport" id="datereport" value="<?php echo $show_date ?>">
            <input type="submit" class="btn btn-default" value="Get Report">
        </form>

    </div>

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

        <h4>Showing data for : <?php if(!$show_date ==  ''){
                echo $show_date;
            }else {
                $date = date("Y-m-d");
                echo $date;
            }
            ?></h4>
        </tbody>
    </table>
</div>
</div>
</section>
