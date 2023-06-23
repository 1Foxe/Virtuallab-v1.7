<div class="row justify-content-center">
    <div class="col-md-8 col-sm-12">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftarkan Mata Kuliah Anda</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <!-- <div class="form-group">
                        <?php
                        $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_matakuliah");
                        while ($data = mysqli_fetch_array($tampil)) {

                        ?>
                            <label>
                                <input type="checkbox" name="mata_kuliah[]" value="<?= $data['id_matkul'] ?>">
                                <?= $data['kode_matkul'] ?> - <?= $data['nama_matkul'] ?> <br>
                            </label><br>

                        <?php
                        }
                        ?>
                    </div> -->


                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" name="jurusan" id="jurusan" required>
                        <option value="">-- Pilih Jurusan --</option>
                            <?php
                            $jurusan = mysqli_query($koneksi, "SELECT * FROM tbl_jurusan");
                            while ($data = mysqli_fetch_array($jurusan)) {
                            ?>
                                <option value="<?=$data['id_jurusan']?>"><?=$data['nama_jurusan']?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="prodi">Program Studi</label>
                        <select class="form-control" name="prodi" id="prodi" required>
                        <option value="">-- Pilih Program Studi --</option>
                         <!-- Program studi akan diload menggunakan ajax, dan ditampilkan disini -->
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="mata_kuliah">Mata Kuliah</label>
                        <select class="form-control" name="mata_kuliah" id="mata_kuliah" required>
                        <option value="" selected>-- Pilih Mata Kuliah--</option>
                        <!-- Mata Kuliah akan diload menggunakan ajax, dan ditampilkan disini -->
                            <!-- <?php
                            $matkul = mysqli_query($koneksi, "SELECT * FROM tbl_matakuliah");
                            while ($data = mysqli_fetch_array($matkul)) {
                            ?>
                                <option value="<?=$data['id_matkul']?>"><?=$data['kode_matkul']?> - <?=$data['nama_matkul']?></option>
                            <?php
                            }
                            ?> -->
                        </select>
                    </div>
                    <button type="submit" name="bSimpan" class="btn btn-primary">Enroll</button>
                </form>
            </div>
        </div>
    </div>
</div>
<br>

<?php
if (isset($_POST['bSimpan'])) {

    $id_dosen = $_SESSION["id_dosen"];
    $matkul = $_POST['mata_kuliah'];

    //Cek dulu apakah mata kuliah ini sudah di daftarkan sebelumnya
    $cekMatkul = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM tbl_dospengampu WHERE id_matkul = '$matkul' AND id_dosen = '$id_dosen'"));

    if($cekMatkul > 0) {
        echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
        <link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
        echo "<script type='text/javascript'>
            setTimeout(function() {
                    Swal.fire({
                        title: 'Matkul Sudah Dienroll',
                        icon: 'error',
                        showConfirmButton: true
                    });
                }, 100);
            </script>";
    } else {
        mysqli_query($koneksi, "INSERT INTO tbl_dospengampu(id_dosen, id_matkul) VALUES ('$id_dosen', '$matkul') ");
        echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
        <link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
        echo "<script type='text/javascript'>
            setTimeout(function() {
                    Swal.fire({
                        title: 'Matkul Berhasil Dienroll',
                        icon: 'success',
                        showConfirmButton: true
                    });
                }, 100);
            </script>";
    }
}

?>

<div class="row">
    <?php
    $id_dosen = $_SESSION["id_dosen"];
    $tampil = mysqli_query($koneksi, "SELECT tbl_matakuliah.*, tbl_dospengampu.* FROM tbl_matakuliah, tbl_dospengampu WHERE tbl_matakuliah.id_matkul = tbl_dospengampu.id_matkul AND id_dosen = '$id_dosen' ");
    $no = 1;
    while ($data = mysqli_fetch_array($tampil)) :
    ?>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-12 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h6 mb-0 font-weight-bold text-gray-800 text-uppercase"><?= $data['kode_matkul'] ?> - <?= $data['nama_matkul'] ?></div>
                        </div>
                        <div class="col-auto">
                            <a href="?halaman=pilih_matkul&perihal=hapus&id=<?=$data['id_matkul']?>&id_dosen=<?=$data['id_dosen']?>" class="delete-enroll" data-toggle="tooltip" title="Unenroll?" data-placement="top"><i class="fa-solid fa-square-minus fa-2x "></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php endwhile; ?>

</div>

<script src="./assets/js/jquery-3.6.1.js"></script> 
<script src="./assets/js/popper.min.js"></script> 
<script src="./assets/js/jquery-3.6.1.min.js"></script>
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
        url: "./enroll-ambil-prodi.php",
        data: "jurusan="+id_jurusan,
        success: function(data){
           $("#prodi").html(data);
        }
    });
});

$("#prodi").change(function(){
    // variabel dari nilai combo box merk
    var id_prodi = $("#prodi").val();

    // Menggunakan ajax untuk mengirim dan dan menerima data dari server
    $.ajax({
        type: "POST",
        dataType: "html",
        url: "./enroll-ambil-prodi.php",
        data: "prodi="+id_prodi,
        success: function(data){
            $("#mata_kuliah").html(data);
        }
    });
});
</script>