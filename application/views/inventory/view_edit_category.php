<div class="row">

</div>

<div class="row">
    <div class="col-sm-4 col-md-4 col-md-offset-2">
        <div>
            <h1 class="page-header">Edit Product Category</h1>
        </div>
        <form  role="form" action="<?=  base_url()?>inventory/update_product_category" method="post">
            <table class="table table-bordered table-hover">


                <tbody class="detail">
                <tr>
                    <input type="hidden" name="category-id" value="<?php echo $category_id; ?>">
                    <td class="no">Category Name<input type="text" class="form-control quantity" name="category" placeholder="Enter New Category Name" value="<?php echo $category_name; ?>">

                    </td>
                </tr>
                </tbody>
            </table>
            <input type="submit" class="btn btn-primary" name="update" value="Update">
        </form>

    </div>
</div>

