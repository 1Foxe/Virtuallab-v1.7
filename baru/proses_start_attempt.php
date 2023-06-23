<?php
// Pastikan koneksi database sudah terhubung sebelum melakukan query
// Lakukan inisialisasi session jika belum dilakukan

if ($_SERVER['REQUEST_METHOD'] == 'POST' && empty($_SESSION['attempt_in_progress'])) {
    // Set a flag to indicate an attempt is in progress
    $_SESSION['attempt_in_progress'] = true;

    // Ambil nilai yang dikirim melalui Ajax
    $id_matkulmhs = $_POST['id_matkulmhs'];
    $id_modul = $_POST['id_modul'];
    $username = $_POST['username'];
    $nim_mhs = $_POST['nim_mhs'];

    // Lakukan validasi atau pemrosesan lainnya sesuai kebutuhan

    // Lakukan penyimpanan data ke tabel tbl_attempt_mhs
    $query = "INSERT INTO tbl_attempt_mhs (id_matkulmhs, id_modul, username, nim_mhs) VALUES (?, ?, ?, ?)";
    
    // Persiapkan statement
    $stmt = mysqli_prepare($koneksi, $query);

    if ($stmt) {
        // Bind parameter ke statement
        mysqli_stmt_bind_param($stmt, "ssss", $id_matkulmhs, $id_modul, $username, $nim_mhs);
    
        // Eksekusi statement
        if (mysqli_stmt_execute($stmt)) {
            // Jika penyimpanan berhasil, berikan tanggapan ke client
            echo "Data inserted successfully";

            // Log eksekusi ke file
            $log_message = "Executed at: " . date("Y-m-d H:i:s") . ", ID_MatkulMhs: $id_matkulmhs, ID_Modul: $id_modul, Username: $username, NIM_Mhs: $nim_mhs\n";
            file_put_contents("execution_log.txt", $log_message, FILE_APPEND);
        } else {
            // Jika terjadi kesalahan saat penyimpanan, berikan pesan error
            echo "Error: " . mysqli_stmt_error($stmt);
        }
    
        // Tutup statement
        mysqli_stmt_close($stmt);
    } else {
        // Jika statement tidak dapat dipersiapkan, berikan pesan error
        echo "Error: " . mysqli_error($koneksi);
    }

    // Reset the flag after the attempt is completed
    unset($_SESSION['attempt_in_progress']);
}
?>
