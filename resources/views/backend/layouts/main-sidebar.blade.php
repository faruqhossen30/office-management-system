<div class="sidebar sidebar-dark sidebar-main sidebar-expand-md">

    <!-- Sidebar mobile toggler -->
    <div class="sidebar-mobile-toggler text-center">
        <a href="#" class="sidebar-mobile-main-toggle">
            <i class="icon-arrow-left8"></i>
        </a>
        Navigation
        <a href="#" class="sidebar-mobile-expand">
            <i class="icon-screen-full"></i>
            <i class="icon-screen-normal"></i>
        </a>
    </div>
    <!-- /sidebar mobile toggler -->


    <!-- Sidebar content -->
    <div class="sidebar-cont ent">

        <!-- User menu -->
        <div class="sidebar-user">
            <div class="card-body">
                <div class="media">
                    <div class="mr-3">
                        <a href="#"><img src="{{ asset('global_assets/images/placeholders/user.png') }}" width="38"
                                height="38" class="rounded-circle" alt=""></a>
                    </div>

                    <div class="media-body">
                        <div class="media-title font-weight-semibold">{{ Auth::user()->name }}</div>
                        <div class="font-size-xs opacity-50">
                            <i class="icon-pin font-size-sm"></i>{{ Auth::user()->email }}
                        </div>
                    </div>

                    <div class="ml-3 align-self-center">
                        <a href="#" class="text-white"><i class="icon-cog3"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
            <ul class="nav nav-sidebar" data-nav-type="accordion">

                <!-- Main -->
                <li class="nav-item-header">
                    <div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu"
                        title="Main"></i>
                </li>
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="icon-home4"></i>
                        <span>
                            Dashboard
                        </span>
                    </a>
                </li>
                <li class="nav-item nav-item-submenu @if (request()->routeIs('deposit', 'deposit.view', 'payment.index')) nav-item-expanded nav-item-open @endif">
                    <a href="#" class="nav-link"><i class="
                        icon-piggy-bank"></i>
                        <span>Cradit</span></a>

                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="{{ route('deposit') }}"
                                class="nav-link {{ request()->routeIs('deposit') ? 'active' : '' }} ">Add
                                Cradit</a></li>
                        <li class="nav-item"><a href="{{ route('deposit.view') }}"
                                class="nav-link {{ request()->routeIs('deposit.view') ? 'active' : '' }}">
                                Cradit List</a></li>
                        <li class="nav-item"><a href="{{ route('payment.index') }}"
                                class="nav-link {{ request()->routeIs('payment.index') ? 'active' : '' }}">
                                Payment system</a></li>

                    </ul>
                </li>
                <li class="nav-item nav-item-submenu @if (request()->routeIs('balance')) nav-item-expanded nav-item-open @endif">
                    <a href="{{ route('balance') }}" class="nav-link"><i class="icon-wallet"></i>
                        <span>Balance</span></a>
                </li>


                <li class="nav-item nav-item-submenu @if (request()->routeIs('office', 'office.view')) nav-item-expanded nav-item-open @endif">
                    <a href="#" class="nav-link"><i class="icon-office"></i> <span>Office</span></a>

                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="{{ route('office') }}"
                                class="nav-link @if (request()->routeIs('office')) active @endif ">Add
                                Office</a></li>
                        <li class="nav-item"><a href="{{ route('office.view') }}"
                                class="nav-link @if (request()->routeIs('office.view')) active @endif">
                                Office List</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu @if (request()->routeIs('expenselist.create', 'expenselist.index', 'expense.index','sub-expense-type.index')) nav-item-expanded nav-item-open @endif">
                    <a href="#" class="nav-link"><i class="
                        icon-cash"></i>
                        <span>Debit</span></a>

                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="{{ route('expenselist.create') }}"
                                class="nav-link  @if (request()->routeIs('expenselist.create')) active @endif ">Add Debit</a>
                        </li>
                        <li class="nav-item"><a href="{{ route('expenselist.index') }}"
                                class="nav-link @if (request()->routeIs('expenselist.index')) active @endif">View
                                Debit</a></li>
                        <li class="nav-item"><a href="{{ route('expense.index') }}"
                                class="nav-link @if (request()->routeIs('expense.index')) active @endif">
                                Debit Type</a></li>
                        <li class="nav-item"><a href="{{ route('sub-expense-type.index') }}"
                                class="nav-link @if (request()->routeIs('sub-expense-type.index')) active @endif">
                              Sub  Debit Type</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu @if (request()->routeIs('sub-asset-type.index', 'sub-asset-type.create')) nav-item-expanded nav-item-open @endif">
                    <a href="#" class="nav-link"><i class="
                        icon-trophy4"></i>
                        <span> Sub Asset</span></a>


                    <ul class="nav nav-group-sub @if (request()->routeIs('sub-asset-type.create', 'sub-asset-type.index')) nav-item-expanded nav-item-open @endif">
                        <li class="nav-item"><a href="{{ route('sub-asset-type.create') }}"
                                class="nav-link  @if (request()->routeIs('sub-asset-type.create')) active @endif">Add sub asset</a></li>
                        <li class="nav-item"><a href="{{ route('sub-asset-type.index') }}"
                                class="nav-link  @if (request()->routeIs('sub-asset-type.index')) active @endif">view sub asset</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu @if (request()->routeIs('assettype.index', 'asset.index', 'asset.create')) nav-item-expanded nav-item-open @endif">
                    <a href="#" class="nav-link"><i class="
                        icon-trophy4"></i>
                        <span>Asset</span></a>


                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="{{ route('assettype.index') }}"
                                class="nav-link @if (request()->routeIs('assettype.index')) active @endif">Asset Type</a>

                        </li>
                        <li class="nav-item"><a href="{{ route('asset.index') }}"
                                class="nav-link @if (request()->routeIs('asset.index') || request()->routeIs('asset.create')) active @endif">Add Asset</a></li>
                        {{-- <li class="nav-item"><a href="#" class="nav-link">Asset Assignment</a></li> --}}
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu @if (request()->routeIs('position.index', 'advance-salary.index', 'advance-salary.create', 'employee-information.index', 'employee-information.create', 'department.index', 'department.create')) nav-item-expanded nav-item-open @endif">
                    <a href="#" class="nav-link"><i class="
                        icon-users4"></i>
                        <span>Employee</span></a>

                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="{{ route('position.index') }}"
                                class="nav-link @if (request()->routeIs('position.index')) active @endif">Position</a>
                        </li>
                        <li class="nav-item"><a
                                href="{{ route('employee-information.index', 'employee-information.create') }}"
                                class="nav-link @if (request()->routeIs('employee-information.index', 'employee-information.create')) active @endif ">Employee</a>

                            <ul class="nav nav-group-sub @if (request()->routeIs('employee-information.index', 'employee-information.create')) nav-item-expanded nav-item-open @endif">
                                <li class="nav-item"><a href="{{ route('employee-information.create') }}"
                                        class="nav-link  @if (request()->routeIs('employee-information.create')) active @endif">Add Employee</a></li>
                                <li class="nav-item"><a href="{{ route('employee-information.index') }}"
                                        class="nav-link  @if (request()->routeIs('employee-information.index')) active @endif">view Employee</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a href="{{ route('department.index') }}"
                                class="nav-link @if (request()->routeIs('department.index')) active @endif ">Department</a>

                            <ul class="nav nav-group-sub @if (request()->routeIs('department.index', 'department.create')) nav-item-expanded nav-item-open @endif">
                                <li class="nav-item"><a href="{{ route('department.create') }}"
                                        class="nav-link  @if (request()->routeIs('department.create')) active @endif">Add department</a></li>
                                <li class="nav-item"><a href="{{ route('department.index') }}"
                                        class="nav-link  @if (request()->routeIs('department.index')) active @endif">view department</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a href="{{ route('advance-salary.index') }}"
                                class="nav-link @if (request()->routeIs('advance-salary.index')) active @endif ">AdvanceSalary</a>

                            <ul class="nav nav-group-sub @if (request()->routeIs('advance-salary.index', 'advance-salary.create')) nav-item-expanded nav-item-open @endif">
                                <li class="nav-item"><a href="{{ route('advance-salary.create') }}"
                                        class="nav-link  @if (request()->routeIs('advance-salary.create')) active @endif">Add advance</a></li>
                                <li class="nav-item"><a href="{{ route('advance-salary.index') }}"
                                        class="nav-link  @if (request()->routeIs('advance-salary.index')) active @endif">view advance</a></li>
                            </ul>
                        </li>

                        <li class="nav-item"><a href="#" class="nav-link"></a></li>
                    </ul>
                </li>

                <li class="nav-item nav-item-submenu @if (request()->routeIs('bank.index', 'bank.create')) nav-item-expanded nav-item-open @endif">
                    <a href="#" class="nav-link"><i class="
                        icon-library2"></i>
                        <span>Bank</span></a>

                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="{{ route('bank.create') }}"
                                class="nav-link @if (request()->routeIs('bank.create')) active @endif">Add Bank</a>
                        </li>
                        <li class="nav-item"><a href="{{ route('bank.index') }}"
                                class="nav-link @if (request()->routeIs('bank.index')) active @endif">bank list</a></li>
                        <li class="nav-item"><a href="#" class="nav-link"></a></li>

                    </ul>
                </li>
                <li class="nav-item nav-item-submenu @if (request()->routeIs('lone.index', 'lone.create')) nav-item-expanded nav-item-open @endif">
                    <a href="#" class="nav-link"><i class="
                        icon-cash2"></i>
                        <span>Loan</span></a>

                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="{{ route('lone.create') }}"
                                class="nav-link @if (request()->routeIs('lone.create')) active @endif">Add Loan</a>
                        </li>
                        <li class="nav-item"><a href="{{ route('lone.index') }}"
                                class="nav-link @if (request()->routeIs('lone.index')) active @endif">Loan list</a></li>
                        <li class="nav-item"><a href="#" class="nav-link"></a></li>

                    </ul>
                </li>
                <li class="nav-item nav-item-submenu @if (request()->routeIs('salary-setup.create', 'salary-setup.index')) nav-item-expanded nav-item-open @endif">
                    <a href="#" class="nav-link"><i class="
                        icon-credit-card2"></i>
                        <span>Payroll</span></a>

                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="{{ route('salary-setup.create') }}"
                                class="nav-link @if (request()->routeIs('salary-setup.create')) active @endif">Salary Genarate</a>
                        </li>
                        <li class="nav-item"><a href="{{ route('salary.index') }}"
                                class="nav-link @if (request()->routeIs('salary.index')) active @endif">View Salary</a></li>
                        <li class="nav-item"><a href="#" class="nav-link"></a></li>

                    </ul>
                </li>
                <li class="nav-item nav-item-submenu @if (request()->routeIs('user-admin.create', 'user-admin.index')) nav-item-expanded nav-item-open @endif">
                    <a href="#" class="nav-link"><i class="icon-users"></i>
                        <span>User</span></a>

                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="{{ route('user-admin.create') }}"
                                class="nav-link @if (request()->routeIs('user-admin.create')) active @endif">Add Users</a>
                        </li>
                        <li class="nav-item"><a href="{{ route('user-admin.index') }}"
                                class="nav-link @if (request()->routeIs('user-admin.index')) active @endif">Users list</a></li>
                        <li class="nav-item"><a href="#" class="nav-link"></a></li>

                    </ul>
                </li>
                <li class="nav-item nav-item-submenu @if (request()->routeIs('setting')) nav-item-expanded nav-item-open @endif">
                    <a href="{{ route('setting') }}" class="nav-link"><i class="icon-cog3"></i>
                        <span>Setting</span></a>
                </li>

                <li class="nav-item">

                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="icon-switch2"></i>
                        <span>
                            Logout
                        </span>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>

                </li>

                {{-- <li class="nav-item nav-item-submenu">
                    <a href="#" class="nav-link"><i class="icon-copy"></i> <span>Layouts</span></a>

                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item">
                            <a href="index.html" class="nav-link active"><i class="icon-plus2 mr-2"></i>Default
                                layout</a>
                        </li>

                    </ul>
                </li> --}}
                <!-- /page kits -->

            </ul>
        </div>
        <!-- /main navigation -->

    </div>
    <!-- /sidebar content -->

</div>
