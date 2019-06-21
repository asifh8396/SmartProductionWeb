<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Renuka Softtec | Log in</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css'); ?>">

        <link rel="shortcut icon" href="<?php echo base_url('favicon.ico'); ?>" type="image/x-icon">
        <link rel="icon" href="<?php echo base_url('favicon.ico'); ?>" type="image/x-icon">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo" style="margin-bottom: 10px;">
                <a href=""><b>Renuka </b>Softtec</a>
                <br>
                <b style="font-size: 30px;">Smart Production</b>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body" style="border: 5px solid #f39c12;">
                <?php echo validation_errors("<p class='text-danger'>","</p>"); ?>
                <?php if($this->session->flashdata('UrlLoginError')){echo "<p class='text-danger'>".$this->session->flashdata('UrlLoginError')."</p>";} ?>
                <?php echo form_open('Verifylogin', 'autocomplete="off"'); ?>
                <input type="hidden" name="locz" value="<?php echo $location; ?>">
                <div class="form-group has-feedback">
                    <label style="font-weight: normal; color: #444444">Select Financial Year</label>
                    <select id="finyr" name="finyr" class="form-control" onchange="return finyrchange();">
                        <option value="xxxxx">--Select--</option>
                        <?php
                        if ($finyrhtml != "") {
                            echo $finyrhtml;
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group has-feedback">
                    <label style="font-weight: normal; color: #444444">Company</label>
                    <select id="company" name="company" class="form-control">
                        <option value="xxxxx">--Select--</option>
                    </select>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" id="username" name="username" class="form-control" placeholder="User Name">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" id="passowrd" name="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <a href="<?php echo site_url('ForgetPassword'); ?>">Forget Password</a>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
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
    function finyrchange() {
        var val = $("#finyr").val();
        if (val == "xxxxx") {
            alertModal("Select Fin yr !!");
            return false;
        } else {
        	$('html, body').css("cursor", "wait");
            $.ajax({
                type: "POST",
                async: false,
                url: "<?php echo site_url('Login/companyload') ?>",
                data: {val: val},
                success: function (res) {
                    var data = jQuery.parseJSON(res);
                    if(data.err == 1) {
                        alert(data.msg);
                        return false;
                    } else {
                        $("#company").empty();
                        $("#company").append(data.companyprof);
                    }

                }
            });
			$('html, body').css("cursor", "auto");
        }
    }
</script>