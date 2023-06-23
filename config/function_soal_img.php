<?php
//persiapan function untuk upload file/foto
function soal_img()
{
    //deklarasikan variabel kebutuhan
    $namafile = $_FILES['up_img']['name'];
    $ukuranfile = $_FILES['up_img']['size'];
    $error = $_FILES['up_img']['error'];
    $tmpname = $_FILES['up_img']['tmp_name'];

    //cek apakah file yang diupload adalah file/gambar
    $eksfilevalid = ['jpg', 'jpeg', 'png', 'jfif'];
    $eksfile = explode('.', $namafile);
	$eks = end($eksfile);
    $eksfile = strtolower(end($eksfile));

    if ($error != 0){
		echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
		<link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
		echo "<script type='text/javascript'>
				setTimeout(function() {
					Swal.fire({
						title: 'Gagal Upload',
						icon: 'error',
						showConfirmButton: true
					});
				}, 100);
				</script>";
		return false;
	}

    if (!in_array($eksfile, $eksfilevalid)) {
        echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
		<link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
		echo "<script type='text/javascript'>
				setTimeout(function() {
					Swal.fire({
						title: 'Gagal',
						text: 'File Yang Diupload bukan file gambar!',
						icon: 'error',
						showConfirmButton: true
					});
				}, 100);
			</script>";
		return false;
    }

    //cek apakah ukuran file terlalu besar
    if ($ukuranfile > 1000000) {
        echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
			<link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
			echo "<script type='text/javascript'>
					setTimeout(function() {
						Swal.fire({
							title: 'Gagal',
							text: 'Size File Terlalu Besar!',
							icon: 'error',
							showConfirmButton: true
						});
					}, 100);
				</script>";
			return false;
    }

    $namafile = uniqid() .time() . '.' . $eks;
    $upload = move_uploaded_file($tmpname, './soal_image/' . $namafile);

	if ($upload === TRUE) {
		return $namafile;
	} else {
		echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
			<link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
			echo "<script type='text/javascript'>
					setTimeout(function() {
						Swal.fire({
							title: 'File Tidak Terupload!',
							icon: 'error',
							showConfirmButton: true
						});
					}, 100);
				</script>";
			return false;
	}
}
?>