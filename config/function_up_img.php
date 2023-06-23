<?php
//persiapan function untuk upload file/foto
function upload_img()
{
    //deklarasikan variabel kebutuhan
    $namafile = $_FILES['file']['name'];
    $ukuranfile = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];
    $tmpname = $_FILES['file']['tmp_name'];

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
    if ($ukuranfile > 10000000) {
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
    $upload = move_uploaded_file($tmpname, './image_profile/' . $namafile);

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