<?php
//jika tombol dimpan di klik
if (isset($_POST['bSimpan'])) {
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    //perintah simpan data baru
    //simpan data
    $simpan = mysqli_query($koneksi, "INSERT INTO tbl_laboran SET
            username = '$_POST[username_laboran]',
            nik_laboran ='$_POST[nik_laboran]',
            pass = '$password',
            no_hplaboran = '$_POST[no_hplaboran]',
            email_laboran = '$_POST[email_laboran]',
            alamat_laboran = '$_POST[alamat_laboran]' ");

    if ($simpan) {
        echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
        <link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
        echo "<script type='text/javascript'>
            setTimeout(function() {
                    Swal.fire({
                        title: 'Data Laboran Berhasil Ditambah',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    });
                }, 100);
            window.setTimeout(function(){
                document.location='?halaman=user_laboran';
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
            <div class="card-header py-3 bg-primary">
                <h6 class="m-0 font-weight-bold text-white">Form Tambah Data Laboran</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="username_laboran">Username Laboran</label>
                        <input type="text" class="form-control" id="username_laboran" name="username_laboran" placeholder="Masukkan Nama Lengkap Sebagai Username Anda" required>
                    </div>
                    <div class="form-group">
                        <label for="nik_laboran">NIK</label>
                        <input type="number" class="form-control" id="nik_laboran" name="nik_laboran" placeholder="Masukkan NIK" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Password" required>
                        <span id="pass2"><i class="fa-solid fa-eye" id="eye" onclick="toggle()"></i></span>
                    </div>
                    <div class="form-group">
                        <label for="no_hplaboran">No. Telp/HP</label>
                        <input type="number" class="form-control" id="no_hplaboran" name="no_hplaboran" placeholder="Masukkan No.HP" required>
                    </div>
                    <div class="form-group">
                        <label for="email_laboran">Email</label>
                        <input type="email" class="form-control" id="email_laboran" name="email_laboran" placeholder="Masukkan Email Valid" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat_laboran">Alamat</label>
                        <input type="text" class="form-control" id="alamat_laboran" name="alamat_laboran" placeholder="Masukkan Alamat Lengkap" required>
                    </div>
                    <button type="submit" name="bSimpan" class="btn btn-primary">Simpan</button>
                    <a href="?halaman=user_laboran" class="btn btn-danger">Batal</a>
                </form>
                <script src="assets/js/pswd.js"></script>
            </div>
        </div>
    </div>
</div>