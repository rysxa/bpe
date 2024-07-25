<!-- partial:../../partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="../../assets/images/faces/face1.jpg" alt="profile" />
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">{{ Auth::user()->name }}</span>
                    <span class="text-secondary text-small">{{ Auth::user()->m_roles->name }}</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-home menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#management-nav" aria-expanded="false"
                aria-controls="management-nav">
                <span class="menu-title">Management</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-users menu-icon"></i>
            </a>
            <div class="collapse" id="management-nav">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('management.user.index') }}">Users</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#inventory-nav" aria-expanded="false"
                aria-controls="inventory-nav">
                <span class="menu-title">Inventory</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-users menu-icon"></i>
            </a>
            <div class="collapse" id="inventory-nav">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('inventory.deposits.index') }}">Deposit</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('inventory.withdraws.index') }}">Withdraw</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
<!-- partial -->
