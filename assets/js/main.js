


//Suggestion Engine
/* $(document).ready(function () {
  $('.typeahead').typeahead({
    source: function(query) {
      var result = [];
      $.ajax({
        url: "admin/json_search_employee",
        type: "post",
        data: "search=" + query,
        dataType: "json",
        async: true,
        success: function(data) {
          //typeahead.process(data);
          alert(data);
          result = data;
        }
      });
      return result;
    }
  });
}); */

$('.add-new-ppnw-form').on('keyup keypress', function(e) {
    var code = e.keyCode || e.which;
    if (code == 13) {
        e.preventDefault();
        return false;
    }
});



$(document).ready(function(){
  $("#order_date").datepicker({dateFormat : 'yy-mm-dd'});
});


/*****************************To Do Script *****************************************************/
add_task(); // Call the add_task function
delete_task(); // Call the delete_task function

/**
 * Add to do list
 */
function add_task() {
  $('.add-new-task').submit(function(){
    var new_task = $('.add-new-task input[name=new-task]').val();
    if(new_task != ''){
      $.post('admin/add_todo', { task: new_task }, function( data ) {
        $('.add-new-task input[name=new-task]').val('');
        $(data).appendTo('.task-list ul').hide().fadeIn();
        delete_task();
      });
    }
    return false; // Ensure that the form does not submit twice
  });
}
/**
 * Delete to do list
 */
function delete_task() {

  $('.delete-button').click(function(){

    var current_element = $(this);

    var id = $(this).attr('id');

    $.post('admin/delete_todo/'+id, { task_id: id }, function() {

      current_element.parent().fadeOut("fast", function() { $(this).remove(); });
    });
  });
}





/************************Nonwovens Bag total Calculation***************************************/

$(document).ready(function(){
  $(".form-control").keyup(function(){


    /**
     * Get Company name's First letter if company name have two word then it will take two letter from company
     * @type {*|jQuery}
     */
    var company_name_prag = $("#order_company").val();

    var matches = company_name_prag.match(/\b(\w)/g);
    var acronym = matches.join('');

    //var name = acronym+date;
    var date = $('#order_date').datepicker({ dateFormat: 'ddmmy' }).val();

   // document.write(date);
    console.log(date);

  // Joining the date and company names first letters and add them into order id
    $('#order_id').val(acronym+date);




    /***************Consumption Calculation***********************/
    /**********************/
    /**Back,Front & Panel**/
    /**********************/

    //Body Height
    var order_body_h = +$("#order_body_h").val();

   // var str = +$("#order_body_h").val();

   // var isDecimalFound = string.match([0]+(\.[0-9][0-9]?));

   // document.getElementById("order_body_h").innerHTML = txt;

    var order_body_h_allowance = +$("#order_body_h_allowance").val();
    $("#order_body_h_total").val((order_body_h+ order_body_h_allowance).toFixed(2));
    var body_h = +$("#order_body_h_total").val();

   //Body Width
    var order_body_w = +$("#order_body_w").val();
    var order_body_w_allowance = +$("#order_body_w_allowance").val();
    $("#order_body_w_total").val((order_body_w + order_body_w_allowance).toFixed(2));
    var body_w = +$("#order_body_w_total").val();

    //Body Panel
    var order_body_panel = +$("#order_body_panel").val();
    var order_body_panel_allowance = +$("#order_body_panel_allowance").val();
    $("#order_body_panel_total").val((order_body_panel + order_body_panel_allowance).toFixed(2));
    var body_panel = +$("#order_body_panel_total").val();

    /*****************/
    /**Double Handle**/
    /*****************/

    //Handle Length
    var order_handle_l = +$("#order_handle_l").val();
    var order_handle_l_allowance = +$("#order_handle_l_allowance").val();
    $("#order_handle_l_total").val((order_handle_l+ order_handle_l_allowance).toFixed(2));
    var handle_l = +$("#order_handle_l_total").val();

   //Body Width
    var order_handle_w = +$("#order_handle_w").val();
    var order_handle_w_allowance = +$("#order_handle_w_allowance").val();
    $("#order_handle_w_total").val((order_handle_w + order_handle_w_allowance).toFixed(2));
    var handle_w = +$("#order_handle_w_total").val();

    /*****************/
    /*****Pocket:*****/
    /*****************/

    //Pocket Length
    var order_pocket_l = +$("#order_pocket_l").val();
    var order_pocket_l_allowance = +$("#order_pocket_l_allowance").val();
    $("#order_pocket_l_total").val((order_pocket_l+ order_pocket_l_allowance).toFixed(2));
    var pocket_l = +$("#order_pocket_l_total").val();

   //Pocket Width
    var order_pocket_w = +$("#order_pocket_w").val();
    var order_pocket_w_allowance = +$("#order_pocket_w_allowance").val();
    $("#order_pocket_w_total").val((order_pocket_w + order_pocket_w_allowance).toFixed(2));
    var pocket_w = +$("#order_pocket_w_total").val();

    /******************/
    /*****Extra 1:*****/
    /******************/

    //Extra 1 Length
    var order_extra_1_l = +$("#order_extra_1_l").val();
    var order_extra_1_l_allowance = +$("#order_extra_1_l_allowance").val();
    $("#order_extra_1_l_total").val((order_extra_1_l+ order_extra_1_l_allowance).toFixed(2));
    var extra_1_l = +$("#order_extra_1_l_total").val();

   //Extra 1 Width
    var order_extra_1_w = +$("#order_extra_1_w").val();
    var order_extra_1_w_allowance = +$("#order_extra_1_w_allowance").val();
    $("#order_extra_1_w_total").val((order_extra_1_w + order_extra_1_w_allowance).toFixed(2));
    var extra_1_w = +$("#order_extra_1_w_total").val();


    /******************/
    /*****Extra 2:*****/
    /******************/

    //Extra 2 Length
    var order_extra_2_l = +$("#order_extra_2_l").val();
    var order_extra_2_l_allowance = +$("#order_pocket_2_allowance").val();
    $("#order_extra_1_l_total").val((order_extra_1_l+ order_extra_1_l_allowance).toFixed(2));
    var extra_2_l = +$("#order_extra_1_l_total").val();

   //Extra 2 Width
    var order_extra_2_l = +$("#order_extra_2_l").val();
    var order_extra_2_l_allowance = +$("#order_extra_2_l_allowance").val();
    $("#order_extra_2_l_total").val((order_extra_2_l + order_extra_2_l_allowance).toFixed(2));
    var extra_2_w = +$("#order_extra_2_l_total").val();

   /******************/
    /*****Extra 3:*****/
    /******************/

    //Extra 3 Length
    var order_extra_3_l = +$("#order_extra_3_l").val();
    var order_extra_3_l_allowance = +$("#order_extra_3_l_allowance").val();
    $("#order_extra_3_l_total").val((order_extra_3_l + order_extra_3_l_allowance).toFixed(2));
    var extra_3_l = +$("#order_extra_3_l_total").val();

   //Extra 3 Width
    var order_extra_3_w = +$("#order_extra_3_w").val();
    var order_extra_3_w_allowance = +$("#order_extra_3_w_allowance").val();
    $("#order_extra_3_w_total").val((order_extra_3_w + order_extra_3_w_allowance).toFixed(2));
    var extra_3_w = +$("#order_extra_3_w_total").val();


    //PPNW Total Consumption
    $("#ppnw_consumption").val(((body_h*body_w*2)+((body_h+body_h+body_w)*body_panel)+(handle_l*handle_w*2)+(pocket_l*pocket_w)+(extra_1_l*extra_1_w)+(extra_2_l*extra_2_w)+(extra_3_l*extra_3_w)).toFixed(2));

    /***************Item Cost Calculation***********************/
    var ppnw_cost = +$("#ppnw_cost").val();
    var order_gsm = +$("#order_gsm").val();

    /*******Consumption Rate*************/
    $("#ppnw_consumption_rate").val((ppnw_cost/(1000/order_gsm)).toFixed(2));

    /*******Consumption Cost*************/
    var ppnw_consumption = +$("#ppnw_consumption").val();
    var ppnw_consumption_rate = +$("#ppnw_consumption_rate").val();

    //Total Consumption
    $("#ppnw_consumption_cost").val((ppnw_consumption*ppnw_consumption_rate).toFixed(4));



    /*******************************/
    /*******Zipper Cost*************/
    /*******************************/
    var zipper_cost = +$("#zipper_cost").val();

    /*******Consumption Rate*************/
    $("#zipper_consumption_rate").val((zipper_cost/0.9144).toFixed(4));
    var zipper_consumption = +$("#zipper_consumption").val();
    var zipper_consumption_rate = +$("#zipper_consumption_rate").val();

    /***********Total Zipper Cost*********/
    $("#zipper_consumption_cost").val((zipper_consumption*zipper_consumption_rate).toFixed(4));



    /*******************************/
    /*******Webbing Cost*************/
    /*******************************/
    var webbing_cost = +$("#webbing_cost").val();

    /*******Consumption Rate*************/
    $("#webbing_consumption_rate").val((webbing_cost/0.9144).toFixed(4));
    var webbing_consumption = +$("#webbing_consumption").val();
    var webbing_consumption_rate = +$("#webbing_consumption_rate").val();

    /***********Total Webbing Cost*********/
    $("#webbing_consumption_cost").val((webbing_consumption*webbing_consumption_rate).toFixed(4));




    /************************************/
    /**********Draw String Cost**********/
    /************************************/
    var draw_string_cost = +$("#draw_string_cost").val();

    /*******Consumption Rate*************/
    $("#draw_string_consumption_rate").val((draw_string_cost/0.9144).toFixed(4));
    var draw_string_consumption = +$("#draw_string_consumption").val();
    var draw_string_consumption_rate = +$("#draw_string_consumption_rate").val();

    /***********Total Draw String Cost*********/
    $("#draw_string_consumption_cost").val((draw_string_consumption*draw_string_consumption_rate).toFixed(4));



    /************************************/
    /************Velcro Cost*************/
    /************************************/
    var velcro_cost = +$("#velcro_cost").val();

    /*******Consumption Rate*************/
    $("#velcro_consumption_rate").val((velcro_cost/0.9144).toFixed(4));

    var velcro_consumption = +$("#velcro_consumption").val();
    var velcro_consumption_rate = +$("#velcro_consumption_rate").val();

    /*********** Total Velcro Cost*********/
    $("#velcro_consumption_cost").val((velcro_consumption*velcro_consumption_rate).toFixed(4));




    /************************************/
    /*************Tape Cost**************/
    /************************************/
    var tape_cost = +$("#tape_cost").val();

    /*******Consumption Rate*************/
    $("#tape_consumption_rate").val((tape_cost/0.9144).toFixed(4));
    var tape_consumption = +$("#tape_consumption").val();
    var tape_consumption_rate = +$("#tape_consumption_rate").val();

    /*********** Total Velcro Cost*********/
    $("#tape_consumption_cost").val((tape_consumption*tape_consumption_rate).toFixed(4));



    /********************************************/
    /*************Extra 1 yard Cost**************/
    /********************************************/
    var extra_trim_yard_1_cost = +$("#extra_trim_yard_1_cost").val();

    $("#extra_trim_yard_1_consumption_rate").val((extra_trim_yard_1_cost/0.9144).toFixed(4));
    var extra_trim_yard_1_consumption = +$("#extra_trim_yard_1_consumption").val();
    var extra_trim_yard_1_consumption_rate = +$("#extra_trim_yard_1_consumption_rate").val();

    $("#extra_trim_yard_1_consumption_cost").val((extra_trim_yard_1_consumption*extra_trim_yard_1_consumption_rate).toFixed(4));



    /********************************************/
    /*************Extra 2 yard Cost**************/
    /********************************************/
    var extra_trim_yard_2_cost = +$("#extra_trim_yard_2_cost").val();

    $("#extra_trim_yard_2_consumption_rate").val((extra_trim_yard_2_cost/0.9144).toFixed(4));
    var extra_trim_yard_2_consumption = +$("#extra_trim_yard_2_consumption").val();
    var extra_trim_yard_2_consumption_rate = +$("#extra_trim_yard_2_consumption_rate").val();

    $("#extra_trim_yard_2_consumption_cost").val((extra_trim_yard_2_consumption*extra_trim_yard_2_consumption_rate).toFixed(4));






    /*******Puller Cost*************/
    var puller_cost = +$("#puller_cost").val();

    $("#puller_consumption_rate").val((puller_cost).toFixed(3));

    var puller_consumption = +$("#puller_consumption").val();
    var puller_consumption_rate = +$("#puller_consumption_rate").val();

    $("#puller_consumption_cost").val((puller_consumption*puller_consumption_rate).toFixed(4));


    /*******Print Cost*************/
    var print_cost = +$("#print_cost").val();

    $("#print_consumption_rate").val((print_cost).toFixed(3));

    var print_consumption = +$("#print_consumption").val();
    var print_consumption_rate = +$("#print_consumption_rate").val();

    $("#print_consumption_cost").val((print_consumption*print_consumption_rate).toFixed(4));


    /*******Eyelete Cost*************/
    var eyelet_cost = +$("#eyelet_cost").val();

    $("#eyelet_consumption_rate").val((eyelet_cost).toFixed(3));

    var eyelet_consumption = +$("#eyelet_consumption").val();
    var eyelet_consumption_rate = +$("#eyelet_consumption_rate").val();

    $("#eyelet_consumption_cost").val((eyelet_consumption*eyelet_consumption_rate).toFixed(4));


    /*******Buckle Cost*************/
    var buckle_cost = +$("#buckle_cost").val();

    $("#buckle_consumption_rate").val((buckle_cost).toFixed(3));

    var buckle_consumption = +$("#buckle_consumption").val();
    var buckle_consumption_rate = +$("#buckle_consumption_rate").val();

    $("#buckle_consumption_cost").val((buckle_consumption*buckle_consumption_rate).toFixed(4));


    /*******Snap Button Cost*************/
    var snap_button_cost = +$("#snap_button_cost").val();

    $("#snap_button_consumption_rate").val((snap_button_cost).toFixed(3));

    var snap_button_consumption = +$("#snap_button_consumption").val();
    var snap_button_consumption_rate = +$("#snap_button_consumption_rate").val();

    $("#snap_button_consumption_cost").val((snap_button_consumption*snap_button_consumption_rate).toFixed(4));



    /*******Magnetic Button Cost*************/
    var magnetic_button_cost = +$("#magnetic_button_cost").val();

    $("#magnetic_button_consumption_rate").val((magnetic_button_cost).toFixed(3));

    var magnetic_button_consumption = +$("#magnetic_button_consumption").val();
    var magnetic_button_consumption_rate = +$("#magnetic_button_consumption_rate").val();

    $("#magnetic_button_consumption_cost").val((magnetic_button_consumption*magnetic_button_consumption_rate).toFixed(4));


    /*******Bottom Base Cost*************/
    var bottom_base_cost = +$("#bottom_base_cost").val();

    $("#bottom_base_consumption_rate").val((puller_cost).toFixed(3));

    var bottom_base_consumption = +$("#bottom_base_consumption").val();
    var bottom_base_consumption_rate = +$("#bottom_base_consumption_rate").val();

    $("#bottom_base_consumption_cost").val((bottom_base_consumption*bottom_base_consumption_rate).toFixed(4));


    /*******Thread Cost*************/
    var thread_cost = +$("#thread_cost").val();

    $("#thread_consumption_rate").val((thread_cost).toFixed(3));

    var thread_consumption = +$("#thread_consumption").val();
    var thread_consumption_rate = +$("#thread_consumption_rate").val();

    $("#thread_consumption_cost").val((thread_consumption*thread_consumption_rate).toFixed(4));


    /*******Tag Cost*************/
    var tag_cost = +$("#tag_cost").val();

    $("#tag_consumption_rate").val((tag_cost).toFixed(3));

    var tag_consumption = +$("#tag_consumption").val();
    var tag_consumption_rate = +$("#tag_consumption_rate").val();

    $("#tag_consumption_cost").val((tag_consumption*tag_consumption_rate).toFixed(4));


    /*******Label Cost*************/
    var label_cost = +$("#label_cost").val();

    $("#label_consumption_rate").val((label_cost).toFixed(3));

    var label_consumption = +$("#label_consumption").val();
    var label_consumption_rate = +$("#label_consumption_rate").val();

    $("#label_consumption_cost").val((label_consumption*label_consumption_rate).toFixed(4));


    /*******Packing Cost*************/
    var packing_cost = +$("#packing_cost").val();

    $("#packing_consumption_rate").val((packing_cost).toFixed(3));

    var packing_consumption = +$("#packing_consumption").val();
    var packing_consumption_rate = +$("#packing_consumption_rate").val();

    $("#packing_consumption_cost").val((packing_consumption*packing_consumption_rate).toFixed(4));


    /*******Extra 1 piece Cost*************/
    var extra_1_piece_cost = +$("#extra_1_piece_cost").val();

    $("#extra_1_piece_consumption_rate").val((extra_1_piece_cost).toFixed(3));

    var extra_1_piece_consumption = +$("#extra_1_piece_consumption").val();
    var extra_1_piece_consumption_rate = +$("#extra_1_piece_consumption_rate").val();

    $("#extra_1_piece_consumption_cost").val((extra_1_piece_consumption*extra_1_piece_consumption_rate).toFixed(4));

    /*******Extra 2 piece Cost*************/
    var extra_2_piece_cost = +$("#extra_2_piece_cost").val();

    $("#extra_2_piece_consumption_rate").val((extra_2_piece_cost).toFixed(3));

    var extra_2_piece_consumption = +$("#extra_2_piece_consumption").val();
    var extra_2_piece_consumption_rate = +$("#extra_2_piece_consumption_rate").val();

    $("#extra_2_piece_consumption_cost").val((extra_2_piece_consumption*extra_2_piece_consumption_rate).toFixed(4));


    /*******Extra 3 piece Cost*************/
    var extra_3_piece_cost = +$("#extra_3_piece_cost").val();

    $("#extra_3_piece_consumption_rate").val((extra_3_piece_cost).toFixed(3));

    var extra_3_piece_consumption = +$("#extra_3_piece_consumption").val();
    var extra_3_piece_consumption_rate = +$("#extra_3_piece_consumption_rate").val();

    $("#extra_3_piece_consumption_cost").val((extra_3_piece_consumption*extra_3_piece_consumption_rate).toFixed(4));



    /*******Total Material Including Wastage*************/
    var order_wastage = +$("#order_wastage").val();

    /*****Body Material Variable*****/
    var ppnw_consumption_cost = +$("#ppnw_consumption_cost").val();

    /*****Trims in Yard Variable*****/
    var zipper_consumption_cost = +$("#zipper_consumption_cost").val();
    var webbing_consumption_cost = +$("#webbing_consumption_cost").val();
    var draw_string_consumption_cost = +$("#draw_string_consumption_cost").val();
    var velcro_consumption_cost = +$("#velcro_consumption_cost").val();
    var tape_consumption_cost = +$("#tape_consumption_cost").val();
    var extra_trim_yard_1_consumption_cost = +$("#extra_trim_yard_1_consumption_cost").val();
    var extra_trim_yard_2_consumption_cost = +$("#extra_trim_yard_2_consumption_cost").val();

    /*****Trims in Piece Variable*****/
    var puller_consumption_cost = +$("#puller_consumption_cost").val();
    var print_consumption_cost = +$("#print_consumption_cost").val();
    var eyelet_consumption_cost = +$("#eyelet_consumption_cost").val();
    var buckle_consumption_cost = +$("#buckle_consumption_cost").val();
    var snap_button_consumption_cost = +$("#snap_button_consumption_cost").val();
    var magnetic_button_consumption_cost = +$("#magnetic_button_consumption_cost").val();
    var bottom_base_consumption_cost = +$("#bottom_base_consumption_cost").val();
    var thread_consumption_cost = +$("#thread_consumption_cost").val();
    var tag_consumption_cost = +$("#tag_consumption_cost").val();
    var label_consumption_cost = +$("#label_consumption_cost").val();
    var packing_consumption_cost = +$("#packing_consumption_cost").val();
    var extra_1_piece_consumption_cost = +$("#extra_1_piece_consumption_cost").val();
    var extra_2_piece_consumption_cost = +$("#extra_2_piece_consumption_cost").val();
    var extra_3_piece_consumption_cost = +$("#extra_3_piece_consumption_cost").val();

    $("#order_total_material_inc_wastage").val(((ppnw_consumption_cost+zipper_consumption_cost+webbing_consumption_cost+draw_string_consumption_cost+velcro_consumption_cost+tape_consumption_cost+extra_trim_yard_1_consumption_cost+extra_trim_yard_2_consumption_cost+puller_consumption_cost+print_consumption_cost+eyelet_consumption_cost+buckle_consumption_cost+snap_button_consumption_cost+magnetic_button_consumption_cost+bottom_base_consumption_cost+thread_consumption_cost+tag_consumption_cost+label_consumption_cost+packing_consumption_cost+extra_1_piece_consumption_cost+extra_2_piece_consumption_cost+extra_3_piece_consumption_cost)*(1+(order_wastage/100))).toFixed(4));

    $("#final_material_cost").text(((ppnw_consumption_cost+zipper_consumption_cost+webbing_consumption_cost+draw_string_consumption_cost+velcro_consumption_cost+tape_consumption_cost+extra_trim_yard_1_consumption_cost+extra_trim_yard_2_consumption_cost+puller_consumption_cost+print_consumption_cost+eyelet_consumption_cost+buckle_consumption_cost+snap_button_consumption_cost+magnetic_button_consumption_cost+bottom_base_consumption_cost+thread_consumption_cost+tag_consumption_cost+label_consumption_cost+packing_consumption_cost+extra_1_piece_consumption_cost+extra_2_piece_consumption_cost+extra_3_piece_consumption_cost)*(1+(order_wastage/100))).toFixed(4));


    /*******Total Overheads and Others*************/
    var usd = +$("#order_usd").val();
    var sewing_cost = +$("#order_sewing").val();
    var bag_quantity = +$("#order_quantity").val();
    var overheads_cost = +$("#order_overheads").val();
    var transport_cost = +$("#order_transport").val();
    var bank_document_cost = +$("#order_bank_document").val();

    var transport_per_bag = (transport_cost/bag_quantity)/usd; //Transport Cost Per Bag
    var bank_document_cost_per_bag = (bank_document_cost/bag_quantity)/usd; //Bank Document Cost Per Bag

    $("#total_overhead_and_other").text((sewing_cost+overheads_cost+transport_per_bag+bank_document_cost_per_bag).toFixed(4));


    /*******Total Cost*************/
    var order_total_material_wastage_included = +$("#order_total_material_inc_wastage").val();
    var order_total_overhead_and_others = +$("#total_overhead_and_other").text();

    $("#total_cost").text((order_total_material_wastage_included+order_total_overhead_and_others).toFixed(4));



    /*******Final Price*************/
    var total_final_cost = +$("#total_cost").text();

    console.log("Final Cost"+total_final_cost);

    var margin =  +$("#order_margin").val();

    $("#final_price").text((total_final_cost*(1+(margin/100))).toFixed(4));



  });

});
