<?php

//tampilkan data yang akan di edit
$tampil = mysqli_query($koneksi, "SELECT * FROM tbl_dosen WHERE id_dosen = '$_GET[id]' ");
$data = mysqli_fetch_array($tampil);

//Jika sudah ditampilkan dan jika tombol simpan perubahan di klik maka lakukan :
if (isset($_POST['b_Ubah'])) {
    $ubah = mysqli_query($koneksi, "UPDATE tbl_dosen SET 
                username = '$_POST[username_dosen]',
                nik_dosen ='$_POST[nik_dosen]',
                no_hpdosen = '$_POST[no_hpdosen]',
                email_dosen = '$_POST[email_dosen]',
                alamat_dosen = '$_POST[alamat_dosen]'
                WHERE id_dosen = '$_GET[id]' ");

    if ($ubah) {
        echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
        <link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
        echo "<script type='text/javascript'>
            setTimeout(function() {
                    Swal.fire({
                        title: 'Data Dosen Berhasil Diubah',
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


<div class="row justify-content-center">
    <div class="col-md-6 col-sm-12">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Data Dosen</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="username_dosen">Username Dosen</label>
                        <input type="text" class="form-control" id="username_dosen" name="username_dosen" value="<?php echo $data['username'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="nik_dosen">NIK Dosen</label>
                        <input type="number" class="form-control" id="nik_dosen" name="nik_dosen" value="<?php echo $data['nik_dosen'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="no_hpdosen">No. Telp/HP</label>
                        <input type="number" class="form-control" id="no_hpdosen" name="no_hpdosen" value="<?php echo $data['no_hpdosen'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="email_dosen">Email</label>
                        <input type="email" class="form-control" id="email_dosen" name="email_dosen" value="<?php echo $data['email_dosen'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="alamat_dosen">Alamat</label>
                        <input type="text" class="form-control" id="alamat_dosen" name="alamat_dosen" value="<?php echo $data['alamat_dosen'] ?>">
                    </div>
                    <button type="submit" name="b_Ubah" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="?halaman=user_dosen" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>