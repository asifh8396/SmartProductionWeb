<script src="<?php echo base_url(); ?>assets/bootstrap/js/jquery.min.js"></script>
<style>

    .blockMsg{
        border: none !important;
        padding: 15px !important;
        background-color: #000 !important;
        border-radius: 10px !important;
        opacity: .5 !important;
        color: #fff !important;
    }

</style>

<div class="content-wrapper"> <!--  oncontextmenu="return false;"> -->
    <section class="content-header">
        <h1 style="display: inline-block;"><?php echo $title; ?></h1>
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
            <input type="hidden" name="hdn_docid" id="hdn_docid" value="">
            <input type="hidden" name="hdn_uid" id="hdn_uid" value="<?php echo $uid; ?>">
            <input type="hidden" name="hdn_icompanyid" id="hdn_icompanyid" value="<?php echo $icompanyid; ?>">

            <table class="tbltheadtbodycss" id="jctbl" style="font-size:11px;width: 60%;">
                <thead id="tblhead">
                    <tr>
                        <th width="2">S.No.</th>
                        <th width="100">UserName</th>
                        <th width="40">Save</th>
                        <th width="40">Update</th>
                        <th width="40">Delete</th>
                        <th width="40">Print</th>
                        <th width="8">Action</th>
                    </tr>
                </thead>
                <tbody id="tblbody">
                <?php
                if (isset($data) && isset($userinfo)) {
                if ($uid == '00001') { ?>
                    <tr>
                        <td>1</td>
                        <td>
                            <select name="drp_username1" id="drp_username1" style="font-size:13px;width: 100%;">
                                <option value="">--Select--</option>
                                <?php
                                    foreach ($userinfo as $key => $value) { ?>
                                        <option value="<?php echo $value->UserId; ?>"><?php echo $value->UserName; ?></option>
                                    <?php }
                                ?>
                            </select>
                        </td>
                        <td>
                            <input type="checkbox" id="chk_save1" name="chk_save[1]" >
                        </td>
                        <td>
                            <input type="checkbox" id="chk_update1" name="chk_update[1]" >
                        </td>
                        <td>
                            <input type="checkbox" id="chk_delete1" name="chk_delete[1]" >
                        </td>
                        <td>
                            <input type="checkbox" id="chk_print1" name="chk_print[1]" >
                        </td>
                        <td>
                            <span class="btn btn-primary fa fa-floppy-o" name="saverow[1]" id="saverow1" style="font-size:13px;padding: 6px 9px;" onclick="saverow();" title="Save Row"></span>
                        </td>
                    </tr>

                    <?php $i = 2;
                    $row = 1;
                    foreach ($data as $key => $value) { ?>
                        <tr id="trid<?php echo $i; ?>">
                            <td><?php echo $i; ?></td>
                            <td>
                                <input type='hidden' name='hdn_autoid[<?php echo $i; ?>]' id='hdn_autoid<?php echo $i; ?>' value="<?php echo $value->ID ?>">
                                <input type='hidden' name='hdn_userid[<?php echo $i; ?>]' id='hdn_userid<?php echo $i; ?>' value="<?php echo $value->userid ?>">
                                <?php echo $value->UserName; ?>
                            </td>
                            <td>
                                <input type="checkbox" <?php if($value->save_perm == 1){echo "checked='checked' value = 1";}else{echo "value=0";} ?> name="chk_save[<?php echo $i; ?>]" id="chk_save<?php echo $i ?>">
                            </td>
                            <td>
                                <input type="checkbox" <?php if($value->update_perm == 1){echo "checked='checked' value = 1";}else{echo "value=0";} ?> name="chk_update[<?php echo $i; ?>]" id="chk_update<?php echo $i ?>">
                            </td>
                            <td>
                                <input type="checkbox" <?php if($value->delete_perm == 1){echo "checked='checked' value = 1";}else{echo "value=0";} ?> name="chk_delete[<?php echo $i; ?>]" id="chk_delete<?php echo $i ?>">
                            </td>
                            <td>
                                <input type="checkbox" <?php if($value->print == 1){echo "checked='checked' value = 1";}else{echo "value=0";} ?> name="chk_print[<?php echo $i; ?>]" id="chk_print<?php echo $i ?>">
                            </td>
                            <td>
                                <span onclick="return updaterow(<?php echo $i ?>);" name="updaterow[<?php echo $i ?>]" id="updaterow<?php echo $i ?>" class="btn btn-primary fa fa-pencil-square-o" style="font-size:13px;padding: 6px 7px;" title="Update Row"></span>
                                <span onclick="return deleterow(<?php echo $i ?>);" name="delete[<?php echo $i ?>]" id="delete<?php echo $i ?>" class="btn btn-danger fa fa-trash-o" style="font-size:13px;padding: 6px 9px;" title="Delete Row"></span>
                            </td>
                        </tr>
                        <?php
                        $i++;
                        $row++;
                    }
                }
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</section>
</div>


<script type="text/javascript">

function deleterow(val){
    var autoid = $("#hdn_autoid"+val).val();
    var userid = $("#hdn_userid"+val).val();

    var agree = confirm("Do You Really Want To Delete ?");
    
    if (agree == false) {
        return false;
    } else {

        $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>production/jcPermissions/deleterow",
            data: {autoid:autoid, userid:userid},
            beforeSend: function () {
                $.blockUI();
            },
            complete: function () {
                $.unblockUI();
            },
            success: function (res) {
                $("#trid"+val).remove();
            },
            error: function (res) {
                alert("Error"+res.responseText);
            }

        });
    }
}

function saverow(){
    var userid = $("#drp_username1").val();
    if (userid != "") {
        if($("#chk_save1"). prop("checked") == true){
            var chk_save = 1;
        } else {
            var chk_save = 0;
        }
        if($("#chk_update1"). prop("checked") == true){
            var chk_update = 1;
        } else {
            var chk_update = 0;
        }
        if($("#chk_delete1"). prop("checked") == true){
            var chk_delete = 1;
        } else {
            var chk_delete = 0;
        }
        if($("#chk_print1"). prop("checked") == true){
            var chk_print = 1;
        } else {
            var chk_print = 0;
        }
        $.ajax({
            type: "POST",
            url: "<?php echo base_url();?>production/jcPermissions/addnewrow",
            data: {userid:userid, chk_save:chk_save, chk_update:chk_update, chk_delete:chk_delete, chk_print:chk_print},
            beforeSend: function () {
                $.blockUI();
            },
            complete: function () {
                $.unblockUI();
            },
            success: function (res) {
                // alert(res);
                var data = jQuery.parseJSON(res);
                var j = 1;
                for (var i = 0; i < data.length; i++) {
                    if(data[i].save_perm == 1){
                        var chk_save = " checked='checked' value = 1";
                    } else {
                        var chk_save =  " value = 0";
                    }
                    if(data[i].update_perm == 1){
                        var chk_update = " checked='checked' value = 1";
                    } else {
                        var chk_update = " value = 0";
                    }
                    if(data[i].delete_perm == 1){
                        var chk_delete = " checked='checked' value = 1";
                    } else {
                        var chk_delete = " value = 0";
                    }
                    if(data[i].print == 1){
                        var chk_print = " checked='checked' value = 1";
                    } else {
                        var chk_print = " value = 0";
                    }
                    $("#tblbody").append("<tr>\n\
                        <td>"+j+"</td>\n\
                        <td><input type='hidden' name='hdn_autoid[]' id='hdn_autoid' value="+ data[i].ID +">\n\
                            <input type='hidden' name='hdn_userid[]' id='hdn_userid' value="+ data[i].UserId +">"+ data[i].UserName +"</td>\n\
                        <td><input type='checkbox' "+ chk_save +" name='chk_save' id='chk_save'></td>\n\
                        <td><input type='checkbox' "+ chk_update +" name='chk_update' id='chk_update'></td>\n\
                        <td><input type='checkbox' "+ chk_delete +" name='chk_delete' id='chk_delete'></td>\n\
                        <td><input type='checkbox' "+ chk_print +" name='chk_print' id='chk_print'></td>\n\
                        <td></td>\n\
                    </tr>");
                    j++;
                }
                window.location.href = "<?= current_url(); ?>";
            },
            error: function (res) {
                alert("Error"+res.responseText);
            }

        });
    } else {
        alert("Select User");
    }
}

function updaterow(val){
    var autoid = $("#hdn_autoid"+val).val();
    var userid = $("#hdn_userid"+val).val();

    if($("#chk_save"+val).prop("checked") == true){
        var chk_save = 1;
    } else {
        var chk_save = 0;
    }
    if($("#chk_update"+val).prop("checked") == true){
        var chk_update = 1;
    } else {
        var chk_update = 0;
    }
    if($("#chk_delete"+val).prop("checked") == true){
        var chk_delete = 1;
    } else {
        var chk_delete = 0;
    }
    if($("#chk_print"+val).prop("checked") == true){
        var chk_print = 1;
    } else {
        var chk_print = 0;
    }
    $.ajax({
        type: "POST",
        url: "<?php echo base_url();?>production/jcPermissions/updaterow",
        data: {autoid:autoid, userid:userid, chk_save:chk_save, chk_update:chk_update, chk_delete:chk_delete, chk_print:chk_print},
        beforeSend: function () {
            $.blockUI();
        },
        complete: function () {
            $.unblockUI();
        },
        success: function (res) {
            alert("Updated successfully");
        },
        error: function (res) {
            alert("Error"+res.responseText);
        }

    });
}


</script>