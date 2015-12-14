<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html moznomarginboxes mozdisallowselectionprint>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Simura - Billing System</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" rel="stylesheet" type="text/css" />

    <link href="<?php echo base_url("assets/css/jquery-ui.min.css"); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url("assets/css/jquery-ui.theme.min.css"); ?>" rel="stylesheet" type="text/css" />


    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/font-awesome.min.css")?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/ionicons.min.css")?>">

    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url("assets/dist/css/AdminLTE.min.css")?>">

    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="<?php echo base_url("assets/dist/css/skins/skin-blue.min.css")?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/dropzone.css")?>">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/main.css")?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="<?php echo base_url("assets/js/html5shiv.min.js")?>">
    <script src="<?php echo base_url("assets/js/respond.min.js")?>">
    <![endif]-->
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="<?=  base_url()?>home" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>ICS</b></span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Simura</b>Dashboard</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->

                    <!-- User Account Menu -->
                    <li class="user user-menu">
                        <script type="text/javascript">
                            /*
                             var currentDate = new Date();
                             var day = currentDate.getDate();
                             var month = currentDate.getMonth() + 1;
                             var year = currentDate.getFullYear();
                             document.write("<a href="#"><b>" + day + "/" + month + "/" + year + "</b></a>");
                             */
                        </script>
                    </li>

                    <?php /*
              <!-- User Account Menu -->
              <li class="user user-menu">
                <a href="<?php base_url() ?>/ICS_NEW/admin/contacts" class="btn">Contacts</a>
              </li>
              */ ?>
                    <li class="user user-menu">
                        <a href="<?php base_url() ?>/ics/login/logout" class="btn">Sign out</a>
                    </li>

                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">




            <!-- Sidebar Menu -->
            <ul class="sidebar-menu">
                <!-- Optionally, you can add icons to the links -->
                <li><a href="<?=  base_url()?>home/invoice"><i class="fa fa-th-list"></i> <span> New Entry</span></a></li>
                <li><a data-target="#demo" data-toggle="collapse" href="javascript:;" marked="1" ><i class="fa fa-th-list"></i> <span> Inventory</span></a>
                    <ul class="collapse out" id="demo" aria-expanded="true" style="">
                        <li>
                            <a href="<?=  base_url()?>inventory" marked="1">All Inventory</a>
                        </li>
                        <li>
                            <a href="<?=  base_url()?>inventory/get_category" marked="1">All Product Category</a>
                        </li>
                        <li>
                            <a href="<?=  base_url()?>inventory/all_products" marked="1">All Product</a>
                        </li>
                    </ul>



                </li>

                <?php
                /*
                <li><a href="<?=  base_url()?>admin/woven_simple_add"><i class="fa fa-th-list"></i> <span>Woven Simple</span></a></li>
                <li><a href="<?=  base_url()?>admin/woven_add"><i class="fa fa-th-list"></i> <span>Woven</span></a></li>
                <li><a href="<?=  base_url()?>admin/quilt_and_suit_add"><i class="fa fa-th-list"></i> <span>Quilt & Suit Covers</span></a></li>
                */
            ?>
                <!--
                    <li><a href="#"><i class="fa fa-link"></i> <span>Jute</span></a></li>
                    <li><a href="#"><i class="fa fa-link"></i> <span>Leather</span></a></li>
                -->
            </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">