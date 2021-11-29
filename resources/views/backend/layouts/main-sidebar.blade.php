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
                        <a href="#"><img src="{{ asset('global_assets/images/placeholders/placeholder.jpg') }}"
                                width="38" height="38" class="rounded-circle" alt=""></a>
                    </div>

                    <div class="media-body">
                        <div class="media-title font-weight-semibold">Victoria Baker</div>
                        <div class="font-size-xs opacity-50">
                            <i class="icon-pin font-size-sm"></i> &nbsp;Santa Ana, CA
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
                    <a href="index.html" class="nav-link">
                        <i class="icon-home4"></i>
                        <span>
                            Dashboard
                        </span>
                    </a>
                </li>
                <li class="nav-item nav-item-submenu @if (request()->routeIs('deposit', 'deposit.view')) nav-item-expanded nav-item-open @endif">
                    <a href="#" class="nav-link"><i class="icon-library2"></i> <span>Deposite</span></a>

                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="{{ route('deposit') }}"
                                class="nav-link {{ request()->routeIs('deposit') ? 'active' : '' }} ">Add
                                Deposit</a></li>
                        <li class="nav-item"><a href="{{ route('deposit.view') }}"
                                class="nav-link {{ request()->routeIs('deposit.view') ? 'active' : '' }}">All
                                Deposit</a></li>

                    </ul>
                </li>
                <li class="nav-item nav-item-submenu @if (request()->routeIs('office', 'office.view')) nav-item-expanded nav-item-open @endif">
                    <a href="#" class="nav-link"><i class="icon-office"></i> <span>Office</span></a>

                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="{{ route('office') }}"
                                class="nav-link @if (request()->routeIs('office')) active @endif ">Add
                                Office</a></li>
                        <li class="nav-item"><a href="{{ route('office.view') }}"
                                class="nav-link @if (request()->routeIs('office.view')) active @endif">View
                                Office</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu @if (request()->routeIs('expenselist.create', 'expenselist.index', 'expense.index')) nav-item-expanded nav-item-open @endif">
                    <a href="#" class="nav-link"><i class="
                        icon-cash"></i>
                        <span>Expense</span></a>

                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="{{ route('expenselist.create') }}"
                                class="nav-link  @if (request()->routeIs('expenselist.create')) active @endif ">Add Expense</a>
                        </li>
                        <li class="nav-item"><a href="{{ route('expenselist.index') }}"
                                class="nav-link @if (request()->routeIs('expenselist.index')) active @endif">View
                                Expense</a></li>
                        <li class="nav-item"><a href="{{ route('expense.index') }}"
                                class="nav-link @if (request()->routeIs('expense.index')) active @endif">
                                Expences Type</a></li>
                    </ul>
                </li>
                <li class="nav-item nav-item-submenu @if (request()->routeIs('assettype.index', 'asset.index')) nav-item-expanded nav-item-open @endif">
                    <a href="#" class="nav-link"><i class="
                        icon-diamond"></i>
                        <span>Asset</span></a>

                    <ul class="nav nav-group-sub" data-submenu-title="Layouts">
                        <li class="nav-item"><a href="{{ route('assettype.index') }}"
                                class="nav-link @if (request()->routeIs('assettype.index')) active @endif">Asset Type</a>
                        </li>
                        <li class="nav-item"><a href="{{ route('asset.index') }}"
                                class="nav-link @if (request()->routeIs('asset.index')) active @endif">Equipment</a></li>
                        <li class="nav-item"><a href="#" class="nav-link active">Asset Assignment</a></li>
                    </ul>
                </li>


                <li class="nav-item">

                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                        <i class="icon-switch2"></i>
                        Logout
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
