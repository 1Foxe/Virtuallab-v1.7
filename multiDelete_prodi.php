<?php
session_start();
    include "config/koneksi.php";

    if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
        if( isset($_POST['id_prodi']) ){
            foreach( $_POST['id_prodi'] as $id ){
                $query = "DELETE FROM tbl_prodi WHERE id_prodi = '$id'";
                mysqli_query($koneksi, $query);
            }
        }
    }
?>