<!-- /.content-wrapper -->
<footer class="main-footer">
    <div class="pull-right hidden-xs">
        <b>MIS Version</b> 2.1
    </div>
    <strong>Copyright &copy; 2018-2019 <a href="http://renukasoftec.com/">Renuka Softec</a>.</strong> All rights
    reserved.
</footer>

</div>

<input id="alertBtn" type="button" data-backdrop="static" data-keyboard="false" data-toggle="modal" data-target="#alertModal" hidden="">
<div id="alertModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm" id="alertModalDialog" style="vertical-align: top;">
        <div class="modal-content">
            <div class="modal-header" style="background: firebrick !important;padding: 5px;padding-left: 15px;">
                <button type="button" id="alertCloseBtn" class="close" data-dismiss="modal" hidden="">&times;</button>
                <h6 class="modal-title" id="alertTitle" style="font-size: 17px;">Alert</h6>
            </div>
            <div class="modal-body" id="alertBody" style="padding: 15px;"></div>
            <div class="modal-footer" style="padding: 8px;">
                <input type="button" id="alertCloseOK" value="OK" class="controlmy" data-dismiss="modal" style="background: #eee;font-weight: 700;">
            </div>
        </div>
    </div>
</div>

<!-- jQuery 2.2.0 -->
<!-- <script src="<?php echo baseUrl(); ?>assets/plugins/jQuery/jQuery-2.2.0.min.js"></script> -->
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo baseUrl(); ?>assets/bootstrap/js/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="<?php echo base_url('assets/bh_assets/js/custom.js?'.time()); ?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo baseUrl(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/js/moment.min.js'); ?>"></script>
<!-- daterangepicker -->
<!--<script src="<?php echo baseUrl(); ?>assets/plugins/daterangepicker/daterangepicker.js"></script>-->
<!-- datepicker -->
<script src="<?php echo baseUrl(); ?>assets/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo baseUrl(); ?>assets/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!--<script src="<?php echo baseUrl(); ?>assets/dist/js/pages/dashboard.js"></script>-->
<!-- AdminLTE for demo purposes -->
<!--<script src="<?php echo baseUrl(); ?>assets/dist/js/demo.js"></script>-->
<script src="<?php echo baseUrl(); ?>assets/js/juiBlock.js"></script>
<script src="<?php echo base_url(); ?>assets/js/sweetalert.min.js"></script>

<!-- DataTables -->
<script src="<?php echo baseUrl(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo baseUrl(); ?>assets/plugins/datatables/dataTables.bootstrap.min.js"></script>

<script src="<?php echo base_url(); ?>assets/dt/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dt/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dt/js/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dt/js/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dt/js/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/dt/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dt/js/buttons.print.min.js"></script>
</body>
</html>
<script type="text/javascript">
function change_caret(){
    if($("#fa_caret").hasClass("fa-caret-right")){
        $("#fa_caret").removeClass("fa-caret-right");
        $("#fa_caret").addClass("fa-caret-left");
    } else {
        $("#fa_caret").addClass("fa-caret-right");
        $("#fa_caret").removeClass("fa-caret-left");
    }
}

function alertModal(Body='',modalTitle='',modalWidth='') {
//    if (Body != "") {
//        $("#alertBody").html(Body);
//    }
//    if (modalTitle != "") {
//        $("#alertTitle").html(modalTitle);
//    } else {
//        $("#alertTitle").html("Alert");
//    }
//    if (modalWidth != "") {
//        $("#alertModalDialog").css("width", modalWidth);
//    } else {
//        $("#alertModalDialog").css("width", "300px");
//    }
//    $("#alertBtn").click();
    
    if (modalTitle == "") {
        modalTitle = "Alert";
    }

    swal({
        title: modalTitle,
        text: Body,
        closeOnClickOutside: false,
        closeOnEsc: false,
        allowOutsideClick: false,
    });
    document.activeElement.blur();
}
</script>