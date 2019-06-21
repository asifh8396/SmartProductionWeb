jQuery('.numbersOnly').keyup(function () {this.value = this.value.replace(/[^0-9\.]/g, '');});

$(document).ready(function(){
	$('.datepickerr').datepicker({"setDate": new Date(),"autoclose": true,"format": "dd/mm/yyyy",todayHighlight: true});

    setTimeout(function(){ $("#flashmsg").hide(); }, 7000);

	$("#chk_secondaryTransport").change(function () {
        if ($("#chk_secondaryTransport").is(':checked')) {
            $("#div_SecondaryTr").css("display", "block");
        } else {
            $("#div_SecondaryTr").css("display", "none");
        }
    });

	var TDocID = $("#hdn_param").val();
    if (TDocID !== "") {
    	modifyTransEntry(TDocID);
    }
});
function getVehicleNo(lnk) {
	if (lnk == 1) {
		var TransName = $("#drp_trans_name_1").val();
	} else {
		var TransName = $("#drp_trans_name_2").val();
	}

	$.ajax({
		type: "POST",
		async: false,
		url: surl+"Transporter/getVehicleNo_show",
		data: {TransName:TransName},
		beforeSend: function () {
			$.blockUI();
		},
		complete: function () {
			$.unblockUI();
		},
		success: function (res) {
			var data = jQuery.parseJSON(res);
			if (lnk == 1) {
				$("#drp_vehicleno_1").empty();
				$("#drp_vehicleno_1").append('<option value="">---Select Vehicle Number---</option>');
				for (var i = 0; i < data.length; i++) {
					$("#drp_vehicleno_1").append("<option value='"+ data[i].Id +"'>"+ data[i].Vechile_no +"</option>");
				}
			} else {
				for (var i = 0; i < data.length; i++) {
					$("#drp_vehicleno_2").append("<option value='"+ data[i].Id +"'>"+ data[i].Vechile_no +"</option>");
				}
			}

		},
		error: function(res) {
			$.unblockUI();
			alert("Error in getVehicleNo_show("+ lnk +")-> " + res.responseText);
		}
	});
	
}

function getInvData() {
	var FromDate = $('#txt_fdate').val();
	if (FromDate !== "") {
		var arr = FromDate.split('/');
        var FromDate = arr[2] + '-' + arr[1] + '-' + arr[0];
	}
    var ToDate = $('#txt_tdate').val();
	if (ToDate !== "") {
		var arr = ToDate.split('/');
        var ToDate = arr[2] + '-' + arr[1] + '-' + arr[0];
	}

	$.ajax({
		type: "POST",
		url: surl+"Transporter/getInvData_show",
		data: {FromDate:FromDate,ToDate:ToDate},
		beforeSend: function () {
			$("#tbody_pop_invlist").empty();
			$.blockUI();
		},
		complete: function () {
			$.unblockUI();
		},
		success: function (res) {
			var data = jQuery.parseJSON(res);
			for (var i = 0; i < data.length; i++) {
                $('#tbody_pop_invlist').append("<tr>\n\
                	<td style='text-align:center;'><input type='checkbox' name='chk_newpop_all[" + i + "]' id='chk_newpop_all[" + i + "]'></td>\n\
	                <td>\n\
	                	<input type='hidden' name='hdn_newpop_docid[" + i + "]' id='hdn_newpop_docid[" + i + "]' value=" + data[i].Docid + ">\n\
	                " + data[i].Invno + "</td>\n\
	                <td>" + data[i].InvDate + "</td>\n\
	                <td>" + data[i].Inv_amt + "</td>\n\
	                <td>" + data[i].companyname + "</td>\n\
                </tr>");
            }
            $("#myModalSelectInvoice").modal("toggle");
			
		},
		error: function(res) {
			$.unblockUI();
			alert("Error in getInvData_show()-> " + res.responseText);
		}
	});
}

function selected_Invoices() {

    var string = "";
    for (var i = 0; i < $('#tbody_pop_invlist tr').length; i++) {
        if ($('#chk_newpop_all\\['+ i +'\\]').is(":checked") == true) {
            var clientid = $('#hdn_newpop_docid\\['+ i +'\\]').val();
            console.log(i + ": " +clientid);
            string += "('" + clientid + "'),";
        }
    }
    var strdata = string.substring(0, string.length - 1);
    if (strdata != '') {

    	$.ajax({
			type: "POST",
			url: surl+"Transporter/selected_Invoices_show",
			data: {strdata:strdata},
			beforeSend: function () {
				// $("#tbody_details").empty();
				$.blockUI();
			},
			complete: function () {
				$.unblockUI();
			},
			success: function (res) {
				var main = jQuery.parseJSON(res);
				var tbody_len = $('#tbody_details tr').length;
                if (tbody_len == '' && tbody_len == 0) {
                    var b = 1;
                } else {
                    var b = parseInt(tbody_len) + parseInt(1);
                }
                for (var i = 0; i < main.length; i++) {
                    $('#tbody_details').append("<tr>\n\
                        <td>\n\
                            <input type='hidden' name='hdn_detination[" + b + "]' id='hdn_detination[" + b + "]' value='" + main[i].Transportationper + "'>\n\
                            <input type='hidden' name='hdn_TDocid[" + b + "]' id='hdn_TDocid[" + b + "]' >\n\
                            <input type='hidden' name='hdn_TDetailid[" + b + "]' id='hdn_TDetailid[" + b + "]' >\n\
                            <input type='hidden' name='hdn_docid[" + b + "]' id='hdn_docid[" + b + "]' value='" + main[i].Docid + "'>\n\
                            " + main[i].Invno + "\n\
                        </td>\n\
                        <td>" + main[i].InvDate + "</td>\n\
                        <td><input type='text' value='" + main[i].companyname + "' style='background-color:transparent;border: none;width:100%;' readonly></td>\n\
                        <td><input type='text' value='" + main[i].shipadd + "' style='background-color:transparent;border: none;width:100%;' readonly></td>\n\
                        <td>\n\
                            <input type='hidden' name='hdn_InvoiceAmount[" + b + "]' id='hdn_InvoiceAmount[" + b + "]' value='" + main[i].Inv_amt + "'>\n\
                            " + main[i].Inv_amt + "\n\
                        </td>\n\
                        <td>\n\
                            <input type='hidden' name='hdn_frieght_primary[" + b + "]' id='hdn_frieght_primary[" + b + "]'>\n\
                            <input type='text' name='txt_totalcharge[" + b + "]' id='txt_totalcharge[" + b + "]'  value='' readonly class='form-control controlmy'>\n\
                        </td>\n\
                        <td>\n\
                            <input type='hidden' name='hdn_hamali_primary[" + b + "]' id='hdn_hamali_primary[" + b + "]'>\n\
                            <input type='text' name='txt_HamaliCharges[" + b + "]' id='txt_HamaliCharges[" + b + "]' value='' readonly class='form-control controlmy'>\n\
                        </td>\n\
                        <td>\n\
                            <input type='hidden' name='hdn_detiation_primary[" + b + "]' id='hdn_detiation_primary[" + b + "]'>\n\
                            <input type='text' name='txt_detiationcharge[" + b + "]' id='txt_detiationcharge[" + b + "]' value='' readonly class='form-control controlmy'>\n\
                        </td>\n\
                        <td>\n\
                            <input type='text' name='txt_fright[" + b + "]' id='txt_fright[" + b + "]' value='" + main[i].Freight + "' readonly class='form-control controlmy'>\n\
                        </td>\n\
                        <td style='text-align:center;'><input type='checkbox' name='chk_selected[" + b + "]' id='chk_selected[" + b + "]' onclick='return hcharges();' checked></td>\n\
                        <td><label id='lbl_cal" + b + "'></label></td>\n\
                        <td style='text-align:center;'><input type='checkbox' id='chk_secondary[" + b + "]' name='chk_secondary[" + b + "]'  onclick='return costvechile();'></td>\n\
                    </tr>");
                    b++;
                }
                
                costvechile();

                $("#myModalSelectInvoice").modal("toggle");
			},
			error: function(res) {
				$.unblockUI();
				alert("Error in selected_Invoices_show()-> " + res.responseText);
			}
		});
    }

}

function costvechile() {
    var txt_costvechile = $('#txt_trans_cost_1').val();
    var txt_hcharge = $('#txt_hamali_ch_1').val();
    var txt_detinationchr = $('#txt_detenation_ch_1').val();
    var tbody_detial = $('#tbody_details tr').length;

    var totalamount = 0;
    for (var i = 1; i <= tbody_detial; i++) {
        var amount = $("#hdn_InvoiceAmount\\[" + i + "\\]").val();
        totalamount += parseFloat(amount);
    }
    var totalamountaas = totalamount;

    for (var i = 1; i <= tbody_detial; i++) {
        var amoutn = $("#hdn_InvoiceAmount\\[" + i + "\\]").val();
        var frigth = (parseFloat(txt_costvechile) * parseFloat(amoutn)) / parseFloat(totalamountaas);
        var hamout_val = (parseFloat(txt_hcharge) * parseFloat(amoutn)) / parseFloat(totalamountaas);

        var hdn_detination = $("#hdn_detination\\[" + i + "\\]").val();

        var detetaioniomamout_val = (parseFloat(txt_detinationchr) * parseFloat(amoutn)) / parseFloat(totalamountaas);


        var Actualtransper = (parseFloat(frigth) / parseFloat(amoutn)) * 100;
        // var clienttranspr = $("input[type='hidden'][name='hdn_detination[" + i + "\\]']").val();
        var Actualtransperval = Actualtransper.toFixed(2);

        var lblcalval = (parseFloat(hdn_detination) * parseFloat(amoutn)) / parseFloat(100);

        var lblcal = lblcalval.toFixed(2);
        var frigthval1 = frigth.toFixed(0);
        var hamout_val1 = hamout_val.toFixed(0);
        var detetaioniom_val = detetaioniomamout_val.toFixed(0);
        if (isNaN(frigthval1)) {
            frigthval1 = 0;
        }
        if (isNaN(hamout_val1)) {
            hamout_val1 = 0;
        }
        if (isNaN(detetaioniom_val)) {
            detetaioniom_val = 0;
        }

        $("#hdn_frieght_primary\\[" + i + "\\]").val(frigthval1);
        $("#txt_totalcharge\\[" + i + "\\]").val(frigthval1);
        
        $("#hdn_hamali_primary\\[" + i + "\\]").val(hamout_val1);
        $("#txt_HamaliCharges\\[" + i + "\\]").val(hamout_val1);
        
        $("#hdn_detiation_primary\\[" + i + "\\]").val(detetaioniom_val);
        $("#txt_detiationcharge\\[" + i + "\\]").val(detetaioniom_val);
        $('#lbl_cal' + i).text(lblcal);
    }
    hcharges();
}


function hcharges() {
    var txt_costvechile = $('#txt_trans_cost_1').val();
    var txt_hcharge = $('#txt_hamali_ch_1').val();
    var txt_detinationchr = $('#txt_detenation_ch_1').val();
    var tbody_detial = $('#tbody_details tr').length;

    var totalamout_vechile = 0;
    var totalamout_vechile1 = 0;
    var totalamount = 0;
    var totalamount1 = 0;
    for (var i = 1; i <= tbody_detial; i++) {
        var checkall = $("#chk_selected\\[" + i + "\\]").is(":checked");
        if (checkall == true) {
            var amount = $("#hdn_InvoiceAmount\\[" + i + "\\]").val();
            totalamount += parseFloat(amount);
        }
        var amount1 = $("#hdn_InvoiceAmount\\[" + i + "\\]").val();
        totalamount1 += parseFloat(amount1);
    }
    var totalamountaas = totalamount;
    var k = 1;

    for (var i = 1; i <= tbody_detial; i++) {
        var checkall = $("#chk_selected\\[" + i + "\\]").is(":checked");
        var hdn_detination = $("#hdn_detination\\[" + i + "\\]").val();
        var amoutn_val = $("#hdn_InvoiceAmount\\[" + i + "\\]").val();

        if (checkall == true) {
            var amoutn = $("#hdn_InvoiceAmount\\[" + i + "\\]").val();
            var hamout_val = (parseFloat(txt_hcharge) * parseFloat(amoutn)) / parseFloat(totalamountaas);
            var detetaioniomamout_val = (parseFloat(txt_detinationchr) * parseFloat(amoutn)) / parseFloat(totalamountaas);
            var hamout_val1 = hamout_val.toFixed(0);
            var detetaioniom_val = detetaioniomamout_val.toFixed(0);
            if (isNaN(hamout_val1)) {
                hamout_val1 = 0;
            }
            if (isNaN(detetaioniom_val)) {
                detetaioniom_val = 0;
            }
            $("#txt_HamaliCharges\\[" + i + "\\]").val(hamout_val1);
            $("#txt_detiationcharge\\[" + i + "\\]").val(detetaioniom_val);
        } else {
            var frigth = (parseFloat(txt_costvechile) * parseFloat(amoutn_val)) / parseFloat(totalamount1);
            var frigthval1 = frigth.toFixed(0);
            if (isNaN(frigthval1)) {
                frigthval1 = 0;
            }
            
            $("#hdn_hamali_primary\\[" + i + "\\]").val(0);
            $("#hdn_frieght_primary\\[" + i + "\\]").val(frigthval1);
            $("#hdn_detiation_primary\\[" + i + "\\]").val(0);

            $("#txt_HamaliCharges\\[" + i + "\\]").val(0);
            $("#txt_totalcharge\\[" + i + "\\]").val(frigthval1);
            $("#txt_detiationcharge\\[" + i + "\\]").val(0);
        }
        var lblcalval = (parseFloat(hdn_detination) * parseFloat(amoutn_val)) / parseFloat(100);

        var lblcal = lblcalval.toFixed(2);
        $('#lbl_cal' + i).text(lblcal);
        totalamout_vechile1 = parseFloat(totalamout_vechile1) + parseFloat(lblcalval);
        $('#hdn_totalamout_vechile1').val(totalamout_vechile1);
        
    }
    var totalamout_vechiletapan = $('#hdn_totalamout_vechile1').val();
    if (txt_costvechile < totalamout_vechiletapan) {

        document.getElementById("txt_trans_cost_1").style.backgroundColor = "red";
    }
    else {
        document.getElementById("txt_trans_cost_1").style.backgroundColor = "lightgreen";
    }
    costvechile_secondary();
}


function costvechile_secondary() {

    var txt_costvechile = $('#txt_trans_cost_2').val();
    if (txt_costvechile == '') {
        txt_costvechile = 0;
    }

    var txt_hcharge = $('#txt_hamali_ch_2').val();
    if (txt_hcharge == '') {
        txt_hcharge = 0;
    }

    var txt_detinationchr = $('#txt_detenation_ch_2').val();
    if (txt_detinationchr == '') {
        txt_detinationchr = 0;
    }

    var tbody_detial = $('#tbody_details tr').length;

    var totalamount = 0;
    for (var i = 1; i <= tbody_detial; i++) {
        var checksecondary = $("#chk_secondary\\[" + i + "\\]").is(":checked");
        if (checksecondary == true) {
            var amount = $("#hdn_InvoiceAmount\\[" + i + "\\]").val();
            totalamount += parseFloat(amount);
        }
    }

    var totalamountaas = totalamount;

    for (var i = 1; i <= tbody_detial; i++) {
        var amoutn = $("#hdn_InvoiceAmount\\[" + i + "\\]").val();
        var checksecondary1 = $("#chk_secondary\\[" + i + "\\]").is(":checked");
        var frigth = 0;
        var hamout_val = 0;
        var detetaioniomamout_val = 0;

        var frieght_primary = parseFloat($("#txt_totalcharge\\[" + i + "\\]").val());
        var hamout_primary = parseFloat($("#txt_HamaliCharges\\[" + i + "\\]").val());
        var detiation_primary = parseFloat($("#txt_detiationcharge\\[" + i + "\\]").val());
        if (checksecondary1 == true) {
            frigth = (parseFloat(txt_costvechile) * parseFloat(amoutn)) / parseFloat(totalamountaas);
            hamout_val = (parseFloat(txt_hcharge) * parseFloat(amoutn)) / parseFloat(totalamountaas);
            detetaioniomamout_val = (parseFloat(txt_detinationchr) * parseFloat(amoutn)) / parseFloat(totalamountaas);
            frigth = frieght_primary + frigth;
            hamout_val = hamout_primary + hamout_val;
            detetaioniomamout_val = detiation_primary + detetaioniomamout_val;
        } else {
            frigth = frieght_primary;
            hamout_val = hamout_primary;
            detetaioniomamout_val = detiation_primary;
        }

        var hdn_detination = $("#hdn_detination\\[" + i + "\\]").val();

        var Actualtransper = (parseFloat(frigth) / parseFloat(amoutn)) * 100;
        var Actualtransperval = Actualtransper.toFixed(2);

        var lblcalval = (parseFloat(hdn_detination) * parseFloat(amoutn)) / parseFloat(100);

        var lblcal = lblcalval.toFixed(2);
        var frigthval1 = frigth.toFixed(0);
        var hamout_val1 = hamout_val.toFixed(0);
        var detetaioniom_val = detetaioniomamout_val.toFixed(0);
        if (isNaN(frigthval1)) {
            frigthval1 = 0;
        }
        if (isNaN(hamout_val1)) {
            hamout_val1 = 0;
        }
        if (isNaN(detetaioniom_val)) {
            detetaioniom_val = 0;
        }

        $("#txt_totalcharge\\[" + i + "\\]").val(frigthval1);
        $("#txt_HamaliCharges\\[" + i + "\\]").val(hamout_val1);
        $("#txt_detiationcharge\\[" + i + "\\]").val(detetaioniom_val);
        $('#lbl_cal' + i).text(lblcal);
        
    }
}


function submitform() {
    var tbody_detial = $('#tbody_details tr').length;
    if (tbody_detial == 0) {
        alertModal("Please Select Invoices !!");
        return false;
    }
    var transNm1 = $("#drp_trans_name_1").val();
    if (transNm1 == "" || transNm1 == null) {
        alertModal("Please Select Primary Transporter !!");
        return false;
    }
    // var vehicleno1 = $("#drp_vehicleno_1").val();
    // if (transNm1 != "") {
    //     if (vehicleno1 == "" || vehicleno1 == null) {
    //         alertModal("Please Select Primary Vehicle Number !!");
    //         return false;
    //     }
    // }

    if ($("#chk_secondaryTransport").is(":checked") == true) {
        var transNm2 = $("#drp_trans_name_2").val();
        if (transNm2 == "" || transNm2 == null) {
            alertModal("Please Select Secondary Transporter !!");
            return false;
        }
        // var vehicleno2 = $("#drp_vehicleno_2").val();
        // if (transNm2 != "" || transNm2 != null) {
        //     if (vehicleno2 == "" || vehicleno2 == null) {
        //         alertModal("Please Select Secondary Vehicle Number !!");
        //         return false;
        //     }
        // }

        var chkflag = 0;
        for (var i = 1; i <= $("#tbody_details tr").length; i++) {
            var chk = $("#chk_secondary\\["+ i +"\\]").is(":checked");
            if (chk == true) {
                chkflag = 1;
                break;
            }
        }
        if (chkflag == 0) {
            alertModal("Please Select Atleast 1 Invoice for Secondary Transporter !!","","400px");
            return false;
        }
    }

    // alertModal("ok");
	
	$("#myform").submit();
}

function modifyTransEntry(TDocid) {
	$.ajax({
		type: "POST",
		url: surl+"Transporter/modifyTransEntry_show",
		data: {TDocid:TDocid},
		beforeSend: function () {
			$.blockUI();
		},
		complete: function () {
			$.unblockUI();
		},
		success: function (res) {
			var main = jQuery.parseJSON(res);

			$('#txt_remarks').val(main[0].remarks);
			$('#txt_despatch_date').val(main[0].DespatchDate);

            $('#drp_trans_mode_1').val(main[0].modeoftransport);
            $('#drp_trans_name_1').val(main[0].Transporterid);
            getVehicleNo(1);
            $('#drp_vehicleno_1').val(main[0].vehicleid);
            $('#txt_trans_cost_1').val(main[0].mvehicleamt);
            $('#txt_hamali_ch_1').val(main[0].mhamaliamt);
            $('#txt_detenation_ch_1').val(main[0].mdetenationamt);
            $('#txt_lr_no_1').val(main[0].LRNo);
            $('#txt_lr_date_1').val(main[0].LRDate);
            $('#txt_bill_no_1').val(main[0].bill_no);
            $('#txt_docdate_1').val(main[0].bill_date);

            var is_secondary = main[0].is_secondary;
            if (is_secondary == '1') {
                $('#chk_secondaryTransport').attr("checked", "checked");
                $("#div_SecondaryTr").css("display", "block");
                $('#drp_trans_mode_2').val(main[0].secondary_modeoftransport);
                $('#drp_trans_name_2').val(main[0].secondary_Transporterid);
                getVehicleNo(2);
                $('#drp_vehicleno_2').val(main[0].secondary_vehicleid);
                $('#txt_trans_cost_2').val(main[0].msecondary_vehicleamt);
                $('#txt_hamali_ch_2').val(main[0].msecondary_hamaliamt);
                $('#txt_detenation_ch_2').val(main[0].msecondary_detenationamt);
                $('#txt_lr_no_2').val(main[0].Secondary_LRNo);
                $('#txt_lr_date_2').val(main[0].Secondary_LR_date);
                $('#txt_bill_no_2').val(main[0].Secondary_bill_no);
                $('#txt_docdate_2').val(main[0].Secondary_bill_date);
            }			

			$("#tbody_details").empty();
			var b = 1;
            for (var i = 0; i < main.length; i++) {

                if (main[i].ishamalicharge == 1) {
                    ishamalicharg = 'checked="checked"';
                } else {
                    ishamalicharg = '';
                }

                if (main[i].secondary_detail == 1) {
                    secondrydetail = 'checked="checked"';
                } else {
                    secondrydetail = '';
                }

                $('#tbody_details').append("<tr>\n\
                    <td>\n\
                        <input type='hidden' name='hdn_detination[" + b + "]' id='hdn_detination[" + b + "]' value='" + main[i].Ctransporationper + "'>\n\
                        <input type='hidden' name='hdn_TDocid[" + b + "]' id='hdn_TDocid[" + b + "]' value='" + main[i].TDocid + "'>\n\
                        <input type='hidden' name='hdn_TDetailid[" + b + "]' id='hdn_TDetailid[" + b + "]' value='" + main[i].ID + "'>\n\
                        <input type='hidden' name='hdn_docid[" + b + "]' id='hdn_docid[" + b + "]' value='" + main[i].Docid + "'>\n\
                        " + main[i].invno + "\n\
                    </td>\n\
                    <td>" + main[i].invdate + "</td>\n\
                    <td><input type='text' value='" + main[i].companyname + "' style='background-color:transparent;border: none;width:100%;' readonly></td>\n\
                    <td><input type='text' value='" + main[i].shipadd + "' style='background-color:transparent;border: none;width:100%;' readonly></td>\n\
                    <td>\n\
                        <input type='hidden' name='hdn_InvoiceAmount[" + b + "]' id='hdn_InvoiceAmount[" + b + "]' value='" + main[i].Inv_amt + "'>\n\
                        " + main[i].Inv_amt + "\n\
                    </td>\n\
                    <td>\n\
                        <input type='hidden' name='hdn_frieght_primary[" + b + "]' id='hdn_frieght_primary[" + b + "]' value='" + main[i].freightamt + "'>\n\
                        <input type='text' name='txt_totalcharge[" + b + "]' id='txt_totalcharge[" + b + "]' value='" + main[i].total_frieghtamt + "' readonly class='form-control controlmy'>\n\
                    </td>\n\
                    <td>\n\
                        <input type='hidden' name='hdn_hamali_primary[" + b + "]' id='hdn_hamali_primary[" + b + "]' value='" + main[i].hamaliamt + "'>\n\
                        <input type='text' name='txt_HamaliCharges[" + b + "]' id='txt_HamaliCharges[" + b + "]' value='" + main[i].Total_hamaliamt + "' readonly class='form-control controlmy'>\n\
                    </td>\n\
                    <td>\n\
                        <input type='hidden' name='hdn_detiation_primary[" + b + "]' id='hdn_detiation_primary[" + b + "]' value='" + main[i].detenationamt + "'>\n\
                        <input type='text' name='txt_detiationcharge[" + b + "]' id='txt_detiationcharge[" + b + "]' value='" + main[i].total_detenationamt + "' readonly class='form-control controlmy'>\n\
                    </td>\n\
                    <td>\n\
                        <input type='text' name='txt_fright[" + b + "]' id='txt_fright[" + b + "]' value='" + main[i].Freight + "' readonly class='form-control controlmy'>\n\
                    </td>\n\
                    <td style='text-align:center;'><input type='checkbox' name='chk_selected[" + b + "]' id='chk_selected[" + b + "]' "+ ishamalicharg +" onclick='return hcharges();' checked></td>\n\
                    <td><label id='lbl_cal" + b + "'></label></td>\n\
                    <td style='text-align:center;'><input type='checkbox' id='chk_secondary[" + b + "]' name='chk_secondary[" + b + "]' "+ secondrydetail +" onclick='return costvechile();'></td>\n\
                </tr>");
                b++;
            }
            $('#btn_submit').val('Update');
            
            costvechile();

		},
		error: function(res) {
			$.unblockUI();
			alert("Error in modifyTransEntry_show()-> " + res.responseText);
		}
	});
}

function addNewVehicle() {
    $("#hdn_transporterID").val($("#drp_trans_name_1").val());
    $("#myModaladdNewVehicle").modal("toggle");
}

function saveNewVehicle() {
    var TrID = $("#hdn_transporterID").val();
    if (TrID == "") {
        alertModal("Please select Transporter !!");
        return false;
    }

    $.ajax({
        type: "POST",
        url: surl+"Transporter/addNewVehicleUtility",
        data: $("#form_addNewVehicle").serialize(),
        beforeSend: function () {
            $.blockUI();
        },
        complete: function () {
            $.unblockUI();
        },
        success: function (res) {
            if (res == 1) {
                alertModal("Vehicle Added Successfully !!");
                $("#myModaladdNewVehicle").modal("toggle");
            } else {
                alertModal("Error in new Vehicle addition !!");
            }
            
        },
        error: function(res) {
            $.unblockUI();
            alert("Error in addNewVehicleUtility()-> " + res.responseText);
        }
    });
}