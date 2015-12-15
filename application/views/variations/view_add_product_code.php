<section class="content">
<div class="row">
    <div class="col-md-8 col-sm-16 col-xs-18">
        <a class="btn btn-default" href="<?=  base_url()?>inventory/all_product_code">All Product Code</a>
        <div>
            <h1 class="page-header">Add Product Code</h1>
        </div>
        <form  role="form" action="<?=  base_url()?>inventory/save_to_product_code" method="post">
            <table class="table table-bordered table-hover">


                <tbody class="detail">
                <tr>
                    <td class="no">Product Code<input type="text" class="form-control quantity" name="product-code" placeholder="Enter Product Name">
                    </td>
                </tr>
                </tbody>
            </table>
            <input type="submit" class="btn btn-primary" name="save" value="Save Product Code">
        </form>

    </div>
</div>
</section>
