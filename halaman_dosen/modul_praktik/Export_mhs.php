<?php
// Membuat koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "vb");

// Memeriksa koneksi
if (mysqli_connect_errno()) {
    echo "Gagal terhubung ke MySQL: " . mysqli_connect_error();
    exit();
}

// Mendapatkan data nilai mahasiswa
$id_modul = 1; // Ganti dengan ID modul yang sesuai
$tampil1 = mysqli_query($koneksi, "SELECT * FROM tbl_nilai_mhs INNER JOIN tbl_attempt_mhs ON tbl_nilai_mhs.id_attempt_mhs = tbl_attempt_mhs.id_attempt_mhs INNER JOIN tbl_matkulmhs ON tbl_attempt_mhs.id_matkulmhs = tbl_matkulmhs.id_matkulmhs INNER JOIN tbl_mahasiswa ON tbl_matkulmhs.id_mhs = tbl_mahasiswa.id_mhs WHERE tbl_attempt_mhs.id_modul = '$id_modul'");
$nomhs = 0; // Untuk menyimpan nomor urut mahasiswa

// Menghasilkan kode HTML untuk tabel
$table_html = '
<table class="table table-bordered" id="table1" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>NIM</th>
            <th>Nilai</th>
        </tr>
    </thead>
    <tbody>';

// Menambahkan baris data ke tabel HTML
while ($datamhs = mysqli_fetch_assoc($tampil1)) {
    $nomhs++; // Increment nomor urut mahasiswa

    $table_html .= '
        <tr>
            <td>' . $nomhs . '</td>
            <td>' . $datamhs['username'] . '</td>
            <td>' . $datamhs['nim_mhs'] . '</td>
            <td>' . $datamhs['nilai'] . '</td>
        </tr>';
}

// Menutup tag </tbody> dan </table>
$table_html .= '
    </tbody>
</table>';

// Menampilkan tabel HTML
echo $table_html;

// Menutup koneksi ke database
mysqli_close($koneksi);
?>
