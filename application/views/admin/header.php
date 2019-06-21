<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <title><?php echo $title; ?>, <?php echo $this->company_name1; ?></title>
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo baseUrl(); ?>assets/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">-->
        <link rel="stylesheet" href="<?php echo baseUrl(); ?>assets/font-awesome-4.5.0/css/font-awesome.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo baseUrl(); ?>assets/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo baseUrl(); ?>assets/dist/css/skins/_all-skins.min.css">
        <!-- Date Picker -->
        <link rel="stylesheet" href="<?php echo baseUrl(); ?>assets/plugins/datepicker/datepicker3.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="<?php echo baseUrl(); ?>assets/plugins/daterangepicker/daterangepicker-bs3.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="<?php echo baseUrl(); ?>assets/bootstrap/css/custom.css">
        <!-- DataTables -->
        <link rel="stylesheet" href="<?php echo baseUrl(); ?>assets/plugins/datatables/dataTables.bootstrap.css">

        <link href="<?php echo base_url(); ?>assets/dt/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>assets/dt/css/buttons.dataTables.min.css" rel="stylesheet">

        <link rel="stylesheet" href="<?php echo base_url('assets/bh_assets/css/custom.css?'.time()); ?>">
    </head>
    <body class="hold-transition skin-yellow sidebar-collapse sidebar-mini">
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="<?php echo baseUrl(); ?>dashboard" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>SP</b></span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg" style="font-size: 14px;"><b><?php echo $this->company_name1 ?></b></span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo baseUrl(); ?>assets/dist/img/noavatar.png" class="user-image" alt="User Image">
                                    <!--<span class="hidden-xs">Alexander Pierce</span>-->
                                    <span class="hidden-xs"> <?php echo $this->user_name; ?> &nbsp;&nbsp;&nbsp;<i class="fa fa-gears"></i></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?php echo baseUrl(); ?>assets/dist/img/noavatar.png" class="img-circle" alt="User Image">

                                        <p>
                                            <?php echo $this->user_name; ?> - Post: <?php echo $this->user_profile; ?>
                                            <!--<small>Member since Nov. 2012</small>-->
                                        </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="javascript:void(0)" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?php echo baseUrl(); ?>dashboard/logout" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <?php $this->load->view('admin/sidebar'); ?>