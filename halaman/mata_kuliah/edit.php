<?php

//tampilkan data yang akan di edit
$tampil = mysqli_query($koneksi, "SELECT * FROM tbl_matakuliah, tbl_prodi, tbl_jurusan 
WHERE tbl_matakuliah.id_prodi = tbl_prodi.id_prodi AND tbl_prodi.id_jurusan = tbl_jurusan.id_jurusan AND id_matkul = '$_GET[id]' ");
$data = mysqli_fetch_array($tampil);
if ($data) {
    $vid_jurusan = $data['id_jurusan'];
    $vnama_jurusan = $data['nama_jurusan'];
    $vid_prodi = $data['id_prodi'];
    $vnama_prodi = $data['nama_prodi'];
    $vkode_matkul = $data['kode_matkul'];
    $vnama_matkul = $data['nama_matkul'];
}

//Jika sudah ditampilkan dan jika tombol simpan perubahan di klik maka lakukan :
if (isset($_POST['b_Ubah'])) {

      // id matkul dari GET di tampung ke variabel dulu
      $id = $_GET['id'];

    $ubah = mysqli_query($koneksi, "UPDATE tbl_matakuliah SET 
                kode_matkul = '$_POST[kode_matkul]',
                nama_matkul ='$_POST[nama_matkul]',
                id_prodi = '$_POST[prodi]'
                WHERE id_matkul = '$id' ");

    if ($ubah) {
        echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
        <link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
        echo "<script type='text/javascript'>
            setTimeout(function() {
                    Swal.fire({
                        title: 'Data Matkul Berhasil Diubah',
                        icon: 'success',
                        timer: 2000,
                        showConfirmButton: false
                    });
                }, 100);
            window.setTimeout(function(){
                document.location='?halaman=mata_kuliah';
            }, 2000);
            </script>";
    }
}

?>


<div class="row justify-content-center">
    <div class="col-md-6 col-sm-12">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Ubah Data Mata Kuliah</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" name="jurusan" id="jurusan">
                        <option disabled> -- Pilih Jurusan --</option>
                                <option value="<?= $vid_jurusan ?>"><?= $vnama_jurusan ?></option>
                                    <?php
                                    $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_jurusan ORDER BY nama_jurusan ASC");
                                    while($data = mysqli_fetch_array($tampil)){
                                        echo "<option value='$data[id_jurusan]'> $data[nama_jurusan] </option>";
                                    }
                                    ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="prodi">Program Studi</label>
                        <select class="form-control" name="prodi" id="prodi" required>
                        <option disabled>-- Pilih Program Studi --</option>
                                <option value="<?= $vid_prodi ?>"><?= $vnama_prodi ?></option>
                                    <?php
                                    $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_prodi WHERE id_jurusan = '$vid_jurusan' ORDER BY nama_prodi ASC");
                                    while($data = mysqli_fetch_array($tampil)){
                                        echo "<option value='$data[id_prodi]'> $data[nama_prodi] </option>";
                                    }
                                    ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="kode_matkul">Kode Mata Kuliah</label>
                        <input type="text" class="form-control" id="kode_matkul" name="kode_matkul" value="<?= $vkode_matkul ?>">
                    </div>

                    <div class="form-group">
                        <label for="nama_matkul">Mata Kuliah</label>
                        <input type="text" class="form-control" id="nama_matkul" name="nama_matkul" value="<?= $vnama_matkul?>">
                    </div>
                    <button type="submit" name="b_Ubah" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="?halaman=mata_kuliah" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </div>
</div>


<script src="../virtuallab/assets/js/jquery-3.6.1.js"></script> 
<script src="../virtuallab/assets/js/popper.min.js"></script> 
<script src="../virtuallab/assets/js/jquery-3.6.1.min.js"></script>
	<script>
 
		$(function () {
			$('[data-toggle="tooltip"]').tooltip();
		});
 
	</script>


 <!-- JQUERY FOR FILTER PROGRAM STUDI -->
 
<script>

$("#jurusan").change(function(){
    // variabel dari nilai combo box jurusan
    var id_jurusan = $("#jurusan").val();

    // Menggunakan ajax untuk mengirim dan dan menerima data dari server
    $.ajax({
        type: "POST",
        dataType: "html",
        url: "../virtuallab/admin-ambil-prodi-ubah.php",
        data: "jurusan="+id_jurusan,
        success: function(data){
           $("#prodi").html(data);
        }
    });
});

</script>