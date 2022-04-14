<!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li>
                        <a class="" href="{{url('/owner')}}" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i>Dashboard
                        </a>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="" href="{{url('owner/receptionist?type=2')}}" aria-expanded="false">
                            <i class="icon-user-follow"></i><span class="nav-text">Receptionist</span>
                        </a>
                    </li>
                    <li >
                        <a href="{{url('owner/employees?type=1')}}" aria-expanded="false">
                            <i class="fa fas fa-users"></i><span class="nav-text">Employees</span>
                        </a>
                    </li> 
                    <li>
                        <a class="" href="{{url('owner/doctor?type=3')}}" aria-expanded="false">
                            <i class="fa fa-medkit"></i>Doctor
                        </a>
                    </li>
               </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************