<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $delete = mysqli_query($koneksi, "DELETE FROM tbl_dosen WHERE id_dosen = '$_GET[id]' ");
    if ($delete) {
        echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
        <link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
        echo "<script type='text/javascript'>
            setTimeout(function() {
                    Swal.fire({
                        title: 'Data Dosen Berhasil Dihapus',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    });
                }, 100);
            window.setTimeout(function(){
                document.location='?halaman=user_dosen';
            }, 2000);
            </script>";
    }
}

?>