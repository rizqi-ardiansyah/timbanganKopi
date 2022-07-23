<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-left justify-content-left" href="#">
        <div class="sidebar-brand-text"></div>Timbangan Kopi
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <div class="sidebar-heading">
        Menu Utama
    </div>
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('home')}}">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{route('pekerja.index')}}">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Pekerja</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('list-pekerja')}}">
            <i class="fas fa-fw fa-users"></i>
            <span>List Pekerja Baru</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('kopi.index')}}">
            <i class="fas fa-fw fa-coffee"></i>
            <span>Data Kopi</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('laporan')}}">
            <i class="fas fa-fw fa-print"></i>
            <span>Laporan</span>
        </a>
    </li>
</ul>
<!-- End of Sidebar -->
