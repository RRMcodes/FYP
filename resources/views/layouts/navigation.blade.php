<nav class="pcoded-navbar">
    <div class="nav-list">
        <div class="pcoded-inner-navbar main-menu">
            <div class="pcoded-navigation-label">Navigation</div>
            <ul class="pcoded-item pcoded-left-item">
                <li class="pcoded-micon {{ ( (Route::currentRouteName() == 'dashboard') ? 'active' : '' ) }}">
                    <a href="{{route('dashboard')}}" class="waves-effect waves-dark" >
                        <span class="pcoded-micon"><i class="feather icon-home fa-lg"></i></span>
                        <span class="pcoded-mtext">Dashboard</span>
                    </a>

                </li>
                @if (Auth::user()->role == 'staff' || Auth::user()->role == 'admin')

                <li class="{{ (str_contains(url()->current(), 'staff') ? 'active' : '' ) }}">
                    <a href="{{route('staff.index')}}" class="waves-effect waves-dark ">
                        <span class="pcoded-micon"><i class="fa-solid fa-user fa-lg"></i></span>
                        <span  class="pcoded-mtext">Staff</span>
                    </a>
                </li>
                <li class="{{ (str_contains(url()->current(), 'doctor') ? 'active' : '' ) }}">
                    <a href="{{route('doctor.index')}}" class="waves-effect waves-dark ">
                        <span class="pcoded-micon"><i class="fas fa-user-md fa-lg"></i></span>
                        <span  class="pcoded-mtext">Doctors</span>
                    </a>
                </li>
                @endif

                    @if (Auth::user()->role == 'staff' || Auth::user()->role == 'admin' || Auth::user()->role == 'doctor' )

                    <li class="{{ (str_contains(url()->current(), 'patient') ? 'active' : '' ) }}">
                    <a href="{{route('patient.index')}}" class="waves-effect waves-dark ">
                        <span class="pcoded-micon"><i class="fa fa-user-plus fa-lg"></i></span>
                        <span class="pcoded-mtext">Patient</span>
                    </a>
                    </li>
                    @endif





                @if (Auth::user()->role == 'staff' || Auth::user()->role == 'admin')

                    <li class="pcoded-hasmenu {{(str_contains(url()->current(), 'report') ? 'active pcoded-trigger' : '' )}}">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="fa-solid fa-file-waveform"></i></span>
                            <span class="pcoded-mtext">Reports</span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="{{(str_contains(url()->current(), 'report/index') ? 'active' : '' )}}">
                                <a href="{{route('report.index')}}" class="waves-effect waves-dark ">
                                    <span class="pcoded-mtext">View Reports</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="pcoded-hasmenu {{(str_contains(url()->current(), 'event') ? 'active pcoded-trigger' : '' )}}">
                        <a href="javascript:void(0)" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="fa-solid fa-calendar-day fa-lg"></i></span>
                            <span class="pcoded-mtext">Events</span>
                        </a>
                        <ul class="pcoded-submenu">
                            <li class="{{(str_contains(url()->current(), 'event/index') ? 'active' : '' )}}">
                                <a href="{{route('event.index')}}" class="waves-effect waves-dark ">
                                    <span class="pcoded-mtext">View Events</span>
                                </a>
                            </li>
                            <li class="{{(str_contains(url()->current(), 'event/eventLog') ? 'active' : '' )}}">
                                <a href="{{route('event.eventLog')}}" class="waves-effect waves-dark ">
                                    <span class="pcoded-mtext">Event Log</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                <li class="pcoded-hasmenu {{(str_contains(url()->current(), 'item/') ? 'active pcoded-trigger' : '' )}}">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="fa-solid fa-warehouse"></i></span>
                        <span class="pcoded-mtext">Inventory</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="{{(str_contains(url()->current(), 'item/index') ? 'active' : '' )}}">
                            <a href="{{route('item.index')}}" class="waves-effect waves-dark ">
                                <span class="pcoded-mtext">View Items</span>
                            </a>
                        </li>
                        <li class="{{(str_contains(url()->current(), 'item/itemLog') ? 'active' : '' )}}">
                            <a href="{{route('item.itemLog')}}" class="waves-effect waves-dark ">
                                <span class="pcoded-mtext">Item Log</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="pcoded-hasmenu {{(str_contains(url()->current(), 'billing') ? 'active pcoded-trigger' : '' )}}">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="fa-solid fa-receipt"></i></span>
                        <span class="pcoded-mtext">Billing</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="{{(str_contains(url()->current(), 'billing/item') ? 'active' : '' )}}">
                            <a href="{{route('billing.itemCreate')}}" class="waves-effect waves-dark ">
                                <span class="pcoded-mtext">Pharmacy</span>
                            </a>
                        </li>
                        <li class="{{(str_contains(url()->current(), 'billing/test') ? 'active' : '' )}}">
                            <a href="{{route('billing.testCreate')}}" class="waves-effect waves-dark ">
                                <span class="pcoded-mtext">Clinical tests</span>
                            </a>
                        </li>
                        <li class="{{(str_contains(url()->current(), 'billing/index') ? 'active' : '' )}}">
                            <a href="{{route('billing.index')}}" class="waves-effect waves-dark ">
                                <span class="pcoded-mtext">Transaction Log</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

{{--                <li class="{{ (str_contains(url()->current(), 'appointment') ? 'active' : '' ) }}">--}}
{{--                    <a href="{{route('appointment.create')}}" class="waves-effect waves-dark ">--}}
{{--                        <span class="pcoded-micon"><i class="fa-regular fa-calendar-days fa-lg"></i></span>--}}
{{--                        <span class="pcoded-badge label label-danger">100+</span>--}}

{{--                        <span class="pcoded-mtext">Appointments</span>--}}
{{--                    </a>--}}
{{--                </li>--}}

                @if (Auth::user()->role == 'staff' || Auth::user()->role == 'doctor')

                <li class="pcoded-hasmenu {{(str_contains(url()->current(), 'appointment') ? 'active pcoded-trigger' : '' )}}">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="fa-regular fa-calendar-days fa-lg"></i></span>
                        <span class="pcoded-mtext">Appointments</span>

                    </a>
                    <ul class="pcoded-submenu">
                        <li class="{{(str_contains(url()->current(), 'appointment/create') ? 'active' : '' )}}">
                            <a href="{{route('appointment.create')}}" class="waves-effect waves-dark ">
                                <span class="pcoded-mtext">New appointment</span>
                                {{--                        <span class="pcoded-badge label label-danger">100+</span>--}}

                            </a>
                        </li>
                        <li class="{{(str_contains(url()->current(), 'appointment/index') ? 'active' : '' )}}">
                            <a href="{{route('appointment.index')}}" class="waves-effect waves-dark ">
                                <span class="pcoded-mtext">View Appointments</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
{{--                <li class="{{ (str_contains(url()->current(), 'service') ? 'active' : '' ) }}">--}}
{{--                    <a href="{{route('service.index')}}" class="waves-effect waves-dark ">--}}
{{--                        <span class="pcoded-micon"><i class="fa-solid fa-microscope"></i></span>--}}

{{--                        <span class="pcoded-mtext">Clinical Tests</span>--}}
{{--                    </a>--}}
{{--                </li>--}}

                @if (Auth::user()->role == 'staff' )

                <li class="pcoded-hasmenu {{(str_contains(url()->current(), 'service') ? 'active pcoded-trigger' : '' )}}">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="fa-solid fa-microscope"></i></span>
                        <span class="pcoded-mtext">Clinical Tests</span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class="{{(str_contains(url()->current(), 'service/index') ? 'active' : '' )}}">
                            <a href="{{route('service.index')}}" class="waves-effect waves-dark ">
                                <span class="pcoded-mtext">View Tests</span>
                            </a>
                        </li>
                        <li class="{{(str_contains(url()->current(), 'service/serviceLog') ? 'active' : '' )}}">
                            <a href="{{route('service.serviceLog')}}" class="waves-effect waves-dark ">
                                <span class="pcoded-mtext">Test Log</span>
                            </a>
                        </li>
                    </ul>
                </li>
                @endif

{{--                <li class="pcoded-hasmenu">--}}
{{--                    <a href="javascript:void(0)" class="waves-effect waves-dark">--}}
{{--                        <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>--}}
{{--                        <span class="pcoded-mtext">Page layouts</span>--}}
{{--                    </a>--}}
{{--                    <ul class="pcoded-submenu">--}}
{{--                        <li class=" pcoded-hasmenu">--}}
{{--                            <a href="javascript:void(0)" class="waves-effect waves-dark">--}}
{{--                                <span class="pcoded-mtext">Vertical</span>--}}
{{--                            </a>--}}
{{--                            <ul class="pcoded-submenu">--}}
{{--                                <li class="">--}}
{{--                                    <a href="menu-static.html" class="waves-effect waves-dark">--}}
{{--                                        <span class="pcoded-mtext">Static Layout</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="">--}}
{{--                                    <a href="menu-header-fixed.html" class="waves-effect waves-dark">--}}
{{--                                        <span class="pcoded-mtext">Header Fixed</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="">--}}
{{--                                    <a href="menu-compact.html" class="waves-effect waves-dark">--}}
{{--                                        <span class="pcoded-mtext">Compact</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="">--}}
{{--                                    <a href="menu-sidebar.html" class="waves-effect waves-dark">--}}
{{--                                        <span class="pcoded-mtext">Sidebar Fixed</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class=" pcoded-hasmenu">--}}
{{--                            <a href="javascript:void(0)" class="waves-effect waves-dark">--}}
{{--                                <span class="pcoded-mtext">Horizontal</span>--}}
{{--                            </a>--}}
{{--                            <ul class="pcoded-submenu">--}}
{{--                                <li class="">--}}
{{--                                    <a href="menu-horizontal-static.html" target="_blank" class="waves-effect waves-dark">--}}
{{--                                        <span class="pcoded-mtext">Static Layout</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="">--}}
{{--                                    <a href="menu-horizontal-fixed.html" target="_blank" class="waves-effect waves-dark">--}}
{{--                                        <span class="pcoded-mtext">Fixed layout</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="">--}}
{{--                                    <a href="menu-horizontal-icon.html" target="_blank" class="waves-effect waves-dark">--}}
{{--                                        <span class="pcoded-mtext">Static With Icon</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="">--}}
{{--                                    <a href="menu-horizontal-icon-fixed.html" target="_blank" class="waves-effect waves-dark">--}}
{{--                                        <span class="pcoded-mtext">Fixed With Icon</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        <li class="">--}}
{{--                            <a href="menu-bottom.html" class="waves-effect waves-dark">--}}
{{--                                <span class="pcoded-mtext">Bottom Menu</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </li>--}}

            </ul>


        </div>
    </div>
</nav>
