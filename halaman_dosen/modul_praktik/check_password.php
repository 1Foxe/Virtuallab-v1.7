<?php

$id_matkul = $_POST['id_matkul'];
$password = $_POST['password'];

$cek = mysqli_query($koneksi,"SELECT * FROM tbl_matakuliah WHERE id_matkul = '$id_matkul' and password = '$password'" );
$row = mysqli_num_rows($cek);
$data = mysqli_fetch_assoc($cek);
if($row == 1){
    echo "<script>window.location.href='?halaman=modul_praktik&perihal=kelola_modul&id_matkul=$id_matkul';</script>";
}else{
    echo "<script>alert('Password salah');</script>";
    echo "<script>window.location.href='?halaman=modul_praktik';</script>";
}

?>