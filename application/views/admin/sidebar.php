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
                </ul>
            </li>
                    <li>
                    <a href="#">
                        <i class="fa fa-gear"></i><span>Masters</span><i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu"> 
                            <?php if($this->user_id == "00001") { ?>
                            <li>
                                <a href="<?php echo site_url(); ?>Production/JcPermissions">
                                    <i class="fa fa-circle-o"></i><span>Jobcard Permission</span>
                                    <small class="label pull-right bg-green"></small>
                                </a>
                            </li>
                            <?php }?>
                            <li>
                                <a href="<?php echo site_url(); ?>Production/AppMachine">
                                    <i class="fa fa-circle-o"></i><span>App Machine Master</span>
                                    <small class="label pull-right bg-green"></small>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url(); ?>Production/Extracostmaster">
                                    <i class="fa fa-circle-o"></i><span>Extra Cost Master</span>
                                    <small class="label pull-right bg-green"></small>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url(); ?>Production/BaseProcess_master">
                                    <i class="fa fa-circle-o"></i><span>Base Process Master</span>
                                    <small class="label pull-right bg-green"></small>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url(); ?>Production/ProcessName">
                                    <i class="fa fa-circle-o"></i><span>Process Master</span>
                                    <small class="label pull-right bg-green"></small>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url(); ?>Production/ActivityMaster">
                                    <i class="fa fa-circle-o"></i><span>Activity Master</span>
                                    <small class="label pull-right bg-green"></small>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url(); ?>Production/Board_changemaster">
                                    <i class="fa fa-circle-o"></i><span>Board Change Master</span>
                                    <small class="label pull-right bg-green"></small>
                                </a>
                            </li>
                        </ul>
                    </li>
                <li>
                    <a href="#">
                        <i class="fa fa-files-o"></i><span>Reports</span><i class="fa fa-angle-left pull-right"></i>
                        </a>
                    <ul class="treeview-menu"> 
                        <li>
                            <a href="<?php echo site_url(); ?>Production/JobCardColse?type=1">
                                <i class="fa fa-circle-o"></i><span>Jobcard Close List</span>
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