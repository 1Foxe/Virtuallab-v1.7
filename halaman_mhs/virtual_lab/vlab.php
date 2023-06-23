<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="assets/bootstrap-5/css/bootstrap.css" rel="stylesheet">
    <link href="vendor/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Animation -->
    <link rel="stylesheet" href="assets/js/sweetalert2/dist/animate.min.css">
    <title>Virtual Lab</title>
</head>
<style>
    body {
        background-image: url("assets/img/bg_poltek.png");
        background-attachment: fixed;
        background-size: 100% 100%;
    }

    .center {
        position: fixed;
        top: 50%;
        left: 50%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
    }
</style>
<body>
    <main class="animate__animated animate__fadeIn">
        <?php
            $id_matkulmhs = $_GET['id_matkulmhs'];
            $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_matkulmhs WHERE id_matkulmhs = '$id_matkulmhs'");
        ?>
        <div class="center">
            <a href="?halaman=virtual_lab&perihal=beranda&id_matkulmhs=<?= $id_matkulmhs ?>" type="button" class="btn btn-primary btn-lg animate__animated animate__fadeInDown">Klik Mulai</a>
        </div>
    </main>
</body>
</html>