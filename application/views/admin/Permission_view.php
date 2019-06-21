<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Renuka Softtec | Permission Denied</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">-->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
    </head>
    <body class="hold-transition skin-yellow sidebar-collapse sidebar-mini">
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="javascript:void(0)" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>SP</b></span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Renuka SP</b></span>
                </a>
                
            </header>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Permission Denied
                    </h1>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="error-page">
                        <h2 class="headline text-yellow"><i class="fa fa-frown-o"></i></h2>

                        <div class="error-content">
                            <h3><i class="fa fa-warning text-yellow"></i> Oops! You don't have permission</h3>

                            <p>
                                Please Contact to Admin Person<br>
                                While, you may return to home.
                            </p>

                            <form class="search-form" action="<?php echo site_url('dashboard'); ?>">
                                <input type="submit" class="btn btn-warning btn-flat" value="Go Home">
                            </form>
                        </div>
                        <!-- /.error-content -->
                    </div>
                    <!-- /.error-page -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>MIS Version</b> 2.3.0
                </div>
                <strong>Copyright &copy; 2017-2018 <a href="http://renukasoftec.com/">Renuka Softec</a>.</strong> All rights reserved.
                <!-- <div id="google_translate_element"></div> -->
            </footer>

        </div>
        <!-- ./wrapper -->

        <!-- jQuery 2.2.3 -->
        <script src="<?php echo baseUrl(); ?>assets/bootstrap/js/jquery.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url(); ?>assets/dist/js/app.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
    </body>
</html>
