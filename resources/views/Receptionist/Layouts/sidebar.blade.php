<!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li>
                        <a class="" href="{{url('/receptionist_user')}}" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i>Dashboard
                        </a>
                    </li>
                    <li>
                        <a class="{{ Request::path() == 'receptionist_user/employee/family' ? 'active' : '' || Request::path() == 'receptionist_user/employee/family/edit' ? 'active' : '' || Request::path() == 'receptionist_user/employee/family/add' ? 'active' : '' || Request::path() == 'receptionist_user/employee/add' ? 'active' : '' || Request::path() == 'receptionist_user/employee/edit' ? 'active' : '' || Request::path() == 'receptionist_user/employee/card' ? 'active' : '' || Request::path() == 'receptionist_user/employee/view' ? 'active' : ''}}" href="{{url('receptionist_user/employee?type=1')}}" aria-expanded="false">
                            <i class="fa fas fa-users"></i><span class="nav-text">Employees</span>
                        </a>
                    </li>
                    <li>
                        <a class="{{Request::path() == 'receptionist_user/receipt/detail-list' ? 'active' : '' || Request::path() == 'receptionist_user/receipt/create_receipt' ? 'active' : '' || Request::path() == 'receptionist_user/receipt/detail' ? 'active' : '' || Request::path() == 'receptionist_user/receipt/receipt' ? 'active' : '' || Request::path() == 'receptionist_user/receipt/edit' ? 'active' : '' || Request::path() == 'receptionist_user/receipt/view' ? 'active' : '' || Request::path() == 'receptionist_user/receipt/receipt-view' ? 'active' : ''}}" href="{{url('/receptionist_user/receipt')}}" aria-expanded="false">
                            <i class="icon-doc"></i>Receipt
                        </a>
                    </li>
                    <li>
                        <a class="{{Request::path() == 'receptionist_user/medicines/add' ? 'active' : '' }}" href="{{url('receptionist_user/medicines')}}" aria-expanded="false">
                            <i class="fa fa-ambulance "></i>Medicines
                        </a>
                    </li>
               </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************