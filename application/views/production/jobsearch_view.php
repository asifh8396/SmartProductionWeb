<script src="<?php echo base_url(); ?>assets/bootstrap/js/jquery.min.js"></script>
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
            width: 96%;
        }
        .paperclass{
            width: 100%;
        }
        .paperclass thead tr th{
            border: 1px solid #000;
            background-color: #f2f7a4;
            font-size: 10px;
        }
        .paperclass tbody tr td{
            border: 1px solid #000;
            font-size: 10px;
        }
        .paperclass tbody tr td input{
            border: 0px solid #000;
            height: 14px;
            width: 100%;
            padding: 0px;
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
        /* #tbodygeneral tr td{
            padding: 0px;
            margin-left: 0px;
        }
        #tbodygeneral tr td label{
            font-weight: normal;
            font-size: 11px;
            font-family: arial;
            padding: 0px;
            margin-bottom: 2px;

            margin-left: 2px;
            margin-right: 2px;
            margin-top: 2px;
        }*/
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
        #detailoptimize tr td label{
            padding-left: 5px;
            font-size: 10px;   
        }
        #detailoptimize tr td{
            padding : 0px;
            font-size: 10px;
            height: 9px;  
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
            background-color: #f2f7a4;

        }
        .trGeneral tr th{
            padding: 0px;
            font-size: 12px;
            background-color: #f2f7a4;

        }
        .trGeneral tbody tr td{
            padding-left: 5px;
            font-size: 12px;
            /*background-color: #fff;*/

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
            font-size: 10px;
            padding: 0px;
            /*font-size: 12px;*/
            background-color: #f2f7a4;
            border: 1px solid #000;
            font-size: 10px;
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
        .tab_rawmaterial{
            width: 100%;
            font-size: 10px;
            border:1px solid #000;
        }
        .tab_rawmaterial thead tr th{
            font-size: 10px;
            padding: 0px;
            /*font-size: 12px;*/
            background-color: #f2f7a4;
            border: 1px solid #000;
            font-size: 10px;
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
        .tblclass thead tr th{
            padding: 0px;
            /*font-size: 12px;*/
            background-color: #f2f7a4;
            border: 1px solid #000;
            font-size: 10px;
        }
        .tblclass tbody tr td{
            padding: 0px;
            /*font-size: 12px;*/
            background-color: #f2f7a4;
            border: 1px solid #000;
            font-size: 10px;
        }
        .tblclass tbody tr td a{
            padding-left: 5px;
            /*font-size: 12px;*/
            background-color: #f2f7a4;
            font-size: 10px;
        }

        .tbl_otherinfo thead tr th{
            padding: 0px;
            /*font-size: 12px;*/
            background-color: #f2f7a4;
            border: 1px solid #000;
            font-size: 10px;
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
        
    </style>

<script type="text/javascript">

    function showCompItem(val) {
        var jobno = $("input[type='hidden'][name='hdn_jobnno[" + val + "\\]']").val();
        var woid = $('#hdn_woid' + val).val();
        //  alert(woid);
        $('#hdn_woidval').val(woid);
        $('#hdn_jobcard').val(jobno);
        $('#tbl_popup2').html('');
        $.blockUI();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>index.php/Jobsearch/createwo",
            data: {jobno: jobno}
        }).done(function (msg) {
            var main = jQuery.parseJSON(msg);
            var j = 1;
            for (var i = 0; i < main.length; i++) {
                $('#tbl_popup2').append("<tr onclick = 'return CreteCompWo(" + j + ");'><td>\n\
                    <input type='hidden' name='hdn_itemid" + j + "' id='hdn_itemid" + j + "' value='" + main[i].ProductID + "'><a href='#' id='a_pname[" + j + "]' name='a_pname[" + j + "]'>" + main[i].Description + "</a></td>\n\
                    <td><a href='#' id='a_codeno[" + j + "]' name='a_codeno[" + j + "]'>" + main[i].Iprefix + "</a></td></tr>");
                j++;
            }
        });
    }
    
    function CreteCompWo(val) {

        var r = confirm("Do you want to create Component Work Order");
        if (r) {
            var itemid = $('#hdn_itemid' + val).val();
            var pname = $("a[name='a_pname[" + val + "\\]']").text();
            var a_codeno = $("a[name='a_codeno[" + val + "\\]']").text();
            var hdn_jobcard = $('#hdn_jobcard').val();
            var woid = $('#hdn_woidval').val();
            var icompanyid = $('#hdn_icompanyid').val();
            var uid = $('#txt_uid').val();
            $.blockUI();
            $.ajax({
                type: "Post",
                url: "<?php echo base_url() ?>index.php/Jobsearch/createwocom",
                data: {woid: woid, hdn_jobcard: hdn_jobcard, itemid: itemid}
            }).done(function (msg) {
                if (msg == 1) {
                    window.location.href = '<?php echo base_url() ?>index.php/PendingJobcard?userid=' + uid + '&ICompanyID=' + icompanyid + '';
                } else {
                    alert(msg);
                }
            });
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
            <p id="flashmsg" style='font-size:25px;color:#a94442;float:left;margin: -3px 0 0 0;;font-weight: 700;'><?php alert(); ?></p>
        </div>
    </section>
    <section class="content">
        <div class="box box-primary">
            <div class="box-body" style="padding: 5px;">
                <div style="width: 100%;">
                    <form id='form_main' method="Post" autocomplete="off">
                        <?php
                        $sessionarry = $this->session->userdata('form_data');
                        $uid = $sessionarry['userid'];
                        $icompanyid = $sessionarry['ICompanyID'];
                        ?>
                        <input type="hidden" name="txt_icompanyid" id="txt_icompanyid" value="<?php echo $icompanyid; ?>">
                        <input type="hidden" name="txt_uid" id="txt_uid" value="<?php echo $uid; ?>">

                        <div style="width:100%;">
                            <div style="float: left;">
                                <table class="finyear">
                                    <tr>
                                        <td>
                                            Fin Year:
                                        </td>
                                        <td style="padding-left:5px;">

                                            <select id="drp_docnotion" name="drp_docnotion" style="padding-left:5px;padding: 6px;">
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                                <option value="21">21</option>
                                                <option value="22">22</option>
                                            </select>

                                        </td>
                                        <td style="padding-left:5px;">
                                            Limit:
                                        </td>
                                        <td style="padding-left:5px;">
                                            <select id="drp_limit" name="drp_limit" style="padding-left:5px;padding: 6px;">
                                                <option value="100">100</option>
                                                <option value="200">200</option>
                                                <option value="500">500</option>
                                                <option value="1000">1000</option>
                                                <option value="1500">1500</option>
                                                <option value="2000">2000</option>
                                                <option value="2500">2500</option>
                                                <option value="3000">3000</option>
                                                <option value="3500">3500</option>
                                                <option value="4000">4000</option>
                                                <option value="4500">4500</option>
                                                <option value="5000">5000</option>
                                            </select>
                                        </td>
                                        <td style="padding-left: 13px;">
                                            <input type="button" name="btn_show" class="btn btn-primary" id="btn_show" value="Search" onclick="return getdatafinyr();">
                                        </td>
                                        <td style="padding-left: 10px;">
                                            <label>OR</label>
                                        </td>
                                        <td style="padding-left: 10px;">
                                            <input id='txt_docid' type='text' style='margin-left:10px; width: 100px; border:1px solid;display: inline-block;padding: 16px;' class='form-control input-sm' placeholder='Docket No...' aria-controls='example'>
                                            <input id='txt_iprefix' type='text' style='margin-left:10px; width: 100px; border:1px solid;display: inline-block;padding: 16px;' class='form-control input-sm' placeholder='Iprefix...' aria-controls='example'>
                                            <input id='txt_description' type='text' style='margin-left:10px; width: 100px; border:1px solid;display: inline-block;padding: 16px;' class='form-control input-sm' placeholder='Description...' aria-controls='example'>
                                            
                                        </td>
                                        <td style="padding-left: 10px;">
                                            <input type="button" id='cl_search' class="btn btn-primary" value="Search" onclick='return showlikesearch();'>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div>
                                <input type="hidden" name="hdn_jobcard" id="hdn_jobcard">
                                <input type="hidden" name="hdn_woidval" id="hdn_woidval">
                                <input type="hidden" name="hdn_filename" id="hdn_filename">

                                <input type="hidden" name="hdn_jobnew" id="hdn_jobnew" value="Old">
                                <table class="tbltheadtbodycss" id="example">
                                    <thead>
                                        <?php
                                        if (isset($userper)) {
                                            
                                            foreach ($userper as $key => $value) {
                                                $saveper = $value->save_perm;
                                                $deletper = $value->delete_perm;
                                                $updatper = $value->update_perm;
                                                $printper = $value->print;
                                                ?>
                                                <tr>
                                                    <?php if ($printper == 1) { ?>
                                                    <th>PrintOut</th>
                                                    <?php } ?>
                                                    <!-- <th>IMR</th>		 -->
                                                    <th>Attach</th>
                                                    <th style="padding-right: 15px;">OS.Vendr</th>
                                                    <th style="white-space: nowrap;">Docket No</th>
                                                    <th>Date</th>
                                                    <th style="white-space: nowrap;">W.O. No</th>
                                                    <th style="white-space: nowrap;">Job Name</th>
                                                    <th style="white-space: nowrap;">Job Status</th>
                                                    <th style="white-space: nowrap;">Job Code</th>
                                                    <th style="white-space: nowrap;">MIS Code</th>
                                                    <th style="white-space: nowrap;">P.O. NO</th>
                                                    <th>Qty</th>
                                                    <th style="white-space: nowrap;">WO date</th>
                                                    <th style="white-space: nowrap;">Desp. Qty</th>
                                                    <th hidden>Desp. date</th>
                                                    <th style="white-space: nowrap;">Client Name</th>
                                                    <?php if ($deletper == 1) { ?>
                                                        <th style="white-space: nowrap;">Del</th>
                                                    <?php } ?>
                                                </tr>
                                            <?php
                                            }
                                        }
                                        ?>
                                    </thead>
                                    <tbody id="tbodygeneral">
                                        <?php
                                        echo $data;
                                        ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div id="myModaldata" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content" style="height: 600px; overflow-y: auto;">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">

                                        <table  style="border-collapse:collapse; width: 550px;">
                                            <thead>

                                                <tr>
                                                    <th align="center" style ='font-size: 10px; border-style: solid; border-width: 1px; background-color: #627aac; color: #FFFFFF; border-color: #212121;'>
                                                        Attach File</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbl_popup1">
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <!--        <button type="button" >Ok</button>-->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="myModalComp" class="modal fade" role="dialog">
                            <div class="modal-dialog">

                                <!-- Modal content-->
                                <div class="modal-content" style="height: 600px; overflow-y: auto;">
                                    <div class="modal-header">
                                        <h6>Select component</h6><button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <table>
                                            <tr><td>Search:</td>
                                                <td><input type="text" name="txt_searchp" id="txt_searchp" style="width:350px; height:18px;"></td>
                                            </tr>
                                        </table>
                                        <table class="tblclass" style="border-collapse:collapse; width: 550px;">
                                            <thead>

                                                <tr>
                                                    <th align="center" style ='font-size: 10px; border-style: solid; border-width: 1px; background-color: #627aac; color: #FFFFFF; border-color: #212121;'>
                                                        Description</th>
                                                    <th align="center" style ='font-size: 10px; border-style: solid; border-width: 1px; background-color: #627aac; color: #FFFFFF; border-color: #212121;'>
                                                        CodeNo</th>
                                                </tr>

                                            </thead>
                                            <tbody id="tbl_popup2">
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        <!--        <button type="button" >Ok</button>-->
                                    </div>
                                </div>
                            </div>
                        </div>


                        <input type="submit" style="display: none" name="Btn" id="Btn">
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>

<div id="myModalosvendor" class="modal fade" role="dialog">
    <div class="modal-dialog" style="width: 600px;">

        <!-- Modal content-->
        <div class="modal-content" style="height: 500px;">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h5 class="modal-title">Email Outsource Vendor</h5>
            </div>
            <div class="modal-body">
                <input type="hidden" id="hdn_popdocid" name="hdn_popdocid">
                <input type="hidden" id="hdn_popjobname" name="hdn_popjobname">
                <input type="hidden" id="hdn_popclientname" name="hdn_popclientname">
                <label>Docket No</label>&nbsp;&nbsp;-&nbsp;&nbsp;<label id="lbl_popdocid" style="font-weight:400;"></label>
                <table class="tblclass" style="width: 550px;">
                    <thead>
                        <tr style="height:22px;">
                            <th style ='background-color: #627aac; color: #FFFFFF; font-size:12px;'><center>Vendor Name</center></th>
                    </tr>
                    </thead>
                    <tbody id="tbody_osvendor">
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <!--        <button type="button" >Ok</button>-->
            </div>
        </div>
    </div>
</div>

<form id="form_email"  method="POST" target="_blank">
    <div id="myModalemailvendor" class="modal fade" role="dialog">
        <div class="modal-dialog" style="width: 950px;">

            <!-- Modal content-->
            <div class="modal-content" style="height: 550px;overflow-y:scroll;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h5 class="modal-title">Email Vendor</h5>
                </div>
                <div class="modal-body" style="height: 460px;">
                    <label>Docket No</label>&nbsp;&nbsp;-&nbsp;&nbsp;<input type="text" id="pop2docid" name="pop2docid" readonly style="font-weight:400; border:none;">&nbsp;&nbsp;
                    <label>Job Name</label>&nbsp;&nbsp;-&nbsp;&nbsp;<input type="text" id="pop2jobname" name="pop2jobname" readonly style="font-weight:400; border:none;">&nbsp;&nbsp;
                    <label>Vendor</label>&nbsp;&nbsp;-&nbsp;&nbsp;<input type="text" id="pop2vendorname" name="pop2vendorname" readonly style="font-weight:400; border:none;">
                    <input type="hidden" id="pop2clientname" name="pop2clientname"><br>
                    <div style="margin: 5px;">
                        <div class="col-md-4" style="margin-right:10px;padding: 0;" hidden>
                            <label style="font-size:13px;">Your E-mail ID :</label>
                            <input type="text" id="youremailid" name="youremailid" value="" class="form-control" style="height:30px;width:300px;" placeholder="Enter your E-Mail ID">
                        </div>
                        <div class="col-md-4" style="padding: 0;" hidden>
                            <label style="font-size:13px;">Your E-mail Password :</label>
                            <input type="password" id="youremailpass" name="youremailpass" value="" class="form-control" style="height:30px;width:300px;" placeholder="Enter Password">
                        </div>
                        <div class="col-md-8" style="padding: 0;">
                            <label style="font-size:13px;">Client E-mail IDs :</label>
                            <input type="text" id="emailid" name="emailid" value="" class="form-control" style="height:30px;" placeholder="Enter OutSource Client E-Mail IDs..." title="Enter Email ID if more than 1 seperate by ',' !!!">
                        </div>
                        <div class="col-md-3" style="float: right;">
                            <input type="button" onclick="return sendemail();" name="sendmail" id="sendmail" value="Send Email" class="btn btn-primary" style="margin-right:8px;margin-top: 20px;margin-bottom: 10px;">
                            <input type="button" onclick="return outsource_vendor_po_pdf();" name="po_pdf" id="po_pdf" value="PO PDF" class="btn btn-primary" style="margin-top: 20px;margin-bottom: 10px;">
                        </div>
                    </div>
                    <div id="maildata" name="maildata" style="width:900px;height:440px;"></div>
                </div>
                <div class="modal-footer">
                    <!--        <button type="button" >Ok</button>-->
                </div>
            </div>
        </div>
    </div>
    <input type="submit" name="form_email_submit" id="form_email_submit" hidden>
    <input type="hidden" name="pop2hdn_icompanyid" id="pop2hdn_icompanyid" hidden>
</form>

<script>

    $('#form_main').on("submit", function(e){
        e.preventDefault();
    });
    
    function showopenattach(val) {
        var jobno = $("input[type='hidden'][name='hdn_jobnno[" + val + "\\]']").val();
        $('#tbl_popup1').html('');
        $.blockUI();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url() ?>Production/Jobsearch/productattachment",
            data: {jobno: jobno}
        }).done(function (msg) {
            // alert(msg);
            var main = jQuery.parseJSON(msg);
            var j = 1;
            for (var i = 0; i < main.length; i++) {
                $('#tbl_popup1').append("<tr onclick = 'return openattachmentfile(" + j + ");'><td>\n\
                    <a href='#' id='a_attch[" + j + "]' name='a_attch[" + j + "]'>" + main[i].Filename + "</a></td><td></td></tr>");
                j++;
            }
            abc = '0';
        });

    }

    function openattachmentfile(val) {
        var filename = $("a[name='a_attch[" + val + "\\]']").text();
        alert(filename);
        $('#hdn_filename').val(filename);
        var form = document.getElementById('form_main');
        form.action = 'Jobsearch/downloadfile';
        form.submit();
        // return false;
        return false;
        // $('#btn_attach').click();

    }



    function autoimr(lnk) {
        var docid = $("input[type='hidden'][name='hdn_docid[" + lnk + "\\]']").val();
        var drp_docnotion = $('#drp_docnotion').val();
        var icompanyid = $('#hdn_icompanyid').val();
        var agree = confirm("Do You Really Want To Create IMR "+docid+" ?");
            if (agree == false) {
                return false;
            } else {
                $.ajax({
                    type: "Post",
                    url: "<?php echo site_url() ?>Production/Jobsearch/create_auto_imr",
                    data: {docid: docid,drp_docnotion: drp_docnotion,icompanyid: icompanyid}
                }).done(function (msg) {

                });
            }
    }

    $(document).ready(function () {
        var flashmsg = $('#flashmsg').text();
        if (flashmsg != '') {
           swal(flashmsg);
        }
        abc = '';
        /* $('#fdate').datepicker({changeMonth: true, changeYear: true, dateFormat: 'dd/mm/yy'});
         $("#fdate").datepicker().datepicker("setDate", new Date());
         $('#tdate').datepicker({changeMonth: true, changeYear: true, dateFormat: 'dd/mm/yy'});
         $("#tdate").datepicker().datepicker("setDate", new Date());
         */
        $('#drp_docnotion').val(<?php echo Docnotion(); ?>);
        table = $('#example').DataTable({
            dom: 'frtip',
            responsive: true,
            "scrollY": "450px",
            "scrollX": 'auto', //"1200px",
            "bPaginate": false,
        });
        
        $(document).ajaxComplete(function () {
            if (abc == 1) {
                table = $('#example').DataTable({
//                    "order": [[1, "desc"]],
                    dom: 'frtip',
                    responsive: true,
                    "scrollY": "450px",
                    "scrollX": 'auto', //"1200px",
                    "bPaginate": false,
                });
                $.unblockUI();
            } else {
                $.unblockUI();
                
            }
        });

        $('#txt_searchp').keydown(function () {
            var term1 = $(this).val();

            var term = term1.toLowerCase();
            if (term != "")
            {
                $("#tbl_popup2 tr").hide();
                $("#tbl_popup2 td").filter(function () {
                    return $(this).text().toLowerCase().indexOf(term) > -1
                }).parent("tr").show();
            }
            else
            {
                $("#tbl_popup2 tr").show();
            }
        });

    });



    function getdatafinyr() {
        
        var drp_docnotion = $('#drp_docnotion').val();
        var drp_limit = $('#drp_limit').val();
        var icompanyid = $('#hdn_icompanyid').val();

        table.destroy();
        $('#tbodygeneral').html('');
        $.blockUI();
        
        $.ajax({
            type: "Post",
            url: "<?php echo site_url() ?>Production/Jobsearch/showgrid",
            data: {drp_docnotion: drp_docnotion, drp_limit: drp_limit, icompanyid: icompanyid, JSType: 'Fin'}
        }).done(function (msg) {
            var mainval = jQuery.parseJSON(msg);
            $('#tbodygeneral').append(mainval);
            
            abc = '1';
        });

    }
            var rtn = '';

        function beforesubmit_check(lnkk) {


            var docid = $("input[type='hidden'][name='hdn_docid[" + lnkk + "\\]']").val();
            
            $.ajax({
                url: '<?php echo site_url(); ?>Production/Jobsearch/deletedata',
                type: "POST",
                async: false,
                // dataType: "JSON",
                data: {docid: docid},
                beforeSend: function () {
                    $.blockUI();
                },
                complete: function () {
                    $.unblockUI();
                },
                success: function (data) {
                    console.log(data);
                    var master = jQuery.parseJSON(data);
                    if(master[0].delete_validation != "") {
                        rtn = master[0].delete_validation;
                    } else {
                        rtn = '';
                    }
                    
                },
                error: function () {
                    $.unblockUI();
                }
            });
            return rtn;
        }

    function DeleteRowmain(lnkk) {
        // beforesubmit_check(lnkk);
        var rtn = beforesubmit_check(lnkk); 
         if(rtn != "") {
          alert(rtn);
         }else{
        if (lnkk != '') {
            var docid = $("input[type='hidden'][name='hdn_docid[" + lnkk + "\\]']").val();

            var agree = confirm("Do You Really Want To Delete JobCard No "+docid+" ?");
            if (agree == false) {
                return false;
            }
            else {
                var icompanyid = $('#hdn_icompanyid').val();
                var docnotion = $('#drp_docnotion').val();
                
                $.blockUI();
                
                $.ajax({
                    type: "Post",
                    url: "<?php echo site_url() ?>Production/Jobsearch/Deletejob",
                    data: {icompanyid: icompanyid, docid: docid, docnotion: docnotion, JSType: 'Fin'}
                }).done(function (msg) {
                    
                    var leng = $('#tbodygeneral tr').length;
                    var i = 0;
                    for (i; i < leng; i++) {
                        var GrdJobno = $("#hdn_docid\\["+ i +"\\]");
                        if(GrdJobno.val() == docid) {
                            table.row(GrdJobno.parents("td").parents("tr")).remove().draw();
                        }
                    }
                    abc = '0';
                    
                });

            }
        }
    }
}
    
    function showlikesearch() {
        
        
        var icompanyid = $('#txt_icompanyid').val();
        var userid = $('#txt_uid').val();
        var docid = $("#txt_docid").val();
        var iprefix = $("#txt_iprefix").val();
        var description = $("#txt_description").val();
        var drp_docnotion = $('#drp_docnotion').val();
        var drp_limit = $('#drp_limit').val();

        table.destroy();
        $('#tbodygeneral').html('');
        $.blockUI();
        $.ajax({
            type: "POST",
            url: "<?php echo site_url(); ?>Production/Jobsearch/showlikegrid",
            data: {icompanyid: icompanyid, docid: docid, iprefix: iprefix, description: description,drp_docnotion:drp_docnotion,drp_limit:drp_limit, JSType: 'Like'}
        }).done(function (msg) {
            var mainval = jQuery.parseJSON(msg);
            $('#tbodygeneral').append(mainval);

            abc = '1';
            
        });
    }



    function openjobcard(val, CP) {
        var docid = $("input[type='hidden'][name='hdn_docid[" + val + "\\]']").val();
        var icompanyid = $('#hdn_icompanyid').val();
        var uid = $('#hdn_uid').val();
        $('#txt_uid').val(uid);
        $('#txt_icompanyid').val(icompanyid);
        $("#hdn_jobcard").val(docid);
        var form = document.getElementById('form_main');
        if (CP == 'P') {
            form.action = 'Jobcard';
        } else {
            form.action = 'Jobcard_comm';
        }
        form.submit();
        // $("#Btn").click();
        //return false;
    }

//        'copy', 'csv', 'excel', 'pdf'

    function showosvendor(lnk) {

        var docid = $("#hdn_docid\\["+ lnk +"\\]").val();

        $.ajax({
            type: "POST",
            url: "<?php echo site_url() ?>Production/Jobsearch/showosvendor",
            //datatype: "JSON",
            data: {docid:docid},
            beforeSend: function () {
                $("#tbody_osvendor").html('');
                $.blockUI();
            },
            complete: function () {
                $.unblockUI();
            },
            success: function (res) {
                var data = jQuery.parseJSON(res);
                var b = 1;
                for (var i = 0; i < data.length; i++) {
                    $("#tbody_osvendor").append("<tr>\n\
                        <td onclick='return emailvendor("+b+");' style='cursor:pointer;padding:3px;'>\n\
                            <input type='hidden' id='hdn_pop_vendorid"+b+"' name='hdn_pop_vendorid["+b+"]' value='" + data[i].CompanyId + "'>\n\
                            <input type='hidden' id='hdn_pop_vendor"+b+"' name='hdn_pop_vendor["+b+"]' value='" + data[i].CompanyName + "'>\n\
                            " + data[i].CompanyName + "</td>\n\
                    </tr>");
                    b++;
                };
                $("#lbl_popdocid").html(docid);
                $("#hdn_popdocid").val(docid);
                $("#hdn_popjobname").val($("#hdn_jobname\\["+ lnk +"\\]").val());
                $("#hdn_popclientname").val($("#hdn_clientname\\["+ lnk +"\\]").val());
                
                $("#myModalosvendor").modal("toggle");
                abc = 0;
            },
            error: function(res) {
                $.unblockUI();
                alert("Error-> " + res.responseText);
            }
        });
    }

    function emailvendor(lnk) {
        var docid = $("#hdn_popdocid").val();
        var icompanyid = $("#hdn_icompanyid").val();
        var vendorid = $("#hdn_pop_vendorid"+lnk).val();
        var vendorname = $("#hdn_pop_vendor"+lnk).val();
        $.ajax({
            type: "POST",
            url: "<?php echo site_url() ?>Production/Jobsearch/vendoremaildata",
            data: {docid:docid,icompanyid:icompanyid,vendorid:vendorid},
            beforeSend: function () {
                $("#maildata").html('');
                $.blockUI();
            },
            complete: function () {
                $.unblockUI();
            },
            success: function (res) {
                //var data = jQuery.parseJSON(res);
                var b = 1;
                $("#maildata").append(res);
                $("#myModalemailvendor").modal("toggle");
                abc = 0;
            },
            error: function(res) {
                $.unblockUI();
                alert("Error-> " + res.responseText);
            }
        });

        $("#pop2docid").val(docid);
        $("#pop2vendorname").val(vendorname);
        $("#pop2jobname").val($("#hdn_popjobname").val());
        $("#pop2clientname").val($("#hdn_popclientname").val());
        $("#pop2hdn_icompanyid").val($("#hdn_icompanyid").val());
        
    }

    function sendemail() {
        //$("#form_email_submit").click();
        var form = document.getElementById('form_email');
        form.action = 'Production/Jobsearch/email_vendor';
        form.submit();

        $("#myModalemailvendor").modal("toggle");
    }

    function outsource_vendor_po_pdf() {
        //$("#form_email_submit").click();
        var form = document.getElementById('form_email');
        form.action = 'Production/OutSourceVendorPoPdf';
        form.submit();

        $("#myModalemailvendor").modal("toggle");
    }
    
</script>