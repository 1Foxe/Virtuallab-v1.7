<?php

//buat koneksi database

//persiapan identitas server
$server     = "";  //Nama Server
$user       = "root";       //Username database server
$password   = "";           //Password database server
$database   = "vb"; //Nama Database

//koneksi database
$koneksi = mysqli_connect($server, $user, $password, $database) or die (mysqli_error($koneksi));
?>