<?php

// Koneksi database
include "../config/koneksi.php";

if (isset($_POST['submit'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  //Proses Login Dosen
  $query = "SELECT * FROM tbl_dosen WHERE username = '$username'";
  $eksekusi = mysqli_query($koneksi, $query);

  if (mysqli_num_rows($eksekusi) == 1) {

    $data = mysqli_fetch_assoc($eksekusi);

    // Kalau di database disimpan sebagai hash / password_hash( '12345678' , PASSWORD_DEFAULT);
    if (!password_verify($password, $data['pass'])) {
      echo "<script src='../assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
      <link rel='stylesheet' href='../assets/js/sweetalert2/dist/sweetalert2.min.css'>";
      echo "<script type='text/javascript'>
            setTimeout(function() {
              Swal.fire({
                title: 'Username atau Password Anda Salah',
                icon: 'error',
                showConfirmButton: false
              });
            }, 100);
            window.setTimeout(function(){
              document.location='login_dosen.php';
            }, 1000);
            </script>";
      exit;
    }

    session_start();
    // bikin role nya
    $_SESSION["id_dosen"] = $data["id_dosen"];
    $_SESSION["username"] = $data["username"];
    $_SESSION["password"] = $data["pass"];
    $_SESSION["role"] = "Dosen";
  
    // arahin ke dashboard
    echo "<script src='../assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
    <link rel='stylesheet' href='../assets/js/sweetalert2/dist/sweetalert2.min.css'>";
    echo "<script type='text/javascript'>
          setTimeout(function() {
			      Swal.fire({
			      	title: 'Login Sebagai Dosen Berhasil',
			      	icon: 'success',
			      	timer: 2000,
              showConfirmButton: false
			      });
		      }, 100);
          window.setTimeout(function(){
            document.location='../dosen.php';
          }, 2000);
          </script>";
    exit;
  }

  echo "<script src='../assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
  <link rel='stylesheet' href='../assets/js/sweetalert2/dist/sweetalert2.min.css'>";
  echo "<script type='text/javascript'>
        setTimeout(function() {
		      Swal.fire({
		      	title: 'Anda tidak terdaftar',
		      	icon: 'error',
            showConfirmButton: true
		      });
	      }, 100);
        </script>";
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

  <title>Login Dosen</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="../assets/img/icon/polbat.ico" type="image/x-icon">
  
  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.css" rel="stylesheet" type="text/css" />
  <link href="../vendor/fontawesome/css/all.css" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

  <!-- Custom styles for this template-->
  <link href="../assets/css/sb-admin-2.css" rel="stylesheet" />
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/style-hide-show-pswd.css">
</head>

<body class="bg-gradient-white">
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block bg-gradient-primary">
                <br>
                <img src="../assets/img/logopolibatam.png" class="img-fluid mt-5" />
                <h1 id="virtuallab">VIRTUAL LAB</h1>
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <br>
                    <h2 class="h2 text-gray-900 mb-4">Login</h2>
                  </div>
                  <form class="user" method="POST" action="">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="username" name="username" aria-describedby="emailHelp" placeholder="Username" required/>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password" required/>
                      <span id="fitur1"><i class="fa-solid fa-eye" id="eye" onclick="toggle()"></i></span>
                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" id="customCheck" />
                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                      </div>
                    </div>
                    <br>
                    <button type="submit" name="submit" class="btn btn-primary btn-user btn-block"> Login Dosen</button>
                    <hr />
                  </form>
                  <div class="text-center">
                    <a class="small" href="../forgot_password/forgot_pass_dosen.php">Forgot Password?</a>
                    <br>
                    <br>
                    <div>
                      <a class="small" href="../signup/signup_dosen.php">Sign Up</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../assets/js/pswd.js"></script>
  <script src="../assets/js/sb-admin-2.min.js"></script>
</body>

</html>