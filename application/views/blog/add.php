 <?php echo validation_errors(); ?>
<?php echo form_open('just_post/save', 'role="form"'); ?>
  <div class="form-group">
    <label for="just_post_title">Post Title</label>
    <input type="text" class="form-control" id="just_post_title" value="<?php echo set_value('just_post_title'); ?>" name="just_post_title">
  </div>

  <div class="form-group">
    <label for="just_post_description">Post Description</label>
    <textarea class="form-control tinymce" id="just_post_description" name="just_post_description"><?php echo set_value('just_post_description'); ?></textarea>
  </div>

  <input type="submit" name="mit" class="btn btn-primary" value="Submit">
  <button type="button" onclick="location.href='<?php echo site_url('just_post') ?>'" class="btn btn-success">Back</button>
</form>
<?php echo form_close(); ?>
