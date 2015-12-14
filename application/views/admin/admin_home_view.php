        <!-- Content Header (Page header) -->


        <!-- Main content -->
        <section class="content">
            <?php
            $group = $this->ion_auth->get_users_groups()->row()->name;
            //var_dump($group);
            if(!($group == 'admin' || $group == 'merchandiser')) {
            }else{
            ?>

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
                <a href="<?php base_url() ?>woven_simple/woven_simple_all/">
                <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Woven Simple</span>
                  <span class="info-box-number"><?php foreach($woven_simple_all_count as $wovensimple){?>
                      <td><?php echo $wovensimple->woven_simple_count;?></td>
                    <?php }?></span>
                </div><!-- /.info-box-content -->
                </a>
              </div><!-- /.info-box -->
            </div><!-- /.col -->
			
			
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <a href="<?php base_url() ?>woven/woven_all/">
                <span class="info-box-icon bg-red"><i class="fa fa-bar-chart"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Woven</span>
                  <span class="info-box-number">
                    <?php foreach($woven_all_count as $woven){?>
                      <td><?php echo $woven->woven_count;?></td>
                    <?php }?></span>
                </div><!-- /.info-box-content -->
                </a>
              </div><!-- /.info-box -->
            </div><!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <a href="<?php base_url() ?>quiltandsuit/quilt_and_suit_all/">
                <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Quilt & Suit Covers</span>
                  <span class="info-box-number"><?php foreach($quilt_and_suit_all_count as $quiltandsuit){?>
                      <td><?php echo $quiltandsuit->quilt_and_suit_count;?></td>
                    <?php }?></span>
                </div><!-- /.info-box-content -->
                </a>
              </div><!-- /.info-box -->
            </div><!-- /.col -->
            <!--
			<div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>
                <div class="info-box-content">
                  <span class="info-box-text">Leather</span>
                  <span class="info-box-number">0</span>
              
			  </div><!-- /.info-box-content -->
<!--              </div><!-- /.info-box -->
    <!--        </div><!-- /.col -->
		
          </div><!-- /.row -->
            <?php } ?>


        </section><!-- /.content -->



