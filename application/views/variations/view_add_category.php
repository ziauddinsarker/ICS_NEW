<section class="content">
<div class="row">
    <div class="col-md-8 col-sm-16 col-xs-18">
        <a class="btn btn-default" href="<?=  base_url()?>inventory/all_categories">All Categries</a>
        <div>
            <h1 class="page-header">Add Product Category</h1>
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

        <form  role="form" action="<?=  base_url()?>inventory/save_to_product_category" method="post">
            <table class="table table-bordered table-hover">


                <tbody class="detail">
                <tr>
                    <td class="no">Category Name<input type="text" class="form-control variations" name="category" value="<?php echo set_value('category'); ?>" placeholder="Enter New Category Name">
                    </td>
                </tr>
                </tbody>
            </table>
            <input type="submit" class="btn btn-primary" name="save" value="Add Category">
        </form>

    </div>
</div>
</section>
