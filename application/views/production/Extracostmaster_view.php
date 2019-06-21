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
    .tdcss{
       text-align: center;border-right: 1px solid #000;
    }

    .tdabc{
       border-right: 1px solid #000;
    }
    .tdlast{
        text-align: center;
    }
    .spanid{
        width: 80px;float: right;border-bottom: 1px solid #000;
    }
    .spanid2{
        float: right;width: 80px;
    }
    .tdcost{
        text-align: center;border-bottom: 1px solid #000;border-right: 1px solid #000;
    }
    #tbodygeneralk td {
    padding: 8px 10px;
    background-color: #dff0d8;
}
button, input, optgroup, select, textarea {
    color: #000;
}
</style>

<form action="<?php echo site_url('Production/Extracostmaster/Save');?>" method="POST" id='myform'>
<div class="content-wrapper" ><!--  oncontextmenu="return false;"> -->
    <section class="content-header">
        <h1><?php echo $title; ?></h1>
        <ul class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active"><?php echo $title; ?></li>
            <li><p id="flashmsg" style='font-size:15px;color:#a94442;margin: -3px 0 0 0;margin-left: 224px;font-weight: 700;'><?php alert(); ?></p></li>
        </ul>
        <div class="pull-right">
            <a onclick="submitform();" class="btn btn-success" data-toggle="tooltip" data-placement="left" title="Save">Save <i class="fa fa-save"></i></a>
            <a onclick="search_data();" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Search">Search <i class="fa fa-search"></i></a>
            <a href="<?php echo site_url('Production/Extracostmaster');?>" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="Cancel">Cancel <i class="fa fa-reply"></i></a>
        </div>
    </section>
    <section class="content">
        <div class="box box-primary">
            <div class="box-body" style="padding: 5px;">
                <div style="width:100%">
                    <?php isset($loginCmp);?>
                    <input type="hidden" id="txt_loginCmp" name="txt_loginCmp" value="<?php echo $loginCmp;?>">
                    <!-- <input type="text" placeholder="Search...." class="form-control" autocomplete="off" style="width:170px;float:right;margin-top: -35px;height: 30px;" id="txt_searchjob" onkeypress="return Searchkld(event,'txt_searchjob','tbodygeneralk');"> -->

                            <div class="col-md-6 col-md-offset-3">
                                <br>
                            <div class="panel panel-primary">
                            <div class="panel-heading"  style="padding: 15px;">
                                <h3 class="panel-title" style="font-size: 20px; "><?php echo $title; ?></h3>
                            </div>
                            <div class="panel-body" style="">
                               <table style="width: 100%;" id="tbl_data" border="1">
                                    <tbody id="tbodygeneralk">
                                        <tr><td>Process Name</td>
                                            <td colspan="3" style="width: 50%;" id="opencash"><input type="hidden" name="hdn_id" id="hdn_id"><input style="width: 100%" type="text" name="txt_pname" id="txt_pname"></td>
                                        </tr>
                                        <tr>
                                            <td>Input unit</td>
                                            <td colspan="3" style="width: 50%;" id="cashreceived"><select id="drp_inputunit" name="drp_inputunit" style="width: 100%">
                                                <option value="">--Select--</option>
                                            <?php
                                                foreach ($unit as $key => $value) {
                                                    echo '<option value="'. $value->UnitID .'">'. $value->UnitName .'</option>';
                                                }
                                            ?>
                                            </select></td>
                                        </tr>
                                        <tr>
                                            <td>Output unit</td>
                                            <td colspan="3" style="width: 50%;" id="totalcashinhand"><select id="drp_outputunit" name="drp_outputunit" style="width: 100%">
                                                <option value="">--Select--</option>
                                            <?php
                                                foreach ($unit as $key => $value) {
                                                    echo '<option value="'. $value->UnitID .'">'. $value->UnitName .'</option>';
                                                }
                                            ?>
                                            </select></td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Misp Name</td>
                                            <td colspan="3" style="width: 50%;" id="expenses"><input style="width: 100%" type="text" name="txt_mispname" id="txt_mispname"></td>
                                        </tr>
                                        <tr>
                                            <td>Sub process</td>
                                            <td colspan="3" style="width: 50%;" id="cashgivetoaccount"><select id="drp_process" name="drp_process" style="width: 100%">
                                                <option value="">--Select--</option>
                                            <?php
                                                foreach ($process as $key => $value) {
                                                    echo '<option value="'. $value->PrUniqueID .'">'. $value->PrName .'</option>';
                                                }
                                            ?>
                                            </select></td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Is Active</td>
                                            <td colspan="3" style="width: 50%;" id="totaloutflow"><input type="checkbox" name="chk_isactive" id="chk_isactive" checked></td>
                                        </tr>
                                    </tbody>
                                    
                                </table>
                          
                            </div>
                            <div class="panel-primary panel-footer" style="background-color: #3C8DBC;"></div>
                      </div>
                  </div>
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
                    <h5><strong style="color:red;">InActive Process</strong></h5>
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
            url: "<?php echo base_url(); ?>Production/Extracostmaster/show",
            data: {}
        }).done(function (msg) {
            // alert(msg);
            var main = jQuery.parseJSON(msg);
            var data = main;

            var j = 0;

            if (data.length > 0) {

                var x = 1;
                for (var i = 0; i < data.length; i++) {
                    if (data[i].IsActive == 0) {
                         var trcolor = "style = 'background-color: #e6e600;'";
                    } else {
                        var trcolor = "";
                    }
                    $("#tbodyPopup").append("<tr "+trcolor+" ondblclick='return show_data(" + x + ");'>\n\
                        <td nowrap>\n\
                        <label style='color: #000;'>"+x+"</label>\n\
                            <input type='hidden' id='hdn_costid" + x + "' name='hdn_costid" + x + "' value='" + data[i].CostID + "'></td>\n\
                        <td nowrap>" + data[i].PName + "</td>\n\
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

        var hdn_costid = $("#hdn_costid"+id).val();
        $("#myModal").modal('hide');
        // alert(transid);
        $.blockUI();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>Production/Extracostmaster/retrivedata",
            data: {hdn_costid: hdn_costid}
        }).done(function (msg) {
            // alert(msg);
            // console.log(msg);
            var msg = jQuery.parseJSON(msg);
            var master = msg;
            
            

                $('#txt_pname').val(master[0].PName);
                $('#drp_inputunit').val(master[0].InputUOM);
                $('#drp_outputunit').val(master[0].OutputUOM);
                $('#txt_mispname').val(master[0].MISPName);
                $('#drp_process').val(master[0].PrUniqueID);
                $('#hdn_id').val(master[0].CostID);


                if (master[0].IsActive == 1) {
                    $("#chk_isactive").prop('checked', true);
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
      var txt_pname = $("#txt_pname").val();
      if (txt_pname == '') {
        alertModal("Please Enter Process Name");
        return false;
      }
      var drp_inputunit = $("#drp_inputunit").val();
      if (drp_inputunit == '') {
        alertModal("Please select input unit");
        return false;
      }
      var drp_outputunit = $("#drp_outputunit").val();
      if (drp_outputunit == '') {
        alertModal("Please select Ouput unit");
        return false;
      }
      var drp_process = $("#drp_process").val();
      if (drp_process == '') {
        alertModal("Please select process");
        return false;
      }

      $("#myform").submit();
    }
    
</script>
