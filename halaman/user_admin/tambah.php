<?php
//jika tombol dimpan di klik
if (isset($_POST['bSimpan'])) {
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    //perintah simpan data baru
    //simpan data
    $simpan = mysqli_query($koneksi, "INSERT INTO tbl_admin SET
            username = '$_POST[username_admin]',
            pass = '$password',
            no_hpadmin = '$_POST[no_hpadmin]',
            email_admin = '$_POST[email_admin]',
            `date` = CURRENT_TIMESTAMP(),
            alamat_admin = '$_POST[alamat_admin]' ");

    if ($simpan) {
        echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
        <link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
        echo "<script type='text/javascript'>
            setTimeout(function() {
                    Swal.fire({
                        title: 'Data Admin Berhasil Ditambah',
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

<link rel="stylesheet" href="assets/css/pswd-data.css">

<div class="row justify-content-center">
    <div class="col-md-6 col-sm-12">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Admin</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="username_admin">Username Admin</label>
                        <input type="text" class="form-control" id="username_admin" name="username_admin" placeholder="Masukkan Nama Lengkap Sebagai Username Anda" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
                        <span id="pass1"><i class="fa-solid fa-eye" id="eye" onclick="toggle()"></i></span>
                    </div>
                    <div class="form-group">
                        <label for="no_hpadmin">No. Telp/HP</label>
                        <input type="number" class="form-control" id="no_hpadmin" name="no_hpadmin" placeholder="Masukkan No.Hp" required>
                    </div>
                    <div class="form-group">
                        <label for="email_admin">Email</label>
                        <input type="email" class="form-control" id="email_admin" name="email_admin" placeholder="Masukkan Email Valid" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat_admin">Alamat</label>
                        <input type="text" class="form-control" id="alamat_admin" name="alamat_admin" placeholder="Masukkan Alamat Lengkap" required>
                    </div>
                    <button type="submit" name="bSimpan" class="btn btn-primary">Simpan</button>
                    <a href="?halaman=user_admin" class="btn btn-danger">Batal</a>
                </form>
                <script src="assets/js/pswd.js"></script>
            </div>
        </div>
    </div>
</div>