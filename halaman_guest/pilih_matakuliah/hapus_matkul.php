<?php include "template/head_guest.php"; ?>

<?php include "template/sidebar_guest.php"; ?>

<?php include "template/topbar_guest.php"; ?>

<?php

if(isset($_GET['id']) || isset($_GET['id_guest'])){
    $delete = mysqli_query($koneksi, "DELETE FROM tbl_matkulguest WHERE id_matkul = '$_GET[id]' AND id_guest = '$_GET[id_guest]'");
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