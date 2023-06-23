<?php

include "config/function_soal_img.php";

//tampilkan data yang akan di edit
$id_soal = $_GET['id_soal'];
$tampil = mysqli_query($koneksi, "SELECT * FROM tbl_soal WHERE id_soal = '$id_soal' ");
$data = mysqli_fetch_array($tampil);
if ( $data ) {
    if ( $data['jenis_soal'] == 'Ganda' ) {
        $vjenis_soal    = $data['jenis_soal'];
        $vpertanyaan    = $data['pertanyaan'];
        $vjawab_a       = $data['jawab_a'];
        $vjawab_b       = $data['jawab_b'];
        $vjawab_c       = $data['jawab_c'];
        $vjawab_d       = $data['jawab_d'];
        $vjawab_e       = $data['jawab_e'];
        $vjawab_option  = $data['jawab_option'];
        $vimg_soal      = $data['upload_img'];
    } elseif ( $data['jenis_soal'] == 'Essay' ) {
        $vjenis_soal    = $data['jenis_soal'];
        $vpertanyaan    = $data['pertanyaan'];
        $vimg_soal      = $data['upload_img'];
    } else {
        $vjenis_soal    = $data['jenis_soal'];
        $vpertanyaan    = $data['pertanyaan'];
        $vjawab_option  = $data['jawab_option'];
        $vimg_soal      = $data['upload_img'];
    }
}

//Jika sudah ditampilkan dan jika tombol ubah di klik maka lakukan :

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $id_modul   = $_GET['id_modul'];
    $id_soal    = $_GET['id_soal'];
    $img_soal   = $_FILES['up_img']['name'];

    if ( $data['jenis_soal'] == 'Ganda' ) {
        if ($img_soal) {
            if ($_FILES['up_img']['error'] === 4) {
                $image = $vimg_soal;
            } else {
                unlink('./soal_image/' . $vimg_soal);
                $image = soal_img();
            }

            $ubah = mysqli_query($koneksi, "UPDATE tbl_soal SET
                    pertanyaan = '$_POST[pertanyaan]',
                    jawab_a = '$_POST[jawab_a]',
                    jawab_b = '$_POST[jawab_b]',
                    jawab_c = '$_POST[jawab_c]',
                    jawab_d = '$_POST[jawab_d]',
                    jawab_e = '$_POST[jawab_e]',
                    jawab_option = '$_POST[option_ganda]',
                    upload_img = '$image'
                    WHERE id_soal = '$id_soal'");

            if ($ubah) {
                echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
                <link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
                echo "<script type='text/javascript'>
                        setTimeout(function() {
                            Swal.fire({
                                title: 'Soal Berhasil Diubah',
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
        } else {
            $ubah = mysqli_query($koneksi, "UPDATE tbl_soal SET
                    pertanyaan = '$_POST[pertanyaan]',
                    jawab_a = '$_POST[jawab_a]',
                    jawab_b = '$_POST[jawab_b]',
                    jawab_c = '$_POST[jawab_c]',
                    jawab_d = '$_POST[jawab_d]',
                    jawab_e = '$_POST[jawab_e]',
                    jawab_option = '$_POST[option_ganda]'
                    WHERE id_soal = '$id_soal'");

            if ($ubah) {
                echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
                <link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
                echo "<script type='text/javascript'>
                        setTimeout(function() {
                            Swal.fire({
                                title: 'Soal Berhasil Diubah',
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
    } elseif ( $data['jenis_soal'] == 'Essay' ) {
        if ($img_soal) {
            if ($_FILES['up_img']['error'] === 4) {
                $image = $vimg_soal;
            } else {
                unlink('./soal_image/' . $vimg_soal);
                $image = soal_img();
            }

            $ubah = mysqli_query($koneksi, "UPDATE tbl_soal SET
                    pertanyaan = '$_POST[pertanyaan]',
                    upload_img = '$image'
                    WHERE id_soal = '$id_soal'");

            if ($ubah) {
                echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
                <link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
                echo "<script type='text/javascript'>
                        setTimeout(function() {
                            Swal.fire({
                                title: 'Soal Berhasil Diubah',
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
        } else {
            $ubah = mysqli_query($koneksi, "UPDATE tbl_soal SET
                    pertanyaan = '$_POST[pertanyaan]'
                    WHERE id_soal = '$id_soal'");

            if ($ubah) {
                echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
                <link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
                echo "<script type='text/javascript'>
                        setTimeout(function() {
                            Swal.fire({
                                title: 'Soal Berhasil Diubah',
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
    } else {
        if ($img_soal) {
            if ($_FILES['up_img']['error'] === 4) {
                $image = $vimg_soal;
            } else {
                unlink('./soal_image/' . $vimg_soal);
                $image = soal_img();
            }

            $ubah = mysqli_query($koneksi, "UPDATE tbl_soal SET
                    pertanyaan = '$_POST[pertanyaan]',
                    jawab_option = '$_POST[option_boolean]',
                    upload_img = '$image'
                    WHERE id_soal = '$id_soal'");

            if ($ubah) {
                echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
                <link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
                echo "<script type='text/javascript'>
                        setTimeout(function() {
                            Swal.fire({
                                title: 'Soal Berhasil Diubah',
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
        } else {
            $ubah = mysqli_query($koneksi, "UPDATE tbl_soal SET
                    pertanyaan = '$_POST[pertanyaan]',
                    jawab_option = '$_POST[option_boolean]'
                    WHERE id_soal = '$id_soal'");

            if ($ubah) {
                echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
                <link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
                echo "<script type='text/javascript'>
                        setTimeout(function() {
                            Swal.fire({
                                title: 'Soal Berhasil Diubah',
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
    }
}

?>

<div class="row justify-content-center">
    <div class="col-md-6 col-sm-12">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 bg-primary">
                <h6 class="m-0 font-weight-bold text-white">Form Edit Soal</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="jenis_soal">Jenis Soal</label>
                        <input type="text" class="form-control" name="jenis_soal" id="jenis_soal" disabled value="<?= $vjenis_soal ?>">
                    </div>
                    <div class="form-group">
                        <label for="pertanyaan">Pertanyaan</label>
                        <textarea type="text" class="form-control" id="pertanyaan" name="pertanyaan" rows="4" required><?= $vpertanyaan ?></textarea> 
                    </div>
                    <?php if ($vjenis_soal == "Ganda") : ?>
                        <div class="form-group" id="ganda1">
                            <label for="jawab_a">Option A</label>
                            <input type="text" class="form-control" id="jawab_a" name="jawab_a" value="<?= $vjawab_a ?>" required>
                        </div>
                        <div class="form-group" id="ganda2">
                            <label for="jawab_b">Option B</label>
                            <input type="text" class="form-control" id="jawab_b" name="jawab_b" value="<?= $vjawab_b ?>" required>
                        </div>
                        <div class="form-group" id="ganda3">
                            <label for="jawab_c">Option C</label>
                            <input type="text" class="form-control" id="jawab_c" name="jawab_c" value="<?= $vjawab_c ?>" required>
                        </div>
                        <div class="form-group" id="ganda4">
                            <label for="jawab_d">Option D</label>
                            <input type="text" class="form-control" id="jawab_d" name="jawab_d" value="<?= $vjawab_d ?>" required>
                        </div>
                        <div class="form-group" id="ganda5">
                            <label for="jawab_e">Option E</label>
                            <input type="text" class="form-control" id="jawab_e" name="jawab_e" value="<?= $vjawab_e ?>" required>
                        </div>
                        <div class="form-group" id="hasil_ganda">
                            <label for="option_ganda">Hasil Option</label>
                            <input type="text" class="form-control" id="option_ganda" name="option_ganda" value="<?= $vjawab_option ?>" placeholder="Fill one : a, b, c, d or e" required>
                        </div>
                    <?php elseif ($vjenis_soal == "Boolean") : ?>
                        <div class="form-group" id="hasil_boolean">
                            <label for="option_boolean">Hasil Option</label>
                            <input type="text" class="form-control" id="option_boolean" name="option_boolean" value="<?= $vjawab_option ?>" placeholder="Fill one : t (true) or f (false)" required>
                        </div>
                    <?php endif; ?>
                    <?php if ($vimg_soal) : ?>
                        <div class="form-group">
                            <label for="file">File Gambar Sebelumnya</label>
                            <input type="text" class="form-control" name="fileLama" disabled value="<?= $vimg_soal ?>">
                        </div>
                        <div class="form-group">
                            <label for="up_img">Upload File Gambar Baru Jika Diperlukan (max : 1 MB)</label>
                            <input type="file" class="form-control" id="up_img" name="up_img">
                        </div>
                    <?php else : ?>
                        <div class="form-group">
                            <label for="up_img">Upload File Gambar Jika Diperlukan (max : 1 MB)</label>
                            <input type="file" class="form-control" id="up_img" name="up_img">
                        </div>
                    <?php endif; ?>
                    <?php
                        $id_modul = $_GET['id_modul'];
                        $query = mysqli_query($koneksi, "SELECT id_modul FROM tbl_modulpraktik WHERE id_modul = $id_modul");
                        $data = mysqli_fetch_array($query);
                    ?>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                    <a href="?halaman=modul_praktik&perihal=lihat_soal&id_modul=<?= $data['id_modul'] ?>" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>