<?php
include '../config/function_register.php';

if (isset($_POST["register"])) {

    if (registrasi_laboran($_POST) > 0) {
        echo "<script src='../assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
        <link rel='stylesheet' href='../assets/js/sweetalert2/dist/sweetalert2.min.css'>";
        echo "<script type='text/javascript'>
            setTimeout(function() {
                    Swal.fire({
                        title: 'Anda Berhasil Daftar',
                        icon: 'success',
                        timer: 2000,
                showConfirmButton: false
                    });
                }, 100);
            window.setTimeout(function(){
                document.location='../login/login_laboran.php';
            }, 2000);
            </script>";
    } else {
        echo mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Register</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="../assets/img/icon/polbat.ico" type="image/x-icon">
    
    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.css" rel="stylesheet" type="text/css" />
    <link href="../vendor/fontawesome/css/all.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/style-register-pswd.css">
</head>

<body class="bg-gradient-white">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-5 col-lg-6 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->


                        <div class="col-lg-0">
                            <div class="p-5">
                                <div class="text-center">
                                    <br>
                                    <h2 class="h2 text-gray-900 mb-4">Register</h2>
                                </div>
                                <form class="user" method="POST" action="">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="username" name="username" aria-describedby="emailHelp" placeholder="Full Name as Username" required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" class="form-control form-control-user" id="nik_laboran" name="nik_laboran" placeholder="NIK" required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" id="email_laboran" name="email_laboran" aria-describedby="emailHelp" placeholder="Email" required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="number" class="form-control form-control-user" id="no_hplaboran" name="no_hplaboran" placeholder="No. Hp" required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="alamat_laboran" name="alamat_laboran" placeholder="Alamat" required/>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" required/>
                                        <span id="pass1"><i class="fa-solid fa-eye" id="eye1" onclick="toggle1()"></i></span>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Confirm Password" required/>
                                        <span id="pass2"><i class="fa-solid fa-eye" id="eye2" onclick="toggle2()"></i></span>
                                    </div>
                                    <input type="hidden" class="form-control form-control-user" id="profile_img" name="profile_img" placeholder="Confirm Password" required/>

                                    <br>
                                    <button type="submit" name="register" class="btn btn-primary btn-user btn-block"> Register </button>
                                    <hr />
                                </form>
                                <div class="text-center">
                                    <a>Already have an Account?</a>
                                    <a class="small" href="../login/login_laboran.php">Login</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/register-pswd.js"></script>
    <script src="assets/js/sb-admin-2.min.js"></script>
</body>

</html>