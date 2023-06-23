<?php

include "koneksi.php";

//GUEST-------------------------------------------------------------------------------------
function registrasi_guest($data)
{
    global $koneksi;

    $username = stripslashes($data["username"]);
    $password = $data["password"];
    $password2 = $data["password2"];
    $email_guest = $data["email_guest"];
    $profile_img = $data["profile_img"];




    //cek konfir pass
    if ($password !== $password2) {
        echo "<script>
                alert('konfirmasi password tidak sesuai');
              </script>";
        return false;
    }

    //enskripsi
    $password = password_hash($password, PASSWORD_DEFAULT);


    //tambahkan user ke database
    mysqli_query($koneksi, "INSERT INTO tbl_guest (username, pass, email_guest, profile_img) VALUES ('$username', '$password', '$email_guest', '$profile_img')");

    return mysqli_affected_rows($koneksi);
}

//DOSEN-------------------------------------------------------------------------------------
function registrasi_dosen($data)
{
    global $koneksi;

    $username = stripslashes($data["username"]);
    $nik_dosen = $data["nik_dosen"];
    $password = $data["password"];
    $password2 = $data["password2"];
    $no_hpdosen = $data["no_hpdosen"];
    $email_dosen = $data["email_dosen"];
    $alamat_dosen = $data["alamat_dosen"];
    $profile_img = $data["profile_img"];




    //cek konfir pass
    if ($password !== $password2) {
        echo "<script>
                alert('konfirmasi password tidak sesuai');
              </script>";
        return false;
    }

    //enskripsi
    $password = password_hash($password, PASSWORD_DEFAULT);


    //tambahkan user ke database
    mysqli_query($koneksi, "INSERT INTO tbl_dosen (username, nik_dosen, pass, no_hpdosen, email_dosen, alamat_dosen, profile_img) VALUES ('$username', '$nik_dosen', '$password', '$no_hpdosen', '$email_dosen', '$alamat_dosen', '$profile_img')");

    return mysqli_affected_rows($koneksi);
}

//LABORAN-----------------------------------------------------------------------------------
function registrasi_laboran($data)
{
    global $koneksi;

    $username = stripslashes($data["username"]);
    $nik_laboran = $data["nik_laboran"];
    $password = $data["password"];
    $password2 = $data["password2"];
    $no_hplaboran = $data["no_hplaboran"];
    $email_laboran = $data["email_laboran"];
    $alamat_laboran = $data["alamat_laboran"];
    $profile_img = $data["profile_img"];





    //cek konfir pass
    if ($password !== $password2) {
        echo "<script>
                alert('konfirmasi password tidak sesuai');
              </script>";
        return false;
    }

    //enskripsi
    $password = password_hash($password, PASSWORD_DEFAULT);


    //tambahkan user ke database
    mysqli_query($koneksi, "INSERT INTO tbl_laboran (username, nik_laboran, pass, no_hplaboran, email_laboran, alamat_laboran, profile_img) VALUES ('$username', '$nik_laboran', '$password', '$no_hplaboran', '$email_laboran', '$alamat_laboran', '$profile_img')");

    return mysqli_affected_rows($koneksi);
}

//MAHASISWA---------------------------------------------------------------------------------
function registrasi_mahasiswa($data)
{
    global $koneksi;

    $username = stripslashes($data["username"]);
    $nim_mhs = $data["nim_mhs"];
    $password = $data["password"];
    $password2 = $data["password2"];
    $no_hpmhs = $data["no_hpmhs"];
    $email_mhs = $data["email_mhs"];
    $alamat_mhs = $data["alamat_mhs"];
    $profile_img = $data["profile_img"];





    //cek konfir pass
    if ($password !== $password2) {
        echo "<script>
                alert('konfirmasi password tidak sesuai');
              </script>";
        return false;
    }

    //enskripsi
    $password = password_hash($password, PASSWORD_DEFAULT);


    //tambahkan user ke database
    mysqli_query($koneksi, "INSERT INTO tbl_mahasiswa (username, nim_mhs, pass, no_hpmhs, email_mhs, alamat_mhs, profile_img) VALUES ('$username', '$nim_mhs', '$password', '$no_hpmhs', '$email_mhs', '$alamat_mhs', '$profile_img')");

    return mysqli_affected_rows($koneksi);
}
