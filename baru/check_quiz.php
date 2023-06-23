<?php
// Ambil ID modul dari permintaan AJAX
$id_modul = $_GET['id_modul'];
$id_matkul = $_GET['id_matkul'];

// Lakukan query untuk mengambil data mahasiswa yang sudah mengerjakan kuis
$query_mengerjakan = mysqli_query($koneksi, "SELECT * FROM tbl_attempt_mhs WHERE id_modul = '$id_modul'");
if ($query_mengerjakan) {
    $mahasiswa_mengerjakan = mysqli_fetch_all($query_mengerjakan, MYSQLI_ASSOC);

    // Tampilkan hasil dalam format yang diinginkan, misalnya menggunakan tabel
    echo "<h4>Mahasiswa yang sudah mengerjakan kuis:</h4>";
    echo "<table class='table table-striped'>";
    echo "<thead class='thead-dark'>";
    echo "<tr><th>No</th><th>Nama</th><th>NIM</th></tr>";
    echo "</thead>";
    echo "<tbody>";
    foreach ($mahasiswa_mengerjakan as $key => $mahasiswa) {
        echo "<tr>";
        echo "<td>" . ($key + 1) . "</td>";
        echo "<td>" . $mahasiswa['username'] . "</td>";
        echo "<td>" . $mahasiswa['nim_mhs'] . "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "Terjadi kesalahan dalam mengambil data mahasiswa yang sudah mengerjakan kuis: " . mysqli_error($koneksi);
}

// Lakukan query untuk mengambil data mahasiswa yang belum mengerjakan kuis
$query_belum_mengerjakan = mysqli_query($koneksi, "SELECT * FROM tbl_matkulmhs WHERE id_matkul = '$id_matkul' AND nim IS NOT NULL AND nama IS NOT NULL");
if ($query_belum_mengerjakan) {
    $mahasiswa_belum_mengerjakan = mysqli_fetch_all($query_belum_mengerjakan, MYSQLI_ASSOC);

    echo "<h4>Mahasiswa yang belum mengerjakan kuis:</h4>";
    echo "<table class='table table-striped'>";
    echo "<thead class='thead-dark'>";
    echo "<tr><th>No</th><th>Nama</th><th>NIM</th></tr>";
    echo "</thead>";
    echo "<tbody>";
    foreach ($mahasiswa_belum_mengerjakan as $key => $mahasiswa) {
        echo "<tr>";
        echo "<td>" . ($key + 1) . "</td>";
        echo "<td>" . $mahasiswa['nama'] . "</td>";
        echo "<td>" . $mahasiswa['nim'] . "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "Terjadi kesalahan dalam mengambil data mahasiswa yang belum mengerjakan kuis: " . mysqli_error($koneksi);
}
?>
