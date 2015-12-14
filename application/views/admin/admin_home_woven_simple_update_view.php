       <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Update Woven Simple Costing
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
                <!-- Fetching All Details of Selected Student From Database And Showing In a Form -->

                <!-- Form Start -->
                <form class="form-inline" role="form" action="<?=  base_url()?>woven_simple/update_woven_simple_costing" method="post">
                <!-- Part1 Form Start -->

                <!-- Part1 Form Start -->
                <div class="row">
                    <div class="part1">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="order_id">Order Id:</label>
                                <input type="text" class="form-control" name="order_id" id="order_id"  value="<?php echo $order_id ?>" required>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="order_company"> Company:</label>
                                <input type="text" class="form-control" name="order_company" id="order_company" value="<?php echo $order_id ?>" required>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="order_company"> Item Name:</label>
                                <input type="text" class="form-control" name="order_item_name" id="order_item_name"  value="<?php echo $order_id ?>" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="order_company"> Reference No:</label>
                                <input type="text" class="form-control" name="order_ref_no" id="order_ref_no" value="<?php echo $order_id ?>" required>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="order_date"> Date:</label>
                                <input type="text" class="form-control" name="order_date" id="order_date" value="<?php echo $order_id ?>" required>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="main row">
                    <section class="col-md-8">

                        <div class="row part4">
                            <div class="">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label for="order_gsm" class="small-label">GSM:</label>
                                        <input type="text" class="form-control" id="order_gsm" name="order_gsm" value="<?php echo $order_id ?>" required>

                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <label for="order_colour" class="small-label">Color:</label>
                                        <input type="text" class="form-control" id="order_colour" name="order_colour" value="<?php echo $order_id ?>">
                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <label for="order_usd" class="small-label"> USD:</label>
                                        <input type="text" class="form-control" id="order_usd" name="order_usd" value="<?php echo $order_id ?>" required>
                                    </div>


                                    <div class="form-group">
                                        <label for="order_wastage" class="small-label">Wastage:</label>
                                        <input type="text" class="form-control" id="order_wastage" name="order_wastage" value="<?php echo $order_id ?>" required>
                                    </div>

                                    <br>

                                    <div class="form-group">
                                        <label for="order_margin" class="small-label">Margin:</label>
                                        <input type="text" class="form-control" id="order_margin" name="order_margin" value="<?php echo $order_id ?>" required>
                                    </div>

                                </div>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="order_quantity" class="medium-label">Order Quantity:</label>
                                        <input type="text" class="form-control" id="order_quantity" name="order_quantity" value="<?php echo $order_id ?>" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="order_transport" class="small-label"> Transport:</label>
                                        <input type="text" class="form-control" id="order_transport" name="order_transport" value="<?php echo $order_id ?>"> Tk/Truck
                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <label for="order_bank_document">Bank & Document Charge:</label>
                                        <input type="text" class="form-control" id="order_bank_document"  name="order_bank_document" value="<?php echo $order_id ?>">Tk/Shipment
                                    </div>
                                    <br>

                                </div>

                            </div>

                        </div>

                        <!-- Part2 Form Start -->
                        <article class="row part3">
                            <div class="part3">
                                <h3>Dimension</h3>

                                <h3>Body - Back,Front & Panel:</h3>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="order_body">H:</label>
                                            <input type="text" class="form-control" id="order_body_h" name="order_body_h" value="<?php echo $order_id ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="order_body">Allowance:</label>
                                            <input type="text" class="form-control" id="order_body_h_allowance" name="order_body_h_allowance" value="<?php echo $order_id ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="order_body">Total:</label>
                                            <input type="text" class="form-control" id="order_body_h_total" name="order_body_h_total" value="<?php echo $order_id ?>" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label="order_body">W:</label>
                                            <input type="text" class="form-control" id="order_body_w" name="order_body_w" value="<?php echo $order_id ?>" >
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="order_body">Allowance:</label>
                                            <input type="text" class="form-control" id="order_body_w_allowance" name="order_body_w_allowance" value="<?php echo $order_id ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="order_body">Total:</label>
                                            <input type="text" class="form-control" id="order_body_w_total" name="order_body_w_total"  value="<?php echo $order_id ?>" disabled>
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="order_body">P:</label>
                                            <input type="text" class="form-control" id="order_body_panel" name="order_body_panel" value="<?php echo $order_id ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="order_body">Allowance:</label>
                                            <input type="text" class="form-control" id="order_body_panel_allowance" name="order_body_panel_allowance" value="<?php echo $order_id ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="order_body">Total:</label>
                                            <input type="text" class="form-control" id="order_body_panel_total" name="order_body_panel_total" value="" disabled>
                                        </div>
                                    </div>
                                </div>


                                <h3>Double Handles:</h3>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="order_body">L:</label>
                                            <input type="text" class="form-control" id="order_handle_l" name="order_handle_l" value="<?php echo $order_id ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="order_body">Allowance:</label>
                                            <input type="text" class="form-control" id="order_handle_l_allowance" name="order_handle_l_allowance" value="<?php echo $ppnw_update->tbl_dimension_handle_length_allowance; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="order_body">Total:</label>
                                            <input type="text" class="form-control" id="order_handle_l_total" name="order_handle_l_total" value="" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="order_body">W:</label>
                                            <input type="text" class="form-control" id="order_handle_w" name="order_handle_w" value="<?php echo $ppnw_update->tbl_dimension_handle_width; ?>" >
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="order_body">Allowance:</label>
                                            <input type="text" class="form-control" id="order_handle_w_allowance" name="order_handle_w_allowance" value="<?php echo $ppnw_update->tbl_dimension_handle_width_allowance; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="order_body">Total:</label>
                                            <input type="text" class="form-control" id="order_handle_w_total" name="order_handle_w_total" value="" disabled>
                                        </div>
                                    </div>
                                </div>

                                <h3>Pocket:</h3>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="order_body">L:</label>
                                            <input type="text" class="form-control" id="order_pocket_l" name="order_pocket_l" value="<?php echo $ppnw_update->tbl_dimension_pocket_length; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="order_body">Allowance:</label>
                                            <input type="text" class="form-control" id="order_pocket_l_allowance" name="order_pocket_l_allowance" value="<?php echo $ppnw_update->tbl_dimension_pocket_length_allowance; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="order_body">Total:</label>
                                            <input type="text" class="form-control" id="order_pocket_l_total" name="order_pocket_l_total" value="" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="order_body">W:</label>
                                            <input type="text" class="form-control" id="order_pocket_w" name="order_pocket_w" value="<?php echo $ppnw_update->tbl_dimension_pocket_width; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="order_body">Allowance:</label>
                                            <input type="text" class="form-control" id="order_pocket_w_allowance" name="order_pocket_w_allowance"  value="<?php echo $ppnw_update->tbl_dimension_pocket_width_allowance; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="order_body">Total:</label>
                                            <input type="text" class="form-control" id="order_pocket_w_total" name="order_pocket_w_total"  value=""  disabled>
                                        </div>
                                    </div>
                                </div>


                                <h3>Extra 1:</h3>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="order_body">L:</label>
                                            <input type="text" class="form-control" id="order_extra_1_l" name="order_extra_1_l" value="<?php echo $ppnw_update->tbl_dimension_extra_1_length; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="order_body">Allowance:</label>
                                            <input type="text" class="form-control" id="order_extra_1_l_allowance" name="order_extra_1_l_allowance" value="<?php echo $ppnw_update->tbl_dimension_extra_1_length_allowance; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="order_body">Total:</label>
                                            <input type="text" class="form-control" id="order_extra_1_l_total" name="order_extra_1_l_total" value="" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="order_body">W:</label>
                                            <input type="text" class="form-control" id="order_extra_1_w" name="order_extra_1_w" value="<?php echo $ppnw_update->tbl_dimension_extra_1_width; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="order_body">Allowance:</label>
                                            <input type="text" class="form-control" id="order_extra_1_w_allowance" name="order_extra_1_w_allowance" value="<?php echo $ppnw_update->tbl_dimension_extra_1_width_allowance; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="order_body">Total:</label>
                                            <input type="text" class="form-control" id="order_extra_1_w_total" name="order_extra_1_w_total" value="" disabled>
                                        </div>
                                    </div>
                                </div>

                                <h3>Extra 2:</h3>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="order_body">L:</label>
                                            <input type="text" class="form-control" id="order_extra_2_l" name="order_extra_2_l" value="<?php echo $ppnw_update->tbl_dimension_extra_2_length; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="order_body">Allowance:</label>
                                            <input type="text" class="form-control" id="order_extra_2_l_allowance" name="order_extra_2_l_allowance" value="<?php echo $ppnw_update->tbl_dimension_extra_2_length_allowance; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="order_body">Total:</label>
                                            <input type="text" class="form-control" id="order_extra_2_l_total" name="order_extra_2_l_total" value="" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="order_body">W:</label>
                                            <input type="text" class="form-control" id="order_extra_2_w" name="order_extra_2_w" value="<?php echo $ppnw_update->tbl_dimension_extra_2_width; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="order_body">Allowance:</label>
                                            <input type="text" class="form-control" id="order_extra_2_w_allowance" name="order_extra_2_w_allowance" value="<?php echo $ppnw_update->tbl_dimension_extra_2_width_allowance; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="order_body">Total:</label>
                                            <input type="text" class="form-control" id="order_extra_2_w_total" name="order_extra_2_w_total" value="" disabled>
                                        </div>
                                    </div>
                                </div>

                                <h3>Extra 3:</h3>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="order_body">L:</label>
                                            <input type="text" class="form-control" id="order_extra_3_l" name="order_extra_3_l" value="<?php echo $ppnw_update->tbl_dimension_extra_3_length; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="order_body">Allowance:</label>
                                            <input type="text" class="form-control" id="order_extra_3_l_allowance" name="order_extra_3_l_allowance" value="<?php echo $ppnw_update->tbl_dimension_extra_3_length_allowance; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="order_body">Total:</label>
                                            <input type="text" class="form-control" id="order_extra_3_l_total" name="order_extra_3_l_total" value="" disabled>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="order_body">W:</label>
                                            <input type="text" class="form-control" id="order_extra_3_w" name="order_extra_3_w" value="<?php echo $ppnw_update->tbl_dimension_extra_3_width; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="order_body">Allowance:</label>
                                            <input type="text" class="form-control" id="order_extra_3_w_allowance" name="order_extra_3_w_allowance" value="<?php echo $ppnw_update->tbl_dimension_extra_3_width_allowance; ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="order_body">Total:</label>
                                            <input type="text" class="form-control" id="order_extra_3_w_total" name="order_extra_3_w_total"  value="" disabled>
                                        </div>
                                    </div>
                                </div>


                            </div>

                        </article>

                        <!-- Article Start -->

                        <article class="row part3">

                            <!-- Part3 Form Start -->
                            <h3>Body Material</h3>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th colspan="3">Item Rates</th>
                                    <th colspan="4">Item Consumption & Costs</th>

                                </tr>
                                </thead>

                                <thead>
                                <tr class="active">
                                    <th>Material</th>
                                    <th>Cost</th>
                                    <th>Unit</th>
                                    <th>Consmption</th>
                                    <th>Rate</th>
                                    <th>Unit</th>
                                    <th>Cost</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="success">
                                    <td>PPNW</td>
                                    <td><input type="text" class="form-control" id="ppnw_cost" name="ppnw_cost" value="<?php echo $ppnw_update->tbl_order_ppnw_item_cost; ?>" required ></td>
                                    <td>Kg</td>
                                    <td><input type="text" class="form-control" id="ppnw_consumption" name="ppnw_consumption" value="<?php echo $ppnw_update->tbl_order_ppnw_item_consumption; ?>" disabled></td>
                                    <td><input type="text" class="form-control" id="ppnw_consumption_rate" name="ppnw_consumption_rate" value="<?php echo $ppnw_update->tbl_order_ppnw_rate; ?>" disabled></td>
                                    <td>SQM</td>
                                    <td><input type="text" class="form-control" id="ppnw_consumption_cost" name="ppnw_consumption_cost" value="<?php echo $ppnw_update->tbl_order_ppnw_total_item_cost; ?>" disabled></td>
                                </tr>
                                </tbody>

                            </table>


                            <h3>Trims in Yard</h3>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th colspan="3">Item Rates</th>
                                    <th colspan="4">Item Consumption & Costs</th>

                                </tr>
                                </thead>

                                <thead>
                                <tr class="active">
                                    <th>Material</th>
                                    <th>Cost</th>
                                    <th>Unit</th>
                                    <th>Consmption</th>
                                    <th>Rate</th>
                                    <th>Unit</th>
                                    <th>Cost</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="danger">
                                    <td>Zipper</td>
                                    <td><input type="text" class="form-control" id="zipper_cost" name="zipper_cost" value="<?php echo $ppnw_update->tbl_trims_yard_zipper_item_cost; ?>"></td>
                                    <td>Yard</td>
                                    <td><input type="text" class="form-control" id="zipper_consumption" name="zipper_consumption" value="<?php echo $ppnw_update->tbl_trims_yard_zipper_item_consumption; ?>"></td>
                                    <td><input type="text" class="form-control" id="zipper_consumption_rate" name="zipper_consumption_rate" value="<?php echo $ppnw_update->tbl_trims_yard_zipper_item_rate; ?>" disabled></td>
                                    <td>Metre</td>
                                    <td><input type="text" class="form-control" id="zipper_consumption_cost" name="zipper_consumption_cost" value="<?php echo $ppnw_update->tbl_trims_yard_zipper_item_total_cost; ?>" disabled></td>
                                </tr>
                                <tr class="danger">
                                    <td>Webbing</td>
                                    <td><input type="text" class="form-control" id="webbing_cost" name="webbing_cost" value="<?php echo $ppnw_update->tbl_trims_yard_webbing_item_cost; ?>"></td>
                                    <td>Yard</td>
                                    <td><input type="text" class="form-control" id="webbing_consumption" name="webbing_consumption" value="<?php echo $ppnw_update->tbl_trims_yard_webbing_item_consumption; ?>"></td>
                                    <td><input type="text" class="form-control" id="webbing_consumption_rate" name="webbing_consumption_rate" value="<?php echo $ppnw_update->tbl_trims_yard_webbing_item_rate; ?>" disabled></td>
                                    <td>Metre</td>
                                    <td><input type="text" class="form-control" id="webbing_consumption_cost" name="webbing_consumption_cost" value="<?php echo $ppnw_update->tbl_trims_yard_webbing_item_total_cost; ?>" disabled></td>
                                </tr>

                                <tr class="danger">
                                    <td>Draw String</td>
                                    <td><input type="text" class="form-control" id="draw_string_cost" name="draw_string_cost" value="<?php echo $ppnw_update->tbl_trims_yard_draw_string_item_cost; ?>" ></td>
                                    <td>Yard</td>
                                    <td><input type="text" class="form-control" id="draw_string_consumption" name="draw_string_consumption" value="<?php echo $ppnw_update->tbl_trims_yard_draw_string_item_consumption; ?>"></td>
                                    <td><input type="text" class="form-control" id="draw_string_consumption_rate" name="draw_string_consumption_rate" value="<?php echo $ppnw_update->tbl_trims_yard_draw_string_item_rate; ?>" disabled></td>
                                    <td>Metre</td>
                                    <td><input type="text" class="form-control" id="draw_string_consumption_cost" name="draw_string_consumption_cost" value="<?php echo $ppnw_update->tbl_trims_yard_draw_string_item_total_cost; ?>" disabled></td>
                                </tr>

                                <tr class="danger">
                                    <td>Velcro</td>
                                    <td><input type="text" class="form-control" id="velcro_cost" name="velcro_cost" value="<?php echo $ppnw_update->tbl_trims_yard_velcro_item_cost; ?>"></td>
                                    <td>Yard</td>
                                    <td><input type="text" class="form-control" id="velcro_consumption" name="velcro_consumption" value="<?php echo $ppnw_update->tbl_trims_yard_velcro_item_consumption; ?>" ></td>
                                    <td><input type="text" class="form-control" id="velcro_consumption_rate" name="velcro_consumption_rate" value="<?php echo $ppnw_update->tbl_trims_yard_velcro_item_rate; ?>" disabled></td>
                                    <td>Metre</td>
                                    <td><input type="text" class="form-control" id="velcro_consumption_cost" name="velcro_consumption_cost" value="<?php echo $ppnw_update->tbl_trims_yard_velcro_item_total_cost; ?>" disabled></td>
                                </tr>

                                <tr class="danger">
                                    <td>Tape</td>
                                    <td><input type="text" class="form-control" id="tape_cost" name="tape_cost" value="<?php echo $ppnw_update->tbl_trims_yard_tape_item_cost; ?>"></td>
                                    <td>Yard</td>
                                    <td><input type="text" class="form-control" id="tape_consumption" name="tape_consumption" value="<?php echo $ppnw_update->tbl_trims_yard_tape_item_consumption; ?>" ></td>
                                    <td><input type="text" class="form-control" id="tape_consumption_rate" name="tape_consumption_rate" value="<?php echo $ppnw_update->tbl_trims_yard_tape_item_rate; ?>" disabled></td>
                                    <td>Metre</td>
                                    <td><input type="text" class="form-control" id="tape_consumption_cost" name="tape_consumption_cost"  value="<?php echo $ppnw_update->tbl_trims_yard_tape_item_total_cost; ?>" disabled></td>
                                </tr>

                                <tr class="danger">
                                    <td>Extra 1</td>
                                    <td><input type="text" class="form-control" id="extra_trim_yard_1_cost" name="" value="<?php echo $ppnw_update->tbl_trims_yard_extra_1_item_cost; ?>" ></td>
                                    <td>Yard</td>
                                    <td><input type="text" class="form-control" id="extra_trim_yard_1_consumption" name="" value="<?php echo $ppnw_update->tbl_trims_yard_extra_1_item_consumption; ?>" ></td>
                                    <td><input type="text" class="form-control" id="extra_trim_yard_1_consumption_rate" name="" value="<?php echo $ppnw_update->tbl_trims_yard_extra_1_item_rate; ?>" disabled></td>
                                    <td>Metre</td>
                                    <td><input type="text" class="form-control" id="extra_trim_yard_1_consumption_cost" name="" value="<?php echo $ppnw_update->tbl_trims_yard_extra_1_item_total_cost; ?>" disabled></td>
                                </tr>

                                <tr class="danger">
                                    <td>Extra 2</td>
                                    <td><input type="text" class="form-control" id="extra_trim_yard_2_cost" name="" value="<?php echo $ppnw_update->tbl_trims_yard_extra_2_item_cost; ?>" ></td>
                                    <td>Yard</td>
                                    <td><input type="text" class="form-control" id="extra_trim_yard_2_consumption" name="" value="<?php echo $ppnw_update->tbl_trims_yard_extra_2_item_consumption; ?>" ></td>
                                    <td><input type="text" class="form-control" id="extra_trim_yard_2_consumption_rate" name="" value="<?php echo $ppnw_update->tbl_trims_yard_extra_2_item_rate; ?>" disabled></td>
                                    <td>Metre</td>
                                    <td><input type="text" class="form-control" id="extra_trim_yard_2_consumption_cost" name="" value="<?php echo $ppnw_update->tbl_trims_yard_extra_2_item_total_cost; ?>" disabled></td>
                                </tr>
                                </tbody>

                            </table>


                            <h3>Trims in Piece</h3>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th colspan="3">Item Rates</th>
                                    <th colspan="4">Item Consumption & Costs</th>

                                </tr>
                                </thead>

                                <thead>
                                <tr class="active">
                                    <th>Material</th>
                                    <th>Cost</th>
                                    <th>Unit</th>
                                    <th>Consmption</th>
                                    <th>Rate</th>
                                    <th>Unit</th>
                                    <th>Cost</th>
                                </tr>
                                </thead>

                                <tbody>


                                <tr class="info">
                                    <td>Puller</td>
                                    <td><input type="text" class="form-control" id="puller_cost" name="puller_cost" value="<?php echo $ppnw_update->tbl_trims_piece_puller_item_cost; ?>"></td>
                                    <td>Piece</td>
                                    <td><input type="text" class="form-control" id="puller_consumption" name="puller_consumption" value="<?php echo $ppnw_update->tbl_trims_piece_puller_item_consumption; ?>"></td>
                                    <td><input type="text" class="form-control" id="puller_consumption_rate" name="puller_consumption_rate" value="<?php echo $ppnw_update->tbl_trims_piece_puller_item_rate; ?>" disabled></td>
                                    <td>Piece</td>
                                    <td><input type="text" class="form-control" id="puller_consumption_cost" name="puller_consumption_cost" value="<?php echo $ppnw_update->tbl_trims_piece_puller_item_total_cost; ?>"  disabled></td>
                                </tr>

                                <tr class="info">
                                    <td>Print</td>
                                    <td><input type="text" class="form-control" id="print_cost" name="print_cost" value="<?php echo $ppnw_update->tbl_trims_piece_print_item_cost; ?>"></td>
                                    <td>Piece</td>
                                    <td><input type="text" class="form-control" id="print_consumption" name="print_consumption" value="<?php echo $ppnw_update->tbl_trims_piece_print_item_consumption; ?>"></td>
                                    <td><input type="text" class="form-control" id="print_consumption_rate" name="print_consumption_rate" value="<?php echo $ppnw_update->tbl_trims_piece_print_item_rate; ?>" disabled></td>
                                    <td>Piece</td>
                                    <td><input type="text" class="form-control" id="print_consumption_cost" name="print_consumption_cost" value="<?php echo $ppnw_update->tbl_trims_piece_print_item_total_cost; ?>" disabled></td>
                                </tr>

                                <tr class="info">
                                    <td>Eyelet</td>
                                    <td><input type="text" class="form-control" id="eyelet_cost" name="eyelet_cost" value="<?php echo $ppnw_update->tbl_trims_piece_eyelet_item_cost; ?>"></td>
                                    <td>Piece</td>
                                    <td><input type="text" class="form-control" id="eyelet_consumption" name="eyelet_consumption" value="<?php echo $ppnw_update->tbl_trims_piece_eyelet_item_consumption; ?>"></td>
                                    <td><input type="text" class="form-control" id="eyelet_consumption_rate" name="eyelet_consumption_rate" value="<?php echo $ppnw_update->tbl_trims_piece_eyelet_item_rate; ?>" disabled></td>
                                    <td>Piece</td>
                                    <td><input type="text" class="form-control" id="eyelet_consumption_cost" name="eyelet_consumption_cost" value="<?php echo $ppnw_update->tbl_trims_piece_eyelet_item_total_cost; ?>" disabled></td>
                                </tr>

                                <tr class="info">
                                    <td>Buckle</td>
                                    <td><input type="text" class="form-control" id="buckle_cost" name="buckle_cost" value="<?php echo $ppnw_update->tbl_trims_piece_buckle_item_cost; ?>"></td>
                                    <td>Piece</td>
                                    <td><input type="text" class="form-control" id="buckle_consumption" name="buckle_consumption" value="<?php echo $ppnw_update->tbl_trims_piece_buckle_item_consumption; ?>"></td>
                                    <td><input type="text" class="form-control" id="buckle_consumption_rate" name="buckle_consumption_rate" value="<?php echo $ppnw_update->tbl_trims_piece_buckle_item_rate; ?>" disabled></td>
                                    <td>Piece</td>
                                    <td><input type="text" class="form-control" id="buckle_consumption_cost" name="buckle_consumption_cost" value="<?php echo $ppnw_update->tbl_trims_piece_buckle_item_total_cost; ?>" disabled></td>
                                </tr>

                                <tr class="info">
                                    <td>Snap Button</td>
                                    <td><input type="text" class="form-control" id="snap_button_cost" name="snap_button_cost" value="<?php echo $ppnw_update->tbl_trims_piece_snap_button_item_cost; ?>" ></td>
                                    <td>Piece</td>
                                    <td><input type="text" class="form-control" id="snap_button_consumption" name="snap_button_consumption" value="<?php echo $ppnw_update->tbl_trims_piece_snap_button_item_consumption; ?>"></td>
                                    <td><input type="text" class="form-control" id="snap_button_consumption_rate" name="snap_button_consumption_rate" value="<?php echo $ppnw_update->tbl_trims_piece_snap_button_item_rate; ?>" disabled></td>
                                    <td>Piece</td>
                                    <td><input type="text" class="form-control" id="snap_button_consumption_cost" name="snap_button_consumption_cost" value="<?php echo $ppnw_update->tbl_trims_piece_snap_button_item_total_cost; ?>" disabled></td>
                                </tr>

                                <tr class="info">
                                    <td>Magnetic Button</td>
                                    <td><input type="text" class="form-control" id="magnetic_button_cost" name="magnetic_button_cost" value="<?php echo $ppnw_update->tbl_trims_piece_magnetic_button_item_cost; ?>"></td>
                                    <td>Piece</td>
                                    <td><input type="text" class="form-control" id="magnetic_button_consumption" name="magnetic_button_consumption" value="<?php echo $ppnw_update->tbl_trims_piece_magnetic_button_item_consumption; ?>" ></td>
                                    <td><input type="text" class="form-control" id="magnetic_button_consumption_rate" name="magnetic_button_consumption_rate" value="<?php echo $ppnw_update->tbl_trims_piece_magnetic_button_item_rate; ?>" disabled></td>
                                    <td>Piece</td>
                                    <td><input type="text" class="form-control" id="magnetic_button_consumption_cost" name="magnetic_button_consumption_cost" value="<?php echo $ppnw_update->tbl_trims_piece_magnetic_button_item_total_cost; ?>"disabled></td>
                                </tr>

                                <tr class="info">
                                    <td>Bottom Base</td>
                                    <td><input type="text" class="form-control" id="bottom_base_cost" name="bottom_base_cost" value="<?php echo $ppnw_update->tbl_trims_piece_bottom_base_item_cost; ?>"></td>
                                    <td>Piece</td>
                                    <td><input type="text" class="form-control" id="bottom_base_consumption" name="bottom_base_consumption" value="<?php echo $ppnw_update->tbl_trims_piece_bottom_base_item_consumption; ?>"></td>
                                    <td><input type="text" class="form-control" id="bottom_base_consumption_rate" name="bottom_base_consumption_rate" value="<?php echo $ppnw_update->tbl_trims_piece_bottom_base_item_rate; ?>" disabled></td>
                                    <td>Piece</td>
                                    <td><input type="text" class="form-control" id="bottom_base_consumption_cost" name="bottom_base_consumption_cost" value="<?php echo $ppnw_update->tbl_trims_piece_bottom_base_item_total_cost; ?>" disabled></td>
                                </tr>

                                <tr class="info">
                                    <td>Thread</td>
                                    <td><input type="text" class="form-control" id="thread_cost" name="thread_cost" value="<?php echo $ppnw_update->tbl_trims_piece_thread_item_cost; ?>"></td>
                                    <td>Piece</td>
                                    <td><input type="text" class="form-control" id="thread_consumption" name="thread_consumption" value="<?php echo $ppnw_update->tbl_trims_piece_thread_item_consumption; ?>"></td>
                                    <td><input type="text" class="form-control" id="thread_consumption_rate" name="thread_consumption_rate" value="<?php echo $ppnw_update->tbl_trims_piece_thread_item_rate; ?>" disabled></td>
                                    <td>Piece</td>
                                    <td><input type="text" class="form-control" id="thread_consumption_cost" name="thread_consumption_cost" value="<?php echo $ppnw_update->tbl_trims_piece_thread_item_total_cost; ?>" disabled></td>
                                </tr>

                                <tr class="info">
                                    <td>Tag</td>
                                    <td><input type="text" class="form-control" id="tag_cost" name="tag_cost" value="<?php echo $ppnw_update->tbl_trims_piece_tag_item_cost; ?>"></td>
                                    <td>Piece</td>
                                    <td><input type="text" class="form-control" id="tag_consumption" name="tag_consumption" value="<?php echo $ppnw_update->tbl_trims_piece_tag_item_consumption; ?>"></td>
                                    <td><input type="text" class="form-control" id="tag_consumption_rate" name="tag_consumption_rate" value="<?php echo $ppnw_update->tbl_trims_piece_tag_item_rate; ?>" disabled></td>
                                    <td>Piece</td>
                                    <td><input type="text" class="form-control" id="tag_consumption_cost" name="tag_consumption_cost" value="<?php echo $ppnw_update->tbl_trims_piece_tag_item_total_cost; ?>" disabled></td>
                                </tr>

                                <tr class="info">
                                    <td>Label</td>
                                    <td><input type="text" class="form-control" id="label_cost" name="label_cost" value="<?php echo $ppnw_update->tbl_trims_piece_label_item_cost; ?>"></td>
                                    <td>Piece</td>
                                    <td><input type="text" class="form-control" id="label_consumption" name="label_consumption" value="<?php echo $ppnw_update->tbl_trims_piece_label_item_consumption; ?>"></td>
                                    <td><input type="text" class="form-control" id="label_consumption_rate" name="label_consumption_rate" value="<?php echo $ppnw_update->tbl_trims_piece_label_item_rate; ?>" disabled></td>
                                    <td>Piece</td>
                                    <td><input type="text" class="form-control" id="label_consumption_cost" name="label_consumption_cost" value="<?php echo $ppnw_update->tbl_trims_piece_label_item_total_cost; ?>" disabled></td>
                                </tr>

                                <tr class="info">
                                    <td>Packing</td>
                                    <td><input type="text" class="form-control" id="packing_cost" name="packing_cost" value="<?php echo $ppnw_update->tbl_trims_piece_packing_item_cost; ?>"></td>
                                    <td>Piece</td>
                                    <td><input type="text" class="form-control" id="packing_consumption" name="packing_consumption" value="<?php echo $ppnw_update->tbl_trims_piece_packing_item_consumption; ?>"></td>
                                    <td><input type="text" class="form-control" id="packing_consumption_rate" name="packing_consumption_rate" value="<?php echo $ppnw_update->tbl_trims_piece_packing_item_rate; ?>" disabled></td>
                                    <td>Piece</td>
                                    <td><input type="text" class="form-control" id="packing_consumption_cost" name="packing_consumption_cost" value="<?php echo $ppnw_update->tbl_trims_piece_packing_item_total_cost; ?>" disabled></td>
                                </tr>

                                <tr class="info">
                                    <td>Extra 1</td>
                                    <td><input type="text" class="form-control" id="extra_1_piece_cost" name="extra_1_piece_cost" value="<?php echo $ppnw_update->tbl_trims_piece_extra_1_item_cost; ?>"></td>
                                    <td>Piece</td>
                                    <td><input type="text" class="form-control" id="extra_1_piece_consumption" name="extra_1_piece_consumption" value="<?php echo $ppnw_update->tbl_trims_piece_extra_1_item_consumption; ?>"></td>
                                    <td><input type="text" class="form-control" id="extra_1_piece_consumption_rate" name="extra_1_piece_consumption_rate" value="<?php echo $ppnw_update->tbl_trims_piece_extra_1_item_rate; ?>" disabled></td>
                                    <td>Piece</td>
                                    <td><input type="text" class="form-control" id="extra_1_piece_consumption_cost" name="extra_1_piece_consumption_cost" value="<?php echo $ppnw_update->tbl_trims_piece_extra_1_item_total_cost; ?>" disabled></td>
                                </tr>

                                <tr class="info">
                                    <td>Extra 2</td>
                                    <td><input type="text" class="form-control" id="extra_2_piece_cost" name="extra_2_piece_cost" value="<?php echo $ppnw_update->tbl_trims_piece_extra_2_item_cost; ?>"></td>
                                    <td>Piece</td>
                                    <td><input type="text" class="form-control" id="extra_2_piece_consumption" name="extra_2_piece_consumption" value="<?php echo $ppnw_update->tbl_trims_piece_extra_2_item_consumption; ?>"></td>
                                    <td><input type="text" class="form-control" id="extra_2_piece_consumption_rate" name="extra_2_piece_consumption_rate" value="<?php echo $ppnw_update->tbl_trims_piece_extra_2_item_rate; ?>" disabled></td>
                                    <td>Piece</td>
                                    <td><input type="text" class="form-control" id="extra_2_piece_consumption_cost" name="extra_2_piece_consumption_cost" value="<?php echo $ppnw_update->tbl_trims_piece_extra_2_item_total_cost; ?>" disabled></td>
                                </tr>

                                <tr class="info">
                                    <td>Extra 3</td>
                                    <td><input type="text" class="form-control" id="extra_3_piece_cost" name="extra_3_piece_cost" value="<?php echo $ppnw_update->tbl_trims_piece_extra_3_item_cost; ?>"></td>
                                    <td>Piece</td>
                                    <td><input type="text" class="form-control" id="extra_3_piece_consumption" name="extra_3_piece_consumption" value="<?php echo $ppnw_update->tbl_trims_piece_extra_3_item_consumption; ?>" ></td>
                                    <td><input type="text" class="form-control" id="extra_3_piece_consumption_rate" name="extra_3_piece_consumption_rate" value="<?php echo $ppnw_update->tbl_trims_piece_extra_3_item_rate; ?>" disabled></td>
                                    <td>Piece</td>
                                    <td><input type="text" class="form-control" id="extra_3_piece_consumption_cost" name="extra_3_piece_consumption_cost" value="<?php echo $ppnw_update->tbl_trims_piece_extra_3_item_total_cost; ?>" disabled></td>
                                </tr>
                                </tbody>

                            </table>
                        </article>
                        <!-- Article End  -->
                    </section>


                    <aside class="col-md-4">
                        <article class="row grand-total">

                            <h4>Total Material incl Wastage: <span id="final_material_cost"></span></h4>
                            <h4>Total Overhead and Other Cost: <span id="total_overhead_and_other"></span></h4>
                            <h4>Total Cost: <span id="total_cost"></span></h4>

                            <h2><b>Price</b>: <span id="final_price"></span></h2>


                            <button class="btn btn-info" type="submit" name="submit">Update</button>
                            <button class="btn btn-info">PRINT</button>
                            <button class="btn btn-info">PDF</button>
                        </article>

                        <article class="row other-cost">
                            <h3>CM & Others</h3>

                            <div class="form-group">
                                <label for="order_total_material_inc_wastage">Total Material incl Wastage:</label>
                                <input type="text" class="form-control" id="order_total_material_inc_wastage" name="order_total_material_inc_wastage" disabled>
                            </div>
                            <div class="form-group">
                                <label for="order_sewing">Sewing:</label>
                                <input type="text" class="form-control" id="order_sewing" name="order_sewing">
                            </div>
                            <div class="form-group">
                                <label for="order_overheads">Overheads:</label>
                                <input type="text" class="form-control" id="order_overheads" name="order_overheads">
                            </div>
                        </article>
                    </aside>
                </div>
            </form>
                    <!-- foreach end-->

        </section><!-- /.content -->
		

