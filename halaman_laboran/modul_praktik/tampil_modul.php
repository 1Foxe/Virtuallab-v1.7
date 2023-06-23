<div class="card bg-primary">
    <div class="card-body">
    <?php
        $id_modul = $_GET['id_modul'];
        $tampil = mysqli_query($koneksi, "SELECT * FROM tbl_matakuliah INNER JOIN tbl_modulpraktik ON tbl_matakuliah.id_matkul = tbl_modulpraktik.id_matkul WHERE tbl_modulpraktik.id_modul = '$id_modul'");
        $data = mysqli_fetch_array($tampil);
    ?>
        <h6 class="m-0 font-weight-bold text-white"><?= $data['kode_matkul'] ?> - <?= $data['nama_matkul'] ?> - <?= $data['judul_modul'] ?></h6>
    </div>
</div>
<hr>

<div class="row justify-content-center">
    <?php
    $id_modul   = $_GET['id_modul'];
    $tampil     = mysqli_query($koneksi,"SELECT * FROM tbl_modulpraktik WHERE id_modul = '$id_modul'");
    $data       = mysqli_fetch_array($tampil);
    $upload     = $data['modul_file'];
    $file       = "upload/$upload";
    $src        = "file/".$upload;
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
<div class="row justify-content-center mt-4 mb-4">
    <a href="?halaman=modul_praktik&perihal=lihat_soal&id_modul=<?= $data['id_modul'] ?>" class="btn btn-primary btn-sm">Atur Quiz</a>&nbsp;
    <a href="?halaman=modul_praktik&perihal=nilai&id_modul=<?= $data['id_modul'] ?>" class="btn btn-info btn-sm">Nilai</a>
</div>