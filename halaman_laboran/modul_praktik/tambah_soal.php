<?php

include "config/function_soal_img.php";

//jika tombol tambah di klik
if ( $_SERVER['REQUEST_METHOD'] == 'POST') {

    //membuat variabel
    $id_modul = $_GET['id_modul'];
    $jenis_soal = $_POST['jenis_soal'];
    $pertanyaan = $_POST['pertanyaan'];
    $img_upload = soal_img();

    if ( isset($jenis_soal) && $jenis_soal == 'Ganda' ) {

        $jawab_a = $_POST['jawab_a'];
        $jawab_b = $_POST['jawab_b'];
        $jawab_c = $_POST['jawab_c'];
        $jawab_d = $_POST['jawab_d'];
        $jawab_e = $_POST['jawab_e'];
        $option_ganda = $_POST['option_ganda'];

        //simpan data
        if ($img_upload) {
            $simpan = mysqli_query($koneksi, "INSERT INTO tbl_soal (id_modul, jenis_soal, pertanyaan, jawab_a, jawab_b, jawab_c, jawab_d, jawab_e, jawab_option, upload_img) VALUES ('$id_modul', '$jenis_soal', '$pertanyaan', '$jawab_a', '$jawab_b', '$jawab_c', '$jawab_d', '$jawab_e', '$option_ganda', '$img_upload') ");
            if ($simpan) {
                echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
                <link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
                echo "<script type='text/javascript'>
                        setTimeout(function() {
                            Swal.fire({
                                title: 'Soal Berhasil Ditambahkan',
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
            $simpan = mysqli_query($koneksi, "INSERT INTO tbl_soal (id_modul, jenis_soal, pertanyaan, jawab_a, jawab_b, jawab_c, jawab_d, jawab_e, jawab_option) VALUES ('$id_modul', '$jenis_soal', '$pertanyaan', '$jawab_a', '$jawab_b', '$jawab_c', '$jawab_d', '$jawab_e', '$option_ganda') ");
            if ($simpan) {
                echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
                <link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
                echo "<script type='text/javascript'>
                        setTimeout(function() {
                            Swal.fire({
                                title: 'Soal Berhasil Ditambahkan',
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

    } elseif ( isset($jenis_soal) && $jenis_soal == 'Essay' ) {

        //simpan data
        if ($img_upload) {
            $simpan = mysqli_query($koneksi, "INSERT INTO tbl_soal (id_modul, jenis_soal, pertanyaan, upload_img) VALUES ('$id_modul', '$jenis_soal', '$pertanyaan', '$img_upload') ");
            if ($simpan) {
                echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
                <link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
                echo "<script type='text/javascript'>
                        setTimeout(function() {
                            Swal.fire({
                                title: 'Soal Berhasil Ditambahkan',
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
            $simpan = mysqli_query($koneksi, "INSERT INTO tbl_soal (id_modul, jenis_soal, pertanyaan) VALUES ('$id_modul', '$jenis_soal', '$pertanyaan') ");
            if ($simpan) {
                echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
                <link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
                echo "<script type='text/javascript'>
                        setTimeout(function() {
                            Swal.fire({
                                title: 'Soal Berhasil Ditambahkan',
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

        $option_boolean = $_POST['option_boolean'];
    
        //simpan data
        if ($img_upload) {
            $simpan = mysqli_query($koneksi, "INSERT INTO tbl_soal (id_modul, jenis_soal, pertanyaan, jawab_option, upload_img) VALUES ('$id_modul', '$jenis_soal', '$pertanyaan', '$option_boolean', '$img_upload') ");
            if ($simpan) {
                echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
                <link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
                echo "<script type='text/javascript'>
                        setTimeout(function() {
                            Swal.fire({
                                title: 'Soal Berhasil Ditambahkan',
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
            $simpan = mysqli_query($koneksi, "INSERT INTO tbl_soal (id_modul, jenis_soal, pertanyaan, jawab_option) VALUES ('$id_modul', '$jenis_soal', '$pertanyaan', '$option_boolean') ");
            if ($simpan) {
                echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
                <link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
                echo "<script type='text/javascript'>
                        setTimeout(function() {
                            Swal.fire({
                                title: 'Soal Berhasil Ditambahkan',
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
                <h6 class="m-0 font-weight-bold text-white">Form Tambah Soal</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="jenis_soal">Jenis Soal</label>
                        <select class="form-control" name="jenis_soal" id="jenisSoal" onchange="UbahJenisSoal()" required>
                            <option value="" hidden>-- Pilih --</option>
                            <option value="Ganda">Pilihan Ganda</option>
                            <option value="Essay">Uraian</option>
                            <option value="Boolean">Boolean</option>
                        </select>
                    </div>
                    <div id="pilih_soal" style="display: none;">
                        <div class="form-group" id="pertanyaan">
                            <label for="pertanyaan">Pertanyaan</label>
                            <textarea class="form-control" id="pertanyaan" name="pertanyaan" rows="4" required></textarea> 
                        </div>
                        <div class="form-group" id="ganda1">
                            <label for="jawab_a">Option A</label>
                            <input type="text" class="form-control" id="jawab_a" name="jawab_a">
                        </div>
                        <div class="form-group" id="ganda2">
                            <label for="jawab_b">Option B</label>
                            <input type="text" class="form-control" id="jawab_b" name="jawab_b">
                        </div>
                        <div class="form-group" id="ganda3">
                            <label for="jawab_c">Option C</label>
                            <input type="text" class="form-control" id="jawab_c" name="jawab_c">
                        </div>
                        <div class="form-group" id="ganda4">
                            <label for="jawab_d">Option D</label>
                            <input type="text" class="form-control" id="jawab_d" name="jawab_d">
                        </div>
                        <div class="form-group" id="ganda5">
                            <label for="jawab_e">Option E</label>
                            <input type="text" class="form-control" id="jawab_e" name="jawab_e">
                        </div>
                        <div class="form-group" id="hasil_ganda">
                            <label for="option_ganda">Hasil Option</label>
                            <input type="text" class="form-control" id="option_ganda" name="option_ganda" placeholder="Fill one : a, b, c, d or e">
                        </div>
                        <div class="form-group" id="hasil_boolean">
                            <label for="option_boolean">Hasil Option</label>
                            <input type="text" class="form-control" id="option_boolean" name="option_boolean" placeholder="Fill one : t (true) or f (false)">
                        </div>
                        <div class="form-group" id="upload_gambar">
                            <label for="up_img">Upload File Gambar Jika Diperlukan (max : 1 MB)</label>
                            <input type="file" class="form-control" id="up_img" name="up_img">
                        </div>
                    </div>
                    <?php
                        $id_modul = $_GET['id_modul'];
                        $query = mysqli_query($koneksi, "SELECT id_modul FROM tbl_modulpraktik WHERE id_modul = '$id_modul'");
                        $data = mysqli_fetch_array($query);
                    ?>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                    <a href="?halaman=modul_praktik&perihal=lihat_soal&id_modul=<?= $data['id_modul'] ?>" class="btn btn-danger">Kembali</a>
                </form>
            </div>
            <script src="assets/js/function-soal.js"></script>
        </div>
    </div>
</div>