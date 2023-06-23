<?php

//tampilkan data yang akan di edit
$tampil = mysqli_query($koneksi, "SELECT * FROM tbl_guest WHERE id_guest = '$_GET[id]' ");
$data = mysqli_fetch_array($tampil);

//Jika sudah ditampilkan dan jika tombol simpan perubahan di klik maka lakukan :
if (isset($_POST['b_Ubah'])) {
    $ubah = mysqli_query($koneksi, "UPDATE tbl_guest SET 
                username = '$_POST[username_guest]',
                email_guest ='$_POST[email_guest]'
                WHERE id_guest = '$_GET[id]' ");

    if ($ubah) {
        echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
        <link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
        echo "<script type='text/javascript'>
            setTimeout(function() {
                    Swal.fire({
                        title: 'Data Guest Berhasil Diubah',
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


<div class="row justify-content-center">
    <div class="col-md-6 col-sm-12">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Data Guest</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="username_guest">Username Guest</label>
                        <input type="text" class="form-control" id="username_guest" name="username_guest" value="<?php echo $data['username'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="email_guest">Email</label>
                        <input type="email" class="form-control" id="email_guest" name="email_guest" value="<?php echo $data['email_guest'] ?>">
                    </div>
                    <button type="submit" name="b_Ubah" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="?halaman=user_guest" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>