<?php
//panggil function.php untuk upload file
include "config/function.php";

//jika tombol dimpan di klik
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

    $id_matkul          = $_GET['id_matkul'];
    $jenis_modul        = $_POST['jenis_modul'];
    $judul_modul        = $_POST['judul_modul'];
    $deskripsi_modul    = $_POST['deskripsi_modul'];

    if ( isset($_POST['jenis_modul']) && $_POST['jenis_modul'] == 'Link' ) {
        $link_video = $_POST['link_video'];
        $simpan     = mysqli_query($koneksi, "INSERT INTO tbl_modulpraktik (id_matkul, jenis_modul, judul_modul, deskripsi_modul, modul_link) VALUES ('$id_matkul', '$jenis_modul', '$judul_modul', '$deskripsi_modul', '$link_video') ");
        if ($simpan) {
            echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
            <link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
            echo "<script type='text/javascript'>
                setTimeout(function() {
                        Swal.fire({
                            title: 'Modul Berhasil Ditambahkan',
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
        $file = upload();
        if ($file === false){
            
        } else {
            $simpan = mysqli_query($koneksi, "INSERT INTO tbl_modulpraktik (id_matkul, jenis_modul, judul_modul, deskripsi_modul, modul_file) VALUES ('$id_matkul', '$jenis_modul', '$judul_modul', '$deskripsi_modul', '$file') ");
            if ($simpan) {
                echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
                <link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
                echo "<script type='text/javascript'>
                    setTimeout(function() {
                            Swal.fire({
                                title: 'Modul Berhasil Ditambahkan',
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
}
?>

<div class="row justify-content-center">
    <div class="col-md-6 col-sm-12">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Tambah Modul</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="id_matkul">Mata Kuliah</label>
                              
                            <?php
                            $id_matkul = $_GET['id_matkul'];
                            $tampil = mysqli_query($koneksi, "SELECT kode_matkul, nama_matkul FROM tbl_matakuliah WHERE id_matkul='$id_matkul'");
                            $data = mysqli_fetch_array($tampil)                          
                            ?>

                            <input type="text" class="form-control" id="judul_modul" name="judul_modul" readonly value="<?php echo $data['kode_matkul'] ?> - <?php echo $data['nama_matkul'] ?>">
                       
                    </div>
                    <div class="form-group">
                        <label for="jenis_modul">Jenis Modul</label>
                        <select class="form-control" name="jenis_modul" id="jenisModul" onchange="UbahJenisModul()" required>
                            <option value="" selected>-- Pilih --</option>
                            <option value="File">File (.pdf, .zip)</option>
                            <option value="Link">Link (Youtube, .ppt, .pptx, .doc, .docx, .xls, .xlsx)</option>
                        </select>
                    </div>
                    <div id="pilihan" style="display: none;">
                        <div class="form-group">
                            <label for="judul_modul">Judul Modul</label>
                            <input type="text" class="form-control" id="judul_modul" name="judul_modul" required>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi_modul">Deskripsi Modul</label>
                            <textarea class="form-control" id="deskripsi_modul" name="deskripsi_modul" rows="3" required></textarea>
                        </div>
                        <div id="file">
                            <div class="form-group">
                                <label for="file">Pilih File</label>
                                <input type="file" class="form-control" id="file" name="file">
                            </div>
                        </div>
                        <div id="link">
                            <div class="form-group" id="link">
                                <label for="link_video">Link Modul (Pastikan link sudah diembed)</label>
                                <input type="link_video" class="form-control" id="link_video" name="link_video" placeholder="Masukkan Link">
                            </div>
                        </div>
                    </div>
                    <?php
                        $id_matkul = $_GET['id_matkul'];
                        $tampil = mysqli_query($koneksi, "SELECT id_matkul, kode_matkul, nama_matkul FROM tbl_matakuliah WHERE id_matkul='$id_matkul'");
                        $data = mysqli_fetch_array($tampil);
                    ?>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="?halaman=modul_praktik&perihal=kelola_modul&id_matkul=<?= $data['id_matkul'] ?>" class="btn btn-danger">Kembali</a>
                </form>
            </div>
            <script src="assets/js/function-modul.js"></script>
        </div>
    </div>
</div>