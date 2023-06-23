<?php
//jika tombol dimpan di klik
if (isset($_POST['bSimpan'])) {

    //MEMBUAT VARIABEL 
    $id_jurusan = $_POST['id_jurusan']; //$_POST['name dari form inputan']
    $nama_prodi = $_POST['nama_prodi'];

    //perintah simpan data baru
    //simpan data
    $simpan = mysqli_query($koneksi, "INSERT INTO tbl_prodi (nama_prodi, id_jurusan) VALUES ('$nama_prodi', '$id_jurusan') ");

    if ($simpan) {
        echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
        <link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
        echo "<script type='text/javascript'>
            setTimeout(function() {
                    Swal.fire({
                        title: 'Data Prodi Berhasil Ditambah',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    });
                }, 100);
            window.setTimeout(function(){
                document.location='?halaman=prodi';
            }, 2000);
            </script>";
    }
}
?>


<div class="row justify-content-center">
    <div class="col-md-6 col-sm-12">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Program Studi</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="id_jurusan">Jurusan</label>
                        <select class="form-control" name="id_jurusan" id="id_jurusan">
                        <option disabled selected> -- Pilih Jurusan --</option>
                            <?php
                            $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_jurusan ORDER BY nama_jurusan ASC");
                            while ($data = mysqli_fetch_array($tampil)) {
                            ?>
                                <option value="<?=$data['id_jurusan']?>"><?=$data['nama_jurusan']?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_prodi">Program Studi</label>
                        <input type="text" class="form-control" id="nama_prodi" name="nama_prodi" required>
                    </div>
                    <button type="submit" name="bSimpan" class="btn btn-primary">Simpan</button>
                    <a href="?halaman=prodi" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>