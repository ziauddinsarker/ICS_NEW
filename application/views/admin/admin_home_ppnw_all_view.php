
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <a class="btn btn-default btn-info" href="<?php echo base_url("admin"); ?>">Back</a>
          <h1>PP Nonwoven All Costing info</h1>
            <a class='btn btn-default btn-info' href="<?=  base_url()?>admin/ppnw_add">Add New Costing</a>
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
                            <th>GSM </th>
                            <th>Size (H x W x L)</th>
                            <th>Quantity </th>
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
                                <td><?php echo $ppnw->tbl_order_gsm;?></td>
                                <td><?php echo $ppnw->tbl_dimension_body_height_total;?> x <?php echo $ppnw->tbl_dimension_body_width_total;?> x <?php echo $ppnw->tbl_dimension_body_panel_total;?></td>
                                <td><?php echo $ppnw->tbl_order_quantity;?></td>
                                <td><?php echo $ppnw->tbl_total_price;?></td>
                                <td><a class='btn btn-default btn-info' href="<?=  base_url()?>ppnw/edit_ppnw_costing/<?= $ppnw->ics_order_id;?>">Edit</a>  <a class='btn btn-default btn-info' href="<?=  base_url()?>ppnw/revision_ppnw_costing/<?= $ppnw->ics_order_id;?>">Revisions</a><?php /* |<a href="<?=  base_url()?>ppnw/delete_ppnw_costing/<?= $ppnw->ics_order_id;?>">Delete</a>| <a href="<?=  base_url()?>ppnw/ppnw_all">PDF</a>*/?> </td>
                            </tr>
                        <?php }?>
                        </tbody>

                    </table>

            </div>
            </div>

        </section><!-- /.content -->
		

