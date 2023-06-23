<?php include "template/head_mhs.php"; ?>

<?php include "template/sidebar_mhs.php"; ?>

<?php include "template/topbar_mhs.php"; ?>

<!-- Page Heading -->
<div class="card bg-primary">
    <div class="card-body">
        <h5 class="m-0 font-weight-bold text-white">MATA KULIAH</h5>
    </div>
</div>
<hr>


<div class="row">
    <?php
    $id_mhs = $_SESSION["id_mhs"];
    $tampil = mysqli_query($koneksi, "SELECT tbl_matakuliah.*, tbl_matkulmhs.* FROM tbl_matakuliah, tbl_matkulmhs WHERE tbl_matakuliah.id_matkul = tbl_matkulmhs.id_matkul AND id_mhs = '$id_mhs' ");
    while ($data = mysqli_fetch_array($tampil)) :
    ?>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-12 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">  
                        <div class="col mr-2">
                            <div class="h6 mb-0 font-weight-bold text-gray-800 text-uppercase"><?= $data['kode_matkul'] ?> - <?= $data['nama_matkul'] ?></div>
                            <a href="?halaman=modul_praktik&perihal=kelola_modul&id_matkulmhs=<?= $data['id_matkulmhs'] ?>&id_matkul=<?= $data['id_matkul'] ?>">
                                <p class="card-text mt-3">Akses Modul<i class="fa-solid fa-angles-right ml-2"></i></p>
                            </a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php endwhile; ?>

</div>

<?php include "template/footer.php"; ?>