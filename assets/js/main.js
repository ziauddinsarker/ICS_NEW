
$('.add-new-ppnw-form').on('keyup keypress', function(e) {
    var code = e.keyCode || e.which;
    if (code == 13) {
        e.preventDefault();
        return false;
    }
});


$(document).ready(function(){
  $("#order_date, #date, #datereport").datepicker({dateFormat : 'yy-mm-dd'});
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



/************************Woven Bag Total Calculation*******************************************/

$(document).ready(function(){
    $(".woven-costing").keyup(function() {
        /*******************Body Material 1************************************/
        //Body Material 1 front Length
        var body_material_1_front_length = +$("#body_material_1_front_length").val();
        var body_material_1_front_length_allowance = +$("#body_material_1_front_length_allowance").val();
        $("#body_material_1_front_length_total").val((body_material_1_front_length+ body_material_1_front_length_allowance).toFixed(2));
        var body_material_1_front_length_total = +$("#body_material_1_front_length_total").val();

        //Body Material 1 front Width
        var body_material_1_front_width = +$("#body_material_1_front_width").val();
        var body_material_1_front_width_allowance = +$("#body_material_1_front_width_allowance").val();
        $("#body_material_1_front_width_total").val((body_material_1_front_width + body_material_1_front_width_allowance).toFixed(2));
        var body_material_1_front_width_total = +$("#body_material_1_front_width_total").val();

        //Body Material 1 Back Length
        var body_material_1_back_length = +$("#body_material_1_back_length").val();
        var body_material_1_back_length_allowance = +$("#body_material_1_back_length_allowance").val();
        $("#body_material_1_back_length_total").val((body_material_1_back_length+ body_material_1_back_length_allowance).toFixed(2));
        var body_material_1_back_length_total = +$("#body_material_1_back_length_total").val();

        //Body Material 1 Back Width
        var body_material_1_back_width = +$("#body_material_1_back_width").val();
        var body_material_1_back_width_allowance = +$("#body_material_1_back_width_allowance").val();
        $("#body_material_1_back_width_total").val((body_material_1_back_width + body_material_1_back_width_allowance).toFixed(2));
        var body_material_1_back_width_total = +$("#body_material_1_back_width_total").val();

        //Body Material 1 Top Length
        var body_material_1_top_length = +$("#body_material_1_top_length").val();
        var body_material_1_top_length_allowance = +$("#body_material_1_top_length_allowance").val();
        $("#body_material_1_top_length_total").val((body_material_1_top_length + body_material_1_top_length_allowance).toFixed(2));
        var body_material_1_top_length_total = +$("#body_material_1_top_length_total").val();

        //Body Material 1 Top Width
        var body_material_1_top_width = +$("#body_material_1_top_width").val();
        var body_material_1_top_width_allowance = +$("#body_material_1_top_width_allowance").val();
        $("#body_material_1_top_width_total").val((body_material_1_top_width + body_material_1_top_width_allowance).toFixed(2));
        var body_material_1_top_width_total = +$("#body_material_1_top_width_total").val();

        //Body Material 1 Bottom Length
        var body_material_1_bottom_length = +$("#body_material_1_bottom_length").val();
        var body_material_1_bottom_length_allowance = +$("#body_material_1_bottom_length_allowance").val();
        $("#body_material_1_bottom_length_total").val((body_material_1_bottom_length + body_material_1_bottom_length_allowance).toFixed(2));
        var body_material_1_bottom_length_total = +$("#body_material_1_bottom_length_total").val();

        //Body Material 1 Bottom Width
        var body_material_1_bottom_width = +$("#body_material_1_bottom_width").val();
        var body_material_1_bottom_width_allowance = +$("#body_material_1_bottom_width_allowance").val();
        $("#body_material_1_bottom_width_total").val((body_material_1_bottom_width + body_material_1_bottom_width_allowance).toFixed(2));
        var body_material_1_bottom_width_total = +$("#body_material_1_bottom_width_total").val();

        //Body Material 1 Left Length
        var body_material_1_left_length = +$("#body_material_1_left_length").val();
        var body_material_1_left_length_allowance = +$("#body_material_1_left_length_allowance").val();
        $("#body_material_1_left_length_total").val((body_material_1_left_length + body_material_1_left_length_allowance).toFixed(2));
        var body_material_1_left_length_total = +$("#body_material_1_left_length_total").val();

        //Body Material 1 Left Width
        var body_material_1_left_width = +$("#body_material_1_left_width").val();
        var body_material_1_left_width_allowance = +$("#body_material_1_left_width_allowance").val();
        $("#body_material_1_left_width_total").val((body_material_1_left_width + body_material_1_left_width_allowance).toFixed(2));
        var body_material_1_left_width_total = +$("#body_material_1_left_width_total").val();

        //Body Material 1 Right Length
        var body_material_1_right_length = +$("#body_material_1_right_length").val();
        var body_material_1_right_length_allowance = +$("#body_material_1_right_length_allowance").val();
        $("#body_material_1_right_length_total").val((body_material_1_right_length + body_material_1_right_length_allowance).toFixed(2));
        var body_material_1_right_length_total = +$("#body_material_1_right_length_total").val();

        //Body Material 1 Right Width
        var body_material_1_right_width = +$("#body_material_1_right_width").val();
        var body_material_1_right_width_allowance = +$("#body_material_1_right_width_allowance").val();
        $("#body_material_1_right_width_total").val((body_material_1_right_width + body_material_1_right_width_allowance).toFixed(2));
        var body_material_1_right_width_total = +$("#body_material_1_right_width_total").val();

        //Body Material 1 Pocket Length
        var body_material_1_pocket_length = +$("#body_material_1_pocket_length").val();
        var body_material_1_pocket_length_allowance = +$("#body_material_1_pocket_length_allowance").val();
        $("#body_material_1_pocket_length_total").val((body_material_1_pocket_length + body_material_1_pocket_length_allowance).toFixed(2));
        var body_material_1_pocket_length_total = +$("#body_material_1_pocket_length_total").val();

        //Body Material 1 Pocket Width
        var body_material_1_pocket_width = +$("#body_material_1_pocket_width").val();
        var body_material_1_pocket_width_allowance = +$("#body_material_1_pocket_width_allowance").val();
        $("#body_material_1_pocket_width_total").val((body_material_1_right_width + body_material_1_pocket_width_allowance).toFixed(2));
        var body_material_1_pocket_width_total = +$("#body_material_1_pocket_width_total").val();

        //Body Material 1 Extra 1 Length
        var body_material_1_extra_1_length = +$("#body_material_1_extra_1_length").val();
        var body_material_1_extra_1_length_allowance = +$("#body_material_1_extra_1_length_allowance").val();
        $("#body_material_1_extra_1_length_total").val((body_material_1_extra_1_length + body_material_1_extra_1_length_allowance).toFixed(2));
        var body_material_1_extra_1_length_total = +$("#body_material_1_extra_1_length_total").val();

        //Body Material 1 Extra 1 Width
        var body_material_1_extra_1_width = +$("#body_material_1_extra_1_width").val();
        var body_material_1_extra_1_width_allowance = +$("#body_material_1_extra_1_width_allowance").val();
        $("#body_material_1_extra_1_width_total").val((body_material_1_extra_1_width + body_material_1_extra_1_width_allowance).toFixed(2));
        var body_material_1_extra_1_width_total = +$("#body_material_1_extra_1_width_total").val();

        //Body Material 1 Extra 2 Length
        var body_material_1_extra_2_length = +$("#body_material_1_extra_2_length").val();
        var body_material_1_extra_2_length_allowance = +$("#body_material_1_extra_2_length_allowance").val();
        $("#body_material_1_extra_2_length_total").val((body_material_1_extra_2_length + body_material_1_extra_2_length_allowance).toFixed(2));
        var body_material_1_extra_2_length_total = +$("#body_material_1_extra_2_length_total").val();

        //Body Material 1 Extra 2 Width
        var body_material_1_extra_2_width = +$("#body_material_1_extra_2_width").val();
        var body_material_1_extra_2_width_allowance = +$("#body_material_1_extra_2_width_allowance").val();
        $("#body_material_1_extra_2_width_total").val((body_material_1_extra_2_width + body_material_1_extra_2_width_allowance).toFixed(2));
        var body_material_1_extra_2_width_total = +$("#body_material_1_extra_2_width_total").val();

        //Body Material 1 Extra 3 Length
        var body_material_1_extra_3_length = +$("#body_material_1_extra_3_length").val();
        var body_material_1_extra_3_length_allowance = +$("#body_material_1_extra_3_length_allowance").val();
        $("#body_material_1_extra_3_length_total").val((body_material_1_extra_3_length + body_material_1_extra_3_length_allowance).toFixed(2));
        var body_material_1_extra_3_length_total = +$("#body_material_1_extra_3_length_total").val();

        //Body Material 1 Extra 3 Width
        var body_material_1_extra_3_width = +$("#body_material_1_extra_3_width").val();
        var body_material_1_extra_3_width_allowance = +$("#body_material_1_extra_3_width_allowance").val();
        $("#body_material_1_extra_3_width_total").val((body_material_1_extra_3_width + body_material_1_extra_3_width_allowance).toFixed(2));
        var body_material_1_extra_3_width_total = +$("#body_material_1_extra_3_width_total").val();


        /*******************Body Material 2************************************/
        //Body Material 2 front Length
        var body_material_2_front_length = +$("#body_material_2_front_length").val();
        var body_material_2_front_length_allowance = +$("#body_material_2_front_length_allowance").val();
        $("#body_material_2_front_length_total").val((body_material_2_front_length+ body_material_2_front_length_allowance).toFixed(2));
        var body_material_2_front_length_total = +$("#body_material_2_front_length_total").val();

        //Body Material 2 front Width
        var body_material_2_front_width = +$("#body_material_2_front_width").val();
        var body_material_2_front_width_allowance = +$("#body_material_2_front_width_allowance").val();
        $("#body_material_2_front_width_total").val((body_material_2_front_width + body_material_2_front_width_allowance).toFixed(2));
        var body_material_2_front_width_total = +$("#body_material_2_front_width_total").val();

        //Body Material 2 Back Length
        var body_material_2_back_length = +$("#body_material_2_back_length").val();
        var body_material_2_back_length_allowance = +$("#body_material_2_back_length_allowance").val();
        $("#body_material_2_back_length_total").val((body_material_2_back_length+ body_material_2_back_length_allowance).toFixed(2));
        var body_material_2_back_length_total = +$("#body_material_2_back_length_total").val();

        //Body Material 2 Back Width
        var body_material_2_back_width = +$("#body_material_2_back_width").val();
        var body_material_2_back_width_allowance = +$("#body_material_2_back_width_allowance").val();
        $("#body_material_2_back_width_total").val((body_material_2_back_width + body_material_2_back_width_allowance).toFixed(2));
        var body_material_2_back_width_total = +$("#body_material_2_back_width_total").val();

        //Body Material 2 Top Length
        var body_material_2_top_length = +$("#body_material_2_top_length").val();
        var body_material_2_top_length_allowance = +$("#body_material_2_top_length_allowance").val();
        $("#body_material_2_top_length_total").val((body_material_2_top_length + body_material_2_top_length_allowance).toFixed(2));
        var body_material_2_top_length_total = +$("#body_material_2_top_length_total").val();

        //Body Material 2 Top Width
        var body_material_2_top_width = +$("#body_material_2_top_width").val();
        var body_material_2_top_width_allowance = +$("#body_material_2_top_width_allowance").val();
        $("#body_material_2_top_width_total").val((body_material_2_top_width + body_material_2_top_width_allowance).toFixed(2));
        var body_material_2_top_width_total = +$("#body_material_2_top_width_total").val();

        //Body Material 2 Bottom Length
        var body_material_2_bottom_length = +$("#body_material_2_bottom_length").val();
        var body_material_2_bottom_length_allowance = +$("#body_material_2_bottom_length_allowance").val();
        $("#body_material_2_bottom_length_total").val((body_material_2_bottom_length + body_material_2_bottom_length_allowance).toFixed(2));
        var body_material_2_bottom_length_total = +$("#body_material_2_bottom_length_total").val();

        //Body Material 2 Bottom Width
        var body_material_2_bottom_width = +$("#body_material_2_bottom_width").val();
        var body_material_2_bottom_width_allowance = +$("#body_material_2_bottom_width_allowance").val();
        $("#body_material_2_bottom_width_total").val((body_material_2_bottom_width + body_material_2_bottom_width_allowance).toFixed(2));
        var body_material_2_bottom_width_total = +$("#body_material_2_bottom_width_total").val();

        //Body Material 2 Left Length
        var body_material_2_left_length = +$("#body_material_2_left_length").val();
        var body_material_2_left_length_allowance = +$("#body_material_2_left_length_allowance").val();
        $("#body_material_2_left_length_total").val((body_material_2_left_length + body_material_2_left_length_allowance).toFixed(2));
        var body_material_2_left_length_total = +$("#body_material_2_left_length_total").val();

        //Body Material 2 Left Width
        var body_material_2_left_width = +$("#body_material_2_left_width").val();
        var body_material_2_left_width_allowance = +$("#body_material_2_left_width_allowance").val();
        $("#body_material_2_left_width_total").val((body_material_2_left_width + body_material_2_left_width_allowance).toFixed(2));
        var body_material_2_left_width_total = +$("#body_material_2_left_width_total").val();

        //Body Material 2 Right Length
        var body_material_2_right_length = +$("#body_material_2_right_length").val();
        var body_material_2_right_length_allowance = +$("#body_material_2_right_length_allowance").val();
        $("#body_material_2_right_length_total").val((body_material_2_right_length + body_material_2_right_length_allowance).toFixed(2));
        var body_material_2_right_length_total = +$("#body_material_2_right_length_total").val();

        //Body Material 2 Right Width
        var body_material_2_right_width = +$("#body_material_2_right_width").val();
        var body_material_2_right_width_allowance = +$("#body_material_2_right_width_allowance").val();
        $("#body_material_2_right_width_total").val((body_material_2_right_width + body_material_2_right_width_allowance).toFixed(2));
        var body_material_2_right_width_total = +$("#body_material_2_right_width_total").val();

        //Body Material 2 Pocket Length
        var body_material_2_pocket_length = +$("#body_material_2_pocket_length").val();
        var body_material_2_pocket_length_allowance = +$("#body_material_2_pocket_length_allowance").val();
        $("#body_material_2_pocket_length_total").val((body_material_2_pocket_length + body_material_2_pocket_length_allowance).toFixed(2));
        var body_material_2_pocket_length_total = +$("#body_material_2_pocket_length_total").val();

        //Body Material 2 Pocket Width
        var body_material_2_pocket_width = +$("#body_material_2_pocket_width").val();
        var body_material_2_pocket_width_allowance = +$("#body_material_2_pocket_width_allowance").val();
        $("#body_material_2_pocket_width_total").val((body_material_2_right_width + body_material_2_pocket_width_allowance).toFixed(2));
        var body_material_2_pocket_width_total = +$("#body_material_2_pocket_width_total").val();

        //Body Material 2 Extra 1 Length
        var body_material_2_extra_1_length = +$("#body_material_2_extra_1_length").val();
        var body_material_2_extra_1_length_allowance = +$("#body_material_2_extra_1_length_allowance").val();
        $("#body_material_2_extra_1_length_total").val((body_material_2_extra_1_length + body_material_2_extra_1_length_allowance).toFixed(2));
        var body_material_2_extra_1_length_total = +$("#body_material_2_extra_1_length_total").val();

        //Body Material 2 Extra 1 Width
        var body_material_2_extra_1_width = +$("#body_material_2_extra_1_width").val();
        var body_material_2_extra_1_width_allowance = +$("#body_material_2_extra_1_width_allowance").val();
        $("#body_material_2_extra_1_width_total").val((body_material_2_extra_1_width + body_material_2_extra_1_width_allowance).toFixed(2));
        var body_material_2_extra_1_width_total = +$("#body_material_2_extra_1_width_total").val();

        //Body Material 2 Extra 2 Length
        var body_material_2_extra_2_length = +$("#body_material_2_extra_2_length").val();
        var body_material_2_extra_2_length_allowance = +$("#body_material_2_extra_2_length_allowance").val();
        $("#body_material_2_extra_2_length_total").val((body_material_2_extra_2_length + body_material_2_extra_2_length_allowance).toFixed(2));
        var body_material_2_extra_2_length_total = +$("#body_material_2_extra_2_length_total").val();

        //Body Material 2 Extra 2 Width
        var body_material_2_extra_2_width = +$("#body_material_2_extra_2_width").val();
        var body_material_2_extra_2_width_allowance = +$("#body_material_2_extra_2_width_allowance").val();
        $("#body_material_2_extra_2_width_total").val((body_material_2_extra_2_width + body_material_2_extra_2_width_allowance).toFixed(2));
        var body_material_2_extra_2_width_total = +$("#body_material_2_extra_2_width_total").val();

        //Body Material 2 Extra 3 Length
        var body_material_2_extra_3_length = +$("#body_material_2_extra_3_length").val();
        var body_material_2_extra_3_length_allowance = +$("#body_material_2_extra_3_length_allowance").val();
        $("#body_material_2_extra_3_length_total").val((body_material_2_extra_3_length + body_material_2_extra_3_length_allowance).toFixed(2));
        var body_material_2_extra_3_length_total = +$("#body_material_2_extra_3_length_total").val();

        //Body Material 2 Extra 3 Width
        var body_material_2_extra_3_width = +$("#body_material_2_extra_3_width").val();
        var body_material_2_extra_3_width_allowance = +$("#body_material_2_extra_3_width_allowance").val();
        $("#body_material_2_extra_3_width_total").val((body_material_2_extra_3_width + body_material_2_extra_3_width_allowance).toFixed(2));
        var body_material_2_extra_3_width_total = +$("#body_material_2_extra_3_width_total").val();



        /*******************Body Material 3************************************/
        //Body Material 3 front Length
        var body_material_3_front_length = +$("#body_material_3_front_length").val();
        var body_material_3_front_length_allowance = +$("#body_material_3_front_length_allowance").val();
        $("#body_material_3_front_length_total").val((body_material_3_front_length+ body_material_3_front_length_allowance).toFixed(2));
        var body_material_3_front_length_total = +$("#body_material_3_front_length_total").val();

        //Body Material 3 front Width
        var body_material_3_front_width = +$("#body_material_3_front_width").val();
        var body_material_3_front_width_allowance = +$("#body_material_3_front_width_allowance").val();
        $("#body_material_3_front_width_total").val((body_material_3_front_width + body_material_3_front_width_allowance).toFixed(2));
        var body_material_3_front_width_total = +$("#body_material_3_front_width_total").val();

        //Body Material 3 Back Length
        var body_material_3_back_length = +$("#body_material_3_back_length").val();
        var body_material_3_back_length_allowance = +$("#body_material_3_back_length_allowance").val();
        $("#body_material_3_back_length_total").val((body_material_3_back_length+ body_material_3_back_length_allowance).toFixed(2));
        var body_material_3_back_length_total = +$("#body_material_3_back_length_total").val();

        //Body Material 3 Back Width
        var body_material_3_back_width = +$("#body_material_3_back_width").val();
        var body_material_3_back_width_allowance = +$("#body_material_3_back_width_allowance").val();
        $("#body_material_3_back_width_total").val((body_material_3_back_width + body_material_3_back_width_allowance).toFixed(2));
        var body_material_3_back_width_total = +$("#body_material_3_back_width_total").val();

        //Body Material 3 Top Length
        var body_material_3_top_length = +$("#body_material_3_top_length").val();
        var body_material_3_top_length_allowance = +$("#body_material_3_top_length_allowance").val();
        $("#body_material_3_top_length_total").val((body_material_3_top_length + body_material_3_top_length_allowance).toFixed(2));
        var body_material_3_top_length_total = +$("#body_material_3_top_length_total").val();

        //Body Material 3 Top Width
        var body_material_3_top_width = +$("#body_material_3_top_width").val();
        var body_material_3_top_width_allowance = +$("#body_material_3_top_width_allowance").val();
        $("#body_material_3_top_width_total").val((body_material_3_top_width + body_material_3_top_width_allowance).toFixed(2));
        var body_material_3_top_width_total = +$("#body_material_3_top_width_total").val();

        //Body Material 3 Bottom Length
        var body_material_3_bottom_length = +$("#body_material_3_bottom_length").val();
        var body_material_3_bottom_length_allowance = +$("#body_material_3_bottom_length_allowance").val();
        $("#body_material_3_bottom_length_total").val((body_material_3_bottom_length + body_material_3_bottom_length_allowance).toFixed(2));
        var body_material_3_bottom_length_total = +$("#body_material_3_bottom_length_total").val();

        //Body Material 3 Bottom Width
        var body_material_3_bottom_width = +$("#body_material_3_bottom_width").val();
        var body_material_3_bottom_width_allowance = +$("#body_material_3_bottom_width_allowance").val();
        $("#body_material_3_bottom_width_total").val((body_material_3_bottom_width + body_material_3_bottom_width_allowance).toFixed(2));
        var body_material_3_bottom_width_total = +$("#body_material_3_bottom_width_total").val();

        //Body Material 3 Left Length
        var body_material_3_left_length = +$("#body_material_3_left_length").val();
        var body_material_3_left_length_allowance = +$("#body_material_3_left_length_allowance").val();
        $("#body_material_3_left_length_total").val((body_material_3_left_length + body_material_3_left_length_allowance).toFixed(2));
        var body_material_3_left_length_total = +$("#body_material_3_left_length_total").val();

        //Body Material 3 Left Width
        var body_material_3_left_width = +$("#body_material_3_left_width").val();
        var body_material_3_left_width_allowance = +$("#body_material_3_left_width_allowance").val();
        $("#body_material_3_left_width_total").val((body_material_3_left_width + body_material_3_left_width_allowance).toFixed(2));
        var body_material_3_left_width_total = +$("#body_material_3_left_width_total").val();

        //Body Material 3 Right Length
        var body_material_3_right_length = +$("#body_material_3_right_length").val();
        var body_material_3_right_length_allowance = +$("#body_material_3_right_length_allowance").val();
        $("#body_material_3_right_length_total").val((body_material_3_right_length + body_material_3_right_length_allowance).toFixed(2));
        var body_material_3_right_length_total = +$("#body_material_3_right_length_total").val();

        //Body Material 3 Right Width
        var body_material_3_right_width = +$("#body_material_3_right_width").val();
        var body_material_3_right_width_allowance = +$("#body_material_3_right_width_allowance").val();
        $("#body_material_3_right_width_total").val((body_material_3_right_width + body_material_3_right_width_allowance).toFixed(2));
        var body_material_3_right_width_total = +$("#body_material_3_right_width_total").val();

        //Body Material 3 Pocket Length
        var body_material_3_pocket_length = +$("#body_material_3_pocket_length").val();
        var body_material_3_pocket_length_allowance = +$("#body_material_3_pocket_length_allowance").val();
        $("#body_material_3_pocket_length_total").val((body_material_3_pocket_length + body_material_3_pocket_length_allowance).toFixed(2));
        var body_material_3_pocket_length_total = +$("#body_material_3_pocket_length_total").val();

        //Body Material 3 Pocket Width
        var body_material_3_pocket_width = +$("#body_material_3_pocket_width").val();
        var body_material_3_pocket_width_allowance = +$("#body_material_3_pocket_width_allowance").val();
        $("#body_material_3_pocket_width_total").val((body_material_3_right_width + body_material_3_pocket_width_allowance).toFixed(2));
        var body_material_3_pocket_width_total = +$("#body_material_3_pocket_width_total").val();

        //Body Material 3 Extra 1 Length
        var body_material_3_extra_1_length = +$("#body_material_3_extra_1_length").val();
        var body_material_3_extra_1_length_allowance = +$("#body_material_3_extra_1_length_allowance").val();
        $("#body_material_3_extra_1_length_total").val((body_material_3_extra_1_length + body_material_3_extra_1_length_allowance).toFixed(2));
        var body_material_3_extra_1_length_total = +$("#body_material_3_extra_1_length_total").val();

        //Body Material 3 Extra 1 Width
        var body_material_3_extra_1_width = +$("#body_material_3_extra_1_width").val();
        var body_material_3_extra_1_width_allowance = +$("#body_material_3_extra_1_width_allowance").val();
        $("#body_material_3_extra_1_width_total").val((body_material_3_extra_1_width + body_material_3_extra_1_width_allowance).toFixed(2));
        var body_material_3_extra_1_width_total = +$("#body_material_3_extra_1_width_total").val();

        //Body Material 3 Extra 2 Length
        var body_material_3_extra_2_length = +$("#body_material_3_extra_2_length").val();
        var body_material_3_extra_2_length_allowance = +$("#body_material_3_extra_2_length_allowance").val();
        $("#body_material_3_extra_2_length_total").val((body_material_3_extra_2_length + body_material_3_extra_2_length_allowance).toFixed(2));
        var body_material_3_extra_2_length_total = +$("#body_material_3_extra_2_length_total").val();

        //Body Material 3 Extra 2 Width
        var body_material_3_extra_2_width = +$("#body_material_3_extra_2_width").val();
        var body_material_3_extra_2_width_allowance = +$("#body_material_3_extra_2_width_allowance").val();
        $("#body_material_3_extra_2_width_total").val((body_material_3_extra_2_width + body_material_3_extra_2_width_allowance).toFixed(2));
        var body_material_3_extra_2_width_total = +$("#body_material_3_extra_2_width_total").val();

        //Body Material 3 Extra 3 Length
        var body_material_3_extra_3_length = +$("#body_material_3_extra_3_length").val();
        var body_material_3_extra_3_length_allowance = +$("#body_material_3_extra_3_length_allowance").val();
        $("#body_material_3_extra_3_length_total").val((body_material_3_extra_3_length + body_material_3_extra_3_length_allowance).toFixed(2));
        var body_material_3_extra_3_length_total = +$("#body_material_3_extra_3_length_total").val();

        //Body Material 3 Extra 3 Width
        var body_material_3_extra_3_width = +$("#body_material_3_extra_3_width").val();
        var body_material_3_extra_3_width_allowance = +$("#body_material_3_extra_3_width_allowance").val();
        $("#body_material_3_extra_3_width_total").val((body_material_3_extra_3_width + body_material_3_extra_3_width_allowance).toFixed(2));
        var body_material_3_extra_3_width_total = +$("#body_material_3_extra_3_width_total").val();


        /*******************Body Material 4************************************/
        //Body Material 4 front Length
        var body_material_4_front_length = +$("#body_material_4_front_length").val();
        var body_material_4_front_length_allowance = +$("#body_material_4_front_length_allowance").val();
        $("#body_material_4_front_length_total").val((body_material_4_front_length+ body_material_4_front_length_allowance).toFixed(2));
        var body_material_4_front_length_total = +$("#body_material_4_front_length_total").val();

        //Body Material 4 front Width
        var body_material_4_front_width = +$("#body_material_4_front_width").val();
        var body_material_4_front_width_allowance = +$("#body_material_4_front_width_allowance").val();
        $("#body_material_4_front_width_total").val((body_material_4_front_width + body_material_4_front_width_allowance).toFixed(2));
        var body_material_4_front_width_total = +$("#body_material_4_front_width_total").val();

        //Body Material 4 Back Length
        var body_material_4_back_length = +$("#body_material_4_back_length").val();
        var body_material_4_back_length_allowance = +$("#body_material_4_back_length_allowance").val();
        $("#body_material_4_back_length_total").val((body_material_4_back_length+ body_material_4_back_length_allowance).toFixed(2));
        var body_material_4_back_length_total = +$("#body_material_4_back_length_total").val();

        //Body Material 4 Back Width
        var body_material_4_back_width = +$("#body_material_4_back_width").val();
        var body_material_4_back_width_allowance = +$("#body_material_4_back_width_allowance").val();
        $("#body_material_4_back_width_total").val((body_material_4_back_width + body_material_4_back_width_allowance).toFixed(2));
        var body_material_4_back_width_total = +$("#body_material_4_back_width_total").val();

        //Body Material 4 Top Length
        var body_material_4_top_length = +$("#body_material_4_top_length").val();
        var body_material_4_top_length_allowance = +$("#body_material_4_top_length_allowance").val();
        $("#body_material_4_top_length_total").val((body_material_4_top_length_allowance + body_material_4_top_length_allowance).toFixed(2));
        var body_material_4_top_length_total = +$("#body_material_4_top_length_total").val();

        //Body Material 4 Top Width
        var body_material_4_top_width = +$("#body_material_4_top_width").val();
        var body_material_4_top_width_allowance = +$("#body_material_4_top_width_allowance").val();
        $("#body_material_4_top_width_total").val((body_material_4_top_width + body_material_4_top_width_allowance).toFixed(2));
        var body_material_4_top_width_total = +$("#body_material_4_top_width_total").val();

        //Body Material 4 Bottom Length
        var body_material_4_bottom_length = +$("#body_material_4_bottom_length").val();
        var body_material_4_bottom_length_allowance = +$("#body_material_4_bottom_length_allowance").val();
        $("#body_material_4_bottom_length_total").val((body_material_4_bottom_length + body_material_4_bottom_length_allowance).toFixed(2));
        var body_material_4_bottom_length_total = +$("#body_material_4_bottom_length_total").val();

        //Body Material 4 Bottom Width
        var body_material_4_bottom_width = +$("#body_material_4_bottom_width").val();
        var body_material_4_bottom_width_allowance = +$("#body_material_4_bottom_width_allowance").val();
        $("#body_material_4_bottom_width_total").val((body_material_4_bottom_width + body_material_4_bottom_width_allowance).toFixed(2));
        var body_material_4_bottom_width_total = +$("#body_material_4_bottom_width_total").val();

        //Body Material 4 Left Length
        var body_material_4_left_length = +$("#body_material_4_left_length").val();
        var body_material_4_left_length_allowance = +$("#body_material_4_left_length_allowance").val();
        $("#body_material_4_left_length_total").val((body_material_4_left_length + body_material_4_left_length_allowance).toFixed(2));
        var body_material_4_left_length_total = +$("#body_material_4_left_length_total").val();

        //Body Material 4 Left Width
        var body_material_4_left_width = +$("#body_material_4_left_width").val();
        var body_material_4_left_width_allowance = +$("#body_material_4_left_width_allowance").val();
        $("#body_material_4_left_width_total").val((body_material_4_left_width + body_material_4_left_width_allowance).toFixed(2));
        var body_material_4_left_width_total = +$("#body_material_4_left_width_total").val();

        //Body Material 4 Right Length
        var body_material_4_right_length = +$("#body_material_4_right_length").val();
        var body_material_4_right_length_allowance = +$("#body_material_4_right_length_allowance").val();
        $("#body_material_4_right_length_total").val((body_material_4_right_length + body_material_4_right_length_allowance).toFixed(2));
        var body_material_4_right_length_total = +$("#body_material_4_right_length_total").val();

        //Body Material 4 Right Width
        var body_material_4_right_width = +$("#body_material_4_right_width").val();
        var body_material_4_right_width_allowance = +$("#body_material_4_right_width_allowance").val();
        $("#body_material_4_right_width_total").val((body_material_4_right_width + body_material_4_right_width_allowance).toFixed(2));
        var body_material_4_right_width_total = +$("#body_material_4_right_width_total").val();

        //Body Material 4 Pocket Length
        var body_material_4_pocket_length = +$("#body_material_4_pocket_length").val();
        var body_material_4_pocket_length_allowance = +$("#body_material_4_pocket_length_allowance").val();
        $("#body_material_4_pocket_length_total").val((body_material_4_pocket_length + body_material_4_pocket_length_allowance).toFixed(2));
        var body_material_4_pocket_length_total = +$("#body_material_4_pocket_length_total").val();

        //Body Material 4 Pocket Width
        var body_material_4_pocket_width = +$("#body_material_4_pocket_width").val();
        var body_material_4_pocket_width_allowance = +$("#body_material_4_pocket_width_allowance").val();
        $("#body_material_4_pocket_width_total").val((body_material_4_right_width + body_material_4_pocket_width_allowance).toFixed(2));
        var body_material_4_pocket_width_total = +$("#body_material_4_pocket_width_total").val();

        //Body Material 4 Extra 1 Length
        var body_material_4_extra_1_length = +$("#body_material_4_extra_1_length").val();
        var body_material_4_extra_1_length_allowance = +$("#body_material_4_extra_1_length_allowance").val();
        $("#body_material_4_extra_1_length_total").val((body_material_4_extra_1_length + body_material_4_extra_1_length_allowance).toFixed(2));
        var body_material_4_extra_1_length_total = +$("#body_material_4_extra_1_length_total").val();

        //Body Material 4 Extra 1 Width
        var body_material_4_extra_1_width = +$("#body_material_4_extra_1_width").val();
        var body_material_4_extra_1_width_allowance = +$("#body_material_4_extra_1_width_allowance").val();
        $("#body_material_4_extra_1_width_total").val((body_material_4_extra_1_width + body_material_4_extra_1_width_allowance).toFixed(2));
        var body_material_4_extra_1_width_total = +$("#body_material_4_extra_1_width_total").val();

        //Body Material 4 Extra 2 Length
        var body_material_4_extra_2_length = +$("#body_material_4_extra_2_length").val();
        var body_material_4_extra_2_length_allowance = +$("#body_material_4_extra_2_length_allowance").val();
        $("#body_material_4_extra_2_length_total").val((body_material_4_extra_2_length + body_material_4_extra_2_length_allowance).toFixed(2));
        var body_material_4_extra_2_length_total = +$("#body_material_4_extra_2_length_total").val();

        //Body Material 4 Extra 2 Width
        var body_material_4_extra_2_width = +$("#body_material_4_extra_2_width").val();
        var body_material_4_extra_2_width_allowance = +$("#body_material_4_extra_2_width_allowance").val();
        $("#body_material_4_extra_2_width_total").val((body_material_4_extra_2_width + body_material_4_extra_2_width_allowance).toFixed(2));
        var body_material_4_extra_2_width_total = +$("#body_material_4_extra_2_width_total").val();

        //Body Material 4 Extra 3 Length
        var body_material_4_extra_3_length = +$("#body_material_4_extra_3_length").val();
        var body_material_4_extra_3_length_allowance = +$("#body_material_4_extra_3_length_allowance").val();
        $("#body_material_4_extra_3_length_total").val((body_material_4_extra_3_length + body_material_4_extra_3_length_allowance).toFixed(2));
        var body_material_4_extra_3_length_total = +$("#body_material_4_extra_3_length_total").val();

        //Body Material 4 Extra 3 Width
        var body_material_4_extra_3_width = +$("#body_material_4_extra_3_width").val();
        var body_material_4_extra_3_width_allowance = +$("#body_material_4_extra_3_width_allowance").val();
        $("#body_material_4_extra_3_width_total").val((body_material_4_extra_3_width + body_material_4_extra_3_width_allowance).toFixed(2));
        var body_material_4_extra_3_width_total = +$("#body_material_4_extra_3_width_total").val();



        /*******************Body Material 5************************************/
        //Body Material 5 front Length
        var body_material_5_front_length = +$("#body_material_5_front_length").val();
        var body_material_5_front_length_allowance = +$("#body_material_5_front_length_allowance").val();
        $("#body_material_5_front_length_total").val((body_material_5_front_length+ body_material_5_front_length_allowance).toFixed(2));
        var body_material_5_front_length_total = +$("#body_material_5_front_length_total").val();

        //Body Material 5 front Width
        var body_material_5_front_width = +$("#body_material_5_front_width").val();
        var body_material_5_front_width_allowance = +$("#body_material_5_front_width_allowance").val();
        $("#body_material_5_front_width_total").val((body_material_5_front_width + body_material_5_front_width_allowance).toFixed(2));
        var body_material_5_front_width_total = +$("#body_material_5_front_width_total").val();

        //Body Material 5 Back Length
        var body_material_5_back_length = +$("#body_material_5_back_length").val();
        var body_material_5_back_length_allowance = +$("#body_material_5_back_length_allowance").val();
        $("#body_material_5_back_length_total").val((body_material_5_back_length+ body_material_5_back_length_allowance).toFixed(2));
        var body_material_5_back_length_total = +$("#body_material_5_back_length_total").val();

        //Body Material 5 Back Width
        var body_material_5_back_width = +$("#body_material_5_back_width").val();
        var body_material_5_back_width_allowance = +$("#body_material_5_back_width_allowance").val();
        $("#body_material_5_back_width_total").val((body_material_5_back_width + body_material_5_back_width_allowance).toFixed(2));
        var body_material_5_back_width_total = +$("#body_material_5_back_width_total").val();

        //Body Material 5 Top Length
        var body_material_5_top_length = +$("#body_material_5_top_length").val();
        var body_material_5_top_length_allowance = +$("#body_material_5_top_length_allowance").val();
        $("#body_material_5_top_length_total").val((body_material_5_top_length_allowance + body_material_5_top_length_allowance).toFixed(2));
        var body_material_5_top_length_total = +$("#body_material_5_top_length_total").val();

        //Body Material 5 Top Width
        var body_material_5_top_width = +$("#body_material_5_top_width").val();
        var body_material_5_top_width_allowance = +$("#body_material_5_top_width_allowance").val();
        $("#body_material_5_top_width_total").val((body_material_5_top_width + body_material_5_top_width_allowance).toFixed(2));
        var body_material_5_top_width_total = +$("#body_material_5_top_width_total").val();

        //Body Material 5 Bottom Length
        var body_material_5_bottom_length = +$("#body_material_5_bottom_length").val();
        var body_material_5_bottom_length_allowance = +$("#body_material_5_bottom_length_allowance").val();
        $("#body_material_5_bottom_length_total").val((body_material_5_bottom_length + body_material_5_bottom_length_allowance).toFixed(2));
        var body_material_5_bottom_length_total = +$("#body_material_5_bottom_length_total").val();

        //Body Material 5 Bottom Width
        var body_material_5_bottom_width = +$("#body_material_5_bottom_width").val();
        var body_material_5_bottom_width_allowance = +$("#body_material_5_bottom_width_allowance").val();
        $("#body_material_5_bottom_width_total").val((body_material_5_bottom_width + body_material_5_bottom_width_allowance).toFixed(2));
        var body_material_5_bottom_width_total = +$("#body_material_5_bottom_width_total").val();

        //Body Material 5 Left Length
        var body_material_5_left_length = +$("#body_material_5_left_length").val();
        var body_material_5_left_length_allowance = +$("#body_material_5_left_length_allowance").val();
        $("#body_material_5_left_length_total").val((body_material_5_left_length + body_material_5_left_length_allowance).toFixed(2));
        var body_material_5_left_length_total = +$("#body_material_5_left_length_total").val();

        //Body Material 5 Left Width
        var body_material_5_left_width = +$("#body_material_5_left_width").val();
        var body_material_5_left_width_allowance = +$("#body_material_5_left_width_allowance").val();
        $("#body_material_5_left_width_total").val((body_material_5_left_width + body_material_5_left_width_allowance).toFixed(2));
        var body_material_5_left_width_total = +$("#body_material_5_left_width_total").val();

        //Body Material 5 Right Length
        var body_material_5_right_length = +$("#body_material_5_right_length").val();
        var body_material_5_right_length_allowance = +$("#body_material_5_right_length_allowance").val();
        $("#body_material_5_right_length_total").val((body_material_5_right_length + body_material_5_right_length_allowance).toFixed(2));
        var body_material_5_right_length_total = +$("#body_material_5_right_length_total").val();

        //Body Material 5 Right Width
        var body_material_5_right_width = +$("#body_material_5_right_width").val();
        var body_material_5_right_width_allowance = +$("#body_material_5_right_width_allowance").val();
        $("#body_material_5_right_width_total").val((body_material_5_right_width + body_material_5_right_width_allowance).toFixed(2));
        var body_material_5_right_width_total = +$("#body_material_5_right_width_total").val();

        //Body Material 5 Pocket Length
        var body_material_5_pocket_length = +$("#body_material_5_pocket_length").val();
        var body_material_5_pocket_length_allowance = +$("#body_material_5_pocket_length_allowance").val();
        $("#body_material_5_pocket_length_total").val((body_material_5_pocket_length + body_material_5_pocket_length_allowance).toFixed(2));
        var body_material_5_pocket_length_total = +$("#body_material_5_pocket_length_total").val();

        //Body Material 5 Pocket Width
        var body_material_5_pocket_width = +$("#body_material_5_pocket_width").val();
        var body_material_5_pocket_width_allowance = +$("#body_material_5_pocket_width_allowance").val();
        $("#body_material_5_pocket_width_total").val((body_material_5_right_width + body_material_5_pocket_width_allowance).toFixed(2));
        var body_material_5_pocket_width_total = +$("#body_material_5_pocket_width_total").val();

        //Body Material 5 Extra 1 Length
        var body_material_5_extra_1_length = +$("#body_material_5_extra_1_length").val();
        var body_material_5_extra_1_length_allowance = +$("#body_material_5_extra_1_length_allowance").val();
        $("#body_material_5_extra_1_length_total").val((body_material_5_extra_1_length + body_material_5_extra_1_length_allowance).toFixed(2));
        var body_material_5_extra_1_length_total = +$("#body_material_5_extra_1_length_total").val();

        //Body Material 5 Extra 1 Width
        var body_material_5_extra_1_width = +$("#body_material_5_extra_1_width").val();
        var body_material_5_extra_1_width_allowance = +$("#body_material_5_extra_1_width_allowance").val();
        $("#body_material_5_extra_1_width_total").val((body_material_5_extra_1_width + body_material_5_extra_1_width_allowance).toFixed(2));
        var body_material_5_extra_1_width_total = +$("#body_material_5_extra_1_width_total").val();

        //Body Material 5 Extra 2 Length
        var body_material_5_extra_2_length = +$("#body_material_5_extra_2_length").val();
        var body_material_5_extra_2_length_allowance = +$("#body_material_5_extra_2_length_allowance").val();
        $("#body_material_5_extra_2_length_total").val((body_material_5_extra_2_length + body_material_5_extra_2_length_allowance).toFixed(2));
        var body_material_5_extra_2_length_total = +$("#body_material_5_extra_2_length_total").val();

        //Body Material 5 Extra 2 Width
        var body_material_5_extra_2_width = +$("#body_material_5_extra_2_width").val();
        var body_material_5_extra_2_width_allowance = +$("#body_material_5_extra_2_width_allowance").val();
        $("#body_material_5_extra_2_width_total").val((body_material_5_extra_2_width + body_material_5_extra_2_width_allowance).toFixed(2));
        var body_material_5_extra_2_width_total = +$("#body_material_5_extra_2_width_total").val();

        //Body Material 5 Extra 3 Length
        var body_material_5_extra_3_length = +$("#body_material_5_extra_3_length").val();
        var body_material_5_extra_3_length_allowance = +$("#body_material_5_extra_3_length_allowance").val();
        $("#body_material_5_extra_3_length_total").val((body_material_5_extra_3_length + body_material_5_extra_3_length_allowance).toFixed(2));
        var body_material_5_extra_3_length_total = +$("#body_material_5_extra_3_length_total").val();

        //Body Material 5 Extra 3 Width
        var body_material_5_extra_3_width = +$("#body_material_5_extra_3_width").val();
        var body_material_5_extra_3_width_allowance = +$("#body_material_5_extra_3_width_allowance").val();
        $("#body_material_5_extra_3_width_total").val((body_material_5_extra_3_width + body_material_5_extra_3_width_allowance).toFixed(2));
        var body_material_5_extra_3_width_total = +$("#body_material_5_extra_3_width_total").val();


        /*******************Body Material 6************************************/
        //Body Material 6 front Length
        var body_material_6_front_length = +$("#body_material_6_front_length").val();
        var body_material_6_front_length_allowance = +$("#body_material_6_front_length_allowance").val();
        $("#body_material_6_front_length_total").val((body_material_6_front_length+ body_material_6_front_length_allowance).toFixed(2));
        var body_material_6_front_length_total = +$("#body_material_6_front_length_total").val();

        //Body Material 6 front Width
        var body_material_6_front_width = +$("#body_material_6_front_width").val();
        var body_material_6_front_width_allowance = +$("#body_material_6_front_width_allowance").val();
        $("#body_material_6_front_width_total").val((body_material_6_front_width + body_material_6_front_width_allowance).toFixed(2));
        var body_material_6_front_width_total = +$("#body_material_6_front_width_total").val();

        //Body Material 6 Back Length
        var body_material_6_back_length = +$("#body_material_6_back_length").val();
        var body_material_6_back_length_allowance = +$("#body_material_6_back_length_allowance").val();
        $("#body_material_6_back_length_total").val((body_material_6_back_length+ body_material_6_back_length_allowance).toFixed(2));
        var body_material_6_back_length_total = +$("#body_material_6_back_length_total").val();

        //Body Material 6 Back Width
        var body_material_6_back_width = +$("#body_material_6_back_width").val();
        var body_material_6_back_width_allowance = +$("#body_material_6_back_width_allowance").val();
        $("#body_material_6_back_width_total").val((body_material_6_back_width + body_material_6_back_width_allowance).toFixed(2));
        var body_material_6_back_width_total = +$("#body_material_6_back_width_total").val();

        //Body Material 6 Top Length
        var body_material_6_top_length = +$("#body_material_6_top_length").val();
        var body_material_6_top_length_allowance = +$("#body_material_6_top_length_allowance").val();
        $("#body_material_6_top_length_total").val((body_material_6_top_length_allowance + body_material_6_top_length_allowance).toFixed(2));
        var body_material_6_top_length_total = +$("#body_material_6_top_length_total").val();

        //Body Material 6 Top Width
        var body_material_6_top_width = +$("#body_material_6_top_width").val();
        var body_material_6_top_width_allowance = +$("#body_material_6_top_width_allowance").val();
        $("#body_material_6_top_width_total").val((body_material_6_top_width + body_material_6_top_width_allowance).toFixed(2));
        var body_material_6_top_width_total = +$("#body_material_6_top_width_total").val();

        //Body Material 6 Bottom Length
        var body_material_6_bottom_length = +$("#body_material_6_bottom_length").val();
        var body_material_6_bottom_length_allowance = +$("#body_material_6_bottom_length_allowance").val();
        $("#body_material_6_bottom_length_total").val((body_material_6_bottom_length + body_material_6_bottom_length_allowance).toFixed(2));
        var body_material_6_bottom_length_total = +$("#body_material_6_bottom_length_total").val();

        //Body Material 6 Bottom Width
        var body_material_6_bottom_width = +$("#body_material_6_bottom_width").val();
        var body_material_6_bottom_width_allowance = +$("#body_material_6_bottom_width_allowance").val();
        $("#body_material_6_bottom_width_total").val((body_material_6_bottom_width + body_material_6_bottom_width_allowance).toFixed(2));
        var body_material_6_bottom_width_total = +$("#body_material_6_bottom_width_total").val();

        //Body Material 6 Left Length
        var body_material_6_left_length = +$("#body_material_6_left_length").val();
        var body_material_6_left_length_allowance = +$("#body_material_6_left_length_allowance").val();
        $("#body_material_6_left_length_total").val((body_material_6_left_length + body_material_6_left_length_allowance).toFixed(2));
        var body_material_6_left_length_total = +$("#body_material_6_left_length_total").val();

        //Body Material 6 Left Width
        var body_material_6_left_width = +$("#body_material_6_left_width").val();
        var body_material_6_left_width_allowance = +$("#body_material_6_left_width_allowance").val();
        $("#body_material_6_left_width_total").val((body_material_6_left_width + body_material_6_left_width_allowance).toFixed(2));
        var body_material_6_left_width_total = +$("#body_material_6_left_width_total").val();

        //Body Material 6 Right Length
        var body_material_6_right_length = +$("#body_material_6_right_length").val();
        var body_material_6_right_length_allowance = +$("#body_material_6_right_length_allowance").val();
        $("#body_material_6_right_length_total").val((body_material_6_right_length + body_material_6_right_length_allowance).toFixed(2));
        var body_material_6_right_length_total = +$("#body_material_6_right_length_total").val();

        //Body Material 6 Right Width
        var body_material_6_right_width = +$("#body_material_6_right_width").val();
        var body_material_6_right_width_allowance = +$("#body_material_6_right_width_allowance").val();
        $("#body_material_6_right_width_total").val((body_material_6_right_width + body_material_6_right_width_allowance).toFixed(2));
        var body_material_6_right_width_total = +$("#body_material_6_right_width_total").val();

        //Body Material 6 Pocket Length
        var body_material_6_pocket_length = +$("#body_material_6_pocket_length").val();
        var body_material_6_pocket_length_allowance = +$("#body_material_6_pocket_length_allowance").val();
        $("#body_material_6_pocket_length_total").val((body_material_6_pocket_length + body_material_6_pocket_length_allowance).toFixed(2));
        var body_material_6_pocket_length_total = +$("#body_material_6_pocket_length_total").val();

        //Body Material 6 Pocket Width
        var body_material_6_pocket_width = +$("#body_material_6_pocket_width").val();
        var body_material_6_pocket_width_allowance = +$("#body_material_6_pocket_width_allowance").val();
        $("#body_material_6_pocket_width_total").val((body_material_6_right_width + body_material_6_pocket_width_allowance).toFixed(2));
        var body_material_6_pocket_width_total = +$("#body_material_6_pocket_width_total").val();

        //Body Material 6 Extra 1 Length
        var body_material_6_extra_1_length = +$("#body_material_6_extra_1_length").val();
        var body_material_6_extra_1_length_allowance = +$("#body_material_6_extra_1_length_allowance").val();
        $("#body_material_6_extra_1_length_total").val((body_material_6_extra_1_length + body_material_6_extra_1_length_allowance).toFixed(2));
        var body_material_6_extra_1_length_total = +$("#body_material_6_extra_1_length_total").val();

        //Body Material 6 Extra 1 Width
        var body_material_6_extra_1_width = +$("#body_material_6_extra_1_width").val();
        var body_material_6_extra_1_width_allowance = +$("#body_material_6_extra_1_width_allowance").val();
        $("#body_material_6_extra_1_width_total").val((body_material_6_extra_1_width + body_material_6_extra_1_width_allowance).toFixed(2));
        var body_material_6_extra_1_width_total = +$("#body_material_6_extra_1_width_total").val();

        //Body Material 6 Extra 2 Length
        var body_material_6_extra_2_length = +$("#body_material_6_extra_2_length").val();
        var body_material_6_extra_2_length_allowance = +$("#body_material_6_extra_2_length_allowance").val();
        $("#body_material_6_extra_2_length_total").val((body_material_6_extra_2_length + body_material_6_extra_2_length_allowance).toFixed(2));
        var body_material_6_extra_2_length_total = +$("#body_material_6_extra_2_length_total").val();

        //Body Material 6 Extra 2 Width
        var body_material_6_extra_2_width = +$("#body_material_6_extra_2_width").val();
        var body_material_6_extra_2_width_allowance = +$("#body_material_6_extra_2_width_allowance").val();
        $("#body_material_6_extra_2_width_total").val((body_material_6_extra_2_width + body_material_6_extra_2_width_allowance).toFixed(2));
        var body_material_6_extra_2_width_total = +$("#body_material_6_extra_2_width_total").val();

        //Body Material 6 Extra 3 Length
        var body_material_6_extra_3_length = +$("#body_material_6_extra_3_length").val();
        var body_material_6_extra_3_length_allowance = +$("#body_material_6_extra_3_length_allowance").val();
        $("#body_material_6_extra_3_length_total").val((body_material_6_extra_3_length + body_material_6_extra_3_length_allowance).toFixed(2));
        var body_material_6_extra_3_length_total = +$("#body_material_6_extra_3_length_total").val();

        //Body Material 6 Extra 3 Width
        var body_material_6_extra_3_width = +$("#body_material_6_extra_3_width").val();
        var body_material_6_extra_3_width_allowance = +$("#body_material_6_extra_3_width_allowance").val();
        $("#body_material_6_extra_3_width_total").val((body_material_6_extra_3_width + body_material_6_extra_3_width_allowance).toFixed(2));
        var body_material_6_extra_3_width_total = +$("#body_material_6_extra_3_width_total").val();

        //All Body Material Name
        /*
        var body_material_1_name = +$("#body_material_1_name").val();
        var body_material_2_name = +$("#body_material_2_name").val();
        var body_material_3_name = +$("#body_material_3_name").val();
        var body_material_4_name = +$("#body_material_4_name").val();
        var body_material_5_name = +$("#body_material_5_name").val();
        var body_material_6_name = +$("#body_material_6_name").val();
        */
       // $("#body_material_1").val(body_material_1_name);
       // $("#body_material_11").text(body_material_1_name);

       //Get
        //var bla = $('#body_material_1_name').val();
        //Set
        //$('#body_material_11').text('bla');

        var material_1 = $('#body_material_1_name').val();
        var material_2 = $('#body_material_2_name').val();
        var material_3 = $('#body_material_3_name').val();
        var material_4 = $('#body_material_4_name').val();
        var material_5 = $('#body_material_5_name').val();
        var material_6 = $('#body_material_6_name').val();




        $('.body_material_1_name_text').text(material_1);
        $('.body_material_2_name_text').text(material_2);
        $('.body_material_3_name_text').text(material_3);
        $('.body_material_4_name_text').text(material_4);
        $('.body_material_5_name_text').text(material_5);
        $('.body_material_6_name_text').text(material_6);



        //All Body Material Roll Width
        var body_material_1_roll_1 = $("#body_material_1_roll_1").val();
        var body_material_2_roll_2 = $("#body_material_2_roll_2").val();
        var body_material_3_roll_3 = $("#body_material_3_roll_3").val();
        var body_material_4_roll_4 = $("#body_material_4_roll_4").val();
        var body_material_5_roll_5 = $("#body_material_5_roll_5").val();
        var body_material_6_roll_6 = $("#body_material_6_roll_6").val();


        //All Body Material Consumption
        var body_material_1_consumption = +$("#body_material_1_consumption").val();
        var body_material_2_consumption = +$("#body_material_2_consumption").val();
        var body_material_3_consumption = +$("#body_material_3_consumption").val();
        var body_material_4_consumption = +$("#body_material_4_consumption").val();
        var body_material_5_consumption = +$("#body_material_5_consumption").val();
        var body_material_6_consumption = +$("#body_material_6_consumption").val();

        //Body Material Total Consumption
        $("#body_material_1_consumption").val(((body_material_1_front_length_total*body_material_1_front_width_total)+(body_material_1_back_length_total*body_material_1_back_width_total)+(body_material_1_top_length_total*body_material_1_top_width_total)+(body_material_1_bottom_length_total*body_material_1_bottom_width_total)+(body_material_1_left_length_total*body_material_1_left_width_total)+(body_material_1_right_length_total*body_material_1_right_width_total)+(body_material_1_pocket_length_total*body_material_1_pocket_width_total)+(body_material_1_extra_1_length_total*body_material_1_extra_1_width_total)+(body_material_1_extra_2_length_total*body_material_1_extra_2_width_total)+(body_material_1_extra_3_length_total*body_material_1_extra_3_width_total)).toFixed(2));
        $("#body_material_2_consumption").val(((body_material_2_front_length_total*body_material_2_front_width_total)+(body_material_2_back_length_total*body_material_2_back_width_total)+(body_material_2_top_length_total*body_material_2_top_width_total)+(body_material_2_bottom_length_total*body_material_2_bottom_width_total)+(body_material_2_left_length_total*body_material_2_left_width_total)+(body_material_2_right_length_total*body_material_2_right_width_total)+(body_material_2_pocket_length_total*body_material_2_pocket_width_total)+(body_material_2_extra_1_length_total*body_material_2_extra_1_width_total)+(body_material_2_extra_2_length_total*body_material_2_extra_2_width_total)+(body_material_2_extra_3_length_total*body_material_2_extra_3_width_total)).toFixed(2));
        $("#body_material_3_consumption").val(((body_material_3_front_length_total*body_material_3_front_width_total)+(body_material_3_back_length_total*body_material_3_back_width_total)+(body_material_3_top_length_total*body_material_3_top_width_total)+(body_material_3_bottom_length_total*body_material_3_bottom_width_total)+(body_material_3_left_length_total*body_material_3_left_width_total)+(body_material_3_right_length_total*body_material_3_right_width_total)+(body_material_3_pocket_length_total*body_material_3_pocket_width_total)+(body_material_3_extra_1_length_total*body_material_3_extra_1_width_total)+(body_material_3_extra_2_length_total*body_material_3_extra_2_width_total)+(body_material_3_extra_3_length_total*body_material_3_extra_3_width_total)).toFixed(2));
        $("#body_material_4_consumption").val(((body_material_4_front_length_total*body_material_4_front_width_total)+(body_material_4_back_length_total*body_material_4_back_width_total)+(body_material_4_top_length_total*body_material_4_top_width_total)+(body_material_4_bottom_length_total*body_material_4_bottom_width_total)+(body_material_4_left_length_total*body_material_4_left_width_total)+(body_material_4_right_length_total*body_material_4_right_width_total)+(body_material_4_pocket_length_total*body_material_4_pocket_width_total)+(body_material_4_extra_1_length_total*body_material_4_extra_1_width_total)+(body_material_4_extra_2_length_total*body_material_4_extra_2_width_total)+(body_material_4_extra_3_length_total*body_material_4_extra_3_width_total)).toFixed(2));
        $("#body_material_5_consumption").val(((body_material_5_front_length_total*body_material_5_front_width_total)+(body_material_5_back_length_total*body_material_5_back_width_total)+(body_material_5_top_length_total*body_material_5_top_width_total)+(body_material_5_bottom_length_total*body_material_5_bottom_width_total)+(body_material_5_left_length_total*body_material_5_left_width_total)+(body_material_5_right_length_total*body_material_5_right_width_total)+(body_material_5_pocket_length_total*body_material_5_pocket_width_total)+(body_material_5_extra_1_length_total*body_material_5_extra_1_width_total)+(body_material_5_extra_2_length_total*body_material_5_extra_2_width_total)+(body_material_5_extra_3_length_total*body_material_5_extra_3_width_total)).toFixed(2));
        $("#body_material_6_consumption").val(((body_material_6_front_length_total*body_material_6_front_width_total)+(body_material_6_back_length_total*body_material_6_back_width_total)+(body_material_6_top_length_total*body_material_6_top_width_total)+(body_material_6_bottom_length_total*body_material_6_bottom_width_total)+(body_material_6_left_length_total*body_material_6_left_width_total)+(body_material_6_right_length_total*body_material_6_right_width_total)+(body_material_6_pocket_length_total*body_material_6_pocket_width_total)+(body_material_6_extra_1_length_total*body_material_6_extra_1_width_total)+(body_material_6_extra_2_length_total*body_material_6_extra_2_width_total)+(body_material_6_extra_3_length_total*body_material_6_extra_3_width_total)).toFixed(2));

        //All Body Material Cost
        var body_material_1_cost = $("#body_material_1_cost").val();
        var body_material_2_cost = $("#body_material_2_cost").val();
        var body_material_3_cost = $("#body_material_3_cost").val();
        var body_material_4_cost = $("#body_material_4_cost").val();
        var body_material_5_cost = $("#body_material_5_cost").val();
        var body_material_6_cost = $("#body_material_6_cost").val();

/*
        if((body_material_1_cost && body_material_1_roll_1)==''){
            var body_material_1_roll_1 = $("#body_material_1_roll_1").val(1);
            var body_material_1_cost = $("#body_material_1_cost").val(0);
            var body_material_1_consumption_rate = $("#body_material_1_consumption_rate").val(0);
        }else{
            var body_material_1_roll_1 = $("#body_material_1_roll_1").val();
            var body_material_1_cost = $("#body_material_1_cost").val();
            var body_material_1_consumption_rate = $("#body_material_1_consumption_rate").val();
        }
        */

        //Body Material 1
        if((body_material_1_roll_1 == "")||(body_material_1_roll_1 == 0)){
            var body_material_1_consumption = +$("#body_material_1_consumption").val(0);
            $("#body_material_1_consumption_rate").val((0).toFixed(4));
            $("#body_material_1_consumption_cost").val((0).toFixed(4));
        }else{
            $("#body_material_1_consumption_rate").val((body_material_1_cost/body_material_1_roll_1/0.9144).toFixed(4));
            var body_material_1_consumption_rate = +$("#body_material_1_consumption_rate").val();
            $("#body_material_1_consumption_cost").val((body_material_1_consumption*body_material_1_consumption_rate).toFixed(4));
        }

        //Body Material 2
        if((body_material_2_roll_2 == "")||(body_material_2_roll_2 == 0)){
            var body_material_2_consumption = +$("#body_material_2_consumption").val(0);
            $("#body_material_2_consumption_rate").val((0).toFixed(4));
            $("#body_material_2_consumption_cost").val((0).toFixed(4));
        }else{
            $("#body_material_2_consumption_rate").val((body_material_2_cost/body_material_2_roll_2/0.9144).toFixed(4));
            var body_material_2_consumption_rate = +$("#body_material_2_consumption_rate").val();
            $("#body_material_2_consumption_cost").val((body_material_2_consumption*body_material_2_consumption_rate).toFixed(4));
        }

        //Body Material 3
        if((body_material_3_roll_3 == "")||(body_material_3_roll_3 == 0)){
            var body_material_3_consumption = +$("#body_material_3_consumption").val(0);
            $("#body_material_3_consumption_rate").val((0).toFixed(4));
            $("#body_material_3_consumption_cost").val((0).toFixed(4));
        }else{
            $("#body_material_3_consumption_rate").val((body_material_3_cost/body_material_3_roll_3/0.9144).toFixed(4));
            var body_material_3_consumption_rate = +$("#body_material_3_consumption_rate").val();
            $("#body_material_3_consumption_cost").val((body_material_3_consumption*body_material_2_consumption_rate).toFixed(4));
        }

        //Body Material 4
        if((body_material_4_roll_4 == "")||(body_material_4_roll_4 == 0)){
            var body_material_4_consumption = +$("#body_material_4_consumption").val(0);
            $("#body_material_4_consumption_rate").val((0).toFixed(4));
            $("#body_material_4_consumption_cost").val((0).toFixed(4));
        }else{
            $("#body_material_4_consumption_rate").val((body_material_4_cost/body_material_4_roll_4/0.9144).toFixed(4));
            var body_material_4_consumption_rate = +$("#body_material_4_consumption_rate").val();
            $("#body_material_4_consumption_cost").val((body_material_4_consumption*body_material_4_consumption_rate).toFixed(4));
        }

        //Body Material 5
        if((body_material_5_roll_5 == "")||(body_material_5_roll_5 == 0)){
            var body_material_5_consumption = +$("#body_material_5_consumption").val(0);
            $("#body_material_5_consumption_rate").val((0).toFixed(4));
            $("#body_material_5_consumption_cost").val((0).toFixed(4));
        }else{
            $("#body_material_5_consumption_rate").val((body_material_5_cost/body_material_5_roll_5/0.9144).toFixed(4));
            var body_material_5_consumption_rate = +$("#body_material_5_consumption_rate").val();
            $("#body_material_5_consumption_cost").val((body_material_5_consumption*body_material_5_consumption_rate).toFixed(4));
        }

        //Body Material 6
        if((body_material_6_roll_6 == "")||(body_material_6_roll_6 == 0)){
            var body_material_6_consumption = +$("#body_material_6_consumption").val(0);
            $("#body_material_6_consumption_rate").val((0).toFixed(4));
            $("#body_material_6_consumption_cost").val((0).toFixed(4));
        }else{
            $("#body_material_6_consumption_rate").val((body_material_6_cost/body_material_6_roll_6/0.9144).toFixed(4));
            var body_material_6_consumption_rate = +$("#body_material_6_consumption_rate").val();
            $("#body_material_6_consumption_cost").val((body_material_6_consumption*body_material_6_consumption_rate).toFixed(4));
        }



        //All Body Material Consumption Rate from (All Body Material * All Body Material Roll Width)
        //$("#body_material_1_consumption_rate").val((body_material_1_cost/body_material_1_roll_1/0.9144).toFixed(4));
        //$("#body_material_2_consumption_rate").val((body_material_2_cost/body_material_2_roll_2/0.9144).toFixed(4));
        //$("#body_material_3_consumption_rate").val((body_material_3_cost/body_material_3_roll_3/0.9144).toFixed(4));
        //$("#body_material_4_consumption_rate").val((body_material_4_cost/body_material_4_roll_4/0.9144).toFixed(4));
        //$("#body_material_5_consumption_rate").val((body_material_5_cost/body_material_5_roll_5/0.9144).toFixed(4));
        //$("#body_material_6_consumption_rate").val((body_material_6_cost/body_material_6_roll_6/0.9144).toFixed(4));

        //All Body Material Consumption Rate in Variable

        //var body_material_2_consumption_rate = +$("#body_material_2_consumption_rate").val();
       // var body_material_3_consumption_rate = +$("#body_material_3_consumption_rate").val();
        //var body_material_4_consumption_rate = +$("#body_material_4_consumption_rate").val();
        //var body_material_5_consumption_rate = +$("#body_material_5_consumption_rate").val();
        //var body_material_6_consumption_rate = +$("#body_material_6_consumption_rate").val();

        //All Body Material Final Cost

        //$("#body_material_2_consumption_cost").val((body_material_2_consumption*body_material_2_consumption_rate).toFixed(4));
        //$("#body_material_3_consumption_cost").val((body_material_3_consumption*body_material_3_consumption_rate).toFixed(4));
        //$("#body_material_4_consumption_cost").val((body_material_4_consumption*body_material_4_consumption_rate).toFixed(4));
       // $("#body_material_5_consumption_cost").val((body_material_5_consumption*body_material_5_consumption_rate).toFixed(4));
       // $("#body_material_6_consumption_cost").val((body_material_6_consumption*body_material_6_consumption_rate).toFixed(4));


        /******************************************/
        /**************Trims in Yards**************/
        /******************************************/

        //Zipper Cost
        var zipper_cost = +$("#zipper_cost").val();
        //Consumption Rate
        $("#zipper_consumption_rate").val((zipper_cost/0.9144).toFixed(4));
        var zipper_consumption = +$("#zipper_consumption").val();
        var zipper_consumption_rate = +$("#zipper_consumption_rate").val();
        //Total Zipper Cost
        $("#zipper_consumption_cost").val((zipper_consumption*zipper_consumption_rate).toFixed(4));


        //2 Inch Webbing Cost
        var two_inch_webbing_cost = +$("#two_inch_webbing_cost").val();
        //Consumption Rate
        $("#two_inch_webbing_consumption_rate").val((two_inch_webbing_cost/0.9144).toFixed(4));
        var two_inch_webbing_consumption = +$("#two_inch_webbing_consumption").val();
        var two_inch_webbing_consumption_rate = +$("#two_inch_webbing_consumption_rate").val();
        //Total Webbing Cost
        $("#two_inch_webbing_consumption_cost").val((two_inch_webbing_consumption*two_inch_webbing_consumption_rate).toFixed(4));


        //1.5 Inch Webbing Cost
        var one_and_half_inch_webbing_cost = +$("#one_and_half_inch_webbing_cost").val();
        //Consumption Rate
        $("#one_and_half_inch_webbing_consumption_rate").val((one_and_half_inch_webbing_cost/0.9144).toFixed(4));
        var one_and_half_inch_webbing_consumption = +$("#one_and_half_inch_webbing_consumption").val();
        var one_and_half_inch_webbing_consumption_rate = +$("#one_and_half_inch_webbing_consumption_rate").val();
        //Total Webbing Cost
        $("#one_and_half_inch_webbing_consumption_cost").val((one_and_half_inch_webbing_consumption*one_and_half_inch_webbing_consumption_rate).toFixed(4));


        //Velcro Cost
        var velcro_cost = +$("#velcro_cost").val();
        //Consumption Rate
        $("#velcro_consumption_rate").val((velcro_cost/0.9144).toFixed(4));
        var velcro_consumption = +$("#velcro_consumption").val();
        var velcro_consumption_rate = +$("#velcro_consumption_rate").val();
        //Total Velcro Cost
        $("#velcro_consumption_cost").val((velcro_consumption*velcro_consumption_rate).toFixed(4));


        //Extra Trim Yard 1
        var extra_trim_yard_1_cost = +$("#extra_trim_yard_1_cost").val();
        //Consumption Rate
        $("#extra_trim_yard_1_consumption_rate").val((extra_trim_yard_1_cost/0.9144).toFixed(4));
        var extra_trim_yard_1_consumption = +$("#extra_trim_yard_1_consumption").val();
        var extra_trim_yard_1_consumption_rate = +$("#extra_trim_yard_1_consumption_rate").val();
        //Total Velcro Cost
        $("#extra_trim_yard_1_consumption_cost").val((extra_trim_yard_1_consumption*extra_trim_yard_1_consumption_rate).toFixed(4));


        //Extra Trim Yard 2
        var extra_trim_yard_2_cost = +$("#extra_trim_yard_2_cost").val();
        //Consumption Rate
        $("#extra_trim_yard_2_consumption_rate").val((extra_trim_yard_2_cost/0.9144).toFixed(4));
        var extra_trim_yard_2_consumption = +$("#extra_trim_yard_2_consumption").val();
        var extra_trim_yard_2_consumption_rate = +$("#extra_trim_yard_2_consumption_rate").val();
        //Total Velcro Cost
        $("#extra_trim_yard_2_consumption_cost").val((extra_trim_yard_2_consumption*extra_trim_yard_2_consumption_rate).toFixed(4));


        //Extra Trim Yard 2
        var extra_trim_yard_3_cost = +$("#extra_trim_yard_3_cost").val();
        //Consumption Rate
        $("#extra_trim_yard_3_consumption_rate").val((extra_trim_yard_3_cost/0.9144).toFixed(4));
        var extra_trim_yard_3_consumption = +$("#extra_trim_yard_3_consumption").val();
        var extra_trim_yard_3_consumption_rate = +$("#extra_trim_yard_3_consumption_rate").val();
        //Total Velcro Cost
        $("#extra_trim_yard_3_consumption_cost").val((extra_trim_yard_3_consumption*extra_trim_yard_3_consumption_rate).toFixed(4));



        /******************************************/
        /**************Trims in Piece**************/
        /******************************************/

        //Puller Cost
        var puller_cost = +$("#puller_cost").val();
        $("#puller_consumption_rate").val((puller_cost).toFixed(3));
        var puller_consumption = +$("#puller_consumption").val();
        var puller_consumption_rate = +$("#puller_consumption_rate").val();
        $("#puller_consumption_cost").val((puller_consumption*puller_consumption_rate).toFixed(4));


        //Print Cost
        var print_cost = +$("#print_cost").val();
        $("#print_consumption_rate").val((print_cost).toFixed(3));
        var print_consumption = +$("#print_consumption").val();
        var print_consumption_rate = +$("#print_consumption_rate").val();
        $("#print_consumption_cost").val((print_consumption*print_consumption_rate).toFixed(4));


        //Buckle Cost
        var buckle_cost = +$("#buckle_cost").val();
        $("#buckle_consumption_rate").val((buckle_cost).toFixed(3));
        var buckle_consumption = +$("#buckle_consumption").val();
        var buckle_consumption_rate = +$("#buckle_consumption_rate").val();
        $("#buckle_consumption_cost").val((buckle_consumption*buckle_consumption_rate).toFixed(4));


        //Swivel Hook Cost
        var swivel_hook_cost = +$("#swivel_hook_cost").val();
        $("#swivel_hook_consumption_rate").val((swivel_hook_cost).toFixed(3));
        var swivel_hook_consumption = +$("#swivel_hook_consumption").val();
        var swivel_hook_consumption_rate = +$("#buckle_consumption_rate").val();
        $("#swivel_hook_consumption_cost").val((swivel_hook_consumption*swivel_hook_consumption_rate).toFixed(4));


        //Adjustable Buckle Cost
        var adjustable_buckle_cost = +$("#adjustable_buckle_cost").val();
        $("#adjustable_buckle_consumption_rate").val((adjustable_buckle_cost).toFixed(3));
        var adjustable_buckle_consumption = +$("#adjustable_buckle_consumption").val();
        var adjustable_buckle_consumption_rate = +$("#adjustable_buckle_consumption_rate").val();
        $("#adjustable_buckle_consumption_cost").val((adjustable_buckle_consumption*adjustable_buckle_consumption_rate).toFixed(4));

        //Magnetic Button Cost
        var magnetic_button_cost = +$("#magnetic_button_cost").val();
        $("#magnetic_button_consumption_rate").val((magnetic_button_cost).toFixed(3));
        var magnetic_button_consumption = +$("#magnetic_button_consumption").val();
        var magnetic_button_consumption_rate = +$("#magnetic_button_consumption_rate").val();
        $("#magnetic_button_consumption_cost").val((magnetic_button_consumption*magnetic_button_consumption_rate).toFixed(4));


        //Snap Button Cost
        var snap_button_cost = +$("#snap_button_cost").val();
        $("#snap_button_consumption_rate").val((snap_button_cost).toFixed(3));
        var snap_button_consumption = +$("#snap_button_consumption").val();
        var snap_button_consumption_rate = +$("#snap_button_consumption_rate").val();
        $("#snap_button_consumption_cost").val((snap_button_consumption*snap_button_consumption_rate).toFixed(4));


        //Rivet Cost
        var rivet_cost = +$("#rivet_cost").val();
        $("#rivet_consumption_rate").val((rivet_cost).toFixed(3));
        var rivet_consumption = +$("#rivet_consumption").val();
        var rivet_consumption_rate = +$("#rivet_consumption_rate").val();
        $("#rivet_consumption_cost").val((rivet_consumption*rivet_consumption_rate).toFixed(4));


        //Bottom Base Cost
        var bottom_base_cost = +$("#bottom_base_cost").val();
        $("#bottom_base_consumption_rate").val((bottom_base_cost).toFixed(3));
        var bottom_base_consumption = +$("#bottom_base_consumption").val();
        var bottom_base_consumption_rate = +$("#bottom_base_consumption_rate").val();
        $("#bottom_base_consumption_cost").val((bottom_base_consumption*bottom_base_consumption_rate).toFixed(4));


        //Thread Cost
        var thread_cost = +$("#thread_cost").val();
        $("#thread_consumption_rate").val((thread_cost).toFixed(3));
        var thread_consumption = +$("#thread_consumption").val();
        var thread_consumption_rate = +$("#thread_consumption_rate").val();
        $("#thread_consumption_cost").val((thread_consumption*thread_consumption_rate).toFixed(4));


        //Tag Cost
        var tag_cost = +$("#tag_cost").val();
        $("#tag_consumption_rate").val((tag_cost).toFixed(3));
        var tag_consumption = +$("#tag_consumption").val();
        var tag_consumption_rate = +$("#tag_consumption_rate").val();
        $("#tag_consumption_cost").val((tag_consumption*tag_consumption_rate).toFixed(4));


        //Label Cost
        var label_cost = +$("#label_cost").val();
        $("#label_consumption_rate").val((label_cost).toFixed(3));
        var label_consumption = +$("#label_consumption").val();
        var label_consumption_rate = +$("#label_consumption_rate").val();
        $("#label_consumption_cost").val((label_consumption*label_consumption_rate).toFixed(4));


        //Packing Cost
        var packing_cost = +$("#packing_cost").val();
        $("#packing_consumption_rate").val((packing_cost).toFixed(3));
        var packing_consumption = +$("#packing_consumption").val();
        var packing_consumption_rate = +$("#packing_consumption_rate").val();
        $("#packing_consumption_cost").val((packing_consumption*packing_consumption_rate).toFixed(4));


        //Bottom Shoe Cost
        var bottom_shoe_cost = +$("#bottom_shoe_cost").val();
        $("#bottom_shoe_consumption_rate").val((bottom_shoe_cost).toFixed(3));
        var bottom_shoe_consumption = +$("#bottom_shoe_consumption").val();
        var bottom_shoe_consumption_rate = +$("#bottom_shoe_consumption_rate").val();
        $("#bottom_shoe_consumption_cost").val((bottom_shoe_consumption*bottom_shoe_consumption_rate).toFixed(4));


        //Extra 1
        var extra_1_piece_cost = +$("#extra_1_piece_cost").val();
        $("#extra_1_piece_consumption_rate").val((extra_1_piece_cost).toFixed(3));
        var extra_1_piece_consumption = +$("#extra_1_piece_consumption").val();
        var extra_1_piece_consumption_rate = +$("#extra_1_piece_consumption_rate").val();
        $("#extra_1_piece_consumption_cost").val((extra_1_piece_consumption*extra_1_piece_consumption_rate).toFixed(4));

        //Extra 2
        var extra_2_piece_cost = +$("#extra_2_piece_cost").val();
        $("#extra_2_piece_consumption_rate").val((extra_2_piece_cost).toFixed(3));
        var extra_2_piece_consumption = +$("#extra_2_piece_consumption").val();
        var extra_2_piece_consumption_rate = +$("#extra_2_piece_consumption_rate").val();
        $("#extra_2_piece_consumption_cost").val((extra_2_piece_consumption*extra_2_piece_consumption_rate).toFixed(4));

        //Extra 3
        var extra_3_piece_cost = +$("#extra_3_piece_cost").val();
        $("#extra_3_piece_consumption_rate").val((extra_3_piece_cost).toFixed(3));
        var extra_3_piece_consumption = +$("#extra_3_piece_consumption").val();
        var extra_3_piece_consumption_rate = +$("#extra_3_piece_consumption_rate").val();
        $("#extra_3_piece_consumption_cost").val((extra_3_piece_consumption*extra_3_piece_consumption_rate).toFixed(4));

        //Extra 4
        var extra_4_piece_cost = +$("#extra_4_piece_cost").val();
        $("#extra_4_piece_consumption_rate").val((extra_4_piece_cost).toFixed(3));
        var extra_4_piece_consumption = +$("#extra_4_piece_consumption").val();
        var extra_4_piece_consumption_rate = +$("#extra_4_piece_consumption_rate").val();
        $("#extra_4_piece_consumption_cost").val((extra_4_piece_consumption*extra_4_piece_consumption_rate).toFixed(4));


        //Extra 5
        var extra_5_piece_cost = +$("#extra_5_piece_cost").val();
        $("#extra_5_piece_consumption_rate").val((extra_5_piece_cost).toFixed(3));
        var extra_5_piece_consumption = +$("#extra_5_piece_consumption").val();
        var extra_5_piece_consumption_rate = +$("#extra_5_piece_consumption_rate").val();
        $("#extra_5_piece_consumption_cost").val((extra_5_piece_consumption*extra_5_piece_consumption_rate).toFixed(4));


        /*******Total Material Including Wastage*************/
        var order_wastage = +$("#order_wastage").val();

        /*****Body Material Variable*****/
        var body_material_1_consumption_cost = +$("#body_material_1_consumption_cost").val();
        var body_material_2_consumption_cost = +$("#body_material_2_consumption_cost").val();
        var body_material_3_consumption_cost = +$("#body_material_3_consumption_cost").val();
        var body_material_4_consumption_cost = +$("#body_material_4_consumption_cost").val();
        var body_material_5_consumption_cost = +$("#body_material_5_consumption_cost").val();
        var body_material_6_consumption_cost = +$("#body_material_6_consumption_cost").val();

        var all_body_material = body_material_1_consumption_cost+body_material_2_consumption_cost+body_material_3_consumption_cost+body_material_4_consumption_cost+body_material_5_consumption_cost+body_material_6_consumption_cost;

        /*****Trims in Yard Variable*****/
        var zipper_consumption_cost = +$("#zipper_consumption_cost").val();
        var two_inch_webbing_consumption_cost = +$("#two_inch_webbing_consumption_cost").val();
        var one_and_half_inch_webbing_consumption_cost = +$("#one_and_half_inch_webbing_consumption_cost").val();
        var velcro_consumption_cost = +$("#velcro_consumption_cost").val();
        var extra_trim_yard_1_consumption_cost = +$("#extra_trim_yard_1_consumption_cost").val();
        var extra_trim_yard_2_consumption_cost = +$("#extra_trim_yard_2_consumption_cost").val();
        var extra_trim_yard_3_consumption_cost = +$("#extra_trim_yard_3_consumption_cost").val();

        var all_trims_in_yard = zipper_consumption_cost+two_inch_webbing_consumption_cost+one_and_half_inch_webbing_consumption_cost+velcro_consumption_cost+extra_trim_yard_1_consumption_cost+extra_trim_yard_2_consumption_cost+extra_trim_yard_3_consumption_cost;

        /*****Trims in Piece Variable*****/
        var puller_consumption_cost = +$("#puller_consumption_cost").val();
        var print_consumption_cost = +$("#print_consumption_cost").val();
        var buckle_consumption_cost = +$("#buckle_consumption_cost").val();
        var swivel_hook_consumption_cost = +$("#swivel_hook_consumption_cost").val();
        var adjustable_buckle_consumption_cost = +$("#adjustable_buckle_consumption_cost").val();
        var magnetic_button_consumption_cost = +$("#magnetic_button_consumption_cost").val();
        var snap_button_consumption_cost = +$("#snap_button_consumption_cost").val();
        var rivet_consumption_cost = +$("#rivet_consumption_cost").val();
        var bottom_base_consumption_cost = +$("#bottom_base_consumption_cost").val();
        var thread_consumption_cost = +$("#thread_consumption_cost").val();
        var tag_consumption_cost = +$("#tag_consumption_cost").val();
        var label_consumption_cost = +$("#label_consumption_cost").val();
        var packing_consumption_cost = +$("#packing_consumption_cost").val();
        var bottom_shoe_consumption_cost = +$("#bottom_shoe_consumption_cost").val();
        var extra_1_piece_consumption_cost = +$("#extra_1_piece_consumption_cost").val();
        var extra_2_piece_consumption_cost = +$("#extra_2_piece_consumption_cost").val();
        var extra_3_piece_consumption_cost = +$("#extra_3_piece_consumption_cost").val();
        var extra_4_piece_consumption_cost = +$("#extra_4_piece_consumption_cost").val();
        var extra_5_piece_consumption_cost = +$("#extra_5_piece_consumption_cost").val();

        var all_trims_in_piece = puller_consumption_cost+print_consumption_cost+buckle_consumption_cost+swivel_hook_consumption_cost+adjustable_buckle_consumption_cost+magnetic_button_consumption_cost+snap_button_consumption_cost+rivet_consumption_cost+bottom_base_consumption_cost+thread_consumption_cost+tag_consumption_cost+label_consumption_cost+packing_consumption_cost+bottom_shoe_consumption_cost+extra_1_piece_consumption_cost+extra_2_piece_consumption_cost+extra_3_piece_consumption_cost+extra_4_piece_consumption_cost+extra_5_piece_consumption_cost;

       // $("#order_total_material_inc_wastage").val(((ppnw_consumption_cost+zipper_consumption_cost+webbing_consumption_cost+draw_string_consumption_cost+velcro_consumption_cost+tape_consumption_cost+extra_trim_yard_1_consumption_cost+extra_trim_yard_2_consumption_cost+puller_consumption_cost+print_consumption_cost+eyelet_consumption_cost+buckle_consumption_cost+snap_button_consumption_cost+magnetic_button_consumption_cost+bottom_base_consumption_cost+thread_consumption_cost+tag_consumption_cost+label_consumption_cost+packing_consumption_cost+extra_1_piece_consumption_cost+extra_2_piece_consumption_cost+extra_3_piece_consumption_cost)*(1+(order_wastage/100))).toFixed(4));
        $("#order_total_material_inc_wastage").val(((all_body_material+all_trims_in_yard+all_trims_in_piece)*(1+(order_wastage/100))).toFixed(4));

        //$("#final_material_cost").text(((ppnw_consumption_cost+zipper_consumption_cost+webbing_consumption_cost+draw_string_consumption_cost+velcro_consumption_cost+tape_consumption_cost+extra_trim_yard_1_consumption_cost+extra_trim_yard_2_consumption_cost+puller_consumption_cost+print_consumption_cost+eyelet_consumption_cost+buckle_consumption_cost+snap_button_consumption_cost+magnetic_button_consumption_cost+bottom_base_consumption_cost+thread_consumption_cost+tag_consumption_cost+label_consumption_cost+packing_consumption_cost+extra_1_piece_consumption_cost+extra_2_piece_consumption_cost+extra_3_piece_consumption_cost)*(1+(order_wastage/100))).toFixed(4));
        // $("#final_material_cost_hidden").val(((ppnw_consumption_cost+zipper_consumption_cost+webbing_consumption_cost+draw_string_consumption_cost+velcro_consumption_cost+tape_consumption_cost+extra_trim_yard_1_consumption_cost+extra_trim_yard_2_consumption_cost+puller_consumption_cost+print_consumption_cost+eyelet_consumption_cost+buckle_consumption_cost+snap_button_consumption_cost+magnetic_button_consumption_cost+bottom_base_consumption_cost+thread_consumption_cost+tag_consumption_cost+label_consumption_cost+packing_consumption_cost+extra_1_piece_consumption_cost+extra_2_piece_consumption_cost+extra_3_piece_consumption_cost)*(1+(order_wastage/100))).toFixed(4));
        $("#final_material_cost").val(((all_body_material+all_trims_in_yard+all_trims_in_piece)*(1+(order_wastage/100))).toFixed(4));
        $("#final_material_cost_hidden").val(((all_body_material+all_trims_in_yard+all_trims_in_piece)*(1+(order_wastage/100))).toFixed(4));


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
        $("#total_overhead_and_other_hidden").val((sewing_cost+overheads_cost+transport_per_bag+bank_document_cost_per_bag).toFixed(4));


        /*******Total Cost*************/
        var order_total_material_wastage_included = +$("#order_total_material_inc_wastage").val();
        var order_total_overhead_and_others = +$("#total_overhead_and_other").text();

        $("#total_cost").text((order_total_material_wastage_included+order_total_overhead_and_others).toFixed(4));
        $("#total_cost_hidden").val((order_total_material_wastage_included+order_total_overhead_and_others).toFixed(4));



        /*******Final Price*************/
        var total_final_cost = +$("#total_cost").text();

        //console.log("Final Cost"+total_final_cost);

        var margin =  +$("#order_margin").val();

        $("#final_price").text((total_final_cost*(1+(margin/100))).toFixed(4));
        $("#final_price_hidden").val((total_final_cost*(1+(margin/100))).toFixed(4));


        /*********************/





        /****************Company Info***********************/
        var company_name_prag = $("#order_company").val();

        var matches = company_name_prag.match(/\b(\w)/g);
        var acronym = matches.join('');

        //var name = acronym+date;
        var date = $('#order_date').datepicker({ dateFormat: 'ddmmy' }).val();

        // document.write(date);
        //console.log(date);

        // Joining the date and company names first letters and add them into order id
        $('#order_id').val(acronym+date);


    });
});


/************************Quilt and Suit Total Calculation*******************************************/
$(document).ready(function(){
    $(".quilt-and-suit-costing").keyup(function() {

        /*******************Body Material 1************************************/
        //Body Material 1 front Length
        var body_material_1_front_length = +$("#body_material_1_front_length").val();
        var body_material_1_front_length_allowance = +$("#body_material_1_front_length_allowance").val();
        $("#body_material_1_front_length_total").val((body_material_1_front_length+ body_material_1_front_length_allowance).toFixed(2));
        var body_material_1_front_length_total = +$("#body_material_1_front_length_total").val();

        //Body Material 1 front Width
        var body_material_1_front_width = +$("#body_material_1_front_width").val();
        var body_material_1_front_width_allowance = +$("#body_material_1_front_width_allowance").val();
        $("#body_material_1_front_width_total").val((body_material_1_front_width + body_material_1_front_width_allowance).toFixed(2));
        var body_material_1_front_width_total = +$("#body_material_1_front_width_total").val();

        //Body Material 1 Back Length
        var body_material_1_back_length = +$("#body_material_1_back_length").val();
        var body_material_1_back_length_allowance = +$("#body_material_1_back_length_allowance").val();
        $("#body_material_1_back_length_total").val((body_material_1_back_length+ body_material_1_back_length_allowance).toFixed(2));
        var body_material_1_back_length_total = +$("#body_material_1_back_length_total").val();

        //Body Material 1 Back Width
        var body_material_1_back_width = +$("#body_material_1_back_width").val();
        var body_material_1_back_width_allowance = +$("#body_material_1_back_width_allowance").val();
        $("#body_material_1_back_width_total").val((body_material_1_back_width + body_material_1_back_width_allowance).toFixed(2));
        var body_material_1_back_width_total = +$("#body_material_1_back_width_total").val();

        //Body Material 1 Top Length
        var body_material_1_top_length = +$("#body_material_1_top_length").val();
        var body_material_1_top_length_allowance = +$("#body_material_1_top_length_allowance").val();
        $("#body_material_1_top_length_total").val((body_material_1_top_length + body_material_1_top_length_allowance).toFixed(2));
        var body_material_1_top_length_total = +$("#body_material_1_top_length_total").val();

        //Body Material 1 Top Width
        var body_material_1_top_width = +$("#body_material_1_top_width").val();
        var body_material_1_top_width_allowance = +$("#body_material_1_top_width_allowance").val();
        $("#body_material_1_top_width_total").val((body_material_1_top_width + body_material_1_top_width_allowance).toFixed(2));
        var body_material_1_top_width_total = +$("#body_material_1_top_width_total").val();

        //Body Material 1 Bottom Length
        var body_material_1_bottom_length = +$("#body_material_1_bottom_length").val();
        var body_material_1_bottom_length_allowance = +$("#body_material_1_bottom_length_allowance").val();
        $("#body_material_1_bottom_length_total").val((body_material_1_bottom_length + body_material_1_bottom_length_allowance).toFixed(2));
        var body_material_1_bottom_length_total = +$("#body_material_1_bottom_length_total").val();

        //Body Material 1 Bottom Width
        var body_material_1_bottom_width = +$("#body_material_1_bottom_width").val();
        var body_material_1_bottom_width_allowance = +$("#body_material_1_bottom_width_allowance").val();
        $("#body_material_1_bottom_width_total").val((body_material_1_bottom_width + body_material_1_bottom_width_allowance).toFixed(2));
        var body_material_1_bottom_width_total = +$("#body_material_1_bottom_width_total").val();

        //Body Material 1 Left Length
        var body_material_1_left_length = +$("#body_material_1_left_length").val();
        var body_material_1_left_length_allowance = +$("#body_material_1_left_length_allowance").val();
        $("#body_material_1_left_length_total").val((body_material_1_left_length + body_material_1_left_length_allowance).toFixed(2));
        var body_material_1_left_length_total = +$("#body_material_1_left_length_total").val();

        //Body Material 1 Left Width
        var body_material_1_left_width = +$("#body_material_1_left_width").val();
        var body_material_1_left_width_allowance = +$("#body_material_1_left_width_allowance").val();
        $("#body_material_1_left_width_total").val((body_material_1_left_width + body_material_1_left_width_allowance).toFixed(2));
        var body_material_1_left_width_total = +$("#body_material_1_left_width_total").val();

        //Body Material 1 Right Length
        var body_material_1_right_length = +$("#body_material_1_right_length").val();
        var body_material_1_right_length_allowance = +$("#body_material_1_right_length_allowance").val();
        $("#body_material_1_right_length_total").val((body_material_1_right_length + body_material_1_right_length_allowance).toFixed(2));
        var body_material_1_right_length_total = +$("#body_material_1_right_length_total").val();

        //Body Material 1 Right Width
        var body_material_1_right_width = +$("#body_material_1_right_width").val();
        var body_material_1_right_width_allowance = +$("#body_material_1_right_width_allowance").val();
        $("#body_material_1_right_width_total").val((body_material_1_right_width + body_material_1_right_width_allowance).toFixed(2));
        var body_material_1_right_width_total = +$("#body_material_1_right_width_total").val();

        //Body Material 1 handle Length
        var body_material_1_handle_length = +$("#body_material_1_handle_length").val();
        var body_material_1_handle_length_allowance = +$("#body_material_1_handle_length_allowance").val();
        $("#body_material_1_handle_length_total").val((body_material_1_handle_length + body_material_1_handle_length_allowance).toFixed(2));
        var body_material_1_handle_length_total = +$("#body_material_1_handle_length_total").val();

        //Body Material 1 handle Width
        var body_material_1_handle_width = +$("#body_material_1_handle_width").val();
        var body_material_1_handle_width_allowance = +$("#body_material_1_handle_width_allowance").val();
        $("#body_material_1_handle_width_total").val((body_material_1_handle_width + body_material_1_handle_width_allowance).toFixed(2));
        var body_material_1_handle_width_total = +$("#body_material_1_handle_width_total").val();

        //Body Material 1 Pocket Length
        var body_material_1_pocket_length = +$("#body_material_1_pocket_length").val();
        var body_material_1_pocket_length_allowance = +$("#body_material_1_pocket_length_allowance").val();
        $("#body_material_1_pocket_length_total").val((body_material_1_pocket_length + body_material_1_pocket_length_allowance).toFixed(2));
        var body_material_1_pocket_length_total = +$("#body_material_1_pocket_length_total").val();

        //Body Material 1 Pocket Width
        var body_material_1_pocket_width = +$("#body_material_1_pocket_width").val();
        var body_material_1_pocket_width_allowance = +$("#body_material_1_pocket_width_allowance").val();
        $("#body_material_1_pocket_width_total").val((body_material_1_pocket_width + body_material_1_pocket_width_allowance).toFixed(2));
        var body_material_1_pocket_width_total = +$("#body_material_1_pocket_width_total").val();

        //Body Material 1 piping Length
        var body_material_1_piping_length = +$("#body_material_1_piping_length").val();
        var body_material_1_piping_length_allowance = +$("#body_material_1_piping_length_allowance").val();
        $("#body_material_1_piping_length_total").val((body_material_1_piping_length + body_material_1_piping_length_allowance).toFixed(2));
        var body_material_1_piping_length_total = +$("#body_material_1_piping_length_total").val();

        //Body Material 1 piping Width
        var body_material_1_piping_width = +$("#body_material_1_piping_width").val();
        var body_material_1_piping_width_allowance = +$("#body_material_1_piping_width_allowance").val();
        $("#body_material_1_piping_width_total").val((body_material_1_piping_width + body_material_1_piping_width_allowance).toFixed(2));
        var body_material_1_piping_width_total = +$("#body_material_1_piping_width_total").val();

        /*******************Body Material 1************************************/
        //Body Material 1 front Length
        var body_material_2_front_length = +$("#body_material_2_front_length").val();
        var body_material_2_front_length_allowance = +$("#body_material_2_front_length_allowance").val();
        $("#body_material_2_front_length_total").val((body_material_2_front_length+ body_material_2_front_length_allowance).toFixed(2));
        var body_material_2_front_length_total = +$("#body_material_2_front_length_total").val();

        //Body Material 1 front Width
        var body_material_2_front_width = +$("#body_material_2_front_width").val();
        var body_material_2_front_width_allowance = +$("#body_material_2_front_width_allowance").val();
        $("#body_material_2_front_width_total").val((body_material_2_front_width + body_material_2_front_width_allowance).toFixed(2));
        var body_material_2_front_width_total = +$("#body_material_2_front_width_total").val();

        //Body Material 1 Back Length
        var body_material_2_back_length = +$("#body_material_2_back_length").val();
        var body_material_2_back_length_allowance = +$("#body_material_2_back_length_allowance").val();
        $("#body_material_2_back_length_total").val((body_material_2_back_length+ body_material_2_back_length_allowance).toFixed(2));
        var body_material_2_back_length_total = +$("#body_material_2_back_length_total").val();

        //Body Material 1 Back Width
        var body_material_2_back_width = +$("#body_material_2_back_width").val();
        var body_material_2_back_width_allowance = +$("#body_material_2_back_width_allowance").val();
        $("#body_material_2_back_width_total").val((body_material_2_back_width + body_material_2_back_width_allowance).toFixed(2));
        var body_material_2_back_width_total = +$("#body_material_2_back_width_total").val();

        //Body Material 1 Top Length
        var body_material_2_top_length = +$("#body_material_2_top_length").val();
        var body_material_2_top_length_allowance = +$("#body_material_2_top_length_allowance").val();
        $("#body_material_2_top_length_total").val((body_material_2_top_length + body_material_2_top_length_allowance).toFixed(2));
        var body_material_2_top_length_total = +$("#body_material_2_top_length_total").val();

        //Body Material 1 Top Width
        var body_material_2_top_width = +$("#body_material_2_top_width").val();
        var body_material_2_top_width_allowance = +$("#body_material_2_top_width_allowance").val();
        $("#body_material_2_top_width_total").val((body_material_2_top_width + body_material_2_top_width_allowance).toFixed(2));
        var body_material_2_top_width_total = +$("#body_material_2_top_width_total").val();

        //Body Material 1 Bottom Length
        var body_material_2_bottom_length = +$("#body_material_2_bottom_length").val();
        var body_material_2_bottom_length_allowance = +$("#body_material_2_bottom_length_allowance").val();
        $("#body_material_2_bottom_length_total").val((body_material_2_bottom_length + body_material_2_bottom_length_allowance).toFixed(2));
        var body_material_2_bottom_length_total = +$("#body_material_2_bottom_length_total").val();

        //Body Material 1 Bottom Width
        var body_material_2_bottom_width = +$("#body_material_2_bottom_width").val();
        var body_material_2_bottom_width_allowance = +$("#body_material_2_bottom_width_allowance").val();
        $("#body_material_2_bottom_width_total").val((body_material_2_bottom_width + body_material_2_bottom_width_allowance).toFixed(2));
        var body_material_2_bottom_width_total = +$("#body_material_2_bottom_width_total").val();

        //Body Material 1 Left Length
        var body_material_2_left_length = +$("#body_material_2_left_length").val();
        var body_material_2_left_length_allowance = +$("#body_material_2_left_length_allowance").val();
        $("#body_material_2_left_length_total").val((body_material_2_left_length + body_material_2_left_length_allowance).toFixed(2));
        var body_material_2_left_length_total = +$("#body_material_2_left_length_total").val();

        //Body Material 1 Left Width
        var body_material_2_left_width = +$("#body_material_2_left_width").val();
        var body_material_2_left_width_allowance = +$("#body_material_2_left_width_allowance").val();
        $("#body_material_2_left_width_total").val((body_material_2_left_width + body_material_2_left_width_allowance).toFixed(2));
        var body_material_2_left_width_total = +$("#body_material_2_left_width_total").val();

        //Body Material 1 Right Length
        var body_material_2_right_length = +$("#body_material_2_right_length").val();
        var body_material_2_right_length_allowance = +$("#body_material_2_right_length_allowance").val();
        $("#body_material_2_right_length_total").val((body_material_2_right_length + body_material_2_right_length_allowance).toFixed(2));
        var body_material_2_right_length_total = +$("#body_material_2_right_length_total").val();

        //Body Material 1 Right Width
        var body_material_2_right_width = +$("#body_material_2_right_width").val();
        var body_material_2_right_width_allowance = +$("#body_material_2_right_width_allowance").val();
        $("#body_material_2_right_width_total").val((body_material_2_right_width + body_material_2_right_width_allowance).toFixed(2));
        var body_material_2_right_width_total = +$("#body_material_2_right_width_total").val();

        //Body Material 1 handle Length
        var body_material_2_handle_length = +$("#body_material_2_handle_length").val();
        var body_material_2_handle_length_allowance = +$("#body_material_2_handle_length_allowance").val();
        $("#body_material_2_handle_length_total").val((body_material_2_handle_length + body_material_2_handle_length_allowance).toFixed(2));
        var body_material_2_handle_length_total = +$("#body_material_2_handle_length_total").val();

        //Body Material 1 handle Width
        var body_material_2_handle_width = +$("#body_material_2_handle_width").val();
        var body_material_2_handle_width_allowance = +$("#body_material_2_handle_width_allowance").val();
        $("#body_material_2_handle_width_total").val((body_material_2_handle_width + body_material_2_handle_width_allowance).toFixed(2));
        var body_material_2_handle_width_total = +$("#body_material_2_handle_width_total").val();

        //Body Material 1 Pocket Length
        var body_material_2_pocket_length = +$("#body_material_2_pocket_length").val();
        var body_material_2_pocket_length_allowance = +$("#body_material_2_pocket_length_allowance").val();
        $("#body_material_2_pocket_length_total").val((body_material_2_pocket_length + body_material_2_pocket_length_allowance).toFixed(2));
        var body_material_2_pocket_length_total = +$("#body_material_2_pocket_length_total").val();

        //Body Material 1 Pocket Width
        var body_material_2_pocket_width = +$("#body_material_2_pocket_width").val();
        var body_material_2_pocket_width_allowance = +$("#body_material_2_pocket_width_allowance").val();
        $("#body_material_2_pocket_width_total").val((body_material_2_pocket_width + body_material_2_pocket_width_allowance).toFixed(2));
        var body_material_2_pocket_width_total = +$("#body_material_2_pocket_width_total").val();

        //Body Material 1 piping Length
        var body_material_2_piping_length = +$("#body_material_2_piping_length").val();
        var body_material_2_piping_length_allowance = +$("#body_material_2_piping_length_allowance").val();
        $("#body_material_2_piping_length_total").val((body_material_2_piping_length + body_material_2_piping_length_allowance).toFixed(2));
        var body_material_2_piping_length_total = +$("#body_material_2_piping_length_total").val();

        //Body Material 1 piping Width
        var body_material_2_piping_width = +$("#body_material_2_piping_width").val();
        var body_material_2_piping_width_allowance = +$("#body_material_2_piping_width_allowance").val();
        $("#body_material_2_piping_width_total").val((body_material_2_piping_width + body_material_2_piping_width_allowance).toFixed(2));
        var body_material_2_piping_width_total = +$("#body_material_2_piping_width_total").val();

        /*******************Body Material 3************************************/
        //Body Material 1 front Length
        var body_material_3_front_length = +$("#body_material_3_front_length").val();
        var body_material_3_front_length_allowance = +$("#body_material_3_front_length_allowance").val();
        $("#body_material_3_front_length_total").val((body_material_3_front_length+ body_material_3_front_length_allowance).toFixed(2));
        var body_material_3_front_length_total = +$("#body_material_3_front_length_total").val();

        //Body Material 1 front Width
        var body_material_3_front_width = +$("#body_material_3_front_width").val();
        var body_material_3_front_width_allowance = +$("#body_material_3_front_width_allowance").val();
        $("#body_material_3_front_width_total").val((body_material_3_front_width + body_material_3_front_width_allowance).toFixed(2));
        var body_material_3_front_width_total = +$("#body_material_3_front_width_total").val();

        //Body Material 1 Back Length
        var body_material_3_back_length = +$("#body_material_3_back_length").val();
        var body_material_3_back_length_allowance = +$("#body_material_3_back_length_allowance").val();
        $("#body_material_3_back_length_total").val((body_material_3_back_length+ body_material_3_back_length_allowance).toFixed(2));
        var body_material_3_back_length_total = +$("#body_material_3_back_length_total").val();

        //Body Material 1 Back Width
        var body_material_3_back_width = +$("#body_material_3_back_width").val();
        var body_material_3_back_width_allowance = +$("#body_material_3_back_width_allowance").val();
        $("#body_material_3_back_width_total").val((body_material_3_back_width + body_material_3_back_width_allowance).toFixed(2));
        var body_material_3_back_width_total = +$("#body_material_3_back_width_total").val();

        //Body Material 1 Top Length
        var body_material_3_top_length = +$("#body_material_3_top_length").val();
        var body_material_3_top_length_allowance = +$("#body_material_3_top_length_allowance").val();
        $("#body_material_3_top_length_total").val((body_material_3_top_length + body_material_3_top_length_allowance).toFixed(2));
        var body_material_3_top_length_total = +$("#body_material_3_top_length_total").val();

        //Body Material 1 Top Width
        var body_material_3_top_width = +$("#body_material_3_top_width").val();
        var body_material_3_top_width_allowance = +$("#body_material_3_top_width_allowance").val();
        $("#body_material_3_top_width_total").val((body_material_3_top_width + body_material_3_top_width_allowance).toFixed(2));
        var body_material_3_top_width_total = +$("#body_material_3_top_width_total").val();

        //Body Material 1 Bottom Length
        var body_material_3_bottom_length = +$("#body_material_3_bottom_length").val();
        var body_material_3_bottom_length_allowance = +$("#body_material_3_bottom_length_allowance").val();
        $("#body_material_3_bottom_length_total").val((body_material_3_bottom_length + body_material_3_bottom_length_allowance).toFixed(2));
        var body_material_3_bottom_length_total = +$("#body_material_3_bottom_length_total").val();

        //Body Material 1 Bottom Width
        var body_material_3_bottom_width = +$("#body_material_3_bottom_width").val();
        var body_material_3_bottom_width_allowance = +$("#body_material_3_bottom_width_allowance").val();
        $("#body_material_3_bottom_width_total").val((body_material_3_bottom_width + body_material_3_bottom_width_allowance).toFixed(2));
        var body_material_3_bottom_width_total = +$("#body_material_3_bottom_width_total").val();

        //Body Material 1 Left Length
        var body_material_3_left_length = +$("#body_material_3_left_length").val();
        var body_material_3_left_length_allowance = +$("#body_material_3_left_length_allowance").val();
        $("#body_material_3_left_length_total").val((body_material_3_left_length + body_material_3_left_length_allowance).toFixed(2));
        var body_material_3_left_length_total = +$("#body_material_3_left_length_total").val();

        //Body Material 1 Left Width
        var body_material_3_left_width = +$("#body_material_3_left_width").val();
        var body_material_3_left_width_allowance = +$("#body_material_3_left_width_allowance").val();
        $("#body_material_3_left_width_total").val((body_material_3_left_width + body_material_3_left_width_allowance).toFixed(2));
        var body_material_3_left_width_total = +$("#body_material_3_left_width_total").val();

        //Body Material 1 Right Length
        var body_material_3_right_length = +$("#body_material_3_right_length").val();
        var body_material_3_right_length_allowance = +$("#body_material_3_right_length_allowance").val();
        $("#body_material_3_right_length_total").val((body_material_3_right_length + body_material_3_right_length_allowance).toFixed(2));
        var body_material_3_right_length_total = +$("#body_material_3_right_length_total").val();

        //Body Material 1 Right Width
        var body_material_3_right_width = +$("#body_material_3_right_width").val();
        var body_material_3_right_width_allowance = +$("#body_material_3_right_width_allowance").val();
        $("#body_material_3_right_width_total").val((body_material_3_right_width + body_material_3_right_width_allowance).toFixed(2));
        var body_material_3_right_width_total = +$("#body_material_3_right_width_total").val();

        //Body Material 1 handle Length
        var body_material_3_handle_length = +$("#body_material_3_handle_length").val();
        var body_material_3_handle_length_allowance = +$("#body_material_3_handle_length_allowance").val();
        $("#body_material_3_handle_length_total").val((body_material_3_handle_length + body_material_3_handle_length_allowance).toFixed(2));
        var body_material_3_handle_length_total = +$("#body_material_3_handle_length_total").val();

        //Body Material 1 handle Width
        var body_material_3_handle_width = +$("#body_material_3_handle_width").val();
        var body_material_3_handle_width_allowance = +$("#body_material_3_handle_width_allowance").val();
        $("#body_material_3_handle_width_total").val((body_material_3_handle_width + body_material_3_handle_width_allowance).toFixed(2));
        var body_material_3_handle_width_total = +$("#body_material_3_handle_width_total").val();

        //Body Material 1 Pocket Length
        var body_material_3_pocket_length = +$("#body_material_3_pocket_length").val();
        var body_material_3_pocket_length_allowance = +$("#body_material_3_pocket_length_allowance").val();
        $("#body_material_3_pocket_length_total").val((body_material_3_pocket_length + body_material_3_pocket_length_allowance).toFixed(2));
        var body_material_3_pocket_length_total = +$("#body_material_3_pocket_length_total").val();

        //Body Material 1 Pocket Width
        var body_material_3_pocket_width = +$("#body_material_3_pocket_width").val();
        var body_material_3_pocket_width_allowance = +$("#body_material_3_pocket_width_allowance").val();
        $("#body_material_3_pocket_width_total").val((body_material_3_pocket_width + body_material_3_pocket_width_allowance).toFixed(2));
        var body_material_3_pocket_width_total = +$("#body_material_3_pocket_width_total").val();

        //Body Material 1 piping Length
        var body_material_3_piping_length = +$("#body_material_3_piping_length").val();
        var body_material_3_piping_length_allowance = +$("#body_material_3_piping_length_allowance").val();
        $("#body_material_3_piping_length_total").val((body_material_3_piping_length + body_material_3_piping_length_allowance).toFixed(2));
        var body_material_3_piping_length_total = +$("#body_material_3_piping_length_total").val();

        //Body Material 1 piping Width
        var body_material_3_piping_width = +$("#body_material_3_piping_width").val();
        var body_material_3_piping_width_allowance = +$("#body_material_3_piping_width_allowance").val();
        $("#body_material_3_piping_width_total").val((body_material_3_piping_width + body_material_3_piping_width_allowance).toFixed(2));
        var body_material_3_piping_width_total = +$("#body_material_3_piping_width_total").val();


        //All Body Material Roll Width
        var body_material_1_roll_1 = $("#body_material_1_roll_1").val();
        var body_material_2_roll_2 = $("#body_material_2_roll_2").val();
        var body_material_3_roll_3 = $("#body_material_3_roll_3").val();

        //Body Material Total Consumption
        $("#body_material_1_consumption").val(((body_material_1_front_length_total*body_material_1_front_width_total)+(body_material_1_back_length_total*body_material_1_back_width_total)+(body_material_1_top_length_total*body_material_1_top_width_total)+(body_material_1_bottom_length_total*body_material_1_bottom_width_total)+(body_material_1_left_length_total*body_material_1_left_width_total)+(body_material_1_right_length_total*body_material_1_right_width_total)+(body_material_1_pocket_length_total*body_material_1_pocket_width_total)+(body_material_1_handle_length_total*body_material_1_handle_width_total)+(body_material_1_piping_length_total*body_material_1_piping_width_total)).toFixed(2));
        $("#body_material_2_consumption").val(((body_material_2_front_length_total*body_material_2_front_width_total)+(body_material_2_back_length_total*body_material_2_back_width_total)+(body_material_2_top_length_total*body_material_2_top_width_total)+(body_material_2_bottom_length_total*body_material_2_bottom_width_total)+(body_material_2_left_length_total*body_material_2_left_width_total)+(body_material_2_right_length_total*body_material_2_right_width_total)+(body_material_2_pocket_length_total*body_material_2_pocket_width_total)+(body_material_2_handle_length_total*body_material_2_handle_width_total)+(body_material_2_piping_length_total*body_material_2_piping_width_total)).toFixed(2));
        $("#body_material_3_consumption").val(((body_material_3_front_length_total*body_material_3_front_width_total)+(body_material_3_back_length_total*body_material_3_back_width_total)+(body_material_3_top_length_total*body_material_3_top_width_total)+(body_material_3_bottom_length_total*body_material_3_bottom_width_total)+(body_material_3_left_length_total*body_material_3_left_width_total)+(body_material_3_right_length_total*body_material_3_right_width_total)+(body_material_3_pocket_length_total*body_material_3_pocket_width_total)+(body_material_3_handle_length_total*body_material_3_handle_width_total)+(body_material_3_piping_length_total*body_material_3_piping_width_total)).toFixed(2));

        //All Body Material Consumption
        var body_material_1_consumption = +$("#body_material_1_consumption").val();
        var body_material_2_consumption = +$("#body_material_2_consumption").val();
        var body_material_3_consumption = +$("#body_material_3_consumption").val();

        console.log("Body Material 1 consumption: "+body_material_1_consumption);
        console.log("Body Material 2 consumption: "+body_material_2_consumption);
        console.log("Body Material 3 consumption: "+body_material_3_consumption);

        //All Body Material Cost
        var body_material_1_cost = $("#body_material_1_cost").val();
        var body_material_2_cost = $("#body_material_2_cost").val();
        var body_material_3_cost = $("#body_material_3_cost").val();

        console.log("Body Material 1 cost: "+body_material_1_cost);
        console.log("Body Material 2 cost: "+body_material_2_cost);
        console.log("Body Material 3 cost: "+body_material_3_cost);

        //Body Material 1
        if((body_material_1_roll_1 == "")||(body_material_1_roll_1 == 0)){
            var body_material_1_consumption = +$("#body_material_1_consumption").val(0);
            $("#body_material_1_consumption_rate").val((0).toFixed(4));
            $("#body_material_1_consumption_cost").val((0).toFixed(4));
        }else{
            $("#body_material_1_consumption_rate").val((body_material_1_cost/(1000/body_material_1_roll_1)).toFixed(4));
            var body_material_1_consumption_rate = +$("#body_material_1_consumption_rate").val();
            $("#body_material_1_consumption_cost").val((body_material_1_consumption*body_material_1_consumption_rate).toFixed(4));
        }

        //Body Material 2
        if((body_material_2_roll_2 == "")||(body_material_2_roll_2 == 0)){
            var body_material_2_consumption = +$("#body_material_2_consumption").val(0);
            $("#body_material_2_consumption_rate").val((0).toFixed(4));
            $("#body_material_2_consumption_cost").val((0).toFixed(4));
        }else{
            $("#body_material_2_consumption_rate").val((body_material_2_cost/(1000/body_material_2_roll_2)).toFixed(4));
            var body_material_2_consumption_rate = +$("#body_material_2_consumption_rate").val();
            $("#body_material_2_consumption_cost").val((body_material_2_consumption*body_material_2_consumption_rate).toFixed(4));
        }

        //Body Material 3
        if((body_material_3_roll_3 == "")||(body_material_3_roll_3 == 0)){
            var body_material_3_consumption = +$("#body_material_3_consumption").val(0);
            $("#body_material_3_consumption_rate").val((0).toFixed(4));
            $("#body_material_3_consumption_cost").val((0).toFixed(4));
        }else{
            $("#body_material_3_consumption_rate").val((body_material_3_cost/(1000/body_material_3_roll_3)).toFixed(4));
            var body_material_3_consumption_rate = +$("#body_material_3_consumption_rate").val();
            $("#body_material_3_consumption_cost").val((body_material_3_consumption*body_material_3_consumption_rate).toFixed(4));
        }

        /******************************************/
        /**************Trims in Yards**************/
        /******************************************/

        //Zipper Cost
        var zipper_cost = +$("#zipper_cost").val();
        //Consumption Rate
        $("#zipper_consumption_rate").val((zipper_cost/0.9144).toFixed(4));
        var zipper_consumption = +$("#zipper_consumption").val();
        var zipper_consumption_rate = +$("#zipper_consumption_rate").val();
        //Total Zipper Cost
        $("#zipper_consumption_cost").val((zipper_consumption*zipper_consumption_rate).toFixed(4));


        //Webbing Cost
        var webbing_cost = +$("#webbing_cost").val();
        //Consumption Rate
        $("#webbing_consumption_rate").val((webbing_cost/0.9144).toFixed(4));
        var webbing_consumption = +$("#webbing_consumption").val();
        var webbing_consumption_rate = +$("#webbing_consumption_rate").val();
        //Total Velcro Cost
        $("#webbing_consumption_cost").val((webbing_consumption*webbing_consumption_rate).toFixed(4));


        //Draw String Cost
        var draw_string_cost = +$("#draw_string_cost").val();
        //Consumption Rate
        $("#draw_string_consumption_rate").val((draw_string_cost/0.9144).toFixed(4));
        var draw_string_consumption = +$("#draw_string_consumption").val();
        var draw_string_consumption_rate = +$("#draw_string_consumption_rate").val();
        //Total Velcro Cost
        $("#draw_string_consumption_cost").val((draw_string_consumption*draw_string_consumption_rate).toFixed(4));


        //Velcro Cost
        var velcro_cost = +$("#velcro_cost").val();
        //Consumption Rate
        $("#velcro_consumption_rate").val((velcro_cost/0.9144).toFixed(4));
        var velcro_consumption = +$("#velcro_consumption").val();
        var velcro_consumption_rate = +$("#velcro_consumption_rate").val();
        //Total Velcro Cost
        $("#velcro_consumption_cost").val((velcro_consumption*velcro_consumption_rate).toFixed(4));


        //Extra Trim Yard 1
        var extra_trim_yard_1_cost = +$("#extra_trim_yard_1_cost").val();
        //Consumption Rate
        $("#extra_trim_yard_1_consumption_rate").val((extra_trim_yard_1_cost/0.9144).toFixed(4));
        var extra_trim_yard_1_consumption = +$("#extra_trim_yard_1_consumption").val();
        var extra_trim_yard_1_consumption_rate = +$("#extra_trim_yard_1_consumption_rate").val();
        //Total Velcro Cost
        $("#extra_trim_yard_1_consumption_cost").val((extra_trim_yard_1_consumption*extra_trim_yard_1_consumption_rate).toFixed(4));


        //Extra Trim Yard 2
        var extra_trim_yard_2_cost = +$("#extra_trim_yard_2_cost").val();
        //Consumption Rate
        $("#extra_trim_yard_2_consumption_rate").val((extra_trim_yard_2_cost/0.9144).toFixed(4));
        var extra_trim_yard_2_consumption = +$("#extra_trim_yard_2_consumption").val();
        var extra_trim_yard_2_consumption_rate = +$("#extra_trim_yard_2_consumption_rate").val();
        //Total Velcro Cost
        $("#extra_trim_yard_2_consumption_cost").val((extra_trim_yard_2_consumption*extra_trim_yard_2_consumption_rate).toFixed(4));


        //Extra Trim Yard 3
        var extra_trim_yard_3_cost = +$("#extra_trim_yard_3_cost").val();
        //Consumption Rate
        $("#extra_trim_yard_3_consumption_rate").val((extra_trim_yard_3_cost/0.9144).toFixed(4));
        var extra_trim_yard_3_consumption = +$("#extra_trim_yard_3_consumption").val();
        var extra_trim_yard_3_consumption_rate = +$("#extra_trim_yard_3_consumption_rate").val();
        //Total Velcro Cost
        $("#extra_trim_yard_3_consumption_cost").val((extra_trim_yard_3_consumption*extra_trim_yard_3_consumption_rate).toFixed(4));



        /******************************************/
        /**************Trims in Piece**************/
        /******************************************/

        //Puller Cost
        var puller_cost = +$("#puller_cost").val();
        $("#puller_consumption_rate").val((puller_cost).toFixed(3));
        var puller_consumption = +$("#puller_consumption").val();
        var puller_consumption_rate = +$("#puller_consumption_rate").val();
        $("#puller_consumption_cost").val((puller_consumption*puller_consumption_rate).toFixed(4));


        //Print Cost
        var print_cost = +$("#print_cost").val();
        $("#print_consumption_rate").val((print_cost).toFixed(3));
        var print_consumption = +$("#print_consumption").val();
        var print_consumption_rate = +$("#print_consumption_rate").val();
        $("#print_consumption_cost").val((print_consumption*print_consumption_rate).toFixed(4));


        //Eyelet Cost
        var eyelet_cost = +$("#eyelet_cost").val();
        $("#eyelet_consumption_rate").val((eyelet_cost).toFixed(3));
        var eyelet_consumption = +$("#eyelet_consumption").val();
        var eyelet_consumption_rate = +$("#eyelet_consumption_rate").val();
        $("#eyelet_consumption_cost").val((eyelet_consumption*eyelet_consumption_rate).toFixed(4));

       //Buckle Cost
        var buckle_cost = +$("#buckle_cost").val();
        $("#buckle_consumption_rate").val((buckle_cost).toFixed(3));
        var buckle_consumption = +$("#buckle_consumption").val();
        var buckle_consumption_rate = +$("#buckle_consumption_rate").val();
        $("#buckle_consumption_cost").val((buckle_consumption*buckle_consumption_rate).toFixed(4));


        //Snap Button Cost
        var snap_button_cost = +$("#snap_button_cost").val();
        $("#snap_button_consumption_rate").val((snap_button_cost).toFixed(3));
        var snap_button_consumption = +$("#snap_button_consumption").val();
        var snap_button_consumption_rate = +$("#snap_button_consumption_rate").val();
        $("#snap_button_consumption_cost").val((snap_button_consumption*snap_button_consumption_rate).toFixed(4));

        //Magnetic Button Cost
        var magnetic_button_cost = +$("#magnetic_button_cost").val();
        $("#magnetic_button_consumption_rate").val((magnetic_button_cost).toFixed(3));
        var magnetic_button_consumption = +$("#magnetic_button_consumption").val();
        var magnetic_button_consumption_rate = +$("#magnetic_button_consumption_rate").val();
        $("#magnetic_button_consumption_cost").val((magnetic_button_consumption*magnetic_button_consumption_rate).toFixed(4));

        //Bottom Base Cost
        var bottom_base_cost = +$("#bottom_base_cost").val();
        $("#bottom_base_consumption_rate").val((bottom_base_cost).toFixed(3));
        var bottom_base_consumption = +$("#bottom_base_consumption").val();
        var bottom_base_consumption_rate = +$("#bottom_base_consumption_rate").val();
        $("#bottom_base_consumption_cost").val((bottom_base_consumption*bottom_base_consumption_rate).toFixed(4));


        //Thread Cost
        var thread_cost = +$("#thread_cost").val();
        $("#thread_consumption_rate").val((thread_cost).toFixed(3));
        var thread_consumption = +$("#thread_consumption").val();
        var thread_consumption_rate = +$("#thread_consumption_rate").val();
        $("#thread_consumption_cost").val((thread_consumption*thread_consumption_rate).toFixed(4));


        //Tag Cost
        var tag_cost = +$("#tag_cost").val();
        $("#tag_consumption_rate").val((tag_cost).toFixed(3));
        var tag_consumption = +$("#tag_consumption").val();
        var tag_consumption_rate = +$("#tag_consumption_rate").val();
        $("#tag_consumption_cost").val((tag_consumption*tag_consumption_rate).toFixed(4));


        //Label Cost
        var label_cost = +$("#label_cost").val();
        $("#label_consumption_rate").val((label_cost).toFixed(3));
        var label_consumption = +$("#label_consumption").val();
        var label_consumption_rate = +$("#label_consumption_rate").val();
        $("#label_consumption_cost").val((label_consumption*label_consumption_rate).toFixed(4));

        //Packing Cost
        var packing_cost = +$("#packing_cost").val();
        $("#packing_consumption_rate").val((packing_cost).toFixed(3));
        var packing_consumption = +$("#packing_consumption").val();
        var packing_consumption_rate = +$("#packing_consumption_rate").val();
        $("#packing_consumption_cost").val((packing_consumption*packing_consumption_rate).toFixed(4));

        //Extra 1
        var extra_1_piece_cost = +$("#extra_1_piece_cost").val();
        $("#extra_1_piece_consumption_rate").val((extra_1_piece_cost).toFixed(3));
        var extra_1_piece_consumption = +$("#extra_1_piece_consumption").val();
        var extra_1_piece_consumption_rate = +$("#extra_1_piece_consumption_rate").val();
        $("#extra_1_piece_consumption_cost").val((extra_1_piece_consumption*extra_1_piece_consumption_rate).toFixed(4));

        //Extra 2
        var extra_2_piece_cost = +$("#extra_2_piece_cost").val();
        $("#extra_2_piece_consumption_rate").val((extra_2_piece_cost).toFixed(3));
        var extra_2_piece_consumption = +$("#extra_2_piece_consumption").val();
        var extra_2_piece_consumption_rate = +$("#extra_2_piece_consumption_rate").val();
        $("#extra_2_piece_consumption_cost").val((extra_2_piece_consumption*extra_2_piece_consumption_rate).toFixed(4));

        //Extra 3
        var extra_3_piece_cost = +$("#extra_3_piece_cost").val();
        $("#extra_3_piece_consumption_rate").val((extra_3_piece_cost).toFixed(3));
        var extra_3_piece_consumption = +$("#extra_3_piece_consumption").val();
        var extra_3_piece_consumption_rate = +$("#extra_3_piece_consumption_rate").val();
        $("#extra_3_piece_consumption_cost").val((extra_3_piece_consumption*extra_3_piece_consumption_rate).toFixed(4));


        /*******Total Material Including Wastage*************/
        var order_wastage = +$("#order_wastage").val();

        /*****Body Material Variable*****/
        var body_material_1_consumption_cost = +$("#body_material_1_consumption_cost").val();
        var body_material_2_consumption_cost = +$("#body_material_2_consumption_cost").val();
        var body_material_3_consumption_cost = +$("#body_material_3_consumption_cost").val();

        console.log("Body Material 1: "+body_material_1_consumption_cost);
        console.log("Body Material 2: "+body_material_2_consumption_cost);
        console.log("Body Material 3: "+body_material_3_consumption_cost);

        var all_body_material = body_material_1_consumption_cost+body_material_2_consumption_cost+body_material_3_consumption_cost;

        /*****Trims in Yard Variable*****/
        var zipper_consumption_cost = +$("#zipper_consumption_cost").val();
        var webbing_consumption_cost = +$("#webbing_consumption_cost").val();
        var draw_string_consumption_cost = +$("#draw_string_consumption_cost").val();
        var velcro_consumption_cost = +$("#velcro_consumption_cost").val();
        var extra_trim_yard_1_consumption_cost = +$("#extra_trim_yard_1_consumption_cost").val();
        var extra_trim_yard_2_consumption_cost = +$("#extra_trim_yard_2_consumption_cost").val();
        var extra_trim_yard_3_consumption_cost = +$("#extra_trim_yard_3_consumption_cost").val();


        console.log("zipper: "+zipper_consumption_cost);
        console.log("Webbing: "+webbing_consumption_cost);
        console.log("Draw String: "+draw_string_consumption_cost);
        console.log("Velcro: "+velcro_consumption_cost);
        console.log("Extra Trim 1: "+extra_trim_yard_1_consumption_cost);
        console.log("Extra Trim 2: "+extra_trim_yard_2_consumption_cost);
        console.log("Extra Trim 3: "+extra_trim_yard_3_consumption_cost);



        var all_trims_in_yard = zipper_consumption_cost+webbing_consumption_cost+draw_string_consumption_cost+velcro_consumption_cost+extra_trim_yard_1_consumption_cost+extra_trim_yard_2_consumption_cost+extra_trim_yard_3_consumption_cost;

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

        console.log("Puller: "+puller_consumption_cost);
        console.log("Print: "+print_consumption_cost);
        console.log("Eyelet: "+eyelet_consumption_cost);
        console.log("Buckle: "+buckle_consumption_cost);
        console.log("Snap Button: "+snap_button_consumption_cost);
        console.log("Magnetic Button: "+magnetic_button_consumption_cost);
        console.log("Bottom base: "+bottom_base_consumption_cost);
        console.log("Thread: "+thread_consumption_cost);
        console.log("Tag: "+tag_consumption_cost);
        console.log("Label: "+label_consumption_cost);
        console.log("Packing: "+packing_consumption_cost);
        console.log("Extra 1: "+extra_1_piece_consumption_cost);
        console.log("Extra 2: "+extra_2_piece_consumption_cost);
        console.log("Extra 3: "+extra_3_piece_consumption_cost);

        var all_trims_in_piece = puller_consumption_cost+print_consumption_cost+eyelet_consumption_cost+buckle_consumption_cost+magnetic_button_consumption_cost+snap_button_consumption_cost+bottom_base_consumption_cost+thread_consumption_cost+tag_consumption_cost+label_consumption_cost+packing_consumption_cost+extra_1_piece_consumption_cost+extra_2_piece_consumption_cost+extra_3_piece_consumption_cost;

       // $("#order_total_material_inc_wastage").val(((ppnw_consumption_cost+zipper_consumption_cost+webbing_consumption_cost+draw_string_consumption_cost+velcro_consumption_cost+tape_consumption_cost+extra_trim_yard_1_consumption_cost+extra_trim_yard_2_consumption_cost+puller_consumption_cost+print_consumption_cost+eyelet_consumption_cost+buckle_consumption_cost+snap_button_consumption_cost+magnetic_button_consumption_cost+bottom_base_consumption_cost+thread_consumption_cost+tag_consumption_cost+label_consumption_cost+packing_consumption_cost+extra_1_piece_consumption_cost+extra_2_piece_consumption_cost+extra_3_piece_consumption_cost)*(1+(order_wastage/100))).toFixed(4));
        $("#order_total_material_inc_wastage").val(((all_body_material+all_trims_in_yard+all_trims_in_piece)*(1+(order_wastage/100))).toFixed(4));

        console.log("All body Material: "+all_body_material);
        console.log("All Trims in Yard: "+all_trims_in_yard);
        console.log("All Trims in Piece: "+all_trims_in_piece);

        //$("#final_material_cost").text(((ppnw_consumption_cost+zipper_consumption_cost+webbing_consumption_cost+draw_string_consumption_cost+velcro_consumption_cost+tape_consumption_cost+extra_trim_yard_1_consumption_cost+extra_trim_yard_2_consumption_cost+puller_consumption_cost+print_consumption_cost+eyelet_consumption_cost+buckle_consumption_cost+snap_button_consumption_cost+magnetic_button_consumption_cost+bottom_base_consumption_cost+thread_consumption_cost+tag_consumption_cost+label_consumption_cost+packing_consumption_cost+extra_1_piece_consumption_cost+extra_2_piece_consumption_cost+extra_3_piece_consumption_cost)*(1+(order_wastage/100))).toFixed(4));
        // $("#final_material_cost_hidden").val(((ppnw_consumption_cost+zipper_consumption_cost+webbing_consumption_cost+draw_string_consumption_cost+velcro_consumption_cost+tape_consumption_cost+extra_trim_yard_1_consumption_cost+extra_trim_yard_2_consumption_cost+puller_consumption_cost+print_consumption_cost+eyelet_consumption_cost+buckle_consumption_cost+snap_button_consumption_cost+magnetic_button_consumption_cost+bottom_base_consumption_cost+thread_consumption_cost+tag_consumption_cost+label_consumption_cost+packing_consumption_cost+extra_1_piece_consumption_cost+extra_2_piece_consumption_cost+extra_3_piece_consumption_cost)*(1+(order_wastage/100))).toFixed(4));
        $("#final_material_cost").val(((all_body_material+all_trims_in_yard+all_trims_in_piece)*(1+(order_wastage/100))).toFixed(4));
        $("#final_material_cost_hidden").val(((all_body_material+all_trims_in_yard+all_trims_in_piece)*(1+(order_wastage/100))).toFixed(4));


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
        $("#total_overhead_and_other_hidden").val((sewing_cost+overheads_cost+transport_per_bag+bank_document_cost_per_bag).toFixed(4));


        /*******Total Cost*************/
        var order_total_material_wastage_included = +$("#order_total_material_inc_wastage").val();

        //console.log("Total Material Wastage "+order_total_material_wastage_included);

        var order_total_overhead_and_others = +$("#total_overhead_and_other").text();
        console.log("Overhead and Other Cost"+order_total_overhead_and_others);

        $("#total_cost").text((order_total_material_wastage_included+order_total_overhead_and_others).toFixed(4));
        $("#total_cost_hidden").val((order_total_material_wastage_included+order_total_overhead_and_others).toFixed(4));



        /*******Final Price*************/
        var total_final_cost = +$("#total_cost").text();

        console.log("Final Cost"+total_final_cost);

        var margin =  +$("#order_margin").val();

        $("#final_price").text((total_final_cost*(1+(margin/100))).toFixed(4));
        $("#final_price_hidden").val((total_final_cost*(1+(margin/100))).toFixed(4));


        /****************Company Info***********************/
        var company_name_prag = $("#order_company").val();

        var matches = company_name_prag.match(/\b(\w)/g);
        var acronym = matches.join('');

        //var name = acronym+date;
        var date = $('#order_date').datepicker({ dateFormat: 'ddmmy' }).val();

        // document.write(date);
        //console.log(date);

        // Joining the date and company names first letters and add them into order id
        $('#order_id').val(acronym+date);


    });
});





/************************Nonwovens Bag total Calculation***************************************/

$(document).ready(function(){
  $(".ppnw-costing").keyup(function(){


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
    //console.log(date);

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
    var order_extra_2_l_allowance = +$("#order_extra_2_l_allowance").val();
    $("#order_extra_2_l_total").val((order_extra_2_l+ order_extra_2_l_allowance).toFixed(2));
    var extra_2_l = +$("#order_extra_2_l_total").val();

   //Extra 2 Width
    var order_extra_2_w = +$("#order_extra_2_w").val();
    var order_extra_2_w_allowance = +$("#order_extra_2_w_allowance").val();
    $("#order_extra_2_w_total").val((order_extra_2_w + order_extra_2_w_allowance).toFixed(2));
    var extra_2_w = +$("#order_extra_2_w_total").val();

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

    $("#bottom_base_consumption_rate").val((bottom_base_cost).toFixed(3));

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
    $("#final_material_cost_hidden").val(((ppnw_consumption_cost+zipper_consumption_cost+webbing_consumption_cost+draw_string_consumption_cost+velcro_consumption_cost+tape_consumption_cost+extra_trim_yard_1_consumption_cost+extra_trim_yard_2_consumption_cost+puller_consumption_cost+print_consumption_cost+eyelet_consumption_cost+buckle_consumption_cost+snap_button_consumption_cost+magnetic_button_consumption_cost+bottom_base_consumption_cost+thread_consumption_cost+tag_consumption_cost+label_consumption_cost+packing_consumption_cost+extra_1_piece_consumption_cost+extra_2_piece_consumption_cost+extra_3_piece_consumption_cost)*(1+(order_wastage/100))).toFixed(4));


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
    $("#total_overhead_and_other_hidden").val((sewing_cost+overheads_cost+transport_per_bag+bank_document_cost_per_bag).toFixed(4));


    /*******Total Cost*************/
    var order_total_material_wastage_included = +$("#order_total_material_inc_wastage").val();
    var order_total_overhead_and_others = +$("#total_overhead_and_other").text();

    $("#total_cost").text((order_total_material_wastage_included+order_total_overhead_and_others).toFixed(4));
    $("#total_cost_hidden").val((order_total_material_wastage_included+order_total_overhead_and_others).toFixed(4));



    /*******Final Price*************/
    var total_final_cost = +$("#total_cost").text();

    //console.log("Final Cost"+total_final_cost);

    var margin =  +$("#order_margin").val();

    $("#final_price").text((total_final_cost*(1+(margin/100))).toFixed(4));
    $("#final_price_hidden").val((total_final_cost*(1+(margin/100))).toFixed(4));

  });

});

/*********************************************************************************************************/
/************************Woven Simple Bag Costing total Calculation***************************************/
/*********************************************************************************************************/

$(document).ready(function(){
  $(".woven-simple-costing").keyup(function(){


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
    //console.log(date);

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
    var order_extra_2_l_allowance = +$("#order_extra_2_l_allowance").val();
    $("#order_extra_2_l_total").val((order_extra_2_l+ order_extra_2_l_allowance).toFixed(2));
    var extra_2_l = +$("#order_extra_2_l_total").val();

   //Extra 2 Width
    var order_extra_2_w = +$("#order_extra_2_w").val();
    var order_extra_2_w_allowance = +$("#order_extra_2_w_allowance").val();
    $("#order_extra_2_w_total").val((order_extra_2_w + order_extra_2_w_allowance).toFixed(2));
    var extra_2_w = +$("#order_extra_2_w_total").val();

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
    $("#ppnw_consumption_rate").val((ppnw_cost/order_gsm/0.9144).toFixed(2));

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

    $("#bottom_base_consumption_rate").val((bottom_base_cost).toFixed(3));

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
    $("#final_material_cost_hidden").val(((ppnw_consumption_cost+zipper_consumption_cost+webbing_consumption_cost+draw_string_consumption_cost+velcro_consumption_cost+tape_consumption_cost+extra_trim_yard_1_consumption_cost+extra_trim_yard_2_consumption_cost+puller_consumption_cost+print_consumption_cost+eyelet_consumption_cost+buckle_consumption_cost+snap_button_consumption_cost+magnetic_button_consumption_cost+bottom_base_consumption_cost+thread_consumption_cost+tag_consumption_cost+label_consumption_cost+packing_consumption_cost+extra_1_piece_consumption_cost+extra_2_piece_consumption_cost+extra_3_piece_consumption_cost)*(1+(order_wastage/100))).toFixed(4));


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
    $("#total_overhead_and_other_hidden").val((sewing_cost+overheads_cost+transport_per_bag+bank_document_cost_per_bag).toFixed(4));


    /*******Total Cost*************/
    var order_total_material_wastage_included = +$("#order_total_material_inc_wastage").val();
    var order_total_overhead_and_others = +$("#total_overhead_and_other").text();

    $("#total_cost").text((order_total_material_wastage_included+order_total_overhead_and_others).toFixed(4));
    $("#total_cost_hidden").val((order_total_material_wastage_included+order_total_overhead_and_others).toFixed(4));



    /*******Final Price*************/
    var total_final_cost = +$("#total_cost").text();

    //console.log("Final Cost"+total_final_cost);

    var margin =  +$("#order_margin").val();

    $("#final_price").text((total_final_cost*(1+(margin/100))).toFixed(4));
    $("#final_price_hidden").val((total_final_cost*(1+(margin/100))).toFixed(4));

  });

});
