<style type="text/css">
    .form-control{
        border-radius: 5px;
    }
    .dataTables_scrollHead{
        margin-top: -15px;
    }
    #search_tbl thead tr th {
        /*border: 1px solid #ddd !important;*/
        /*padding: 2px 3px !important;*/
        /*font-size: 13px;*/
    }
    #search_tbl tbody tr td {
        border: 1px solid #ddd !important;
        padding: 3px 6px !important;
        font-size: 13px;
    }
    #tbl_pendingorders thead tr th{
        font-size: 13px; 
        border: 1px solid #ccc;
        padding: 3px;
        text-align: center;
    }
    #tbl_pendingorders tbody tr td{
        font-size: 12px;
        border: 1px solid #ccc;
        padding: 4px;
    }
/*    .dt-buttons{
        float: right !important;
        margin-top: -100px !important;
        margin-right: -285px;
    }*/
    .thead{
        width: 100%;
    }
</style>
<form action="<?php echo site_url('Production/ActivityMaster/save'); ?>" method="POST" id='myform'>
<div class="content-wrapper">
    <section class="content-header">
        <h1><?= $title; ?></h1>
        <div class="pull-right" id="div_content_Btns">
            <!-- <a href="javascript:void(0)" onclick="return showfilterdata_div();" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Filter Records"><i class="fa fa-filter"></i></a> -->
            <a onclick="validations();" class="btn btn-success" data-toggle="tooltip" id="btn_submit" data-placement="left" title="Save">Save <i class="fa fa-save"></i></a>
            <a href="<?php echo site_url('Production/ActivityMaster');?>" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="Cancel">Cancel <i class="fa fa-reply"></i></a>
        </div>
    </section>
    <section class="content">
        <div class="box box-primary">
            <div class="pull-right" id="div_content_Btns_copy"></div>
            <div class="box-body">
                <div id="filter_div" class="col-md-3 col-sm-12" style="padding: 4px;">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-filter"></i>&nbsp;Filter</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label>Please Select Head Group :</label>
                                <select name="drp" id="drp" onchange="return headProcess();" style="width:100%; height:25px;" value="">
                                    <option>---Select---</option>
                                    <?php
                                    if (!empty($head)) {
                                        $j = 1;
                                        foreach ($head as $key => $value) {
                                            ?>
                                            <option value="<?php echo $value->HeadID; ?>"><?php echo $value->HeadDesc; ?></option>   
                                            <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <!-- <button type="button" onclick="return showfilterdata()" class="btn btn-primary pull-right" style="width: 70px;" >Show</button> -->
                            <a onclick="return addActivity();" class="btn btn-warning " data-toggle="tooltip" id="btn_add" data-placement="center" title="Add Row" style="width: 100%;">Add <i class="fa fa-plus"></i></a><br><br>
                            <label>Please select Activity</label>
                            <ul id="activity1" style="list-style-type:none;padding-left: 0px;"></ul>
                        </div>
                    </div>
                </div>
                <div id="data_div" class="col-md-9 col-sm-12" style="padding: 4px;">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title"><i class="fa fa-list"></i>&nbsp;Detail</h3>
                                <!-- <label>Activity Name:</label> -->
                                <!-- <input type="text" id="activityName" name="activityName" class="form-control" style="width:300px;"> -->
                            <input type="text" placeholder="Search" class="form-control" id="txt_search_tbl" style="width:170px;float:right;margin-top: -23px;height: 30px;" onkeypress="return Searchkld(event, 'txt_search_tbl', 'tbodygeneralk');">

                            <input type="text" placeholder="Activity Name" class="form-control" id="activityName"  name="activityName" style="width:170px;float:right;margin-top: -23px;height: 30px;">
                        </div>
                        <input type="hidden" id="headid" name="headid">
                        <input type="hidden" id="interid" name="interid">
                        <div class="panel-body" style="padding: 4px 5px 5px 10px;">
                            <div class="datatable-wrapper">
                                <p id="flashmsg" style='font-size:16px;color:#a94442;float:left;margin: 0px;font-weight: 700;'><?php alert(); ?></p>
                                <div class="dataTable_wrapper" style="height: 400px; overflow-y: auto">
                                    <table class="tbltheadtbodycss" id="search_tbl" style="width:100%">
                                        <thead id="thead_search" class="tbodystyel">
                                            <tr>
                                                <th nowrap>Process Name</th>
                                                <th nowrap>IsActive</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tbl_body_id" name="tbl_body_id" >

                                            <?php
                                            if (!empty($defaultProcess)) {
                                                $j = 1;
                                                foreach ($defaultProcess as $key => $value) {
                                                    ?>
                                                    <tr>
                                                        <!---->
                                                        <td >
                                                            <label name="txt_process[<?php echo $j ?>]" id="txt_process[<?php echo $j ?>]">
                                                                <?php echo $value->PrName; ?>    
                                                            </label>
                                                        </td> 


                                                        <?php
                                                        if ($value->IsActive == 1) {
                                                            $checked = "checked";
                                                        } else {
                                                            $checked = "";
                                                        }
                                                        ?>
                                                        <td align="center">
                                                            <input type="checkbox" id="isactive" name="isactive" <?php echo $checked ?>>
                                                        </td>


                                                        <?php
                                                        $j++;
                                                    }
                                                }
                                                ?>
                                            </tr>



                                        </tbody>    
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
</div>
</form>


<link rel="stylesheet" type="text/css" href="<?php echo baseUrl(); ?>assets/plugins/bootstrap-select/dist/css/bootstrap-select.min.css">
<link href="<?php echo baseUrl(); ?>assets/plugins/Semantic-UI-CSS-master/semantic.css" rel="stylesheet">
<link href="<?php echo baseUrl(); ?>assets/plugins/Semantic-UI-CSS-master/components/dropdown.css" rel="stylesheet">

<script src="<?php echo baseUrl(); ?>assets/bootstrap/js/jquery.min.js"></script>
<script src="<?php echo baseUrl(); ?>assets/plugins/Semantic-UI-CSS-master/semantic.js"></script>
<script src="<?php echo baseUrl(); ?>assets/plugins/Semantic-UI-CSS-master/components/dropdown.js"></script>
<!-- <script  src="<?php //echo baseUrl(); ?>assets/plugins/jQuery-Plugin-For-Draggable-Resizable-Table-Columns-colResizable/colResizable-1.6.min.js"></script> -->

<script type="text/javascript">





            $(document).ready(function () {


            });
            window.onload = function () {
                    $("div.dt-buttons").html('');
            };



            function showfilterdata_div() {
                var v_f = $("#filter_div");
                var v_d = $("#data_div");
                v_f.removeAttr("class");
                v_d.removeAttr("class");

                if (v_f.css("display") === "none") {
                    if ($(window).width() <= 767) {
                        v_f.show();
                        v_f.addClass("col-sm-12");
                        v_f.addClass("col-xs-12");

                        v_d.addClass("col-md-12");
                        v_d.addClass("col-sm-12");
                    } else {
                        v_f.show();
                        v_f.addClass("col-sm-3");
                        v_f.addClass("col-xs-3");

                        v_d.addClass("col-md-9");
                        v_d.addClass("col-sm-9");
                    }

                } else {
                    if ($(window).width() <= 767) {
                        v_f.hide();

                        v_d.addClass("col-md-12");
                        v_d.addClass("col-sm-12");
                    } else {
                        v_f.hide();

                        v_d.addClass("col-md-12");
                        v_d.addClass("col-sm-12");
                    }
                }

            }



            function test() {
                alert('Hello');
            }

            function headProcess() {

                var headid = $('#drp').val();
//                    alert(headid);
                $('#headid').val(headid);

                var blank = "";
                $('#activityName').val(blank);
                $('#interid').val(blank);
              $.blockUI();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>Production/ActivityMaster/interIds",
                    data: {Btn: "Btn", headid: headid}
                }).done(function (msg) {
//                        alert(msg);
                    var interIds = jQuery.parseJSON(msg);

//                    alert(interIds);
                    var leg = interIds.length;
//                        alert(leg);

                    $('#activity1').html('');
                    var j = 1;
                    for (var k = 0; k < interIds.length; k++) {
                        $('#activity1').append("<li class='listyle'>\n\
                                           <div class=''>\n\
                                           <div style='text-align:left' class='col-md-10'>\n\
                                                <input type='hidden' name='interid" + j + "' id='interid" + j + "' value='" + interIds[k].interid + "'>\n\
                                                <input type='hidden' name='activityName" + j + "' id='activityName" + j + "' value='" + interIds[k].intername + "'>\n\
                                                " + interIds[k].intername + " </div>  \n\
                                            <div class='col-md-2'><button type='button' class='btn btn-primary btn-xs' onclick='return setvalues(" + j + ");'><span class='glyphicon glyphicon-pencil'></span></button></div></div>\n\
                                   </li>");
                        j++;
                    }
                });
                $.unblockUI();


            }

            function setvalues(id) {
                //                alert('SetValues');
                //                alert(id);

                var interid = $("input[type='hidden'][name='interid" + id + "']").val();
                var activityName = $("input[type='hidden'][name='activityName" + id + "']").val();
//                    alert(interid);
                $('#interid').val(interid);
                $('#activityName').val(activityName);


                var headid = $('#headid').val();
//                    alert(headid);
                $.blockUI();
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>Production/ActivityMaster/process",
                    data: {Btn: "JobCard", headid: headid, interid: interid}
                }).done(function (msg) {

                    $('#tbl_body_id').html('');

//                        alert(msg);

                    var process = jQuery.parseJSON(msg);

//                        alert(process);

                    var j = 1;

                    for (var k = 0; k < process.length; k++) {
                        if (process[k].isactive == 1) {
                            var checked = "checked";
                        } else {
                            var checked = "";

                        }

                        $('#tbl_body_id').append("<tr>\
                                            <td>\n\
                                                <input type='hidden' id='txt_prid[" + j + "]' name='txt_prid[" + j + "]' value='" + process[k].prid + "'>\n\
                                                <label style='margin-left: 20px;'>" + process[k].prname + "</label></td> \n\n\
                                             \
                                            <td align='center'>\n\n\
                                          \
                                            <label style='margin-left: 20px;'>\n\
                                            <input type='checkbox' onclick='return changeflag(" + j + ");'   id='txt_isAct[" + j + "]' name='txt_isAct[" + j + "]' " + checked + ">\n\
                                            <input type='hidden' name='hdn_flag[" + j + "]' id='hdn_flag[" + j + "]' value='0'></label>\n\
                                            </td> \n\
                                            \
                                    </tr>");
                        j = j + 1;
                    }
                });
                $.unblockUI();
            }

            function addActivity() {

//                alert('addActivity');

                var headid = $('#drp').val();
//                alert(headid);

                if (headid == '---Select---') {
                    alert('Please Select Head Group');
                } else {

                    $('#headid').val(headid);

                    var blank = "";
                    $('#activityName').val(blank);
                    $('#interid').val(blank);
                   $.blockUI();
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url() ?>Production/ActivityMaster/defaultprocess",
                        data: {Btn: "ADD"}
                    }).done(function (msg) {

                        $('#tbl_body_id').html('');

//                    alert(msg);

                        var process = jQuery.parseJSON(msg);

//                        alert(process);

                        var j = 1;

                        for (var k = 0; k < process.length; k++) {
                            if (process[k].isactive == 1) {
                                var checked = "checked";
                            } else {
                                var checked = "";

                            }

                            $('#tbl_body_id').append("<tr>\
                                            <td>\n\
                                                <input type='hidden' id='txt_prid[" + j + "]' name='txt_prid[" + j + "]' value='" + process[k].PrID + "'>\n\
                                                <label style='margin-left: 20px;'>" + process[k].PrName + "</label></td> \n\n\
                                             \
                                            <td align='center' >\n\n\
                                          \
                                            \
                                            <input type='checkbox' onclick='return changeflag(" + j + ");'  id='txt_isAct[" + j + "]' name='txt_isAct[" + j + "]'       " + checked + ">\n\
                                            <input type='hidden' name='hdn_flag[" + j + "]' id='hdn_flag[" + j + "]' value='0'>\n\
                                            </td> \n\
                                            \
                                    </tr>");
                            j = j + 1;
                        }
                    });
                    $.unblockUI();
                }
            }
            function changeflag(lnk) {
                var flag = $("#hdn_flag\\[" + lnk + "\\]").val();
                if (flag == 0) {
                    $("#hdn_flag\\[" + lnk + "\\]").val(1);

                }
            }

            function validations() {

                var headid = $('#drp').val();
                if (headid == '---Select---') {
                    swal('Please Select Head Group');
                    return false;
                } else {

                    var activityName = $('#activityName').val();
                    if (activityName == '') {
                        swal("Please Give New Activity Name");
                        return false;
                    } else {


                       //  var rowCount = $('#tbl_body_id tr').length;
                       // alert(rowCount);

                       //  var i = 1;
                       //  var ischecked = 0;
                       //  for (i = 1; i <= rowCount; i++) {

                       //      if ($("input[type='checkbox'][name='txt_isAct[" + i + "]']").is(":checked")) {                           
                       //          ischecked = 1;
                       //      }
                       //  }


                       //  if (ischecked == 0) {
                       //      swal("Please Select Atleast One Process");
                       //      return false;
                       //  }
                        
                        var condition = 0;
                        var len = $("#tbl_body_id tr").length;

                        for (var i = 1; i <= len; i++) {
                            if ($("#txt_isAct\\[" + i + "\\]").prop("checked") == true) {
                                condition = parseInt(condition) + 1;
                            }

                        }
                        if (condition <= 0) {
                            alertModal("Please Check atleast 1 checkbox", "", "400px");
                            return false;
                        }
                    }
                }
                $("#myform").submit();
            }



</script>