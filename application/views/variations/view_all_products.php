<section class="content">
<div class="row">
<div class="col-md-8 col-sm-16 col-xs-18">
    <div>
        <h1 class="page-header">All Products</h1>
    </div>
    <a class="btn btn-default" href="<?php base_url();?>add_product">Add Product</a>
    <a class="btn btn-default" href="<?php base_url();?>add_product_category">Add Category</a>
    <table class="table table-bordered table-hover">
        <thead>
            <th>No.</th>
            <th>Product Name</th>
            <th>Product SKU</th>
            <th>Fabric</th>
            <th>Color</th>
            <th>Quantity Price</th>
            <th> Category</th>
            <th></th>
        </thead>
        <tbody class="inventory">
        <?php $i = 1;?>
        <?php foreach($products as $product){ ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $product->product_name;?></td>
                <td><?php echo $product->product_code ;?></td>
                <td><?php echo $product->product_fabric_name ;?></td>
                <td><?php echo $product->product_color ;?></td>
                <td><?php echo $product->product_price ;?></td>
                <td><?php echo $product->product_category_name ;?></td>
                <td><a class="btn btn-default" href="<?php base_url();?>edit_product/<?php echo $product->product_id ;?>">Edit</a>  <a class="btn btn-default" href="<?php base_url();?>delete_product/<?php echo $product->product_id ;?>">Delete</a></td>
            </tr>
        <?php }  ?>
        </tbody>
    </table>
</div>
</div>
</section>
