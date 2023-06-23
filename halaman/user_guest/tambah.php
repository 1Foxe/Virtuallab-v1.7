<?php
//jika tombol dimpan di klik
if (isset($_POST['bSimpan'])) {
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    //perintah simpan data baru
    //simpan data
    $simpan = mysqli_query($koneksi, "INSERT INTO tbl_guest SET
            username = '$_POST[username_guest]',
            pass = '$password',
            email_guest = '$_POST[email_guest]' ");

    if ($simpan) {
        echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
        <link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
        echo "<script type='text/javascript'>
            setTimeout(function() {
                    Swal.fire({
                        title: 'Data Guest Berhasil Ditambah',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    });
                }, 100);
            window.setTimeout(function(){
                document.location='?halaman=user_guest';
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
                <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Guest</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="username_guest">Username Guest</label>
                        <input type="text" class="form-control" id="username_guest" name="username_guest" placeholder="Masukkan Nama Lengkap Sebagai Username Anda" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" id="password" name="password" placeholder="Masukkan Password Anda" required>
                        <span id="pass1"><i class="fa-solid fa-eye" id="eye" onclick="toggle()"></i></span>
                    </div>
                    <div class="form-group">
                        <label for="email_guest">Email</label>
                        <input type="email" class="form-control" id="email_guest" name="email_guest" placeholder="Masukkan Email Valid" required>
                    </div>
                    <button type="submit" name="bSimpan" class="btn btn-primary">Simpan</button>
                    <a href="?halaman=user_guest" class="btn btn-danger">Batal</a>
                </form>
                <script src="assets/js/pswd.js"></script>
            </div>
        </div>
    </div>
</div>