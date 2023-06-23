<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Awal Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center content-center">
            <div class="sidebar-brand-icon">
                <img src="./assets/img/logopolibatam.png" alt="" width="100px">
            </div>
            <div class="sidebar-brand-text mx-0 mt-2 text-bold">VIRTUAL LAB</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-2">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="?">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Data User
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Kelola Data User</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">User :</h6>
                    <a class="collapse-item" href="?halaman=user_admin">Admin</a>
                    <a class="collapse-item" href="?halaman=user_mahasiswa">Mahasiswa</a>
                    <a class="collapse-item" href="?halaman=user_dosen">Dosen</a>
                    <a class="collapse-item" href="?halaman=user_laboran">Laboran</a>
                    <a class="collapse-item" href="?halaman=user_guest">Guest</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Mata Kuliah
        </div>


        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="?halaman=jurusan">
                <i class="fas fa-fw fa-folder"></i>
                <span>Kelola Data Jurusan</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="?halaman=prodi">
                <i class="fas fa-fw fa-folder"></i>
                <span>Kelola Data Program Studi</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

          <!-- Nav Item - Pages Collapse Menu -->
          <li class="nav-item">
            <a class="nav-link" href="?halaman=mata_kuliah">
                <i class="fas fa-fw fa-folder"></i>
                <span>Kelola Data Mata Kuliah</span>
            </a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->