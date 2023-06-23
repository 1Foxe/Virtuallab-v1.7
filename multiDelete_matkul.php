<?php
session_start();
    include "config/koneksi.php";

    if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
        if( isset($_POST['id_matkul']) ){
            foreach( $_POST['id_matkul'] as $id ){
                $query = "DELETE FROM tbl_matakuliah WHERE id_matkul = '$id'";
                mysqli_query($koneksi, $query);
            }
        }
    }
?>