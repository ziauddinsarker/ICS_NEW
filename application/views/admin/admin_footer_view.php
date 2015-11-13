
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

          var data = [{"label":"PPNW", "value":<?php foreach($ppnw_all_count as $ppnw){?><?php echo $ppnw->ppnw_count;?><?php }?>},
              {"label":"Cotton", "value":2},
              {"label":"Leather", "value":3},
              {"label":"Jute", "value":1}];


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
