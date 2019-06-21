<script type="text/javascript" src="<?php echo base_url(); ?>assets/bootstrap/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/bh_assets/js/jc_wastagecalculation.js?v=<?php echo date("s"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/bh_assets/js/jc_internaleuse.js?v=<?php echo date("s"); ?>"></script>

<style>

    .blockMsg{
        border: none !important;
        padding: 15px !important;
        background-color: #000 !important;
        border-radius: 10px !important;
        -webkit-border-radius: 10px !important;
        -moz-border-radius: 10px !important;
        opacity: .5 !important;
        color: #fff !important;
        z-index: 1050 !important;
    }

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


    #processdetail { list-style-type: none; margin: 0; padding: 0; width: 100%;  }
    #processdetail li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }
    #processdetail li span { position: absolute; margin-left: -1.3em; }

    .paperclass{
        width: 99%;
        margin-left: 5px;
    }
    .paperclass thead tr th{
        border: 1px solid #000;
        background-color: #627aac;
        font-size: 10px;
        color: white
    }
    .paperclass tbody tr td{
        border: 1px solid #000;
        font-size: 10px;
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
        border: 1px solid #000;
    }
    #tbodygeneral tr td label{
        font-weight: normal;
        font-size: 11px;
        font-family: arial;
        padding: 0px;
        border: 1px solid #000;

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
        font-size: 13px;
        background-color: #627aac;
        color: white;
        border: 1px solid #000;

    }
    .trGeneral tr th{
        padding: 0px;
        font-size: 13px;
        background-color: #627aac;
        border: 1px solid #000;
        color: white;
    }
    #theadgeneral tr th{
        padding: 0px;
        background-color: #627aac;
        border: 1px solid #000;
        color: white;
        font-size: 13px;
        font-weight: normal;
        text-align: center;
    }
    .trGeneral tr td{
        padding-left: 5px;
        font-size: 13px;
        background-color: #627aac;
        border: 1px solid #000;
    }

    tr.tr_shoaib td{
        padding: 0px;
    }
    td.tdshoaib{
        padding: 0px
    }
    .tbl_ink, .tbl_additionalmtrl{
        width: 100%;
    }
    .tbl_ink thead tr th,
    .tbl_additionalmtrl thead tr th{
        font-size: 10px;
        padding: 0px;
        /*font-size: 12px;*/
        background-color: #627aac;
        border: 1px solid #000;
        font-size: 10px;
        color: white;
    }
    #tbody_ink tr td input,
    #tbody_additionalmtrl tr td input{
        width: 50%;
        font-size: 10px;
        border: 0px;

    }
    #tbody_ink tr td,
    #tbody_additionalmtrl tr td{
        width: 100px;
        font-size: 10px;
        border: 1px solid #000;
        background-color: #fff;
    }

    .tab_rawmaterial{
        width: 100%;
        font-size: 10px;
        border:1px solid #000;
    }
    .tab_rawmaterial thead tr th{
        padding: 0px;
        background-color: #627aac;
        border: 1px solid #000;
        font-size: 10px;
        color: white;
    }
    .tab_rawmaterial tbody tr td input{
        width: 96%;
        font-size: 10px;
        border: 0px;
    }
    .tab_rawmaterial tbody tr td{
        width: 100px;
        font-size: 10px;
        border: 1px solid #000;
        background-color: #fff;
    }

    .tbl_otherinfo thead tr th{
        padding: 0px;
        background-color: #627aac;
        border: 1px solid #000;
        font-size: 10px;
        color: white;
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
        color: white;
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
    ul li.wocpl:after {
        content: "";
        display: block;
        margin-bottom: 2px;
        margin-top: 2px;
        height: 1px;
        background:#C7C5C4;
        font-size: 12px;
    }
    #processboardmodaltable tr,
    #processinkmodaltable tr {
        height: 35px;
    }
    #processboardmodaltable tr td label,
    #processinkmodaltable tr td label{
        font-size:12px;margin-bottom: 0px;
    }
    #processboardmodaltable tr td input,
    #processinkmodaltable tr td input{
        font-size:10px;width: 40px;
    }
    #processdetail tr td input[type=text],
    #processdetail tr td label{
        font-size: 10px;margin-left: 3px;
        border: 0px solid #000;
        width: 90%;
        padding-left: 5px;
    }
    label.custom{
        font-weight: normal;
        font-size: 12px;
    }
</style>

<script>
    $(document).ajaxComplete(function () {
        $.unblockUI();
    });
    $(function () {
        $("#processdetail").sortable();
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
                url: "<?php echo site_url() ?>Production/Jobcard_comm/estimationdetail",
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

    $(document).ready(function () {
        $('#hdn_gangitemid').val('');
        $('#hdn_gangrecidestid').val('');
        $("#home").show();
        $("#menu1").hide();
        $('#menu2').hide();
        $('#txt_docdate').datepicker({changeMonth: true, changeYear: true, dateFormat: 'dd/mm/yy'});
        // $("#txt_docdate").datepicker().datepicker("setDate", new Date());
        $('#txt_closedate').datepicker({changeMonth: true, changeYear: true, dateFormat: 'dd/mm/yy'});
        // $('#btn_rawcalculate').prop('disabled', true);
        // $('#btn_save').prop('disabled', true);
        $("#paperdescdatadiv").hide();
        $(document).keypress(function (event) {
            if (event.which == '13') {
                event.preventDefault();
                return false;
            }
        });
        $("#btn_popInkOk").click(function () {
            var j = 1;
            //  else if($(this).is(":not(:checked)")){
            $("#tbody_popink tr").each(function () {
                if (j < 6) {
                    var cjk_vale = $(this).find('.checkboxInk').is(':checked');
                    if (cjk_vale == true) {
                        var desc = $(this).find('.custom').text();
                        var itemid = $(this).find('.popinkItemID').val();
                        $("input[type='text'][name='txt_ink" + j + "[" + CURRENT_ROW_OF_INK_TOKEN + "]']").val(desc);
                        $("input[type='hidden'][name='hdn_inkItemID" + j + "[" + CURRENT_ROW_OF_INK_TOKEN + "]']").val(itemid);
                        j++;
                    }
                }
            });
            $('#myModalInk').modal('toggle');
        });
    });
    function update(lnk) {
        var rowno = $('#hdn_rowno_mill').val();
        // var prname = $("a[name='a_itemname[" + lnk + "\\]']").val();
        var vallnk = lnk;
        var prname = $('#hdn_boarddetailval' + vallnk).val();
        var itemid = $('#hdn_id' + vallnk).val();
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
        // $('#td_grain' + rowno).text(grain);
        // $("#txt_grainnn" + rowno).val(grain);
        $('#td_packets' + rowno).text(packet);
        $('#td_graindis' + rowno).text(graindir);
        $("input[type='hidden'][name='hdn_gsm[" + rowno + "\\]']").val(gsm);
        $("input[type='hidden'][name='hdn_dackle[" + rowno + "\\]']").val(deckel);
        $("input[type='hidden'][name='hdn_grain[" + rowno + "\\]']").val(grain);
        $("input[type='text'][name='txt_grainnn[" + rowno + "\\]']").val(grain);
        $("input[type='hidden'][name='hdn_mmval[" + rowno + "\\]']").val(mmval);
        $("input[type='hidden'][name='hdn_paperid[" + rowno + "\\]']").val(itemid);
        $("input[type='hidden'][name='hdn_mil[" + rowno + "\\]']").val(mid);
        $("input[type='hidden'][name='hdn_kind[" + rowno + "\\]']").val(mkind);
        $("input[type='hidden'][name='hdn_borddescrip[" + rowno + "\\]']").val(prname);
        $("input[type='hidden'][name='hdn_mmvalcut[" + rowno + "\\]']").val(mmval);
        $('#myModal').modal('hide');
    }

    function bindgrid(val) {

        $("#btn_ssprintf").prop('onclick', null).off('click');
        $("#btn_fb2platef").prop('onclick', null).off('click');
        $("#btn_fb2platef").prop('onclick', null).off('click');
        $("#btn_fb1platef").prop('onclick', null).off('click');
        $("#btn_copyrows").prop('onclick', null).off('click');
        $("#btn_removerows").prop('onclick', null).off('click');

        var gangitem = $('#hdn_gangitemid').val();
        if (gangitem == '') {
            var itemid = $("input[type='hidden'][name='hdn_itemid[" + val + "\\]']").val();
        } else {
            var itemid = gangitem;
        }
        var estimateid = $("input[type='hidden'][name='txt_estidno[1]']").val();
        var docid = $('#txt_docidvaldata').val();
        var jobneworold = $('#txt_jobneworold').val();
//             alert(jobneworold);
        var dcnotionval = $('#hdn_dcnotionval').val();
        var icompanyid = $('#hdn_icompid').val();
        var recordid = $('#hdn_recordid').val();
        var tbllen = $('#tbodygeneral tr').length;
        var jobnostr = '';
        for (var i = 1; i <= tbllen; i++) {
            var jobno = $("input[type='hidden'][name='hdn_jobnno[" + i + "]']").val();
            var jobnostr = jobnostr + "'" + jobno + "',";
            $('#jobnodelivery').val(jobnostr);
        }
        var jobnodelivery1 = $('#jobnodelivery').val();
        var jobnodelivery = jobnodelivery1.replace(/,\s*$/, "");

        var txt_fqty = $("input[type='text'][name='txt_fqty[" + val + "]']").val();
        $.blockUI();
        $.ajax({
            type: "POST",
            url: "<?php echo site_url() ?>Production/Jobcard_comm/bidngriddata",
            data: {itemid: itemid, docid: docid, jobneworold: jobneworold, dcnotionval: dcnotionval, jobnodelivery: jobnodelivery, estimateid: estimateid, icompanyid: icompanyid, recordid: recordid, txt_fqty: txt_fqty}
        }).done(function (msg) {
            // alert(msg);
            $('#tbody_ink').html('');
            $('#processdetail').html('');
            var main = jQuery.parseJSON(msg);
            // alert(main.query3);
            var obj1 = main.chdetail;
            var processobj = main.processresult;
            var objink = main.inkdetial;
            var objrawdetail = main.Rawdetail;
            var otherdetail = main.otherdetail;
            var platedetails = main.plate;
            var objadditmtrl = main.additionlmtrl;

            var plate_dropdown = '';
            for (var p = 0; p < platedetails.length; p++) {
                plate_dropdown += "<option value='" + platedetails[p].ItemID + "'>" + platedetails[p].Description + "</option>";
            }

            var k = 1;
            for (var i = 0; i < processobj.length; i++) {

                if (processobj[i].ProcessStatus == 1) {
                    var style = "background-color:#FFFF99;";
                } else if (processobj[i].ProcessStatus == 2) {
                    var style = "background-color:yellowgreen;";
                } else {
                    var style = "background-color:white;";
                }
                $('#processdetail').append("<tr>\n\
                    <td style='background-color: #00FFFF;'>\n\
                        <input type='checkbox' name='chk_delte[" + k + "]' id='chk_delte[" + k + "]' checked></td>\n\
                    <td style='background-color: #00FFFF;'>\n\
                        <input type='hidden' name='hdn_pAutoId_PK[" + k + "]' id='hdn_pAutoId_PK" + k + "' value='" + processobj[i].AutoId_PK + "'>\n\
                        <input type='hidden' name='hdn_pvendorId[" + k + "]' id='hdn_pvendorId" + k + "' value='" + processobj[i].OsVendorID + "'>\n\
                        <input type='hidden' name='hdn_pDocId[" + k + "]' id='hdn_pDocId" + k + "' value='" + processobj[i].DocId + "'>\n\
                        <input type='hidden' name='hdn_pSeqNo[" + k + "]' id='hdn_pSeqNo" + k + "' value='" + processobj[i].SeqNo + "'>\n\
                        <input type='hidden' name='hdn_pint_Info1[" + k + "]' id='hdn_pint_Info1" + k + "' value='" + processobj[i].int_Info1 + "'>\n\
                        <input type='hidden' name='hdn_pint_Info2[" + k + "]' id='hdn_pint_Info2" + k + "' value='" + processobj[i].int_Info2 + "'>\n\
                        <input type='hidden' name='hdn_pint_Info3[" + k + "]' id='hdn_pint_Info3" + k + "' value='" + processobj[i].int_Info3 + "'>\n\
                        <input type='hidden' name='hdn_pint_Info4[" + k + "]' id='hdn_pint_Info4" + k + "' value='" + processobj[i].int_Info4 + "'>\n\
                        <input type='hidden' name='hdn_pDob_Info1[" + k + "]' id='hdn_pDob_Info1" + k + "' value='" + processobj[i].Dob_Info1 + "'>\n\
                        <input type='hidden' name='hdn_pDob_Info2[" + k + "]' id='hdn_pDob_Info2" + k + "' value='" + processobj[i].Dob_Info2 + "'>\n\
                        <input type='hidden' name='hdn_pDob_Info3[" + k + "]' id='hdn_pDob_Info3" + k + "' value='" + processobj[i].Dob_Info3 + "'>\n\
                        <input type='hidden' name='hdn_pDob_Info4[" + k + "]' id='hdn_pDob_Info4" + k + "' value='" + processobj[i].Dob_Info4 + "'>\n\
                        <input type='hidden' name='hdn_pDob_Info5[" + k + "]' id='hdn_pDob_Info5" + k + "' value='" + processobj[i].Dob_Info5 + "'>\n\
                        <input type='hidden' name='hdn_pDob_Info6[" + k + "]' id='hdn_pDob_Info6" + k + "' value='" + processobj[i].Dob_Info6 + "'>\n\
                        <input type='hidden' name='hdn_pDob_Info7[" + k + "]' id='hdn_pDob_Info7" + k + "' value='" + processobj[i].Dob_Info7 + "'>\n\
                        <input type='hidden' name='hdn_pDob_Info8[" + k + "]' id='hdn_pDob_Info8" + k + "' value='" + processobj[i].Dob_Info8 + "'>\n\
                        <input type='hidden' name='hdn_pDob_Info9[" + k + "]' id='hdn_pDob_Info9" + k + "' value='" + processobj[i].Dob_Info9 + "'>\n\
                        <input type='hidden' name='hdn_pVar_Info3[" + k + "]' id='hdn_pVar_Info3" + k + "' value='" + processobj[i].Var_Info3 + "' >\n\
                        <input type='hidden' name='hdn_pVar_Info4[" + k + "]' id='hdn_pVar_Info4" + k + "' value='" + processobj[i].Var_Info4 + "' >\n\
                        <input type='hidden' name='hdn_pVar_ID_Info3[" + k + "]' id='hdn_pVar_ID_Info3" + k + "' value='" + processobj[i].Var_ID_Info3 + "' >\n\
                        <input type='hidden' name='hdn_pVar_ID_Info4[" + k + "]' id='hdn_pVar_ID_Info4" + k + "' value='" + processobj[i].Var_ID_Info4 + "' >\n\
                        <input type='hidden' name='hdn_pRawMaterial_2[" + k + "]' id='hdn_pRawMaterial_2" + k + "' value='" + processobj[i].RawMaterial_2 + "' >\n\
                        <input type='hidden' name='hdn_pRawMaterial_3[" + k + "]' id='hdn_pRawMaterial_3" + k + "' value='" + processobj[i].RawMaterial_3 + "' >\n\
                        <input type='hidden' name='hdn_pRawMaterial_4[" + k + "]' id='hdn_pRawMaterial_4" + k + "' value='" + processobj[i].RawMaterial_4 + "' >\n\
                        <input type='hidden' name='hdn_pRawMaterialID_2[" + k + "]' id='hdn_pRawMaterialID_2" + k + "' value='" + processobj[i].RawMaterialID_2 + "' >\n\
                        <input type='hidden' name='hdn_pRawMaterialID_3[" + k + "]' id='hdn_pRawMaterialID_3" + k + "' value='" + processobj[i].RawMaterialID_3 + "' >\n\
                        <input type='hidden' name='hdn_pRawMaterialID_4[" + k + "]' id='hdn_pRawMaterialID_4" + k + "' value='" + processobj[i].RawMaterialID_4 + "' >\n\
                        <input type='hidden' name='hdn_pBasePrUniqueID[" + k + "]' id='hdn_pBasePrUniqueID" + k + "' value='" + processobj[i].BasePrUniqueID + "' >\n\
                        <input type='hidden' name='hdn_pPrUniqueNo[" + k + "]' id='hdn_pPrUniqueNo" + k + "' value='" + processobj[i].PrUniqueNo + "' >\n\
                        <input type='hidden' name='hdn_pintricacy[" + k + "]' id='hdn_pintricacy" + k + "' value='1' >\n\
                        <input type='hidden' name='hdn_pInputUOM[" + k + "]' id='hdn_pInputUOM" + k + "' value='" + processobj[i].InputUOM + "' >\n\
                        <input type='hidden' name='hdn_pOutPutUOM[" + k + "]' id='hdn_pOutPutUOM" + k + "' value='" + processobj[i].OutPutUOM + "' >\n\
                        <input type='hidden' name='hdn_pFullBoardNo[" + k + "]' id='hdn_pFullBoardNo" + k + "' value='" + processobj[i].FullBoardNo + "' >\n\
                        <input type='hidden' name='hdn_pCutDimNo[" + k + "]' id='hdn_pCutDimNo" + k + "' value='" + processobj[i].CutDimNo + "' >\n\
                        <input type='hidden' name='hdn_pPrQty[" + k + "]' id='hdn_pPrQty" + k + "' value='" + processobj[i].PrQty + "' >\n\
                        <input type='hidden' name='hdn_pPlanUniqueID[" + k + "]' id='hdn_pPlanUniqueID" + k + "' value='" + processobj[i].PlanUniqueID + "' >\n\
                        <input type='hidden' name='hdn_pupsincutsh[" + k + "]' id='hdn_pupsincutsh" + k + "' value='" + processobj[i].UpsInCutSheets + "'>\n\
                        <input type='hidden' name='hdn_pcutfromfullsh[" + k + "]' id='hdn_pcutfromfullsh" + k + "' value='" + processobj[i].CutsFromFullSH + "'>\n\
                        <input type='hidden' name='hdn_pcutshwithoutwstge[" + k + "]' id='hdn_pcutshwithoutwstge" + k + "' value='" + processobj[i].CutSH_WithoutWastage + "'>\n\
                        <input type='hidden' name='hdn_pUpsInFullSheet[" + k + "]' id='hdn_pUpsInFullSheet" + k + "' value='" + processobj[i].UpsInFullSheet + "'>\n\
                        <input type='hidden' name='hdn_pImpression_WithoutWastage[" + k + "]' id='hdn_pImpression_WithoutWastage" + k + "' value='" + processobj[i].Impression_WithoutWastage + "'>\n\
                        <input type='hidden' name='hdn_pTotFullSHRequired[" + k + "]' id='hdn_pTotFullSHRequired" + k + "' value='" + processobj[i].TotFullSHRequired + "'>\n\
                        <input type='hidden' name='hdn_pFullSH_WithoutWastage[" + k + "]' id='hdn_pFullSH_WithoutWastage" + k + "' value='" + processobj[i].FullSH_WithoutWastage + "'>\n\
                        <input type='hidden' name='hdn_ppapermulfact[" + k + "]' id='hdn_ppapermulfact" + k + "' value='" + processobj[i].PaperMulFact + "'>\n\
                        <input type='hidden' name='hdn_pBoardDivFact[" + k + "]' id='hdn_pBoardDivFact" + k + "' value='" + processobj[i].BoardDivFact + "'>\n\
                        <input type='hidden' name='hdn_pCutBoardDim[" + k + "]' id='hdn_pCutBoardDim" + k + "' value='" + processobj[i].CutBoardDim + "'>\n\
                        <input type='hidden' name='hdn_pProcessStatus[" + k + "]' id='hdn_pProcessStatus" + k + "' value='" + processobj[i].ProcessStatus + "'>\n\
                        <input type='text' name='txt_pcomponentname[" + k + "]' id='txt_pcomponentname" + k + "' value='" + processobj[i].Component + "' readonly style='background-color:#00FFFF;'></td>\n\
                    <td>\n\
                        <input type='text' name='txt_pformno[" + k + "]' id='txt_pformno" + k + "' value='" + processobj[i].FormNo + "' readonly></td>\n\
                    <td>\n\
                        <input type='text' name='txt_pplateno[" + k + "]' id='txt_pplateno" + k + "' value='" + processobj[i].PlateNo + "' readonly></td>\n\
                    <td onclick='return addprocess(" + k + ");' style='" + style + "'>\n\
                        <input type='hidden' name='hdn_pprid[" + k + "]' id='hdn_pprid" + k + "' value='" + processobj[i].ProcessID + "'>\n\
                        <label name='txt_pprocessname[" + k + "]' id='txt_pprocessname" + k + "'>" + processobj[i].ProcessName + "</label></td>\n\
                    <td>\n\
                        <input type='text' name='txt_pfb[" + k + "]' id='txt_pfb" + k + "' value='" + processobj[i].FB + "' readonly></td>\n\
                    <td onclick='processboard(" + k + ");'>\n\
                        <input type='hidden' name='hdn_prawmaterialid_1[" + k + "]' id='hdn_prawmaterialid_1" + k + "' value='" + processobj[i].RawMaterialID_1 + "'>\n\
                        <input type='hidden' name='hdn_pmill[" + k + "]' id='hdn_pmill" + k + "' value='" + processobj[i].Mill + "'>\n\
                        <input type='hidden' name='hdn_ppaperkind[" + k + "]' id='hdn_ppaperkind" + k + "' value='" + processobj[i].PaperKind + "'>\n\
                        <input type='hidden' name='hdn_pgsm[" + k + "]' id='hdn_pgsm" + k + "' value='" + processobj[i].GSM + "'>\n\
                        <input type='text' name='txt_prawmaterial_1[" + k + "]' id='txt_prawmaterial_1" + k + "' value='" + processobj[i].RawMaterial_1 + "' readonly></td>\n\
                    <td>\n\
                        <input type='hidden' name='txt_pVar_ID_Info1[" + k + "]' id='txt_pVar_ID_Info1" + k + "' value='" + processobj[i].Var_ID_Info1 + "' >\n\
                        <input type='text' name='txt_pVar_Info1[" + k + "]' id='txt_pVar_Info1" + k + "' value='" + processobj[i].Var_Info1 + "' readonly></td>\n\
                    <td>\n\
                        <input type='hidden' name='txt_pVar_ID_Info2[" + k + "]' id='txt_pVar_ID_Info2" + k + "' value='" + processobj[i].Var_ID_Info2 + "' >\n\
                        <input type='text' name='txt_pVar_Info2[" + k + "]' id='txt_pVar_Info2" + k + "' value='" + processobj[i].Var_Info2 + "' readonly></td>\n\
                    <td>\n\
                        <input type='hidden' name='hdn_pplanheight[" + k + "]' id='hdn_pplanheight" + k + "' value='" + processobj[i].planheight + "'>\n\
                        <input type='hidden' name='hdn_pplanbreadth[" + k + "]' id='hdn_pplanbreadth" + k + "' value='" + processobj[i].planbreadth + "'>\n\
                        <input type='text' name='txt_pplansize[" + k + "]' id='txt_pplansize" + k + "' value='" + processobj[i].plansize + "' readonly></td>\n\
                    <td>\n\
                        <input type='hidden' name='hdn_pprintheight[" + k + "]' id='hdn_pprintheight" + k + "' value='" + processobj[i].printheight + "'>\n\
                        <input type='hidden' name='hdn_pprintbreadth[" + k + "]' id='hdn_pprintbreadth" + k + "' value='" + processobj[i].printbreadth + "'>\n\
                        <input type='text' name='txt_pprintsize[" + k + "]' id='txt_pprintsize" + k + "' value='" + processobj[i].printsize + "' readonly></td>\n\
                    <td>\n\
                        <input type='text' name='txt_prepeat[" + k + "]' id='txt_prepeat" + k + "' value='" + processobj[i].NoOfRepeats + "'></td>\n\
                    <td>\n\
                        <input type='hidden' name='hdn_ptotcutshreq[" + k + "]' id='hdn_ptotcutshreq" + k + "' value='" + processobj[i].TotCutSHRequired + "'>\n\
                        <input type='text' name='txt_pcutsheets[" + k + "]' id='txt_pcutsheets" + k + "' value='" + processobj[i].TotCutSHRequired + "' readonly></td>\n\
                    </td>\n\
                    <td>\n\
                        <input type='text' name='txt_pwastageper[" + k + "]' id='txt_pwastageper" + k + "' value='" + processobj[i].WastagePer + "' readonly></td>\n\
                    <td>\n\
                        <input type='text' name='txt_pimpressions[" + k + "]' id='txt_pimpressions" + k + "' value='" + processobj[i].impressions + "' readonly></td>\n\
                    <td ondblclick='return showmachien(" + k + ");'>\n\
                        <input type='hidden' name='hdn_pmachineid[" + k + "]' id='hdn_pmachineid" + k + "' value='" + processobj[i].MachineID + "'>\n\
                        <input type='hidden' name='hdn_pmachineno[" + k + "]' id='hdn_pmachineno" + k + "' value='" + processobj[i].MachineNo + "'>\n\
                        <input type='text' name='txt_pmachinename[" + k + "]' id='txt_pmachinename" + k + "' value='" + processobj[i].MachineName + "' readonly></td>\n\
                    <td onclick='return opentimesec(" + k + ");'>\n\
                        <input type='hidden' name='hdn_pmrtimesec[" + k + "]' id='hdn_pmrtimesec" + k + "' value='" + processobj[i].MrTime + "'>\n\
                        <input type='text' name='txt_pmrtime[" + k + "]' id='txt_pmrtime" + k + "' value='" + processobj[i].MrTime_Format + "' oninput ='return caloninput1(" + k + ");' onchange='return calcutime1(this)'></td>\n\
                    <td onclick='return opentimesec(" + k + ");'>\n\
                        <input type='hidden' name='hdn_pprocesstimesec[" + k + "]' id='hdn_pprocesstimesec" + k + "' value='" + processobj[i].ProcessTime + "'>\n\
                        <input type='text' name='txt_pprocesstime[" + k + "]' id='txt_pprocesstime" + k + "' value='" + processobj[i].ProcessTime_Format + "' oninput ='return caloninput2(" + k + ");' onchange='return calcutime2(this)'></td>\n\
                    <td>\n\
                        <input type='hidden' name='hdn_ptotaltimesec[" + k + "]' id='hdn_ptotaltimesec" + k + "' value='" + processobj[i].TotTime + "'>\n\
                        <input type='text' name='txt_ptotaltime[" + k + "]' id='txt_ptotaltime" + k + "' value='" + processobj[i].TotTime_Format + "' readonly></td>\n\
                    <td>\n\
                        <select style='font-size: 10px; width: 98%;padding: 0px; border: 0px;' id='drp_pexecution" + k + "' name='drp_pexecution[" + k + "]'>\n\
                            <option value='0'>----Select----</option>\n\
                            <option value='1' selected>In House</option>\n\
                            <option value='2'>Online</option>\n\
                            <option value='3'>OutSource</option>\n\
                        </select></td>\n\
                    <td>\n\
                        <select style='font-size: 10px; width: 98%;padding: 0px; border: 0px;' id='drp_ppass" + k + "' name='drp_ppass[" + k + "]'>\n\
                            <option value='1'>First Pass</option>\n\
                            <option value='2'>Second Pass</option>\n\
                            <option value='3'>Third Pass</option>\n\
                            <option value='4'>Fourth Pass</option>\n\
                        </select></td>\n\
                    <td>\n\
                        <input type='text' name='txt_premarks[" + k + "]' id='txt_premarks" + k + "' value='" + processobj[i].FP_Remarks1 + "'></td>\n\
                    <td></td>\n\
                </tr>");
                if (processobj[i].ExecutionID != '') {
                    $("select[name='drp_pexecution[" + k + "\\]']").val(processobj[i].ExecutionID);
                } else {
                    $("select[name='drp_pexecution[" + k + "\\]']").val(1);
                }
                $("select[name='drp_ppass[" + k + "\\]']").val(processobj[i].NoOfPass);
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
                        <input type='hidden' id='hdn_PlOsVendor[" + v + "]' name='hdn_PlOsVendor[" + v + "]' value='" + objink[i].OsVendorID + "'>\n\
                        <input type='hidden' id='hdn_Plcomponent[" + v + "]' value='" + objink[i].Component + "' name='hdn_Plcomponent[" + v + "]'>" + objink[i].Component + "\
                    </td>\n\
                    <td style='text-align:center'><input type='hidden' id='hdn_Plformno[" + v + "]' value='" + objink[i].FormNo + "' name='hdn_Plformno[" + v + "]'>" + objink[i].FormNo + "</td>\n\
                    <td style='text-align:center'><input type='hidden' id='hdn_PlPlateNo[" + v + "]' value='" + objink[i].PlateNo + "' name='hdn_PlPlateNo[" + v + "]'>" + objink[i].PlateNo + "</td>\n\
                    <td>\n\
                        <select id='drp_plate[" + v + "]' name='drp_plate[" + v + "]'>\n\
                            <option value=''>--Select--</option>\n\
                        </select>\n\
                    </td>\n\
                    <td style='text-align:center'>\n\
                        <input type='text' name='txt_plateNew[" + v + "]' id='txt_plateNew[" + v + "]' value='" + objink[i].PLateNew + "'>\n\
                    </td>\n\
                    <td style='text-align:center'>\n\
                        <input type='text' name='txt_plateOld[" + v + "]' id='txt_plateOld[" + v + "]' value='" + objink[i].PLateOld + "'>\n\
                    </td>\n\
                    <td>\n\
                        <input type='text' name='txt_plateRemarks[" + v + "]' id='txt_plateRemarks[" + v + "]' value='" + objink[i].PlateRemarks + "'>\n\
                    </td>\n\
                    <td>\n\
                        <select id='drp_inkExecution[" + v + "]' name='drp_inkExecution[" + v + "]'>\n\
                            <option value='0'>----Select----</option>\n\
                            <option value='1' selected=''>In House</option>\n\
                            <option value='2'>Online</option>\n\
                            <option value='3'>OutSource</option>\n\
                        </select>\n\
                    </td>\n\
                   <td>\n\
                        <input type='text' name='txt_ink1[" + v + "]' style='width: 100%' id='txt_ink1[" + v + "]' onclick='return ink_pop(" + v + ");' value='" + objink[i].InkDesc1 + "' readonly>\n\
                        <input type='hidden' id='hdn_inkItemID1[" + v + "]' name='hdn_inkItemID1[" + v + "]' value='" + objink[i].Ink1 + "'>\n\
                    </td>\n\
                    <td>\n\
                        <input type='text' name='txt_ink2[" + v + "]' style='width: 100%' id='txt_ink2[" + v + "]' onclick='return ink_pop(" + v + ");' value='" + objink[i].InkDesc2 + "' readonly>\n\
                        <input type='hidden' id='hdn_inkItemID2[" + v + "]' name='hdn_inkItemID2[" + v + "]' value='" + objink[i].Ink2 + "'>\n\
                    </td>\n\
                    <td>\n\
                        <input type='text' name='txt_ink3[" + v + "]' style='width: 100%' id='txt_ink3[" + v + "]' onclick='return ink_pop(" + v + ");' value='" + objink[i].InkDesc3 + "' readonly>\n\
                        <input type='hidden' id='hdn_inkItemID3[" + v + "]' name='hdn_inkItemID3[" + v + "]' value='" + objink[i].Ink3 + "'>\n\
                    </td>\n\
                    <td>\n\
                        <input type='text' name='txt_ink4[" + v + "]' style='width: 100%' id='txt_ink4[" + v + "]' onclick='return ink_pop(" + v + ");' value='" + objink[i].InkDesc4 + "' readonly>\n\
                        <input type='hidden' id='hdn_inkItemID4[" + v + "]' name='hdn_inkItemID4[" + v + "]' value='" + objink[i].Ink4 + "'>\n\
                    </td>\n\
                    <td>\n\
                        <input type='text' name='txt_ink5[" + v + "]' style='width: 100%' id='txt_ink5[" + v + "]' onclick='return ink_pop(" + v + ");' value='" + objink[i].InkDesc5 + "' readonly>\n\
                        <input type='hidden' id='hdn_inkItemID5[" + v + "]' name='hdn_inkItemID5[" + v + "]' value='" + objink[i].Ink5 + "'>\n\
                    </td>\n\
                </tr>");
                $("select[name='drp_plate[" + v + "]").append(plate_dropdown);
                $("select[name='drp_plate[" + v + "\\]']").val(objink[i].PLateID);
                $("select[name='drp_inkExecution[" + v + "\\]']").val(objink[i].OS);
                v++;
            }


            if (jobneworold == 'New' && objrawdetail == '') {
                // alert('Khushal');
                $('#tbl_rawmaterial').html('');
            } else {
                $('#tbl_rawmaterial').html('');
                var j = 1;
                for (var i = 0; i < objrawdetail.length; i++) {
                    var reqtores = objrawdetail[i].ReqtoReserved;
                    var reqtoreschk = '';
                    if (reqtores == 1) {
                        reqtoreschk = "checked='checked'";
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
                                                    <td><input type='text' name='txt_imrno[" + j + "]' id='txt_imrno[" + j + "]'></td>\n\
                                                    <td><input type='text' name='txt_imrqty[" + j + "]' id='txt_imrqty[" + j + "]' value=" + objrawdetail[i].Approxqtyreq + "> </td>\n\
                                                    <td><input type='checkbox' name='txt_requestImr[" + j + "]' id='txt_requestImr[" + j + "]'></td>\n\
                    </tr>");
                    j++;
                }

            }
            if (jobneworold == 'New') {
                var j = 1;
                $('#tbody_otherinfo').html('');
                for (var i = 0; i < otherdetail.length; i++) {
                    // var margin = otherdetail[i].margin;
                    // var gutter = otherdetail[i].gutter;
                    // var Plate_Gripper = otherdetail[i].Plate_Gripper;
                    // $('#txt_margins').val(margin);
                    // $('#txt_pasting').val(gutter);
                    // $('#txt_macinegr').val(Plate_Gripper);

                    $('#txt_othComponent' + j).val();
                    $('#tbody_otherinfo').append("<tr>\n\
                  <td><input type='text' name='txt_othComponent[" + j + "]' id='txt_othComponent[" + j + "]' value='" + otherdetail[i].Component + "'></td>\n\
                  <td><input type='text' name='txt_othOpenSize[" + j + "]' id='txt_othOpenSize[" + j + "]' value='" + otherdetail[i].OpenSize + "'></td>\n\
                  <td><input type='text' name='txt_othCloseSize[" + j + "]' id='txt_othCloseSize[" + j + "]' value='" + otherdetail[i].CloseSize + "'></td>\n\
                  <td><input type='text' name='txt_othNoOfPage[" + j + "]' id='txt_othNoOfPage[" + j + "]' value='" + otherdetail[i].NoOfPages + "'></td>\n\
                  <td><input type='text' name='txt_othSpine[" + j + "]' id='txt_othSpine[" + j + "]' value='" + otherdetail[i].Spine + "'></td>\n\
                  <td><input type='text' name='txt_desinging[" + j + "]' id='txt_desinging[" + j + "]' value='" + otherdetail[i].DesignAW + "'></td>\n\
                  <td><input type='text' name='txt_checklist[" + j + "]' id='txt_checklist[" + j + "]' value='" + otherdetail[i].ChecklistNo + "'></td>\n\
                </tr>");

                    j++;
                }
            } else {
                //alert("Khushal");
                var j = 1;
                for (var i = 0; i < otherdetail.length; i++) {
                    $('#tbody_otherinfo').html('');
                    $('#txt_othComponent' + j).val();
                    $('#tbody_otherinfo').append("<tr>\n\
                  <td><input type='text' name='txt_othComponent[" + j + "]' id='txt_othComponent[" + j + "]' value='" + otherdetail[i].Component + "'></td>\n\
                  <td><input type='text' name='txt_othOpenSize[" + j + "]' id='txt_othOpenSize[" + j + "]' value='" + otherdetail[i].OpenSize + "'></td>\n\
                  <td><input type='text' name='txt_othCloseSize[" + j + "]' id='txt_othCloseSize[" + j + "]' value='" + otherdetail[i].CloseSize + "'></td>\n\
                  <td><input type='text' name='txt_othNoOfPage[" + j + "]' id='txt_othNoOfPage[" + j + "]' value='" + otherdetail[i].NoOfPages + "'></td>\n\
                  <td><input type='text' name='txt_othSpine[" + j + "]' id='txt_othSpine[" + j + "]' value='" + otherdetail[i].Spine + "'></td>\n\
                  <td><input type='text' name='txt_desinging[" + j + "]' id='txt_desinging[" + j + "]' value='" + otherdetail[i].DesignAW + "'></td>\n\
                  <td><input type='text' name='txt_checklist[" + j + "]' id='txt_checklist[" + j + "]' value='" + otherdetail[i].ChecklistNo + "'></td>\n\
                  \n\
                </tr>");

                    j++;
                }
            }

            var b = 1;
            $("#tbody_additionalmtrl").html("");
            for (var i = 0; i < objadditmtrl.length; i++) {
                $("#tbody_additionalmtrl").append("<tr>\n\
                    <td><input type='hidden' name='txt_am_AutoId_PK[" + b + "]' id='txt_am_AutoId_PK" + b + "' value='" + objadditmtrl[i].AutoId_PK + "'>\n\
                        <input type='hidden' name='hdn_am_Component[" + b + "]' id='hdn_am_Component" + b + "' value='" + objadditmtrl[i].Component + "'>\n\
                        " + objadditmtrl[i].Component + "\n\
                    </td>\n\
                    <td><input type='hidden' name='hdn_am_FormNo[" + b + "]' id='hdn_am_FormNo" + b + "' value='" + objadditmtrl[i].FormNo + "'>\n\
                        " + objadditmtrl[i].FormNo + "\n\
                    </td>\n\
                    <td><input type='hidden' name='txt_am_itemid[" + b + "]' id='txt_am_itemid" + b + "' value='" + objadditmtrl[i].itemid + "'>\n\
                        <input type='text' name='txt_am_Description[" + b + "]' id='txt_am_Description" + b + "' value='" + objadditmtrl[i].Description + "' readonly style='width:100%;'>\n\
                    </td>\n\
                    <td><input type='text' name='txt_am_Qty[" + b + "]' id='txt_am_Qty" + b + "' value='" + objadditmtrl[i].Qty + "'></td>\n\
                    <td><input type='text' name='txt_am_QtyAfterWastage[" + b + "]' id='txt_am_QtyAfterWastage" + b + "' value='" + objadditmtrl[i].QtyAfterWastage + "' readonly></td>\n\
                    <td><input type='text' name='txt_am_UpsInFullSheet[" + b + "]' id='txt_am_UpsInFullSheet" + b + "' value='" + objadditmtrl[i].UpsInFullSheet + "' readonly></td>\n\
                    <td><input type='text' name='txt_am_ComponentSize[" + b + "]' id='txt_am_ComponentSize" + b + "' value='" + objadditmtrl[i].ComponentSize + "' readonly style='width:100%;'></td>\n\
                    <td><input type='text' name='txt_am_CutDeckle[" + b + "]' id='txt_am_CutDeckle" + b + "' value='" + objadditmtrl[i].CutDeckle + "' readonly></td>\n\
                    <td><input type='text' name='txt_am_CutLength[" + b + "]' id='txt_am_CutLength" + b + "' value='" + objadditmtrl[i].CutLength + "' readonly></td>\n\
                    <td><input type='text' name='txt_am_NoOfLeaves[" + b + "]' id='txt_am_NoOfLeaves" + b + "' value='" + objadditmtrl[i].NoOfLeaves + "' readonly></td>\n\
                </tr>");
                b++;
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
        $('#btn_material1').click();
        $('#hdn_rowmachine').val(lnk);
        var materailid = '00001';
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
            url: "<?php echo site_url() ?>Production/Jobcard_comm/materaildetail1",
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
    function materail2(lnk) {
        $('#btn_material2').click();
        $('#hdn_rowmachine').val(lnk);
        var materailid = '00002';
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
            url: "<?php echo site_url() ?>Production/Jobcard_comm/materaildetail2",
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
        $('#hdn_rowmachine').val(lnk);
        var prid = $("input[name='hdn_pprid[" + lnk + "\\]']").val();
        $.blockUI();
        $.ajax({
            type: "POST",
            url: "<?php echo site_url() ?>Production/Jobcard_comm/machine",
            data: {prid: prid}
        }).done(function (msg) {
            $('#tbody_machien').html('');
            var main = jQuery.parseJSON(msg);
            var j = 1;
            for (var i = 0; i < main.length; i++) {
                $('#tbody_machien').append("<tr onclick='return setmacien(" + j + ")'>\n\
                    <td><input type='hidden' name='hdn_machineid" + j + "' id='hdn_machineid" + j + "' value=" + main[i].RecId + ">\n\
                                                <input type='hidden' name='hdn_machineidpr" + j + "' id='hdn_machineidpr" + j + "' value=" + main[i].MachineID + ">\n\
                                                    <input type='hidden' name='hdn_machinename" + j + "' id='hdn_machinename" + j + "' value=" + main[i].MachineName + ">\n\
                        <label style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px; padding-left:5px;' id='lbl_machine" + j + "'>" + main[i].MachineName + "</label></td>\n\
                    </tr>")
                j++;
            }
            $('#btn_machine').click();
        });
    }

    function setmacien(lnk) {

        var rowmachine = $('#hdn_rowmachine').val();

        var machineid = $('#hdn_machineid' + lnk).val();
        var machinename = $('#lbl_machine' + lnk).text();
        var machineidpr = $('#hdn_machineidpr' + lnk).val();

        $("input[type='hidden'][name='hdn_pmachineid[" + rowmachine + "\\]']").val(machineidpr);
        $("input[type='hidden'][name='hdn_pmachineno[" + rowmachine + "\\]']").val(machineid);
        $("input[type='text'][name='txt_pmachinename[" + rowmachine + "\\]']").val(machinename);

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

    function showjob(val) {
        var woid = $('#hdn_woid' + val).val();
        var jobno = $('#hdn_jobno' + val).val();
        $('#btn_myModaljobcard').click();
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
            url: "<?php echo site_url() ?>Production/Jobcard_comm/showwo",
            data: {jobno: jobno, woid: woid}
        }).done(function (msg) {
            $('#tbody_jobdetail').html('');
            var main = jQuery.parseJSON(msg);
            var i = 1;
            for (var j = 0; j < main.length; j++) {

                $('#tbody_jobdetail').append("<tr onclick='return setnewjob(" + i + ")'>\n\
                    <td><input type='hidden' name='hdn_clientidval" + i + "' id='hdn_clientidval" + i + "' value = '" + main[j].ClientId + "'>\n\
                    <label id='lbl_jobno" + i + "'>" + main[j].JobNo + "</label</td>\n\
                    <td><label id='lbl_woid" + i + "'>" + main[j].WOID + "</label</td>\n\
                    <td><label id='lbl_prodctname" + i + "'>" + main[j].ProductName + "</label</td>\n\
                    <td><label id='lbl_miscode" + i + "'>" + main[j].MiSCodeNo + "</label</td>\n\
                    <td><label id='lbl_clientcode" + i + "'>" + main[j].ClientProductCodeNo + "</label</td>\n\
                    <td><label id='lbl_estimateno" + i + "'>" + main[j].EstimateNo + "</label</td>\n\
                    <td><label id='lbl_wodate" + i + "'>" + main[j].WODate + "</label</td>\n\
                    <td><label id='lbl_deliveryreqdate" + i + "'>" + main[j].DeliveryRequiredDate + "</label</td>\n\
                    <td><label id='lbl_artworkno" + i + "'>" + main[j].ArtWorkCode + "</label</td>\n\
                    <td><label id='lbl_clientname" + i + "'>" + main[j].CustomerName + "</label</td>\n\
                    <td><label id='lbl_reamrks" + i + "'>" + main[j].Remarks + "</label</td></tr>");
                i++;
            }
        });
    }

    function setnewjob(val) {
        var jobval = $('#lbl_jobno' + val).text();
        var clientidval = $('#hdn_clientidval' + val).val();
        var lblwoid = $('#lbl_woid' + val).text();
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
            url: "<?php echo site_url() ?>Production/Jobcard_comm/jobcardval",
            data: {jobval: jobval}
        }).done(function (msg) {
            var main = jQuery.parseJSON(msg);
            var len = $('#tbodygeneral tr').length;
            var j = parseInt(len) + 1;
            for (var i = 0; i < main.length; i++) {
                $('#tbodygeneral').append("<tr>\n\
                    <td style='font-size: 9px;'><a onclick='return DeleteRowmain(this);'><img src='<?php echo base_url() ?>assets/bh_assets/img/Delete.png' style='height: 15px; width: 15px;'></a></td>\n\
                    <td onclick = 'return bindgrid(" + j + ")' style ='padding-left: 5px; font-size: 10px;background-color: #00FFFF;'>\n\
                        <input type='hidden' name='hdn_itemid[" + j + "]' id='hdn_itemid[" + j + "]' value=" + main[i].itemid + ">\n\
                        " + main[i].Jobno + "</td>\n\
                    <td  onclick = 'return showjob(" + j + ")' style ='padding-left: 5px; font-size: 10px;background-color: #00FFFF;'><input type='hidden' name='hdn_woid[" + j + "]' id='hdn_woid[" + j + "]' value = '" + lblwoid + "'>\n\
                        <input type='hidden' name='hdn_clientid[" + j + "]' id='hdn_clientid[" + j + "]' value=" + clientidval + ">\n\
                        <input type='hidden' name='txt_specification[" + j + "]' id='txt_specification[" + j + "]' value='00000'>\n\
                        <input type='hidden' name='txt_TotQtyDispatched[" + j + "]' id='txt_TotQtyDispatched[" + j + "]' value='" + main[i].TotalQtyDispatched + "'>\n\
                        <input type='hidden' name='txt_TotQtyProduced[" + j + "]' id='txt_TotQtyProduced[" + j + "]' value='0'>\n\
                        <input type='hidden' name='hdn_jobnno[" + j + "]' id='hdn_jobnno[" + j + "]' value='" + main[i].Jobno + "'></td>\n\
                    <td style='padding-left: 5px; font-size: 10px;'><input type='hidden' name='txt_[]' id='txt_[]' class='form-control' style='padding: 0px' value='" + main[i].Description + "'>" + main[i].Description + "</td>\n\
                    <td></td>\n\
                    <td style='padding-left: 5px; font-size: 10px;'><input type='hidden' name='txt_[]' id='txt_[]' class='form-control' style='padding-left: 5px;' value='" + main[i].AccCode + "'>" + main[i].AccCode + "</td>\n\
                    <td style ='padding-left: 5px; font-size: 10px;'>" + main[i].ArtWorkNo + "</td>\n\
                    <td style='padding-left: 5px; font-size: 10px;'><input type='hidden' name='txt_[]' id='txt_[]' class='form-control' style='padding: 0px' value='" + main[i].IPrefix + "'>" + main[i].IPrefix + "</td>\n\
                    <td style='padding-left: 5px; font-size: 10px;'><input type='hidden' name='txt_orderqty[" + j + "]' id='txt_orderqty[" + j + "]' class='form-control' style='padding: 0px' value=" + main[i].Quantity + ">" + main[i].Quantity + "</td>\n\
                    <td style='padding-left: 5px; font-size: 10px;'>\n\
                    <input style='border:0px;' type='text' name='txt_printqty[" + j + "]' id='txt_printqty[" + j + "]' value='' class='printQty'>\n\
                    </td>\n\
                    <td style='padding-left: 5px; font-size: 10px;'><input type='hidden' name='txt_[]' id='txt_[]' class='form-control' style='padding: 0px' value='" + main[i].WONo + "'>" + main[i].WONo + "</td>\n\
                     <td style='padding-left: 5px; font-size: 10px; width: 50px;'>\n\
                        <input style='border:0px;' type='text' name='txt_upsvalmain[" + j + "]' id='txt_upsvalmain[" + j + "]' value=''></td>\n\
                    <td style='padding-left: 5px; font-size: 10px; width: 50px;'>\n\
                        <input style='border:0px;' type='text' name='txt_fqty[" + j + "]' id='txt_fqty[" + j + "]'>\n\
                    </td>\n\
                    <td style='padding-left: 5px; font-size: 10px;'>" + main[i].CompanyName + "</td>\n\
                    <td style='display: none'>\n\
                        <input type='hidden' name='txt_[]' id='txt_[]' class='form-control' style='padding: 0px' value='" + main[i].itemid + "'></td>\n\
                    <td style='display: none'>\n\
                        <input type='hidden' name='txt_[]' id='txt_[]' class='form-control' style='padding: 0px' value='" + main[i].Specification + "'></td>\n\
                </tr>");
                j++;
            }
        });
        $('#myModaljobcard').modal('hide');
    }

    function addprocess(val) {
        var hdn_baseprid = $("input[type='hidden'][name='hdn_pprid[" + val + "\\]']").val();
        if (hdn_baseprid != '') {
            var agree = confirm("Do You Really Want To add This Process ?");
            if (agree == false) {
                return false;
            }
        }

        var processname = $('#txt_pprocessname' + val).val();
        var tbllen = $('#processdetail tr').length;
        var currnrow = tbllen + 1;
        $('#processdetail').append("<tr>\n\
            <td style='background-color: #00FFFF;'>\n\
                <input type='checkbox' name='chk_delte[" + currnrow + "]' id='chk_delte[" + currnrow + "]' checked></td>\n\
            <td style='background-color: #00FFFF;'>\n\
                <input type='hidden' name='hdn_ptotcutshreq[" + currnrow + "]' id='hdn_ptotcutshreq" + currnrow + "' value='0'>\n\
                <input type='hidden' name='hdn_pupsincutsh[" + currnrow + "]' id='hdn_pupsincutsh" + currnrow + "' value='0'>\n\
                <input type='hidden' name='hdn_pcutfromfullsh[" + currnrow + "]' id='hdn_pcutfromfullsh" + currnrow + "' value='0'>\n\
                <input type='hidden' name='hdn_ppapermulfact[" + currnrow + "]' id='hdn_ppapermulfact" + currnrow + "' value='0'>\n\
                <input type='text' name='txt_pcomponentname[" + currnrow + "]' id='txt_pcomponentname" + currnrow + "' value='' readonly style='background-color:#00FFFF;'></td>\n\
            <td>\n\
                <input type='text' name='txt_pformno[" + currnrow + "]' id='txt_pformno" + currnrow + "' value='' readonly></td>\n\
            <td>\n\
                <input type='text' name='txt_pplateno[" + currnrow + "]' id='txt_pplateno" + currnrow + "' value='' readonly></td>\n\
            <td onclick='return addprocess(" + currnrow + ");'>\n\
                <input type='hidden' name='hdn_pprid[" + currnrow + "]' id='hdn_pprid" + currnrow + "' value='" + hdn_baseprid + "'>\n\
                <input type='text' name='txt_pprocessname[" + currnrow + "]' id='txt_pprocessname" + currnrow + "' value='" + processname + "' readonly></td>\n\
            <td>\n\
                <input type='text' name='txt_pfb[" + currnrow + "]' id='txt_pfb" + currnrow + "' value='' readonly></td>\n\
            <td onclick='processboard(" + currnrow + ");' style='cursor:pointer'>\n\
                <input type='hidden' name='hdn_prawmaterialid_1[" + currnrow + "]' id='hdn_prawmaterialid_1" + currnrow + "' value=''>\n\
                <input type='text' name='txt_prawmaterial_1[" + currnrow + "]' id='txt_prawmaterial_1" + currnrow + "' value='' readonly></td>\n\
            <td onclick='processink(" + currnrow + ");'>\n\
                <input type='text' name='txt_pVar_Info1[" + currnrow + "]' id='txt_pVar_Info1" + currnrow + "' value='' readonly></td>\n\
            <td>\n\
                <input type='text' name='txt_pVar_Info2[" + currnrow + "]' id='txt_pVar_Info2" + currnrow + "' value='' readonly></td>\n\
            <td>\n\
                <input type='hidden' name='hdn_pplanheight[" + currnrow + "]' id='hdn_pplanheight" + currnrow + "' value=''>\n\
                <input type='hidden' name='hdn_pplanbreadth[" + currnrow + "]' id='hdn_pplanbreadth" + currnrow + "' value=''>\n\
                <input type='text' name='txt_pplansize[" + currnrow + "]' id='txt_pplansize" + currnrow + "' value='' readonly></td>\n\
            <td>\n\
                <input type='hidden' name='hdn_pprintheight[" + currnrow + "]' id='hdn_pprintheight" + currnrow + "' value=''>\n\
                <input type='hidden' name='hdn_pprintbreadth[" + currnrow + "]' id='hdn_pprintbreadth" + currnrow + "' value=''>\n\
                <input type='text' name='txt_pprintsize[" + currnrow + "]' id='txt_pprintsize" + currnrow + "' value='' readonly></td>\n\
            <td>\n\
                <input type='text' name='txt_prepeat[" + currnrow + "]' id='txt_prepeat" + currnrow + "' value=''></td>\n\
            <td>\n\
                <input type='text' name='txt_pwastageper[" + currnrow + "]' id='txt_pwastageper" + currnrow + "' value='' readonly></td>\n\
            <td>\n\
                <input type='text' name='txt_pimpressions[" + currnrow + "]' id='txt_pimpressions" + currnrow + "' value='' readonly></td>\n\
            <td ondblclick='return showmachien(" + currnrow + ");'>\n\
                <input type='text' name='txt_pmachinename[" + currnrow + "]' id='txt_pmachinename" + currnrow + "' value='' readonly>\n\
                <input type='hidden' name='hdn_pmachineid[" + currnrow + "]' id='hdn_pmachineid" + currnrow + "' value=''>\n\
                <input type='hidden' name='hdn_pmachineno[" + currnrow + "]' id='hdn_pmachineno" + currnrow + "' value=''></td>\n\
            <td>\n\
                <input type='text' name='txt_premarks[" + currnrow + "]' id='txt_premarks" + currnrow + "' value=''></td>\n\
            <td></td>\n\
            <td>\n\
                <input type='text' style='width: 100px;' name='txt_pmrtime[" + currnrow + "]' id='txt_pmrtime" + currnrow + "' value='00:00'></td>\n\
            <td>\n\
                <input type='text' style='width: 100px;' name='txt_pprocesstime[" + currnrow + "]' id='txt_pprocesstime" + currnrow + "' value='00:00'></td>\n\
            <td>\n\
                <input type='text' style='width: 300px;' name='txt_ptotaltime[" + currnrow + "]' id='txt_ptotaltime" + currnrow + "' value='00:00'></td>\n\
            <td>\n\
                <select style='font-size: 10px; width: 98%;padding: 0px; border: 0px;' id='drp_pexecution" + currnrow + "' name='drp_pexecution[" + currnrow + "]'>\n\
                    <option value='1' selected>In House</option>\n\
                    <option value='2'>Online</option>\n\
                    <option value='3'>OutSource</option>\n\
                </select></td>\n\
            <td>\n\
                <select style='font-size: 10px; width: 98%;padding: 0px; border: 0px;' id='drp_ppass" + currnrow + "' name='drp_ppass[" + currnrow + "]'>\n\
                    <option value='1'>First Pass</option>\n\
                    <option value='2'>Second Pass</option>\n\
                    <option value='3'>Third Pass</option>\n\
                    <option value='4'>Fourth Pass</option>\n\
                </select></td>\n\
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
            } else {
                document.getElementById("example").deleteRow(rowIndex);
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
            url: "<?php echo site_url() ?>Production/Jobcard_comm/genertatecode",
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
            url: "<?php echo site_url() ?>Production/Jobcard_comm/genertatecodeupdate",
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

    function validation() {
        var btn_save = $('#btn_save').val();
        $('#btn_saveval').val(btn_save);
        $('#btn_save').prop('disabled', true);
        // var hdn_itemid = $('input[type="hidden"][name="hdn_itemid[1]"]').val();
        // alert(hdn_itemid);
        // return false;

        var closedate = $('#txt_closedate').val();
        if (closedate != '') {
            var arr = closedate.split('/');
            var datea = arr[0];
            var month = arr[1];
            var yr = arr[2];
            var closedateval = yr + '-' + month + '-' + datea;
            $('#txt_closedateval').val(closedateval);
        }

        var docdate = $('#txt_docdate').val();
        var arr1 = docdate.split('/');
        var datea = arr1[0];
        var month = arr1[1];
        var yr = arr1[2];
        var docdateval = yr + '-' + month + '-' + datea;
        $('#txt_docdateval').val(docdateval);
        var drp_shotqty = $('#drp_shotqty').val();
        if (drp_shotqty != 0) {
            var txt_shortqtyreason = $('#txt_shortqtyreason').val();
            if (txt_shortqtyreason == '') {
                alert('Please Enter Reason of Partial/Reprint?');
                $('#txt_shortqtyreason').focus();
                $('#btn_save').prop('disabled', false);
                return false;
            }
        }
        var Chekornot = $("#chk_hold").prop('checked') == true;
        if (Chekornot == true) {
            var holdreason = $('#txt_holdreason').val();
            if (holdreason == '') {
                alert('Hold Reason should not be blank');
                return false;
            }
        }
        var Chekornotcanl = $("#chk_cancel").prop('checked') == true;
        if (Chekornotcanl == true) {
            var canclereason = $('#txt_cancelreason').val();
            if (canclereason == '') {
                alert('Cancel Reason should not be blank');
                return false;
            }
        }
        var chk_close = $("#chk_close").prop('checked') == true;
        if (chk_close == true) {
            var txt_closereason = $('#txt_closereason').val();
            var txt_closedate = $('#txt_closedate').val()
            if (txt_closereason == '') {
                alert('Close Reason should not be blank');
                return false;
            }
            if (txt_closedate == '') {
                alert('Close Date should not be blank');
                return false;
            }
        }

        var ptbllen = $('#processdetail tr').length;
        for (var i = 1; i <= ptbllen; i++) {
            var timePeriod = $("input[type='text'][name='txt_mmtime[" + i + "\\]']").val();
            var timePeriod1 = $("input[type='text'][name='txt_protime[" + i + "\\]']").val();
            var hdn_pprid = $("input[type='hidden'][name='hdn_pprid[" + i + "\\]']").val();

            var hdn_prawmaterialid_1 = $("input[type='hidden'][name='hdn_prawmaterialid_1[" + i + "\\]']").val();
            if (hdn_pprid == "FL") {
                if (hdn_prawmaterialid_1 == "") {
                    swal("Please Select Raw Material In Lamination");
                    return false;
                }
            }
            // if (timePeriod != '' && timePeriod1 != '') {
            //     var parts = timePeriod.split(/:/);
            //     var timePeriodMillis = (parseInt(parts[0], 10) * 60 * 60 * 1000) +
            //             (parseInt(parts[1], 10) * 60 * 1000) +
            //             (parseInt(parts[2], 10) * 1000);
            //     var parts1 = timePeriod1.split(/:/);
            //     var timePeriodMillis1 = (parseInt(parts1[0], 10) * 60 * 60 * 1000) +
            //             (parseInt(parts1[1], 10) * 60 * 1000) +
            //             (parseInt(parts1[2], 10) * 1000);
            //     var mmtime = (timePeriodMillis / 1000);
            //     var pptime = (timePeriodMillis1 / 1000);
            //     var timeh = parseInt(timePeriodMillis) + parseInt(timePeriodMillis1);
            //     var sectot = (timeh / 1000);
            //     var d = moment.duration(timeh);
            //     var s = Math.floor(d.asHours()) + moment.utc(timeh).format(":mm:ss")
            //     $("input[type='text'][name='txt_tottimeqty[" + i + "\\]']").val(s);
            //     $("input[type='hidden'][name='hdn_mmtimeval[" + i + "\\]']").val(mmtime);
            //     $("input[type='hidden'][name='hdn_pptimeval[" + i + "\\]']").val(pptime);
            //     $("input[type='hidden'][name='hdn_tottimeval[" + i + "\\]']").val(sectot);
            // } else {
            //     alert('Time should not be blank');
            //     return false;
            // }
        }

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
            } else {
                document.getElementById("tbl_processval").deleteRow(rowIndex);
                return false;
            }
        } else
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
            url: "<?php echo site_url() ?>Production/Jobcard_comm/gangJobitem",
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
        $('#txt_jobneworold').val('New');
        bindgrid(1);
        $('#txt_jobneworold').val(value);
    }

    function processboard(val) {
        if ($("#hdn_pprid" + val).val() == "Pr") {
            $.blockUI();
            $('#drp_popfilterboardkind').html('');
            $.ajax({
                type: "POST",
                url: "<?php echo site_url() ?>Production/Jobcard_comm/boardkindfilter",
                data: {}
            }).done(function (data) {
                var data = jQuery.parseJSON(data);
                var i = 1;
                $("#drp_popfilterboardkind").append("<option value='0'>--Select Board Kind--</option>");
                for (var i = 0; i < data.length; i++) {
                    $("#drp_popfilterboardkind").append("<option value='" + data[i].Quality + "'>" + data[i].Quality + "</option>");
                }

            });
            $("#hdn_lnprocessboard").val(val);

            var repeat = $("#txt_prepeat" + val).val();
            $("#txt_popRepeat").val(repeat);
//                var totatQtyReq = $(".printQty").val();

            var totatQtyReq = $("input[type='hidden'][name='hdn_pTotFullSHRequired[" + val + "\\]']").val();
            $("#txt_qtyReq_pop").val(totatQtyReq);

            var Fb = $("#txt_pfb" + val).val();
            $("#lbl_popprintingtype").text(Fb);
            var component = $("#txt_pcomponentname" + val).val();
            var formno = $("#txt_pformno" + val).val();
            var plateno = $("#txt_pplateno" + val).val();
            var rawm1 = $("#txt_prawmaterial_1" + val).val();
            var rawmid1 = $("#hdn_prawmaterialid_1" + val).val();
            var mill = $("#hdn_pmill" + val).val();
            var paperkind = $("#hdn_ppaperkind" + val).val();
            var gsm = $("#hdn_pgsm" + val).val();
            var grain = $("#hdn_pplanheight" + val).val();
            var deckle = $("#hdn_pplanbreadth" + val).val();
            var printgrain = $("#hdn_pprintheight" + val).val();
            var printdeckle = $("#hdn_pprintbreadth" + val).val();
            var cutsfullsh = $("#hdn_pcutfromfullsh" + val).val();
            var wastper = $("#txt_pwastageper" + val).val();
            var impress = $("#txt_pimpressions" + val).val();
            var totcutsh = $("#hdn_ptotcutshreq" + val).val();
            var upsincutsh = $("#hdn_pupsincutsh" + val).val();
            var cutshwithoutwstge = $("#hdn_pcutshwithoutwstge" + val).val();
            $("#lbl_popcomponent").text(component);
            $("#lbl_popformno").text(formno);
            $("#lbl_popplateno").text(plateno);
            $("#txt_popdesc").val(rawm1);
            $("#hdn_popdescid").val(rawmid1);
            $("#hdn_popmill").val(mill);
            $("#hdn_poppaperkind").val(paperkind);
            $("#hdn_popgsm").val(gsm);
            $("#txt_popdeckle").val(deckle);
            $("#txt_popgrain").val(grain);
            $("#txt_popprintdeckle").val(printdeckle);
            $("#txt_popprintgrain").val(printgrain);
            $("#txt_popprintsizeups").val(upsincutsh);
            $("#txt_popcutshwithoutwstge").val(cutshwithoutwstge);
            $("#txt_popcutsfullsheet").val(cutsfullsh);
            $("#txt_popwastageper").val(wastper);

            var impressWithoutWaste = $("#hdn_pImpression_WithoutWastage" + val).val();
//                alert(impressWithoutWaste);
//                
            $("#txt_popimpression").val(impressWithoutWaste);
            $("#txt_popimpafterwstge").val(impress);

            var wastesheet = totcutsh - cutshwithoutwstge;

            $("#txt_popwastagesheets").val(wastesheet);
            $("#txt_poptotcutsheets").val(totcutsh);

            $('#btn_processboard').click();
        } else if ($("#hdn_pprid" + val).val() == "FL") {
            CURRENT_ROW_OF_POPUP_TOKEN = val;
            $('#myModalFL').modal('toggle');
            $.ajax({
                url: "<?php echo site_url() ?>Production/Jobcard_comm/popup_data",
                type: "POST",
                dataType: "JSON",
                data: {},
                beforeSend: function () {
                    $("#tbody_popUp").html('');
                    $.blockUI();
                },
                complete: function () {
                    $.blockUI();
                },
                success: function (data) {
                            // <td>" + i + "</td>\n\
                    var i = 1;
                    for (var i = 0; i < data.length; i++) {
                        $("#tbody_popUp").append("<tr>\n\
                            <td style='padding: 2px' onclick='return populateMainForm(this);'>\n\
                                <input type='hidden' class='popItemID' id='hdn_popItemId" + i + "' name='hdn_popItemId" + i + "' value='" + data[i].ItemID + "'>\n\
                                <label class='custom'>" + data[i].Description + "</label>\n\
                            </td>\n\
                         </tr>");
                    }
                },
                error: function () {
                }
            });
        } else if ($("#hdn_pprid" + val).val() == "FC") {

        } else {
            alert("Cannot open this");
        }
    }

    function populateMainForm(thiss) {
        var current_row = CURRENT_ROW_OF_POPUP_TOKEN;
        var itemId = $(thiss).find(".popItemID").val();
        var desc = $(thiss).find(".custom").text();
        $("#hdn_prawmaterialid_1" + current_row).val(itemId);
        $("#txt_prawmaterial_1" + current_row).val(desc);
        $('#myModalFL').modal('toggle');
    }

    function calculation_pop() {
        var printQtyTotal = 0;
        $("#tbodygeneral tr").each(function () {
            var printQty = parseFloat($(this).find(".printQty").val());
            printQtyTotal = printQtyTotal + printQty;
        });
        var wastage_pop = $("#txt_popwastageper").val();
        var ups_pop = $("#txt_popprintsizeups").val();
        var repeat = parseFloat($("#txt_popRepeat").val());
        // var noOfcutSheets_without_Wastage = Math.ceil(printQtyTotal / ups_pop);
        var noOfcutSheets_without_Wastage = $("#txt_popcutshwithoutwstge").val();
        //alert(printQtyTotal+" /"+ups_pop);
        //alert(noOfcutSheets_without_Wastage+ "x"+wastage_pop+"/100");
        var wastage_sheets = Math.ceil((noOfcutSheets_without_Wastage * wastage_pop) / 100);
        var wastage_calc = (Math.ceil(wastage_sheets + noOfcutSheets_without_Wastage)).toFixed(0);
        $("#txt_popcutshwithoutwstge").val(noOfcutSheets_without_Wastage * repeat);
        $("#txt_popwastagesheets").val(Math.ceil(wastage_sheets));

        //alert("wastage_pop "+wastage_pop+"  "+"wastage_sheets "+wastage_sheets+"  "+"wastage_calc "+wastage_calc+" "+"noOfcutSheets_without_Wastage "+noOfcutSheets_without_Wastage);

        $("#txt_poptotcutsheets").val(wastage_calc);
        var a = $("#txt_poptotcutsheets").val();

        var cutsfullsheet = $("#txt_popcutsfullsheet").val();
        var reqSheet = wastage_calc / cutsfullsheet;

        var k = Math.round(reqSheet);

        //$("#txt_qtyReq_pop").val(k);		

        var FB = $("#lbl_popprintingtype").text();
        if (FB == 'Self-Back') {
            var impression = wastage_calc * 2;
            $("#txt_popimpafterwstge").val(impression);
        } else {
            $("#txt_popimpafterwstge").val(wastage_calc);
        }

        var reqsheet2 = a / cutsfullsheet;
        //alert(wastage_calc+""+a+"   "+cutsfullsheet+"    "+reqsheet2);
        reqsheet2 = Math.round(reqsheet2);
        $("#txt_qtyReq_pop").val(reqsheet2);
        $("input[type='hidden'][name='hdn_pTotFullSHRequired[" + 1 + "\\]']").val(reqsheet2);



        //txt_qtyReq_pop   = txt_poptotcutsheets/cutsfullsheet
    }

    function setform() {
        var val = $("#hdn_lnprocessboard").val();
        var rawm1 = $("#txt_popdesc").val();
        var rawmid1 = $("#hdn_popdescid").val();
        var mill = $("#hdn_popmill").val();
        var paperkind = $("#hdn_poppaperkind").val();
        var gsm = $("#hdn_popgsm").val();
        var deckle = $("#txt_popdeckle").val();
        var grain = $("#txt_popgrain").val();
        var printdeckle = $("#txt_popprintdeckle").val();
        var printgrain = $("#txt_popprintgrain").val();
        var upsincutsh = $("#txt_popprintsizeups").val();
        var cutsfullsh = $("#txt_popcutsfullsheet").val();
        var wastper = $("#txt_popwastageper").val();
        var impress = $("#txt_popimpafterwstge").val();
        var totcutsh = $("#txt_poptotcutsheets").val();
        var cutshwithoutwstge = $("#txt_popcutshwithoutwstge").val();
        var component_pop = $("#lbl_popcomponent").text();
        var formno_pop = $("#lbl_popformno").text();
        var processdetailLen = $("#processdetail tr").length;
        for (var i = 1; i <= processdetailLen; i++) {
            var component = $("#txt_pcomponentname" + i).val();
            var formno = $("#txt_pformno" + i).val();
            var prid = $("#hdn_pprid" + i).val();
            if (component == component_pop && prid == 'Pr' && formno == formno_pop) {
                $("#txt_prawmaterial_1" + i).val(rawm1);
                $("#hdn_prawmaterialid_1" + i).val(rawmid1);
                $("#hdn_pmill" + i).val(mill);
                $("#hdn_ppaperkind" + i).val(paperkind);
                $("#hdn_pgsm" + i).val(gsm);
                $("#hdn_pplanheight" + i).val(grain);
                $("#hdn_pplanbreadth" + i).val(deckle);
                $("#hdn_pprintheight" + i).val(printgrain);
                $("#hdn_pprintbreadth" + i).val(printdeckle);
                $("#hdn_pcutfromfullsh" + i).val(cutsfullsh);
                $("#txt_pwastageper" + i).val(wastper);
                $("#txt_pimpressions" + i).val(impress);
                $("#hdn_ptotcutshreq" + i).val(totcutsh);
                $("#txt_pcutsheets" + i).val(totcutsh);
                $("#hdn_pcutshwithoutwstge" + i).val(cutshwithoutwstge);
                $("#hdn_pupsincutsh" + i).val(upsincutsh);
                $("#txt_pplansize" + i).val(grain + " x " + deckle);
                $("txt_pplansize" + i).val(printgrain + " x " + printdeckle);
            }
        }
        $('#myModalprocessboard').modal('toggle');
    }

    function setprocessboard() {

        var val = $("#hdn_lnprocessboard").val();
        var rawm1 = $("#txt_popdesc").val();
        var rawmid1 = $("#hdn_popdescid").val(); //hdn_popdescid
        var mill = $("#hdn_popmill").val();
        var paperkind = $("#hdn_poppaperkind").val();
        var gsm = $("#hdn_popgsm").val();

        var deckle = $("#txt_popdeckle").val();
        var grain = $("#txt_popgrain").val();

        var printdeckle = $("#txt_popprintdeckle").val();
        var printgrain = $("#txt_popprintgrain").val();

        var upsincutsh = $("#txt_popprintsizeups").val();
        var cutsfullsh = $("#txt_popcutsfullsheet").val();
        var wastper = $("#txt_popwastageper").val();
        var impress = $("#txt_popimpafterwstge").val();
        var totcutsh = $("#txt_poptotcutsheets").val();
        var cutshwithoutwstge = $("#txt_popcutshwithoutwstge").val();
        var component_pop = $("#lbl_popcomponent").text();
        var processdetailLen = $("#processdetail tr").length;
        for (var i = 1; i <= processdetailLen; i++) {
            var component = $("#txt_pcomponentname" + i).val();
            var prid = $("#hdn_pprid" + i).val();
            if (component == component_pop && prid == 'Pr') {
                $("#txt_prawmaterial_1" + i).val(rawm1);
                // $("#hdn_prawmaterialid_1" + i).val(rawmid1);
                $("input[type='hidden'][name='hdn_prawmaterialid_1[" + i + "\\]']").val(rawmid1);
                $("#hdn_pmill" + i).val(mill);
                $("#hdn_ppaperkind" + i).val(paperkind);
                $("#hdn_pgsm" + i).val(gsm);
                $("#hdn_pplanheight" + i).val(grain);
                $("#hdn_pplanbreadth" + i).val(deckle);
                $("#hdn_pprintheight" + i).val(printgrain);
                $("#hdn_pprintbreadth" + i).val(printdeckle);
                $("#hdn_pcutfromfullsh" + i).val(cutsfullsh);
                $("#txt_pwastageper" + i).val(wastper);
                $("#txt_pimpressions" + i).val(impress);
                $("#hdn_ptotcutshreq" + i).val(totcutsh);
                $("#txt_pcutsheets" + i).val(totcutsh);
                $("#hdn_pupsincutsh" + i).val(upsincutsh);
                $("#hdn_pcutshwithoutwstge" + i).val(cutshwithoutwstge);
                $("#txt_pplansize" + i).val(grain + " x " + deckle);
                $("txt_pplansize" + i).val(printgrain + " x " + printdeckle);
                $("#txt_pprintsize" + i).val(printdeckle + " x " + printgrain);
            }
        }

        $('#btn_processboard').click();
    }

    function showprocesspaperdesc() {
        $("#paperdescdatadiv").hide();
        var boardkind = $("#drp_popfilterboardkind").val();
        var gsm = $("#txt_popfiltergsm").val();
        var grain = $("#txt_popfiltergrain").val();
        var deckle = $("#txt_popfilterdeckle").val();
        if (boardkind != "0") {

            $.blockUI();
            $('#paperdescdatalist').html('');
            $.ajax({
                type: "POST",
                url: "<?php echo site_url() ?>Production/Jobcard_comm/paperdesclist",
                data: {boardkind: boardkind, gsm: gsm, grain: grain, deckle: deckle}
            }).done(function (data) {
                var data = jQuery.parseJSON(data);
                var i = 1;
                for (var i = 0; i < data.length; i++) {
                    $("#paperdescdatalist").append("<li class='wocpl' style='font-size:11px;'>\n\
                        <input type='hidden' id='hdn_poppdescitemid" + i + "' value='" + data[i].ItemID + "' name='hdn_poppdescitemid" + i + "'>\n\
                        <input type='hidden' id='hdn_poppdesclength" + i + "' value='" + data[i].length + "' name='hdn_poppdesclength" + i + "'>\n\
                        <input type='hidden' id='hdn_poppdescbreadth" + i + "' value='" + data[i].breadth + "' name='hdn_poppdescbreadth" + i + "'>\n\
                        <input type='hidden' id='hdn_poppdescthickness" + i + "' value='" + data[i].thickness + "' name='hdn_poppdescthickness" + i + "'>\n\
                        <input type='hidden' id='hdn_poppdescmill" + i + "' value='" + data[i].Manufacturer + "' name='hdn_poppdescmill" + i + "'>\n\
                        <input type='hidden' id='hdn_poppdescpaperkind" + i + "' value='" + data[i].Quality + "' name='hdn_poppdescpaperkind" + i + "'>\n\
                        <a style='color:black;' href='javascript:void()' id='a_poppdescname" + i + "' onclick='set_paperdescdata(" + i + ")'>" + data[i].Description + "</a>\n\
                    </li>");
                }

            });
        } else {
            alert("Select Board Kind");
        }
    }

    function set_paperdescdata(val) {
        $("#paperdescdatadiv").hide();
        var item = $("#a_poppdescname" + val).text();
        var itemid = $("#hdn_poppdescitemid" + val).val();
        var length = $("#hdn_poppdesclength" + val).val();
        var breadth = $("#hdn_poppdescbreadth" + val).val();
        var thickness = $("#hdn_poppdescthickness" + val).val();
        var mill = $("#hdn_poppdescmill" + val).val();
        var paperkind = $("#hdn_poppdescpaperkind" + val).val();
        $("#hdn_popdescid").val(itemid);
        $("#txt_popdesc").val(item);
        $("#txt_popdeckle").val(length);
        $("#txt_popgrain").val(breadth);
        $("#hdn_popgsm").val(thickness);
        $("#hdn_popmill").val(mill);
        $("#hdn_poppaperkind").val(paperkind);
    }

    function paperdesclist() {
        if ($("#paperdescdatadiv").is(":visible")) {
            $("#paperdescdatadiv").hide();
        } else {
            $("#paperdescdatadiv").show();
        }
    }

    function ink_pop(lnk) {
        CURRENT_ROW_OF_INK_TOKEN = lnk;
        $.ajax({
            url: "Jobcard_comm/get_ink_details",
            type: "POST",
            dataType: "JSON",
            data: {},
            beforeSend: function () {
                $.blockUI();
            },
            complete: function () {
                $.blockUI();
            },
            success: function (data) {
                var i = 1;
                for (var i = 0; i < data.length; i++) {
                    $("#tbody_popink").append("<tr>\n\
                        <td style='padding: 2px' width='10px'>\n\
                            <input class='checkboxInk' type='checkbox' id='chk_popInk" + i + "' name='chk_popInk[" + i + "]'></td>\n\
                        <td style='padding: 2px'>\n\
                            <input type='hidden' class='popinkItemID' id='hdn_popInkItemId" + i + "' name='hdn_popInkItemId" + i + "' value='" + data[i].ItemID + "'>\n\
                            <label class='custom' for='chk_popInk" + i + "'>" + data[i].Description + "</label></td>\n\
                    </tr>");
                }

                $('#myModalInk').modal('toggle');
            },
            error: function () {
            }
        });
    }

    function searchGroup() {
        var term = $("#txt_searchGroup").val();
        if (term != "")
        {
            $("#tbody_popink tr").hide();
            $("#tbody_popink tr").filter(function () {
                return $(this).text().toLowerCase().indexOf(term) > -1;
            }).show();
        } else
        {
            $("#tbody_popink tr").show();
        }
    }

    function searching(textbox, tbody) {
        var term = $("#" + textbox).val();
        if (term != "")
        {
            $("#" + tbody + " tr").hide();
            $("#" + tbody + " tr").filter(function () {
                return $(this).text().toLowerCase().indexOf(term) > -1;
            }).show();
        } else
        {
            $("#" + tbody + " tr").show();
        }
    }

    function ink_checkbox_limit() {
        var limit = 3;
        $('#tbody_popink input').on('change', function (evt) {
            if ($(this).siblings(':checked').length >= limit) {
                this.checked = false;
            }
        });

// $("input[type='checkbox'][name='chk_popInk[" + i + "]']").val();
//            $("input[type='checkbox'][name='chk_popInk[]']").change(function (e) {
//                if ($('input[type=checkbox]:checked').length > 3) {
//                    $(this).prop('checked', false)
//                    alert("allowed only 3");
//                }
//            });
    }

    function CreateIMR() {

        var imrnoArray = [];
        var imrqtyArray = [];
        var imrreqArray = [];
        var itemidArray = [];

        var icomp = $("#hdn_icompid").val();
        var docnotion = $("#hdn_dcnotionval").val();
        var docid = $("#txt_docidvaldata").val();


        var raw_tr_length = $('#tbl_rawmaterial tr').length;
        for (var i = 1; i <= raw_tr_length; i++) {


            var itemid = $("input[type='text'][name='txt_olditemid[" + i + "\\]']").val();

            var imrno = $("input[type='text'][name='txt_imrno[" + i + "\\]']").val();
            var imrqty = $("input[type='text'][name='txt_imrqty[" + i + "\\]']").val();
            var imrreq = $("input[type='checkbox'][name='txt_requestImr[" + i + "\\]']").is(':checked');
            if (imrreq == true) {
                imrreq = 1;
            } else {
                imrreq = 0;
            }

            itemidArray.push(itemid);
            imrnoArray.push(imrno);
            imrqtyArray.push(imrqty);
            imrreqArray.push(imrreq);
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
            url: '<?php echo site_url() ?>Production/Jobcard_comm/IMRcalculatevalComm',
            type: "POST",
            dataType: "JSON",
            data: {imrnoArray: imrnoArray, imrqtyArray: imrqtyArray, imrreqArray: imrreqArray, itemidArray: itemidArray, icomp: icomp, docnotion: docnotion, docid: docid},
            beforeSend: function () {

            },
            complete: function () {
                $.unblockUI();
            },
            success: function (data) {
                if (data[0].flag == 'True') {
                    alert("IMR Created ");
                }

            },
            error: function () {
            }
        });

    }

    function Rmcalculate() {
        var plateArray = [];
        var ComponentArray = [];
        var formNoArray = [];
        var plateNewArray = [];
        var plateOldArray = [];
        var ink1Array = [];
        var ink2Array = [];
        var ink3Array = [];
        var ink4Array = [];
        var ink5Array = [];

        var len = $("#tbodygeneral tr").length;
        var tt = 0;
        var qty;
        for (var i = 1; i <= len; i++) {
            var fqty = $("input[type='text'][name='txt_fqty[" + i + "\\]']").val();
            var JobQty = $("input[type='text'][name='txt_fqty[" + i + "\\]']").val();
            if (JobQty == '') {
                JobQty = 0;
            }
            qty = parseInt(fqty);
            tt = tt + qty;
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

        var ink_tr_length = $('#tbody_ink tr').length;
        for (var i = 1; i <= ink_tr_length; i++) {
            var plateId = $("select[name='drp_plate[" + i + "\\]']").val();
            var component = $("input[type='hidden'][name='hdn_Plcomponent[" + i + "\\]']").val();
            var formno = $("input[type='hidden'][name='hdn_Plformno[" + i + "\\]']").val();
            var plateNew = $("input[type='text'][name='txt_plateNew[" + i + "\\]']").val();
            var plateOld = $("input[type='text'][name='txt_plateOld[" + i + "\\]']").val();
            var ink1 = $("input[type='hidden'][name='hdn_inkItemID1[" + i + "\\]']").val();
            var ink2 = $("input[type='hidden'][name='hdn_inkItemID2[" + i + "\\]']").val();
            var ink3 = $("input[type='hidden'][name='hdn_inkItemID3[" + i + "\\]']").val();
            var ink4 = $("input[type='hidden'][name='hdn_inkItemID4[" + i + "\\]']").val();
            var ink5 = $("input[type='hidden'][name='hdn_inkItemID5[" + i + "\\]']").val();
            plateArray.push(plateId);
            ComponentArray.push(component);
            formNoArray.push(formno);
            plateNewArray.push(plateNew);
            plateOldArray.push(plateOld);
            ink1Array.push(ink1);
            ink2Array.push(ink2);
            ink3Array.push(ink3);
            ink4Array.push(ink4);
            ink5Array.push(ink5);
        }

        var boardIDArray = [];
        var grainArray = [];
        var deckleArray = [];
        var CutDeckleArray = [];
        var CutGrainArray = [];
        var CutSheetsArray = [];
        var UpsInCutSheetArray = [];
        var FullSheetsArray = [];
        var UpsInFullSheetArray = [];
        var CutsFromFullSheetArray = [];
        var ReqKgArray = [];
        var ReqPacketsArray = [];
        var CutFullArray = [];
        var BoardDivFactArray = [];
        var ComponentArray = [];
        var FormNoArray = [];
        var JobQtyArray = [];

        var rawmaterialidArray = [];
        var wasteperArray = [];

        var PridArray = [];
        var Var_ID_Info1Array = [];

        var process_tr_length = $('#processdetail tr').length;
        for (var i = 1; i <= process_tr_length; i++) {
            var Prid = $("input[type='hidden'][name='hdn_pprid[" + i + "\\]']").val();
            if (Prid == 'Pr') {
                var boardID = $("input[type='hidden'][name='hdn_prawmaterialid_1[" + i + "\\]']").val();
                var grain = $("input[type='hidden'][name='hdn_pplanheight[" + i + "\\]']").val();
                var deckle = $("input[type='hidden'][name='hdn_pplanbreadth[" + i + "\\]']").val();
                var CutDeckle = $("input[type='hidden'][name='hdn_pprintbreadth[" + i + "\\]']").val();
                var CutGrain = $("input[type='hidden'][name='hdn_pprintheight[" + i + "\\]']").val();
                var CutSheets = $("input[type='hidden'][name='hdn_ptotcutshreq[" + i + "\\]']").val();
                var UpsInCutSheet = $("input[type='hidden'][name='hdn_pupsincutsh[" + i + "\\]']").val();
                var FullSheets = $("input[type='hidden'][name='hdn_pTotFullSHRequired[" + i + "\\]']").val();
                var UpsInFullSheet = $("input[type='hidden'][name='hdn_pUpsInFullSheet[" + i + "\\]']").val();
                var CutsFromFullSheet = $("input[type='hidden'][name='hdn_pcutfromfullsh[" + i + "\\]']").val();
                var ReqKg = 0;
                var ReqPackets = 0;
                var CutFull = 'F';
                var BoardDivFact = '25.4';
                var Component = $("input[type='text'][name='txt_pcomponentname[" + i + "\\]']").val();
                var FormNo = $("input[type='text'][name='txt_pformno[" + i + "\\]']").val();


                var rawmaterialid = $("input[type='hidden'][name='hdn_prawmaterialid_1[" + i + "\\]']").val();
                var wasteper = $("input[type='text'][name='txt_pwastageper[" + i + "\\]']").val();


                var Var_ID_Info1 = $("input[type='hidden'][name='txt_pVar_ID_Info1[" + i + "\\]']").val();


                boardIDArray.push(boardID);
                grainArray.push(grain);
                deckleArray.push(deckle);
                CutDeckleArray.push(CutDeckle);
                CutGrainArray.push(CutGrain);
                CutSheetsArray.push(CutSheets);
                UpsInCutSheetArray.push(UpsInCutSheet);
                FullSheetsArray.push(FullSheets);
                UpsInFullSheetArray.push(UpsInFullSheet);
                CutsFromFullSheetArray.push(CutsFromFullSheet);
                ReqKgArray.push(ReqKg);
                ReqPacketsArray.push(ReqPackets);
                CutFullArray.push(CutFull);
                BoardDivFactArray.push(BoardDivFact);
                ComponentArray.push(Component);
                FormNoArray.push(FormNo);
                JobQtyArray.push(JobQty);

                rawmaterialidArray.push(rawmaterialid);
                wasteperArray.push(wasteper);

                PridArray.push(Prid);
                Var_ID_Info1Array.push(Var_ID_Info1);
            }
        }

        $.ajax({
            url: '<?php echo site_url() ?>Production/Jobcard_comm/RMCcalculatevalComm',
            type: "POST",
            dataType: "JSON",
            data: {plateArray: plateArray, ink1Array: ink1Array, ink2Array: ink2Array,
                ink3Array: ink3Array, ink4Array: ink4Array, ink5Array: ink5Array,
                plateNewArray: plateNewArray, plateOldArray: plateOldArray,
                ComponentArray: ComponentArray, formNoArray: formNoArray, wasteTotal: tt,
                boardIDArray: boardIDArray, grainArray: grainArray, deckleArray: deckleArray, CutDeckleArray: CutDeckleArray,
                CutGrainArray: CutGrainArray, CutSheetsArray: CutSheetsArray, UpsInCutSheetArray: UpsInCutSheetArray,
                FullSheetsArray: FullSheetsArray, UpsInFullSheetArray: UpsInFullSheetArray, CutsFromFullSheetArray: CutsFromFullSheetArray,
                ReqKgArray: ReqKgArray, ReqPacketsArray: ReqPacketsArray, CutFullArray: CutFullArray, BoardDivFactArray: BoardDivFactArray,
                ComponentArray:ComponentArray, FormNoArray: FormNoArray, JobQtyArray: JobQtyArray, rawmaterialidArray: rawmaterialidArray,
                wasteperArray: wasteperArray, PridArray: PridArray, Var_ID_Info1Array: Var_ID_Info1Array},
            beforeSend: function () {

            },
            complete: function () {
                $.unblockUI();
            },
            success: function (data) {
                $("#tbl_rawmaterial").html('');
                var j = 1;
                for (var i = 0; i < data.length; i++) {
                    $("#tbl_rawmaterial").append("<tr>\n\
                        <td class='rawdetailstyle' style='background-color: #ffdead'>\n\
                        <input type='text' name='txt_rawmaterial[" + j + "]' id='txt_rawmaterial[" + j + "]' value='" + data[i].ItemName + "'>\n\
                        </td>\n\
                        <td hidden><input type='text' name='txt_Details[" + j + "]' id='txt_Details[" + j + "]'></td>\n\
                            <td><input type='text' name='txt_apprx[" + j + "]' id='txt_apprx[" + j + "]' value='" + data[i].ReqQty + "'></td>\n\
                            <td><input type='text' name='txt_otherdetail[" + j + "]' id='txt_otherdetail[" + j + "]' value='" + data[i].OtherDetail + "'></td>\n\
                            <td><input type='text' name='txt_unit[" + j + "]' id='txt_unit[" + j + "]' value='" + data[i].ReqUnit + "'></td>\n\
                            <td><input type='checkbox' name='txt_requestocc[" + j + "]' id='txt_requestocc[" + j + "]'></td>\n\
                            <td><input type='hidden' name='txt_materialsta[" + j + "]' id='txt_materialsta[" + j + "]'>\n\
                                <input type='text' name='txt_materialsta_desc' id='txt_materialsta_desc'></td>\n\
                            <td><input type='text' name='txt_qtyall[" + j + "]' id='txt_qtyall[" + j + "]' value='0'></td>\n\
                            <td hidden><input type='text' name='txt_imr[" + j + "]' id='txt_imr[" + j + "]'></td>\n\
                            <td hidden><input type='text' name='txt_olditemid[" + j + "]' id='txt_olditemid[" + j + "]' value='" + data[i].ItemID + "'></td>\n\
                            <td hidden><input type='text' name='txt_oldmatrial[" + j + "]' id='txt_oldmatrial[" + j + "]'></td>\n\
                            <td hidden><input type='text' name='txt_recordid[" + j + "]' id='txt_recordid[" + j + "]'></td>\n\
                            <td hidden><input type='text' name='txt_allcatidid[" + j + "]' id='txt_allcatidid[" + j + "]'></td>\n\
                            <td><input type='text' name='txt_allocatmater[" + j + "]' id='txt_allocatmater[" + j + "]' value='0'></td>\n\
                            <td hidden><input type='text' name='txt_Prid[" + j + "]' id='txt_Prid[" + j + "]'></td>\n\
                            <td hidden><input type='text' name='txt_processta[" + j + "]' id='txt_processta[" + j + "]'></td>\n\
                            <td hidden><input type='text' name='txt_Jobno[" + j + "]' id='txt_Jobno[" + j + "]'></td>\n\
                            <td hidden><input type='text' name='txt_codeno[" + j + "]' id='txt_codeno[" + j + "]'></td>\n\
                            <td hidden><input type='text' name='txt_gname[" + j + "]' id='txt_gname[" + j + "]'></td>\n\
                            <td hidden><input type='text' name='txt_' id='txt_'></td>\n\
                            <td hidden><input type='text' name='txt_' id='txt_'></td>\n\
                            <td hidden><input type='text' name='txt_' id='txt_'></td>\n\
                            <td hidden><input type='text' name='txt_' id='txt_'></td>\n\
                            <td hidden><input type='text' name='txt_' id='txt_'></td>\n\
                            <td hidden><input type='text' name='txt_' id='txt_'></td>\n\
                            <td hidden><input type='text' name='txt_' id='txt_'></td>\n\
                            <td hidden><input type='text' name='txt_' id='txt_'></td>\n\
                                                            <td><input type='text' name='txt_imrno[" + j + "]' id='txt_imrno[" + j + "]' ></td>\n\
                                                            <td><input type='text' name='txt_imrqty[" + j + "]' id='txt_imrqty[" + j + "]'  value='" + data[i].ReqQty + "'></td>\n\
                                                            <td><input type='checkbox' name='txt_requestImr[" + j + "]' id='txt_requestImr[" + j + "]'></td>\n\
                        </tr>");
                    j++;
                }
            },
            error: function () {
            }
        });
    }

    function outsource() {
        var gridLength = $("#processdetail tr").length;
        var vendorHtml = "";
        $.ajax({
            url: "Jobcard_comm/get_vendor_details",
            type: "POST",
            dataType: "JSON",
            data: {},
            beforeSend: function () {
                $("#tbody_popUpOutSource").html('');
                $.blockUI();
            },
            complete: function () {
                $('#myModalOS').modal('toggle');
                $.blockUI();
            },
            success: function (data) {
                var j = 1;
                for (var j = 0; j < data.length; j++) {
                    vendorHtml += "<option value='" + data[j].CompanyId + "'>" + data[j].CompanyName + "</option>";

                }
                var hardcord = 1;
                var osvendorpalteid = $("input[type='hidden'][name='hdn_PlOsVendor[" + hardcord + "\\]']").val();
                $("#drp_osVendorPlate").append(vendorHtml);
                $("#drp_osVendorPlate").val(osvendorpalteid);
                for (var i = 1; i <= gridLength; i++) {
                    var componentName = $("#txt_pcomponentname" + i).val();
                    var formNo = $("#txt_pformno" + i).val();
                    var plateNo = $("#txt_pplateno" + i).val();
                    var autoId = $("#hdn_pAutoId_PK" + i).val();
                    var processName = $("#txt_pprocessname" + i).text();
                    var posvendorid = $("#hdn_pvendorId" + i).val();
                    $("#tbody_popUpOutSource").append("<tr>\n\
                        <td>\n\
                        <input type='hidden' class='hdn_osAutoId' name='hdn_popOsAutoId" + i + "' value='" + autoId + "'>\n\
                        <input class='chk_osVendor' type='checkbox' value=" + i + " id='chk_vendor" + i + "' name='chk_vendor[" + i + "]'></td>\n\
                        <td><label class='custom' for='chk_vendor" + i + "'>" + componentName + "</label></td>\n\
                        <td><label class='custom' for='chk_vendor" + i + "'>" + formNo + "</label></td>\n\
                        <td><label class='custom' for='chk_vendor" + i + "'>" + plateNo + "</label></td>\n\
                        <td>\n\
                            <label class='customProcess' style='font-weight: normal; font-size: 12px;' id='lbl_popOsProcessName" + i + "' for='chk_vendor" + i + "'>" + processName + "</label><br>\n\
                            <a onclick='return check_all_vendor(" + i + ")' style='font-size: 10px;'>Apply to all</a>\n\
                        </td>\n\
                        <td>\n\
                          <select id='drp_popOsVendor" + i + "' class='drp_osVendor' onchange = 'tick_chk_ondrp_vendor(" + i + ");'>\n\
                            <option value=''>--Select--</option>\n\
                          </select></td>\n\
                   </tr>");
                    $("#drp_popOsVendor" + i + "").append(vendorHtml);
                    $("#drp_popOsVendor" + i + "").val(posvendorid);

                    if ($("#drp_popOsVendor" + i + "").val() !== "") {
                        $("#chk_vendor" + i + "").prop('checked', true);
                    }
                }

            },
            error: function () {
            }
        });
    }

    function outsource_button() {
        $("#tbody_popUpOutSource tr").each(function () {
            if ($(this).find(".chk_osVendor").is(':checked') == true) {
                var vendorId = $(this).find(".drp_osVendor").val();
                if (vendorId !== 'xxxxx') {
                    var lnk = $(this).find(".chk_osVendor").val();
                    $("#hdn_pvendorId" + lnk).val(vendorId);
                    $("#drp_pexecution" + lnk).val(3);
                }
            }
        });
        var ink_tr_length = $('#tbody_ink tr').length;
        var vendorID = $("#drp_osVendorPlate").val();
        for (var i = 1; i <= ink_tr_length; i++) {
            $("input[type='hidden'][name='hdn_PlOsVendor[" + i + "\\]']").val(vendorID);
        }
        $('#myModalOS').modal('toggle');
    }

    function check_all_vendor(lnk) {
        var vendorVal = $("#drp_popOsVendor" + lnk).val();
        var selectedProcess = $("#lbl_popOsProcessName" + lnk).text();
        $("#tbody_popUpOutSource tr").each(function () {
            var processName = $(this).find(".customProcess").text();
            if (selectedProcess == processName) {
                $(this).find(".drp_osVendor").val(vendorVal);
            }
        });
    }

    function tick_chk_ondrp_vendor(lnk) {
        if ($("#drp_popOsVendor" + lnk).val() !== "") {

            $("#chk_vendor" + lnk).prop('checked', true);
        }

    }

    function check_all_chk_vendor() {
        if ($("#chk_check_allchkvendor").is(':checked') == true) {

            $(".chk_osVendor").prop('checked', true);
        } else {
            $(".chk_osVendor").prop('checked', false);

        }
    }

    function opentimesec(lnk) {
        $("#hdn_current_row_of_time").val(lnk);

        var mrtime = $("#txt_pmrtime" + lnk).val();
        var prtime = $("#txt_pprocesstime" + lnk).val();

        $("#txt_popTDMakeReady").val(mrtime);
        $("#txt_popTDProcessTime").val(prtime);

        $('#myModalTimeDetail').modal('toggle');
    }

    function time_detail() {
        var make_ready_time = $("#txt_popTDMakeReady").val();
        var process_time = $("#txt_popTDProcessTime").val();
        $.ajax({
            url: "Jobcard_comm/time_to_sec",
            type: "POST",
            dataType: "JSON",
            data: {make_ready_time: make_ready_time, process_time: process_time},
            beforeSend: function () {
                $.blockUI();
            },
            complete: function () {
                $('#myModalTimeDetail').modal('toggle');
                $.blockUI();
            },
            success: function (data) {
                var row = $("#hdn_current_row_of_time").val();
                $("input[type='hidden'][name='hdn_pmrtimesec[" + row + "\\]']").val(data.mk_sec);
                $("input[type='text'][name='txt_pmrtime[" + row + "\\]']").val(data.mk_time);
                $("input[type='hidden'][name='hdn_pprocesstimesec[" + row + "\\]']").val(data.process_sec);
                $("input[type='text'][name='txt_pprocesstime[" + row + "\\]']").val(data.p_time);
                $("input[type='hidden'][name='hdn_ptotaltimesec[" + row + "\\]']").val(data.total_sec);
                $("input[type='text'][name='txt_ptotaltime[" + row + "\\]']").val(data.total_time);
            },
            error: function () {
            }
        });
    }

    function add_additionalmtrl() {
        $.ajax({
            url: "Jobcard_comm/additionalmtrl_grouplist",
            type: "POST",
            dataType: "JSON",
            data: {},
            beforeSend: function () {
                $.blockUI();
            },
            complete: function () {
                $('#myModaladditionalmtrl').modal('toggle');
                $.unblockUI();
            },
            success: function (data) {
                //alert(data);
                $("#drp_popam_groups").html("");
                $("#tbody_popadditmtrl").html("");
                $("#drp_popam_groups").append("<option value=''>---Select Group---</option>");
                var j = 1;
                for (var j = 0; j < data.length; j++) {
                    $("#drp_popam_groups").append("<option value='" + data[j].GroupID + "'>" + data[j].GroupName + "</option>");
                }
            },
            error: function (data) {
                alert(data.responseText);
            }
        });

    }

    function showadditionalmtrl_items() {
        var groupid = $("#drp_popam_groups").val();
        if (groupid !== "") {

            $.ajax({
                url: "Jobcard_comm/additionalmtrl_itemlist",
                type: "POST",
                dataType: "JSON",
                data: {groupid: groupid},
                beforeSend: function () {
                    $.blockUI();
                },
                complete: function () {
                    $.unblockUI();
                },
                success: function (data) {
                    //alert(data);
                    $("#tbody_popadditmtrl").html("");
                    var j = 1;
                    for (var j = 0; j < data.length; j++) {
                        $("#tbody_popadditmtrl").append("<tr onclick='set_additionalmtrl_product(" + j + ");' style ='font-size: 11px; border:1px solid #212121;' cursor:pointer;><td>\n\
                            <input type='hidden' name='hdn_popam_itemid' id='hdn_popam_itemid" + j + "' value='" + data[j].ItemID + "'>\n\
                            <input type='hidden' name='hdn_popam_itemname' id='hdn_popam_itemname" + j + "' value='" + data[j].Description + "'>\n\
                            " + data[j].Description + "\n\
                        </td></tr>");
                    }
                },
                error: function (data) {
                    alert(data.responseText);
                }
            });

        }
    }

    function set_additionalmtrl_product(lnk) {
        var itemid = $("#hdn_popam_itemid" + lnk).val();
        var itemname = $("#hdn_popam_itemname" + lnk).val();
        var leng = $("#tbody_additionalmtrl").length;
        var b = leng + 1;

        $("#tbody_additionalmtrl").append("<tr>\n\
            <td><input type='text' name='txt_am_rmname[" + b + "]' id='txt_am_rmname" + b + "' style='width:100%;' readonly value='" + itemname + "'>\n\
                <input type='hidden' name='txt_am_rmid[" + b + "]' id='txt_am_rmid" + b + "' value='" + itemid + "'></td>\n\
            <td><input type='text' name='txt_am_qty[" + b + "]' id='txt_am_qty" + b + "' style='width:50%;'></td>\n\
        </tr>");

        $('#myModaladditionalmtrl').modal('toggle');
    }

    function addrows(lnk) {
        $("#hdn_btnval").val(lnk);

        $("#mjcp_turntype").val("");
        $("#mjcp_printtype").val("");
        $("#mjcp_fcolor").val("");
        $("#mjcp_bcolor").val("");
        $("#mjcp_printsizegrain").val("0");
        $("#mjcp_printsizedeckle").val("0");
        $("#mjcp_printsizeups").val("0");
        $("#mjcp_cutsheetwithoutwstge").val("0");

        $("#myModalmjc_color").modal("toggle");

    }

    function manualjc() {

        var val = $("#hdn_btnval").val();

        $("td[onclick='return bindgrid(1)']").prop('onclick', null).off('click');

        var mjcp_turntype = $("#mjcp_turntype").val();
        var mjcp_printtype = $("#mjcp_printtype").val();
        var mjcp_fcolor = $("#mjcp_fcolor").val();
        var mjcp_bcolor = $("#mjcp_bcolor").val();
        var mjcp_printsizegrain = $("#mjcp_printsizegrain").val();
        var mjcp_printsizedeckle = $("#mjcp_printsizedeckle").val();
        var mjcp_printsizeups = $("#mjcp_printsizeups").val();
        var mjcp_cutsheetwithoutwstge = $("#mjcp_cutsheetwithoutwstge").val();

        var processdrp = "";
        $.ajax({
            url: "Jobcard_comm/manualjc_processdrp",
            async: false,
            type: "POST",
            dataType: "JSON",
            data: {},
            beforeSend: function () {
                $.blockUI();
            },
            complete: function () {
                $.unblockUI();
            },
            success: function (data) {
                var j = 1;
                for (var j = 0; j < data.length; j++) {
                    if (data[j].PrID == "Pr") {
                        processdrp += "<option selected value='" + data[j].PrID + "|" + data[j].BasePrUniqueID + "'>" + data[j].PrName + "</option>";
                    } else {
                        processdrp += "<option value='" + data[j].PrID + "|" + data[j].BasePrUniqueID + "'>" + data[j].PrName + "</option>";
                    }
                }

            },
            error: function (data) {
                alert(data.responseText);
            }
        });

        if (val == 1) {
            var btnval = 1;
            var backcolor = "background-color: #AEE14A;";
            var formn = 1;
            var fb = "SB";
        } else if (val == 2) {
            var btnval = 2;
            var backcolor = "background-color: #f2f7a4;";
            var formn = 2;
            var fb = "F/B";
        } else {
            var btnval = 1;
            var backcolor = "background-color: #d6b794;";
            var formn = 0;
            var fb = "SS";
        }

        for (var i = 1; i <= btnval; i++) {
            var tbllen = $('#processdetail tr').length;
            var k = tbllen + 1;

            $('#processdetail').append("<tr>\n\
                <td style='" + backcolor + "'>\n\
                    <input type='checkbox' name='chk_delte[" + k + "]' id='chk_delte[" + k + "]' checked></td>\n\
                <td style='" + backcolor + "'>\n\
                    <input type='hidden' name='hdn_pAutoId_PK[" + k + "]' id='hdn_pAutoId_PK" + k + "' value=''>\n\
                    <input type='hidden' name='hdn_pvendorId[" + k + "]' id='hdn_pvendorId" + k + "' value=''>\n\
                    <input type='hidden' name='hdn_pDocId[" + k + "]' id='hdn_pDocId" + k + "' value=''>\n\
                    <input type='hidden' name='hdn_pSeqNo[" + k + "]' id='hdn_pSeqNo" + k + "' value=''>\n\
                    <input type='hidden' name='hdn_pint_Info1[" + k + "]' id='hdn_pint_Info1" + k + "' value=''>\n\
                    <input type='hidden' name='hdn_pint_Info2[" + k + "]' id='hdn_pint_Info2" + k + "' value=''>\n\
                    <input type='hidden' name='hdn_pint_Info3[" + k + "]' id='hdn_pint_Info3" + k + "' value=''>\n\
                    <input type='hidden' name='hdn_pint_Info4[" + k + "]' id='hdn_pint_Info4" + k + "' value=''>\n\
                    <input type='hidden' name='hdn_pDob_Info1[" + k + "]' id='hdn_pDob_Info1" + k + "' value=''>\n\
                    <input type='hidden' name='hdn_pDob_Info2[" + k + "]' id='hdn_pDob_Info2" + k + "' value=''>\n\
                    <input type='hidden' name='hdn_pDob_Info3[" + k + "]' id='hdn_pDob_Info3" + k + "' value=''>\n\
                    <input type='hidden' name='hdn_pDob_Info4[" + k + "]' id='hdn_pDob_Info4" + k + "' value=''>\n\
                    <input type='hidden' name='hdn_pDob_Info5[" + k + "]' id='hdn_pDob_Info5" + k + "' value=''>\n\
                    <input type='hidden' name='hdn_pDob_Info6[" + k + "]' id='hdn_pDob_Info6" + k + "' value=''>\n\
                    <input type='hidden' name='hdn_pDob_Info7[" + k + "]' id='hdn_pDob_Info7" + k + "' value=''>\n\
                    <input type='hidden' name='hdn_pDob_Info8[" + k + "]' id='hdn_pDob_Info8" + k + "' value=''>\n\
                    <input type='hidden' name='hdn_pDob_Info9[" + k + "]' id='hdn_pDob_Info9" + k + "' value=''>\n\
                    <input type='hidden' name='hdn_pVar_Info3[" + k + "]' id='hdn_pVar_Info3" + k + "' value=''>\n\
                    <input type='hidden' name='hdn_pVar_Info4[" + k + "]' id='hdn_pVar_Info4" + k + "' value=''>\n\
                    <input type='hidden' name='hdn_pVar_ID_Info3[" + k + "]' id='hdn_pVar_ID_Info3" + k + "' value='' >\n\
                    <input type='hidden' name='hdn_pVar_ID_Info4[" + k + "]' id='hdn_pVar_ID_Info4" + k + "' value='' >\n\
                    <input type='hidden' name='hdn_pRawMaterial_2[" + k + "]' id='hdn_pRawMaterial_2" + k + "' value='' >\n\
                    <input type='hidden' name='hdn_pRawMaterial_3[" + k + "]' id='hdn_pRawMaterial_3" + k + "' value='' >\n\
                    <input type='hidden' name='hdn_pRawMaterial_4[" + k + "]' id='hdn_pRawMaterial_4" + k + "' value='' >\n\
                    <input type='hidden' name='hdn_pRawMaterialID_2[" + k + "]' id='hdn_pRawMaterialID_2" + k + "' value='' >\n\
                    <input type='hidden' name='hdn_pRawMaterialID_3[" + k + "]' id='hdn_pRawMaterialID_3" + k + "' value='' >\n\
                    <input type='hidden' name='hdn_pRawMaterialID_4[" + k + "]' id='hdn_pRawMaterialID_4" + k + "' value='' >\n\
                    <input type='hidden' name='hdn_pBasePrUniqueID[" + k + "]' id='hdn_pBasePrUniqueID" + k + "' value='' >\n\
                    <input type='hidden' name='hdn_pPrUniqueNo[" + k + "]' id='hdn_pPrUniqueNo" + k + "' value='' >\n\
                    <input type='hidden' name='hdn_pintricacy[" + k + "]' id='hdn_pintricacy" + k + "' value='1' >\n\
                    <input type='hidden' name='hdn_pInputUOM[" + k + "]' id='hdn_pInputUOM" + k + "' value='' >\n\
                    <input type='hidden' name='hdn_pOutPutUOM[" + k + "]' id='hdn_pOutPutUOM" + k + "' value='' >\n\
                    <input type='hidden' name='hdn_pFullBoardNo[" + k + "]' id='hdn_pFullBoardNo" + k + "' value='' >\n\
                    <input type='hidden' name='hdn_pCutDimNo[" + k + "]' id='hdn_pCutDimNo" + k + "' value='' >\n\
                    <input type='hidden' name='hdn_pPrQty[" + k + "]' id='hdn_pPrQty" + k + "' value='' >\n\
                    <input type='hidden' name='hdn_pPlanUniqueID[" + k + "]' id='hdn_pPlanUniqueID" + k + "' value='' >\n\
                    <input type='hidden' name='hdn_pupsincutsh[" + k + "]' id='hdn_pupsincutsh" + k + "' value='" + mjcp_printsizeups + "'>\n\
                    <input type='hidden' name='hdn_pcutfromfullsh[" + k + "]' id='hdn_pcutfromfullsh" + k + "' value=''>\n\
                    <input type='hidden' name='hdn_pcutshwithoutwstge[" + k + "]' id='hdn_pcutshwithoutwstge" + k + "' value='" + mjcp_cutsheetwithoutwstge + "'>\n\
                    <input type='hidden' name='hdn_pUpsInFullSheet[" + k + "]' id='hdn_pUpsInFullSheet" + k + "' value=''>\n\
                    <input type='hidden' name='hdn_pImpression_WithoutWastage[" + k + "]' id='hdn_pImpression_WithoutWastage" + k + "' value=''>\n\
                    <input type='hidden' name='hdn_pTotFullSHRequired[" + k + "]' id='hdn_pTotFullSHRequired" + k + "' value=''>\n\
                    <input type='hidden' name='hdn_pFullSH_WithoutWastage[" + k + "]' id='hdn_pFullSH_WithoutWastage" + k + "' value=''>\n\
                    <input type='hidden' name='hdn_ppapermulfact[" + k + "]' id='hdn_ppapermulfact" + k + "' value=''>\n\
                    <input type='hidden' name='hdn_pBoardDivFact[" + k + "]' id='hdn_pBoardDivFact" + k + "' value=''>\n\
                    <input type='hidden' name='hdn_pCutBoardDim[" + k + "]' id='hdn_pCutBoardDim" + k + "' value=''>\n\
                    <input type='hidden' name='hdn_pProcessStatus[" + k + "]' id='hdn_pProcessStatus" + k + "' value=''>\n\
                    <input type='text' name='txt_pcomponentname[" + k + "]' id='txt_pcomponentname" + k + "' value='' style='" + backcolor + "' title='Write Component Name.'></td>\n\
                <td>\n\
                    <input type='text' name='txt_pformno[" + k + "]' id='txt_pformno" + k + "' value='' readonly></td>\n\
                <td>\n\
                    <input type='text' name='txt_pplateno[" + k + "]' id='txt_pplateno" + k + "' value='' readonly></td>\n\
                <td>\n\
                    <input type='hidden' name='hdn_pprid[" + k + "]' id='hdn_pprid" + k + "' value=''>\n\
                    <select name='txt_pprocessname[" + k + "]' id='txt_pprocessname" + k + "' onchange='return mjc_processchange(" + k + ");'>\n\
                        <option>---Select Process---</option>\n\
                    </select></td>\n\
                <td>\n\
                    <select name='txt_pfb[" + k + "]' id='txt_pfb" + k + "'>\n\
                        <option value='0'>---Select F/B---</option>\n\
                        <option value='F'>Front</option>\n\
                        <option value='B'>Back</option>\n\
                        <option value='SS'>Single-Side</option>\n\
                        <option value='SB'>Self-Back</option>\n\
                    </select></td>\n\
                <td onclick='processboard(" + k + ");'>\n\
                    <input type='hidden' name='hdn_prawmaterialid_1[" + k + "]' id='hdn_prawmaterialid_1" + k + "' value=''>\n\
                    <input type='hidden' name='hdn_pmill[" + k + "]' id='hdn_pmill" + k + "' value=''>\n\
                    <input type='hidden' name='hdn_ppaperkind[" + k + "]' id='hdn_ppaperkind" + k + "' value=''>\n\
                    <input type='hidden' name='hdn_pgsm[" + k + "]' id='hdn_pgsm" + k + "' value=''>\n\
                    <input type='text' name='txt_prawmaterial_1[" + k + "]' id='txt_prawmaterial_1" + k + "' value='' readonly></td>\n\
                <td>\n\
                    <input type='hidden' name='txt_pVar_ID_Info1[" + k + "]' id='txt_pVar_ID_Info1" + k + "' value='' >\n\
                    <input type='text' name='txt_pVar_Info1[" + k + "]' id='txt_pVar_Info1" + k + "' value='' readonly></td>\n\
                <td>\n\
                    <input type='hidden' name='txt_pVar_ID_Info2[" + k + "]' id='txt_pVar_ID_Info2" + k + "' value='' >\n\
                    <input type='text' name='txt_pVar_Info2[" + k + "]' id='txt_pVar_Info2" + k + "' value='' readonly></td>\n\
                <td>\n\
                    <input type='hidden' name='hdn_pplanheight[" + k + "]' id='hdn_pplanheight" + k + "' value=''>\n\
                    <input type='hidden' name='hdn_pplanbreadth[" + k + "]' id='hdn_pplanbreadth" + k + "' value=''>\n\
                    <input type='text' name='txt_pplansize[" + k + "]' id='txt_pplansize" + k + "' value='' readonly></td>\n\
                <td>\n\
                    <input type='hidden' name='hdn_pprintheight[" + k + "]' id='hdn_pprintheight" + k + "' value='" + mjcp_printsizegrain + "'>\n\
                    <input type='hidden' name='hdn_pprintbreadth[" + k + "]' id='hdn_pprintbreadth" + k + "' value='" + mjcp_printsizedeckle + "'>\n\
                    <input type='text' name='txt_pprintsize[" + k + "]' id='txt_pprintsize" + k + "' value='" + mjcp_printsizegrain + " X " + mjcp_printsizedeckle + "' readonly></td>\n\
                <td>\n\
                    <input type='text' name='txt_prepeat[" + k + "]' id='txt_prepeat" + k + "' value=''></td>\n\
                <td>\n\
                    <input type='hidden' name='hdn_ptotcutshreq[" + k + "]' id='hdn_ptotcutshreq" + k + "' value=''>\n\
                    <input type='text' name='txt_pcutsheets[" + k + "]' id='txt_pcutsheets" + k + "' value='' readonly></td>\n\
                </td>\n\
                <td>\n\
                    <input type='text' name='txt_pwastageper[" + k + "]' id='txt_pwastageper" + k + "' value='' readonly></td>\n\
                <td>\n\
                    <input type='text' name='txt_pimpressions[" + k + "]' id='txt_pimpressions" + k + "' value='' readonly></td>\n\
                <td ondblclick='return showmachien(" + k + ");'>\n\
                    <input type='hidden' name='hdn_pmachineid[" + k + "]' id='hdn_pmachineid" + k + "' value=''>\n\
                    <input type='hidden' name='hdn_pmachineno[" + k + "]' id='hdn_pmachineno" + k + "' value=''>\n\
                    <input type='text' name='txt_pmachinename[" + k + "]' id='txt_pmachinename" + k + "' value='' readonly></td>\n\
                <td>\n\
                    <input type='text' name='txt_premarks[" + k + "]' id='txt_premarks" + k + "' value=''></td>\n\
                <td></td>\n\
                <td onclick='return opentimesec(" + k + ");'>\n\
                    <input type='hidden' name='hdn_pmrtimesec[" + k + "]' id='hdn_pmrtimesec" + k + "' value='0'>\n\
                    <input type='text' name='txt_pmrtime[" + k + "]' id='txt_pmrtime" + k + "' value='00:00:00' oninput ='return caloninput1(" + k + ");' onchange='return calcutime1(this)'></td>\n\
                <td onclick='return opentimesec(" + k + ");'>\n\
                    <input type='hidden' name='hdn_pprocesstimesec[" + k + "]' id='hdn_pprocesstimesec" + k + "' value='0'>\n\
                    <input type='text' name='txt_pprocesstime[" + k + "]' id='txt_pprocesstime" + k + "' value='00:00:00' oninput ='return caloninput2(" + k + ");' onchange='return calcutime2(this)'></td>\n\
                <td>\n\
                    <input type='hidden' name='hdn_ptotaltimesec[" + k + "]' id='hdn_ptotaltimesec" + k + "' value='0'>\n\
                    <input type='text' name='txt_ptotaltime[" + k + "]' id='txt_ptotaltime" + k + "' value='00:00:00' readonly></td>\n\
                <td>\n\
                    <select style='font-size: 10px; width: 98%;padding: 0px; border: 0px;' id='drp_pexecution" + k + "' name='drp_pexecution[" + k + "]'>\n\
                        <option value='0'>----Select----</option>\n\
                        <option value='1' selected>In House</option>\n\
                        <option value='2'>Online</option>\n\
                        <option value='3'>OutSource</option>\n\
                    </select></td>\n\
                <td>\n\
                    <select style='font-size: 10px; width: 98%;padding: 0px; border: 0px;' id='drp_ppass" + k + "' name='drp_ppass[" + k + "]'>\n\
                        <option value='1'>First Pass</option>\n\
                        <option value='2'>Second Pass</option>\n\
                        <option value='3'>Third Pass</option>\n\
                        <option value='4'>Fourth Pass</option>\n\
                    </select></td>\n\
            </tr>");

            var platenoval = $("#txt_pplateno" + tbllen).val();
            if (platenoval == "" || platenoval == undefined || platenoval == 0) {
                $("#txt_pplateno" + k).val('1');
            } else {
                var pno = parseInt(platenoval) + 1;
                $("#txt_pplateno" + k).val(pno);
            }

            if (formn == 1 || formn == 0) {
                var formnoval = $("#txt_pformno" + tbllen).val();
                if (formnoval == "" || formnoval == undefined || formnoval == 0) {
                    $("#txt_pformno" + k).val('1');
                } else {
                    var fno = parseInt(formnoval) + 1;
                    $("#txt_pformno" + k).val(fno);
                }
            }

            $("#txt_pprocessname" + k + "").append(processdrp);

            var data = $("#txt_pprocessname" + k).val();
            var datarr = data.split("|");
            $("#hdn_pprid" + k).val(datarr[0]);
            $("#hdn_pBasePrUniqueID" + k).val(datarr[1]);

            if (fb == "SB") {
                $("#txt_pfb" + k).val("SB");

            } else if (fb == "SS") {
                $("#txt_pfb" + k).val("SS");

            }

        }
        if (formn == 2) {
            var tbllen = $('#processdetail tr').length;
            var noo = parseInt(tbllen) - 2;
            var formnoval = $("#txt_pformno" + noo).val();
            //alert(formnoval);
            if (formnoval == "" || formnoval == undefined || formnoval == 0) {
                $("#txt_pformno1").val('1');
                $("#txt_pformno2").val('1');
                $("#txt_pfb1").val("F");
                $("#txt_pfb2").val("B");

            } else {
                var fno = parseInt(formnoval) + 1;
                $("#txt_pformno" + tbllen).val(fno);
                $("#txt_pfb" + tbllen).val("B");
                var no = parseInt(tbllen) - 1;
                $("#txt_pformno" + no).val(fno);
                $("#txt_pfb" + no).val("F");
            }
        }

        $("#myModalmjc_color").modal("toggle");
    }

    function mjc_processchange(lnk) {
        var data = $("#txt_pprocessname" + lnk).val();

        if (data !== "") {
            var datarr = data.split("|");
            $("#hdn_pprid" + lnk).val(datarr[0]);
            $("#hdn_pBasePrUniqueID" + lnk).val(datarr[1]);
        }

        var select = "<option value='0'>---Select F/B---</option>";
        var empty = "<option value='0'></option>";
        var F = "<option value='F'>Front</option>";
        var B = "<option value='B'>Back</option>";
        var SS = "<option value='SS'>Single-Side</option>";
        var SB = "<option value='SB'>Self-Back</option>";

        var prid = $("#hdn_pprid" + lnk).val();
        if (prid == "Pr") { //Printing
            $("#txt_pfb" + lnk).html("");
            $("#txt_pfb" + lnk).append(F + B + SS + SB);

        } else if (prid == "138") { //Indexing
            $("#txt_pfb" + lnk).html("");
            $("#txt_pfb" + lnk).append(empty);

        } else if (prid == "EM") {  //Embossing
            $("#txt_pfb" + lnk).html("");
            $("#txt_pfb" + lnk).append(empty);

        } else if (prid == "FC") {  //Coating
            $("#txt_pfb" + lnk).html("");
            $("#txt_pfb" + lnk).append(F + B);

        }
    }

</script>

<div class="content-wrapper"> <!--  oncontextmenu="return false;"> -->
    <section class="content-header">
        <h1><?php echo $title; ?></h1>
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
                    <?php echo form_open('Production/Jobcard_comm/savedata'); ?>
                    <?php
                    if (isset($data)) {
                        $icompanyid = $Icompanyid;
                        $uid = $Uid;
                    }
                    ?>

                    <div>

                        <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#home" style="font-size: 12px;" onclick="return show();">Record Details</a></li>
                            <li><a data-toggle="tab" href="#menu1" style="font-size: 12px;" onclick="return summaryshow();">Material Detail</a></li>
                            <!--<li><a data-toggle="tab" href="#menu2" style="font-size: 12px;" onclick="return estimation();">Estimation Details</a></li>-->
                            <li style="float: right;"><a data-toggle="tab"  style="font-size: 12px;">Job Card</a></li>

                        </ul>
                        <!-- < Main div> -->
                        <div style="width: 100%;">

                            <table style="margin-left:28%; height:10px;">
                                <tr>
                                    <td><label style="font-size: 10px;background-color: #00FFFF; width:30px;">Click</label></td>
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
                                    <td style="padding:10px"><input style="width:100px; height:15px;" type="text" name="txt_docid" id="txt_docid" value=<?php echo "'" . $docid . "'"; ?> ondblclick = "return changedocid();">
                                                                    <input type="hidden" name="hdn_icompid" id="hdn_icompid" value=<?php echo $icompanyid; ?>>
                                        <input type="hidden" name="hdn_uid" id="hdn_uid" value=<?php echo $uid; ?>>
                                    </td>
                                    <td style="padding:10px">
                                        <label style="font-size: 10px;">Docket Date:</label>
                                    </td>
                                    <td style="padding:10px"><input style="width:100px; height:15px;" type="text" name="txt_docdate" id="txt_docdate" value=<?php echo "'" . $Docdate . "'" ?>;></td>
                                    <?php if ($docid == '') { ?>
                                        <td style="padding:10px"><input class="btn btn-primary" type="submit" name="btn_save" id="btn_save" value="Save" onclick="return validation();"></td>

                                        <td style="padding:10px"><input class="btn btn-primary" type="button" name="btn_gangitem" id="btn_gangitem" value="Item List" data-toggle='modal' data-target='#myModalshowitemlist' onclick= 'return gangjobitem();'></td>

                                    <?php } else { ?>
                                        <td style="padding:10px"><input class="btn btn-primary" type="submit" name="btn_save" id="btn_save" value="Update" onclick="return validation();"></td>

                                        <td style="padding:10px">
                                            <!--<input type='submit' class='button'  name='btn_print' id="btn_print" value='Print' onclick="return validation1();"> -->
                                            <a target='_blank' href="<?php echo site_url(); ?>Production/Jobcard_printout_comm?hdn_docid=<?php echo $docid; ?>&Icompanyid=<?php echo $icompanyid; ?>" class="btn btn-primary">Print</a>

                                        </td>
                                    <?php } ?>

                                    <td><input type="checkbox" id="chk_email" name="chk_email" onclick="return emailfunction();">
                                        <label for="chk_email" class="custom">Email</label></td>
                                    <td><textarea id="txtare_email" name="txtare_email" style="display:none"></textarea></td>
                                    <!-- <td>&nbsp;&nbsp;<input type="checkbox" name="chk_email_vendor" id="chk_email_vendor">
                                        <label class="custom">Email Vendor</label></td> -->
                                </tr>
                            </table>
                        </div>
                        <!-- </ Main div end> -->

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

                            <div id="page-wrapper">
                                <div class="tab-content">
                                    <div id="divReport">                        
                                        <div style="height:100px; overflow-x: auto;">
                                            <input type="hidden" name="hdn_rowno_mill" id="hdn_rowno_mill">
                                            <input type="hidden" name="hdn_rowmachine" id="hdn_rowmachine">
                                            <input type="hidden" name="hdn_id_var" id="hdn_id_var">
                                            <input type="hidden" name="hdn_totalareacutsheets" id="hdn_totalareacutsheets">
                                            <input type="hidden" name="hdn_bordlen" id="hdn_bordlen">
                                            <input type="hidden" name="hdn_lnprocessboard" id="hdn_lnprocessboard">

                                            <input hidden type="button" name="btn_machine" id="btn_machine" data-toggle='modal' data-target='#myModalMachien'>
                                            <input hidden type="button" name="btn_material1" id="btn_material1" data-toggle='modal' data-target='#myModalmaterial1'>
                                            <input hidden type="button" name="btn_material2" id="btn_material2" data-toggle='modal' data-target='#myModalmaterial2'>
                                            <input hidden type="button" name="btn_myModaljobcard" id="btn_myModaljobcard" data-toggle='modal' data-target='#myModaljobcard'>
                                            <input hidden type="button" name="btn_myModalinfo" id="btn_myModalinfo" data-toggle='modal' data-target='#myModalinfo'>
                                            <input hidden type="button" name="btn_myModalComplexity" id="btn_myModalComplexity" data-toggle='modal' data-target='#myModalComplexity'>
                                            <input hidden type="button" name="btn_processshow" id="btn_processshow" data-toggle='modal' data-target='#myModalprocess'>
                                            <input hidden type="button" name="btn_docidnew" id="btn_docidnew" data-toggle='modal' data-target='#myModaldocid'>
                                            <input hidden type="button" name="btn_processboard" id="btn_processboard" data-toggle='modal' data-target='#myModalprocessboard'>
                                            <input hidden type="button" name="btn_processink" id="btn_processink" data-toggle='modal' data-target='#myModalprocessink'>
                                            <table class="table table-striped table-bordered table-hover" style=" margin-left:5px;  width: 100%; overflow-x: auto;overflow-y: auto;" id="example">
                                                <thead id="theadgeneral">
                                                    <tr class="trGeneral">
                                                        <th style="width: 2%; "><center>Remove</center></th>
                                                <th style="width: 7%; "><center>Job No.</center></th>
                                                <th style="width: 7%; "><center>W.O. No</center></th>
                                                <th style="width: 25%; "><center>Job Name</center></th>
                                                <th style="width: 8%; "><center>Estimation No.</center></th>
                                                <th style="width: 7%; "><center>Close Size</center></th>
                                                <th style="width: 7%; "><center>Open Size</center></th>
                                                <th style="width: 8%; "><center>Client Code</center></th>
                                                <th style="width: 6%; "><center>Order Qty.</center></th>
                                                <th style="width: 3%; ">Job Qty.(With out wastage)</th>
                                                <th style="width: 7%; "><center>P.O. No.</center></th>
                                                <th style="width: 3%;" hidden><center>Gang Job UPS</center></th>
                                                <th style="width: 4%;">Final Qty. (With wastage)</th>
                                                <th style="width: 150px; "><center>Client Name</center></th>
                                                <th align="center" hidden>ItemID</th>
                                                <th align="center" hidden>SpecID</th>
                                                </tr> 
                                                </thead>
                                                <tbody id="tbodygeneral">
                                                    <?php
                                                    if (isset($data)):
                                                        $data = $data;
                                                        $data1 = $Neworold;
                                                        $data2 = $docid;
                                                        $docnotionval = $docnotionval;

                                                        // die();
                                                        $i = 1;

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
                                                                $UpsInCutSheet = '';
                                                                $repeatnew = $value->WastagePer;
                                                                $drp_shotqty = 0;
                                                                $ImportFPid = '';
                                                                $ImportRecordid = '';
                                                                $drp_noyes = '0';
                                                                $Short_Qty_Reason = '';
                                                                $recordid = $value->RecordID;
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
                                                                $UpsInCutSheet = $value->UpsInCutSheet;
                                                                $remarkswodetail = '';
                                                                $repeatnew = $value->NewJob;
                                                                $ImportFPid = $value->ImportFPid;
                                                                $ImportRecordid = $value->ImportRecordid;
                                                                $drp_noyes = $value->ShadeCard;
                                                                $drp_shotqty = $value->Reprint_Partial;
                                                                $Short_Qty_Reason = $value->ReasonOfShortQty;
                                                                $recordid = $value->RecordID;
                                                            }
                                                            // die();
                                                            // $Jobdetails = '';
                                                            // die();
                                                            ?>  
                                                        <input type='hidden' name='txt_jobneworold' id='txt_jobneworold' value='<?php echo $data1; ?>'>

                                                        <input type='hidden' name='txt_docidvaldata' id='txt_docidvaldata' value='<?php echo $docid; ?>'>

                                                        <input type="hidden" name="hdn_gangrecidestid" id="hdn_gangrecidestid" value="<?php echo $ImportRecordid; ?>">
                                                        <input type="hidden" name="hdn_gangitemid" id="hdn_gangitemid" value="<?php echo $ImportFPid; ?>">
                                                        <input type="hidden" name="hdn_recordid" id="hdn_recordid" value="<?php echo $recordid; ?>">

                                                        <tr class="trGeneral">
                                                            <td style='font-size: 13px;color: black;text-align: center;'><a onclick='return DeleteRowmain(this);'><img src='<?php echo base_url() ?>assets/bh_assets/img/Delete.png' style='height: 15px; width: 15px;'></a></td>
                                                            <td onclick = "return bindgrid(<?php echo $i ?>)" style ='padding-left: 5px; font-size: 13px; background-color: #00FFFF; cursor: pointer; color: black;'>
                                                                <input type='hidden' name='txt_uniquerjcno' id='txt_uniquerjcno' value="<?php echo $value->uniquejcno; ?>">
                                                                <input type='hidden' name='hdn_dcnotionval' id='hdn_dcnotionval' value="<?php echo $docnotionval_val; ?>">
                                                                <input type='hidden' name='hdn_itemid[<?php echo $i; ?>]' id='hdn_itemid[<?php echo $i; ?>]' value="<?php echo $value->itemid; ?>">
                                                                <input type='hidden' name='hdn_jobnno[<?php echo $i ?>]' id='hdn_jobnno[<?php echo $i ?>]' value="<?php echo $value->Jobno; ?>">
                                                                <input type='hidden' name='hdn_clientid[<?php echo $i ?>]' id='hdn_clientid[<?php echo $i ?>]' value="<?php echo $value->ClientId; ?>">

                                                                <input type="hidden" name="hdn_productName[<?php echo $i; ?>]" id="hdn_productName[<?php echo $i; ?>]" class="form-control" style="padding: 0px" value="<?php echo $value->Description; ?>">
                                                                <input type="hidden" name="hdn_productCode[<?php echo $i; ?>]" id="hdn_productCode[<?php echo $i; ?>]" class="form-control" style="padding: 0px" value="<?php echo $value->IPrefix; ?>">
                                                                <input type="hidden" name="hdn_clientName[<?php echo $i; ?>]" id="hdn_clientName[<?php echo $i; ?>]" class="form-control" style="padding: 0px" value="<?php echo $value->CompanyName; ?>">
                                                                <input type="hidden" name="hdn_poNo[<?php echo $i; ?>]" id="hdn_poNo[<?php echo $i; ?>]" class="form-control" style="padding: 0px" value="<?php echo $value->WONo; ?>">
                                                                <?php echo $value->Jobno; ?>
                                                            </td>
                                                            <td  onclick = "return showjob(<?php echo $i ?>)" style ='padding-left: 5px; font-size: 13px;background-color: #f2f7a4; color: black; cursor: pointer;'>
                                                                <input type='hidden' name='hdn_woid[<?php echo $i; ?>]' id='hdn_woid[<?php echo $i; ?>]' value="<?php echo $value->woid ?>">
                                                                <input type='hidden' name='hdn_jobno<?php echo $i; ?>' id='hdn_jobno<?php echo $i; ?>'><?php echo $value->woid; ?></td>
                                                            <td style='padding-left: 5px; font-size: 13px;color: black;'>
                                                                <input type="hidden" name="txt_[]" id="txt_[]" class="form-control" style="padding: 0px" value="<?php echo $value->Description; ?>"><?php echo $value->Description; ?></td>

                                                            <td style='padding-left: 5px; font-size: 13px;color: black;'>
                                                                <input type="hidden" name="txt_estidno[<?php echo $i; ?>]" id="txt_estidno[<?php echo $i; ?>]" class="form-control" style="padding: 0px" value="<?php echo $EstimateId; ?>"><?php echo $EstimateId; ?></td>

                                                            <td style='padding-left: 5px; font-size: 13px;color: black;'>
                                                                <input type="hidden" name="hdn_closeSize[<?php echo $i; ?>]" id="hdn_closeSize[<?php echo $i; ?>]" value="<?php echo $value->CloseSize; ?>"><?php echo $value->CloseSize; ?></td>
                                                            <td style ='padding-left: 5px; font-size: 13px;color: black;'>
                                                                <input type="hidden" name="hdn_openSize[<?php echo $i; ?>]" id="hdn_openSize[<?php echo $i; ?>]" value="<?php echo $value->OpenSize; ?>"><?php echo $value->OpenSize; ?></td><!-- this is art work no-->
                                                            <td style='padding-left: 5px; font-size: 13px;color: black;'>
                                                                <input type="hidden" name="txt_[]" id="txt_[]" class="form-control" style="padding: 0px" value="<?php echo $value->IPrefix; ?>"><?php echo $value->IPrefix; ?></td>
                                                            <td style='padding-left: 5px; font-size: 13px;color: black;'>
                                                                <input type="hidden" name='txt_orderqty[<?php echo $i; ?>]' id='txt_orderqty[<?php echo $i; ?>]' class="form-control" style="padding: 0px" value="<?php echo $OrdQty; ?>"><?php echo $OrdQty; ?></td>
                                                            <td style='padding-left: 5px; font-size: 13px;color: black;'>
                                                                <input style='border:0px;' type="text" name="txt_printqty[<?php echo$i; ?>]" id="txt_printqty[<?php echo$i; ?>]" class="printQty" value="<?php echo $OrdQty; ?>">
                                                            </td>
                                                            <td style='padding-left: 5px; font-size: 13px;color: black;'>
                                                                <input type="hidden" name="txt_[]" id="txt_[]" class="form-control" style="padding: 0px" value="<?php echo $value->WONo; ?>"><?php echo $value->WONo; ?></td>
                                                            <td style='padding-left: 5px; font-size: 13px;color: black; width: 50px;' hidden>
                                                                <input style='border:0px; width: 100%;' type='text' name='txt_upsvalmain[<?php echo $i; ?>]' id='txt_upsvalmain[<?php echo $i; ?>]' value="<?php echo $UpsInCutSheet; ?>">
                                                            </td>
                                                            <td style='padding-left: 5px; font-size: 13px;color: black; width: 50px;'>
                                                                <input style='border:0px;' type='text' name='txt_fqty[<?php echo $i; ?>]' id='txt_fqty[<?php echo $i; ?>]' value=<?php echo $OrdQty; ?>>
                                                            </td>
                                                            <td style='padding-left: 5px; font-size: 13px;color: black; width: 150px;'>
                                                                <input type="hidden" name="txt_TotQtyDispatched[<?php echo $i; ?>]" id="txt_TotQtyDispatched[<?php echo $i; ?>]" class="form-control" style="padding: 0px">
                                                                <input type="hidden" name="txt_TotQtyProduced[<?php echo $i; ?>]" id="txt_TotQtyProduced[<?php echo $i; ?>]" class="form-control" style="padding: 0px">
                                                                <?php echo $value->CompanyName ?></td>
                                                            <td style="display: none;color: black;">
                                                                <input type="hidden" name="txt_[]" id="txt_[]" class="form-control" style="padding: 0px" value="<?php echo $value->itemid; ?>"></td>
                                                            <td style="display: none;color: black;">
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
                                        <!-- Remarks & Reasons Div Start -->
                                        <div>
                                            <table class="paperclass">
                                                <thead id="theadgeneral">
                                                    <tr class="trGeneral">
                                                        <th><center>FG Stock</center></th>
                                                <th><center>Short Qty. Reason</center></th>
                                                <th><center>Job Card Remarks</center></th>
                                                <th><center>Work order remarks</center></th>
                                                <th><center>Estimation remarks</center></th>
                                                <th><center>Job kind</center></th>
                                                <th><center>Partial/Reprint</center></th>
                                                <th hidden><center>Processing</center></th>
                                                <th hidden><center>Make shade card</center></th>
                                                <th hidden><center>Wastage %</center></th>
                                                <th hidden><center>Wastage sheets</center></th>
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
                                                            <textarea onmouseover="this.style.height = '200px';" onmouseout="this.style.height = '20px';" rows="4" cols="37" style="width:100%; height:20px;" name="txt_woreamrks" id="txt_woreamrks"><?php echo $remarkswodetail; ?></textarea>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="txt_stmreamrks" id="txt_stmreamrks" value=<?php echo $Estcomments; ?>>
                                                        </td>
                                                        <td>
                                                            <select id="drp_repeatjob" name="drp_repeatjob">
                                                                <option value="Repeat Job" <?php if ($repeatnew == "Repeat Job" || $repeatnew == "RepeatJob" || $repeatnew == "Repeat") echo "selected"; ?>>Repeat Job</option>
                                                                <option value="New Job" <?php if ($repeatnew == "New Job" || $repeatnew == "NewJob" || $repeatnew == "NewJob") echo "selected"; ?>>New Job</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select id="drp_shotqty" name="drp_shotqty">
                                                                <option value="0" <?php if ($drp_shotqty == 0) echo "selected"; ?>></option>
                                                                <option value="1" <?php if ($drp_shotqty == 1) echo "selected"; ?>>Re-Print</option>
                                                                <option value="2" <?php if ($drp_shotqty == 2) echo "selected"; ?>>Partial</option>
                                                            </select>
                                                        </td>
                                                        <td hidden>
                                                            <select id="drp_oldnew" name="drp_oldnew">
                                                                <option value="New">New</option>
                                                                <option value="Old">Old</option>
                                                            </select>
                                                        </td>
                                                        <td hidden>
                                                            <select id="drp_noyes" name="drp_noyes">
                                                                <option value="0" <?php if ($drp_noyes == "0") echo "selected"; ?>>No</option>
                                                                <option value="1" <?php if ($drp_noyes == "1") echo "selected"; ?>>Yes</option>
                                                            </select>
                                                        </td>
                                                        <td hidden>
                                                            <input type="text" name="txt_wsagreamrksper" id="txt_wsagreamrksper" onkeypress='return Wastagesheet_blak();' value="0.00<?php $wstper; ?>">
                                                        </td>
                                                        <td hidden>
                                                            <input type="text" name="txt_wassheet" id="txt_wassheet" onchange ="return boardcalculation();">
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- Remarks & Reasons Div End -->

                                    </div>
                                </div>
                                <!-- ProcessDetail Div Start -->
                                <div style="margin-left:1%; font-size:12px;font-style: italic;font-weight: bold;">
                                    <label style="margin-left:1%; font-size:12px;font-style: italic;font-weight: bold;">Process Detail</label>
                                    <label style="margin-left:3%"><a onclick='return showprocess();'><img src='<?php echo base_url() ?>assets/bh_assets/img/plus.png' style='height: 15px; width: 15px;'></a></label>
                                    <input type="button" name='btn_repoppu' id='btn_repoppu' value="Repopulate Est" onclick = 'return popupfp()' class="btn btn-info btn-xs">
                                    <input type="button" name='btn_ssprintf' id='btn_ssprintf' value="Add Single Side Printing Form" onclick = 'return addrows(0)' class="btn btn-primary btn-xs">
                                    <input type="button" name='btn_fb2platef' id='btn_fb2platef' value="Add F/B Two Plate Form" onclick = 'return addrows(2)' class="btn btn-warning btn-xs">
                                    <input type="button" name='btn_fb1platef' id='btn_fb1platef' value="Add F/B Single Plate Form" onclick = 'return addrows(1)' class="btn btn-success btn-xs">
                                    <input type="button" name='btn_copyrows' id='btn_copyrows' value="Multi Form addition" onclick = 'alert()' style="background-color: #B8860B;" class=" btn-xs">
                                    <input type="button" name='btn_removerows' id='btn_removerows' value="Remove Row" onclick = 'alert()' class="btn btn-danger btn-xs">
                                    <input type="button" name='btn_outSource' id='btn_outSource' value="Out Source" onclick="return outsource();" style="background-color: #E6E6FA;" class="btn btn-xs">
                                </div>
                                <div style="width:100%; height:250px; width: 100%;overflow-x: auto;">
                                    <table id="tbl_processval" style="width: 150%;" class="paperclass">
                                        <thead id="theadgeneral">
                                            <tr class="trGeneral">                          
                                                <th style="white-space: nowrap;"><center>Active</center></th>
                                                <th style="white-space: nowrap;"><center>Component</center></th>
                                                <th style="white-space: nowrap;"><center>Form No.</center></th>
                                                <th style="white-space: nowrap;"><center>Plate No.</center></th>
                                                <th style="width: 7%"><center>Process</center></th>
                                                <th style="white-space: nowrap;"><center>F/B</center></th>
                                                <th style="white-space: nowrap;"><center>Paper/Raw Material</center></th>
                                                <th style="white-space: nowrap;"><center>Information1</center></th>
                                                <th style="white-space: nowrap;"><center>Information2</center></th>
                                                <th style="white-space: nowrap;"><center>Plan Size</center></th>
                                                <th style="white-space: nowrap;"><center>Print Size</center></th>
                                                <th style="white-space: nowrap;"><center>Repeat</center></th>
                                                <th style="white-space: nowrap;">Cut Sheets</th>
                                                <th style="white-space: nowrap;"><center>Wastage%</center></th>
                                                <th style="white-space: nowrap;"><center>Impressions</center></th>
                                                <th style="white-space: nowrap;"><center>Machine Name</center></th>
                                                <th style="white-space: nowrap;">M/R Time</th>
                                                <th style="white-space: nowrap;">Process Time</th>
                                                <th style="white-space: nowrap;">Total Time</th>  
                                                <th style="white-space: nowrap;"><center>Execution</center></th>  
                                                <th style="width: 4%"><center>Pass</center></th>
                                                <th style="white-space: nowrap;"><center>Remarks</center></th>
                                                <th style="white-space: nowrap;"><center>Information3</center></th>
                                                </tr>
                                        </thead>
                                        <tbody id='processdetail'>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- ProcessDetail Div End -->

                                <!-- Hold Div Start -->
                                <div>
                                    <div style="border: 0px solid; height:50px; margin-left:2px; width:55%; float:left;">
                                        <div style="width:100%;">
                                            <table style="width:100%;" class="paperclass">
                                                <thead id="theadgeneral">
                                                    <tr class="trGeneral">
                                                        <th nowrap>Hold</th>
                                                        <th nowrap>Hold Reason</th>
                                                        <th nowrap>Cancel</th>
                                                        <th nowrap>Cancel Reason</th>
                                                        <th nowrap>Close</th>
                                                        <th nowrap>Close Reason</th>
                                                        <th nowrap>Close Date</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <?php
                                                        // $Hold = 0;
                                                        // $HoldReason = '';
                                                        if ($Hold == '0' || $Hold == '') {
                                                            $chkhold = '';
                                                        } else {
                                                            $chkhold = 'checked';
                                                        }
                                                        // $CancelJob = 0;
                                                        if ($CancelJob == '0' || $CancelJob == '') {
                                                            $chkcancel = '';
                                                        } else {
                                                            $chkcancel = 'checked';
                                                        }
                                                        // $Jclose = 0;
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
                                                            <input type="text" name="txt_holdreason" id="txt_holdreason" style="border: 0px;" value=<?php echo $HoldReason; ?>>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" name="chk_cancel" id="chk_cancel" style="width:25px;" <?php echo $chkcancel; ?>>
                                                        </td>
                                                        <td style="width:150px;">
                                                            <input type="text" name="txt_cancelreason" id="txt_cancelreason" style="border: 0px;" value=<?php echo $cancelreason; ?>>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" name="chk_close" id="chk_close" style="width:25px;" onclick="return chkclose();" <?php echo $chkclose; ?>>
                                                        </td>
                                                        <td style="width:150px;">
                                                            <input type="text" name="txt_closereasonon" id="txt_closereason" style="border: 0px; width:100%;" value=<?php echo $closeResaon; ?>>
                                                        </td>
                                                        <td style="width:50px;">
                                                            <input type="text" name="txt_closedate" id="txt_closedate" style="border: 0px;" value=<?php echo $closedate; ?>>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Hold Div End -->

                                <div style="height:1px;">
                                </div>
                            </div>
                        </div>



                        <div id="menu1" class="tab-pane fade">
                            <div>
                                <br>
                                <div style="height:200px; overflow-x: auto;">
                                    <!-- div for ink -->
                                    <div style="height: 200px; overflow-x: auto;">
                                        <label style="margin-left:1%; font-size:12px;font-style: italic;font-weight: bold;">Ink Detail</label>
                                        <table class="tbl_ink" style="width:100%">
                                            <thead id="theadgeneral">
                                                <tr class="trGeneral">
                                                    <th style="width: 20%"><center>Component</center></th>
                                                    <th nowrap><center>Form no</center></th>
                                                    <th nowrap><center>Plate no</center></th>
                                                    <th nowrap><center>Plate</center></th>
                                                    <th nowrap><center>New</center></th>
                                                    <th nowrap><center>Old</center></th>
                                                    <th nowrap><center>Remarks</center></th>
                                                    <th nowrap><center>Execution</center></th>
                                                    <th nowrap><center>Ink 1</center></th>
                                                    <th nowrap><center>Ink 2</center></th>
                                                    <th nowrap><center>Ink 3</center></th>
                                                    <th nowrap><center>Ink 4</center></th>
                                                    <th nowrap><center>Ink 5</center></th>
                                            </tr>
                                            </thead>
                                            <tbody id="tbody_ink">
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
                                                        <select id="drp_plate[1]" name="drp_plate[1]">
                                                            <option value="xxxxx">--Select--</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="txt_plateNew[1]" id="txt_plateNew[1]">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="txt_plateOld[1]" id="txt_plateOld[1]">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="txt_plateRemarks[1]" id="txt_plateRemarks[1]">
                                                    </td>
                                                    <td>
                                                        <select id="drp_inkExecution[1]" name="drp_inkExecution[1]">
                                                            <option value="0">----Select----</option>
                                                            <option value="1" selected="">In House</option>
                                                            <option value="2">Online</option>
                                                            <option value="3">OutSource</option>
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="txt_ink1[1]" style="width: 100%" id="txt_ink1[1]" onclick="return ink_pop(1);">
                                                        <input type="hidden" id="hdn_inkItemID1[1]" name="hdn_inkItemID1[1]">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="txt_ink2[1]" style="width: 100%" id="txt_ink2[1]" onclick="return ink_pop(1);">
                                                        <input type="hidden" id="hdn_inkItemID2[1]" name="hdn_inkItemID2[1]">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="txt_ink3[1]" style="width: 100%" id="txt_ink3[1]" onclick="return ink_pop(1);">
                                                        <input type="hidden" id="hdn_inkItemID3[1]" name="hdn_inkItemID3[1]">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="txt_ink4[1]" style="width: 100%" id="txt_ink4[1]" onclick="return ink_pop(1);">
                                                        <input type="hidden" id="hdn_inkItemID4[1]" name="hdn_inkItemID4[1]">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="txt_ink5[1]" style="width: 100%" id="txt_ink5[1]" onclick="return ink_pop(1);">
                                                        <input type="hidden" id="hdn_inkItemID5[1]" name="hdn_inkItemID5[1]">
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- Div Ink end -->

                                <!-- Div Additional material add -->
                                <div style="height:100px; width:100%;">
                                    <label style="margin-left:1%; font-size:12px;font-style: italic;font-weight: bold;">Addtitional Material</label>&nbsp;&nbsp;&nbsp;
                                    <a onclick='return add_additionalmtrl();'><img src='<?php echo base_url() ?>assets/bh_assets/img/plus.png' style='height: 15px; width: 15px;'></a>
                                    <table class="tbl_additionalmtrl" style="width:100%">
                                        <thead id="theadgeneral">
                                                <tr class="trGeneral">
                                                <th style="width:7%"><center>Component</center></th>
                                                <th style="width:2%"><center>FormNo</center></th>
                                                <th style="width:15%"><center>Description</center></th>
                                                <th style="width:3%"><center>Quantity</center></th>
                                                <th style="width:1%"><center>QtyAfterWastage</center></th>
                                                <th style="width:1%"><center>UpsInFullSheet</center></th>
                                                <th style="width:7%"><center>ComponentSize</center></th>
                                                <th style="width:1%"><center>CutBreadth</center></th>
                                                <th style="width:1%"><center>CutLength</center></th>
                                                <th style="width:1%"><center>NoOfLeaves</center></th>
                                        </tr>
                                        </thead>
                                        <tbody id="tbody_additionalmtrl">
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Div additional material end -->
                                <!-- Div raw material requirements start -->
                                <div>
                                    <input type="button" name="btn_rawcalculate" id="btn_rawcalculate" value="Rawmaterial" onclick="return Rmcalculate();" class="btn btn-info btn-xs">
                                    <label style="margin-left:1%; font-size:12px;font-style: italic;font-weight: bold;">Raw material Detail</label>

                                    <?php
                                    if ($data1 != 'New') {
                                        ?>
                                        <input type="button" name="btn_createIMR" id="btn_createIMR" value="CreateIMR" class="btn btn-info btn-xs" onclick="return CreateIMR();" style="margin-left: 970px;">
                                        <?php
                                    }
                                    ?>	

                                    <!-- <label style="margin-left:1%; font-size:12px;font-style: italic;font-weight: bold;"></label> -->
                                </div>
                                <div style="height:300px; width: 100%;overflow-x: auto;overflow-y: auto;height: 250px">
                                    <table class="tab_rawmaterial" style="width:100%">
                                        <thead id="theadgeneral">
                                                <tr class="trGeneral">                                
                                                <th style="width:30%;"><center>Raw Material Name</center></th>
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
                                                <th><center>Allocated Raw Material</center></th>
                                                <th hidden><center>Prid</center></th>
                                                <th hidden><center>Process Status</center></th>
                                                <th hidden><center>jobno</center></th>
                                                <th hidden><center>Code No</center></th>
                                                <th hidden><center>Group Name</center></th>
                                                <th><center>IMR No</center></th>
                                                <th><center>IMR QTY</center></th>
                                                <th><center>IMR</center></th>
                                        </tr>
                                        </thead>
                                        <tbody id="tbl_rawmaterial">
                                            <tr>                                
                                                <td class='rawdetailstyle' style="background-color: #ffdead">
                                                    <input type='text' name='txt_rawmaterial[1]' id='txt_rawmaterial[1]'>
                                                </td>
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
                                                <td><input type='text' name='txt_imrno[1]' id='txt_imrno[1]'></td>
                                                <td><input type='text' name='txt_imrqty[1]' id='txt_imrqty[1]'></td>
                                                <td><input type='checkbox' name='txt_requestImr[1]' id='txt_requestImr[1]'></td>	
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
                                        <thead id="theadgeneral">
                                                <tr class="trGeneral">
                                                <th><center>Component</center></th>
                <!--                                <th>Form no.</th>-->
                                                <th><center>Open Size</center></th>
                                                <th><center>Close Size</center></th>
                                                <th><center>No. Of Page</center></th>
                                                <th><center>Spine</center></th>
                                                <!--<th><center>Job Open size</center></th>-->
                                                <th><center>Desinging & A/W</center></th>
                                                <!--<th><center>Margins</center></th>-->
                                                <!--<th><center>Pasting Gutters/</center></th>-->
                                                <!--<th><center>Machine Grippers</center></th>-->
                                                <!--<th><center>Print Line(Gang)</center></th>-->
                                                <!--<th><center>Past Problems</center></th>-->
                                                <!--<th><center>Job Area</center></th>-->
                                                <!--<th><center>BF/BS Desc</center></th>-->
                                                <!--<th><center>Plain corru.</center></th>-->
                                                <th><center>Check List No</center></th>
                                                <!--<th><center>Delivery Remarks</center></th>-->
                                        </tr>
                                        </thead>
                                        <tbody id="tbody_otherinfo">
                                            <tr>
                                                <td><input type='text' name='txt_othComponent[1]' id='txt_othComponent[1]'></td>
                                                <!--<td><input type='text' name='txt_othFormNo[1]' id='txt_othFormNo[1]'></td>-->
                                                <td><input type='text' name='txt_othOpenSize[1]' id='txt_othOpenSize[1]'></td>
                                                <td><input type='text' name='txt_othCloseSize[1]' id='txt_othCloseSize[1]'></td>
                                                <td><input type='text' name='txt_othNoOfPage[1]' id='txt_othNoOfPage[1]'></td>
                                                <td><input type='text' name='txt_othSpine[1]' id='txt_othSpine[1]'></td>
                                                <!--<td><input type="text" name="txt_jobopen" id='txt_jobopen' style="width:99%"></td>-->
                                                <td><input type="text" name="txt_desinging" id="txt_desinging" style="width:99%"></td>
                                                <!--<td><input type="text" name="txt_margins" id="txt_margins" style="width:99%"></td>-->
                                                <!--<td><input type="text" name="txt_pasting" id="txt_pasting" style="width:99%"></td>-->
                                                <!--<td><input type="text" name="txt_macinegr" id="txt_macinegr" style="width:99%"></td>-->
                                                <!--<td><input type="text" name="txt_printline" id="txt_printline" style="width:99%"></td>-->
                                                <!--<td><input type="text" name="txt_pastprob" id="txt_pastprob" style="width:99%"></td>-->
                                                <!--<td><input type="text" name="txt_reel" id="txt_reel" style="width:99%"></td>-->
                                                <!--<td><input type="text" name="txt_bfbs" id="txt_bfbs" style="width:99%"></td>-->
                                                <!--<td><input type="checkbox" name="txt_plaincor" id="txt_plaincor" style="width:99%"></td>-->
                                                <td><input type="text" name="txt_checklist" id="txt_checklist" style="width:99%"></td>
                                                <!--<td><input type="text" name="txt_delivery" id="txt_delivery" style="width:99%"></td>-->
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- Div Other Detail End -->

                            </div>
                        </div>

                        <!--        <div id="menu2" class="tab-pane fade">
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
                                    </div>  Div Menu 2-1 close 
                                    <br>
                                    <br><br>
                                    <br><br>
                                    <div style="width:95%; margin-left:2%;">


                                        <label style="font-size:10px;margin-bottom:15px;">
                                            Remarks For estimation:
                                        </label><br>
                                        <textarea id="txtext_remarks" name="txtext_remarks" rows="5" cols="50" style="width: 577px; height: 71px;"></textarea>
                                    </div>
                                </div>  Div Menu 2 close -->


                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </section>
</div>

                    
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="height: 600px; width:980px; overflow-y: auto;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h6 class="modal-title">Board Details</h6>
                </div>
                <div class="modal-body">

                    <table  style="border-collapse:collapse; width:100%;">
                        <thead>
                            <tr><td colspan='3'>
                                    <label style='font-size:13px;'>Search</label>
                                    <input type='text' name='txt_search1' id='txt_search1' style="width: 100%;">
                                </td>
                            </tr>
                            <tr>
                                <th align="center" style ='font-size: 13px; border-style: solid; border-width: 1px; background-color: #627aac; color: #FFFFFF; border-color: #212121; '>
                                    Item Name</th>
                                <th align="center" style ='font-size: 13px; border-style: solid; border-width: 1px; background-color: #627aac; color: #FFFFFF; border-color: #212121; width: 100px;'>
                                    Current stock</th>
                                <th align="center" style ='font-size: 13px; border-style: solid; border-width: 1px; background-color: #627aac; color: #FFFFFF; border-color: #212121; width: 100px;'>
                                    Allocated stock</th>
                                <th align="center" style ='font-size: 13px; border-style: solid; border-width: 1px; background-color: #627aac; color: #FFFFFF; border-color: #212121; width: 100px;'>
                                    Available stock</th>
                            </tr>
                            <tr></tr>
                        </thead>
                        <tbody id="tbl_popup">
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <!--        <button type="button" >Ok</button>-->
                </div>
            </div>
        </div>
    </div>


    <div id="myModalMachien" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content" style="height: 350px; overflow-y: auto; width:250px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h6 class="modal-title">Select Machine</h6>
                </div>
                <div class="modal-body">

                    <table  style="border-collapse:collapse; width: 180px;">
                        <thead>

                            <tr><td>
                                    <label style='font-size:11px;'>Search</label>
                                    <input type='text' name='txt_searchmachine' id='txt_searchmachine' style="width: 50%; height: 15px; font-size:10px;"></td>
                                    <!--<td><img src="images/Search_Btn.png"></td>-->
                            </tr>

                            <tr>
                                <th align="center" style ='font-size: 10px; border-style: solid; border-width: 1px; background-color: #627aac; color: #FFFFFF; border-color: #212121;'><center>
                            Machien Name</center></th>
                        </tr>
                        <tr></tr>
                        </thead>
                        <tbody id="tbody_machien">
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <!--        <button type="button" >Ok</button>-->
                </div>
            </div>
        </div>
    </div>

    <div id="myModaladditionalmtrl" class="modal fade" role="dialog">
        <div class="modal-dialog" style="width:400px;">
            <!-- Modal content-->
            <div class="modal-content" style="height: 550px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h6 class="modal-title">Add Additional Material</h6>
                </div>
                <div class="modal-body" style="font-size:12px;">
                    <label>Groups:</label>
                    <select id="drp_popam_groups" onchange="showadditionalmtrl_items();">
                        <option value="">---Select Group---</option>
                    </select>
                    <br>
                    <label>Search </label>
                    <input type='text' name='txt_searchadditmtrl' id='txt_searchadditmtrl' style="width: 60%; height: 18px;">
                    <br>
                    <div style="width: 350px; height:400px; overflow-y:auto;">
                        <table>
                            <thead id="theadgeneral">
                                <tr>
                                    <th style="width:350px;">Product Name</th>
                                </tr>
                            </thead>
                            <tbody id="tbody_popadditmtrl">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <!--        <button type="button" >Ok</button>-->
                </div>
            </div>
        </div>
    </div>

    <div id="myModalmjc_color" class="modal fade" role="dialog">
        <div class="modal-dialog" style="width:600px;height: 400px;">
            <!-- Modal content-->
            <div class="modal-content" style="">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h6 class="modal-title">Add Colours</h6>
                </div>
                <div class="modal-body" style="font-size:12px;">
                    <input type="hidden" id="hdn_btnval" name="hdn_btnval">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <label>Turn Type:</label>
                            <select class="form-control" id="mjcp_turntype" name="mjcp_turntype"></select>
                        </div>
                        <div class="col-md-6">
                            <label>Printing Type:</label>
                            <select class="form-control" id="mjcp_printtype" name="mjcp_printtype"></select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <label>Front Color:</label>
                            <input class="form-control" type='text' name='mjcp_fcolor' id='mjcp_fcolor'>
                        </div>
                        <div class="col-md-6">
                            <label>Back Color:</label>
                            <input class="form-control" type='text' name='mjcp_bcolor' id='mjcp_bcolor'>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <label>Print Size Grain:</label>
                            <input class="form-control" type='text' name='mjcp_printsizegrain' id='mjcp_printsizegrain'>
                        </div>
                        <div class="col-md-6">
                            <label>Print Size Deckle:</label>
                            <input class="form-control" type='text' name='mjcp_printsizedeckle' id='mjcp_printsizedeckle'>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <label>Print Size Ups:</label>
                            <input class="form-control" type='text' name='mjcp_printsizeups' id='mjcp_printsizeups'>
                        </div>
                        <div class="col-md-6">
                            <label>No of Cut Sheet without Wstge:</label>
                            <input class="form-control" type='text' name='mjcp_cutsheetwithoutwstge' id='mjcp_cutsheetwithoutwstge'>
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="col-md-12">
                        <button type="button" onclick="return manualjc();" class="btn btn-primary" style="float:right; margin-right: 15px;">OK</button>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>


    <div id="myModaldocid" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content" style="height: 200px; overflow-y: auto; width:200px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h6 class="modal-title">Change Docid</h6>
                </div>
                <div class="modal-body">

                    <table  style="border-collapse:collapse; width: 180px;">
                        <tr>
                            <td>
                                <label style="font-size:10px;">Old No.:</label>
                            </td>
                            <td>
                                <input style="font-size:10px;" type="text" name="txt_olddocid" id="txt_olddocid">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label style="font-size:10px;">Enter New No.:</label>
                            </td>
                            <td>
                                <input style="font-size:10px;" type="text" name="txt_newdocid" id="txt_newdocid">
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="button" name="btn_docid" id="btn_docid" value="Save" onclick="return docidupdate();">
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <!--        <button type="button" >Ok</button>-->
                </div>
            </div>
        </div>
    </div>

    <!-- Pop for process board -->
    <div id="myModalprocessboard" class="modal fade" role="dialog">
        <div class="modal-dialog" style="width: 660px;">
            <!-- Modal content-->
            <div class="modal-content" style="height: 450px;">
                <div class="modal-header"style="background-color: #337ab7;color: #fff;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title" style="font-weight: bold;">Paper Details</h5>
                </div>
                <div class="modal-body" style="height: 345px;">
                    <table style="margin-left:20px;font-size:13px;">
                        <tr>
                            <td><label style="margin-right:10px;">Component : </label></td>
                            <td colspan="4"><label id="lbl_popcomponent" style="font-weight: 500;"></label></td>
                        </tr>
                        <tr>
                            <td align="right"><label>Form No. : </label></td>
                            <td align="left"><label id="lbl_popformno" style="margin-right: 25px; font-weight: 500;"></label></td>
                            <td align="right"><label>Plate No. : </label></td>
                            <td align="left" width="100px"><label id="lbl_popplateno" style="font-weight: 500;"></label></td>
                            <td align="right"><label>Printing type : </label></td>
                            <td align="left"><label id="lbl_popprintingtype" style="font-weight: 500;"></label></td>
                        </tr>
                    </table>
                    <table style="margin-left:20px;" id="processboardmodaltable">
                        <tr>
                            <td><label>Filter Criteria : </label></td>
                            <td colspan="2"><select name="drp_popfilterboardkind" id="drp_popfilterboardkind" style="font-size:12px;width:140px;"></select></td>
                            <td colspan="2"><input type="text" name="txt_popfiltergsm" id="txt_popfiltergsm" placeholder="Gsm">
                                <input type="text" name="txt_popfiltergrain" id="txt_popfiltergrain" placeholder="Grain">
                                <input type="text" name="txt_popfilterdeckle" id="txt_popfilterdeckle" placeholder="Deckle"></td>
                            <td><input type="button" name="txt_popfilter" id="txt_popfilter" class="btn btn-primary" onclick="showprocesspaperdesc();" value="Show" style="padding: 3px 5px;"></td>
                        </tr>
                        <tr>
                            <td><label>Paper Desc : </label></td>
                            <td colspan="5">
                                <div id="paperdescinputdiv" style="width:450px !important;display:inline-flex; padding:0px 6px;border:1px solid #ccc;border-radius:2px;" onclick="paperdesclist()">
                                    <input id="txt_popdesc" name="txt_popdesc" style="width:99% !important;font-size:12px; float:left; border:none;" type="text" placeholder="Search & Select paper">
                                    <input id="hdn_popdescid" name="hdn_popdescid" type="hidden">
                                    <input id="hdn_popmill" name="hdn_popmill" type="hidden">
                                    <input id="hdn_poppaperkind" name="hdn_poppaperkind" type="hidden">
                                    <input id="hdn_popgsm" name="hdn_popgsm" type="hidden">
                                    <i class="fa fa-sort-desc" aria-hidden="true"></i>
                                </div>
                                <div id="paperdescdatadiv" class="form-control"  style="padding:5px;overflow-y: scroll;height:220px;background-color: white;position: absolute;width:450px;">
                                    <ul id="paperdescdatalist" style="list-style-type:none;padding-left:0px;"></ul>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td><label>Deckle : </label></td>
                            <td><input type="text" name="txt_popdeckle" id="txt_popdeckle"></td>
                            <td><label>Grain : </label></td>
                            <td><input type="text" name="txt_popgrain" id="txt_popgrain"></td>
                            <td><label>Qty. Req : </label></td>
                            <td><input id="txt_qtyReq_pop" name="txt_qtyReq_pop"></td>
                        </tr>
                        <tr>
                            <td><label>Print Deckle : </label></td>
                            <td><input type="text" name="txt_popprintdeckle" id="txt_popprintdeckle"></td>
                            <td><label>Print Grain : </label></td>
                            <td><input type="text" name="txt_popprintgrain" id="txt_popprintgrain"></td>
                            <td><label>Print Size Ups : </label></td>
                            <td><input type="text" name="txt_popprintsizeups" id="txt_popprintsizeups"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <label>Cut Sheets without Wastage: </label>
                                <input type="hidden" id="txt_popRepeat">
                            </td>
                            <td><input type="text" name="txt_popcutshwithoutwstge" id="txt_popcutshwithoutwstge"></td>
                        </tr>
                        <tr>
                            <td><label>Cuts from Full Sheets :</label></td>
                            <td><input type="text" name="txt_popcutsfullsheet" id="txt_popcutsfullsheet"></td>
                            <td><label>Wastage % : </label></td>
                            <td><input type="text" name="txt_popwastageper" id="txt_popwastageper" value=""></td>
                            <td><label>Wastage Sheets : </label></td>
                            <td><input type="text" name="txt_popwastagesheets" id="txt_popwastagesheets" value=""></td>
                        </tr>
                        <tr>
                            <td><label>Imp. without Wastage : </label></td>
                            <td><input type="text" name="txt_popimpression" id="txt_popimpression"></td>
                            <td><label>Imp. after Wastage : </label></td>
                            <td><input type="text" name="txt_popimpafterwstge" id="txt_popimpafterwstge"></td>
                            <td><label>Cut Sheets With Wastage: </label></td>
                            <td><input type="text" name="txt_poptotcutsheets" id="txt_poptotcutsheets"></td>
                        </tr>
                        <tr>
                            <td><button type="button" class="btn btn-primary" style="padding: 6px 8px;" onclick="return calculation_pop();">Calculate</button></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer" style="padding: 10px;">
                    <button type="button" class="btn btn-primary" style="padding: 6px 8px;" onclick="setprocessboard();">Apply to selected component</button>
                    <button type="button" class="btn btn-primary" style="padding: 6px 8px;" onclick="setform();">Apply to selected form</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Pop for process board end -->

    <!-- Pop for process Ink -->
    <div id="myModalprocessink" class="modal fade" role="dialog">
        <div class="modal-dialog" style="width: 550px;">
            <!-- Modal content-->
            <div class="modal-content" style="height: 350px;">
                <div class="modal-header"style="background-color: #337ab7;color: #fff;">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title" style="font-weight: bold;">Ink Details</h5>
                </div>
                <div class="modal-body" style="height: 240px;">
                    <table style="margin-left:20px;font-size:13px;">
                        <tr>
                            <td><label style="margin-right:10px;">Component : &nbsp;</label></td>
                            <td colspan="4"><label id="lbl_popicomponent" style="font-weight: 500;"></label></td>
                        </tr>
                        <tr>
                            <td><label>Form No. : &nbsp;</label></td>
                            <td><label id="lbl_popiformno" style="margin-right: 25px; font-weight: 500;"></label></td>
                            <td><label style="margin-right: 25px;">Plate No. : &nbsp;</label></td>
                            <td><label id="lbl_popiplateno" style="font-weight: 500;"></label></td>
                        </tr>
                    </table>
                    <table style="margin-left:20px;" id="processinkmodaltable">
                        <tr style="height: 35px;">
                            <td><label>Ink 1 : &nbsp;</label></td>
                            <td>
                                <div id="processinkinputdiv1" style="width:200px !important;display:inline-flex; padding:0px 6px;border:1px solid #ccc;border-radius:2px;" onclick="toggleprocessinklist()">
                                    <input id="txt_popinkname1" name="txt_popinkname1" style="width:99% !important;font-size:12px; float:left; border:none;" type="text" placeholder="Search & Select Ink1">
                                    <input id="hdn_popinkid1" name="hdn_popinkid1" type="hidden">
                                    <i class="fa fa-sort-desc" aria-hidden="true"></i>
                                </div>
                                <div id="processinkdatadiv1" class="form-control"  style="padding:5px;overflow-y: scroll;height:220px;background-color: white;position: absolute;width:450px;">
                                    <ul id="processinkdatalist1" style="list-style-type:none;padding-left:0px;"></ul>
                                </div>
                            <td rowspan="5"><select name="drp_popfilterinkkind" id="drp_popfilterinkkind" style="font-size:12px;width:140px;margin-left: 20px;" onchange="filterprocessink();"></select></td>
                        </tr>
                        <tr style="height: 35px;">
                            <td><label>Ink 2 : &nbsp;</label></td>
                            <td><input type="text" name="txt_popink2" id="txt_popink2" style="width:200px;"></td>
                        </tr>
                        <tr style="height: 35px;">
                            <td><label>Ink 3 : &nbsp;</label></td>
                            <td><input type="text" name="txt_popink3" id="txt_popink3" style="width:200px;"></td>
                            <td></td>
                        </tr>
                        <tr style="height: 35px;">
                            <td><label>Ink 4 : &nbsp;</label></td>
                            <td><input type="text" name="txt_popink4" id="txt_popink4" style="width:200px;"></td>
                            <td></td>
                        </tr>
                        <tr style="height: 35px;">
                            <td><label>Ink 5 : &nbsp;</label></td>
                            <td><input type="text" name="txt_popink5" id="txt_popink5" style="width:200px;"></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer" style="padding: 10px;">
                    <button type="button" class="btn btn-primary" style="padding: 6px 8px;">Apply to selected component</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Pop for process Ink end -->


    <div id="myModalmaterial1" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="height: 550px; overflow-y: auto; width:320px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h6 class="modal-title">Select Material1</h6>
                </div>
                <div class="modal-body">

                    <table  style="border-collapse:collapse; width: 100%;">
                        <thead>

                            <tr><td>
                                    <label style='font-size:11px;'>Search</label>
                                    <input type='text' name='txt_searchmaterial1' id='txt_searchmaterial1' style="width: 50%; height: 15px; font-size:10px;"></td>
                                    <!--<td><img src="images/Search_Btn.png"></td>-->
                            </tr>

                            <tr>
                                <th align="center" style ='font-size: 10px; border-style: solid; border-width: 1px; background-color: #627aac; color: #FFFFFF; border-color: #212121;'>
                                    Item Name</th>
                            </tr>
                            <tr></tr>
                        </thead>
                        <tbody id="tbody_material1">
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <!--        <button type="button" >Ok</button>-->
                </div>
            </div>
        </div>
    </div>


    <div id="myModalmaterial2" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="height: 350px; overflow-y: auto; width:220px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h6 class="modal-title">Select Material2</h6>
                </div>
                <div class="modal-body">

                    <table  style="border-collapse:collapse; width: 180px;">
                        <thead>

                            <tr><td>
                                    <label style='font-size:11px;'>Search</label>
                                    <input type='text' name='txt_searchmachine' id='txt_searchmachine' style="width: 50%; height: 15px; font-size:10px;"></td>
                                    <!--<td><img src="images/Search_Btn.png"></td>-->
                            </tr>

                            <tr>
                                <th align="center" style ='font-size: 10px; border-style: solid; border-width: 1px; background-color: #627aac; color: #FFFFFF; border-color: #212121;'>
                                    Item Name</th>
                            </tr>
                            <tr></tr>
                        </thead>
                        <tbody id="tbody_material2">
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <!--        <button type="button" >Ok</button>-->
                </div>
            </div>
        </div>
    </div>


    <div id="myModaljobcard" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="height: 450px; overflow-y: auto; width:850px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h6 class="modal-title">Select Material2</h6>
                </div>
                <div class="modal-body">

                    <table class="addjob"  style="border-collapse:collapse;">
                        <thead>

                            <tr>
                                <td>
                                    <label style='font-size:11px;'>Search</label>
                                </td>
                                    <!--<td><img src="images/Search_Btn.png"></td>-->
                                <td colspan="4">
                                    <input type='text' name='txt_searchjobno' id='txt_searchjobno' style="width: 50%; height: 15px; font-size:10px;">
                                </td>
                            </tr>

                            <tr>
                                <th align="center" style ='font-size: 10px; border-style: solid; border-width: 1px; background-color: #627aac; color: #FFFFFF; border-color: #212121;'>
                                    Job No</th>
                                <th align="center" style ='font-size: 10px; border-style: solid; border-width: 1px; background-color: #627aac; color: #FFFFFF; border-color: #212121;'>
                                    Woid</th>
                                <th align="center" style ='font-size: 10px; border-style: solid; border-width: 1px; background-color: #627aac; color: #FFFFFF; border-color: #212121;'>
                                    Product Name</th>
                                <th align="center" style ='font-size: 10px; border-style: solid; border-width: 1px; background-color: #627aac; color: #FFFFFF; border-color: #212121;'>
                                    MIS Code</th>
                                <th align="center" style ='font-size: 10px; border-style: solid; border-width: 1px; background-color: #627aac; color: #FFFFFF; border-color: #212121;'>
                                    Client Code</th>
                                <th align="center" style ='font-size: 10px; border-style: solid; border-width: 1px; background-color: #627aac; color: #FFFFFF; border-color: #212121;'>
                                    Estimate No</th>
                                <th align="center" style ='font-size: 10px; border-style: solid; border-width: 1px; background-color: #627aac; color: #FFFFFF; border-color: #212121;'>
                                    Wodate</th>
                                <th align="center" style ='font-size: 10px; border-style: solid; border-width: 1px; background-color: #627aac; color: #FFFFFF; border-color: #212121;'>
                                    Delivery Req. Date</th>
                                <th align="center" style ='font-size: 10px; border-style: solid; border-width: 1px; background-color: #627aac; color: #FFFFFF; border-color: #212121;'>
                                    ArtWork Code</th>
                                <th align="center" style ='font-size: 10px; border-style: solid; border-width: 1px; background-color: #627aac; color: #FFFFFF; border-color: #212121;'>
                                    Client Name</th>
                                <th align="center" style ='font-size: 10px; border-style: solid; border-width: 1px; background-color: #627aac; color: #FFFFFF; border-color: #212121;'>
                                    Remarks</th>
                            </tr>
                            <tr></tr>
                        </thead>
                        <tbody id="tbody_jobdetail">
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <!--        <button type="button" >Ok</button>-->
                </div>
            </div>
        </div>
    </div>


    <div id="myModalinfo" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="height: 350px; overflow-y: auto; width:530px;">
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
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="height: 450px; overflow-y: auto; width:450px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h6 class="modal-title">Select Process</h6>
                </div>
                <div class="modal-body">

                    <table class="addjob"  style="border-collapse:collapse;">
                        <thead>

                            <tr><td>
                                    <label style='font-size:11px;'>Search</label>
                                    <input type='text' name='txt_searchmachine' id='txt_searchmachine' style="width: 50%; height: 15px; font-size:10px;"></td>
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
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content" style="height: 350px; overflow-y: auto; width:220px;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h6 class="modal-title">Select Material</h6>
                </div>
                <div class="modal-body">

                    <table  style="border-collapse:collapse; width: 180px;">
                        <thead>

                            <tr><td>
                                    <label style='font-size:11px;'>Search</label>
                                    <input type='text' name='txt_searchmachine' id='txt_searchmachine' style="width: 50%; height: 15px; font-size:10px;"></td>
                                    <!--<td><img src="images/Search_Btn.png"></td>-->
                            </tr>

                            <tr>
                                <th align="center" style ='font-size: 10px; border-style: solid; border-width: 1px; background-color: #627aac; color: #FFFFFF; border-color: #212121;'>
                                    Item Name</th>
                            </tr>

                        </thead>
                        <tbody id="tbody_corrugation">
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <!--        <button type="button" >Ok</button>-->
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
    <!-- Pop for Item List End -->

    <div id="myModalInk" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h6 class="modal-title">Select Ink</h6>
                </div>
                <div class="modal-body" style="height: 450px; overflow-y: auto; width: 100%;">
                    <div class="col-sm-12">
                        <div class="input-group custom-search-form">
                            <input id="txt_searchGroup" type="text" class="form-control" placeholder="Search Ink..." onchange="return searchGroup();" onkeyup="return searchGroup();">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <br>
                    </div>
                    <div class="col-sm-12">
                        <div class="dataTable_wrapper" style="height: 350px; overflow-y: scroll">
                            <table class="table table-striped table-bordered table-hover" id="tbl_popInk">
                                <thead id="theadgeneral">
                                    <tr id="header" style="background: #f2f7a4">
                                        <th>#</th>
                                        <th style="font-size: 12px;">Description</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody_popink">

                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>   
                    </div>   
                </div>
                <div class="modal-footer">
                    <button type="button" id="btn_popInkOk">Ok</button>
                </div>
            </div>
        </div>
    </div>

    <div id="myModalFL" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h6 class="modal-title"></h6>
                </div>
                <div class="modal-body" style="height: 450px; overflow-y: auto; width: 100%;">
                    <div class="col-sm-12">
                        <div class="input-group custom-search-form">
                            <input id="txt_search" type="text" class="form-control" placeholder="Search Item..." onchange="return searching('txt_search', 'tbody_popUp');" onkeyup="return searching('txt_search', 'tbody_popUp');">
                            <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <br>
                    </div>
                    <div class="col-sm-12">
                        <div class="dataTable_wrapper" style="height: 350px; overflow-y: scroll">
                            <table class="table table-striped table-bordered table-hover" id="tbl_popInk">
                                <thead id="theadgeneral">
                                    <tr id="header" style="background: #f2f7a4">
                                        <!-- <th>#</th> -->
                                        <th style="font-size: 12px;">Description</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody_popUp">

                                </tbody>
                                <tfoot>
                                </tfoot>
                            </table>
                        </div>   
                    </div>   
                </div>
            </div>
        </div>
    </div>

    <div id="myModalOS" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h6 class="modal-title">Out Source</h6>
                </div>
                <div class="modal-body" style="height: 450px; overflow-y: auto; width: 100%;">
                    <div class="col-sm-12">
                        <div class="col-sm-5" style="text-align: right">
                            <label class="custom" style="margin-top: 5px;">Vendor For plate Out Source :</label>&nbsp;
                        </div>
                        <div class="col-sm-7">
                            <select class="form-control" id="drp_osVendorPlate" style="height: 30px; width: 150px;margin-bottom: 5px;">
                                <option>--Select--</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="dataTable_wrapper" style="height: 350px; overflow-y: scroll">
                            <table class="table table-striped table-bordered table-hover" id="tbl_popInk">
                                <thead id="theadgeneral">
                                    <tr id="header" style="background: #f2f7a4">
                                        <th><input type="checkbox" name="chk_check_allchkvendor" id="chk_check_allchkvendor" onclick="check_all_chk_vendor();"></th>
                                        <th>Component</th>
                                        <th>Form No</th>
                                        <th>Plate No</th>
                                        <th>Process Name</th>
                                        <th>Vendor Name</th>
                                    </tr>
                                </thead>
                                <tbody id="tbody_popUpOutSource">

                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
                        </div>   
                    </div>   
                </div>
                <div class="modal-footer">
                    <button type="button" id="btn_popOSOk" onclick="return outsource_button();">Ok</button>
                </div>
            </div>
        </div>
    </div>

    <div id="myModalTimeDetail" class="modal fade" role="dialog" >
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h6 class="modal-title">Enter Make Ready and Process Time</h6>
                </div>
                <div class="modal-body" style="height: 100px; overflow-y: auto; width: 100%;">
                    <div class="col-sm-4">
                        <label class="custom">Make Ready Time</label>
                        <input id="txt_popTDMakeReady">
                    </div>
                    <div class="col-sm-4">
                        <label class="custom">Process Time</label>
                        <input id="txt_popTDProcessTime">
                    </div>
                    <div class="col-sm-4">
                        <br>
                        <input id="hdn_current_row_of_time" type="hidden">
                        <button type="button" id="btn_popTimeDetail" onclick="return time_detail();">Ok</button>
                    </div> 
                </div>
                <div class="modal-footer">

                </div>
            </div>
        </div>
    </div>
</body>
</html>
