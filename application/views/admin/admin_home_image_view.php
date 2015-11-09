
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Image Upload Test
          </h1>
        </section>

        <!-- Main content -->
        <section class="content">
                <!-- Form Start -->
                <?php echo form_open_multipart('upload_image/doing_upload/'); ?>
               <p>title</p>
                    <?php echo form_input('title')?>
            <p>Image</p>
                    <?php echo form_upload('userfile')?>
            <input type="submit" value="upload" name="upload" />
                <?php echo form_close(); ?>
        </section><!-- /.content -->
		

