
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
            li.header{
                float: left;
                margin-left: 10px;
                padding-bottom: 2px;
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

            #tbodygeneralk tr{
                font-size: 12px;
            }

            #tbodygeneralk tr td{
                padding: 2px;
            }

            #tfootk tr th{
                padding: 2px;
            }
            #tbodygeneralk tr:hover{background-color:	#3C8DBC; }
            /*#tbl_product*/
        </style>

        <style>
            #tbl_head th{
                font-size: 13px; 
                border-style: solid; 
                border-width: 1px; 
                background-color: #627aac; 
                color: #FFFFFF; 
                border-color: #212121;
                // padding: 5px;
            }      

            #tbl_body tr td{
                font-size: 13px; 
                color: #333333;
                padding: 0px;
            }
            .btn{
            	/*padding: 1px 6px;*/
            }

        </style>
<form action="<?php echo site_url('Production/Board_changemaster/Save'); ?>" id='form_main' method="POST">
<div class="content-wrapper" ><!--  oncontextmenu="return false;"> -->
    <section class="content-header">
        <h1><?php echo $title; ?></h1>
        <ul class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard'); ?>"><i class="fa fa-dashboard"></i>Home</a></li>
            <li class="active"><?php echo $title; ?></li>
        </ul>
        <div class="pull-right">
            <a onclick="submitform();" class="btn btn-success" data-toggle="tooltip" id="btn_submit" data-placement="left" title="Save"><i class="fa fa-save"></i></a>
            <a href="<?php echo site_url('Board_changemaster');?>" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="Cancel"><i class="fa fa-reply"></i></a>
        </div>
    </section>
    <section class="content">
        <div class="box box-primary">
            <div class="box-body" style="padding: 5px;">
              <div style="width:100%;margin-left: -26%;">
                    <!-- <input type="text" placeholder="Search...." class="form-control" autocomplete="off" style="width:170px;float:right;margin-top: -35px;height: 30px;" id="txt_searchjob" onkeypress="return Searchkld(event,'txt_searchjob','tbody_search');"> -->
                    <div class="col-md-6 col-md-offset-3">
	                    <table style="width: 100%;" id="tbl_data" class="tbltheadtbodycss">
	                        <thead id="thead_joblist">
	                            <tr>
	                                <th>Particular</th>
									<th>Active</th>
	                            </tr>
	                        </thead>
	                        <tbody id="tbody_search"></tbody>
	                        
	                    </table>
                    </div>
                    <div>
                    	<a href="javascript:void(0);" onclick="return copyRow();" style="padding: 1px 6px;" id="btn_show" title="Plus" class="btn btn-success" data-toggle="tooltip" data-placement="top"><i class="fa fa-plus"></i></a>
                    	<a href="javascript:void(0);" onclick="return deleterow();" style="padding: 1px 6px;" id="btn_show" title="Minus" class="btn btn-danger" data-toggle="tooltip" data-placement="top"><i class="fa fa fa-minus"></i></a>
                    </div> 
                    <!-- <div style="margin: 5px;">
                                <i onclick="return copyRow();" class="btn btn-success fa fa-plus" style="padding: 6px 9px;"></i>
                                <i onclick="return deleterow();" class="btn btn-danger fa fa-minus" style="padding: 6px 9px;"></i>
                            </div> -->
              </div>
            </div>
        </div>
    </section>
</div>
</form>
    <script src="<?php echo base_url('assets/bootstrap/js/jquery.min.js'); ?>"></script> 
    <script type="text/javascript">

       //      var x = 1;
		    	// for (var i = 0; i < x;  i++) {
		    	// $("#tbody_search").append("<tr>\n\
		    	// var hdnid = $('#hdn_id["+x+"]').val();\n\
	      //       console.log(hdnid);\n\
	      //       </tr>");
	      //       x++;
	      //       }

			function submitform(){

				var len = $("#tbody_search tr").length; 

               for (var i = 1; i <= len; i++) {

		          var txt_particular = $("#txt_particular\\["+ i +"\\]").val();
		          if (txt_particular == "") {
			          alertModal("Please Enter Particular");
			          return false;
		           }
                }
	           $("#form_main").submit();     
	        }  

		    function reloadd(){
				location.reload();
				return false;
			}

			function copyRow(id){

		      var l;
		      var tbl_lenght = $('#tbody_search tr').length;
		      l = tbl_lenght + 1;   
		      $('#tbody_search').append("<tr>\n\
		      	<td><input type='hidden' id='hdn_id["+ l +"]' class='hdn_id' name='hdn_id["+ l +"]'>\n\
		      	<input type='hidden' id='flag["+ l +"]' name='flag["+ l +"]' value='0'>\n\
		      	<input type='text' id='txt_particular["+ l +"]' name='txt_particular["+ l +"]' style='width:100%'></td>\n\
				<td style='text-align: center;'><input type='checkbox' id='chk["+ l +"]' name='chk["+ l +"]' checked></td>\n\
		      	</tr>");

	       }

		    function deleterow() {

		        var a = $("#tbody_search tr:last").find(".hdn_id").val();
		        // console.log(a);
		        if (a == "") {
		        $("#tbody_search").find("tr:last").remove();
		        // alert("Remove");
		        }else{
		        alert("Can't Delete Row It's Already Exists");
		        }
		    }

                var hdnid = $("#hdn_id").val();
	        	
			$.ajax({
				type: "POST",
				url: "<?php echo base_url(); ?>Production/Board_changemaster/data",
				// dataType: "JSON",
				data: {hdn_id:hdnid}
			}).done(function (msg) {
				// alert(msg);
				// console.log(msg);
				var main = jQuery.parseJSON(msg);
				var data = main;

				if (data.length > 0) {

					var x = 1;
					for (var i = 0; i < data.length; i++) {
						if (data[i].IsActive == 1) {
				    		var check = " checked='checked' ";
				    		var c = 1;
				    	}else {
				    		var check = ""; 
				    		var c= 0;
				    	}
						$("#tbody_search").append("<tr>\n\
						    <td><input type='hidden' id='hdn_id[" + x + "]'  class='hdn_id' name='hdn_id[" + x + "]' value='" + data[i].ID + "'>\n\
						    <input type='hidden' id='flag["+ x +"]' name='flag["+ x +"]' value='0' style='border: 1px solid #367FA9;'>\n\
						    <input type='text' id='txt_particular["+ x +"]' name='txt_particular["+ x +"]' value='" + data[i].Particular + "' style='border: 1px solid #367FA9;width:100%'></td>\n\
						    <td style='text-align: center;'><input type='checkbox' id='chk["+ x +"]' "+check+" name='chk["+ x+"]'></td>\n\
							\n\
							\n\
						</tr>");
						x++;
					}
				} else {
					alertModal("No Data Found !");
				}

				$.unblockUI();
			});                            

		   	

        </script>    