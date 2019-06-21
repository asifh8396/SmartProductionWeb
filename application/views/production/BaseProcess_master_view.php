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
    a.dt-button{
    float: right;
    margin-right: -1850%;
    margin-top: -74%;

    }
    #tbl_data_filter {
    color: #333;
    margin-top: -3%;
    }
    input {
        border :none;
    }
    /*#tbodygeneralk tr:hover{background-color: #3C8DBC; }*/
    /*#tbl_product*/
</style>
<form action="<?php echo site_url('Production/BaseProcess_master/Save');?>" method="POST" id='myform'>
<div class="content-wrapper" ><!--  oncontextmenu="return false;"> -->
    <section class="content-header">
        <h1><?php echo $title; ?></h1>
        <ul class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active"><?php echo $title; ?></li>
        </ul>
        <div class="pull-right">
            <a onclick="copyRow();" class="btn btn-primary" data-toggle="tooltip" id="btn_add" data-placement="left" title="Add Row">Add <i class="fa fa-plus"></i></a>
            <a onclick="submitform();" class="btn btn-success" data-toggle="tooltip" id="btn_submit" data-placement="left" title="Save">Save <i class="fa fa-save"></i></a>
            <a href="<?php echo site_url('Production/BaseProcess_master');?>" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="Cancel">Cancel <i class="fa fa-reply"></i></a>
        </div>
    </section>
    <section class="content">
        <div class="box box-primary">
            <div class="box-body" style="padding: 5px;">
                <div style="width:100%">
                    <div style="width:80% !important;">
                    </div>
                    <p id="flashmsg" style='font-size:15px;color:#a94442;float:left;margin: -3px 0 0 0;font-weight: 700;'><?php alert(); ?></p>
                    <?php isset($loginCmp);?>
                    <input type="hidden" id="txt_loginCmp" name="txt_loginCmp" value="<?php echo $loginCmp;?>">
                    <!-- <input type="text" placeholder="Search...." class="form-control" autocomplete="off" style="width:170px;float:right;margin-top: -35px;height: 30px;" id="txt_searchjob" onkeypress="return Searchkld(event,'txt_searchjob','tbodygeneralk');"> -->
                    <table style="width: 100%;" id="tbl_data" class="tbltheadtbodycss">
                        <thead id="thead_joblist">
                            <tr>
                                <th>Pr ID</th>
                                <th>Pr Name</th>
                                <th>Base Table Name</th>
                                <th>Can be online</th>
                                <th>Isactive</th>
                                <th>FP table name</th>
                                <th>Temp fpt table name</th>
                                <th>Input UOM</th>
                                <th>Output UOM</th>
                            </tr>
                        </thead>
                        <tbody id="tbodygeneralk"></tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

</form>

<script src="<?php echo base_url('assets/bootstrap/js/jquery.min.js'); ?>"></script>


        <script>

            $(document).ready(function () {

                table = $('#tbl_data').DataTable({
                    dom: 'rtip',
                    "bSort": true,
                    "order": [],
                    fixedHeader: true,
                    "sScrollY": "460",
                    "sScrollX": "130%",
                    "bPaginate": false,
                    // buttons: ['excel'],
                });

                // $("#btn_show").click(function () {
                 // function data() {   
                    table.destroy();
                    
                    $.blockUI({css: {
                            border: 'none',
                            padding: '15px',
                            backgroundColor: '#000',
                            '-webkit-border-radius': '10px',
                            '-moz-border-radius': '10px',
                            opacity: .5,
                            color: '#fff'
                        }});

                     // alert(toDate);
                    var drp_process = $('#drp_process').val();
                    
                    $("#tbodygeneralk").html('');
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url(); ?>Production/BaseProcess_master/retrivedata",
                        data: {}
                    }).done(function (msg) {
                        //alert(msg);
                        var main = jQuery.parseJSON(msg);
                        var data = main;
                       // alert(data);

                        var j=1;
                        if( data.length>0){                            
                        
                        for (var i = 0; i < data.length; i++) {
                            if (data[i].CanBeOnLine == 1) {
                                canbeonline = "checked='checked'";
                            }else{
                                canbeonline = "";
                            }
                            if (data[i].ISActive == 1) {
                                isactive = "checked='checked'";
                            }else{
                                isactive = '';
                            }
                            if (data[i].ShowLoad == 1) {
                                ShowLoad = "checked='checked'";
                            }else{
                                ShowLoad = '';
                            }
                           
                            $("#tbodygeneralk").append("<tr>\n\
                            <td><input type='hidden' id='hdn_ItemID[" + j + "]' name='hdn_ItemID[" + j + "]'>\n\
                            <input type='hidden' id='hdn_pruniqueid[" + j + "]' name='hdn_pruniqueid[" + j + "]' value="+ data[i].PrUniqueID +">\n\
                            <input type='hidden' id='txt_Shortname[" + j + "]' name='txt_Shortname[" + j + "]' value="+ data[i].ShortName +">\n\
                            <input type='hidden' id='txt_general_seq[" + j + "]' name='txt_general_seq[" + j + "]' value="+ data[i].General_Seq +">\n\
                            <input type='hidden' id='chk_showLoad[" + j + "]' " + ShowLoad + " name='chk_showLoad[" + j + "]'>\n\
                            <input type='text' id='txt_prid[" + j + "]' name='txt_prid[" + j + "]' value="+ data[i].PrID +"></td>\n\
                            <td><input type='text' id='txt_prname[" + j + "]' name='txt_prname[" + j + "]' value="+ data[i].PrName +"></td>\n\
                            <td><input type='text' id='txt_basetable[" + j + "]' name='txt_basetable[" + j + "]' value="+ data[i].BaseTableName +"></td>\n\
                            <td><input type='checkbox' name='chk_canbe_online[" + j + "]' id='chk_canbe_online[" + j + "]' " + canbeonline + " style = 'margin-left:40px;'></td>\n\
                            <td><input type='checkbox' name='chk_isactive[" + j + "]' id='chk_isactive[" + j + "]' " + isactive + " style = 'margin-left:40px;'></td>\n\
                            <td><input type='text' id='txt_ftablename[" + j + "]' name='txt_ftablename[" + j + "]' value="+ data[i].FPTableName +"></td>\n\
                            <td><input type='text' id='txt_temptablename[" + j + "]' name='txt_temptablename[" + j + "]' value="+ data[i].TempFPTableName +"></td>\n\
                            <td><select class = 'drp' id= 'drp_ipunit[" + j + "]' name = 'drp_ipunit[" + j + "]' style = 'width: 100%'>\n\
                            <option value= '0'>----select---</option>\n\
                            <option value= '00002'>sheet</option>\n\
                            <option value= '00011'>Number</option></select></td>\n\
                            <td><select class = 'drp' id= 'drp_outunit[" + j + "]' name= 'drp_outunit[" + j + "]' style='width:100%;'>\n\
                            <option value= '0'>----select---</option>\n\
                            <option value= '00002'>sheet</option>\n\
                            <option value= '00011'>Number</option></select></td>\n\
                            </tr>");
                            $("#drp_ipunit\\[" + j + "\\]").val(data[i].InPutUOM);
                            $("#drp_outunit\\[" + j + "\\]").val(data[i].OutPutUOM);
                        
                          j++;      
                        }
                    }
                    
                       table = $('#tbl_data').DataTable({
                                           dom: 'rtip',
                                           "bSort": false,
                                           fixedHeader: true,
                                           "sScrollY": "460",
                                           "sScrollX": "130%",
                                           "bPaginate": false,

                                       });                      
                        $.unblockUI();
                    });
                });

         function copyRow(){

              var l;
          var tbl_lenght = $('#tbodygeneralk tr').length;
          l = tbl_lenght + 1;   
          $('#tbodygeneralk').append("<tr>\n\
            <td><input type='hidden' id='hdn_ItemID[" + l + "]' name='hdn_ItemID[" + l + "]'>\n\
            <input type='hidden' id='hdn_pruniqueid[" + l + "]' name='hdn_pruniqueid[" + l + "]'>\n\
            <input type='hidden' id='txt_Shortname[" + l + "]' name='txt_Shortname[" + l + "]'>\n\
            <input type='hidden' id='txt_general_seq[" + l + "]' name='txt_general_seq[" + l + "]'>\n\
            <input type='hidden' id='chk_showLoad[" + l + "]' name='chk_showLoad[" + l + "]'>\n\
            <input type='text' id='txt_prid[" + l + "]' name='txt_prid[" + l + "]'></td>\n\
            <td><input type='text' id='txt_prname[" + l + "]' name='txt_prname[" + l + "]'></td>\n\
            <td><input type='text' id='txt_basetable[" + l + "]' name='txt_basetable[" + l + "]'></td>\n\
            <td><input type='checkbox' name='chk_canbe_online[" + l + "]' id='chk_canbe_online[" + l + "]' style = 'margin-left:40px;'></td>\n\
            <td><input type='checkbox' name='chk_isactive[" + l + "]' id='chk_isactive[" + l + "]' style = 'margin-left:40px;'></td>\n\
            <td><input type='text' id='txt_ftablename[" + l + "]' name='txt_ftablename[" + l + "]'></td>\n\
            <td><input type='text' id='txt_temptablename[" + l + "]' name='txt_temptablename[" + l + "]'></td>\n\
            <td><select class = 'drp' id= 'drp_ipunit[" + l + "]' name = 'drp_ipunit[" + l + "]' style = 'width: 100%'>\n\
            <option value= '0'>----select---</option>\n\
            <option value= '00002'>sheet</option>\n\
            <option value= '00011'>Number</option></select></td>\n\
            <td><select class = 'drp' id= 'drp_outunit[" + l + "]' name= 'drp_outunit[" + l + "]' style='width:100%;'>\n\
            <option value= '0'>----select---</option>\n\
            <option value= '00002'>sheet</option>\n\
            <option value= '00011'>Number</option></select></td>\n\
            </tr>");

         }
         function submitform(){

                    // var len = $("#tblbody tr").length;
                
                    // for (var i = 1; i <= len; i++) {

                    //   var bal = $("#txt_balance\\["+ i +"\\]").val();
                    //   if (bal == "") {
                    //   alertModal("Please Enter Amount");
                    //   return false;
                    //    }
                       
                    // }

                  $("#myform").submit();
                }
// }


        </script>
