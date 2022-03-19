<!-- Sidebar -->

<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #60b5e6">




        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center"
             href="">


            <img src="{{ url('admin/img/terang.png') }}" class="rounded-circle" alt="" width="100" height="70">
            <div class="sidebar-brand-text">Admin <sup>Ruang Sosial</sup></div>

        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">


        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{Request::is('Admin-Rs') ? ' active' : '' }}">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Nav Item - Master Menu -->
        <li
            class="nav-item {{Request::is('Admin-Rs/data-user',
            'Admin-Rs/data-aktivitas',
            'Admin-Rs/data-tempat-donasi',
            'Admin-Rs/data-kegiatan',
            'Admin-Rs/data-tempat-kegiatan',
            'Admin-Rs/data-tunawisma',
            'Admin-Rs/data-panti') ? ' active' : '' }}">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMaster" aria-expanded="true"
                aria-controls="collapseMaster">
                <i class="fas fa-table"></i>
                <span>Master Data</span>
            </a>
            <div id="collapseMaster" class="collapse" aria-labelledby="headingMaster" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Donasi</h6>
                    <a class="collapse-item {{Request::is('Admin-Rs/data-user') ? ' active' : '' }}"
                        href="{{ route('data-user.index') }}">Data User</a>
                    <a class="collapse-item {{Request::is('Admin-Rs/data-aktivitas') ? ' active' : '' }}"
                        href="{{route('data-aktivitas.index')}}">Data Aktivititas Donasi</a>
                    <a class="collapse-item {{Request::is('Admin-Rs/data-tempat-donasi') ? ' active' : '' }}"
                        href="{{ route('data-tempat-donasi.index') }}">Data Tempat Donasi</a>
                         <h6 class="collapse-header">Kegiatan</h6>
                    <a class="collapse-item {{Request::is('Admin-Rs/data-kegiatan') ? ' active' : '' }}"
                        href="{{route('data-kegiatan.index')}}">Data Kegiatan</a>
                    <a class="collapse-item {{Request::is('Admin-Rs/data-tempat-kegiatan') ? ' active' : '' }}"
                        href="{{ route('data-tempat-kegiatan.index') }}">Data Tempat Kegiatan</a>
                          <h6 class="collapse-header">Tunawisma</h6>
                    <a class="collapse-item {{Request::is('Admin-Rs/data-tunawisma') ? ' active' : '' }}"
                        href="{{route('data-tunawisma.index')}}">Data Tunawisma</a>
                    <a class="collapse-item {{Request::is('Admin-Rs/data-panti') ? ' active' : '' }}"
                        href="{{route('data-panti.index')}}">Data Panti</a>
                </div>
            </div>
        </li>


         <!-- Nav Item - Laporan Collapse Menu -->
    <li class="nav-item {{Request::is('Admin-Rs/laporan-aktivitas-donasi',
    'Admin-Rs/donasi-masuk',
    'Admin-Rs/data-uang-donasi',
    'Admin-Rs/kegiatan-masuk',
    'Admin-Rs/data-kegiatan-masuk') ? ' active' : '' }}">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan"
        aria-expanded="true" aria-controls="collapseLaporan">
        <i class="fas fa-fw fa-folder"></i>
        <span>Laporan</span>
      </a>
      <div id="collapseLaporan" class="collapse" aria-labelledby="headingLaporan" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Donasi</h6>
          <a class="collapse-item {{Request::is('Admin-Rs/donasi-masuk') ? ' active' : '' }}"
          href="{{route('donasi-masuk')}}">Donasi Masuk @if (App\Donasi::where('status_verifikasi',false)->count() > 0)
        <span class="badge badge-warning ">{{ App\Donasi::where('status_verifikasi',false)->count() }}</span>
        @endif</a>
          <a class="collapse-item {{Request::is('Admin-Rs/laporan-aktivitas-donasi') ? ' active' : '' }}"
          href="{{route('laporan-aktivitas-donasi')}}">Aktivitas Donasi</a>
           <h6 class="collapse-header">Keuangan</h6>
          <a class="collapse-item {{Request::is('Admin-Rs/data-uang-donasi') ? ' active' : '' }}"
          href="{{route('data-uang-donasi')}}">Data Uang Masuk</a>
         <h6 class="collapse-header">Kegiatan</h6>
          <a class="collapse-item {{Request::is('Admin-Rs/kegiatan-masuk') ? ' active' : '' }}"
          href="{{ route('kegiatan-masuk') }}">Kegiatan Masuk @if (App\PartisipasiKegiatan::where('status_verifikasi',false)->count() > 0)
        <span class="badge badge-warning ">{{ App\PartisipasiKegiatan::where('status_verifikasi',false)->count() }}</span>
        @endif</a>
           <a class="collapse-item {{Request::is('Admin-Rs/data-kegiatan-masuk') ? ' active' : '' }}"
           href="{{ route('data-kegiatan-masuk') }}">Data Kegiatan Masuk</a>
        <h6 class="collapse-header">Tunawisma</h6>
        <a class="collapse-item {{Request::is('Admin-Rs/laporan-tunawisma') ? ' active' : '' }}"
            href="{{ route('laporan-tunawisma') }}">Data Tunawisma</a>
        </div>
      </div>
    </li>

     <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">


        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->
