<?php
session_start();
    include "config/koneksi.php";

    if( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
        if( isset($_POST['id_jurusan']) ){
            foreach( $_POST['id_jurusan'] as $id ){
                $query = "DELETE FROM tbl_jurusan WHERE id_jurusan = '$id'";
                mysqli_query($koneksi, $query);
            }
        }
    }
?>