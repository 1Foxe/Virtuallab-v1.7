<?php

//tampil data nilai
$id_modul = $_GET['id_modul'];
$tampil = mysqli_query($koneksi, "SELECT * FROM tbl_nilai_mhs INNER JOIN tbl_attempt_mhs ON tbl_nilai_mhs.id_attempt_mhs = tbl_attempt_mhs.id_attempt_mhs INNER JOIN tbl_matkulmhs ON tbl_attempt_mhs.id_matkulmhs = tbl_matkulmhs.id_matkulmhs INNER JOIN tbl_mahasiswa ON tbl_matkulmhs.id_mhs = tbl_mahasiswa.id_mhs WHERE tbl_attempt_mhs.id_modul = '$id_modul'");
$data = mysqli_fetch_array($tampil);
if ( $data ) {
    $vnama  = $data['username'];
    $vnim   = $data['nim_mhs'];
    $vnilai = $data['nilai'];
}

//jika klik tombol ubah
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $id_attempt = $_GET['id_attempt_mhs'];
    $ubah = mysqli_query($koneksi, "UPDATE tbl_nilai_mhs SET
            nilai = '$_POST[nilai]'
            WHERE id_attempt_mhs = '$id_attempt'");
    if ($ubah) {
        echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
        <link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
        echo "<script type='text/javascript'>
            setTimeout(function() {
                    Swal.fire({
                        title: 'Nilai Berhasil Diubah',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    });
                }, 100);
            window.setTimeout(function(){
                document.location='?halaman=modul_praktik&perihal=nilai&id_modul=$id_modul';
            }, 2000);
            </script>";
    }
}
?>

<div class="row justify-content-center">
    <div class="col-md-6 col-sm-12">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-primary">
                <h6 class="m-0 font-weight-bold text-white">Form Edit Nilai</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" disabled value="<?= $vnama ?>">
                    </div>
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="text" class="form-control" name="nim" id="nim" disabled value="<?= $vnim ?>">
                    </div>
                    <div class="form-group">
                        <label for="nilai">Nilai</label>
                        <input type="number" class="form-control" step="any" min="0.00" max="100.00" name="nilai" id="nilai" value="<?= $vnilai ?>" required>
                    </div>
                    <?php
                        $id_modul = $_GET['id_modul'];
                        $query = mysqli_query($koneksi, "SELECT id_modul FROM tbl_modulpraktik WHERE id_modul = $id_modul");
                        $data = mysqli_fetch_array($query);
                    ?>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                    <a href="?halaman=modul_praktik&perihal=nilai&id_modul=<?= $data['id_modul'] ?>" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>