<?php

//tampilkan data yang akan di edit
$tampil = mysqli_query($koneksi, "SELECT * FROM tbl_admin WHERE id_admin = '$_GET[id]' ");
$data = mysqli_fetch_array($tampil);

//Jika sudah ditampilkan dan jika tombol simpan perubahan di klik maka lakukan :
if (isset($_POST['b_Ubah'])) {
    $ubah = mysqli_query($koneksi, "UPDATE tbl_admin SET 
                username = '$_POST[username_admin]',
                no_hpadmin = '$_POST[no_hpadmin]',
                email_admin = '$_POST[email_admin]',
                alamat_admin = '$_POST[alamat_admin]'
                WHERE id_admin = '$_GET[id]' ");

    if ($ubah) {
        echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
        <link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
        echo "<script type='text/javascript'>
            setTimeout(function() {
                    Swal.fire({
                        title: 'Data Admin Berhasil Diubah',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    });
                }, 100);
            window.setTimeout(function(){
                document.location='?halaman=user_admin';
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
                <h6 class="m-0 font-weight-bold text-primary">Form Data Admin</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="nama_admin">Nama</label>
                        <input type="text" class="form-control" id="username_admin" name="username_admin" value="<?php echo $data['username'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="no_hpadmin">No. Telp/HP</label>
                        <input type="number" class="form-control" id="no_hpadmin" name="no_hpadmin" value="<?php echo $data['no_hpadmin'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="email_admin">Email</label>
                        <input type="email" class="form-control" id="email_admin" name="email_admin" value="<?php echo $data['email_admin'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="alamat_admin">Alamat</label>
                        <input type="text" class="form-control" id="alamat_admin" name="alamat_admin" value="<?php echo $data['alamat_admin'] ?>">
                    </div>
                    <button type="submit" name="b_Ubah" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="?halaman=user_admin" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>