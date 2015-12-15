<section class="content">
<div class="row">
<div class="col-md-8 col-sm-16 col-xs-18">
    <a class="btn btn-default" href="<?php base_url();?>add_product_category">Add Category</a>
    <div>
        <h1 class="page-header">All Categories</h1>
    </div>
   <!-- <a class="btn btn-default"  class="btn btn-default" href="<?php //base_url();?>add_product_category">Add Category</a> -->
    <table class="table table-bordered table-hover">
        <thead>
            <th>No.</th>
            <th>Product Name</th>
            <th>Action</th>
        </thead>
        <tbody class="inventory">
        <?php $i = 1;?>
        <?php foreach($categories as $category){ ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $category->product_category_name ;?></td>
                <td><a class="btn btn-default"href="<?php base_url();?>edit_product_category/<?php echo $category->id ;?>">Edit</a>  <a class="btn btn-default"href="<?php base_url();?>delete_product_category/<?php echo $category->id ;?>">Delete</a></td>
            </tr>
        <?php }  ?>
        </tbody>
    </table>
</div>
</div>
</section>