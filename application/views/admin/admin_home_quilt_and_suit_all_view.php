
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <a class="btn btn-default btn-info" href="<?php echo base_url("admin"); ?>">Back</a>
          <h1>Quilt & Suit All Costing info</h1>
            <a class='btn btn-default btn-info' href="<?=  base_url()?>admin/quilt_and_suit_add">Add New Costing</a>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- /.row -->
            <div class="row ppnw">
            <div class="col-md-10">
                <table class="" border="1">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Company Name</th>
                            <th>Date</th>
                            <th>Quantity </th>
                            <th>Price</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($quilt_and_suit_all_costing as $quiltandsuit){?>
                            <tr class="odd gradeX">
                                <td><?php echo $quiltandsuit->tbl_quilt_and_suit_id_name;?></td>
                                <td><?php echo $quiltandsuit->tbl_quilt_and_suit_company_name;?></td>
                                <td><?php echo $quiltandsuit->tbl_quilt_and_suit_order_date;?></td>
                                <td><?php echo $quiltandsuit->tbl_quilt_and_suit_order_quantity;?></td>
                                <td><?php echo $quiltandsuit->tbl_total_price;?></td>
                                <td><a class='btn btn-default btn-info' href="<?=  base_url()?>quiltandsuit/edit_quilt_and_suit_costing/<?= $quiltandsuit->tbl_quilt_and_suit_order_id;?>">Edit</a>  <a class='btn btn-default btn-info' href="<?=  base_url()?>quiltandsuit/revision_quilt_and_suit_costing/<?= $quiltandsuit->tbl_quilt_and_suit_order_id;?>">Revisions</a><?php /* |<a href="<?=  base_url()?>ppnw/delete_ppnw_costing/<?= $ppnw->ics_order_id;?>">Delete</a>| <a href="<?=  base_url()?>ppnw/ppnw_all">PDF</a>*/?> </td>
                            </tr>
                        <?php }?>
                        </tbody>

                    </table>

            </div>
            </div>

        </section><!-- /.content -->
		

