<?php
session_start();
    include "config/koneksi.php";
    $id_attempt = $_POST['id_attempt'];
    $id_modul = $_POST['id_modul'];
    $benar = 0;
    $salah = 0;
    $total = 0;
    $query = mysqli_query($koneksi, "SELECT * FROM tbl_soal WHERE tbl_soal.id_modul = '$id_modul'");

    foreach ($query as $kunci) :

        $total++;
        $soal_id = $kunci['id_soal'];
        $tipe_soal = $kunci['jenis_soal'];
        $query2 = mysqli_query($koneksi, "SELECT * FROM tbl_jwb_mhs WHERE id_attempt_mhs = '$id_attempt' AND id_soal = '$soal_id'");
        $jawaban = mysqli_fetch_array($query2);

        if ($tipe_soal == 'Essay') {
            if ( is_null($jawaban['jawab_essay']) ) {
                $salah++;
                $ket = "Salah";
            } else {
                $total--;
            }
        } else {
            if ( $query2->num_rows != 1 ) {
                $salah++;
                $ket = "Salah";
            } else {
                if ( !is_null($jawaban['jawaban']) && $kunci['jawab_option'] == $jawaban['jawaban'] ) {
                    $benar++;
                    $ket = "Benar";
                } else {
                    $salah++;
                    $ket = "Salah";
                }
            }
        }

    endforeach;

    $hitung = ($benar / $total) * 100;
    $nilai  = number_format($hitung,2);

    //membuat variable
    $queryNilai = mysqli_query($koneksi, "INSERT INTO tbl_nilai_mhs (id_attempt_mhs, nilai) VALUE ('$id_attempt', '$nilai')");
    if ($queryNilai) { 
        http_response_code(200);
        unset($_SESSION["waktu"][$id_modul]);
        unset($_SESSION["durasi"][$id_modul]);
    } else {
        http_response_code(400);
    }