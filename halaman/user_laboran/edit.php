<?php

//tampilkan data yang akan di edit
$tampil = mysqli_query($koneksi, "SELECT * FROM tbl_laboran WHERE id_laboran = '$_GET[id]' ");
$data = mysqli_fetch_array($tampil);

//Jika sudah ditampilkan dan jika tombol simpan perubahan di klik maka lakukan :
if (isset($_POST['b_Ubah'])) {
    $ubah = mysqli_query($koneksi, "UPDATE tbl_laboran SET 
                username = '$_POST[username_laboran]',
                nik_laboran ='$_POST[nik_laboran]',
                no_hplaboran = '$_POST[no_hplaboran]',
                email_laboran = '$_POST[email_laboran]',
                alamat_laboran = '$_POST[alamat_laboran]'
                WHERE id_laboran = '$_GET[id]' ");

    if ($ubah) {
        echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
        <link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
        echo "<script type='text/javascript'>
            setTimeout(function() {
                    Swal.fire({
                        title: 'Data Laboran Berhasil Diubah',
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


<div class="row justify-content-center">
    <div class="col-md-6 col-sm-12">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Data Laboran</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="username_laboran">Username Laboran</label>
                        <input type="text" class="form-control" id="username_laboran" name="username_laboran" value="<?php echo $data['username'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="nik_laboran">NIK Laboran</label>
                        <input type="number" class="form-control" id="nik_laboran" name="nik_laboran" value="<?php echo $data['nik_laboran'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="no_hplaboran">No. Telp/HP</label>
                        <input type="number" class="form-control" id="no_hplaboran" name="no_hplaboran" value="<?php echo $data['no_hplaboran'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="email_laboran">Email</label>
                        <input type="email" class="form-control" id="email_laboran" name="email_laboran" value="<?php echo $data['email_laboran'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="alamat_laboran">Alamat</label>
                        <input type="text" class="form-control" id="alamat_laboran" name="alamat_laboran" value="<?php echo $data['alamat_laboran'] ?>">
                    </div>
                    <button type="submit" name="b_Ubah" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="?halaman=user_laboran" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>