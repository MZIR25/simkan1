<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-info-primary elevation-4">
    <!-- Brand Logo -->    
    <img src="{{asset('template/')}}/dist/img/logo_valtech.png" alt="Valtech Logo" class="img-fluid" style="opacity: .8">
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="fluid text-info h2 mt-3 mb-3 ml-3 d-flex">SIM KARYAWAN 	
            

        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-item">
            <a href="{{ route('home') }}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                Beranda
                </p>
            </a>
            </li>
            <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                Karyawan
                <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="pages/layout/top-nav.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Daftar Karyawan</p>
                </a>
                </li>
                <li class="nav-item">
                <a href="pages/layout/top-nav-sidebar.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Data Diri</p>
                </a>
                </li>
            </ul>
            </li>
            <li class="nav-item">
            <a href="/permohonan_cuti" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                Permohonan Cuti
                </p>
            </a>
            
            <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon far fa-calendar-alt"></i>
                <p>
                Presensi
                <i class="fas fa-angle-left right"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                <a href="pages/UI/general.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Laporan Presensi</p>
                </a>
                </li>
                <li class="nav-item">
                <a href="pages/UI/icons.html" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Hasil Presensi</p>
                </a>
                </li>
            </ul>
            </li>
            <li class="nav-item">
            <a href="/daftar_gaji" class="nav-link">
                <i class="nav-icon fas fa-table"></i>
                <p>
                Daftar Gaji
                </p>
            </a>
            <li class="nav-item">
                <a href="/daftar_jobdesk" class="nav-link">
                    <i class="nav-icon fas fa-columns"></i>
                    <p>
                    Jobdesk
                    </p>
                </a>
        </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>