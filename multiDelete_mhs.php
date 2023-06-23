<?php
session_start();
    include "config/koneksi.php";

    if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
        if( isset($_POST['id_mhs']) ){
            foreach( $_POST['id_mhs'] as $id ){
                $query = "DELETE FROM tbl_mahasiswa WHERE id_mhs = '$id'";
                mysqli_query($koneksi, $query);
            }
        }
    }
?>