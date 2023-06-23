<?php
require_once 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
    $nilai = isset($datamhs['nilai']) ? floatval($datamhs['nilai']) : 0.0;

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

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

$sheet->setCellValue('A1', 'No');
$sheet->setCellValue('B1', 'Nama');
$sheet->setCellValue('C1', 'NIM');

$sheet->getColumnDimension('A')->setWidth(7);
$sheet->getColumnDimension('B')->setWidth(20);
$sheet->getColumnDimension('C')->setWidth(17);

$judul_modul_list = array();
$column = 'D';

foreach ($nilai_mahasiswa as $username => $data_mahasiswa) {
    foreach ($data_mahasiswa as $nim_mhs => $data_nilai) {
        foreach ($data_nilai as $judul_modul => $nilai) {
            if (!in_array($judul_modul, $judul_modul_list)) {
                $judul_modul_list[] = $judul_modul;
            }
        }
    }
}

$jumlah_modul = count($judul_modul_list);

foreach ($judul_modul_list as $index => $judul_modul) {
    $sheet->setCellValue($column . '1', $judul_modul);
    $sheet->getColumnDimension($column)->setAutoSize(true);
    $column++;
}

$sheet->setCellValue($column . '1', 'Total Nilai');
$sheet->setCellValue(++$column . '1', 'Rata Rata');

$nomhs = 2;

foreach ($nilai_mahasiswa as $username => $data_mahasiswa) {
    foreach ($data_mahasiswa as $nim_mhs => $data_nilai) {
        $sheet->setCellValue('A' . $nomhs, $nomhs - 1);
        $sheet->setCellValue('B' . $nomhs, $username);
        $sheet->setCellValue('C' . $nomhs, $nim_mhs);

        $total_nilai_mahasiswa = 0;
        $column = 'D';

        foreach ($judul_modul_list as $judul_modul) {
            $nilai = isset($data_nilai[$judul_modul]) ? floatval($data_nilai[$judul_modul]) : 0.0;
            $sheet->setCellValue($column . $nomhs, $nilai);
            $total_nilai_mahasiswa += $nilai;
            $column++;
        }

        $sheet->setCellValue($column . $nomhs, $total_nilai_mahasiswa);
        $rata_rata = $total_nilai_mahasiswa / $jumlah_modul;
        $sheet->setCellValue(++$column . $nomhs, $rata_rata);

        $nomhs++;
    }
}

$writer = new Xlsx($spreadsheet);
$writer->save('export_data.xlsx');
