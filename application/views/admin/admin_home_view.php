        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
			  	<a href="<?php base_url() ?>ppnw/ppnw_all/">
                  <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>

                <div class="info-box-content">
			
                  <span class="info-box-text">PPNW</span>
                  <span class="info-box-number">
                       <?php foreach($ppnw_all_count as $ppnw){?>
                           <td><?php echo $ppnw->ppnw_count;?></td>
                       <?php }?>
                  </span>
				 
                </div><!-- /.info-box-content -->
                </a>
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-bar-chart"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Cotton</span>
                  <span class="info-box-number">0</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Jute</span>
                  <span class="info-box-number">0</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Leather</span>
                  <span class="info-box-number">0</span>
                </div><!-- /.info-box-content -->
              </div><!-- /.info-box -->
            </div><!-- /.col -->
          </div><!-- /.row -->


        </section><!-- /.content -->



