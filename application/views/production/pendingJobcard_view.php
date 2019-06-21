<script src="<?php echo base_url(); ?>assets/bootstrap/js/jquery.min.js"></script>
<style>

    td.tdborder{
        cursor: pointer; 
        border-bottom: 1px solid #e6e6e6
    }
    td.tdborder{background: #FFF}
    /*        td.tdborder:nth-child(even){background: lightcyan}
            td.tdborder:nth-child(odd){background: #FFF}*/
    td.tdborder:hover {
        /* Something you can count on */  
        background: #F5F5F5;
        cursor: context-menu;
    }
    td.tdborder a{
        color: dimgrey;
        cursor: pointer;
        font-family: "Arial";
        font-size: 12px;
    }
    td.tdborderActive {
        /* Something you can count on */
        background: #F5F5F5;
        cursor: context-menu;                
    }
    td.tdborderActive a{
        color: black;
        font-size: 12px;
        font-weight: bold;
        font-family: arial;
    }
    tr.trGrid{
        padding: 0px;
    }
    tr.trGrid td{
        font-size: 12px;
        padding: 0px;
    }
    tr.trheaders th{
        font-size: 12px;
        background: #D0D0D0;
    }

    div.right{
        margin-left: 0%;
    }
    div.nav{
        /* width: 200px; */ float: left;
    }
    .tbodystyel tr td{
        font-size: 12px !important;
        padding: 0px;
        height: 5;
        padding-top:4px;
        padding-left:4px;
        padding-right:4px; 
        padding-bottom: 4px;

    }
    .tbodystyel .td{
        font-size: 10px;
        padding: 0px;
        height: 5;
        padding-top:4px;
        padding-left:4px;
        padding-right:4px; 
        padding-bottom: 4px;
    }    
    .tbodystyel tr th{
        font-size: 10px;
        padding: 0px;
        /*border: 0px;*/
    }

</style>        

<script>
    $(document).ready(function () {
        setInterval(function() {window.location.href = window.location;}, 300000);
        countdown(5);
        table = $('#example').DataTable({
            dom: 'Bfrtip',
            fixedHeader: true,
            "sScrollY": "400",
            "sScrollX": "120%",
            "bPaginate": false,
            buttons: [
                'excel','csv'
            ],
        });

        $(document).ajaxComplete(function () {
            table = $('#example').DataTable({
                dom: 'Bfrtip',
                fixedHeader: true,
                "sScrollY": "500",
                "sScrollX": "120%",
                "bPaginate": false,
                buttons: [
                    'excel','csv'
                ],
            });
            $.unblockUI();
            countdown(5);
        });
      
        // $('#radio_all').click(function () {
        //     var icompany = $('#hdn_icompanyid').val();
        //     var job = 4;
            
        //     $('#tbodyMain').empty();
        //     table.destroy();
        //     $.blockUI();
        //     $.ajax({
        //         type: "POST",
        //         url: "<?php //echo site_url() ?>Production/PendingJobcard/showgrid",
        //         data: {job: job, icompany: icompany}
        //     }).done(function (msg) {
        //         var main = jQuery.parseJSON(msg);
        //         $('#tbodyMain').append(main);
                
        //     });
        // });
        $('#radio_pending').click(function () {
            var icompany = $('#hdn_icompanyid').val();
            var job = 3;

            table.destroy();
            $('#tbodyMain').empty();
            // alert();
            $.blockUI();
            $.ajax({
                type: "POST",
                url: "<?php echo site_url() ?>Production/PendingJobcard/showgrid",
                data: {job: job, icompany: icompany}
            }).done(function (msg) {
                var main = jQuery.parseJSON(msg);
                
                $('#tbodyMain').append(main);
            });
        });
    });
    function showlikesearch() {
        var icompany = $('#hdn_icompanyid').val();
        var txt_ProductName = $('#txt_ProductName').val();
        var txt_jobno = $('#txt_jobno').val();
        var txt_miscode = $('#txt_miscode').val();
        if (txt_jobno == "" && txt_miscode == "" && txt_ProductName == "") {
            alertModal("Please Enter JobNo Or MisCode Or Job Name");
            return false;
        }
        // alert();
        table.destroy();
        $('#tbodyMain').html('');
        $.blockUI();
        $.ajax({
            type: "POST",
            url: "<?php echo site_url() ?>Production/PendingJobcard/showsearch",
            data: {txt_jobno: txt_jobno, txt_ProductName: txt_ProductName, txt_miscode: txt_miscode, icompany: icompany}
        }).done(function (msg) {
            var main = jQuery.parseJSON(msg);
            $('#tbodyMain').append(main);
            
        });
    }

    function beforeopen_check(val) {


        var hdn_itemid = $("#hdn_itemid" + val).val();
        var rtn = '';
        
        $.ajax({
            url: '<?php echo site_url(); ?>Production/PendingJobcard/showtotaldocket',
            type: "POST",
            async: false,
            // dataType: "JSON",
            data: {hdn_itemid: hdn_itemid},
            beforeSend: function () {
                $.blockUI();
            },
            complete: function () {
                $.unblockUI();
            },
            success: function (data) {
                console.log(data);
                var master = jQuery.parseJSON(data);
                if(master[0].TotalDocket != "0") {
                    rtn = master[0].TotalDocket;
                } else {
                    rtn = '';
                }
                
            },
            error: function () {
                $.unblockUI();
            }
        });
        return rtn;
    } 

    function openjobcard(val) {
        var rtn = beforeopen_check(val);
        // alert(rtn);
        if (rtn >= 2) {
            swal("Can't create job Already running ("+rtn+") job for this Item\nPlease Closed Older Job Docket.....!");
            return false;
        }else{
        var jobno = $("#hdn_jobno" + val).val();
        var hdn_docnotion = $("#hdn_docnotion" + val).val();
        var icompanyid = $('#hdn_icompanyid').val();
        var uid = $('#hdn_uid').val();
        $('#txt_uid').val(uid);
        $('#txt_icompanyid').val(icompanyid);
        $('#docnotionval').val(hdn_docnotion);
        $("#hdn_jobcard").val(jobno);
        var hdn_cp = $("#hdn_cp" + val).val();
        $("#hidden_cp").val(hdn_cp);
        if (hdn_cp == 'C' || hdn_cp == 'J') {
            $('#formJob').attr("action", "<?php echo site_url(); ?>Production/Jobcard_comm"); //change the form action
            $('#formJob').submit(); // submit the form
        } else {
            $('#formJob').attr("action", "<?php echo site_url(); ?>Production/Jobcard"); //change the form action
            $('#formJob').submit(); // submit the form
        }
        // $("#Btn").click();
        //return false;
       }
    }
</script> 
<div class="content-wrapper"> <!--  oncontextmenu="return false;"> -->
    <section class="content-header">
        <h1 style="display: inline-block;"><?php echo $title; ?></h1>
        <ul class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active"><?php echo $title; ?></li>
        </ul>
        <div class="pull-right">
        </div>
    </section>
    <section class="content">
        <div class="box box-primary">
            <div class="box-body" style="padding: 5px;">
                <div style="width: 100%;">
                    <form action="" id="formJob" method="Post">
                        <input type="hidden" name="hdn_jobcard" id="hdn_jobcard">
                        <input type="hidden" name="hdn_jobnew" id="hdn_jobnew" value="New">
                        <input type="hidden" name="docnotionval" id="docnotionval">
                        <input type="hidden" name="txt_icompanyid" id="txt_icompanyid">
                        <input type="hidden" name="txt_uid" id="txt_uid">
                        <input type="hidden" name="hidden_cp" id="hidden_cp">
                        <div>

                        </div>
                        <div id="menu1" >
                            <input style=" margin-right:3px;" type="radio" name="radio_all" id="radio_pending" checked>
                            <label style=" margin-right:10px;">Pending Jobs</label>

                            <!-- <input style=" margin-right:3px;" type="radio" name="radio_all" id="radio_all">
                            <label style=" margin-right:10px;">All Jobs</label> -->

                            <div style="border: 1px solid #ccc;display: inline-block;">
                                <label style='width: 20px; height: 20px; background-color:#780000; margin: 0px 4px; margin-bottom: -6px;border: 1px solid #000;'></label>
                                <label style="margin-right: 10px;margin-bottom: 3px;">FP is not define</label>
                                <label style='width: 20px; height: 20px; background-color:yellow; margin: 0px 4px; margin-bottom: -6px;border: 1px solid #000;'></label>
                                <label style="margin-right: 10px;margin-bottom: 3px;">Commercial</label>
                                <label style='width: 20px; height: 20px; background-color:#8699e8; margin: 0px 4px; margin-bottom: -6px;border: 1px solid #000;'></label>
                                <label style="margin-right: 10px;margin-bottom: 3px;">Packaging</label>
                                
                            </div>
                            <div style="float: right;font-size: 16px;margin: 5px;">Auto Refresh after :&nbsp;&nbsp;
                                <div style="font-size: 17px;font-weight: 700;float: right;" id="timer"></div>
                            </div>
                            <div style="float: right;margin-right: 10%;">
                                <table class="finyear">
                                    <tr>
                                        <td style="padding-left: 10px;">
                                            <input id='txt_jobno' name='txt_jobno' type='text' style='margin-left:10px; width: 100px; border:1px solid;display: inline-block;padding: 16px;' class='form-control input-sm' placeholder='Job No...' aria-controls='example'>
                                            <input id='txt_miscode' name='txt_miscode' type='text' style='margin-left:10px; width: 100px; border:1px solid;display: inline-block;padding: 16px;' class='form-control input-sm' placeholder='MISCode...' aria-controls='example'>
                                            <input id='txt_ProductName' name='txt_ProductName' type='text' style='margin-left:10px; width: 100px; border:1px solid;display: inline-block;padding: 16px;' class='form-control input-sm' placeholder='Job Name...' aria-controls='example'>
                                            
                                        </td>
                                        <td style="padding-left: 10px;">
                                            <input type="button" id='cl_search' class="btn btn-primary" value="Search" onclick='return showlikesearch();'>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="dataTable_wrapper">
                                
                                <table class="tbltheadtbodycss" id="example">
                                    <thead>
                                        <?php
                                        if (isset($userper)) {
                                            
                                        foreach ($userper as $key => $value) {
                                            $saveper = $value->save_perm;
                                            ?>
                                            <tr>
                                                <th hidden>ItemID</th>
                                                <th hidden>SpecID</th>
                                                <th>WOID</th>
                                                <th>PONO</th>
                                                <th>JobNo</th>
                                                <th>Job Name</th>
                                                <th>MIS Code</th>
                                                <th>Job Code</th>
                                                <th>Qty. Ordered</th>
                                                <th>Job Qty</th>
                                                <th>EstimateNo</th>
                                                <th>WODate</th>
                                                <th hidden>Delivery Date</th>
                                                <th>Client Name</th>
                                                <th>ArtWorkCode</th>
                                                <th>Remarks</th>
                                            </tr>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </thead>                                       
                                    <tbody id="tbodyMain" class="tbodystyel">
                                        <?php
                                        echo $datahtml;
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>  
                        <input type="submit" style="display: none" name="Btn" id="Btn">
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
    var timeoutHandle;
    function countdown(minutes) {
        var seconds = 60;
        var mins = minutes
        function tick() {
            var counter = document.getElementById("timer");
            var current_minutes = mins-1
            seconds--;
            counter.innerHTML =
            current_minutes.toString() + ":" + (seconds < 10 ? "0" : "") + String(seconds);
            if( seconds > 0 ) {
                timeoutHandle=setTimeout(tick, 1000);
            } else {

                if(mins > 1){

                   // countdown(mins-1);   never reach â€œ00â€³ issue solved:Contributed by Victor Streithorst
                   setTimeout(function () { countdown(mins - 1); }, 1000);

                }
            }
        }
        tick();
    }


</script>