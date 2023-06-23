<?php
// Koneksi ke database
//persiapan identitas server
$server     = "";  //Nama Server
$user       = "root";       //Username database server
$password   = "";           //Password database server
$database   = "vb"; //Nama Database

//koneksi database
$koneksi = mysqli_connect($server, $user, $password, $database) or die (mysqli_error($koneksi));


// Mendapatkan ID mata kuliah dari URL
$id_matkul = $_GET['id_matkul'];
$kode_matkul = $_GET['kode_matkul'];
$nama_matkul = $_GET['nama_matkul'];

// Query untuk mengambil data mahasiswa yang sudah melakukan enroll pada mata kuliah tersebut
$query = "SELECT * FROM tbl_matkulmhs WHERE id_matkul = '$id_matkul' AND nim IS NOT NULL AND nama IS NOT NULL";
$result = mysqli_query($koneksi, $query);

// Mengecek apakah ada data mahasiswa yang sudah melakukan enroll
if (mysqli_num_rows($result) > 0) {
    echo '<div class="card bg-primary">';
    echo '<div class="card-body">';
    echo "<h6 class='m-0 font-weight-bold text-white'>Data Mahasiswa Yang Telah Melakukan Enroll " . $kode_matkul . " - " . $nama_matkul . "</h6>";
    echo '</div>';
    echo '</div>';
    echo '<hr>';
    echo '<div class="card shadow mb-4">';
    echo '<div class="card-body">';
    echo '<div class="table-responsive">';
    echo '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">';
    echo '<thead>';
    echo '<tr style="text-align: center;">';
    echo '<th>No</th>';
    echo '<th>Nama</th>';
    echo '<th>NIM</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    
    $no = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $no++ . '</td>';
        echo '<td>' . $row['nama'] . '</td>';
        echo '<td>' . $row['nim'] . '</td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';
    echo '</div>';
    echo '</div>';
} else {
    echo '<div class="card bg-primary">';
    echo '<div class="card-body">';
    echo "<h6 class='m-0 font-weight-bold text-white'>Tidak ada mahasiswa yang telah melakukan enroll pada mata kuliah - " . $kode_matkul . " - " . $nama_matkul . "</h6>";
    echo '</div>';
    echo '</div>';
    echo '<hr>';
}

// Menutup koneksi database
mysqli_close($koneksi);
?>