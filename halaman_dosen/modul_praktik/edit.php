<?php
include "config/function.php";

//tampilkan data yang akan di edit
$id         = $_GET['id'];
$id_matkul  = $_GET['id_matkul'];
$tampil     = mysqli_query($koneksi, "SELECT tbl_matakuliah.*, tbl_modulpraktik.* FROM tbl_matakuliah, tbl_modulpraktik WHERE tbl_matakuliah.id_matkul = tbl_modulpraktik.id_matkul AND tbl_modulpraktik.id_matkul = '$id_matkul' AND tbl_modulpraktik.id_modul = '$id' ");
$data       = mysqli_fetch_array($tampil);
if ( $data ) {
    if ( $data['jenis_modul'] == 'Link' ) {
        $vid_matkul         = $data['id_matkul'];
        $vkode_matkul       = $data['kode_matkul'];
        $vnama_matkul       = $data['nama_matkul'];
        $vjenis_modul       = $data['jenis_modul'];
        $vjudul_modul       = $data['judul_modul'];
        $vdeskripsi_modul   = $data['deskripsi_modul'];
        $vlink              = $data['modul_link'];
    } else {
        $vid_matkul         = $data['id_matkul'];
        $vkode_matkul       = $data['kode_matkul'];
        $vnama_matkul       = $data['nama_matkul'];
        $vjenis_modul       = $data['jenis_modul'];
        $vjudul_modul       = $data['judul_modul'];
        $vdeskripsi_modul   = $data['deskripsi_modul'];
        $vfile              = $data['modul_file'];
    }
}

//Jika sudah ditampilkan dan jika tombol simpan perubahan di klik maka lakukan :

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $id_matkul = $_GET['id_matkul'];

    // id modul dari GET di tampung ke variabel dulu
    $id = $_GET['id'];

    if ( $data['jenis_modul'] == 'Link' ) {
        $ubah = mysqli_query($koneksi, "UPDATE tbl_modulpraktik SET
                id_matkul       = '$_POST[id_matkul]',
                judul_modul     = '$_POST[judul_modul]',
                deskripsi_modul = '$_POST[deskripsi_modul]',
                modul_link      = '$_POST[modul_link]'
                WHERE id_modul  = '$id' ");

        if ($ubah) {
            echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
            <link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
            echo "<script type='text/javascript'>
                setTimeout(function() {
                        Swal.fire({
                            title: 'Modul Sudah Diubah',
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
    } else {
        // cek apakah user pilih file baru atau tidak
        if ($_FILES['file']['error'] === 4) {
            $file = $vfile;
        } else {
            if (is_file('./file/' . $vfile)) {
                unlink('./file/' . $vfile);
                $file = upload();
            } else {
                delete_dir('./upload/' . $vfile);
                $file = upload();
            }
        }

        $ubah = mysqli_query($koneksi, "UPDATE tbl_modulpraktik SET
                    id_matkul       = '$_POST[id_matkul]',
                    judul_modul     = '$_POST[judul_modul]',
                    deskripsi_modul = '$_POST[deskripsi_modul]',
                    modul_file      = '$file'
                    WHERE id_modul  = '$id' ");

        if ($ubah) {
            echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
            <link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
            echo "<script type='text/javascript'>
                setTimeout(function() {
                        Swal.fire({
                            title: 'Modul Sudah Diubah',
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

<div class="row justify-content-center">
    <div class="col-md-6 col-sm-12">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Ubah Materi</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    <input type="hidden" name="ganti" value="0">
                    <div class="form-group">
                        <label for="id_matkul">Mata Kuliah</label>
                        <input type="hidden" name="id_matkul" value="<?= $id_matkul; ?>">
                        <input type="text" class="form-control" name="id_matkul" id="id_matkul" disabled value="<?= $vkode_matkul ?> - <?= $vnama_matkul ?>">
                    </div>
                    <div class="form-group">
                        <label for="jenis_modul">Jenis Modul</label>
                        <input type="text" class="form-control" name="jenis_modul" id="jenis_modul" disabled value="<?= $vjenis_modul ?>">
                    </div>
                    <div class="form-group">
                        <label for="judul_modul">Judul Modul</label>
                        <input type="text" class="form-control" id="judul_modul" name="judul_modul" value="<?= $vjudul_modul ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi_modul">Deskripsi Modul</label>
                        <textarea type="text" class="form-control" id="deskripsi_modul" name="deskripsi_modul" value="<?= $vdeskripsi_modul ?>" required><?= $vdeskripsi_modul ?></textarea>
                    </div>
                    <?php if ($vjenis_modul == "Link") : ?>
                        <div class="form-group">
                            <label for="link">Ubah Link</label>
                            <input type="text" class="form-control" name="modul_link" value="<?= $vlink ?>" placeholder="Masukkan Link" required>
                        </div>
                    <?php elseif ($vjenis_modul == "File") : ?>
                        <div class="form-group">
                            <label for="file">File Sebelumnya</label>
                            <input type="text" class="form-control" name="fileLama" disabled value="<?= $vfile ?>">
                        </div>
                        <div class="form-group mt-3">
                            <label for="file">Pilih File Baru</label>
                            <input type="file" class="form-control" id="file" name="file" required>
                        </div>
                    <?php endif; ?>
                    <?php
                        $id_matkul = $_GET['id_matkul'];
                        $tampil = mysqli_query($koneksi, "SELECT id_matkul, kode_matkul, nama_matkul FROM tbl_matakuliah WHERE id_matkul='$id_matkul'");
                        $data = mysqli_fetch_array($tampil);
                    ?>
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="?halaman=modul_praktik&perihal=kelola_modul&id_matkul=<?= $data['id_matkul'] ?>" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>