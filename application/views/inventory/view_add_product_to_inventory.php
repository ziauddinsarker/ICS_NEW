 <!-- Main content -->
<section class="content">
<div class="row">
    <div class="col-md-4 col-sm-8 col-xs-18">
        <a class="btn btn-default" href="<?php base_url() ?>index">View All Inventory</a>
        <div>
            <h1 class="page-header">Add to Inventory</h1>
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

        <form  role="form" action="<?=  base_url()?>inventory/save_products_to_inventory" method="post">
            <table class="table table-bordered table-hover">

                <tbody class="detail">
                <tr>
                    <td class="no">Product Name: <?php
                        $attributes = 'class="form-control" id="form-product"';
                        echo form_dropdown('product',$product,set_value('product'),$attributes);
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Quantity<input type="text" class="form-control quantity" name="quantity" placeholder="Quantity"></td>
                </tr>
                </tbody>
            </table>
            <input type="submit" class="btn btn-primary" name="save" value="Save">
        </form>

    </div>
</div>
</section><!-- /.content -->
