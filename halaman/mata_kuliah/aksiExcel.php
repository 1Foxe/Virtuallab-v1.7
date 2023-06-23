<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    if(isset($_FILES['filexls']['name']) && in_array($_FILES['filexls']['type'], $file_mimes)) {
 
        $arr_file = explode('.', $_FILES['filexls']['name']);
        $extension = end($arr_file);
     
        if('csv' == $extension) {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
        } else {
            $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }
     
        $spreadsheet = $reader->load($_FILES['filexls']['tmp_name']);
         
        $sheetData = $spreadsheet->getActiveSheet()->toArray();
        for($i = 1;$i < count($sheetData);$i++) {

            $kode_matkul = $sheetData[$i]['1'];
            $nama_matkul = $sheetData[$i]['2'];
            $id_prodi = $sheetData[$i]['3'];
            $upload = mysqli_query($koneksi, "INSERT INTO tbl_matakuliah (kode_matkul, nama_matkul, id_prodi) VALUES ('$kode_matkul', '$nama_matkul', '$id_prodi')");

            if ($upload) {
                echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
                <link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
                echo "<script type='text/javascript'>
                        setTimeout(function() {
                            Swal.fire({
                                title: 'Data Matkul Berhasil Ditambahkan',
                                icon: 'success',
                                timer: 2000,
                                showConfirmButton: false
                            });
                        }, 100);
                        window.setTimeout(function(){
                            document.location='?halaman=mata_kuliah';
                        }, 2000);
                    </script>";
            }
        }
    }
}
?>