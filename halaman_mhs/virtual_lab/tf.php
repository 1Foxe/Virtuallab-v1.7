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
        background-image: url("assets/img/teaching_factory.jpg");
        background-attachment: fixed;
        background-color: rgba(0,0,0,0.4);
        backdrop-filter: blur(5px);
        background-size: 100% 100%;
    }

    .img {
        width: 200px;
        height: auto;
    }

    .hgc {
        margin-left: auto;
        margin-right: auto;
    }
</style>
<body>
    <table class="hgc">
        <?php
            $id_matkulmhs = $_GET['id_matkulmhs'];
            $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_matkulmhs WHERE id_matkulmhs = '$id_matkulmhs'");
        ?>
        <tr>
            <a href="?halaman=virtual_lab&perihal=tampil_kampus&id_matkulmhs=<?= $id_matkulmhs ?>" type="button" class="btn btn-secondary btn-lg">Kembali</a>
            <br><br><br><br>
            <td>
                <div class="container">
                    <a href="?halaman=virtual_lab&perihal=broadcast&id_matkulmhs=<?= $id_matkulmhs ?>" type="button" data-toggle="tooltip" title=""><img class="img animate__animated animate__fadeInDown" src="assets/img/pintu.png"></a>
                </div>
            </td>
            <td>
                <div class="container">
                    <a href="#" type="button" data-toggle="tooltip" title=""><img class="img animate__animated animate__fadeInDown" src="assets/img/pintu.png"></a>
                </div>
            </td>
        </tr>
    </table>
</body>
<script src="assets/js/jquery-3.6.1.js"></script> 
<script src="assets/js/popper.min.js"></script> 
<script> 
	$(function () {
		$('[data-toggle="tooltip"]').tooltip();
	});
</script>

<!-- JS -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</html>