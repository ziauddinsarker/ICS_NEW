<section class="content">
<div class="row">
<div class="col-md-8 col-sm-16 col-xs-18">
    <a class="btn btn-default" href="<?php base_url();?>add_product_name">Add Product Name</a>
    <div>
        <h1 class="page-header">All Product Name</h1>
    </div>
    <table class="table table-bordered table-hover">
        <thead>
            <th>No.</th>
            <th>Product Name</th>
            <th></th>
        </thead>
        <tbody class="inventory">
        <?php $i = 1;?>
        <?php foreach($product_name as $product){ ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $product->product_name;?></td>
                <td><a class="btn btn-default" href="<?php base_url();?>edit_product_name/<?php echo $product->id ;?>">Edit</a>  <a class="btn btn-default" href="<?php base_url();?>delete_product_name/<?php echo $product->id ;?>">Delete</a></td>
            </tr>
        <?php }  ?>
        </tbody>
    </table>
</div>
</div>
</section>
