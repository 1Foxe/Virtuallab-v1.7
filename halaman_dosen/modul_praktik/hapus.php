<?php

if (isset($_GET['id'])) {
    $id_modul = $_GET['id'];
    $id_matkul = $_GET['id_matkul'];
    $query = mysqli_query($koneksi, "SELECT jenis_modul, modul_file FROM tbl_modulpraktik WHERE id_modul = '$id_modul' LIMIT 1 ");
    if (mysqli_num_rows($query) != 1) {
        echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
        <link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
        echo "<script type='text/javascript'>
            setTimeout(function() {
                    Swal.fire({
                        title: 'File Sebelumnya Tidak Ada / Sudah Dihapus!',
                        icon: 'error',
                        timer: 2000,
                        showConfirmButton: false
                    });
                }, 100);
            window.setTimeout(function(){
                document.location='?halaman=modul_praktik&perihal=kelola_modul&id_matkul=$id_matkul';
            }, 2000);
            </script>";
    }
    $data_modul = mysqli_fetch_array($query);
    $delete = mysqli_query($koneksi, "DELETE FROM tbl_modulpraktik WHERE id_modul = '$id_modul' ");
    if ($delete) {
        if ($data_modul['jenis_modul'] == "File") {
            if (is_file('./file/' . $data_modul['modul_file'])) {
                unlink('./file/' . $data_modul['modul_file']);
            } else {
                if (is_dir('./upload/' . $data_modul['modul_file']) && $data_modul['modul_file'] != ''){
                    delete_dir('./upload/' . $data_modul['modul_file']);
                }
            }
        }
        echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
        <link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
        echo "<script type='text/javascript'>
            setTimeout(function() {
                    Swal.fire({
                        title: 'Modul Berhasil Dihapus',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    });
                }, 100);
            window.setTimeout(function(){
                document.location='?halaman=modul_praktik&perihal=kelola_modul&id_matkul=$id_matkul';
            }, 2000);
            </script>";
    }
}

function delete_dir(string $lokasi)
{
	$dir = $lokasi;
	$it = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
	$files = new RecursiveIteratorIterator(
		$it,
		RecursiveIteratorIterator::CHILD_FIRST
	);
	foreach ($files as $file) {
		if ($file->isDir()) {
			rmdir($file->getRealPath());
		} else {
			unlink($file->getRealPath());
		}
	}
	rmdir($dir);
}

?>