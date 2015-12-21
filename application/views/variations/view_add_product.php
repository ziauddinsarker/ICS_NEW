<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<section class="content">
<div class="row">
    <div class="col-md-8 col-sm-16 col-xs-18">
        <a class="btn btn-default" href="<?=  base_url()?>inventory/all_products">All Products</a>
        <div>
            <h1 class="page-header">Add Product</h1>
        </div>


        <?php if(validation_errors()) { ?>
            <div class="alert alert-warning">
                <?php echo validation_errors(); ?>
            </div>
        <?php } ?>


        <?php if($this->session->flashdata('item')) { ?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('item'); ?>
            </div>
        <?php } ?>


        <form  role="form" action="<?=  base_url()?>inventory/save_to_products" method="post">

            <div class="row">
                <div class="col-md-12">
                <div class="form-group">
                    <label for="name" class="control-label col-xs-2">Product Name</label>
                    <div class="col-xs-10">
                        <?php
                        $attributes = 'class="form-control" id="form-fabric"';
                        echo form_dropdown('name',$name,set_value('name'),$attributes);
                        ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="code" class="control-label col-xs-2">Product Code</label>
                        <div class="col-xs-10">
                            <input type="text" class="form-control full" name="code" placeholder="Enter Product Code">
                        </div>
                </div>

                <div class="form-group">
                    <label for="fabric" class="control-label col-xs-2">Fabric</label>
                    <div class="col-xs-10">
                        <?php
                        $attributes = 'class="form-control" id="form-fabric"';
                        echo form_dropdown('fabric',$fabric,set_value('fabric'),$attributes);
                        ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="color" class="control-label col-xs-2">Color</label>
                    <div class="col-xs-10">
                        <?php
                        $attributes = 'class="form-control" id="form-fabric"';
                        echo form_dropdown('color',$color,set_value('color'),$attributes);
                        ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="price" class="control-label col-xs-2">Price</label>
                    <div class="col-xs-10">
                        <input type="text" class="form-control full" name="price" placeholder="Enter Unit Price">
                    </div>
                </div>

                <div class="form-group">
                    <label for="category" class="control-label col-xs-2">Category</label>
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

