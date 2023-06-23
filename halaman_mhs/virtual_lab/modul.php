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
        background-image: url("assets/img/bgpoltek.jpg");
        background-attachment: fixed;
        background-color: rgba(0,0,0,0.4);
        backdrop-filter: blur(5px);
        background-size: 100% 100%;
    }

    .img {
        width: 100%;
        height: auto;
    }

    .stb {
        margin-left: auto;
        margin-right: auto;
    }

    .re {
        margin-left: 30px;
        margin-right: 30px;
    }
</style>
<body>
    <table class="stb">
        <tr>
            <?php
                $id_matkul = $_GET['id_matkul'];
                $id_matkulmhs = $_GET['id_matkulmhs'];
                $kolom = 5;
                $i = 0;
                $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_modulpraktik INNER JOIN tbl_matkulmhs ON tbl_modulpraktik.id_matkul = tbl_matkulmhs.id_matkul WHERE tbl_matkulmhs.id_matkul = '$id_matkul' AND tbl_matkulmhs.id_matkulmhs = '$id_matkulmhs'");
            ?>
            <a href="?halaman=virtual_lab&perihal=beranda&id_matkulmhs=<?= $id_matkulmhs ?>" type="button" class="btn btn-secondary btn-lg">Kembali</a>
            <br><br><br><br>
            <?php while ($data = mysqli_fetch_array($tampil)) {
                if ($i >= $kolom) {
                    echo "<tr></tr>";
                    $i = 0;
                }
                $i++;
                ?>
                <td>
                    <div>
                        <a href="?halaman=modul_praktik&perihal=tampil_modul&id_matkulmhs=<?= $id_matkulmhs ?>&id_modul=<?= $data['id_modul'] ?>" target="_blank" type="button" data-toggle="tooltip" title="Modul : <?= $data['judul_modul'] ?>"><img class="img animate__animated animate__fadeInDown" src="assets/img/book.png"></a>
                    </div>
                </td>
                <td>
                    <div class="re"><br><br></div>
                </td>
                <?php
            } ?>
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