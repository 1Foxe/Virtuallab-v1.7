<?php
session_start();
    include "config/koneksi.php";

    if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
        if( isset($_POST['id_dosen']) ){
            foreach( $_POST['id_dosen'] as $id ){
                $query = "DELETE FROM tbl_dosen WHERE id_dosen = '$id'";
                mysqli_query($koneksi, $query);
            }
        }
    }
?>