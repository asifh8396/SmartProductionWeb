function info1(val){
        $('#hdn_id_var').val(val);
        var hdn_baseprid = $("input[type='hidden'][name='hdn_baseprid[" + val + "\\]']").val();
        if(hdn_baseprid == 'FC' || hdn_baseprid == 'FL' || hdn_baseprid == 'WP' || hdn_baseprid == 'Pack' || hdn_baseprid == 'FF' || hdn_baseprid == 'Pa'){
        $('#btn_myModalinfo').click();
        $('#tbody_options').html('');
        $.ajax({
                type: "POST",
                url: "Jobcard/info1",
                data: {hdn_baseprid:hdn_baseprid}
            }).done(function (msg) {
                var main = jQuery.parseJSON(msg);
                var k =1;
                if(main!= false){
                for (var i = 0; i < main.length; i++) {
                $('#tbody_options').append("<tr onclick='return optionset("+k+")'>\n\
                    <td><input type='hidden' name='hdn_spid"+k+"' id='hdn_spid"+k+"' value='"+main[i].SPID+"'>\n\
                    <label id='lbl_description"+k+"'>"+main[i].Description +"</label></td></tr>");
                k++;
            }
        }else{
            $('#tbody_options').append("<tr><td>Data not abailable</td></tr>");
            }
        });
    }else{
        alert('Not able to open this');
    }
}
    

function info2(val){
    $('#hdn_id_var').val(val);
        var hdn_baseprid = $("input[type='hidden'][name='hdn_baseprid[" + val + "\\]']").val();
        if(hdn_baseprid == 'FC' || hdn_baseprid == 'FL' || hdn_baseprid == 'WP' || hdn_baseprid == 'Pack'){
        $('#btn_myModalinfo').click();
        $('#tbody_options').html('');
        $.ajax({
                type: "POST",
                url: "Jobcard/info2",
                data: {hdn_baseprid:hdn_baseprid}
            }).done(function (msg) {
                var main = jQuery.parseJSON(msg);
                var k =1;
                if(main!= false){
                for (var i = 0; i < main.length; i++) {
                $('#tbody_options').append("<tr onclick='return optionset2("+k+")'>\n\
                    <td><input type='hidden' name='hdn_spid"+k+"' id='hdn_spid"+k+"' value='"+main[i].SPID+"'>\n\
                    <label id='lbl_description"+k+"'>"+main[i].Description +"</label></td></tr>");
                k++;
            }
        }else{
            $('#tbody_options').append("<tr><td>Data not abailable</td></tr>");
            }
        });
    }else{
        alert('Not able to open this');
    }
}

function optionset(val){
    $('#myModalinfo').modal('hide');
    var id_var1 = $('#hdn_id_var').val();
    var spidvar1 = $('#hdn_spid'+val).val();
    var info1 = $('#lbl_description'+val).text();
    $("input[type='text'][name='txt_info1["+ id_var1 +"\\]']").val(info1);
    $("input[type='hidden'][name='hdn_var_id_info1["+ id_var1 +"\\]']").val(spidvar1);
}

function optionset2(val){
    $('#myModalinfo').modal('hide');
    var id_var2 = $('#hdn_id_var').val();
    var spidvar1 = $('#hdn_spid'+val).val();
    var info1 = $('#lbl_description'+val).text();
    $("input[type='text'][name='txt_info2["+ id_var2 +"\\]']").val(info1);
    $("input[type='hidden'][name='hdn_var_id_info2["+ id_var2 +"\\]']").val(spidvar1);
}

function showprocess(){
    var tbllen = $('#machinedetail tr').length;
    $('#btn_processshow').click();
    var pridin = '';
    var str = '';
    for(var i =1; i<=tbllen; i++){
        var prid = $("input[type='hidden'][name='hdn_baseprid["+ i +"\\]']").val();
        str ="'" + prid + "',";
        pridin = pridin + str;
    }
    var strdata1 = pridin.substring(0, pridin.length - 1);
    $('#tbody_proessdetail').html('');
            $.ajax({
                type: "POST",
                url: "Jobcard/processaddnew",
                data: {strdata1:strdata1}
            }).done(function (msg) {
                var main = jQuery.parseJSON(msg);
                var j=1;
                for(var i=0; i< main.length; i++){
                $('#tbody_proessdetail').append("<tr onclick='return setprocessval("+ j +")'>\n\
                    <td><input type='hidden' name='hdn_pridval"+j+"' id='hdn_pridval"+j+"' value=" + main[i].Prid + ">\n\
                    <label style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px;' id='lbl_prname"+ j +"'>" +  main[i].PrName + "</label></td></tr>");
                j++;
                }
    });           
}

function setprocessval(lnk){
    var prid = $('#hdn_pridval'+lnk).val();
    var prname = $('#lbl_prname'+lnk).text();
    var tbllen = $('#machinedetail tr').length;
    $('#myModalprocess').modal('hide');
    var currnrow = tbllen +1;
                        $('#machinedetail').append("<tr>\n\
                                <td style='font-size: 9px;background-color: #00FFFF;cursor: pointer; width: 1%; text-align: center;'><input type='checkbox' name='chk_delte["+currnrow+"]' id='chk_delte["+currnrow+"]' checked></td>\n\
                                <td onclick='return addprocess("+currnrow+");' style='background-color: #00FFFF;'>\n\
                                <input type='hidden' name='hdn_autoid["+ currnrow +"]'  id='hdn_autoid["+ currnrow +"]'>\n\
<input type='hidden' name='hdn_cutboarddim["+ currnrow +"]'  id='hdn_cutboarddim["+ currnrow +"]'>\n\
<input type='hidden' name='hdn_fullboardno["+ currnrow +"]'  id='hdn_fullboardno["+ currnrow +"]'>\n\
<input type='hidden' name='hdn_cutdimno["+ currnrow +"]'  id='hdn_cutdimno["+ currnrow +"]'>\n\
<input type='hidden' name='hdn_prqty["+ currnrow +"]'  id='hdn_prqty["+ currnrow +"]'>\n\
<input type='hidden' name='hdn_PlanUniqueID["+ currnrow +"]'  id='hdn_PlanUniqueID["+ currnrow +"]'>\n\
<input type='hidden' name='hdn_raw_id1["+ currnrow +"]'  id='hdn_raw_id1["+ currnrow +"]'>\n\
<input type='hidden' name='hdn_raw_id2["+ currnrow +"]'  id='hdn_raw_id2["+ currnrow +"]'>\n\
<input type='hidden' name='hdn_raw_id3["+ currnrow +"]'  id='hdn_raw_id3["+ currnrow +"]'>\n\
<input type='hidden' name='hdn_raw_id4["+ currnrow +"]'  id='hdn_raw_id4["+ currnrow +"]'>\n\
<input type='hidden' name='hdn_group_id1["+ currnrow +"]'  id='hdn_group_id1["+ currnrow +"]'>\n\
<input type='hidden' name='hdn_group_id2["+ currnrow +"]'  id='hdn_group_id2["+ currnrow +"]'>\n\
<input type='hidden' name='hdn_group_id3["+ currnrow +"]'  id='hdn_group_id3["+ currnrow +"]'>\n\
<input type='hidden' name='hdn_group_id4["+ currnrow +"]'  id='hdn_group_id4["+ currnrow +"]'>\n\
<input type='hidden' name='hdn_int_id_info1["+ currnrow +"]'  id='hdn_int_id_info1["+ currnrow +"]'>\n\
<input type='hidden' name='hdn_int_id_info2["+ currnrow +"]'  id='hdn_int_id_info2["+ currnrow +"]'>\n\
<input type='hidden' name='hdn_int_id_info3["+ currnrow +"]'  id='hdn_int_id_info3["+ currnrow +"]'>\n\
<input type='hidden' name='hdn_int_id_info4["+ currnrow +"]'  id='hdn_int_id_info4["+ currnrow +"]'>\n\
    <input type='hidden' name='hdn_var_id_info1["+ currnrow +"]'  id='hdn_var_id_info1["+ currnrow +"]'>\n\
    <input type='hidden' name='hdn_var_id_info2["+ currnrow +"]'  id='hdn_var_id_info2["+ currnrow +"]'>\n\
    <input type='hidden' name='hdn_var_id_info3["+ currnrow +"]'  id='hdn_var_id_info3["+ currnrow +"]'>\n\
    <input type='hidden' name='hdn_var_id_info4["+ currnrow +"]'  id='hdn_var_id_info4["+ currnrow +"]'>\n\
    <input type='hidden' name='hdn_dob_info1["+ currnrow +"]'  id='hdn_dob_info1["+ currnrow +"]'>\n\
    <input type='hidden' name='hdn_dob_info2["+ currnrow +"]'  id='hdn_dob_info2["+ currnrow +"]'>\n\
    <input type='hidden' name='hdn_dob_info3["+ currnrow +"]'  id='hdn_dob_info3["+ currnrow +"]'>\n\
    <input type='hidden' name='hdn_dob_info4["+ currnrow +"]'  id='hdn_dob_info4["+ currnrow +"]'>\n\
    <input type='hidden' name='hdn_dob_info5["+ currnrow +"]'  id='hdn_dob_info5["+ currnrow +"]'>\n\
    <input type='hidden' name='hdn_dob_info6["+ currnrow +"]'  id='hdn_dob_info6["+ currnrow +"]'>\n\
    <input type='hidden' name='hdn_dob_info7["+ currnrow +"]'  id='hdn_dob_info7["+ currnrow +"]'>\n\
    <input type='hidden' name='hdn_dob_info8["+ currnrow +"]'  id='hdn_dob_info8["+ currnrow +"]'>\n\
    <input type='hidden' name='hdn_dob_info9["+ currnrow +"]'  id='hdn_dob_info9["+ currnrow +"]'>\n\
    <input type='hidden' name='hdn_baseprid["+ currnrow +"]'  id='hdn_baseprid["+ currnrow +"]'  value="+ prid+ ">\n\
    <input type='hidden' name='hdn_mmtimeval["+ currnrow +"]'  id='hdn_mmtimeval["+ currnrow +"]' value='00:00:00'>\n\
    <input type='hidden' name='hdn_pptimeval["+ currnrow +"]'  id='hdn_pptimeval["+ currnrow +"]' value='00:00:00'>\n\
    <input type='hidden' name='hdn_tottimeval["+ currnrow +"]'  id='hdn_tottimeval["+ currnrow +"]' value='00:00:00' readonly>\n\
<input type='hidden' name='hdn_machienid["+ currnrow +"]'  id='hdn_machienid["+ currnrow +"]'>\n\
<input  ondblclick='return jobcomplexity("+ currnrow +")' type='hidden' name='hdn_jobcomplexity["+ currnrow +"]' style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px; margin-left: 5px;' id='hdn_jobcomplexity["+ currnrow +"]'>\n\
<label style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px; margin-left: 2px;' id='lbl_pname"+ currnrow +"'>" + prname + "</label></td>\n\
                                <td><select style='font-size: 10px; width: 98%;font-family: arial;padding: 0px; border: 0px;' id='drp_fb["+ currnrow +"]' name='drp_fb["+ currnrow +"]'>\n\
                                <option value='Front'>Front</option>\n\
                                <option value='Back'>Back</option></select></td>\n\
                                <td style='background-color: #00FFFF;' ondblclick='return info1("+ currnrow +")'><input type='text' name='txt_info1["+currnrow+"]' style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px; margin-left: 2px; background-color: #00FFFF;' id='txt_info1["+currnrow+"]'></td>\n\
                                <td style='background-color: #00FFFF;' ondblclick='return info2("+ currnrow +")'><input type='text' name='txt_info2["+currnrow+"]'  style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px; margin-left: 2px; background-color: #00FFFF;' id='txt_info2["+currnrow+"]'></td>\n\
                                <td><input type='hidden' name='hdn_info3["+currnrow+"]' id='hdn_info3["+currnrow+"]'><label style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px; margin-left: 2px;' id='lbl_info3"+ currnrow +"'></label></td>\n\
                                <td><select style='font-size: 10px; width: 98%;font-family: arial;padding: 0px; border: 0px;' id='drp_inhose["+ currnrow +"]' name='drp_inhose["+ currnrow +"]'>\n\
                                <option value='0'>----Select----</option>\n\
                                <option value='1'>In House</option>\n\
                                <option value='2'>Online</option>\n\
                                <option value='3'>Os</option></select></td>\n\
                                <td>\n\
                                <select style='font-size: 10px; width: 98%;font-family: arial;padding: 0px; border: 0px;' id='drp_pass["+ currnrow +"]' name='drp_pass["+ currnrow +"]'>\n\
                                <option value='1'>First Pass</option>\n\
                                <option value='2'>Second Pass</option>\n\
                                <option value='3'>Thired Pass</option>\n\
                                <option value='4'>Forth Pass</option>\n\
                                </select>\n\
                                </td>\n\
                                <td><label ondblclick='return jobcomplexity("+ currnrow +")' style='font-size:10px;' id='lbl_estdesccomplex"+ currnrow +"'></label></td>\n\
                                <td hidden><label style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px; margin-left: 2px;' id='lbl_info3"+ currnrow +"'></label></td>\n\
                                <td><input oninput ='return caloninput1("+ currnrow +");' onchange='return calcutime1(this)' type='text' name='txt_mmtime["+ currnrow +"]' style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px; margin-left: 2px;' id='txt_mmtime["+ currnrow +"]'></td>\n\
<td><input oninput ='return caloninput2("+ currnrow +");' onchange='return calcutime2(this)' type='text' name='txt_protime["+ currnrow +"]' style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px; margin-left: 2px;' id='txt_protime["+ currnrow +"]'></td>\n\
<td><input type='text' name='txt_tottimeqty["+ currnrow +"]' style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px; margin-left: 2px;' id='txt_tottimeqty["+ currnrow +"]'></td>\n\
                                <td ondblclick='return showmachien("+currnrow+")' style='background-color: #00FFFF;'>\n\
                                <input type='hidden' name='hdn_machinenameval["+currnrow+"]' id='hdn_machinenameval["+currnrow+"]'><label style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px; margin-left: 2px; background-color: #00FFFF;' id='lbl_machienname"+ currnrow +"'></label></td>\n\
                                <td><input type='text' name='txt_remark["+ currnrow +"]' style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px; margin-left: 2px;' id='txt_remark["+ currnrow +"]'></td>\n\
                                <td ondblclick='return materail1("+currnrow+")' style='background-color: #00FFFF;'><input type='text' name = 'txt_raw1["+currnrow+"]' style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px; margin-left: 2px; background-color: #00FFFF;' id='txt_raw1["+currnrow+"]'></td>\n\
                                <td ondblclick='return materail2("+currnrow+")' style='background-color: #00FFFF;'><input type='text' style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px; margin-left: 2px; background-color: #00FFFF;' name= 'txt_raw2["+currnrow+"]' id='txt_raw2["+currnrow+"]'></td>\n\
<td ondblclick='return materail3("+currnrow+")' style='background-color: #00FFFF;cursor: pointer;'><input type='text' name = 'txt_raw3["+currnrow+"]' style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px; margin-left: 2px;background-color: #00FFFF;' id= 'txt_raw3["+currnrow+"]'></td>\n\
<td ondblclick='return materail4("+currnrow+")' style='background-color: #00FFFF;cursor: pointer;'><input type='text' name = 'txt_raw4["+currnrow+"]' style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px; margin-left: 2px;background-color: #00FFFF;' id= 'txt_raw4["+currnrow+"]'></td>\n\
                            </tr>");
}

/* Corrugation popup*/
function showcorrugation(rel){
    $('#btn_corrugation').click();
        $('#hdn_rowmachine').val(rel);
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
                url: "Jobcard/corrugationdetail",
                data:{}
            }).done(function (msg) {
                $('#tbody_corrugation').html('');
                var main = jQuery.parseJSON(msg);
                var j =1;
                for (var i = 0; i < main.length; i++) {
                    $('#tbody_corrugation').append("<tr onclick='return setcorrugation("+ j +")'>\n\
                        <td><input type='hidden' name='hdn_itemidcorr"+j+"' id='hdn_itemidcorr"+j+"' value=" + main[i].ItemID + ">\n\
                        <input type='hidden' name='hdn_gsmcorr"+j+"' id='hdn_gsmcorr"+j+"' value=" + main[i].Breadth + ">\n\
                        <label style='font-weight: normal;font-size: 10px;font-family: arial;padding: 0px;' id='lbl_itemnamecorrugation"+ j +"'>" +  main[i].Description + "</label></td></tr>")
                    j++;
                }
            });
}

function setcorrugation(lnk){
    var oldrow = $('#hdn_rowmachine').val();
    var currentrow = lnk;
    var itemid = $('#hdn_itemidcorr'+lnk).val();
    var itemname = $('#lbl_itemnamecorrugation'+lnk).text();
    var gsm = $('#hdn_gsmcorr'+lnk).val();
    $("input[type='hidden'][name='txt_ppitemidp[" + oldrow + "\\]']").val(itemid);
    $("input[type='text'][name='txt_pkraftdesc[" + oldrow + "\\]']").val(itemname);
    $("input[type='text'][name='txt_ppgsm[" + oldrow + "\\]']").val(gsm);

    $('#myModalcorr').modal('hide');
}

function calcutime1(inputField){
    var hdn_timecal = $('#hdn_timecal').val();
    var isValid = /^([0-1]?[0-9]|2[0-9]):([0-5][0-9])(:[0-5][0-9])?$/.test(inputField.value);
        var isValid3 = /^([0-1]?[0-9]|3[0-9]):([0-5][0-9])(:[0-5][0-9])?$/.test(inputField.value);
        var isValid4 = /^([0-1]?[0-9]|4[0-9]):([0-5][0-9])(:[0-5][0-9])?$/.test(inputField.value);
        var isValid5 = /^([0-1]?[0-9]|5[0-9]):([0-5][0-9])(:[0-5][0-9])?$/.test(inputField.value);
        var isValid6 = /^([0-1]?[0-9]|6[0-9]):([0-5][0-9])(:[0-5][0-9])?$/.test(inputField.value);
        var isValid7 = /^([0-1]?[0-9]|7[0-9]):([0-5][0-9])(:[0-5][0-9])?$/.test(inputField.value);
        var isValid8 = /^([0-1]?[0-9]|8[0-9]):([0-5][0-9])(:[0-5][0-9])?$/.test(inputField.value);
        var isValid9 = /^([0-1]?[0-9]|9[0-9]):([0-5][0-9])(:[0-5][0-9])?$/.test(inputField.value);
        if (isValid == true || isValid3 == true || isValid4 == true ||isValid5 == true ||isValid6 == true ||isValid7 == true ||isValid8 == true ||isValid9 == true  ) {
            inputField.style.backgroundColor = '#bfa';

            var timePeriod = $("input[type='text'][name='txt_mmtime["+ hdn_timecal +"\\]']").val();
            var timePeriod1 = $("input[type='text'][name='txt_protime["+ hdn_timecal +"\\]']").val();
            var parts = timePeriod.split(/:/);
var timePeriodMillis = (parseInt(parts[0], 10) * 60 * 60 * 1000) +
                       (parseInt(parts[1], 10) * 60 * 1000) + 
                       (parseInt(parts[2], 10) * 1000);

var parts1 = timePeriod1.split(/:/);
var timePeriodMillis1 = (parseInt(parts1[0], 10) * 60 * 60 * 1000) +
                       (parseInt(parts1[1], 10) * 60 * 1000) + 
                       (parseInt(parts1[2], 10) * 1000);

var mmtime = (timePeriodMillis/1000);
var pptime = (timePeriodMillis1/1000);

var timeh = parseInt(timePeriodMillis)+parseInt(timePeriodMillis1);
var sectot = (timeh/1000);
var d = moment.duration(timeh);
var s = Math.floor(d.asHours()) + moment.utc(timeh).format(":mm:ss")
$("input[type='text'][name='txt_tottimeqty["+ hdn_timecal +"\\]']").val(s);
$("input[type='hidden'][name='hdn_mmtimeval["+ hdn_timecal +"\\]']").val(mmtime);
$("input[type='hidden'][name='hdn_pptimeval["+ hdn_timecal +"\\]']").val(pptime);
$("input[type='hidden'][name='hdn_tottimeval["+ hdn_timecal +"\\]']").val(sectot);


        } else {
            $("input[type='text'][name='txt_mmtime["+ hdn_timecal +"\\]']").val('');
            inputField.style.backgroundColor = '#fba';
        }
}
function calcutime2(inputField){
    var hdn_timecal = $('#hdn_timecal').val();
    var isValid = /^([0-1]?[0-9]|2[0-9]):([0-5][0-9])(:[0-5][0-9])?$/.test(inputField.value);
        var isValid3 = /^([0-1]?[0-9]|3[0-9]):([0-5][0-9])(:[0-5][0-9])?$/.test(inputField.value);
        var isValid4 = /^([0-1]?[0-9]|4[0-9]):([0-5][0-9])(:[0-5][0-9])?$/.test(inputField.value);
        var isValid5 = /^([0-1]?[0-9]|5[0-9]):([0-5][0-9])(:[0-5][0-9])?$/.test(inputField.value);
        var isValid6 = /^([0-1]?[0-9]|6[0-9]):([0-5][0-9])(:[0-5][0-9])?$/.test(inputField.value);
        var isValid7 = /^([0-1]?[0-9]|7[0-9]):([0-5][0-9])(:[0-5][0-9])?$/.test(inputField.value);
        var isValid8 = /^([0-1]?[0-9]|8[0-9]):([0-5][0-9])(:[0-5][0-9])?$/.test(inputField.value);
        var isValid9 = /^([0-1]?[0-9]|9[0-9]):([0-5][0-9])(:[0-5][0-9])?$/.test(inputField.value);
        if (isValid == true || isValid3 == true || isValid4 == true ||isValid5 == true ||isValid6 == true ||isValid7 == true ||isValid8 == true ||isValid9 == true  ) {
            inputField.style.backgroundColor = '#bfa';
            var timePeriod = $("input[type='text'][name='txt_mmtime["+ hdn_timecal +"\\]']").val();
            var timePeriod1 = $("input[type='text'][name='txt_protime["+ hdn_timecal +"\\]']").val();
            var parts = timePeriod.split(/:/);
var timePeriodMillis = (parseInt(parts[0], 10) * 60 * 60 * 1000) +
                       (parseInt(parts[1], 10) * 60 * 1000) + 
                       (parseInt(parts[2], 10) * 1000);

var parts1 = timePeriod1.split(/:/);
var timePeriodMillis1 = (parseInt(parts1[0], 10) * 60 * 60 * 1000) +
                       (parseInt(parts1[1], 10) * 60 * 1000) + 
                       (parseInt(parts1[2], 10) * 1000);

var mmtime = (timePeriodMillis/1000);
var pptime = (timePeriodMillis1/1000);



var timeh = parseInt(timePeriodMillis)+parseInt(timePeriodMillis1);
var sectot = (timeh/1000);
var d = moment.duration(timeh);
var s = Math.floor(d.asHours()) + moment.utc(timeh).format(":mm:ss")
$("input[type='text'][name='txt_tottimeqty["+ hdn_timecal +"\\]']").val(s);
$("input[type='hidden'][name='hdn_mmtimeval["+ hdn_timecal +"\\]']").val(mmtime);
$("input[type='hidden'][name='hdn_pptimeval["+ hdn_timecal +"\\]']").val(pptime);
$("input[type='hidden'][name='hdn_tottimeval["+ hdn_timecal +"\\]']").val(sectot);

        } else {
            $("input[type='text'][name='txt_protime["+ hdn_timecal +"\\]']").val('');
            inputField.style.backgroundColor = '#fba';
        }
}
function caloninput1(lnk){
    $('#hdn_timecal').val(lnk);
    var txt_time = $("input[type='text'][name='txt_mmtime["+ lnk +"\\]']").val();
        var a = txt_time.length;
        if(a==2){
            var b = txt_time +':';
            $("input[type='text'][name='txt_mmtime["+ lnk +"\\]']").val(b);
        }if(a== 5){
            var b = txt_time +':';
            $("input[type='text'][name='txt_mmtime["+ lnk +"\\]']").val(b);
        }
}
function caloninput2(lnk){
    $('#hdn_timecal').val(lnk);
    var txt_time = $("input[type='text'][name='txt_protime["+ lnk +"\\]']").val();
        var a = txt_time.length;
        if(a==2){
            var b = txt_time +':';
            $("input[type='text'][name='txt_protime["+ lnk +"\\]']").val(b);
            
        }if(a== 5){
            var b = txt_time +':';
            $("input[type='text'][name='txt_protime["+ lnk +"\\]']").val(b);
        }
}


function jobcomplexity(val){
    $('#hdn_id_var').val(val);
        var hdn_baseprid = $("input[type='hidden'][name='hdn_baseprid[" + val + "\\]']").val();
        // if(hdn_baseprid == 'FC' || hdn_baseprid == 'FL' || hdn_baseprid == 'WP' || hdn_baseprid == 'Pack'){
        $('#btn_myModalComplexity').click();
        $('#tbody_Complexity').html('');
        $.ajax({
                type: "POST",
                url: "Jobcard/jobcomplexity",
                data: {hdn_baseprid:hdn_baseprid}
            }).done(function (msg) {
                var main = jQuery.parseJSON(msg);
                var k =1;
                if(main!= false){
                for (var i = 0; i < main.length; i++) {
                $('#tbody_Complexity').append("<tr onclick='return complexshow("+k+")'>\n\
                    <td><input type='hidden' name='hdn_complexid"+k+"' id='hdn_complexid"+k+"' value='"+main[i].ID+"'>\n\
                    <label id='lbl_complexdescription"+k+"'>"+main[i].Name +"</label></td></tr>");
                k++;
            }
        }else{
            $('#tbody_options').append("<tr><td>Data not abailable</td></tr>");
            }
        });
    // }else{
    //     alert('Not able to open this');
    // }
}

function complexshow(val){
    $('#myModalComplexity').modal('hide');
    var id_var2 = $('#hdn_id_var').val();
    var complexid = $('#hdn_complexid'+val).val();
    var complexdesc = $('#lbl_complexdescription'+val).text();
    $("#lbl_estdesccomplex"+id_var2).text(complexdesc);
    $("input[type='hidden'][name='hdn_jobcomplexity["+ id_var2 +"\\]']").val(complexid);
}
