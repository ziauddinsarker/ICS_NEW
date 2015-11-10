<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Internal Costing System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url("assets/css/bootstrap-theme.min.css"); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url("assets/css/jquery-ui.min.css"); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url("assets/css/jquery-ui.theme.min.css"); ?>" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url("assets/css/main.css"); ?>" rel="stylesheet" type="text/css" />
</head>

<body>	
	<div class="container">
		<div class="row">
			<div class="navbar navbar-inverse" role="navigation">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" rel="home" href="<?= base_url();?>" title="Buy Sell Rent Everyting">ICS</a>
				</div>

				<?php if($this->session->userdata('user_id')) //if user is logged in
				{ ?>

				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<div class="col-sm-12 col-md-8">
						<form class="navbar-form" role="search" method="get" id="search-form" name="search-form">				        
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Company or Order Id" id="query" name="query" value="">
									<div class="input-group-btn">
								<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-search"></span></button>
								</div>
							</div>
						</form>
					</div>

					<div class="col-sm-2 col-md-2">
						<form class="navbar-form navbar-right" role="search">
							<div class="input-group"><a href="<?php base_url() ?>/ICS_NEW/admin" class="btn btn-warning">Dashboard</a></div>
						</form>
					</div>

						<ul class="nav navbar-nav navbar-right">
							<li><a href="<?php base_url() ?>/ICS_NEW/login/logout">Logout</a></li>
						</ul>
					<?php  }else {

					 }   ?>
				</div>
			</div>				
		</div>	
	</div>
	<div class="container">
	<div ng-app="">
      <!-- Form Start -->  