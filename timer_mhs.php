<?php
    session_start();

    $waktu = $_POST['waktu'];
    $id_modul = $_POST['id_modul'];

    $_SESSION['durasi'][$id_modul] = $waktu;