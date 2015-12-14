<div class="row">
    <div class="col-sm-8 col-md-8 col-md-offset-2">
        <div>
            <h1 class="page-header">Edit Product</h1>
        </div>
        <form  role="form" action="<?=  base_url()?>inventory/update_product" method="post">
            <table class="table table-bordered table-hover">
                <tbody class="detail">
                <tr>
                    <td>Product Name<input type="text" class="form-control full" name="name" placeholder="Enter New Product Name" value="<?php echo $product_name ?>"></td>
                    <td>Product SKU<input type="text" class="form-control full" name="sku" placeholder="Enter Product SKU" value="<?php echo $product_sku ?>"></td>
                    <td>Product Price<input type="text" class="form-control full" name="price" placeholder="Enter Product Price" value="<?php echo $product_price ?>"></td>
                    <td class="no">Category: <?php
                        $attributes = 'class="form-control" id="form-product"';
                        ?>
                        <?php echo form_dropdown('category',$category,$product_category,$attributes);
                        ?>
                    </td>

                </tr>
                </tbody>
            </table>
            <input type="hidden" name="product-id" value="<?php echo $product_id ?>">
            <input type="submit" class="btn btn-primary" name="update" value="Update Product">
        </form>

    </div>
</div>


