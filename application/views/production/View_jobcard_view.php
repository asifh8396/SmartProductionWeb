<script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/bh_assets/js/jc_wastagecalculation.js?v=<?php echo date("s"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/bh_assets/js/jc_internaleuse.js?v=<?php echo date("s"); ?>"></script>

<style>

    ul.topnav {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
        background-color: #333;
    }

    ul.topnav li {float: left;}

    ul.topnav li a {
        display: inline-block;
        color: #f2f2f2;
        text-align: center;
        padding: 5px 5px;  /* 14px 10px */
        text-decoration: none;
        transition: 0.3s;
        font-size: 12px;
    }

    ul.topnav li a:hover {background-color: #111;}

    ul.topnav li.icon {display: none;}

    @media screen and (max-width:680px) {
        ul.topnav li:not(:first-child) {display: none;}
        ul.topnav li.icon {
            float: right;
            display: inline-block;
        }
    }

    @media screen and (max-width:680px) {
        ul.topnav.responsive {position: relative;}
        ul.topnav.responsive li.icon {
            position: absolute;
            right: 0;
            top: 0;
        }
        ul.topnav.responsive li {
            float: none;
            display: inline;
        }
        ul.topnav.responsive li a {
            display: block;
            text-align: left;
        }
    }


    #machinedetail { list-style-type: none; margin: 0; padding: 0; width: 100%;  }
    #machinedetail li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }
    #machinedetail li span { position: absolute; margin-left: -1.3em; }

    #machinedetail tr td input{
        border: 0px solid #000;
        width: 94%;
        padding-left: 5px;
    }
    .paperclass{
        width: 99%;
        margin-left: 5px;
    }
    .paperclass thead tr th{
        border: 1px solid #000;
        background-color: #f7ba5b;
        font-size: 12px;
    }
    .paperclass tbody tr td{
        border: 1px solid #000;
        font-size: 12px;
    }
    .paperclass tbody tr td input{
        border: 0px solid #000;
        height: 14px;
        width: 100%;
        padding-left: 5px;
    }
    .paperclass tbody tr td select{
        border: 0px solid #000;
        height: 14px;
        width: 100%;
        padding: 0px;
    }
    .paperclass thead tr th{
        
        color : black;
    }
    #tbody_machien tr td{
        border: 1px solid #000;
        font-size: 10px;
    }
    #tbody_material1 tr td{
        border: 1px solid #000;
        font-size: 10px;
    }
    #tbody_corrugation tr td{
        border: 1px solid #000;
        font-size: 10px;
    }
    #tbody_options tr td{
        border: 1px solid #000;
        font-size: 10px;
    }
    #tbody_material2 tr td{
        border: 1px solid #000;
        font-size: 10px;
    }
    input.thead{
        width: 98%;
        height: 80%;
        padding: 3px;
        box-sizing: border-box;
        font-size: 11px;
    }
    #tbodygeneral tr td{
        padding: 0px;
        margin-left: 0px;
    }
    #tbodygeneral tr td label{
        font-weight: normal;
        font-size: 12px;
        font-family: arial;
        padding: 0px;
        /*margin-bottom: 2px;*/

        /*margin-left: 2px;*/
        /*margin-right: 2px;*/
        /*margin-top: 2px;*/
    }
    .addjob thead tr th{
        font-weight: normal;
        font-size: 11px;
        font-family: arial;
        padding: 0px;
    }
    .addjob tbody tr td label{
        font-weight: normal;
        font-size: 11px;
        font-family: arial;
        padding: 0px;
    }
    .addjob tbody tr td{
        font-weight: normal;
        font-size: 11px;
        font-family: arial;
        padding: 0px;
        border:1px solid #000;
    }
    .addjob tbody tr{
        font-weight: normal;
        font-size: 11px;
        font-family: arial;
        padding: 0px;
        border:1px solid #000;
    }
    #padperdetail tr td{
        padding-left: 5px;
        font-size: 10px;
    }
    #padperdetail tr td input{
        padding-left: 5px;
        width: 99%;
    }
    #detailoptimize tr td label{
        padding-left: 5px;
        font-size: 10px;   
    }
    #detailoptimize tr td{
        padding : 0px;
        font-size: 10px;
        height: 9px;  
    }
    #detailoptimize tr td input{
        padding-left : 5px;
        /*font-size: 10px;*/
        /*height: 9px;  */
    }
    label.side{
        margin-left: 5%;

    }
    li.left{
        margin-top: 10px;
        margin-left: 10px;
        width: 90%;
    }
    li.left label{
        color: #9d9d9d;
        font-weight: normal;
    }
    input.header{
        width: 90%;
    }
    a.agrid{
        cursor: pointer;
    }
    tr.trGeneral{
        padding: 0px;
        font-size: 12px;
        background-color: #f7ba5b;

    }
    .trGeneral tr th{
        padding: 0px;
        font-size: 12px;
        background-color: #f7ba5b;

    }
    .trGeneral tr td{
        padding-left: 5px;
        font-size: 12px;
        background-color: #f7ba5b;

    }
    tr.tr_shoaib td{
        padding: 0px;
    }
    td.tdshoaib{
        padding: 0px
    }
    .tbl_ink{
        width: 80%;
    }
    .tbl_ink thead tr th{
        font-size: 12px;
        padding: 0px;
        /*font-size: 12px;*/
        background-color: #f7ba5b;
        border: 1px solid #000;
        color: black;
    }
    #tbody_ink tr td input{
        width: 50px;
        font-size: 10px;
        border: 0px;

    }
    #tbody_ink tr td{
        width: 100px;
        font-size: 10px;
        border: 1px solid #000;
        background-color: #fff;
    }

    #tbody_lot tr td input{
        font-size: 10px;
    }

    #wastageinfotbl thead tr th{
        border:1px solid #212121;
        background-color: #627aac;
        color: #FFFFFF;
        padding: 2px;
    }
    #wastageinfotbl tbody tr td{
        border:1px solid #ccc;
        padding: 3px;
    }


    .tab_rawmaterial{
        width: 100%;
        font-size: 12px;
        border:1px solid #000;
    }
    .tab_rawmaterial thead tr th{
        font-size: 12px;
        padding: 0px;
        background-color: #f7ba5b;
        border: 1px solid #000;
        color : black;
    }
    .tab_rawmaterial tbody tr td input{
        width: 96%;
        font-size: 10px;
        border: 0px;
    }
    .tab_rawmaterial tbody tr td{
        width: 100px;
        font-size: 12px;
        border: 1px solid #000;
        background-color: #fff;
    }

    .tbl_otherinfo thead tr th{
        font-size: 10px;
        padding: 0px;
        /*font-size: 12px;*/
        background-color: #f7ba5b;
        border: 1px solid #000;
        font-size: 10px;
        color: black;
    }
    .tbl_otherinfo tbody tr td input{
        width: 50px;
        font-size: 10px;
        border: 0px;
    }
    .tbl_otherinfo tbody tr td{
        width: 100px;
        font-size: 10px;
        border: 1px solid #000;
        background-color: #fff;
    }
    #txt_docdate{
        font-size: 12px;
    }
    /*#tbl_rawmaterial tr td input{

    }*/
    .rawdetailstyle{
        background-color: #FFDEAD;
    }
    .rawdetailstyle input{
        background-color: #FFDEAD;
    }
    .button {
        display: block;
        width: 45px;
        height: 25px;
        background: #4E9CAF;
        padding: 1px;
        text-align: center;
        border-radius: 5px;
        color: black;
        font-weight: bold;
        font-style: italic;
        font-size: 12px;
    }
    .menuclass2 tr{
        border-collapse: collapse;
        border-width: thin;
        border-spacing: 2px;
        border-style: none;
        border-color: black;
        border: 0.01px solid;
    }
    .menuclass2 td{
        border-collapse: collapse;
        font-size: 10px;
        padding-left: 10px;
        margin-top: 5px;
        border-width: thin;
        border-spacing: 2px;
        border-style: none;
        border-color: black;
        border: 
            0.01px solid;
    }
    .menuclass2 td input{
        font-size: 10px;
        padding-left: 10px;
        width: 99%;
        border: 0px;
        /*border-collapse: collapse;*/
    }
</style>
<script>
    $(document).ajaxComplete(function () {

        jQuery('.numbersOnly').keyup(function () {
                    this.value = this.value.replace(/[^0-9\.]/g, '');
                });
        $.unblockUI();
    });
    $(function () {
        $("#machinedetail").sortable();

    });
    function show() {
        $("#home").show();
        $("#menu1").hide();
        $('#menu2').hide();
    }
    function summaryshow() {

        $("#home").hide();
        $("#menu1").show();
        $('#menu2').hide();
    }
    function  estimation() {
        var icompanyid = $('#hdn_icompid').val();
        var estidval = $("input[type='hidden'][name='txt_estidno[1]']").val();
        $("#home").hide();
        $("#menu1").hide();
        $('#menu2').show();
        if (estidval != '') {
            $('#txt_estimationmenu2').val(estidval);
            $.ajax({
                type: 'POST',
                url: "<?php echo site_url() ?>Production/Jobcard/estimationdetail",
                data: {estidval: estidval, icompanyid: icompanyid}
            }).done(function (msg) {
                $('#tbodyestimation').html('');
                $('#tbodyfullestimation').html('');
                var main = jQuery.parseJSON(msg);
                var otherdetail = main.pdetial;
                var cutdetil = main.cdetial;
                var obj = main.bdetail;

                for (var i = 0; i < otherdetail.length; i++) {
                    $('#txt_pnamemenu2').val(otherdetail[i].Product);
                    $('#txt_menu2pqty').val(otherdetail[i].Quantity);
                    $('#txt_menu2bdetail').val(otherdetail[i].PaperBoard);
                    $('#txt_menu2wastage').val(otherdetail[i].WastagePer);
                    $('#txt_menu2cby').val(otherdetail[i].UserName);
                    $('#txt_menu2date').val(otherdetail[i].QDate);
                }
                for (var i = 0; i < cutdetil.length; i++) {
                    $('#tbodyestimation').append("<tr>\n\
                        <td>" + cutdetil[i].cutLen + "</td>\n\
                        <td>" + cutdetil[i].CutBre + "</td>\n\
                        <td>" + cutdetil[i].UPS + "</td>\n\
                        <td>" + cutdetil[i].Unit + "</td>\n\
                        <td>" + cutdetil[i].Cuts + "</td></tr>");
                }
                for (var i = 0; i < obj.length; i++) {
                    $('#tbodyfullestimation').append("<tr>\n\
                        <td>" + obj[i].FullSHUps + "</td>\n\
                        <td>" + obj[i].Description + "</td>\n\
                        <td>" + obj[i].Deckel + "</td>\n\
                        <td>" + obj[i].Grain + "</td>\n\
                        <td>" + obj[i].GSM + "</td></tr>");
                }
            });
        }

    }
//         $(document).ready(function () {
//         table = $('#example').DataTable({
//                    dom: 'Bfrtip',
////                    "bSort": true,
//                    "bSortCellsTop": true,
//                    fixedHeader: true,
//                    "sScrollY": "450",
//                    "sScrollX": "100%",
//                    "bPaginate": false,
//                    buttons: []
//                });
//            })

    $(document).ready(function () {
        // $('#example').DataTable({
        //            "sScrollX": "120%",
        //            "bPaginate": false,
        //            "searching": false
        //        });
        $('#hdn_gangitemid').val('');
        $('#hdn_gangrecidestid').val('');
        $("#home").show();
        $("#menu1").hide();
        $('#menu2').hide();
        // $('#txt_docdate').datepicker({changeMonth: true, changeYear: true, dateFormat: 'dd/mm/yy'});
        // $('#txt_closedate').datepicker({changeMonth: true, changeYear: true, dateFormat: 'dd/mm/yy'});
        $('#txt_docdate').datepicker({format: 'dd/mm/yyyy',autoclose: true});
        $('#txt_closedate').datepicker({format: 'dd/mm/yyyy',autoclose: true});

        if ($("#chk_close").is(":checked") == true) {
            $("#btn_save").attr("disabled",true);
        }

        $(document).keypress(function (event) {
            if (event.which == '13') {
                event.preventDefault();
                return false;
            }
        });
        $('#txt_searchjobno').keydown(function () {
            var term1 = $(this).val();
            //alert(term);
            var term = term1.toLowerCase();
            if (term != "")
            {
                $("#tbody_jobdetail tr").hide();
                $("#tbody_jobdetail td").filter(function () {
                    return $(this).text().toLowerCase().indexOf(term) > -1
                }).parent("tr").show();
            }
            else
            {
                $("#tbody_jobdetail tr").show();
            }
        });


        $('#txt_search1').keydown(function () {
            var term1 = $(this).val();

            var term = term1.toLowerCase();
            if (term != "")
            {
                $("#tbl_popup tr").hide();
                $("#tbl_popup td").filter(function () {
                    return $(this).text().toLowerCase().indexOf(term) > -1
                }).parent("tr").show();
            }
            else
            {
                $("#tbl_popup tr").show();
            }
        });


        $('#txt_searchGang').keydown(function () {
            var term1 = $(this).val();
            var term = term1.toLowerCase();
            if (term != "")
            {
                $("#tbody_itemdetail tr").hide();
                $("#tbody_itemdetail td").filter(function () {
                    return $(this).text().toLowerCase().indexOf(term) > -1
                }).parent("tr").show();
            }
            else
            {
                $("#tbody_itemdetail tr").show();
            }
        });

        $('#txt_searchmachine1').keydown(function () {
            var term1 = $(this).val();
            var term = term1.toLowerCase();
            if (term != "")
            {
                $("#tbody_options tr").hide();
                $("#tbody_options td").filter(function () {
                    return $(this).text().toLowerCase().indexOf(term) > -1
                }).parent("tr").show();
            }
            else
            {
                $("#tbody_options tr").show();
            }
        });

        $('#txt_searchmachine').keydown(function () {
            var term1 = $(this).val();
            var term = term1.toLowerCase();
            if (term != "")
            {
                $("#tbody_machien tr").hide();
                $("#tbody_machien td").filter(function () {
                    return $(this).text().toLowerCase().indexOf(term) > -1
                }).parent("tr").show();
            }
            else
            {
                $("#tbody_machien tr").show();
            }
        });        
        $('#txt_searchmachinee').keydown(function () {
            var term1 = $(this).val();
            var term = term1.toLowerCase();
            if (term != "")
            {
                $("#tbody_material2 tr").hide();
                $("#tbody_material2 td").filter(function () {
                    return $(this).text().toLowerCase().indexOf(term) > -1
                }).parent("tr").show();
            }
            else
            {
                $("#tbody_material2 tr").show();
            }
        });

        $('#txt_searchmaterial1').keydown(function () {
            var term1 = $(this).val();
            var term = term1.toLowerCase();
            if (term != "")
            {
                $("#tbody_material1 tr").hide();
                $("#tbody_material1 td").filter(function () {
                    return $(this).text().toLowerCase().indexOf(term) > -1
                }).parent("tr").show();
            }
            else
            {
                $("#tbody_material1 tr").show();
            }
        });



    });

    function board_data(lnk){
        $('#hdn_lnk').val(lnk);
            $('#tbodyPopup').html('');
            $.blockUI();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>Production/Jobcard/boardata",
                // dataType: "JSON",
                data: {}
            }).done(function (msg) {
                // alert(msg);
                // console.log(msg);
                var main = jQuery.parseJSON(msg);
                var data = main;

                if (data.length > 0) {

                    var x = 1;
                    for (var i = 0; i < data.length; i++) {
                        $("#tbodyPopup").append("<tr ondblclick='return update("+ x +");'>\n\
                            <td><input type='hidden' id='hdn_id_board[" + x + "]'  name='hdn_id_board[" + x + "]' value='" + data[i].ID + "'>"+x+"</td>\n\
                            <td>" + data[i].Particular + "</td>\n\
                            <td><input type='text' id='txt_board_remarks[" + x + "]'  name='txt_board_remarks[" + x + "]' style='width : 100%;'></td>\n\
                            \n\
                            \n\
                        </tr>");
                        x++;
                    }
                } else {
                    // alert("No Data Found !");
                }

                $.unblockUI();
            });
        $('#myModal_board_change').modal('show');
    
    }

    function update(lnk) {
        var rowno = $('#hdn_rowno_mill').val();
        // var prname = $("a[name='a_itemname[" + lnk + "\\]']").val();
        var vallnk = $('#hdn_lnk').val();
        var prname = $('#hdn_boarddetailval' + vallnk).val();
        var itemid = $('#hdn_id' + vallnk).val();
        var board = $('#hdn_id_board\\['+lnk+'\\]').val();
        var remark = $('#txt_board_remarks\\['+lnk+'\\]').val();

        var itemclass = $('#hdn_baseid' + vallnk).val();
        var mid = $('#hdn_mid' + vallnk).val();
        var mkind = $('#hdn_mkind' + vallnk).val();
        var gsm = $('#hdn_gsm' + vallnk).val();
        var deckel = $('#hdn_deckel' + vallnk).val();
        var grain = $('#hdn_grain' + vallnk).val();
        var packet = $('#hdn_packet' + vallnk).val();
        var graindir = $('#hdn_graindir' + vallnk).val();
        var mmval = $('#hdn_divfact' + vallnk).val();
        $("input[type='hidden'][name='hdn_itemid1[" + rowno + "\\]']").val(itemid);
        $('#td_mill' + rowno).text(mid);
        $('#td_kind' + rowno).text(mkind);
        $('#td_gsm' + rowno).text(gsm);
        $('#td_dackle' + rowno).text(deckel);
//            $('#td_grain' + rowno).text(grain);
//            $("#txt_grainnn" + rowno).val(grain);
        $('#td_packets' + rowno).text(packet);
        $('#td_graindis' + rowno).text(graindir);

        $("input[type='hidden'][name='hdn_gsm[" + rowno + "\\]']").val(gsm);
        $("input[type='hidden'][name='hdn_dackle[" + rowno + "\\]']").val(deckel);
        $("input[type='hidden'][name='hdn_grain[" + rowno + "\\]']").val(grain);
        $("input[type='text'][name='txt_grain[" + rowno + "\\]']").val(grain);
        $("input[type='text'][name='txt_grainnn[" + rowno + "\\]']").val(grain);
        $("input[type='hidden'][name='hdn_mmval[" + rowno + "\\]']").val(mmval);
        $("input[type='hidden'][name='hdn_paperid[" + rowno + "\\]']").val(itemid);
        $("#txt_hdn_board\\[" + rowno + "\\]").val(board);
        $("#txt_remarks_board\\[" + rowno + "\\]").val(remark);
        $("input[type='hidden'][name='hdn_mil[" + rowno + "\\]']").val(mid);
        $("input[type='hidden'][name='hdn_kind[" + rowno + "\\]']").val(mkind);

        $("input[type='hidden'][name='hdn_borddescrip[" + rowno + "\\]']").val(prname);
        $("input[type='hidden'][name='hdn_mmvalcut[" + rowno + "\\]']").val(mmval);
        $('#myModal').modal('hide');
        $('#myModal_board_change').modal('hide');
        $("#tbl_popup").empty();
    }
    function bindgrid(val) {
        var gangitem = $('#hdn_gangitemid').val();
        if (gangitem == '') {
            var itemid = $("input[type='hidden'][name='hdn_itemid[" + val + "\\]']").val();
        } else {
            var itemid = gangitem;
        }
        var estimateid = $("input[type='hidden'][name='txt_estidno[1]']").val();
        var docid = $('#txt_docidvaldata').val();
        var jobneworold = $('#txt_jobneworold').val();
        // alert(jobneworold);
        var dcnotionval = $('#hdn_dcnotionval').val();

        var icompanyid = $('#hdn_icompid').val();
        // alert(jobneworold);
        // var jobneworold = 'Old';
        // var dcnotionval = '17';
        var tbllen = $('#tbodygeneral tr').length;
        var jobnostr = '';
        for (var i = 1; i <= tbllen; i++) {
            var jobno = $("input[type='hidden'][name='hdn_jobnno[" + i + "]']").val();
            var jobnostr = jobnostr + "'" + jobno + "',";
            $('#jobnodelivery').val(jobnostr);
        }
        var jobnodelivery1 = $('#jobnodelivery').val();
        var jobnodelivery = jobnodelivery1.replace(/,\s*$/, "");



        $.blockUI({css: {
                border: 'none',
                padding: '15px',
                backgroundColor: '#000',
                '-webkit-border-radius': '10px',
                '-moz-border-radius': '10px',
                opacity: .5,
                color: '#fff'
            }});
        // var  = $('#'+val).val();
        $.ajax({
            type: "POST",
            url: "<?php echo site_url() ?>Production/Jobcard/bidngriddata",
            data: {itemid: itemid, docid: docid, jobneworold: jobneworold, dcnotionval: dcnotionval, jobnodelivery: jobnodelivery, estimateid: estimateid, icompanyid: icompanyid}
        }).done(function (msg) {
            // alert(msg);
            $('#padperdetail').html('');
            $('#detailoptimize').html('');
            $('#machinedetail').html('');
            $('#tbody_ink').html('');

            var main = jQuery.parseJSON(msg);
            // alert(main.query3);
            var obj1 = main.chdetail;
            var obj = main.query2;
            var obj3 = main.query3;
            var objink = main.inkdetial;
            var objrawdetail = main.Rawdetail;
            var plydeval = main.Plyde;
            var otherdetail = main.otherdetail;
            var lotdetialval = main.lotdetail;
            var j = 1;
            if (lotdetialval != '') {
                $('#tbody_lot').html('');
                for (var i = 0; i < lotdetialval.length; i++) {
                    $('#tbody_lot').append("<tr>\n\
                        <td><input type='hidden' name='hdn_srno[" + j + "]' id='hdn_srno[" + j + "]' value=" + lotdetialval[i].Srno + "><input type='hidden' name='hdn_lotid[" + j + "]' id='hdn_lotid[" + j + "]' value=" + lotdetialval[i].LotID + ">\n\
                        <input type='text' name='hdn_lotdescri[" + j + "]' id= 'hdn_lotdescri[" + j + "]' value='" + lotdetialval[i].Description + "'></td>\n\
                        <td><input type='text' name='txt_lotno[" + j + "]' id= 'txt_lotno[" + j + "]' value='" + lotdetialval[i].LotNo + "'></td>\n\
                        <td><input type='text' name='txt_cutsheetlot[" + j + "]' id='txt_cutsheetlot[" + j + "]'></td>\n\
                        <td><input type='text' name='txt_upslot[" + j + "]' id='txt_upslot[" + j + "]'></td>\n\
                        <td><input type='text' name='txt_mfgdate[" + j + "]' id= 'txt_mfgdate[" + j + "]' value='" + lotdetialval[i].MfgDate + "'></td>\n\
                        <td><input type='text' name='txt_expdate[" + j + "]' id= 'txt_expdate[" + j + "]' value='" + lotdetialval[i].ExpDate + "'></td>\n\
                        <td><input type='text' name='txt_qtylot[" + j + "]' id='txt_qtylot[" + j + "]' value='" + lotdetialval[i].Qty + "'></td>\n\
                        </tr>");
                    j++;
                }
            }

            if (jobneworold == 'New' && objrawdetail == '') {
                
            } else {
                $('#tbl_rawmaterial').html('');
                var j = 1;

                for (var i = 0; i < objrawdetail.length; i++) {
                    var reqtores = objrawdetail[i].ReqtoReserved;
                    if (reqtores == 1) {
                       var reqtoreschk = "checked='checked'";
                    }else{
                      var reqtoreschk = '';

                    }
                    $('#tbl_rawmaterial').append("<tr>\n\
                            <td class='rawdetailstyle' style='background-color: #FFDEAD'><input type='text' name='txt_rawmaterial[" + j + "]' id='txt_rawmaterial[" + j + "]' value='" + objrawdetail[i].raw_material + "'></td>\n\
                            <td hidden><input type='text' name='txt_Details[" + j + "]' id='txt_Details[" + j + "]' value='" + objrawdetail[i].Details + "'></td>\n\
                            <td><input type='text' name='txt_apprx[" + j + "]' id='txt_apprx[" + j + "]' value=" + objrawdetail[i].Approxqtyreq + "></td>\n\
                            <td><input type='text' name='txt_otherdetail[" + j + "]' id='txt_otherdetail[" + j + "]' value='" + objrawdetail[i].Other_Detail + "'></td>\n\
                            <td><input type='text' name='txt_unit[" + j + "]' id='txt_unit[" + j + "]' value=" + objrawdetail[i].Unit + "></td>\n\
                            <td><input type='checkbox' name='txt_requestocc[" + j + "]' id='txt_requestocc[" + j + "]' " + reqtoreschk + "></td>\n\
                            <td><input type='hidden' name='txt_materialsta[" + j + "]' id='txt_materialsta[" + j + "]' value='" + objrawdetail[i].Material_status + "'><input type='text' name='txt_materialsta_desc[" + j + "]' id='txt_materialsta_desc[" + j + "]' value='" + objrawdetail[i].Material_status + "'></td>\n\
                            <td><input type='text' name='txt_qtyall[" + j + "]' id='txt_qtyall[" + j + "]' value=" + objrawdetail[i].Qty_allocated + "></td>\n\
                            <td hidden><input type='text' name='txt_imr[" + j + "]' id='txt_imr[" + j + "]' value='" + objrawdetail[i].Select_for_IMR + "'></td>\n\
                            <td hidden><input type='text' name='txt_olditemid[" + j + "]' id='txt_olditemid[" + j + "]' value=" + objrawdetail[i].Old_Itmeid + "></td>\n\
                            <td hidden><input type='text' name='txt_oldmatrial[" + j + "]' id='txt_oldmatrial[" + j + "]' value='" + objrawdetail[i].Old_Matieral + "'></td>\n\
                            <td hidden><input type='text' name='txt_recordid[" + j + "]' id='txt_recordid[" + j + "]' value=" + objrawdetail[i].RecordId + "></td>\n\
                            <td hidden><input type='text' name='txt_allcatidid[" + j + "]' id='txt_allcatidid[" + j + "]' value=" + objrawdetail[i].AllocatedID + "></td>\n\
                            <td><input type='text' name='txt_allocatmater[" + j + "]' id='txt_allocatmater[" + j + "]' value='" + objrawdetail[i].AllocatedRawMaterial + "'></td>\n\
                            <td hidden><input type='text' name='txt_Prid[" + j + "]' id='txt_Prid[" + j + "]' value='" + objrawdetail[i].Prid + "'></td>\n\
                            <td hidden><input type='text' name='txt_processta[" + j + "]' id='txt_processta[" + j + "]' value='" + objrawdetail[i].Process_Status + "'></td>\n\
                            <td hidden><input type='text' name='txt_Jobno[" + j + "]' id='txt_Jobno[" + j + "]' value='" + objrawdetail[i].jobno + "'></td>\n\
                            <td hidden><input type='text' name='txt_codeno[" + j + "]' id='txt_codeno[" + j + "]' value=" + objrawdetail[i].Code_No + "></td>\n\
                            <td hidden><input type='text' name='txt_gname[" + j + "]' id='txt_gname[" + j + "]' value='" + objrawdetail[i].Group_Name + "'></td>\n\
                            <td hidden><input type='text' name='txt_' id='txt_'></td>\n\
                            <td hidden><input type='text' name='txt_' id='txt_'></td>\n\
                            <td hidden><input type='text' name='txt_' id='txt_'></td>\n\
                            <td hidden><input type='text' name='txt_' id='txt_'></td>\n\
                            <td hidden><input type='text' name='txt_' id='txt_'></td>\n\
                            <td hidden><input type='text' name='txt_' id='txt_'></td>\n\
                            <td hidden><input type='text' name='txt_' id='txt_'></td>\n\
                            <td hidden><input type='text' name='txt_' id='txt_'></td>\n\
                            </tr>");
                    j++;
                }

            }
            if (jobneworold == 'New') {
                for (var i = 0; i < otherdetail.length; i++) {
                    var margin = otherdetail[i].margin;
                    var gutter = otherdetail[i].gutter;
                    var Plate_Gripper = otherdetail[i].Plate_Gripper;
                    var Job_LPI = otherdetail[i].Job_LPI;

                    $('#txt_margins').val(margin);
                    $('#txt_pasting').val(gutter);
                    $('#txt_macinegr').val(Plate_Gripper);
                    $('#txt_jobarea').val(Job_LPI);
                    $('#txt_reel').val(Job_LPI);

                }
            } else {
                for (var i = 0; i < otherdetail.length; i++) {
                    var margin = otherdetail[i].margin;
                    var gutter = otherdetail[i].gutter;
                    var Plate_Gripper = otherdetail[i].Plate_Gripper;
                    var RemScanning = otherdetail[i].RemScanning;
                    var RemPlanning = otherdetail[i].RemPlanning;
                    var RemPrintLine = otherdetail[i].RemPrintLine;
                    var PastProblems = otherdetail[i].PastProblems;
                    var ShadeCard = otherdetail[i].ShadeCard;
                    var BFBS = otherdetail[i].BFBS;
                    var ChkListNo = otherdetail[i].ChkListNo;
                    var RemDelivery = otherdetail[i].RemDelivery;
                    var RemDesign = otherdetail[i].RemDesign;
                    var OpenSize = otherdetail[i].OpenSize;
                    $('#txt_margins').val(RemScanning);
                    $('#txt_pasting').val(RemPlanning);
                    $('#txt_macinegr').val(Plate_Gripper);
                    $('#txt_printline').val(RemPrintLine);
                    $('#txt_pastprob').val(PastProblems);
                    $('#txt_reel').val(ShadeCard);
                    $('#txt_jobarea').val(ShadeCard);
                    $('#txt_bfbs').val(BFBS);
                    $('#txt_checklist').val(ChkListNo);
                    $('#txt_delivery').val(RemDelivery);
                    $('#txt_desinging').val(RemDesign);
                    $('#txt_jobopen').val(OpenSize);
                }
            }

            var rowno = 1;
            var motehrset = '';
            var totalsheetws = 0;
            for (var i = 0; i < obj.length; i++) {
                motehrset = obj[i].NoofPlates;
                $('#padperdetail').append("<tr>\n\
                    <td>\n\
                        <input type='hidden' name='hdn_mmval[" + rowno + "]' id='hdn_mmval[" + rowno + "]' value=" + obj[i].boarddivfact + ">\n\
                        <input type='hidden' name='hdn_paperid[" + rowno + "]' id='hdn_paperid[" + rowno + "]' value=" + obj[i].PaperID + ">\n\
                        <input type='hidden' name='hdn_borddescrip[" + rowno + "]' id='hdn_borddescrip[" + rowno + "]' value='" + obj[i].BoardDescription + "'>\n\
                        <input type ='hidden' name='txt_hdn_board[" + rowno + "]' id='txt_hdn_board[" + rowno + "]' value='" + obj[i].ChangeID + "'>\n\
                        <input type ='hidden' name='txt_remarks_board[" + rowno + "]' id='txt_remarks_board[" + rowno + "]' value='" + obj[i].Board_remarks + "'>\n\
                        <input type='hidden' name='hdn_mothrrow[" + rowno + "]' id='hdn_mothrrow[" + rowno + "]' value=" + obj[i].NoofPlates + ">\n\
                        <input type='hidden' name='hdn_itemid1[" + rowno + "]' id='hdn_itemid1[" + rowno + "]' value = '" + obj[i].PlateID + "'>\n\
                        <input type ='hidden' name='hdn_mil[" + rowno + "]' id='hdn_mil[" + rowno + "]' value='" + obj[i].Company + "'>\n\
                        <input type ='hidden' name='txt_wastageper[" + rowno + "]' id='txt_wastageper[" + rowno + "]' value='" + obj[i].Wastage + "'>\n\
                        <input type ='hidden' name='hdn_wastage[" + rowno + "]' id='hdn_wastage[" + rowno + "]'>\n\
                        <input type ='hidden' name='txt_fullshbefore[" + rowno + "]' id='txt_fullshbefore[" + rowno + "]' value='" + obj[i].FullSHBeforeWastage + "'>\n\
                        <input type ='hidden' name='txt_wastagesjeets[" + rowno + "]' id='txt_wastagesjeets[" + rowno + "]' value='" + obj[i].WastageSheets + "'>\n\
                        <label style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px;' id='td_mill" + rowno + "'>" + obj[i].Company + "</label></td>\n\
                    <td>\n\
                        <input type ='hidden' name='hdn_kind[" + rowno + "]' id='hdn_kind[" + rowno + "]' value=" + obj[i].Kind + ">\n\
                        <label style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px;' id='td_kind" + rowno + "'>" + obj[i].Kind + "</label></td>\n\
                    <td style ='width:20px;'>\n\
                        <input type ='hidden' name='hdn_gsm[" + rowno + "]' id='hdn_gsm[" + rowno + "]' value=" + obj[i].GSM + ">\n\
                        <label style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px;' id='td_gsm" + rowno + "'>" + obj[i].GSM + "</label></td>\n\
                    <td>\n\
                        <input type ='hidden' name='hdn_dackle[" + rowno + "]' id='hdn_dackle[" + rowno + "]' value=" + obj[i].Length + ">\n\
                        <label style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px;' id='td_dackle" + rowno + "'>" + obj[i].Length + "</label></td>\n\
                    <td>\n\
                        <input type ='hidden' name='hdn_grain[" + rowno + "]' id='hdn_grain[" + rowno + "]' value=" + obj[i].Breadth + ">\n\
                        <input type ='hidden' name='hdn_graindis[" + rowno + "]' id='hdn_graindis[" + rowno + "]'>\n\
                        <input type='text' name='txt_grainnn[" + rowno + "]' id='txt_grainnn[" + rowno + "]' onkeypress='return isNumber(event, this);' value='" + obj[i].Breadth + "'></td>\n\
                    <td>\n\
                        <input type ='text' name='hdn_ups[" + rowno + "]' id='hdn_ups[" + rowno + "]' value=" + obj[i].FullSheetUps + "  onchange='return upschange(" + rowno + ");'></td>\n\
                    <td style='background: #ddd;'>\n\
                        <input type ='text' name='hdn_shreq[" + rowno + "]' id='hdn_shreq[" + rowno + "]' value='" + obj[i].FullSHBeforeWastage + "' readonly='true' style='background: #ddd;' ondblclick='return ShReqClick("+ rowno +");'>\n\
                        <label hidden style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px;' id='td_shreq" + rowno + "'>   " + obj[i].FullSHBeforeWastage + "</label></td>\n\
                    <td>\n\
                        <input type ='text' name='hdn_totalsh[" + rowno + "]' id='hdn_totalsh[" + rowno + "]' value='" + obj[i].FullSheets + "' onkeydown= 'return totalsheet(" + rowno + ")'>\n\
                        <label hidden style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px;' id='td_totalsh" + rowno + "'>" + obj[i].FullSheets + "</label></td>\n\
                    <td>\n\
                        <input type ='text' name='hdn_kgqty[" + rowno + "]' id='hdn_kgqty[" + rowno + "]' value='" + obj[i].Qty + "'>\n\
                        <label hidden style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px;' id='td_kgqty" + rowno + "'>" + obj[i].Qty + "</label></td>\n\
                    <td>\n\
                        <input type ='hidden' name='hdn_packets[" + rowno + "]' id='hdn_packets[" + rowno + "]' value='" + obj[i].PlateID + "'>\n\
                        <label style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px;' id='td_packets" + rowno + "'>" + obj[i].PlateID + "</label></td>\n\
                    <td>\n\
                        <label style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px;' id='td_curr_sk" + rowno + "'>" + obj[i].CurrentStock + "</label></td>\n\
                    <td>\n\
                        <label style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px;' id='td_allo_sk" + rowno + "'>" + obj[i].AllocatedStock + "</label></td>\n\
                    <td>\n\
                        <label style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px;' id='td_avai_sk" + rowno + "'>" + obj[i].AvailableStock + "</label></td>\n\
                    <td style='font-size: 9px;'>\n\
                        <a onclick='return DeleteRow(this);' class='btn btn-danger btn-xs' style='padding: 0px 5px;'><i class='fa fa-trash'></i></a>\n\
                        <a onclick='return addrow(this);'class='btn btn-success btn-xs' style='padding: 0px 5px;'><i class='fa fa-plus'></i></a>\n\
                        <a onclick='return changeboard(" + rowno + ");' style='font-size: 10px;'>Change Board</a></td>\n\
                </tr>");
                var txt_jobneworold = $('#txt_jobneworold').val();
                // if(txt_jobneworold =='Old'){
                //     $('#txt_wsagreamrksper').val(obj[i].Wastage);
                // }
                totalsheetws = parseInt(totalsheetws) + parseInt(obj[i].WastageSheets);
                $('#txt_wassheet').val(totalsheetws);

                var b_remark = $('#txt_remarks_board\\['+rowno+'\\]').val();
                if (b_remark == "null") {
                    $('#span_board').val("");
                }else{
                    $('#span_board').val(b_remark);
                }
                rowno++;
            }
            var j = 1;
            for (var i = 0; i < obj1.length; i++) {
                // alert(obj1[i].WastageSheets);
                // alert(obj1[i].TCutSheets);
                var totwastgsh = parseInt(obj1[i].WastageSheets) + parseInt(obj1[i].SheetsBeforeWastage);
                // alert(totwastgsh);
                $('#detailoptimize').append("<tr>\n\
<td hidden><input type='hidden' name='hdn_mothrrowval[" + j + "]' id='hdn_mothrrowval[" + j + "]' value=" + motehrset + ">\n\
<input type='hidden' name='hdn_mmvalcut[" + j + "]' id='hdn_mmvalcut[" + j + "]' value=" + obj1[i].boarddivfact + ">\n\
<input type='text' name='txt_optimizer[" + j + "]' id='txt_optimizer[" + j + "]' value=" + obj1[i].DocID + "><label hidden style='font-weight: normal;font-size: 10px;font-family: arial;' id='lbl_docid" + j + "'>" + obj1[i].DocID + "</label></td>\n\
<td><input type='text' name='txt_bre[" + j + "]' id='txt_bre[" + j + "]' value=" + obj1[i].B + ">\n\
<label hidden style='font-weight: normal;font-size: 10px;font-family: arial;' id='lbl_b" + j + "'>" + obj1[i].B + "</label></td>\n\
<td><input type='text' name='txt_len[" + j + "]' id='txt_len[" + j + "]' value=" + obj1[i].L + ">\n\
<label hidden style='font-weight: normal;font-size: 10px;font-family: arial;' id='lbl_l" + j + "'>" + obj1[i].L + "</label></td>\n\
<td><input type='text' name='txt_n[" + j + "]' id='txt_n[" + j + "]' value=" + obj1[i].N + " onchange='return cutchange(" + j + ")'>\n\
<label hidden style='font-weight: normal;font-size: 10px;font-family: arial;' id='lbl_tcut" + j + "'>" + obj1[i].N + "</label></td>\n\
<td><input type='text' name='txt_ups[" + j + "]' id='txt_ups[" + j + "]' value=" + obj1[i].UpsInCutSheet + ">\n\
<label hidden style='font-weight: normal;font-size: 10px;font-family: arial;' id='lbl_ups" + j + "'>" + obj1[i].TCutSheets + "</label></td>\n\
<td hidden>\n\
<input type='text' name='txt_cutsh[" + j + "]' id='txt_cutsh[" + j + "]' value=" + obj1[i].TCutSheets + ">\n\
<label hidden style='font-weight: normal;font-size: 10px;font-family: arial;' id='lbl_upsincut" + j + "'>" + obj1[i].TCutSheets + "</label></td>\n\
<td><input type='text' name='txt_c_shbeforews[" + j + "]' id='txt_c_shbeforews[" + j + "]' value=" + obj1[i].SheetsBeforeWastage + "></td>\n\
<td>\n\
<input type='text' name='txt_wastage[" + j + "]' id='txt_wastage[" + j + "]' value=" + totwastgsh + ">\n\
<label hidden style='font-weight: normal;font-size: 10px;font-family: arial;' id='lbl_gridno" + j + "'>" + obj1[i].TCutSheets + "</label></td>\n\
<td><select id='txt_graindis[" + j + "]' name='txt_graindis[" + j + "]'>\n\
<option value=''></option>\n\
<option value='Short'>Short</option>\n\
<option value='Long'>Long</option>\n\
</select>\n\
<input type='hidden' name='txt_graindis1[" + j + "]' id='txt_graindis1[" + j + "]'>\n\
<label hidden style='font-weight: normal;font-size: 10px;font-family: arial;' id='lbl_grain" + j + "'></label></td>\n\
<td hidden><input type='text' name='txt_c_wastageper[" + j + "]' id='txt_c_wastageper[" + j + "]' value=" + obj1[i].WastagePer + "></td>\n\
<td hidden><input type='text' name='txt_c_wastagesh[" + j + "]' id='txt_c_wastagesh[" + j + "]' value=" + obj1[i].WastageSheets + "></td>\n\
<td><a onclick='return addrowpaper(this);' class='btn btn-success btn-xs' style='padding: 0px 5px;'><i class='fa fa-plus'></i></a></td></tr>");
                if (obj1[i].Grain == 'SHORT' || obj1[i].Grain == 'Short') {
                    $("select[name='txt_graindis[" + j + "\\]']").val('Short');
                } else if (obj1[i].Grain == 'LONG' || obj1[i].Grain == 'Long') {
                    $("select[name='txt_graindis[" + j + "\\]']").val('Long');
                } else {
                    $("select[name='txt_graindis[" + j + "\\]']").val('');
                }
                j++;
            }
            var k = 1;
            for (var i = 0; i < obj3.length; i++) {
                // alert(obj3[i].FP_Remarks1);

                $('#machinedetail').append("<tr>\n\
                    <td style='font-size: 9px;background-color: lightgoldenrodyellow;cursor: pointer; width: 1%; text-align: center;'><input type='checkbox' name='chk_delte[" + k + "]' id='chk_delte[" + k + "]' checked></td>\n\
<td onclick='return addprocess(" + k + ");' style='background-color: lightgoldenrodyellow;cursor: pointer;'>\n\
<input type='hidden' name='hdn_autoid[" + k + "]'  id='hdn_autoid[" + k + "]' value=" + obj3[i].AutoId_PK + ">\n\
<input type='hidden' name='hdn_cutboarddim[" + k + "]'  id='hdn_cutboarddim[" + k + "]' value=" + obj3[i].CutBoardDim + ">\n\
<input type='hidden' name='hdn_fullboardno[" + k + "]'  id='hdn_fullboardno[" + k + "]' value=" + obj3[i].FullBoardNo + ">\n\
<input type='hidden' name='hdn_cutdimno[" + k + "]'  id='hdn_cutdimno[" + k + "]' value=" + obj3[i].CutDimNo + ">\n\
<input type='hidden' name='hdn_prqty[" + k + "]'  id='hdn_prqty[" + k + "]' value=" + obj3[i].PrQty + ">\n\
<input type='hidden' name='hdn_PlanUniqueID[" + k + "]'  id='hdn_PlanUniqueID[" + k + "]' value=" + obj3[i].PlanUniqueID + ">\n\
<input type='hidden' name='hdn_raw_id1[" + k + "]'  id='hdn_raw_id1[" + k + "]' value=" + obj3[i].RawMaterialID_1 + ">\n\
<input type='hidden' name='hdn_raw_id2[" + k + "]'  id='hdn_raw_id2[" + k + "]' value=" + obj3[i].RawMaterialID_2 + ">\n\
<input type='hidden' name='hdn_raw_id3[" + k + "]'  id='hdn_raw_id3[" + k + "]' value=" + obj3[i].RawMaterialID_3 + ">\n\
<input type='hidden' name='hdn_raw_id4[" + k + "]'  id='hdn_raw_id4[" + k + "]' value=" + obj3[i].RawMaterialID_4 + ">\n\
<input type='hidden' name='hdn_group_id1[" + k + "]'  id='hdn_group_id1[" + k + "]' value=" + obj3[i].GroupID_1 + ">\n\
<input type='hidden' name='hdn_group_id2[" + k + "]'  id='hdn_group_id2[" + k + "]' value=" + obj3[i].GroupID_2 + ">\n\
<input type='hidden' name='hdn_group_id3[" + k + "]'  id='hdn_group_id3[" + k + "]' value=" + obj3[i].GroupID_3 + ">\n\
<input type='hidden' name='hdn_group_id4[" + k + "]'  id='hdn_group_id4[" + k + "]' value=" + obj3[i].GroupID_4 + ">\n\
<input type='hidden' name='hdn_int_id_info1[" + k + "]'  id='hdn_int_id_info1[" + k + "]' value=" + obj3[i].int_Info1 + ">\n\
<input type='hidden' name='hdn_int_id_info2[" + k + "]'  id='hdn_int_id_info2[" + k + "]' value=" + obj3[i].int_Info2 + ">\n\
<input type='hidden' name='hdn_int_id_info3[" + k + "]'  id='hdn_int_id_info3[" + k + "]' value=" + obj3[i].int_Info3 + ">\n\
<input type='hidden' name='hdn_int_id_info4[" + k + "]'  id='hdn_int_id_info4[" + k + "]' value=" + obj3[i].int_Info4 + ">\n\
<input type='hidden' name='hdn_var_id_info1[" + k + "]'  id='hdn_var_id_info1[" + k + "]' value=" + obj3[i].Var_ID_Info1 + ">\n\
<input type='hidden' name='hdn_var_id_info2[" + k + "]'  id='hdn_var_id_info2[" + k + "]' value=" + obj3[i].Var_ID_Info2 + ">\n\
<input type='hidden' name='hdn_var_id_info3[" + k + "]'  id='hdn_var_id_info3[" + k + "]' value=" + obj3[i].Var_ID_Info3 + ">\n\
<input type='hidden' name='hdn_var_id_info4[" + k + "]'  id='hdn_var_id_info4[" + k + "]' value=" + obj3[i].Var_ID_Info4 + ">\n\
<input type='hidden' name='hdn_dob_info1[" + k + "]'  id='hdn_dob_info1[" + k + "]' value=" + obj3[i].Dob_Info1 + ">\n\
<input type='hidden' name='hdn_dob_info2[" + k + "]'  id='hdn_dob_info2[" + k + "]' value=" + obj3[i].Dob_Info2 + ">\n\
<input type='hidden' name='hdn_dob_info3[" + k + "]'  id='hdn_dob_info3[" + k + "]' value=" + obj3[i].Dob_Info3 + ">\n\
<input type='hidden' name='hdn_dob_info4[" + k + "]'  id='hdn_dob_info4[" + k + "]' value=" + obj3[i].Dob_Info4 + ">\n\
<input type='hidden' name='hdn_dob_info5[" + k + "]'  id='hdn_dob_info5[" + k + "]' value=" + obj3[i].Dob_Info5 + ">\n\
<input type='hidden' name='hdn_dob_info6[" + k + "]'  id='hdn_dob_info6[" + k + "]' value=" + obj3[i].Dob_Info6 + ">\n\
<input type='hidden' name='hdn_dob_info7[" + k + "]'  id='hdn_dob_info7[" + k + "]' value=" + obj3[i].Dob_Info7 + ">\n\
<input type='hidden' name='hdn_dob_info8[" + k + "]'  id='hdn_dob_info8[" + k + "]' value=" + obj3[i].Dob_Info8 + ">\n\
<input type='hidden' name='hdn_dob_info9[" + k + "]'  id='hdn_dob_info9[" + k + "]' value=" + obj3[i].Dob_Info9 + ">\n\
<input type='hidden' name='hdn_baseprid[" + k + "]'  id='hdn_baseprid[" + k + "]' value=" + obj3[i].ProcessID + ">\n\
<input type='hidden' name='hdn_processName[" + k + "]' id='hdn_processName[" + k + "]' value='" + obj3[i].ProcessName + "'>\n\
<input type='hidden' name='hdn_mmtimeval[" + k + "]'  id='hdn_mmtimeval[" + k + "]'>\n\
<input type='hidden' name='hdn_pptimeval[" + k + "]'  id='hdn_pptimeval[" + k + "]'>\n\
<input type='hidden' name='hdn_tottimeval[" + k + "]'  id='hdn_tottimeval[" + k + "]'>\n\
<input type='hidden' name='hdn_machienid[" + k + "]'  id='hdn_machienid[" + k + "]' value='" + obj3[i].MachineNo + "'><input  ondblclick='return jobcomplexity(" + k + ")' type='hidden' name='hdn_jobcomplexity[" + k + "]' style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px; margin-left: 5px;' id='hdn_jobcomplexity[" + k + "]' value='" + obj3[i].IntricacyID + "'>\n\
<label style='font-weight: normal;font-size: 10px;font-family: arial;margin-left: 3px;' id='lbl_pname" + k + "'>" + obj3[i].ProcessName + "</label></td>\n\
<td><select style='font-size: 10px; width: 98%;font-family: arial;padding: 0px; border: 0px;' id='drp_fb[" + k + "]' name='drp_fb[" + k + "]'>\n\
<option value='0'></option>\n\
<option value='Front'>Front</option>\n\
<option value='Back'>Back</option></select></td>\n\
<td ondblclick='return info1(" + k + ")' style='background-color: lightgoldenrodyellow;cursor: pointer;'><input type='text' name='txt_info1[" + k + "]'  style='font-weight: normal;font-size: 10px;font-family: arial; margin-left: 2px;background-color: lightgoldenrodyellow;' id='txt_info1[" + k + "]' value='" + obj3[i].Var_Info1 + "'></td>\n\
<td ondblclick='return info2(" + k + ")' style='background-color: lightgoldenrodyellow;cursor: pointer;'><input type='text' name='txt_info2[" + k + "]' style='font-weight: normal;font-size: 10px;font-family: arial;margin-left: 2px;background-color: lightgoldenrodyellow;' id='txt_info2[" + k + "]' value='" + obj3[i].Var_Info2 + "'></td>\n\
<td><input type='hidden' name='hdn_info3[" + k + "]' id='hdn_info3[" + k + "]' value='" + obj3[i].Var_Info3 + "'><label style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px; margin-left: 2px;' id='lbl_info3" + k + "'>" + obj3[i].Var_Info3 + "</label></td>\n\
<td><select style='font-size: 10px; width: 98%;font-family: arial;padding: 0px; border: 0px;' id='drp_inhose[" + k + "]' name='drp_inhose[" + k + "]'>\n\
<option value='0'>----Select----</option>\n\
<option value='1'>In House</option>\n\
<option value='2'>Online</option>\n\
<option value='3'>Os</option></select></td>\n\
<td>\n\
<select style='font-size: 10px; width: 98%;font-family: arial;padding: 0px; border: 0px;' id='drp_pass[" + k + "]' name='drp_pass[" + k + "]'>\n\
<option value='1'>First Pass</option>\n\
<option value='2'>Second Pass</option>\n\
<option value='3'>Thired Pass</option>\n\
<option value='4'>Forth Pass</option>\n\
</select>\n\
</td>\n\
<td><label ondblclick='return jobcomplexity(" + k + ")' style='font-size:10px;' id='lbl_estdesccomplex" + k + "'>" + obj3[i].IntricacyDesc + "</label></td>\n\
<td><input oninput ='return caloninput1(" + k + ");' onchange='return calcutime1(this)' type='text' name='txt_mmtime[" + k + "]' style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px; margin-left: 5px;' id='txt_mmtime[" + k + "]' value='" + obj3[i].MrTime + "'></td>\n\
<td><input oninput ='return caloninput2(" + k + ");' onchange='return calcutime2(this)' type='text' name='txt_protime[" + k + "]' style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px; margin-left: 5px;' id='txt_protime[" + k + "]' value='" + obj3[i].ProcessTime + "'></td>\n\
<td><input type='text' name='txt_tottimeqty[" + k + "]' style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px; margin-left: 2px;' id='txt_tottimeqty[" + k + "]' value='" + obj3[i].TotTime + "' readonly></td>\n\
<td ondblclick='return showmachien(" + k + ")' style='background-color: lightgoldenrodyellow;cursor: pointer;'><input type='hidden' name='hdn_machinenameval[" + k + "]' id='hdn_machinenameval[" + k + "]' value='" + obj3[i].MachineName + "'><label style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px; margin-left: 2px;background-color: lightgoldenrodyellow;' id='lbl_machienname" + k + "'>" + obj3[i].MachineName + "</label></td>\n\
<td><input type='text' name='txt_remark[" + k + "]' style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px; margin-left: 5px;' id='txt_remark[" + k + "]' value='" + obj3[i].FP_Remarks1 + "'></td>\n\
<td ondblclick='return materail1(" + k + ")' style='background-color: lightgoldenrodyellow;cursor: pointer;'><input type='text' name = 'txt_raw1[" + k + "]' style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px; margin-left: 2px;background-color: lightgoldenrodyellow;' id= 'txt_raw1[" + k + "]' value='" + obj3[i].RawMaterial_1 + "'></td>\n\
<td ondblclick='return materail2(" + k + ")' style='background-color: lightgoldenrodyellow;cursor: pointer;'><input type='text' name = 'txt_raw2[" + k + "]' style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px; margin-left: 2px;background-color: lightgoldenrodyellow;' id= 'txt_raw2[" + k + "]' value='" + obj3[i].RawMaterial_2 + "'></td>\n\
<td ondblclick='return materail3(" + k + ")' style='background-color: lightgoldenrodyellow;cursor: pointer;'><input type='text' name = 'txt_raw3[" + k + "]' style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px; margin-left: 2px;background-color: lightgoldenrodyellow;' id= 'txt_raw3[" + k + "]' value='" + obj3[i].RawMaterial_3 + "'></td>\n\
<td ondblclick='return materail4(" + k + ")' style='background-color: lightgoldenrodyellow;cursor: pointer;'><input type='text' name = 'txt_raw4[" + k + "]' style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px; margin-left: 2px;background-color: lightgoldenrodyellow;' id= 'txt_raw4[" + k + "]' value='" + obj3[i].RawMaterial_4 + "'></td>\n\
</tr>");
                // alert(obj3[i].FB);
                if (obj3[i].FB != 'F' && obj3[i].FB != 'B') {
                    $("select[name='drp_fb[" + k + "\\]']").val(0);
                } else if (obj3[i].FB != 'B') {
                    $("select[name='drp_fb[" + k + "\\]']").val('Front');
                } else {
                    $("select[name='drp_fb[" + k + "\\]']").val('Back');
                }
                if (obj3[i].ExecutionID != '') {
                    $("select[name='drp_inhose[" + k + "\\]']").val(obj3[i].ExecutionID);
                } else {
                    $("select[name='drp_inhose[" + k + "\\]']").val(0);
                }
                $("select[name='drp_pass[" + k + "\\]']").val(obj3[i].NoOfPass);

                k++;
            }
            var v = 1;
            for (var i = 0; i < objink.length; i++) {
                var Frontbacke = '';
                var Front_val = '';
                var backe_val = '';
                Frontbacke = objink[i].FrontBack;

                if (Frontbacke == 'F') {
                    Front_val = "checked='checked'";
                } else if (Frontbacke == 'B') {
                    backe_val = "checked='checked'";
                }
                $('#tbody_ink').append("<tr>\n\
                    <td>\n\
                        <input type='hidden' name='hdn_inkid[" + v + "]' id='hdn_inkid[" + v + "]' value='" + objink[i].Inkid + "'>\n\
                        <input type='text' ondblclick='return showink(" + v + ");' name='txt_inkdescri[" + v + "]' id='hdn_inkdescri[" + v + "]' value='" + objink[i].Description + "' style='width:99%'>\n\
                    </td>\n\
                    <td>\n\
                        <input type='text' name='txt_color[" + v + "]' id='txt_color[" + v + "]' value='" + objink[i].colour + "' style='width:99%'>\n\
                    </td>\n\
                    <td>\n\
                        <input type='text' name='txt_shno[" + v + "]' id='txt_shno[" + v + "]' value='" + objink[i].ShadeNo + "' style='width:99%'>\n\
                    </td>\n\
                    <td>\n\
                        <input type='text' name='txt_unitink[" + v + "]' id='txt_unitink[" + v + "]' value='" + objink[i].InkUnit + "' style='width:99%'>\n\
                    </td>\n\
                    <td>\n\
                        <input type='text' name='txt_quality[" + v + "]' id='txt_quality[" + v + "]' value='' style='width:99%'>\n\
                    </td>\n\
                    <td>\n\
                        <input type='text' name='txt_miscode[" + v + "]' id='txt_miscode[" + v + "]' value='" + objink[i].MisCode + "' style='width:99%'>\n\
                    </td>\n\
                    <td>\n\
                        <input type='checkbox' name='chk_front[" + v + "]' id='chk_front[" + v + "]' " + Front_val + " >\n\
                    </td>\n\
                    <td>\n\
                        <input type='checkbox' name='chk_back[" + v + "]' id='chk_back[" + v + "]' " + backe_val + " >\n\
                    </td>\n\
                </tr>");
                v++;
            }
            $('#palydetail').html('');
            var j = 1;

            var lenpval = plydeval.length;
            if (lenpval >= 1) {
                for (var i = 0; i < plydeval.length; i++) {
                    $('#palydetail').append("<tr>\n\
                        <td>\n\
                            <input type='hidden' name='txt_ppid[" + j + "]' id='txt_ppid[" + j + "]' value='" + plydeval[i].DocId + "'>\n\
                            <input type='hidden' name='txt_ppfluteid[" + j + "]' id='txt_ppfluteid[" + j + "]' value='" + plydeval[i].FluteID + "'>\n\
                            <input type='hidden' name='txt_ppitemidp[" + j + "]' id='txt_ppitemidp[" + j + "]' value='" + plydeval[i].ItemID + "'>\n\
                            <input type='hidden' name='txt_pprowno[" + j + "]' id='txt_pprowno[" + j + "]' value='" + plydeval[i].RowNo + "'>\n\
                            <input type='text' name='txt_pflutedesc[" + j + "]' id='txt_pflutedesc[" + j + "]' value='" + plydeval[i].FluteDesc + "'></td>\n\
                        <td ondblclick='return showcorrugation(" + j + ")'>\n\
                            <input type='text' name='txt_pkraftdesc[" + j + "]' id='txt_pkraftdesc[" + j + "]' value='" + plydeval[i].KraftDesc + "'>\n\
                        </td>\n\
                        <td hidden>\n\
                            <input type='text' name='txt_pdeclinefact[" + j + "]' id='txt_pdeclinefact[" + j + "]' value='" + plydeval[i].DeclineFact + "'>\n\
                        </td>\n\
                        <td hidden>\n\
                            <input type='text' name='txt_pextracons[" + j + "]' id='txt_pextracons[" + j + "]' value='" + plydeval[i].ExtraConsump + "'>\n\
                        </td>\n\
                        <td>\n\
                            <input type='text' name='txt_pkgreq[" + j + "]' id='txt_pkgreq[" + j + "]' value='" + plydeval[i].KgReq + "'>\n\
                        </td>\n\
                        <td>\n\
                            <input type='text' name='txt_ppgsm[" + j + "]' id='txt_ppgsm[" + j + "]' value='" + plydeval[i].GSM + "'>\n\
                        </td>\n\
                        <td>\n\
                            <input type='text' name='txt_ppfact[" + j + "]' id='txt_ppfact[" + j + "]' value='" + plydeval[i].Cfact + "'>\n\
                        </td>\n\
                    </tr>");
                    j++;
                }
            } else {
                $('#palydetail').append("<tr hidden>\n\
                    <td>\n\
                        <input type='hidden' name='txt_ppid[1]' id='txt_ppid[1]' value='1'>\n\
                        <input type='hidden' name='txt_ppfluteid[1]' id='txt_ppfluteid[1]'>\n\
                        <input type='hidden' name='txt_ppitemidp[1]' id='txt_ppitemidp[1]'>\n\
                        <input type='hidden' name='txt_pprowno[1]' id='txt_pprowno[1]'>\n\
                        <input type='text' name='txt_pflutedesc[1]' id='txt_pflutedesc[1]'></td>\n\
                    <td ondblclick='return showcorrugation(1)'>\n\
                        <input type='text' name='txt_pkraftdesc[1]' id='txt_pkraftdesc[1]'>\n\
                    </td>\n\
                    <td hidden>\n\
                        <input type='text' name='txt_pdeclinefact[1]' id='txt_pdeclinefact[1]'>\n\
                    </td>\n\
                    <td hidden>\n\
                        <input type='text' name='txt_pextracons[1]' id='txt_pextracons[1]'>\n\
                    </td>\n\
                    <td>\n\
                        <input type='text' name='txt_pkgreq[1]' id='txt_pkgreq[1]'>\n\
                    </td>\n\
                    <td>\n\
                        <input type='text' name='txt_ppgsm[1]' id='txt_ppgsm[1]'>\n\
                    </td>\n\
                    <td>\n\
                        <input type='text' name='txt_ppfact[1]' id='txt_ppfact[1]'>\n\
                    </td>\n\
                </tr>");
            }
        });
    }


    function isNumber(evt, element) {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (
                (charCode != 8) && // “Backspace” 
                (charCode != 9) && // “tab” 
                (charCode != 37) && // “arrow” 
                (charCode != 38) && // “arrow”  
                (charCode != 39) && // “arrow” 
                (charCode != 40) && // “arrow” 
                (charCode != 46 || $(element).val().indexOf('.') != -1) && // “.” CHECK DOT, AND ONLY ONE.
                (charCode < 48 || charCode > 57))
            return false;

        return true;
    }
    function materail1(lnk) {
        var prid = $('#hdn_baseprid\\['+lnk+'\\]').val();
        if (prid == 'PCut' || prid == 'FCut' || prid == 'Pr') {
             alert("Board/Paper Selection Not Allow From here.\nPlease change it in Board Detail Section");
             return false;
        }else{
        
        $('#btn_material1').click();
        $('#hdn_rowmachine').val(lnk);

        if (prid == 'FC') {

        var materailid = '00035';

        }else if(prid == 'FL' || prid == 'Pa'){

        var materailid = '00003';

        }else if(prid == 'FL'){

    	var materailid = '00006';

        }else if (prid == 'PL') {

        var materailid = '00004';

        }else if(prid == 'PCut'){

        var materailid = '00034';

        }else if(prid == 'FC'){

        var materailid = '00088';
        }else if(prid == 'FF'){

        var materailid = '00007';
        }else if(prid == 'Pack'){

        var materailid = '00106';
        }else if(prid == 'WP'){

        var materailid = '00051';        
        }else if(prid == 'BBP'){

        var materailid = '00001';
        }else{
           materailid = ''; 
        }

        $.blockUI({css: {
                border: 'none',
                padding: '15px',
                backgroundColor: '#000',
                '-webkit-border-radius': '10px',
                '-moz-border-radius': '10px',
                opacity: .5,
                color: '#fff'
            }});
        $.ajax({
            type: "POST",
            url: "<?php echo site_url() ?>Production/Jobcard/materaildetail1",
            data: {materailid: materailid}
        }).done(function (msg) {
            $('#tbody_material1').html('');
            var main = jQuery.parseJSON(msg);
            var j = 1;
            for (var i = 0; i < main.length; i++) {
                $('#tbody_material1').append("<tr onclick='return setmaterail1(" + j + ")'><td><input type='hidden' name='hdn_itemid1val" + j + "' id='hdn_itemid1val" + j + "' value=" + main[i].itemid + "><label style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px;' id='lbl_itemname1val" + j + "'>" + main[i].Description + "</label></td></tr>")
                j++;
            }
        });
      }
    }
    function materail2(lnk) {
        $('#btn_material2').click();
        $('#hdn_rowmachine').val(lnk);
        var prid = $('#hdn_baseprid\\['+lnk+'\\]').val();
        if (prid == 'FC') {
        var materailid = '00064';
        }else if(prid == 'FL' || prid == 'Pa'){
         var materailid = '00003';
        }else{
        	var materailid = '';
        }
        $.blockUI({css: {
                border: 'none',
                padding: '15px',
                backgroundColor: '#000',
                '-webkit-border-radius': '10px',
                '-moz-border-radius': '10px',
                opacity: .5,
                color: '#fff'
            }});
        $.ajax({
            type: "POST",
            url: "<?php echo site_url() ?>Production/Jobcard/materaildetail2",
            data: {materailid: materailid}
        }).done(function (msg) {
            $('#tbody_material2').html('');
            var main = jQuery.parseJSON(msg);
            var j = 1;
            for (var i = 0; i < main.length; i++) {
                $('#tbody_material2').append("<tr onclick='return setmaterail2(" + j + ")'><td><input type='hidden' name='hdn_itemid2val" + j + "' id='hdn_itemid2val" + j + "' value=" + main[i].itemid + "><label style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px;' id='lbl_itemname2val" + j + "'>" + main[i].Description + "</label></td></tr>")
                j++;
            }
        });
    }

    function showmachien(lnk) {
        $('#btn_machine').click();
        // data-toggle='modal' data-target='#myModalMachien'
        $('#hdn_rowmachine').val(lnk);
        var prid = $("input[name='hdn_baseprid[" + lnk + "\\]']").val();
        $.blockUI({css: {
                border: 'none',
                padding: '15px',
                backgroundColor: '#000',
                '-webkit-border-radius': '10px',
                '-moz-border-radius': '10px',
                opacity: .5,
                color: '#fff'
            }});
        $.ajax({
            type: "POST",
            url: "<?php echo site_url() ?>Production/Jobcard/machine",
            data: {prid: prid}
        }).done(function (msg) {
            // alert(msg);
            $('#tbody_machien').html('');
            var main = jQuery.parseJSON(msg);
            var j = 1;
            for (var i = 0; i < main.length; i++) {
                $('#tbody_machien').append("<tr onclick='return setmacien(" + j + ")'><td><input type='hidden' name='hdn_machineid" + j + "' id='hdn_machineid" + j + "' value=" + main[i].RecId + "><label style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px; padding-left:5px;' id='lbl_machine" + j + "'>" + main[i].MachineName + "</label></td></tr>")
                j++;
            }
        });
    }

    function setmacien(lnk) {
        var rowmachine = $('#hdn_rowmachine').val();
        var machineid = $('#hdn_machineid' + lnk).val();
        var machinename = $('#lbl_machine' + lnk).text();
        $("input[name='hdn_machienid[" + rowmachine + "\\]']").val(machineid);
        $('#lbl_machienname' + rowmachine).text(machinename);
        $('#myModalMachien').modal('hide');
    }
    function setmaterail1(lnk) {
        var rowmachine = $('#hdn_rowmachine').val();
        // alert(rowmachine);
        var material1id = $('#hdn_itemid1val' + lnk).val();
        var materian1name = $('#lbl_itemname1val' + lnk).text();
        $("input[type='text'][name='txt_raw1[" + rowmachine + "\\]']").val(materian1name);
        // alert(materian1name);
        // $('#lbl_raw1'+rowmachine).text(materian1name);
        $('#myModalmaterial1').modal('hide');
    }
    function setmaterail2(lnk) {
        var rowmachine = $('#hdn_rowmachine').val();
        // alert(rowmachine);
        var material2id = $('#hdn_itemid2val' + lnk).val();
        var materian2name = $('#lbl_itemname2val' + lnk).text();
        $("input[type='text'][name='txt_raw2[" + rowmachine + "\\]']").val(materian2name);
        $("input[type='hidden'][name='hdn_raw_id2[" + rowmachine + "\\]']").val(material2id);
        // $('#lbl_raw2'+rowmachine).text(materian2name);
        $('#myModalmaterial2').modal('hide');
    }
    function addrowpaper() {
        var padperdetail = $('#padperdetail tr').length;
        var motherrow = $("input[type='hidden'][name='hdn_mothrrow[" + padperdetail + "\\]']").val();
        var hdn_mmvalcut = $("input[type='hidden'][name='hdn_mmvalcut[" + padperdetail + "\\]']").val();
        var len1 = $('#detailoptimize tr').length;
        var len = len1 + 1;
        $('#detailoptimize').append("<tr>\n\
                                        <td hidden><input type='hidden' name='hdn_mothrrowval[" + len + "]' id='hdn_mothrrowval[" + len + "]' value=" + motherrow + "><input type='hidden' name='hdn_mmvalcut[" + len + "]' id='hdn_mmvalcut[" + len + "]' value = " + hdn_mmvalcut + "><input type='text' name='txt_optimizer[" + len + "]' id='txt_optimizer[" + len + "]'></td>\n\
                                        <td><input type='text' name='txt_bre[" + len + "]' id='txt_bre[" + len + "]'><label hidden style='font-weight: normal;font-size: 10px;font-family: arial;' id='lbl_b" + len + "'></label></td>\n\
                                        <td><input type='text' name='txt_len[" + len + "]' id='txt_len[" + len + "]'></td>\n\
                                        <td><input type='text' name='txt_n[" + len + "]' id='txt_n[" + len + "]' onchange='return cutchange(" + len + ")'><label hidden style='font-weight: normal;font-size: 10px;font-family: arial;' id='lbl_tcut" + len + "'></label></td>\n\
                                        <td><input type='text' name='txt_ups[" + len + "]' id='txt_ups[" + len + "]'><label hidden style='font-weight: normal;font-size: 10px;font-family: arial;' id='lbl_ups" + len + "'></label></td>\n\
                                        <td hidden><input type='text' name='txt_cutsh[" + len + "]' id='txt_cutsh[" + len + "]'><label hidden style='font-weight: normal;font-size: 10px;font-family: arial;' id='lbl_upsincut" + len + "'></label></td>\n\
                                        <td><input type='text' name='txt_c_shbeforews[" + len + "]' id='txt_c_shbeforews[" + len + "]'></td>\n\
                                        <td><input type='text' name='txt_wastage[" + len + "]' id='txt_wastage[" + len + "]'><label hidden style='font-weight: normal;font-size: 10px;font-family: arial;' id='lbl_gridno" + len + "'></label></td>\n\
                                        <td><select id='txt_graindis[" + len + "]' id='txt_graindis[" + len + "]'>\n\
<option value=''></option>\n\
<option value='Short'>Short</option>\n\
<option value='Long'>Long</option>\n\
</select><input type='hidden' name='txt_graindis1[" + len + "]' id='txt_graindis1[" + len + "]'><label hidden style='font-weight: normal;font-size: 10px;font-family: arial;' id='lbl_grain" + len + "'></label></td>\n\
<td hidden><input type='text' name='txt_c_wastageper[" + len + "]' id='txt_c_wastageper[" + len + "]'></td>\n\
<td hidden><input type='text' name='txt_c_wastagesh[" + len + "]' id='txt_c_wastagesh[" + len + "]'></td>\n\
                                    <td><a onclick='return addrowpaper(this);' class='btn btn-success btn-xs' style='padding: 0px 5px;'><i class='fa fa-plus'></i></a></td></tr>");
    }



    // function changeboard(val) {
    //     $('#hdn_rowno_mill').val(val);
    //     $("#tbl_popup").html("");
    //     $('#btn_add').click();
    //     $.blockUI({css: {
    //             border: 'none',
    //             padding: '15px',
    //             backgroundColor: '#000',
    //             '-webkit-border-radius': '10px',
    //             '-moz-border-radius': '10px',
    //             opacity: .5,
    //             color: '#fff'
    //         }});
    //     $.ajax({
    //         type: "POST",
    //         url: "<?php //echo site_url() ?>Production/Jobcard/showpop",
    //         data: {Btn: "Select Process"}
    //     }).done(function (msg) {
    //         $('#tbl_popup').append(msg);
    //     });
    // }

    function changeboard(val) {
    $('#hdn_rowno_mill').val(val);
    $("#tbl_popup").html("");
    $('#btn_add').click();
    $.blockUI({css: {
        border: 'none',
        padding: '15px',
        backgroundColor: '#000',
        '-webkit-border-radius': '10px',
        '-moz-border-radius': '10px',
        opacity: .5,
        color: '#fff'
    }});
    $.ajax({
        type: "POST",
        url: "<?php echo base_url() ?>Production/Jobcard/showpop",
        data: {Btn: "Select Process",JCItemID:$("#txt_JCItemID\\[1\\]").val()},
        beforeSend: function () {
            $.blockUI();
        },
        complete: function () {
            $.unblockUI();
        },
        success: function (msg) {
            // console.log(msg);
            $('#tbl_popup').append(msg);
        },
        error: function () {
            $.unblockUI();
        }
    });
}




    function addrow() {
        $("#tbl_popup").html("");
        var padperdetail = $('#padperdetail tr').length;
        var rowno = padperdetail + 1;
        
        var motherrow = $("input[type='hidden'][name='hdn_mothrrow[" + padperdetail + "\\]']").val();
        var rowmoth = parseInt(motherrow) + 1;
        
        var len1 = $('#detailoptimize tr').length;
        var len = len1 + 1;
        
        $('#hdn_rowno_mill').val(rowno);
        $('#btn_add').click();
        $.blockUI();
        $.ajax({
            type: "POST",
            url: "<?php echo site_url() ?>Production/Jobcard/showpop",
            data: {Btn: "Select Process",JCItemID:$("#txt_JCItemID\\[1\\]").val()}
        }).done(function (msg) {
            // alert(msg);
            $('#tbl_popup').append(msg);
        });
        $('#padperdetail').append("<tr>\n\
            <td><input type='hidden' name='hdn_mmval[" + rowno + "]' id='hdn_mmval[" + rowno + "]'>\n\
            <input type='hidden' name='hdn_paperid[" + rowno + "]' id='hdn_paperid[" + rowno + "]'><input type='hidden' name='hdn_borddescrip[" + rowno + "]' id='hdn_borddescrip[" + rowno + "]'>\n\
            <input type ='hidden' name='txt_hdn_board[" + rowno + "]' id='txt_hdn_board[" + rowno + "]'>\n\
                <input type ='hidden' name='txt_remarks_board[" + rowno + "]' id='txt_remarks_board[" + rowno + "]'>\n\
            <input type='hidden' name='hdn_mothrrow[" + rowno + "]' id='hdn_mothrrow[" + rowno + "]' value=" + rowmoth + "><input type='hidden' name='hdn_itemid1[" + rowno + "]' id='hdn_itemid1[" + rowno + "]'><input type ='hidden' name='hdn_mil[" + rowno + "]' id='hdn_mil[" + rowno + "]'><label style='font-weight: normal;font-size: 11px;font-family: arial;padding: 0px;' id='td_mill" + rowno + "'></label></td>\n\
            <td><input type ='hidden' name='hdn_kind[" + rowno + "]' id='hdn_kind[" + rowno + "]'><label style='font-weight: normal;font-size: 11px;font-family: arial;padding: 0px;' id='td_kind" + rowno + "'></label></td>\n\
            <td><input type ='hidden' name='hdn_gsm[" + rowno + "]' id='hdn_gsm[" + rowno + "]'><label style='font-weight: normal;font-size: 11px;font-family: arial;padding: 0px;' id='td_gsm" + rowno + "'></label></td>\n\
            <td><input type ='hidden' name='hdn_dackle[" + rowno + "]' id='hdn_dackle[" + rowno + "]'><label style='font-weight: normal;font-size: 11px;font-family: arial;padding: 0px;' id='td_dackle" + rowno + "'></label></td>\n\
            <td><input type ='hidden' name='hdn_grain[" + rowno + "]' id='hdn_grain[" + rowno + "]'><input type='text' name='txt_grain[" + rowno + "]' id='txt_grain[" + rowno + "]'  onkeypress='return isNumber(event, this);'><label style='font-weight: normal;font-size: 11px;font-family: arial;padding: 0px;' id='td_grain" + rowno + "'></label></td>\n\
            <td hidden><input type ='hidden' name='hdn_graindis[" + rowno + "]' id='hdn_graindis[" + rowno + "]'><label style='font-weight: normal;font-size: 11px;font-family: arial;padding: 0px;' id='td_graindis" + rowno + "'></label></td>\n\
            <td><input type ='text' name='hdn_ups[" + rowno + "]' id='hdn_ups[" + rowno + "]' onchange='return upschange(" + rowno + ");'><label style='font-weight: normal;font-size: 11px;font-family: arial;padding: 0px;' id='td_ups" + rowno + "'></label></td>\n\
            <td style='background: #ddd;'><input type ='text' name='hdn_shreq[" + rowno + "]' id='hdn_shreq[" + rowno + "]' readonly='true' style='background: #ddd;' ondblclick='return ShReqClick("+ rowno +");'><label hidden style='font-weight: normal;font-size: 11px;font-family: arial;padding: 0px;' id='td_shreq" + rowno + "'></label></td>\n\
            <td hidden><input type ='text' name='hdn_wastage[" + rowno + "]' id='hdn_wastage[" + rowno + "]'><label hidden style='font-weight: normal;font-size: 11px;font-family: arial;padding: 0px;' id='td_wastage" + rowno + "'></label></td>\n\
            <td><input type ='text' name='hdn_totalsh[" + rowno + "]' id='hdn_totalsh[" + rowno + "]' onkeydown= 'return totalsheet(" + rowno + ")'><label hidden style='font-weight: normal;font-size: 11px;font-family: arial;padding: 0px;' id='td_totalsh" + rowno + "'></label></td>\n\
            <td><input type ='text' name='hdn_kgqty[" + rowno + "]' id='hdn_kgqty[" + rowno + "]'><label hidden style='font-weight: normal;font-size: 11px;font-family: arial;padding: 0px;' id='td_kgqty" + rowno + "'></label></td>\n\
            <td><input type ='hidden' name='hdn_packets[" + rowno + "]' id='hdn_packets[" + rowno + "]'><label style='font-weight: normal;font-size: 11px;font-family: arial;padding: 0px;' id='td_packets" + rowno + "'></label></td>\n\
            <td hidden><input type ='text' name='txt_wastageper[" + rowno + "]' id='txt_wastageper[" + rowno + "]'></td>\n\
            <td hidden><input type ='text' name='txt_fullshbefore[" + rowno + "]' id='txt_fullshbefore[" + rowno + "]'></td>\n\
            <td hidden><input type ='text' name='txt_wastagesjeets[" + rowno + "]' id='txt_wastagesjeets[" + rowno + "]'></td>\n\
            <td><label style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px;' id='td_curr_sk" + rowno + "'>0</label></td>\n\
            <td><label style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px;' id='td_allo_sk" + rowno + "'>0</label></td>\n\
            <td><label style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px;' id='td_avai_sk" + rowno + "'>0</label></td>\n\
            <td style='font-size: 9px;'><a onclick='return DeleteRow(this);' class='btn btn-danger btn-xs' style='padding: 0px 5px;'><i class='fa fa-trash'></i></a>\n\
                        <a onclick='return addrow(this);'class='btn btn-success btn-xs' style='padding: 0px 5px;'><i class='fa fa-plus'></i></a>\n\
            <a onclick='return changeboard(" + rowno + ");' style='font-size: 10px;'>Change Board</a></td>\n\
        </tr>");
        $('#detailoptimize').append("<tr>\n\
            <td hidden><input type='hidden' name='hdn_mothrrowval[" + len + "]' id='hdn_mothrrowval[" + len + "]' value=" + rowmoth + "><input type='hidden' name='hdn_mmvalcut[" + len + "]' id='hdn_mmvalcut[" + len + "]'><input type='text' name='txt_optimizer[" + len + "]' id='txt_optimizer[" + len + "]'></td>\n\
            <td><input type='text' name='txt_bre[" + len + "]' id='txt_bre[" + len + "]'><label hidden style='font-weight: normal;font-size: 10px;font-family: arial;' id='lbl_b" + len + "'></label></td>\n\
            <td><input type='text' name='txt_len[" + len + "]' id='txt_len[" + len + "]'></td>\n\
            <td><input type='text' name='txt_n[" + len + "]' id='txt_n[" + len + "]' onchange='return cutchange(" + len + ")'><label hidden style='font-weight: normal;font-size: 10px;font-family: arial;' id='lbl_tcut" + len + "'></label></td>\n\
            <td><input type='text' name='txt_ups[" + len + "]' id='txt_ups[" + len + "]'><label hidden style='font-weight: normal;font-size: 10px;font-family: arial;' id='lbl_ups" + len + "'></label></td>\n\
            <td hidden><input type='text' name='txt_cutsh[" + len + "]' id='txt_cutsh[" + len + "]'><label hidden style='font-weight: normal;font-size: 10px;font-family: arial;' id='lbl_upsincut" + len + "'></label></td>\n\
            <td><input type='text' name='txt_c_shbeforews[" + len + "]' id='txt_c_shbeforews[" + len + "]'></td>\n\
            <td><input type='text' name='txt_wastage[" + len + "]' id='txt_wastage[" + len + "]'><label hidden style='font-weight: normal;font-size: 10px;font-family: arial;' id='lbl_gridno" + len + "'></label></td>\n\
            <td><select id='txt_graindis[" + len + "]' id='txt_graindis[" + len + "]'>\n\
<option value=''></option>\n\
<option value='Short'>Short</option>\n\
<option value='Long'>Long</option>\n\
</select><input type='hidden' name='txt_graindis1[" + len + "]' id='txt_graindis1[" + len + "]'><label hidden style='font-weight: normal;font-size: 10px;font-family: arial;' id='lbl_grain" + len + "'></label></td>\n\
<td hidden><input type='text' name='txt_c_wastageper[" + len + "]' id='txt_c_wastageper[" + len + "]'></td>\n\
<td hidden><input type='text' name='txt_c_wastagesh[" + len + "]' id='txt_c_wastagesh[" + len + "]'></td>\n\
                                    <td><a onclick='return addrowpaper(this);' class='btn btn-success btn-xs' style='padding: 0px 5px;'><i class='fa fa-plus'></i></a></td></tr>");
    }

    function showjob(val) {
        var woid = $('#hdn_woid' + val).val();
        var jobno = $('#hdn_jobno' + val).val();
        $('#btn_myModaljobcard').click();
        // $.blockUI();
        // $.ajax({
        //     type: "POST",
        //     url: "<?php //echo site_url() ?>Production/Jobcard/showwo",
        //     data: {jobno: jobno, woid: woid}
        // }).done(function (msg) {
        //     $('#tbody_jobdetail').html('');
        //     var main = jQuery.parseJSON(msg);
        //     var i = 1;
        //     for (var j = 0; j < main.length; j++) {

        //         $('#tbody_jobdetail').append("<tr onclick='return setnewjob(" + i + ")'>\n\
        //             <td><input type='hidden' name='hdn_clientidval" + i + "' id='hdn_clientidval" + i + "' value = '" + main[j].ClientId + "'>\n\
        //                 <input type='hidden' id='hdn_cpval" + i + "' value = '" + main[j].CP + "'>\n\
        //             <label id='lbl_jobno" + i + "'>" + main[j].JobNo + "</label</td>\n\
        //             <td><label id='lbl_woid" + i + "'>" + main[j].WOID + "</label</td>\n\
        //             <td><label style='width: 500px;' id='lbl_prodctname" + i + "'>" + main[j].ProductName + "</label</td>\n\
        //             <td><label id='lbl_miscode" + i + "'>" + main[j].MiSCodeNo + "</label</td>\n\
        //             <td><label id='lbl_clientcode" + i + "'>" + main[j].ClientProductCodeNo + "</label</td>\n\
        //             <td><label id='lbl_estimateno" + i + "'>" + main[j].EstimateNo + "</label</td>\n\
        //             <td><label style='width: 125px;' id='lbl_wodate" + i + "'>" + main[j].WODate + "</label</td>\n\
        //             <td><label style='width: 125px;' id='lbl_deliveryreqdate" + i + "'>" + main[j].DeliveryRequiredDate + "</label</td>\n\
        //             <td><label id='lbl_artworkno" + i + "'>" + main[j].ArtWorkCode + "</label</td>\n\
        //             <td><label style='width: 500px;' id='lbl_clientname" + i + "'>" + main[j].CustomerName + "</label</td>\n\
        //             <td><label style='width: 500px;' id='lbl_reamrks" + i + "'>" + main[j].Remarks + "</label</td></tr>");
        //         i++;
        //     }
        // });
    }

    function setnewjob(val) {
        var jobval = $('#lbl_jobno' + val).text();
        var clientidval = $('#hdn_clientidval' + val).val();
        var cpval = $('#hdn_cpval' + val).val();
        var lblwoid = $('#lbl_woid' + val).text();
        // alert();
        $.blockUI();
        $.ajax({
            type: "POST",
            url: "<?php echo site_url() ?>Production/Jobcard/jobcardval",
            data: {jobval: jobval, CP:cpval}
        }).done(function (msg) {
            var main = jQuery.parseJSON(msg);
            var len = $('#tbodygeneral tr').length;
            var j = parseInt(len) + 1;
            for (var i = 0; i < main.length; i++) {
                $('#tbodygeneral').append("<tr class='trGeneral' style='background-color:white;'>\n\
                <td style='font-size: 9px;'>\n\
<a onclick='return DeleteRowmain(this);' class='btn btn-danger btn-xs' style='padding: 0px 5px;'><i class='fa fa-trash'></i></a>\n\
</td>\n\
<td onclick = 'return bindgrid(" + j + ")' style ='padding-left: 5px;background-color: lightskyblue;'>\n\
<input type='hidden' name='hdn_itemid[" + j + "]' id='hdn_itemid[" + j + "]' value=" + main[i].itemid + ">\n\
" + main[i].Jobno + "</td>\n\
<td  onclick = 'return showjob(" + j + ")' style ='padding-left: 5px;background-color: lightskyblue;'><input type='hidden' name='hdn_woid[" + j + "]' id='hdn_woid[" + j + "]' value = '" + lblwoid + "'>\n\
<input type='hidden' name='hdn_clientid[" + j + "]' id='hdn_clientid[" + j + "]' value=" + clientidval + ">\n\
<input type='hidden' name='hdn_cp[" + j + "]' id='hdn_cp[" + j + "]' value="+ main[i].CP +">\n\
<input type='hidden' name='txt_specification[" + j + "]' id='txt_specification[" + j + "]' value='00000'>\n\
<input type='hidden' name='txt_TotQtyDispatched[" + j + "]' id='txt_TotQtyDispatched[" + j + "]' value='" + main[i].TotalQtyDispatched + "'>\n\
<input type='hidden' name='txt_TotQtyProduced[" + j + "]' id='txt_TotQtyProduced[" + j + "]' value='0'>\n\
<input type='hidden' name='hdn_jobnno[" + j + "]' id='hdn_jobnno[" + j + "]' value='" + main[i].Jobno + "'>" + lblwoid + "</td>\n\
    <td style='padding-left: 5px;'><input type='hidden' name='txt_[]' id='txt_[]' class='form-control' style='padding: 0px' value='" + main[i].Description + "'>" + main[i].Description + "</td>\n\
    <td></td>\n\
    <td style='padding-left: 5px;'><input type='hidden' name='txt_[]' id='txt_[]' class='form-control' style='padding-left: 5px;' value='" + main[i].AccCode + "'>" + main[i].AccCode + "</td>\n\
    <td style ='padding-left: 5px;'>" + main[i].ArtWorkNo + "</td>\n\
    <td style='padding-left: 5px;'><input type='hidden' name='txt_[]' id='txt_[]' class='form-control' style='padding: 0px' value='" + main[i].IPrefix + "'>" + main[i].IPrefix + "</td>\n\
    <td style='padding-left: 5px;'><input type='hidden' name='txt_orderqty[" + j + "]' id='txt_orderqty[" + j + "]' class='form-control' style='padding: 0px' value=" + main[i].Quantity + ">" + main[i].Quantity + "</td>\n\
    <td style='padding-left: 5px;'>\n\
    <input style='border:0px;' type='text' name='txt_printqty[" + j + "]' id='txt_printqty[" + j + "]' value='' onchange='return onchangeotp();'>\n\
    </td>\n\
    <td style='padding-left: 5px;'><input type='hidden' name='txt_[]' id='txt_[]' class='form-control' style='padding: 0px' value='" + main[i].WONo + "'>" + main[i].WONo + "</td>\n\
     <td style='padding-left: 5px; width: 50px;'>\n\
<input style='border:0px;' type='text' name='txt_upsvalmain[" + j + "]' id='txt_upsvalmain[" + j + "]' value='' onchange='return onchangeotp();'></td>\n\
    <td style='padding-left: 5px; width: 50px;'>\n\
        <input style='border:0px;' type='text' name='txt_fqty[" + j + "]' id='txt_fqty[" + j + "]' onchange='return onchangeotp();'>\n\
    </td>\n\
    <td style='padding-left: 5px;'>" + main[i].CompanyName + "</td>\n\
    <td style='display: none'>\n\
        <input type='hidden' name='txt_[]' id='txt_[]' class='form-control' style='padding: 0px' value='" + main[i].itemid + "'></td>\n\
    <td style='display: none'>\n\
        <input type='hidden' name='txt_[]' id='txt_[]' class='form-control' style='padding: 0px' value='" + main[i].Specification + "'></td>\n\
    </tr>");
                j++;
            }
        });
        $('#myModaljobcard').modal('hide');
        $("#tbody_jobdetail").empty();
    }


    function addprocess(val) {
        var hdn_baseprid = $("input[type='hidden'][name='hdn_baseprid[" + val + "\\]']").val();

        if (hdn_baseprid != '') {
            var agree = confirm("Do You Really Want To add This Process ?");
            if (agree == false) {
                return false;
            }
        }

        var lbl_pname = $('#lbl_pname' + val).text();
        var info1 = $("input[type='text'][name='txt_info1[" + val + "\\]']").val();
        var info2 = $("input[type='text'][name='txt_info2[" + val + "\\]']").val();
        var remark = $("input[type='text'][name='txt_remark[" + val + "\\]']").val();
        var raw1 = $("input[type='text'][name='txt_raw1[" + val + "\\]']").val();
        var raw2 = $("input[type='text'][name='txt_raw2[" + val + "\\]']").val();

        var tbllen = $('#machinedetail tr').length;
        var currnrow = tbllen + 1;
        $('#machinedetail').append("<tr>\n\
                        <td style='font-size: 9px;background-color: lightgoldenrodyellow;cursor: pointer; width: 1%; text-align: center;'><input type='checkbox' name='chk_delte[" + currnrow + "]' id='chk_delte[" + currnrow + "]' checked></td>\n\
                            <td onclick='return addprocess(" + currnrow + ");' style='background-color: lightgoldenrodyellow;cursor: pointer;'>\n\
                            <input type='hidden' name='hdn_autoid[" + currnrow + "]'  id='hdn_autoid[" + currnrow + "]'>\n\
<input type='hidden' name='hdn_cutboarddim[" + currnrow + "]'  id='hdn_cutboarddim[" + currnrow + "]'>\n\
<input type='hidden' name='hdn_fullboardno[" + currnrow + "]'  id='hdn_fullboardno[" + currnrow + "]'>\n\
<input type='hidden' name='hdn_cutdimno[" + currnrow + "]'  id='hdn_cutdimno[" + currnrow + "]'>\n\
<input type='hidden' name='hdn_prqty[" + currnrow + "]'  id='hdn_prqty[" + currnrow + "]'>\n\
<input type='hidden' name='hdn_PlanUniqueID[" + currnrow + "]'  id='hdn_PlanUniqueID[" + currnrow + "]'>\n\
<input type='hidden' name='hdn_raw_id1[" + currnrow + "]'  id='hdn_raw_id1[" + currnrow + "]'>\n\
<input type='hidden' name='hdn_raw_id2[" + currnrow + "]'  id='hdn_raw_id2[" + currnrow + "]'>\n\
<input type='hidden' name='hdn_group_id1[" + currnrow + "]'  id='hdn_group_id1[" + currnrow + "]'>\n\
<input type='hidden' name='hdn_group_id2[" + currnrow + "]'  id='hdn_group_id2[" + currnrow + "]'>\n\
<input type='hidden' name='hdn_int_id_info1[" + currnrow + "]'  id='hdn_int_id_info1[" + currnrow + "]'>\n\
<input type='hidden' name='hdn_int_id_info2[" + currnrow + "]'  id='hdn_int_id_info2[" + currnrow + "]'>\n\
<input type='hidden' name='hdn_int_id_info3[" + currnrow + "]'  id='hdn_int_id_info3[" + currnrow + "]'>\n\
<input type='hidden' name='hdn_int_id_info4[" + currnrow + "]'  id='hdn_int_id_info4[" + currnrow + "]'>\n\
<input type='hidden' name='hdn_var_id_info1[" + currnrow + "]'  id='hdn_var_id_info1[" + currnrow + "]'>\n\
<input type='hidden' name='hdn_var_id_info2[" + currnrow + "]'  id='hdn_var_id_info2[" + currnrow + "]'>\n\
<input type='hidden' name='hdn_var_id_info3[" + currnrow + "]'  id='hdn_var_id_info3[" + currnrow + "]'>\n\
<input type='hidden' name='hdn_var_id_info4[" + currnrow + "]'  id='hdn_var_id_info4[" + currnrow + "]'>\n\
<input type='hidden' name='hdn_dob_info1[" + currnrow + "]'  id='hdn_dob_info1[" + currnrow + "]'>\n\
<input type='hidden' name='hdn_dob_info2[" + currnrow + "]'  id='hdn_dob_info2[" + currnrow + "]'>\n\
<input type='hidden' name='hdn_dob_info3[" + currnrow + "]'  id='hdn_dob_info3[" + currnrow + "]'>\n\
<input type='hidden' name='hdn_dob_info4[" + currnrow + "]'  id='hdn_dob_info4[" + currnrow + "]'>\n\
<input type='hidden' name='hdn_raw_id3[" + currnrow + "]'  id='hdn_raw_id3[" + currnrow + "]'>\n\
<input type='hidden' name='hdn_raw_id4[" + currnrow + "]'  id='hdn_raw_id4[" + currnrow + "]'>\n\
<input type='hidden' name='hdn_group_id3[" + currnrow + "]'  id='hdn_group_id3[" + currnrow + "]'>\n\
<input type='hidden' name='hdn_group_id4[" + currnrow + "]'  id='hdn_group_id4[" + currnrow + "]'>\n\
<input type='hidden' name='hdn_dob_info5[" + currnrow + "]'  id='hdn_dob_info5[" + currnrow + "]'>\n\
<input type='hidden' name='hdn_dob_info6[" + currnrow + "]'  id='hdn_dob_info6[" + currnrow + "]'>\n\
<input type='hidden' name='hdn_dob_info7[" + currnrow + "]'  id='hdn_dob_info7[" + currnrow + "]'>\n\
<input type='hidden' name='hdn_dob_info8[" + currnrow + "]'  id='hdn_dob_info8[" + currnrow + "]'>\n\
<input type='hidden' name='hdn_dob_info9[" + currnrow + "]'  id='hdn_dob_info9[" + currnrow + "]'>\n\
<input type='hidden' name='hdn_baseprid[" + currnrow + "]'  id='hdn_baseprid[" + currnrow + "]'  value=" + hdn_baseprid + "><input type='hidden' name='hdn_jobcomplexity[" + currnrow + "]' style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px; margin-left: 5px;' id='hdn_jobcomplexity[" + currnrow + "]'>\n\
<input type='hidden' name='hdn_processName[" + currnrow + "]' id='hdn_processName[" + currnrow + "]'>\n\
<input type='hidden' name='hdn_machienid[" + currnrow + "]'  id='hdn_machienid[" + currnrow + "]'>\n\<label style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px; margin-left: 2px;' id='lbl_pname" + currnrow + "'>" + lbl_pname + "</label></td>\n\
                            <td><select style='font-size: 10px; width: 98%;font-family: arial;padding: 0px; border: 0px;' id='drp_fb[" + currnrow + "]' name='drp_fb[" + currnrow + "]'>\n\
                            <option value='Front'>Front</option>\n\
                            <option value='Back'>Back</option></select></td>\n\
                            <td ondblclick='return info1(" + currnrow + ")' style='background-color: lightgoldenrodyellow;cursor: pointer;'><input type='text' name='txt_info1[" + currnrow + "]' style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px; margin-left: 2px; background-color: lightgoldenrodyellow;' id='txt_info1[" + currnrow + "]' value=" + info1 + "></td>\n\
                            <td ondblclick='return info2(" + currnrow + ")' style='background-color: lightgoldenrodyellow;cursor: pointer;'><input type='text' name='txt_info2[" + currnrow + "]'  style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px; margin-left: 2px; background-color: lightgoldenrodyellow;' id='txt_info2[" + currnrow + "]'  value=" + info2 + "></td>\n\
                            <td><input type='hidden' name='hdn_info3[" + currnrow + "]' id='hdn_info3[" + currnrow + "]'><label style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px; margin-left: 2px;' id='lbl_info3" + currnrow + "'></label></td>\n\
                            <td><select style='font-size: 10px; width: 98%;font-family: arial;padding: 0px; border: 0px;' id='drp_inhose[" + currnrow + "]' name='drp_inhose[" + currnrow + "]'>\n\
                            <option value='0'>----Select----</option>\n\
                            <option value='1'>In House</option>\n\
                            <option value='2'>Online</option>\n\
                            <option value='3'>Os</option></select></td>\n\
                            <td>\n\
                            <select style='font-size: 10px; width: 98%;font-family: arial;padding: 0px; border: 0px;' id='drp_pass[" + currnrow + "]' name='drp_pass[" + currnrow + "]'>\n\
                            <option value='1'>First Pass</option>\n\
                            <option value='2'>Second Pass</option>\n\
                            <option value='3'>Thired Pass</option>\n\
                            <option value='4'>Forth Pass</option>\n\
                            </select>\n\
                            </td>\n\
                            <td><label ondblclick='return jobcomplexity(" + currnrow + ")' style='font-size:10px;' id='lbl_estdesccomplex" + currnrow + "'></label></td>\n\
                            <td hidden><label style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px; margin-left: 2px;' id='lbl_info3" + currnrow + "'></label></td>\n\
<td><input onchange='return calcutime1(" + currnrow + ")' type='text' name='txt_mmtime[" + currnrow + "]' style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px; margin-left: 2px;' id='txt_mmtime[" + currnrow + "]'></td>\n\
<td><input onchange='return calcutime2(" + currnrow + ")' type='text' name='txt_protime[" + currnrow + "]' style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px; margin-left: 2px;' id='txt_protime[" + currnrow + "]'></td>\n\
<td><input type='text' name='txt_tottimeqty[" + currnrow + "]' style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px; margin-left: 2px;' id='txt_tottimeqty[" + currnrow + "]'></td>\n\
                            <td ondblclick='return showmachien(" + currnrow + ")' style='background-color: lightgoldenrodyellow;cursor: pointer;'><input type='hidden' name='hdn_machinenameval[" + currnrow + "]' id='hdn_machinenameval[" + currnrow + "]'><label style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px; margin-left: 2px; background-color: lightgoldenrodyellow;' id='lbl_machienname" + currnrow + "'></label></td>\n\
                            <td><input type='text' name='txt_remark[" + currnrow + "]' style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px; margin-left: 2px;' id='txt_remark[" + currnrow + "]' value=" + remark + "></td>\n\
                            <td ondblclick='return materail1(" + currnrow + ")' style='background-color: lightgoldenrodyellow;cursor: pointer;'><input type='text' name = 'txt_raw1[" + currnrow + "]' style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px; margin-left: 2px; background-color: lightgoldenrodyellow;' id='txt_raw1[" + currnrow + "]' value=" + raw1 + "></td>\n\
                            <td ondblclick='return materail2(" + currnrow + ")' style='background-color: lightgoldenrodyellow;cursor: pointer;'><input type='text' style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px; margin-left: 2px; background-color: lightgoldenrodyellow;' name= 'txt_raw1[" + currnrow + "]' id='txt_raw2[" + currnrow + "]' value=" + raw2 + "></td>\n\
                            <td ondblcliccurrnrow='return materail3(" + currnrow + ")' style='baccurrnrowground-color: lightgoldenrodyellow;cursor: pointer;'><input type='text' name = 'txt_raw3[" + currnrow + "]' style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px; margin-left: 2px;baccurrnrowground-color: lightgoldenrodyellow;' id= 'txt_raw3[" + currnrow + "]'></td>\n\
<td ondblcliccurrnrow='return materail4(" + currnrow + ")' style='baccurrnrowground-color: lightgoldenrodyellow;cursor: pointer;'><input type='text' name = 'txt_raw4[" + currnrow + "]' style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px; margin-left: 2px;baccurrnrowground-color: lightgoldenrodyellow;' id= 'txt_raw4[" + currnrow + "]'></td>\n\
                        </tr>");
    }


    function DeleteRowmain(lnkk) {
        var row = lnkk.parentNode.parentNode;
        var rowIndex = row.rowIndex;
        var rowno = (document.getElementById("example").rows.length) - 1;


        if (rowno > 1) {
            var agree = confirm("Do You Really Want To Delete This Item ?");
            if (agree == false) {
                return false;
            }
            else {
                document.getElementById("example").deleteRow(rowIndex);
                return false;
            }
        }
    }

    function DeleteRow(lnkk) {
        var row = lnkk.parentNode.parentNode;
        var rowIndex = row.rowIndex;
        var rowno = (document.getElementById("tbl_detail").rows.length) - 1;
        var rowno = (document.getElementById("tbl_opti").rows.length) - 1;

        if (rowno > 1) {
            var agree = confirm("Do You Really Want To Delete This Item ?");
            if (agree == false) {
                return false;
            }
            else {
                document.getElementById("tbl_detail").deleteRow(rowIndex);
                document.getElementById("tbl_opti").deleteRow(rowIndex);
                return false;
            }
        }
    }

    function changedocid() {
        $('#btn_docidnew').click();
        var icompanyid = $('#hdn_icompid').val();
        $.blockUI({css: {
                border: 'none',
                padding: '15px',
                backgroundColor: '#000',
                '-webkit-border-radius': '10px',
                '-moz-border-radius': '10px',
                opacity: .5,
                color: '#fff'
            }});
        $.ajax({
            type: "POST",
            url: "<?php echo site_url() ?>Production/Jobcard/genertatecode",
            data: {icompanyid: icompanyid}
        }).done(function (msg) {
            var main = jQuery.parseJSON(msg);
            for (var i = 0; i < main.length; i++) {
                $('#txt_olddocid').val(main[i].Current_no);
            }
        });
    }

    function docidupdate() {
        var icompanyid = $('#hdn_icompid').val();
        var oldno = $('#txt_olddocid').val();
        var newno = $('#txt_newdocid').val();
        $.blockUI({css: {
                border: 'none',
                padding: '15px',
                backgroundColor: '#000',
                '-webkit-border-radius': '10px',
                '-moz-border-radius': '10px',
                opacity: .5,
                color: '#fff'
            }});
        $.ajax({
            type: "POST",
            url: "<?php echo site_url() ?>Production/Jobcard/genertatecodeupdate",
            data: {oldno: oldno, newno: newno, icompanyid: icompanyid}
        }).done();
        $('#myModaldocid').modal('hide');
        // $('#').hide();
    }
    function validation1() {
        var btn_save = $('#btn_print').val();


        $('#btn_saveval').val(btn_save);
        $('#btn_print').prop('disabled', true);

    }

    function onchangeotp(){
        var flag = $("#hdn_flag").val();
        if (flag == 0) {
            $("#hdn_flag").val(1);

        }
    }

        $(document).ready(function () {
            $("#txt_docid,#txt_docdate,#txt_printqty,#txt_upsvalmain,#txt_fqty,#txt_fgstock,#txt_shortqtyreason,#txt_jreamrks,#txt_woreamrks,#txt_stmreamrks,#drp_repeatjob,\n\
                #drp_oldnew,#txt_wsagreamrksper,#txt_wassheet,#btn_cal").on('change', function () {
            $('#hdn_flag').val(1);
            });
            $("#btn_cal").on('click', function () {
            $('#hdn_flag').val(1);
            });
        });

        function beforesubmit_check() {


            var txt_docid = $("#txt_docid").val();
            var rtn = 1;
            
            $.ajax({
                url: '<?php echo site_url(); ?>Production/Jobcard/otpdata',
                type: "POST",
                async: false,
                // dataType: "JSON",
                data: {txt_docid: txt_docid},
                beforeSend: function () {
                    $.blockUI();
                },
                complete: function () {
                    $.unblockUI();
                },
                success: function (data) {
                    console.log(data);
                    var master = jQuery.parseJSON(data);
                if(master[0].Issue_status != "0") {
                    rtn = 1;
                } else {
                    rtn = 0;
                }
                    
                },
                error: function () {
                    $.unblockUI();
                }
            });
            return rtn;
        }
        function otpreason(){
            var  hdn_opt_reason = $('#hdn_opt_reason').val();
             $('#hidden_opt_reason').val(hdn_opt_reason);
             $('#hdn_reason').val(hdn_opt_reason);

        }

        function Otp_subreason(){
            if (hdn_opt_reason == "") {
                alert("Please Enter Reason");
                return false;
            } 
            $('#myModal_generate_reason').modal('hide');
            var txt_docid = $('#txt_docid').val();
            var hdn_reason = $('#hdn_reason').val();
            var agree=confirm("Do you want to Generate OTP");
                if (agree == false) {
                    return false;
                }else{
                    var otp = Math.floor((Math.random() * 10000) + 1);
                    $('#hdn_otp').val(otp);
                    $('#hidden_opt').val(otp);
                    $.ajax({
                        url: '<?php echo site_url(); ?>Production/Jobcard/otpmail',
                        type: "POST",
                        async: false,
                        // dataType: "JSON",
                        data: {hdn_otp:otp,txt_docid:txt_docid,hdn_reason:hdn_reason},
                        beforeSend: function () {
                            $.blockUI();
                        },
                        complete: function () {
                            $.unblockUI();
                        },
                        success: function (data) {
                            console.log(data);
                            
                        },
                        error: function () {
                            $.unblockUI();
                        }
                    });
                    $('#myModal_generate_otp').modal('show');
                    return false;
                }
        }

        function Otp_sub(){
         var  hdn_opt = $('#hdn_otp').val();
         var  hdn_opt_vlaue = $('#hdn_opt_vlaue').val();
                 if (hdn_opt_vlaue == "") {
                    alert("Please Enter OTP");
                    return false;
                 }
                 var rtn = beforesubmit_check(); 
                 if(rtn === 1) {
                      if (hdn_opt == hdn_opt_vlaue) {
                        $('#myModal_generate_otp').modal('hide');
                        alert("OTP Matched...!");
                        validation();
                      }else{
                        alert("OTP Does Not Match...!");
                        return false;
                      }
                 }else{
                   validation();
                 }
        }

        function otp_validation() {

            var docdate = $('#txt_docdate').val();
            var closedate = $('#txt_closedate').val();
            // alert(closedate);
            if (closedate != '') {
                var arr = closedate.split('/');
                var datea = arr[0];
                var month = arr[1];
                var yr = arr[2];
                var closedateval = yr + '-' + month + '-' + datea;
                $('#txt_closedateval').val(closedateval);
            }
            var arr1 = docdate.split('/');
            var datea = arr1[0];
            var month = arr1[1];
            var yr = arr1[2];
            var docdateval = yr + '-' + month + '-' + datea;
            $('#txt_docdateval').val(docdateval);
            var Chekornot = $("#chk_hold").prop('checked') == true;
            // alert(Chekornot);
            if (Chekornot == true) {
                var holdreason = $('#txt_hreas').val();
                if (holdreason == '') {
                    alert('Hold Reason should not be blank');
                    return false;
                }
            }
            var Chekornotcanl = $("#chk_cancle").prop('checked') == true;
            if (Chekornotcanl == true) {
                var canclereason = $('#txt_canreas').val();
                if (canclereason == '') {
                    alert('Cancle Reason should not be blank');
                    return false;
                }
            }
            var chk_close = $("#chk_close").prop('checked') == true;
            if (chk_close == true) {
                var txt_closereas = $('#txt_closereas').val();
                var txt_closedate = $('#txt_closedate').val()
                if (txt_closereas == '') {
                    alert('Close Reason should not be blank');
                    return false;
                }
                if (txt_closedate == '') {
                    alert('Close Date should not be blank');
                    return false;
                }
            }

            var ptbllen = $('#machinedetail tr').length;
            for (var i = 1; i <= ptbllen; i++) {
                var timePeriod = $("input[type='text'][name='txt_mmtime[" + i + "\\]']").val();
                var timePeriod1 = $("input[type='text'][name='txt_protime[" + i + "\\]']").val();
                if (timePeriod != '' && timePeriod1 != '') {
                    var parts = timePeriod.split(/:/);
                    var timePeriodMillis = (parseInt(parts[0], 10) * 60 * 60 * 1000) +
                            (parseInt(parts[1], 10) * 60 * 1000) +
                            (parseInt(parts[2], 10) * 1000);

                    var parts1 = timePeriod1.split(/:/);
                    var timePeriodMillis1 = (parseInt(parts1[0], 10) * 60 * 60 * 1000) +
                            (parseInt(parts1[1], 10) * 60 * 1000) +
                            (parseInt(parts1[2], 10) * 1000);

                    var mmtime = (timePeriodMillis / 1000);
                    var pptime = (timePeriodMillis1 / 1000);

                    var timeh = parseInt(timePeriodMillis) + parseInt(timePeriodMillis1);
                    var sectot = (timeh / 1000);
                    var d = moment.duration(timeh);
                    var s = Math.floor(d.asHours()) + moment.utc(timeh).format(":mm:ss")
                    $("input[type='text'][name='txt_tottimeqty[" + i + "\\]']").val(s);
                    $("input[type='hidden'][name='hdn_mmtimeval[" + i + "\\]']").val(mmtime);
                    $("input[type='hidden'][name='hdn_pptimeval[" + i + "\\]']").val(pptime);
                    $("input[type='hidden'][name='hdn_tottimeval[" + i + "\\]']").val(sectot);
                } else {
                    alert('Time should not be blank');
                    return false;

                }
            }

            var tbodygeneralLength = $("#tbodygeneral tr").length;
            for (var i = 1; i <= tbodygeneralLength; i++) {
                var printqty = $("input[type='text'][name='txt_printqty[" + i + "\\]']").val();
                var fqty = $("input[type='text'][name='txt_fqty[" + i + "\\]']").val();
                // alert(fqty);
                // return false;
                if (printqty == '' || printqty == '0') {
                    alert("Job Qty (With Out Wastage) Should not null or zero");
                    return false;
                }
                if (fqty == '' || fqty == '0' || isNaN(fqty)) {
                    alert("Final Qty(With wastage) Should not null,zero and NaN");
                    return false;
                }
                // if (isNaN(fqty) == NaN) {
                //     alert("Final Qty(With wastage) Should not NaN");
                //     return false;
                // }
            }
            var txt_docdate = $('#txt_docdate').val();
            var arr1 = txt_docdate.split('/');
            var datea = arr1[0];
            var month = arr1[1];
            var yr = arr1[2];
            var txtdocdateval = yr + '-' + month + '-' + datea;

                // var txt_docid = $('#txt_docid').val();
                // var flag = $('#hdn_flag').val();
                // if (txt_docid != "") {
                //     if(flag == '1') {

                //     var rtn = beforesubmit_check();
                //         if(rtn === 1) {
                //             $('#myModal_generate_reason').modal('show');
                //                 return false;
                //         }else{
                //             validation();
                //         }
                //     }else{
                //         validation();
                //     }

                // }else{
                    validation();
                // }

            
        }

        function validation() {

            var btn_save = $('#btn_save').val();
            $('#btn_saveval').val(btn_save);
            $('#btn_save').prop('disabled', true);
            $("#myform").submit();
        }

    

    function chkclose() {
        var chk_close = $("#chk_close").prop('checked') == true;
        if (chk_close == true) {
            $("#txt_closedate").datepicker().datepicker("setDate", new Date());
        } else {
            $("#txt_closedate").val('');
        }
    }

    function DeleteRow1(lnkk) {
        var row = lnkk.parentNode.parentNode;
        var rowIndex = row.rowIndex;
        var rowno = (document.getElementById("tbl_processval").rows.length) - 1;
        if (rowno > 1) {
            var agree = confirm("Do You Really Want To Delete This Item ?");
            if (agree == false) {
                return false;
            }
            else {
                document.getElementById("tbl_processval").deleteRow(rowIndex);
                return false;
            }
        }
        else
        {
            alert("Minimum 1 Row is Required.");
            return false;
        }
    }

    function gangjobitem() {
        var icompanyid = $('#hdn_icompid').val();
        $.blockUI({css: {
                border: 'none',
                padding: '15px',
                backgroundColor: '#000',
                '-webkit-border-radius': '10px',
                '-moz-border-radius': '10px',
                opacity: .5,
                color: '#fff'
            }});
        $('#tbody_itemdetail').html('');
        $.ajax({
            type: "POST",
            url: "<?php echo site_url() ?>Production/Jobcard/gangJobitem",
            data: {icompanyid: icompanyid}
        }).done(function (msg) {
            var main = jQuery.parseJSON(msg);
            var j = 1;
            for (var i = 0; i < main.length; i++) {
                $('#tbody_itemdetail').append("<tr onclick='return gangjobdetail(" + j + ");'><td>\n\
                    <input type='hidden' name='hdn_gangitemid" + j + "' id='hdn_gangitemid" + j + "' value=" + main[i].ProductID + ">\n\
                    <input type='hidden' name='hdn_gangrecordid" + j + "' id='hdn_gangrecordid" + j + "' value=" + main[i].RecordID + "><label id='lbl_descirption" + j + "'>" + main[i].Description + "</label></td>\n\
                    <td>\n\
                    <label id='lbl_iprefix" + j + "'>" + main[i].IPrefix + "</label></td>\n\
                    <td>\n\
                    <label id='lbl_miscode" + j + "'>" + main[i].AccCode + "</label></td>\n\
                    <td>\n\
                    <label id='lbl_miscode" + j + "'>" + main[i].EstimateId + "</label></td>\n\
                    </tr>");
                j++;
            }

        });
    }

    function gangjobdetail(lnk) {
        var itemidgang = $('#hdn_gangitemid' + lnk).val();
        var hdn_gangrecordid = $('#hdn_gangrecordid' + lnk).val();
        $('#hdn_gangitemid').val(itemidgang);
        $('#hdn_gangrecidestid').val(itemidgang);
        $('#hdn_gangrecordid').val(hdn_gangrecordid);
        $('#myModalshowitemlist').modal('hide');
        // alert(itemidgang);
    }

    function Wastagesheet_blak() {
        $('#txt_wassheet').val('0');
    }

    function emailfunction() {

        var chkval = $('#chk_email').is(":checked");
        if (chkval == true) {
            $('#txtare_email').show();
        } else {
            $('#txtare_email').hide();
        }
    }
    function popupfp() {
        var value = $('#txt_jobneworold').val();
        //alert(value);
        $('#txt_jobneworold').val('New');
        bindgrid(1);
        $('#txt_jobneworold').val(value);
    }

    function showwastageinfo(lnk) {
        var itemid = $('input[type="hidden"][name="hdn_itemid[' + lnk + '\\]"]').val();

        $.blockUI({css: {
            border: 'none',
            padding: '15px',
            backgroundColor: '#000',
            '-webkit-border-radius': '10px',
            '-moz-border-radius': '10px',
            opacity: .5,
            color: '#fff'
        }});
        $("#wastageinfotbl_body").html("");
        $.ajax({
            type: "POST",
            url : "Jobcard/wastageinfo",
            data: {itemid,itemid}
        }).done(function(res) {
            var main = jQuery.parseJSON(res);

            for (var i = 0; i < main.length; i++) {
                $("#wastageinfotbl_body").append("<tr>\n\
                    <td>" + main[i].DocID + "</td>\n\
                    <td>" + main[i].DocDate + "</td>\n\
                    <td align='right'>" + main[i].WoQty + "</td>\n\
                    <td align='right'>" + main[i].JobQty + "</td>\n\
                    <td align='right'>" + main[i].Issue + "</td>\n\
                    <td>" + main[i].Kind + "</td>\n\
                    <td>" + main[i].PrintSize + "</td>\n\
                    <td align='right'>" + main[i].ExpectedWastage + "</td>\n\
                    <td align='right'>" + main[i].Wastage + "</td>\n\
                    <td align='right'>" + main[i].QtywithWastge + "</td>\n\
                    <td align='right'>" + main[i].GPN + "</td>\n\
                    <td align='right'>" + main[i].QtyDisp + "</td>\n\
                    <td align='right'>" + main[i].RemainingQty + "</td>\n\
                    <td align='right'>" + main[i].ActualWastage + "</td>\n\
                    <td align='right'>" + main[i].ActualWastagePer + "</td>\n\
                </tr>");
            };

            $("#btn_wastageinfo").click();
        });
    }
        function copyrowink() {

        var l;
        var tbl_lenght = $('#tbody_ink tr').length;

        l = tbl_lenght + 1;
        $('#tbody_ink').append("<tr>\n\
<td style='text-align: center;'><input type='text' ondblclick='return showink(" + l + ");' name='txt_inkdescri[" + l + "]' id='txt_inkdescri[" + l + "]' style='width:99%'>\n\
<input type='hidden' name='hdn_inkid[" + l + "]' id='hdn_inkid[" + l + "]' class='hdn_inkid'></td>\n\
<td><input type='text' name='txt_color[" + l + "]' id='txt_color[" + l + "]' style='width:99%'></td>\n\
<td><input type='text' name='txt_shno[" + l + "]' id='txt_shno[" + l + "]' style='width:99%'></td>\n\
<td><input type='text' name='txt_unitink[" + l + "]' id='txt_unitink[" + l + "]' style='width:99%'></td>\n\
<td><input type='text' name='txt_quality[" + l + "]' id='txt_quality[" + l + "]' style='width:99%'></td>\n\
<td><input type='text' name='txt_miscode[" + l + "]' id='txt_miscode[" + l + "]' style='width:99%'></td>\n\
<td><input type='checkbox' name='chk_front[" + l + "]' id='chk_front[" + l + "]'></td>\n\
<td><input type='checkbox' name='chk_back[" + l + "]' id='chk_back[" + l + "]'></td>\n\
</tr>");

    }


    function deleteRowink() {

        // $("#tbody_ink").find("tr:last").remove();
        var a = $("#tbody_ink tr:last").find(".hdn_inkid").val();
        // console.log(a);
        if (a == "") {
            $("#tbody_ink").find("tr:last").remove();
            // alert("Remove");
        } else {
            alertModal("Can't delete Row Ink detail data already exists.");
        }

    }
  

    function showink(lnk){
        // alert(lnk);
        var a = lnk;
        $("#tbodyinkdetail").html('');

        $.blockUI();
        $.ajax({
            type: "POST",
            url: "<?php echo site_url(); ?>Production/Jobcard/inkshowlist",
            data: {}
        }).done(function (msg) {
            // alert(msg);
            var main = jQuery.parseJSON(msg);
            var data = main;

            if (data.length > 0) {

                var x = 1;
                for (var i = 0; i < data.length; i++) {
                    $("#tbodyinkdetail").append("<tr ondblclick='return showinkdata(" + x + ","+ a +");'>\n\
                            <td><input type='hidden' id='hdn_inkitemid[" + x + "]' name='hdn_inkitemid[" + x + "]' value='" + data[i].ItemID + "'>\n\
                            <input type='hidden' id='hdn_ink_GroupID[" + x + "]' name='hdn_ink_GroupIDn[" + x + "]' value='" + data[i].GroupID + "'>\n\
                            <input type='hidden' id='hdn_ink_Description[" + x + "]' name='hdn_ink_Description[" + x + "]' value='" + data[i].Description + "'>\n\
                            <input type='hidden' id='hdn_ink_Quality[" + x + "]' name='hdn_ink_Quality[" + x + "]' value='" + data[i].Quality + "'>\n\
                            <input type='hidden' id='hdn_ink_Length[" + x + "]' name='hdn_ink_Length[" + x + "]' value='" + data[i].Length + "'>\n\
                            <input type='hidden' id='hdn_ink_Breadth[" + x + "]' name='hdn_ink_Breadth[" + x + "]' value='" + data[i].Breadth + "'>\n\
                            <input type='hidden' id='hdn_ink_AccCode[" + x + "]' name='hdn_ink_AccCode[" + x + "]' value='" + data[i].IPrefix + "'>\n\
                            <input type='hidden' id='hdn_ink_PackingUnit[" + x + "]' name='hdn_ink_PackingUnit[" + x + "]' value='" + data[i].PackingUnit + "'>\n\
                            " + data[i].Description + "</td>\n\
                    </tr>");
                    x++;
                }
            } else {
                alertModal("Data not found !");
            }

            $.unblockUI();
        });
        $("#myModalinkdetail").modal("show");
        return false;
    }
    function showinkdata(ink,a){
        var hdn_inkitemid = $("#hdn_inkitemid\\[" + ink + "\\]").val();
        var hdn_ink_GroupID = $("#hdn_ink_GroupID\\[" + ink + "\\]").val();
        var hdn_ink_Description = $("#hdn_ink_Description\\[" + ink + "\\]").val();
        var hdn_ink_Quality = $("#hdn_ink_Quality\\[" + ink + "\\]").val();
        var hdn_ink_Length = $("#hdn_ink_Length\\[" + ink + "\\]").val();
        var hdn_ink_Breadth = $("#hdn_ink_Breadth\\[" + ink + "\\]").val();
        var hdn_ink_AccCode = $("#hdn_ink_AccCode\\[" + ink + "\\]").val();
        var hdn_ink_PackingUnit = $("#hdn_ink_PackingUnit\\[" + ink + "\\]").val();

        $("#hdn_inkid\\[" + a + "\\]").val(hdn_inkitemid);
        $("#txt_inkdescri\\[" + a + "\\]").val(hdn_ink_Description);
        $("#txt_color\\[" + a + "\\]").val(hdn_ink_Length);
        $("#txt_shno\\[" + a + "\\]").val(hdn_ink_Breadth);
        $("#txt_unitink\\[" + a + "\\]").val(hdn_ink_PackingUnit);
        $("#txt_quality\\[" + a + "\\]").val(hdn_ink_Quality);
        $("#txt_miscode\\[" + a + "\\]").val(hdn_ink_AccCode);


        $("#myModalinkdetail").modal("hide");
    }

    function showlikesearch() {
        var icompany = $('#hdn_icompid').val();
        var txt_ProductName = $('#txt_ProductName').val();
        var txt_jobno = $('#txt_jobno').val();
        var txt_miscode = $('#txt_miscode').val();
        if (txt_jobno == "" && txt_miscode == "" && txt_ProductName == "") {
            alertModal("Please Enter JobNo Or MisCode Or Job Name");
            return false;
        }
        // alert();
        // table.destroy();
        $('#tbody_jobdetail').html('');
        $.blockUI();
        $.ajax({
            type: "POST",
            url: "<?php echo site_url() ?>Production/Jobcard/showwo",
            data: {txt_jobno: txt_jobno, txt_ProductName: txt_ProductName, txt_miscode: txt_miscode, icompany: icompany}
        }).done(function (msg) {
            var main = jQuery.parseJSON(msg);
            var i = 1;
            for (var j = 0; j < main.length; j++) {

                $('#tbody_jobdetail').append("<tr onclick='return setnewjob(" + i + ")'>\n\
                    <td><input type='hidden' name='hdn_clientidval" + i + "' id='hdn_clientidval" + i + "' value = '" + main[j].ClientId + "'>\n\
                        <input type='hidden' id='hdn_cpval" + i + "' value = '" + main[j].CP + "'>\n\
                    <label id='lbl_jobno" + i + "'>" + main[j].JobNo + "</label</td>\n\
                    <td><label id='lbl_woid" + i + "'>" + main[j].WOID + "</label</td>\n\
                    <td><label style='width: 500px;' id='lbl_prodctname" + i + "'>" + main[j].ProductName + "</label</td>\n\
                    <td><label id='lbl_miscode" + i + "'>" + main[j].MiSCodeNo + "</label</td>\n\
                    <td><label id='lbl_clientcode" + i + "'>" + main[j].ClientProductCodeNo + "</label</td>\n\
                    <td><label id='lbl_estimateno" + i + "'>" + main[j].EstimateNo + "</label</td>\n\
                    <td><label style='width: 125px;' id='lbl_wodate" + i + "'>" + main[j].WODate + "</label</td>\n\
                    <td><label style='width: 125px;' id='lbl_deliveryreqdate" + i + "'>" + main[j].DeliveryRequiredDate + "</label</td>\n\
                    <td><label id='lbl_artworkno" + i + "'>" + main[j].ArtWorkCode + "</label</td>\n\
                    <td><label style='width: 500px;' id='lbl_clientname" + i + "'>" + main[j].CustomerName + "</label</td>\n\
                    <td><label style='width: 500px;' id='lbl_reamrks" + i + "'>" + main[j].Remarks + "</label</td></tr>");
                i++;
            }
            
        });
    }

</script>
<?php echo form_open(base_url()."Production/Jobcard/savedata", "id='myform' class='form-horizontal'"); ?>
<div class="content-wrapper"> <!--  oncontextmenu="return false;"> -->
    <section class="content-header">
        <h1><?php echo $title; ?></h1>
        <ul class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active"><?php echo $title; ?></li>

        </ul>
        <div class="pull-right">
            <div style="display: inline-block;margin-top: -6px;">
                <label style='width: 20px; height: 20px; background-color:lightskyblue; margin: 0px 4px; margin-bottom: -6px;border: 1px solid #000;'></label>
                <label style="margin-right: 10px;margin-bottom: 3px;color:#a94442;"><span style="font-size: 26px;color: black;">&#8594;</span> Click <span style="color: black;">JobNo.</span> to Populate Data</label>
                <label style='width: 20px; height: 20px; background-color:lightskyblue; margin: 0px 4px; margin-bottom: -6px;border: 1px solid #000;'></label>
                <label style="margin-right: 10px;margin-bottom: 3px;color:#a94442;"><span style="font-size: 26px;color: black;">&#8594;</span> Click <span style="color: black;">WoNo.</span> to Make Gang Job</label>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="box box-primary">
            <div class="box-body" style="padding: 5px;">
                <div style="width: 100%;">
                    <!-- <?php //echo form_open('Production/Jobcard/savedata'); ?> -->
                    
                    <?php
                    if (isset($data)) {
                        $icompanyid = $Icompanyid;
                        $uid = $Uid;
                    }
                    ?>

                    <div>

                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#home" style="font-size: 12px;" onclick="return show();">Record Details</a></li>
                            <li><a data-toggle="tab" href="#menu1" style="font-size: 12px;" onclick="return summaryshow();">Summary</a></li>
                            <li><a data-toggle="tab" href="#menu2" style="font-size: 12px;" onclick="return estimation();">Estimation Details</a></li>
                            <li style="float: right;"><a data-toggle="tab"  style="font-size: 12px;">Job Card</a></li>

                            <!-- <li style="margin-left:450px;"></li>
                            <li><input style="width:100px; height:15px; margin-top:10px; margin-left:4px;" type="text" name="txt_docid" id="txt_docid"></li>
                            <li style="margin-left:5px;"></li> -->
                            <!-- <li style=" margin-left:5px;"><input style="width:100px; height:15px; margin-top:10px" type="text" name="txt_docdate" id="txt_docdate"></li> -->

                        </ul>
                        <!-- <div> -->
                        <div style="width: 100%;">

                            <table style="margin-left:28%; height:10px;">
                                <tr>
                                    <td><label style="font-size: 10px;background-color: lightgoldenrodyellow; width:30px;">Click</label></td>
                                    <td style="padding-left:10px;">
                                        <label style="font-size: 10px;">Docket No.</label>
                                    </td>
                                    <?php
                                    if (isset($data)) {
                                        $data1 = $Neworold;
                                        $data2 = $docid;
                                        $icompanyid = $Icompanyid;
                                        $uid = $Uid;
                                        if ($data1 != 'New') {
                                            $docid = $data2;
                                            foreach ($data as $key => $value) {
                                                $Docdate = $value->Docdate;
                                            }
                                        } else {
                                            $docid = $data2;
                                            date_default_timezone_set('Asia/Calcutta');
                                            $Docdate = date('d/m/Y');
                                        }
                                    }
                                    ?>
                                    <td style="padding:10px"><input style="width:100px; height:15px; font-size:12px;" class="form-control" type="text" name="txt_docid" id="txt_docid" value=<?php echo "'" . $docid . "'"; ?> ondblclick = 'return changedocid();'>

                                        <input type="hidden" name="hdn_icompid" id="hdn_icompid" value=<?php echo $icompanyid; ?>>
                                        <input type="hidden" name="hdn_uid" id="hdn_uid" value=<?php echo $uid; ?>>
                                        <input type="hidden" name="hidden_opt" id="hidden_opt">
                                        <input type="hidden" name="hidden_opt_reason" id="hidden_opt_reason">
                                        <input type="hidden" name="hdn_flag" id="hdn_flag" value="0">

                                    </td>

                                    <td style="padding:10px">
                                        <label style="font-size: 10px;">Docket Date:</label>
                                    </td>
                                    <td style="padding:10px"><input style="width:100px; height:15px;" class="form-control"  type="text" name="txt_docdate" id="txt_docdate" value=<?php echo "'" . $Docdate . "'" ?>;></td>
                                    <?php if ($docid == '') { ?>
                                        <td style="padding:10px"><input class='btn btn-primary' type="submit" name="btn_save" id="btn_save" value="Save" onclick="return otp_validation();"></td>

                                        <!-- <td style="padding:10px"><input class='btn btn-primary'  type="button" name="btn_gangitem" id="btn_gangitem" value="Item List" data-toggle='modal' data-target='#myModalshowitemlist' onclick= 'return gangjobitem();'></td> -->

                                    <?php } else { ?>
                                        <td style="padding:10px"><input class='btn btn-primary' type="submit" name="btn_save" id="btn_save" value="Update" onclick="return otp_validation();"></td>

                                        <td style="padding:10px">
                                            <!--<input type='submit' class='button'  name='btn_print' id="btn_print" value='Print' onclick="return validation1();"> -->
                                            <a target='_blank' href="<?php echo site_url(); ?>Production/Jobcard_printout?hdn_docid=<?php echo $docid; ?>&Icompanyid=<?php echo $icompanyid; ?>" class='btn btn-primary'>Print</a>

                                        </td>
                                    <?php } ?>
                                    <td><input type="checkbox" id="chk_email" name="chk_email" style="font-size:10px;" onclick="return emailfunction();"></td>
                                    <td><label for="chk_email" style="font-size: 10px;" >Email</label></td>
                                    <td><textarea id="txtare_email" name="txtare_email" style="display:none"></textarea></td>
                                </tr>
                            </table>
                        </div>
                        <!-- </div> -->

                        <div id="home">
                            <input type="hidden" name="txt_docdateval" id="txt_docdateval">
                            <input type="hidden" name="txt_closedateval" id="txt_closedateval">
                            <input type="hidden" name="txt_totalqty" id="txt_totalqty">
                            <input type="hidden" name="hdn_noplate" id="hdn_noplate">
                            <input type="hidden" name="hdn_psheetsval" id="hdn_psheetsval">
                            <input type="hidden" name="hdn_dackeleval" id="hdn_dackeleval">
                            <input type="hidden" name="hdn_grianval" id="hdn_grianval">
                            <input type="hidden" name="hdn_timecal" id="hdn_timecal">
                            <input type="hidden" name="btn_saveval" id="btn_saveval">
                            <input type="hidden" name="jobnodelivery" id="jobnodelivery">





                            <?php // print_r($data);  ?>
                            <div id="page-wrapper">
                                <div class="tab-content">
                                    <div id="divReport">                        
                                        <div style="height:100px; overflow-x: auto;">
                                            <input type="hidden" name="hdn_rowno_mill" id="hdn_rowno_mill">
                                            <input type="hidden" name="hdn_rowmachine" id="hdn_rowmachine">
                                            <input type="hidden" name="hdn_id_var" id="hdn_id_var">
                                            <input type="hidden" name="hdn_totalareacutsheets" id="hdn_totalareacutsheets">
                                            <input type="hidden" name="hdn_bordlen" id="hdn_bordlen">
                                            <!-- $('#btn_machine').click(); -->

                                            <input hidden type="button" name="btn_machine" id="btn_machine" data-toggle='modal' data-target='#myModalMachien'>
                                            <input hidden type="button" name="btn_material1" id="btn_material1" data-toggle='modal' data-target='#myModalmaterial1'>
                                            <input hidden type="button" name="btn_material2" id="btn_material2" data-toggle='modal' data-target='#myModalmaterial2'>
                                            <input hidden type="button" name="btn_myModaljobcard" id="btn_myModaljobcard" data-toggle='modal' data-target='#myModaljobcard'>
                                            <input hidden type="button" name="btn_myModalinfo" id="btn_myModalinfo" data-toggle='modal' data-target='#myModalinfo'>

                                            <input hidden type="button" name="btn_myModalComplexity" id="btn_myModalComplexity" data-toggle='modal' data-target='#myModalComplexity'>

                                            <input hidden type="button" name="btn_processshow" id="btn_processshow" data-toggle='modal' data-target='#myModalprocess'>

                                            <input hidden type="button" name="btn_corrugation" id="btn_corrugation" data-toggle='modal' data-target='#myModalcorr'>
                                            <input hidden type="button" name="btn_docidnew" id="btn_docidnew" data-toggle='modal' data-target='#myModaldocid'>
                                            <input hidden type="button" name="btn_wastageinfo" id="btn_wastageinfo" data-toggle='modal' data-target='#myModalwastageinfo'>
                                            <!-- class="table table-striped table-bordered table-hover" -->
                                            <table class="table table-striped table-bordered table-hover" style=" margin-left:5px;  width: 100%; overflow-x: auto;overflow-y: auto;" id="example">
                                                <thead id="theadgeneral">
                                                    <tr class="trGeneral">
                                                        <th nowrap style="padding: 6px;width: 2%; height: 10px; color:black;"><center>Remove</center></th>
                                                        <th nowrap style="padding: 6px;width: 7%; height: 10px; color:black;"><center>Job No.</center></th>
                                                        <th nowrap style="padding: 6px; width: 7%; height: 10px; color:black;"><center>WONo</center></th>
                                                        <th nowrap style="padding: 6px;width: 25%; height: 10px; color:black;"><center>Job Name</center></th>
                                                        <th nowrap style="padding: 6px;width: 8%; height: 10px; color:black;"><center>Estimation No</center></th>

                                                        <th nowrap style="padding: 6px;width: 7%; height: 10px; color:black;"><center>MIS Code</center></th>

                                                        <th nowrap style="padding: 6px; width: 7%; height: 10px; color:black;  width:7%;"><center>Artwork No.</center></th>
                                                        <th nowrap style="padding: 6px;width: 8%; height: 10px; color:black;  width:7%;"><center>Client Code</center></th>
                                                        <th nowrap style="padding: 6px;width: 5%; height: 10px; color:black;"><center>Order Qty</center></th>
                                                        <th nowrap style="padding: 6px; width: 5%; height: 10px;color:black;"><center>Job Qty(With out wastage)</center></th>
                                                        <th nowrap style="padding: 6px;width: 7%; height: 10px; color:black;"><center>Po No.</center></th>
                                                        <th nowrap style="padding: 6px; height: 10px; color:black;  width:5%;"><center>Gang Job UPS</center></th>
                                                        <th nowrap style="padding: 6px; height: 10px; color:black;  width:5%;"><center>Final Qty(With wastage)</center></th>
                                                        <th nowrap style="padding: 6px; width: 150px; height: 10px; color:black;  width:7%;"><center>Client Name</center></th>

                                                        <th align="center" style="display: none">ItemID</th>
                                                        <th align="center" style="display: none">SpecID</th>
                                                </tr> 
                                                </thead>
                                                <tbody id="tbodygeneral">
                                                    <?php
                // print_r($lolwut);
                //     die();
                // $data =  $this->session->flashdata('lolwut');
                                                    if (isset($data)):
                                                        $data = $data;
                                                        $data1 = $Neworold;
                                                        $data2 = $docid;
                                                        $docnotionval = $docnotionval;

                                                        // die();
                                                        $i = 1;

                                                        // print_r($data);
                                                        //      print_r($data1);
                                                        // die();

                                                        foreach ($data as $key => $value) {
                                                            if ($data1 == 'New') {
                                                                $printqty = '';
                                                                $printqtywas = '';
                                                                $OrdQty = $value->Quantity;
                                                                $docid = $data2;
                                                                $Jobdetails = '';
                                                                $Estcomments = '';
                                                                $Hold = '';
                                                                $HoldReason = '';
                                                                $CancelJob = '';
                                                                $cancelreason = '';
                                                                $Jclose = '';
                                                                $closedate = '';
                                                                $closeResaon = '';
                                                                $docnotionval_val = $docnotionval;
                                                                $remarkswodetail = $value->Remarks;
                                                                date_default_timezone_set('Asia/Calcutta');
                                                                $ADateTime = date('d/m/Y');
                                                                $Docdate = $ADateTime;
                                                                $EstimateId = $value->EstimateId;
                                                                $wstper = $value->WastagePer;
                                                                $quotewstge = $value->WastagePerQuote;
                                                                $UpsInCutSheet = '';
                                                                $repeatnew = $value->NewJob;
                                                                $drp_shotqty = 0;
                                                                $ImportFPid = '';
                                                                $ImportRecordid = '';
                                                                $drp_noyes = '0';
                                                                $Short_Qty_Reason = '';
                                                                // if(isset($value->joblocation)){
                                                                //     $joblocation_val = $value->joblocation;
                                                                // }else{
                                                                //     $joblocation_val = '';
                                                                // }
                                                                
                                                            } else {
                                                                $docid = $data2;
                                                                $printqtywas = $value->PrintQtyAfterWastage;
                                                                $printqty = $value->JobQty;
                                                                $OrdQty = $value->OrdQty;

                                                                $Jobdetails = '"' . $value->Jobdetails . '"';
                                                                $Estcomments = '"' . $value->Estcomments . '"';
                                                                $Hold = $value->Hold;
                                                                $HoldReason = '"' . $value->HoldReason . '"';
                                                                $CancelJob = $value->CancelJob;
                                                                $cancelreason = '"' . $value->cancelreason . '"';
                                                                $Jclose = $value->Jclose;
                                                                $closedate = '"' . $value->closedate . '"';
                                                                $closeResaon = '"' . $value->closeResaon . '"';
                                                                $docnotionval_val = $value->DocNotion;
                                                                $EstimateId = $value->EstimateId;
                                                                $wstper = $value->WastagePer;
                                                                $quotewstge = $value->WastagePerQuote;
                                                                $UpsInCutSheet = $value->UpsInCutSheet;
                                                                $remarkswodetail = '';
                                                                $repeatnew = $value->NewJob;
                                                                $ImportFPid = $value->ImportFPid;
                                                                $ImportRecordid = $value->ImportRecordid;
                                                                $drp_noyes = $value->ShadeCard;
                                                                $drp_shotqty = $value->Reprint_Partial;
                                                                $Short_Qty_Reason = $value->ReasonOfShortQty;
                                                                // if(isset($value->joblocation)){
                                                                //     $joblocation_val = $value->joblocation;
                                                                // }else{
                                                                //     $joblocation_val = '';
                                                                // }
                                                                
                                                            }
                                                            // die();
                                                            // $Jobdetails = '';
                                                            // die();
                                                            ?>  
                                                        <input type='hidden' name='txt_jobneworold' id='txt_jobneworold' value='<?php echo $data1; ?>'>

                                                        <input type='hidden' name='txt_docidvaldata' id='txt_docidvaldata' value='<?php echo $docid; ?>'>

                                                        <input type="hidden" name="hdn_gangrecidestid" id="hdn_gangrecidestid" value="<?php echo $ImportRecordid; ?>">
                                                        <input type="hidden" name="hdn_gangitemid" id="hdn_gangitemid" value="<?php echo $ImportFPid; ?>">

                                                        <tr class="trGeneral"  style="background-color: white;">
                                                            <td style='font-size: 9px;'>
                                                            <a onclick='return DeleteRowmain(this);' class="btn btn-danger btn-xs" style="padding: 0px 5px;"><i class="fa fa-trash"></i></a></td>
                                                            <td onclick = "return bindgrid(<?php echo $i ?>)" style ='padding-left: 5px;  background-color: lightskyblue; cursor: pointer;'>
                                                                <input type='hidden' name='txt_uniquerjcno' id='txt_uniquerjcno' value="<?php echo $value->uniquejcno; ?>">
                                                                <input type='hidden' name='hdn_dcnotionval' id='hdn_dcnotionval' value="<?php echo $docnotionval_val; ?>">
                                                                <input type='hidden' name='hdn_itemid[<?php echo $i; ?>]' id='hdn_itemid[<?php echo $i; ?>]' value="<?php echo $value->itemid; ?>">
                                                                <input type='hidden' name='hdn_jobnno[<?php echo $i ?>]' id='hdn_jobnno[<?php echo $i ?>]' value="<?php echo $value->Jobno; ?>">
                                                                <input type='hidden' name='hdn_clientid[<?php echo $i ?>]' id='hdn_clientid[<?php echo $i ?>]' value="<?php echo $value->ClientId; ?>">
                                                                <input type='hidden' name='hdn_cp[<?php echo $i ?>]' id='hdn_cp[<?php echo $i ?>]' value="<?php echo $value->CP; ?>">

                                                                <input type="hidden" name="hdn_productName[<?php echo $i; ?>]" id="hdn_productName[<?php echo $i; ?>]" class="form-control" style="padding: 0px" value="<?php echo $value->Description; ?>">
                                                                <input type="hidden" name="hdn_productCode[<?php echo $i; ?>]" id="hdn_productCode[<?php echo $i; ?>]" class="form-control" style="padding: 0px" value="<?php echo $value->IPrefix; ?>">
                                                                <input type="hidden" name="hdn_clientName[<?php echo $i; ?>]" id="hdn_clientName[<?php echo $i; ?>]" class="form-control" style="padding: 0px" value="<?php echo $value->CompanyName; ?>">

                                                                <input type="hidden" name="hdn_poNo[<?php echo $i; ?>]" id="hdn_poNo[<?php echo $i; ?>]" class="form-control" style="padding: 0px" value="<?php echo $value->WONo; ?>">
                                                                <?php echo $value->Jobno; ?>

                                                            </td>
                                                            <td  onclick = "return showjob(<?php echo $i ?>)" style ='padding-left: 5px; background-color: lightskyblue; cursor: pointer;'><input type='hidden' name='hdn_woid[<?php echo $i; ?>]' id='hdn_woid[<?php echo $i; ?>]' value="<?php echo $value->woid ?>">
                                                                <input type='hidden' name='hdn_jobno<?php echo $i; ?>' id='hdn_jobno<?php echo $i; ?>'><?php echo $value->woid; ?></td>
                                                            <td onclick="return showwastageinfo(<?php echo $i ?>);" style='padding-left: 5px; '><input type="hidden" name="txt_[]" id="txt_[]" class="form-control" style="padding: 0px" value="<?php echo $value->Description; ?>"><?php echo $value->Description; ?></td>

                                                            <td style='padding-left: 5px; '><input type="hidden" name="txt_estidno[<?php echo $i; ?>]" id="txt_estidno[<?php echo $i; ?>]" class="form-control" style="padding: 0px" value="<?php echo $EstimateId; ?>"><?php echo $EstimateId; ?></td>

                                                            <td style='padding-left: 5px; '><input type="hidden" name="txt_[]" id="txt_[]" class="form-control" style="padding-left: 5px;" value="<?php echo $value->AccCode; ?>"><?php echo $value->AccCode; ?></td>
                                                            <td style ='padding-left: 5px; '><?php echo $value->ArtWorkNo; ?></td>
                                                            <td style='padding-left: 5px; '><input type="hidden" name="txt_[]" id="txt_[]" class="form-control" style="padding: 0px" value="<?php echo $value->IPrefix; ?>"><?php echo $value->IPrefix; ?></td>
                                                            <td style='padding-left: 5px; '><input type="hidden" name='txt_orderqty[<?php echo $i; ?>]' id='txt_orderqty[<?php echo $i; ?>]' class="form-control" style="padding: 0px" value="<?php echo $OrdQty; ?>"><?php echo $OrdQty; ?></td>
                                                            <td style='padding-left: 5px; '>
                                                                <input style='border:0px;' onchange='return onchangeotp();' type="text" name="txt_printqty[<?php echo$i; ?>]" id="txt_printqty[<?php echo$i; ?>]" value="<?php echo $printqty; ?>">
                                                            </td>
                                                            <td style='padding-left: 5px; '><input type="hidden" name="txt_[]" id="txt_[]" class="form-control" style="padding: 0px" value="<?php echo $value->WONo; ?>"><?php echo $value->WONo; ?></td>

                                                            <td style='padding-left: 5px;  width: 50px;'>
                                                                <input style='border:0px; width: 100%;' onchange='return onchangeotp();' type='text' name='txt_upsvalmain[<?php echo $i; ?>]' id='txt_upsvalmain[<?php echo $i; ?>]' value="<?php echo $UpsInCutSheet; ?>">
                                                            </td>

                                                            <td style='padding-left: 5px;  width: 50px;'>
                                                                <input style='border:0px;' onchange='return onchangeotp();' type='text' name='txt_fqty[<?php echo $i; ?>]' id='txt_fqty[<?php echo $i; ?>]' value=<?php echo $printqtywas; ?>>
                                                            </td>
                                                            <td style='padding-left: 5px;  width: 150px;'>
                                                                <input type="hidden" name="txt_TotQtyDispatched[<?php echo $i; ?>]" id="txt_TotQtyDispatched[<?php echo $i; ?>]" class="form-control" style="padding: 0px">
                                                                <input type="hidden" name="txt_TotQtyProduced[<?php echo $i; ?>]" id="txt_TotQtyProduced[<?php echo $i; ?>]" class="form-control" style="padding: 0px">
                                                                <?php echo $value->CompanyName ?></td>
                                                            <td style="display: none">
                                                                <input type="hidden" name="txt_[]" id="txt_[]" class="form-control" style="padding: 0px" value="<?php echo $value->itemid; ?>"></td>
                                                            <td style="display: none">
                                                                <input type="hidden" name="txt_JCItemID[<?php echo $i; ?>]" id="txt_JCItemID[<?php echo $i; ?>]" class="form-control" style="padding: 0px" value="<?php echo $value->itemid; ?>"></td>
                                                            <td style="display: none">
                                                                <input type="hidden" name="txt_specification[<?php echo $i; ?>]" id="txt_specification[<?php echo $i; ?>]" class="form-control" style="padding: 0px" value="<?php echo $value->Specification; ?>"></td>
                                                        </tr>
                                                        <?php
                                                        $i++;
                                                    }
                                                endif;
                                                ?>

                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- Remarks -->
                                        <div>
                                            <table class="paperclass">
                                                <thead>
                                                    <tr>
                                                        <th style="white-space: nowrap;"><center>FG Stock</center></th>
                                                        <th style="white-space: nowrap;"><center>Short Qty Reason</center></th>
                                                        <th style="white-space: nowrap;"><center>Jobcard Remarks</center></th>
                                                        <th style="white-space: nowrap;"><center>Work order remarks</center></th>
                                                        <th style="white-space: nowrap;"><center>Estimation remarks</center></th>
                                                        <th style="white-space: nowrap;"><center>Jobkind</center></th>
                                                        <th style="white-space: nowrap;"><center>Partial/Reprint</center></th>
                                                        <th style="white-space: nowrap;"><center>Processing</center></th>
                                                        <th style="white-space: nowrap;"><center>Make shadecard</center></th>
                                                        <!-- <th style="white-space: nowrap;"><center>Job Location</center></th> -->
                                                        <th style="white-space: nowrap;"><center>Job Area</center></th>
                                                        <th style="white-space: nowrap;"><center>QuoteWstge</center></th>
                                                        <th style="white-space: nowrap;"><center>Wastage %</center></th>
                                                        <th style="white-space: nowrap;"><center>Wastage sheets</center></th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <tr>
                                                        <td>
                                                            <input type='text' name='txt_fgstock' id='txt_fgstock'>
                                                        </td>
                                                        <td>
                                                            <input type='text' name='txt_shortqtyreason' id='txt_shortqtyreason' value=<?php echo '"' . $Short_Qty_Reason . '"' ?>>
                                                        </td>
                                                        <td>

                                                            <input type="text" name="txt_jreamrks" id="txt_jreamrks" value=<?php echo $Jobdetails ?>>
                                                        </td>
                                                        <td>
                                                            <textarea rows="4" cols="37" style="width:100%; height:20px;" name="txt_woreamrks" id="txt_woreamrks"><?php echo $remarkswodetail; ?></textarea>

                                                            <!-- <input hidden type="text" name="txt_woreamrks" id="txt_woreamrks" value=<?php // echo "'". $remarkswodetail ."'"       ?> style='multiline:true'> -->
                                                        </td>
                                                        <td>
                                                            <input type="text" name="txt_stmreamrks" id="txt_stmreamrks" value=<?php echo $Estcomments; ?>>
                                                        </td>
                                                        <td>
                                                            <select id="drp_repeatjob" name="drp_repeatjob">
                                                                <option value="Repeat Job" <?php if ($repeatnew == "Repeat Job") echo "selected"; ?>>Repeat Job</option>
                                                                <option value="New Job" <?php if ($repeatnew == "New Job") echo "selected"; ?>>New Job</option>
                                                                <!-- <option value="Repeat Job" <?php //if (strtoupper($repeatnew) == "Repeat Job" || strtoupper($repeatnew) == "Repeat Job") echo "selected"; ?>>Repeat Job</option>
                                                                <option value="New Job" <?php //if (strtoupper($repeatnew) == "New Job" || strtoupper($repeatnew) == "New Job") echo "selected"; ?>>New Job</option> -->
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select id="drp_shotqty" name="drp_shotqty">
                                                                <option value="0" <?php if ($drp_shotqty == 0) echo "selected"; ?>></option>
                                                                <option value="1" <?php if ($drp_shotqty == 1) echo "selected"; ?>>Re-Print</option>
                                                                <option value="2" <?php if ($drp_shotqty == 2) echo "selected"; ?>>Partial</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select id="drp_oldnew" name="drp_oldnew">
                                                                <option value="Old">Old</option>
                                                                <option value="New">New</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select id="drp_noyes" name="drp_noyes">
                                                                <option value="0" <?php if ($drp_noyes == "0") echo "selected"; ?>>No</option>
                                                                <option value="1" <?php if ($drp_noyes == "1") echo "selected"; ?>>Yes</option>
                                                            </select>
                                                        </td>
                                                        <!-- <td>
                                                            <Select type="text" name="drp_location" id="drp_location">
                                                                <option value="K" <?php if ($joblocation_val == "K") echo "selected"; ?>>Kolkata</option>
                                                                <option value="S" <?php if ($joblocation_val == "S") echo "selected"; ?>>Sikkim</option>
                                                            </Select>
                                                        </td> -->
                                                        <td><input type="text" name="txt_jobarea" id="txt_jobarea"></td>
                                                        <td>
                                                            <input type="text" name="txt_quotewstge" id="txt_quotewstge" readonly value=<?php echo $quotewstge; ?>>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="txt_wsagreamrksper" id="txt_wsagreamrksper" class="numbersOnly" value="<?php echo $wstper; ?>" style="width: 80%;" autocomplete="off">
                                                            <input type="radio" name="chkrd_wastage" id="chkrd_wastageper" value="WastagePer" checked style="width: 15%;">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="txt_wassheet" id="txt_wassheet" style="width: 80%;" autocomplete="off">
                                                            <input type="radio" name="chkrd_wastage" id="chkrd_wastagesheet" value="WastageSheets" style="width: 15%;">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div  style="height:100px; overflow-x: auto;">
                                            <div style="margin-left:1%; font-size:12px;font-style: italic;font-weight: bold;">
                                                <label style="margin-left:1%; font-size:12px;font-style: italic;font-weight: bold;">Board Detail</label>
                                                <input style="margin-left:2%;" type="button" name="btn_cal" id="btn_cal" class='btn btn-info btn-xs' value="Calculate" onclick="return calulateWstge(0);">
                                                <label style="margin-left:1%; font-size:12px;font-style: italic;font-weight: bold;"><i style="color: red;">Board Change Remarks:</i><input type="text" id="span_board" name="span_board" readonly></label>
                                            </div>
                                            <div hidden>
                                                <input type="button" name="btn_add" id="btn_add" value="Plus" class='btn btn-default' data-toggle='modal' data-target='#myModal'>
                                            </div>    
                                            <div style="float: left; width: 59%;">
                                                <table class="paperclass"  id="tbl_detail">
                                                    <thead>
                                                        <tr style="font-size:11px">
                                                            <th style="width:10%;"><center>Mill</center></th>
                                                            <th style="width:10%;"><center>Kind</center></th>
                                                            <th style="width:5%;"><center>Gsm</center></th>
                                                            <th><center>Dackle</center></th>  <!-- Length -->
                                                            <th style="width:6%;"><center>Grain</center></th>  <!-- Width -->
                                                            <th style="width:5%;"><center>Ups</center></th>
                                                            <th style="width:9%;"><center>SH req</center></th>
                                                            <th style="width: 9%;"><center>Total sH.</center></th>
                                                            <th style="width: 7%;"><center>Kg. Qty</center></th>
                                                            <th style="width:5%;"><center>Packets</center></th>
                                                            <th><center>Curr Sk</center></th>
                                                            <th><center>Allo Sk</center></th>
                                                            <th><center>Avai Sk</center></th>
                                                            <th style="width: 9%;"><center>Ad/Del</center></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id='padperdetail'>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td style='font-size: 9px;'><a onclick='return DeleteRow(this);' class="btn btn-danger btn-xs" style="padding: 0px 5px;"><i class="fa fa-trash"></i></a><a onclick='return addrow(this);'class="btn btn-success btn-xs" style="padding: 0px 5px;"><i class="fa fa-plus"></i></a>
                                                                <a onclick='return changeboard(1);' style='font-size: 10px;'>Change Board</a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div style="float: right; width: 41%;">
                                                <table class="paperclass"  id="tbl_opti">
                                                    <thead>
                                                        <tr style="font-size:11px">
                                                            <th hidden><center>Optimizer</center></th>
                                                            <th nowrap><center>Breadth</center></th>
                                                            <th nowrap><center>Length</center></th>
                                                            <th nowrap><center>Cuts</center></th>  <!-- Length -->
                                                            <th nowrap><center>Ups</center></th>  <!-- Width -->
                                                            <th hidden><center>Cut Sheets</center></th>
                                                            <th nowrap><center>Before Wastage</center></th>
                                                            <th nowrap><center>After Wastage</center></th>
                                                            <th nowrap><center>Grain Direction</center></th>
                                                            <th hidden><center>Wastage Per</center></th>
                                                            <th hidden><center>Wastage SH</center></th>
                                                            <th nowrap><center>Add</center></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody id='detailoptimize'>
                                                        <tr>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                            <td></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="margin-left:1%; font-size:12px;font-style: italic;font-weight: bold;"><label style="margin-left:1%; font-size:12px;font-style: italic;font-weight: bold;">Process Detail</label>
                                    <!-- <label style="margin-left:3%">
                                        <a onclick='return showprocess();'><img src='<?php //echo base_url() ?>assets/bh_assets/img/plus.png' style='height: 15px; width: 15px;'></a></label> -->
                                        <label style="margin-left:3%">
                                        <a onclick='return showprocess();' class="btn btn-success btn-xs" style="padding: 0px 5px;"><i class="fa fa-plus"></i></a></label>

                                    <input type="button" name='btn_repoppu' id='btn_repoppu' value="Repopulate FP" class='btn btn-info btn-xs'onclick = 'return popupfp()'>
                                </div>
                                <div style="width:100%; height:250px; width: 100%;overflow-x: auto;overflow-y: auto;">
                                    <table id="tbl_processval" style="width:150%;" class="paperclass">
                                        <thead>
                                            <tr style="font-size:11px">
                                                <th nowrap style='width: 2%'><center>IsActive</center></th>
                                                <th nowrap style='width: 4%'><center>Process Name</center></th>
                                                <th nowrap style='width: 5%'><center>F/B</center></th>
                                                <th nowrap style='width: 5%'><center>Information1</center></th>
                                                <th nowrap style='width: 5%'><center>Information2</center></th>
                                                <th nowrap style='width: 5.5%'><center>Information3</center></th>
                                                <th nowrap style='width: 5%'><center>Execution</center></th>  
                                                <th nowrap style='width: 5%'><center>No of Pass</center></th>  <!-- Length -->
                                                <th nowrap style='width: 5%'><center>Complexity</center></th>
                                                <th nowrap style='width: 5%'><center>Make ready time</center></th>
                                                <th nowrap style='width: 5%'><center>Process Time</center></th>
                                                <th nowrap style='width: 5%'><center>Total time</center></th>
                                                <th nowrap style='width: 12%'><center>Machine Name</center></th>
                                                <th nowrap style='width: 13%'><center>Remarks</center></th>  <!-- Width -->
                                                <th nowrap style='width: 20%'><center>Material1</center></th>
                                                <th nowrap style='width: 30%'><center>Material2</center></th>
                                                <th nowrap style='width: 20%'><center>Material3</center></th>
                                                <th nowrap style='width: 30%'><center>Material4</center></th>
                                        </tr>
                                        </thead>
                                        <tbody id='machinedetail'>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div>
                                    <div style="border: 0px solid; height:50px; margin-left:2px; width:55%; float:left;">
                                        <div style="width:100%;">
                                            <table style="width:100%;" class="paperclass">
                                                <thead>
                                                    <tr style="font-size:11px">
                                                        <th nowrap><center>Hold</center></th>
                                                        <th nowrap><center>Hold Reason</center></th>
                                                        <th nowrap><center>Cancel</center></th>
                                                        <th nowrap><center>Cancel Reason</center></th>
                                                        <th nowrap><center>Close</center></th>
                                                        <th nowrap><center>Close Reason</center></th>
                                                        <th nowrap><center>Close Date</center></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <?php
                                                        //$Hold = 0;
                                                        //$HoldReason = '';
                                                        if ($Hold == '0' || $Hold == '') {
                                                            $chkhold = '';
                                                        } else {
                                                            $chkhold = 'checked';
                                                        }
                                                        //$CancelJob = 0;
                                                        if ($CancelJob == '0' || $CancelJob == '') {
                                                            $chkcancel = '';
                                                        } else {
                                                            $chkcancel = 'checked';
                                                        }
                                                        //$Jclose = 0;
                                                        if ($Jclose == '0' || $Jclose == '') {
                                                            $chkclose = '';
                                                        } else {
                                                            $chkclose = 'checked';
                                                        }
                                                        ?>
                                                        <td>
                                                            <input type="checkbox" name="chk_hold" id="chk_hold" style="width:25px;" <?php echo $chkhold ?>>
                                                        </td>
                                                        <td style="width:150px;">
                                                            <input type="text" name="txt_hreas" id="txt_hreas" style="border: 0px;" value=<?php echo $HoldReason; ?>>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" name="chk_cancle" id="chk_cancle" style="width:25px;" <?php echo $chkcancel; ?>>
                                                        </td>
                                                        <td style="width:150px;">
                                                            <input type="text" name="txt_canreas" id="txt_canreas" style="border: 0px;" value=<?php echo $cancelreason; ?>>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" name="chk_close" id="chk_close" style="width:25px;" onclick="return chkclose();" <?php echo $chkclose; ?>>
                                                        </td>
                                                        <td style="width:150px;">
                                                            <input type="text" name="txt_closereas" id="txt_closereas" style="border: 0px; width:100%;" value=<?php echo $closeResaon; ?>>
                                                        </td>
                                                        <td style="width:50px;">
                                                            <input type="text" name="txt_closedate" id="txt_closedate" style="border: 0px;" value=<?php echo $closedate; ?>>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    <div style="float:right; width: 44%;">
                                        <div style="width:100%">
                                            <table style="width:100%" class="paperclass">
                                                <thead>
                                                <th style="width:13%">Fluete Desc</th>
                                                <th>Kraft Desc</th>
                                                <th hidden>Decline Fact</th>
                                                <th hidden>Extra Consump</th>
                                                <th style="width:10%">Kg. Req</th>
                                                <th style="width:10%">GSM</th>
                                                <th style="width:10%">Fact</th>
                                                </thead>
                                                <tbody id="palydetail">
                                                    <tr hidden>
                                                        <td><input type="text" name="txt_pflutedesc[1]" id="txt_pflutedesc[1]"></td>
                                                        <td>
                                                            <input type="text" name="txt_pkraftdesc[1]" id="txt_pkraftdesc[1]">
                                                        </td>
                                                        <td hidden>
                                                            <input type="text" name="txt_pdeclinefact[1]" id="txt_pdeclinefact[1]">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="txt_pextracons[1]" id="txt_pextracons[1]">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="txt_pkgreq[1]" id="txt_pkgreq[1]">
                                                        </td>
                                                        <td>
                                                            <input type='text' name='txt_ppgsm[1]' id='txt_ppgsm[1]'>
                                                        </td>
                                                        <td>
                                                            <input type='text' name='txt_ppfact[1]' id='txt_ppfact[1]'>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div style="height:1px;">

                                </div>
                            </div>
                        </div>



                        <div id="menu1" class="tab-pane fade">
                            <div>
                                <br>
                                <div style="height:200px; overflow-x: auto;">
                                    <!-- div for ink -->
                                    <div style="float: left; width:49%;height: 200px; overflow-x: auto;">
                                        <a onclick='return copyrowink();' class="btn btn-success btn-xs" style="padding: 0px 5px;"><i class="fa fa-plus"></i></a>
                                        <a onclick='return deleteRowink();' class="btn btn-danger btn-xs" style="padding: 0px 5px;"><i class="fa fa-minus"></i></a>
                                        <label style="margin-left:1%; font-size:12px;font-style: italic;font-weight: bold;">Ink Detail</label>
                                        <table class="tbl_ink" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th style="width:30%"><center>Description</center></th>
                                                    <th style="width:10%"><center>Color</center></th>
                                                    <th style="width:15%"><center>Shade no</center></th>
                                                    <th style="width:15%"><center>Unit</center></th>
                                                    <th style="width:15%"><center>Quality</center></th>
                                                    <th style="width:15%"><center>Miscode</center></th>
                                                    <th style="width:1%"><center>Front</center></th>
                                                    <th style="width:1%"><center>Back</center></th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody_ink">
                                                <tr>
                                                    <td>
                                                        <input type="hidden" name="hdn_inkid[1]" id="hdn_inkid[1]">
                                                        <input type="text" name="txt_inkdescri[1]" id="hdn_inkdescri[1]">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="txt_color[1]" id="txt_color[1]">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="txt_shno[1]" id="txt_shno[1]">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="txt_unitink[1]" id="txt_unitink[1]">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="txt_quality[1]" id="txt_quality[1]">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="txt_miscode[1]" id="txt_miscode[1]">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="chk_front[1]" id="chk_front[1]">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="chk_back[1]" id="chk_back[1]">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- div for Lot -->
                                    <div style="float: right; width:49%; overflow-x: auto;">
                                        <label style="margin-left:1%; font-size:12px;font-style: italic;font-weight: bold;">Lot Detail</label>
                                        <table class="tbl_ink" style="width: 96%">
                                            <thead>
                                                <tr>
                                                    <th><center>Product Name</center></th>
                                            <th><center>LotNo</center></th>
                                            <th><center>Cut sheets</center></th>
                                            <th><center>Ups</center></th>
                                            <th><center>MFG Date</center></th>
                                            <th><center>Mrp</center></th>
                                            <th><center>Quantity</center></th>
                                            </tr>
                                            </thead>
                                            <tbody id="tbody_lot">
                                                <tr>
                                                    <td>
                                                        <input type='hidden' name='hdn_srno[1]' id='hdn_srno[1]'>
                                                        <input type="hidden" name="hdn_lotid[1]" id="hdn_lotid[1]">
                                                        <input type="text" name="hdn_lotdescri[1]" id="hdn_lotdescri[1]">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="txt_lotno[1]" id="txt_lotno[1]">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="txt_cutsheetlot[1]" id="txt_cutsheetlot[1]">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="txt_upslot[1]" id="txt_upslot[1]">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="txt_mfgdate[1]" id="txt_mfgdate[1]">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="txt_expdate[1]" id="txt_expdate[1]">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="txt_qtylot[1]" id="txt_qtylot[1]">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- Div raw material requirements start -->
                                <div>
                                    <input type="button" name="btn_rawcalculate" id="btn_rawcalculate" class='btn btn-info btn-xs' value="Rawmaterial" onclick="return Rmcalculate();">
                                    <label style="margin-left:1%; font-size:12px;font-style: italic;font-weight: bold;">Raw material Detail</label>
                                </div>
                                <div style="height:300px; width: 100%;overflow-x: auto;overflow-y: auto;height: 250px">

                                    <table class="tab_rawmaterial" style="width:100%">

                                        <thead>
                                            <tr>
                                                <th nowrap style="width:40%;"><center>Raw Material Name</center></th>
                                                <th hidden><center>Details</center></th>
                                                <th><center>Approx. qty req</center></th>
                                                <th><center>Other Detail</center></th>
                                                <th><center>Unit</center></th>
                                                <th hidden><center>Itemid</center></th>
                                                <th hidden><center>Issuable stock</center></th>
                                                <th hidden><center>Freezed stock</center></th>
                                                <th hidden><center>Freezed for item</center></th>
                                                <th hidden><center>Process r</center></th>
                                                <th hidden><center>Qty to be order</center></th>
                                                <th hidden><center>Select</center></th>
                                                <th hidden><center>Qty order</center></th>
                                                <th><center>Reserve</center></th>
                                                <th><center>Material status</center></th>
                                                <th><center>Qty allocated</center></th>
                                                <th hidden><center>M status value</center></th>
                                                <th hidden><center>Select for IMR</center></th>
                                                <th hidden><center>Old Itmeid</center></th>
                                                <th hidden><center>Old Matieral</center></th>
                                                <th hidden><center>Record Id</center></th>
                                                <th hidden><center>Allocated ID</center></th>
                                                <th nowrap><center>Allocated Raw Material</center></th>
                                                <th hidden><center>Prid</center></th>
                                                <th hidden><center>Process Status</center></th>
                                                <th hidden><center>jobno</center></th>
                                                <th hidden><center>Code No</center></th>
                                                <th hidden><center>Group Name</center></th>
                                        </tr>
                                        </thead>
                                        <tbody id="tbl_rawmaterial">
                                            <tr>
                                                <td class='rawdetailstyle' style="background-color: #ffdead"><input type='text' name='txt_rawmaterial[1]' id='txt_rawmaterial[1]'></td>
                                                <td hidden><input type='text' name='txt_Details[1]' id='txt_Details[1]'></td>
                                                <td><input type='text' name='txt_apprx[1]' id='txt_apprx[1]'></td>
                                                <td><input type='text' name='txt_otherdetail[1]' id='txt_otherdetail[1]'></td>
                                                <td><input type='text' name='txt_unit[1]' id='txt_unit[1]'></td>
                                                <td><input type='checkbox' name='txt_requestocc[1]' id='txt_requestocc[1]'></td>
                                                <td><input type='hidden' name='txt_materialsta[1]' id='txt_materialsta[1]'>
                                                    <input type='text' name='txt_materialsta_desc' id='txt_materialsta_desc'></td>
                                                <td><input type='text' name='txt_qtyall[1]' id='txt_qtyall[1]'></td>
                                                <td hidden><input type='text' name='txt_imr[1]' id='txt_imr[1]'></td>
                                                <td hidden><input type='text' name='txt_olditemid[1]' id='txt_olditemid[1]'></td>
                                                <td hidden><input type='text' name='txt_oldmatrial[1]' id='txt_oldmatrial[1]'></td>
                                                <td hidden><input type='text' name='txt_recordid[1]' id='txt_recordid[1]'></td>
                                                <td hidden><input type='text' name='txt_allcatidid[1]' id='txt_allcatidid[1]'></td>
                                                <td><input type='text' name='txt_allocatmater[1]' id='txt_allocatmater[1]'></td>
                                                <td hidden><input type='text' name='txt_Prid[1]' id='txt_Prid[1]'></td>
                                                <td hidden><input type='text' name='txt_processta[1]' id='txt_processta[1]'></td>
                                                <td hidden><input type='text' name='txt_Jobno[1]' id='txt_Jobno[1]'></td>
                                                <td hidden><input type='text' name='txt_codeno[1]' id='txt_codeno[1]'></td>
                                                <td hidden><input type='text' name='txt_gname[1]' id='txt_gname[1]'></td>
                                                <td hidden><input type='text' name='txt_' id='txt_'></td>
                                                <td hidden><input type='text' name='txt_' id='txt_'></td>
                                                <td hidden><input type='text' name='txt_' id='txt_'></td>
                                                <td hidden><input type='text' name='txt_' id='txt_'></td>
                                                <td hidden><input type='text' name='txt_' id='txt_'></td>
                                                <td hidden><input type='text' name='txt_' id='txt_'></td>
                                                <td hidden><input type='text' name='txt_' id='txt_'></td>
                                                <td hidden><input type='text' name='txt_' id='txt_'></td>

                                            </tr>
                                        </tbody>
                                    </table>    
                                </div> 
                                <!-- Div raw material requirements End -->
                                <!-- Div Other Into Start -->
                                <div>
                                    <div style="margin-left:1%; font-size:12px;font-style: italic;font-weight: bold;">
                                        <label style="margin-left:1%; font-size:12px;font-style: italic;font-weight: bold;">Other Detail</label>
                                    </div>
                                    <table class="tbl_otherinfo" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th><center>Job Open size</center></th>
                                        <th><center>Desinging & A/W</center></th>
                                        <th><center>Margins</center></th>
                                        <th><center>Pasting Gutters</center></th>
                                        <th><center>Machine Grippers</center></th>
                                        <th><center>Print Line(Gang)</center></th>
                                        <th><center>Past Problems</center></th>
                                        <th><center>Job Area</center></th>
                                        <th><center>BF/BS Desc</center></th>
                                        <th><center>Plain corru.</center></th>
                                        <th><center>Check List No</center></th>
                                        <th><center>Delivery Remarks</center></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="text" name="txt_jobopen" id='txt_jobopen' style="width:99%"></td>
                                                <td><input type="text" name="txt_desinging" id="txt_desinging" style="width:99%"></td>
                                                <td><input type="text" name="txt_margins" id="txt_margins" style="width:99%"></td>
                                                <td><input type="text" name="txt_pasting" id="txt_pasting" style="width:99%"></td>
                                                <td><input type="text" name="txt_macinegr" id="txt_macinegr" style="width:99%"></td>
                                                <td><input type="text" name="txt_printline" id="txt_printline" style="width:99%"></td>
                                                <td><input type="text" name="txt_pastprob" id="txt_pastprob" style="width:99%"></td>
                                                <td><input type="text" name="txt_reel" id="txt_reel" style="width:99%"></td>
                                                <td><input type="text" name="txt_bfbs" id="txt_bfbs" style="width:99%"></td>
                                                <td><input type="checkbox" name="txt_plaincor" id="txt_plaincor" style="width:99%"></td>
                                                <td><input type="text" name="txt_checklist" id="txt_checklist" style="width:99%"></td>
                                                <td><input type="text" name="txt_delivery" id="txt_delivery" style="width:99%"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Div Other Detail End -->

                            </div>
                        </div>

                        <div id="menu2" class="tab-pane fade">
                            <div>
                                <div style="margin-left:1%">
                                    <table class="menuclass2" style="width:50%; float:left;">
                                        <tr>
                                            <td style="width:25%">Estimation No</td>
                                            <td>
                                                <input type="text" name="txt_estimationmenu2" id="txt_estimationmenu2">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Date</td>
                                            <td>
                                                <input type="text" name="txt_menu2date" id="txt_menu2date">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Product Name</td>
                                            <td>
                                                <input type="text" name="txt_pnamemenu2" id="txt_pnamemenu2">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Product Qty</td>
                                            <td>
                                                <input type="text" name="txt_menu2pqty" id="txt_menu2pqty">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Board Detail</td>
                                            <td>
                                                <input type="text" name="txt_menu2bdetail" id="txt_menu2bdetail">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Created by</td>
                                            <td>
                                                <input type="text" name="txt_menu2cby" id="txt_menu2cby">
                                            </td>
                                        </tr>

                                        <tr>
                                            <td>Wastage %</td>
                                            <td>
                                                <input type="text" name="txt_menu2wastage" id="txt_menu2wastage">
                                            </td>
                                        </tr>

                                    </table>
                                </div>
                                <div>
                                    <table class="paperclass" style="float: right; width:45%; margin-right:1%">
                                        <thead>
                                            <tr>
                                                <th><center>Cut Len</center></th>
                                        <th><center>Cut Bre</center></th>
                                        <th><center>UPS</center></th>
                                        <th><center>Unit</center></th>
                                        <th><center>Cuts</center></th>
                                        </tr>
                                        </thead>
                                        <tbody id="tbodyestimation">

                                        </tbody>
                                    </table>
                                    <br>
                                    <br>
                                    <table class="paperclass" style="float: right; width:45%; margin-right:1%">
                                        <thead>
                                            <tr>
                                                <th><center>FullSH UPS</center></th>
                                        <th><center>Description</center></th>
                                        <th><center>Deckel</center></th>
                                        <th><center>Grain</center></th>
                                        <th><center>GSM</center></th>
                                        </tr>
                                        </thead>
                                        <tbody id="tbodyfullestimation">

                                        </tbody>
                                    </table>
                                </div>
                            </div> <!-- Div Menu 2-1 close -->
                            <br>
                            <br><br>
                            <br><br>
                            <div style="width:95%; margin-left:2%;">


                                <label style="font-size:10px;margin-bottom:15px;">
                                    Remarks For estimation:
                                </label><br>
                                <textarea id="txtext_remarks" name="txtext_remarks" rows="5" cols="50" style="width: 577px; height: 71px;"></textarea>
                            </div>
                        </div> <!-- Div Menu 2 close -->


                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php echo form_close(); ?>

<div id="myModalinkdetail" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width: 34%">
        <div class="modal-content" style="height: 550px;">
            <div class="modal-header" style="background: #627aac">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Ink Detail</h5>
            </div>
            <div class="modal-body form-body">
                <div class="col-sm-4 pull-right">
                    <input type='text' id='txt_search_ink' onkeypress="Searchkld(event, 'txt_search_ink', 'tbodyinkdetail');" class="form-control" placeholder="Search" value="">
                </div>
                <br>
                <div class="col-sm-12">
                    <div class="dataTable_wrapper" style="height: 400px; overflow-y: auto">
                        <table class="table table-hover tbltheadtbodycss">
                            <thead>
                                <tr style="background: #9fb7e9;">
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyinkdetail">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                    

    <div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width: 750px;">
        <div class="modal-content" style="height: 550px;">
            <div class="modal-header" style="background: #627aac">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Board Detail</h5>
            </div>
            <div class="modal-body form-body">
                <div class="col-sm-4 pull-right">
                    <input type='text' id='txt_search1' name="txt_search1" onkeypress="Searchkld(event, 'txt_search1', 'tbl_popup');" class="form-control" placeholder="Search" value="">
                </div>
                <br>
                <div class="col-sm-12">
                    <div class="dataTable_wrapper" style="height: 400px; overflow-y: auto">
                        <table class="table table-hover tbltheadtbodycss" id="tbl_popupOS">
                            <thead>
                                <tr style="background: #9fb7e9;">
                                    <th nowrap>Item Name</th>
                                    <th nowrap>Current stock</th>
                                    <th nowrap>Allocated stock</th>
                                    <th nowrap>Available stock</th>
                                </tr>
                            </thead>
                            <tbody id="tbl_popup">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="myModal_board_change" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width: 550px;">
        <div class="modal-content" style="height: 550px;">
            <div class="modal-header" style="background: #627aac">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Board Change Reason</h5>
            </div>
            <div class="modal-body form-body">
                <form method="post" action="" id="board_form">
                <div class="col-sm-12">
                    <div class="dataTable_wrapper" style="height: 400px; overflow-y: auto">
                        <input type="hidden" name="hdn_lnk" id="hdn_lnk" >
                        <table class="table table-hover tbltheadtbodycss" id="tbl_popupOS">
                            <thead>
                                <tr style="background: #9fb7e9;">
                                    <th nowrap>S.No</th>
                                    <th nowrap>Particular</th>
                                    <th nowrap>Remarks</th>
                                </tr>
                            </thead>
                            <tbody id="tbodyPopup">

                            </tbody>
                        </table>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

<div id="myModal_generate_otp" class="modal fade" role="dialog">
        <div class="modal-dialog" style="width: 500px;">
        <div class="modal-content" style="height: 220px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">OTP</h5>
            </div>
            <div class="modal-body form-body">
                <form method="post" action="" id="board_form">
                    <div class="col-sm-12">
                        <input type="hidden" name="hdn_id_lnk" id="hdn_id_lnk">
                        <input type="hidden" name="hdn_otp" id="hdn_otp">
                        <label style="color:grey;">Please check mail and Enter OTP</label><br>
                        <label>OTP</label><input type="password" name="hdn_opt_vlaue" id="hdn_opt_vlaue" placeholder="Please Enter OTP" class="form-control"><br>
                        <!-- <label>Reason</label><input type="text" name="hdn_opt_reason" id="hdn_opt_reason" onchange="otpreason();" placeholder="Please Enter Reason" class="form-control"><br> -->
                        <input value="Submit" id="Otp_submit" name="Otp_submit" class="btn btn-primary" onclick="Otp_sub();">
                    </div>
               </form>
            </div>
        </div>
    </div>
</div>

<div id="myModal_generate_reason" class="modal fade" role="dialog">
        <div class="modal-dialog" style="width: 500px;">
        <div class="modal-content" style="height: 220px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Reason</h5>
            </div>
            <div class="modal-body form-body">
                <form method="post" action="" id="board_form">
                    <div class="col-sm-12">
                        <!-- <input type="hidden" name="hdn_id_lnk" id="hdn_id_lnk">-->
                        <input type="hidden" name="hdn_reason" id="hdn_reason"> 
                        <label>Please Enter Reason</label>
                        <input type="text" name="hdn_opt_reason" id="hdn_opt_reason" onchange="otpreason();" placeholder="Please Enter Reason" class="form-control"><br>
                        <input value="Submit" id="Otp_submit" name="Otp_submit" class="btn btn-primary" onclick="Otp_subreason();">
                    </div>
               </form>
            </div>
        </div>
    </div>
</div>

    <div id="myModalwastageinfo" class="modal fade" role="dialog">
        <div class="modal-dialog" style="width: 1100px;">

            <!-- Modal content-->
            <div class="modal-content" style="overflow-y: auto; overflow-x: auto; height: 350px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h6 class="modal-title">Wastage Info</h6>
                </div>
                <div class="modal-body">

                    <table  style="font-size:12px; width:100%;" id="wastageinfotbl">
                        <thead>
                            <tr>
                                <th align="center" width="10%">Docket no</th>
                                <th align="center" width="7%">Date</th>
                                <th align="center">Order Qty</th>
                                <th align="center" width="6%">Job Qty</th>
                                <th align="center">Issued Sheets</th>
                                <th align="center" width="9%">Board Kind</th>
                                <th align="center">Print Size</th>
                                <th align="center">Wastage Considered</th>
                                <th align="center">Wastage %</th>
                                <th align="center">Qty with Wastage</th>
                                <th align="center">GPN Qty</th>
                                <th align="center">Dispatched Qty</th>
                                <th align="center">Remaining Qty</th>
                                <th align="center">Actual Wastage</th>
                                <th align="center">Actual Wastage %</th>
                            </tr>
                            <tr></tr>
                        </thead>
                        <tbody id="wastageinfotbl_body">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    <div id="myModalMachien" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width: 34%">
        <div class="modal-content" style="height: 550px;">
            <div class="modal-header" style="background: #627aac">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Select Machine</h5>
            </div>
            <div class="modal-body form-body">
                <div class="col-sm-4 pull-right">
                    <input type='text' id='txt_searchmachine' onkeypress="Searchkld(event, 'txt_searchmachine', 'tbody_machien');" class="form-control" placeholder="Search" value="">
                </div>
                <br>
                <div class="col-sm-12">
                    <div class="dataTable_wrapper" style="height: 400px; overflow-y: auto">
                        <table class="table table-hover tbltheadtbodycss">
                            <thead>
                                <tr style="background: #9fb7e9;">
                                    <th>Machine Name</th>
                                </tr>
                            </thead>
                            <tbody id="tbody_machien">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <div id="myModaldocid" class="modal fade" role="dialog">
        <div class="modal-dialog" style="width:200px;">
            <!-- Modal content-->
            <div class="modal-content" style="height: 200px; overflow-y: auto;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h6 class="modal-title">Change Docid</h6>
                </div>
                <div class="modal-body">

                    <table  style="border-collapse:collapse; width: 180px;">
                        <tr>
                            <td><label style="font-size:10px;">Old No.:</label></td>
                            <td><input style="font-size:10px;" type="text" name="txt_olddocid" id="txt_olddocid"></td>
                        </tr>
                        <tr>
                            <td><label style="font-size:10px;">Enter New No.:</label></td>
                            <td><input style="font-size:10px;" type="text" name="txt_newdocid" id="txt_newdocid"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="button" name="btn_docid" id="btn_docid" value="Save" onclick="return docidupdate();"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>

    
<div id="myModalmaterial1" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width: 34%">
        <div class="modal-content" style="height: 550px;">
            <div class="modal-header" style="background: #627aac">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Select Material1</h5>
            </div>
            <div class="modal-body form-body">
                <div class="col-sm-4 pull-right">
                    <input type='text' id='txt_searchmaterial1' onkeypress="Searchkld(event, 'txt_searchmaterial1', 'tbody_material1');" class="form-control" placeholder="Search" value="">
                </div>
                <br>
                <div class="col-sm-12">
                    <div class="dataTable_wrapper" style="height: 400px; overflow-y: auto">
                        <table class="table table-hover tbltheadtbodycss">
                            <thead>
                                <tr style="background: #9fb7e9;">
                                    <th>Item Name</th>
                                </tr>
                            </thead>
                            <tbody id="tbody_material1">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="myModalmaterial2" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width: 34%">
        <div class="modal-content" style="height: 550px;">
            <div class="modal-header" style="background: #627aac">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Select Material2</h5>
            </div>
            <div class="modal-body form-body">
                <div class="col-sm-4 pull-right">
                    <input type='text' id='txt_searchmaterial2' onkeypress="Searchkld(event, 'txt_searchmaterial2', 'tbody_material2');" class="form-control" placeholder="Search" value="">
                </div>
                <br>
                <div class="col-sm-12">
                    <div class="dataTable_wrapper" style="height: 400px; overflow-y: auto">
                        <table class="table table-hover tbltheadtbodycss">
                            <thead>
                                <tr style="background: #9fb7e9;">
                                    <th>Item Name</th>
                                </tr>
                            </thead>
                            <tbody id="tbody_material2">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



    <div id="myModaljobcard" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width: 1126px">
        <div class="modal-content" style="height: 550px;">
            <div class="modal-header" style="background: #627aac">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Select Work Order Detail</h5>
            </div>
            <div class="modal-body form-body">
                <div style="float: left;margin-right: 10%;">
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
                <div class="col-sm-4 pull-right">
                    <input type='text' id='txt_searchjobno' onkeypress="Searchkld(event, 'txt_searchjobno', 'tbody_jobdetail');" class="form-control" placeholder="Search" value="">
                </div>
                <br><br>
                <div class="col-sm-12">
                    <div class="dataTable_wrapper" style="height: 400px; overflow-y: auto">
                        <table class="table table-hover tbltheadtbodycss" id="tbl_popupOS">
                            <thead>
                                <tr style="background: #9fb7e9;">
                                    <th style='white-space:nowrap;'>Job No</th>
                                    <th style='white-space:nowrap;'>Woid</th>
                                    <th style='white-space:nowrap;'>Product Name</th>
                                    <th style='white-space:nowrap;'>MIS Code</th>
                                    <th style='white-space:nowrap;'>Client Code</th>
                                    <th style='white-space:nowrap;'>Estimate No</th>
                                    <th style='white-space:nowrap;'>Wodate</th>
                                    <th style='white-space:nowrap;'>Delivery Req. Date</th>
                                    <th style='white-space:nowrap;'>ArtWork Code</th>
                                    <th style='white-space:nowrap;'>Client Name</th>
                                    <th style='white-space:nowrap;'>Remarks</th>
                                </tr>
                            </thead>
                            <tbody id="tbody_jobdetail">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <div id="myModalinfo" class="modal fade" role="dialog">
        <div class="modal-dialog" style=" width:530px;">

            <!-- Modal content-->
            <div class="modal-content" style="height: 350px; overflow-y: auto;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h6 class="modal-title">Select Values</h6>
                </div>
                <div class="modal-body">

                    <table  style="border-collapse:collapse; width: 380px;">
                        <thead id="thead_option">
                            <tr><td>
                                    <label style='font-size:11px;'>Search</label>
                                    <input type='text' name='txt_searchmachine1' id='txt_searchmachine1' style="width: 50%; height: 15px; font-size:10px;"></td>
                            </tr>
                            <tr>
                                <th align="center" style ='font-size: 10px; border-style: solid; border-width: 1px; background-color: #627aac; color: #FFFFFF; border-color: #212121;'>
                                    Options</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_options">
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <!--        <button type="button" >Ok</button>-->
                </div>
            </div>
        </div>
    </div>


    <div id="myModalprocess" class="modal fade" role="dialog">
        <div class="modal-dialog" style="width:270px;">

            <!-- Modal content-->
            <div class="modal-content" style="height: 450px; overflow-y: auto;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h6 class="modal-title">Select Process</h6>
                </div>
                <div class="modal-body">

                    <table class="addjob"  style="border-collapse:collapse;width: 210px;">
                        <thead>

                            <tr><td>
                                    <label style='font-size:11px;'>Search</label>
                                    <input type='text' name='txt_searchmachine' id='txt_searchmachine' style="width: 80%; height: 15px; font-size:10px;"></td>
                                    <!--<td><img src="images/Search_Btn.png"></td>-->
                            </tr>

                            <tr>
                                <th align="center" style ='font-size: 10px; border-style: solid; border-width: 1px; background-color: #627aac; color: #FFFFFF; border-color: #212121;'>
                                    Process Name</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_proessdetail">
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <!--        <button type="button" >Ok</button>-->
                </div>
            </div>
        </div>
    </div>


    <!-- Pop for corrugation -->

<div id="myModalcorr" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width: 34%">
        <div class="modal-content" style="height: 550px;">
            <div class="modal-header" style="background: #627aac">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Select Material Flute</h5>
            </div>
            <div class="modal-body form-body">
                <div class="col-sm-4 pull-right">
                    <input type='text' id='txt_searchcorr' onkeypress="Searchkld(event, 'txt_searchcorr', 'tbody_corrugation');" class="form-control" placeholder="Search" value="">
                </div>
                <br>
                <div class="col-sm-12">
                    <div class="dataTable_wrapper" style="height: 400px; overflow-y: auto">
                        <table class="table table-hover tbltheadtbodycss">
                            <thead>
                                <tr style="background: #9fb7e9;">
                                    <th>Item Name</th>
                                </tr>
                            </thead>
                            <tbody id="tbody_corrugation">

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



    <!-- Pop for Complexity -->
    <div id="myModalComplexity" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="height: 350px; overflow-y: auto; width:220px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h6 class="modal-title">Select Complexity</h6>
                </div>
                <div class="modal-body">

                    <table  style="border-collapse:collapse; width: 180px;">
                        <thead>

                                   <!--  <tr><td>
                                            <label style='font-size:11px;'>Search</label>
                                        <input type='text' name='txt_searchmachine' id='txt_searchmachine' style="width: 50%; height: 15px; font-size:10px;"></td>
                                        <td><img src="images/Search_Btn.png"></td>
                                    </tr> -->

                            <tr>
                                <th align="center" style ='font-size: 10px; border-style: solid; border-width: 1px; background-color: #627aac; color: #FFFFFF; border-color: #212121;'>
                                    Complexity Name</th>
                            </tr>

                        </thead>
                        <tbody id="tbody_Complexity">
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <!--        <button type="button" >Ok</button>-->
                </div>
            </div>
        </div>
    </div>
    <!-- Pop for Complexity end -->

    <!-- Pop for Item List -->
    <div id="myModalshowitemlist" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="height: 450px; overflow-y: auto; width:850px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h6 class="modal-title">Select Item For Gang</h6>
                </div>
                <div class="modal-body">

                    <table class="addjob" style="border-collapse:collapse; width: 100%; ">
                        <thead>
                            <tr>
                                <td colspan="4">
                                    <label style='font-size:11px;'>Search</label>
                                    <!-- </td>
                                    <td colspan="4"> -->
                                    <input type='text' name='txt_searchGang' id='txt_searchGang' style="width: 80%; height: 25px; font-size:10px;">
                                </td>
                            </tr>
                            <tr>
                                <th align="center" style ='font-size: 12px; border-style: solid; border-width: 1px; background-color: #627aac; color: #FFFFFF; border-color: #212121;'>
                                    Product Name</th>
                                <th align="center" style ='font-size: 12px; border-style: solid; border-width: 1px; background-color: #627aac; color: #FFFFFF; border-color: #212121;'>
                                    Client Code</th>
                                <th align="center" style ='font-size: 12px; border-style: solid; border-width: 1px; background-color: #627aac; color: #FFFFFF; border-color: #212121;'>
                                    MisCode</th>
                                <th align="center" style ='font-size: 12px; border-style: solid; border-width: 1px; background-color: #627aac; color: #FFFFFF; border-color: #212121;'>
                                    Estimate No</th>
                            </tr>
                        </thead>
                        <tbody id="tbody_itemdetail">
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <!--        <button type="button" >Ok</button>-->
                </div>
            </div>
        </div>
    </div>
