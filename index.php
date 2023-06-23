<?php error_reporting(false); ?>
<?php

session_start();

if ( $_SESSION["role"] == "Mahasiswa" ) {
echo "<script>
          document.location='./mhs.php';
      </script>";
      exit;
} elseif ( $_SESSION["role"] == "Dosen" ) {
  echo "<script>
            document.location='./dosen.php';
        </script>";
        exit;
} elseif ( $_SESSION["role"] == "Guest" ) {
  echo "<script>
            document.location='./guest.php';
        </script>";
        exit;
} elseif ( $_SESSION["role"] == "Laboran" ) {
  echo "<script>
            document.location='./laboran.php';
        </script>";
        exit;
} elseif ( $_SESSION["role"] == "Admin" ) {
  echo "<script>
            document.location='./admin.php';
        </script>";
        exit;
}


?>
  




<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="assets/bootstrap-5/css/bootstrap.css" rel="stylesheet">
  <link href="vendor/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- MY CSS -->
  <link href="assets/css/style-index.css" rel="stylesheet">
  <title>Halaman Utama</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="assets/img/icon/polbat.ico" type="image/x-icon">

  <link href="manifest.json" rel="manifest">
  <link rel="apple-touch-icon" href="assets/img/192.jpg">
  <script>
        //if browser support service worker
        if('serviceWorker' in navigator) {
          navigator.serviceWorker.register('sw.js');
        };
  </script>
</head>

<body>
  <!-- Awal Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="assets/img/logopolibatam.png" alt="Logo" width="120" height="65" class="d-inline-block align-text-top">
      </a>
      <h2 class="text-white">VLAB</h2>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active text-white" aria-current="page" href="#">HOME</a>
          </li>
          <li class="nav-item me-4">
            <a class="nav-link text-white" href="#">ABOUT US</a>
          </li>
          <li class="nav-item me-4">
            <a class="nav-link text-white" href="#">CONTACT</a>
          </li>
          <li class="nav-item me-4">
            <a class="nav-link text-white" href="komentar/index.php">KOMENTAR</a>
          </li>
          <li class="nav-item me-4">
            <a class="nav-link text-white" href="hal-bantuan.html">BANTUAN</a>
          </li>
          <li class="nav-item text-white me-4">
            <a class="nav-link btn-login" href="contoh-login-user.php">LOGIN</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- Akhir Navbar -->



  <!-- Jumbotron -->
  <div id="background">
    <section class="jumbotron text-center">
      <h1 class="display-4">VIRTUAL LAB POLIBATAM</h1>
      <p class="lead">Layanan Pembelajaran Praktikum Daring</p>
    </section>
  </div>
  <!-- Akhir Jumbotron -->

  <!-- Container Atas -->
  <div id="home">
    <div class="isi">
      <div class="container atas">
        <h1>Sekilas Informasi Tentang Virtual Lab</h1>
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <i class="fa-solid fa-book"></i>
            <h3>SEJARAH</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Beatae facere tenetur doloremque eaque, enim itaque! Necessitatibus ducimus voluptas beatae in laudantium, laborum odit praesentium odio sunt, atque ipsam voluptate nisi.</p>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <i class="fa-solid fa-book"></i>
            <h3>SEJARAH</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Beatae facere tenetur doloremque eaque, enim itaque! Necessitatibus ducimus voluptas beatae in laudantium, laborum odit praesentium odio sunt, atque ipsam voluptate nisi.</p>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <i class="fa-solid fa-book"></i>
            <h3>SEJARAH</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Beatae facere tenetur doloremque eaque, enim itaque! Necessitatibus ducimus voluptas beatae in laudantium, laborum odit praesentium odio sunt, atque ipsam voluptate nisi.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Akhir Container Atas -->


  <!-- Awal Container Bawah -->
  <div class="container bawah">
    <h1>GALERY</h1>
    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"> <img class="img-circle" src="assets/img/undraw_posting_photo.svg" width="200px">
        <p class="text-center"><strong>Lorem ipsum</strong>dolor sit amet, consectetur adipisicing elit. Quam blanditiis quisquam labore modi minima debitis nostrum, veniam neque itaque! Neque laudantium vel alias, asperiores iusto autem sint molestiae dolores voluptatem.</p>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"> <img class="img-circle" src="assets/img/undraw_posting_photo.svg" width="200px">
        <p class="text-center"><strong>Lorem ipsum</strong>dolor sit amet, consectetur adipisicing elit. Quam blanditiis quisquam labore modi minima debitis nostrum, veniam neque itaque! Neque laudantium vel alias, asperiores iusto autem sint molestiae dolores voluptatem.</p>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12"> <img class="img-circle" src="assets/img/undraw_posting_photo.svg" width="200px">
        <p class="text-center"><strong>Lorem ipsum</strong>dolor sit amet, consectetur adipisicing elit. Quam blanditiis quisquam labore modi minima debitis nostrum, veniam neque itaque! Neque laudantium vel alias, asperiores iusto autem sint molestiae dolores voluptatem.</p>
      </div>

    </div>
  </div>
  <!-- Akhir Container Bawah -->

  <!--  Container Info-->
  <section id="info">
    <div class="container">
      <div class="row text-center">
        <div class="col">
          <h1>INFO</h1>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 mb-3">
          <div class="card">
            <img src="assets/img/undraw_profile_2.svg" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 mb-3">
          <div class="card">
            <img src="assets/img/undraw_profile_2.svg" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 mb-3">
          <div class="card">
            <img src="assets/img/undraw_profile_2.svg" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 mb-3">
          <div class="card">
            <img src="assets/img/undraw_profile_2.svg" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
        </div>
      </div>


    </div>
  </section>
  <!-- ini footer -->
  <footer>
    <div class="bg-vlab bg-dark">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 mt-5 ">
            <img src="assets/img/logopolibatam.png" alt="Logo" width="200" class="d-inline-block align-text-top">
            <br>
            <a href="#" class="footer-brand">V L A B</a>
            <p class="footer-informasi">
              lantai enam, gedung utama polibatam <br>
              Politeknik Negeri Batam
            </p>
          </div>
          <div class="col-lg-4 mt-5 mb-6">
            <p class="footer-informasi">
              Jl. Ahmad Yani Batam Kota. Kota Batam. kepulauan Riau. Indonesia
              <br>
              <br>
              Email : acbd@polibatam.ac.id
              <br>
              <br>
              Phone : 99999999999
            </p>
          </div>
          <div class="col-lg-4 mt-5 mb-6">
            <p class="footer-saran">
              Frequently Ask Question
            </p>
            <p class="footer-informasi">
              Untuk informasi lebih lanjut, silahkan klik tombol dibawah ini
            </p>
            <button><a href="" class="btn btn-saran2">
                Lihat F A Q
              </a></button>
          </div>
        </div>
      </div>
    </div>
    </div>
  </footer>
  
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/bootstrap-5/js/bootstrap.min.js"></script>

  <!--  Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>