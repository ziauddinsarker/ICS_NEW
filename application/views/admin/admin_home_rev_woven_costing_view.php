<!-- Content Header (Page header) -->
<section class="content-header">
    <?php
    $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
    echo "<a class='btn btn-default btn-info' href='$url'>Back</a>";
    ?>
    <a class="btn btn-default" href="<?php echo base_url("woven/woven_all"); ?>">All PPNW</a>
    <h1>Revisioned Woven Costing</h1>
</section>

<!-- Main content -->
<section class="content">
    <!-- Fetching All Details of Selected Student From Database And Showing In a Form -->

    <!-- Form Start -->
    <form class="form-inline add-new-ppnw-form" role="form" action="<?=  base_url()?>ppnw/update_ppnw_costing" method="post">
        <!-- Part1 Form Start -->

        <!-- Part1 Form Start -->
        <div class="row">
            <div class="part1">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="order_id">Order Id:</label>
                        <input type="text" class="form-control woven-costing" name="order_id" id="order_id" placeholder="Order ID" value="<?php echo $woven_id_name ?>" required readonly="readonly">
                    </div>
                </div>
            </div>
        </div>

        <!-- Part1 Form Start -->
        <div class="row">
            <section class="col-md-8">
                <div class="part1 row">

                    <div class="col-md-2 ">
                        <div class="form-group">
                            <label for="order_date">Date:</label>
                            <input type="text" class="form-control woven-costing" name="order_date" id="order_date" placeholder="Date" value="<?php echo $woven_order_date ?>" required>
                        </div>
                    </div>

                    <div class="col-md-4 col-md-offset-1">
                        <div class="form-group">
                            <label for="order_company">Company:</label>
                            <input type="text" class="form-control woven-costing" name="order_company" id="order_company" placeholder="Order Company" value="<?php echo $woven_company_name ?>"  required>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="order_item_name">Item Name:</label>
                            <input type="text" class="form-control woven-costing" name="order_item_name" id="order_item_name"  placeholder="Order Item Name"  value="<?php echo $woven_item_name ?>" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="order_ref_no">Reference No.:</label>
                            <input type="text" class="form-control woven-costing" name="order_ref_no" id="order_ref_no" placeholder="Order Reference No."  value="<?php echo $woven_ref_name ?>" required>
                        </div>
                    </div>

                </div>
            </section>
        </div>

        <div class="main row">
            <section class="col-md-8">

                <div class="row part4">
                    <div class="">
                        <article class="col-md-6 other-cost">
                            <h3>CM & Others</h3>

                            <div class="form-group">
                                <label for="order_total_material_inc_wastage">Total Material incl Wastage:</label>
                                <input type="text" class="form-control woven-costing" id="order_total_material_inc_wastage" name="order_total_material_inc_wastage" value="<?php echo $woven_order_total_material_inc_wastage ?>" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="order_sewing">Sewing:</label>
                                <input type="text" class="form-control woven-costing" id="order_sewing" name="order_sewing" value="<?php echo $woven_order_sewing ?>" >
                            </div>
                            <div class="form-group">
                                <label for="order_overheads">Overheads:</label>
                                <input type="text" class="form-control woven-costing" id="order_overheads" name="order_overheads" value="<?php echo $woven_order_overheads?>">
                            </div>
                        </article>

                        <article class="col-md-6 grand-total">
                            <h4>Total Material incl Wastage: <span id="final_material_cost" > <?php echo $woven_order_total_material_inc_wastage ?></span></h4>

                            <h4>Total Overhead and Other Cost: <span id="total_overhead_and_other"><?php echo $woven_order_total_overhead_and_other_cost ?></span></h4>
                            <input type="hidden" class="form-control woven-costing" id="total_overhead_and_other_hidden" name="total_overhead_and_other_hidden">

                            <h4>Total Cost: <span id="total_cost"><?php echo $woven_total_cost ?></span></h4>
                            <input type="hidden" class="form-control woven-costing" id="total_cost_hidden" name="total_cost_hidden">

                            <h2><b>Price</b>: <span id="final_price"><?php echo $woven_total_price ?></span></h2>
                            <input type="hidden" class="form-control woven-costing" id="final_price_hidden" name="final_price_hidden">

                            <input type="hidden" name="woven-id" value="<?php echo $woven_order_id ?>">
                            <input type="hidden" name="dimension-id" value="<?php echo $dimension_id ?>">
                            <!--
                              <button class="btn btn-info" type="submit" name="updatewoven" value="updatewoven">Update</button>

                                  <button class="btn btn-info" type="submit" name="submit">save</button>
                                  <button class="btn btn-info">PRINT</button>
                                  <button class="btn btn-info">PDF</button>
                                  -->
                        </article>
                    </div>
                </div>
            </section>
        </div>


        <div class="main row">
            <section class="col-md-8">

                <div class="row part4">
                    <div class="col-md-12">
                        <h4>Roll Width (Metre)</h4>
                    </div>
                    <div class="col-md-5">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group roll-name">
                                    <input type="text" class="form-control woven-costing" id="body_material_1_name" name="body_material_1_name" placeholder="Material 1" value="<?php echo $woven_body_material_1_name ?>" required>

                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group role-width">
                                    <input type="text" class="form-control woven-costing" id="body_material_1_roll_1" name="body_material_1_roll_1" placeholder="Roll Width" value="<?php echo $woven_body_material_1_roll_width ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group roll-name">
                                    <input type="text" class="form-control woven-costing" id="body_material_2_name" name="body_material_2_name" placeholder="Material 2" value="<?php echo $woven_body_material_2_name ?>" required>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group role-width">
                                    <input type="text" class="form-control woven-costing" id="body_material_2_roll_2" name="body_material_2_roll_2"  placeholder="Roll Width" value="<?php echo $woven_body_material_2_roll_width ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group roll-name">
                                    <input type="text" class="form-control woven-costing" id="body_material_3_name" name="body_material_3_name" placeholder="Material 3" value="<?php echo $woven_body_material_3_name ?>" required>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group role-width">
                                    <input type="text" class="form-control woven-costing" id="body_material_3_roll_3" name="body_material_3_roll_3" placeholder="Roll Width" value="<?php echo $woven_body_material_3_roll_width ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group roll-name">
                                    <input type="text" class="form-control woven-costing" id="body_material_4_name" name="body_material_4_name" placeholder="Material 4" value="<?php echo $woven_body_material_4_name ?>" required>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group role-width">
                                    <input type="text" class="form-control woven-costing" id="body_material_4_roll_4" name="body_material_4_roll_4" placeholder="Roll Width" value="<?php echo $woven_body_material_4_roll_width ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group roll-name">
                                    <input type="text" class="form-control woven-costing" id="body_material_5_name" name="body_material_5_name" placeholder="Material 5" value="<?php echo $woven_body_material_5_name ?>" required>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group role-width">
                                    <input type="text" class="form-control woven-costing" id="body_material_5_roll_5" name="body_material_5_roll_5" placeholder="Roll Width" value="<?php echo $woven_body_material_5_roll_width ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group roll-name">
                                    <input type="text" class="form-control woven-costing" id="body_material_6_name" name="body_material_6_name" placeholder="Material 6" value="<?php echo $woven_body_material_6_name ?>" required>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group role-width">
                                    <input type="text" class="form-control woven-costing" id="body_material_6_roll_6" name="body_material_6_roll_6" placeholder="Roll Width" value="<?php echo $woven_body_material_6_roll_width ?>" required>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="order_transport" class="small-label"> Transport:</label>
                            <input type="text" class="form-control woven-costing" id="order_transport" name="order_transport" value="<?php echo $woven_order_transport ?>" > Tk/Truck
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="order_bank_document">Bank & Doc:</label>
                            <input type="text" class="form-control woven-costing" id="order_bank_document"  name="order_bank_document" value="<?php echo $woven_order_bank_doc_charge ?>">Tk/Shipment
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="order_quantity" class="medium-label">Order Qty:</label>
                            <input type="text" class="form-control woven-costing" id="order_quantity" name="order_quantity" value="<?php echo $woven_order_quantity ?>" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="order_wastage" class="small-label">Wastage:</label>
                            <input type="text" class="form-control woven-costing" id="order_wastage" name="order_wastage" value="<?php echo $woven_order_wastage ?>" required>
                        </div>

                        <br>

                        <div class="form-group">
                            <label for="order_margin" class="small-label">Margin:</label>
                            <input type="text" class="form-control woven-costing" id="order_margin" name="order_margin" value="<?php echo $woven_order_margin ?>"  required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="order_usd" class="small-label"> USD:</label>
                            <input type="text" class="form-control woven-costing" id="order_usd" name="order_usd" value="<?php echo $woven_order_usd ?>" required>
                        </div>
                    </div>
                </div>



                <!-- Article Start -->
                <article class="row part3">
                    <!-- Part3 Form Start -->
                    <h3>Body Material</h3>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th colspan="2">Item Rates</th>
                            <th colspan="3">Item Consumption & Costs</th>
                        </tr>
                        </thead>

                        <thead>
                        <tr class="active">
                            <th>Material</th>
                            <th>Cost/Yard</th>
                            <th>Consmption(SQM)</th>
                            <th>Rate/SQM</th>
                            <th>Cost</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr class="success">
                            <td><span class="body_material_1_name_text"><?php echo $woven_body_material_1_name ?></span> <!--<input type="text" class="form-control woven-costing" id="body_material_1" name="body_material_1" placeholder="B M 1" required>--></td>
                            <td><input type="text" class="form-control woven-costing" id="body_material_1_cost" name="body_material_1_cost" value="<?php echo $woven_body_material_1_cost?>" required></td>
                            <td><input type="text" class="form-control woven-costing" id="body_material_1_consumption" name="body_material_1_consumption" value="<?php echo $woven_body_material_1_consumption ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control woven-costing" id="body_material_1_consumption_rate" name="body_material_1_consumption_rate" value="<?php echo $woven_body_material_1_rate ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control woven-costing" id="body_material_1_consumption_cost" name="body_material_1_consumption_cost" value="<?php echo $woven_body_material_1_total_cost ?>" readonly="readonly"></td>
                        </tr>
                        <tr class="success">
                            <td><span class="body_material_2_name_text"><?php echo $woven_body_material_2_name ?></span><!--<input type="text" class="form-control woven-costing" id="body_material_2" name="body_material_2" placeholder="B M 2" required>--></td>
                            <td><input type="text" class="form-control woven-costing" id="body_material_2_cost" name="body_material_2_cost" value="<?php echo $woven_body_material_2_cost?>" required></td>
                            <td><input type="text" class="form-control woven-costing" id="body_material_2_consumption" name="body_material_2_consumption" value="<?php echo $woven_body_material_2_consumption ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control woven-costing" id="body_material_2_consumption_rate" name="body_material_2_consumption_rate" value="<?php echo $woven_body_material_2_rate ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control woven-costing" id="body_material_2_consumption_cost" name="body_material_2_consumption_cost" value="<?php echo $woven_body_material_2_total_cost ?>" readonly="readonly"></td>
                        </tr>
                        <tr class="success">
                            <td><span class="body_material_3_name_text"><?php echo $woven_body_material_3_name ?></span><!--<input type="text" class="form-control woven-costing" id="body_material_3" name="body_material_3" placeholder="B M 3" required>--></td>
                            <td><input type="text" class="form-control woven-costing" id="body_material_3_cost" name="body_material_3_cost" value="<?php echo $woven_body_material_3_cost?>" required></td>
                            <td><input type="text" class="form-control woven-costing" id="body_material_3_consumption" name="body_material_3_consumption" value="<?php echo $woven_body_material_3_consumption ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control woven-costing" id="body_material_3_consumption_rate" name="body_material_3_consumption_rate" value="<?php echo $woven_body_material_3_rate ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control woven-costing" id="body_material_3_consumption_cost" name="body_material_3_consumption_cost" value="<?php echo $woven_body_material_3_total_cost ?>" readonly="readonly"></td>
                        </tr>
                        <tr class="success">
                            <td><span class="body_material_4_name_text"><?php echo $woven_body_material_4_name ?></span><!--<input type="text" class="form-control woven-costing" id="body_material_4" name="body_material_4" placeholder="Ex 1" required>--></td>
                            <td><input type="text" class="form-control woven-costing" id="body_material_4_cost" name="body_material_4_cost" value="<?php echo $woven_body_material_4_cost?>" required></td>
                            <td><input type="text" class="form-control woven-costing" id="body_material_4_consumption" name="body_material_4_consumption" value="<?php echo $woven_body_material_4_consumption ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control woven-costing" id="body_material_4_consumption_rate" name="body_material_4_consumption_rate" value="<?php echo $woven_body_material_4_rate ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control woven-costing" id="body_material_4_consumption_cost" name="body_material_4_consumption_cost" value="<?php echo $woven_body_material_4_total_cost ?>" readonly="readonly"></td>
                        </tr>
                        <tr class="success">
                            <td><span class="body_material_5_name_text"><?php echo $woven_body_material_5_name ?></span><!--<input type="text" class="form-control woven-costing" id="body_material_5" name="body_material_5" placeholder="Ex 2" required>--></td>
                            <td><input type="text" class="form-control woven-costing" id="body_material_5_cost" name="body_material_5_cost" value="<?php echo $woven_body_material_5_cost?>" required></td>
                            <td><input type="text" class="form-control woven-costing" id="body_material_5_consumption" name="body_material_5_consumption" value="<?php echo $woven_body_material_5_consumption ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control woven-costing" id="body_material_5_consumption_rate" name="body_material_5_consumption_rate" value="<?php echo $woven_body_material_5_rate ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control woven-costing" id="body_material_5_consumption_cost" name="body_material_5_consumption_cost" value="<?php echo $woven_body_material_5_total_cost ?>" readonly="readonly"></td>
                        </tr>
                        <tr class="success">
                            <td><span class="body_material_6_name_text"><?php echo $woven_body_material_6_name ?></span><!--<input type="text" class="form-control woven-costing" id="body_material_5" name="body_material_6" placeholder="Ex 3" required>--></td>
                            <td><input type="text" class="form-control woven-costing" id="body_material_6_cost" name="body_material_6_cost" value="<?php echo $woven_body_material_6_cost?>" required></td>
                            <td><input type="text" class="form-control woven-costing" id="body_material_6_consumption" name="body_material_6_consumption" value="<?php echo $woven_body_material_6_consumption ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control woven-costing" id="body_material_6_consumption_rate" name="body_material_6_consumption_rate" value="<?php echo $woven_body_material_6_rate ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control woven-costing" id="body_material_6_consumption_cost" name="body_material_6_consumption_cost" value="<?php echo $woven_body_material_6_total_cost ?>" readonly="readonly"></td>
                        </tr>
                        </tbody>

                    </table>


                    <h3>Trims in Yards</h3>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th colspan="2">Item Rates</th>
                            <th colspan="3">Item Consumption & Costs</th>

                        </tr>
                        </thead>

                        <thead>
                        <tr class="active">
                            <th>Material</th>
                            <th>Cost/Yard</th>
                            <th>Consmption (M)</th>
                            <th>Rate/Metre</th>
                            <th>Cost</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="danger">
                            <td>Zipper</td>
                            <td><input type="text" class="form-control woven-costing" id="zipper_cost" name="zipper_cost" value="<?php echo $zipper_cost ?>"></td>
                            <td><input type="text" class="form-control woven-costing" id="zipper_consumption" name="zipper_consumption" value="<?php echo $zipper_consumption ?>" ></td>
                            <td><input type="text" class="form-control woven-costing" id="zipper_consumption_rate" name="zipper_consumption_rate" value="<?php echo $zipper_consumption_rate ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control woven-costing" id="zipper_consumption_cost" name="zipper_consumption_cost" value="<?php echo $zipper_consumption_cost ?>" readonly="readonly"></td>
                        </tr>
                        <tr class="danger">
                            <td>2" Webbing</td>
                            <td><input type="text" class="form-control woven-costing" id="two_inch_webbing_cost" name="two_inch_webbing_cost" value="<?php echo $woven_trims_yard_two_inch_webbing_item_cost ?>" ></td>
                            <td><input type="text" class="form-control woven-costing" id="two_inch_webbing_consumption" name="two_inch_webbing_consumption" value="<?php echo $woven_trims_yard_two_inch_webbing_item_consumption ?>" ></td>
                            <td><input type="text" class="form-control woven-costing" id="two_inch_webbing_consumption_rate" name="two_inch_webbing_consumption_rate" readonly="readonly" value="<?php echo $woven_trims_yard_two_inch_webbing_item_rate ?>"></td>
                            <td><input type="text" class="form-control woven-costing" id="two_inch_webbing_consumption_cost" name="two_inch_webbing_consumption_cost" readonly="readonly" value="<?php echo $woven_trims_yard_two_inch_webbing_item_total_cost ?>"></td>
                        </tr>

                        <tr class="danger">
                            <td>1.5" Webbing</td>
                            <td><input type="text" class="form-control woven-costing" id="one_and_half_inch_webbing_cost" name="one_and_half_inch_webbing_cost"  value="<?php echo $woven_trims_yard_one_and_half_inch_webbing_item_cost ?>" ></td>
                            <td><input type="text" class="form-control woven-costing" id="one_and_half_inch_webbing_consumption" name="one_and_half_inch_webbing_consumption" value="<?php echo $woven_trims_yard_one_and_half_webbing_item_consumption ?>"></td>
                            <td><input type="text" class="form-control woven-costing" id="one_and_half_inch_webbing_consumption_rate" name="one_and_half_inch_webbing_consumption_rate" value="<?php echo $woven_trims_yard_one_and_half_webbing_item_rate ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control woven-costing" id="one_and_half_inch_webbing_consumption_cost" name="one_and_half_inch_webbing_consumption_cost" value="<?php echo $woven_trims_yard_one_and_half_webbing_item_total_cost ?>" readonly="readonly"></td>
                        </tr>

                        <tr class="danger">
                            <td>Velcro</td>
                            <td><input type="text" class="form-control woven-costing" id="velcro_cost" name="velcro_cost" value="<?php echo $woven_trims_yard_velcro_item_cost ?>"></td>
                            <td><input type="text" class="form-control woven-costing" id="velcro_consumption" name="velcro_consumption" value="<?php echo $woven_trims_yard_velcro_item_consumption ?>"></td>
                            <td><input type="text" class="form-control woven-costing" id="velcro_consumption_rate" name="velcro_consumption_rate" value="<?php echo $woven_trims_yard_velcro_item_rate ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control woven-costing" id="velcro_consumption_cost" name="velcro_consumption_cost" value="<?php echo $woven_trims_yard_velcro_item_total_cost ?>" readonly="readonly"></td>
                        </tr>

                        <tr class="danger">
                            <td><input type="text" class="form-control woven-costing" id="extra_trim_yard_extra_1" name="extra_trim_yard_extra_1_name" value="<?php echo $extra_trim_yard_extra_1_name ?>" placeholder="Extra 1"></td>
                            <td><input type="text" class="form-control woven-costing" id="extra_trim_yard_1_cost" name="extra_trim_yard_1_cost" value="<?php echo $woven_trims_yard_extra_1_item_cost ?>"></td>
                            <td><input type="text" class="form-control woven-costing" id="extra_trim_yard_1_consumption" name="extra_trim_yard_1_consumption" value="<?php echo $woven_trims_yard_extra_1_item_consumption ?>"></td>
                            <td><input type="text" class="form-control woven-costing" id="extra_trim_yard_1_consumption_rate" name="extra_trim_yard_1_consumption_rate" value="<?php echo $woven_trims_yard_extra_1_item_rate ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control woven-costing" id="extra_trim_yard_1_consumption_cost" name="extra_trim_yard_1_consumption_cost" value="<?php echo $woven_trims_yard_extra_1_item_total_cost ?>" readonly="readonly"></td>
                        </tr>

                        <tr class="danger">
                            <td><input type="text" class="form-control woven-costing" id="extra_trim_yard_extra_2" name="extra_trim_yard_extra_2_name" value="<?php echo $extra_trim_yard_extra_2_name ?>" placeholder="Extra 2"></td>
                            <td><input type="text" class="form-control woven-costing" id="extra_trim_yard_2_cost" name="extra_trim_yard_2_cost" value="<?php echo $woven_trims_yard_extra_2_item_cost ?>" ></td>
                            <td><input type="text" class="form-control woven-costing" id="extra_trim_yard_2_consumption" name="extra_trim_yard_2_consumption" value="<?php echo $woven_trims_yard_extra_2_item_consumption ?>"></td>
                            <td><input type="text" class="form-control woven-costing" id="extra_trim_yard_2_consumption_rate" name="extra_trim_yard_2_consumption_rate" value="<?php echo $woven_trims_yard_extra_2_item_rate ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control woven-costing" id="extra_trim_yard_2_consumption_cost" name="extra_trim_yard_2_consumption_cost" value="<?php echo $woven_trims_yard_extra_2_item_total_cost ?>" readonly="readonly"></td>
                        </tr>

                        <tr class="danger">
                            <td><input type="text" class="form-control woven-costing" id="extra_trim_yard_extra_3" name="extra_trim_yard_extra_3_name" value="<?php echo $extra_trim_yard_extra_3_name ?>" placeholder="Extra 3"></td>
                            <td><input type="text" class="form-control woven-costing" id="extra_trim_yard_3_cost" name="extra_trim_yard_3_cost" value="<?php echo $woven_trims_yard_extra_3_item_cost ?>"></td>
                            <td><input type="text" class="form-control woven-costing" id="extra_trim_yard_3_consumption" name="extra_trim_yard_3_consumption" value="<?php echo $woven_trims_yard_extra_3_item_consumption ?>"></td>
                            <td><input type="text" class="form-control woven-costing" id="extra_trim_yard_3_consumption_rate" name="extra_trim_yard_3_consumption_rate" value="<?php echo $woven_trims_yard_extra_3_item_rate ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control woven-costing" id="extra_trim_yard_3_consumption_cost" name="extra_trim_yard_3_consumption_cost" value="<?php echo $woven_trims_yard_extra_3_item_total_cost ?>" readonly="readonly"></td>
                        </tr>
                        </tbody>

                    </table>

                    <h3>Trims in Piece</h3>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th colspan="2">Item Rates</th>
                            <th colspan="3">Item Consumption & Costs</th>

                        </tr>
                        </thead>

                        <thead>
                        <tr class="active">
                            <th>Material</th>
                            <th>Cost/Piece</th>
                            <th>Consmption (Piece)</th>
                            <th>Rate/Piece</th>
                            <th>Cost</th>
                        </tr>
                        </thead>

                        <tbody>


                        <tr class="info">
                            <td>Puller</td>
                            <td><input type="text" class="form-control woven-costing" id="puller_cost" name="puller_cost" value="<?php echo $woven_trims_piece_puller_item_cost ?>"></td>
                            <td><input type="text" class="form-control woven-costing" id="puller_consumption" name="puller_consumption" value="<?php echo $woven_trims_piece_puller_item_consumption ?>"></td>
                            <td><input type="text" class="form-control woven-costing" id="puller_consumption_rate" name="puller_consumption_rate" value="<?php echo $woven_trims_piece_puller_item_rate ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control woven-costing" id="puller_consumption_cost" name="puller_consumption_cost" value="<?php echo $woven_trims_piece_puller_item_total_cost ?>" readonly="readonly"></td>
                        </tr>

                        <tr class="info">
                            <td>Print</td>
                            <td><input type="text" class="form-control woven-costing" id="print_cost" name="print_cost" value="<?php echo $woven_trims_piece_print_item_cost ?>"></td>
                            <td><input type="text" class="form-control woven-costing" id="print_consumption" name="print_consumption" value="<?php echo $woven_trims_piece_print_item_consumption ?>"></td>
                            <td><input type="text" class="form-control woven-costing" id="print_consumption_rate" name="print_consumption_rate" value="<?php echo $woven_trims_piece_print_item_rate ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control woven-costing" id="print_consumption_cost" name="print_consumption_cost" value="<?php echo $woven_trims_piece_print_item_total_cost ?>" readonly="readonly"></td>
                        </tr>

                        <tr class="info">
                            <td>D Buckle</td>
                            <td><input type="text" class="form-control woven-costing" id="buckle_cost" name="buckle_cost" value="<?php echo $woven_trims_piece_d_buckle_item_cost ?>"></td>
                            <td><input type="text" class="form-control woven-costing" id="buckle_consumption" name="buckle_consumption" value="<?php echo $woven_trims_piece_d_buckle_item_consumption ?>"></td>
                            <td><input type="text" class="form-control woven-costing" id="buckle_consumption_rate" name="buckle_consumption_rate" value="<?php echo $woven_trims_piece_d_buckle_item_rate ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control woven-costing" id="buckle_consumption_cost" name="buckle_consumption_cost" value="<?php echo $woven_trims_piece_d_buckle_item_total_cost ?>" readonly="readonly"></td>
                        </tr>

                        <tr class="info">
                            <td>Swivel Hook</td>
                            <td><input type="text" class="form-control woven-costing" id="swivel_hook_cost" name="swivel_hook_cost" value="<?php echo $woven_trims_piece_swivel_hook_item_cost ?>" ></td>
                            <td><input type="text" class="form-control woven-costing" id="swivel_hook_consumption" name="swivel_hook_consumption" value="<?php echo $woven_trims_piece_swivel_hook_item_consumption ?>"></td>
                            <td><input type="text" class="form-control woven-costing" id="swivel_hook_consumption_rate" name="swivel_hook_consumption_rate" value="<?php echo $woven_trims_piece_swivel_hook_item_rate ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control woven-costing" id="swivel_hook_consumption_cost" name="swivel_hook_consumption_cost" value="<?php echo $woven_trims_piece_swivel_hook_item_total_cost ?>" readonly="readonly"></td>
                        </tr>

                        <tr class="info">
                            <td>Adjustable Buckle</td>
                            <td><input type="text" class="form-control woven-costing" id="adjustable_buckle_cost" name="adjustable_buckle_cost" value="<?php echo $woven_trims_piece_adjustable_bukle_item_cost ?>" ></td>
                            <td><input type="text" class="form-control woven-costing" id="adjustable_buckle_consumption" name="adjustable_buckle_consumption" value="<?php echo $woven_trims_piece_adjustable_bukle_item_consumption ?>" ></td>
                            <td><input type="text" class="form-control woven-costing" id="adjustable_buckle_consumption_rate" name="adjustable_buckle_consumption_rate" value="<?php echo $woven_trims_piece_adjustable_bukle_item_rate ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control woven-costing" id="adjustable_buckle_consumption_cost" name="adjustable_buckle_consumption_cost" value="<?php echo $woven_trims_piece_adjustable_bukle_item_total_cost ?>" readonly="readonly"></td>
                        </tr>

                        <tr class="info">
                            <td>Magnetic Button</td>
                            <td><input type="text" class="form-control woven-costing" id="magnetic_button_cost" name="magnetic_button_cost" value="<?php echo $woven_trims_piece_magnetic_button_item_cost ?>"></td>
                            <td><input type="text" class="form-control woven-costing" id="magnetic_button_consumption" name="magnetic_button_consumption" value="<?php echo $woven_trims_piece_magnetic_button_item_consumption ?>"></td>
                            <td><input type="text" class="form-control woven-costing" id="magnetic_button_consumption_rate" name="magnetic_button_consumption_rate" value="<?php echo $woven_trims_piece_magnetic_button_item_rate ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control woven-costing" id="magnetic_button_consumption_cost" name="magnetic_button_consumption_cost" value="<?php echo $woven_trims_piece_magnetic_button_item_total_cost ?>" readonly="readonly"></td>
                        </tr>

                        <tr class="info">
                            <td>Snap Button</td>
                            <td><input type="text" class="form-control woven-costing" id="snap_button_cost" name="snap_button_cost" value="<?php echo $woven_trims_piece_snap_button_item_cost ?>"></td>
                            <td><input type="text" class="form-control woven-costing" id="snap_button_consumption" name="snap_button_consumption" value="<?php echo $woven_trims_piece_snap_button_item_consumption ?>"></td>
                            <td><input type="text" class="form-control woven-costing" id="snap_button_consumption_rate" name="snap_button_consumption_rate" value="<?php echo $woven_trims_piece_snap_button_item_rate ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control woven-costing" id="snap_button_consumption_cost" name="snap_button_consumption_cost" value="<?php echo $woven_trims_piece_snap_button_item_total_cost ?>" readonly="readonly"></td>
                        </tr>

                        <tr class="info">
                            <td>Rivet</td>
                            <td><input type="text" class="form-control woven-costing" id="rivet_cost" name="rivet_cost" value="<?php echo $woven_trims_piece_rivet_item_cost ?>"></td>
                            <td><input type="text" class="form-control woven-costing" id="rivet_consumption" name="rivet_consumption" value="<?php echo $woven_trims_piece_rivet_item_consumption ?>"></td>
                            <td><input type="text" class="form-control woven-costing" id="rivet_consumption_rate" name="rivet_consumption_rate" value="<?php echo $woven_trims_piece_rivet_item_rate ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control woven-costing" id="rivet_consumption_cost" name="rivet_consumption_cost" value="<?php echo $woven_trims_piece_rivet_item_total_cost ?>" readonly="readonly"></td>
                        </tr>

                        <tr class="info">
                            <td>Bottom Base</td>
                            <td><input type="text" class="form-control woven-costing" id="bottom_base_cost" name="bottom_base_cost" value="<?php echo $woven_trims_piece_bottom_base_item_cost ?>"></td>
                            <td><input type="text" class="form-control woven-costing" id="bottom_base_consumption" name="bottom_base_consumption" value="<?php echo $woven_trims_piece_bottom_base_item_consumption ?>"></td>
                            <td><input type="text" class="form-control woven-costing" id="bottom_base_consumption_rate" name="bottom_base_consumption_rate" value="<?php echo $woven_trims_piece_bottom_base_item_rate ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control woven-costing" id="bottom_base_consumption_cost" name="bottom_base_consumption_cost" value="<?php echo $woven_trims_piece_bottom_base_item_total_cost ?>" readonly="readonly"></td>
                        </tr>

                        <tr class="info">
                            <td>Thread</td>
                            <td><input type="text" class="form-control woven-costing" id="thread_cost" name="thread_cost"  value="<?php echo $woven_trims_piece_thread_item_cost ?>"></td>
                            <td><input type="text" class="form-control woven-costing" id="thread_consumption" name="thread_consumption"  value="<?php echo $woven_trims_piece_thread_item_consumption ?>"></td>
                            <td><input type="text" class="form-control woven-costing" id="thread_consumption_rate" name="thread_consumption_rate" value="<?php echo $woven_trims_piece_thread_item_rate ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control woven-costing" id="thread_consumption_cost" name="thread_consumption_cost"  value="<?php echo $woven_trims_piece_thread_item_total_cost ?>" readonly="readonly"></td>
                        </tr>

                        <tr class="info">
                            <td>Tag</td>
                            <td><input type="text" class="form-control woven-costing" id="tag_cost" name="tag_cost"  value="<?php echo $woven_trims_piece_tag_item_cost ?>"></td>
                            <td><input type="text" class="form-control woven-costing" id="tag_consumption" name="tag_consumption"  value="<?php echo $woven_trims_piece_tag_item_consumption ?>"></td>
                            <td><input type="text" class="form-control woven-costing" id="tag_consumption_rate" name="tag_consumption_rate"  value="<?php echo $woven_trims_piece_tag_item_rate ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control woven-costing" id="tag_consumption_cost" name="tag_consumption_cost"  value="<?php echo $woven_trims_piece_tag_item_total_cost ?>" readonly="readonly"></td>
                        </tr>

                        <tr class="info">
                            <td>Label</td>
                            <td><input type="text" class="form-control woven-costing" id="label_cost" name="label_cost"  value="<?php echo $woven_trims_piece_label_item_cost ?>"></td>
                            <td><input type="text" class="form-control woven-costing" id="label_consumption" name="label_consumption" value="<?php echo $woven_trims_piece_label_item_consumption ?>" ></td>
                            <td><input type="text" class="form-control woven-costing" id="label_consumption_rate" name="label_consumption_rate" value="<?php echo $woven_trims_piece_label_item_rate ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control woven-costing" id="label_consumption_cost" name="label_consumption_cost" value="<?php echo $woven_trims_piece_label_item_total_cost ?>" readonly="readonly"></td>
                        </tr>

                        <tr class="info">
                            <td>Packing</td>
                            <td><input type="text" class="form-control woven-costing" id="packing_cost" name="packing_cost" value="<?php echo $woven_trims_piece_packing_item_cost ?>" ></td>
                            <td><input type="text" class="form-control woven-costing" id="packing_consumption" name="packing_consumption" value="<?php echo $woven_trims_piece_packing_item_consumption ?>" ></td>
                            <td><input type="text" class="form-control woven-costing" id="packing_consumption_rate" name="packing_consumption_rate" value="<?php echo $woven_trims_piece_packing_item_rate ?>"  readonly="readonly"></td>
                            <td><input type="text" class="form-control woven-costing" id="packing_consumption_cost" name="packing_consumption_cost" value="<?php echo $woven_trims_piece_packing_item_total_cost ?>" readonly="readonly"></td>
                        </tr>

                        <tr class="info">
                            <td>Bottom Shoe</td>
                            <td><input type="text" class="form-control woven-costing" id="bottom_shoe_cost" name="bottom_shoe_cost" value="<?php echo $woven_trims_piece_bottom_shoe_item_cost ?>"></td>
                            <td><input type="text" class="form-control woven-costing" id="bottom_shoe_consumption" name="bottom_shoe_consumption"  value="<?php echo $woven_trims_piece_bottom_shoe_item_consumption ?>"></td>
                            <td><input type="text" class="form-control woven-costing" id="bottom_shoe_consumption_rate" name="bottom_shoe_consumption_rate"   value="<?php echo $woven_trims_piece_bottom_shoe_item_rate ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control woven-costing" id="bottom_shoe_consumption_cost" name="bottom_shoe_consumption_cost"  value="<?php echo $woven_trims_piece_bottom_shoe_item_total_cost ?>" readonly="readonly"></td>
                        </tr>

                        <tr class="info">
                            <td><input type="text" class="form-control woven-costing" id="extra_1_piece_name" placeholder="Extra 1" name="extra_1_piece_name"  value="<?php echo $woven_trims_piece_extra_1_name ?>"></td>
                            <td><input type="text" class="form-control woven-costing" id="extra_1_piece_cost" name="extra_1_piece_cost" value="<?php echo $woven_trims_piece_extra_1_item_cost ?>" ></td>
                            <td><input type="text" class="form-control woven-costing" id="extra_1_piece_consumption" name="extra_1_piece_consumption" value="<?php echo $woven_trims_piece_extra_1_item_consumption ?>" ></td>
                            <td><input type="text" class="form-control woven-costing" id="extra_1_piece_consumption_rate" name="extra_1_piece_consumption_rate" value="<?php echo $woven_trims_piece_extra_1_item_rate ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control woven-costing" id="extra_1_piece_consumption_cost" name="extra_1_piece_consumption_cost" value="<?php echo $woven_trims_piece_extra_1_item_total_cost ?>" readonly="readonly"></td>
                        </tr>

                        <tr class="info">
                            <td><input type="text" class="form-control woven-costing" id="extra_2_piece_name" placeholder="Extra 2" name="extra_2_piece_name" value="<?php echo $woven_trims_piece_extra_2_name ?>" ></td>
                            <td><input type="text" class="form-control woven-costing" id="extra_2_piece_cost" name="extra_2_piece_cost" value="<?php echo $woven_trims_piece_extra_2_item_cost ?>" ></td>
                            <td><input type="text" class="form-control woven-costing" id="extra_2_piece_consumption" name="extra_2_piece_consumption" value="<?php echo $woven_trims_piece_extra_2_item_consumption ?>" ></td>
                            <td><input type="text" class="form-control woven-costing" id="extra_2_piece_consumption_rate" name="extra_2_piece_consumption_rate" value="<?php echo $woven_trims_piece_extra_2_item_rate ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control woven-costing" id="extra_2_piece_consumption_cost" name="extra_2_piece_consumption_cost" value="<?php echo $woven_trims_piece_extra_2_item_total_cost ?>" readonly="readonly"></td>
                        </tr>

                        <tr class="info">
                            <td><input type="text" class="form-control woven-costing" id="extra_3_piece_name" placeholder="Extra 3" name="extra_3_piece_name"  value="<?php echo $woven_trims_piece_extra_3_name ?>"></td>
                            <td><input type="text" class="form-control woven-costing" id="extra_3_piece_cost" name="extra_3_piece_cost"  value="<?php echo $woven_trims_piece_extra_3_item_cost ?>"></td>
                            <td><input type="text" class="form-control woven-costing" id="extra_3_piece_consumption" name="extra_3_piece_consumption"  value="<?php echo $woven_trims_piece_extra_3_item_consumption ?>"></td>
                            <td><input type="text" class="form-control woven-costing" id="extra_3_piece_consumption_rate" name="extra_3_piece_consumption_rate" value="<?php echo $woven_trims_piece_extra_3_item_rate ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control woven-costing" id="extra_3_piece_consumption_cost" name="extra_3_piece_consumption_cost" value="<?php echo $woven_trims_piece_extra_3_item_total_cost ?>" readonly="readonly"></td>
                        </tr>

                        <tr class="info">
                            <td><input type="text" class="form-control woven-costing" id="extra_4_piece_name" placeholder="Extra 4" name="extra_4_piece_name" value="<?php echo $woven_trims_piece_extra_4_name ?>" ></td>
                            <td><input type="text" class="form-control woven-costing" id="extra_4_piece_cost" name="extra_4_piece_cost" value="<?php echo $woven_trims_piece_extra_4_item_cost ?>" ></td>
                            <td><input type="text" class="form-control woven-costing" id="extra_4_piece_consumption" name="extra_4_piece_consumption"  value="<?php echo $woven_trims_piece_extra_4_item_consumption ?>"></td>
                            <td><input type="text" class="form-control woven-costing" id="extra_4_piece_consumption_rate" name="extra_4_piece_consumption_rate" value="<?php echo $woven_trims_piece_extra_4_item_rate ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control woven-costing" id="extra_4_piece_consumption_cost" name="extra_4_piece_consumption_cost" value="<?php echo $woven_trims_piece_extra_4_item_total_cost ?>" readonly="readonly"></td>
                        </tr>

                        <tr class="info">
                            <td><input type="text" class="form-control woven-costing" id="extra_5_piece_name" placeholder="Extra 5" name="extra_5_piece_name"  value="<?php echo $woven_trims_piece_extra_5_name ?>"></td>
                            <td><input type="text" class="form-control woven-costing" id="extra_5_piece_cost" name="extra_5_piece_cost" value="<?php echo $woven_trims_piece_extra_5_item_cost ?>" ></td>
                            <td><input type="text" class="form-control woven-costing" id="extra_5_piece_consumption" name="extra_5_piece_consumption" value="<?php echo $woven_trims_piece_extra_5_item_consumption ?>" ></td>
                            <td><input type="text" class="form-control woven-costing" id="extra_5_piece_consumption_rate" name="extra_5_piece_consumption_rate" value="<?php echo $woven_trims_piece_extra_5_item_rate ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control woven-costing" id="extra_5_piece_consumption_cost" name="extra_5_piece_consumption_cost" value="<?php echo $woven_trims_piece_extra_5_item_total_cost ?>" readonly="readonly"></td>
                        </tr>
                        </tbody>

                    </table>
                </article>
                <!-- Article End  -->

                <!-- Part2 Form Start -->
                <article class="row part3">
                    <div class="part3">
                        <h3>Dimension</h3>
                        <table style="width:100%" class="table table-bordered woven-table">
                            <tr>
                                <th></th>
                                <td></td>
                                <td colspan="3"><span class="body_material_1_name_text"></span></td>
                                <td colspan="3"><span class="body_material_2_name_text"></span></td>
                                <td colspan="3"><span class="body_material_3_name_text"></span></td>
                            </tr>
                            <tr>
                                <th colspan="2">Dimension:</th>
                                <td>Actual</td>
                                <td>Allowance</td>
                                <td>Total</td>
                                <td>Actual</td>
                                <td>Allowance</td>
                                <td>Total</td>
                                <td>Actual</td>
                                <td>Allowance</td>
                                <td>Total</td>
                            </tr>

                            <tr>
                                <th rowspan="2">Front</th>
                                <td>Length</td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_front_length" name="body_material_1_front_length" value="<?php echo $body_material_1_front_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_front_length_allowance" name="body_material_1_front_length_allowance" value="<?php echo $body_material_1_front_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_front_length_total" name="body_material_1_front_length_total" value="<?php echo $body_material_1_front_length_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_2_front_length" name="body_material_2_front_length" value="<?php echo $body_material_1_front_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_2_front_length_allowance" name="body_material_2_front_length_allowance" value="<?php echo $body_material_1_front_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_2_front_length_total" name="body_material_2_front_length_total" value="<?php echo $body_material_1_front_width_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_3_front_length" name="body_material_3_front_length" value="<?php echo $body_material_1_back_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_3_front_length_allowance" name="body_material_3_front_length_allowance" value="<?php echo $body_material_1_back_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_3_front_length_total" name="body_material_3_front_length_total" value="<?php echo $body_material_1_back_length_total ?>" readonly="readonly"></td>
                            </tr>
                            <tr>
                                <td>Width</td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_front_width" name="body_material_1_front_width" value="<?php echo $body_material_1_front_width ?>" ></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_front_width_allowance" name="body_material_1_front_width_allowance" value="<?php echo $body_material_1_front_width_allowance ?>" ></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_front_width_total" name="body_material_1_front_width_total" value="<?php echo $body_material_1_front_width_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_2_front_width" name="body_material_2_front_width" value="<?php echo $body_material_2_front_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_2_front_width_allowance" name="body_material_2_front_width_allowance" value="<?php echo $body_material_2_front_width_allowance ?>"></td>
                                <td><input type="text" class="form-control" id="body_material_2_front_width_total" name="body_material_2_front_width_total" value="<?php echo $body_material_2_front_width_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_3_front_width" name="body_material_3_front_width" value="<?php echo $body_material_3_front_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_3_front_width_allowance" name="body_material_3_front_width_allowance" value="<?php echo $body_material_3_front_width_allowance ?>" ></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_3_front_width_total" name="body_material_3_front_width_total" value="<?php echo $body_material_3_front_width_total ?>" readonly="readonly"></td>
                            </tr>
                            <tr>
                                <th rowspan="2">Back</th>
                                <td>Length</td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_back_length" name="body_material_1_back_length" value="<?php echo $body_material_1_back_length ?>" ></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_back_length_allowance" name="body_material_1_back_length_allowance" value="<?php echo $body_material_1_back_length_allowance ?>" ></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_back_length_total" name="body_material_1_back_length_total" value="<?php echo $body_material_1_back_length_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_2_back_length" name="body_material_2_back_length" value="<?php echo $body_material_2_back_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_2_back_length_allowance" name="body_material_2_back_length_allowance" value="<?php echo $body_material_2_back_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_2_back_length_total" name="body_material_2_back_length_total" value="<?php echo $body_material_2_back_length_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_3_back_length" name="body_material_3_back_length" value="<?php echo $body_material_3_back_length ?>" ></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_3_back_length_allowance" name="body_material_3_back_length_allowance" value="<?php echo $body_material_3_back_length_allowance ?>" ></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_3_back_length_total" name="body_material_3_back_length_total" value="<?php echo $body_material_3_back_length_total ?>" readonly="readonly"></td>
                            </tr>
                            <tr>
                                <td>Width</td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_back_width" name="body_material_1_back_width" value="<?php echo $body_material_1_back_width ?>" ></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_back_width_allowance" name="body_material_1_back_width_allowance" value="<?php echo $body_material_1_back_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_back_width_total" name="body_material_1_back_width_total" value="<?php echo $body_material_1_back_width_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_2_back_width" name="body_material_2_back_width" value="<?php echo $body_material_2_back_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_2_back_width_allowance" name="body_material_2_back_width_allowance" value="<?php echo $body_material_2_back_width_allowance ?>" ></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_2_back_width_total" name="body_material_2_back_width_total" value="<?php echo $body_material_2_back_width_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_3_back_width" name="body_material_3_back_width" value="<?php echo $body_material_3_back_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_3_back_width_allowance" name="body_material_3_back_width_allowance" value="<?php echo $body_material_3_back_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_3_back_width_total" name="body_material_3_back_width_total" value="<?php echo $body_material_3_back_width_total ?>" readonly="readonly"></td>
                            </tr>
                            <tr>
                                <th rowspan="2">Top</th>
                                <td>Length</td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_top_length" name="body_material_1_top_length" value="<?php echo $body_material_1_top_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_top_length_allowance" name="body_material_1_top_length_allowance" value="<?php echo $body_material_1_top_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_top_length_total" name="body_material_1_top_length_total" value="<?php echo $body_material_1_top_length_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_2_top_length" name="body_material_2_top_length" value="<?php echo $body_material_2_top_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_2_top_length_allowance" name="body_material_2_top_length_allowance" value="<?php echo $body_material_2_top_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_2_top_length_total" name="body_material_2_top_length_total" value="<?php echo $body_material_2_top_length_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_3_top_length" name="body_material_3_top_length" value="<?php echo $body_material_3_top_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_3_top_length_allowance" name="body_material_3_top_length_allowance" value="<?php echo $body_material_3_top_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_3_top_length_total" name="body_material_3_top_length_total" value="<?php echo $body_material_3_top_length_total ?>" readonly="readonly"></td>
                            </tr>
                            <tr>
                                <td>Width</td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_top_width" name="body_material_1_top_width" value="<?php echo $body_material_1_top_width ?>" ></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_top_width_allowance" name="body_material_1_top_width_allowance" value="<?php echo $body_material_1_top_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_top_width_total" name="body_material_1_top_width_total" value="<?php echo $body_material_1_top_width_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_2_top_width" name="body_material_2_top_width" value="<?php echo $body_material_2_top_width ?>" ></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_2_top_width_allowance" name="body_material_2_top_width_allowance" value="<?php echo $body_material_2_top_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_2_top_width_total" name="body_material_2_top_width_total" value="<?php echo $body_material_2_top_width_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_3_top_width" name="body_material_3_top_width" value="<?php echo $body_material_3_top_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_3_top_width_allowance" name="body_material_3_top_width_allowance" value="<?php echo $body_material_3_top_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_3_top_width_total" name="body_material_3_top_width_total" value="<?php echo $body_material_3_top_width_total ?>" readonly="readonly"></td>
                            </tr>
                            <tr>
                                <th rowspan="2">Bottom</th>
                                <td>Length</td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_bottom_length" name="body_material_1_bottom_length" value="<?php echo $body_material_1_bottom_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_bottom_length_allowance" name="body_material_1_bottom_length_allowance" value="<?php echo $body_material_1_bottom_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_bottom_length_total" name="body_material_1_bottom_length_total" value="<?php echo $body_material_1_bottom_length_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_2_bottom_length" name="body_material_2_bottom_length" value="<?php echo $body_material_2_bottom_length ?>" ></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_2_bottom_length_allowance" name="body_material_2_bottom_length_allowance" value="<?php echo $body_material_2_bottom_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_2_bottom_length_total" name="body_material_2_bottom_length_total" value="<?php echo $body_material_2_bottom_length_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_3_bottom_length" name="body_material_3_bottom_length" value="<?php echo $body_material_3_bottom_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_3_bottom_length_allowance" name="body_material_3_bottom_length_allowance" value="<?php echo $body_material_3_bottom_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_3_bottom_length_total" name="body_material_3_bottom_length_total" value="<?php echo $body_material_3_bottom_length_total ?>" readonly="readonly"></td>
                            </tr>
                            <tr>
                                <td>Width</td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_bottom_width" name="body_material_1_bottom_width" value="<?php echo $body_material_1_bottom_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_bottom_width_allowance" name="body_material_1_bottom_width_allowance" value="<?php echo $body_material_1_bottom_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_bottom_width_total" name="body_material_1_bottom_width_total" value="<?php echo $body_material_1_bottom_width_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_2_bottom_width" name="body_material_2_bottom_width" value="<?php echo $body_material_2_bottom_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_2_bottom_width_allowance" name="body_material_2_bottom_width_allowance" value="<?php echo $body_material_2_bottom_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_2_bottom_width_total" name="body_material_2_bottom_width_total" value="<?php echo $body_material_2_bottom_width_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_3_bottom_width" name="body_material_3_bottom_width" value="<?php echo $body_material_3_bottom_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_3_bottom_width_allowance" name="body_material_3_bottom_width_allowance" value="<?php echo $body_material_3_bottom_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_3_bottom_width_total" name="body_material_3_bottom_width_total" value="<?php echo $body_material_3_bottom_width_total ?>" readonly="readonly"></td>
                            </tr>
                            <tr>
                                <th rowspan="2">Left</th>
                                <td>Length</td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_left_length" name="body_material_1_left_length" value="<?php echo $body_material_1_left_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_left_length_allowance" name="body_material_1_left_length_allowance" value="<?php echo $body_material_1_left_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_left_length_total" name="body_material_1_left_length_total" value="<?php echo $body_material_1_left_length_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_2_left_length" name="body_material_2_left_length" value="<?php echo $body_material_2_left_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_2_left_length_allowance" name="body_material_2_left_length_allowance" value="<?php echo $body_material_2_left_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_2_left_length_total" name="body_material_2_left_length_total" value="<?php echo $body_material_2_left_length_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_3_left_length" name="body_material_3_left_length" value="<?php echo $body_material_3_left_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_3_left_length_allowance" name="body_material_3_left_length_allowance" value="<?php echo $body_material_3_left_length_allowance ?>" ></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_3_left_length_total" name="body_material_3_left_length_total" value="<?php echo $body_material_3_left_length_total ?>" readonly="readonly"></td>
                            </tr>
                            <tr>
                                <td>Width</td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_left_width" name="body_material_1_left_width" value="<?php echo $body_material_1_left_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_left_width_allowance" name="body_material_1_left_width_allowance" value="<?php echo $body_material_1_left_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_left_width_total" name="body_material_1_left_width_total" value="<?php echo $body_material_1_left_width_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_2_left_width" name="body_material_2_left_width" value="<?php echo $body_material_2_left_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_2_left_width_allowance" name="body_material_2_left_width_allowance" value="<?php echo $body_material_2_left_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_2_left_width_total" name="body_material_2_left_width_total" value="<?php echo $body_material_2_left_width_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_3_left_width" name="body_material_3_left_width" value="<?php echo $body_material_3_left_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_3_left_width_allowance" name="body_material_3_left_width_allowance" value="<?php echo $body_material_3_left_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_3_left_width_total" name="body_material_3_left_width_total" value="<?php echo $body_material_3_left_width_total ?>" readonly="readonly"></td>
                            </tr>
                            <tr>
                                <th rowspan="2">Right</th>
                                <td>Length</td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_right_length" name="body_material_1_right_length" value="<?php echo $body_material_1_right_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_right_length_allowance" name="body_material_1_right_length_allowance" value="<?php echo $body_material_1_right_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_right_length_total" name="body_material_1_right_length_total" value="<?php echo $body_material_1_right_length_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_2_right_length" name="body_material_2_right_length" value="<?php echo $body_material_2_right_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_2_right_length_allowance" name="body_material_2_right_length_allowance" value="<?php echo $body_material_2_right_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_2_right_length_total" name="body_material_2_right_length_total" value="<?php echo $body_material_2_right_length_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_3_right_length" name="body_material_3_right_length" value="<?php echo $body_material_3_right_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_3_right_length_allowance" name="body_material_3_right_length_allowance" value="<?php echo $body_material_3_right_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_3_right_length_total" name="body_material_3_right_length_total" value="<?php echo $body_material_3_right_length_total ?>" readonly="readonly"></td>
                            </tr>
                            <tr>
                                <td>Width</td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_right_width" name="body_material_1_right_width" value="<?php echo $body_material_1_right_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_right_width_allowance" name="body_material_1_right_width_allowance" value="<?php echo $body_material_1_right_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_right_width_total" name="body_material_1_right_width_total" value="<?php echo $body_material_1_right_width_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_2_right_width" name="body_material_2_right_width" value="<?php echo $body_material_2_right_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_2_right_width_allowance" name="body_material_2_right_width_allowance" value="<?php echo $body_material_2_right_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_2_right_width_total" name="body_material_2_right_width_total" value="<?php echo $body_material_2_right_width_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_3_right_width" name="body_material_3_right_width" value="<?php echo $body_material_3_right_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_3_right_width_allowance" name="body_material_3_right_width_allowance" value="<?php echo $body_material_3_right_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_3_right_width_total" name="body_material_3_right_width_total" value="<?php echo $body_material_3_right_width_total ?>" readonly="readonly"></td>
                            </tr>
                            <tr>
                                <th rowspan="2">Pocket</th>
                                <td>Length</td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_pocket_length" name="body_material_1_pocket_length" value="<?php echo $body_material_1_pocket_length ?>" ></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_pocket_length_allowance" name="body_material_1_pocket_length_allowance" value="<?php echo $body_material_1_pocket_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_pocket_length_total" name="body_material_1_pocket_length_total" value="<?php echo $body_material_1_pocket_length_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_2_pocket_length" name="body_material_2_pocket_length" value="<?php echo $body_material_2_pocket_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_2_pocket_length_allowance" name="body_material_2_pocket_length_allowance" value="<?php echo $body_material_2_pocket_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_2_pocket_length_total" name="body_material_2_pocket_length_total" value="<?php echo $body_material_2_pocket_length_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_3_pocket_length" name="body_material_3_pocket_length" value="<?php echo $body_material_3_pocket_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_3_pocket_length_allowance" name="body_material_3_pocket_length_allowance" value="<?php echo $body_material_3_pocket_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_3_pocket_length_total" name="body_material_3_pocket_length_total" value="<?php echo $body_material_3_pocket_length_total ?>" readonly="readonly"></td>
                            </tr>
                            <tr>
                                <td>Width</td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_pocket_width" name="body_material_1_pocket_width" value="<?php echo $body_material_1_pocket_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_pocket_width_allowance" name="body_material_1_pocket_width_allowance" value="<?php echo $body_material_1_pocket_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_pocket_width_total" name="body_material_1_pocket_width_total" value="<?php echo $body_material_1_pocket_width_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_2_pocket_width" name="body_material_2_pocket_width" value="<?php echo $body_material_2_pocket_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_2_pocket_width_allowance" name="body_material_2_pocket_width_allowance" value="<?php echo $body_material_2_pocket_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_2_pocket_width_total" name="body_material_2_pocket_width_total" value="<?php echo $body_material_2_pocket_width_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_3_pocket_width" name="body_material_3_pocket_width" value="<?php echo $body_material_3_pocket_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_3_pocket_width_allowance" name="body_material_3_pocket_width_allowance" value="<?php echo $body_material_3_pocket_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_3_pocket_width_total" name="body_material_3_pocket_width_total" value="<?php echo $body_material_3_pocket_width_total ?>" readonly="readonly"></td>
                            </tr>
                            <tr>
                                <th rowspan="2"><input type="text" class="form-control woven-costing" id="body_material_first_extra_1" name="body_material_first_extra_1" placeholder="Extra 1" value="<?php echo $body_material_first_extra_1 ?>"></th>
                                <td>Length</td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_extra_1_length" name="body_material_1_extra_1_length" value="<?php echo $body_material_1_extra_1_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_extra_1_length_allowance" name="body_material_1_extra_1_length_allowance" value="<?php echo $body_material_1_extra_1_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_extra_1_length_total" name="body_material_1_extra_1_length_total" value="<?php echo $body_material_1_extra_1_length_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_2_extra_1_length" name="body_material_2_extra_1_length" value="<?php echo $body_material_2_extra_1_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_2_extra_1_length_allowance" name="body_material_2_extra_1_length_allowance" value="<?php echo $body_material_2_extra_1_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_2_extra_1_length_total" name="body_material_2_extra_1_length_total" value="<?php echo $body_material_2_extra_1_length_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_3_extra_1_length" name="body_material_3_extra_1_length" value="<?php echo $body_material_3_extra_1_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_3_extra_1_length_allowance" name="body_material_3_extra_1_length_allowance" value="<?php echo $body_material_3_extra_1_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_3_extra_1_length_total" name="body_material_3_extra_1_length_total" value="<?php echo $body_material_3_extra_1_length_total ?>" readonly="readonly"></td>
                            </tr>
                            <tr>
                                <td>Width</td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_extra_1_width" name="body_material_1_extra_1_width" value="<?php echo $body_material_1_extra_1_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_extra_1_width_allowance" name="body_material_1_extra_1_width_allowance" value="<?php echo $body_material_1_extra_1_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_extra_1_width_total" name="body_material_1_extra_1_width_total" value="<?php echo $body_material_1_extra_1_width_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_2_extra_1_width" name="body_material_2_extra_1_width" value="<?php echo $body_material_2_extra_1_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_2_extra_1_width_allowance" name="body_material_2_extra_1_width_allowance" value="<?php echo $body_material_2_extra_1_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_2_extra_1_width_total" name="body_material_2_extra_1_width_total" value="<?php echo $body_material_2_extra_1_width_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_3_extra_1_width" name="body_material_3_extra_1_width" value="<?php echo $body_material_3_extra_1_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_3_extra_1_width_allowance" name="body_material_3_extra_1_width_allowance" value="<?php echo $body_material_3_extra_1_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_3_extra_1_width_total" name="body_material_3_pocket_width_total" value="<?php echo $body_material_3_pocket_width_total ?>" readonly="readonly"></td>
                            </tr>
                            <tr>
                                <th rowspan="2"><input type="text" class="form-control woven-costing" id="body_material_first_extra_2" name="body_material_first_extra_2" placeholder="Extra 2" value="<?php echo $body_material_first_extra_2 ?>"></th>
                                <td>Length</td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_extra_2_length" name="body_material_1_extra_2_length" value="<?php echo $body_material_1_extra_2_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_extra_2_length_allowance" name="body_material_1_extra_2_length_allowance" value="<?php echo $body_material_1_extra_2_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_extra_2_length_total" name="body_material_1_extra_2_length_total" value="<?php echo $body_material_1_extra_2_length_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_2_extra_2_length" name="body_material_2_extra_2_length" value="<?php echo $body_material_2_extra_2_length ?>" ></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_2_extra_2_length_allowance" name="body_material_2_extra_2_length_allowance" value="<?php echo $body_material_2_extra_2_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_2_extra_2_length_total" name="body_material_2_extra_2_length_total" value="<?php echo $body_material_2_extra_2_length_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_3_extra_2_length" name="body_material_3_extra_2_length" value="<?php echo $body_material_3_extra_2_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_3_extra_2_length_allowance" name="body_material_3_extra_2_length_allowance" value="<?php echo $body_material_3_extra_2_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_3_extra_2_length_total" name="body_material_3_extra_2_length_total" value="<?php echo $body_material_3_extra_2_length_total ?>" readonly="readonly"></td>

                            </tr>
                            <tr>
                                <td>Width</td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_extra_2_width" name="body_material_1_extra_2_width" value="<?php echo $body_material_1_extra_2_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_extra_2_width_allowance" name="body_material_1_extra_2_width_allowance" value="<?php echo $body_material_1_extra_2_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_extra_2_width_total" name="body_material_1_extra_2_width_total" value="<?php echo $body_material_1_extra_2_width_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_2_extra_2_width" name="body_material_2_extra_2_width" value="<?php echo $body_material_2_extra_2_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_2_extra_2_width_allowance" name="body_material_2_extra_2_width_allowance" value="<?php echo $body_material_2_extra_2_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_2_extra_2_width_total" name="body_material_2_extra_2_width_total" value="<?php echo $body_material_2_extra_2_width_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_3_extra_2_width" name="body_material_3_extra_2_width" value="<?php echo $body_material_3_extra_2_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_3_extra_2_width_allowance" name="body_material_3_extra_2_width_allowance" value="<?php echo $body_material_3_extra_2_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_3_extra_2_width_total" name="body_material_3_extra_2_width_total" value="<?php echo $body_material_3_extra_2_width_total ?>"readonly="readonly"></td>

                            </tr>
                            <tr>
                                <th rowspan="2"><input type="text" class="form-control woven-costing" id="body_material_first_extra_3" name="body_material_first_extra_3" placeholder="Extra 3" value="<?php echo $body_material_first_extra_3 ?>"></th>
                                <td>Length</td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_extra_3_length" name="body_material_1_extra_3_length" value="<?php echo $body_material_1_extra_3_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_extra_3_length_allowance" name="body_material_1_extra_3_length_allowance" value="<?php echo $body_material_1_extra_3_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_extra_3_length_total" name="body_material_1_extra_3_length_total" value="<?php echo $body_material_1_extra_3_length_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_2_extra_3_length" name="body_material_2_extra_3_length" value="<?php echo $body_material_2_extra_3_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_2_extra_3_length_allowance" name="body_material_2_extra_3_length_allowance" value="<?php echo $body_material_2_extra_3_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_2_extra_3_length_total" name="body_material_2_extra_3_length_total" value="<?php echo $body_material_2_extra_3_length_total ?>"readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_3_extra_3_length" name="body_material_3_extra_3_length" value="<?php echo $body_material_3_extra_3_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_3_extra_3_length_allowance" name="body_material_3_extra_3_length_allowance" value="<?php echo $body_material_3_extra_3_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_3_extra_3_length_total" name="body_material_3_extra_3_length_total" value="<?php echo $body_material_3_extra_3_length_total ?>" readonly="readonly"></td>

                            </tr>
                            <tr>
                                <td>Width</td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_extra_3_width" name="body_material_1_extra_3_width" value="<?php echo $body_material_1_extra_3_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_extra_3_width_allowance" name="body_material_1_extra_3_width_allowance" value="<?php echo $body_material_1_extra_3_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_1_extra_3_width_total" name="body_material_1_extra_3_width_total" value="<?php echo $body_material_1_extra_3_width_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_2_extra_3_width" name="body_material_2_extra_3_width" value="<?php echo $body_material_2_extra_3_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_2_extra_3_width_allowance" name="body_material_2_extra_3_width_allowance" value="<?php echo $body_material_2_extra_3_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_2_extra_3_width_total" name="body_material_2_extra_3_width_total" value="<?php echo $body_material_2_extra_3_width_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_3_extra_3_width" name="body_material_3_extra_3_width" value="<?php echo $body_material_3_extra_3_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_3_extra_3_width_allowance" name="body_material_3_extra_3_width_allowance" value="<?php echo $body_material_3_extra_3_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_3_extra_3_width_total" name="body_material_3_extra_3_width_total" value="<?php echo $body_material_3_extra_3_width_total ?>" readonly="readonly"></td>
                            </tr>


                        </table>

                        <table style="width:100%" class="table table-bordered woven-table">
                            <tr>
                                <th></th>
                                <td></td>
                                <td colspan="3"><span class="body_material_4_name_text"></span></td>
                                <td colspan="3"><span class="body_material_5_name_text"></span></td>
                                <td colspan="3"><span class="body_material_6_name_text"></span></td>
                            </tr>
                            <tr>
                                <th colspan="2">Dimension:</th>
                                <td>Actual</td>
                                <td>Allowance</td>
                                <td>Total</td>
                                <td>Actual</td>
                                <td>Allowance</td>
                                <td>Total</td>
                                <td>Actual</td>
                                <td>Allowance</td>
                                <td>Total</td>
                            </tr>

                            <tr>
                                <th rowspan="2">Front</th>
                                <td>Length</td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_front_length" name="body_material_4_front_length" value="<?php echo $body_material_4_front_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_front_length_allowance" name="body_material_4_front_length_allowance" value="<?php echo $body_material_4_front_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_front_length_total" name="body_material_4_front_length_total" value="<?php echo $body_material_4_front_length_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_5_front_length" name="body_material_5_front_length" value="<?php echo $body_material_5_front_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_5_front_length_allowance" name="body_material_5_front_length_allowance" value="<?php echo $body_material_5_front_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_5_front_length_total" name="body_material_5_front_length_total" value="<?php echo $body_material_5_front_length_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_6_front_length" name="body_material_6_front_length" value="<?php echo $body_material_6_front_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_6_front_length_allowance" name="body_material_6_front_length_allowance" value="<?php echo $body_material_6_front_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_6_front_length_total" name="body_material_6_front_length_total" value="<?php echo $body_material_6_front_length_total ?>" readonly="readonly"></td>
                            </tr>
                            <tr>
                                <td>Width</td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_front_width" name="body_material_4_front_width" value="<?php echo $body_material_4_front_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_front_width_allowance" name="body_material_4_front_width_allowance" value="<?php echo $body_material_4_front_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_front_width_total" name="body_material_4_front_width_total" value="<?php echo $body_material_4_front_width_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_5_front_width" name="body_material_5_front_width" value="<?php echo $body_material_5_front_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_5_front_width_allowance" name="body_material_5_front_width_allowance" value="<?php echo $body_material_5_front_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_5_front_width_total" name="body_material_5_front_width_total" value="<?php echo $body_material_5_front_width_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_6_front_width" name="body_material_6_front_width" value="<?php echo $body_material_6_front_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_6_front_width_allowance" name="body_material_6_front_width_allowance" value="<?php echo $body_material_6_front_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_6_front_width_total" name="body_material_6_front_width_total" value="<?php echo $body_material_6_front_width_total ?>" readonly="readonly"></td>
                            </tr>
                            <tr>
                                <th rowspan="2">Back</th>
                                <td>Length</td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_back_length" name="body_material_4_back_length" value="<?php echo $body_material_4_back_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_back_length_allowance" name="body_material_4_back_length_allowance" value="<?php echo $body_material_4_back_length_allowance ?>" ></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_back_length_total" name="body_material_4_back_length_total" value="<?php echo $body_material_4_back_length_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_5_back_length" name="body_material_5_back_length" value="<?php echo $body_material_5_back_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_5_back_length_allowance" name="body_material_5_back_length_allowance" value="<?php echo $body_material_5_back_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_5_back_length_total" name="body_material_5_back_length_total" value="<?php echo $body_material_5_back_length_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_6_back_length" name="body_material_6_back_length" value="<?php echo $body_material_6_back_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_6_back_length_allowance" name="body_material_6_back_length_allowance" value="<?php echo $body_material_6_back_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_6_back_length_total" name="body_material_6_back_length_total" value="<?php echo $body_material_6_back_length_total ?>"readonly="readonly"></td>
                            </tr>
                            <tr>
                                <td>Width</td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_back_width" name="body_material_4_back_width" value="<?php echo $body_material_4_back_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_back_width_allowance" name="body_material_4_back_width_allowance" value="<?php echo $body_material_4_back_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_back_width_total" name="body_material_4_back_width_total" value="<?php echo $body_material_4_back_width_total ?>"readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_5_back_width" name="body_material_5_back_width" value="<?php echo $body_material_5_back_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_5_back_width_allowance" name="body_material_5_back_width_allowance" value="<?php echo $body_material_5_back_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_5_back_width_total" name="body_material_5_back_width_total" value="<?php echo $body_material_5_back_width_total ?>"readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_6_back_width" name="body_material_6_back_width" value="<?php echo $body_material_6_back_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_6_back_width_allowance" name="body_material_6_back_width_allowance" value="<?php echo $body_material_6_back_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_6_back_width_total" name="body_material_6_back_width_total" value="<?php echo $body_material_6_back_width_total ?>"readonly="readonly"></td>
                            </tr>
                            <tr>
                                <th rowspan="2">Top</th>
                                <td>Length</td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_top_length" name="body_material_4_top_length" value="<?php echo $body_material_4_top_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_top_length_allowance" name="body_material_4_top_length_allowance" value="<?php echo $body_material_4_top_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_top_length_total" name="body_material_4_top_length_total" value="<?php echo $body_material_4_top_length_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_5_top_length" name="body_material_5_top_length" value="<?php echo $body_material_5_top_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_5_top_length_allowance" name="body_material_5_top_length_allowance" value="<?php echo $body_material_5_top_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_5_top_length_total" name="body_material_5_top_length_total" value="<?php echo $body_material_5_top_length_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_6_top_length" name="body_material_6_top_length" value="<?php echo $body_material_6_top_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_6_top_length_allowance" name="body_material_6_top_length_allowance" value="<?php echo $body_material_6_top_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_6_top_length_total" name="body_material_6_top_length_total" value="<?php echo $body_material_6_top_length_total ?>" readonly="readonly"></td>
                            </tr>
                            <tr>
                                <td>Width</td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_top_width" name="body_material_4_top_width" value="<?php echo $body_material_4_top_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_top_width_allowance" name="body_material_4_top_width_allowance" value="<?php echo $body_material_4_top_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_top_width_total" name="body_material_4_top_width_total" value="<?php echo $body_material_4_top_width_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_5_top_width" name="body_material_5_top_width" value="<?php echo $body_material_5_top_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_5_top_width_allowance" name="body_material_5_top_width_allowance" value="<?php echo $body_material_5_top_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_5_top_width_total" name="body_material_5_top_width_total" value="<?php echo $body_material_5_top_width_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_6_top_width" name="body_material_6_top_width" value="<?php echo $body_material_6_top_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_6_top_width_allowance" name="body_material_6_top_width_allowance" value="<?php echo $body_material_6_top_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_6_top_width_total" name="body_material_6_top_width_total" value="<?php echo $body_material_6_top_width_total ?>" readonly="readonly"></td>
                            </tr>
                            <tr>
                                <th rowspan="2">Bottom</th>
                                <td>Length</td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_bottom_length" name="body_material_4_bottom_length" value="<?php echo $body_material_4_bottom_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_bottom_length_allowance" name="body_material_4_bottom_length_allowance" value="<?php echo $body_material_4_bottom_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_bottom_length_total" name="body_material_4_bottom_length_total" value="<?php echo $body_material_4_bottom_length_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_5_bottom_length" name="body_material_5_bottom_length" value="<?php echo $body_material_5_bottom_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_5_bottom_length_allowance" name="body_material_5_bottom_length_allowance" value="<?php echo $body_material_5_bottom_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_5_bottom_length_total" name="body_material_5_bottom_length_total" value="<?php echo $body_material_5_bottom_length_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_6_bottom_length" name="body_material_6_bottom_length" value="<?php echo $body_material_6_bottom_length ?>" ></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_6_bottom_length_allowance" name="body_material_6_bottom_length_allowance" value="<?php echo $body_material_6_bottom_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_6_bottom_length_total" name="body_material_6_bottom_length_total" value="<?php echo $body_material_6_bottom_length_total ?>" readonly="readonly"></td>
                            </tr>
                            <tr>
                                <td>Width</td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_bottom_width" name="body_material_4_bottom_width" value="<?php echo $body_material_4_bottom_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_bottom_width_allowance" name="body_material_4_bottom_width_allowance" value="<?php echo $body_material_4_bottom_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_bottom_width_total" name="body_material_4_bottom_width_total" value="<?php echo $body_material_4_bottom_width_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_5_bottom_width" name="body_material_5_bottom_width" value="<?php echo $body_material_5_bottom_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_5_bottom_width_allowance" name="body_material_5_bottom_width_allowance" value="<?php echo $body_material_5_bottom_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_5_bottom_width_total" name="body_material_5_bottom_width_total" value="<?php echo $body_material_5_bottom_width_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_6_bottom_width" name="body_material_6_bottom_width" value="<?php echo $body_material_6_bottom_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_6_bottom_width_allowance" name="body_material_6_bottom_width_allowance" value="<?php echo $body_material_6_bottom_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_6_bottom_width_total" name="body_material_6_bottom_width_total" value="<?php echo $body_material_6_bottom_width_total ?>" readonly="readonly"></td>
                            </tr>
                            <tr>
                                <th rowspan="2">Left</th>
                                <td>Length</td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_left_length" name="body_material_4_left_length" value="<?php echo $body_material_4_left_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_left_length_allowance" name="body_material_4_left_length_allowance" value="<?php echo $body_material_4_left_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_left_length_total" name="body_material_4_left_length_total" value="<?php echo $body_material_4_left_length_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_5_left_length" name="body_material_5_left_length" value="<?php echo $body_material_5_left_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_5_left_length_allowance" name="body_material_5_left_length_allowance" value="<?php echo $body_material_5_left_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_5_left_length_total" name="body_material_5_left_length_total" value="<?php echo $body_material_5_left_length_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_6_left_length" name="body_material_6_left_length" value="<?php echo $body_material_6_left_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_6_left_length_allowance" name="body_material_6_left_length_allowance" value="<?php echo $body_material_6_left_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_6_left_length_total" name="body_material_6_left_length_total" value="<?php echo $body_material_6_left_length_total ?>" readonly="readonly"></td>
                            </tr>
                            <tr>
                                <td>Width</td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_left_width" name="body_material_4_left_width" value="<?php echo $body_material_4_left_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_left_width_allowance" name="body_material_4_left_width_allowance" value="<?php echo $body_material_4_left_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_left_width_total" name="body_material_4_left_width_total" value="<?php echo $body_material_4_left_width_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_5_left_width" name="body_material_5_left_width" value="<?php echo $body_material_5_left_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_5_left_width_allowance" name="body_material_5_left_width_allowance" value="<?php echo $body_material_5_left_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_5_left_width_total" name="body_material_5_left_width_total" value="<?php echo $body_material_5_left_width_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_6_left_width" name="body_material_6_left_width" value="<?php echo $body_material_6_left_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_6_left_width_allowance" name="body_material_6_left_width_allowance" value="<?php echo $body_material_6_left_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_6_left_width_total" name="body_material_6_left_width_total" value="<?php echo $body_material_6_left_width_total ?>" readonly="readonly"></td>
                            </tr>
                            <tr>
                                <th rowspan="2">Right</th>
                                <td>Length</td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_right_length" name="body_material_4_right_length" value="<?php echo $body_material_4_right_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_right_length_allowance" name="body_material_4_right_length_allowance" value="<?php echo $body_material_4_right_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_right_length_total" name="body_material_4_right_length_total" value="<?php echo $body_material_4_right_length_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_5_right_length" name="body_material_5_right_length" value="<?php echo $body_material_5_right_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_5_right_length_allowance" name="body_material_5_right_length_allowance" value="<?php echo $body_material_5_right_length_allowance ?>" ></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_5_right_length_total" name="body_material_5_right_length_total" value="<?php echo $body_material_5_right_length_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_6_right_length" name="body_material_6_right_length" value="<?php echo $body_material_6_right_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_6_right_length_allowance" name="body_material_6_right_length_allowance" value="<?php echo $body_material_6_right_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_6_right_length_total" name="body_material_6_right_length_total" value="<?php echo $body_material_6_right_length_total ?>" readonly="readonly"></td>
                            </tr>
                            <tr>
                                <td>Width</td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_right_width" name="body_material_4_right_width" value="<?php echo $body_material_4_right_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_right_width_allowance" name="body_material_4_right_width_allowance" value="<?php echo $body_material_4_right_width_allowance ?>" ></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_right_width_total" name="body_material_4_right_width_total" value="<?php echo $body_material_4_right_width_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_5_right_width" name="body_material_5_right_width" value="<?php echo $body_material_5_right_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_5_right_width_allowance" name="body_material_5_right_width_allowance" value="<?php echo $body_material_5_right_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_5_right_width_total" name="body_material_5_right_width_total" value="<?php echo $body_material_5_right_width_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_6_right_width" name="body_material_6_right_width" value="<?php echo $body_material_6_right_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_6_right_width_allowance" name="body_material_6_right_width_allowance" value="<?php echo $body_material_6_right_width_allowance ?>" ></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_6_right_width_total" name="body_material_6_right_width_total" value="<?php echo $body_material_6_right_width_total ?>" readonly="readonly"></td>
                            </tr>
                            <tr>
                                <th rowspan="2">Pocet</th>
                                <td>Length</td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_pocket_length" name="body_material_4_pocket_length" value="<?php echo $body_material_4_pocket_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_pocket_length_allowance" name="body_material_4_pocket_length_allowance" value="<?php echo $body_material_4_pocket_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_pocket_length_total" name="body_material_4_pocket_length_total" value="<?php echo $body_material_4_pocket_length_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_5_pocket_length" name="body_material_5_pocket_length" value="<?php echo $body_material_5_pocket_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_5_pocket_length_allowance" name="body_material_5_pocket_length_allowance" value="<?php echo $body_material_5_pocket_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_5_pocket_length_total" name="body_material_5_pocket_length_total" value="<?php echo $body_material_5_pocket_length_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_6_pocket_length" name="body_material_6_pocket_length" value="<?php echo $body_material_6_pocket_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_6_pocket_length_allowance" name="body_material_6_pocket_length_allowance" value="<?php echo $body_material_6_pocket_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_6_pocket_length_total" name="body_material_6_pocket_length_total" value="<?php echo $body_material_6_pocket_length_total ?>" readonly="readonly"></td>
                            </tr>
                            <tr>
                                <td>Width</td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_pocket_width" name="body_material_4_pocket_width" value="<?php echo $body_material_4_pocket_width ?>" ></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_pocket_width_allowance" name="body_material_4_pocket_width_allowance" value="<?php echo $body_material_4_pocket_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_pocket_width_total" name="body_material_4_pocket_width_total" value="<?php echo $body_material_4_pocket_width_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_5_pocket_width" name="body_material_5_pocket_width" value="<?php echo $body_material_5_pocket_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_5_pocket_width_allowance" name="body_material_5_pocket_width_allowance" value="<?php echo $body_material_5_pocket_width_allowance ?>" ></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_5_pocket_width_total" name="body_material_5_pocket_width_total" value="<?php echo $body_material_5_pocket_width_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_6_pocket_width" name="body_material_6_pocket_width" value="<?php echo $body_material_6_pocket_width ?>" ></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_6_pocket_width_allowance" name="body_material_6_pocket_width_allowance" value="<?php echo $body_material_6_pocket_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_6_pocket_width_total" name="body_material_6_pocket_width_total" value="<?php echo $body_material_6_pocket_width_total ?>" readonly="readonly"></td>
                            </tr>
                            <tr>
                                <th rowspan="2"><input type="text" class="form-control woven-costing" id="body_material_second_extra_1" name="body_material_second_extra_1" placeholder="Extra 1" value="<?php echo $body_material_second_extra_1 ?>"></th>
                                <td>Length</td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_extra_1_length" name="body_material_4_extra_1_length" value="<?php echo $body_material_4_extra_1_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_extra_1_length_allowance" name="body_material_4_extra_1_length_allowance" value="<?php echo $body_material_4_extra_1_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_extra_1_length_total" name="body_material_4_extra_1_length_total" value="<?php echo $body_material_4_extra_1_length_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_5_extra_1_length" name="body_material_5_extra_1_length" value="<?php echo $body_material_5_extra_1_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_5_extra_1_length_allowance" name="body_material_5_extra_1_length_allowance" value="<?php echo $body_material_5_extra_1_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_5_extra_1_length_total" name="body_material_5_extra_1_length_total" value="<?php echo $body_material_5_extra_1_length_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_6_extra_1_length" name="body_material_6_extra_1_length" value="<?php echo $body_material_6_extra_1_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_6_extra_1_length_allowance" name="body_material_6_extra_1_length_allowance" value="<?php echo $body_material_6_extra_1_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_6_extra_1_length_total" name="body_material_6_extra_1_length_total" value="<?php echo $body_material_6_extra_1_length_total ?>" readonly="readonly"></td>
                            </tr>
                            <tr>
                                <td>Width</td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_extra_1_width" name="body_material_4_extra_1_width" value="<?php echo $body_material_4_extra_1_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_extra_1_width_allowance" name="body_material_4_extra_1_width_allowance" value="<?php echo $body_material_4_extra_1_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_extra_1_width_total" name="body_material_4_extra_1_width_total" value="<?php echo $body_material_4_extra_1_width_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_5_extra_1_width" name="body_material_5_extra_1_width" value="<?php echo $body_material_5_extra_1_width ?>" ></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_5_extra_1_width_allowance" name="body_material_5_extra_1_width_allowance" value="<?php echo $body_material_5_extra_1_width_allowance ?>" ></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_5_extra_1_width_total" name="body_material_5_extra_1_width_total" value="<?php echo $body_material_5_extra_1_width_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_6_extra_1_width" name="body_material_6_extra_1_width" value="<?php echo $body_material_6_extra_1_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_6_extra_1_width_allowance" name="body_material_6_extra_1_width_allowance" value="<?php echo $body_material_6_extra_1_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_6_extra_1_width_total" name="body_material_6_pocket_width_total" value="<?php echo $body_material_6_pocket_width_total ?>" readonly="readonly"></td>
                            </tr>
                            <tr>
                                <th rowspan="2"><input type="text" class="form-control woven-costing" id="body_material_second_extra_2" name="body_material_second_extra_2" placeholder="Extra 2" value="<?php echo $body_material_second_extra_2 ?>"></th>
                                <td>Length</td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_extra_2_length" name="body_material_4_extra_2_length" value="<?php echo $body_material_4_extra_2_length ?>" ></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_extra_2_length_allowance" name="body_material_4_extra_2_length_allowance" value="<?php echo $body_material_4_extra_2_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_extra_2_length_total" name="body_material_4_extra_2_length_total" value="<?php echo $body_material_4_extra_2_length_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_5_extra_2_length" name="body_material_5_extra_2_length" value="<?php echo $body_material_5_extra_2_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_5_extra_2_length_allowance" name="body_material_5_extra_2_length_allowance" value="<?php echo $body_material_5_extra_2_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_5_extra_2_length_total" name="body_material_5_extra_2_length_total" value="<?php echo $body_material_5_extra_2_length_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_6_extra_2_length" name="body_material_6_extra_2_length" value="<?php echo $body_material_6_extra_2_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_6_extra_2_length_allowance" name="body_material_6_extra_2_length_allowance" value="<?php echo $body_material_6_extra_2_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_6_extra_2_length_total" name="body_material_6_extra_2_length_total" value="<?php echo $body_material_6_extra_2_length_total ?>" readonly="readonly"></td>

                            </tr>
                            <tr>
                                <td>Width</td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_extra_2_width" name="body_material_4_extra_2_width" value="<?php echo $body_material_4_extra_2_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_extra_2_width_allowance" name="body_material_4_extra_2_width_allowance" value="<?php echo $body_material_4_extra_2_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_extra_2_width_total" name="body_material_4_extra_2_width_total" value="<?php echo $body_material_4_extra_2_width_total ?>"readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_5_extra_2_width" name="body_material_5_extra_2_width" value="<?php echo $body_material_5_extra_2_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_5_extra_2_width_allowance" name="body_material_5_extra_2_width_allowance" value="<?php echo $body_material_5_extra_2_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_5_extra_2_width_total" name="body_material_5_extra_2_width_total" value="<?php echo $body_material_5_extra_2_width_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_6_extra_2_width" name="body_material_6_extra_2_width" value="<?php echo $body_material_6_extra_2_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_6_extra_2_width_allowance" name="body_material_6_extra_2_width_allowance" value="<?php echo $body_material_6_extra_2_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_6_extra_2_width_total" name="body_material_6_extra_2_width_total" value="<?php echo $body_material_6_extra_2_width_total ?>" readonly="readonly"></td>

                            </tr>
                            <tr>
                                <th rowspan="2"><input type="text" class="form-control woven-costing" id="body_material_second_extra_3" name="body_material_second_extra_3" placeholder="Extra 3" value="<?php echo $body_material_second_extra_3 ?>"></th>
                                <td>Length</td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_extra_3_length" name="body_material_4_extra_3_length" value="<?php echo $body_material_4_extra_3_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_extra_3_length_allowance" name="body_material_4_extra_3_length_allowance" value="<?php echo $body_material_4_extra_3_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_extra_3_length_total" name="body_material_4_extra_3_length_total" value="<?php echo $body_material_4_extra_3_length_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_5_extra_3_length" name="body_material_5_extra_3_length" value="<?php echo $body_material_5_extra_3_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_5_extra_3_length_allowance" name="body_material_5_extra_3_length_allowance" value="<?php echo $body_material_5_extra_3_length_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_5_extra_3_length_total" name="body_material_5_extra_3_length_total" value="<?php echo $body_material_5_extra_3_length_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_6_extra_3_length" name="body_material_6_extra_3_length" value="<?php echo $body_material_6_extra_3_length ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_6_extra_3_length_allowance" name="body_material_6_extra_3_length_allowance" value="<?php echo $body_material_6_extra_3_length_allowance ?>" ></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_6_extra_3_length_total" name="body_material_6_extra_3_length_total" value="<?php echo $body_material_6_extra_3_length_total ?>" readonly="readonly"></td>

                            </tr>
                            <tr>
                                <td>Width</td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_extra_3_width" name="body_material_4_extra_3_width" value="<?php echo $body_material_4_extra_3_width ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_extra_3_width_allowance" name="body_material_4_extra_3_width_allowance" value="<?php echo $body_material_4_extra_3_width_allowance ?>" ></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_4_extra_3_width_total" name="body_material_4_extra_3_width_total" value="<?php echo $body_material_4_extra_3_width_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_5_extra_3_width" name="body_material_5_extra_3_width" value="<?php echo $body_material_5_extra_3_width ?>" ></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_5_extra_3_width_allowance" name="body_material_5_extra_3_width_allowance" value="<?php echo $body_material_5_extra_3_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_5_extra_3_width_total" name="body_material_5_extra_3_width_total" value="<?php echo $body_material_5_extra_3_width_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control woven-costing" id="body_material_6_extra_3_width" name="body_material_6_extra_3_width" value="<?php echo $body_material_6_extra_3_width ?>" ></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_6_extra_3_width_allowance" name="body_material_6_extra_3_width_allowance" value="<?php echo $body_material_6_extra_3_width_allowance ?>"></td>
                                <td><input type="text" class="form-control woven-costing" id="body_material_6_extra_3_width_total" name="body_material_6_extra_3_width_total" value="<?php echo $body_material_6_extra_3_width_total?>" readonly="readonly"></td>
                            </tr>
                        </table>
                    </div>
                </article>
            </section>
        </div>
    </form>
    <!-- foreach end-->

</section><!-- /.content -->
