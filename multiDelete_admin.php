<?php
session_start();
    include "config/koneksi.php";

    if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
        if( isset($_POST['id_admin']) ){
            foreach( $_POST['id_admin'] as $id ){
                $query = "DELETE FROM tbl_admin WHERE id_admin = '$id'";
                mysqli_query($koneksi, $query);
            }
        }
    }
?>