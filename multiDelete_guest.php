<?php
session_start();
    include "config/koneksi.php";

    if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
        if( isset($_POST['id_guest']) ){
            foreach( $_POST['id_guest'] as $id ){
                $query = "DELETE FROM tbl_guest WHERE id_guest = '$id'";
                mysqli_query($koneksi, $query);
            }
        }
    }
?>