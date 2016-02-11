<section class="content">
<div class="row">
<div class="col-md-8 col-sm-16 col-xs-18">
    <div>
        <!--
        <a class="btn btn-default" href="<?php //base_url();?>invoice">New Invoice</a>
        -->
        <h1 class="page-header">Daily Invoice</h1>
        <form class="form-inline" role="form" action="<?=  base_url()?>inventory/all_invoice_with_date" method="post">
            <input type="text" class="form-control" value="<?php echo $show_date ?>" name="invdate" id="invdate" placeholder="Date" onchange="this.form.submit()" required>
            <noscript><input type="submit" value="Submit"></noscript>
        </form>

        <form class="form-inline" role="form" action="<?=  base_url()?>inventory/getreport" method="post">
            <input type="hidden" class="form-control" name="datereport" id="datereport" value="<?php echo $show_date ?>">
            <input type="submit" value="Get Report">
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
            <th></th>
        </thead>
        <tbody class="inventory">
        <?php $i = 1;?>
        <?php foreach($invoices as $inv){ ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $inv->date;?></td>
                <td><?php echo $inv->invoice_no;?></td>
                <td><?php echo $inv->customer_name;?></td>
                <td><?php echo $inv->quantity ;?></td>
                <td><?php echo $inv->subtotal ;?></td>
                <td><?php echo $inv->totalDiscount ;?></td>
                <td><?php echo $inv->total ;?></td>
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
    <?php echo $this->pagination->create_links(); ?>
</div>
</div>
</section>
