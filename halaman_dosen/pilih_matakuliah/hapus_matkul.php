<?php

if(isset($_GET['id']) || isset($_GET['id_dosen'])){
    $delete = mysqli_query($koneksi, "DELETE FROM tbl_dospengampu WHERE id_matkul = '$_GET[id]' AND id_dosen = '$_GET[id_dosen]'");
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