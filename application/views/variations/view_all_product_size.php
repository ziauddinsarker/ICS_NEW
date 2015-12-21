<section class="content">
<div class="row">
    <a class="btn btn-default" href="<?php base_url();?>add_product_color">Add Product color</a>
<div class="col-md-8 col-sm-16 col-xs-18">
    <a class="btn btn-default" href="<?=  base_url()?>inventory/add_product_color">Add Product Color</a>
    <div>
        <h1 class="page-header">All Product Color</h1>
    </div>
    <table class="table table-bordered table-hover">
        <thead>
            <th>No.</th>
            <th>Product Color<th>
            <th></th>
        </thead>
        <tbody class="inventory">
        <?php $i = 1;?>
        <?php foreach($product_color as $color){ ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $color->product_color;?></td>
                <td><a class="btn btn-default" href="<?php base_url();?>edit_product_color/<?php echo $color->id ;?>">Edit</a>  <a class="btn btn-default" href="<?php base_url();?>delete_product_color/<?php echo $color->id ;?>">Delete</a></td>
            </tr>
        <?php }  ?>
        </tbody>
    </table>
</div>
</div>
</section>
