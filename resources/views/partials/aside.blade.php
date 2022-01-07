<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-primary elevation-2">
    <!-- Brand Logo -->
    <a href="{{route('home')}}" class="brand-link d-flex align-items-center">
        <img src="/images/logo.png" alt="MBC Logo" class="brand-image " style="opacity: .8">
        <span class="brand-text d-flex text-center flex-column">
            <div class="font-weight-bold" style="line-height: 1rem;">MBC</div>
            <small>Multi Bisnis Center</small>
        </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/images/user.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{route('users.show',auth()->user()->username)}}" class="d-block">{{auth()->user()->name}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link {{request()->is('/') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-header">MANAGE</li>
                <li class="nav-item">
                    <a href="{{route('users.index')}}" class="nav-link  {{request()->is('users') || request()->is('users/*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('referal.index')}}" class="nav-link  {{request()->is('referal') || request()->is('referal/*') ? 'active' : ''}}">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Kode Referal
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>