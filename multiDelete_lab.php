<?php
session_start();
    include "config/koneksi.php";

    if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
        if( isset($_POST['id_laboran']) ){
            foreach( $_POST['id_laboran'] as $id ){
                $query = "DELETE FROM tbl_laboran WHERE id_laboran = '$id'";
                mysqli_query($koneksi, $query);
            }
        }
    }
?>