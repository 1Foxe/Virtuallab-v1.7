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
        background-size: 100% 100%;
    }

    .bgh {
        margin-left: auto;
        margin-right: auto;
    }

    .gr{
        width: 200px;
    }
</style>
<body>
    <?php
        $id_matkulguest = $_GET['id_matkulguest'];
        $query = mysqli_query($koneksi, "SELECT * FROM tbl_matkulguest INNER JOIN tbl_matakuliah ON tbl_matkulguest.id_matkul = tbl_matakuliah.id_matkul WHERE tbl_matkulguest.id_matkulguest = '$id_matkulguest'");
        $data = mysqli_fetch_array($query);
    ?>
    <a href="?halaman=virtual_lab&id_matkulguest=<?= $id_matkulguest ?>" type="button" class="btn btn-secondary btn-lg">Kembali</a>
    <br><br><br><br><br><br><br>
    <table class="bgh">
        <tr>
            <td>
                <a href="?halaman=virtual_lab&perihal=tampil_kampus&id_matkulguest=<?= $id_matkulguest ?>" type="button" data-toggle="tooltip" title="Tentang Kampus"><img src="assets/img/university.png" class="animate__animated animate__fadeInDown" width="350px"></a>
            </td>
            <td>
                <div class="gr"></div>
            </td>
            <td>
                <a href="?halaman=virtual_lab&perihal=tampil_modul&id_matkulguest=<?= $id_matkulguest ?>&id_matkul=<?= $data['id_matkul'] ?>" type="button" data-toggle="tooltip" title="Lihat Modul"><img src="assets/img/document.png" class="animate__animated animate__fadeInDown" width="230px"></a>
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