
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <a class="btn btn-default btn-info" href="<?php echo base_url("quiltandsuit/quilt_and_suit_all"); ?>">Back</a>
            <a class="btn btn-default btn-info" href="<?php echo base_url("quiltandsuit/quilt_and_suit_all"); ?>">All Quilt and Suit</a>

          <h1>Revisions</h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- /.row -->
            <div class="row ppnw">
            <div class="col-md-8">
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
                        <?php foreach($revision_single_quilt_and_suit_costing as $quiltandsuit){?>
                            <tr class="odd gradeX">
                                <td><?php echo $quiltandsuit->tbl_quilt_and_suit_id_name;?></td>
                                <td><?php echo $quiltandsuit->tbl_quilt_and_suit_company_name;?></td>
                                <td><?php echo $quiltandsuit->tbl_modification_date;?></td>
                                 <td><?php echo $quiltandsuit->tbl_quilt_and_suit_order_quantity;?></td>
                                <td><?php echo $quiltandsuit->tbl_total_price;?></td>
                                <td><a class="btn btn-default btn-info" href="<?=  base_url()?>quiltandsuit/single_revision_quilt_and_suit_costing/<?= $quiltandsuit->tbl_quilt_and_suit_order_rev_id;?>">View</a></td>

                            </tr>
                        <?php }?>
                        </tbody>

                    </table>



            </div>
            </div>

        </section><!-- /.content -->
		

