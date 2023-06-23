<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

var_dump (Spreadsheet::class, Csv::class, Xlsx::class); exit;
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

            $username = $sheetData[$i]['1'];
            $nim = $sheetData[$i]['2'];
            $pass = password_hash($sheetData[$i]['3'], PASSWORD_DEFAULT);
            $no_hp = $sheetData[$i]['4'];
            $email = $sheetData[$i]['5'];
            $alamat = $sheetData[$i]['6'];
            $upload = mysqli_query($koneksi, "INSERT INTO tbl_mahasiswa (username, nim_mhs, pass, no_hpmhs, email_mhs, alamat_mhs) VALUES ('$username', '$nim', '$pass', '$no_hp', '$email', '$alamat')");

            if ($upload) {
                echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
                <link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
                echo "<script type='text/javascript'>
                        setTimeout(function() {
                            Swal.fire({
                                title: 'Data Mahasiswa Berhasil Ditambahkan',
                                icon: 'success',
                                timer: 2000,
                                showConfirmButton: false
                            });
                        }, 100);
                        window.setTimeout(function(){
                            document.location='?halaman=user_mahasiswa';
                        }, 2000);
                    </script>";
            }
        }
    }
}
?>