<?$judulModul = $data['judul_modul']; ?>
<?php include "template/head_mhs.php"; ?>

<?php include "template/sidebar_mhs.php"; ?>

<?php include "template/topbar_mhs.php"; ?>

<div class="card bg-primary">
    <div class="card-body">
    <?php
        $id_matkulmhs = $_GET['id_matkulmhs'];
        $id_modul = $_GET['id_modul'];
        $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_matakuliah INNER JOIN tbl_modulpraktik ON tbl_matakuliah.id_matkul = tbl_modulpraktik.id_matkul INNER JOIN tbl_matkulmhs ON tbl_matakuliah.id_matkul = tbl_matkulmhs.id_matkul WHERE tbl_modulpraktik.id_modul = '$id_modul' AND tbl_matkulmhs.id_matkulmhs = '$id_matkulmhs'");
        $data = mysqli_fetch_array($tampil);
    ?>
        <h6 class="m-0 font-weight-bold text-white"><?= $data['kode_matkul'] ?> - <?= $data['nama_matkul'] ?> - <?= $data['judul_modul'] ?></h6>
    </div>
</div>
<hr>

<div class="row justify-content-center">
    <?php
    $id_modul       = $_GET['id_modul'];
    $id_matkulmhs   = $_GET['id_matkulmhs'];
    $tampil         = mysqli_query($koneksi, "SELECT * FROM tbl_modulpraktik INNER JOIN tbl_matkulmhs ON tbl_modulpraktik.id_matkul = tbl_matkulmhs.id_matkul WHERE tbl_matkulmhs.id_matkulmhs = '$id_matkulmhs' AND tbl_modulpraktik.id_modul = '$id_modul'");
    $data           = mysqli_fetch_array($tampil);
    $upload         = $data['modul_file'];
    $file           = "upload/$upload";
    $src            = "file/".$upload; 
    if ($data['jenis_modul'] == "Link") {
        $link = $data['modul_link'];
        ?>
        <div class="col-md-8">
            <div class="card-header bg-primary text-white text-center">MODUL PRAKTIK</div>
                <div class="embed-responsive embed-responsive-4by3">
                    <iframe src="<?php echo $link ?>" class="embed-responsive-item" allowfullscreen></iframe>
                </div>
            <div class="card-footer bg-primary text-primary">.</div>
        </div>
        <?php
    } else {
        if (is_file($src)) {
            ?>
            <div class="col-md-7">
                <div class="card-header bg-primary text-white text-center">MODUL PRAKTIK</div>
                    <div class="embed-responsive embed-responsive-4by3">
                        <iframe src="<?php echo $src ?>" class="embed-responsive-item"></iframe>
                    </div>
                <div class="card-footer bg-primary text-primary">.</div>
            </div>
            <?php
        } else {
            ?>
            <div class="col-md-10">
                <div class="card-header bg-primary text-white text-center">MODUL PRAKTIK</div>
                    <div class="embed-responsive embed-responsive-4by3">
                        <iframe src="<?php echo $file ?>" class="embed-responsive-item" allowfullscreen></iframe>
                    </div>
                <div class="card-footer bg-primary text-primary">.</div>
            </div>
            <?php
        }
    }
    ?>
</div>
<?php
    $soal = mysqli_query($koneksi, "SELECT * FROM tbl_soal WHERE id_modul = '$id_modul'");
    $read = mysqli_fetch_array($soal);
?>
<?php if ($read['id_soal']) : ?>
    <div class="row justify-content-center mt-2 mb-2">
        <div class="col-sm-2">
            <div class="card">
            <a href="?halaman=modul_praktik&perihal=attempt_quiz&id_matkulmhs=<?= $data['id_matkulmhs'] ?>&id_modul=<?= $data['id_modul'] ?>&judul_modul=<?= urlencode($data['judul_modul']) ?>" target="_blank" class="btn btn-light btn-sm">Quiz</a>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php include "template/footer.php"; ?>