
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url("/")}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Budget</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @yield('active_home')">
        <a class="nav-link" href="{{url('/')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->

    <!-- Nav Item - Category -->
    <li class="nav-item @yield('active_category')">
        <a class="nav-link" href="{{url('category')}}">
            <i class="fas fa-fw fa-list"></i>
            <span>Category</span></a>
    </li>
    <li class="nav-item @yield('active_income')">
        <a class="nav-link" href="{{url('income')}}">
            <i class="fas fa-fw fa-money-check"></i>
            <span>Income</span></a>
    </li>
    <li class="nav-item @yield('active_expense')">
        <a class="nav-link" href="{{url('expense')}}">
            <i class="fas fa-fw fa-money-bill"></i>
            <span>Expense</span></a>
    </li>
    <li class="nav-item @yield('active_user')">
        <a class="nav-link" href="{{url('user')}}">
            <i class="fas fa-fw fa-user"></i>
            <span>User</span></a>
    </li>
    <li class="nav-item @yield('active_transaction')">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Other</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="{{url('transaction')}}">My Transactions</a>
            </div>
        </div>
    </li>

</ul>
