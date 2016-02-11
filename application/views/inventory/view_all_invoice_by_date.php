<section class="content">
<div class="row">
<div class="col-md-8 col-sm-16 col-xs-18">
    <div>
        <!--
        <a class="btn btn-default" href="<?php //base_url();?>invoice">New Invoice</a>
        -->
        <h1 class="page-header">View All Invoice by Date</h1>
        <form class="form-inline" role="form" action="<?=  base_url()?>inventory/all_invoice_by_date" method="post">
            <input type="text" class="form-control" value="<?php echo $show_date ?>" name="date" id="date" placeholder="Date" onchange="this.form.submit()" required>
            <noscript><input type="submit" value="Submit"></noscript>
        </form>

        <form class="form-inline" role="form" action="<?=  base_url()?>inventory/gettotalreportbydate" method="post">
            <input  type="hidden" class="form-control" name="datereport" id="datereport" value="<?php echo $show_date ?>">
            <input class="btn btn-default" type="submit" value="Get Invoice By Date">
        </form>

    </div>

    <table class="table table-bordered table-hover">
        <thead>
        <th>SI No.</th>
        <th>Date</th>
        <th>Invoice No.</th>
        <th>Customer Name</th>
        <th>Product Quantity</th>
        <th>Subtotal</th>
        <th>Discount</th>
        <th>Total</th>
        <th>Sold By</th>
        <th></th>
        </thead>
        <tbody class="inventory">
        <?php $i = 1;?>
        <?php foreach($invoices as $invdaily){ ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $invdaily->date;?></td>
                <td><?php echo $invdaily->invoice_no;?></td>
                <td><?php echo $invdaily->customer_name;?></td>
                <td><?php echo $invdaily->quantity ;?></td>
                <td><?php echo $invdaily->subtotal ;?></td>
                <td><?php echo $invdaily->totalDiscount ;?></td>
                <td><?php echo $invdaily->total ;?></td>
                <td><?php echo $invdaily->sells_person_name ;?></td>
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
