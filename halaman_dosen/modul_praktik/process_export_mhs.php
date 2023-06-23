<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$id_modul = $_GET['id_modul'];
$tampil = mysqli_query($koneksi, "SELECT * FROM tbl_matakuliah INNER JOIN tbl_modulpraktik ON tbl_matakuliah.id_matkul = tbl_modulpraktik.id_matkul WHERE tbl_modulpraktik.id_modul = '$id_modul'");
$data = mysqli_fetch_array($tampil);

if (isset($_POST['btn-export'])) {
    # code...
    $filename = "Nilai Mahasiswa - ".time();

    $tampil1 = mysqli_query($koneksi, "SELECT * FROM tbl_nilai_mhs INNER JOIN tbl_attempt_mhs ON tbl_nilai_mhs.id_attempt_mhs = tbl_attempt_mhs.id_attempt_mhs INNER JOIN tbl_matkulmhs ON tbl_attempt_mhs.id_matkulmhs = tbl_matkulmhs.id_matkulmhs INNER JOIN tbl_mahasiswa ON tbl_matkulmhs.id_mhs = tbl_mahasiswa.id_mhs WHERE tbl_attempt_mhs.id_modul = '$id_modul'");
    foreach ($tampil1 as $nomhs => $datamhs) :

    if (mysqli_num_rows($datamhs) > 0) {
        # code...
        $spreadsheet = new Spreadsheet();
        $activeWorksheet = $spreadsheet->getActiveSheet();

        $activeWorksheet->setCellValue('A1', 'NO');
        $activeWorksheet->setCellValue('B1', 'Nama');
        $activeWorksheet->setCellValue('C1', 'NIM');
        $activeWorksheet->setCellValue('D1', 'Nilai');

        $rowCount = 2;
        foreach ($tampil1 as $nomhs => $datamhs) {
            # code...
            $activeWorksheet->setCellValue('A' . $rowCount, $nomhs+1);
            $activeWorksheet->setCellValue('B' . $rowCount, $datamhs['username']);
            $activeWorksheet->setCellValue('C' . $rowCount, $datamhs['nim_mhs']);
            $activeWorksheet->setCellValue('D' . $rowCount, $datamhs['nilai']);
            $rowCount++;
        }

        $writer = new Xlsx($spreadsheet);
        $final_filename = $filename.'.xlsx';
        //$writer->save($final_filename);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="'. urlencode($final_filename).'"');
        $writer->save('php://output');
    }
    endforeach;
}