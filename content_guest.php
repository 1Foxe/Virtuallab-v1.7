<?php

@$halaman = $_GET['halaman'];
if (isset($_GET['halaman'])) {
        if ($halaman == "pilih_matkul") {
                if (@$_GET['perihal'] == "hapus") {
                        include "halaman_guest/pilih_matakuliah/hapus_matkul.php";
                } else {
                        include "halaman_guest/pilih_matakuliah/form_enrollmatkul.php";
                }
        } elseif ($halaman == "modul_praktik") {
                if (@$_GET['perihal'] == "kelola_modul") {
                        include "halaman_guest/modul_praktik/materi.php";
                } elseif (@$_GET['perihal'] == "tampil_modul") {
                        include "halaman_guest/modul_praktik/tampil_modul.php";
                } elseif (@$_GET['perihal'] == "quiz") {
                        include "halaman_guest/modul_praktik/quiz.php";
                } elseif (@$_GET['perihal'] == "attempt_quiz") {
                        include "halaman_guest/modul_praktik/attempt_quiz.php";
                } elseif (@$_GET['perihal'] == "preview_quiz") {
                        include "halaman_mhs/modul_praktik/preview.php";
                } else {
                        include "halaman_guest/modul_praktik/daftar_modulpraktik.php";
                }
        } elseif ($halaman == "profile") {
                if (@$_GET['perihal'] == "edit-profile") {
                        include "halaman_guest/profile/edit-profile-guest.php";
                } else {
                        include "halaman_guest/profile/profile_guest.php";
                }
        } elseif ($halaman == "virtual_lab") {
                if (@$_GET['perihal'] == "beranda") {
                        include "halaman_guest/virtual_lab/tampil.php";
                } elseif (@$_GET['perihal'] == "tampil_modul") {
                        include "halaman_guest/virtual_lab/modul.php";
                } elseif (@$_GET['perihal'] == "tampil_kampus") {
                        include "halaman_guest/virtual_lab/kampus.php";
                } elseif (@$_GET['perihal'] == "tower_a") {
                        include "halaman_guest/virtual_lab/ta.php";
                } elseif (@$_GET['perihal'] == "gedung_utama") {
                        include "halaman_guest/virtual_lab/gu.php";
                } elseif (@$_GET['perihal'] == "teaching_factory") {
                        include "halaman_guest/virtual_lab/tf.php";
                } else {
                        include "halaman_guest/virtual_lab/vlab.php";
                }
        } elseif ($halaman == "changepwd") {
                include "halaman_guest/changepwd/changepswd_guest.php";
        }
} else {
        include "halaman_guest/beranda_guest.php";
}
