<section class="content">
<div class="row">
    <div class="col-md-8 col-sm-16 col-xs-18">
        <a class="btn btn-default" href="<?=  base_url()?>inventory/all_product_code">All Product Code</a>
        <div>
            <h1 class="page-header">Add Product Code</h1>
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

        <form  role="form" action="<?=  base_url()?>inventory/save_to_product_code" method="post">
            <table class="table table-bordered table-hover">


                <tbody class="detail">
                <tr>
                    <td class="no">Product Code<input type="text" class="form-control variations" name="product-code" placeholder="Enter Product Code">
                    </td>
                </tr>
                </tbody>
            </table>
            <input type="submit" class="btn btn-primary" name="save" value="Save Product Code">
        </form>

    </div>
</div>
</section>
