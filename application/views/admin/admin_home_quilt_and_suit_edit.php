<!-- Content Header (Page header) -->
<section class="content-header">
    <a class="btn btn-default btn-info" href="<?php echo base_url("quiltandsuit/quilt_and_suit_all"); ?>">Back</a>
    <h1>Update Quilt and Suit Costing</h1>
</section>

<!-- Main content -->
<section class="content">
    <!-- Form Start -->
    <form class="form-inline add-new-ppnw-form" role="form" action="<?=  base_url()?>quiltandsuit/update_quilt_and_suit_costing" method="post">
        <!-- Part1 Form Start -->
        <div class="row">
            <div class="part1">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="order_id">Order Id:</label>
                        <input type="text" class="form-control quilt-and-suit-costing" name="order_id" id="order_id" placeholder="Order ID" value="<?php echo $quilt_and_suit_id_name ?>" required readonly="readonly">
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
                            <input type="text" class="form-control quilt-and-suit-costing" name="order_date" id="order_date" value="<?php echo $quilt_and_suit_order_date ?>" placeholder="Date" required>
                        </div>
                    </div>

                    <div class="col-md-4 col-md-offset-1">
                        <div class="form-group">
                            <label for="order_company">Company:</label>
                            <input type="text" class="form-control quilt-and-suit-costing" name="order_company" id="order_company" value="<?php echo $quilt_and_suit_company_name ?>"placeholder="Company Name" required>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="order_item_name">Item Name:</label>
                            <input type="text" class="form-control quilt-and-suit-costing" name="order_item_name" id="order_item_name"  value="<?php echo $quilt_and_suit_item_name ?>" placeholder="Item Name" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="order_ref_no">Reference No.:</label>
                            <input type="text" class="form-control quilt-and-suit-costing" name="order_ref_no" id="order_ref_no" value="<?php echo $quilt_and_suit_ref_name ?>" placeholder="Reference No." required>
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
                                <input type="text" class="form-control quilt-and-suit-costing" id="order_total_material_inc_wastage" name="order_total_material_inc_wastage" value="<?php echo $quilt_and_suit_order_total_material_inc_wastage ?>" readonly="readonly">
                            </div>
                            <div class="form-group">
                                <label for="order_sewing">Sewing:</label>
                                <input type="text" class="form-control quilt-and-suit-costing" id="order_sewing" name="order_sewing" value="<?php echo $quilt_and_suit_order_sewing ?>">
                            </div>
                            <div class="form-group">
                                <label for="order_overheads">Overheads:</label>
                                <input type="text" class="form-control quilt-and-suit-costing" id="order_overheads" name="order_overheads" value="<?php echo $quilt_and_suit_order_overheads?>">
                            </div>
                        </article>

                        <article class="col-md-6 grand-total">
                            <h4>Total Material incl Wastage: <span id="final_material_cost"><?php echo $quilt_and_suit_order_total_material_inc_wastage ?></span></h4>

                            <h4>Total Overhead and Other Cost: <span id="total_overhead_and_other"><?php echo $quilt_and_suit_order_total_overhead_and_other_cost ?></span></h4>
                            <input type="hidden" class="form-control quilt-and-suit-costing" id="total_overhead_and_other_hidden" name="total_overhead_and_other_hidden">

                            <h4>Total Cost: <span id="total_cost"><?php echo $quilt_and_suit_total_cost ?></span></h4>
                            <input type="hidden" class="form-control quilt-and-suit-costing" id="total_cost_hidden" name="total_cost_hidden">

                            <h2><b>Price</b>: <span id="final_price"><?php echo $quilt_and_suit_total_price ?></span></h2>
                            <input type="hidden" class="form-control quilt-and-suit-costing" id="final_price_hidden" name="final_price_hidden">


                            <input type="hidden" name="quilt-and-suit-id" value="<?php echo $quilt_and_suit_order_id ?>">
                            <input type="hidden" name="dimension-id" value="<?php echo $dimension_id ?>">

                            <button class="btn btn-info" type="submit" name="updatequiltandsuit" value="updatequiltandsuit">Update</button>                                                                    <!--
                             <!--  <button class="btn btn-info" type="submit" name="submit">save</button>
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
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <h5>GSM PPNW:</h5>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group role-width">
                                    <input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_roll_1" name="body_material_1_roll_1" value="<?php echo $quilt_and_suit_body_material_1_roll_width ?>">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <h5>GSM Clear LDPE/PVC</h5>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group role-width">
                                    <input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_roll_2" name="body_material_2_roll_2" value="<?php echo $quilt_and_suit_body_material_2_roll_width ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>GSM Coloured LDPE/PVC</h5>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group role-width">
                                    <input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_roll_3" name="body_material_3_roll_3" value="<?php echo $quilt_and_suit_body_material_3_roll_width ?>">
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="order_transport" class="small-label"> Transport:</label>
                            <input type="text" class="form-control quilt-and-suit-costing" id="order_transport" name="order_transport" value="<?php echo $quilt_and_suit_order_transport ?>"> Tk/Truck
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="order_bank_document">Bank & Doc:</label>
                            <input type="text" class="form-control quilt-and-suit-costing" id="order_bank_document"  name="order_bank_document" value="<?php echo $quilt_and_suit_order_bank_doc_charge ?>">Tk/Shipment
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="order_quantity" class="medium-label">Order Qty:</label>
                            <input type="text" class="form-control quilt-and-suit-costing" id="order_quantity" name="order_quantity" value="<?php echo $quilt_and_suit_order_quantity ?>" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="order_wastage" class="small-label">Wastage:</label>
                            <input type="text" class="form-control quilt-and-suit-costing" id="order_wastage" name="order_wastage" value="<?php echo $quilt_and_suit_order_wastage ?>" required>
                        </div>

                        <br>

                        <div class="form-group">
                            <label for="order_margin" class="small-label">Margin:</label>
                            <input type="text" class="form-control quilt-and-suit-costing" id="order_margin" name="order_margin"  value="<?php echo $quilt_and_suit_order_margin ?>" required>
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="order_usd" class="small-label"> USD:</label>
                            <input type="text" class="form-control quilt-and-suit-costing" id="order_usd" name="order_usd"  value="<?php echo $quilt_and_suit_order_usd ?>" required>
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
                            <th>Cost/Kg</th>
                            <th>Consmption</th>
                            <th>Rate/SQM</th>
                            <th>Cost</th>
                        </tr>
                        </thead>

                        <tbody>
                        <tr class="success">
                            <td>GSM PPNW:</td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_cost" name="body_material_1_cost" value="<?php echo $quilt_and_suit_body_material_1_cost?>" ></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_consumption" name="body_material_1_consumption" value="<?php echo $quilt_and_suit_body_material_1_consumption ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_consumption_rate" name="body_material_1_consumption_rate" value="<?php echo $quilt_and_suit_body_material_1_rate ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_consumption_cost" name="body_material_1_consumption_cost" value="<?php echo $quilt_and_suit_body_material_1_total_cost ?>" readonly="readonly"></td>
                        </tr>
                        <tr class="success">
                            <td>GSM Clear LDPE/PVC</td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_cost" name="body_material_2_cost" value="<?php echo $quilt_and_suit_body_material_2_cost?>" ></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_consumption" name="body_material_2_consumption" value="<?php echo $quilt_and_suit_body_material_2_consumption ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_consumption_rate" name="body_material_2_consumption_rate" value="<?php echo $quilt_and_suit_body_material_2_rate ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_consumption_cost" name="body_material_2_consumption_cost" value="<?php echo $quilt_and_suit_body_material_2_total_cost ?>" readonly="readonly"></td>
                        </tr>
                        <tr class="success">
                            <td>GSM Coloured LDPE/PVC</td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_cost" name="body_material_3_cost" value="<?php echo $quilt_and_suit_body_material_3_cost?>"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_consumption" name="body_material_3_consumption" value="<?php echo $quilt_and_suit_body_material_3_consumption ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_consumption_rate" name="body_material_3_consumption_rate" value="<?php echo $quilt_and_suit_body_material_3_rate ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_consumption_cost" name="body_material_3_consumption_cost" value="<?php echo $quilt_and_suit_body_material_3_total_cost ?>" readonly="readonly"></td>
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
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="zipper_cost" name="zipper_cost" value="<?php echo $zipper_cost ?>"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="zipper_consumption" name="zipper_consumption" value="<?php echo $zipper_consumption ?>"  ></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="zipper_consumption_rate" name="zipper_consumption_rate" value="<?php echo $zipper_consumption_rate ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="zipper_consumption_cost" name="zipper_consumption_cost" value="<?php echo $zipper_consumption_cost ?>" readonly="readonly"></td>
                        </tr>
                        <tr class="danger">
                            <td>Webbing</td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="webbing_cost" name="webbing_cost" value="<?php echo $webbing_item_cost ?>"  ></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="webbing_consumption" name="webbing_consumption" value="<?php echo $webbing_item_consumption ?>" ></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="webbing_consumption_rate" name="webbing_consumption_rate" value="<?php echo $webbing_item_consumption_rate ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="webbing_consumption_cost" name="webbing_consumption_cost"  value="<?php echo $webbing_item_consumption_cost ?>" readonly="readonly"></td>
                        </tr>

                        <tr class="danger">
                            <td>Velcro</td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="velcro_cost" name="velcro_cost" value="<?php echo $velcro_item_cost ?>"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="velcro_consumption" name="velcro_consumption" value="<?php echo $velcro_item_consumption ?>" ></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="velcro_consumption_rate" name="velcro_consumption_rate" value="<?php echo $velcro_item_rate ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="velcro_consumption_cost" name="velcro_consumption_cost"  value="<?php echo $velcro_item_total_cost ?>" readonly="readonly"></td>
                        </tr>

                        <tr class="danger">
                            <td>Draw String</td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="draw_string_cost" name="draw_string_cost" value="<?php echo $draw_string_item_cost ?>"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="draw_string_consumption" name="draw_string_consumption" value="<?php echo $draw_string_item_consumption ?>"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="draw_string_consumption_rate" name="draw_string_consumption_rate" value="<?php echo $draw_string_item_consumption_rate ?>"readonly="readonly"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="draw_string_consumption_cost" name="draw_string_consumption_cost" value="<?php echo $draw_string_item_consumption_cost ?>" readonly="readonly"></td>
                        </tr>



                        <tr class="danger">
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="extra_trim_yard_extra_1" name="extra_trim_yard_extra_1_name"  value="<?php echo $trim_yard_extra_1_name ?>" placeholder="Extra 1"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="extra_trim_yard_1_cost" name="extra_trim_yard_1_cost" value="<?php echo $trim_yard_extra_1_item_cost ?>"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="extra_trim_yard_1_consumption" name="extra_trim_yard_1_consumption" value="<?php echo $trim_yard_extra_1_item_consumption ?>"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="extra_trim_yard_1_consumption_rate" name="extra_trim_yard_1_consumption_rate" readonly="readonly" value="<?php echo $trim_yard_extra_1_item_rate ?>" ></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="extra_trim_yard_1_consumption_cost" name="extra_trim_yard_1_consumption_cost" readonly="readonly" value="<?php echo $trim_yard_extra_1_item_total_cost ?>"></td>
                        </tr>

                        <tr class="danger">
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="extra_trim_yard_extra_2" name="extra_trim_yard_extra_2_name" value="<?php echo $trim_yard_extra_2_name ?>" placeholder="Extra 2"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="extra_trim_yard_2_cost" name="extra_trim_yard_2_cost" value="<?php echo $trim_yard_extra_2_item_cost ?>" ></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="extra_trim_yard_2_consumption" name="extra_trim_yard_2_consumption" value="<?php echo $trim_yard_extra_2_item_consumption ?>"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="extra_trim_yard_2_consumption_rate" name="extra_trim_yard_2_consumption_rate" value="<?php echo $trim_yard_extra_2_item_rate ?>"readonly="readonly"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="extra_trim_yard_2_consumption_cost" name="extra_trim_yard_2_consumption_cost" value="<?php echo $trim_yard_extra_2_item_total_cost ?>" readonly="readonly"></td>
                        </tr>

                        <tr class="danger">
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="extra_trim_yard_extra_3" name="extra_trim_yard_extra_3_name"  value="<?php echo $trim_yard_extra_3_name ?>" placeholder="Extra 3"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="extra_trim_yard_3_cost" name="extra_trim_yard_3_cost" value="<?php echo $trim_yard_extra_3_item_cost ?>"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="extra_trim_yard_3_consumption" name="extra_trim_yard_3_consumption" value="<?php echo $trim_yard_extra_3_item_consumption ?>"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="extra_trim_yard_3_consumption_rate" name="extra_trim_yard_3_consumption_rate" value="<?php echo $trim_yard_extra_3_item_rate ?>"  readonly="readonly"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="extra_trim_yard_3_consumption_cost" name="extra_trim_yard_3_consumption_cost" value="<?php echo $trim_yard_extra_3_item_total_cost ?>" readonly="readonly"></td>
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
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="puller_cost" name="puller_cost" value="<?php echo $puller_item_cost ?>"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="puller_consumption" name="puller_consumption" value="<?php echo $puller_item_consumption ?>"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="puller_consumption_rate" name="puller_consumption_rate" value="<?php echo $puller_item_rate ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="puller_consumption_cost" name="puller_consumption_cost" value="<?php echo $puller_item_total_cost ?>" readonly="readonly"></td>
                        </tr>

                        <tr class="info">
                            <td>Print</td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="print_cost" name="print_cost"  value="<?php echo $print_item_cost ?>"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="print_consumption" name="print_consumption" value="<?php echo $print_item_consumption ?>"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="print_consumption_rate" name="print_consumption_rate" value="<?php echo $print_item_rate ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="print_consumption_cost" name="print_consumption_cost" value="<?php echo $print_item_total_cost ?>" readonly="readonly"></td>
                        </tr>
                        <tr class="info">
                            <td>Eyelet</td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="eyelet_cost" name="eyelet_cost" value="<?php echo $eyelet_item_cost ?>"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="eyelet_consumption" name="eyelet_consumption" value="<?php echo $eyelet_item_consumption ?>"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="eyelet_consumption_rate" name="eyelet_consumption_rate" value="<?php echo $eyelet_item_rate ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="eyelet_consumption_cost" name="eyelet_consumption_cost" value="<?php echo $eyelet_item_total_cost ?>" readonly="readonly"></td>
                        </tr>

                        <tr class="info">
                            <td>Buckle</td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="buckle_cost" name="buckle_cost" value="<?php echo $buckle_item_cost ?>"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="buckle_consumption" name="buckle_consumption"  value="<?php echo $buckle_item_consumption ?>"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="buckle_consumption_rate" name="buckle_consumption_rate" value="<?php echo $buckle_item_rate ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="buckle_consumption_cost" name="buckle_consumption_cost" value="<?php echo $buckle_item_total_cost ?>" readonly="readonly"></td>
                        </tr>

                        <tr class="info">
                            <td>Snap Button</td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="snap_button_cost" name="snap_button_cost" value="<?php echo $snap_button_item_cost ?>"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="snap_button_consumption" name="snap_button_consumption" value="<?php echo $snap_button_item_consumption ?>"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="snap_button_consumption_rate" name="snap_button_consumption_rate"  value="<?php echo $snap_button_item_rate ?>"readonly="readonly"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="snap_button_consumption_cost" name="snap_button_consumption_cost" value="<?php echo $snap_button_item_total_cost ?>" readonly="readonly"></td>
                        </tr>

                        <tr class="info">
                            <td>Magnetic Button</td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="magnetic_button_cost" name="magnetic_button_cost"  value="<?php echo $magnetic_button_item_cost ?>"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="magnetic_button_consumption" name="magnetic_button_consumption" value="<?php echo $magnetic_button_item_consumption ?>"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="magnetic_button_consumption_rate" name="magnetic_button_consumption_rate" value="<?php echo $magnetic_button_item_rate ?>"readonly="readonly"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="magnetic_button_consumption_cost" name="magnetic_button_consumption_cost" value="<?php echo $magnetic_button_item_total_cost ?>" readonly="readonly"></td>
                        </tr>

                        <tr class="info">
                            <td>Bottom Base</td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="bottom_base_cost" name="bottom_base_cost" value="<?php echo $bottom_base_item_cost ?>"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="bottom_base_consumption" name="bottom_base_consumption" value="<?php echo $bottom_base_item_consumption ?>"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="bottom_base_consumption_rate" name="bottom_base_consumption_rate" value="<?php echo $bottom_base_item_rate ?>"  readonly="readonly"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="bottom_base_consumption_cost" name="bottom_base_consumption_cost" value="<?php echo $bottom_base_item_total_cost ?>" readonly="readonly"></td>
                        </tr>

                        <tr class="info">
                            <td>Thread</td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="thread_cost" name="thread_cost" value="<?php echo $thread_item_cost ?>"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="thread_consumption" name="thread_consumption" value="<?php echo $thread_item_consumption ?>"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="thread_consumption_rate" name="thread_consumption_rate" value="<?php echo $thread_item_rate ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="thread_consumption_cost" name="thread_consumption_cost" value="<?php echo $thread_item_total_cost ?>" readonly="readonly"></td>
                        </tr>

                        <tr class="info">
                            <td>Tag</td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="tag_cost" name="tag_cost" value="<?php echo $tag_item_cost ?>"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="tag_consumption" name="tag_consumption" value="<?php echo $tag_item_consumption ?>"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="tag_consumption_rate" name="tag_consumption_rate" value="<?php echo $tag_item_rate ?>"  readonly="readonly"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="tag_consumption_cost" name="tag_consumption_cost"  value="<?php echo $tag_item_total_cost ?>"  readonly="readonly"></td>
                        </tr>

                        <tr class="info">
                            <td>Label</td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="label_cost" name="label_cost"  value="<?php echo $label_item_cost ?>"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="label_consumption" name="label_consumption"  value="<?php echo $label_item_consumption ?>"  ></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="label_consumption_rate" name="label_consumption_rate" value="<?php echo $label_item_rate ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="label_consumption_cost" name="label_consumption_cost" value="<?php echo $label_item_total_cost ?>"  readonly="readonly"></td>
                        </tr>

                        <tr class="info">
                            <td>Packing</td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="packing_cost" value="<?php echo $packing_item_cost ?>"  name="packing_cost" ></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="packing_consumption" name="packing_consumption" value="<?php echo $packing_item_consumption ?>"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="packing_consumption_rate" name="packing_consumption_rate"  value="<?php echo $packing_item_rate ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="packing_consumption_cost" name="packing_consumption_cost" value="<?php echo $packing_item_total_cost ?>" readonly="readonly"></td>
                        </tr>

                        <tr class="info">
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="extra_1_piece_name" placeholder="Extra 1" name="extra_1_piece_name" value="<?php echo $extra_1_name ?>"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="extra_1_piece_cost" name="extra_1_piece_cost" value="<?php echo $extra_1_item_cost ?>"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="extra_1_piece_consumption" name="extra_1_piece_consumption" value="<?php echo $extra_1_item_consumption ?>"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="extra_1_piece_consumption_rate" name="extra_1_piece_consumption_rate" value="<?php echo $extra_1_item_rate ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="extra_1_piece_consumption_cost" name="extra_1_piece_consumption_cost" value="<?php echo $extra_1_item_total_cost ?>" readonly="readonly"></td>
                        </tr>

                        <tr class="info">
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="extra_2_piece_name" placeholder="Extra 2" name="extra_2_piece_name" value="<?php echo $extra_2_name ?>"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="extra_2_piece_cost" name="extra_2_piece_cost" value="<?php echo $extra_2_item_cost ?>"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="extra_2_piece_consumption" name="extra_2_piece_consumption" value="<?php echo $extra_2_item_consumption ?>"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="extra_2_piece_consumption_rate" name="extra_2_piece_consumption_rate" value="<?php echo $extra_2_item_rate ?>" readonly="readonly"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="extra_2_piece_consumption_cost" name="extra_2_piece_consumption_cost" value="<?php echo $extra_2_item_total_cost ?>" readonly="readonly"></td>
                        </tr>

                        <tr class="info">
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="extra_3_piece_name" placeholder="Extra 3" name="extra_3_piece_name" value="<?php echo $extra_3_name ?>"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="extra_3_piece_cost" name="extra_3_piece_cost" value="<?php echo $extra_3_item_cost ?>"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="extra_3_piece_consumption" name="extra_3_piece_consumption" value="<?php echo $extra_3_item_consumption ?>"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="extra_3_piece_consumption_rate" name="extra_3_piece_consumption_rate"  value="<?php echo $extra_3_item_rate ?>"  readonly="readonly"></td>
                            <td><input type="text" class="form-control quilt-and-suit-costing" id="extra_3_piece_consumption_cost" name="extra_3_piece_consumption_cost" value="<?php echo $extra_3_item_total_cost ?>" readonly="readonly"></td>
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
                                <td colspan="3"><span class="body_material_1_name_text">GSM PPNW</span></td>
                                <td colspan="3"><span class="body_material_2_name_text">GSM Clear LDPE/PVC</span></td>
                                <td colspan="3"><span class="body_material_3_name_text">GSM Coloured LDPE/PVC</span></td>
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
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_front_length" name="body_material_1_front_length" value="<?php echo $body_material_1_front_length ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_front_length_allowance" name="body_material_1_front_length_allowance"  value="<?php echo $body_material_1_front_length_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_front_length_total" name="body_material_1_front_length_total" readonly="readonly" value="<?php echo $body_material_1_front_length_total ?>" ></td>

                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_front_length" name="body_material_2_front_length" value="<?php echo $body_material_2_front_length ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_front_length_allowance" name="body_material_2_front_length_allowance"  value="<?php echo $body_material_2_front_length_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_front_length_total" name="body_material_2_front_length_total" readonly="readonly" value="<?php echo $body_material_2_front_length_total ?>"></td>

                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_front_length" name="body_material_3_front_length" value="<?php echo $body_material_3_front_length ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_front_length_allowance" name="body_material_3_front_length_allowance" value="<?php echo $body_material_3_front_length_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_front_length_total" name="body_material_3_front_length_total"  readonly="readonly" value="<?php echo $body_material_3_front_length_total ?>"></td>
                            </tr>
                            <tr>
                                <td>Width</td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_front_width" name="body_material_1_front_width" value="<?php echo $body_material_1_front_width ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_front_width_allowance" name="body_material_1_front_width_allowance" value="<?php echo $body_material_1_front_width_allowance ?>" ></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_front_width_total" name="body_material_1_front_width_total" readonly="readonly" value="<?php echo $body_material_1_front_width_total ?>" ></td>

                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_front_width" name="body_material_2_front_width"  value="<?php echo $body_material_2_front_width ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_front_width_allowance" name="body_material_2_front_width_allowance" value="<?php echo $body_material_2_front_width_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing"  id="body_material_2_front_width_total" name="body_material_2_front_width_total" readonly="readonly" value="<?php echo $body_material_2_front_width_total ?>"></td>

                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_front_width" name="body_material_3_front_width" value="<?php echo $body_material_3_front_width ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_front_width_allowance" name="body_material_3_front_width_allowance" value="<?php echo $body_material_3_front_width_allowance ?>" ></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_front_width_total" name="body_material_3_front_width_total" readonly="readonly" value="<?php echo $body_material_3_front_width_total ?>"></td>
                            </tr>
                            <tr>
                                <th rowspan="2">Back</th>
                                <td>Length</td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_back_length" name="body_material_1_back_length" value="<?php echo $body_material_1_back_length ?>" ></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_back_length_allowance" name="body_material_1_back_length_allowance" value="<?php echo $body_material_1_back_length_allowance ?>" ></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_back_length_total" name="body_material_1_back_length_total" readonly="readonly" value="<?php echo $body_material_1_back_length_total ?>"></td>

                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_back_length" name="body_material_2_back_length" value="<?php echo $body_material_2_back_length ?>" ></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_back_length_allowance" name="body_material_2_back_length_allowance" value="<?php echo $body_material_2_back_length_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_back_length_total" name="body_material_2_back_length_total" readonly="readonly" value="<?php echo $body_material_2_back_length_total ?>"></td>

                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_back_length" name="body_material_3_back_length" value="<?php echo $body_material_3_back_length ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_back_length_allowance" name="body_material_3_back_length_allowance" value="<?php echo $body_material_3_back_length_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_back_length_total" name="body_material_3_back_length_total" readonly="readonly" value="<?php echo $body_material_3_back_length_total ?>"></td>
                            </tr>
                            <tr>
                                <td>Width</td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_back_width" name="body_material_1_back_width" value="<?php echo $body_material_1_back_width ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_back_width_allowance" name="body_material_1_back_width_allowance" value="<?php echo $body_material_1_back_width_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_back_width_total" name="body_material_1_back_width_total" readonly="readonly" value="<?php echo $body_material_1_back_width_total ?>"></td>

                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_back_width" name="body_material_2_back_width" value="<?php echo $body_material_2_back_width ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_back_width_allowance" name="body_material_2_back_width_allowance" value="<?php echo $body_material_2_back_width_allowance ?>" ></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_back_width_total" name="body_material_2_back_width_total" readonly="readonly" value="<?php echo $body_material_2_back_width_total ?>"></td>

                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_back_width" name="body_material_3_back_width" value="<?php echo $body_material_3_back_width ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_back_width_allowance" name="body_material_3_back_width_allowance" value="<?php echo $body_material_3_back_width_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_back_width_total" name="body_material_3_back_width_total" readonly="readonly" value="<?php echo $body_material_3_back_width_total ?>" ></td>
                            </tr>
                            <tr>
                                <th rowspan="2">Top</th>
                                <td>Length</td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_top_length" name="body_material_1_top_length" value="<?php echo $body_material_1_top_length ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_top_length_allowance" name="body_material_1_top_length_allowance" value="<?php echo $body_material_1_top_length_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_top_length_total" name="body_material_1_top_length_total" readonly="readonly" value="<?php echo $body_material_1_top_length_total ?>" ></td>

                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_top_length" name="body_material_2_top_length" value="<?php echo $body_material_2_top_length ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_top_length_allowance" name="body_material_2_top_length_allowance" value="<?php echo $body_material_2_top_length_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_top_length_total" name="body_material_2_top_length_total" readonly="readonly"  value="<?php echo $body_material_2_top_length_total ?>" ></td>

                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_top_length" name="body_material_3_top_length" value="<?php echo $body_material_3_top_length ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_top_length_allowance" name="body_material_3_top_length_allowance" value="<?php echo $body_material_3_top_length_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_top_length_total" name="body_material_3_top_length_total" readonly="readonly" value="<?php echo $body_material_3_top_length_total ?>"></td>
                            </tr>
                            <tr>
                                <td>Width</td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_top_width" name="body_material_1_top_width" value="<?php echo $body_material_1_top_width ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_top_width_allowance" name="body_material_1_top_width_allowance" value="<?php echo $body_material_1_top_width_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_top_width_total" name="body_material_1_top_width_total" readonly="readonly"  value="<?php echo $body_material_1_top_width_total ?>" ></td>

                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_top_width" name="body_material_2_top_width" value="<?php echo $body_material_2_top_width ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_top_width_allowance" name="body_material_2_top_width_allowance" value="<?php echo $body_material_2_top_width_allowance ?>" ></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_top_width_total" name="body_material_2_top_width_total" readonly="readonly" value="<?php echo $body_material_2_top_width_total ?>"> </td>

                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_top_width" name="body_material_3_top_width" value="<?php echo $body_material_3_top_width ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_top_width_allowance" name="body_material_3_top_width_allowance" value="<?php echo $body_material_3_top_width_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_top_width_total" name="body_material_3_top_width_total" readonly="readonly" value="<?php echo $body_material_3_top_width_total ?>" ></td>
                            </tr>
                            <tr>
                                <th rowspan="2">Bottom</th>
                                <td>Length</td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_bottom_length" name="body_material_1_bottom_length" value="<?php echo $body_material_1_bottom_length ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_bottom_length_allowance" name="body_material_1_bottom_length_allowance" value="<?php echo $body_material_1_bottom_length_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_bottom_length_total" name="body_material_1_bottom_length_total" readonly="readonly" value="<?php echo $body_material_1_bottom_length_total ?>"></td>

                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_bottom_length" name="body_material_2_bottom_length" value="<?php echo $body_material_2_bottom_length ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_bottom_length_allowance" name="body_material_2_bottom_length_allowance" value="<?php echo $body_material_2_bottom_length_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_bottom_length_total" name="body_material_2_bottom_length_total" readonly="readonly" value="<?php echo $body_material_2_bottom_length_total ?>"></td>

                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_bottom_length" name="body_material_3_bottom_length" value="<?php echo $body_material_3_bottom_length ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_bottom_length_allowance" name="body_material_3_bottom_length_allowance" value="<?php echo $body_material_3_bottom_length_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_bottom_length_total" name="body_material_3_bottom_length_total" readonly="readonly" value="<?php echo $body_material_3_bottom_length_total ?>"></td>
                            </tr>
                            <tr>
                                <td>Width</td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_bottom_width" name="body_material_1_bottom_width" value="<?php echo $body_material_1_bottom_width ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_bottom_width_allowance" name="body_material_1_bottom_width_allowance" value="<?php echo $body_material_1_bottom_width_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_bottom_width_total" name="body_material_1_bottom_width_total" readonly="readonly" value="<?php echo $body_material_1_bottom_width_total ?>"></td>

                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_bottom_width" name="body_material_2_bottom_width" value="<?php echo $body_material_2_bottom_width ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_bottom_width_allowance" name="body_material_2_bottom_width_allowance" value="<?php echo $body_material_2_bottom_width_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_bottom_width_total" name="body_material_2_bottom_width_total" readonly="readonly" value="<?php echo $body_material_2_bottom_width_total ?>" ></td>

                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_bottom_width" name="body_material_3_bottom_width" value="<?php echo $body_material_3_bottom_width ?>" ></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_bottom_width_allowance" name="body_material_3_bottom_width_allowance" value="<?php echo $body_material_3_bottom_width_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_bottom_width_total" name="body_material_3_bottom_width_total" readonly="readonly" value="<?php echo $body_material_3_bottom_width_total ?>"></td>
                            </tr>
                            <tr>
                                <th rowspan="2">Left</th>
                                <td>Length</td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_left_length" name="body_material_1_left_length" value="<?php echo $body_material_1_left_length ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_left_length_allowance" name="body_material_1_left_length_allowance" value="<?php echo $body_material_1_left_length_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_left_length_total" name="body_material_1_left_length_total" readonly="readonly" value="<?php echo $body_material_1_left_length_total ?>" ></td>

                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_left_length" name="body_material_2_left_length" value="<?php echo $body_material_2_left_length ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_left_length_allowance" name="body_material_2_left_length_allowance" value="<?php echo $body_material_2_left_length_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_left_length_total" name="body_material_2_left_length_total" readonly="readonly" value="<?php echo $body_material_2_left_length_total ?>"></td>

                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_left_length" name="body_material_3_left_length" value="<?php echo $body_material_3_left_length ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_left_length_allowance" name="body_material_3_left_length_allowance" value="<?php echo $body_material_3_left_length_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_left_length_total" name="body_material_3_left_length_total" readonly="readonly" value="<?php echo $body_material_3_left_length_total ?>" ></td>
                            </tr>
                            <tr>
                                <td>Width</td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_left_width" name="body_material_1_left_width"  value="<?php echo $body_material_1_left_width ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_left_width_allowance" name="body_material_1_left_width_allowance" value="<?php echo $body_material_1_left_width_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_left_width_total" name="body_material_1_left_width_total" readonly="readonly" value="<?php echo $body_material_1_left_width_total ?>" ></td>

                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_left_width" name="body_material_2_left_width" value="<?php echo $body_material_2_left_width ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_left_width_allowance" name="body_material_2_left_width_allowance" value="<?php echo $body_material_2_left_width_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_left_width_total" name="body_material_2_left_width_total" readonly="readonly" value="<?php echo $body_material_2_left_width_total ?>" ></td>

                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_left_width" name="body_material_3_left_width" value="<?php echo $body_material_3_left_width ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_left_width_allowance" name="body_material_3_left_width_allowance" value="<?php echo $body_material_3_left_width_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_left_width_total" name="body_material_3_left_width_total" readonly="readonly"  value="<?php echo $body_material_3_left_width_total ?>"k></td>
                            </tr>
                            <tr>
                                <th rowspan="2">Right</th>
                                <td>Length</td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_right_length" name="body_material_1_right_length"  value="<?php echo $body_material_2_left_width_total ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_right_length_allowance" name="body_material_1_right_length_allowance" value="<?php echo $body_material_1_right_length_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_right_length_total" name="body_material_1_right_length_total" readonly="readonly" value="<?php echo $body_material_1_right_length_total ?>" ></td>

                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_right_length" name="body_material_2_right_length" value="<?php echo $body_material_2_right_length ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_right_length_allowance" name="body_material_2_right_length_allowance" value="<?php echo $body_material_2_right_length_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_right_length_total" name="body_material_2_right_length_total" readonly="readonly" value="<?php echo $body_material_2_right_length_total ?>"></td>

                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_right_length" name="body_material_3_right_length" value="<?php echo $body_material_3_right_length ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_right_length_allowance" name="body_material_3_right_length_allowance" value="<?php echo $body_material_3_right_length_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_right_length_total" name="body_material_3_right_length_total" readonly="readonly" value="<?php echo $body_material_3_right_length_total ?>"></td>
                            </tr>
                            <tr>
                                <td>Width</td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_right_width" name="body_material_1_right_width" value="<?php echo $body_material_1_right_width ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_right_width_allowance" name="body_material_1_right_width_allowance" value="<?php echo $body_material_1_right_width_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_right_width_total" name="body_material_1_right_width_total" readonly="readonly" value="<?php echo $body_material_1_right_width_total ?>"></td>

                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_right_width" name="body_material_2_right_width"  value="<?php echo $body_material_2_right_width ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_right_width_allowance" name="body_material_2_right_width_allowance" value="<?php echo $body_material_2_right_width_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_right_width_total" name="body_material_2_right_width_total" readonly="readonly" value="<?php echo $body_material_2_right_width_total ?>"></td>

                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_right_width" name="body_material_3_right_width" value="<?php echo $body_material_3_right_width ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_right_width_allowance" name="body_material_3_right_width_allowance"  value="<?php echo $body_material_3_right_width_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_right_width_total" name="body_material_3_right_width_total" readonly="readonly" value="<?php echo $body_material_3_right_width_total ?>"></td>
                            </tr>
                            <tr>
                                <th rowspan="2">Handle</th>
                                <td>Length</td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_handle_length" name="body_material_1_handle_length" value="<?php echo $body_material_1_handle_length ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_handle_length_allowance" name="body_material_1_handle_length_allowance" value="<?php echo $body_material_1_handle_length_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_handle_length_total" name="body_material_1_handle_length_total" readonly="readonly" value="<?php echo $body_material_1_handle_length_total ?>"></td>

                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_handle_length" name="body_material_2_handle_length" value="<?php echo $body_material_2_handle_length ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_handle_length_allowance" name="body_material_2_handle_length_allowance" value="<?php echo $body_material_2_handle_length_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_handle_length_total" name="body_material_2_handle_length_total" readonly="readonly" value="<?php echo $body_material_2_handle_length_total ?>" ></td>

                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_handle_length" name="body_material_3_handle_length" value="<?php echo $body_material_3_handle_length ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_handle_length_allowance" name="body_material_3_handle_length_allowance" value="<?php echo $body_material_3_handle_length_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_handle_length_total" name="body_material_3_handle_length_total" readonly="readonly" value="<?php echo $body_material_3_handle_length_total ?>"></td>
                            </tr>
                            <tr>
                                <td>Width</td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_handle_width" name="body_material_1_handle_width" value="<?php echo $body_material_1_handle_width ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_handle_width_allowance" name="body_material_1_handle_width_allowance" value="<?php echo $body_material_1_handle_width_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_handle_width_total" name="body_material_1_handle_width_total" readonly="readonly" value="<?php echo $body_material_1_handle_width_total ?>" ></td>

                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_handle_width" name="body_material_2_handle_width" value="<?php echo $body_material_2_handle_width ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_handle_width_allowance" name="body_material_2_handle_width_allowance" value="<?php echo $body_material_2_handle_width_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_handle_width_total" name="body_material_2_handle_width_total" readonly="readonly" value="<?php echo $body_material_2_handle_width_total ?>" ></td>

                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_handle_width" name="body_material_3_handle_width" value="<?php echo $body_material_3_handle_width ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_handle_width_allowance" name="body_material_3_handle_width_allowance" value="<?php echo $body_material_3_handle_width_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_handle_width_total" name="body_material_3_handle_width_total" readonly="readonly" value="<?php echo $body_material_3_handle_width_total ?>"></td>
                            </tr>

                            <tr>
                                <th rowspan="2">Pocket</th>
                                <td>Length</td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_pocket_length" name="body_material_1_pocket_length" value="<?php echo $body_material_1_pocket_length ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_pocket_length_allowance" name="body_material_1_pocket_length_allowance" value="<?php echo $body_material_1_pocket_length_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_pocket_length_total" name="body_material_1_pocket_length_total" readonly="readonly" value="<?php echo $body_material_1_pocket_length_total ?>" ></td>

                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_pocket_length" name="body_material_2_pocket_length" value="<?php echo $body_material_2_pocket_length ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_pocket_length_allowance" name="body_material_2_pocket_length_allowance" value="<?php echo $body_material_2_pocket_length_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_pocket_length_total" name="body_material_2_pocket_length_total" readonly="readonly" value="<?php echo $body_material_2_pocket_length_total ?>"></td>

                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_pocket_length" name="body_material_3_pocket_length" value="<?php echo $body_material_3_pocket_length ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_pocket_length_allowance" name="body_material_3_pocket_length_allowance" value="<?php echo $body_material_3_pocket_length_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_pocket_length_total" name="body_material_3_pocket_length_total" readonly="readonly" value="<?php echo $body_material_3_pocket_length_total ?>"></td>
                            </tr>
                            <tr>
                                <td>Width</td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_pocket_width" name="body_material_1_pocket_width" value="<?php echo $body_material_1_pocket_width ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_pocket_width_allowance" name="body_material_1_pocket_width_allowance" value="<?php echo $body_material_1_pocket_width_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_pocket_width_total" name="body_material_1_pocket_width_total" readonly="readonly"  value="<?php echo $body_material_1_pocket_width_total ?>" ></td>

                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_pocket_width" name="body_material_2_pocket_width" value="<?php echo $body_material_2_pocket_width ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_pocket_width_allowance" name="body_material_2_pocket_width_allowance" value="<?php echo $body_material_2_pocket_width_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_pocket_width_total" name="body_material_2_pocket_width_total" readonly="readonly" value="<?php echo $body_material_2_pocket_width_total ?>"></td>

                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_pocket_width" name="body_material_3_pocket_width" value="<?php echo $body_material_3_pocket_width ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_pocket_width_allowance" name="body_material_3_pocket_width_allowance" value="<?php echo $body_material_3_pocket_width_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_pocket_width_total" name="body_material_3_pocket_width_total" readonly="readonly" value="<?php echo $body_material_3_pocket_width_total ?>" ></td>
                            </tr>

                            <tr>
                                <th rowspan="2">Piping</th>
                                <td>Length</td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_piping_length" name="body_material_1_piping_length" value="<?php echo $body_material_1_piping_length ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_piping_length_allowance" name="body_material_1_piping_length_allowance" value="<?php echo $body_material_1_piping_length_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_piping_length_total" name="body_material_1_piping_length_total" readonly="readonly" value="<?php echo $body_material_1_piping_length_total ?>" ></td>

                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_piping_length" name="body_material_2_piping_length" value="<?php echo $body_material_2_piping_length ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_piping_length_allowance" name="body_material_2_piping_length_allowance" value="<?php echo $body_material_2_piping_length_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_piping_length_total" name="body_material_2_piping_length_total" readonly="readonly" value="<?php echo $body_material_2_piping_length_total ?>"></td>

                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_piping_length" name="body_material_3_piping_length" value="<?php echo $body_material_3_piping_length ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_piping_length_allowance" name="body_material_3_piping_length_allowance" value="<?php echo $body_material_3_piping_length_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_piping_length_total" name="body_material_3_piping_length_total" readonly="readonly" value="<?php echo $body_material_3_piping_length_total ?>"></td>
                            </tr>
                            <tr>
                                <td>Width</td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_piping_width" name="body_material_1_piping_width" value="<?php echo $body_material_1_piping_width ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_piping_width_allowance" name="body_material_1_piping_width_allowance" value="<?php echo $body_material_1_piping_width_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_1_piping_width_total" name="body_material_1_piping_width_total" value="<?php echo $body_material_1_piping_width_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_piping_width" name="body_material_2_piping_width"  value="<?php echo $body_material_2_piping_width ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_piping_width_allowance" name="body_material_2_piping_width_allowance" value="<?php echo $body_material_2_piping_width_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_2_piping_width_total" name="body_material_2_piping_width_total" value="<?php echo $body_material_2_piping_width_total ?>" readonly="readonly"></td>

                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_piping_width" name="body_material_3_piping_width" value="<?php echo $body_material_3_piping_width ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_piping_width_allowance" name="body_material_3_piping_width_allowance" value="<?php echo $body_material_3_piping_width_allowance ?>"></td>
                                <td><input type="text" class="form-control quilt-and-suit-costing" id="body_material_3_piping_width_total" name="body_material_3_piping_width_total" readonly="readonly" value="<?php echo $body_material_3_piping_width_total ?>"></td>
                            </tr>
                        </table>
                    </div>
                </article>
            </section>
        </div>
    </form>
</section><!-- /.content -->


