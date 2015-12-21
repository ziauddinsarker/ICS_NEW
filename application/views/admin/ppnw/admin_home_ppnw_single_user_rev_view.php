
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <a class="btn btn-default btn-info" href="<?php echo base_url("ppnw/ppnw_all"); ?>"><i class="fa fa-arrow-left fa-lg"></i></a>
            <a class="btn btn-default btn-info" href="<?php echo base_url("ppnw/ppnw_all"); ?>">All PPNW</a>

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
                            <th>GSM </th>
                            <th>Size (H x W x L)</th>
                            <th>Quantity </th>
                            <th>Price</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($revision_single_ppnw_costing as $ppnw){?>
                            <tr class="odd gradeX">
                                <td><?php echo $ppnw->tbl_order_id_name;?></td>
                                <td><?php echo $ppnw->tbl_company_id;?></td>
                                <td><?php echo $ppnw->tbl_order_date;?></td>
                                <td><?php echo $ppnw->tbl_order_gsm;?></td>
                                <td><?php echo $ppnw->tbl_dimension_body_height_total;?> x <?php echo $ppnw->tbl_dimension_body_width_total;?> x <?php echo $ppnw->tbl_dimension_body_panel_total;?></td>
                                <td><?php echo $ppnw->tbl_order_quantity;?></td>
                                <td><?php echo $ppnw->tbl_total_price;?></td>
                                <td><a class="btn btn-default btn-info" href="<?=  base_url()?>ppnw/single_revision_ppnw_costing/<?= $ppnw->tbl_order_rev_id;?>">View</a></td>

                            </tr>
                        <?php }?>
                        </tbody>

                    </table>



            </div>
            </div>

        </section><!-- /.content -->
		

