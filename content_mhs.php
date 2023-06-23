<?php

@$halaman = $_GET['halaman'];
if (isset($_GET['halaman'])) {
        if ($halaman == "pilih_matkul") {
                if (@$_GET['perihal'] == "hapus") {
                        include "halaman_mhs/pilih_matakuliah/hapus_matkul.php";
                } else {
                        include "halaman_mhs/pilih_matakuliah/form_enrollmatkul.php";
                }
        } elseif ($halaman == "modul_praktik") {
                if (@$_GET['perihal'] == "kelola_modul") {
                        include "halaman_mhs/modul_praktik/materi.php";
                } elseif (@$_GET['perihal'] == "tampil_modul") {
                        include "halaman_mhs/modul_praktik/tampil_modul.php";
                } elseif (@$_GET['perihal'] == "quiz") {
                        include "halaman_mhs/modul_praktik/quiz.php";
                } elseif (@$_GET['perihal'] == "attempt_quiz") {
                        include "halaman_mhs/modul_praktik/attempt_quiz.php";
                } elseif (@$_GET['perihal'] == "check_quiz") {
                        include "halaman_mhs/modul_praktik/check_quiz.php";
                } elseif (@$_GET['perihal'] == "preview_quiz") {
                        include "halaman_mhs/modul_praktik/preview.php";
                } else {
                        include "halaman_mhs/modul_praktik/daftar_modulpraktik.php";
                }
        } elseif ($halaman == "profile") {
                if (@$_GET['perihal'] == "edit-profile") {
                        include "halaman_mhs/profile/edit-profile-mahasiswa.php";
                } else {
                        include "halaman_mhs/profile/profile_mahasiswa.php";
                }                
        } elseif ($halaman == "virtual_lab") {
                if (@$_GET['perihal'] == "beranda") {
                        include "halaman_mhs/virtual_lab/tampil.php";
                } elseif (@$_GET['perihal'] == "tampil_modul") {
                        include "halaman_mhs/virtual_lab/modul.php";
                } elseif (@$_GET['perihal'] == "tampil_kampus") {
                        include "halaman_mhs/virtual_lab/kampus.php";
                } elseif (@$_GET['perihal'] == "tower_a") {
                        include "halaman_mhs/virtual_lab/ta.php";
                } elseif (@$_GET['perihal'] == "gedung_utama") {
                        include "halaman_mhs/virtual_lab/gu.php";
                } elseif (@$_GET['perihal'] == "teaching_factory") {
                        include "halaman_mhs/virtual_lab/tf.php";
                } elseif (@$_GET['perihal'] == "broadcast") {
                        include "halaman_mhs/virtual_lab/broadcasting_tf.php";
                } else {
                        include "halaman_mhs/virtual_lab/vlab.php";
                }
        } elseif ($halaman == "changepwd") {
                include "halaman_mhs/changepwd/changepswd_mhs.php";
        }
} else {
        include "halaman_mhs/beranda_mhs.php";
}
