<?php include "template/head_mhs.php"; ?>

<?php include "template/sidebar_mhs.php"; ?>

<?php include "template/topbar_mhs.php"; ?>

<?php

if(isset($_GET['id']) || isset($_GET['id_mhs'])){
    $delete = mysqli_query($koneksi, "DELETE FROM tbl_matkulmhs WHERE id_matkul = '$_GET[id]' AND id_mhs = '$_GET[id_mhs]'");
    if ($delete) {
        echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
        <link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
        echo "<script type='text/javascript'>
            setTimeout(function() {
                    Swal.fire({
                        title: 'Matkul Berhasil Diunenroll',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    });
                }, 100);
            window.setTimeout(function(){
                document.location='?halaman=pilih_matkul';
            }, 2000);
            </script>";
    }
}

?>

<?php include "template/footer.php"; ?>