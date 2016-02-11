
      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer">
             
        <!-- Default to the left -->
        <strong>Copyright &copy; 2016 <a href="#">SIMURA Non-Wovens Ltd.</a></strong> All rights reserved.
      </footer>

    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4-->
    <script src="<?php echo base_url("assets/plugins/jQuery/jQuery-2.1.4.min.js")?>"></script>


    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url("assets/js/bootstrap.min.js")?> "></script>
     <script src="<?php echo site_url(); ?>assets/Bootstrap-3-Typeahead-master/bootstrap3-typeahead.min.js" type="text/javascript"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url("assets/dist/js/app.min.js")?> "></script>
      <!--
      <script src="<?php //echo base_url('assets/js/angular.min.js'); ?>"></script>
      <script src="<?php //echo base_url('assets/js/typeahead.bundle.js'); ?>"></script>-->

      <script src="<?php echo base_url('assets/js/jquery-ui.min.js'); ?>"></script>
      <script src="<?php echo base_url('assets/js/d3.min.js'); ?>"></script>
      <script src="<?php echo base_url('assets/js/bootstrap-sortable.js'); ?>"></script>
      <script src="<?php echo base_url('assets/js/moment.min.js'); ?>"></script>
      <script src="<?php echo base_url('assets/js/dropzone.js'); ?>"></script>
      <script src="<?php echo base_url('assets/js/html2canvas.js'); ?>"></script>



      <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>
	  <script>
          /**
           * Site : http:www.smarttutorials.net
           * @author muni
           */
          $(".delete").on('click', function() {
              $('.case:checkbox:checked').parents("tr").remove();
              $('.check_all').prop("checked", false);
              check();
          });


          var i=$('.detail tr').length+1;

          $(".addmore").on('click',function(){
              count=$('.detail tr').length + 1;
              var data="<tr><td><span id='snum"+i+"'>"+count+".</span></td>";
              data+="<td colspan='4'><input type='text' class='form-control productcode autocomplete_txt' data-type='productcode' id='productcode_"+i+"' name='productcode[]' required='required'></td>";
              data+="<input type='hidden' class='form-control' data-type='productcodeid' id='productcodeid_"+i+"' name='productcodeid[]' required='required'>";
              data+="<td><input type='text' class='form-control quantity' data-type='quantity' id='quantity_"+i+"' name='quantity[]' required='required'></td>";
              data+="<td><input type='text' class='form-control price autocomplete_txt' data-type='price' id='price_"+i+"' name='price[]' required='required'></td>";
              data+="<td><input type='text' class='form-control discount-amount' data-type='discountamount' id='discountamount_"+i+"' name='discountamount[]'></td>";
              data+="<td><input type='text' class='form-control discount' data-type='discount' id='discount_"+i+"' name='discount[]'></td>";
              data+="<td><input type='text' class='form-control amount' data-type='amount' id='amount_"+i+"' name='amount[]' readonly='readonly'></td>";
              data+="<td><a href='#' class='btn btn-primary remove'><i class='fa fa-times'></i></a> </td></tr>";
              $('table').append(data);
              row = i ;
              i++;
          });



          function select_all() {
              $('input[class=case]:checkbox').each(function(){
                  if($('input[class=check_all]:checkbox:checked').length == 0){
                      $(this).prop("checked", false);
                  } else {
                      $(this).prop("checked", true);
                  }
              });
          }

          function check(){
              obj=$('table tr').find('span');
              $.each( obj, function( key, value ) {
                  id=value.id;
                  $('#'+id).html(key+1);
              });
          }
          var multiple = ["1|WPLB-00001-15|1050|",
              "2|WPLB-00002-15|1400|",
              "3|SLLB-00020-15|2250|",
              "4|WPLB-00023-15|600|",
              "5|WPLB-00025-15|1050|",
              "6|WPLB-00028-15|650|",
              "7|WPLB-00029-15|1550|",
              "8|WPLB-00030-15|1250|",
              "9|WPLB-00031-15|1450|",
              "10|SLLB-00033-15|1950|",
              "11|WPLTB-00065-15|1000|",
              "12|WPLTB-00068-15|980|",
              "13|WPLB-00070-15|1250|",
              "14|WPBP-00072-15|1050|",
              "15|WPSHB-00076-15|2500|",
              "16|SLSHB-00077-15|2500|",
              "17|SLSHB-00078-15|3000|",
              "18|SLSHB-00079-15|1800|",
              "19|WPLB-00018-15|350|",
              "20|WPLB-00022-15|350|",
              "21|WPLB-00038-15|380|",
              "22|WPLB-00063-15|350|",
              "23|WPLB-00064-15|550|",
              "25|WPLB-00080-15|380|",
              "26|WPLB-00081-15|380|",
              "27|SLLB-00027-15|1050|",
              "54|WPLB-00004-15|850|",
              "55|Others||",
              "56|SLLB-00034-15|1800|",
              "57|SLLB-00035-15|2450|",
              "58|CHN-04|1750|",
              "59|WPLB-00083-15|530|",
              "60|SLLB-00049-15|2350|",
              "61|WPLB-00082-15|700|",
          ];

          //autocomplete script
          $(document).on('focus','.autocomplete_txt',function(){
              type = $(this).data('type');

              if(type =='productcodeid' )autoTypeNo=0;
              if(type =='productcode' )autoTypeNo=1;
              if(type =='price' )autoTypeNo=2;

              $(this).autocomplete({
                  minLength: 0,
                  source: function( request, response ) {
                      var array = $.map(multiple, function (item) {
                          var code = item.split("|");
                          return {
                              label: code[autoTypeNo],
                              value: code[autoTypeNo],
                              data : item
                          }
                      });
                      //call the filter here
                      response($.ui.autocomplete.filter(array, request.term));
                  },
                  focus: function() {
                      // prevent value inserted on focus
                      return false;
                  },
                  select: function( event, ui ) {
                      var names = ui.item.data.split("|");
                      id_arr = $(this).attr('id');
                      id = id_arr.split("_");
                      elementId = id[id.length-1];
                      $('#productcodeid_'+elementId).val(names[0]);
                      $('#productcode_'+elementId).val(names[1]);
                      $('#price_'+elementId).val(names[2]);
                  }
              });

              /*
              $.ui.autocomplete.filter = function (array, term) {
                  var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(term), "i");
                  return $.grep(array, function (value) {
                      return matcher.test(value.label || value.value || value);
                  });
              };
              */
          });
      </script>
	  
	  
	  
	  
      <script>
          /*
          $(document).ready(function(e){
              var site_url = "<?php //echo site_url(); ?>";
              var input = $("input[id=pcode]");

              $.get(site_url+'inventory/json_search_product', function(data){
                  input.typeahead({
                      source: data,
                      minLength: 1,
                  });
              }, 'json');

              input.change(function(){
                  var current = input.typeahead("getActive");
                  $('#product_id').val(current.id);
                  $('#price').val(current.price);
                  $('#pcode').val(current.pcode);
              });
          });
          */
      </script>
      <script>
          /*
          $(document).ready(function() {
              // On change of the dropdown do the ajax
              $("#proCode").change(function() {
                  $.ajax({
                      // Change the link to the file you are using
                      url: '<?php base_url()?>json_search_product',
                      type: 'post',
                      // This just sends the value of the dropdown
                      data: { client: $(this).val() },
                      success: function(response) {
                          // Parse the jSON that is returned
                          // Using conditions here would probably apply
                          // incase nothing is returned
                          var Vals    =   JSON.parse(response);

                          var productCode = $("#proCode").val();

                          for(i = 0; i < Vals.length; i++) {

                              if(Vals[i].pcode === productCode){
                                  //$("input[name='kk']").val(Vals[0].price);
                                  //$("input[name='kk']").val(Vals[i].price);
                                  //console.log(Vals[i]);
                              }else{
                                  $("input[id='price']").val(Vals[i].price);
                                  //$("input[name='kk']").val(Vals[i].price);
                                  //console.log(Vals[i]);
                                  break;
                              }

                             // console.log(Vals[i].price);
                          }

/*
                          var hasTag = function(productCode) {
                              var i = null;
                              for (i = 0; tags.length > i; i += 1) {
                                  if (Vals[i].pcode === productCode) {
                                      return true;
                                  }
                              }

                              return false;
                          };

                          */
                // These are the inputs that will populate
                         //$("input[name='kk']").val(Vals[0].id);
                          //console.log(Vals.price)
          /*
                      }
                  });
              });
          });
          */
      </script>


     <script>
        window.setTimeout(function() {
            $("#success_message").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 2000);
     </script>
	  
	 <script type="text/javascript">
        $(document).ready(function(){
            $('#add').click(function(){
                addnewrow();
            });

            $('.detail').delegate('.quantity,.price,.discount,.discount-amount,.inword','keyup',function(){
                var tr = $(this).parent().parent();
                var qty = tr.find('.quantity').val();
                var price = tr.find('.price').val();
                var amt = qty * price;
				
				pquantity = tr.find('.quantity').val();

                //Discount Amount  if needed
                var discamount = tr.find('.discount-amount').val();
                var percent = tr.find('.discount').val();
                //console.log(discamount);
                if(discamount > 0){
                    var disc = (discamount/(qty * price))*100;
                    tr.find('.discount').val((disc).toFixed(2));
                }
/*
                if(percent > 0){
                    var disamount = (qty * price * percent)/100;
                    tr.find('.discount-amount').val(disamount);
                }
*/


                //Discount option if needed
                //var dis = tr.find('.discount').val();

                //var disamount = (qty * price * dis)/100;
               // tr.find('.discount-amount').val(disamount);



                //var discountamount =  tr.find('.discount-amount').val();
               // var percentage = (discountamount/price)/100;
                //tr.find('.discount').val(percentage);
                //var dis = tr.find('.discount').val();


               //var amt = (qty * price) - (qty * price * dis)/100;
               var amt = qty * price;
                tr.find('.amount').val(amt);

                subtotal();
                discount();

                var total = gsubtotal - gdiscount;
                $('.total').html(total);
                $('.inWord').html(inWords(gsubtotal - gdiscount));

                var inw = inWords(gsubtotal - gdiscount);
                console.log(inw);
                //("#inword").txt(inw);
                //tr.find('.inword').val(inw);
                document.getElementById("inword").value = inw;
            });


            $('body').delegate('.remove','click',function(){
                $(this).parent().parent().remove();
            });

        });
        /**
         * Total Amount
         */
        function subtotal(){
            var t = 0;
            $('.amount').each(function (i,e) {
                var amt = $(this).val()-0;
                t += amt;
            });

            gsubtotal = t;

            $('.inWord').html(inWords(t));
            $('.subtotal').html(t);
        }

        /**
         * Total Amount
         */
        function discount(){
            var t = 0;
            $('.discount-amount').each(function (i,e) {
                var disc = $(this).val()- 0;
                t += disc;
            });

            gdiscount = t;

            $('.discount').html(t);
        }

/*
        function addnewrow(){
            var n = ($('.detail tr').length-0)+1;
            var tr = '<tr>'+
                '<td class="no">' + n + '</td>'+
                '<td colspan="4">'+
                '<select class="form-control" name="productcode[]">'+
                    <?php foreach ($products as $row):
                    {
                    ?>
                '<option value="<?php echo $row->product_id; ?>"><?php echo $row->product_code; ?></option>'+

                <?php
                    }
                endforeach; ?>
                '</select>'+
                '</td>' +
                '<td><input type="text" class="form-control quantity" name="quantity[]" required="required"></td>'+
                '<td><input type="text" class="form-control price" name="price[]" required="required"></td>'+
                '<td><input type="text" class="form-control discount-amount" name="discountamount[]"></td>'+
                '<td><input type="text" class="form-control discount" name="discount[]"></td>'+
                '<td><input type="text" class="form-control amount" name="amount[]" readonly="readonly"></td>'+
                '<td><a href="#" class="btn btn-primary remove"><i class="fa fa-times"></i></a> </td>'+
                '</tr>';

            $('.detail').append(tr);
        }
*/


        var a = ['','one ','two ','three ','four ', 'five ','six ','seven ','eight ','nine ','ten ','eleven ','twelve ','thirteen ','fourteen ','fifteen ','sixteen ','seventeen ','eighteen ','nineteen '];
        var b = ['', '', 'twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety'];

        function inWords (num) {
            if ((num = num.toString()).length > 9) return 'overflow';
            n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
            if (!n) return;
            var str = '';
            str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'crore ' : '';
            str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'lakh ' : '';
            str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'thousand ' : '';
            str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'hundred ' : '';
            str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + 'only ' : '';
            return str;
        }


    </script>




      <script>

          $(function(){
              $("#order_company").autocomplete({
                  source: "http://localhost/ICS_NEW/admin/json_search_buyer" // path to the get_birds method
              });
          });

      </script>



      <script>
          $(document).ready(function(e){
              var site_url = "<?php echo site_url(); ?>";
              var input = $("input[name=company_name]");

              $.get(site_url+'admin/json_search_buyer', function(data){
                  input.typeahead({
                      source: data,
                      minLength: 1,
                  });
              }, 'json');

              input.change(function(){
                  var current = input.typeahead("getActive");
                  $('#company_id').val(current.id);
              });

          });
      </script>


      <script>
          var w = 400;
          var h = 400;
          var r = h/2;
          var color = d3.scale.category20c();

          var data = [
					  {"label":"PPNW", "value":<?php foreach($ppnw_all_count as $ppnw){?><?php echo $ppnw->ppnw_count;?><?php }?>},
					  {"label":"Woven Simple", "value":<?php foreach($woven_simple_all_count as $wovensimple){?><?php echo $wovensimple->woven_simple_count;?><?php }?>},
					  {"label":"Woven", "value":<?php foreach($woven_all_count as $woven){?><?php echo $woven->woven_count;?><?php }?>},
					  {"label":"Quilt and Suit", "value":<?php foreach($quilt_and_suit_all_count as $quiltandsuit){?><?php echo $quiltandsuit->quilt_and_suit_count;?><?php }?>}
					];


          var vis = d3.select('#chart').append("svg:svg").data([data]).attr("width", w).attr("height", h).append("svg:g").attr("transform", "translate(" + r + "," + r + ")");
          var pie = d3.layout.pie().value(function(d){return d.value;});

          // declare an arc generator function
          var arc = d3.svg.arc().outerRadius(r);

          // select paths, use arc generator to draw
          var arcs = vis.selectAll("g.slice").data(pie).enter().append("svg:g").attr("class", "slice");
          arcs.append("svg:path")
              .attr("fill", function(d, i){
                  return color(i);
              })
              .attr("d", function (d) {
                  // log the result of the arc generator to show how cool it is :)
                  console.log(arc(d));
                  return arc(d);
              });

          // add the text
          arcs.append("svg:text").attr("transform", function(d){
              d.innerRadius = 0;
              d.outerRadius = r;
              return "translate(" + arc.centroid(d) + ")";}).attr("text-anchor", "middle").text( function(d, i) {
                  return data[i].label;}
          );
      </script>




      <script>

          var margin = {top: 20, right: 20, bottom: 70, left: 50},
              width = 600 - margin.left - margin.right,
              height = 450 - margin.top - margin.bottom;

          var x = d3.scale.ordinal()
              .rangeRoundBands([0, width], .05);

          var y = d3.scale.linear()
              .range([height, 0]);

          var xAxis = d3.svg.axis()
              .scale(x)
              .orient("bottom");

          var yAxis = d3.svg.axis()
              .scale(y)
              .orient("left")
              .ticks(20);

          var svg = d3.select("#totalsalebar").append("svg")
              .attr("width", width + margin.left + margin.right)
              .attr("height", height + margin.top + margin.bottom)
              .append("g")
              .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

          d3.json("<?php base_url()?>json_all_invoice", function(error, data) {
              x.domain(data.map(function(d) { return d.date; }));
              y.domain([0, d3.max(data, function(d) { return d.total; })]);

              svg.append("g")
                  .attr("class", "x axis")
                  .attr("transform", "translate(0," + height + ")")
                  .call(xAxis)
                  .selectAll("text")
                  .style("text-anchor", "end")
                  .attr("dx", "-.8em")
                  .attr("dy", "-.55em")
                  .attr("transform", "rotate(-90)" );

              svg.append("g")
                  .attr("class", "y axis")
                  .call(yAxis)
                  .append("text")
                  .attr("transform", "rotate(-90)")
                  .attr("y", 6)
                  .attr("dy", ".71em")
                  .style("text-anchor", "end")
                  .text("Value (tk)");

              svg.selectAll(".bar")
                  .data(data)
                  .enter().append("rect")
                  .style("fill", "steelblue")
                  .attr("x", function(d) { return x(d.date); })
                  .attr("width", x.rangeBand())
                  .attr("y", function(d) { return y(d.total); })
                  .attr("height", function(d) { return height - y(d.total); });


          });

          function type(d) {
              d.fpprob = +d.fpprob;
              return d;
          }

      </script>




      <script>
          /*$(document).ready(function(e){
              var site_url = "<?php //echo site_url(); ?>";
              var input = $("input[name=employee_name]");

              $.get(site_url+'admin/json_search_employee', function(data){
                  input.typeahead({
                      source: data,
                      minLength: 1,
                  });
              }, 'json');

              input.change(function(){
                  var current = input.typeahead("getActive");
                  $('#employee_id').val(current.id);
              });

          });*/
      </script>





       <script>
      $(document).ready(function() {

      //the min chars for username
      var min_chars = 3;

      //result texts
      var characters_error = 'Minimum amount of chars is 3';
      var checking_html = 'Checking...';

      //when button is clicked
      $('#check_username_availability').click(function(){
      //run the character number check
      if($('#username').val().length < min_chars){
      //if it's bellow the minimum show characters_error text '
      $('#username_availability_result').html(characters_error);
      }else{
      //else show the cheking_text and run the function to check
      $('#username_availability_result').html(checking_html);
      check_availability();
      }
      });

      });

      //function to check username availability
      function check_availability(){
          //get the username
          var username = $('#username').val();

          //use ajax to run the check
          $.post("<?php base_url('inventory/name_check')?>", { username: username },
              function(result){
              //if the result is 1
              if(result == 1){
                  //show that the username is available
                  $('#username_availability_result').html(username + ' is Available');
                  }else{
                  //show that the username is NOT available
                  $('#username_availability_result').html(username + ' is not Available');
                  }
              });

      }
</script>
  </body>
</html>
