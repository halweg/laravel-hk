<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                             </span>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{ $employee->name }}</strong>
                             </span> <span class="text-muted text-xs block">{{ $employee->username }}<b class="caret"></b></span> </span> </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li>
                            <a href="profile.html">Profile</a></li>
                        <li><a href="contacts.html">Contacts</a></li>
                        <li><a href="mailbox.html">Mailbox</a></li>
                        <li class="divider"></li>
                        <li><a href="{{ asset('admin/logout') }}">退出</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    szjy188
                </div>
            </li>
            <li>
                <a href="#"><i class="fa fa-user"></i> <span class="nav-label">雇员管理</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="{{ route('employee.index') }}">雇员列表</a></li>
                </ul>
            </li>
        </ul>

    </div>
</nav>
