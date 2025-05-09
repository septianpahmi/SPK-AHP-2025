<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="/images/logo-sma.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><b>SPK AHP</b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ 'dashboard' }}" class="nav-link{{ Request::is('dashboard') ? ' active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                @if (Auth::user()->role == 'TU')
                    <li class="nav-header">MASTER DATA</li>
                    <li class="nav-item">
                        <a href="{{ 'kelas' }}" class="nav-link{{ Request::is('kelas') ? ' active' : '' }}">
                            <i class="nav-icon fas fa-school"></i>
                            <p>Kelas</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ 'kriteria' }}"
                            class="nav-link{{ Request::is('kriteria') || Request::is('subkriteria/*') ? ' active' : '' }}">
                            <i class="nav-icon fas fa-server"></i>
                            <p>Kriteria</p>
                        </a>
                    </li>
                @endif

                <li class="nav-header">MAIN DATA</li>
                @if (Auth::user()->role == 'TU')
                    <li class="nav-item">
                        <a href="{{ 'beasiswa' }}"
                            class="nav-link{{ (Request::is('beasiswa') ? ' active' : '' || Request::is('kuota')) ? ' active' : '' }}">
                            <i class="nav-icon fas fa-paste"></i>
                            <p>Beasiswa</p>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->role == 'komite')
                    <li class="nav-item">
                        <a href="{{ 'peserta' }}"
                            class="nav-link{{ Request::is('peserta') || Request::is('peserta/*') ? ' active' : '' }}">
                            <i class="nav-icon fas fa-user-plus"></i>
                            <p>Peserta</p>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->role == 'TU')
                    <li class="nav-item">
                        <a href="{{ 'analisis' }}"
                            class="nav-link{{ Request::is('analisis') || Request::is('analisis/*') ? ' active' : '' }}">
                            <i class="nav-icon fas fa-file"></i>
                            <p>Analisis</p>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->role == 'komite' || Auth::user()->role == 'kepsek')
                    <li class="nav-item">
                        <a href="{{ 'hasil' }}" class="nav-link{{ Request::is('hasil') ? ' active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>Hasil Analisis</p>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->role == 'siswa')
                    <li class="nav-item">
                        <a href="{{ 'hasil-user' }}"
                            class="nav-link{{ Request::is('hasil-user') ? ' active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>Hasil</p>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->role == 'TU')
                    <li class="nav-header">USER MANAGEMEN</li>
                    <li class="nav-item">
                        <a href="{{ 'users' }}" class="nav-link{{ Request::is('users') ? ' active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>Users</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ 'profil-siswa' }}"
                            class="nav-link{{ Request::is('profil-siswa') ? ' active' : '' }}">
                            <i class="nav-icon fas fa-user"></i>
                            <p>Data Siswa</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ 'galeri' }}" class="nav-link{{ Request::is('galeri') ? ' active' : '' }}">
                            <i class="nav-icon fas fa-file-pdf"></i>
                            <p>Dokumen</p>
                        </a>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
