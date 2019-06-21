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
<form action="<?php echo site_url('Production/ProcessName/Save');?>" method="POST" id='myform'>
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
            <a href="<?php echo site_url('Production/ProcessName');?>" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="Cancel">Cancel <i class="fa fa-reply"></i></a>
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
                                <th>Delete</th>
                                <th>Pr ID</th>
                                <th>Pr Name</th>
                                <th>Description</th>
                                <th>IsActive</th>
                                <th>Ex. Dates</th>
                                <th>Input UOM</th>
                                <th>Output UOM</th>
                                <th>Prod Validation</th>
                                <th>Display List Box</th>
                                <th>Base Pr Unique ID</th>
                                <th>Base Table Name</th>
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

        var option_unit = "";
        var option_process = "";

        $.ajax({
            url: '<?php echo base_url(); ?>Production/ProcessName/drp_unit',
            type: 'POST',
            dataType: 'JSON',
            async:false,
            data: {},
            beforeSend: function () {
            },
            complete: function () {
            },
            success: function (data) {
                // console.log(data);

                option_unit += "<option value=''>--Select--</option>";
                for(var i = 0; i < data.length; i++){
                        option_unit += '<option value='+ data[i].UnitID +'>' + data[i].UnitName + '</option>';
                }
                // alert(option_state);
            },
            error: function () {
            }
        });

        

        $.ajax({
            url: '<?php echo base_url(); ?>Production/ProcessName/drp_process',
            type: 'POST',
            dataType: 'JSON',
            async:false,
            data: {},
            beforeSend: function () {
            },
            complete: function () {
            },
            success: function (data) {
                // console.log(data);

                option_process += "<option value='0'>--Select--</option>";
                for(var i = 0; i < data.length; i++){
                        option_process += '<option value='+ data[i].PrUniqueID +'>' + data[i].PrName + '</option>';
                }
                // alert(option_state);
            },
            error: function () {
            }
        });

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
                        url: "<?php echo base_url(); ?>Production/ProcessName/retrivedata",
                        data: {}
                    }).done(function (msg) {
                        //alert(msg);
                        var main = jQuery.parseJSON(msg);
                        var data = main;
                       // alert(data);

                        var j=1;
                        if( data.length>0){                            
                        
                        for (var i = 0; i < data.length; i++) {
                            if (data[i].ProdValidation == 1) {
                                ProdValidation = "checked='checked'";
                            }else{
                                ProdValidation = "";
                            }
                            if (data[i].IsActive == 1) {
                                isactive = "checked='checked'";
                            }else{
                                isactive = '';
                            }
                            if (data[i].DisplayInListBox == 1.0) {
                                DisplayInListBox = "checked='checked'";
                            }else{
                                DisplayInListBox = '';
                            }
                           
                            // <td><button class='btn btn-danger fa fa-trash' onclick='return DeleteRow("+ j +");' style='padding:5px 7px;' data-toggle='tooltip' data-placement='top' title='Edit'></button></td>\n\
                            $("#tbodygeneralk").append("<tr id='myTableRow["+ j +"]'>\n\
                                <td><a onclick='DeleteRow("+j+");' class='btn btn-danger' data-toggle='tooltip' id='btn_delete' style='padding:1px 4px; data-placement='left' title='Delete Row'><i class='fa fa-trash'></i></a></td>\n\
                            <td><input type='hidden' id='hdn_FormNo[" + j + "]' name='hdn_FormNo[" + j + "]' value="+ data[i].FormNo +">\n\
                            <input type='hidden' id='txt_UnitID[" + j + "]' name='txt_UnitID[" + j + "]' value="+ data[i].UnitID +">\n\
                            <input type='hidden' id='txt_Narration[" + j + "]' name='txt_Narration[" + j + "]' value="+ data[i].Narration +">\n\
                            <input type='hidden' id='txt_CanBeOnLine[" + j + "]' name='txt_CanBeOnLine[" + j + "]' value="+ data[i].CanBeOnLine +">\n\
                            <input type='text' id='txt_prid[" + j + "]' onchange='return chkvalueprid(" + j + ");' name='txt_prid[" + j + "]' value="+ data[i].PrID +"></td>\n\
                            <td><input type='text' id='txt_prname[" + j + "]' name='txt_prname[" + j + "]' value="+ data[i].PrName +"></td>\n\
                            <td><input type='text' id='txt_Description[" + j + "]' name='txt_Description[" + j + "]' value="+ data[i].Description +"></td>\n\
                            <td><input type='checkbox' name='chk_isactive[" + j + "]' id='chk_isactive[" + j + "]' " + isactive + " style = 'margin-left:40px;'></td>\n\
                            <td><input type='text' id='txt_Level[" + j + "]' name='txt_Level[" + j + "]' value="+ data[i].Level +"></td>\n\
                            <td><select class = 'drp' id= 'drp_ipunit[" + j + "]' name = 'drp_ipunit[" + j + "]' style = 'width: 100%'>'"+option_unit+"'</select></td>\n\
                            <td><select class = 'drp' id= 'drp_outunit[" + j + "]' name= 'drp_outunit[" + j + "]' style='width:100%;'>'"+option_unit+"'</select></td>\n\
                            <td><input type='checkbox' name='chk_ProdValidation[" + j + "]' id='chk_ProdValidation[" + j + "]' " + ProdValidation + " style = 'margin-left:40px;'></td>\n\
                            <td><input type='checkbox' name='chk_DisplayInListBox[" + j + "]' id='chk_DisplayInListBox[" + j + "]' " + DisplayInListBox + " style = 'margin-left:40px;'></td>\n\
                            <td><select class = 'drp' id= 'drp_baseprid[" + j + "]' name= 'drp_baseprid[" + j + "]' style='width:100%;'>'"+option_process+"'</td>\n\
                            <td><input type='text' id='txt_BaseTableName[" + j + "]' name='txt_BaseTableName[" + j + "]' value="+ data[i].BaseTableName +"></td>\n\
                            </tr>");
                            $("#drp_ipunit\\[" + j + "\\]").val(data[i].InputUOM);
                            $("#drp_outunit\\[" + j + "\\]").val(data[i].OutPutUOM);
                            $("#drp_baseprid\\[" + j + "\\]").val(data[i].BasePrUniqueID);
                        
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
// href='<?php// echo site_url(); ?>ProcessName/delete'
         function copyRow(){

          var l;
          var tbl_lenght = $('#tbodygeneralk tr').length;
          l = tbl_lenght + 1;   
          $('#tbodygeneralk').append("<tr id='myTableRow["+ l +"]'>\n\
                <td><a onclick='DeleteRow("+l+");' class='btn btn-danger' data-toggle='tooltip' id='btn_delete' data-placement='left' style='padding:1px 4px; title='Delete Row'><i class='fa fa-trash'></i></a></td>\n\
                <td><input type='hidden' id='hdn_FormNo[" + l + "]' name='hdn_FormNo[" + l + "]'>\n\
                <input type='hidden' id='txt_UnitID[" + l + "]' name='txt_UnitID[" + l + "]'>\n\
                <input type='hidden' id='txt_Narration[" + l + "]' name='txt_Narration[" + l + "]'>\n\
                <input type='hidden' id='txt_CanBeOnLine[" + l + "]' name='txt_CanBeOnLine[" + l + "]'>\n\
                <input type='text' id='txt_prid[" + l + "]' onchange='return chkvalueprid(" + l + ");' name='txt_prid[" + l + "]'></td>\n\
                <td><input type='text' id='txt_prname[" + l + "]' name='txt_prname[" + l + "]'></td>\n\
                <td><input type='text' id='txt_Description[" + l + "]' name='txt_Description[" + l + "]'></td>\n\
                <td><input type='checkbox' name='chk_isactive[" + l + "]' id='chk_isactive[" + l + "]' " + isactive + " style = 'margin-left:40px;'></td>\n\
                <td><input type='text' id='txt_Level[" + l + "]' name='txt_Level[" + l + "]'></td>\n\
                <td><select class = 'drp' id= 'drp_ipunit[" + l + "]' name = 'drp_ipunit[" + l + "]' style = 'width: 100%'>'"+option_unit+"'</select></td>\n\
                <td><select class = 'drp' id= 'drp_outunit[" + l + "]' name= 'drp_outunit[" + l + "]' style='width:100%;'>'"+option_unit+"'</select></td>\n\
                <td><input type='checkbox' name='chk_ProdValidation[" + l + "]' id='chk_ProdValidation[" + l + "]' " + ProdValidation + " style = 'margin-left:40px;'></td>\n\
                <td><input type='checkbox' name='chk_DisplayInListBox[" + l + "]' id='chk_DisplayInListBox[" + l + "]' " + DisplayInListBox + " style = 'margin-left:40px;'></td>\n\
                <td><select class = 'drp' id= 'drp_baseprid[" + l + "]' name= 'drp_baseprid[" + l + "]' style='width:100%;'>'"+option_process+"'</td>\n\
                <td><input type='text' id='txt_BaseTableName[" + l + "]' name='txt_BaseTableName[" + l + "]'></td>\n\
            </tr>");

         }
        function DeleteRow(lnk) {
            var row = lnk;
                var agree = confirm("Do You Really Want To Delete This Item ?");
                if (agree == false) {
                    return false;
                }
                else {
                    $('#myTableRow\\['+row+'\\]').remove();
                    return false;
                }
        }

        function chkvalueprid(lnk) {
            var txt_PrID = $("#txt_prid\\[" + lnk + "\\]").val();

            var a = txt_PrID.toLowerCase();
            // alert(a);

            // var numRow = parseInt($("#temp_num_row").val());
            var tbl_lenght = $('#tbodygeneralk tr').length;
            for (var i = 1; i < tbl_lenght; i++) {
                var txt_PrIDc = $("#txt_prid\\[" + i + "\\]").val();
                // alert(txt_PrIDc);
                var b = txt_PrIDc.toLowerCase();
                if (a == b) {
                    alertModal('Duplicate Prid');
                    $("#txt_prname").val('');
                    $("#txt_prid\\[" + lnk + "\\]").focus();
                    $("#txt_prid\\[" + lnk + "\\]").val('');
                    return false;
                }
            }
        }

        function submitform(){

            var len = $("#tbodygeneralk tr").length;
        
            for (var i = 1; i <= len; i++) {

              var txt_prid = $("#txt_prid\\["+ i +"\\]").val();
              if (txt_prid == "") {
              alertModal("Please Enter PrID");
              return false;
               }
              //  var drp_ipunit = $("#drp_ipunit\\["+ i +"\\]").val();
              // if (drp_ipunit == "") {
              // alertModal("Please Select Input UOM");
              // return false;
              //  }
              //  var drp_outunit = $("#drp_outunit\\["+ i +"\\]").val();
              // if (drp_outunit == "") {
              // alertModal("Please Select Output UOM");
              // return false;
              //  }
               var drp_baseprid = $("#drp_baseprid\\["+ i +"\\]").val();
              if (drp_baseprid == "") {
              alertModal("Please Select Base Pr Unique ID");
              return false;
               }
               
            }

          $("#myform").submit();
        }
// }


        </script>
