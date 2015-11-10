
        <!-- Content Header (Page header) -->
        <section class="content-header">
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
                            <th>Order Quantity </th>
                            <th>Price</th>
                            <th>Modified Date & Time</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($revision_single_ppnw_costing as $ppnw){?>

                            <tr class="odd gradeX">
                                <td><?php echo $ppnw->tbl_order_id_name;?></td>
                                <td><?php echo $ppnw->tbl_company_id;?></td>
                                <td><?php echo $ppnw->tbl_order_date;?></td>
                                <td><?php echo $ppnw->tbl_order_quantity;?></td>
                                <td><?php echo $ppnw->tbl_total_price;?></td>
                                <td><?php echo $ppnw->tbl_modification_date .' ('. $ppnw->tbl_modification_time.')';?></td>
                                <td><a href="<?=  base_url()?>ppnw/single_revision_ppnw_costing/<?= $ppnw->tbl_order_rev_id;?>">View</a></td>
                            </tr>

                        <?php }?>
                        </tbody>
                    <?php
                    echo date("h:i:sa");
                    ?>
                    </table>

            </div>
            </div>

        </section><!-- /.content -->
		

