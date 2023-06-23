<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-fixed-top navbar-light bg-white topbar mb-4 static-top shadow">

            <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

            <!-- Navbar Brand-Dashboard -->
            <span class="navbar-brand flex">
                <h4 class="m-0 font-weight-bold text-gray-800">Politeknik Negeri Batam</h4>
            </span>
            <!-- Akhir Navbar Brand-Dashboard -->

            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                <li class="nav-item dropdown no-arrow d-sm-none">

                <?php
                    $id = $_SESSION["id_mhs"];
                    $query    = mysqli_query($koneksi, "SELECT * FROM tbl_mahasiswa WHERE id_mhs='$id'");
                    if ($result   = mysqli_fetch_array($query)); {
                        $username     = $result['username'];
                        $nim_mhs      = $result['nim_mhs'];
                        $email_mhs    = $result['email_mhs'];
                        $alamat_mhs   = $result['alamat_mhs'];
                        $no_hpmhs     = $result['no_hpmhs'];
                        $image        = $result['profile_img'];
                    }


                    ?>

                    <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username'] ?></span>
                        <?php
                        if ($image == NULL) {
                            echo '<img src="./assets/img/icon/profile.png" class="img-profile">';
                        } else {
                            echo '<img class="img-profile rounded-circle" src="./image_profile/' . $image . '">';
                        }
                        ?>
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="?halaman=profile">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="?halaman=changepwd">
                            <i class="fas fa-solid fa-key fa-fw mr-2 text-gray-400"></i>
                            Change Password
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item logout" href="logout.php">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- Swal -->
        <script src="assets/js/jquery-3.6.1.js"></script>
        <script src="assets/js/sweetalert2/dist/swal.js"></script>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <!-- Awal container fluid -->
        <div class="container-fluid">