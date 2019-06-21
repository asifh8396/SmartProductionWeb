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
    /*.dt-buttons{
        float: right !important;
        margin-top: -100px !important;
        margin-right: -285px;
        display: block;
    }*/
    .thead{
        width: 100%;
    }
</style>
<div class="content-wrapper">
    <form  method="post" action="<?php echo site_url('Production/JobCardColse/save'); ?>" id="form_main" autocomplete="off">
        <section class="content-header">
            <h1><?= $title; ?></h1>
            <ul class="breadcrumb">
                <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i>Home</a></li>
                <li class="active"><?= $title; ?></li>
            </ul>
            <div class="pull-right" id="div_content_Btns">
                <?php //if ($UserPermModify == 1) { ?>
                <a onclick="return submitform();" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Save/Update"><i class="fa fa-save"></i></a>
                <?php //} ?>

                <a  onclick="return reloadd();" class="btn btn-default" data-toggle="tooltip" data-placement="bottom" title="Cancel"><i class="fa fa-reply"></i></a>
                <a href="javascript:void(0)" onclick="return showfilterdata_div();" class="btn btn-primary" data-toggle="tooltip" data-placement="left" title="Filter"><i class="fa fa-filter"></i></a>
            </div>
        </section>
        <section class="content">
            <div class="box box-primary">
                <div class="pull-right" id="div_content_Btns_copy"></div>
                <div class="box-body">
                    <div id="data_div" class="col-md-9 col-sm-12" style="padding: 4px;">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-list"></i>&nbsp;Job List</h3>
                                <input type="text" placeholder="Search" class="form-control" id="txt_search_tbl" style="width:170px;float:right;margin-top: -23px;height: 30px;" onkeypress="return Searchkld(event, 'txt_search_tbl', 'tbody_search');">
                            </div>

                            <div class="panel-body">

                                <div>
                                    <table class="tbltheadtbodycss" id="search_tbl">
                                        <p id="flashmsg" style='font-size:15px;color:#a94442;float:left;margin: 0px;font-weight: 700;'><?php echo alert(); ?></p>
                                        <thead id="thead_search" class="tbodystyel">
                                            <tr>
                                                <th nowrap>Doc ID</th>
                                                <th nowrap>Doc Date</th>
                                                <th nowrap>Job No</th>
                                                <th nowrap>Client Code</th>
                                                <th nowrap>Job Name</th>
                                                <th nowrap>Job Qty</th>
                                                <th nowrap>Produce Qty</th>
                                                <th nowrap>Despatch Qty</th>
                                                <th nowrap>Status</th>
                                                <th nowrap>Closing Date</th>
                                                <th nowrap>Closing Reason</th>
                                                <th nowrap>WOID</th>
                                                <th nowrap>Client Name</th>
                                                <th nowrap>Bal. Produce Qty.</th>
                                                <th nowrap>Bal. Despatch Qty.</th>
                                            </tr>


                                        </thead>
                                        <tbody id="tbody_search">


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="filter_div" class="col-md-3 col-sm-12" style="padding: 4px;">
                        <div class="panel panel-success">
                            <input type="hidden" name="hdn_type" id="hdn_type" value="<?php echo $variable; ?>">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-filter"></i>&nbsp;Filter</h3>
                            </div>
                            <div class="panel-body">

                                <div class="form-group">
                                    <label>From Date :</label>
                                    <input class="form-control datepickerr" name="fromdate" id="txt_fromDate" type="text" value="<?php echo date('d/m/Y'); ?>" placeholder="From date" readonly>
                                </div>
                                <div class="form-group">
                                    <label>To Date :</label>
                                    <input class="form-control datepickerr" name="todate" id="txt_ToDate" type="text" value="<?php echo date('d/m/Y'); ?>" placeholder="To date" readonly>
                                </div>
                                <!--                                <div class="form-group">
                                                                    <label><input type="checkbox" name="chk" id="chk" style="margin: 14px;">Show All Work Order</label>
                                                                </div>-->
                                <button type="button" onclick="return showfilterdata()" class="btn btn-primary pull-right" style="width: 70px;" >Show</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </form>
</div>


<link href="<?php echo baseUrl(); ?>assets/plugins/Semantic-UI-CSS-master/semantic.css" rel="stylesheet">
<link href="<?php echo baseUrl(); ?>assets/plugins/Semantic-UI-CSS-master/components/dropdown.css" rel="stylesheet">

<script src="<?php echo baseUrl(); ?>assets/bootstrap/js/jquery.min.js"></script>
<script src="<?php echo baseUrl(); ?>assets/plugins/Semantic-UI-CSS-master/semantic.js"></script>
<script src="<?php echo baseUrl(); ?>assets/plugins/Semantic-UI-CSS-master/components/dropdown.js"></script>

<script type="text/javascript">



                                    function changeflag(lnk) {
                                        var flag = $("#hdn_flag\\[" + lnk + "\\]").val();
                                        if (flag == 0) {
                                            $("#hdn_flag\\[" + lnk + "\\]").val(1);

                                        }
                                    }
                                    $(document).ready(function () {
                                        table = $('#search_tbl').DataTable({
                                            dom: 'rtip',
                                            responsive: true,
                                            "bSort": true,
                                            "order": [],
                                            fixedHeader: true,
                                            "sScrollY": "480",
                                            "bPaginate": false,
                                            "sScrollX": "100%",
                                        });

                                    });
                                    window.onload = function () {
                                        $("div.dt-buttons").html('');
                                    };

                                    function submitform() {
                                        var len = $("#tbody_search tr").length;
                                        var i = 1;
                                        for (i; i <= len; i++) {

                                            var flag = $("#hdn_flag\\[" + i + "\\]").val();
                                            if (flag == 1) {

                                                if ($("#chkk\\[" + i + "\\]").prop("checked") == true) {

                                                    var rsn = $("#CloseReas\\[" + i + "\\]").val();
                                                    if (rsn == "") {
                                                        alertModal("Please Enter Close Reason.");
                                                        return false;
                                                    }
                                                }
                                            }
                                        }
                                        $("#form_main").submit();
                                    }
                                    function reloadd() {
                                        location.reload();
                                        return false;
                                    }


                                    function showfilterdata()
                                    {
                                        var Fromdate = $('#txt_fromDate').val();
                                        var res = Fromdate.split("/");
                                        fromdate = res[2] + "-" + res[1] + "-" + res[0];
                                        var ToDate = $('#txt_ToDate').val();
                                        var res = ToDate.split("/");
                                        todate = res[2] + "-" + res[1] + "-" + res[0];
                                        var type = $("#hdn_type").val();

                                        showfilterdata_div();
                                        $.ajax({
                                            type: "POST",
                                            url: "<?php echo site_url(); ?>Production/JobCardColse/bindproduct",
                                            data: {fromdate: fromdate, todate: todate, type: type},
                                            beforeSend: function () {
                                                table.destroy();
                                                $("#tbody_search").html('');
                                                $.blockUI();
                                            },
                                            complete: function () {
                                                table = $('#search_tbl').DataTable({
                                                    dom: 'rtip',
                                                    responsive: true,
                                                    "bSort": true,
                                                    "order": [],
                                                    fixedHeader: true,
                                                    "sScrollY": "480",
                                                    "bPaginate": false,
                                                    "sScrollX": "100%",
                                                });
                                                $.unblockUI();
                                            },
                                            success: function (res) {
                                                $.unblockUI();
                                                var data = jQuery.parseJSON(res);

                                                $("#tbody_search").append(data);
                                            },
                                            error: function (res) {
                                                alertModal("Error in bindproduct", "Error");
                                                $.unblockUI();
                                            }
                                        });
                                    }

                                    function showfilterdata_div() {
                                        if ($("#filter_div").css("display") == "none") {
                                            $("#filter_div").show();
                                            $("#data_div").addClass("col-md-9");
                                            $("#data_div").addClass("col-sm-9");
                                            $("#data_div").removeClass("col-md-12");
                                            $("#data_div").removeClass("col-sm-12");
                                        } else {
                                            $("#filter_div").hide();
                                            $("#data_div").addClass("col-md-12");
                                            $("#data_div").addClass("col-sm-12");
                                            $("#data_div").removeClass("col-md-9");
                                            $("#data_div").removeClass("col-sm-9");
                                        }
                                    }


                                    function showdespatch(woid) {

                                        $.ajax({
                                            type: "POST",
                                            url: "<?php echo site_url(); ?>Production/JobCardColse/binddetail",
                                            data: {DOCID: woid},
                                            beforeSend: function () {

                                                $.blockUI();
                                            },
                                            complete: function () {

                                                $.unblockUI();
                                            },
                                            success: function (res) {
                                                $.unblockUI();
                                                var data = jQuery.parseJSON(res);


                                                if (data.length > 0) {
                                                
                                                    var html = "<div><table class='tbltheadtbodycss' id='search_tblL'>\n\
                                                                <thead id='thead_search' class='tbodystyel'>\n\
                                                                </thead><tbody id='tbody_searchL'>";
                                                   
                                                    for (var i = 0; i < data.length; i++) {
                                                        html = html.concat("<tr><td>" + data[i].Datastring + "</td></tr>");
                                                       
                                                    }

                                                    html = html.concat("</tbody></table></div>");
                                                }
                                              
                                                alertModal(html);

                                                // alertModal();
                                            },
                                            error: function (res) {
                                                alertModal("Error in bindproduct", "Error");
                                                $.unblockUI();
                                            }
                                        });

                                        return false;
                                    }
</script>