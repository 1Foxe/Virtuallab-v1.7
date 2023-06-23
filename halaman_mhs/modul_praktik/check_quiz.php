<?php
// Menangkap data dari Attempt Quiz
$id_matkulmhs = $_GET['id_matkulmhs'];
$id_modul = $_GET['id_modul'];
$id_mhs = $_GET['id_mhs'];
$judul_modul = isset($_GET['judul_modul']) ? $_GET['judul_modul'] : "Data Tidak ada";

// Periksa apakah id_matkulmhs ada di tabel tbl_matkulmhs
$check_query = "SELECT id_matkulmhs, nama_modul FROM tbl_matkulmhs WHERE id_matkulmhs = ?";
$stmt = mysqli_prepare($koneksi, $check_query);
mysqli_stmt_bind_param($stmt, "s", $id_matkulmhs);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt); // Simpan hasil eksekusi ke dalam memori
$count = mysqli_stmt_num_rows($stmt); // Dapatkan jumlah baris yang dikembalikan
mysqli_stmt_bind_result($stmt, $id_matkulmhs_db, $nama_modul_db); // Bind kolom hasil ke variabel
mysqli_stmt_fetch($stmt);
mysqli_stmt_close($stmt);

if ($count === 0) {
    // Tambahkan record baru dengan status "Sudah Kuis" dan judul_modul
    $insert_query = "INSERT INTO tbl_matkulmhs (id_matkulmhs, id_modul, id_mhs, `status`, nama_modul) VALUES (?, ?, ?, 'Sudah Kuis', ?)";
    $stmt = mysqli_prepare($koneksi, $insert_query);
    mysqli_stmt_bind_param($stmt, "ssss", $id_matkulmhs, $id_modul, $id_mhs, $judul_modul);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

} else {
    // Periksa apakah ada judul_modul yang dikirim
    if (!empty($judul_modul)) {
        // Jika ada judul_modul baru dan tidak sama dengan judul_modul yang sudah ada, tambahkan ke judul_modul yang sudah ada
        if (!empty($nama_modul_db) && $nama_modul_db !== $judul_modul) {
            $nama_modul = $nama_modul_db . ', ' . $judul_modul;
        } else {
            $nama_modul = $judul_modul;
        }
    } else {
        // Jika tidak ada judul_modul baru, gunakan nilai yang sudah ada di database
        $nama_modul = $nama_modul_db;
    }

    // Perbarui nama_modul dengan nilai yang sesuai
    $update_nama_modul_query = "UPDATE tbl_matkulmhs SET nama_modul = ? WHERE id_matkulmhs = ?";
    $stmt = mysqli_prepare($koneksi, $update_nama_modul_query);
    mysqli_stmt_bind_param($stmt, "ss", $nama_modul, $id_matkulmhs);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

// Perbarui status record id_matkulmhs tertentu menjadi "Sudah Kuis" jika statusnya bukan "Sudah Kuis"
$update_query = "UPDATE tbl_matkulmhs SET status = 'Sudah Kuis' WHERE id_matkulmhs = ? AND status <> 'Sudah Kuis'";
$stmt = mysqli_prepare($koneksi, $update_query);
mysqli_stmt_bind_param($stmt, "s", $id_matkulmhs);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

// Perbarui semua nilai status menjadi "Belum Kuis" kecuali yang sudah "Sudah Kuis"
$update_all_query = "UPDATE tbl_matkulmhs SET status = 'Belum Kuis' WHERE status <> 'Sudah Kuis'";
mysqli_query($koneksi, $update_all_query);

// Redirect ke halaman kuis
header("Location: ?halaman=modul_praktik&perihal=quiz&id_matkulmhs=$id_matkulmhs&id_modul=$id_modul");
exit;
?>
