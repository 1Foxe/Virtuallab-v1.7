<?php

@$halaman = $_GET['halaman'];
if (isset($_GET['halaman'])) {
        if ($halaman == "user_admin") {
                if (@$_GET['perihal'] == "tambahdata") {
                        include "halaman/user_admin/tambah.php";
                } elseif (@$_GET['perihal'] == "edit") {
                        include "halaman/user_admin/edit.php";
                } elseif (@$_GET['perihal'] == "hapus") {
                        include "halaman/user_admin/hapus.php";
                } else {
                        include "halaman/user_admin/data_admin.php";
                }
        } elseif ($halaman == "user_mahasiswa") {
                if (@$_GET['perihal'] == "tambahdata") {
                        include "halaman/user_mahasiswa/tambah.php";
                } elseif (@$_GET['perihal'] == "edit") {
                        include "halaman/user_mahasiswa/edit.php";
                } elseif (@$_GET['perihal'] == "hapus") {
                        include "halaman/user_mahasiswa/hapus.php";
                } elseif (@$_GET['perihal'] == "importdata") {
                        include "halaman/user_mahasiswa/importdata.php";
                } elseif (@$_GET['perihal'] == "aksiexcel") {
                        include "halaman/user_mahasiswa/aksiExcel.php";
                } else {
                        include "halaman/user_mahasiswa/data_mahasiswa.php";
                }
        } elseif ($halaman == "user_dosen") {
                if (@$_GET['perihal'] == "tambahdata") {
                        include "halaman/user_dosen/tambah.php";
                } elseif (@$_GET['perihal'] == "edit") {
                        include "halaman/user_dosen/edit.php";
                } elseif (@$_GET['perihal'] == "hapus") {
                        include "halaman/user_dosen/hapus.php";
                } else {
                        include "halaman/user_dosen/data_dosen.php";
                }
        } elseif ($halaman == "user_laboran") {
                if (@$_GET['perihal'] == "tambahdata") {
                        include "halaman/user_laboran/tambah.php";
                } elseif (@$_GET['perihal'] == "edit") {
                        include "halaman/user_laboran/edit.php";
                } elseif (@$_GET['perihal'] == "hapus") {
                        include "halaman/user_laboran/hapus.php";
                } else {
                        include "halaman/user_laboran/data_laboran.php";
                }
        } elseif ($halaman == "user_guest") {
                if (@$_GET['perihal'] == "tambahdata") {
                        include "halaman/user_guest/tambah.php";
                } elseif (@$_GET['perihal'] == "edit") {
                        include "halaman/user_guest/edit.php";
                } elseif (@$_GET['perihal'] == "hapus") {
                        include "halaman/user_guest/hapus.php";
                } else {
                        include "halaman/user_guest/data_guest.php";
                }
        } elseif ($halaman == "jurusan") {
                if (@$_GET['perihal'] == "tambahdata") {
                        include "halaman/jurusan/tambah.php";
                } elseif (@$_GET['perihal'] == "edit") {
                        include "halaman/jurusan/edit.php";
                } elseif (@$_GET['perihal'] == "hapus") {
                        include "halaman/jurusan/hapus.php";
                } else {
                        include "halaman/jurusan/data_jurusan.php";
                }
        } elseif ($halaman == "prodi") {
                if (@$_GET['perihal'] == "tambahdata") {
                        include "halaman/prodi/tambah.php";
                } elseif (@$_GET['perihal'] == "edit") {
                        include "halaman/prodi/edit.php";
                } elseif (@$_GET['perihal'] == "hapus") {
                        include "halaman/prodi/hapus.php";
                } else {
                        include "halaman/prodi/data_prodi.php";
                }
        } elseif ($halaman == "mata_kuliah") {
                if (@$_GET['perihal'] == "tambahdata") {
                        include "halaman/mata_kuliah/tambah.php";
                } elseif (@$_GET['perihal'] == "edit") {
                        include "halaman/mata_kuliah/edit.php";
                } elseif (@$_GET['perihal'] == "hapus") {
                        include "halaman/mata_kuliah/hapus.php";
                } elseif (@$_GET['perihal'] == "importdata") {
                        include "halaman/mata_kuliah/importdata.php";
                } elseif (@$_GET['perihal'] == "aksiexcel") {
                        include "halaman/user_mahasiswa/aksiExcel.php";
                } else {
                        include "halaman/mata_kuliah/data_matkul.php";
                }
        } elseif ($halaman == "profile") {
                if (@$_GET['perihal'] == "edit-profile") {
                        include "halaman/profile/edit-profile-admin.php";
                } else {
                        include "halaman/profile/profile_admin.php";
                }
        } elseif ($halaman == "changepwd") {
                include "halaman/changepwd/changepswd_admin.php";
        }
} else {
        include "halaman/beranda.php";
}
