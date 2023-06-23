<?php

if (isset($_GET['id_soal'])) {
    $id_soal = $_GET['id_soal'];
    $id_modul = $_GET['id_modul'];
    $query = mysqli_query($koneksi, "SELECT jenis_soal, upload_img FROM tbl_soal WHERE id_soal = '$id_soal' LIMIT 1");
    $data_soal = mysqli_fetch_array($query);
    $delete = mysqli_query($koneksi, "DELETE FROM tbl_soal WHERE id_soal = '$id_soal' AND id_modul = '$id_modul'");
    if ($delete) {
        if ($data_soal['upload_img']) {
            unlink('./soal_image/' . $data_soal['upload_img']);
        }
        echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
        <link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
        echo "<script type='text/javascript'>
            setTimeout(function() {
                    Swal.fire({
                        title: 'Soal Berhasil Dihapus',
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