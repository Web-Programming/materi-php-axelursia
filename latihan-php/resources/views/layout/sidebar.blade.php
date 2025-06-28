<div class="sidebar-wrapper">
    <nav class="mt-2">
      <!--begin::Sidebar Menu-->
      <!--begin::Sidebar Menu-->
<ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
    <li class="nav-item menu-open">
      <a href="#" class="nav-link active">
        <i class="nav-icon bi bi-speedometer"></i>
        <p>
          Dashboard
          <i class="nav-arrow bi bi-chevron-right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="{{ route('prodi.index') }}" class="nav-link {{ request()->is('prodi*') ? 'active' : '' }}">
            <i class="nav-icon bi bi-circle"></i>
            <p>Program Studi</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('mahasiswa.index') }}" class="nav-link {{ request()->is('mahasiswa*') ? 'active' : '' }}">
            <i class="nav-icon bi bi-circle"></i>
            <p>Mahasiswa</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('materi.index') }}" class="nav-link {{ request()->is('materi*') ? 'active' : '' }}">
            <i class="nav-icon bi bi-circle"></i>
            <p>Materi</p>
          </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('dosen.index') }}" class="nav-link {{ request()->is('dosen*') ? 'active' : '' }}">
              <i class="nav-icon bi bi-circle"></i>
              <p>Dosen</p>
            </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('fakultas.index') }}" class="nav-link {{ request()->is('fakultas*') ? 'active' : '' }}">
            <i class="nav-icon bi bi-circle"></i>
            <p>Fakultas</p>
          </a>
      </ul>
    </li>
  </ul>
  <!--end::Sidebar Menu-->


      <!--end::Sidebar Menu-->
    </nav>
  </div>
  <!--end::Sidebar Wrapper-->
</aside>
