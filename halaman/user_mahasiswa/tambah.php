<?php
//jika tombol dimpan di klik
if (isset($_POST['bSimpan'])) {
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    //perintah simpan data baru
    //simpan data
    $simpan = mysqli_query($koneksi, "INSERT INTO tbl_mahasiswa SET
            username = '$_POST[username_mhs]',
            nim_mhs ='$_POST[nim_mhs]',
            pass = '$password',
            no_hpmhs = '$_POST[no_hpmhs]',
            email_mhs = '$_POST[email_mhs]',
            alamat_mhs = '$_POST[alamat_mhs]' ");

    if ($simpan) {
        echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
        <link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
        echo "<script type='text/javascript'>
            setTimeout(function() {
                    Swal.fire({
                        title: 'Data Mahasiswa Berhasil Ditambah',
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

<link rel="stylesheet" href="assets/css/pswd-data.css">

<div class="row justify-content-center">
    <div class="col-md-6 col-sm-12">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Mahasiswa</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="username_mhs">Username Mahasiswa</label>
                        <input type="text" class="form-control" id="username_mhs" name="username_mhs" placeholder="Masukkan Nama Lengkap Sebagai Username Anda" required>
                    </div>
                    <div class="form-group">
                        <label for="nim_mhs">NIM</label>
                        <input type="number" class="form-control" id="nim_mhs" name="nim_mhs" placeholder="Masukkan NIM" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
                        <span id="pass2"><i class="fa-solid fa-eye" id="eye" onclick="toggle()"></i></span>
                    </div>
                    <div class="form-group">
                        <label for="no_hpmhs">No. Telp/HP</label>
                        <input type="number" class="form-control" id="no_hpmhs" name="no_hpmhs" placeholder="Masukkan No.HP" required>
                    </div>
                    <div class="form-group">
                        <label for="email_mhs">Email</label>
                        <input type="email" class="form-control" id="email_mhs" name="email_mhs" placeholder="Masukkan Email Valid" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat_mhs">Alamat</label>
                        <input type="text" class="form-control" id="alamat_mhs" name="alamat_mhs" placeholder="Masukkan Alamat Lengkap" required>
                    </div>
                    <button type="submit" name="bSimpan" class="btn btn-primary">Simpan</button>
                    <a href="?halaman=user_mahasiswa" class="btn btn-danger">Batal</a>
                </form>
                <script src="assets/js/pswd.js"></script>
            </div>
        </div>
    </div>
</div>