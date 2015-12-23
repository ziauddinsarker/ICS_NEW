

<section class="content">
    <div class="row">
        <div class="col-md-8 col-sm-16 col-xs-18">
        <div>
            <h1 class="page-header">Edit Product</h1>
        </div>
        <form  role="form" action="<?=  base_url()?>inventory/update_product" method="post">

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="name" class="control-label col-xs-2">Product Name</label>
                        <div class="col-xs-10">
                            <?php
                            $attributes = 'class="form-control" id="form-fabric"';
                            echo form_dropdown('name',$name,$product_name,$attributes);
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="code" class="control-label col-xs-2">Product Code</label>
                        <div class="col-xs-10">
                            <input type="text" class="form-control full" name="price" placeholder="Enter Unit Price" value="<?php echo $product_code; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="fabric" class="control-label col-xs-2">Fabric</label>
                        <div class="col-xs-10">
                            <?php
                            $attributes = 'class="form-control" id="form-fabric"';
                            echo form_dropdown('fabric',$fabric,$product_fabric,$attributes);
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="color" class="control-label col-xs-2">Color</label>
                        <div class="col-xs-10">
                            <?php
                            $attributes = 'class="form-control" id="form-fabric"';
                            echo form_dropdown('color',$color,$product_color,$attributes);
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="price" class="control-label col-xs-2">Price</label>
                        <div class="col-xs-10">
                            <input type="text" class="form-control full" name="price" placeholder="Enter Unit Price" value="<?php echo $product_price; ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="category" class="control-label col-xs-2">Category</label>
                        <div class="col-xs-10">
                            <?php
                            $attributes = 'class="form-control" id="form-product"';
                            ?>
                            <?php echo form_dropdown('category',$category,$product_category,$attributes);
                            ?>


                        </div>
                    </div>

                    <input type="hidden" name="product-id" value="<?php echo $product_id ?>">
                    <input type="submit" class="btn btn-primary" name="update" value="Update Product">
                </div>
                <div class="col-md-4"></div>
        </form>
    </div>
</div>
</section>

