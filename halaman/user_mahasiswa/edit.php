<?php

//tampilkan data yang akan di edit
$tampil = mysqli_query($koneksi, "SELECT * FROM tbl_mahasiswa WHERE id_mhs = '$_GET[id]' ");
$data = mysqli_fetch_array($tampil);

//Jika sudah ditampilkan dan jika tombol simpan perubahan di klik maka lakukan :
if (isset($_POST['b_Ubah'])) {
    $ubah = mysqli_query($koneksi, "UPDATE tbl_mahasiswa SET 
                username = '$_POST[username_mhs]',
                nim_mhs ='$_POST[nim_mhs]',
                no_hpmhs = '$_POST[no_hpmhs]',
                email_mhs = '$_POST[email_mhs]',
                alamat_mhs = '$_POST[alamat_mhs]'
                WHERE id_mhs = '$_GET[id]' ");

    if ($ubah) {
        echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
        <link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
        echo "<script type='text/javascript'>
            setTimeout(function() {
                    Swal.fire({
                        title: 'Data Mahasiswa Berhasil Diubah',
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

?>


<div class="row justify-content-center">
    <div class="col-md-6 col-sm-12">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Data Mahasiswa</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="username_mhs">Username Mahasiswa</label>
                        <input type="text" class="form-control" id="username_mhs" name="username_mhs" value="<?php echo $data['username'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="nim_mhs">NIM</label>
                        <input type="text" class="form-control" id="nim_mhs" name="nim_mhs" value="<?php echo $data['nim_mhs'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="no_hpmhs">No. Telp/HP</label>
                        <input type="number" class="form-control" id="no_hpmhs" name="no_hpmhs" value="<?php echo $data['no_hpmhs'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="email_mhs">Email</label>
                        <input type="email" class="form-control" id="email_mhs" name="email_mhs" value="<?php echo $data['email_mhs'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="alamat_mhs">Alamat</label>
                        <input type="text" class="form-control" id="alamat_mhs" name="alamat_mhs" value="<?php echo $data['alamat_mhs'] ?>">
                    </div>
                    <button type="submit" name="b_Ubah" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="?halaman=user_mahasiswa" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>