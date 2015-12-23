<section class="content">
<div class="row">
    <div class="col-md-8 col-sm-16 col-xs-18">
    <div>
        <h1 class="page-header">Inventory</h1>
    </div>
    <a class="btn btn-default" href="<?php base_url();?>add_to_inventory">Add New Product to Inventory</a>
    <a class="btn btn-default" href="<?php base_url();?>add_product_category">Add Category</a>
    <table class="table table-bordered table-hover">
        <thead>
            <th>No.</th>
            <th>Product ID</th>
            <th>Product Name</th>
            <th>Quantity Sold</th>
            <th>Quantity left</th>
        </thead>
        <tbody class="inventory">
        <?php $i = 1;?>
        <?php foreach($inventorys as $inventory){ ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $inventory->product_code;?></td>
                <td><?php echo $inventory->product_name ;?></td>
                <td><?php echo $inventory->product_sold ;?></td>
                <td><?php echo $inventory->product_left ;?></td>
            </tr>
        <?php }  ?>
        </tbody>
    </table>
</div>
</div>

</section><!-- /.content -->