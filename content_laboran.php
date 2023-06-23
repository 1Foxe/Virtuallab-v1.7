<?php

@$halaman = $_GET['halaman'];
if (isset($_GET['halaman'])) {
        if ($halaman == "pilih_matkul") {
                if (@$_GET['perihal'] == "hapus") {
                        include "halaman_laboran/pilih_matakuliah/hapus_matkul.php";
                } else {
                        include "halaman_laboran/pilih_matakuliah/form_enrollmatkul.php";
                }
        } elseif ($halaman == "modul_praktik") {
                if (@$_GET['perihal'] == "kelola_modul") {
                        include "halaman_laboran/modul_praktik/materi.php";
                } elseif (@$_GET['perihal'] == "tambah") {
                        include "halaman_laboran/modul_praktik/tambah.php";
                } elseif (@$_GET['perihal'] == "edit") {
                        include "halaman_laboran/modul_praktik/edit.php";
                } elseif (@$_GET['perihal'] == "hapus") {
                        include "halaman_laboran/modul_praktik/hapus.php";
                } elseif (@$_GET['perihal'] == "tampil_modul") {
                        include "halaman_laboran/modul_praktik/tampil_modul.php";
                } elseif (@$_GET['perihal'] == "edit_soal") {
                        include "halaman_laboran/modul_praktik/edit_soal.php";
                } elseif (@$_GET['perihal'] == "tambah_soal") {
                        include "halaman_laboran/modul_praktik/tambah_soal.php";
                } elseif (@$_GET['perihal'] == "atur_soal") {
                        include "halaman_dosen/modul_praktik/atur_quiz.php";
                } elseif (@$_GET['perihal'] == "hapus_soal") {
                        include "halaman_laboran/modul_praktik/hapus_soal.php";
                } elseif (@$_GET['perihal'] == "lihat_soal") {
                        include "halaman_laboran/modul_praktik/lihat_soal.php";
                } elseif (@$_GET['perihal'] == "nilai") {
                        include "halaman_laboran/modul_praktik/lihat_nilai.php";
                } elseif (@$_GET['perihal'] == "edit_mhs") {
                        include "halaman_laboran/modul_praktik/edit_nilai_mhs.php";
                } elseif (@$_GET['perihal'] == "edit_guest") {
                        include "halaman_laboran/modul_praktik/edit_nilai_guest.php";
                } elseif (@$_GET['perihal'] == "preview_mhs") {
                        include "halaman_laboran/modul_praktik/preview_mhs.php";
                } elseif (@$_GET['perihal'] == "preview_guest") {
                        include "halaman_laboran/modul_praktik/preview_guest.php";
                } else {
                        include "halaman_laboran/modul_praktik/daftar_modulpraktik.php";
                }
        } elseif ($halaman == "profile") {
                if (@$_GET['perihal'] == "edit-profile") {
                        include "halaman_laboran/profile/edit-profile-laboran.php";
                } else {
                        include "halaman_laboran/profile/profile_laboran.php";
                }
        } elseif ($halaman == "changepwd") {
                include "halaman_laboran/changepwd/changepswd_lab.php";
        }
} else {
        include "halaman_laboran/beranda_laboran.php";
}
