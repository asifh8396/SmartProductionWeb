<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo baseUrl(); ?>assets/dist/img/noavatar.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $this->user_name; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a  href="<?php echo baseUrl(); ?>dashboard">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li hidden>
                <a href="#">
                    <i class="fa fa-circle"></i> <span>Plate Management</span><i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu"> 
                    <li>
                        <a href="<?php echo base_url(); ?>Plate/PlateCreation">
                            <i class="fa fa-circle-o"></i><span>Plate Master</span>
                            <small class="label pull-right bg-green"></small>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>Plate/PlateIssue">
                            <i class="fa fa-circle-o"></i><span>Plate Issue Entry</span>
                            <small class="label pull-right bg-green"></small>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>Plate/IssueRegister">
                            <i class="fa fa-circle-o"></i><span>Plate Issue Register</span>
                            <small class="label pull-right bg-green"></small>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>Plate/PlateDestroy">
                            <i class="fa fa-circle-o"></i><span>Plate Destroy</span>
                            <small class="label pull-right bg-green"></small>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>Plate/PlateDestroyReason">
                            <i class="fa fa-circle-o"></i><span>Plate Destroy Reasons</span>
                            <small class="label pull-right bg-green"></small>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>Plate/PlateReceive">
                            <i class="fa fa-circle-o"></i><span>Plate Receive</span>
                            <small class="label pull-right bg-green"></small>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>Plate/DestructionReport">
                            <i class="fa fa-circle-o"></i><span>Plate Destruction Report</span>
                            <small class="label pull-right bg-green"></small>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>Plate/ProductionReport">
                            <i class="fa fa-circle-o"></i><span>Plate Production Report</span>
                            <small class="label pull-right bg-green"></small>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo base_url(); ?>Plate/StorageRecord">
                            <i class="fa fa-circle-o"></i><span>Plate Storage Record</span>
                            <small class="label pull-right bg-green"></small>
                        </a>
                    </li>
                </ul>
            </li>
            <li hidden>
                <a href="#">
                    <i class="fa fa-outdent"></i> <span>Ink Management</span><i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu"> 
                    <li>
                        <a href="<?php echo site_url(); ?>inkmgt/Calculate_RMConsumption">
                            <i class="fa fa-circle-o"></i><span>Calculate RM Consumption</span>
                            <small class="label pull-right bg-green"></small>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url(); ?>inkmgt/RMConsumption_JobWise">
                            <i class="fa fa-circle-o"></i><span>RM Consumption Job Wise</span>
                            <small class="label pull-right bg-green"></small>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url(); ?>inkmgt/InkUnitReport">
                            <i class="fa fa-circle-o"></i><span>Ink Unit Report</span>
                            <small class="label pull-right bg-green"></small>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url(); ?>inkmgt/Inkvsmisink">
                            <i class="fa fa-circle-o"></i><span>Ink/MIS Ink Stock</span>
                            <small class="label pull-right bg-green"></small>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url(); ?>inkmgt/Jobwiseink">
                            <i class="fa fa-circle-o"></i><span>Job Wise Ink Requirement</span>
                            <small class="label pull-right bg-green"></small>
                        </a>
                    </li>
                    <!-- <li>
                        <a href="<?php echo site_url(); ?>inkmgt/ink_stores">
                            <i class="fa fa-circle-o"></i><span>Ink Kitchen</span>
                            <small class="label pull-right bg-green"></small>
                        </a>
                    </li> -->
                </ul>
            </li>

            <li hidden>
                <a href="#">
                    <i class="fa fa-outdent"></i> <span>Contractor Management</span><i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu"> 
                    <li>
                        <a href="<?php echo site_url(); ?>Contractor_Master">
                            <i class="fa fa-circle-o"></i><span>Master</span>
                            <small class="label pull-right bg-green"></small>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url(); ?>ContractorDetail">
                            <i class="fa fa-circle-o"></i><span>Contractor Detail</span>
                            <small class="label pull-right bg-green"></small>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url(); ?>Contractor_Mgmt">
                            <i class="fa fa-circle-o"></i><span>Rate</span>
                            <small class="label pull-right bg-green"></small>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url(); ?>ContractorBillGeneration">
                            <i class="fa fa-circle-o"></i><span>Bill Generation</span>
                            <small class="label pull-right bg-green"></small>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url(); ?>Contractorrateapproval">
                            <i class="fa fa-circle-o"></i><span>Bill Approval</span>
                            <small class="label pull-right bg-green"></small>
                        </a>
                    </li>

                </ul>
            </li>

            <li hidden>
                <a href="#">
                    <i class="fa fa-outdent"></i> <span>Utility </span><i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu"> 
                    <li>
                        <a href="<?php echo site_url(); ?>FpUpdate">
                            <i class="fa fa-circle-o"></i><span>Update Fp Material</span>
                            <small class="label pull-right bg-green"></small>
                        </a>
                    </li>
					
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-industry"></i> <span>Production </span><i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu"> 
                    <li>
                        <a href="<?php echo site_url(); ?>Production/PendingJobcard">
                            <i class="fa fa-circle-o"></i><span>Pending W.O. For Jc. Creation</span>
                            <small class="label pull-right bg-green"></small>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url(); ?>Production/Jobsearch">
                            <i class="fa fa-circle-o"></i><span>Jobcard Search</span>
                            <small class="label pull-right bg-green"></small>
                        </a>
                    </li>
					<?php if($this->user_id == "00001") { ?>
                    <li>
                        <a href="<?php echo site_url(); ?>Production/JcPermissions">
                            <i class="fa fa-circle-o"></i><span>Jobcard Permission</span>
                            <small class="label pull-right bg-green"></small>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url(); ?>Production/JobCardColse?type=1">
                            <i class="fa fa-circle-o"></i><span>Jobcard Close List</span>
                            <small class="label pull-right bg-green"></small>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url(); ?>Production/Board_changemaster">
                            <i class="fa fa-circle-o"></i><span>Board Change Master</span>
                            <small class="label pull-right bg-green"></small>
                        </a>
                    </li>
                    <?php }?>
                </ul>
            </li>
            <li hidden>
                <a href="#">
                    <i class="fa fa-outdent"></i> <span>Stores</span><i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu"> 
                    <li>
                        <a href="<?php // echo base_url();   ?>stores/RMConsumption">
                            <i class="fa fa-circle-o"></i><span>Floor RM Consumption</span>
                            <small class="label pull-right bg-green"></small>
                        </a>
                    </li>
                    <li>
                        <a href="<?php // echo base_url();   ?>stores/ink_stores">
                            <i class="fa fa-circle-o"></i><span>Ink Kitchen</span>
                            <small class="label pull-right bg-green"></small>
                        </a>
                    </li> 
                </ul>
            </li> 
            <li hidden>
                <a href="#">
                    <i class="fa fa-users"></i> <span>Utility</span><i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu"> 
                    <li>
                        <a href="<?php // echo site_url();   ?>ClientUtility">
                            <i class="fa fa-circle-o"></i><span>Client Change Utility</span>
                            <small class="label pull-right bg-green"></small>
                        </a>
                    </li>
                </ul>
            </li> 
            <li hidden>
                <a href="#">
                    <i class="fa fa-files-o"></i> <span>Reports</span><i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu"> 
                    <li>
                        <a href="<?php // echo site_url();   ?>Reports/sales_invoice">
                            <i class="fa fa-circle-o"></i><span>Input VS Sales</span>
                            <small class="label pull-right bg-green"></small>
                        </a>
                    </li> 
                    <li>
                        <a href="<?php echo site_url(); ?>BalanceMaster">
                            <i class="fa fa-circle-o"></i><span>Overhead Month Wise</span>
                            <small class="label pull-right bg-green"></small>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url(); ?>reverse_jobcard">
                            <i class="fa fa-circle-o"></i><span>Cost Sheet</span>
                            <small class="label pull-right bg-green"></small>
                        </a>
                    </li>

                    <li>
                        <a href="<?php echo site_url(); ?>reverse_jobcard/Approved">
                            <i class="fa fa-circle-o"></i><span>Approved Cost Sheet</span>
                            <small class="label pull-right bg-green"></small>
                        </a>
                    </li>                   
                </ul>
            </li>

            <li><a href="javascript:void(0)"><i class="fa fa-circle-o text-aqua"></i> <span>About Renuka</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>