<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="#" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <div>
                            <i class="glyphicon glyphicon-user" style="scale: 2;padding: 1rem"></i>

                            <span class=" fa fa-angle-down"></span>
                        </div>
                    </a>


                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                        <li><a href="{{ route('data-profile.index') }}"> Profile</a></li>
                        <li><a href="{{ route('change-password') }}">Ganti Password &nbsp; <i
                                    class=" fa fa-lock"></i></a>
                        </li>


                        <li><a href="{{ route('logoutAction') }}"><i class="fa fa-sign-out pull-right text-danger"></i>
                                Log Out</a></li>
                    </ul>
                </li>


            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->
