<?php

//tampilkan data yang akan di edit
$id = $_GET['id'];
$tampil = mysqli_query($koneksi, "SELECT * FROM tbl_prodi, tbl_jurusan WHERE tbl_prodi.id_jurusan = tbl_jurusan.id_jurusan AND id_prodi = '$id' ");
$data = mysqli_fetch_array($tampil);
if ($data) {
    $vid_jurusan = $data['id_jurusan'];
    $vnama_jurusan = $data['nama_jurusan'];
    $vid_prodi = $data['id_prodi'];
    $vnama_prodi = $data['nama_prodi'];
}
//Jika sudah ditampilkan dan jika tombol simpan perubahan di klik maka lakukan :

if (isset($_POST['b_Ubah'])) {

    // id modul dari GET di tampung ke variabel dulu
    $id = $_GET['id'];
    $ubah = mysqli_query($koneksi, "UPDATE tbl_prodi SET
                nama_prodi = '$_POST[nama_prodi]',
                id_jurusan ='$_POST[id_jurusan]'
                WHERE id_prodi = '$id' ");

    if ($ubah) {
        echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
        <link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
        echo "<script type='text/javascript'>
            setTimeout(function() {
                    Swal.fire({
                        title: 'Data Prodi Berhasil Diubah',
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
                <h6 class="m-0 font-weight-bold text-primary">Form Ubah Data Program Studi</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                <div class="form-group">
                        <label for="id_jurusan">Jurusan</label>
                        <select class="form-control" name="id_jurusan" id="id_jurusan">
                            <option disabled> -- Pilih Jurusan --</option>
                                <option value="<?= $vid_jurusan ?>"><?= $vnama_jurusan ?></option>
                                    <?php
                                    $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_jurusan ORDER BY nama_jurusan ASC");
                                    while($data = mysqli_fetch_array($tampil)){
                                        echo "<option value='$data[id_jurusan]'> $data[nama_jurusan] </option>";
                                    }
                                    ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_prodi">Program Studi</label>
                        <input type="text" class="form-control" id="nama_prodi" name="nama_prodi" value="<?= $vnama_prodi ?>">
                    </div>
                    
                    <button type="submit" name="b_Ubah" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="?halaman=prodi" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>