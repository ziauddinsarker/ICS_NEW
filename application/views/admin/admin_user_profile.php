<!-- Content Header (Page header) -->
<section class="content-header">
    <h3>User Profile</h3>
</section>

<!-- Main content -->
<section class="content">
    <?php foreach($userinfo as $user){ ?>
        <img src="<?php echo base_url("assets/images/employee/". $user->image_name. "")?>" class="img-circle" alt="User Image"></p>
        <h1>Update Your Image</h1>

        <form action="<?php echo site_url('user/do_upload'); ?>" class="dropzone"></form>

        <p><b>Name:</b> <?php echo $user->employee_name; ?></p>
        <p><b>Email:</b> <?php echo $user->employee_email; ?></p>
        <p><b>Phone:</b> <?php echo $user->employee_phone; ?></p>
        <p><b>Blood Group:</b> <?php echo $user->employee_blood_group; ?></p>
    <?php  }  ?>
</section>
