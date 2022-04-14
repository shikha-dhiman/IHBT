<!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li>
                        <a class="" href="{{url('/doctor')}}" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i>Dashboard
                        </a>
                    </li>
                    <li>
                        <a class="{{ Request::path() == 'doctor/receipts/detail-list' ? 'active' : '' || Request::path() == 'doctor/receipts/receipts' ? 'active' : '' || Request::path() == 'doctor/receipts/detail' ? 'active' : ''}}" href="{{url('doctor/receipts')}}" aria-expanded="false">
                            <i class="icon-doc"></i>Receipts
                        </a>
                    </li>
               </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************