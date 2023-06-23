<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="assets/bootstrap-5/css/bootstrap.css" rel="stylesheet">
    <link href="vendor/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    <title>Virtual Lab</title>
</head>
<style>
    body {
        background-image: url("assets/img/detail_poltek.png");
        position: relative;
        background-size: cover;
        overflow: hidden;
    }

    .tf {
        position: absolute;
        background-color: transparent;
        top: 20%;
        left: 90%;
        width: 130px;
        height: 130px;
        transform: translate(-50%, -50%) scale(1);
    }

    .ta {
        position: absolute;
        background-color: transparent;
        top: 65%;
        left: 15%;
        width: 130px;
        height: 130px;
        transform: translate(-50%, -50%) scale(1);
    }

    .gu {
        position: absolute;
        background-color: transparent;
        top: 65%;
        left: 52%;
        width: 200px;
        height: 200px;
        transform: translate(-50%, -50%) scale(1);
    }
</style>
<body>
    <?php
        $id_matkulguest = $_GET['id_matkulguest'];
        $query = mysqli_query($koneksi, "SELECT * FROM tbl_matkulguest WHERE id_matkulguest = '$id_matkulguest'");
        $data = mysqli_fetch_array($query);
    ?>
    <a href="?halaman=virtual_lab&perihal=beranda&id_matkulguest=<?= $id_matkulguest ?>" type="button" class="btn btn-secondary btn-lg">Kembali</a>
    <div>
        <a href="?halaman=virtual_lab&perihal=teaching_factory&id_matkulguest=<?= $id_matkulguest ?>" type="button" data-toggle="tooltip" title="Gedung Teaching Factory" class="tf"></a>
    </div>
    <div>
        <a href="?halaman=virtual_lab&perihal=tower_a&id_matkulguest=<?= $id_matkulguest ?>" type="button" data-toggle="tooltip" title="Gedung Tower A" class="ta"></a>
    </div>
    <div>
        <a href="?halaman=virtual_lab&perihal=gedung_utama&id_matkulguest=<?= $id_matkulguest ?>" type="button" data-toggle="tooltip" title="Gedung Utama" class="gu"></a>
    </div>
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