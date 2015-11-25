
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <a class="btn btn-default btn-info" href="<?php echo base_url("woven/woven_all"); ?>">Back</a>
            <a class="btn btn-default btn-info" href="<?php echo base_url("woven/woven_all"); ?>">All PPNW</a>

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
                        <?php foreach($revision_single_woven_costing as $woven){?>
                            <tr class="odd gradeX">
                                <td><?php echo $woven->tbl_woven_id_name;?></td>
                                <td><?php echo $woven->tbl_woven_company_name;?></td>
                                <td><?php echo $woven->tbl_modification_date;?></td>
                                 <td><?php echo $woven->tbl_woven_order_quantity;?></td>
                                <td><?php echo $woven->tbl_total_price;?></td>
                                <td><a class="btn btn-default btn-info" href="<?=  base_url()?>woven/single_revision_woven_costing/<?= $woven->tbl_woven_order_rev_id;?>">View</a></td>

                            </tr>
                        <?php }?>
                        </tbody>

                    </table>



            </div>
            </div>

        </section><!-- /.content -->
		

