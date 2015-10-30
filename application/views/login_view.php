<div class="row">
<div class="col-sm-6 col-md-4 col-md-offset-4">
    <div class="account-wall">
        <img class="profile-img" src="<?php echo base_url("assets/images/logo.png"); ?>"  alt="">
        <div id="infoMessage"></div>

        <form action="<?=  base_url()?>login/login" method="post" class="form-horizontal form-signin">

            <input class="form-control login_input" type="text" name="identity" value="" id="identity" placeholder="User Name"required autofocus>
            <input class="form-control login_input" class="" type="password" name="password" value="" id="password" placeholder="Password" required>

            <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" value="Login">Sign in</button>

        </form>
    </div>
</div>
</div>

