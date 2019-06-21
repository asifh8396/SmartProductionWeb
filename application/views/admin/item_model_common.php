<!-- Bootstrap modal -->
<div class="modal fade" id="modal_item_common" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Choose Item</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal">                    
                    <div class="form-body">
                        <div class="form-group">
                            <div class="col-md-12" style="border-right: 1px solid #ccc">
                                <ul class="nav" id="side-menu">
                                    <li class="sidebar-search">                                        
                                        <select class="form-control" id="drp_group" onchange="return get_item_by_group();">
                                            <option value="xxxxx">-- Please Select --</option>
                                            <option value="All">All</option>
                                        </select>
                                        <input type="hidden" id="hdn_currentRow" name="hdn_currentRow">
                                        <input type="hidden" id="hdn_param" name="hdn_param">
                                        <!-- /input-group -->
                                    </li>
                                    <li class="sidebar-search" style="margin-top: 4px;">
                                        <div class="input-group custom-search-form">
                                            <input type="text" class="form-control" placeholder="Search products...">
                                            <span class="input-group-btn">
                                                <button class="btn btn-default" type="button">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </span>
                                        </div>
                                        <!-- /input-group -->
                                    </li>
                                    <li>
                                        <div style="height: 350px; overflow-y: scroll; margin-top: 4px;">
                                            <table class="table table-striped table-bordered table-hover custom">
                                                <thead>
                                                    <tr>
                                                        <th>Item Code</th>
                                                        <th>Description</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tbody_item">
                                                    
                                                </tbody>
                                            </table>
                                        </div>
                                    </li>
                                </ul>
                            </div>                           
                        </div>
                    </div>
                </form>
            </div>
            <!--            <div class="modal-footer">
                            <button type="button" id="btnAdd" onclick="add_product()" data-dismiss="modal" class="btn btn-primary">Add</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                        </div>-->
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->