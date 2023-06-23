<?php

// set id user sesuai session
if (isset($_SESSION['id_laboran'])) {
    $user_id = $_SESSION['id_laboran'];
} else {
    die("Error. No ID Selected!");
}

//this will be called once form is submitted
if (isset($_POST['bSimpan'])) 
{

    //Get sll input fields
    $password_lama = $_POST['pass_lama'];
    // $pass = password_hash($password_lama, PASSWORD_DEFAULT);
    $password_baru = $_POST['pass_baru'];
    $konf_password = $_POST['konfirmasi_pass'];
    
    //cek password lama nya benar apa tidak
    $sql = "SELECT * FROM tbl_laboran WHERE id_laboran = '$user_id' ";
    $result = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_object($result);

    if (password_verify($password_lama, $data->password))
    {
        //Check if password is same
        if ($password_baru == $konf_password)
        {
            //change password
            $hash = password_hash($password_baru, PASSWORD_DEFAULT);
            $sql = "UPDATE tbl_laboran SET `password` = '$hash' WHERE id_laboran = '$user_id' ";
            mysqli_query($koneksi, $sql);

            echo "<script src='assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
            <link rel='stylesheet' href='assets/js/sweetalert2/dist/sweetalert2.min.css'>";
            echo "<script type='text/javascript'>
                setTimeout(function() {
                    Swal.fire({
                        title: 'Password Laboran Berhasil Diubah',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    });
                }, 100);
                window.setTimeout(function(){
                    document.location='laboran.php';
                }, 2000);
                </script>";
        }
        else
        {
            echo "<script src='assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
            <link rel='stylesheet' href='assets/js/sweetalert2/dist/sweetalert2.min.css'>";
            echo "<script type='text/javascript'>
                    setTimeout(function() {
                        Swal.fire({
                            title: 'Gagal',
                            text: 'Password Konfirmasi Anda Tidak Sesuai',
                            icon: 'error',
                            showConfirmButton: true
                        });
                    }, 100);
                    </script>";
        }
    }
    else
    {
        echo "<script src='assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
        <link rel='stylesheet' href='assets/js/sweetalert2/dist/sweetalert2.min.css'>";
        echo "<script type='text/javascript'>
                setTimeout(function() {
                    Swal.fire({
                        title: 'Gagal',
                        text: 'Password Lama Salah atau Tidak Ditemukan',
                        icon: 'error',
                        showConfirmButton: true
                    });
                }, 100);
                </script>";
    }
}
   
?>

<link rel="stylesheet" href="assets/css/style-changepswd.css">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-sm-12">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-primary">
                    <h6 class="m-0 font-weight-bold text-white">Change Password</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="form-group">
                            <input type="hidden" class="form-control" name="username" value="<?= $_SESSION['id_laboran'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="pass_lama">Password Lama</label>
                            <input type="password" class="form-control" id="pass_lama" name="pass_lama" required>
                            <span id="pass1"><i class="fa-solid fa-eye" id="eye1" onclick="toggle1()"></i></span>
                        </div>
                        <div class="form-group">
                            <label for="pass_baru">Password Baru</label>
                            <input type="password" class="form-control" id="pass_baru" name="pass_baru" required>
                            <span id="pass2"><i class="fa-solid fa-eye" id="eye2" onclick="toggle2()"></i></span>
                        </div>
                        <div class="form-group">
                            <label for="konfirmasi_pass">Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" id="konfirmasi_pass" name="konfirmasi_pass" required>
                            <span id="pass3"><i class="fa-solid fa-eye" id="eye3" onclick="toggle3()"></i></span>
                        </div>
                        <button type="submit" name="bSimpan" class="btn btn-primary">Simpan</button>
                        <a href="laboran.php" class="btn btn-danger">Kembali</a>
                    </form>
                    <script src="assets/js/changepswd.js"></script>
                </div>
            </div>
        </div>
    </div>
</div>