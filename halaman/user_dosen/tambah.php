<?php
//jika tombol dimpan di klik
if (isset($_POST['bSimpan'])) {
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    //perintah simpan data baru
    //simpan data
    $simpan = mysqli_query($koneksi, "INSERT INTO tbl_dosen SET
            username = '$_POST[username_dosen]',
            nik_dosen ='$_POST[nik_dosen]',
            pass = '$password',
            no_hpdosen = '$_POST[no_hpdosen]',
            email_dosen = '$_POST[email_dosen]',
            alamat_dosen = '$_POST[alamat_dosen]' ");

    if ($simpan) {
        echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
        <link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
        echo "<script type='text/javascript'>
            setTimeout(function() {
                    Swal.fire({
                        title: 'Data Dosen Berhasil Ditambah',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    });
                }, 100);
            window.setTimeout(function(){
                document.location='?halaman=user_dosen';
            }, 2000);
            </script>";
    }
}
?>

<link rel="stylesheet" href="assets/css/pswd-data.css">

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8 col-sm-12">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Dosen</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="username_dosen">Username Dosen</label>
                            <input type="text" class="form-control" id="username_dosen" name="username_dosen" placeholder="Masukkan Nama Lengkap Sebagai Username Anda" required>
                        </div>
                        <div class="form-group">
                            <label for="nik_dosen">NIK</label>
                            <input type="number" class="form-control" id="nik_dosen" name="nik_dosen" placeholder="Masukkan NIK" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
                            <span id="pass2"><i class="fa-solid fa-eye" id="eye" onclick="toggle()"></i></span>
                        </div>
                        <div class="form-group">
                            <label for="no_hpdosen">No. Telp/HP</label>
                            <input type="number" class="form-control" id="no_hpdosen" name="no_hpdosen" placeholder="Masukkan No.Hp" required>
                        </div>
                        <div class="form-group">
                            <label for="email_dosen">Email</label>
                            <input type="email" class="form-control" id="email_dosen" name="email_dosen" placeholder="Masukkan Email Valid" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat_dosen">Alamat</label>
                            <input type="text" class="form-control" id="alamat_dosen" name="alamat_dosen" placeholder="Masukkan Alamat Lengkap" required>
                        </div>
                        <button type="submit" name="bSimpan" class="btn btn-primary">Simpan</button>
                        <a href="?halaman=user_dosen" class="btn btn-danger">Batal</a>
                    </form>
                    <script src="assets/js/pswd.js"></script>
                </div>
            </div>
        </div>
    </div>
</div>