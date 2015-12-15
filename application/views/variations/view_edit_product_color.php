<section class="content">
    <div class="row">
        <div class="col-md-8 col-sm-16 col-xs-18">
        <div>
            <h1 class="page-header">Edit Product Color</h1>
        </div>
        <form  role="form" action="<?=  base_url()?>inventory/update_product_color" method="post">
            <table class="table table-bordered table-hover">


                <tbody class="detail">
                <tr>
                    <input type="hidden" name="product-color-id" value="<?php echo $product_color_id; ?>">
                    <td class="no">Product color<input type="text" class="form-control quantity" name="product-color" placeholder="Enter Product Color" value="<?php echo $product_color; ?>">

                    </td>
                </tr>
                </tbody>
            </table>
            <input type="submit" class="btn btn-primary" name="update" value="Update">
        </form>

    </div>
</div>
</section>
