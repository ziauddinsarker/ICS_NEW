
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>PP Nonwoven All Costing info</h1>
            <a href="<?=  base_url()?>admin/ppnw_add">Add New Costing</a>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- /.row -->
            <div class="row ppnw">
            <div class="col-md-8">


                <!--
                <div class="someclass">
                    <h2>Create A Bar Chart With D3 JavaScript</h2>
                    <div id="bar-chart">

                    </div>
                </div>

                -->

                <table class="" border="1">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Company Name</th>
                            <th>Date</th>
                            <th>Order Quantity </th>
                            <th>Price</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($ppnw_all_costing as $ppnw){?>
                            <tr class="odd gradeX">
                                <td><?php echo $ppnw->tbl_order_id_name;?></td>
                                <td><?php echo $ppnw->tbl_company_id;?></td>
                                <td><?php echo $ppnw->tbl_order_date;?></td>
                                <td><?php echo $ppnw->tbl_order_quantity;?></td>
                                <td><?php echo $ppnw->tbl_total_price;?></td>
                                <td><a href="<?=  base_url()?>ppnw/edit_ppnw_costing/<?= $ppnw->ics_order_id;?>">Edit</a> | <a href="<?=  base_url()?>ppnw/delete_ppnw_costing/<?= $ppnw->ics_order_id;?>">Delete</a>| <a href="<?=  base_url()?>ppnw/revision_ppnw_costing/<?= $ppnw->ics_order_id;?>">Revision</a></td>
                            </tr>
                        <?php }?>
                        </tbody>

                    </table>

            </div>
            </div>

        </section><!-- /.content -->
		

