function Searchkld(e,txt, table) {
	if (e.which == 13) {
		var term = $("#" + txt).val().toLowerCase().replace(/ /g, '');
		if (term != "") {
		$("#" + table + " tr").each(function () {
			if ($(this).is(":visible")) {
				var n = $(this).find("td").text();
				var n = n.toLowerCase();
				var n = n.replace(/ /g, '');
				var n = n.replace(/\n/g, '');
				// var n = $(this).find("td").text().toLowerCase().split(" ").join("").search(term);
				// var n = $(this).find("td").text().toLowerCase().search(term);
				if (n.indexOf(term) > -1) {
					$(this).show();
					$("#" + txt).select();
				} else {
					$(this).hide();
				}
			}
		});
		} else {
			$("#" + table + " tr").show();
		}
	}
}

function Searchkld_li(e,txt, table) {
	if (e.which == 13) {
		var term = $("#" + txt).val().toLowerCase().replace(/ /g, '');
		if (term != "") {
			$("#" + table + " li").each(function () {
				if ($(this).is(":visible")) {
					var n = $(this).find("p").text();
					var n = n.toLowerCase();
					var n = n.replace(/ /g, '');
					var n = n.replace(/\n/g, '');
					// var n = $(this).find("td").text().toLowerCase().split(" ").join("").search(term);
					// var n = $(this).find("td").text().toLowerCase().search(term);
					if (n.indexOf(term) > -1) {
						$(this).show();
						$("#" + txt).select();
					} else {
						$(this).hide();
					}
				}
			});
		} else {
			$("#" + table + " li").show();
		}
	}
}

function Search(e, txt, tbody) {
	var code = (e.keyCode ? e.keyCode : e.which);
	if(code == 13) { //Enter keycode
	    
		var term1 = $("#" + txt).val();
		var term = term1.toLowerCase();

		if (term != "") {
			$("#" + tbody + " tr").hide();
			$("#" + tbody + " td").filter(function () {
				return $(this).text().toLowerCase().indexOf(term) > -1
			}).parent("tr").show();
		} else {
			$("#" + tbody + " tr").show();
		}
	}
}

function MY_AJAXX(Purl,Pdata) {
	$.ajax({
        url: Purl,
        type: "POST",
        dataType: "JSON",
        data: Pdata,
        beforeSend: function () {
            $.blockUI();
        },
        complete: function () {
            $.unblockUI();
        },
        success: function (res) {
            return "Behlah";
        },
        error: function (res) {
            $.unblockUI();
            //alertModal("Error Occurred in WO Details in Specs Popup, try again.!!");
            //console.log(res.responseText);
            return false;
        }
    });
}
$(document).ready(function() {
    jQuery('.numbersOnly').keyup(function () { this.value = this.value.replace(/[^0-9\.]/g, ''); });
    setTimeout(function(){ $("#flashmsg").hide(); }, 6000);
//    $('.datetimepickerr').datetimepicker({"format": "DD/MM/YYYY hh:mm A",ignoreReadonly: true});
    $('.datepickerr').datepicker({"autoclose": true,"format": "dd/mm/yyyy",todayHighlight: true});
});