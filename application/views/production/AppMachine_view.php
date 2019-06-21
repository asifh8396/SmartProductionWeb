<style>
    a.aGrid{
        cursor: pointer;
        font-size: 10px;
        font-weight: normal;
    }
    label.header{
        font-size: 12px;
        padding: 0px;
        margin: 0px;
        color: #EBFFFF;
    }
    th.header{
        font-size: 10px;
    }
    input.textGrid{
        font-size: 9px;
        width: 110px;
    }
    a.li_anchor{
        cursor: pointer;
    }
    td.header{
        font-size: 9px; 
        font-weight: normal;
    }
    tr.trgrid td{
        padding: 0px;
    }
    td.hit{
        background: palegreen;
    }
    td.miss{
        background: #ff4d4d;
    }

    #tfootk tr th{
        padding: 2px;
    }
        table.grid {
            width :65%;
        }
        table.grid thead tr {
            height: 18px;
            color: white;
            background: black;
            font-family: "Arial";
            font-size: 12px;
        }
        table.grid tbody tr:nth-child(even){background: #FFF}
        table.grid tbody tr:nth-child(odd){background: aliceblue}
        table.grid tbody tr:hover{background: seashell}
        table.grid tbody tr td label{
            font-family: "Arial";
            font-size: 12px;
            color: dimgrey;
        }
        table.grid tbody tr td input{
            width: 95%;
            background: transparent;
            border-width: 0px;
            font-family: "Arial";
            font-size: 11px;
            border: 1px solid #00CCCC;
        }
        table.grid tbody tr td select{
            border: 1px solid #ccc;
            color: #4b96ed;
            font-family: "Arial";
            font-size: 12px;
            width: 98%;
        }
        table.grid tbody tr td a{
            font-family: "Arial";
            font-size: 11px;
            color: dimgrey;
            cursor: pointer;
        }
    /*#tbodygeneralk tr:hover{background-color:	#3C8DBC; }*/
    /*#tbl_product*/
</style>

<form action="<?php echo site_url('Production/AppMachine/Save');?>" method="POST" id='myform'>
<div class="content-wrapper" ><!--  oncontextmenu="return false;"> -->
    <section class="content-header">
        <h1><?php echo $title; ?></h1>
        <ul class="breadcrumb">
            <li><p id="flashmsg" style='font-size:15px;color:#a94442;margin: -3px 0 0 0;margin-left: 224px;font-weight: 700;'><?php alert(); ?></p></li>
        </ul>
        <div class="pull-right">
            <a onclick="submitform();" class="btn btn-success" data-toggle="tooltip" data-placement="left" title="Save">Save <i class="fa fa-save"></i></a>
            <a onclick="search_data();" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Search">Search <i class="fa fa-search"></i></a>
            <a href="<?php echo site_url('AppMachine');?>" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="Cancel">Cancel <i class="fa fa-reply"></i></a>
        </div>
    </section>
    <section class="content">
        <div class="box box-primary">
            <div class="box-body" style="padding: 5px;">
                <div style="width:100%">
                    <center><div style="width:50% !important;">
                        <div class="panel panel-success" style="width:100% !important;display: inline-block;margin-bottom: 0px;padding-bottom: 5px;background-color: #dff0d8;">
                            <div class="panel-heading" style="padding: 5px 5px 5px 5px;">
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <label style="width: 40%;">Machine Name :</label>
                                    <input id="txt_mname" name="txt_mname" type="text"  placeholder="Enter Machine Name" class="form-control controlmy" style="width: 50%;">
                                </div>
                                <div class="col-md-6 col-sm-12  col-xs-12">
                                    <label style="width: 40%;">Process Name :</label>
                                    <select id="drp_processname" name="drp_processname" class="form-control controlmy" style="width: 50%;">
                                        <option value="">--Select--</option>
                                            <?php
                                                foreach ($process as $key => $value) {
                                                    echo '<option value="'. $value->PrUniqueID .'">'. $value->PrName .'</option>';
                                                }
                                            ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div></center><br><br><br>
                    <!-- <p id="flashmsg" style='font-size:15px;color:#a94442;float:left;margin: -3px 0 0 0;font-weight: 700;'><?php alert(); ?></p> -->
                    <?php isset($loginCmp);?>
                    <input type="hidden" id="txt_loginCmp" name="txt_loginCmp" value="<?php echo $loginCmp;?>">
<!--                     <input type="text" placeholder="Search...." class="form-control" autocomplete="off" style="width:170px;float:right;margin-top: -35px;height: 30px;" id="txt_searchjob" onkeypress="return Searchkld(event,'txt_searchjob','tbodygeneralk');"> -->
                        <table class="grid" style="margin: 0 auto;">
                            <tr>
                                <td><input type="hidden" name="hdn_id" id="hdn_id"><label>Average Speed:</label></td>
                                <td><input class="text" type="text" name="txt_avg" id="txt_avg"></td>
                                <td><label>Item/hr.</label></td>
                                <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                <td><label>Average setup time:</label></td>
                                <td><input class="text"  type="text" name="txt_avgtime" id="txt_avgtime"></td>
                                <td><label>Minutes</label></td>
                            </tr>
                            <tr>
                                <td><label>Power Consum:</label></td>
                                <td><input class="text"  type="text" name="txt_power" id="txt_power"></td>
                                <td><label>Units/Hr</label></td>
                                <td></td>
                                <td><label>Monthly labor chargers Rs:</label></td>
                                <td><input class="text"  type="text" name="txt_labr_ch" id="txt_labr_ch"></td>
                                <td><label></label></td>
                            </tr>
                            <tr>
                                <td><label>Average Wastage:</label></td>
                                <td><input class="text"  type="text" name="txt_avgwast" id="txt_avgwast"></td>
                                <td><label>Item/1000</label></td>
                                <td></td>
                                <td><label>Insert on Investment Rs.:</label></td>
                                <td><input class="text"  type="text" name="txt_insrs" id="txt_insrs"></td>
                                <td><label>Per Annum</label></td>
                            </tr>
                            <tr>
                                <td><label>Permise Rent Rs.:</label></td>
                                <td><input class="text"  type="text" name="txt_perrent" id="txt_perrent"></td>
                                <td><label>Per month</label></td>
                                <td></td>
                                <td><label>Depreciation Amount Rs.:</label></td>
                                <td><input class="text"  type="text" name="txt_depre" id="txt_depre"></td>
                                <td><label>Per Hour</label></td>
                            </tr>
                            <tr>
                                <td><label>Maintenance Cost Rs.:</label></td>
                                <td><input class="text"  type="text" name="txt_mainten" id="txt_mainten"></td>
                                <td><label>Per month</label></td>
                                <td></td>
                                <td><label>Consumable Cost:</label></td>
                                <td><input class="text"  type="text" name="txt_consuma" id="txt_consuma"></td>
                                <td><label>Per month</label></td>
                            </tr>
                            <tr>
                                <td><label>Running Cost:</label></td>
                                <td><input class="text"  type="text" name="txt_rcost" id="txt_rcost"></td>
                                <td><label>Per Hour</label></td>
                                <td></td>
                                <td><label>Capacity</label></td>
                                <td><input class="text" type="text" name="txt_capacity" id="txt_capacity"></td>
                                <td><label>Per Day</label></td>
                            </tr>
                            <tr>
                                <td><label>Make Ready Cost (Normal):</label></td>
                                <td><input class="text"  type="text" name="txt_makereadynr" id="txt_makereadynr"></td>
                                <td><label>Per Hour</label></td>
                                <td></td>
                                <td><label>Production Cost (Normal):</label></td>
                                <td><input class="text" type="text" name="txt_prodnr" id="txt_prodnr"></td>
                                <td><label>Per Hour</label></td>
                            </tr>
                            <tr>
                                <td><label>Make Ready Cost (UV):</label></td>
                                <td><input class="text"  type="text" name="txt_makereadyuv" id="txt_makereadyuv"></td>
                                <td><label>Per Hour</label></td>
                                <td></td>
                                <td><label>Production Cost (UV):</label></td>
                                <td><input class="text" type="text" name="txt_produv" id="txt_produv"></td>
                                <td><label>Per Hour</label></td>
                            </tr>
                            <tr>
                                <td><label>Direct Manpower Cost:</label></td>
                                <td><input class="text"  type="text" name="txt_directmp" id="txt_directmp"></td>
                                <td><label>Per Hour</label></td>
                                <td></td>
                                <td><label>Supporting Manpower Cost:</label></td>
                                <td><input class="text" type="text" name="txt_supportmp" id="txt_supportmp"></td>
                                <td><label>Per Hour</label></td>
                            </tr>
                            <tr>
                                <td><label>Admin Deprtmnt Manpow Cost:</label></td>
                                <td><input class="text"  type="text" name="txt_admindepartmp" id="txt_admindepartmp"></td>
                                <td><label>Per Hour</label></td>
                                <td></td>
                                <td><label>Is Active</label></td>
                                <td><input type="checkbox" name="chk_inuse" id="chk_inuse"></td>
                                <td></td>
                            </tr>

                        </table>
                </div>
            </div>
        </div>
    </section>
</div>

</form>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width: 650px;">
        <div class="modal-content" style="height: 550px;">
            <div class="modal-header" style="background: #627aac">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Select Machines</h5>
            </div>
            <div class="modal-body form-body">
                <div class="col-sm-4 pull-left">
                    <h5><strong style="color:red;">IsActive Machine</strong></h5>
                </div>
                <div class="col-sm-4 pull-right">
                    <input type='text' id='txt_searchjob' onkeypress="Searchkld(event, 'txt_searchjob', 'tbodyPopup');" class="form-control" placeholder="Search" value="">
                </div>
                <br>
                <div class="col-sm-12">
                    <div class="dataTable_wrapper" style="height: 400px; overflow-y: auto">
                        <table class="table table-hover tbltheadtbodycss" id="tbl_popupOS">
                            <thead>
                                <tr style="background: #9fb7e9;">
                                    <th>SNo</th>
                                    <th>Machine Name</th>
                                    <th>Process Name</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyPopup">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
<script src="<?php echo base_url('assets/bootstrap/js/jquery.min.js'); ?>"></script>

<script>
    
    function search_data(){

        $("#tbodyPopup").html('');

        $.blockUI();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Production/AppMachine/show",
            data: {}
        }).done(function (msg) {
            // alert(msg);
            var main = jQuery.parseJSON(msg);
            var data = main;

            var j = 0;

            if (data.length > 0) {

                var x = 1;
                for (var i = 0; i < data.length; i++) {
                    if (data[i].Inuse == 0) {
                         var trcolor = "style = 'background-color: #e6e600;'";
                    } else {
                        var trcolor = "";
                    }
                    $("#tbodyPopup").append("<tr "+trcolor+" ondblclick='return show_data(" + x + ");'>\n\
                        <td nowrap>\n\
                        <label style='color: #000;'>"+x+"</label>\n\
                            <input type='hidden' id='hdn_recid" + x + "' name='hdn_recid" + x + "' value='" + data[i].RecId + "'></td>\n\
                        <td nowrap>" + data[i].MachineName + "</td>\n\
                        <td nowrap>" + data[i].PrName + "</td>\n\
                        \n\
                        \n\
                    </tr>");
                    x++;
                }
            } else {
                alert("No Data Found !");
            }

            $.unblockUI();
        });                            
        $("#myModal").modal("show");
        return false;
    }


    function show_data(id){

        var hdn_recid = $("#hdn_recid"+id).val();
        $("#myModal").modal('hide');
        // alert(transid);
        $.blockUI();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Production/AppMachine/retrivedata",
            data: {hdn_recid: hdn_recid}
        }).done(function (msg) {
            // alert(msg);
            // console.log(msg);
            var msg = jQuery.parseJSON(msg);
            var master = msg;
            
            

                $('#txt_mname').val(master[0].MachineName);
                $('#drp_processname').val(master[0].BasePrUniqueId);
                $('#txt_avg').val(master[0].avgspeed);
                $('#txt_avgtime').val(master[0].avgsetuptime);
                $('#txt_power').val(master[0].PowerCharges);
                $('#txt_labr_ch').val(master[0].labourcharges);
                $('#txt_avgwast').val(master[0].avgwastage);
                $('#txt_insrs').val(master[0].interestAmt);
                $('#txt_perrent').val(master[0].PerHrRunCost);
                $('#txt_depre').val(master[0].depriamt);
                $('#txt_mainten').val(master[0].maintainpm);
                $('#txt_consuma').val(master[0].consumblepm);
                $('#txt_rcost').val(master[0].rentpm);
                $('#hdn_id').val(master[0].RecId);
                $('#txt_capacity').val(master[0].CapacityPerDay);
                $('#txt_makereadynr').val(master[0].MakeReadyCostNr);
                $('#txt_prodnr').val(master[0].ProductionCostNr);
                $('#txt_makereadyuv').val(master[0].MakeReadyCostUV);
                $('#txt_produv').val(master[0].ProductionCostUV);
                $('#txt_directmp').val(master[0].DirectManpowCost);
                $('#txt_supportmp').val(master[0].SupportManpowCost);
                $('#txt_admindepartmp').val(master[0].AdminDepManpowCost);

                if (master[0].INuse == 1) {
                    $("#chk_inuse").prop('checked', true);
                }

               

            $.unblockUI();

        }); 

    }

    $(document).ready(function () {

        $('#txt_searchjob').keypress(function(event) {
            if (event.keyCode === 10 || event.keyCode === 13) 
                event.preventDefault();
        });
        setTimeout(function(){ $("#flashmsg").hide(); }, 5000);
        
                               

    });
    function submitform(){

      $("#myform").submit();
    }
    
</script>
