<?php
//jika tombol dimpan di klik
if (isset($_POST['bSimpan'])) {

    //MEMBUAT VARIABEL 
    $kode_matkul = $_POST['kode_matkul'];  //$_POST['name dari form inputan']
    $nama_matkul = $_POST['nama_matkul'];
    $password = $_POST['password'];
    $password_hash = $password;
    $id_prodi = $_POST['prodi'];

    //perintah simpan data baru
    //simpan data
    $simpan = mysqli_query($koneksi, "INSERT INTO tbl_matakuliah (kode_matkul, nama_matkul, `password`, id_prodi) VALUES ('$kode_matkul', '$nama_matkul', '$password_hash', '$id_prodi') ");

    if ($simpan) {
        echo "<script src='./assets/js/sweetalert2/dist/sweetalert2.min.js'></script>
        <link rel='stylesheet' href='./assets/js/sweetalert2/dist/sweetalert2.min.css'>";
        echo "<script type='text/javascript'>
            setTimeout(function() {
                    Swal.fire({
                        title: 'Data Matkul Berhasil Ditambah',
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
                <h6 class="m-0 font-weight-bold text-primary">Form Tambah Data Mata Kuliah</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" name="jurusan" id="jurusan">
                        <option disabled selected> -- Pilih Jurusan --</option>
                            <?php
                            $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_jurusan");
                            while ($data = mysqli_fetch_array($tampil)) {
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
                        <label for="kode_matkul">Kode Mata Kuliah</label>
                        <input type="text" class="form-control" id="kode_matkul" name="kode_matkul" required>
                    </div>
                    <div class="form-group">
                        <label for="kode_matkul">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="nama_matkul">Mata Kuliah</label>
                        <input type="text" class="form-control" id="nama_matkul" name="nama_matkul" required>
                    </div>
                    <button type="submit" name="bSimpan" class="btn btn-primary">Simpan</button>
                    <a href="?halaman=mata_kuliah" class="btn btn-danger">Batal</a>
                </form>
            </div>
        </div>
    </div>
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
        url: "./admin-ambil-prodi.php",
        data: "jurusan="+id_jurusan,
        success: function(data){
           $("#prodi").html(data);
        }
    });
});

// $("#prodi").change(function(){
//     // variabel dari nilai combo box merk
//     var id_prodi = $("#prodi").val();

//     // Menggunakan ajax untuk mengirim dan dan menerima data dari server
//     $.ajax({
//         type: "POST",
//         dataType: "html",
//         url: "../virtuallab/ambil-data.php",
//         data: "prodi="+id_prodi,
//         success: function(data){
//             $("#mata_kuliah").html(data);
//         }
//     });
// });
</script>