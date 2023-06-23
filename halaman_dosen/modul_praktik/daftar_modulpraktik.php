<!-- Page Heading -->
<div class="card bg-primary">
    <div class="card-body">
        <h5 class="m-0 font-weight-bold text-white">MATA KULIAH</h5>
    </div>
</div>
<hr>


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
                            <a href="" data-toggle="modal" data-target="#passwordModal<?= $data['id_matkul'] ?>">
                             <p class="card-text mt-3">Kelola Modul<i class="fas fa-angle-right ml-2"></i></p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Password Modal -->
        <div class="modal fade" id="passwordModal<?= $data['id_matkul'] ?>" tabindex="-1" role="dialog" aria-labelledby="passwordModalLabel<?= $data['id_matkul'] ?>" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="passwordModalLabel">Masukkan Kata Sandi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="?halaman=modul_praktik&perihal=check_password" method="POST">
            <div class="form-group">
            <label for="password">Kata Sandi</label>
            <input type="password" class="form-control" id="password" name="password" required> 
            <input type="text" class="form-control" id="id_matkul" name="id_matkul" value="<?= $data['id_matkul'] ?>" hidden> 
             </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
            </div>
        </div>
    </div>
</div>
<?php endwhile; ?>

</div>
