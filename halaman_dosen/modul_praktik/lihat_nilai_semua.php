<?php
$query = "SELECT * FROM tbl_nilai_mhs 
          INNER JOIN tbl_attempt_mhs ON tbl_nilai_mhs.id_attempt_mhs = tbl_attempt_mhs.id_attempt_mhs 
          INNER JOIN tbl_matkulmhs ON tbl_attempt_mhs.id_matkulmhs = tbl_matkulmhs.id_matkulmhs 
          INNER JOIN tbl_mahasiswa ON tbl_matkulmhs.id_mhs = tbl_mahasiswa.id_mhs
          INNER JOIN tbl_modulpraktik ON tbl_attempt_mhs.id_modul = tbl_modulpraktik.id_modul";

$result = mysqli_query($koneksi, $query);

$nilai_mahasiswa = array();
$total_nilai = array();

$nomhs = 1; // Inisialisasi nomor mahasiswa

while ($datamhs = mysqli_fetch_assoc($result)) {
    $username = isset($datamhs['username']) ? $datamhs['username'] : 'Data tidak ditemukan';
    $nim_mhs = isset($datamhs['nim_mhs']) ? $datamhs['nim_mhs'] : 'Data tidak ditemukan';
    $judul_modul = isset($datamhs['judul_modul']) ? $datamhs['judul_modul'] : 'Data tidak ditemukan';
    $nilai = isset($datamhs['nilai']) ? $datamhs['nilai'] : 'Data tidak ditemukan';

    if (!isset($nilai_mahasiswa[$username][$nim_mhs])) {
        $nilai_mahasiswa[$username][$nim_mhs] = array();
    }

    // Menimpa judul_modul sebelumnya jika memiliki nilai yang sama
    $nilai_mahasiswa[$username][$nim_mhs][$judul_modul] = $nilai;

    // Menjumlahkan nilai untuk setiap judul modul
    if (!isset($total_nilai[$nomhs][$username][$nim_mhs])) {
        $total_nilai[$nomhs][$username][$nim_mhs] = 0;
    }
    $total_nilai[$nomhs][$username][$nim_mhs] += $nilai;
}

?>

<button type="button" class="btn btn-primary" id="exportnilai">Export Nilai</button>

<div>
    <div class="card shadow mb-4 mt-3">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIM</th>
                            <?php
                            $judul_modul_list = array(); // Menyimpan daftar judul modul yang unik
                            foreach ($nilai_mahasiswa as $username => $data_mahasiswa) {
                                foreach ($data_mahasiswa as $nim_mhs => $data_nilai) {
                                    foreach ($data_nilai as $judul_modul => $nilai) {
                                        if (!in_array($judul_modul, $judul_modul_list)) {
                                            $judul_modul_list[] = $judul_modul;
                                            echo "<th>$judul_modul</th>";
                                        }
                                    }
                                }
                            }
                            echo "<th>Total Nilai</th>"; // Menambahkan kolom Total Nilai
                            echo "<th>Rata Rata</th>"; // Menambahkan kolom Rata Rata
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($nilai_mahasiswa as $username => $data_mahasiswa) {
                            foreach ($data_mahasiswa as $nim_mhs => $data_nilai) {
                                echo "<tr>";
                                echo "<td>$nomhs</td>";
                                echo "<td>$username</td>";
                                echo "<td>$nim_mhs</td>";

                                $total_nilai_mahasiswa = 0; // Inisialisasi total nilai mahasiswa

                                foreach ($judul_modul_list as $judul_modul) {
                                    $nilai = isset($data_nilai[$judul_modul]) ? floatval($data_nilai[$judul_modul]) : 0.0;
                                    echo "<td>$nilai</td>";
                                
                                    // Menjumlahkan nilai untuk setiap judul modul
                                    $total_nilai_mahasiswa += $nilai;
                                }                                

                                echo "<td>$total_nilai_mahasiswa</td>"; // Menampilkan total nilai

                                // Menghitung rata-rata nilai
                                $jumlah_modul = count($judul_modul_list);
                                $rata_rata = $total_nilai_mahasiswa / $jumlah_modul;
                                echo "<td>$rata_rata</td>"; // Menampilkan rata-rata nilai

                                echo "</tr>";
                                $nomhs++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('exportnilai').addEventListener('click', function() {
    // Mengirim data ke halaman export_nilai.php 
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '?halaman=modul_praktik&perihal=export_nilai', true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Mengarahkan pengguna untuk mengunduh file hasil ekspor
            var downloadLink = document.createElement('a');
            downloadLink.href = 'export_data.xlsx';
            downloadLink.download = 'export_data.xlsx';
            downloadLink.click();
        }
    };
    xhr.send();
});

</script>
