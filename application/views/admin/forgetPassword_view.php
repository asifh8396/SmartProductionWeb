<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Renuka Softtec | Forget Password</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.min.css'); ?>">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/ionicons.min.css'); ?>">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css'); ?>">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo base_url('assets/plugins/iCheck/square/blue.css'); ?>">

		<link rel="shortcut icon" href="<?php echo base_url('favicon.ico'); ?>" type="image/x-icon">
        <link rel="icon" href="<?php echo base_url('favicon.ico'); ?>" type="image/x-icon">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href=""><b>Renuka </b>Softtec</a>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <?php echo validation_errors("<p class='text-danger'>","</p>"); ?>
                <?php echo form_open('ForgetPassword/check', 'autocomplete="off"'); ?>
                <div class="form-group has-feedback">
                    <p class="login-box-msg">If you have forgetten your password you can reset it here.</p>
                </div
                <div class="form-group has-feedback">
                    <input type="email" id="email" name="email" class="form-control" placeholder="E-Mail Address">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <button type="submit" class="btn btn-primary btn-block btn-flat" name="submit">Send My Password</button>
                    </div>
                </div>
                <div class="row">
                    <br>
                    <div class="col-xs-offset-8 col-xs-4">
                        <button type="submit" class="btn btn-default btn-block btn-flat" name="submit" value="Cancel">Cancel</button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->

        <!-- jQuery 2.2.0 -->
        <script src="<?php echo base_url('assets/plugins/jQuery/jQuery-2.2.0.min.js'); ?>"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    </body>
</html>
<script type="text/javascript">
    
</script>