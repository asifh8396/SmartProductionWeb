function boardcalculation() {
    var sheets = $('#txt_wassheet').val();
    if (sheets == 0) {
        sheets = 0.0001;
    }
    // alert(sheets);
    var i = '';
    var Cut_Sheets_BeforeWastage = 0;
    var Cut_Sheets_AfterWastage = 0;
    var Full_Sheets_BeforeWastage = 0;
    var Full_Sheets_AfterWastage = 0;
    var Wastage_IN_Sheets = 0;
    var Wastage_IN_Percent = '';
    var TotalCartonQty = 0;
    var TotalOrderQty = 0;
    var UpsForCalculation = '';
    var CutSheetUps = '';
    var CutDimEntered = '';
    var TotalCuts = 0;
    var TotalUps_FullSheets = '';
    var MixJobCard = 0;
    var MultiBoard = 0;
    var FinalPrintQty = 0;
    var X = 0;

    // find out jobcar is mix or single jobcard
    var maingrid = $('#tbodygeneral tr').length;
    /* If value is one then mix job card is false  MixJobCard val 0*/
    var board = $('#padperdetail tr').length;
    /* If value is one then mix board is false  MultiBoard val 0*/
    var tbl_cuts = $('#detailoptimize tr').length;
    var shreqval = '';
    if (maingrid == '1') {
        MixJobCard = 0;
        var txt_orderqty = $('input[type="hidden"][name="txt_orderqty[' + maingrid + '\\]"]').val();
        var txt_printqty = $("input[type='text'][name='txt_printqty[" + maingrid + "\\]']").val();
        var paperdivfc = $("input[type='hidden'][name='hdn_mmval[1]']").val();

        if (txt_printqty != '' && txt_printqty != 0) {
            var ups = $("input[name='hdn_ups[1]']").val();
            var shreq1 = parseFloat(txt_printqty) / parseFloat(ups);
            var totalsheets1 = parseFloat(shreq1) + parseFloat(sheets);

            var totalsheets = totalsheets1.toFixed(0);
            var shreq = shreq1.toFixed(0);
            $('#td_wastage1').text(sheets);
            shreqval = shreq;
            $("input[type='text'][name='hdn_shreq[1]']").val(shreq);
            $('#td_shreq1').text(shreq);
            $('#td_totalsh1').text(totalsheets);
            $('input[type="text"][name="hdn_totalsh[1]"]').val(totalsheets);
            $('#td_kgqty1').text('');
            var dackele = $('#td_dackle1').text();
            var grain = $('#td_grain1').text();
            var gsm1 = $('#td_gsm1').text();
            var totalsheets = $('#td_totalsh1').text();
            var sheetwithoutws = $('#td_shreq1').text();
            var sheetwithoutws = $("input[type='text'][name='hdn_shreq[1]']").val();
            var dackele = parseFloat(dackele) / 100;
            var grain = parseFloat(grain) / 100;
            var gsm = parseFloat(gsm1) / 100; //100
            var total = totalsheets * (dackele * grain * gsm * paperdivfc * paperdivfc);
            var kg = parseFloat(total) / 1000; //1000
            var kgfi = kg.toFixed(2);
            // alert(parseFloat(kg));
            $('#td_kgqty1').text(kgfi);
            $('input[type="text"][name="hdn_kgqty[1]"]').val(kgfi);
            var wastagper = (parseInt(sheets) * 100) / sheetwithoutws;
            var wastagperto = wastagper.toFixed(2);
            // $('#txt_wsagreamrksper').val(wastagperto);

        } else {
            var ups = $("input[name='hdn_ups[1]']").val();
            var shreq = parseFloat(txt_orderqty) / parseFloat(ups);
            var totalsheets = parseFloat(shreq) + parseFloat(sheets);
            var shreqval = shreq.toFixed(0);
            var totalsheetsval = totalsheets.toFixed(0);

            $('#td_wastage1').text(sheets);
            $('#td_shreq1').text(shreqval);
            $('input[type="text"][name="hdn_shreq[1]"]').val(shreqval);
            // shreqval = shreq;
            $('#td_totalsh1').text(totalsheetsval);
            $('input[type="text"][name="hdn_totalsh[1]"]').val(totalsheetsval);
            /*Kg calculation */
            $('#td_kgqty1').text('');
            var dackele = $('#td_dackle1').text();
            var grain = $('#td_grain1').text();
            var gsm1 = $('#td_gsm1').text();
            var totalsheets = $('#td_totalsh1').text();
            var sheetwithoutws = $('#td_shreq1').text();
            var sheetwithoutws = $("input[type='text'][name='hdn_shreq[1]']").val();
            var dackele = parseFloat(dackele) / 100;
            var grain = parseFloat(grain) / 100;
            var gsm = parseFloat(gsm1) / 100; //100
            var total = totalsheets * (dackele * grain * gsm * paperdivfc * paperdivfc);
            var kg = parseFloat(total) / 1000; // 1000
            var kgfi = kg.toFixed(2);
            // alert(parseFloat(kg));
            $('#td_kgqty1').text(kgfi);
            $('input[type="text"][name="hdn_kgqty[1]"]').val(kgfi);

            var wastagper = (parseInt(sheets) * 100) / sheetwithoutws;
            var wastagperto = wastagper.toFixed(2);
            // $('#txt_wsagreamrksper').val(wastagperto);
        }

    }
    /* Mix Job*/
    else {
        var totalqty = 0;
        $('#txt_totalqty').val('');
		var paperdivfc = $("input[type='hidden'][name='hdn_mmval[1]']").val();
        for (var i = 1; i <= maingrid; i++) {
            var txt_orderqty = $('input[type="hidden"][name="txt_orderqty[' + i + '\\]"]').val();
            var txt_printqty = $("input[type='text'][name='txt_printqty[" + i + "\\]']").val();
            if (txt_printqty == ''|| txt_printqty == 0) {
                $("input[type='text'][name='txt_printqty[" + i + "\\]']").val(txt_orderqty);
            }
        }
        for (var i = 1; i <= maingrid; i++) {
            var txt_printqty = $("input[type='text'][name='txt_printqty[" + i + "\\]']").val();
            totalqty = parseInt(totalqty) + parseInt(txt_printqty);
            $('#txt_totalqty').val(totalqty);
        }
        var totqtyadd = $('#txt_totalqty').val();
        var ups = $("input[name='hdn_ups[1]']").val();
        var shreq = parseFloat(totqtyadd) / parseFloat(ups);
        var totalsheets = parseFloat(shreq) + parseFloat(sheets);
        var shreqval = shreq.toFixed(3);
        var totalsheetsval = totalsheets.toFixed(3);
        $('#td_wastage1').text(sheets);

        $('#td_shreq1').text(shreqval);
        $('input[type="text"][name="hdn_shreq[1]"]').val(shreqval);
        shreqval = shreq;
        $('#td_totalsh1').text(totalsheetsval);
        $('input[type="text"][name="hdn_totalsh[1]"]').val(totalsheetsval);
        /*Kg calculation */
        $('#td_kgqty1').text('');
        var dackele = $('#td_dackle1').text();
        var grain = $('#td_grain1').text();
        var gsm1 = $('#td_gsm1').text();
        var totalsheets = $('#td_totalsh1').text();
        var dackele = parseFloat(dackele) / 100;
        var grain = parseFloat(grain) / 100;
        var gsm = parseFloat(gsm1) / 100; // 100
        var total = totalsheets * (dackele * grain * gsm * paperdivfc * paperdivfc);
        var kg = parseFloat(total) / 1000; // 1000

        var kgfi = kg.toFixed(2);
        $('#td_kgqty1').text(kgfi);
        $('input[type="text"][name="hdn_kgqty[1]"]').val(kgfi);
    }


    /* Cutsheet calculation formula full sheet before wastage * nooof cuts */

    if (shreqval != '') {
        for (var j = 1; j <= board; j++) {
            var hdn_mothrrow = $("input[type='hidden'][name='hdn_mothrrow[" + j + "\\]']").val();
            var shreqty = $('#td_shreq' + j).text();
            var shreqty = $("input[type='text'][name='hdn_shreq[" + j + "\\]']").val();
            for (var i = 1; i <= tbl_cuts; i++) {
                var hdn_mothrrowval = $("input[type='hidden'][name='hdn_mothrrowval[" + i + "\\]']").val();
                if (hdn_mothrrow == hdn_mothrrowval) {
                    var cuts = $("input[type='text'][name='txt_n[" + i + "\\]']").val();
                    var totalsh = parseFloat(shreqty) * parseFloat(cuts);
                    $("input[type='text'][name='txt_cutsh[" + i + "\\]']").val(totalsh);
                }
            }
        }
    }
    else {
        MixJobCard = 1;
    }


    if (board == 1) {
        MultiBoard = 0;
    } else {
        MultiBoard = 1;
    }
}


//  Cutt sheet formula 
function Rmcalculate() {

    var boardcal = $('#padperdetail tr').length;
    var cuttable = $('#detailoptimize tr').length;
    var maintbl = $('#tbodygeneral tr').length;
    var hdn_itemidArray = [];
    for (var i = 1; i <= maintbl; i++) {
        var hdn_itemid = $("#hdn_itemid\\[" + i + "\\]").val();
        // alert(hdn_itemid);
        hdn_itemidArray.push(hdn_itemid);

    }

    var totalupsvl = 0;
    var totalshreq = 0;
    var totalsh = 0;
     
    for (var i = 1; i <= cuttable; i++) {
        var txt_n = $("#txt_n\\[" + i + "\\]").val();
        var txt_ups = $("#txt_ups\\[" + i + "\\]").val();
        var Ups = $("#hdn_ups\\[" + i + "\\]").val();
        var txt_printqty = $("#txt_printqty\\[" + i + "\\]").val();
        var txt_fqty = $("#txt_fqty\\[" + i + "\\]").val();
        var hdn_shreq = $("#hdn_shreq\\[" + i + "\\]").val();
        var hdn_totalsh = $("#hdn_totalsh\\[" + i + "\\]").val();
        totalupsvl = parseInt(txt_n) * parseInt(txt_ups);
        totalsh = parseInt(Ups) * parseInt(hdn_totalsh);
        totalshreq = parseInt(Ups) * parseInt(hdn_shreq);
        // alert(totalsh);
        // alert(totalshreq);
        // if (totalupsvl != Ups) {
        //     alert("Opps...! Full Sheet Ups And Cut Sheet Ups Not Matching..!");
        //     return false;
        // }
        // if (totalshreq != txt_printqty) {
        //     alert("Sheet Req & Job Qty(With out wastage) Not Matching..!");
        //     return false;
        // }
        // if (txt_fqty != totalsh) {
        //     alert("Total Sheet & Final Qty(With wastage) Not Matching..!");
        //     return false;
        // }
    }
    // 
        var pridArray = [];
        var processtypeArray = [];
        var raw1_itemidArray = [];
        var info3_AddlInfo1 = [];
        var info9_AddlInfo1 = [];
        var wpinfo1_AddlInfo1 = [];
        var wpinfo2_AddlInfo2 = [];
        var wpint_Info1 = [];
        var coragationval = [];
        var txt_ppfluteidCorrPly = [];
        var txt_ppitemidpCorrPly = [];
        var inkid = [];
		var raw_id2_ItemID = [];
        var groupidArray = [];
        var txt_info2Array = [];
        $.blockUI({css: {
                border: 'none',
                padding: '15px',
                backgroundColor: '#000',
                '-webkit-border-radius': '10px',
                '-moz-border-radius': '10px',
                opacity: .5,
                color: '#fff'
            }});
        
    var palydetail = $('#palydetail tr').length;
    var tblboard = $('#padperdetail tr').length;
    var machinedetail = $('#machinedetail tr').length;
    var inkPrleng = $('#tbody_ink tr').length;
    for (var i = 1; i <= machinedetail; i++) {
        var prid = $("input[type='hidden'][name='hdn_baseprid[" + i + "\\]']").val();
        var ProcessTypeID = $("input[type='hidden'][name='hdn_var_id_info1[" + i + "\\]']").val();
        var int_Info1 = $("input[type='hidden'][name='hdn_int_id_info1[" + i + "\\]']").val();
        // alert(ProcessTypeID);
        var hdn_raw_id1_ItemID = $("input[type='hidden'][name='hdn_raw_id1[" + i + "\\]']").val();
		
		var hdn_raw_id2_ItemID = $("input[type='hidden'][name='hdn_raw_id2[" + i + "\\]']").val();
		
        var hdn_var_id_info3_AddlInfo1 = $("input[type='hidden'][name='hdn_var_id_info3[" + i + "\\]']").val();
        // mat lem
        var hdn_dob_info9_AddlInfo1 = $("input[type='hidden'][name='hdn_dob_info9[" + i + "\\]']").val(); // mat lem
        // Win Patch
        var hdn_dob_info1_AddlInfo1 = $("input[type='hidden'][name='hdn_dob_info1[" + i + "\\]']").val();
        var hdn_dob_info2_AddlInfo1 = $("input[type='hidden'][name='hdn_dob_info2[" + i + "\\]']").val();
        var hdn_group_id1 = $("input[type='hidden'][name='hdn_group_id1[" + i + "\\]']").val();
        var txt_info2 = $("input[type='text'][name='txt_info2[" + i + "\\]']").val();

        pridArray.push(prid);
        processtypeArray.push(ProcessTypeID);
        raw1_itemidArray.push(hdn_raw_id1_ItemID);
        info3_AddlInfo1.push(hdn_var_id_info3_AddlInfo1);
        info9_AddlInfo1.push(hdn_dob_info9_AddlInfo1);
        wpinfo1_AddlInfo1.push(hdn_dob_info1_AddlInfo1);
        wpinfo2_AddlInfo2.push(hdn_dob_info2_AddlInfo1);
        wpint_Info1.push(int_Info1);
		raw_id2_ItemID.push(hdn_raw_id2_ItemID);
        groupidArray.push(hdn_group_id1);
        txt_info2Array.push(txt_info2);
    }
    // Print detail
    for(var j=1; j<= inkPrleng; j++){
        var hdn_inkid = $("input[type='hidden'][name='hdn_inkid[" + j + "\\]']").val();
        inkid.push(hdn_inkid);
    }

    // Corrugation Ply
    if(palydetail > 0){
    for(var i=1; i<= palydetail; i++){
        // ProcessTypeID
        var txt_ppfluteid = $("input[type='hidden'][name='txt_ppfluteid[" + i + "\\]']").val();
        //CorrPaperID
        var txt_ppitemidp = $("input[type='hidden'][name='txt_ppitemidp[" + i + "\\]']").val();
		if(txt_ppfluteid !== "") {
			txt_ppfluteidCorrPly.push(txt_ppfluteid);
			txt_ppitemidpCorrPly.push(txt_ppitemidp);			
		} else {
			txt_ppfluteidCorrPly= [];
			txt_ppitemidpCorrPly = [];
		}
    }
}else{
    txt_ppfluteidCorrPly= [];
    txt_ppitemidpCorrPly = [];
}


var boardetail = $('#padperdetail tr').length;
var cuttable = $('#detailoptimize tr').length;
        var mothrrowArray = [];
        var dackleArray = [];
        var grainArray = [];
        var totalshArray = [];
        var upsArray = [];
        var kgqtyArray = [];
        var packetsArray = [];
        var mmvalArray = [];
        var boardid = [];
for(var i=1; i<= boardetail; i++){
    var hdn_mothrrow = $("input[type='hidden'][name='hdn_mothrrow[" + i + "\\]']").val();
    var hdn_dackle= $("input[type='hidden'][name='hdn_dackle[" + i + "\\]']").val();
    var hdn_grain= $("input[type='hidden'][name='hdn_grain[" + i + "\\]']").val();
    var hdn_totalsh = $("input[type='text'][name='hdn_totalsh[" + i + "\\]']").val();
    var hdn_ups = $("input[type='text'][name='hdn_ups[" + i + "\\]']").val();
    var hdn_kgqty = $("input[type='text'][name='hdn_kgqty[" + i + "\\]']").val();
    var hdn_packets = $("input[type='hidden'][name='hdn_packets[" + i + "\\]']").val();
    var hdn_mmval = $("input[type='hidden'][name='hdn_mmval[" + i + "\\]']").val();
    var hdn_paperid = $("input[type='hidden'][name='hdn_paperid[" + i + "\\]']").val();
    boardid.push(hdn_paperid);
    mothrrowArray.push(hdn_mothrrow);
    dackleArray.push(hdn_dackle);
    grainArray.push(hdn_grain);
    totalshArray.push(hdn_totalsh);
    upsArray.push(hdn_ups);
    kgqtyArray.push(hdn_kgqty);
    packetsArray.push(hdn_packets);
    mmvalArray.push(hdn_mmval);

}
        var mothrrowvalArray = [];
        var breArraycut = [];
        var lenArray = [];
        var wastageArray = [];
        var upsArraycut = [];
        var mmvalcutArray = [];

for(var i=1; i<= cuttable; i++){
    var hdn_mothrrowval = $("input[type='hidden'][name='hdn_mothrrowval[" + i + "\\]']").val();
    var txt_bre= $("input[type='text'][name='txt_bre[" + i + "\\]']").val();
    var txt_len= $("input[type='text'][name='txt_len[" + i + "\\]']").val();
    var txt_wastage = $("input[type='text'][name='txt_wastage[" + i + "\\]']").val();
    var txt_ups = $("input[type='text'][name='txt_ups[" + i + "\\]']").val();
    var hdn_mmvalcut = $("input[type='hidden'][name='hdn_mmvalcut[" + i + "\\]']").val();
    mothrrowvalArray.push(hdn_mothrrowval);
    breArraycut.push(txt_bre);
    lenArray.push(txt_len);
    wastageArray.push(txt_wastage);
    upsArraycut.push(txt_ups);
    mmvalcutArray.push(hdn_mmvalcut);
}
    $('#tbl_rawmaterial').html('');
            $.ajax({
                type: "POST",
                url: "Jobcard/RMCcalculateval",
                data:{pridArray:pridArray,processtypeArray:processtypeArray,raw1_itemidArray:raw1_itemidArray
                    ,info3_AddlInfo1:info3_AddlInfo1,info9_AddlInfo1:info9_AddlInfo1,
                    wpinfo1_AddlInfo1:wpinfo1_AddlInfo1,wpinfo2_AddlInfo1:wpinfo2_AddlInfo2,wpint_Info1:wpint_Info1,
                    txt_ppfluteidCorrPly:txt_ppfluteidCorrPly,txt_ppitemidpCorrPly:txt_ppitemidpCorrPly,
                    inkid:inkid,mothrrowArray:mothrrowArray,dackleArray:dackleArray,grainArray:grainArray,
                    totalshArray:totalshArray,upsArray:upsArray,kgqtyArray:kgqtyArray,packetsArray:packetsArray,
                mmvalArray:mmvalArray,mothrrowvalArray:mothrrowvalArray,breArraycut:breArraycut,lenArray:lenArray,
                wastageArray:wastageArray,upsArraycut:upsArraycut,mmvalcutArray:mmvalcutArray,boardid:boardid,raw_id2_ItemID:raw_id2_ItemID,
            groupidArray:groupidArray,txt_info2Array:txt_info2Array,hdn_itemidArray:hdn_itemidArray}
            }).done(function (msg) {
                // alert(msg);
                var main = jQuery.parseJSON(msg);
                var len = $('#tbl_rawmaterial tr').length;
                
                var j =parseInt(len) + 1;
                for(var i =0; i< main.length; i++){
                    var reqtores = main[i].Reserve;
                    if (reqtores == 1) {
                      var   reqtoreschk = "checked='checked'";
                    }else{
                    var reqtoreschk = '';

                    }
                    $('#tbl_rawmaterial').append("<tr>\n\
                                <td><input type='text' name='txt_rawmaterial["+j+"]' id='txt_rawmaterial["+j+"]' value='"+main[i].ItemName+"' style='background-color: pink;'></td>\n\
                                <td hidden><input type='text' name='txt_Details["+j+"]' id='txt_Details["+j+"]'></td>\n\
                                <td><input type='text' name='txt_apprx["+j+"]' id='txt_apprx["+j+"]' value='"+main[i].ReqQty+"'></td>\n\
                                <td><input type='text' name='txt_otherdetail["+j+"]' id='txt_otherdetail["+j+"]' value='"+ main[i].OtherDetail +"'></td>\n\
                                <td><input type='text' name='txt_unit["+j+"]' id='txt_unit["+j+"]' value='"+main[i].CharInfo1+"'></td>\n\
                                <td><input type='checkbox' name='txt_requestocc["+j+"]' id='txt_requestocc["+j+"]' "+reqtoreschk+"></td>\n\
                                <td><input type='hidden' name='txt_materialsta["+j+"]' id='txt_materialsta["+j+"]' value='"+main[i].AddlInfo2+"'>\n\
                                <input type='text' name='txt_materialsta_desc[" + j + "]' id='txt_materialsta_desc[" + j + "]'></td>\n\
                                <td><input type='text' name='txt_qtyall["+j+"]' id='txt_qtyall["+j+"]'></td>\n\
                                <td hidden><input type='text' name='txt_imr["+j+"]' id='txt_imr["+j+"]'></td>\n\
                                <td hidden><input type='text' name='txt_olditemid["+j+"]' id='txt_olditemid["+j+"]' value='"+main[i].ItemID+"'></td>\n\
                                <td hidden><input type='text' name='txt_oldmatrial["+j+"]' id='txt_oldmatrial["+j+"]'></td>\n\
                                <td hidden><input type='text' name='txt_recordid["+j+"]' id='txt_recordid["+j+"]'></td>\n\
                                <td hidden><input type='text' name='txt_allcatidid["+j+"]' id='txt_allcatidid["+j+"]'></td>\n\
                                <td><input type='text' name='txt_allocatmater["+j+"]' id='txt_allocatmater["+j+"]'></td>\n\
                                <td hidden><input type='text' name='txt_Prid["+j+"]' id='txt_Prid["+j+"]' value='"+main[i].PrID+"'></td>\n\
                                <td hidden><input type='text' name='txt_processta["+j+"]' id='txt_processta["+j+"]'></td>\n\
                                <td hidden><input type='text' name='txt_Jobno["+j+"]' id='txt_Jobno["+j+"]'></td>\n\
                                <td hidden><input type='text' name='txt_codeno["+j+"]' id='txt_codeno["+j+"]'></td>\n\
                                <td hidden><input type='text' name='txt_gname["+j+"]' id='txt_gname["+j+"]' value='"+ main[i].GroupID+"'></td>\n\
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
            });


    var tbllen = $('#detailoptimize tr').length;
    var totalarea = 0;
    var multiply = '';
    for (var i = 1; i <= tbllen; i++) {
        var bre = $("input[type='text'][name='txt_bre[" + i + "\\]']").val();
        var len = $("input[type='text'][name='txt_len[" + i + "\\]']").val();
        var txt_wastage = $("input[type='text'][name='txt_wastage[" + i + "\\]']").val();
        var multiply = parseFloat(bre) * parseFloat(len);
        var afterwast = parseFloat(txt_wastage) * parseFloat(multiply);
        totalarea = parseFloat(totalarea) + parseFloat(afterwast);
        var areatotal = totalarea.toFixed(0);
        $('#hdn_totalareacutsheets').val(areatotal);
    }
} /* Function end*/

function calculateWstgNew(check) {

        
    var rtn = validations();
    if (rtn == 0) {
        return false;
    }
    
    var cuttable = $('#detailoptimize tr').length;
     // main job detail 
    var maintbl = $('#tbodygeneral tr').length;

        var JobnoArray = [];
        var OrderqtyArray = [];
        var JobQtyArray = [];
        var FinalQtyArray = [];
        var UpsmainArray = [];
        var wastageper = $('#txt_wsagreamrksper').val();
        var WastageSheets = $('#txt_wassheet').val();
    for(var i=1; i<= maintbl; i++){
        var hdn_jobnno = $('#hdn_jobnno\\[' + i + '\\]').val();
        var txt_orderqty = $('#txt_orderqty\\[' + i + '\\]').val();
        var txt_printqty = $('#txt_printqty\\[' + i + '\\]').val();
        if (txt_printqty == '' || txt_printqty == 0) {
            swal('Please Insert Job Qty(With out wastage)');
            return false;
        }
        var txt_upsvalmain = $('#txt_upsvalmain\\[' + i + '\\]').val();
        var txt_fqty = $('#txt_fqty\\[' + i + '\\]').val();

        JobnoArray.push(hdn_jobnno);
        OrderqtyArray.push(txt_orderqty);
        JobQtyArray.push(txt_printqty);
        UpsmainArray.push(txt_upsvalmain);
        FinalQtyArray.push(txt_fqty);
    }
    // Board detail 
    var boardetail = $('#padperdetail tr').length;
        var DimArray = [];
        var boardidArray = [];
        var gsmArray = [];
        var dackleArray = [];
        var grainArray = [];
        var upsArray = [];
        var shreqArray = [];
        var totalshArray = [];
        var kgqtyArray = [];
        var packetsArray = [];
    for(var i=1; i<= boardetail; i++){
        var hdn_paperid = $('#hdn_paperid\\[' + i + '\\]').val();
        var hdn_gsm = $('#hdn_gsm\\[' + i + '\\]').val();
        var hdn_dackle = $('#hdn_dackle\\[' + i + '\\]').val();
        var hdn_grain = $('#hdn_grain\\[' + i + '\\]').val();
        var hdn_ups = $('#hdn_ups\\[' + i + '\\]').val();
        var td_shreq = $('#td_shreq'+ i).text();
        var td_totalsh = $('#td_totalsh' + i).text();
        // alert(hdn_paperid);
        var td_kgqty = $('#td_kgqty' + i).text();
        var td_packets = $('#td_packets' + i).text();

        DimArray.push(i);
        boardidArray.push(hdn_paperid);
        gsmArray.push(hdn_gsm);
        dackleArray.push(hdn_dackle);
        grainArray.push(hdn_grain);
        upsArray.push(hdn_ups);
        shreqArray.push(td_shreq);
        totalshArray.push(td_totalsh);
        kgqtyArray.push(td_kgqty);
        packetsArray.push(td_packets);

    }

    $.ajax({
        type: "POST",
        url: "Jobcard/MainBoardCalculate",
        data:{wastageper:wastageper,WastageSheets:WastageSheets,JobnoArray:JobnoArray,OrderqtyArray:OrderqtyArray,JobQtyArray:JobQtyArray,
            UpsmainArray:UpsmainArray,FinalQtyArray:FinalQtyArray,DimArray:DimArray,boardidArray:boardidArray,gsmArray:gsmArray,dackleArray:dackleArray,grainArray:grainArray,
            upsArray:upsArray,shreqArray:shreqArray,totalshArray:totalshArray,kgqtyArray:kgqtyArray,kgqtyArray:kgqtyArray},
            beforeSend: function () {
            },
            complete: function () {
            },
            success: function (msg) {
        // console.log(msg);
        var main = jQuery.parseJSON(msg);
        var jobdetail = main["Jobdetail"];
        var boarddetail = main["Boarddetail"];
        for (var i = 0; i < jobdetail.length; i++) {
            $("#txt_printqty\\["+ (i + 1) +"\\]").val(jobdetail[i].JobQty);
            $("#txt_upsvalmain\\["+ (i + 1) +"\\]").val(jobdetail[i].GangUps);
            $("#txt_fqty\\["+ (i + 1) +"\\]").val(jobdetail[i].JobQtyWithWastage);

        }        

        for (var i = 0; i < boarddetail.length; i++) {
            
            $("#hdn_shreq\\["+ (i + 1) +"\\]").val(boarddetail[i].FullSheets);
            $("#hdn_totalsh\\["+ (i + 1) +"\\]").val(boarddetail[i].FullSheetsWithWastage);
            $("#hdn_kgqty\\["+ (i + 1) +"\\]").val(boarddetail[i].ReqKg);
            $('#td_packets' + (i + 1)).text(boarddetail[i].ReqPackets);

        }
    },
        error: function () {
            swal("Not Calculate Some Error....!");
        }
    });

    

}

function cutchange(lnk) {

}

function upschange(lnk) {

}

function totalsheet(lnk) {


}

function calculateval() {

    boardcalculation();



    /*For single board with multiple job*/
    if (tbodygeneral > 1) {
        // $("input[type='hidden'][name='hdn_totalsh[1]']").val();
        var afterwsgr = $("input[type='text'][name='txt_wastage[1]']").val();
        for (var i = 1; i <= tbodygeneral; i++) {
            var ups = $("input[type='text'][name='txt_upsvalmain[" + i + "\\]']").val();
            var afterwsgrsingl = parseFloat(afterwsgr) * parseFloat(ups);
            var afterwsgrsingl1 = afterwsgrsingl.toFixed(0);
            $("input[type='text'][name='txt_fqty[" + i + "\\]']").val(afterwsgrsingl1);
        }
    } /*If close for single board with multiple job*/


    if (boardcal == 1) {
        for (var i = 1; i <= boardcal; i++) {
            var l = $("input[type='hidden'][name='hdn_dackle[" + i + "\\]']").val();
            var b = $("input[type='hidden'][name='hdn_grain[" + i + "\\]']").val();
        }
        var psheet = $("input[type='text'][name='txt_wastage[1]").val();

        var corruglen = $('#palydetail tr').length;

        for (var i = 1; i <= corruglen; i++) {
            var pgsm = $("input[type='text'][name='txt_ppgsm[" + i + "\\]']").val();
            var cfact = $("input[type='text'][name='txt_ppfact[" + i + "\\]']").val();
            var pextracorr = $("input[type='text'][name='txt_pextracons[" + i + "\\]']").val();
            if (pgsm != '' && cfact != '' && pextracorr != '') {
                if (pgsm == 0) {
                    pgsm = 1;
                }
                if (cfact == 0) {
                    cfact = 1;
                }
                if (pextracorr == 0) {
                    pextracorr = 1;
                }
                var calcu = (((parseFloat(l) * parseFloat(b)) * (parseFloat(pgsm) / 100000) / 100) * parseFloat(cfact) * parseFloat(psheet));
                var kgfucorru = calcu.toFixed(0);
                $("input[type='text'][name='txt_pkgreq[" + i + "\\]']").val(kgfucorru);
            }
        }
    }

    alert();


}

function validations() {
    var boardcal = $('#padperdetail tr').length;
    var cuttable = $('#detailoptimize tr').length;
    var maintbl = $('#tbodygeneral tr').length;

    if (maintbl > 1) {
        for (var i = 1; i <= maintbl; i++) {
            var ups = $("#txt_upsvalmain\\["+ i +"\\]").val();
            if (ups == '' || ups == 0) {
                alert('Insert Gang Job Ups');
                $("#txt_upsvalmain\\["+ i +"\\]").focus();
                return 0;
            }
        }
    }

    for (var i = 1; i <= boardcal; i++) {
        var ups = $("#hdn_ups\\["+ i +"\\]").val();
        if (ups == '' || ups == 0) {
            alert('Insert Paper Board Ups');
            $("#hdn_ups\\["+ i +"\\]").focus();
            return 0;
        }
        if ($("#hdn_shreq\\["+ i +"\\]").prop("readonly") == false) {
            var Shrq = $("#hdn_shreq\\["+ i +"\\]").val();
            if (Shrq == '' || Shrq == 0) {
                alert('Enter Sheet Required Manually');
                $("#hdn_shreq\\["+ i +"\\]").focus();
                return 0;
            }
        }
    }

    if (boardcal > 1) {
        for (var i = 1; i <= boardcal; i++) {
            ShReqClick(i);
            var Shrq = $("#hdn_shreq\\["+ i +"\\]").val();
            if (Shrq == '' || Shrq == 0) {
                alert('Enter Sheet Required Manually');
                $("#hdn_shreq\\["+ i +"\\]").focus();
                return 0;
            }

        }
    }
}




function calulateWstge(check) {
    if ($("#chkrd_wastageper").prop("checked") == true) {
        var Param = "P";
    } else {
        var Param = "S";
    }
    if (check == 1) {
        var Param = "P";
    }
        
    var rtn = validations();
    if (rtn == 0) {
        return false;
    }
    
    var boardcal = $('#padperdetail tr').length;
    var cuttable = $('#detailoptimize tr').length;
    var maintbl = $('#tbodygeneral tr').length;

    var wastageper = $('#txt_wsagreamrksper').val();
    var WastageSheets = $('#txt_wassheet').val();
    
    var TotalWstgeSheet = 0;
    var GTotShReq = 0;
    var GTotTotalShReq = 0;
    var GTotCutsAftrWstge = 0;
    var LeftSumQty = 0;
     
    var totalupsvl = 0;
    var totalshreq = 0;
    var totalsh = 0;
    for (var i = 1; i <= cuttable; i++) {
        var txt_n = $("#txt_n\\[" + i + "\\]").val();
        var txt_ups = $("#txt_ups\\[" + i + "\\]").val();
        var Ups = $("#hdn_ups\\[" + i + "\\]").val();
        var txt_printqty = $("#txt_printqty\\[" + i + "\\]").val();
        var txt_fqty = $("#txt_fqty\\[" + i + "\\]").val();
        var hdn_shreq = $("#hdn_shreq\\[" + i + "\\]").val();
        var hdn_totalsh = $("#hdn_totalsh\\[" + i + "\\]").val();
        totalupsvl = parseInt(txt_n) * parseInt(txt_ups);
        totalsh = parseInt(Ups) * parseInt(hdn_totalsh);
        totalshreq = parseInt(Ups) * parseInt(hdn_shreq);
        // alert(totalsh);
        // alert(totalshreq);
        // if (totalupsvl != Ups) {
        //     alert("Opps...! Full Sheet Ups And Cut Sheet Ups Not Matching..!");
        //     return false;
        // }
        // if (totalshreq != txt_printqty) {
        //     alert("Sheet Req & Job Qty(With out wastage) Not Matching..!");
        //     return false;
        // }
        // if (txt_fqty != totalsh) {
        //     alert("Total Sheet & Final Qty(With wastage) Not Matching..!");
        //     return false;
        // }
    }
         
    var wastageperval = parseFloat(wastageper) / 100;
    var sumqty = 0;
    for (var i = 1; i <= maintbl; i++) {
        var printqty = $("#txt_printqty\\[" + i + "\\]").val();
        if (printqty == '' || printqty == 0) {
            var printqty = $("#txt_orderqty\\[" + i + "\\]").val();
            $("#txt_printqty\\[" + i + "\\]").val(printqty);
        }
        sumqty = parseInt(sumqty) + parseInt(printqty);
    }


    if (cuttable > 1) {

        if (boardcal == 1) {
            var totalups = 0;
            for (var i = 1; i <= cuttable; i++) {
                var Ups = $("#hdn_ups\\[" + i + "\\]").val();
                if (Ups == "") {
                    Ups = 0;
                }
                totalups = parseInt(totalups) + parseInt(Ups);
            }
            $("#txt_upsvalmain\\[1\\]").val(totalups);
        }
    }
    if (maintbl == 1 && boardcal == 1 && cuttable == 1) {
        var upscut = $("#hdn_ups\\[1\\]").val();
        $("#txt_upsvalmain\\[1\\]").val(upscut);
    }


    for (var i = 1; i <= boardcal; i++) {
        
        var ups = $("#hdn_ups\\[" + i + "\\]").val();
        if (ups == "") {
            ups = 0;
        }
        if ($("#hdn_shreq\\["+ i +"\\]").prop("readonly") == true) {
            var ShReq = parseFloat(sumqty) / parseFloat(ups);
            // var ShReqFxd = ShReq.toFixed(2);
            var ShReqFxd = Math.round(ShReq);
            $('#td_shreq' + i).text(ShReqFxd);
            $("#hdn_shreq\\["+ i +"\\]").val(ShReqFxd);
        } else {
            var ShReqFxd = $("#hdn_shreq\\["+ i +"\\]").val();
            $('#td_shreq' + i).text(ShReqFxd);
        }
        GTotShReq = parseInt(GTotShReq) + parseInt(ShReqFxd);


        if (Param == "P") {
            var WstgeSheet = parseFloat(wastageperval) * parseFloat(ShReqFxd);
            var WstgeSheetFxd = WstgeSheet.toFixed(0);
            TotalWstgeSheet = parseInt(TotalWstgeSheet) + parseInt(WstgeSheetFxd);
        } else {
            var WstgeSheetFxd = WastageSheets;
            TotalWstgeSheet = WastageSheets;
        }


        var TotalShReq = parseFloat(ShReqFxd) + parseFloat(WstgeSheetFxd);
        var TotalShReq = TotalShReq.toFixed(0);
        $('#td_totalsh' + i).text(TotalShReq);
        $("#hdn_totalsh\\[" + i + "\\]").val(TotalShReq);
        GTotTotalShReq = parseInt(GTotTotalShReq) + parseInt(TotalShReq);

        
        var paperdivfacter = $("#hdn_mmval\\[" + i + "\\]").val();
        var dackle = $("#hdn_dackle\\[" + i + "\\]").val();
        var hdn_grain = $("#hdn_grain\\[" + i + "\\]").val();
        var hdn_gsm = $("#hdn_gsm\\[" + i + "\\]").val();
        var total = (parseFloat(TotalShReq) * (parseFloat((parseFloat(dackle) * parseFloat(paperdivfacter)) / 100) * parseFloat((parseFloat(parseFloat(hdn_grain) * parseFloat(paperdivfacter)) / 100)) * parseFloat(parseFloat(hdn_gsm) / 100)));
        var KgQty = parseFloat(total) / 1000;
        var KgQtyFxd = KgQty.toFixed(2);
        $('#td_kgqty' + i).text(KgQtyFxd);
        $("#hdn_kgqty\\[" + i + "\\]").val(KgQtyFxd);


        var hdn_BoardRowNo = $("#hdn_mothrrow\\["+ i +"\\]").val();

        // Cuts Table Calculation
        for (var j = 1; j <= cuttable; j++) {

            var hdn_CutsRowNo = $("#hdn_mothrrowval\\[" + j + "\\]").val();
            if (hdn_BoardRowNo == hdn_CutsRowNo) {

                var Cuts = $("#txt_n\\[" + j + "\\]").val();

                var CutsBfWstge = parseFloat(ShReq) * parseFloat(Cuts);
                var CutsBfWstgeFxd = CutsBfWstge.toFixed(0);
                $("#txt_c_shbeforews\\[" + j + "\\]").val(CutsBfWstgeFxd);
                
                var CutsAftrWstge = parseFloat(TotalShReq) * parseFloat(Cuts);
                var CutsAftrWstgeFxd = CutsAftrWstge.toFixed(0);
                $("#txt_wastage\\[" + j + "\\]").val(CutsAftrWstgeFxd);

                GTotCutsAftrWstge = parseInt(GTotCutsAftrWstge) + parseInt(CutsAftrWstgeFxd);
            }

        }


    }

    // Single Job not Gang Job
    if (maintbl == 1) {
        // alert();
        var GangUps = $("#txt_upsvalmain\\[1\\]").val();
        var FinalQty = parseFloat(GTotCutsAftrWstge) * parseFloat(GangUps);
        var FinalQtyFxd = FinalQty.toFixed(0);
        $("#txt_fqty\\[1\\]").val(FinalQtyFxd);
    }
    
    if (maintbl > 1 && boardcal == 1) {
        var TotalShReq = $("#hdn_totalsh\\[1\\]").val();
        for (var i = 1; i <= maintbl; i++) {
        var GangJobUps = $("#txt_upsvalmain\\[" + i + "\\]").val();
            if (GangJobUps == '' || GangJobUps == 0) {
            alert("Please insert Gang Job Ups");
            return false;
            } else {
            $("#txt_fqty\\[" + i + "\\]").val(parseInt(TotalShReq) * parseInt(GangJobUps));
            }
        }
    }


    if (Param == "P") {
        $('#txt_wassheet').val(TotalWstgeSheet);
    } else {
        // alert(TotalWstgeSheet);
        // alert(GTotShReq);
        var WstgePer = (parseInt(TotalWstgeSheet) * 100) / GTotShReq;
        var WstgePerFxd = WstgePer;
        $('#txt_wsagreamrksper').val(WstgePerFxd);
        calulateWstge(1);
    }


}

function ShReqClick(lnk) {
    $("#hdn_shreq\\["+ lnk +"\\]").removeAttr("readonly");
    $("#hdn_shreq\\["+ lnk +"\\]").css("background", "white");
    $("#hdn_shreq\\["+ lnk +"\\]").parent("td").css("background", "white");
}


function raw_material_FC(j, ProcessName, var1, var2, var3, var4, var5, var6, var7, var8, var9, var10) {
    $('#tbl_rawmaterial').append("<tr>\n\
                          <td><input type='text' name='txt_rawmaterial[" + j + "]' id='txt_rawmaterial[" + j + "]'  value='" + ProcessName + " -" + var1 + "'></td>\n\
                                <td hidden><input type='text' name='txt_Details[" + j + "]' id='txt_Details[" + j + "]'></td>\n\
                                <td><input type='text' name='txt_apprx[" + j + "]' id='txt_apprx[" + j + "]' value= " + var2 + "></td>\n\
                                <td><input type='text' name='txt_otherdetail[" + j + "]' id='txt_otherdetail[" + j + "]'></td>\n\
                                <td><input type='text' name='txt_unit[" + j + "]' id='txt_unit[" + j + "]' value='Kg'></td>\n\
                                <td><input type='checkbox' name='txt_requestocc[" + j + "]' id='txt_requestocc[" + j + "]'></td>\n\
                                <td><input type='hidden' name='txt_materialsta[" + j + "]' id='txt_materialsta[" + j + "]'>\n\
                                <input type='text' name='txt_materialsta_desc[" + j + "]' id='txt_materialsta_desc[" + j + "]'></td>\n\
                                <td><input type='text' name='txt_qtyall[" + j + "]' id='txt_qtyall[" + j + "]'></td>\n\
                                <td hidden><input type='text' name='txt_imr[" + j + "]' id='txt_imr[" + j + "]'></td>\n\
                                <td hidden><input type='text' name='txt_olditemid[" + j + "]' id='txt_olditemid[" + j + "]' value='" + var4 + "'></td>\n\
                                <td hidden><input type='text' name='txt_oldmatrial[" + j + "]' id='txt_oldmatrial[" + j + "]'></td>\n\
                                <td hidden><input type='text' name='txt_recordid[" + j + "]' id='txt_recordid[" + j + "]'></td>\n\
                                <td hidden><input type='text' name='txt_allcatidid[" + j + "]' id='txt_allcatidid[" + j + "]'  value='" + var4 + "'></td>\n\
                                <td><input type='text' name='txt_allocatmater[" + j + "]' id='txt_allocatmater[" + j + "]'></td>\n\
                                <td hidden><input type='text' name='txt_Prid[" + j + "]' id='txt_Prid[" + j + "]' value=" + var3 + "></td>\n\
                                <td><input type='text' name='txt_processta[" + j + "]' id='txt_processta[" + j + "]'></td>\n\
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
                            </tr>");
}