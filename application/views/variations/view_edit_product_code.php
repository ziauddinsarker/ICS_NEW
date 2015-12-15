<section class="content">
    <div class="row">
        <div class="col-md-8 col-sm-16 col-xs-18">
        <div>
            <h1 class="page-header">Edit Product Code</h1>
        </div>
        <form  role="form" action="<?=  base_url()?>inventory/update_product_code" method="post">
            <table class="table table-bordered table-hover">


                <tbody class="detail">
                <tr>
                    <input type="hidden" name="product-code-id" value="<?php echo $product_code_id; ?>">
                    <td class="no">Product Code<input type="text" class="form-control quantity" name="product-code" placeholder="Enter Product Name" value="<?php echo $product_code; ?>">

                    </td>
                </tr>
                </tbody>
            </table>
            <input type="submit" class="btn btn-primary" name="update" value="Update">
        </form>

    </div>
</div>
</section>
