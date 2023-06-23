<?php

$id_modul   = $_GET['id_modul'];
$ambil      = mysqli_query($koneksi, "SELECT * FROM tbl_modulpraktik WHERE id_modul = '$id_modul'");
$get        = mysqli_fetch_array($ambil);
if ($ambil) {
    $vkkm   = $get['kkm'];
    $vwaktu = $get['waktu'];
}

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

    $kkm    = $_POST['kkm'];
    $waktu  = $_POST['waktu'];
    $tampil = $_POST['tampil'];

    $simpan = mysqli_query($koneksi, "UPDATE tbl_modulpraktik SET
            kkm = '$kkm',
            waktu = '$waktu',
            tampil = '$tampil'
            WHERE id_modul = '$id_modul'");

    if ($simpan) {
        echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
        <link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
        echo "<script type='text/javascript'>
            setTimeout(function() {
                    Swal.fire({
                        title: 'Quiz Sudah Diatur',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    });
                }, 100);
            window.setTimeout(function(){
                document.location='?halaman=modul_praktik&perihal=lihat_soal&id_modul=$id_modul';
            }, 2000);
            </script>";
    }
}
?>

<div class="row justify-content-center">
    <div class="col-md-6 col-sm-12">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Atur Quiz</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="" enctype="multipart/form-data">
                <div class="form-group">
                        <label for="kkm">Nilai Standar Quiz (Misal : 70)</label>
                        <input type="number" min="1" max="100" class="form-control" id="kkm" name="kkm" value="<?= $vkkm ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="waktu">Waktu Pengerjaan (Input waktu dalam satuan detik)</label>
                        <input type="number" min="1" class="form-control" id="waktu" name="waktu" value="<?= $vwaktu ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="tampil">Tampilkan Preview</label>
                        <select class="form-control" name="tampil" id="tampil" required>
                            <option value="" selected>-- Pilih --</option>
                            <option value="Ya">Ya</option>
                            <option value="Tidak">Tidak</option>
                        </select>
                    </div>
                    <?php
                        $id_modul = $_GET['id_modul'];
                        $query = mysqli_query($koneksi, "SELECT id_modul FROM tbl_modulpraktik WHERE id_modul = '$id_modul'");
                        $data = mysqli_fetch_array($query);
                    ?>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="?halaman=modul_praktik&perihal=lihat_soal&id_modul=<?= $data['id_modul'] ?>" class="btn btn-danger">Kembali</a>
                </form>
            </div>
            <script src="assets/js/function-modul.js"></script>
        </div>
    </div>
</div>