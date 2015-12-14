
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <a class="btn btn-default btn-info" href="<?php echo base_url("admin"); ?>">Back</a>
          <h1>Woven Simple All Costing info</h1>
            <a class='btn btn-default btn-info' href="<?=  base_url()?>admin/woven_simple_add">Add New Costing</a>
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
                        <?php foreach($woven_simple_all_costing as $wovnesimple){?>
                            <tr class="odd gradeX">
                                <td><?php echo $wovnesimple->tbl_order_id_name;?></td>
                                <td><?php echo $wovnesimple->tbl_company_id;?></td>
                                <td><?php echo $wovnesimple->tbl_order_date;?></td>
                                <td><?php echo $wovnesimple->tbl_order_gsm;?></td>
                                <td><?php echo $wovnesimple->tbl_dimension_body_height_total;?> x <?php echo $wovnesimple->tbl_dimension_body_width_total;?> x <?php echo $wovnesimple->tbl_dimension_body_panel_total;?></td>
                                <td><?php echo $wovnesimple->tbl_order_quantity;?></td>
                                <td><?php echo $wovnesimple->tbl_total_price;?></td>
                                <td><a class='btn btn-default btn-info' href="<?=  base_url()?>woven_simple/edit_woven_simple_costing/<?= $wovnesimple->ics_order_id;?>">Edit</a>  <a class='btn btn-default btn-info' href="<?=  base_url()?>woven_simple/revision_woven_simple_costing/<?= $wovnesimple->ics_order_id;?>">Revisions</a></td>
                            </tr>
                        <?php }?>
                        </tbody>

                    </table>

            </div>
            </div>

        </section><!-- /.content -->
		

