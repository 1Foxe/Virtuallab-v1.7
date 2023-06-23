<div class="row justify-content-center">
    <div class="col-md-6 col-sm-12">
        <!-- Basic Card Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Import Data</h6>
            </div>
            <div class="card-body">
                <form method="POST" action="?halaman=mata_kuliah&perihal=aksiexcel" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="jurusan">Jurusan</label>
                        <select class="form-control" name="jurusan" id="jurusan" required>
                        <option value=""> -- Pilih Jurusan --</option>
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
                        <label for="formFile">Import Data File Excel (xls, xlsx)</label>
                        <input type="file" class="form-control" id="formFile" name="filexls">
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