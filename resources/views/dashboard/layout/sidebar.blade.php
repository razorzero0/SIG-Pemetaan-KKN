<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title">
            <a href="index.php" class="site_title"><i class="glyphicon glyphicon-globe"></i> <span> SI
                    Geografis</span></a>
        </div>

        <div class="clearfix"></div>
        <!-- menu profile quick info -->
        <div class="profile clearfix ">
            <div class="profile_info" style="margin:-2rem 2rem ;color:aliceblue; text-align: center">
                <h4>Welcome {{ auth()->user()->name }}</h4>
            </div>

        </div>
        <!-- /menu profile quick info -->

        <hr />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <h3>Data Center</h3>
                <ul class="nav side-menu">

                    <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="/dashboard">Dashboard</a></li>
                        </ul>
                    </li>
                    @role('superadmin')
                        <li><a><i class="fa fa-user"></i>Data Admin<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="/data-admin">Daftar Admin</a></li>
                            </ul>
                        </li>
                    @endrole

                    <li><a><i class="fa fa-university"></i>Data DPL <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="/data-dpl">Daftar DPL</a></li>
                        </ul>
                    </li>

                    <li><a><i class="fa fa-map"></i> Data Lokasi<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="/data-lokasi">Daftar Lokasi</a></li>

                        </ul>
                    </li>
                    <li><a><i class="fa fa-group"></i> Data Kelompok <span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="/data-group">Daftar Kelompok</a></li>

                        </ul>
                    </li>

                </ul>
            </div>


        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>
