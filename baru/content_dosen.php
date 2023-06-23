<?php

@$halaman = $_GET['halaman'];
if (isset($_GET['halaman'])) {
        if ($halaman == "pilih_matkul") {
                if (@$_GET['perihal'] == "hapus") {
                        include "halaman_dosen/pilih_matakuliah/hapus_matkul.php";
                } else {
                        include "halaman_dosen/pilih_matakuliah/form_enrollmatkul.php";
                }
        } elseif ($halaman == "modul_praktik") {
                if (@$_GET['perihal'] == "kelola_modul") {
                        include "halaman_dosen/modul_praktik/materi.php";
                } elseif (@$_GET['perihal'] == "tambah") {
                        include "halaman_dosen/modul_praktik/tambah.php";
                } elseif (@$_GET['perihal'] == "edit") {
                        include "halaman_dosen/modul_praktik/edit.php";
                } elseif (@$_GET['perihal'] == "hapus") {
                        include "halaman_dosen/modul_praktik/hapus.php";
                } elseif (@$_GET['perihal'] == "tampil_modul") {
                        include "halaman_dosen/modul_praktik/tampil_modul.php";
                } elseif (@$_GET['perihal'] == "edit_soal") {
                        include "halaman_dosen/modul_praktik/edit_soal.php";
                } elseif (@$_GET['perihal'] == "tambah_soal") {
                        include "halaman_dosen/modul_praktik/tambah_soal.php";
                } elseif (@$_GET['perihal'] == "atur_soal") {
                        include "halaman_dosen/modul_praktik/atur_quiz.php";
                } elseif (@$_GET['perihal'] == "hapus_soal") {
                        include "halaman_dosen/modul_praktik/hapus_soal.php";
                } elseif (@$_GET['perihal'] == "lihat_soal") {
                        include "halaman_dosen/modul_praktik/lihat_soal.php";
                } elseif (@$_GET['perihal'] == "nilai") {
                        include "halaman_dosen/modul_praktik/lihat_nilai.php";
                        //
                } elseif (@$_GET['perihal'] == "exportnilai") {
                        include "halaman_dosen/modul_praktik/exportnilai.php";
                } elseif (@$_GET['perihal'] == "check_quiz") {
                        include "halaman_dosen/modul_praktik/check_quiz.php";
                } elseif (@$_GET['perihal'] == "check_enrol") {
                        include "halaman_dosen/modul_praktik/check_enrol.php";
                } elseif (@$_GET['perihal'] == "Export_nilai_mhs") {
                        include "halaman_dosen/modul_praktik/Export_nilai_mhs.php";
                } elseif (@$_GET['perihal'] == "Export_nilai_guest") {
                        include "halaman_dosen/modul_praktik/Export_nilai_guest.php";
                } elseif (@$_GET['perihal'] == "process_export_mhs") {
                        include "halaman_dosen/modul_praktik/process_export_mhs.php";
                } elseif (@$_GET['perihal'] == "check_password") {
                        include "halaman_dosen/modul_praktik/check_password.php";
                        //
                } elseif (@$_GET['perihal'] == "edit_mhs") {
                        include "halaman_dosen/modul_praktik/edit_nilai_mhs.php";
                } elseif (@$_GET['perihal'] == "edit_guest") {
                        include "halaman_dosen/modul_praktik/edit_nilai_guest.php";
                } elseif (@$_GET['perihal'] == "preview_mhs") {
                        include "halaman_dosen/modul_praktik/preview_mhs.php";
                } elseif (@$_GET['perihal'] == "preview_guest") {
                        include "halaman_dosen/modul_praktik/preview_guest.php";
                } else {
                        include "halaman_dosen/modul_praktik/daftar_modulpraktik.php";
                }
        } elseif ($halaman == "profile") {
                if (@$_GET['perihal'] == "edit-profile") {
                        include "halaman_dosen/profile/edit-profile-dosen.php";
                } else {
                        include "halaman_dosen/profile/profile_dosen.php";
                }
        } elseif ($halaman == "changepwd") {
                include "halaman_dosen/changepwd/changepswd_dosen.php";
        }
} else {
        include "halaman_dosen/beranda_dosen.php";
}
