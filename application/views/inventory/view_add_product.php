<section class="content">
<div class="row">
    <div class="col-md-8 col-sm-16 col-xs-18">
        <div>
            <h1 class="page-header">Add Product</h1>
        </div>
        <form  role="form" action="<?=  base_url()?>inventory/save_to_products" method="post">

            <div class="row">
                <div class="col-md-12">
                <div class="form-group">
                    <label for="name" class="control-label col-xs-2">Product Name</label>
                    <div class="col-xs-10">
                        <input type="text" class="form-control full" name="name" placeholder="Enter Product Name">
                    </div>
                </div>

                <div class="form-group">
                    <label for="phone" class="control-label col-xs-2">SKU</label>
                    <div class="col-xs-10">
                        <input type="text" class="form-control full" name="sku" placeholder="Enter Product SKU">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="control-label col-xs-2">Price</label>
                    <div class="col-xs-10">
                        <input type="text" class="form-control full" name="price" placeholder="Enter Product Price">
                    </div>
                </div>

                <div class="form-group">
                    <label for="email" class="control-label col-xs-2">Category</label>
                    <div class="col-xs-10">
                        <?php
                        $attributes = 'class="form-control" id="form-product"';
                        echo form_dropdown('category',$category,set_value('category'),$attributes);
                        ?>
                    </div>
                </div>

                    <input type="submit" class="btn btn-primary" name="save" value="Save Product">
            </div>
                <div class="col-md-4"></div>


        </form>
    </div>
    </div>
</div>
</section>

