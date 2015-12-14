
      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer">
             
        <!-- Default to the left -->
        <strong>Copyright &copy; 2015 <a href="#">SIMURA Non-Wovens Ltd.</a></strong> All rights reserved.
      </footer>

    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    <!-- jQuery 2.1.4-->
    <script src="<?php echo base_url("assets/plugins/jQuery/jQuery-2.1.4.min.js")?>"></script>


    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo base_url("assets/js/bootstrap.min.js")?> "></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url("assets/dist/js/app.min.js")?> "></script>
      <!--
      <script src="<?php //echo base_url('assets/js/angular.min.js'); ?>"></script>
      -->
      <script src="<?php echo base_url('assets/js/jquery-ui.min.js'); ?>"></script>
      <script src="<?php echo base_url('assets/js/typeahead.bundle.js'); ?>"></script>
      <script src="<?php echo base_url('assets/js/d3.min.js'); ?>"></script>
      <script src="<?php echo base_url('assets/js/bootstrap-sortable.js'); ?>"></script>
      <script src="<?php echo base_url('assets/js/moment.min.js'); ?>"></script>
      <script src="<?php echo base_url('assets/js/dropzone.js'); ?>"></script>
      <script src="<?php echo base_url('assets/js/html2canvas.js'); ?>"></script>


      <script src="<?php echo base_url('assets/js/main.js'); ?>"></script>

	  
	 <script type="text/javascript">
        $(document).ready(function(){
            $('#add').click(function(){
                addnewrow();
            });

            $('.detail').delegate('.quantity,.price,.discount','keyup',function(){
                var tr = $(this).parent().parent();
                var qty = tr.find('.quantity').val();
                var price = tr.find('.price').val();
                var amt = qty * price;
                //Discount option if needed
                var dis = tr.find('.discount').val();
                var amt = (qty * price) - (qty * price * dis)/100;
                tr.find('.amount').val(amt);

                total();

                $('.inWord').html(inWords(total()));

            });


            $('body').delegate('.remove','click',function(){
                $(this).parent().parent().remove();
            });

        });
        /**
         * Total Amount
         */
        function total(){
            var t = 0;
            $('.amount').each(function (i,e) {
                var amt = $(this).val()-0;
                t += amt;
            });
            $('.inWord').html(inWords(t));
            $('.total').html(t);
        }


        function addnewrow(){
            var n = ($('.detail tr').length-0)+1;
            var tr = '<tr>'+
                '<td class="no">' + n + '</td>'+
                '<td><input type="text" class="form-control productname" name="productname[]"></td>'+
                '<td><input type="text" class="form-control quantity" name="quantity[]"></td>'+
                '<td><input type="text" class="form-control price" name="price[]"></td>'+
                '<td><input type="text" class="form-control discount" name="discount[]"></td>'+
                '<td><input type="text" class="form-control amount" name="amount[]"></td>'+
                '<td><a href="#" class="remove">Delete</a> </td>'+
                '<td></td>'+
                '</tr>';

            $('.detail').append(tr);
        }




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



  </body>
</html>
